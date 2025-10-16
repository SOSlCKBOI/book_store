<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ยืม-คืนหนังสือ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4 text-center">ยืม - คืนหนังสือ</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('borrow.store') }}" method="POST" class="card p-4 shadow-sm">
        @csrf

        <!-- เลือกสมาชิก -->
        <div class="mb-3">
            <label class="form-label">สมาชิก</label>
            <select name="User_id" id="userSelect" class="form-select" required>
                <option value="">-- เลือกสมาชิก --</option>
                @foreach($users as $user)
                    <option value="{{ $user->User_id }}">{{ $user->User_name }}</option>
                @endforeach
            </select>
        </div>

        <!-- เลือกหนังสือ -->
        <div class="mb-3">
            <label class="form-label">หนังสือ</label>
            <select name="Book_id" id="bookSelect" class="form-select" required>
                <option value="">-- เลือกหนังสือ --</option>
                @foreach($books as $book)
                    <option value="{{ $book->Book_id }}">{{ $book->Book_name }}</option>
                @endforeach
            </select>
        </div>

        <!-- แสดงข้อมูลยืนยัน -->
        <div class="mb-3">
            <h5>ข้อมูลยืนยัน</h5>
            <p>สมาชิก: <span id="userName">-</span></p>
            <p>หนังสือ: <span id="bookName">-</span></p>
        </div>

        <!-- เลือกสถานะยืม/คืน -->
        <div class="mb-3">
            <label class="form-label">สถานะ</label>
            <select name="status_" class="form-select" required>
                <option value="0" selected>ยืม</option>
                <option value="1">คืน</option>
            </select>

        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('home') }}" class="btn btn-secondary">ย้อนกลับ</a>
            <button type="submit" class="btn btn-success">ยืนยัน</button>
        </div>
    </form>
</div>

<script>
$(document).ready(function() {
    // แสดงชื่อสมาชิกและหนังสือก่อนยืนยัน
    $('#userSelect').change(function() {
        var selectedUser = $("#userSelect option:selected").text();
        $('#userName').text(selectedUser);
    });

    $('#bookSelect').change(function() {
        var selectedBook = $("#bookSelect option:selected").text();
        $('#bookName').text(selectedBook);
    });
});
</script>

</body>
</html>
