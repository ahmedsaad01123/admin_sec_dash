<?php
// إعداد المتغيرات
$pageTitle = 'تقرير النشاط الإجمالي';
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
            <i class="icon fa fa-sliders"></i>
            <span class="title">الإدارة</span>

                            
                <ul class="breadcrumb inline" style="margin: 0">
                    <li class="breadcrumb-item"></li>

                                            <li class="breadcrumb-item">تقرير النشاط الإجمالي</li>
                                    </ul>
                    </div>

        <div class="d-flex justify-content-center">
            <div>
                
                            </div>
        </div>
    </div>
        <div ng-app="app" ng-controller="controller" class="ng-scope">
            
            <div class="block style2">
        <div class="block-body">
            <form name="filtersForm" class="ng-pristine ng-valid">

                <div class="row">

                    <!-- ngIf: data.branches.length > 1 -->

                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label>مساحة الوقت</label>
                            <div class="timeSpanSelectorWidget ng-isolate-scope" setter="filters.timeRangeSetter">
        <div ng-show="['fromTo', 'date', 'beforeDate'].indexOf(choices.span) &lt; 0" class="form-group margin-bottom-0">
            <select ng-model="choices.span" ng-options="option.span as option.label for option in data.spans" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty"><!-- ngIf: options.acceptEmpty === true --><option label="اليوم" value="string:today" selected="selected">اليوم</option><option label="البارحة" value="string:yesterday">البارحة</option><option label="غداً" value="string:tomorrow">غداً</option><option label="هذا الإسبوع" value="string:thisWeek">هذا الإسبوع</option><option label="الإسبوع السابق" value="string:lastWeek">الإسبوع السابق</option><option label="هذا الشهر" value="string:thisMonth">هذا الشهر</option><option label="الشهر المنقضي" value="string:lastMonth">الشهر المنقضي</option><option label="تاريخ محدد" value="string:date">تاريخ محدد</option><option label="قبل تاريخ" value="string:beforeDate">قبل تاريخ</option><option label="من ... إلى" value="string:fromTo">من ... إلى</option><option label="من البداية" value="string:allTime">من البداية</option></select>
        </div>

        <!-- ngIf: choices.span === 'fromTo' -->

        <!-- ngIf: choices.span === 'date' -->

        <!-- ngIf: choices.span === 'beforeDate' -->
    </div>
                        </div>
                    </div>

                </div>

                <div class="form-group noMargin">
                    <button ng-click="report.load()" class="btn btn-primary">
                        <i class="fa fa-search"></i> عرض
                    </button>
                </div>

            </form>
        </div>
    </div>

            
            <!-- ngIf: report.data === null -->

            
            <!-- ngIf: report.data !== null --><div ng-if="report.data !== null" ng-bind-html="report.data" class="ng-binding ng-scope"><div class="block style4">
        <div class="block-title">
            <span class="title">العملاء</span>
        </div>

        <div class="block-body">
            <div class="boxes">

                
                <div class="box">
                    <div class="title">
                        إجمالي المٌضاف
                    </div>
                    <div class="value">0</div>
                </div>

                <div class="box">
                    <div class="title">
                        المحتملين المٌحولين
                    </div>
                    <div class="value">0</div>
                </div>

                <div class="box">
                    <div class="title">ذكور</div>
                    <div class="value">0</div>
                </div>

                <div class="box">
                    <div class="title">نساء</div>
                    <div class="value">0</div>
                </div>

            </div>
        </div>
    </div>
    <div class="block style4">
        <div class="block-title">
            <span class="title">
                التدريب
            </span>
        </div>

        <div class="block-body">

            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

                    <div class="sectionTitle">المجموعات التدريبية</div>

                    <dl class="dl-horizontal">
                        <dt>المضافة</dt>
                        <dd>0</dd>
                        <dt>بدأت</dt>
                        <dd>0</dd>
                        <dt>إنتهت</dt>
                        <dd>0</dd>
                        <dt>يجب ان تبدأ</dt>
                        <dd>0</dd>
                        <dt>يجب ان تنتهي</dt>
                        <dd>0</dd>
                    </dl>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

                    <div class="sectionTitle">المحاضرات</div>

                    <dl class="dl-horizontal">
                        <dt>الإجمالي</dt>
                        <dd>1</dd>
                        <dt>المؤكدة</dt>
                        <dd>0</dd>
                        <dt>بانتظار التأكيد</dt>
                        <dd>1</dd>
                        <dt>ملغاه</dt>
                        <dd>0</dd>
                        <dt>بانتظار تسجيل الحضور</dt>
                        <dd>0</dd>
                    </dl>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="sectionTitle">المتدربين</div>

                    <dl class="dl-horizontal">
                        <dt>الإجمالي</dt>
                        <dd>0</dd>
                        <dt>المسجلين من خلال شركات</dt>
                        <dd>0</dd>
                        <dt>من قوائم الانتظار</dt>
                        <dd>0</dd>
                        <dt>بعد اختبار لتحديد المستوى</dt>
                        <dd>0</dd>
                        <dt>المسجلة يدوياً</dt>
                        <dd>0</dd>
                    </dl>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="sectionTitle">الحضور</div>

                    <dl class="dl-horizontal">
                        <dt>المسجلة</dt>
                        <dd>0</dd>
                        <dt>الحضور</dt>
                        <dd>0</dd>
                        <dt>الغياب</dt>
                        <dd>0</dd>
                        <dt>إجمالي التأخيرات</dt>
                        <dd>0</dd>
                    </dl>
                </div>

            </div>
        </div>
    </div>

    
            <div class="block style4">
        <div class="block-title">
            <span class="title">الماليات</span>
        </div>

        <div class="block-body">
            <div class="boxes">

                <div class="box">
                    <div class="title">عدد العمليات</div>
                    <div class="value">0</div>
                </div>

                <div class="box">
                    <div class="title">إجمالى المستلم فعلياً</div>
                    <div class="value">0.00</div>
                </div>

                <div class="box">
                    <div class="title">إجمالي المدفوع فعلياً</div>
                    <div class="value">0.00</div>
                </div>

                <div class="box">
                    <div class="title">صافي الربح</div>
                    <div class="value">0.00</div>
                </div>

            </div>
        </div>
    </div>
    
    
            <div class="block style4">
        <div class="block-title">
            <span class="title">التسويق</span>
        </div>

        <div class="block-body">

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

                    <div class="sectionTitle">
                        العملاء المحتملين
                    </div>

                    <dl class="dl-horizontal">
                        <dt>الإجمالي</dt>
                        <dd>0</dd>

                        <dt>محتمل</dt>
                        <dd>0</dd>

                        <dt>تم تحويله</dt>
                        <dd>0</dd>

                        <dt>غير مؤهل</dt>
                        <dd>0</dd>
                    </dl>

                </div>

                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

                    <div class="sectionTitle">الإستعلامات</div>

                    <dl class="dl-horizontal">
                        <dt>الإجمالي</dt>
                        <dd>0</dd>

                        <dt>تم التعامل معها</dt>
                        <dd>0</dd>

                        <dt>بانتظار المتابعة</dt>
                        <dd>0</dd>

                        <dt>المؤرشفة</dt>
                        <dd>0</dd>
                    </dl>

                </div>

                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

                    <div class="sectionTitle">Cold-calling</div>

                    <dl class="dl-horizontal">
                        <dt>إجمالي المكالمات</dt>
                        <dd>0</dd>

                        <dt>بانتظار الإتصال</dt>
                        <dd>0</dd>

                        <dt>المتممة</dt>
                        <dd>0</dd>
                    </dl>

                </div>
            </div>

        </div>
    </div>
    </div><!-- end ngIf: report.data !== null -->
        </div>

            </div>
</div>

<?php
// تضمين footer template
include_once __DIR__ . '/../templates/footer.php';
?>
