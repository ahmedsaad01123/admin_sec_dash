<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?= $csrfToken ?>">
    <meta name="robots" content="noindex,nofollow">
    <title>إعادة تعيين كلمة المرور - نظام المصادقة الآمن</title>
    
    <link rel="icon" type="image/png" href="favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(
                200deg,
                rgba(65, 105, 180, 1) 35%,
                rgba(34, 203, 200, 1) 100%
              )
              no-repeat fixed center !important;
            font-family: 'Noto Sans Arabic', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .reset-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            max-width: 400px;
            width: 100%;
        }
        
       
        .alert {
            border-radius: 10px;
            border: none;
        }
        
        .logo {
            width: 60px;
            height: 60px;
            background: linear-gradient(45deg, #112ca4, #228d5b);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            font-weight: bold;
            margin: 0 auto 1rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="reset-card">
                    <div class="logo">🔑</div>
                    <h2 class="text-center mb-4">إعادة تعيين كلمة المرور</h2>
                    <p class="text-center text-muted mb-4">أدخل بريدك الإلكتروني لإعادة تعيين كلمة المرور</p>
                    
                    <?php if (isset($_SESSION['error'])): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-shield-exclamation me-2"></i>
                            <?= htmlspecialchars($_SESSION['error']) ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                        <?php unset($_SESSION['error']); ?>
                    <?php endif; ?>
                    
                    <?php if (isset($_SESSION['success'])): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle me-2"></i>
                            <?= htmlspecialchars($_SESSION['success']) ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                        <?php unset($_SESSION['success']); ?>
                    <?php endif; ?>
                    
                    <form method="POST" action="/forgot-password" id="forgotPasswordForm">
                        <input type="hidden" name="csrf_token" value="<?= $csrfToken ?>">
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">
                                <i class="bi bi-envelope me-2"></i>البريد الإلكتروني
                            </label>
                            <input type="email" class="form-control" id="email" name="email" 
                                   value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" 
                                   required autofocus>
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100 mb-3">
                            <i class="bi bi-send me-2"></i>إرسال رابط إعادة التعيين
                        </button>
                        
                        <div class="text-center">
                            <a href="/login" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-right me-2"></i>العودة لتسجيل الدخول
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script src="dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Auto-refresh CSRF token every 30 minutes
        setInterval(() => {
            fetch('/csrf-token')
                .then(response => response.json())
                .then(data => {
                    document.querySelector('input[name="csrf_token"]').value = data.token;
                    document.querySelector('meta[name="csrf-token"]').setAttribute('content', data.token);
                })
                .catch(console.error);
        }, 30 * 60 * 1000);
        
        // Form validation
        document.getElementById('forgotPasswordForm').addEventListener('submit', function(e) {
            const email = document.getElementById('email').value.trim();
            
            if (!email) {
                e.preventDefault();
                document.getElementById('email').classList.add('is-invalid');
                return false;
            }
            
            // Show loading state
            const submitBtn = document.querySelector('button[type="submit"]');
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="bi bi-hourglass-split me-2"></i>جاري الإرسال...';
        });
        
        // Remove invalid state on input
        document.getElementById('email').addEventListener('input', function() {
            this.classList.remove('is-invalid');
        });
    </script>
</body>
</html>
