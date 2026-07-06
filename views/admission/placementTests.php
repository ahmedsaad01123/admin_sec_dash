<?php
// إعداد المتغيرات
$pageTitle = 'إختبارات تحديد المستوى';
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
            <i class="icon fa fa-filter"></i>
            <span class="title">التقديمات</span>

                            
                <ul class="breadcrumb inline" style="margin: 0">
                    <li class="breadcrumb-item"></li>

                                            <li class="breadcrumb-item">إختبارات تحديد المستوى</li>
                                    </ul>
                    </div>

        <div class="d-flex justify-content-center">
            <div>
                
                            </div>
        </div>
    </div>
                    <div class="alert alert-warning" id="no-tests-alert">
                <div class="d-flex flex-gap-15 align-items-center">
                    <div>
                        <i class="fa fa-exclamation-triangle fa-2x"></i>
                    </div>
                    <div>
                        <b>إبدء بإضافة "أنواع" إختبارات تحديد المستوى التي تقدمها</b>! لتتمكن من إضافة وحجز إختبارات تحديد المستوى للعملاء الجدد يجب ان تقوم اولاً بإضافة "<b>أنواع</b>" إختبارات تحديد المستوى التي ستقدمها، (مثل  General English). وبعدها يمكنك إضافة العملاء أسفل هذا النوع.

                        <div class="mt-10">
                            <a href="/placementTests/candidates/home?createTest" class="btn btn-primary">
                                <i class="fa fa-plus-circle"></i>
                                إضافة أنواع الإختبارات
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        
                    <ul class="nav nav-tabs">
                <li class="active" data-tour="placementTests.home" data-tour-text="من هنا يمكنك إستعراض إختبارات تحديد المستوى، سواء الكتابية او الشفوية لجميع العملاء بعض إضافة هذه الإختبارات لهم">
                    <a href="/placementTests">
                        <i class="icon fa fa-calendar"></i>
                        <span class="title">
                            الإختبارات
                        </span>
                    </a>
                </li>

                <li class="" data-tour="placementTests.home" data-tour-text="من هنا يمكنك عرض جميع العملاء المضافون على إختبارات تحديد المستوى ومعلومات الحجز الخاصة بهم وخيارات تحديد المستوى">
                    <a href="/placementTests/candidates/home">
                        <i class="icon fa fa-users"></i>
                        <span class="title">
                            العملاء
                        </span>
                    </a>
                </li>
            </ul>
        
                <div ng-app="app" ng-controller="controller" class="ng-scope">
            <dismissible-hint name="placement_tests.home_new" class="ng-isolate-scope">
    <!-- ngIf: visible --><div ng-if="visible" class="dismissibleHint  d-flex flex-gap-15 align-items-center justify-content-between">
        <div class="d-flex flex-gap-20 align-items-center flex-grow-1">
            <!-- ngIf: icon || img --><div ng-if="icon || img" class="iconHolder hidden-xs ng-scope">
                <!-- ngIf: img -->
                <!-- ngIf: icon --><span ng-if="icon" class="ms icon ng-binding ng-scope">info</span><!-- end ngIf: icon -->
            </div><!-- end ngIf: icon || img -->

            <div class="content flex-grow-1">
                <ng-transclude>
                من هنا يمكنك عرض الإختبارات (الشفوية والكتابية) المضافة لجميع عملاء إختبارات تحديد المستوى لأي يوم تختاره. 
		لإضافة إختبارات جديدة، قم اولاً بإضافة إختبار تحديد مستوى لأحد العملاء. يمكنك إضافة إختبار شفوي او كتابي أو الإثنين لكل عميل، بناءاً على "نوع" إختبارات تحديد المستوى الذي ستضيف العميل أسفله.
            </ng-transclude>
            </div>
        </div>

        <div>
            <!-- ngIf: dismissible --><button ng-click="dismiss()" ng-if="dismissible" class="close ng-scope" type="button">
                <span>×</span>
            </button><!-- end ngIf: dismissible -->
        </div>
    </div><!-- end ngIf: visible --></dismissible-hint>

            <div class="flex justify-content-between margin-bottom-20 rounded bg-color-white p-15 box-shadow">
                <div>
                    <button ng-click="addNewCandidate()" class="btn btn-primary" data-tour="placementTests.home" data-tour-text="إضغط هنا لإضافة إختبار تحديد مستوى جديد لعميل مضاف لديك بالفعل. يمكنك القيام بذلك ايضاً من داخل ملف العميل.">
                        <i class="fa fa-plus-circle"></i> إختبار جديد لعميل
                    </button>
                </div>

                <div class="hidden visible-md visible-lg">
                    <div class="d-flex flex-gap-15 align-items-center">
                        <div>
                            <i class="fa fa-search"></i> الوصول لإختبار عميل
                        </div>
                        <div style="max-width: 220px;">
                            <client-search-input setup="candidateSearch.searchInputSetup" class="ng-isolate-scope">
    <div ng-class="{'widget-large': setup.largeInput, 'widget-small': !setup.largeInput, 'withNewClientOption': setup.newClientOption}" class="typeaheadWidget clientSearchInputWidget widget-small">

        <!--The loading indicator-->
        <!-- ngIf: searching -->

        <!--The input-->
        <div ng-class="{'input-group': newClientOption.available}">
            <input ng-model="name" uib-typeahead="client.id as client.name for client in search($viewValue)" typeahead-min-length="setup.minLength" typeahead-wait-ms="700" typeahead-on-select="select($item, $model, $label)" typeahead-loading="searching" typeahead-no-results="noResults" typeahead-template-url="clientOption.html" ng-class="{'input-lg': setup.largeInput}" type="text" class="form-control search-input  ng-empty" placeholder="بحث بالإسم او الرقم او البريد الإلكتروني ..." autocomplete="off" aria-autocomplete="list" aria-expanded="false" aria-owns="typeahead-20-7777"><ul class="dropdown-menu ng-isolate-scope ng-hide" ng-show="isOpen() &amp;&amp; !moveInProgress" ng-style="{top: position().top+'px', left: position().left+'px'}" role="listbox" aria-hidden="true" uib-typeahead-popup="" id="typeahead-20-7777" matches="matches" active="activeIdx" select="select(activeIdx, evt)" move-in-progress="moveInProgress" query="query" position="position" assign-is-open="assignIsOpen(isOpen)" debounce="debounceUpdate" template-url="clientOption.html">
    <!-- ngRepeat: match in matches track by $index -->
