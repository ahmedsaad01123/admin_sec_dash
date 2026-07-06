<?php
// إعداد المتغيرات
$pageTitle = 'المصروفات المالية للمجموعات';
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

                    </div>

        <div class="d-flex justify-content-center">
            <div>
                        <a href="/batches/create" class="btn btn-primary">
            <i class="fa fa-plus-circle"></i> بدء مجموعة جديدة
        </a>
        <a href="/batches/bulkCreate" class="btn btn-default">
            <i class="fa fa-plus-square-o"></i> إضافة متعددة
        </a>
    
                            </div>
        </div>
    </div>
        
        <div ng-app="app" ng-controller="controller" class="ng-scope">
            <dismissible-hint name="batches.all" class="ng-isolate-scope">
    <!-- ngIf: visible --><div ng-if="visible" class="dismissibleHint  d-flex flex-gap-15 align-items-center justify-content-between">
        <div class="d-flex flex-gap-20 align-items-center flex-grow-1">
            <!-- ngIf: icon || img --><div ng-if="icon || img" class="iconHolder hidden-xs ng-scope">
                <!-- ngIf: img -->
                <!-- ngIf: icon --><span ng-if="icon" class="ms icon ng-binding ng-scope">info</span><!-- end ngIf: icon -->
            </div><!-- end ngIf: icon || img -->

            <div class="content flex-grow-1">
                <ng-transclude>
                "المجموعات" هي مجموعات المتدربين الذين تم اختيارهم أو طلبوا الحصول على "دورة تدريبية" معينة. كل دورة
تدريبية يكون اسفلها أكثر من مجموعة، وكل مجموعة تتكون من متدربين. لكل مجموعة تدريبية "الملف" الخاص بها،
 داخل هذا الملف ستجد كافة المعلومات والخيارات الخاصة بها.
