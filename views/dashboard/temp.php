<?php
// إعداد المتغيرات
$pageTitle = 'عنوان الصفحة';
$includeSessionCheck = true;
$includeCSRFRefresh = true;

// تضمين القوالب
include_once __DIR__ . '/../../templates/header.php';
include_once __DIR__ . '/../../templates/sidebar.php';
?>

<!-- محتوى الصفحة هنا -->
<div id="container" class="container-fluid">
    <div id="content" class="dashboardPage">
        <!-- محتواك الخاص -->
    </div>
</div>

<?php
include_once __DIR__ . '/../../templates/footer.php';
?>