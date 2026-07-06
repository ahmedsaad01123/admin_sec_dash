<?php
// إعداد المتغيرات
$pageTitle = 'قاعدة بيانات العملاء';
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
            <i class="icon fa fa-user"></i>
            <span class="title">العملاء</span>

                            
                <ul class="breadcrumb inline" style="margin: 0">
                    <li class="breadcrumb-item"></li>

                                            <li class="breadcrumb-item">الجميع</li>
                                    </ul>
                    </div>

        <div class="d-flex justify-content-center">
            <div>
                                    <a href="/clients/create" class="btn btn-primary">
                <i class="fa fa-plus-circle"></i> عميل جديد            </a>
        
        <a href="/clients/import" class="btn btn-info">
            <i class="fa fa-upload"></i> إستيراد        </a>

                    <a href="/clients/export" class="btn btn-default">
                <i class="fa fa-download"></i> تصدير الكل            </a>
            
                            </div>
        </div>
    </div>
        
        <div ng-app="app" ng-controller="controller" class="ng-scope">
            <dismissible-hint name="clients.all_new" class="ng-isolate-scope">
    <!-- ngIf: visible --><div ng-if="visible" class="dismissibleHint  d-flex flex-gap-15 align-items-center justify-content-between">
        <div class="d-flex flex-gap-20 align-items-center flex-grow-1">
            <!-- ngIf: icon || img --><div ng-if="icon || img" class="iconHolder hidden-xs ng-scope">
                <!-- ngIf: img -->
                <!-- ngIf: icon --><span ng-if="icon" class="ms icon ng-binding ng-scope">info</span><!-- end ngIf: icon -->
            </div><!-- end ngIf: icon || img -->

            <div class="content flex-grow-1">
                <ng-transclude>
                هنا يمكنك عرض جميع العملاء الذين تم تسجيلهم من البداية على المنصة. العملاء مقسمين على "مراحل"، إبدء بإختيار المرحلة اولاً للبحث داخلها، أو إختر "جميع العملاء" للبحث في جميع العملاء المسجلين. بعد البحث يمكنك إستخدام الخيارات اسفل الصفحة للتحكم في العملاء مثل توزيعهم على المجموعات او قوائم الإنتظار، ... أو إنشاء حسابات لهم والعديد من الخيارات الآخرى.            </ng-transclude>
            </div>
        </div>

        <div>
            <!-- ngIf: dismissible --><button ng-click="dismiss()" ng-if="dismissible" class="close ng-scope" type="button">
                <span>×</span>
            </button><!-- end ngIf: dismissible -->
        </div>
    </div><!-- end ngIf: visible --></dismissible-hint>

            <div id="filters" class="block style2">
        <div class="block-body padding-0 auto-overflow">
            <div id="client-search-filters">
        <div class="columns flex">
            <!-- Scope selector -->
            <div class="column scope" data-tour="clients.all" data-tour-text="هذه هي المراحل الأساسية المقسم عليها العملاء، إختر مرحلة لعرض العملاء التابعين لها الآن، أو إختر جميع العملاء لعرض الجميع.">

                <div class="p-15">
                    <h4 class="text-strong m-0">المرحلة</h4>
                </div>

                <div class="list-group no-shadow">
                    <!-- ngRepeat: scope in filters.scopes.scopes track by $index --><a ng-repeat="scope in filters.scopes.scopes track by $index" ng-show="scope.show" ng-click="filters.scopes.select(scope)" ng-class="{'active': filters.scopes.isSelected(scope), 'disabled': filters.scopes.isScopeDisabled(scope)}" uib-tooltip="العملاء الجدد، الذين لم يتم تسجيلهم على اي شئ بعد" tooltip-placement="bottom" tooltip-popup-delay="700" href="" class="list-group-item rounded-0 ng-binding ng-scope active">

                        <!-- ngIf: filters.scopes.isSelected(scope) --><i ng-if="filters.scopes.isSelected(scope)" class="arrow fa fa-chevron-left ng-scope"></i><!-- end ngIf: filters.scopes.isSelected(scope) -->
                        <i ng-class="scope.icon" class="fa me-10 fa-inbox" style="color: var(--info) !important;"></i>
                        العملاء الجدد
                    </a><!-- end ngRepeat: scope in filters.scopes.scopes track by $index --><a ng-repeat="scope in filters.scopes.scopes track by $index" ng-show="scope.show" ng-click="filters.scopes.select(scope)" ng-class="{'active': filters.scopes.isSelected(scope), 'disabled': filters.scopes.isScopeDisabled(scope)}" uib-tooltip="العملاء الذين طلبوا او حصلوا على إختبار تحديد مستوى" tooltip-placement="bottom" tooltip-popup-delay="700" href="" class="list-group-item rounded-0 ng-binding ng-scope">

                        <!-- ngIf: filters.scopes.isSelected(scope) -->
                        <i ng-class="scope.icon" class="fa me-10 fa-question-circle" style="color: var(--info) !important;"></i>
                        على إختبارات تحديد المستوى
                    </a><!-- end ngRepeat: scope in filters.scopes.scopes track by $index --><a ng-repeat="scope in filters.scopes.scopes track by $index" ng-show="scope.show" ng-click="filters.scopes.select(scope)" ng-class="{'active': filters.scopes.isSelected(scope), 'disabled': filters.scopes.isScopeDisabled(scope)}" uib-tooltip="العملاء المسجلين حالياً على احد قوائم الإنتظار" tooltip-placement="bottom" tooltip-popup-delay="700" href="" class="list-group-item rounded-0 ng-binding ng-scope">

                        <!-- ngIf: filters.scopes.isSelected(scope) -->
                        <i ng-class="scope.icon" class="fa me-10 fa-clipboard" style="color: var(--info) !important;"></i>
                        المسجلين على الإنتظار
                    </a><!-- end ngRepeat: scope in filters.scopes.scopes track by $index --><a ng-repeat="scope in filters.scopes.scopes track by $index" ng-show="scope.show" ng-click="filters.scopes.select(scope)" ng-class="{'active': filters.scopes.isSelected(scope), 'disabled': filters.scopes.isScopeDisabled(scope)}" uib-tooltip="العملاء المسجلين حالياً على المجموعات التدريبية النشطة" tooltip-placement="bottom" tooltip-popup-delay="700" href="" class="list-group-item rounded-0 ng-binding ng-scope">

                        <!-- ngIf: filters.scopes.isSelected(scope) -->
                        <i ng-class="scope.icon" class="fa me-10 fa-users" style="color: var(--info) !important;"></i>
                        يتم تدريبهم الآن
                    </a><!-- end ngRepeat: scope in filters.scopes.scopes track by $index --><a ng-repeat="scope in filters.scopes.scopes track by $index" ng-show="scope.show" ng-click="filters.scopes.select(scope)" ng-class="{'active': filters.scopes.isSelected(scope), 'disabled': filters.scopes.isScopeDisabled(scope)}" uib-tooltip="العملاء المسجلين على المجموعات المنتهية بالفعل" tooltip-placement="bottom" tooltip-popup-delay="700" href="" class="list-group-item rounded-0 ng-binding ng-scope">

                        <!-- ngIf: filters.scopes.isSelected(scope) -->
                        <i ng-class="scope.icon" class="fa me-10 fa-check" style="color: var(--info) !important;"></i>
                        اتموا دورة تدريبية او اكثر
                    </a><!-- end ngRepeat: scope in filters.scopes.scopes track by $index --><a ng-repeat="scope in filters.scopes.scopes track by $index" ng-show="scope.show" ng-click="filters.scopes.select(scope)" ng-class="{'active': filters.scopes.isSelected(scope), 'disabled': filters.scopes.isScopeDisabled(scope)}" uib-tooltip="عملاء قاموا بتأجيل او إلغاء التدريب" tooltip-placement="bottom" tooltip-popup-delay="700" href="" class="list-group-item rounded-0 ng-binding ng-scope">

                        <!-- ngIf: filters.scopes.isSelected(scope) -->
                        <i ng-class="scope.icon" class="fa me-10 fa-exclamation-circle" style="color: var(--info) !important;"></i>
                        الغير نشطين
                    </a><!-- end ngRepeat: scope in filters.scopes.scopes track by $index --><a ng-repeat="scope in filters.scopes.scopes track by $index" ng-show="scope.show" ng-click="filters.scopes.select(scope)" ng-class="{'active': filters.scopes.isSelected(scope), 'disabled': filters.scopes.isScopeDisabled(scope)}" uib-tooltip="البحث في جميع العملاء الذين تم تسجيلهم يوماً على المنصة" tooltip-placement="bottom" tooltip-popup-delay="700" href="" class="list-group-item rounded-0 ng-binding ng-scope">

                        <!-- ngIf: filters.scopes.isSelected(scope) -->
                        <i ng-class="scope.icon" class="fa me-10 fa-users" style="color: var(--info) !important;"></i>
                        جميع العملاء
                    </a><!-- end ngRepeat: scope in filters.scopes.scopes track by $index -->
                </div>
            </div>

            <!-- Scope params -->
            <div class="column scope-params" data-tour="clients.all" data-tour-text="بعد إختيار المرحلة يمكنك إستخدام خيارات البحث الخاصة بهذه المرحلة تحديداً لتحسين نتائج البحث">
                <div ng-show="filters.params.params.scope == 'new'"><!--
    <div>
        <div class="checkbox m-0">
            <label>
                <input ng-model="filters.scopes.scopeNew.selectPreferredDaysAndTimes" type="checkbox"/>
                البحث في العملاء طبقاً للأيام و اوقات التدريب المفضل
            </label>
        </div>

        <div ng-show="filters.scopes.scopeNew.selectPreferredDaysAndTimes" class="row margin-top-10">
            
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <button ng-click="filters.params.togglePreferredDaysSelection()" class="btn btn-xs btn-default onSide" type="button">
                        <span ng-if="filters.params.params.new.preferred_days_selection == 'all'">الكل</span>
                        <span ng-if="filters.params.params.new.preferred_days_selection == 'any'">أي</span>
                    </button>

                    <label>الأيام الأنسب للتدريب</label>
                    <div>
                                                    <div class="checkbox-inline small">
                                <label class="text-normal-weight">
                                    <input checklist-model="filters.params.params.new.preferred_days"
                                           checklist-value="'sat'"
                                           type="checkbox" /> السبت
                                </label>
                            </div>
                                                    <div class="checkbox-inline small">
                                <label class="text-normal-weight">
                                    <input checklist-model="filters.params.params.new.preferred_days"
                                           checklist-value="'sun'"
                                           type="checkbox" /> الأحد
                                </label>
                            </div>
                                                    <div class="checkbox-inline small">
                                <label class="text-normal-weight">
                                    <input checklist-model="filters.params.params.new.preferred_days"
                                           checklist-value="'mon'"
                                           type="checkbox" /> الأثنين
                                </label>
                            </div>
                                                    <div class="checkbox-inline small">
                                <label class="text-normal-weight">
                                    <input checklist-model="filters.params.params.new.preferred_days"
                                           checklist-value="'tue'"
                                           type="checkbox" /> الثلاثاء
                                </label>
                            </div>
                                                    <div class="checkbox-inline small">
                                <label class="text-normal-weight">
                                    <input checklist-model="filters.params.params.new.preferred_days"
                                           checklist-value="'wed'"
                                           type="checkbox" /> الأربعاء
                                </label>
                            </div>
                                                    <div class="checkbox-inline small">
                                <label class="text-normal-weight">
                                    <input checklist-model="filters.params.params.new.preferred_days"
                                           checklist-value="'thu'"
                                           type="checkbox" /> الخميس
                                </label>
                            </div>
                                                    <div class="checkbox-inline small">
                                <label class="text-normal-weight">
                                    <input checklist-model="filters.params.params.new.preferred_days"
                                           checklist-value="'fri'"
                                           type="checkbox" /> الجمعة
                                </label>
                            </div>
                                            </div>
                </div>
            </div>

            
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <label>الأوقات الأنسب للتدريب</label>
                    <div class="help-block">عرض العملاء الذين إختاروا مواعيد تدريب محددة</div>

                    <div class="margin-bottom-10">
                        <select ng-model="filters.params.params.new.preferred_time_scenario" class="form-control input-sm">
                            <option value="within">العملاء المتاحين خلال (بين) مساحة الوقت المحددة بالأسفل</option>
                            <option value="exact">العملاء المتاحين في مساحة الوقت المحددة بالضبط</option>
                            <option value="encompass">العملاء المتاحين خلال فترة تغطي المساحة المحددة</option>
                            <option value="at_from">العملاء المتاحين بدءاً من الوقت المحدد (من)</option>
                        </select>
                    </div>

                    <div class="flex flex-margin-items-15">
                        <div class="flex-grow-1">
                            <div class="small text-muted">من</div>
                            <input ng-model="filters.params.params.new.preferred_time_from" type="time" class="form-control input-sm"/></div>
                        <div class="flex-grow-1">
                            <div class="small text-muted">إلى</div>
                            <input ng-model="filters.params.params.new.preferred_time_to" type="time" class="form-control input-sm"/></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    --></div>
                                    <div ng-show="filters.params.params.scope == 'placement'" class="ng-hide"><div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <div class="radio">
                    <label>
                        <input ng-model="filters.params.params.placement.status" value="booked" type="radio" class="ng-pristine ng-untouched ng-valid ng-not-empty" name="5">
                        المسجلين ولم يتم تحديد مستواهم بعد
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input ng-model="filters.params.params.placement.status" value="placed" type="radio" class="ng-pristine ng-untouched ng-valid ng-not-empty" name="6">
                        الذين تم تحديد مستوايتهم بالفعل
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input ng-model="filters.params.params.placement.status" value="all" type="radio" class="ng-pristine ng-untouched ng-valid ng-not-empty" name="7">
                        عرض الكل، المحدد مستوايتهم والغير محددة
                    </label>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <label>نوع الإختبارات</label>
                <div class="help-block">
                    عرض المسجلين على إختبار تحديد مستوى محدد
                </div>
                <placement-test-picker ng-model="filters.params.params.placement.test_id" class="ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty">
    <div class="placementTestPicker">
        <div class="loading-indicator tiny ng-hide" ng-show="tests === null" size="tiny"><div class="icon loader1"><div></div><div></div><div></div><div></div></div><!--<i class="icon fa fa-2x fa-cog fa-spin fa-fw noMargin"></i>--><!--<img class="icon" ng-src="{{ iconUrl }}" />--></div>

        <select ng-show="tests !== null" ng-model="selectedTest" ng-options="test as test.menu_item for test in getTests() track by test.id" ng-disabled="!tests.length" ng-required="setup.required === true" class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-required" disabled="disabled"><option value="" class="" selected="selected">&nbsp;</option></select>
    </div>
