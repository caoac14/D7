<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
        }
    </style>

</head>

<body>
    <div>
        <div>
            <div>
                <h4 style="text-align: center; font-weight: 700;">Trường Đại học Trà Vinh</h4>

                <h3 style="margin: 8px 0; text-align: center">BÁO CÁO SỰ CỐ THIẾT BỊ
                    <span>{{ '( ' . $data['thoiGian'] . ' )' }}</span></h3>
            </div>
            <div class="">
                <div style="margin-left: 8px">
                    <p>Tên giáo viên: {{ $data['tenGV'] }}</p>
                    <p>Phòng: {{ $data['tenPhongLop'] }}</p>
                    <p>Thiết bị: {{ $data['ten_thiet_bi'] }}</p>
                    <p>Mô tả sự cố: {{ $data['moTa'] }}</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