لبدء مجموعات تدريبية جديدة تحتاج لإضافة الدورات والمدربين اولاً.
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
                    <!--Filters -->
                    <div id="filters-wrapper" class="col-xs-12 col-sm-12 col-md-3">
                        <div id="batches-filters" class="block style2">
    	<div class="block-body" style="max-height: 900px; overflow-y: auto">

            
            <div class="mb-20">
                <label class="text-strong">
                    الحالة
                </label>
                <div>
                    <div class="btn-group btn-group-sm statuses-filter mt-5">
                        <!-- ngRepeat: s in data.data.statuses track by s.id --><button ng-repeat="s in data.data.statuses track by s.id" ng-click="filters.switchStatus(s)" ng-class="{'btn-primary': (filters.params.status == s.id)}" data-toggle="tooltip" title="المجموعات التدريبية التي ستبدأ او بدأت بالفعل، ولم تنتهي حتى الآن" class="btn ng-binding ng-scope btn-primary">
                            النشطة
                        </button><!-- end ngRepeat: s in data.data.statuses track by s.id --><button ng-repeat="s in data.data.statuses track by s.id" ng-click="filters.switchStatus(s)" ng-class="{'btn-primary': (filters.params.status == s.id)}" data-toggle="tooltip" title="المجموعات المنتهية" class="btn ng-binding ng-scope">
                            المنتهية
                        </button><!-- end ngRepeat: s in data.data.statuses track by s.id --><button ng-repeat="s in data.data.statuses track by s.id" ng-click="filters.switchStatus(s)" ng-class="{'btn-primary': (filters.params.status == s.id)}" data-toggle="tooltip" title="جميع المجموعات، سواء بدأت او نشطة او إنتهت بالفعل" class="btn ng-binding ng-scope">
                            الكل
                        </button><!-- end ngRepeat: s in data.data.statuses track by s.id -->
                    </div>
                </div>
            </div>

            <div class="mb-20">
                <label class="text-strong">
                    التقدم
                </label>
                <div>
                    <div class="btn-group btn-group-sm statuses-filter mt-5">
                        <!-- ngRepeat: p in data.data.progress track by p.id --><button ng-repeat="p in data.data.progress track by p.id" ng-click="filters.switchProgress(p)" ng-class="{'btn-primary': (filters.params.progress == p.id)}" ng-disabled="filters.params.status != 'active'" data-toggle="tooltip" title="لم يبدأ التدريب بعد" class="btn ng-binding ng-scope">
                            لم تبدأ
                        </button><!-- end ngRepeat: p in data.data.progress track by p.id --><button ng-repeat="p in data.data.progress track by p.id" ng-click="filters.switchProgress(p)" ng-class="{'btn-primary': (filters.params.progress == p.id)}" ng-disabled="filters.params.status != 'active'" data-toggle="tooltip" title="بدأت بالفعل ومستمرة" class="btn ng-binding ng-scope">
                            بدأت
                        </button><!-- end ngRepeat: p in data.data.progress track by p.id --><button ng-repeat="p in data.data.progress track by p.id" ng-click="filters.switchProgress(p)" ng-class="{'btn-primary': (filters.params.progress == p.id)}" ng-disabled="filters.params.status != 'active'" data-toggle="tooltip" title="بدأت ولكن قاربت على الإنتهاء" class="btn ng-binding ng-scope">
                            ستنتهي قريباً
                        </button><!-- end ngRepeat: p in data.data.progress track by p.id --><button ng-repeat="p in data.data.progress track by p.id" ng-click="filters.switchProgress(p)" ng-class="{'btn-primary': (filters.params.progress == p.id)}" ng-disabled="filters.params.status != 'active'" data-toggle="tooltip" title="جميع المجموعات" class="btn ng-binding ng-scope btn-primary">
                            الكل
                        </button><!-- end ngRepeat: p in data.data.progress track by p.id -->
                    </div>
                </div>
            </div>

            <!--
            <div class="mb-20">
                <div class="btn-group btn-group-sm">
                    <button ng-repeat="f in data.data.deliveryFormats"
                            ng-click="filters.switchDeliveryFormat(f)"
                            ng-class="{'btn-primary': (filters.params.deliveryFormat == f.id)}"
                            class="btn">
                        {{ f.label }}
                    </button>
                </div>
            </div>
            -->

            <div class="mb-20">
                <div class="checkbox">
                    <label>
                        <input ng-model="filters.params.acceptsNewTrainees" ng-disabled="filters.params.status == 'ended'" ng-change="filters.apply()" type="checkbox" class="ng-pristine ng-untouched ng-valid ng-empty">
                        التي بها مقاعد متاحة فقظ
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input ng-model="filters.params.acceptsSelfEnrollment" ng-disabled="filters.params.status == 'ended'" ng-change="filters.apply()" type="checkbox" class="ng-pristine ng-untouched ng-valid ng-empty">
                        التي تستقبل التسجيل الذاتي فقط
                    </label>
                </div>
            </div>

            
            <div class="mb-20">
                <div class="text-strong margin-bottom-5">
                    الدورة او تصنيف الدورات
                    <popover content="عرض مجموعات دورة محددة، او مجموعات كل الدورات اسفل تصنيف محدد" class="ng-isolate-scope"><i uib-popover="عرض مجموعات دورة محددة، او مجموعات كل الدورات اسفل تصنيف محدد" popover-title="" popover-trigger="'mouseenter'" popover-placement="" class="popover-hint fa fa-question-circle"></i></popover>
                </div>

                <course-picker setup="filters.course.picker.setup" class="ng-isolate-scope"><div ng-class="setup.containerClass" class="widget coursePicker bg-color-body ng-scope bordered no-shadow">
        
        <div ng-show="categories.all.length == 0" class="ng-hide">
            <i class="fa fa-exclamation-triangle"></i>
            ليس هناك دورات تدريبية بعد مسجلة لتختار منها!
        </div>

        
        <div ng-show="categories.all.length &gt; 0">
            
            <div class="form-group margin-bottom-0">
                <label>
                    <!-- ngIf: !! setup.categoryLabel --><span ng-if="!! setup.categoryLabel" class="ng-binding ng-scope">التصنيف</span><!-- end ngIf: !! setup.categoryLabel -->
                    <!-- ngIf: ! setup.categoryLabel -->
                </label>
                <select ng-model="categories.selected.object" ng-change="categories.onSelect()" class="form-control ng-pristine ng-untouched ng-valid ng-empty">
                    <option ng-value="null" value="object:null" selected="selected">&nbsp;</option>
                    <!-- ngRepeat: category in categories.all track by category.id --><option ng-repeat="category in categories.all track by category.id" ng-value="category" class="ng-binding ng-scope" value="object:79">
                        Business Development
                    </option><!-- end ngRepeat: category in categories.all track by category.id --><option ng-repeat="category in categories.all track by category.id" ng-value="category" class="ng-binding ng-scope" value="object:80">
                        General English
                    </option><!-- end ngRepeat: category in categories.all track by category.id --><option ng-repeat="category in categories.all track by category.id" ng-value="category" class="ng-binding ng-scope" value="object:81">
                        Web Development
                    </option><!-- end ngRepeat: category in categories.all track by category.id -->
                </select>
            </div>

            <div ng-show="!! categories.selected.object" class="form-group margin-bottom-0 margin-top-15 ng-hide">
                <label>
                    <!-- ngIf: !! setup.courseLabel --><span ng-if="!! setup.courseLabel" class="ng-binding ng-scope">دورة محددة؟</span><!-- end ngIf: !! setup.courseLabel -->
                    <!-- ngIf: ! setup.courseLabel -->
                    <!-- ngIf: setup.required -->
                </label>

                <div ng-show="categories.selected.object &amp;&amp; courses.inSelectedCategory.length == 0" class="text-danger ng-hide">
                    <i class="fa fa-exclamation-triangle"></i>
                    ليس هناك دورات تدريبية أسفل هذا التصنيف!
                </div>

                <select ng-model="courses.selected.object" ng-hide="categories.selected.object &amp;&amp; courses.inSelectedCategory.length == 0" ng-disabled="!categories.selected.object" ng-change="courses.onSelect()" ng-required="setup.required === true" class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-required" disabled="disabled">
                    <option ng-value="null" value="object:null" selected="selected">&nbsp;</option>
                    <!-- ngRepeat: course in courses.inSelectedCategory track by course.id -->
                </select>
            </div>
        </div>
    </div>
