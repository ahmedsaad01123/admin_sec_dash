<?php
// Application Entry Point
require_once __DIR__ . '/core/Security.php';
require_once __DIR__ . '/core/Database.php';
require_once __DIR__ . '/core/Router.php';
require_once __DIR__ . '/core/RateLimiter.php';
require_once __DIR__ . '/core/RememberMeMiddleware.php';
require_once __DIR__ . '/models/User.php';
require_once __DIR__ . '/services/AuthService.php';

// Initialize security
$security = Security::getInstance();
$security->initSecureSession();

// Initialize remember me functionality
$userModel = new User();
$authService = new AuthService($userModel, $security, RateLimiter::getInstance());
$rememberMe = new RememberMeMiddleware($userModel, $authService);
$rememberMe->handle();

// Initialize router
$router = new Router();

// Define routes
$router->get('/', 'AuthController', 'showLogin');
$router->get('/login', 'AuthController', 'showLogin');
$router->post('/login', 'AuthController', 'login');
$router->get('/logout', 'AuthController', 'logout');
$router->get('/dashboard', 'AuthController', 'showDashboard');

// Calendar route
$router->get('/calendar', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة التقويم
    require_once __DIR__ . '/views/calendar.php';
});

// Admission routes
$router->get('/admission/newPipeline', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة مراحل التقديم
    require_once __DIR__ . '/views/admission/newPipeline.php';
});

$router->get('/admission/placementTests', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة إختبارات تحديد المستوى
    require_once __DIR__ . '/views/admission/placementTests.php';
});

$router->get('/admission/waitingLists', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة قوائم الإنتظار
    require_once __DIR__ . '/views/admission/waitingLists.php';
});

// Orders routes
$router->get('/orders/enrollment', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة التسجيل
    require_once __DIR__ . '/views/orders/enrollment.php';
});

$router->get('/orders/retentionConfirmation', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة تأكيد الاستبقاء
    require_once __DIR__ . '/views/orders/retentionConfirmation.php';
});

$router->get('/orders/allOrders', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة جميع الطلبات
    require_once __DIR__ . '/views/orders/allOrders.php';
});

$router->get('/orders/installmentTracking', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة تتبع الأقساط
    require_once __DIR__ . '/views/orders/installmentTracking.php';
});

$router->get('/orders/batchProjection', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة توقعات المجموعات
    require_once __DIR__ . '/views/orders/batchProjection.php';
});

$router->get('/orders/insights', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة تحليلات
    require_once __DIR__ . '/views/orders/insights.php';
});

$router->get('/instructors', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة المدربين
    require_once __DIR__ . '/views/instructors/index.php';
});

$router->get('/instructors/availability', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة الإتاحة والتوفر
    require_once __DIR__ . '/views/instructors/availability.php';
});

$router->get('/instructors/utilization', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة الإستفادة والتشغيل
    require_once __DIR__ . '/views/instructors/utilization.php';
});

$router->get('/clients/create', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة تسجيل عميل جديد
    require_once __DIR__ . '/views/clients/create.php';
});

$router->get('/clients/all', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة قاعدة بيانات العملاء
    require_once __DIR__ . '/views/clients/all.php';
});

$router->get('/clients/companies', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة الشركات والتعاقدات
    require_once __DIR__ . '/views/clients/companies.php';
});

$router->get('/lms/management/coursePlans', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة خطط التدريب والمحتوى
    require_once __DIR__ . '/views/lms/management/coursePlans.php';
});

$router->get('/lms/tc/management', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة مركز الاختبارات
    require_once __DIR__ . '/views/lms/tc/management.php';
});

$router->get('/lms/training/virtualClassrooms/provider', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة الفصول الإفتراضية
    require_once __DIR__ . '/views/lms/training/virtualClassrooms/provider.php';
});

$router->get('/finances/transactions', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة المعاملات المالية
    require_once __DIR__ . '/views/finances/transactions.php';
});

$router->get('/finances/transactions/create', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة إنشاء معاملة جديدة
    require_once __DIR__ . '/views/finances/transactions/create.php';
});

$router->get('/finances/invoices', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة الفواتير
    require_once __DIR__ . '/views/finances/invoices.php';
});

$router->get('/finances/invoices/create', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة إصدار فاتورة جديدة
    require_once __DIR__ . '/views/finances/invoices/create.php';
});

$router->get('/marketing/leads', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة العملاء المحتملين
    require_once __DIR__ . '/views/marketing/leads.php';
});

$router->get('/marketing/forms', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة النماذج
    require_once __DIR__ . '/views/marketing/forms.php';
});

$router->get('/marketing/campaigns', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة الحملات التسويقية
    require_once __DIR__ . '/views/marketing/campaigns.php';
});

$router->get('/marketing/sa', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة اتمتة المبيعات
    require_once __DIR__ . '/views/marketing/sa.php';
});

