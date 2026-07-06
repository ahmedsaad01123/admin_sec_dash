<?php
// إعداد المتغيرات
$pageTitle = 'الإتاحة والتوفر';
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

                                            <li class="breadcrumb-item">تقرير الإتاحة والتوفر للمدربين - Future Availability</li>
                                    </ul>
                    </div>

        <div class="d-flex justify-content-center">
            <div>
                
                            </div>
        </div>
    </div>
                     <div class="alert alert-danger">
        
        <i class="fa fa-exclamation-triangle"></i>
        تحتاج لإضافة مواعيد العمل اولاً! هذا التقرير يظهر لك المدربين المتاحين لمواعيد محددة مسبقاً. يتم إضافة المواعيد ثم جدول عمل وورديات كل مدرب، وبناءاً على هذه المعلومات سيستطيع النظام عرض المدربين المتاحين لمواعيد العمل التي تختار البحث عنها (داخل فترة ومساحة وقت محددة).
    </div> 
        
        <div ng-app="app" ng-controller="controller" class="ng-scope">
            <dismissible-hint name="instructors.allocation.availability" class="ng-isolate-scope">
    <!-- ngIf: visible --><div ng-if="visible" class="dismissibleHint  d-flex flex-gap-15 align-items-center justify-content-between">
        <div class="d-flex flex-gap-20 align-items-center flex-grow-1">
            <!-- ngIf: icon || img --><div ng-if="icon || img" class="iconHolder hidden-xs ng-scope">
                <!-- ngIf: img -->
                <!-- ngIf: icon --><span ng-if="icon" class="ms icon ng-binding ng-scope">info</span><!-- end ngIf: icon -->
            </div><!-- end ngIf: icon || img -->

            <div class="content flex-grow-1">
                <ng-transclude>
                هنا يمكنك البحث عن المدربين المتوفرين والمتاحين خلال فترة زمنية محددة لتقديم نشاط او دورة محددة. 
		لهذا التقرير ان يعمل وان يكون دقيق لابد من تحديد جدول مواعيد عمل المدربين وايضاً المهمة او المهام المعينة لكل مدرب. دون هذه المعلومات لن يكون هناك عائد حقيقي من البحث عن المدربين لغرض معين.
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
        <form name="filtersForm" class="col-sm-12 ng-pristine ng-valid ng-valid-required">
            <div class="block style2">

                <div class="block-body">
                    <div class="row">
                                                    <div class="col-sm-12 col-md-3">
                                <div class="form-group mb-0">
                                    <label>نوع المواعيد المستهدف *</label>
                                    <popover content="عرض مواعيد المخصصة لنوع معين من المهام (التدريب او إختبارات تحديد المستوى الشفوية، ...)" class="ng-isolate-scope"><i uib-popover="عرض مواعيد المخصصة لنوع معين من المهام (التدريب او إختبارات تحديد المستوى الشفوية، ...)" popover-title="" popover-trigger="'mouseenter'" popover-placement="" class="popover-hint fa fa-question-circle"></i></popover>
                                    <select ng-model="report.params.params.type" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty">
                                                                                    <option ng-value="'lectures'" value="string:lectures" selected="selected">محاضرات</option>
                                                                                    <option ng-value="'placement-tests'" value="string:placement-tests">إختبارات تحديد مستوى (شفوية)</option>
                                                                            </select>
                                </div>
                            </div>
                        
                        
                        <div class="col-sm-12 col-md-2">
                            <div class="form-group mb-0">
                                <b>المدربين *</b>
                                <div class="mt-5">
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

                        <div class="col-sm-12 col-md-3">
                            <div class="form-group">
                                <label>المدة الزمنية (من - إلى) *</label>
                                <div class="d-flex flex-gap-15 align-items-center">
                                    <div class="flex-grow-1" style="max-width: 50%">
                                        <input ng-model="report.params.params.fromDate" type="date" class="form-control w-100 ng-pristine ng-untouched ng-valid ng-not-empty ng-valid-required" required="">
                                    </div>
                                    <div class="flex-grow-1 pe-15" style="max-width: 50%">
                                        <input ng-model="report.params.params.toDate" type="date" class="form-control w-100 ng-pristine ng-untouched ng-valid ng-not-empty ng-valid-required" required="">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-0 mt-10">
                                <label>الأيام</label>
                                <popover content="إختر الأيام المطلوبة للبحث هنها داخل المدة الزمنية الحددة" class="ng-isolate-scope"><i uib-popover="إختر الأيام المطلوبة للبحث هنها داخل المدة الزمنية الحددة" popover-title="" popover-trigger="'mouseenter'" popover-placement="" class="popover-hint fa fa-question-circle"></i></popover>
                                <div>
                                                                            <div class="checkbox-inline">
                                            <label>
                                                <input checklist-value="'sat'" type="checkbox" ng-model="checked" class="ng-scope ng-pristine ng-untouched ng-valid ng-empty" checklist-model="report.params.params.days"> السبت
                                            </label>
                                        </div>
                                                                            <div class="checkbox-inline">
                                            <label>
                                                <input checklist-value="'sun'" type="checkbox" ng-model="checked" class="ng-scope ng-pristine ng-untouched ng-valid ng-empty" checklist-model="report.params.params.days"> الأحد
                                            </label>
                                        </div>
                                                                            <div class="checkbox-inline">
                                            <label>
                                                <input checklist-value="'mon'" type="checkbox" ng-model="checked" class="ng-scope ng-pristine ng-untouched ng-valid ng-empty" checklist-model="report.params.params.days"> الأثنين
                                            </label>
                                        </div>
                                                                            <div class="checkbox-inline">
                                            <label>
                                                <input checklist-value="'tue'" type="checkbox" ng-model="checked" class="ng-scope ng-pristine ng-untouched ng-valid ng-empty" checklist-model="report.params.params.days"> الثلاثاء
                                            </label>
                                        </div>
                                                                            <div class="checkbox-inline">
                                            <label>
                                                <input checklist-value="'wed'" type="checkbox" ng-model="checked" class="ng-scope ng-pristine ng-untouched ng-valid ng-empty" checklist-model="report.params.params.days"> الأربعاء
                                            </label>
                                        </div>
                                                                            <div class="checkbox-inline">
                                            <label>
                                                <input checklist-value="'thu'" type="checkbox" ng-model="checked" class="ng-scope ng-pristine ng-untouched ng-valid ng-empty" checklist-model="report.params.params.days"> الخميس
                                            </label>
                                        </div>
                                                                            <div class="checkbox-inline">
                                            <label>
                                                <input checklist-value="'fri'" type="checkbox" ng-model="checked" class="ng-scope ng-pristine ng-untouched ng-valid ng-empty" checklist-model="report.params.params.days"> الجمعة
                                            </label>
                                        </div>
                                                                    </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-3">
                            <div class="form-group mb-0">
                                <label>داخل الوقت (من - إلى)</label>
                                <popover content="عرض المواعيد المتاحة خلال مساحة زمنية محددة داخل الأيام والفترة المختارة" class="ng-isolate-scope"><i uib-popover="عرض المواعيد المتاحة خلال مساحة زمنية محددة داخل الأيام والفترة المختارة" popover-title="" popover-trigger="'mouseenter'" popover-placement="" class="popover-hint fa fa-question-circle"></i></popover>
                                <div class="d-flex flex-gap-15 align-items-center">
                                    <div class="flex-grow-1" style="max-width: 50%">
                                        <input ng-model="report.params.params.fromTime" type="time" class="form-control w-100 ng-pristine ng-untouched ng-valid ng-empty">
                                    </div>
                                    <div class="flex-grow-1 pe-15" style="max-width: 50%">
                                        <input ng-model="report.params.params.toTime" type="time" class="form-control w-100 ng-pristine ng-untouched ng-valid ng-empty">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="block-footer">
                    <button ng-click="report.generate()" ng-disabled="filtersForm.$invalid || !report.params.params.instructorFilter.enabled" disable-on-ajax="" class="btn btn-primary disabled" disabled="disabled">
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