</course-picker>
            </div>

            
            <div class="mb-20">
                <b>المدرب</b>
                <div class="mt-5">
                    <instructor-search-filter ng-model="filters.params.instructorFilter" on-change="filters.apply()" class="ng-pristine ng-untouched ng-valid ng-isolate-scope ng-not-empty">
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

            
            <div class="mb-20">
                <b>الوسوم</b>
                <div class="mt-5">
                    <div class="tags-menu pills align-items-center ng-isolate-scope ng-not-empty ng-valid" type="batches" ng-model="filters.params.tag_ids" setup="{onChange: filters.apply}">
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
            </div>

            
            
            <hr class="dashed">

            <div class="mb-20">
                <b>مواعيد التدريب</b>
                <popover content="مواعيد العمل المختارة للمجموعات التدريبية" class="ng-isolate-scope"><i uib-popover="مواعيد العمل المختارة للمجموعات التدريبية" popover-title="" popover-trigger="'mouseenter'" popover-placement="" class="popover-hint fa fa-question-circle"></i></popover>
                <div class="mt-10">
                    <time-slots-selector ng-model="filters.params.timeOptions" options="filters.timeOptions.options" class="ng-pristine ng-untouched ng-valid ng-isolate-scope ng-not-empty">
    <div class="time-slots-selector">
        <div ng-show="selected.length &gt; 0" class="pills small ng-hide">
            <!-- ngRepeat: slot in selected -->

            <div>
                <button ng-click="openSelector()" class="btn btn-sm ng-binding" type="button">
                    <i class="fa fa-refresh"></i> تغيير
                </button>
            </div>
        </div>

        <button ng-show="! selected.length" ng-click="openSelector()" disable-on-ajax="" ng-icon="clock-o" class="btn btn-default" type="button"><i class="fa fa-clock-o"></i>
            <!-- ngIf: options.multiple --><span ng-if="options.multiple" class="ng-binding ng-scope">إختيار المواعيد</span><!-- end ngIf: options.multiple -->
            <!-- ngIf: ! options.multiple -->
        </button>
    </div>
