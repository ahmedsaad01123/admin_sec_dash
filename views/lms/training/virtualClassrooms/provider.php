<?php
// إعداد المتغيرات
$pageTitle = 'الفصول الإفتراضية';
$includeSessionCheck = true;
$includeCSRFRefresh = true;

// تضمين القوالب
include_once __DIR__ . '/../../../templates/header.php';
include_once __DIR__ . '/../../../templates/sidebar.php';
?>

<div id="container" class="container-fluid">
<div id="content" class="">
                    <div id="pageTitle" class="d-flex flex-gap-15 flex-wrap flex-rows flex-column-on-mobile align-items-center justify-content-between">
        <div class="flex-grow-1">
            <i class="icon fa fa-video-camera"></i>
            <span class="title">إدارة التعليم</span>

                            
                <ul class="breadcrumb inline" style="margin: 0">
                    <li class="breadcrumb-item"></li>

                                            <li class="breadcrumb-item">الفصول الإفتراضية</li>
                                    </ul>
                    </div>

        <div class="d-flex justify-content-center">
            <div>
                
                            </div>
        </div>
    </div>
        <ul class="nav nav-tabs">
            <li class="nav-item active">
                <a href="/training/virtualClassrooms/provider">
                    <i class="icon fa fa-video-camera"></i>
                    <span class="title">بيئة الفصول الإفتراضية</span>
                </a>
            </li>

            <li class="nav-item ">
                <a href="/training/virtualClassrooms/meetings">
                    <i class="icon fa fa-play-circle"></i>
                    <span class="title">الإجتماعات والتسجيلات</span>
                </a>
            </li>
        </ul>

                            <div class="block style2 mb-20">
                <div class="block-body">
                    <div class="d-flex flex-space-between flex-align-items-center">
                        <div class="d-flex flex-gap-20 flex-align-items-center">
                            <div>
                                <img src="https://dznommenf76q0.cloudfront.net/app/images/services/zoom.png?v=zzrlRl5vI9zKmwa" style="max-height: 80px" alt="">
                            </div>
                            <div>
                                <h3 class="mb-5">
                                    أنت تستخدم Zoom
                                </h3>
                                <p class="small">
                                    أنت حالياً تستخدم منصة  Zoom لتقديم المحاضرات والفصول الإفتراضية عبر الإنترنت. <br>يمكنك تغيير مقدم الخدمة هذا عبر الإعدادات.
                                </p>
                            </div>
                        </div>
                        <div class="d-flex flex-columns flex-gap-10">
                            <div>
                                <a href="/admin/settings/vc" class="btn btn-sm btn-primary">
                                    <i class="fa fa-cog"></i>
                                    تغيير مقدم الخدمة
                                </a>
                            </div>

                            <div>
                                <a href="/admin/settings/services/zoom/0" class="btn btn-sm btn-info">
                                    <i class="fa fa-cog"></i>
                                    ضبط التكامل
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div ng-app="provider" class="ng-scope">
                                        <div ng-controller="zoomController" class="ng-scope">
                        <div class="flex flex-margin-items-20 margin-bottom-15">
        <div>
            <h4 class="text-strong">توزيع الحسابات على المدربين</h4>
            <p class="small margin-top-10">
                <i class="fa fa-info-circle"></i>
                
				من هنا يمكنك التحكم في توزيع حسابات Zoom على المدربين المسجلين. 
				هذا التوزيع ممكن ان يتم بشكل يدوي حيث تتحكم في الحساب الخاص بكل مدرب (يمكن إستخدام نفس الحساب مع أكثر من مدرب). 
				أو يمكنك تفعيل "التوزيع الأوتوماتيكي - Zoom Pooling"، حيث يقوم النظام بإختيار حساب غير مستخدم لكل مدرب (بشكل اوتوماتيكي) مع بدء المحاضرة او الإختبار الشفوي. 
				
            </p>
        </div>

        <div>
            <button ng-click="manualMap.change()" class="btn btn-primary" type="button">
                <i class="fa fa-users"></i>
                توزيع الحسابات
            </button>

            <div class="margin-top-10">
                <a href="/admin/settings/vc" class="btn btn-sm btn-info" target="_blank">
                    <i class="fa fa-cog"></i>
                    تغيير طريقة التوزيع
                </a>
            </div>
        </div>
    </div>

    <!-- ngIf: manualMap.map == null -->

     <!-- ngIf: manualMap.map !== null && manualMap.map.length == 0 --> 

    <!-- ngIf: manualMap.map !== null && manualMap.map.length > 0 --><div ng-if="manualMap.map !== null &amp;&amp; manualMap.map.length &gt; 0" class="row ng-scope">
        <div class="col-xs-12 col-sm-12 col-md-7">

            <div class="block style2">
                <div class="block-body">

                    <div class="flex">
                        <div class="form-group">
                            <input ng-model="manualMap.search" type="text" placeholder="بحث ..." class="form-control ng-pristine ng-untouched ng-valid ng-empty">
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th style="width: 15px">#</th>
                                <th style="width: 40%">المدرب</th>
                                <th>حساب Zoom</th>
                            </tr>
                            </thead>
                            <tbody>
                            <!-- ngRepeat: i in manualMap.map | filter: manualMap.search --><tr ng-repeat="i in manualMap.map | filter: manualMap.search" ng-class="{'bg-warning': ! i.user}" class="ng-scope bg-warning">
                                <td class="ng-binding">1</td>
                                <td>
                                    <div class="text-strong ng-binding">Ahmad Barakat</div>
                                    <div class="extra-small text-muted ng-binding">0501000001</div>
                                </td>
                                <td>
                                    <!-- ngIf: i.user -->
                                    <!-- ngIf: ! i.user --><span ng-if="! i.user" class="ng-scope">
                                <i class="fa fa-exclamation-triangle text-danger"></i>
                                غير محدد
                            </span><!-- end ngIf: ! i.user -->
                                </td>
                            </tr><!-- end ngRepeat: i in manualMap.map | filter: manualMap.search --><tr ng-repeat="i in manualMap.map | filter: manualMap.search" ng-class="{'bg-warning': ! i.user}" class="ng-scope bg-warning">
                                <td class="ng-binding">2</td>
                                <td>
                                    <div class="text-strong ng-binding">Fatima Al-Rashid</div>
                                    <div class="extra-small text-muted ng-binding">0501000002</div>
                                </td>
                                <td>
                                    <!-- ngIf: i.user -->
                                    <!-- ngIf: ! i.user --><span ng-if="! i.user" class="ng-scope">
                                <i class="fa fa-exclamation-triangle text-danger"></i>
                                غير محدد
                            </span><!-- end ngIf: ! i.user -->
                                </td>
                            </tr><!-- end ngRepeat: i in manualMap.map | filter: manualMap.search --><tr ng-repeat="i in manualMap.map | filter: manualMap.search" ng-class="{'bg-warning': ! i.user}" class="ng-scope bg-warning">
                                <td class="ng-binding">3</td>
                                <td>
                                    <div class="text-strong ng-binding">Khalid Mansour</div>
                                    <div class="extra-small text-muted ng-binding">0501000003</div>
                                </td>
                                <td>
                                    <!-- ngIf: i.user -->
                                    <!-- ngIf: ! i.user --><span ng-if="! i.user" class="ng-scope">
                                <i class="fa fa-exclamation-triangle text-danger"></i>
                                غير محدد
                            </span><!-- end ngIf: ! i.user -->
                                </td>
                            </tr><!-- end ngRepeat: i in manualMap.map | filter: manualMap.search -->
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div><!-- end ngIf: manualMap.map !== null && manualMap.map.length > 0 -->
                    </div>
                                    </div>
                        </div>
</div>

<?php
// تضمين footer template
include_once __DIR__ . '/../../../templates/footer.php';
?>
