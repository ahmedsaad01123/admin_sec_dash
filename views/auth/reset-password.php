<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?= $csrfToken ?>">
    <meta name="robots" content="noindex,nofollow">
    <title>تعيين كلمة مرور جديدة - نظام المصادقة الآمن</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
        
        .form-control {
            border-radius: 10px;
            border: 2px solid #e0e0e0;
            padding: 12px 15px;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        
        .btn-primary {
            background: linear-gradient(45deg, #667eea, #764ba2);
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }
        
        .alert {
            border-radius: 10px;
            border: none;
        }
        
        .logo {
            width: 60px;
            height: 60px;
            background: linear-gradient(45deg, #667eea, #764ba2);
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
                    <div class="logo">🔐</div>
                    <h2 class="text-center mb-4">تعيين كلمة مرور جديدة</h2>
                    <p class="text-center text-muted mb-4">أدخل كلمة المرور الجديدة</p>
                    
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
                    
                    <form method="POST" action="/reset-password" id="resetPasswordForm">
                        <input type="hidden" name="csrf_token" value="<?= $csrfToken ?>">
                        <input type="hidden" name="token" value="<?= htmlspecialchars($token ?? '') ?>">
                        
                        <div class="mb-3">
                            <label for="password" class="form-label">
                                <i class="bi bi-lock me-2"></i>كلمة المرور الجديدة
                            </label>
                            <input type="password" class="form-control" id="password" name="password" 
                                   required minlength="8" autofocus>
                        </div>
                        
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">
                                <i class="bi bi-lock-fill me-2"></i>تأكيد كلمة المرور
                            </label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" 
                                   required minlength="8">
                        </div>
                        
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="show_password">
                                <label class="form-check-label" for="show_password">
                                    إظهار كلمة المرور
                                </label>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100 mb-3">
                            <i class="bi bi-shield-check me-2"></i>تعيين كلمة المرور الجديدة
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
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle password visibility
        document.getElementById('show_password').addEventListener('change', function() {
            const password = document.getElementById('password');
            const confirmPassword = document.getElementById('confirm_password');
            
            if (this.checked) {
                password.type = 'text';
                confirmPassword.type = 'text';
            } else {
                password.type = 'password';
                confirmPassword.type = 'password';
            }
        });
        
        // Form validation
        document.getElementById('resetPasswordForm').addEventListener('submit', function(e) {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm_password').value;
            
            if (password.length < 8) {
                e.preventDefault();
                document.getElementById('password').classList.add('is-invalid');
                return false;
            }
            
            if (password !== confirmPassword) {
                e.preventDefault();
                document.getElementById('confirm_password').classList.add('is-invalid');
                return false;
            }
            
            // Show loading state
            const submitBtn = document.querySelector('button[type="submit"]');
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="bi bi-hourglass-split me-2"></i>جاري التعيين...';
        });
        
        // Remove invalid state on input
        document.getElementById('password').addEventListener('input', function() {
            this.classList.remove('is-invalid');
            document.getElementById('confirm_password').classList.remove('is-invalid');
        });
        
        document.getElementById('confirm_password').addEventListener('input', function() {
            this.classList.remove('is-invalid');
        });
    </script>
</body>
</html>
