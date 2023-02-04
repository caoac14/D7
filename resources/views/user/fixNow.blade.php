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
            <p>Xin chào <span style="font-weight: 600; font-size: 15px">Quản lý phòng máy</span></p>
            <p> <span>{{ $testMailData['name'] }}</span> gửi đến bạn yêu cầu khắc phục nhanh sự cố.</p>
        </div>
        <div>
            <p>Thời gian: <span style="color: #5a2822">{{ $testMailData['time'] }}</span></p>
            <p>Phòng: <span style="color: #5a2822">{{ $testMailData['room'] }}</span></p>
            <p>Ghi chú: <span style="color: #5a2822">{{ $testMailData['about'] }}</span></p>
        </div>

        <br>
        <p>Vui lòng truy khắc phục nhanh chóng sự cố hoặc liên hệ <span
                style="color: #098dda">{{ $testMailData['email'] }}.</span></p>
    </div>

</body>

</html>
