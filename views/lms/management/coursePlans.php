<?php
// إعداد المتغيرات
$pageTitle = 'خطط التدريب والمحتوى';
$includeSessionCheck = true;
$includeCSRFRefresh = true;

// تضمين القوالب
include_once __DIR__ . '/../../templates/header.php';
include_once __DIR__ . '/../../templates/sidebar.php';
?>

<div id="container" class="container-fluid">
<div id="content" class="">
                    <div id="pageTitle" class="d-flex flex-gap-15 flex-wrap flex-rows flex-column-on-mobile align-items-center justify-content-between">
        <div class="flex-grow-1">
            <i class="icon fa fa-laptop"></i>
            <span class="title">إدارة التعليم</span>

                            
                <ul class="breadcrumb inline" style="margin: 0">
                    <li class="breadcrumb-item"></li>

                                            <li class="breadcrumb-item">خطط التدريب والمحتوى</li>
                                    </ul>
                    </div>

        <div class="d-flex justify-content-center">
            <div>
                
                            </div>
        </div>
    </div>
                    <div class="row">
                <div class="col-sm-12 col-md-4">
                    <div class="block style2">
                        <div class="block-body">
                            <label>إختر تصنيف الدورات</label>
                            <select class="form-control" id="categories-menu" name="category"><option value="" selected="selected"></option><option value="2">Business Development</option><option value="1">General English</option><option value="3">Web Development</option></select>
                        </div>
                    </div>
                </div>
            </div>

                    
            </div>
</div>

<?php
// تضمين footer template
include_once __DIR__ . '/../../templates/footer.php';
?>
