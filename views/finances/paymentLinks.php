<?php
// إعداد المتغيرات
$pageTitle = 'روابط الدفع';
$includeSessionCheck = true;
$includeCSRFRefresh = true;

// تضمين القوالب
include_once __DIR__ . '/../templates/header.php';
include_once __DIR__ . '/../templates/sidebar.php';
?>

<div id="container" class="container-fluid">
<div id="content" class="">
                    <div id="pageTitle" class="d-flex flex-gap-15 flex-wrap flex-rows flex-column-on-mobile align-items-center justify-content-between">
        <div class="flex-grow-1">
            <i class="icon fa fa-dollar"></i>
            <span class="title">الماليات</span>

                            
                <ul class="breadcrumb inline" style="margin: 0">
                    <li class="breadcrumb-item"></li>

                                            <li class="breadcrumb-item">روابط الدفع</li>
                                    </ul>
                    </div>

        <div class="d-flex justify-content-center">
            <div>
                
                            </div>
        </div>
    </div>
        
                             <div class="alert alert-warning">
        
        <i class="fa fa-exclamation-triangle"></i>
        <b>رجاءاً لاحظ ان التسجيل حالياً غير مفعل.</b> في حال ان هناك روابط دفع تستهدف عملاء جدد، وهو الأمر الذي سيتم عبر التسجيل الذاتي، لن يتمكنوا من تسجيل انفسهم والإستفادة من رابط الدفع! قم بتفعيل نموذج التسجيل لإتاحة إمكانية التسجيل.

                <div class="margin-top-15">
                    <a href="/admin/settings/clients" class="btn btn-sm btn-default">
                        <i class="fa fa-wrench"></i>
                        إتاحة التسجيل
                    </a>
                </div>
    </div> 
        
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-8">
                <div class="block style2">
    	<div class="block-title">
    		<span class="title">الروابط</span>
    	</div>
    	<div class="block-body">
                             <div class="alert alert-info margin-bottom-0">
        
        <i class="fa fa-info-circle"></i>
        ليس هناك اي روابط دفع مضافة حالياً. إستخدم النموذج على الجانب لإضافة رابط جديد.
    </div> 

                	</div>
    </div>            </div>

            <div class="col-xs-12 col-sm-12 col-md-4">
            	<form method="POST" action="/finances/paymentLinks/create" class="block style2">
        <input type="hidden" name="_token" value="6I8KuRvpEnoyRVC225dOQkQoGVsawtWiBQaPkLMj">
    	<div class="block-title">
            <i class="icon fa fa-plus-circle"></i>
    		<span class="title">
                إضافة رابط دفع جديد
            </span>
    	</div>

    	<div class="block-body">
            
            <div class="hint">
                <i class="fa fa-info-circle"></i>
                فور إتمام إضافة الرابط سيكون بإمكانك مشاركته مع اي من عملائك الحالين او المستهدفين بشكل مباشر او مثلاً عبر السوشيال ميديا. بعدها سيتمكن كل زائر للرابط من إصدار فاتورة لنفسه ودفعها.
            </div>

            
            <div class="form-group">
                <label>جهة الدفع المستهدفة</label>
                <select name="payer_type" class="form-control">
                    <option value="existing_clients">العملاء الحاليين فقط</option>
                    <option value="new_clients">العملاء الجدد فقط (عبر التسجيل)</option>
                    <option value="new_leads" selected="">العملاء المحتملين الجدد فقط (عبر التسجيل)</option>
                    <option value="any">العملاء الحاليين والجدد وايضاً العملاء المحتملين (الجدد فقط)</option>
                </select>
            </div>

            
            <div class="form-group">
                <label>المسمى الداخلي *</label>
                <input name="name" value="" type="text" class="form-control" required="">
            </div>

            
            <div class="form-group">
                <label>العنوان *</label>
                <input name="display_title" value="" type="text" class="form-control input-lg" required="">
            </div>

            
            <div class="form-group margin-bottom-0">
                <label>الوصف</label>
                <textarea name="display_description" rows="5" class="form-control"></textarea>
            </div>

            
            <!--
            <div class="form-group">
                <label>المبلغ *</label>
                <input name="amount" type="number" value="" step="any"
                       class="form-control" required/>
            </div>

            
            <div class="form-group">
                <label>إنتهاء الصلاحية</label>
                <input name="expires_at" type="date" value=""
                       class="form-control"/>
            </div>
            -->

    	</div>

        <div class="block-footer">
            <button class="btn btn-primary" type="submit">
                <i class="fa fa-check-circle"></i>
                إضافة الرابط
            </button>
        </div>
    </form>            </div>
        </div>
                </div>
</div>


<?php
// تضمين footer template
include_once __DIR__ . '/../templates/footer.php';
?>