</time-slots-selector>
                </div>
            </div>

            <div class="mb-20">
                <b>تاريخ البدء</b>
                <popover content="يبحث بتاريخ البدء الفعلي إن وُجد، وإلا بتاريخ البدء المخطط" class="ng-isolate-scope"><i uib-popover="يبحث بتاريخ البدء الفعلي إن وُجد، وإلا بتاريخ البدء المخطط" popover-title="" popover-trigger="'mouseenter'" popover-placement="" class="popover-hint fa fa-question-circle"></i></popover>
                <div class="mt-5">
                    <div class="timeSpanSelectorWidget ng-isolate-scope ng-not-empty ng-valid" ng-model="filters.params.startDate" options="{'acceptEmpty': true, 'span': null}">
        <div ng-show="['fromTo', 'date', 'beforeDate'].indexOf(choices.span) &lt; 0" class="form-group margin-bottom-0">
            <select ng-model="choices.span" ng-options="option.span as option.label for option in data.spans" class="form-control ng-pristine ng-untouched ng-valid ng-empty"><!-- ngIf: options.acceptEmpty === true --><option ng-if="options.acceptEmpty === true" value="" class="" selected="selected">&nbsp;</option><!-- end ngIf: options.acceptEmpty === true --><option label="اليوم" value="string:today">اليوم</option><option label="البارحة" value="string:yesterday">البارحة</option><option label="غداً" value="string:tomorrow">غداً</option><option label="هذا الإسبوع" value="string:thisWeek">هذا الإسبوع</option><option label="الإسبوع السابق" value="string:lastWeek">الإسبوع السابق</option><option label="هذا الشهر" value="string:thisMonth">هذا الشهر</option><option label="الشهر المنقضي" value="string:lastMonth">الشهر المنقضي</option><option label="تاريخ محدد" value="string:date">تاريخ محدد</option><option label="قبل تاريخ" value="string:beforeDate">قبل تاريخ</option><option label="من ... إلى" value="string:fromTo">من ... إلى</option><option label="من البداية" value="string:allTime">من البداية</option></select>
        </div>

        <!-- ngIf: choices.span === 'fromTo' -->

        <!-- ngIf: choices.span === 'date' -->

        <!-- ngIf: choices.span === 'beforeDate' -->
    </div>
                </div>
            </div>

            <div class="mb-20">
                <b>تاريخ الانتهاء</b>
                <popover content="يبحث بتاريخ الانتهاء الفعلي إن وُجد، وإلا بتاريخ الانتهاء المخطط" class="ng-isolate-scope"><i uib-popover="يبحث بتاريخ الانتهاء الفعلي إن وُجد، وإلا بتاريخ الانتهاء المخطط" popover-title="" popover-trigger="'mouseenter'" popover-placement="" class="popover-hint fa fa-question-circle"></i></popover>
                <div class="mt-5">
                    <div class="timeSpanSelectorWidget ng-isolate-scope ng-not-empty ng-valid" ng-model="filters.params.endDate" options="{'acceptEmpty': true, 'span': null}">
        <div ng-show="['fromTo', 'date', 'beforeDate'].indexOf(choices.span) &lt; 0" class="form-group margin-bottom-0">
            <select ng-model="choices.span" ng-options="option.span as option.label for option in data.spans" class="form-control ng-pristine ng-untouched ng-valid ng-empty"><!-- ngIf: options.acceptEmpty === true --><option ng-if="options.acceptEmpty === true" value="" class="" selected="selected">&nbsp;</option><!-- end ngIf: options.acceptEmpty === true --><option label="اليوم" value="string:today">اليوم</option><option label="البارحة" value="string:yesterday">البارحة</option><option label="غداً" value="string:tomorrow">غداً</option><option label="هذا الإسبوع" value="string:thisWeek">هذا الإسبوع</option><option label="الإسبوع السابق" value="string:lastWeek">الإسبوع السابق</option><option label="هذا الشهر" value="string:thisMonth">هذا الشهر</option><option label="الشهر المنقضي" value="string:lastMonth">الشهر المنقضي</option><option label="تاريخ محدد" value="string:date">تاريخ محدد</option><option label="قبل تاريخ" value="string:beforeDate">قبل تاريخ</option><option label="من ... إلى" value="string:fromTo">من ... إلى</option><option label="من البداية" value="string:allTime">من البداية</option></select>
        </div>

        <!-- ngIf: choices.span === 'fromTo' -->

        <!-- ngIf: choices.span === 'date' -->

        <!-- ngIf: choices.span === 'beforeDate' -->
    </div>
                </div>
            </div>

            <hr class="dashed">

            
            <!--
            <div class="mb-20">
                <b>اليوم</b>

                <div class="pills margin-top-10">
                    <div ng-repeat="d in data.data.days track by d.id" ng-click="filters.toggleParamOption('days', d)"
                         ng-class="{'active': filters.paramOptionSelected('days', d)}" class="pill">
                        {{ d.name }}
                    </div>
                </div>
            </div>
            -->

                            <div ng-show="data.data.venues.length &gt; 1">
                    <b>المكان</b>

                    <div class="pills margin-top-10">
                        <!-- ngRepeat: l in data.data.venues track by l.id --><div ng-repeat="l in data.data.venues track by l.id" ng-click="filters.toggleParamOption('venues', l)" ng-class="{'active': filters.paramOptionSelected('venues', l)}" class="pill d-flex flex-gap-5 align-items-center ng-scope">
                            <i class="fa fa-video-camera"></i>
                            <span class="ng-binding">عبر الإنترنت</span>
                        </div><!-- end ngRepeat: l in data.data.venues track by l.id --><div ng-repeat="l in data.data.venues track by l.id" ng-click="filters.toggleParamOption('venues', l)" ng-class="{'active': filters.paramOptionSelected('venues', l)}" class="pill d-flex flex-gap-5 align-items-center ng-scope">
                            <i class="fa fa-building"></i>
                            <span class="ng-binding">Lab A - Main Building</span>
                        </div><!-- end ngRepeat: l in data.data.venues track by l.id --><div ng-repeat="l in data.data.venues track by l.id" ng-click="filters.toggleParamOption('venues', l)" ng-class="{'active': filters.paramOptionSelected('venues', l)}" class="pill d-flex flex-gap-5 align-items-center ng-scope">
                            <i class="fa fa-building"></i>
                            <span class="ng-binding">Lab B - Training Center</span>
                        </div><!-- end ngRepeat: l in data.data.venues track by l.id -->
                    </div>
                </div>
            
            
    	</div>
    </div>                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-9">
                        <!--Month navigation -->
                        <div class="months-navigation mb-15">
                            <ng-tabs tabs="filters.months.months" setup="filters.months.tabsSetup" class="ng-isolate-scope">
    <div class="ng-tabs">
        <ul class="nav nav-tabs">
            <!-- ngRepeat: tab in tabs track by tab.id --><li ng-repeat="tab in tabs track by tab.id" data-id="all" ng-click="select(tab)" disable-on-ajax="" ng-class="{'active': isSelected(tab)}" class="tab ng-scope">

                <a href="" class="title">
                    <!-- ngIf: isSelected(tab) && setup.selectedTabIcon -->
                    <span class="title ng-binding">كل الوقت</span>
                    <!-- ngIf: !! tab.badge -->
                </a>

            </li><!-- end ngRepeat: tab in tabs track by tab.id --><li ng-repeat="tab in tabs track by tab.id" data-id="2025-12" ng-click="select(tab)" disable-on-ajax="" ng-class="{'active': isSelected(tab)}" class="tab ng-scope">

                <a href="" class="title">
                    <!-- ngIf: isSelected(tab) && setup.selectedTabIcon -->
                    <span class="title ng-binding">12/25</span>
                    <!-- ngIf: !! tab.badge -->
                </a>

            </li><!-- end ngRepeat: tab in tabs track by tab.id --><li ng-repeat="tab in tabs track by tab.id" data-id="2026-01" ng-click="select(tab)" disable-on-ajax="" ng-class="{'active': isSelected(tab)}" class="tab ng-scope">

                <a href="" class="title">
                    <!-- ngIf: isSelected(tab) && setup.selectedTabIcon -->
                    <span class="title ng-binding">01/26</span>
                    <!-- ngIf: !! tab.badge -->
                </a>

            </li><!-- end ngRepeat: tab in tabs track by tab.id --><li ng-repeat="tab in tabs track by tab.id" data-id="2026-02" ng-click="select(tab)" disable-on-ajax="" ng-class="{'active': isSelected(tab)}" class="tab ng-scope">

                <a href="" class="title">
                    <!-- ngIf: isSelected(tab) && setup.selectedTabIcon -->
                    <span class="title ng-binding">02/26</span>
                    <!-- ngIf: !! tab.badge -->
                </a>

            </li><!-- end ngRepeat: tab in tabs track by tab.id --><li ng-repeat="tab in tabs track by tab.id" data-id="2026-03" ng-click="select(tab)" disable-on-ajax="" ng-class="{'active': isSelected(tab)}" class="tab ng-scope">

                <a href="" class="title">
                    <!-- ngIf: isSelected(tab) && setup.selectedTabIcon -->
                    <span class="title ng-binding">03/26</span>
                    <!-- ngIf: !! tab.badge -->
                </a>

            </li><!-- end ngRepeat: tab in tabs track by tab.id --><li ng-repeat="tab in tabs track by tab.id" data-id="2026-04" ng-click="select(tab)" disable-on-ajax="" ng-class="{'active': isSelected(tab)}" class="tab ng-scope active">

                <a href="" class="title">
                    <!-- ngIf: isSelected(tab) && setup.selectedTabIcon --><i ng-if="isSelected(tab) &amp;&amp; setup.selectedTabIcon" class="icon fa fa-calendar"></i><!-- end ngIf: isSelected(tab) && setup.selectedTabIcon -->
                    <span class="title ng-binding">04/26</span>
                    <!-- ngIf: !! tab.badge -->
                </a>

            </li><!-- end ngRepeat: tab in tabs track by tab.id --><li ng-repeat="tab in tabs track by tab.id" data-id="2026-05" ng-click="select(tab)" disable-on-ajax="" ng-class="{'active': isSelected(tab)}" class="tab ng-scope">

                <a href="" class="title">
                    <!-- ngIf: isSelected(tab) && setup.selectedTabIcon -->
                    <span class="title ng-binding">05/26</span>
                    <!-- ngIf: !! tab.badge -->
                </a>

            </li><!-- end ngRepeat: tab in tabs track by tab.id --><li ng-repeat="tab in tabs track by tab.id" data-id="2026-06" ng-click="select(tab)" disable-on-ajax="" ng-class="{'active': isSelected(tab)}" class="tab ng-scope">

                <a href="" class="title">
                    <!-- ngIf: isSelected(tab) && setup.selectedTabIcon -->
                    <span class="title ng-binding">06/26</span>
                    <!-- ngIf: !! tab.badge -->
                </a>

            </li><!-- end ngRepeat: tab in tabs track by tab.id --><li ng-repeat="tab in tabs track by tab.id" data-id="2026-07" ng-click="select(tab)" disable-on-ajax="" ng-class="{'active': isSelected(tab)}" class="tab ng-scope">

                <a href="" class="title">
                    <!-- ngIf: isSelected(tab) && setup.selectedTabIcon -->
                    <span class="title ng-binding">07/26</span>
                    <!-- ngIf: !! tab.badge -->
                </a>

            </li><!-- end ngRepeat: tab in tabs track by tab.id --><li ng-repeat="tab in tabs track by tab.id" data-id="2026-08" ng-click="select(tab)" disable-on-ajax="" ng-class="{'active': isSelected(tab)}" class="tab ng-scope">

                <a href="" class="title">
                    <!-- ngIf: isSelected(tab) && setup.selectedTabIcon -->
                    <span class="title ng-binding">08/26</span>
                    <!-- ngIf: !! tab.badge -->
                </a>

            </li><!-- end ngRepeat: tab in tabs track by tab.id -->
        </ul>

        <div ng-show="tabScroll.showControls" class="scroll-controls ng-hide">
            <button ng-click="tabScroll.scrollBackward()" class="btn btn-sm">
                <i class="fa fa-chevron-right m-0"></i>
            </button>

            <button ng-click="tabScroll.scrollForward()" class="btn btn-sm">
                <i class="fa fa-chevron-left m-0"></i>
            </button>
        </div>
    </div></ng-tabs>
                        </div>

                        <!-- ngIf: batches.view === null -->

                        <!-- ngIf: batches.view !== null --><div ng-if="batches.view !== null" bind-html-compile="batches.view" class="ng-scope"><div class="block style2 ng-scope" style="margin-bottom: 25px">
        <div class="block-body">
            <div class="flex flex-space-between flex-gap-15 flex-align-items-center">
                <div class="flex flex-margin-items-10 flex-wrap flex-shrink-1 flex-grow-0">
                    <div>
                        <label class="text-normal-weight">بحث</label>
                        <input ng-model="filters.params.search" ng-model-options="{'debounce': 1000}" ng-change="filters.apply()" type="text" id="text-search-input" style="max-width: 100%" class="form-control input-sm ng-pristine ng-untouched ng-valid ng-empty">
                    </div>
                </div>

                <div class="d-flex flex-gap-20 flex-wrap">
                                            <div class="flex-shrink-0">
                            
                            <form action="/batches/all/export" class="inline-block ng-pristine ng-valid" method="POST" accept-charset="utf-8">
                                <input type="hidden" name="_token" value="6I8KuRvpEnoyRVC225dOQkQoGVsawtWiBQaPkLMj" autocomplete="off">                                <input type="hidden" name="params" ng-value="filters.getParams() | json" autocomplete="off" value="{
  &quot;page&quot;: 1,
  &quot;month&quot;: &quot;2026-04&quot;,
  &quot;status&quot;: &quot;active&quot;,
  &quot;progress&quot;: &quot;any&quot;,
  &quot;deliveryFormat&quot;: &quot;any&quot;,
  &quot;assignedOnly&quot;: false,
  &quot;acceptsNewTrainees&quot;: false,
  &quot;acceptsSelfEnrollment&quot;: false,
  &quot;path&quot;: null,
  &quot;courseCategoryId&quot;: null,
  &quot;courseId&quot;: null,
  &quot;instructorFilter&quot;: {
    &quot;enabled&quot;: false,
    &quot;mode&quot;: &quot;specific&quot;,
    &quot;instructor_ids&quot;: [],
    &quot;branch_ids&quot;: [],
    &quot;employment_types&quot;: [],
    &quot;duties&quot;: [],
    &quot;course_ids&quot;: [],
    &quot;tag_ids&quot;: [],
    &quot;extra_fields&quot;: {}
  },
  &quot;companyId&quot;: null,
  &quot;venues&quot;: [],
  &quot;timeRange&quot;: null,
  &quot;timeOptions&quot;: [],
  &quot;days&quot;: [],
  &quot;assignees&quot;: [],
  &quot;search&quot;: null,
  &quot;startDate&quot;: {
    &quot;span&quot;: null,
    &quot;from&quot;: null,
    &quot;to&quot;: null
  },
  &quot;endDate&quot;: {
    &quot;span&quot;: null,
    &quot;from&quot;: null,
    &quot;to&quot;: null
  },
  &quot;extraInfo&quot;: {},
  &quot;tag_ids&quot;: []
}">
                                <button class="btn btn-xs btn-default">
                                    <i class="fa fa-print"></i> تصدير
                                </button>
                            </form>
                        </div>
                    
                                            <div>
                            <ul class="list-inline small text-muted" style="max-width: 180px;">
                                <li><b>1</b> مجموعة</li>
                                <li><b>1</b> دورة</li>
                                <li><b>10</b> متدرب</li>
                                <li><b>10</b> محاضرة</li>
                            </ul>
                        </div>
                                    </div>

            </div>
        </div>
    </div>


            
                    <div class="pills mb-15 ng-scope">
                                    
                    <a href="" onclick="return scrollToCourse('1')" class="pill">
                        GEN-1
                    </a>
                            </div>
        

                    
            <div id="course-1" class="block style2 margin-bottom-20 ng-scope">
            	<div class="block-title">
                    <div class="d-flex flex-gap-10">
                        <h4 class="title inline-block">
                            <b>General English - Level 1</b>
                        </h4>
                        <div>
                            <span class="text-muted small text-normal-weight">(GEN-1)</span>
                        </div>
                        <div>
                            <a href="/courses/1" class="btn btn-xs btn-link" target="_blank">
                                <i class="fa fa-external-link"></i>
                            </a>
                        </div>
                    </div>

                    <div class="side small">
                        <ul class="list-inline">
                            <li>
                                <b>1</b>
                                مجموعة
                            </li>

                                                            <li><b>30</b> ساعة\ساعات</li>
                            
                            <li><b>0</b> بالإنتظار</li>
                        </ul>
                    </div>
            	</div>
            	<div class="block-body">
                    <div id="batches-grid" class="d-flex flex-wrap flex-gap-15">
                    <div class="block style2 batch batch-status-active">
                <div class="block-body">

                    
                    <div class="flags">
                        
                                                    <i data-toggle="tooltip" title="تستقبل متدربين جدد" class="flag fa fa-user-plus text-success"></i>
                        
                                            </div>

                    <div class="flex flex-space-between">
                        <div>
                            <a href="/batches/1" class="text-underlined batch-name">General English - Level 1 #1</a>
                        </div>

                        <div>
                            <div class="dropdown">
                                <button class="btn btn-xs dropdown-toggle" type="button" data-toggle="dropdown">
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-left">
                                    <li class="bg-success">
                                        <a href="" ng-click="batches.enrollTrainees(1)">
                                            <i class="fa fa-user-plus"></i> تسجيل متدربين جدد
                                        </a>
                                    </li>

                                    <li class="bg-success">
                                        <a ng-click="batches.addNewLectures(1)" href="">
                                            <i class="fa fa-calendar-plus-o"></i> إضافة محاضرات جديدة
                                        </a>
                                    </li>

                                    <li>
                                        <a ng-click="batches.saveAttendance(1)" href="">
                                            <i class="fa fa-check-square-o"></i> تسجيل الحضور
                                        </a>
                                    </li>

                                    <li class="divider"></li>

                                    <li>
                                        <a href="/batches/1/edit">
                                            <i class="fa fa-sliders"></i> خيارات وإعدادات المجموعة
                                        </a>
                                    </li>

                                    
                                    <li class="divider"></li>

                                    <li>
                                        <a href="/reports/batches.batchSummary/generate?batchId=1" target="_blank">
                                            <i class="fa fa-print"></i> ملخص المجموعة
                                        </a>
                                    </li>

                                                                            <li class="bg-warning">
                                            <a href="/batches/1/end">
                                                <i class="fa fa-flag-checkered"></i> إنهاء التدريب
                                            </a>
                                        </li>
                                                                    </ul>
                            </div>
                        </div>
                    </div>

                    
                    <ul class="list-inline small text-muted margin-bottom-0 margin-top-10">
                        <li>
                            <i class="fa fa-users"></i>
                            10

                                                             \  <span class="text-warning">20</span>
                                                    </li>

                        <li><i class="fa fa-calendar"></i> 10</li>

                                                    <li>
                                <div class="flex flex-margin-items-5">
                                    <div>06/04</div>
                                    <div><i class="fa fa-long-arrow-left margin-0"></i></div>
                                    <div>12/05/26</div>
                                </div>
                            </li>

                        
                        
                                            </ul>

                                            <ul class="list-inline small text-muted margin-bottom-0 margin-top-10">
							                                                                <li>
                                    
                                    Ahmad Barakat
                                </li>
                                                    </ul>
                    
                    
                                    </div>

                                    <div class="batch-progress-container w-100">
                        <div class="batch-progress-holder">
                            <div class="batch-progress" style="width: 20%"></div>
                        </div>
                    </div>
                            </div>
            </div>
            	</div>
            </div>

                        </div><!-- end ngIf: batches.view !== null -->
                    </div>
                </div>
                    </div>
            </div>
</div>


<?php
// تضمين footer template
include_once __DIR__ . '/../templates/footer.php';
?>
