<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>เพิ่มข้อมูลหนังสือ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4 text-center">เพิ่มข้อมูลหนังสือ</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('book.store') }}" method="POST" class="card p-4 shadow-sm">
        @csrf

        <div class="mb-3">
            <label class="form-label">ชื่อหนังสือ</label>
            <input type="text" name="Book_name" class="form-control" required>
        </div>

       <div class="mb-3">
            <label class="form-label">ปีพิมพ์ (ค.ศ.)</label>
             <input type="number" 
                name="PublicationYear" 
                class="form-control" 
                required
                min="1900" 
                max="{{ date('Y') }}" 
                value="{{ date('Y') }}">
        </div>


        <div class="mb-3">
            <label class="form-label">ชื่อผู้แต่ง</label>
            <select name="License_id" class="form-select" required>
                <option value="">-- เลือก License --</option>
                @foreach($licenses as $item)
                    <option value="{{ $item->License_id }}">{{ $item->Owner_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">สำนักพิมพ์</label>
            <select name="Publisher_id" class="form-select" required>
                <option value="">-- เลือกสำนักพิมพ์ --</option>
                @foreach($publishers as $item)
                    <option value="{{ $item->Publisher_id }}">{{ $item->Publisher_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">หมวดหมู่</label>
            <select name="Catagory_id" class="form-select" required>
                <option value="">-- เลือกหมวดหมู่ --</option>
                @foreach($catagories as $item)
                    <option value="{{ $item->Catagory_id }}">{{ $item->Catagory_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">ภาษา</label>
            <select name="Language_id" class="form-select" required>
                <option value="">-- เลือกภาษา --</option>
                @foreach($languages as $item)
                    <option value="{{ $item->Language_id }}">{{ $item->Language_name }}</option>
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
