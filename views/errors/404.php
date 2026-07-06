<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404 - الصفحة غير موجودة</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            font-family: 'Noto Sans Arabic', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .error-container {
            text-align: center;
            color: white;
        }
        
        .error-code {
            font-size: 8rem;
            font-weight: bold;
            text-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }
        
        .error-message {
            font-size: 1.5rem;
            margin: 1rem 0;
        }
        
        .btn-home {
            background: white;
            color: #667eea;
            border: none;
            border-radius: 25px;
            padding: 12px 30px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            margin-top: 2rem;
            transition: all 0.3s ease;
        }
        
        .btn-home:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
            color: #764ba2;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="error-container">
            <div class="error-code">404</div>
            <h1 class="error-message">الصفحة غير موجودة</h1>
            <p class="lead">عذراً، الصفحة التي تبحث عنها غير موجودة أو تم نقلها.</p>
            
            <a href="/login" class="btn-home">
                <i class="bi bi-house-door me-2"></i>العودة لتسجيل الدخول
            </a>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