</ul>

            <!-- ngIf: newClientOption.available -->
        </div>

        <!--Messages-->
        <!-- ngIf: noResults -->
    </div>

    <script type="text/ng-template" id="clientOption.html">
        <a href="" class="d-flex flex-row flex-gap-10">
            <div>
                <img src="{{ match.model.picture_url }}" alt="" class="clientPicture small circle"/>
            </div>

            <div>
                <span ng-bind-html="match.label | uibTypeaheadHighlight:query"></span>

                <ul ng-show="match.model.national_id || match.model.phone_number" class="list-inline details margin-top-5">
                    <li ng-if="match.model.trashed">
                        <label class="label label-danger">DELETED</label>
                    </li>

                    <li ng-if="match.model._fromAnotherBranch">
                        <span class="label label-warning">{{ match.model.branch.name | cut:12 }}</span>
                    </li>

                    <li class="text-strong">{{ match.model.public_id }}</li>

                    <li ng-if="match.model.current_path">{{ match.model.current_path.name }}</li>

                    <li>{{ match.model.phone_number || '--' }}</li>
                </ul>
            </div>
        </a>
    </script>
</client-search-input>
                        </div>
                    </div>
                </div>
            </div>

            <div ng-controller="tests" class="block style2 ng-scope">
                <div class="block-body p-0" style="height: 810px !important;">
                    <div class="d-flex flex-nowrap w-100 h-100">
                        <div class="border-end overflow-auto h-100" style="width: 22%">
                            <div class="p-15">
        <div class="form-group">
            <label>إختبارات تاريخ محدد</label>
            <input ng-model="tests.filtering.params.date" type="date" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty">
        </div>

        <div class="form-group">
            <label>المٌختبر -  Tester</label>
            <instructor-search ng-model="tests.filtering.params.instructorId" api="tests.filtering.instructor.search.api" setup="{'setModelToId': true}" class="ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty">
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
            <input ng-model="name" uib-typeahead="instructor.id as instructor.name for instructor in search($viewValue)" typeahead-min-length="setup.minLength" typeahead-wait-ms="700" typeahead-on-select="select($item, $model, $label)" typeahead-loading="searching" typeahead-no-results="noResults" typeahead-template-url="instructorOption.html" ng-class="{'input-lg': setup.largeInput}" type="text" class="form-control  ng-empty" name="search" placeholder="بحث بالإسم او الرقم او البريد الإلكتروني ..." autocomplete="off" aria-autocomplete="list" aria-expanded="false" aria-owns="typeahead-24-2877"><ul class="dropdown-menu ng-isolate-scope ng-hide" ng-show="isOpen() &amp;&amp; !moveInProgress" ng-style="{top: position().top+'px', left: position().left+'px'}" role="listbox" aria-hidden="true" uib-typeahead-popup="" id="typeahead-24-2877" matches="matches" active="activeIdx" select="select(activeIdx, evt)" move-in-progress="moveInProgress" query="query" position="position" assign-is-open="assignIsOpen(isOpen)" debounce="debounceUpdate" template-url="instructorOption.html">
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
</instructor-search></div>

        <div class="form-group">
            <label>نوع الإختبارات</label>
            <placement-test-picker ng-model="tests.filtering.params.testId" class="ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty">
    <div class="placementTestPicker">
        <div class="loading-indicator tiny ng-hide" ng-show="tests === null" size="tiny"><div class="icon loader1"><div></div><div></div><div></div><div></div></div><!--<i class="icon fa fa-2x fa-cog fa-spin fa-fw noMargin"></i>--><!--<img class="icon" ng-src="{{ iconUrl }}" />--></div>

        <select ng-show="tests !== null" ng-model="selectedTest" ng-options="test as test.menu_item for test in getTests() track by test.id" ng-disabled="!tests.length" ng-required="setup.required === true" class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-required" disabled="disabled"><option value="" class="" selected="selected">&nbsp;</option></select>
    </div>
