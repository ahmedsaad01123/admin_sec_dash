<?php
// إعداد المتغيرات
$pageTitle = 'تأكيد الاستبقاء';
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
            <i class="icon fa fa-refresh"></i>
            <span class="title">الطلبات</span>

                            
                <ul class="breadcrumb inline" style="margin: 0">
                    <li class="breadcrumb-item"></li>

                                            <li class="breadcrumb-item">تأكيد الاستبقاء</li>
                                    </ul>
                    </div>

        <div class="d-flex justify-content-center">
            <div>
                
                            </div>
        </div>
    </div>
    <div ng-app="app" ng-controller="controller" class="ng-scope">
        <dismissible-hint name="training.orders.retention" class="ng-isolate-scope">
    <!-- ngIf: visible --><div ng-if="visible" class="dismissibleHint  d-flex flex-gap-15 align-items-center justify-content-between">
        <div class="d-flex flex-gap-20 align-items-center flex-grow-1">
            <!-- ngIf: icon || img --><div ng-if="icon || img" class="iconHolder hidden-xs ng-scope">
                <!-- ngIf: img -->
                <!-- ngIf: icon --><span ng-if="icon" class="ms icon ng-binding ng-scope">info</span><!-- end ngIf: icon -->
            </div><!-- end ngIf: icon || img -->

            <div class="content flex-grow-1">
                <ng-transclude>
            تعرض هذه الصفحة العملاء الذين لديهم طلبات متعددة الدورات وأكملوا دورة واحدة على الأقل ولديهم دورات متبقية بانتظار التسجيل، هذا بجانب انهم إختاروا خطة دفع بها اقساط وليس من دفعة واحدة مقدمة. تابع محاولات التواصل وحدد ما إذا كان العميل سيستمر أو سينسحب.
        </ng-transclude>
            </div>
        </div>

        <div>
            <!-- ngIf: dismissible --><button ng-click="dismiss()" ng-if="dismissible" class="close ng-scope" type="button">
                <span>×</span>
            </button><!-- end ngIf: dismissible -->
        </div>
    </div><!-- end ngIf: visible --></dismissible-hint>

        <div id="retention-page" class="block style2 mb-0 d-flex">
            <div class="retention-filters retention-panel d-flex flex-column">
    <div class="flex-grow-1 retention-panel-scrollable p-15">
        <!-- Order Search Filter -->
        <div class="form-group">
            <label>بحث الطلب</label>
            <div>
                <order-search-filter dataloader-param="clients.getParam('orderFilter')" class="ng-isolate-scope">
                <button type="button" class="btn btn-default" ng-click="openDialog()" ng-class="{'btn-info': hasActiveFilters(), 'btn-default': !hasActiveFilters()}">
                    <i class="fa fa-shopping-cart"></i>
                    <span ng-bind="trans('order_filter.button_label')" class="ng-binding">الطلبات</span>
                    <!-- ngIf: hasActiveFilters() -->
                </button>
            </order-search-filter>
            </div>
        </div>

        <!-- Retention Status Filter -->
        <div class="form-group">
            <label>حالة الاستبقاء</label>
            <popover content="معلّق: لم يتم التواصل بعد أو لم يتخذ قرار. مؤكد: العميل أكد أنه سيستمر. منسحب: العميل قرر عدم الاستمرار." class="ng-isolate-scope"><i uib-popover="معلّق: لم يتم التواصل بعد أو لم يتخذ قرار. مؤكد: العميل أكد أنه سيستمر. منسحب: العميل قرر عدم الاستمرار." popover-title="" popover-trigger="'mouseenter'" popover-placement="" class="popover-hint fa fa-question-circle"></i></popover>
            <div class="btn-group btn-group-justified">
                <a class="btn btn-sm btn-primary" ng-class="clients.getParam('retentionStatus').value.is('pending') ? 'btn-primary' : 'btn-default'" ng-click="clients.getParam('retentionStatus').setValue('pending')">
                    معلّق
                </a>
                <a class="btn btn-sm btn-default" ng-class="clients.getParam('retentionStatus').value.is('confirmed') ? 'btn-primary' : 'btn-default'" ng-click="clients.getParam('retentionStatus').setValue('confirmed')">
                    مؤكد
                </a>
                <a class="btn btn-sm btn-default" ng-class="clients.getParam('retentionStatus').value.is('churned') ? 'btn-primary' : 'btn-default'" ng-click="clients.getParam('retentionStatus').setValue('churned')">
                    منسحب
                </a>
                <a class="btn btn-sm btn-default" ng-class="clients.getParam('retentionStatus').value.is('all') ? 'btn-primary' : 'btn-default'" ng-click="clients.getParam('retentionStatus').setValue('all')">
                    الكل
                </a>
            </div>
        </div>

        <!-- Retention Payment Filter -->
        <div class="form-group">
            <label>دفعة الاستبقاء</label>
            <div class="btn-group btn-group-justified">
                <a class="btn btn-sm btn-primary" ng-class="clients.getParam('retentionPayment').value.is('all') ? 'btn-primary' : 'btn-default'" ng-click="clients.getParam('retentionPayment').setValue('all')">
                    الكل
                </a>
                <a class="btn btn-sm btn-default" ng-class="clients.getParam('retentionPayment').value.is('paid') ? 'btn-primary' : 'btn-default'" ng-click="clients.getParam('retentionPayment').setValue('paid')">
                    مدفوع
                </a>
                <a class="btn btn-sm btn-default" ng-class="clients.getParam('retentionPayment').value.is('not_paid') ? 'btn-primary' : 'btn-default'" ng-click="clients.getParam('retentionPayment').setValue('not_paid')">
                    غير مدفوع
                </a>
            </div>
        </div>

        <!-- Next Course Filter -->
        <div class="form-group">
            <label>الدورة التالية</label>
            <course-menu dataloader-param="clients.getParam('nextCourseId')" class="ng-isolate-scope"><div class="course-menu ng-scope">
        
        <!-- ngIf: !data.courses.length -->

        
        <div ng-show="data.courses.length &gt; 0" ng-switch="searchMode">
            <!-- ngSwitchWhen: false --><div ng-switch-when="false" class="input-group ng-scope">
                <select ng-model="$parent.selected" ng-required="setup.required" ng-disabled="disabled" class="form-control has-groups ng-pristine ng-untouched ng-valid ng-empty ng-valid-required">
                    <option value="" selected="selected">&nbsp;</option>

                    <!-- ngRepeat: category in data.categories --><optgroup ng-repeat="category in data.categories" label="[ Business Development ]" class="ng-scope">
                        <!-- ngRepeat: course in getCategoryCourses(category) --><option ng-repeat="course in getCategoryCourses(category)" ng-value="course" class="ng-binding ng-scope" value="object:33">
                            Digital Marketing Strateg ... (BUS-DIG-MARK)
                        </option><!-- end ngRepeat: course in getCategoryCourses(category) --><option ng-repeat="course in getCategoryCourses(category)" ng-value="course" class="ng-binding ng-scope" value="object:34">
                            Business Planning and Str ... (BUS-PLN-STR)
                        </option><!-- end ngRepeat: course in getCategoryCourses(category) -->
                    </optgroup><!-- end ngRepeat: category in data.categories --><optgroup ng-repeat="category in data.categories" label="[ General English ]" class="ng-scope">
                        <!-- ngRepeat: course in getCategoryCourses(category) --><option ng-repeat="course in getCategoryCourses(category)" ng-value="course" class="ng-binding ng-scope" value="object:37">
                            General English - Level 1 (GEN-1)
                        </option><!-- end ngRepeat: course in getCategoryCourses(category) --><option ng-repeat="course in getCategoryCourses(category)" ng-value="course" class="ng-binding ng-scope" value="object:38">
                            General English - Level 2 (GEN-2)
                        </option><!-- end ngRepeat: course in getCategoryCourses(category) --><option ng-repeat="course in getCategoryCourses(category)" ng-value="course" class="ng-binding ng-scope" value="object:39">
                            General English - Level 3 (GEN-3)
                        </option><!-- end ngRepeat: course in getCategoryCourses(category) -->
                    </optgroup><!-- end ngRepeat: category in data.categories --><optgroup ng-repeat="category in data.categories" label="[ Web Development ]" class="ng-scope">
                        <!-- ngRepeat: course in getCategoryCourses(category) --><option ng-repeat="course in getCategoryCourses(category)" ng-value="course" class="ng-binding ng-scope" value="object:43">
                            User Experience Basics (WEB-UX)
                        </option><!-- end ngRepeat: course in getCategoryCourses(category) --><option ng-repeat="course in getCategoryCourses(category)" ng-value="course" class="ng-binding ng-scope" value="object:44">
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

        <!-- Followup Status Filter -->
        <div class="form-group">
            <label>حالة المتابعة</label>
            <popover content="تصفية العملاء حسب عدد متابعات الاستبقاء التي تمت على دورتهم التالية." class="ng-isolate-scope"><i uib-popover="تصفية العملاء حسب عدد متابعات الاستبقاء التي تمت على دورتهم التالية." popover-title="" popover-trigger="'mouseenter'" popover-placement="" class="popover-hint fa fa-question-circle"></i></popover>
            <select class="form-control ng-isolate-scope" dataloader-param-model="clients.getParam('followupStatus')">
                <option value="all">الكل</option>
                <option value="never">بدون متابعات تماماً</option>
                <option value="once">متابعة واحدة</option>
                <option value="three">3 متابعات</option>
                <option value="more_than_three">أكثر من 3 متابعات</option>
                <option value="time_span">خلال فترة زمنية</option>
            </select>
        </div>

        <!-- Time span selector (shown when followup status is time_span) -->
        <!-- ngIf: clients.getParam('followupStatus').value.is('time_span') -->

        <!-- Client Tags Filter -->
        <div class="form-group">
            <label>وسوم العملاء</label>
            <div class="tags-menu pills align-items-center ng-isolate-scope" type="clients" dataloader-param="clients.getParam('clientTagIds')">
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

        <hr class="dashed">

        <!-- Results per page -->
        <div class="form-group mb-0">
            <label>عدد النتائج بالصفحة</label>
            <select dataloader-param-model="clients.getParam('perPage')" class="form-control ng-isolate-scope">
                <!-- ngRepeat: (i, n) in clients.getParam('perPage').value.getOptions() --><option ng-repeat="(i, n) in clients.getParam('perPage').value.getOptions()" ng-value="n" class="ng-binding ng-scope" value="50">50</option><!-- end ngRepeat: (i, n) in clients.getParam('perPage').value.getOptions() --><option ng-repeat="(i, n) in clients.getParam('perPage').value.getOptions()" ng-value="n" class="ng-binding ng-scope" value="100">100</option><!-- end ngRepeat: (i, n) in clients.getParam('perPage').value.getOptions() --><option ng-repeat="(i, n) in clients.getParam('perPage').value.getOptions()" ng-value="n" class="ng-binding ng-scope" value="200">200</option><!-- end ngRepeat: (i, n) in clients.getParam('perPage').value.getOptions() -->
            </select>
        </div>
    </div>
    <div class="p-10 border-top">
        <button class="btn btn-primary" ng-click="clients.filter()" ng-disabled="clients.isLoading()">
            <i class="fa fa-search"></i>
            تطبيق
        </button>
        <!-- ngIf: clients.isFilteringOn() -->
    </div>
