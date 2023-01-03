<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>D7</title>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div style="padding: 16px; font-size: 14px">
        <div style="display: flex; align-items: center">
            <img src="{{ asset('/images/logo.webp') }}" width="40" height="40" alt="">
            <span style="font-size: 18px; margin-left: 6px">Trường Đại học Trà Vinh
            </span>
        </div>
        <div>
            <p>Xin chào <span style="font-weight: 600; font-size: 15px">{{ $testMailData['name'] }}</span></p>
            <p>Phòng máy tính Trường Đại học Trà Vinh gửi đến bạn mật khẩu đăng nhập Website
                <a href="http://localhost/D7/public/KL" style="color:#098dda">Quản lí phòng máy tính</a>
            </p>
        </div>
        <br>
        <div>
            <p>Email đăng nhập: <span style="color: rgb(9, 141, 218)">{{ $testMailData['email'] }}</span></p>
            <p>Mật khẩu: <span style="color: #098dda">{{ $testMailData['password'] }}</span></p>
        </div>
        <p>Vui lòng truy cập website để đổi lại mật khẩu của bạn để tránh bị xâm phạm. </p>
    </div>

</body>

</html>
