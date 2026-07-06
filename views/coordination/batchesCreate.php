<?php
// إعداد المتغيرات
$pageTitle = 'بدء مجموعة جديدة';
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
            <i class="icon fa fa-users"></i>
            <span class="title">المجموعات</span>

                            
                <ul class="breadcrumb inline" style="margin: 0">
                    <li class="breadcrumb-item"></li>

                                            <li class="breadcrumb-item">بدء مجموعة تدريبية جديدة</li>
                                    </ul>
                    </div>

        <div class="d-flex justify-content-center">
            <div>
                        <a href="/batches/bulkCreate" class="btn btn-info">
            <i class="fa fa-bars"></i> إضافة متعددة        </a>
    
                            </div>
        </div>
    </div>
        
                    <div ng-app="newBatch" ng-controller="main" class="ng-scope">
                
                <dismissible-hint name="batches.create" icon="'group_add'" class="ng-isolate-scope">
    <!-- ngIf: visible --><div ng-if="visible" class="dismissibleHint  d-flex flex-gap-15 align-items-center justify-content-between">
        <div class="d-flex flex-gap-20 align-items-center flex-grow-1">
            <!-- ngIf: icon || img --><div ng-if="icon || img" class="iconHolder hidden-xs ng-scope">
                <!-- ngIf: img -->
                <!-- ngIf: icon --><span ng-if="icon" class="ms icon ng-binding ng-scope">group_add</span><!-- end ngIf: icon -->
            </div><!-- end ngIf: icon || img -->

            <div class="content flex-grow-1">
                <ng-transclude>
                    من هنا يمكنك تسجيل بدء مجموعة تدريبية جديدة. "المجموعة التدريبية" هي مجموعة من العملاء المسجلين
		على النظام والذين طلبو أو تم اختيارهم للحصول على دورة تدريبية جديدة. إبدأ باختيار هذه الدورة التدريبية، ثم قم
		 بتحديد معلومات وإعدادات المجموعة، مثل المدربين والتكلفة، ويمكنك إيضاً تحديد قائمة المتدربين.                </ng-transclude>
            </div>
        </div>

        <div>
            <!-- ngIf: dismissible --><button ng-click="dismiss()" ng-if="dismissible" class="close ng-scope" type="button">
                <span>×</span>
            </button><!-- end ngIf: dismissible -->
        </div>
    </div><!-- end ngIf: visible --></dismissible-hint>

                
                <!-- ngIf: !courses.picker.loaded -->

                
                <form ng-show="courses.picker.loaded" name="newBatchForm" accept-charset="utf-8" class="ng-pristine ng-valid ng-valid-required">
                    
                    <!-- ngIf: errors -->

                    <div class="form-horizontal margin-top-50">
                        <div class="row">
                            <div class="control-label col-xs-12 col-sm-12 col-md-4">
                                <label>الدورة</label>
                            </div>
                            <div class="form-group col-xs-12 col-sm-12 col-md-4">
                                <course-menu setup="courses.picker.setup" api="courses.picker.api" class="ng-isolate-scope"><div class="course-menu ng-scope">
        
        <!-- ngIf: !data.courses.length -->

        
        <div ng-show="data.courses.length &gt; 0" ng-switch="searchMode">
            <!-- ngSwitchWhen: false --><div ng-switch-when="false" class="input-group ng-scope">
                <select ng-model="$parent.selected" ng-required="setup.required" ng-disabled="disabled" class="form-control has-groups ng-pristine ng-untouched ng-valid ng-empty ng-valid-required">
                    <option value="" selected="selected">&nbsp;</option>

                    <!-- ngRepeat: category in data.categories --><optgroup ng-repeat="category in data.categories" label="[ Business Development ]" class="ng-scope">
                        <!-- ngRepeat: course in getCategoryCourses(category) --><option ng-repeat="course in getCategoryCourses(category)" ng-value="course" class="ng-binding ng-scope" value="object:20">
                            Digital Marketing Strateg ... (BUS-DIG-MARK)
                        </option><!-- end ngRepeat: course in getCategoryCourses(category) --><option ng-repeat="course in getCategoryCourses(category)" ng-value="course" class="ng-binding ng-scope" value="object:21">
                            Business Planning and Str ... (BUS-PLN-STR)
                        </option><!-- end ngRepeat: course in getCategoryCourses(category) -->
                    </optgroup><!-- end ngRepeat: category in data.categories --><optgroup ng-repeat="category in data.categories" label="[ General English ]" class="ng-scope">
                        <!-- ngRepeat: course in getCategoryCourses(category) --><option ng-repeat="course in getCategoryCourses(category)" ng-value="course" class="ng-binding ng-scope" value="object:24">
                            General English - Level 1 (GEN-1)
                        </option><!-- end ngRepeat: course in getCategoryCourses(category) --><option ng-repeat="course in getCategoryCourses(category)" ng-value="course" class="ng-binding ng-scope" value="object:25">
                            General English - Level 2 (GEN-2)
                        </option><!-- end ngRepeat: course in getCategoryCourses(category) --><option ng-repeat="course in getCategoryCourses(category)" ng-value="course" class="ng-binding ng-scope" value="object:26">
                            General English - Level 3 (GEN-3)
                        </option><!-- end ngRepeat: course in getCategoryCourses(category) -->
                    </optgroup><!-- end ngRepeat: category in data.categories --><optgroup ng-repeat="category in data.categories" label="[ Web Development ]" class="ng-scope">
                        <!-- ngRepeat: course in getCategoryCourses(category) --><option ng-repeat="course in getCategoryCourses(category)" ng-value="course" class="ng-binding ng-scope" value="object:30">
                            User Experience Basics (WEB-UX)
                        </option><!-- end ngRepeat: course in getCategoryCourses(category) --><option ng-repeat="course in getCategoryCourses(category)" ng-value="course" class="ng-binding ng-scope" value="object:31">
                            JavaScript Basics (WEB-JS)
                        </option><!-- end ngRepeat: course in getCategoryCourses(category) -->
                    </optgroup><!-- end ngRepeat: category in data.categories -->
                </select>

                <div class="input-group-btn">
                    <button ng-click="toggleSearch()" type="button" class="btn btn-default icon-only">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div><!-- end ngSwitchWhen: -->

            <!-- ngSwitchWhen: true -->
        </div>
    </div></course-menu>
                            </div>
                        </div>
                    </div>

                    
                    <!-- ngIf: courses.selected && !courses.loaded -->

                    
                    <!-- ngIf: courses.loaded -->

                    <div class="row form-horizontal">
                        <div class="control-label col-xs-12 col-sm-12 col-md-5"></div>
                        <div class="form-group col-xs-12 col-sm-12 col-md-6">
                            <button ng-disabled="! courses.loaded || newBatchForm.$invalid || !isValid() || $root.ajaxRequestInProgress" ng-click="submit()" type="submit" class="btn btn-lg btn-success" disabled="disabled">
                                <i class="fa fa-check-circle"></i> بدء المجموعة الجديدة                            </button>
                        </div>
                    </div>
                </form>
            </div>
        
            </div>
</div>

<?php
// تضمين footer template
include_once __DIR__ . '/../templates/footer.php';
?>
