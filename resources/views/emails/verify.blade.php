<h2>Xin chào {{ $user->username }}</h2>

<p>Bạn vừa đăng ký tài khoản trên hệ thống.</p>

<p>Nhấn vào link bên dưới để kích hoạt:</p>

<p>
    <a href="{{ $verifyUrl }}">
        {{ $verifyUrl }}
    </a>
</p>

<p>Nếu bạn không thực hiện thao tác này, hãy bỏ qua email.</p>
<p>Trân trọng,</p>