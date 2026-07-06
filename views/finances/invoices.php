<?php
// إعداد المتغيرات
$pageTitle = 'الفواتير';
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
            <i class="icon fa fa-dollar"></i>
            <span class="title">الماليات</span>

                            
                <ul class="breadcrumb inline" style="margin: 0">
                    <li class="breadcrumb-item"></li>

                                            <li class="breadcrumb-item">الفواتير</li>
                                    </ul>
                    </div>

        <div class="d-flex justify-content-center">
            <div>
                                    <a href="/finances/invoices/create" class="btn btn-sm btn-primary">
                <i class="fa fa-credit-card-alt"></i> إصدار فاتورة جديدة
            </a>
            
                            </div>
        </div>
    </div>
                <div ng-app="invoicesApp" ng-controller="controller" class="ng-scope">
            
            
            <ul class="nav nav-tabs">
                <li ng-class="{'active': invoices.filtering.params.tab === 'all'}" class="active">
                    <a ng-click="invoices.load('all')" href="">
                        <i class="icon fa fa-bars"></i>
                        <span class="title">كافة الفواتير</span>
                    </a>
                </li>
                <li ng-class="{'active': invoices.filtering.params.tab === 'paid'}">
                    <a ng-click="invoices.load('paid')" href="">
                        <i class="icon fa fa-check-circle"></i>
                        <span class="title">المدفوعة فقط</span>
                    </a>
                </li>
                <li ng-class="{'active': invoices.filtering.params.tab === 'unpaid'}">
                    <a ng-click="invoices.load('unpaid')" href="">
                        <i class="icon fa fa-exclamation-triangle"></i>
                        <span class="title">الغير مدفوعة فقط</span>
                    </a>
                </li>
                <li ng-class="{'active': invoices.filtering.params.tab === 'mine'}">
                    <a ng-click="invoices.load('mine')" href="">
                        <i class="icon fa fa-user"></i>
                        <span class="title">الصادرة بواسطتي</span>
                    </a>
                </li>
            </ul>

            
            <form name="filteringForm" class="ng-pristine ng-valid ng-valid-required">
        <div class="block style2">
            <!--
            <div class="block-title">
                <i class="icon fa fa-filter"></i>
                <span class="title">التصفية</span>
            </div>
            -->

            <div class="block-body" style="padding-bottom: 0">

                <div class="row">

                    
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 column-bordered">
                        <div>
                            <div class="form-group">
        <label>جهة الدفع</label>
        <div>
            <div class="radio-inline">
                <label>
                    <input ng-model="invoices.filtering.params.payerType" value="client" type="radio" class="ng-pristine ng-untouched ng-valid ng-empty" name="3">
                    العميل
                </label>
            </div>
            <div class="radio-inline">
                <label>
                    <input ng-model="invoices.filtering.params.payerType" value="lead" type="radio" class="ng-pristine ng-untouched ng-valid ng-empty" name="4">
                    العميل المحتمل
                </label>
            </div>
        </div>
    </div>

    <!-- ngIf: invoices.filtering.params.payerType === 'client' -->

    <!-- ngIf: invoices.filtering.params.payerType === 'lead' -->
                        </div>
                    </div>

                    
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 column-bordered">
                        <div class="form-group">
                            <label>قائمة انتظار</label>
                            <course-menu ng-model="invoices.filtering.params.waitingCourseId" api="invoices.filtering.waitingList.api" class="ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty"><div class="course-menu ng-scope">
        
        <!-- ngIf: !data.courses.length -->

        
        <div ng-show="data.courses.length &gt; 0" ng-switch="searchMode">
            <!-- ngSwitchWhen: false --><div ng-switch-when="false" class="input-group ng-scope">
                <select ng-model="$parent.selected" ng-required="setup.required" ng-disabled="disabled" class="form-control has-groups ng-pristine ng-untouched ng-valid ng-empty ng-valid-required">
                    <option value="" selected="selected">&nbsp;</option>

                    <!-- ngRepeat: category in data.categories --><optgroup ng-repeat="category in data.categories" label="[ Business Development ]" class="ng-scope">
                        <!-- ngRepeat: course in getCategoryCourses(category) --><option ng-repeat="course in getCategoryCourses(category)" ng-value="course" class="ng-binding ng-scope" value="object:45">
                            Digital Marketing Strateg ... (BUS-DIG-MARK)
                        </option><!-- end ngRepeat: course in getCategoryCourses(category) --><option ng-repeat="course in getCategoryCourses(category)" ng-value="course" class="ng-binding ng-scope" value="object:46">
                            Business Planning and Str ... (BUS-PLN-STR)
                        </option><!-- end ngRepeat: course in getCategoryCourses(category) -->
                    </optgroup><!-- end ngRepeat: category in data.categories --><optgroup ng-repeat="category in data.categories" label="[ General English ]" class="ng-scope">
                        <!-- ngRepeat: course in getCategoryCourses(category) --><option ng-repeat="course in getCategoryCourses(category)" ng-value="course" class="ng-binding ng-scope" value="object:49">
                            General English - Level 1 (GEN-1)
                        </option><!-- end ngRepeat: course in getCategoryCourses(category) --><option ng-repeat="course in getCategoryCourses(category)" ng-value="course" class="ng-binding ng-scope" value="object:50">
                            General English - Level 2 (GEN-2)
                        </option><!-- end ngRepeat: course in getCategoryCourses(category) --><option ng-repeat="course in getCategoryCourses(category)" ng-value="course" class="ng-binding ng-scope" value="object:51">
                            General English - Level 3 (GEN-3)
                        </option><!-- end ngRepeat: course in getCategoryCourses(category) -->
                    </optgroup><!-- end ngRepeat: category in data.categories --><optgroup ng-repeat="category in data.categories" label="[ Web Development ]" class="ng-scope">
                        <!-- ngRepeat: course in getCategoryCourses(category) --><option ng-repeat="course in getCategoryCourses(category)" ng-value="course" class="ng-binding ng-scope" value="object:55">
                            User Experience Basics (WEB-UX)
                        </option><!-- end ngRepeat: course in getCategoryCourses(category) --><option ng-repeat="course in getCategoryCourses(category)" ng-value="course" class="ng-binding ng-scope" value="object:56">
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

                    <!-- ngIf: invoices.filtering.params.tab != 'mine' --><div ng-if="invoices.filtering.params.tab != 'mine'" class="col-xs-12 col-sm-12 col-md-3 col-lg-3 column-bordered ng-scope">
                        <div class="form-group margin-bottom-0">
                            <label>قام بالإضافة</label>
                            <user-search ng-model="invoices.filtering.params.byUserId" class="ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty">
    <!-- ngIf: !! selected -->

    <!-- ngIf: ! selected --><div ng-if="! selected" ng-class="{'widget-large': setup.largeInput, 'widget-small': !setup.largeInput}" class="typeaheadWidget ng-scope widget-small">
        <!--The input-->
        <div class="input-group">
            <!--The loading indicator-->
            <!-- ngIf: searching -->

            <input ng-model="name" uib-typeahead="user.id as user.name for user in search($viewValue)" typeahead-min-length="setup.minLength" typeahead-wait-ms="700" typeahead-on-select="select($item, $model, $label)" typeahead-loading="searching" typeahead-no-results="noResults" typeahead-template-url="userMenuItem.html" ng-class="{'input-lg': setup.largeInput}" type="text" class="form-control ng-pristine ng-untouched ng-valid ng-empty" placeholder="بحث بالإسم او الرقم او البريد الإلكتروني ..." autocomplete="off" aria-autocomplete="list" aria-expanded="false" aria-owns="typeahead-36-1245"><ul class="dropdown-menu ng-isolate-scope ng-hide" ng-show="isOpen() &amp;&amp; !moveInProgress" ng-style="{top: position().top+'px', left: position().left+'px'}" role="listbox" aria-hidden="true" uib-typeahead-popup="" id="typeahead-36-1245" matches="matches" active="activeIdx" select="select(activeIdx, evt)" move-in-progress="moveInProgress" query="query" position="position" assign-is-open="assignIsOpen(isOpen)" debounce="debounceUpdate" template-url="userMenuItem.html">
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
                            <!--
                            <select ng-model="invoices.filtering.params.byUserId"
                                    name="created_by" class="form-control">
                                <option value="" selected>[Any user]</option>
                                <option ng-repeat="user in invoices.filtering.data.users"
                                        value="{{ user.id }}">{{ user.name }}</option>
                            </select>
                            -->
                        </div>
                    </div><!-- end ngIf: invoices.filtering.params.tab != 'mine' -->

                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label>وقت الإضافة</label>
                            <div class="timeSpanSelectorWidget ng-isolate-scope" setter="invoices.filtering.createdAt.setter" options="invoices.filtering.createdAt.options" is-valid="invoices.filtering.createdAt.isValid">
        <div ng-show="['fromTo', 'date', 'beforeDate'].indexOf(choices.span) &lt; 0" class="form-group margin-bottom-0">
            <select ng-model="choices.span" ng-options="option.span as option.label for option in data.spans" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty"><!-- ngIf: options.acceptEmpty === true --><option label="اليوم" value="string:today">اليوم</option><option label="البارحة" value="string:yesterday">البارحة</option><option label="غداً" value="string:tomorrow">غداً</option><option label="هذا الإسبوع" value="string:thisWeek">هذا الإسبوع</option><option label="الإسبوع السابق" value="string:lastWeek">الإسبوع السابق</option><option label="هذا الشهر" value="string:thisMonth">هذا الشهر</option><option label="الشهر المنقضي" value="string:lastMonth">الشهر المنقضي</option><option label="تاريخ محدد" value="string:date">تاريخ محدد</option><option label="قبل تاريخ" value="string:beforeDate">قبل تاريخ</option><option label="من ... إلى" value="string:fromTo">من ... إلى</option><option label="من البداية" value="string:allTime" selected="selected">من البداية</option></select>
        </div>

        <!-- ngIf: choices.span === 'fromTo' -->

        <!-- ngIf: choices.span === 'date' -->

        <!-- ngIf: choices.span === 'beforeDate' -->
    </div>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label>تم الدفع في</label>
                            <div class="timeSpanSelectorWidget ng-isolate-scope" setter="invoices.filtering.paidAt.setter" options="invoices.filtering.paidAt.options" is-valid="invoices.filtering.paidAt.isValid">
        <div ng-show="['fromTo', 'date', 'beforeDate'].indexOf(choices.span) &lt; 0" class="form-group margin-bottom-0">
            <select ng-model="choices.span" ng-options="option.span as option.label for option in data.spans" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty"><!-- ngIf: options.acceptEmpty === true --><option label="اليوم" value="string:today">اليوم</option><option label="البارحة" value="string:yesterday">البارحة</option><option label="غداً" value="string:tomorrow">غداً</option><option label="هذا الإسبوع" value="string:thisWeek">هذا الإسبوع</option><option label="الإسبوع السابق" value="string:lastWeek">الإسبوع السابق</option><option label="هذا الشهر" value="string:thisMonth">هذا الشهر</option><option label="الشهر المنقضي" value="string:lastMonth">الشهر المنقضي</option><option label="تاريخ محدد" value="string:date">تاريخ محدد</option><option label="قبل تاريخ" value="string:beforeDate">قبل تاريخ</option><option label="من ... إلى" value="string:fromTo">من ... إلى</option><option label="من البداية" value="string:allTime" selected="selected">من البداية</option></select>
        </div>

        <!-- ngIf: choices.span === 'fromTo' -->

        <!-- ngIf: choices.span === 'date' -->

        <!-- ngIf: choices.span === 'beforeDate' -->
    </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="block-footer">
                <button ng-click="invoices.filtering.search()" ng-disabled="!invoices.filtering.isValid()" class="btn btn-sm btn-primary" type="submit">
                    <i class="fa fa-search"></i> بحث
                </button>
                <!-- ngIf: invoices.filtering.on -->
            </div>
        </div>
    </form>
            
            <!-- ngIf: invoices.list === null -->

            
            <!-- ngIf: invoices.list !== null && invoices.list.data.length == 0 --><div ng-if="invoices.list !== null &amp;&amp; invoices.list.data.length == 0" class="alert alert-info ng-scope">
                <i class="fa fa-info-circle"></i>

                <!-- ngIf: !invoices.filtering.on --><span ng-if="!invoices.filtering.on" class="ng-scope">ليس هناك فواتير مضافة بعد. فور ان يتم إضافة فاتورة جديدة ستظهر هنا حيث يمكنك متابعتها ومعرفة
			حالة الدفع الخاص يها.</span><!-- end ngIf: !invoices.filtering.on -->
                <!-- ngIf: invoices.filtering.on -->
            </div><!-- end ngIf: invoices.list !== null && invoices.list.data.length == 0 -->

            
            <!-- ngIf: invoices.list !== null && invoices.list.data.length > 0 -->

            <!--
            <script type="text/ng-template" id="invoiceGatewayRequestsLog.html">
                
            </script>
            -->
        </div>

                </div>
</div>

<?php
// تضمين footer template
include_once __DIR__ . '/../templates/footer.php';
?>