</placement-test-picker>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- ngIf: filters.params.params.placement.status == 'placed' -->

        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <label>قام بالإختبار (المدرب)</label>
                <div class="help-block">المدرب الذي قام بالإختبار او اشرف عليه</div>
                <instructor-search ng-model="filters.params.params.placement.tester_instructor_id" setup="{'setModelToId': true}" class="ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty">
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
            <input ng-model="name" uib-typeahead="instructor.id as instructor.name for instructor in search($viewValue)" typeahead-min-length="setup.minLength" typeahead-wait-ms="700" typeahead-on-select="select($item, $model, $label)" typeahead-loading="searching" typeahead-no-results="noResults" typeahead-template-url="instructorOption.html" ng-class="{'input-lg': setup.largeInput}" type="text" class="form-control  ng-empty" name="search" placeholder="بحث بالإسم او الرقم او البريد الإلكتروني ..." autocomplete="off" aria-autocomplete="list" aria-expanded="false" aria-owns="typeahead-55-9231"><ul class="dropdown-menu ng-isolate-scope ng-hide" ng-show="isOpen() &amp;&amp; !moveInProgress" ng-style="{top: position().top+'px', left: position().left+'px'}" role="listbox" aria-hidden="true" uib-typeahead-popup="" id="typeahead-55-9231" matches="matches" active="activeIdx" select="select(activeIdx, evt)" move-in-progress="moveInProgress" query="query" position="position" assign-is-open="assignIsOpen(isOpen)" debounce="debounceUpdate" template-url="instructorOption.html">
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
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6">
            <!-- ngIf: filters.params.params.placement.status == 'placed' -->
        </div>

        <!--
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <label>clients/search.filters.scope_placement.while_on_path</label>
                <div class="help-block">
                    clients/search.filters.scope_placement.while_on_path_hint
                </div>
                <path-search-helper ng-model="filters.params.params.placement.path_search"></path-search-helper>
            </div>
        </div>
        -->
    </div>
</div>
                                <div ng-show="filters.params.params.scope == 'waiting'" class="ng-hide"><div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <label>تحديد دورة محددة</label>
                <div class="help-block">عرض العملاء على قائمة الإنتظار لدورة تدريبية محددة. سيظهر جميع المتظرين إذا لم تقم بتحديد دورة.</div>
                <course-menu setup="filters.scopes.scopeWaiting.coursePicker.setup" class="ng-isolate-scope"><div class="course-menu ng-scope">
        
        <!-- ngIf: !data.courses.length -->

        
        <div ng-show="data.courses.length &gt; 0" ng-switch="searchMode">
            <!-- ngSwitchWhen: false --><div ng-switch-when="false" class="input-group ng-scope">
                <select ng-model="$parent.selected" ng-required="setup.required" ng-disabled="disabled" class="form-control has-groups ng-pristine ng-untouched ng-valid ng-empty ng-valid-required">
                    <option value="" selected="selected">&nbsp;</option>

                    <!-- ngRepeat: category in data.categories --><optgroup ng-repeat="category in data.categories" label="[ Business Development ]" class="ng-scope">
                        <!-- ngRepeat: course in getCategoryCourses(category) --><option ng-repeat="course in getCategoryCourses(category)" ng-value="course" class="ng-binding ng-scope" value="object:105">
                            Digital Marketing Strateg ... (BUS-DIG-MARK)
                        </option><!-- end ngRepeat: course in getCategoryCourses(category) --><option ng-repeat="course in getCategoryCourses(category)" ng-value="course" class="ng-binding ng-scope" value="object:106">
                            Business Planning and Str ... (BUS-PLN-STR)
                        </option><!-- end ngRepeat: course in getCategoryCourses(category) -->
                    </optgroup><!-- end ngRepeat: category in data.categories --><optgroup ng-repeat="category in data.categories" label="[ General English ]" class="ng-scope">
                        <!-- ngRepeat: course in getCategoryCourses(category) --><option ng-repeat="course in getCategoryCourses(category)" ng-value="course" class="ng-binding ng-scope" value="object:109">
                            General English - Level 1 (GEN-1)
                        </option><!-- end ngRepeat: course in getCategoryCourses(category) --><option ng-repeat="course in getCategoryCourses(category)" ng-value="course" class="ng-binding ng-scope" value="object:110">
                            General English - Level 2 (GEN-2)
                        </option><!-- end ngRepeat: course in getCategoryCourses(category) --><option ng-repeat="course in getCategoryCourses(category)" ng-value="course" class="ng-binding ng-scope" value="object:111">
                            General English - Level 3 (GEN-3)
                        </option><!-- end ngRepeat: course in getCategoryCourses(category) -->
                    </optgroup><!-- end ngRepeat: category in data.categories --><optgroup ng-repeat="category in data.categories" label="[ Web Development ]" class="ng-scope">
                        <!-- ngRepeat: course in getCategoryCourses(category) --><option ng-repeat="course in getCategoryCourses(category)" ng-value="course" class="ng-binding ng-scope" value="object:115">
                            User Experience Basics (WEB-UX)
                        </option><!-- end ngRepeat: course in getCategoryCourses(category) --><option ng-repeat="course in getCategoryCourses(category)" ng-value="course" class="ng-binding ng-scope" value="object:116">
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

                    <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <label>المضافين بعد إختبار تحديد مستوى</label>
                    <div class="help-block">
                        الذين تم إضافتهم على قائمة إنتظار لدورة بعد إتمام إختبار تحديد مستوى وإختيار هذه الدورة لهم
                    </div>
                    <placement-test-picker ng-model="filters.params.params.waiting.source_placement_test_id" class="ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty">
    <div class="placementTestPicker">
        <div class="loading-indicator tiny ng-hide" ng-show="tests === null" size="tiny"><div class="icon loader1"><div></div><div></div><div></div><div></div></div><!--<i class="icon fa fa-2x fa-cog fa-spin fa-fw noMargin"></i>--><!--<img class="icon" ng-src="{{ iconUrl }}" />--></div>

        <select ng-show="tests !== null" ng-model="selectedTest" ng-options="test as test.menu_item for test in getTests() track by test.id" ng-disabled="!tests.length" ng-required="setup.required === true" class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-required" disabled="disabled"><option value="" class="" selected="selected">&nbsp;</option></select>
    </div>
