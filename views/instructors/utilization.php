<?php
// إعداد المتغيرات
$pageTitle = 'الإستفادة والتشغيل';
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
            <i class="icon fa fa-user-circle"></i>
            <span class="title">المدربين</span>

                            
                <ul class="breadcrumb inline" style="margin: 0">
                    <li class="breadcrumb-item"></li>

                                            <li class="breadcrumb-item">تقرير الإستفادة والتشغيل للمدربين - Past utilization</li>
                                    </ul>
                    </div>

        <div class="d-flex justify-content-center">
            <div>
                
                            </div>
        </div>
    </div>
        <div ng-app="app" ng-controller="controller" class="ng-scope">
            <dismissible-hint name="instructors.allocation.utilization" class="ng-isolate-scope">
    <!-- ngIf: visible --><div ng-if="visible" class="dismissibleHint  d-flex flex-gap-15 align-items-center justify-content-between">
        <div class="d-flex flex-gap-20 align-items-center flex-grow-1">
            <!-- ngIf: icon || img --><div ng-if="icon || img" class="iconHolder hidden-xs ng-scope">
                <!-- ngIf: img -->
                <!-- ngIf: icon --><span ng-if="icon" class="ms icon ng-binding ng-scope">info</span><!-- end ngIf: icon -->
            </div><!-- end ngIf: icon || img -->

            <div class="content flex-grow-1">
                <ng-transclude>
                من هنا يمكنك عرض تفاصيل الإستفادة والتشغيل لمدرب معين، خلال فترة زمنية محددة. وذلك بناءاً على جدول مواعيد عمله خلال هذه الفترة والنشاطات التي تم تعينها له خلال هذه الفترة (مثل المحاضرات وإختبارات تحديد المستوى وغيرها). 
		هذا التقرير سيكون مفيد وفعال اكثر مع مرور الوقت وبعد ان يتم تحديد جدول مواعيد العمل والدوام الخاصة بالمدرب، لأن دونها لن يكون التقرير مفيد!
            </ng-transclude>
            </div>
        </div>

        <div>
            <!-- ngIf: dismissible --><button ng-click="dismiss()" ng-if="dismissible" class="close ng-scope" type="button">
                <span>×</span>
            </button><!-- end ngIf: dismissible -->
        </div>
    </div><!-- end ngIf: visible --></dismissible-hint>

            <div class="row">
            <form name="filtersForm" class="col-sm-12 col-md-6 ng-pristine ng-valid ng-valid-required">
                <div class="block style2">

                    <div class="block-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-0">
                                    <label>المدربين</label>
                                    <div>
                                        <instructor-search-filter ng-model="report.params.params.instructorFilter" class="ng-pristine ng-untouched ng-valid ng-isolate-scope ng-not-empty">
                <span>
                    <button type="button" class="btn btn-default" ng-click="openDialog()" ng-class="{'btn-info': hasActiveFilters(), 'btn-default': !hasActiveFilters()}">
                        <i class="fa fa-user-circle"></i>
                        <span ng-bind="trans('button_label')" class="ng-binding">بحث في المدربين</span>
                        <!-- ngIf: hasActiveFilters() -->
                    </button>
                    <!-- ngIf: hasActiveFilters() -->
                </span>
            </instructor-search-filter>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-0">
                                    <label>المدة الزمنية (من - إلى)</label>
                                    <div class="d-flex flex-gap-15 align-items-center">
                                        <div class="flex-grow-1" style="max-width: 50%">
                                            <input ng-model="report.params.params.from" type="date" class="form-control w-100 ng-pristine ng-untouched ng-valid ng-not-empty ng-valid-required" required="">
                                        </div>
                                        <div class="flex-grow-1 pe-15" style="max-width: 50%">
                                            <input ng-model="report.params.params.to" type="date" class="form-control w-100 ng-pristine ng-untouched ng-valid ng-not-empty ng-valid-required" required="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="block-footer">
                        <button ng-click="report.generate()" ng-disabled="filtersForm.$invalid || ! report.params.params.instructorFilter.enabled" disable-on-ajax="" class="btn btn-primary disabled" disabled="disabled">
                            <i class="fa fa-search"></i> إنتاج التقرير
                        </button>
                    </div>
                </div>
            </form>
        </div>

            <!-- ngIf: report.loading -->

            <!-- ngIf: !! report.report && ! report.loading -->
        </div>
            </div>
</div>

<?php
// تضمين footer template
include_once __DIR__ . '/../templates/footer.php';
?>
