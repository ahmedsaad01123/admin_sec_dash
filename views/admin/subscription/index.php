<?php
// إعداد المتغيرات
$pageTitle = 'الإشتراك بالخدمة';
$includeSessionCheck = true;
$includeCSRFRefresh = true;

// تضمين القوالب
include_once __DIR__ . '/../../templates/header.php';
include_once __DIR__ . '/../../templates/sidebar.php';
?>

<div id="container" class="container-fluid">
<div id="content" class="">
                    <div id="pageTitle">
            <i class="icon fa fa-credit-card-alt"></i>
            <span class="title">
                الإشتراك بالخدمة
            </span>
        </div>

                    <div class="block style2 primary" style="max-width: 600px;">
            	<div class="block-body" style="padding: 50px">
                                            <h3>You are currently in trial ...</h3>
                        <p>
                            You are still trialing Tamkeen TMS. Your trial is set to expire at <b>05/05/2026</b>
                            (أسبوع من الآن).
                        </p>
                    
                                            <p>
                            If you are ready to subscribe or need further assistance, please contact us through
                            <a href="https://tamkeentms.com/support/" target="_blank" class="text-underlined">this form</a>.

                            Or directly through email, at contact@tamkeentms.com <br>
                            Or phone, at: +201099408069 (Available on WhatsApp).
                        </p>
                                	</div>
            </div>

                    </div>
</div>


<?php
// تضمين footer template
include_once __DIR__ . '/../../templates/footer.php';
?>