</placement-test-picker>
                </div>
            </div>
        
        <!--
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <label>While on a training path</label>
                <div class="help-block">
                    Clients who are currently on waiting, through their training paths
                </div>

                <path-search-helper ng-model="filters.params.params.waiting.path_search"></path-search-helper>
            </div>
        </div>
        -->
    </div>
</div>
                <div ng-show="filters.params.params.scope == 'training'" class="ng-hide"><div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <div class="radio">
                    <label>
                        <input ng-model="filters.params.params.training.scope" value="batch" type="radio" class="ng-pristine ng-untouched ng-valid ng-not-empty" name="10">
                        المسجلين على مجموعة تدريبية نشطة الآن
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input ng-model="filters.params.params.training.scope" value="course" type="radio" class="ng-pristine ng-untouched ng-valid ng-not-empty" name="11">
                        المسجلين على مجموعات تدريبية لدورة محددة الآن
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input ng-model="filters.params.params.training.scope" value="all" type="radio" class="ng-pristine ng-untouched ng-valid ng-not-empty" name="12">
                        عرض كل المسجلين على مجموعات نشطة
                    </label>
                </div>
            </div>
        </div>

        <!-- ngIf: filters.params.params.training.scope == 'batch' -->

        <!-- ngIf: filters.params.params.training.scope == 'course' -->
    </div>

    <hr>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <label>تم تسجيلهم من</label>
                <div class="help-block">
                    المصدر الذي تم إختيار العملاء منه عند تسجيلهم على المجموعة التدريبية
                </div>

                <select ng-model="filters.params.params.training.source" class="form-control ng-pristine ng-untouched ng-valid ng-empty">
                    <option ng-value="null" value="object:null" selected="selected">اي مصدر</option>
                    <option value="waiting_list">قوائم الإنتظار</option>
                    <option value="placement_test">مباشراً بعد تحديد المستوى</option>
                    <option value="batch">المسجلين على مجموعة تدريبية نشطة الآن</option>
                    <option value="manual">إختيار مباشر يدوي</option>
                </select>
            </div>
        </div>

        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                <label>قام بالتسجيل</label>
                <user-search ng-model="filters.params.params.training.enrolled_by" class="ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty">
    <!-- ngIf: !! selected -->

    <!-- ngIf: ! selected --><div ng-if="! selected" ng-class="{'widget-large': setup.largeInput, 'widget-small': !setup.largeInput}" class="typeaheadWidget ng-scope widget-small">
        <!--The input-->
        <div class="input-group">
            <!--The loading indicator-->
            <!-- ngIf: searching -->

            <input ng-model="name" uib-typeahead="user.id as user.name for user in search($viewValue)" typeahead-min-length="setup.minLength" typeahead-wait-ms="700" typeahead-on-select="select($item, $model, $label)" typeahead-loading="searching" typeahead-no-results="noResults" typeahead-template-url="userMenuItem.html" ng-class="{'input-lg': setup.largeInput}" type="text" class="form-control ng-pristine ng-untouched ng-valid ng-empty" placeholder="بحث بالإسم او الرقم او البريد الإلكتروني ..." autocomplete="off" aria-autocomplete="list" aria-expanded="false" aria-owns="typeahead-61-6880"><ul class="dropdown-menu ng-isolate-scope ng-hide" ng-show="isOpen() &amp;&amp; !moveInProgress" ng-style="{top: position().top+'px', left: position().left+'px'}" role="listbox" aria-hidden="true" uib-typeahead-popup="" id="typeahead-61-6880" matches="matches" active="activeIdx" select="select(activeIdx, evt)" move-in-progress="moveInProgress" query="query" position="position" assign-is-open="assignIsOpen(isOpen)" debounce="debounceUpdate" template-url="userMenuItem.html">
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
</user-search>
            </div>
        </div>

        <!--
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <label>While on a training path</label>
                <div class="help-block">Trainees who are currently in training, while going through a training path</div>
                <path-search-helper ng-model="filters.params.params.training.path_search"></path-search-helper>
            </div>
        </div>
        -->
    </div>
</div>
                <div ng-show="filters.params.params.scope == 'trained'" class="ng-hide"><div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <div class="radio">
                    <label>
                        <input ng-model="filters.params.params.trained.scope" value="batch" type="radio" class="ng-pristine ng-untouched ng-valid ng-not-empty" name="13">
                        الذين اتمموا مجموعة تدريبية محددة
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input ng-model="filters.params.params.trained.scope" value="course" type="radio" class="ng-pristine ng-untouched ng-valid ng-not-empty" name="14">
                        الذين اتمموا مجموعات لدورة تدريبية محددة
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input ng-model="filters.params.params.trained.scope" value="any" type="radio" class="ng-pristine ng-untouched ng-valid ng-not-empty" name="15">
                        جميع العملاء الذين اتمموا دورات تدريبية سابقاً
                    </label>
                </div>
            </div>
        </div>

        <!-- ngIf: filters.params.params.trained.scope == 'batch' -->

        <!-- ngIf: filters.params.params.trained.scope == 'course' -->
    </div>

    <div class="row">
        <!-- ngIf: !! filters.params.params.trained.course_id || !! filters.params.params.trained.batch_id -->

        <!--
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <label>While on a training path</label>
                <div class="help-block">
                    Trainees who finished courses during a training path
                </div>
                <path-search-helper ng-model="filters.params.params.trained.path_search"></path-search-helper>
            </div>
        </div>
        -->

        <!--
        <div ng-if="!! filters.params.params.trained.course_id || !! filters.params.params.trained.batch_id" class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <label>And/then ...</label>
                <select ng-model="filters.params.params.trained.then" class="form-control">
                    <option value="stopped">Stopped. And did not start new courses</option>
                    <option value="joined_batch">Joined a batch for a specific course</option>
                    <option value="did_not_join_batch">Did not join a batch for a specific course</option>
                    <option value="waiting">Were added to waiting, for a course</option>
                    <option value="none"> Any scenario. (Show all)</option>
                </select>
            </div>

            <div ng-if="['joined_batch', 'did_not_join_batch', 'waiting'].indexOf(filters.params.params.trained.then) >= 0" class="form-group">
                <label>That course is:</label>
                <course-menu ng-model="filters.params.params.trained.then_course_id"></course-menu>
            </div>
        </div>
        -->
    </div>
