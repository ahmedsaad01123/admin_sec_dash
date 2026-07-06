<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?= $csrfToken ?>">
    <meta name="robots" content="noindex,nofollow">
    <title>FastWeb System</title>
    <link rel="icon" type="image/png" href="favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link rel="stylesheet" href="dist/css/font-awesome-4.7.0/css/font-awesome.min.css"/>

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
        
        .login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            width: 100%;
        }

        .btn-primary {
            --bs-btn-font-weight: 800;
        }
        
        .alert {
            border-radius: 10px;
            border: none;
        }
        
        .logo {
            width: 80px;
            height: 60px;
            background: rgba(65, 105, 180, 1);
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
                <div class="login-card">
                    <div class="logo">LOGO</div>
                    <h2 class="text-center mb-4">تسجيل الدخول </h2>
                    
                    <?php if (isset($_SESSION['error'])): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-shield-exclamation me-2"></i>
                            <?= htmlspecialchars($_SESSION['error']) ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                        <?php unset($_SESSION['error']); ?>
                    <?php endif; ?>
                    
                    <form method="POST" action="/login" id="loginForm">
                        <input type="hidden" name="csrf_token" value="<?= $csrfToken ?>">
                        
                        <div class="mb-3">
                            <label for="username" class="form-label">اسم المستخدم *</label>
                            <input type="text" class="form-control " id="username" name="username" 
                                   value="<?= htmlspecialchars($_POST['username'] ?? '') ?>" 
                                   required autofocus>
                        </div>
                        
                        <div class="mb-3">
                            <label for="password" class="form-label">كلمة السر *</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password" required>
                                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                    <i class="fa fa-eye" id="eyeIcon"></i>
                                </button>
                            </div>
                        </div>
                        
                        <div class="mb-3 form-check">
                            <label class="form-check-label" for="remember">
                                تذكرني
                            </label>
                            <input type="checkbox" class="form-check-input" id="remember" name="remember" >
                        </div>
                        
                        <button type="submit" class="btn btn-sm btn-primary">
                           
                            <i class="fa fa-sign-in" style="margin-right: 5px;"></i>
                             تسجيل دخول
                        </button>
                        
                        <a class="btn btn-sm btn-link" href="/forgot-password">
                            إسترجاع كلمة السر
                            <i class="fa fa-key" style="margin-right: 5px;"></i>

                        </a>
                        
                                            </form>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        // Toggle password visibility
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');
        
        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            // Toggle eye icon
            if (type === 'text') {
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        });
        
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
        
        // Clear form on successful submission
        document.getElementById('loginForm').addEventListener('submit', function() {
            setTimeout(() => {
                this.reset();
            }, 1000);
        });
        
        // Close alerts manually
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('btn-close')) {
                const alert = e.target.closest('.alert');
                if (alert) {
                    alert.style.display = 'none';
                }
            }
        });
    </script>
</body>
</html>
