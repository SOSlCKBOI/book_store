<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'License Management System')</title>
    <style>
        /* CSS สำหรับจัดกึ่งกลางหน้าจออย่างสมบูรณ์ */
        body { 
            font-family: Arial, sans-serif; 
            background-color: #f4f7f9; 
            margin: 0; 
            padding: 0;
            
            /* Flexbox setup สำหรับการจัดกึ่งกลางหลัก */
            display: flex; 
            min-height: 100vh; /* ทำให้ body สูงเต็มความสูงของจอ */
        }
        
        /* Main Content: ตัวจัดการจัดกึ่งกลาง */
        .main-content { 
            display: flex;
            justify-content: center; /* จัดกึ่งกลางแนวนอน */
            align-items: center;    /* จัดกึ่งกลางแนวตั้ง */
            flex-grow: 1; 
            padding: 20px; 
            width: 100%; 
        }
        
        /* สไตล์สำหรับกล่องเนื้อหาที่อยู่กึ่งกลาง */
        .centered-page {
            max-width: 900px;
            width: 100%;
            margin: 20px; 
            background-color: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            text-align: center; 
        }
        
        /* สไตล์สำหรับกลุ่มปุ่ม */
        .centered-actions {
            display: flex;
            justify-content: center; 
            gap: 25px; 
            margin: 0; /* ลบ margin บน-ล่างที่ไม่จำเป็นออก */
        }

        .btn-action {
            padding: 12px 25px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            font-size: 16px;
            transition: background-color 0.3s, transform 0.1s;
            background-color: #ecf0f1;
            color: #34495e;
            border: 1px solid #bdc3c7;
        }

        .btn-action:hover {
            background-color: #dce0e2;
            transform: translateY(-1px);
        }

        .btn-primary {
            background-color: #3498db; 
            color: white; 
            border: 1px solid #2980b9;
        }
        .btn-primary:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>

    <div class="centered-page">
        
        <div class="centered-actions">
            
            <a href="{{ route('home') }}" class="btn-action btn-primary">🏠 Home</a>
            <a href="#log" class="btn-action">Log</a> 
            <a href="#register" class="btn-action">Register</a>
            
            </div>
        
    </div>

</body>
</html>