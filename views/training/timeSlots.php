<?php
// إعداد المتغيرات
$pageTitle = 'إدارة المواعيد';
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
            <span class="title">تنسيق التدريب</span>

                            
                <ul class="breadcrumb inline" style="margin: 0">
                    <li class="breadcrumb-item"></li>

                                            <li class="breadcrumb-item">إدارة المواعيد</li>
                                    </ul>
                    </div>

        <div class="d-flex justify-content-center">
            <div>
                
                            </div>
        </div>
    </div>
        <div ng-app="app" ng-controller="controller" class="ng-scope">
            <dismissible-hint name="training.timeSlots.home" class="ng-isolate-scope">
    <!-- ngIf: visible --><div ng-if="visible" class="dismissibleHint  d-flex flex-gap-15 align-items-center justify-content-between">
        <div class="d-flex flex-gap-20 align-items-center flex-grow-1">
            <!-- ngIf: icon || img --><div ng-if="icon || img" class="iconHolder hidden-xs ng-scope">
                <!-- ngIf: img -->
                <!-- ngIf: icon --><span ng-if="icon" class="ms icon ng-binding ng-scope">info</span><!-- end ngIf: icon -->
            </div><!-- end ngIf: icon || img -->

            <div class="content flex-grow-1">
                <ng-transclude>
                من هنا يمكنك إضافة وإدارة "المواعيد".<b class="ng-scope"> المواعيد هي جميع الأوقات الممكنة التي تقدم فيها المحاضرات (والنشاطات الآخرى مثل إختبارات تحديد المستوى) ومتاح للعملاء الإختيار منها</b>. ستقوم بإضافة جميع المواعيد الممكنة
		كخيارات للعملاء ليختاروا منها. ولاحقاً عند إنشاء مجموعة جديدة ستختار لها ايضاً موعد، وسيساعدك بعدها النظام على 
		توزيع العملاء المناسبين على المجموعات، بناءاً على المواعيد المختارة لكل منهم.<b class="ng-scope"> ايضاً سيكون النظام قادر على تحديد المدربين (ودوراتهم) المتاحين لكل "موعد" بناءاً على مواعيد عمل كل مدرب والمهام المحددة له (بشكل اوتوماتيكي)</b>. 
            </ng-transclude>
            </div>
        </div>

        <div>
            <!-- ngIf: dismissible --><button ng-click="dismiss()" ng-if="dismissible" class="close ng-scope" type="button">
                <span>×</span>
            </button><!-- end ngIf: dismissible -->
        </div>
    </div><!-- end ngIf: visible --></dismissible-hint>

            <div class="d-flex justify-content-between align-items-center mb-15">
                <div></div>
                <div>
                    <button ng-click="create()" class="btn btn-primary">
                        <i class="fa fa-plus-circle"></i> إضافة موعد جديد
                    </button>
                </div>
            </div>

            <div class="block style2">
                <div class="block-body">
                    <!--Allocation (type) tabs-->
                                            <ul class="nav nav-tabs">
                                                            <li ng-class="{'active': calendar.filters.is('type', 'lectures')}" class="active">
                                    <a ng-click="calendar.filters.switch('type', 'lectures')" href="javascript:void(0)">
                                        <i class="icon fa fa-calendar-o"></i>
                                        <span class="title">محاضرات</span>
                                    </a>
                                </li>
                                                            <li ng-class="{'active': calendar.filters.is('type', 'placement-tests')}" class="">
                                    <a ng-click="calendar.filters.switch('type', 'placement-tests')" href="javascript:void(0)">
                                        <i class="icon fa fa-calendar-o"></i>
                                        <span class="title">إختبارات تحديد مستوى (شفوية)</span>
                                    </a>
                                </li>
                            
                            <li ng-class="{'active': calendar.filters.is('type', 'any')}" class="">
                                <a ng-click="calendar.filters.switch('type', 'any')" href="">
                                    <span class="title">جميع المواعيد</span>
                                </a>
                            </li>
                        </ul>
                    
                    <div id="calendar-filters">
        <div class="bg-color-body rounded p-15 mb-15">
            <div class="d-flex flex-gap-15 flex-wrap">

                <!--Venu-->
                                    <div class="form-group mb-0 border-end pe-15">
                        <label>يتم في (المكان)</label>
                        <popover content="أين يكون هذا الموعد متاح، (عبر الإنترنت، ام داخل القاعات بالفرع)" class="ng-isolate-scope"><i uib-popover="أين يكون هذا الموعد متاح، (عبر الإنترنت، ام داخل القاعات بالفرع)" popover-title="" popover-trigger="'mouseenter'" popover-placement="" class="popover-hint fa fa-question-circle"></i></popover>
                        <div class="pills">
                            <div ng-click="calendar.filters.switch('venue', 'online')" ng-class="{'active': calendar.filters.is('venue', 'online')}" class="pill d-flex align-items-center active">
                                <i class="fa fa-video-camera"></i> عبر الإنترنت
                            </div>
                            <div ng-click="calendar.filters.switch('venue', 'offline')" ng-class="{'active': calendar.filters.is('venue', 'offline')}" class="pill d-flex align-items-center">
                                <i class="fa fa-building-o"></i>  داخل الفرع
                            </div>
                        </div>
                    </div>
                
                <!--Instructor-->
                <div class="form-group border-end pe-15 mb-0">
                    <label>
                        المتاح فيها مدرب محدد
                    </label>
                    <popover content="إظهار فقط المواعيد المتاح فيها مدرب محدد (بناءاً على مواعيد عمله والمهام المعينة له)" class="ng-isolate-scope"><i uib-popover="إظهار فقط المواعيد المتاح فيها مدرب محدد (بناءاً على مواعيد عمله والمهام المعينة له)" popover-title="" popover-trigger="'mouseenter'" popover-placement="" class="popover-hint fa fa-question-circle"></i></popover>
                    <instructor-search setup="calendar.filters.instructor.search" class="ng-isolate-scope">
    <div ng-class="{'widget-large': setup.largeInput, 'widget-small': !setup.largeInput}" class="typeaheadWidget instructorSearchWidget widget-small">
        <!--Selected-->
        <div ng-show="!! selected" class="well well-sm mb-0 ng-hide">
            <button ng-click="clear()" class="close" type="button">
                <span>×</span>
            </button>

            <div class="d-flex align-items-center flex-gap-10">
                <div>
                    <img class="instructorPicture circle small" alt="">
                </div>

                <div>
                    <a class="text-underlined ng-binding" target="_blank"></a>
                    <ul class="list-inline small text-muted mt-5">
                        <li class="ng-binding"><i class="fa fa-phone"></i> --</li>
                        <li class="ng-binding"><i class="fa fa-envelope-o"></i> --</li>
                    </ul>
                </div>
            </div>
        </div>

        <!--Not selected-->
        <!-- ngIf: ! selected --><div ng-if="! selected" class="ng-scope">
            <!--The loading indicator-->
            <!-- ngIf: searching -->

            <!--The input-->
            <input ng-model="name" uib-typeahead="instructor.id as instructor.name for instructor in search($viewValue)" typeahead-min-length="setup.minLength" typeahead-wait-ms="700" typeahead-on-select="select($item, $model, $label)" typeahead-loading="searching" typeahead-no-results="noResults" typeahead-template-url="instructorOption.html" ng-class="{'input-lg': setup.largeInput}" type="text" class="form-control  ng-empty" name="search" placeholder="بحث بالإسم او الرقم او البريد الإلكتروني ..." autocomplete="off" aria-autocomplete="list" aria-expanded="false" aria-owns="typeahead-21-9789"><ul class="dropdown-menu ng-isolate-scope ng-hide" ng-show="isOpen() &amp;&amp; !moveInProgress" ng-style="{top: position().top+'px', left: position().left+'px'}" role="listbox" aria-hidden="true" uib-typeahead-popup="" id="typeahead-21-9789" matches="matches" active="activeIdx" select="select(activeIdx, evt)" move-in-progress="moveInProgress" query="query" position="position" assign-is-open="assignIsOpen(isOpen)" debounce="debounceUpdate" template-url="instructorOption.html">
    <!-- ngRepeat: match in matches track by $index -->
