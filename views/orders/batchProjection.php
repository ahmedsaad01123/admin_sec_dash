<?php
// إعداد المتغيرات
$pageTitle = 'توقعات المجموعات';
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
            <i class="icon fa fa-bar-chart"></i>
            <span class="title">الطلبات</span>

                            
                <ul class="breadcrumb inline" style="margin: 0">
                    <li class="breadcrumb-item"></li>

                                            <li class="breadcrumb-item">توقعات المجموعات</li>
                                    </ul>
                    </div>

        <div class="d-flex justify-content-center">
            <div>
                
                            </div>
        </div>
    </div>
    <div ng-app="app" ng-controller="controller" class="ng-scope">
        <dismissible-hint name="training.orders.batch-projection" class="ng-isolate-scope">
    <!-- ngIf: visible --><div ng-if="visible" class="dismissibleHint  d-flex flex-gap-15 align-items-center justify-content-between">
        <div class="d-flex flex-gap-20 align-items-center flex-grow-1">
            <!-- ngIf: icon || img --><div ng-if="icon || img" class="iconHolder hidden-xs ng-scope">
                <!-- ngIf: img -->
                <!-- ngIf: icon --><span ng-if="icon" class="ms icon ng-binding ng-scope">info</span><!-- end ngIf: icon -->
            </div><!-- end ngIf: icon || img -->

            <div class="content flex-grow-1">
                <ng-transclude>
            <p class="mb-10 ng-scope">تساعدك هذه الصفحة على تخطيط عدد المجموعات الجديدة المطلوبة من خلال مقارنة طلب العملاء مع السعة المتاحة في المجموعات الحالية، مقسمة حسب أوقات التدريب المفضلة.</p><ul class="mb-10 ng-scope"><li><strong>الطلب:</strong> عدد العملاء النشطين الذين لديهم دورات بانتظار التسجيل (معلقة أو في قائمة الانتظار)، مجمّعة حسب وقت التدريب المفضل.</li><li><strong>المقاعد الشاغرة:</strong> الأماكن المتاحة في المجموعات الحالية التي لم تنتهِ بعد، موزعة حسب كل وقت تدريب.</li><li><strong>الطلب غير المستوفى:</strong> العملاء الذين لا يمكن استيعابهم في المجموعات الحالية — الفجوة بين الطلب والمقاعد الشاغرة لكل وقت تدريب.</li><li><strong>المجموعات المطلوبة:</strong> تقدير عدد المجموعات الجديدة المطلوبة، يُحسب بقسمة الطلب غير المستوفى على السعة الافتراضية للمجموعة.</li></ul><p class="mb-10 ng-scope"><i class="fa fa-exclamation-triangle text-warning"></i> يجب تحديد <strong>السعة الافتراضية للمجموعة</strong> لكل دورة حتى يتمكن النظام من حساب المجموعات المطلوبة. يمكنك ضبطها بشكل جماعي من <strong>إعدادات التدريب ← الدورات</strong>.</p><p class="mb-0 ng-scope"><i class="fa fa-info-circle text-info"></i> للحصول على توقعات دقيقة، تأكد من تحديد <strong>أوقات التدريب المفضلة</strong> للمتدربين. المتدربون بدون أوقات محددة سيظهرون تحت <strong>"غير محدد"</strong> ولا يمكن مطابقتهم مع مجموعات محددة.</p>
        </ng-transclude>
            </div>
        </div>

        <div>
            <!-- ngIf: dismissible --><button ng-click="dismiss()" ng-if="dismissible" class="close ng-scope" type="button">
                <span>×</span>
            </button><!-- end ngIf: dismissible -->
        </div>
    </div><!-- end ngIf: visible --></dismissible-hint>

        <!-- Loading -->
        <!-- ngIf: loading -->

        <!-- ngIf: !loading --><div ng-if="!loading" class="ng-scope">
            <!-- Summary Cards -->
            <div class="boxes justify-content-center">
                <div class="box text-center">
                    <div class="icon"><i class="fa fa-users"></i></div>
                    <div class="value ng-binding">0</div>
                    <div class="title">إجمالي الطلب</div>
                </div>
                <div class="box text-center">
                    <div class="icon"><i class="fa fa-book"></i></div>
                    <div class="value ng-binding">0</div>
                    <div class="title">دورات لديها طلب</div>
                </div>
                <div class="box text-center border-warning">
                    <div class="icon text-warning"><i class="fa fa-exclamation-triangle"></i></div>
                    <div class="value text-warning ng-binding">0</div>
                    <div class="title">طلب غير مستوفى</div>
                </div>
                <div class="box text-center border-danger">
                    <div class="icon text-danger"><i class="fa fa-plus-circle"></i></div>
                    <div class="value text-danger ng-binding">0</div>
                    <div class="title">مجموعات مطلوبة</div>
                </div>
            </div>

            <!-- Projections Table -->
            <div class="block style2">
                <div class="block-title d-flex justify-content-between align-items-center">
                    <div>
                        <span class="title">توقعات المجموعات</span>
                        <div class="sub-title">
                            <b class="ng-binding">0</b> دورات تحتاج مجموعات جديدة
                        </div>
                    </div>
                    <div class="d-flex align-items-center flex-gap-10">
                        <button type="button" class="btn btn-xs btn-default" ng-click="expandAll()">
                            <i class="fa fa-expand"></i> توسيع الكل
                        </button>
                        <button type="button" class="btn btn-xs btn-default" ng-click="collapseAll()">
                            <i class="fa fa-compress"></i> طي الكل
                        </button>
                    </div>
                </div>

                <div class="block-body p-0" style="max-height: 700px; overflow-y: auto;">
                    <!-- Empty State -->
                    <!-- ngIf: projections.length === 0 --><div ng-if="projections.length === 0" class="p-20 text-center ng-scope">
                        <i class="fa fa-inbox fa-3x"></i>
                        <p class="mt-15">لا توجد طلبات معلقة</p>
                    </div><!-- end ngIf: projections.length === 0 -->

                    <!-- Projections Table -->
                    <!-- ngIf: projections.length > 0 -->
                </div>

                <!-- Footer with Legend -->
                <!-- ngIf: projections.length > 0 -->
            </div>
        </div><!-- end ngIf: !loading -->
    </div>
        </div>
</div>


<?php
// تضمين footer template
include_once __DIR__ . '/../templates/footer.php';
?>