</placement-test-picker>
        </div>

        <div class="form-group">
            <label>حالة العملاء</label>
            <select ng-model="tests.filtering.params.status" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty">
                <!-- ngRepeat: option in ['all', 'not_placed', 'placed', 'enrolled'] --><option ng-repeat="option in ['all', 'not_placed', 'placed', 'enrolled']" ng-value="option" class="ng-binding ng-scope" value="string:all" selected="selected">
                    الجميع
                </option><!-- end ngRepeat: option in ['all', 'not_placed', 'placed', 'enrolled'] --><option ng-repeat="option in ['all', 'not_placed', 'placed', 'enrolled']" ng-value="option" class="ng-binding ng-scope" value="string:not_placed">
                    لم يتم تحديد مستواهم بعد
                </option><!-- end ngRepeat: option in ['all', 'not_placed', 'placed', 'enrolled'] --><option ng-repeat="option in ['all', 'not_placed', 'placed', 'enrolled']" ng-value="option" class="ng-binding ng-scope" value="string:placed">
                    تم تحديد المستوى، وبإنتظار التوزيع
                </option><!-- end ngRepeat: option in ['all', 'not_placed', 'placed', 'enrolled'] --><option ng-repeat="option in ['all', 'not_placed', 'placed', 'enrolled']" ng-value="option" class="ng-binding ng-scope" value="string:enrolled">
                    تم تحديد المستوى والتوزيع
                </option><!-- end ngRepeat: option in ['all', 'not_placed', 'placed', 'enrolled'] -->
            </select>
        </div>

        <div class="form-group">
            <label>خلال وقت</label>
            <popover content="عرض الإختبارات التي ستتم خلال مساحة وقت معنية في نفس التاريخ المحدد بالأعلى" class="ng-isolate-scope"><i uib-popover="عرض الإختبارات التي ستتم خلال مساحة وقت معنية في نفس التاريخ المحدد بالأعلى" popover-title="" popover-trigger="'mouseenter'" popover-placement="" class="popover-hint fa fa-question-circle"></i></popover>
            <div class="time-slider ng-isolate-scope ng-not-empty ng-valid ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" ng-model="tests.filtering.params.timeRange" api="tests.filtering.timeRange.slider.api" preview="tests.filtering.timeRange.slider.preview" step="5"><div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 41.8118%; width: 58.1882%;"></div><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 41.8118%;"></span><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 100%;"></span></div>

            <div class="text-muted small mt-10 text-center">
                <span dir="ltr" class="ng-binding">10:00 AM - 11:59 PM</span>
            </div>
        </div>

        <div class="form-group">
            <label>قام بالإضافة</label>
            <user-search ng-model="tests.filtering.params.creatorId" api="tests.filtering.creator.search.api" class="ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty">
    <!-- ngIf: !! selected -->

    <!-- ngIf: ! selected --><div ng-if="! selected" ng-class="{'widget-large': setup.largeInput, 'widget-small': !setup.largeInput}" class="typeaheadWidget ng-scope widget-small">
        <!--The input-->
        <div class="input-group">
            <!--The loading indicator-->
            <!-- ngIf: searching -->

            <input ng-model="name" uib-typeahead="user.id as user.name for user in search($viewValue)" typeahead-min-length="setup.minLength" typeahead-wait-ms="700" typeahead-on-select="select($item, $model, $label)" typeahead-loading="searching" typeahead-no-results="noResults" typeahead-template-url="userMenuItem.html" ng-class="{'input-lg': setup.largeInput}" type="text" class="form-control ng-pristine ng-untouched ng-valid ng-empty" placeholder="بحث بالإسم او الرقم او البريد الإلكتروني ..." autocomplete="off" aria-autocomplete="list" aria-expanded="false" aria-owns="typeahead-30-2068"><ul class="dropdown-menu ng-isolate-scope ng-hide" ng-show="isOpen() &amp;&amp; !moveInProgress" ng-style="{top: position().top+'px', left: position().left+'px'}" role="listbox" aria-hidden="true" uib-typeahead-popup="" id="typeahead-30-2068" matches="matches" active="activeIdx" select="select(activeIdx, evt)" move-in-progress="moveInProgress" query="query" position="position" assign-is-open="assignIsOpen(isOpen)" debounce="debounceUpdate" template-url="userMenuItem.html">
    <!-- ngRepeat: match in matches track by $index -->