</ul>

            <!--Messages-->
            <!-- ngIf: noResults -->
        </div><!-- end ngIf: ! selected -->
    </div>

    <script type="text/ng-template" id="instructorOption.html">
        <a href="" class="d-flex flex-gap-15 align-items-center">
            <div>
                <img src="{{ match.model.picture_url }}" class="instructorPicture small circle" alt=""/>
            </div>
            <div>
                <span ng-bind-html="match.label | uibTypeaheadHighlight:query"></span>

                <ul ng-show="match.model.national_id || match.model.phone_number" class="list-inline details margin-top-5">
                    <li ng-if="match.model._fromAnotherBranch">
                        <span class="label label-warning">{{ match.model.branch.name | cut:12 }}</span>
                    </li>

                    <li><i class="fa fa-phone"></i> {{ match.model.phone_number || '--' }}</li>
                    <li><i class="fa fa-envelope-o"></i> {{ match.model.email }}</li>
                </ul>
            </div>
        </a>
    </script>
</instructor-search>
                </div>

                <!--Course-->
                <div ng-show="calendar.filters.params.type == 'lectures'" class="form-group mb-0">
                    <label>المتاح فيها دورة محددة</label>
                    <popover content="إظهار فقط المواعيد المتاح فيها دورة معينة، بناءاً على توفر المدربين في هذا الوقت (بناءاً على مواعيد عملهم)." class="ng-isolate-scope"><i uib-popover="إظهار فقط المواعيد المتاح فيها دورة معينة، بناءاً على توفر المدربين في هذا الوقت (بناءاً على مواعيد عملهم)." popover-title="" popover-trigger="'mouseenter'" popover-placement="" class="popover-hint fa fa-question-circle"></i></popover>
                    <course-menu setup="calendar.filters.course.menu" class="ng-isolate-scope"><div class="course-menu ng-scope">
        
        <!-- ngIf: !data.courses.length -->

        
        <div ng-show="data.courses.length &gt; 0" ng-switch="searchMode">
            <!-- ngSwitchWhen: false --><div ng-switch-when="false" class="input-group ng-scope">
                <select ng-model="$parent.selected" ng-required="setup.required" ng-disabled="disabled" class="form-control has-groups ng-pristine ng-untouched ng-valid ng-empty ng-valid-required">
                    <option value="" selected="selected">&nbsp;</option>

                    <!-- ngRepeat: category in data.categories --><optgroup ng-repeat="category in data.categories" label="[ Business Development ]" class="ng-scope">
                        <!-- ngRepeat: course in getCategoryCourses(category) --><option ng-repeat="course in getCategoryCourses(category)" ng-value="course" class="ng-binding ng-scope" value="object:30">
                            Digital Marketing Strateg ... (BUS-DIG-MARK)
                        </option><!-- end ngRepeat: course in getCategoryCourses(category) --><option ng-repeat="course in getCategoryCourses(category)" ng-value="course" class="ng-binding ng-scope" value="object:31">
                            Business Planning and Str ... (BUS-PLN-STR)
                        </option><!-- end ngRepeat: course in getCategoryCourses(category) -->
                    </optgroup><!-- end ngRepeat: category in data.categories --><optgroup ng-repeat="category in data.categories" label="[ General English ]" class="ng-scope">
                        <!-- ngRepeat: course in getCategoryCourses(category) --><option ng-repeat="course in getCategoryCourses(category)" ng-value="course" class="ng-binding ng-scope" value="object:34">
                            General English - Level 1 (GEN-1)
                        </option><!-- end ngRepeat: course in getCategoryCourses(category) --><option ng-repeat="course in getCategoryCourses(category)" ng-value="course" class="ng-binding ng-scope" value="object:35">
                            General English - Level 2 (GEN-2)
                        </option><!-- end ngRepeat: course in getCategoryCourses(category) --><option ng-repeat="course in getCategoryCourses(category)" ng-value="course" class="ng-binding ng-scope" value="object:36">
                            General English - Level 3 (GEN-3)
                        </option><!-- end ngRepeat: course in getCategoryCourses(category) -->
                    </optgroup><!-- end ngRepeat: category in data.categories --><optgroup ng-repeat="category in data.categories" label="[ Web Development ]" class="ng-scope">
                        <!-- ngRepeat: course in getCategoryCourses(category) --><option ng-repeat="course in getCategoryCourses(category)" ng-value="course" class="ng-binding ng-scope" value="object:40">
                            User Experience Basics (WEB-UX)
                        </option><!-- end ngRepeat: course in getCategoryCourses(category) --><option ng-repeat="course in getCategoryCourses(category)" ng-value="course" class="ng-binding ng-scope" value="object:41">
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

                <!--
                <div class="form-group mb-0">
                    <label>Show inactive slots</label>
                    <popover content="Hide or show the currently disabled time slots; which are not available for new clients to select from"></popover>
                    <div class="pills">
                        <div ng-click="calendar.filters.switch('includeDisabled', true)" ng-class="{'active': calendar.filters.is('includeDisabled', true)}" class="pill">
                            <i class="fa fa-eye"></i> Show
                        </div>
                        <div ng-click="calendar.filters.switch('includeDisabled', false)" ng-class="{'active': calendar.filters.is('includeDisabled', false)}" class="pill">
                            <i class="fa fa-eye-slash"></i> Hide
                        </div>
                    </div>
                </div>
                -->
            </div>
        </div>
    </div>

                    <!-- ngIf: ! calendar.view -->
                    <div id="calendar" ng-show="!! calendar.view" bind-html-compile="calendar.view" class=""><table class="table table-bordered ng-scope">
        <tbody>
                    <tr>
                <td rowspan="2" style="width: 100px; border-bottom-width: 5px">
                    <b>السبت</b>
                </td>
            </tr>

                            
                <tr>
                    
                    <td style="padding: 10px 0 !important; height: 0px; overflow-y: hidden; overflow-x: auto; border-bottom-width: 5px;" class="time-slots-container position-relative empty">
                        <div class="time-slots position-relative w-100 h-100">
                    <div class="d-flex align-items-center justify-content-center">
                <div class="message text-center bg-color-white">ليس هناك مواعيد</div>
            </div>
        
            </div>
                    </td>
                </tr>
                                <tr>
                <td rowspan="2" style="width: 100px; border-bottom-width: 5px">
                    <b>الأحد</b>
                </td>
            </tr>

                            
                <tr>
                    
                    <td style="padding: 10px 0 !important; height: 0px; overflow-y: hidden; overflow-x: auto; border-bottom-width: 5px;" class="time-slots-container position-relative empty">
                        <div class="time-slots position-relative w-100 h-100">
                    <div class="d-flex align-items-center justify-content-center">
                <div class="message text-center bg-color-white">ليس هناك مواعيد</div>
            </div>
        
            </div>
                    </td>
                </tr>
                                <tr>
                <td rowspan="2" style="width: 100px; border-bottom-width: 5px">
                    <b>الأثنين</b>
                </td>
            </tr>

                            
                <tr>
                    
                    <td style="padding: 10px 0 !important; height: 0px; overflow-y: hidden; overflow-x: auto; border-bottom-width: 5px;" class="time-slots-container position-relative empty">
                        <div class="time-slots position-relative w-100 h-100">
                    <div class="d-flex align-items-center justify-content-center">
                <div class="message text-center bg-color-white">ليس هناك مواعيد</div>
            </div>
        
            </div>
                    </td>
                </tr>
                                <tr>
                <td rowspan="2" style="width: 100px; border-bottom-width: 5px">
                    <b>الثلاثاء</b>
                </td>
            </tr>

                            
                <tr>
                    
                    <td style="padding: 10px 0 !important; height: 0px; overflow-y: hidden; overflow-x: auto; border-bottom-width: 5px;" class="time-slots-container position-relative empty">
                        <div class="time-slots position-relative w-100 h-100">
                    <div class="d-flex align-items-center justify-content-center">
                <div class="message text-center bg-color-white">ليس هناك مواعيد</div>
            </div>
        
            </div>
                    </td>
                </tr>
                                <tr>
                <td rowspan="2" style="width: 100px; border-bottom-width: 5px">
                    <b>الأربعاء</b>
                </td>
            </tr>

                            
                <tr>
                    
                    <td style="padding: 10px 0 !important; height: 0px; overflow-y: hidden; overflow-x: auto; border-bottom-width: 5px;" class="time-slots-container position-relative empty">
                        <div class="time-slots position-relative w-100 h-100">
                    <div class="d-flex align-items-center justify-content-center">
                <div class="message text-center bg-color-white">ليس هناك مواعيد</div>
            </div>
        
            </div>
                    </td>
                </tr>
                                <tr>
                <td rowspan="2" style="width: 100px; border-bottom-width: 5px">
                    <b>الخميس</b>
                </td>
            </tr>

                            
                <tr>
                    
                    <td style="padding: 10px 0 !important; height: 0px; overflow-y: hidden; overflow-x: auto; border-bottom-width: 5px;" class="time-slots-container position-relative empty">
                        <div class="time-slots position-relative w-100 h-100">
                    <div class="d-flex align-items-center justify-content-center">
                <div class="message text-center bg-color-white">ليس هناك مواعيد</div>
            </div>
        
            </div>
                    </td>
                </tr>
                                <tr>
                <td rowspan="2" style="width: 100px; border-bottom-width: 5px">
                    <b>الجمعة</b>
                </td>
            </tr>

                            
                <tr>
                    
                    <td style="padding: 10px 0 !important; height: 0px; overflow-y: hidden; overflow-x: auto; border-bottom-width: 5px;" class="time-slots-container position-relative empty">
                        <div class="time-slots position-relative w-100 h-100">
                    <div class="d-flex align-items-center justify-content-center">
                <div class="message text-center bg-color-white">ليس هناك مواعيد</div>
            </div>
        
            </div>
                    </td>
                </tr>
                            </tbody>
    </table>
</div>
                </div>
            </div>
        </div>
            </div>
</div>

<?php
// تضمين footer template
include_once __DIR__ . '/../templates/footer.php';
?>