</div>
            <div class="retention-client-list retention-panel d-flex flex-column">
    <!-- Header -->
    <div class="p-10 border-bottom d-flex align-items-center flex-wrap justify-content-between flex-gap-10">
        <div>
            <span class="text-strong">العملاء</span>
            <!-- ngIf: clients.isLoaded() --><span class="badge ng-binding ng-scope" ng-if="clients.isLoaded()">0</span><!-- end ngIf: clients.isLoaded() -->
        </div>

        <!-- ngIf: statusCounts && clients.getTotal() > 0 -->
    </div>

    <!-- Scrollable list -->
    <div class="flex-grow-1 retention-panel-scrollable">
        <!-- Loading -->
        <!-- ngIf: clients.isLoading() -->

        <!-- Empty State - No filters applied -->
        <!-- ngIf: !clients.isLoading() && clients.isEmpty() && !clients.isFilteringOn() --><div ng-if="!clients.isLoading() &amp;&amp; clients.isEmpty() &amp;&amp; !clients.isFilteringOn()" class="p-20 text-center ng-scope">
            <i class="fa fa-inbox fa-2x text-muted"></i>
            <p class="mt-15">لا يوجد عملاء للاستبقاء.</p>
        </div><!-- end ngIf: !clients.isLoading() && clients.isEmpty() && !clients.isFilteringOn() -->

        <!-- Empty State - Filters applied -->
        <!-- ngIf: !clients.isLoading() && clients.isEmpty() && clients.isFilteringOn() -->

        <!-- Client List -->
        <!-- ngIf: !clients.isLoading() && !clients.isEmpty() -->
    </div>

    <!-- Pagination -->
    <!-- ngIf: clients.pagination.showControls() -->

    <!-- Export -->
    <!-- ngIf: !clients.isEmpty() -->
</div>
            <div class="retention-detail flex-grow-1 d-flex flex-column">
    <!-- Empty state when no client selected -->
    <!-- ngIf: !selectedOrderId --><div ng-if="!selectedOrderId" class="flex-grow-1 d-flex align-items-center justify-content-center ng-scope">
        <div class="text-center text-muted">
            <i class="fa fa-user fa-2x"></i>
            <p class="mt-15">اختر عميلاً من القائمة لعرض التفاصيل.</p>
        </div>
    </div><!-- end ngIf: !selectedOrderId -->

    <!-- Selected client view -->
    <!-- ngIf: selectedOrderId -->
</div>
        </div>
    </div>
        </div>
</div>



<?php
// تضمين footer template
include_once __DIR__ . '/../templates/footer.php';
?>