</ul>

            <div class="input-group-btn">
                <button ng-click="selectMe()" class="btn btn-default ng-binding" type="button">
                    انا
                </button>
            </div>
        </div>

        <!--Messages-->
        <!-- ngIf: noResults -->
    </div><!-- end ngIf: ! selected -->

    <script type="text/ng-template" id="userMenuItem.html">
        <a href="">
            <span ng-bind-html="match.label | uibTypeaheadHighlight:query"></span>
            <ul class="list-inline details margin-top-5">
                <li><i class="fa fa-suitcase"></i> {{ match.model.job_title || '--' }}</li>
                <li><i class="fa fa-phone"></i> {{ match.model.phone_number || '--' }}</li>
            </ul>
        </a>
    </script>
</user-search></div>

        <div class="form-group mb-0">
            <label>ملحوظات حجز الإختبار</label>
            <textarea ng-model="tests.filtering.params.signupNote" rows="2" class="form-control ng-pristine ng-untouched ng-valid ng-empty"></textarea>
        </div>
    </div>

    <div class="p-15 border-top">
        <div class="form-group">
            <label>المسار التدريبي للعميل</label>
            <path-search-helper ng-model="tests.filtering.params.pathSearch" class="ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty"><div class="path-search-helper-container ng-scope" ng-class="{'border roundedCorners padding-15 bg-color-body': ['specific', 'with_courses'].indexOf(filter) &gt;= 0}">

        <div class="form-group margin-bottom-0">
            <!--
            <label>البحث في المسارات</label>
            -->
            <select ng-model="filter" ng-change="onFilterChange()" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty">
                <option ng-value="'none'" value="string:none" selected="selected">دون تحديد مسارات</option>
                <option ng-value="'specific'" value="string:specific">مسار مصمم مسبقاً محدد</option>
                <option ng-value="'preset'" value="string:preset">أي مسار مصمم مسبقاً</option>
                <option ng-value="'custom'" value="string:custom">أي مسار خاص</option>
                <option ng-value="'any'" value="string:any">أي وجميع المسارات التدريبة</option>
                <option ng-value="'with_courses'" value="string:with_courses">المسارات التي تحتوى على دورات محددة</option>
            </select>
        </div>

        <div ng-switch="filter" ng-show="['specific', 'with_courses'].indexOf(filter) &gt;= 0" class="form-group margin-bottom-0 margin-top-15 ng-hide">

            <!-- ngSwitchWhen: specific -->

            <!-- ngSwitchWhen: with_courses -->

        </div>
    </div></path-search-helper>
        </div>

        <div class="form-group mb-0">
            <label>عملاء بوسوم محددة</label>
            <div class="tags-menu pills align-items-center ng-isolate-scope ng-not-empty ng-valid" type="clients" ng-model="tests.filtering.params.clientTags">
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

    <div class="d-flex justify-content-between p-15 border-top">
        <div>
            <button ng-click="tests.filtering.filter()" class="btn btn-primary" type="button">
                <i class="fa fa-search"></i> بحث
            </button>
        </div>
        <div>
            <!-- ngIf: tests.filtering.on -->
        </div>
    </div>
                        </div>

                        <div class="flex-grow-1 position-relative h-100" style="width: 78%">
                            
                            <!-- ngIf: tests.loading -->

                            <!-- ngIf: !! tests.view --><div ng-if="!! tests.view" bind-html-compile="tests.view" class="d-flex flex-column w-100 h-100 ng-scope"><div class="p-15 border-bottom d-flex flex-gap-15 justify-content-between align-items-center ng-scope">
        <div class="d-flex flex-gap-15 align-items-center">
            <h4 class="m-0">Mon 27/04/26</h4>
            <span class="badge">0</span>
        </div>
        <div>
            <div class="btn-group">
                <button ng-click="tests.loadPrevDate()" ng-disabled="tests.loading" class="btn">
                    <i class="fa fa-chevron-right m-0"></i>
                </button>
                <button ng-click="tests.loadNextDate()" ng-disabled="tests.loading" class="btn">
                    <i class="fa fa-chevron-left m-0"></i>
                </button>
            </div>
        </div>
    </div>

    <div class="flex-grow-1 overflow-auto w-100 p-15 ng-scope">
                     <div class="alert alert-info">
        
        <i class="fa fa-info-circle"></i>
        <!-- ngIf: ! tests.filtering.on --><span ng-if="! tests.filtering.on" class="ng-scope">ليس هناك إختبارات مسجلة لليوم. يمكنك إضافة عملاء جدد وتحديد إختبارات لهم من زر إختبار جديد بالأعلى.</span><!-- end ngIf: ! tests.filtering.on -->
                <!-- ngIf: tests.filtering.on -->
    </div> 

            </div></div><!-- end ngIf: !! tests.view -->
                        </div>
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
