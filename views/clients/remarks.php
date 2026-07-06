<?php
// إعداد المتغيرات
$pageTitle = 'مهام فريق العمل';
$includeSessionCheck = true;
$includeCSRFRefresh = true;

// تضمين القوالب
include_once __DIR__ . '/../templates/header.php';
include_once __DIR__ . '/../templates/sidebar.php';
?>

<div id="container" class="container-fluid">
<div id="content" class="">
                    <div ng-app="remarksApp" ng-controller="homeController" class="ng-scope">
            <div id="pageTitle" class="d-flex flex-gap-15 flex-wrap flex-rows flex-column-on-mobile align-items-center justify-content-between">
        <div class="flex-grow-1">
            <i class="icon fa fa-icon fa fa-th"></i>
            <span class="title">ادوات متنوعة</span>

                            
                <ul class="breadcrumb inline" style="margin: 0">
                    <li class="breadcrumb-item"></li>

                                            <li class="breadcrumb-item">مهام فريق العمل</li>
                                    </ul>
                    </div>

        <div class="d-flex justify-content-center">
            <div>
                
                            </div>
        </div>
    </div>
            <div>
                <dismissible-hint name="clients.remarks" class="ng-isolate-scope">
    <!-- ngIf: visible --><div ng-if="visible" class="dismissibleHint  d-flex flex-gap-15 align-items-center justify-content-between">
        <div class="d-flex flex-gap-20 align-items-center flex-grow-1">
            <!-- ngIf: icon || img --><div ng-if="icon || img" class="iconHolder hidden-xs ng-scope">
                <!-- ngIf: img -->
                <!-- ngIf: icon --><span ng-if="icon" class="ms icon ng-binding ng-scope">info</span><!-- end ngIf: icon -->
            </div><!-- end ngIf: icon || img -->

            <div class="content flex-grow-1">
                <ng-transclude>
                    من هنا يمكنك إضافة ومتابعة المهام الخاصة بك. سواء التي تم تعينها لك، او قمت أنت بتعينها لمستخدم آخر. يمكن لهذه المهام ان تكون خاصة بأي قسم واي مشروع، كما يمكنك ايضاً ربطها بعميل معين من العملاء المسجلين على المنصة.
                </ng-transclude>
            </div>
        </div>

        <div>
            <!-- ngIf: dismissible --><button ng-click="dismiss()" ng-if="dismissible" class="close ng-scope" type="button">
                <span>×</span>
            </button><!-- end ngIf: dismissible -->
        </div>
    </div><!-- end ngIf: visible --></dismissible-hint>

                
                <!-- ngIf: !filtering.ready -->

                
                <!-- ngIf: filtering.ready --><div ng-if="filtering.ready" class="ng-scope">
                    <ul class="nav nav-tabs">
                        <li ng-class="{'active': filtering.params.tab == 'assigned'}" class="active">
                            <a ng-click="filtering.openTab('assigned')" href="" data-toggle="tab">
                                <i class="icon fa fa-inbox"></i>
                                <span class="title">
                                    المعينة لي
                                </span>
                            </a>
                        </li>
                        <li ng-class="{'active': filtering.params.tab == 'issued'}">
                            <a ng-click="filtering.openTab('issued')" href="" data-toggle="tab">
                                <i class="icon fa fa-users"></i>
                                <span class="title">
                                    المعينة بواسطتي
                                </span>
                            </a>
                        </li>

                                                    <li ng-class="{'active': filtering.params.tab == 'all'}">
                                <a ng-click="filtering.openTab('all')" href="" data-toggle="tab">
                                    <i class="icon fa fa-bars"></i>
                                    <span class="title">
                                        جميع الملحوظات
                                    </span>
                                </a>
                            </li>
                                            </ul>

                    
                    <form class="block style2 ng-pristine ng-valid">
        <div class="block-body">
            <div class="row">
                
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 column-bordered">
                    <div class="form-group">
                        <label>
                            البحث بالعنوان
                        </label>
                        <input ng-model="filtering.params.title" name="title" class="form-control ng-pristine ng-untouched ng-valid ng-empty">
                    </div>
                </div>

                
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 column-bordered">
                    <div class="form-group">
                        <label>العميل</label>

                        
                        <!-- ngIf: !filtering.client.selected --><client-search-input ng-if="!filtering.client.selected" setup="filtering.client.searchSetup" class="ng-scope ng-isolate-scope">
    <div ng-class="{'widget-large': setup.largeInput, 'widget-small': !setup.largeInput, 'withNewClientOption': setup.newClientOption}" class="typeaheadWidget clientSearchInputWidget widget-small">

        <!--The loading indicator-->
        <!-- ngIf: searching -->

        <!--The input-->
        <div ng-class="{'input-group': newClientOption.available}">
            <input ng-model="name" uib-typeahead="client.id as client.name for client in search($viewValue)" typeahead-min-length="setup.minLength" typeahead-wait-ms="700" typeahead-on-select="select($item, $model, $label)" typeahead-loading="searching" typeahead-no-results="noResults" typeahead-template-url="clientOption.html" ng-class="{'input-lg': setup.largeInput}" type="text" class="form-control search-input  ng-empty" placeholder="بحث بالإسم او الرقم او البريد الإلكتروني ..." autocomplete="off" aria-autocomplete="list" aria-expanded="false" aria-owns="typeahead-68-8167"><ul class="dropdown-menu ng-isolate-scope ng-hide" ng-show="isOpen() &amp;&amp; !moveInProgress" ng-style="{top: position().top+'px', left: position().left+'px'}" role="listbox" aria-hidden="true" uib-typeahead-popup="" id="typeahead-68-8167" matches="matches" active="activeIdx" select="select(activeIdx, evt)" move-in-progress="moveInProgress" query="query" position="position" assign-is-open="assignIsOpen(isOpen)" debounce="debounceUpdate" template-url="clientOption.html">
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
</client-search-input><!-- end ngIf: !filtering.client.selected -->

                        
                        <!-- ngIf: filtering.client.selected -->
                    </div>
                </div>

                
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <div class="d-flex flex-space-between flex-align-items-center">
                            <div>
                                <label>التصنيفات</label>
                            </div>
                            <!-- ngIf: filtering.data.labels.length > 0 --><div ng-if="filtering.data.labels.length &gt; 0" class="ng-scope">
                                <button ng-click="openLabelsManager()" class="btn btn-xs btn-default" type="button">
                                    <i class="fa fa-bars"></i>
                                    إدارة التصنيفات
                                </button>
                            </div><!-- end ngIf: filtering.data.labels.length > 0 -->
                        </div>

                        
                        <!-- ngIf: filtering.data.labels.length == 0 -->

                        
                        <!-- ngIf: filtering.data.labels.length > 0 --><div ng-if="filtering.data.labels.length &gt; 0" style="max-height: 120px; overflow: auto" class="ng-scope">
                            <!-- ngRepeat: label in filtering.data.labels --><div ng-repeat="label in filtering.data.labels" uib-tooltip="" class="checkbox-inline ng-scope">
                                <label ng-class="{'text-line-through text-danger': label.deleted_at}" class="ng-binding">
                                    <input checklist-value="label.id" type="checkbox" ng-model="checked" class="ng-scope ng-pristine ng-untouched ng-valid ng-empty" checklist-model="filtering.params.labels"> مطالبة عميل بالدفع
                                </label>
                            </div><!-- end ngRepeat: label in filtering.data.labels --><div ng-repeat="label in filtering.data.labels" uib-tooltip="" class="checkbox-inline ng-scope">
                                <label ng-class="{'text-line-through text-danger': label.deleted_at}" class="ng-binding">
                                    <input checklist-value="label.id" type="checkbox" ng-model="checked" class="ng-scope ng-pristine ng-untouched ng-valid ng-empty" checklist-model="filtering.params.labels"> رد عملية دفع لعميل
                                </label>
                            </div><!-- end ngRepeat: label in filtering.data.labels --><div ng-repeat="label in filtering.data.labels" uib-tooltip="" class="checkbox-inline ng-scope">
                                <label ng-class="{'text-line-through text-danger': label.deleted_at}" class="ng-binding">
                                    <input checklist-value="label.id" type="checkbox" ng-model="checked" class="ng-scope ng-pristine ng-untouched ng-valid ng-empty" checklist-model="filtering.params.labels"> إستكمال ملف عميل
                                </label>
                            </div><!-- end ngRepeat: label in filtering.data.labels -->
                        </div><!-- end ngIf: filtering.data.labels.length > 0 -->
                    </div>
                </div>
            </div>

            <div class="row">
                
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 column-bordered">
                    <div class="form-group">
                        <label>الحالة</label>

                        <select ng-model="filtering.params.status" class="form-control ng-pristine ng-untouched ng-valid ng-empty"><option value="? undefined:undefined ?" selected="selected"></option>
                            <option ng-value="null" value="object:null">أي</option>
                            <option value="unresolved">عرض غير المنتهية فقط</option>
                            <option value="resolved">عرض المنتهية فقط</option>
                        </select>
                    </div>
                </div>

                
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 column-bordered">
                    <div class="form-group">
                        <label>الأهمية</label>

                        <div>
                            <!-- ngRepeat: (level, name) in translation.get('remark_importance_levels') --><div ng-repeat="(level, name) in translation.get('remark_importance_levels')" class="checkbox-inline ng-scope">
                                <label class="ng-binding">
                                    <input checklist-value="level" type="checkbox" ng-model="checked" class="ng-scope ng-pristine ng-untouched ng-valid ng-not-empty" checklist-model="filtering.params.importanceLevels"> عاجلة
                                </label>
                            </div><!-- end ngRepeat: (level, name) in translation.get('remark_importance_levels') --><div ng-repeat="(level, name) in translation.get('remark_importance_levels')" class="checkbox-inline ng-scope">
                                <label class="ng-binding">
                                    <input checklist-value="level" type="checkbox" ng-model="checked" class="ng-scope ng-pristine ng-untouched ng-valid ng-not-empty" checklist-model="filtering.params.importanceLevels"> هامة
                                </label>
                            </div><!-- end ngRepeat: (level, name) in translation.get('remark_importance_levels') --><div ng-repeat="(level, name) in translation.get('remark_importance_levels')" class="checkbox-inline ng-scope">
                                <label class="ng-binding">
                                    <input checklist-value="level" type="checkbox" ng-model="checked" class="ng-scope ng-pristine ng-untouched ng-valid ng-not-empty" checklist-model="filtering.params.importanceLevels"> عادية
                                </label>
                            </div><!-- end ngRepeat: (level, name) in translation.get('remark_importance_levels') -->
                        </div>
                    </div>
                </div>

                                    
                    <div class="col-xs-12 col-sm-12 col-md-3 column-bordered">
                        <div class="form-group">
                            <label>قام بالإضافة</label>
                            <user-search ng-model="filtering.params.created_by" class="ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty">
    <!-- ngIf: !! selected -->

    <!-- ngIf: ! selected --><div ng-if="! selected" ng-class="{'widget-large': setup.largeInput, 'widget-small': !setup.largeInput}" class="typeaheadWidget ng-scope widget-small">
        <!--The input-->
        <div class="input-group">
            <!--The loading indicator-->
            <!-- ngIf: searching -->

            <input ng-model="name" uib-typeahead="user.id as user.name for user in search($viewValue)" typeahead-min-length="setup.minLength" typeahead-wait-ms="700" typeahead-on-select="select($item, $model, $label)" typeahead-loading="searching" typeahead-no-results="noResults" typeahead-template-url="userMenuItem.html" ng-class="{'input-lg': setup.largeInput}" type="text" class="form-control ng-pristine ng-untouched ng-valid ng-empty" placeholder="بحث بالإسم او الرقم او البريد الإلكتروني ..." autocomplete="off" aria-autocomplete="list" aria-expanded="false" aria-owns="typeahead-38-5234"><ul class="dropdown-menu ng-isolate-scope ng-hide" ng-show="isOpen() &amp;&amp; !moveInProgress" ng-style="{top: position().top+'px', left: position().left+'px'}" role="listbox" aria-hidden="true" uib-typeahead-popup="" id="typeahead-38-5234" matches="matches" active="activeIdx" select="select(activeIdx, evt)" move-in-progress="moveInProgress" query="query" position="position" assign-is-open="assignIsOpen(isOpen)" debounce="debounceUpdate" template-url="userMenuItem.html">
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

                    
                    <div class="col-xs-12 col-sm-12 col-md-3">
                        <div class="form-group">
                            <label>معينة لـ</label>
                            <user-search ng-model="filtering.params.assigned_to" class="ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty">
    <!-- ngIf: !! selected -->

    <!-- ngIf: ! selected --><div ng-if="! selected" ng-class="{'widget-large': setup.largeInput, 'widget-small': !setup.largeInput}" class="typeaheadWidget ng-scope widget-small">
        <!--The input-->
        <div class="input-group">
            <!--The loading indicator-->
            <!-- ngIf: searching -->

            <input ng-model="name" uib-typeahead="user.id as user.name for user in search($viewValue)" typeahead-min-length="setup.minLength" typeahead-wait-ms="700" typeahead-on-select="select($item, $model, $label)" typeahead-loading="searching" typeahead-no-results="noResults" typeahead-template-url="userMenuItem.html" ng-class="{'input-lg': setup.largeInput}" type="text" class="form-control ng-pristine ng-untouched ng-valid ng-empty" placeholder="بحث بالإسم او الرقم او البريد الإلكتروني ..." autocomplete="off" aria-autocomplete="list" aria-expanded="false" aria-owns="typeahead-40-883"><ul class="dropdown-menu ng-isolate-scope ng-hide" ng-show="isOpen() &amp;&amp; !moveInProgress" ng-style="{top: position().top+'px', left: position().left+'px'}" role="listbox" aria-hidden="true" uib-typeahead-popup="" id="typeahead-40-883" matches="matches" active="activeIdx" select="select(activeIdx, evt)" move-in-progress="moveInProgress" query="query" position="position" assign-is-open="assignIsOpen(isOpen)" debounce="debounceUpdate" template-url="userMenuItem.html">
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
                
                <div class="col-xs-12 col-sm-12 col-md-3">
                    <div class="form-group">
                        <label>وقت الإضافة</label>
                        <div class="timeSpanSelectorWidget ng-pristine ng-untouched ng-valid ng-isolate-scope ng-not-empty" ng-model="filtering.params.created_at" options="{'span': 'allTime'}">
        <div ng-show="['fromTo', 'date', 'beforeDate'].indexOf(choices.span) &lt; 0" class="form-group margin-bottom-0">
            <select ng-model="choices.span" ng-options="option.span as option.label for option in data.spans" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty"><!-- ngIf: options.acceptEmpty === true --><option label="اليوم" value="string:today">اليوم</option><option label="البارحة" value="string:yesterday">البارحة</option><option label="غداً" value="string:tomorrow">غداً</option><option label="هذا الإسبوع" value="string:thisWeek">هذا الإسبوع</option><option label="الإسبوع السابق" value="string:lastWeek">الإسبوع السابق</option><option label="هذا الشهر" value="string:thisMonth">هذا الشهر</option><option label="الشهر المنقضي" value="string:lastMonth">الشهر المنقضي</option><option label="تاريخ محدد" value="string:date">تاريخ محدد</option><option label="قبل تاريخ" value="string:beforeDate">قبل تاريخ</option><option label="من ... إلى" value="string:fromTo">من ... إلى</option><option label="من البداية" value="string:allTime" selected="selected">من البداية</option></select>
        </div>

        <!-- ngIf: choices.span === 'fromTo' -->

        <!-- ngIf: choices.span === 'date' -->

        <!-- ngIf: choices.span === 'beforeDate' -->
    </div>
                    </div>
                </div>

                
                <div class="col-xs-12 col-sm-12 col-md-3 column-bordered">
                    <div class="form-group">
                        <label>الموعد الأقصى للإتمام</label>
                        <div class="timeSpanSelectorWidget ng-pristine ng-untouched ng-valid ng-isolate-scope ng-not-empty" ng-model="filtering.params.due_date" options="{'span': null, 'acceptEmpty': null}">
        <div ng-show="['fromTo', 'date', 'beforeDate'].indexOf(choices.span) &lt; 0" class="form-group margin-bottom-0">
            <select ng-model="choices.span" ng-options="option.span as option.label for option in data.spans" class="form-control ng-pristine ng-untouched ng-valid ng-empty"><!-- ngIf: options.acceptEmpty === true --><option label="اليوم" value="string:today">اليوم</option><option label="البارحة" value="string:yesterday">البارحة</option><option label="غداً" value="string:tomorrow">غداً</option><option label="هذا الإسبوع" value="string:thisWeek">هذا الإسبوع</option><option label="الإسبوع السابق" value="string:lastWeek">الإسبوع السابق</option><option label="هذا الشهر" value="string:thisMonth">هذا الشهر</option><option label="الشهر المنقضي" value="string:lastMonth">الشهر المنقضي</option><option label="تاريخ محدد" value="string:date">تاريخ محدد</option><option label="قبل تاريخ" value="string:beforeDate">قبل تاريخ</option><option label="من ... إلى" value="string:fromTo">من ... إلى</option><option label="من البداية" value="string:allTime">من البداية</option></select>
        </div>

        <!-- ngIf: choices.span === 'fromTo' -->

        <!-- ngIf: choices.span === 'date' -->

        <!-- ngIf: choices.span === 'beforeDate' -->
    </div>
                    </div>
                </div>

                
                <div class="col-xs-12 col-sm-12 col-md-3">
                    <div class="form-group">
                        <label>&nbsp;</label>
                        <div class="checkbox" style="margin-top: 0">
                            <label>
                                <input ng-model="filtering.params.overdue_only" type="checkbox" class="ng-pristine ng-untouched ng-valid ng-empty">
                                عرض المتأخرة فقط
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="block-footer">
            <button ng-click="filtering.search()" class="btn btn-primary" type="submit">
                <i class="fa fa-search"></i> بحث
            </button>

            <!-- ngIf: filtering.on -->
        </div>
    </form>
                    
                    <!-- ngIf: remarks.list === null -->

    
    <!-- ngIf: remarks.list !== null --><div ng-if="remarks.list !== null" class="block style2 ng-scope">
        <div class="block-title">
            <!-- ngIf: filtering.on -->
            <!-- ngIf: !filtering.on --><span ng-if="!filtering.on" class="title ng-scope">
                المهام
            </span><!-- end ngIf: !filtering.on -->

            <!-- ngIf: remarks.list.total > 0 -->

            <div class="side">
                <button class="btn btn-primary" ng-click="create()">
                    <i class="fa fa-plus-circle"></i> إضافة
                </button>

                <!-- ngIf: remarks.list.total > 0 -->
            </div>
        </div>

        <div class="block-body">
            
            <!-- ngIf: remarks.list.data.length == 0 --><div ng-if="remarks.list.data.length == 0" class="alert alert-info mb-0 ng-scope">
                <i class="fa fa-info-circle"></i>

                <!-- ngIf: filtering.on -->

                <!-- ngIf: ! filtering.on --><span ng-if="! filtering.on" class="ng-scope">
                    ليس هناك اي مهام بعد! إبدأ بإضافة المهام الجديدة وستظهر هنا
                </span><!-- end ngIf: ! filtering.on -->

                <!-- ngIf: filtering.on -->

                <!-- ngIf: !filtering.on --><div ng-if="!filtering.on" class="margin-top-15 ng-scope">
                    <button class="btn btn-primary" ng-click="create()">
                        <i class="fa fa-plus-circle"></i>
                        إضافة مهمة جديدة
                    </button>
                </div><!-- end ngIf: !filtering.on -->
            </div><!-- end ngIf: remarks.list.data.length == 0 -->

            
            <!-- ngIf: remarks.list.data.length > 0 -->
        </div>
    </div><!-- end ngIf: remarks.list !== null -->                </div><!-- end ngIf: filtering.ready -->
            </div>
        </div>
            </div>
</div>


<?php
// تضمين footer template
include_once __DIR__ . '/../templates/footer.php';
?>
