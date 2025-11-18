<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class JwtMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        try {
            $token = session('jwt_token');

            if (!$token) {
                return redirect('/login')->withErrors(['login' => 'Bạn chưa đăng nhập']);
            }

            $user = JWTAuth::setToken($token)->authenticate();

            if (!$user) {
                return redirect('/login')->withErrors(['login' => 'User không tồn tại']);
            }

        } catch (TokenExpiredException $e) {

            return redirect('/login')->withErrors(['login' => 'Token hết hạn, vui lòng đăng nhập lại']);

        } catch (TokenInvalidException $e) {

            return redirect('/login')->withErrors(['login' => 'Token không hợp lệ']);

        } catch (\Exception $e) {

            return redirect('/login')->withErrors(['login' => 'Không tìm thấy token']);
        }

        return $next($request);
    }
}