$router->get('/admin/settings', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة الإعدادات
    require_once __DIR__ . '/views/admin/settings.php';
});

$router->get('/admin/users', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة المستخدمون والصلاحيات
    require_once __DIR__ . '/views/admin/users.php';
});

$router->get('/courses', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة الكورسات
    require_once __DIR__ . '/views/courses/index.php';
});

$router->get('/training/timeSlots', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة إدارة المواعيد
    require_once __DIR__ . '/views/training/timeSlots.php';
});

$router->get('/lms/training/virtualClassrooms/certificates', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة الشهادات
    require_once __DIR__ . '/views/lms/training/virtualClassrooms/certificates.php';
});

$router->get('/messaging/create', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة إرسال رسالة جديدة
    require_once __DIR__ . '/views/messaging/create.php';
});

$router->get('/messaging/log', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة سجل الرسائل
    require_once __DIR__ . '/views/messaging/log.php';
});

$router->get('/finances/batches', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة المصروفات المالية للمجموعات
    require_once __DIR__ . '/views/finances/batches.php';
});

$router->get('/finances/installments', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة متابعة الأقساط
    require_once __DIR__ . '/views/finances/installments.php';
});

$router->get('/finances/instructors', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة ماليات المدربين
    require_once __DIR__ . '/views/finances/instructors.php';
});

$router->get('/finances/paymentLinks', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة روابط الدفع
    require_once __DIR__ . '/views/finances/paymentLinks.php';
});

$router->get('/finances/stats/transactionsReport', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة تقرير إجمالي المعاملات المالية
    require_once __DIR__ . '/views/finances/stats/transactionsReport.php';
});

$router->get('/finances/preferences', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة الإعدادات المالية
    require_once __DIR__ . '/views/finances/preferences.php';
});

$router->get('/marketing/reports', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة التقارير التسويقية
    require_once __DIR__ . '/views/marketing/reports.php';
});

$router->get('/clients/remarks', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة مهام فريق العمل
    require_once __DIR__ . '/views/clients/remarks.php';
});

$router->get('/misc/kb', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة قاعدة المعرفة
    require_once __DIR__ . '/views/misc/kb.php';
});

$router->get('/announcements', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة الإعلانات
    require_once __DIR__ . '/views/announcements.php';
});

$router->get('/admin/templates', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة القوالب
    require_once __DIR__ . '/views/admin/templates.php';
});

$router->get('/admin/labs', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة إدارة قاعات التدريب
    require_once __DIR__ . '/views/admin/labs.php';
});

$router->get('/admin/branches', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة إدارة الفروع
    require_once __DIR__ . '/views/admin/branches.php';
});

$router->get('/admin/notifications', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة إدارة الإشعارات
    require_once __DIR__ . '/views/admin/notifications.php';
});

$router->get('/admin/identity', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة معلومات هوية المؤسسة
    require_once __DIR__ . '/views/admin/identity.php';
});

$router->get('/admin/reports', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة التقارير
    require_once __DIR__ . '/views/admin/reports.php';
});

$router->get('/admin/logs', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة سجل العمليات
    require_once __DIR__ . '/views/admin/logs.php';
});

$router->get('/admin/analytics', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة التحليلات
    require_once __DIR__ . '/views/admin/analytics.php';
});

$router->get('/admin/activityReport', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة تقرير النشاط الإجمالي
    require_once __DIR__ . '/views/admin/activityReport.php';
});

$router->get('/admin/subscription/ai', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة الذكاء الاصطناعي
    require_once __DIR__ . '/views/admin/subscription/ai.php';
});

$router->get('/admin/subscription', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة الإشتراك بالخدمة
    require_once __DIR__ . '/views/admin/subscription/index.php';
});

$router->get('/reports', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة التقارير
    require_once __DIR__ . '/views/reports.php';
});

$router->get('/certificates', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة التقارير
    require_once __DIR__ . '/views/certificates.php';
});

// Coordination routes
$router->get('/batches', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة المجموعات
    require_once __DIR__ . '/views/coordination/batches.php';
});

$router->get('/batches/create', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة بدء مجموعة جديدة
    require_once __DIR__ . '/views/coordination/batchesCreate.php';
});

$router->get('/lectures', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة المحاضرات
    require_once __DIR__ . '/views/coordination/lectures.php';
});

$router->get('/lectures/create', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // تمرير CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة إضافة محاضرة جديدة
    require_once __DIR__ . '/views/coordination/lecturesCreate.php';
});

// Account routes
$router->get('/account/modify', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // جلب بيانات المستخدم
    $userModel = new User();
    $user = $userModel->findById($_SESSION['user_id']);
    
    // تمرير بيانات المستخدم و CSRF token
    $csrfToken = Security::getInstance()->generateCSRFToken();
    
    // تضمين صفحة تعديل الحساب
    require_once __DIR__ . '/views/account/modify.php';
});