</div>
                <div ng-show="filters.params.params.scope == 'inactive'" class="ng-hide"><div class="row">
        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                <div class="radio">
                    <label>
                        <input name="inactive_status" ng-model="filters.params.params.inactive.status" value="postponed" type="radio" class="ng-pristine ng-untouched ng-valid ng-not-empty">
                        العملاء الذين قاموا بالتأجيل (قبل بدء) التدريب - Postponed
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input name="inactive_status" ng-model="filters.params.params.inactive.status" value="paused" type="radio" class="ng-pristine ng-untouched ng-valid ng-not-empty">
                        العملاء الذين اوقفوا التدريب (بعد البدء) وطلبوا التأجيل - Paused
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input name="inactive_status" ng-model="filters.params.params.inactive.status" value="canceled" type="radio" class="ng-pristine ng-untouched ng-valid ng-not-empty">
                        العملاء الذين طلبوا وقف وإلغاء التدريب بشكل كامل - Canceled
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input name="inactive_status" ng-model="filters.params.params.inactive.status" value="all" type="radio" class="ng-pristine ng-untouched ng-valid ng-not-empty">
                        جميع العملاء الغير نشطين
                    </label>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-6">
        	<div class="form-group">
                <label>تاريخ المتابعة لإعادة تنشيط العميل</label>
                <div class="help-block">وقت المتابعة التالي مع العميل (إن وجد او كان مطلوب)</div>
                <div class="timeSpanSelectorWidget ng-isolate-scope ng-not-empty ng-valid" ng-model="filters.params.params.inactive.follow_up_date" options="{'span': null, 'acceptEmpty': true}">
        <div ng-show="['fromTo', 'date', 'beforeDate'].indexOf(choices.span) &lt; 0" class="form-group margin-bottom-0">
            <select ng-model="choices.span" ng-options="option.span as option.label for option in data.spans" class="form-control ng-pristine ng-untouched ng-valid ng-empty"><!-- ngIf: options.acceptEmpty === true --><option ng-if="options.acceptEmpty === true" value="" class="" selected="selected">&nbsp;</option><!-- end ngIf: options.acceptEmpty === true --><option label="اليوم" value="string:today">اليوم</option><option label="البارحة" value="string:yesterday">البارحة</option><option label="غداً" value="string:tomorrow">غداً</option><option label="هذا الإسبوع" value="string:thisWeek">هذا الإسبوع</option><option label="الإسبوع السابق" value="string:lastWeek">الإسبوع السابق</option><option label="هذا الشهر" value="string:thisMonth">هذا الشهر</option><option label="الشهر المنقضي" value="string:lastMonth">الشهر المنقضي</option><option label="تاريخ محدد" value="string:date">تاريخ محدد</option><option label="قبل تاريخ" value="string:beforeDate">قبل تاريخ</option><option label="من ... إلى" value="string:fromTo">من ... إلى</option><option label="من البداية" value="string:allTime">من البداية</option></select>
        </div>

        <!-- ngIf: choices.span === 'fromTo' -->

        <!-- ngIf: choices.span === 'date' -->

        <!-- ngIf: choices.span === 'beforeDate' -->
    </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-6">
        	<div class="form-group">
                <label>المتابعة مسندة لـ</label>
                <div class="help-block">الموظف المسؤول عن متابعة إعادة تنشيط العميل</div>
                <user-search ng-model="filters.params.params.inactive.followup_assigned_to" class="ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty">
    <!-- ngIf: !! selected -->

    <!-- ngIf: ! selected --><div ng-if="! selected" ng-class="{'widget-large': setup.largeInput, 'widget-small': !setup.largeInput}" class="typeaheadWidget ng-scope widget-small">
        <!--The input-->
        <div class="input-group">
            <!--The loading indicator-->
            <!-- ngIf: searching -->

            <input ng-model="name" uib-typeahead="user.id as user.name for user in search($viewValue)" typeahead-min-length="setup.minLength" typeahead-wait-ms="700" typeahead-on-select="select($item, $model, $label)" typeahead-loading="searching" typeahead-no-results="noResults" typeahead-template-url="userMenuItem.html" ng-class="{'input-lg': setup.largeInput}" type="text" class="form-control ng-pristine ng-untouched ng-valid ng-empty" placeholder="بحث بالإسم او الرقم او البريد الإلكتروني ..." autocomplete="off" aria-autocomplete="list" aria-expanded="false" aria-owns="typeahead-63-4776"><ul class="dropdown-menu ng-isolate-scope ng-hide" ng-show="isOpen() &amp;&amp; !moveInProgress" ng-style="{top: position().top+'px', left: position().left+'px'}" role="listbox" aria-hidden="true" uib-typeahead-popup="" id="typeahead-63-4776" matches="matches" active="activeIdx" select="select(activeIdx, evt)" move-in-progress="moveInProgress" query="query" position="position" assign-is-open="assignIsOpen(isOpen)" debounce="debounceUpdate" template-url="userMenuItem.html">
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
</user-search>
            </div>
        </div>

        <div class="col-sm-12 col-md-6">
        	<div class="form-group">
                <label>ملاحظة المتابعة</label>
                <div class="help-block">الملاحظة المرفقة مع متابعة إعادة التنشيط</div>
                <textarea class="form-control ng-pristine ng-untouched ng-valid ng-empty" ng-model="filters.params.params.inactive.followup_note" rows="2"></textarea>
            </div>
        </div>
    </div>

    <!--
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                <label>While on a training path</label>
                <path-search-helper ng-model="filters.params.params.inactive.path_search"></path-search-helper>
            </div>
        </div>
    </div>
    --></div>
                <div ng-show="filters.params.params.scope == 'any'" class="ng-hide"><div class="row">
        
        <!--
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <label>Is/was on a training path</label>
                <div class="help-block">
                    Clients who went through a specific training path
                </div>
                <path-search-helper ng-model="filters.params.params.any.path_search"></path-search-helper>
            </div>
        </div>
        -->

        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                <div class="checkbox">
                    <label>
                        <input ng-model="filters.params.params.any.include_inactive" type="checkbox" class="ng-pristine ng-untouched ng-valid ng-empty">
                        شمل العملاء الغير نشطين في النتائج
                    </label>
                    <div class="help-block">
                        سيظهر العملاء الغير نشطين (التأجيلات والإلغاءات) ايضاً في النتائج
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

                <div class="rounded p-15 bg-color-body mb-15">
        <div class="grid grid-3cols">
            
                            <div ng-show="filters.params.params.scope !== 'new'" class="grid-cell border-end pe-15 ng-hide">
                    <div class="form-group mb-0">
                        <label>الطلبات</label>
                        <popover content="فلترة العملاء حسب طلباتهم، حالة الدفع، والأقساط" class="ng-isolate-scope"><i uib-popover="فلترة العملاء حسب طلباتهم، حالة الدفع، والأقساط" popover-title="" popover-trigger="'mouseenter'" popover-placement="" class="popover-hint fa fa-question-circle"></i></popover>
                        <div>
                            <order-search-filter ng-model="filters.params.params.order_search" class="ng-pristine ng-untouched ng-valid ng-isolate-scope ng-not-empty">
                <button type="button" class="btn btn-default" ng-click="openDialog()" ng-class="{'btn-info': hasActiveFilters(), 'btn-default': !hasActiveFilters()}">
                    <i class="fa fa-shopping-cart"></i>
                    <span ng-bind="trans('order_filter.button_label')" class="ng-binding">الطلبات</span>
                    <!-- ngIf: hasActiveFilters() -->
                </button>
            </order-search-filter>
                        </div>
                    </div>
                </div>
            
            <div class="grid-cell">
                <div class="form-group mb-0">
                    <label> مواعيد التدريب المختارة</label>
                    <popover content="عرض العملاء الذين إختاروا مواعيد تدريب محددة" class="ng-isolate-scope"><i uib-popover="عرض العملاء الذين إختاروا مواعيد تدريب محددة" popover-title="" popover-trigger="'mouseenter'" popover-placement="" class="popover-hint fa fa-question-circle"></i></popover>
                    <time-slots-selector ng-model="filters.params.params.time_slots" options="{returnIdsOnly: true}" class="ng-pristine ng-untouched ng-valid ng-isolate-scope ng-not-empty">
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
        </div>
    </div>

    <div class="rounded p-15 bg-color-body">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-3">
                <div class="form-group">
                    <label>التسجيل على المنصة</label>
                    <select ng-model="filters.params.params.origin" class="form-control input-sm ng-pristine ng-untouched ng-valid ng-empty">
                        <option ng-value="null" value="object:null" selected="selected">أي</option>
                        <option value="generic">المضافين يدوياً</option>
                        <option value="lead">عملاء محتملين محولين</option>
                        <option value="register">سجلوا بأنفسهم</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-3">
                <div class="form-group">
                    <label>ترتيب النتائج</label>
                    <select ng-model="filters.params.params.order_by" class="form-control input-sm ng-pristine ng-untouched ng-valid ng-not-empty">
                        <option value="name">الإسم</option>
                        <option value="created_at" selected="selected">تاريخ الإضافة</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-3">
                <div class="form-group">
                    <label>إتجاه الترتيب</label>
                    <select ng-model="filters.params.params.order_dir" class="form-control input-sm ng-pristine ng-untouched ng-valid ng-not-empty">
                        <option value="desc" selected="selected">تصاعدياً</option>
                        <option value="asc">تنازلياً</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-3">
                <div class="form-group">
                    <label>عدد النتائج للصفحة</label>
                    <select ng-model="filters.params.params.paging_per_page" class="form-control input-sm ng-pristine ng-untouched ng-valid ng-not-empty">
                        <option ng-value="10" value="number:10">10</option>
                        <option ng-value="50" value="number:50">50</option>
                        <option ng-value="100" value="number:100" selected="selected">100</option>
                        <option ng-value="200" value="number:200">200</option>
                        <option ng-value="300" value="number:300">300</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="checkbox">
                    <label>
                        <input ng-model="filters.params.params.only_without_user" type="checkbox" class="ng-pristine ng-untouched ng-valid ng-empty">
                        عرض العملاء الذين ليس لديهم حسابات بعد فقط
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input ng-model="filters.params.params.only_refused_terms" ng-disabled="true" type="checkbox" class="ng-pristine ng-untouched ng-valid ng-empty" disabled="disabled">
                        إظهار فقط العملاء الذين لم يوافقوا على سياسات العمل
                    </label>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="checkbox">
                    <label>
                        <input ng-model="filters.params.params.with_trashed" type="checkbox" class="ng-pristine ng-untouched ng-valid ng-empty">
                        إظهار العملاء المحذوفين ايضاً ضمن النتائج
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input ng-model="filters.params.params.only_with_suspended_users" type="checkbox" class="ng-pristine ng-untouched ng-valid ng-empty">
                        إظهار العملاء المعطل حساباتهم فقط
                    </label>
                </div>
            </div>
        </div>
    </div>
            </div>

            <!-- Shared filters -->
            <div class="column shared" data-tour="clients.all" data-tour-text="خيارات بحث إضافية لنتائج أكثر دقة">
                <div class="form-group">
        <label>البحث بمعلومات العملاء</label>
        <popover content="يمكنك البحث عن اكثر من عميل مرة واحدة، عن طريق إدخال أكثر من معلومة للبحث (ارقام هاتف مثلا)، كل معلومة في سطر جديد" class="ng-isolate-scope"><i uib-popover="يمكنك البحث عن اكثر من عميل مرة واحدة، عن طريق إدخال أكثر من معلومة للبحث (ارقام هاتف مثلا)، كل معلومة في سطر جديد" popover-title="" popover-trigger="'mouseenter'" popover-placement="" class="popover-hint fa fa-question-circle"></i></popover>
        <textarea ng-model="filters.params.params.search" ng-change="filters.params.onSearchChange()" rows="3" placeholder="بحث (متعدد) بالإسم، رقم الهاتف، أو البريد الإلكتروني ..." class="form-control ng-pristine ng-untouched ng-valid ng-empty">        </textarea>
    </div>

    <div class="form-group">
        <label>تم الإضافة في \ بين</label>
        <div class="timeSpanSelectorWidget ng-isolate-scope ng-not-empty ng-valid" ng-model="filters.params.params.created_at" options="{'acceptEmpty': true, 'span': null, 'hideSpans': ['tomorrow']}">
        <div ng-show="['fromTo', 'date', 'beforeDate'].indexOf(choices.span) &lt; 0" class="form-group margin-bottom-0">
            <select ng-model="choices.span" ng-options="option.span as option.label for option in data.spans" class="form-control ng-pristine ng-untouched ng-valid ng-empty"><!-- ngIf: options.acceptEmpty === true --><option ng-if="options.acceptEmpty === true" value="" class="" selected="selected">&nbsp;</option><!-- end ngIf: options.acceptEmpty === true --><option label="اليوم" value="string:today">اليوم</option><option label="البارحة" value="string:yesterday">البارحة</option><option label="هذا الإسبوع" value="string:thisWeek">هذا الإسبوع</option><option label="الإسبوع السابق" value="string:lastWeek">الإسبوع السابق</option><option label="هذا الشهر" value="string:thisMonth">هذا الشهر</option><option label="الشهر المنقضي" value="string:lastMonth">الشهر المنقضي</option><option label="تاريخ محدد" value="string:date">تاريخ محدد</option><option label="قبل تاريخ" value="string:beforeDate">قبل تاريخ</option><option label="من ... إلى" value="string:fromTo">من ... إلى</option><option label="من البداية" value="string:allTime">من البداية</option></select>
        </div>

        <!-- ngIf: choices.span === 'fromTo' -->

        <!-- ngIf: choices.span === 'date' -->

        <!-- ngIf: choices.span === 'beforeDate' -->
    </div>
    </div>

    
    
    <div class="form-group">
        <label>الوسوم</label>
        <div class="tags-menu pills align-items-center ng-isolate-scope ng-not-empty ng-valid" type="clients" ng-model="filters.params.params.tags">
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
        <label>قام بالإضافة</label>
        <user-search ng-model="filters.params.params.created_by" class="ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty">
    <!-- ngIf: !! selected -->

    <!-- ngIf: ! selected --><div ng-if="! selected" ng-class="{'widget-large': setup.largeInput, 'widget-small': !setup.largeInput}" class="typeaheadWidget ng-scope widget-small">
        <!--The input-->
        <div class="input-group">
            <!--The loading indicator-->
            <!-- ngIf: searching -->

            <input ng-model="name" uib-typeahead="user.id as user.name for user in search($viewValue)" typeahead-min-length="setup.minLength" typeahead-wait-ms="700" typeahead-on-select="select($item, $model, $label)" typeahead-loading="searching" typeahead-no-results="noResults" typeahead-template-url="userMenuItem.html" ng-class="{'input-lg': setup.largeInput}" type="text" class="form-control ng-pristine ng-untouched ng-valid ng-empty" placeholder="بحث بالإسم او الرقم او البريد الإلكتروني ..." autocomplete="off" aria-autocomplete="list" aria-expanded="false" aria-owns="typeahead-65-715"><ul class="dropdown-menu ng-isolate-scope ng-hide" ng-show="isOpen() &amp;&amp; !moveInProgress" ng-style="{top: position().top+'px', left: position().left+'px'}" role="listbox" aria-hidden="true" uib-typeahead-popup="" id="typeahead-65-715" matches="matches" active="activeIdx" select="select(activeIdx, evt)" move-in-progress="moveInProgress" query="query" position="position" assign-is-open="assignIsOpen(isOpen)" debounce="debounceUpdate" template-url="userMenuItem.html">
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
</user-search>
    </div>

    <div class="form-group">
        <label>النوع</label>
        <select ng-model="filters.params.params.gender" class="form-control input-sm ng-pristine ng-untouched ng-valid ng-empty">
            <option ng-value="null" value="object:null" selected="selected">أي</option>
            <option value="male">ذكر</option>
            <option value="female">انثي</option>
        </select>
    </div>

                </div>
        </div>
    </div>
        </div>

        <div class="block-footer">
            <button ng-click="search()" disable-on-ajax="" class="btn btn-primary">
                <i class="fa fa-search"></i> بحث في العملاء            </button>

            <!-- ngIf: ! filters.initial -->
        </div>
    </div>            <div id="all-clients-results" class="block style2 primary">
    	<div class="block-title">
    		<span class="title">
                نتائج البحث
            </span>

            <!-- ngIf: clients.clients !== null && clients.clients.data.length > 0 -->
    	</div>

    	<div id="all-clients-results" class="block-body p-0" data-tour="clients.all" data-tour-text="هنا يمكنك عرض العملاء الذين يطابقوا محددات البحث والمرحلة التي حددتها بالأعلى">
            <div id="client-search-results" class="h-100 d-flex flex-column">
        
        <!-- ngIf: clients.clients === null -->

        
         <!-- ngIf: clients.clients !== null && clients.clients.data.length == 0 --><div class="alert alert-info m-15 ng-scope" ng-if="clients.clients !== null &amp;&amp; clients.clients.data.length == 0">
        
        <i class="fa fa-info-circle"></i>
        <!-- ngIf: filters.initial --><span ng-if="filters.initial" class="ng-scope">ليس هناك عملاء للعرض. إستخدم خيارات البحث لعرض اي مجموعة محددة من العملاء المسجلين على المنصة.</span><!-- end ngIf: filters.initial -->
            <!-- ngIf: ! filters.initial -->

            <!-- ngIf: api.inPickerMode() -->
    </div><!-- end ngIf: clients.clients !== null && clients.clients.data.length == 0 --> 

        <!-- ngIf: clients.clients !== null && clients.clients.data.length > 0 -->
    </div>
    	</div>

        <div class="block-footer" data-tour="clients.all" data-tour-text="إختر عميل أو اكثر، ثم يمكنك إستخدام هذه الخيارات للتحكم فيهم وتوزيعهم على المجموعات او الإنتظار .. والعديد من الخيارات الآخرى">
            <div class="d-flex flex-wrap flex-gap-15 align-items-center mb-15">
                
                <div>
                                            <button ng-disabled="! clients.selected.clients.length" disable-on-ajax="" ng-click="options.bookPlacementTest()" class="btn btn-primary disabled" disabled="">
                            <i class="fa fa-question-circle"></i> إختبار تحديد مستوى
                        </button>
                    
                    <button ng-disabled="! clients.selected.clients.length" disable-on-ajax="" ng-click="options.enrollIntoWaiting()" class="btn btn-primary disabled" disabled="">
                        <i class="fa fa-clipboard"></i> التسجيل على الإنتظار
                    </button>

                    <button ng-disabled="! clients.selected.clients.length" disable-on-ajax="" ng-click="options.enrollIntoBatch()" class="btn btn-primary disabled" disabled="">
                        <i class="fa fa-users"></i> التسجيل على مجموعة
                    </button>
                </div>

                <!-- ngIf: ! api.scopeIs(['inactive']) --><div ng-if="! api.scopeIs(['inactive'])" class="hidden-xs ng-scope">─</div><!-- end ngIf: ! api.scopeIs(['inactive']) -->

                <!-- ngIf: ! api.scopeIs(['inactive']) --><button ng-if="! api.scopeIs(['inactive'])" ng-disabled="! clients.selected.clients.length" ng-click="options.deactivate()" disable-on-ajax="" uib-tooltip="تأجيل، إيقاف، أو إلغاء تدريب العملاء المحددين" class="btn btn-warning ng-scope disabled" disabled="">
                    <i class="fa fa-exclamation-circle"></i> تأجيل \ إلغاء
                </button><!-- end ngIf: ! api.scopeIs(['inactive']) -->
            </div>

            <div class="d-flex flex-gap-15 align-items-center">
                                    <div>
                        <button ng-disabled="! clients.selected.clients.length" ng-click="options.createAccounts()" uib-tooltip="سيتم إنشاء حسابات للعملاء المحددين على المنصة" disable-on-ajax="" class="btn btn-success disabled" disabled="">
                            <i class="fa fa-key"></i> إنشاء حسابات
                        </button>

                        <button ng-disabled="! clients.selected.clients.length" ng-click="options.disableAccounts()" uib-tooltip="سيتم تعطيل حسابات العملاء المحددين" disable-on-ajax="" class="btn btn-warning disabled" disabled="">
                            <i class="fa fa-lock"></i> تعطيل الحسابات
                        </button>
                    </div>

                    <div class="hidden-xs">─</div>
                
                <div>
                    
                    <button ng-disabled="! clients.selected.clients.length" ng-click="options.toggleTags()" disable-on-ajax="" class="btn btn-default disabled" disabled="">
                        <i class="fa fa-tags"></i> إضافة \ حذف وسوم
                    </button>

                    <button ng-disabled="! clients.selected.clients.length" ng-click="options.sendMessage()" disable-on-ajax="" class="btn btn-default disabled" disabled="">
                        <i class="fa fa-send"></i> إرسال رسالة
                    </button>

                    <button ng-disabled="! clients.selected.clients.length" ng-click="options.delete()" disable-on-ajax="" class="btn btn-danger disabled" disabled="">
                        <i class="fa fa-trash"></i> حذف
                    </button>
                </div>
            </div>
        </div>
    </div>
            <script type="text/ng-template" id="clientSearch/filters">
                <div id="client-search-filters">
        <div class="columns flex">
            <!-- Scope selector -->
            <div class="column scope" data-tour="clients.all" data-tour-text="هذه هي المراحل الأساسية المقسم عليها العملاء، إختر مرحلة لعرض العملاء التابعين لها الآن، أو إختر جميع العملاء لعرض الجميع.">

                <div class="p-15">
                    <h4 class="text-strong m-0">المرحلة</h4>
                </div>

                <div class="list-group no-shadow">
                    <a ng-repeat="scope in filters.scopes.scopes track by $index"
                       ng-show="scope.show" ng-click="filters.scopes.select(scope)"
                       ng-class="{'active': filters.scopes.isSelected(scope), 'disabled': filters.scopes.isScopeDisabled(scope)}"
                       uib-tooltip="{{ trans('filters.scopes_descriptions.' + scope.scope) }}"
                       tooltip-placement="bottom" tooltip-popup-delay="700" href="" class="list-group-item rounded-0">

                        <i ng-if="filters.scopes.isSelected(scope)" class="arrow fa fa-chevron-left"></i>
                        <i ng-class="scope.icon" class="fa me-10" style="color: var(--info) !important;"></i>
                        {{ trans('filters.scopes.' + scope.scope) }}
                    </a>
                </div>
            </div>

            <!-- Scope params -->
            <div class="column scope-params" data-tour="clients.all" data-tour-text="بعد إختيار المرحلة يمكنك إستخدام خيارات البحث الخاصة بهذه المرحلة تحديداً لتحسين نتائج البحث">
                <div ng-show="filters.params.params.scope == 'new'"><!--
    <div>
        <div class="checkbox m-0">
            <label>
                <input ng-model="filters.scopes.scopeNew.selectPreferredDaysAndTimes" type="checkbox"/>
                البحث في العملاء طبقاً للأيام و اوقات التدريب المفضل
            </label>
        </div>

        <div ng-show="filters.scopes.scopeNew.selectPreferredDaysAndTimes" class="row margin-top-10">
            
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <button ng-click="filters.params.togglePreferredDaysSelection()" class="btn btn-xs btn-default onSide" type="button">
                        <span ng-if="filters.params.params.new.preferred_days_selection == 'all'">الكل</span>
                        <span ng-if="filters.params.params.new.preferred_days_selection == 'any'">أي</span>
                    </button>

                    <label>الأيام الأنسب للتدريب</label>
                    <div>
                                                    <div class="checkbox-inline small">
                                <label class="text-normal-weight">
                                    <input checklist-model="filters.params.params.new.preferred_days"
                                           checklist-value="'sat'"
                                           type="checkbox" /> السبت
                                </label>
                            </div>
                                                    <div class="checkbox-inline small">
                                <label class="text-normal-weight">
                                    <input checklist-model="filters.params.params.new.preferred_days"
                                           checklist-value="'sun'"
                                           type="checkbox" /> الأحد
                                </label>
                            </div>
                                                    <div class="checkbox-inline small">
                                <label class="text-normal-weight">
                                    <input checklist-model="filters.params.params.new.preferred_days"
                                           checklist-value="'mon'"
                                           type="checkbox" /> الأثنين
                                </label>
                            </div>
                                                    <div class="checkbox-inline small">
                                <label class="text-normal-weight">
                                    <input checklist-model="filters.params.params.new.preferred_days"
                                           checklist-value="'tue'"
                                           type="checkbox" /> الثلاثاء
                                </label>
                            </div>
                                                    <div class="checkbox-inline small">
                                <label class="text-normal-weight">
                                    <input checklist-model="filters.params.params.new.preferred_days"
                                           checklist-value="'wed'"
                                           type="checkbox" /> الأربعاء
                                </label>
                            </div>
                                                    <div class="checkbox-inline small">
                                <label class="text-normal-weight">
                                    <input checklist-model="filters.params.params.new.preferred_days"
                                           checklist-value="'thu'"
                                           type="checkbox" /> الخميس
                                </label>
                            </div>
                                                    <div class="checkbox-inline small">
                                <label class="text-normal-weight">
                                    <input checklist-model="filters.params.params.new.preferred_days"
                                           checklist-value="'fri'"
                                           type="checkbox" /> الجمعة
                                </label>
                            </div>
                                            </div>
                </div>
            </div>

            
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <label>الأوقات الأنسب للتدريب</label>
                    <div class="help-block">عرض العملاء الذين إختاروا مواعيد تدريب محددة</div>

                    <div class="margin-bottom-10">
                        <select ng-model="filters.params.params.new.preferred_time_scenario" class="form-control input-sm">
                            <option value="within">العملاء المتاحين خلال (بين) مساحة الوقت المحددة بالأسفل</option>
                            <option value="exact">العملاء المتاحين في مساحة الوقت المحددة بالضبط</option>
                            <option value="encompass">العملاء المتاحين خلال فترة تغطي المساحة المحددة</option>
                            <option value="at_from">العملاء المتاحين بدءاً من الوقت المحدد (من)</option>
                        </select>
                    </div>

                    <div class="flex flex-margin-items-15">
                        <div class="flex-grow-1">
                            <div class="small text-muted">من</div>
                            <input ng-model="filters.params.params.new.preferred_time_from" type="time" class="form-control input-sm"/></div>
                        <div class="flex-grow-1">
                            <div class="small text-muted">إلى</div>
                            <input ng-model="filters.params.params.new.preferred_time_to" type="time" class="form-control input-sm"/></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    --></div>
                                    <div ng-show="filters.params.params.scope == 'placement'"><div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <div class="radio">
                    <label>
                        <input ng-model="filters.params.params.placement.status" value="booked" type="radio"/>
                        المسجلين ولم يتم تحديد مستواهم بعد
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input ng-model="filters.params.params.placement.status" value="placed" type="radio"/>
                        الذين تم تحديد مستوايتهم بالفعل
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input ng-model="filters.params.params.placement.status" value="all" type="radio"/>
                        عرض الكل، المحدد مستوايتهم والغير محددة
                    </label>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <label>نوع الإختبارات</label>
                <div class="help-block">
                    عرض المسجلين على إختبار تحديد مستوى محدد
                </div>
                <placement-test-picker ng-model="filters.params.params.placement.test_id"></placement-test-picker>
            </div>
        </div>
    </div>

    <div class="row">
        <div ng-if="filters.params.params.placement.status == 'placed'" class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <label>الذين تم تحديد مستواهم لـ</label>
                <div class="help-block">
                    عرض العملاء الذين تم تحديد مستواهم لدورة تدريبية محددة
                </div>
                <course-menu ng-model="filters.params.params.placement.placement_course_id"></course-menu>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <label>قام بالإختبار (المدرب)</label>
                <div class="help-block">المدرب الذي قام بالإختبار او اشرف عليه</div>
                <instructor-search ng-model="filters.params.params.placement.tester_instructor_id"
                                   setup="{'setModelToId': true}"></instructor-search>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6">
            <div ng-if="filters.params.params.placement.status == 'placed'" class="form-group">
                <label>بعد ذلك</label>
                <div class="help-block">
                    اين تم تسجيل العميل بعد الإختبار
                </div>
                <select ng-model="filters.params.params.placement.after_placement" class="form-control">
                    <option value="batch">على احد المجموعات التدريبية</option>
                    <option value="waiting">على قائمة الإنتظار الخاصة بالمستوى او الدورة</option>
                    <option value="stopped">لا شئ، لم يتم تسجيله بعد</option>
                    <option value="any">اي سيناريو من الموضحين بالأعلى</option>
                </select>
            </div>
        </div>

        <!--
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <label>clients/search.filters.scope_placement.while_on_path</label>
                <div class="help-block">
                    clients/search.filters.scope_placement.while_on_path_hint
                </div>
                <path-search-helper ng-model="filters.params.params.placement.path_search"></path-search-helper>
            </div>
        </div>
        -->
    </div>
