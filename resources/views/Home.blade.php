<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>หน้าโฮม</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .home-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }
        .btn-home {
            width: 300px;
            height: 80px;
            font-size: 24px;
            margin: 15px 0;
        }
    </style>
</head>
<body>

<div class="container home-container">
    <h1 class="mb-5">ระบบจัดการห้องสมุด</h1>

    <a href="{{ route('borrow.return') }}" class="btn btn-primary btn-home">ยืม - คืน</a>
    <a href="{{ route('member.register') }}" class="btn btn-success btn-home">สมัครสมาชิก</a>
    <a href="{{ route('book.add') }}" class="btn btn-warning btn-home">เพิ่มข้อมูลหนังสือ</a>
</div>

</body>
</html>