$router->post('/account/update-profile', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // التحقق من CSRF token
    $security = Security::getInstance();
    if (!$security->verifyCSRFToken($_POST['csrf_token'] ?? '')) {
        $_SESSION['error'] = 'طلب غير صالح.';
        header('Location: /account/modify');
        exit;
    }
    
    try {
        $userModel = new User();
        $user = $userModel->findById($_SESSION['user_id']);
        
        // تحديث المعلومات الشخصية
        $userModel->update($user['id'], [
            'full_name' => $_POST['full_name'] ?? $user['full_name'],
            'email' => $_POST['email'] ?? $user['email']
        ]);
        
        $_SESSION['success'] = 'تم تحديث المعلومات الشخصية بنجاح.';
    } catch (Exception $e) {
        $_SESSION['error'] = 'حدث خطأ أثناء تحديث المعلومات: ' . $e->getMessage();
    }
    
    header('Location: /account/modify');
    exit;
});

$router->post('/account/change-password', function() {
    // التحقق من المصادقة
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
    
    // التحقق من CSRF token
    $security = Security::getInstance();
    if (!$security->verifyCSRFToken($_POST['csrf_token'] ?? '')) {
        $_SESSION['error'] = 'طلب غير صالح.';
        header('Location: /account/modify');
        exit;
    }
    
    try {
        $userModel = new User();
        $user = $userModel->findById($_SESSION['user_id']);
        
        // التحقق من كلمة المرور الحالية
        if (!$security->verifyPassword($_POST['current_password'], $user['password'])) {
            $_SESSION['error'] = 'كلمة المرور الحالية غير صحيحة.';
            header('Location: /account/modify');
            exit;
        }
        
        // التحقق من تطابق كلمات المرور الجديدة
        if ($_POST['new_password'] !== $_POST['confirm_password']) {
            $_SESSION['error'] = 'كلمات المرور الجديدة غير متطابقة.';
            header('Location: /account/modify');
            exit;
        }
        
        // تحديث كلمة المرور
        $userModel->update($user['id'], [
            'password' => $security->hashPassword($_POST['new_password'])
        ]);
        
        $_SESSION['success'] = 'تم تغيير كلمة المرور بنجاح.';
    } catch (Exception $e) {
        $_SESSION['error'] = 'حدث خطأ أثناء تغيير كلمة المرور: ' . $e->getMessage();
    }
    
    header('Location: /account/modify');
    exit;
});

// Password reset routes
$router->get('/forgot-password', 'AuthController', 'showForgotPassword');
$router->post('/forgot-password', 'AuthController', 'forgotPassword');
$router->get('/reset-password', function($token = null) {
    if (!$token) {
        $_SESSION['error'] = 'رابط إعادة تعيين كلمة المرور غير صالح.';
        header('Location: /login');
        exit();
    }
    
    $authController = new AuthController();
    $authController->showResetPassword($token);
});
$router->post('/reset-password', 'AuthController', 'resetPassword');

// API routes
$router->get('/csrf-token', function() {
    // Apply rate limiting for API endpoint
    $rateLimiter = RateLimiter::getInstance();
    $result = $rateLimiter->checkRateLimit('csrf-token', $_SERVER['REMOTE_ADDR'], 'api');
    
    if (!$result['allowed']) {
        http_response_code(429);
        header('Content-Type: application/json');
        echo json_encode([
            'error' => 'Too many requests',
            'message' => $result['message'],
            'retry_after' => $result['time_remaining']
        ]);
        return;
    }
    
    header('Content-Type: application/json');
    echo json_encode(['token' => Security::getInstance()->generateCSRFToken()]);
});

$router->get('/api/check-session', function() {
    // Apply rate limiting for API endpoint
    $rateLimiter = RateLimiter::getInstance();
    $result = $rateLimiter->checkRateLimit('check-session', $_SERVER['REMOTE_ADDR'], 'api');
    
    if (!$result['allowed']) {
        http_response_code(429);
        header('Content-Type: application/json');
        echo json_encode([
            'error' => 'Too many requests',
            'message' => $result['message'],
            'retry_after' => $result['time_remaining']
        ]);
        return;
    }
    
    if (!isset($_SESSION['user_id'])) {
        http_response_code(401);
        echo json_encode(['error' => 'Session expired']);
        return;
    }
    
    // Verify session integrity
    if ($_SESSION['ip_address'] !== $_SERVER['REMOTE_ADDR'] || 
        $_SESSION['user_agent'] !== $_SERVER['HTTP_USER_AGENT']) {
        session_destroy();
        http_response_code(401);
        echo json_encode(['error' => 'Session hijacking detected']);
        return;
    }
    
    echo json_encode(['valid' => true]);
});

// Dispatch the request
$router->dispatch();
?>
