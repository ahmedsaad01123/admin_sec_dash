<?php
// إعداد المتغيرات
$pageTitle = 'سجل الرسائل';
$includeSessionCheck = true;
$includeCSRFRefresh = true;

// تضمين القوالب
include_once __DIR__ . '/../templates/header.php';
include_once __DIR__ . '/../templates/sidebar.php';
?>

<div id="container" class="container-fluid">
<div id="content" class="">
                    <div id="pageTitle">
            <i class="icon fa fa-history"></i>
            <span class="title">سجل الرسائل</span>

            <div class="onSide">
                <a href="/messaging/create" class="btn btn-sm btn-primary">
                    <i class="fa fa-check-circle"></i> رسالة جديدة                </a>

            </div>
        </div>

        
                    <div class="alert alert-info">
                <i class="fa fa-info-circle"></i>
                ليس هناك رسائل بعد للعرض. بعد إرسال رسالة جديد ستظهر هنا، حيث يمكنك متابعة تقدم الإرسال.
                <div class="margin-top-15">
                    <a href="/messaging/create" class="btn btn-primary">
                        <span class="glyphicon glyphicon-envelope"></span> إرسال رسالة جديدة                    </a>
                </div>
            </div>

        
            </div>
</div>

<?php
// تضمين footer template
include_once __DIR__ . '/../templates/footer.php';
?>
