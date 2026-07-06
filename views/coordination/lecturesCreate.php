<?php
// إعداد المتغيرات
$pageTitle = 'إضافة محاضرة جديدة';
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
            <i class="icon fa fa-calendar"></i>
            <span class="title">المحاضرات</span>

                            
                <ul class="breadcrumb inline" style="margin: 0">
                    <li class="breadcrumb-item"></li>

                                            <li class="breadcrumb-item">إضافة محاضرات جديدة</li>
                                    </ul>
                    </div>

        <div class="d-flex justify-content-center">
            <div>
                            
                            </div>
        </div>
    </div>
                    <div ng-app="app" ng-controller="controller" class="ng-scope">
                <dismissible-hint name="lectures.create" class="ng-isolate-scope">
    <!-- ngIf: visible --><div ng-if="visible" class="dismissibleHint  d-flex flex-gap-15 align-items-center justify-content-between">
        <div class="d-flex flex-gap-20 align-items-center flex-grow-1">
            <!-- ngIf: icon || img --><div ng-if="icon || img" class="iconHolder hidden-xs ng-scope">
                <!-- ngIf: img -->
                <!-- ngIf: icon --><span ng-if="icon" class="ms icon ng-binding ng-scope">info</span><!-- end ngIf: icon -->
            </div><!-- end ngIf: icon || img -->

            <div class="content flex-grow-1">
                <ng-transclude>
                    من هنا يمكنك إضافة محاضرات جميع المجموعات التدريبية. سواء تمت بالفعل او ستتم الآن او لاحقاً. كما يمكنك ايضاً إضافة اي جلسات جانبية لطلاب محددين او مجموعات صغيرة.
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
                    <div class="col-xs-12 col-sm-12 col-md-7 form-horizontal">
                        <div class="row">
        <div class="control-label col-xs-12 col-sm-12 col-md-3">
            <label>المجموعة</label>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-5">
            <div class="form-group">
                <div class="d-flex flex-gap-15 flex-align-items-center">
                    <div class="flex-grow-1">
                        <select ng-model="lectures.batch" ng-options="b as b.name for b in data.batches track by b.id" class="form-control ng-pristine ng-untouched ng-valid ng-empty"><option value="?" selected="selected"></option><option label="General English - Level 1 #1" value="1">General English - Level 1 #1</option></select>
                    </div>
                    <div ng-show="lectures.batch" class="ng-hide">
                        <a as-popup="" uib-tooltip="فتح" class="btn btn-default icon-only ng-isolate-scope" target="_blank">
                            <i class="fa fa-window-maximize"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="control-label col-xs-12 col-sm-12 col-md-3">
            <label>اريد</label>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-8">
            <div class="form-group margin-bottom-0">
                <div class="radio-inline">
                    <label>
                        <input ng-model="lectures.multiple" ng-value="true" type="radio" class="ng-pristine ng-untouched ng-valid ng-not-empty" name="5" value="true">
                        إضافة عدة محاضرات
                    </label>
                </div>

                <div class="radio-inline">
                    <label>
                        <input ng-model="lectures.multiple" ng-value="false" type="radio" class="ng-pristine ng-untouched ng-valid ng-not-empty" name="6" value="false">
                        إضافة محاضرة واحدة
                    </label>
                </div>
            </div>
        </div>
    </div>

    <!-- ngIf: lectures.batch.side_sessions_enabled -->

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-10 text-center">
            <div class="section-separator"></div>
        </div>
    </div>

    <div class="row">
        <div class="control-label col-xs-12 col-sm-12 col-md-3">
            <label>
                المدرب
                <popover content="المدربين المعينين حالياً لهذه المجموعة التدريبية" class="ng-isolate-scope"><i uib-popover="المدربين المعينين حالياً لهذه المجموعة التدريبية" popover-title="" popover-trigger="'mouseenter'" popover-placement="" class="popover-hint fa fa-question-circle"></i></popover>
            </label>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-5">
            <div class="form-group">
                <div class="d-flex flex-gap-15">
                    <div class="flex-grow-1">
                        <select ng-model="lectures.instructor" disable-on-ajax="" ng-disabled="! lectures.batch" ng-options="i as i.name for i in lectures.batch.instructors track by i.id" class="form-control ng-pristine ng-untouched ng-valid disabled ng-empty" disabled="disabled"><option value="?" selected="selected"></option></select>
                    </div>

                    <div>
                        <!-- ngIf: lectures.instructor -->

                        <a href="/instructors?add" target="_blank" uib-tooltip="ضافة مدرب جديد لهذه المجموعة" class="btn btn-default">
                            <i class="fa fa-plus-circle m-0"></i>
                        </a>
                    </div>
                </div>

                <!-- ngIf: lectures.batch.instructors.length == 0 -->
            </div>
        </div>
    </div>

    <div class="row">
        <div class="control-label col-xs-12 col-sm-12 col-md-3">
            <label>
                <span>مكان التدريب</span>
                <popover content="القاعة في حال ان التدريب داخل القاعات، او بيئة التعليم الإفتراضية في حال ان التدريب عبر الإنترنت" class="ng-isolate-scope"><i uib-popover="القاعة في حال ان التدريب داخل القاعات، او بيئة التعليم الإفتراضية في حال ان التدريب عبر الإنترنت" popover-title="" popover-trigger="'mouseenter'" popover-placement="" class="popover-hint fa fa-question-circle"></i></popover>
            </label>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-5">
            <div class="form-group margin-bottom-0">
                <select ng-model="lectures.lab" disable-on-ajax="" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty">
                    <!--
                    <optgroup ng-if="lectures.batch.is_virtual || lectures.batch.is_virtual === null || lectures.batch.is_hybrid" -->
                    <optgroup label="اونلاين">
                        <!-- ngRepeat: (p, name) in data.vcProviders track by $index --><option ng-repeat="(p, name) in data.vcProviders track by $index" ng-value="p" class="ng-binding ng-scope" value="string:zoom" selected="selected">
                            عبر Zoom</option><!-- end ngRepeat: (p, name) in data.vcProviders track by $index --><option ng-repeat="(p, name) in data.vcProviders track by $index" ng-value="p" class="ng-binding ng-scope" value="string:teams">
                            عبر Microsoft Teams</option><!-- end ngRepeat: (p, name) in data.vcProviders track by $index --><option ng-repeat="(p, name) in data.vcProviders track by $index" ng-value="p" class="ng-binding ng-scope" value="string:onmeeting">
                            عبر OnMeeting</option><!-- end ngRepeat: (p, name) in data.vcProviders track by $index --><option ng-repeat="(p, name) in data.vcProviders track by $index" ng-value="p" class="ng-binding ng-scope" value="string:vcmanual">
                            عبر روابط ثابتة يدوية</option><!-- end ngRepeat: (p, name) in data.vcProviders track by $index -->
                    </optgroup>

                    <!-- ngIf: lectures.batch.is_offline || lectures.batch.is_offline === null || lectures.batch.is_hybrid -->
                </select>

                            </div>

            <!-- ngIf: !! lectures.batch && lectures.lab === 'zoom' -->
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-10 text-center">
        	<div class="section-separator"></div>
        </div>
    </div>

    <div ng-show="lectures.multiple">
        <div class="row">
        <div class="control-label col-xs-12 col-sm-12 col-md-3">
            <label>الأيام</label>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                                    <div class="checkbox-inline">
                        <label class="text-normal-weight">
                            <input ng-model="multiple.days.Sat" type="checkbox" class="ng-pristine ng-untouched ng-valid ng-empty"> السبت
                        </label>
                    </div>
                                    <div class="checkbox-inline">
                        <label class="text-normal-weight">
                            <input ng-model="multiple.days.Sun" type="checkbox" class="ng-pristine ng-untouched ng-valid ng-empty"> الأحد
                        </label>
                    </div>
                                    <div class="checkbox-inline">
                        <label class="text-normal-weight">
                            <input ng-model="multiple.days.Mon" type="checkbox" class="ng-pristine ng-untouched ng-valid ng-empty"> الأثنين
                        </label>
                    </div>
                                    <div class="checkbox-inline">
                        <label class="text-normal-weight">
                            <input ng-model="multiple.days.Tue" type="checkbox" class="ng-pristine ng-untouched ng-valid ng-empty"> الثلاثاء
                        </label>
                    </div>
                                    <div class="checkbox-inline">
                        <label class="text-normal-weight">
                            <input ng-model="multiple.days.Wed" type="checkbox" class="ng-pristine ng-untouched ng-valid ng-empty"> الأربعاء
                        </label>
                    </div>
                                    <div class="checkbox-inline">
                        <label class="text-normal-weight">
                            <input ng-model="multiple.days.Thu" type="checkbox" class="ng-pristine ng-untouched ng-valid ng-empty"> الخميس
                        </label>
                    </div>
                                    <div class="checkbox-inline">
                        <label class="text-normal-weight">
                            <input ng-model="multiple.days.Fri" type="checkbox" class="ng-pristine ng-untouched ng-valid ng-empty"> الجمعة
                        </label>
                    </div>
                            </div>
        </div>
    </div>

    <div class="row">
        <div class="control-label col-xs-12 col-sm-12 col-md-3">
            <label>تبدأ في</label>
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-9">
            <div class="d-flex flex-gap-15 align-items-center">
                <div>
                    <input ng-model="multiple.startTime" type="time" class="form-control ng-pristine ng-untouched ng-valid ng-empty">
                </div>

                <div>
                    <label class="text-normal-weight">المدة</label>
                </div>

                <div>
                    <duration-picker duration="multiple.duration" options="{'smallInputs': false}" class="ng-isolate-scope">
    <div class="duration-picker flex">
        <input ng-model="hours" ng-change="onHoursChange()" ng-class="{'input-sm': options.smallInputs}" uib-tooltip="عدد الساعات" class="hours form-control inline-block ng-pristine ng-untouched ng-valid ng-not-empty ng-valid-min ng-valid-max ng-valid-step" placeholder="الساعات" type="number" min="0" step="1" max="20" dir="ltr">

        <input ng-model="minutes" ng-change="onMinuteChange()" ng-class="{'input-sm': options.smallInputs}" uib-tooltip="الدقائق الإضافية فوق الساعات" class="minutes form-control inline-block ng-pristine ng-untouched ng-valid ng-not-empty ng-valid-min ng-valid-max" placeholder="الدقائق" type="number" min="0" max="60" dir="ltr">
    </div></duration-picker>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
    </div>

    <div class="row">
        <div class="control-label col-xs-12 col-sm-12 col-md-3">
            <label>بين التاريخين</label>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-8">
            <div class="form-group flex flex-align-items-center flex-margin-items-10">
                <div ng-class="{'has-error': ! multiple.datesAreValid()}">
                    <input ng-model="multiple.startDate" ng-change="calendar.load()" type="date" class="form-control ng-pristine ng-untouched ng-valid ng-empty">
                </div>
                <div>
                    <i class="fa fa-long-arrow-left margin-0"></i>
                </div>
                <div ng-class="{'has-error': ! multiple.datesAreValid()}">
                    <input ng-model="multiple.endDate" ng-change="calendar.load()" type="date" class="form-control ng-pristine ng-untouched ng-valid ng-empty">
                </div>

                <div>
                    <div class="dropdown">
                        <button type="button" disable-on-ajax="" class="btn btn-default dropdown-toggle icon-only" data-toggle="dropdown">
                            <i class="fa fa-calendar"></i>
                        </button>

                        <ul class="dropdown-menu">
                            <!-- ngRepeat: (s, suggestion) in multiple.dateRange.getRanges() --><li ng-repeat="(s, suggestion) in multiple.dateRange.getRanges()" class="ng-scope">
                                <a ng-click="multiple.dateRange.applyRange(s)" class="dropdown-item ng-binding" href="">
                                    <i class="fa fa-calendar-o"></i> هذا الإسبوع
                                </a>
                            </li><!-- end ngRepeat: (s, suggestion) in multiple.dateRange.getRanges() --><li ng-repeat="(s, suggestion) in multiple.dateRange.getRanges()" class="ng-scope">
                                <a ng-click="multiple.dateRange.applyRange(s)" class="dropdown-item ng-binding" href="">
                                    <i class="fa fa-calendar-o"></i> من اليوم حتى نهاية الأسبوع
                                </a>
                            </li><!-- end ngRepeat: (s, suggestion) in multiple.dateRange.getRanges() --><li ng-repeat="(s, suggestion) in multiple.dateRange.getRanges()" class="ng-scope">
                                <a ng-click="multiple.dateRange.applyRange(s)" class="dropdown-item ng-binding" href="">
                                    <i class="fa fa-calendar-o"></i> الأسبوع القادم
                                </a>
                            </li><!-- end ngRepeat: (s, suggestion) in multiple.dateRange.getRanges() --><li ng-repeat="(s, suggestion) in multiple.dateRange.getRanges()" class="ng-scope">
                                <a ng-click="multiple.dateRange.applyRange(s)" class="dropdown-item ng-binding" href="">
                                    <i class="fa fa-calendar-o"></i> هذا الشهر
                                </a>
                            </li><!-- end ngRepeat: (s, suggestion) in multiple.dateRange.getRanges() --><li ng-repeat="(s, suggestion) in multiple.dateRange.getRanges()" class="ng-scope">
                                <a ng-click="multiple.dateRange.applyRange(s)" class="dropdown-item ng-binding" href="">
                                    <i class="fa fa-calendar-o"></i> من اليوم حتى نهاية الشهر
                                </a>
                            </li><!-- end ngRepeat: (s, suggestion) in multiple.dateRange.getRanges() --><li ng-repeat="(s, suggestion) in multiple.dateRange.getRanges()" class="ng-scope">
                                <a ng-click="multiple.dateRange.applyRange(s)" class="dropdown-item ng-binding" href="">
                                    <i class="fa fa-calendar-o"></i> الشهر القادم
                                </a>
                            </li><!-- end ngRepeat: (s, suggestion) in multiple.dateRange.getRanges() --><li ng-repeat="(s, suggestion) in multiple.dateRange.getRanges()" class="ng-scope">
                                <a ng-click="multiple.dateRange.applyRange(s)" class="dropdown-item ng-binding" href="">
                                    <i class="fa fa-calendar-o"></i> الشهر والنصف القادمين
                                </a>
                            </li><!-- end ngRepeat: (s, suggestion) in multiple.dateRange.getRanges() -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div ng-show="! lectures.multiple" class="ng-hide">
        <div class="row">
        <div class="control-label col-xs-12 col-sm-12 col-md-3">
            <label>التاريخ والوقت</label>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4">
            <div ng-class="{'has-error': ! single.datesAreValid()}" class="form-group">
                <input ng-model="single.start" ng-change="single.onStartChange(); calendar.load()" type="datetime-local" class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" required="">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="control-label col-xs-12 col-sm-12 col-md-3">
            <label>تنتهي في</label>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4">
            <div ng-class="{'has-error': ! single.datesAreValid()}" class="form-group margin-bottom-0">
                <input ng-model="single.end" ng-change="single.onEndChange(); calendar.load()" type="datetime-local" class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" required="">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="control-label col-xs-12 col-sm-12 col-md-3">
            <label>المدة</label>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4">
            <div class="form-group padding-top-10">
                <b class="ng-binding">--</b>
            </div>
        </div>
    </div>    </div>                    </div>

                    <!--
                    <div ng-if="!! lectures.batch" class="col-xs-12 col-sm-12 col-md-5">
                        <div id="calendar" ng-class="{'fullscreen': calendar.fullscreen}" class="block style2">
    	<div class="block-title">
            <i class="icon fa fa-calendar"></i>
    		<span class="title">الجدول الحالي للمحاضرات</span>
            <popover content="المحاضرات الموجودة بالفعل في التاريخ او التواريخ التي تريد التسجيل فيها. إستخدم هذا الجدول لإختيار وضبط مواعيد المحاضرات الجديدة"></popover>

            <div ng-if="calendar.canBeLoaded()" class="side">
                <button ng-click="calendar.load(true)" class="btn btn-xs btn-default icon-only">
                    <i class="fa fa-refresh"></i>
                </button>
                <button ng-click="calendar.toggleFullScreen()" class="btn btn-xs btn-default icon-only">
                    <i class="fa fa-window-maximize"></i>
                </button>
            </div>
    	</div>
    	<div class="block-body" style="height: 350px; overflow: auto; padding: 0 !important;">
            <div ng-if="! calendar.canBeLoaded()" class="text-muted padding-15">
                <i class="fa fa-info-circle"></i>
                إختر التاريخ او التواريخ للمحاضرات الجديدة لعرض جدول محاضرات هذه الفترة.
            </div>

            <loading-indicator ng-if="calendar.loading"></loading-indicator>
            <div ng-if="! calendar.loading" bind-html-compile="calendar.calendar"></div>
    	</div>
    </div>                    </div>
                    -->
                </div>

                <!-- ngIf: !! lectures.batch -->

                <!-- ngIf: !! lectures.batch -->

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 text-center">
                        <div class="section-separator"></div>
                    </div>
                </div>

                <!-- ngIf: !! lectures.batch && lectures.sideSessions -->

                <div class="row margin-top-10">
                    <div class="col-xs-12 col-sm-6 text-center">
                        <button ng-click="create()" ng-disabled="! draft.isReady()" disable-on-ajax="" class="btn btn-primary disabled" disabled="disabled">
                            <i class="fa fa-check"></i>
                            إضافة المحاضرات الجديدة
                        </button>
                    </div>
                </div>
            </div>
                    </div>
</div>

<?php
// تضمين footer template
include_once __DIR__ . '/../templates/footer.php';
?>

