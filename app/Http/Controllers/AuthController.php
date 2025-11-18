<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|min:3',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        Log::info('register request', $request->all());

        $verifyToken = Str::random(40);

        $user = User::create([
            'username'  => $request->username,
            'email'     => $request->email,
            'password'  => $request->password,
            'email_verification_token' => $verifyToken,
        ]);

        $verifyUrl = url('/verify-email/' . $verifyToken);

        // Gửi mail verify
        Mail::raw("Nhấn link để kích hoạt tài khoản: $verifyUrl", function ($msg) use ($user) {
            $msg->to($user->email)->subject('Xác minh tài khoản');
        });

        return back()->with('success', 'Đăng ký thành công! Vui lòng kiểm tra email để xác minh.');
    }

    public function verifyEmail($token)
    {
        $user = User::where('email_verification_token', $token)->first();

        if (!$user) {
            return view('auth.verify_fail', ['message' => 'Token không hợp lệ.']);
        }

        $user->email_verified_at = now();
        $user->email_verification_token = null;
        $user->save();

        return view('auth.verify_success', ['user' => $user]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return back()->withErrors(['password' => 'Sai mật khẩu!']);
            }
        } catch (JWTException $e) {
            Log::error('JWT attempt failed', ['error' => $e->getMessage()]);
            return back()->withErrors(['auth' => 'Lỗi xác thực. Vui lòng thử lại.']);
        }

        $user = JWTAuth::user();

        if (!$user->email_verified_at) {
            return back()->withErrors(['email' => 'Bạn chưa xác minh email!']);
        }

        session(['jwt_token' => $token]);
        session(['user_id' => $user->id]);

        $user->last_login_at = now();
        $user->save();

        return redirect('/')->with('success', 'Đăng nhập thành công!');
    }

    public function logout()
    {
        try {
            $token = session('jwt_token');
            if ($token) {
                JWTAuth::setToken($token)->invalidate();
            }
        } catch (\Exception $e) {
        }

        session()->flush();

        return redirect('/login')->with('success', 'Đăng xuất thành công!');
    }


    public function sendOtp(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();
        if (!$user) return back()->withErrors(['email' => 'Email không tồn tại!']);

        // Tạo OTP
        $otp = rand(100000, 999999);

        $user->otp_code = $otp;
        $user->otp_expires_at = now()->addMinutes(10);
        $user->otp_attempts = 0;
        $user->save();

        // Gửi email
        Mail::raw("Mã OTP reset mật khẩu của bạn là: $otp", function ($msg) use ($user) {
            $msg->to($user->email)->subject('OTP Reset Password');
        });

        return back()->with('success', 'OTP đã được gửi vào email.');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'otp'      => 'required|digits:6',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user) return back()->withErrors(['email' => 'Email không hợp lệ!']);

        if ($user->otp_code != $request->otp)
            return back()->withErrors(['otp' => 'OTP không đúng!']);

        if (now()->greaterThan($user->otp_expires_at))
            return back()->withErrors(['otp' => 'OTP đã hết hạn!']);

        // Reset mật khẩu
        $user->password = Hash::make($request->password);
        $user->otp_code = null;
        $user->otp_expires_at = null;
        $user->save();

        return redirect('/login')->with('success', 'Đặt lại mật khẩu thành công!');
    }

    public function refresh()
    {
        try {
            $newToken = JWTAuth::refresh(JWTAuth::getToken());
            return response()->json(['token' => $newToken]);
        } catch (JWTException $e) {
            return response()->json(['error' => 'Token không hợp lệ'], 401);
        }
    }
}