</div>
                                <div ng-show="filters.params.params.scope == 'waiting'"><div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <label>تحديد دورة محددة</label>
                <div class="help-block">عرض العملاء على قائمة الإنتظار لدورة تدريبية محددة. سيظهر جميع المتظرين إذا لم تقم بتحديد دورة.</div>
                <course-menu setup="filters.scopes.scopeWaiting.coursePicker.setup"></course-menu>
            </div>
        </div>

                    <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <label>المضافين بعد إختبار تحديد مستوى</label>
                    <div class="help-block">
                        الذين تم إضافتهم على قائمة إنتظار لدورة بعد إتمام إختبار تحديد مستوى وإختيار هذه الدورة لهم
                    </div>
                    <placement-test-picker ng-model="filters.params.params.waiting.source_placement_test_id"></placement-test-picker>
                </div>
            </div>
        
        <!--
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <label>While on a training path</label>
                <div class="help-block">
                    Clients who are currently on waiting, through their training paths
                </div>

                <path-search-helper ng-model="filters.params.params.waiting.path_search"></path-search-helper>
            </div>
        </div>
        -->
    </div>
</div>
                <div ng-show="filters.params.params.scope == 'training'"><div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <div class="radio">
                    <label>
                        <input ng-model="filters.params.params.training.scope" value="batch" type="radio"/>
                        المسجلين على مجموعة تدريبية نشطة الآن
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input ng-model="filters.params.params.training.scope" value="course" type="radio"/>
                        المسجلين على مجموعات تدريبية لدورة محددة الآن
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input ng-model="filters.params.params.training.scope" value="all" type="radio"/>
                        عرض كل المسجلين على مجموعات نشطة
                    </label>
                </div>
            </div>
        </div>

        <div ng-if="filters.params.params.training.scope == 'batch'" class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <label>المجموعة</label>
                <batch-picker ng-model="filters.params.params.training.batch_ids"
                              setup="{'acceptActiveOnly': true, 'multiple': true}"></batch-picker>
            </div>
        </div>

        <div ng-if="filters.params.params.training.scope == 'course'" class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <label>مجموعات للدورة التدريبية</label>
                <div class="help-block">
                    جميع العملاء المسجلين على مجموعات نشطة تابعة لدورة تدريبية محددة
                </div>
                <course-menu ng-model="filters.params.params.training.course_id"></course-menu>
            </div>
        </div>
    </div>

    <hr/>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <label>تم تسجيلهم من</label>
                <div class="help-block">
                    المصدر الذي تم إختيار العملاء منه عند تسجيلهم على المجموعة التدريبية
                </div>

                <select ng-model="filters.params.params.training.source" class="form-control">
                    <option ng-value="null">اي مصدر</option>
                    <option value="waiting_list">قوائم الإنتظار</option>
                    <option value="placement_test">مباشراً بعد تحديد المستوى</option>
                    <option value="batch">المسجلين على مجموعة تدريبية نشطة الآن</option>
                    <option value="manual">إختيار مباشر يدوي</option>
                </select>
            </div>
        </div>

        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                <label>قام بالتسجيل</label>
                <user-search ng-model="filters.params.params.training.enrolled_by"></user-search>
            </div>
        </div>

        <!--
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <label>While on a training path</label>
                <div class="help-block">Trainees who are currently in training, while going through a training path</div>
                <path-search-helper ng-model="filters.params.params.training.path_search"></path-search-helper>
            </div>
        </div>
        -->
    </div>
