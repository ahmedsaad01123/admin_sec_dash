<?php
// إعداد المتغيرات
$pageTitle = 'تقرير إجمالي المعاملات المالية';
$includeSessionCheck = true;
$includeCSRFRefresh = true;

// تضمين القوالب
include_once __DIR__ . '/../../templates/header.php';
include_once __DIR__ . '/../../templates/sidebar.php';
?>

<div id="container" class="container-fluid">
<div id="content" class="transactionsReportPage">
                    <div id="pageTitle" class="d-flex flex-gap-15 flex-wrap flex-rows flex-column-on-mobile align-items-center justify-content-between">
        <div class="flex-grow-1">
            <i class="icon fa fa-dollar"></i>
            <span class="title">الماليات</span>

                            
                <ul class="breadcrumb inline" style="margin: 0">
                    <li class="breadcrumb-item"></li>

                                            <li class="breadcrumb-item">تقرير إجمالي المعاملات المالية</li>
                                    </ul>
                    </div>

        <div class="d-flex justify-content-center">
            <div>
                
                            </div>
        </div>
    </div>
        <div ng-app="TransactionsReport" ng-controller="main" class="ng-scope">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 column-bordered">
                    <div class="block style2">
        <div class="block-title">
            <i class="icon fa fa-filter"></i>
            <span class="title">التصفية</span>
        </div>
        <div class="block-body">
            
            <div class="form-group">
                <label>انواع \ بنود التعاملات المطلوبة</label>
                <div class="limitedHeightBox" style="min-height: 300px">
                    <!-- ngRepeat: item in setup.items track by item.id --><div ng-repeat="item in setup.items track by item.id" class="checkbox ng-scope">
                        <label class="ng-binding">
                            <input checklist-value="item.id" type="checkbox" ng-model="checked" class="ng-scope ng-pristine ng-untouched ng-valid ng-not-empty" checklist-model="params.params.itemIds"> إستلام مدفوعات أحد المسارات التدريبية
                        </label>
                    </div><!-- end ngRepeat: item in setup.items track by item.id --><div ng-repeat="item in setup.items track by item.id" class="checkbox ng-scope">
                        <label class="ng-binding">
                            <input checklist-value="item.id" type="checkbox" ng-model="checked" class="ng-scope ng-pristine ng-untouched ng-valid ng-not-empty" checklist-model="params.params.itemIds"> إستلام تكلفة حجز إختبار تحديد مستوى
                        </label>
                    </div><!-- end ngRepeat: item in setup.items track by item.id --><div ng-repeat="item in setup.items track by item.id" class="checkbox ng-scope">
                        <label class="ng-binding">
                            <input checklist-value="item.id" type="checkbox" ng-model="checked" class="ng-scope ng-pristine ng-untouched ng-valid ng-not-empty" checklist-model="params.params.itemIds"> إستلام مدفوعات طلب تدريب
                        </label>
                    </div><!-- end ngRepeat: item in setup.items track by item.id --><div ng-repeat="item in setup.items track by item.id" class="checkbox ng-scope">
                        <label class="ng-binding">
                            <input checklist-value="item.id" type="checkbox" ng-model="checked" class="ng-scope ng-pristine ng-untouched ng-valid ng-not-empty" checklist-model="params.params.itemIds"> إضافة مبلغ للرصيد
                        </label>
                    </div><!-- end ngRepeat: item in setup.items track by item.id --><div ng-repeat="item in setup.items track by item.id" class="checkbox ng-scope">
                        <label class="ng-binding">
                            <input checklist-value="item.id" type="checkbox" ng-model="checked" class="ng-scope ng-pristine ng-untouched ng-valid ng-not-empty" checklist-model="params.params.itemIds"> استلام مبلغ مقدم أو تحت الحساب
                        </label>
                    </div><!-- end ngRepeat: item in setup.items track by item.id --><div ng-repeat="item in setup.items track by item.id" class="checkbox ng-scope">
                        <label class="ng-binding">
                            <input checklist-value="item.id" type="checkbox" ng-model="checked" class="ng-scope ng-pristine ng-untouched ng-valid ng-not-empty" checklist-model="params.params.itemIds"> إستلام تكلفة أحد المنتجات
                        </label>
                    </div><!-- end ngRepeat: item in setup.items track by item.id --><div ng-repeat="item in setup.items track by item.id" class="checkbox ng-scope">
                        <label class="ng-binding">
                            <input checklist-value="item.id" type="checkbox" ng-model="checked" class="ng-scope ng-pristine ng-untouched ng-valid ng-not-empty" checklist-model="params.params.itemIds"> إستلام مدفوعات أحد المجموعات التدريبية
                        </label>
                    </div><!-- end ngRepeat: item in setup.items track by item.id --><div ng-repeat="item in setup.items track by item.id" class="checkbox ng-scope">
                        <label class="ng-binding">
                            <input checklist-value="item.id" type="checkbox" ng-model="checked" class="ng-scope ng-pristine ng-untouched ng-valid ng-not-empty" checklist-model="params.params.itemIds"> دفع مستحقات المدرب لأحد المجموعات
                        </label>
                    </div><!-- end ngRepeat: item in setup.items track by item.id --><div ng-repeat="item in setup.items track by item.id" class="checkbox ng-scope">
                        <label class="ng-binding">
                            <input checklist-value="item.id" type="checkbox" ng-model="checked" class="ng-scope ng-pristine ng-untouched ng-valid ng-not-empty" checklist-model="params.params.itemIds"> الدفع مقابل أحد مصاريف المجموعات
                        </label>
                    </div><!-- end ngRepeat: item in setup.items track by item.id --><div ng-repeat="item in setup.items track by item.id" class="checkbox ng-scope">
                        <label class="ng-binding">
                            <input checklist-value="item.id" type="checkbox" ng-model="checked" class="ng-scope ng-pristine ng-untouched ng-valid ng-not-empty" checklist-model="params.params.itemIds"> عملية إضافة لمخزون المنتجات
                        </label>
                    </div><!-- end ngRepeat: item in setup.items track by item.id --><div ng-repeat="item in setup.items track by item.id" class="checkbox ng-scope">
                        <label class="ng-binding">
                            <input checklist-value="item.id" type="checkbox" ng-model="checked" class="ng-scope ng-pristine ng-untouched ng-valid ng-not-empty" checklist-model="params.params.itemIds"> دفع مقدم أو مبلغ تحت الحساب
                        </label>
                    </div><!-- end ngRepeat: item in setup.items track by item.id --><div ng-repeat="item in setup.items track by item.id" class="checkbox ng-scope">
                        <label class="ng-binding">
                            <input checklist-value="item.id" type="checkbox" ng-model="checked" class="ng-scope ng-pristine ng-untouched ng-valid ng-not-empty" checklist-model="params.params.itemIds"> رد مبلغ مستلم سابقاً
                        </label>
                    </div><!-- end ngRepeat: item in setup.items track by item.id -->
                </div>
            </div>

            
            <div class="form-group">
                <label>الوسوم</label>
                <div class="tags-menu pills align-items-center ng-isolate-scope ng-not-empty ng-valid" type="transactions" ng-model="params.params.tagIds">
    <div>
        <div class="dropdown">
            <button data-toggle="dropdown" class="btn btn-default dropdown-toggle ng-binding" type="button">
                <i class="fa fa-tag"></i> الوسوم <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" style="max-height: 250px; min-width: 250px; overflow-y: auto">
                <li ng-show="tags.length &gt;= 6" class="border-bottom ng-hide" style="padding: 8px">
                    <input type="text" ng-model="search" class="form-control input-sm ng-pristine ng-untouched ng-valid ng-empty" placeholder="بحث ...">
                </li>

                <li ng-show="tags.length === 0" class="text-center text-muted" style="padding: 10px">
                    <small class="ng-binding">لا توجد وسوم بعد</small>
                </li>

                <!-- ngRepeat: tag in tags | filter:search track by tag.id -->

                <li class="border-top" ng-click="$event.stopPropagation()" style="padding-top: 3px">
                    <!-- ngIf: ! newTag.visible --><a ng-if="! newTag.visible" ng-click="newTag.show()" href="" class="ng-binding ng-scope">
                        <i class="fa fa-plus"></i> إنشاء وسم جديد
                    </a><!-- end ngIf: ! newTag.visible -->

                    <!-- ngIf: newTag.visible -->
                </li>
            </ul>
        </div>
    </div>

    <!-- ngRepeat: tag in selected track by tag.id -->
