<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>สมัครสมาชิก</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4 text-center">สมัครสมาชิกใหม่</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('member.store') }}" method="POST" class="card p-4 shadow-sm">
        @csrf

        <div class="mb-3">
            <label class="form-label">คำนำหน้า</label>
            <select name="prefix_id" class="form-select" required>
                <option value="">-- เลือกคำนำหน้า --</option>
                @foreach($prefixes as $item)
                    <option value="{{ $item->Prefix_id }}">{{ $item->Prefix_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">ชื่อ-นามสกุล</label>
            <input type="text" name="User_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">วันเกิด</label>
            <input type="date" name="Birth_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">ศาสนา / สถานะ (Faite)</label>
            <select name="Faite_id" class="form-select" required>
                <option value="">-- เลือก --</option>
                @foreach($faites as $item)
                    <option value="{{ $item->Faite_id }}">{{ $item->Faite_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">อาชีพ</label>
            <select name="job_id" class="form-select" required>
                <option value="">-- เลือกอาชีพ --</option>
                @foreach($jobs as $item)
                    <option value="{{ $item->Job_id }}">{{ $item->Job_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">จังหวัด</label>
            <select name="provice_id" class="form-select" required>
                <option value="">-- เลือกจังหวัด --</option>
                @foreach($provinces as $item)
                    <option value="{{ $item->Provice_id }}">{{ $item->Provice_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">อำเภอ</label>
            <select name="district_id" class="form-select" required>
                <option value="">-- เลือกอำเภอ --</option>
                @foreach($districts as $item)
                    <option value="{{ $item->District_id }}">{{ $item->District_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">ตำบล</label>
            <select name="suppro_id" class="form-select" required>
                <option value="">-- เลือกตำบล --</option>
                @foreach($supprovinces as $item)
                    <option value="{{ $item->Suppro_id }}">{{ $item->Suppro_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('home') }}" class="btn btn-secondary">ย้อนกลับ</a>
            <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
        </div>
    </form>
</div>

</body>
</html>