</div>
                <div ng-show="filters.params.params.scope == 'trained'"><div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <div class="radio">
                    <label>
                        <input ng-model="filters.params.params.trained.scope" value="batch" type="radio"/>
                        الذين اتمموا مجموعة تدريبية محددة
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input ng-model="filters.params.params.trained.scope" value="course" type="radio"/>
                        الذين اتمموا مجموعات لدورة تدريبية محددة
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input ng-model="filters.params.params.trained.scope" value="any" type="radio"/>
                        جميع العملاء الذين اتمموا دورات تدريبية سابقاً
                    </label>
                </div>
            </div>
        </div>

        <div ng-if="filters.params.params.trained.scope == 'batch'" class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <label>المجموعة</label>
                <batch-picker ng-model="filters.params.params.trained.batch_ids"
                              setup="{'multiple': true}"></batch-picker>
            </div>
        </div>

        <div ng-if="filters.params.params.trained.scope == 'course'" class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <label>الدورة</label>
                <course-menu ng-model="filters.params.params.trained.course_id"></course-menu>

                <div class="checkbox margin-top-10">
                    <label >
                        <input ng-model="filters.params.params.trained.then" ng-disabled="! filters.params.params.trained.course_id"
                               ng-true-value="'training_stopped'" ng-false-value="null"
                               type="checkbox"/>
                        <span class="text-warning">عرض فقط المتدربين الذين لم يحصلوا على اي تدريب آخر بعد الدورة المختارة</span>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div ng-if="!! filters.params.params.trained.course_id || !! filters.params.params.trained.batch_id" class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <label>نجح ام لم ينجح؟</label>
                <div>
                    <div class="radio-inline">
                        <label>
                            <input ng-model="filters.params.params.trained.passing" value="passed" type="radio"/>
                            الناجحين فقط
                        </label>
                    </div>
                    <div class="radio-inline">
                        <label>
                            <input ng-model="filters.params.params.trained.passing" value="failed" type="radio"/>
                            الغير ناجحين فقط
                        </label>
                    </div>
                    <div class="radio-inline">
                        <label>
                            <input ng-model="filters.params.params.trained.passing" value="both" type="radio"/>
                            الناجحين وغير الناجحين
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <!--
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <label>While on a training path</label>
                <div class="help-block">
                    Trainees who finished courses during a training path
                </div>
                <path-search-helper ng-model="filters.params.params.trained.path_search"></path-search-helper>
            </div>
        </div>
        -->

        <!--
        <div ng-if="!! filters.params.params.trained.course_id || !! filters.params.params.trained.batch_id" class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <label>And/then ...</label>
                <select ng-model="filters.params.params.trained.then" class="form-control">
                    <option value="stopped">Stopped. And did not start new courses</option>
                    <option value="joined_batch">Joined a batch for a specific course</option>
                    <option value="did_not_join_batch">Did not join a batch for a specific course</option>
                    <option value="waiting">Were added to waiting, for a course</option>
                    <option value="none"> Any scenario. (Show all)</option>
                </select>
            </div>

            <div ng-if="['joined_batch', 'did_not_join_batch', 'waiting'].indexOf(filters.params.params.trained.then) >= 0" class="form-group">
                <label>That course is:</label>
                <course-menu ng-model="filters.params.params.trained.then_course_id"></course-menu>
            </div>
        </div>
        -->
    </div>