</div>
            </div>

            
            <div class="form-group">
                <label>مساحة الوقت المطلوبة</label>
                <div class="timeSpanSelectorWidget ng-isolate-scope" options="{'span': 'thisMonth'}" is-valid="params.timeSpan.valid" setter="params.timeSpan.setter">
        <div ng-show="['fromTo', 'date', 'beforeDate'].indexOf(choices.span) &lt; 0" class="form-group margin-bottom-0">
            <select ng-model="choices.span" ng-options="option.span as option.label for option in data.spans" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty"><!-- ngIf: options.acceptEmpty === true --><option label="اليوم" value="string:today">اليوم</option><option label="البارحة" value="string:yesterday">البارحة</option><option label="غداً" value="string:tomorrow">غداً</option><option label="هذا الإسبوع" value="string:thisWeek">هذا الإسبوع</option><option label="الإسبوع السابق" value="string:lastWeek">الإسبوع السابق</option><option label="هذا الشهر" value="string:thisMonth" selected="selected">هذا الشهر</option><option label="الشهر المنقضي" value="string:lastMonth">الشهر المنقضي</option><option label="تاريخ محدد" value="string:date">تاريخ محدد</option><option label="قبل تاريخ" value="string:beforeDate">قبل تاريخ</option><option label="من ... إلى" value="string:fromTo">من ... إلى</option><option label="من البداية" value="string:allTime">من البداية</option></select>
        </div>

        <!-- ngIf: choices.span === 'fromTo' -->

        <!-- ngIf: choices.span === 'date' -->

        <!-- ngIf: choices.span === 'beforeDate' -->
    </div>
            </div>

            <div class="form-group noMargin">
                <button ng-click="results.fetch()" ng-disabled="! params.timeSpan.valid" class="btn btn-primary">
                    <span class="glyphicon glyphicon-ok"></span> عرض
                </button>
            </div>
        </div>
    </div>                </div>

                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <!-- ngIf: !results.data --><div ng-if="!results.data" class="alert alert-info ng-scope">
        <i class="fa fa-info-circle"></i>
        قم بتحديد انواع التعاملات والمدة المطلوبة من النموذج المجاور لإنتاج التقرير.    </div><!-- end ngIf: !results.data -->

    
    <!-- ngIf: results.data -->                </div>
            </div>
        </div>
            </div>
</div>

<?php
// تضمين footer template
include_once __DIR__ . '/../../templates/footer.php';
?>