</div>
                <div ng-show="filters.params.params.scope == 'inactive'"><div class="row">
        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                <div class="radio">
                    <label>
                        <input name="inactive_status" ng-model="filters.params.params.inactive.status" value="postponed" type="radio"/>
                        العملاء الذين قاموا بالتأجيل (قبل بدء) التدريب - Postponed
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input name="inactive_status" ng-model="filters.params.params.inactive.status" value="paused" type="radio"/>
                        العملاء الذين اوقفوا التدريب (بعد البدء) وطلبوا التأجيل - Paused
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input name="inactive_status" ng-model="filters.params.params.inactive.status" value="canceled" type="radio"/>
                        العملاء الذين طلبوا وقف وإلغاء التدريب بشكل كامل - Canceled
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input name="inactive_status" ng-model="filters.params.params.inactive.status" value="all" type="radio"/>
                        جميع العملاء الغير نشطين
                    </label>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-6">
        	<div class="form-group">
                <label>تاريخ المتابعة لإعادة تنشيط العميل</label>
                <div class="help-block">وقت المتابعة التالي مع العميل (إن وجد او كان مطلوب)</div>
                <time-span-selector ng-model="filters.params.params.inactive.follow_up_date"
                                    options="{'span': null, 'acceptEmpty': true}"></time-span-selector>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-6">
        	<div class="form-group">
                <label>المتابعة مسندة لـ</label>
                <div class="help-block">الموظف المسؤول عن متابعة إعادة تنشيط العميل</div>
                <user-search ng-model="filters.params.params.inactive.followup_assigned_to"></user-search>
            </div>
        </div>

        <div class="col-sm-12 col-md-6">
        	<div class="form-group">
                <label>ملاحظة المتابعة</label>
                <div class="help-block">الملاحظة المرفقة مع متابعة إعادة التنشيط</div>
                <textarea class="form-control" ng-model="filters.params.params.inactive.followup_note" rows="2"></textarea>
            </div>
        </div>
    </div>

    <!--
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                <label>While on a training path</label>
                <path-search-helper ng-model="filters.params.params.inactive.path_search"></path-search-helper>
            </div>
        </div>
    </div>
    --></div>
                <div ng-show="filters.params.params.scope == 'any'"><div class="row">
        
        <!--
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <label>Is/was on a training path</label>
                <div class="help-block">
                    Clients who went through a specific training path
                </div>
                <path-search-helper ng-model="filters.params.params.any.path_search"></path-search-helper>
            </div>
        </div>
        -->

        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                <div class="checkbox">
                    <label>
                        <input ng-model="filters.params.params.any.include_inactive" type="checkbox"/>
                        شمل العملاء الغير نشطين في النتائج
                    </label>
                    <div class="help-block">
                        سيظهر العملاء الغير نشطين (التأجيلات والإلغاءات) ايضاً في النتائج
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

                <div class="rounded p-15 bg-color-body mb-15">
        <div class="grid grid-3cols">
            
                            <div ng-show="filters.params.params.scope !== 'new'" class="grid-cell border-end pe-15">
                    <div class="form-group mb-0">
                        <label>الطلبات</label>
                        <popover content="فلترة العملاء حسب طلباتهم، حالة الدفع، والأقساط"></popover>
                        <div>
                            <order-search-filter ng-model="filters.params.params.order_search"></order-search-filter>
                        </div>
                    </div>
                </div>
            
            <div class="grid-cell">
                <div class="form-group mb-0">
                    <label> مواعيد التدريب المختارة</label>
                    <popover content="عرض العملاء الذين إختاروا مواعيد تدريب محددة"></popover>
                    <time-slots-selector ng-model="filters.params.params.time_slots"
                                         options="{returnIdsOnly: true}"></time-slots-selector>
                </div>
            </div>
        </div>
    </div>

    <div class="rounded p-15 bg-color-body">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-3">
                <div class="form-group">
                    <label>التسجيل على المنصة</label>
                    <select ng-model="filters.params.params.origin" class="form-control input-sm">
                        <option ng-value="null">أي</option>
                        <option value="generic">المضافين يدوياً</option>
                        <option value="lead">عملاء محتملين محولين</option>
                        <option value="register">سجلوا بأنفسهم</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-3">
                <div class="form-group">
                    <label>ترتيب النتائج</label>
                    <select ng-model="filters.params.params.order_by" class="form-control input-sm">
                        <option value="name">الإسم</option>
                        <option value="created_at">تاريخ الإضافة</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-3">
                <div class="form-group">
                    <label>إتجاه الترتيب</label>
                    <select ng-model="filters.params.params.order_dir" class="form-control input-sm">
                        <option value="desc">تصاعدياً</option>
                        <option value="asc">تنازلياً</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-3">
                <div class="form-group">
                    <label>عدد النتائج للصفحة</label>
                    <select ng-model="filters.params.params.paging_per_page" class="form-control input-sm">
                        <option ng-value="10">10</option>
                        <option ng-value="50">50</option>
                        <option ng-value="100">100</option>
                        <option ng-value="200">200</option>
                        <option ng-value="300">300</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="checkbox">
                    <label>
                        <input ng-model="filters.params.params.only_without_user" type="checkbox"/>
                        عرض العملاء الذين ليس لديهم حسابات بعد فقط
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input ng-model="filters.params.params.only_refused_terms"
                               ng-disabled="true"
                               type="checkbox"/>
                        إظهار فقط العملاء الذين لم يوافقوا على سياسات العمل
                    </label>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="checkbox">
                    <label>
                        <input ng-model="filters.params.params.with_trashed" type="checkbox"/>
                        إظهار العملاء المحذوفين ايضاً ضمن النتائج
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input ng-model="filters.params.params.only_with_suspended_users" type="checkbox"/>
                        إظهار العملاء المعطل حساباتهم فقط
                    </label>
                </div>
            </div>
        </div>
    </div>
            </div>

            <!-- Shared filters -->
            <div class="column shared" data-tour="clients.all" data-tour-text="خيارات بحث إضافية لنتائج أكثر دقة">
                <div class="form-group">
        <label>البحث بمعلومات العملاء</label>
        <popover content="يمكنك البحث عن اكثر من عميل مرة واحدة، عن طريق إدخال أكثر من معلومة للبحث (ارقام هاتف مثلا)، كل معلومة في سطر جديد"></popover>
        <textarea ng-model="filters.params.params.search" ng-change="filters.params.onSearchChange()" rows="3"
               placeholder="بحث (متعدد) بالإسم، رقم الهاتف، أو البريد الإلكتروني ..." class="form-control">
        </textarea>
    </div>

    <div class="form-group">
        <label>تم الإضافة في \ بين</label>
        <time-span-selector ng-model="filters.params.params.created_at"
                            options="{'acceptEmpty': true, 'span': null, 'hideSpans': ['tomorrow']}"></time-span-selector>
    </div>

    
    
    <div class="form-group">
        <label>الوسوم</label>
        <tags-menu type="clients" ng-model="filters.params.params.tags"></tags-menu>
    </div>

    
    <div class="form-group">
        <label>قام بالإضافة</label>
        <user-search ng-model="filters.params.params.created_by"></user-search>
    </div>

    <div class="form-group">
        <label>النوع</label>
        <select ng-model="filters.params.params.gender" class="form-control input-sm">
            <option ng-value="null">أي</option>
            <option value="male">ذكر</option>
            <option value="female">انثي</option>
        </select>
    </div>

                </div>
        </div>
    </div>
            </script>
            <script type="text/ng-template" id="clientSearch/results">
                <div id="client-search-results" class="h-100 d-flex flex-column">
        
        <loading-indicator ng-if="clients.clients === null"></loading-indicator>

        
         <div class="alert alert-info m-15" ng-if="clients.clients !== null && clients.clients.data.length == 0">
        
        <i class="fa fa-info-circle"></i>
        <span ng-if="filters.initial">ليس هناك عملاء للعرض. إستخدم خيارات البحث لعرض اي مجموعة محددة من العملاء المسجلين على المنصة.</span>
            <span ng-if="! filters.initial">لم يتم العثور على اي عملاء يطابقوا خيارات البحث المحددة. حاول مرة آخرى بإستخدام خيارات مختلفة.</span>

            <div ng-if="api.inPickerMode()" class="margin-top-15">
                <button ng-click="showFiltersView()" class="btn btn-sm btn-default">
                    <i class="fa fa-sliders"></i> عودة للبحث
                </button>
            </div>
    </div> 

        <div ng-if="clients.clients !== null && clients.clients.data.length > 0" class="h-100 d-flex flex-column">

        
        <div class="flex flex-space-between align-items-center p-15 m-10 rounded bg-color-body">
            <div>
                النتائج من <b>{{ clients.clients.from }}</b> حتى <b>{{ clients.clients.to }}</b>، من إجمالي <b>{{ clients.clients.total }}</b>.

                <span ng-if="!! clients.source.source" ng-switch="clients.source.type">
                    <span ng-switch-when="batch">
                        من على المجموعة :
                        <span ng-repeat="b in clients.source.source" class="text-strong">
                            <a href="{{ b.view_url }}" target="_blank" class="text-underlined">{{ b.name | cut:20 }}</a>
                            <span ng-if="!$last">,&nbsp;</span>
                        </span>
                    </span>

                    <span ng-switch-when="waiting">
                        من على قائمة الإنتظار للدورة 
                        <a href="{{ clients.source.source.waiting_view_url }}" class="text-underlined" target="_blank">{{ clients.source.source.category.name }} &boxh; {{ clients.source.source.name }}</a>
                    </span>

                    <span ng-switch-when="placement">
                        من على إختبار تحديد المستوى 
                        <a href="{{ clients.source.source.view_url }}" class="text-underlined" target="_blank">{{ clients.source.source.name }}</a></span>
                </span>
            </div>

            <div class="flex flex-end flex-margin-items-10 flex-align-items-center">
                <input ng-model="clients.search" type="text" placeholder="بحث ..."
                       class="form-control input-sm"/>
            </div>
        </div>

        
        <!--
        <ul ng-show="! filters.params.sent.origin" class="nav nav-tabs hidden-xs">
            <li ng-repeat="group in clients.grouping.groups" ng-click="clients.grouping.select(group)"
                ng-class="{'active': group == clients.grouping.selected}">
                <a href="">
                    <i ng-class="group.icon" class="icon fa"></i>
                    <span class="title">{{ trans(['clients', 'origin_groups', group.group]) }}</span>
                    <span class="badge">{{ clients.grouping.getGroupClientCount(group) }}</span>
                </a>
            </li>
        </ul>
        -->

        
        <div class="flex-grow-1 overflow-auto p-15" style="height: 600px">
            <table class="table table-auto-full-width table-busy">
                <thead>
                <tr>
                    <th style="width: 10px">
                        <input ng-click="clients.selected.toggleSelectAll()" type="checkbox"/>
                    </th>
                    <th>الإسم</th>

                    <th ng-if="clients.table.showBranchColumn()">الفرع</th>
                    <th ng-if="clients.table.showInactiveColumns()" style="min-width: 220px">
                        متابعات إعادة التنشيط
                        <popover content="المتابعات المجدولة لإعادة تنشيط العميل أو استعادته"></popover>
                    </th>

                                        <!--
                    <th>clients/search.clients.path_amount_remaining</th>
                    -->

                    <th ng-show="clients.table.showWaitingColumn()" style="width: 250px">قوائم الانتظار</th>
                    <th ng-show="clients.table.showPlacementTestsColumn()" style="width: 250px">أنواع اختبارات تحديد المستوى</th>
                    <th ng-show="clients.table.showBatchesColumn()" style="width: 280px">المجموعات</th>

                    <th ng-show="clients.table.showLastActivityColumn()">
                        المرحلة الحالية
                        <popover content="التقدم أو آخر قائمة تم تسجيل العميل عليها: قائمة إنتظار او إختبار تحديد مستوى او مجموعة تدريبية"></popover>
                    </th>

                    <th>
                        إجمالي المدفوع (من البداية)
                        <popover content="إجمالي المبلغ الذي قام العميل بدفعه منذ البداية"></popover>
                    </th>

                    <th>مواعيد التدريب المناسبة</th>

                                            <th>
                            الحساب
                            <popover content="إذا كان لدى العميل حساب على المنصة يستطيع الدخول به ام لا"></popover>
                        </th>
                    
                    <th style="width: 130px">تاريخ الإضافة</th>
                </tr>
                </thead>
                <tbody>
                <tr ng-repeat="client in clients.get() | filter: clients.search">
                    <td>
                        <input checklist-model="clients.selected.clients" id="client-{{ client.id }}"
                               checklist-comparator=".id" checklist-value="client" type="checkbox"/>
                    </td>

                    
                    <td class="cell-wrap" style="min-width: 250px">
                        <div class="d-flex flex-gap-15">
                            <div>
                                <label for="client-{{ client.id }}">
                                    <img ng-src="{{ client.picture_url }}" class="clientPicture small circle" alt=""/>
                                </label>
                            </div>
                            <div>
                                <div ng-if="api.inPickerMode()">
                                    <a href="{{ client.view_url }}" as-popup class="text-underlined">
                                        {{ client.name }}
                                    </a>
                                </div>

                                <a ng-if="!api.inPickerMode()" href="{{ client.view_url }}" class="text-underlined">
                                    {{ client.name }}</a>

                                <ul class="list-inline small text-muted margin-bottom-0 margin-top-5">
                                    <li ng-if="client.red_flag" data-toggle="tooltip" title="تم حظره او لم يوافق على البنود والأحكام">
                                        <i class="fa fa-exclamation-triangle text-danger"></i>
                                    </li>

                                    <li ng-if="client.status === 'active' && ! client.last_training_activity && filters.params.sent.scope !== 'new'">
                                        <span class="is-new-label">جديد</span>
                                    </li>
                                    <li ng-if="client.status !== 'active' && filters.params.sent.scope !== 'inactive'">
                                        <span class="is-inactive-label">غير نشط</span>
                                    </li>
                                    <li>{{ client.public_id }}</li>
                                    <li><phone-number model="client"></phone-number></li>
                                    <li>{{ client.email }}</li>
                                </ul>

                                <div ng-if="client.tags.length" class="pills small mt-10" style="gap: 4px">
                                    <span ng-repeat="tag in client.tags" class="pill" data-toggle="tooltip" title="{{ tag.name }}">
                                        <span class="tag-color-box" ng-style="{'background-color': '#' + tag.color}"></span>
                                        {{ tag.name | cut:12 }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </td>

                    
                    <td ng-if="clients.table.showBranchColumn()">
                        {{ client.branch.name | cut:25 }}
                    </td>

                    
                    <td ng-if="clients.table.showInactiveColumns()" style="min-width: 220px">
                        <div ng-if="! client.deactivation_followups.length">
                            <span class="label label-warning text-normal-size">غير محدد</span>
                        </div>
                        <ul ng-if="client.deactivation_followups.length" class="list-compact">
                            <li ng-repeat="followup in client.deactivation_followups">
                                <span>{{ followup.due_date | datetime:'dmy' }}</span>

                                <div ng-if="followup.assigned_to_name" class="small text-muted mt-10">
                                    مسندة لـ: {{ followup.assigned_to_name }}
                                </div>

                                <div ng-if="followup.note" class="small text-muted text-strong" text-to-dialog="followup.note"></div>
                            </li>
                        </ul>
                    </td>

                    
                    
                    <!--
                    <td>
                        <div ng-if="!! client.current_path">
                            <b>{{ client.current_path.amount_remaining | round }}</b>
                        </div>
                        <div ng-if="! client.current_path">--</div>
                    </td>
                    -->

                    
                    <td ng-if="clients.table.showWaitingColumn()" class="lengthy">
                        <ul class="list-compact">
                            <li ng-repeat="record in client.enrollments track by record.id">
                                <a href="{{ record.course.waiting_view_url }}" class="text-underlined"
                                   target="_blank">
                                    {{ record.course.category.name }} &boxh;
                                    <b>{{ record.course.name }}</b>
                                </a>

                                <ul class="list-inline extra-small text-muted">
                                    <li><span dir="ltr">{{ record.created_at | datetime }}</span></li>
                                </ul>
                            </li>
                        </ul>
                    </td>

                    
                    <td ng-if="clients.table.showPlacementTestsColumn()" class="lengthy">
                        <ul class="list-compact">
                            <li ng-repeat="record in client.enrollments track by record.id">
                                <a href="{{ record.view_url }}" class="text-underlined" target="_blank">
                                    {{ record.test.name }}
                                </a>
                                <ul class="list-inline extra-small text-muted">
                                    <li>({{ record.display_status }})</li>
                                    <li><span dir="ltr">{{ record.created_at | datetime }}</span></li>
                                </ul>
                            </li>
                        </ul>
                    </td>

                    
                    <td ng-if="clients.table.showBatchesColumn()" class="cell-wrap" style="min-width: 280px">
                        <ul class="list-compact mt-5">
                            <li ng-repeat="record in client.enrollments track by record.id">
                                <a href="{{ record.view_url }}" target="_blank" class="text-underlined">{{ record.batch.name }}</a>
                                <ul class="list-inline extra-small text-muted">
                                    <li>({{ record.batch.display_status }})</li>
                                    <li>وقت التسجيل: <span dir="ltr">{{ record.enrolled_at | datetime }}</span></li>
                                </ul>
                            </li>
                        </ul>
                    </td>

                    <td ng-show="clients.table.showLastActivityColumn()" class="lengthy">
                        <div ng-if="!! client.last_training_activity" class="client-training-activity"
                             ng-bind-html="client.last_training_activity.display_title | asHtml">
                        </div>
                        <div ng-if="! client.last_training_activity">--</div>
                    </td>

                    
                    <td ng-class="{'bg-warning': client.total_paid == 0}">
                        {{ client.total_paid | round }}
                    </td>

                    <td class="text-wrap" style="max-width: 200px; min-width: 200px">
                        <div ng-if="client.time_slots.length === 0">
                            --
                        </div>

                        <ul class="list-unstyled small">
                            <li ng-repeat="s in client.time_slots" ng-bind-html="s.html_full_label | asHtml"></li>
                        </ul>
                    </td>

                                            <td>
                            <div ng-if="!! client.user_id">
                                <i class="fa fa-check-circle text-success"></i> نعم
                            </div>

                            <div ng-if="! client.user_id">
                                <i class="fa fa-ban text-warning"></i> لا
                            </div>
                        </td>
                    
                    <td>
                        <span dir="ltr">{{ client.created_at | datetime:'dd/MM/yy, hh a' }}</span>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <pagination data="clients.clients" loader="paginate" class="border-top"></pagination>
    </div>
    </div>
            </script>
        </div>
            </div>
</div>


<?php
// تضمين footer template
include_once __DIR__ . '/../templates/footer.php';
?>
