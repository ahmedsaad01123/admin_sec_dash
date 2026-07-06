<?php
// إعداد المتغيرات
$pageTitle = 'التسجيل';
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
            <i class="icon fa fa-user-plus"></i>
            <span class="title">الطلبات</span>

                            
                <ul class="breadcrumb inline" style="margin: 0">
                    <li class="breadcrumb-item"></li>

                                            <li class="breadcrumb-item">التسجيل</li>
                                    </ul>
                    </div>

        <div class="d-flex justify-content-center">
            <div>
                
                            </div>
        </div>
    </div>
    <div ng-app="app" ng-controller="controller" class="ng-scope">
        <dismissible-hint name="training.orders.enrollment" class="ng-isolate-scope">
    <!-- ngIf: visible --><div ng-if="visible" class="dismissibleHint  d-flex flex-gap-15 align-items-center justify-content-between">
        <div class="d-flex flex-gap-20 align-items-center flex-grow-1">
            <!-- ngIf: icon || img --><div ng-if="icon || img" class="iconHolder hidden-xs ng-scope">
                <!-- ngIf: img -->
                <!-- ngIf: icon --><span ng-if="icon" class="ms icon ng-binding ng-scope">info</span><!-- end ngIf: icon -->
            </div><!-- end ngIf: icon || img -->

            <div class="content flex-grow-1">
                <ng-transclude>
            تعرض هذه الصفحة العملاء الذين لديهم طلبات تدريب بدورات محددة ولكن لم يتم تسجيلهم في مجموعات تدريبية بعد. يمكنك من هنا تسجيلهم في مجموعات جديدة أو إضافتهم لقوائم الانتظار.
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
            <!-- Filters Column -->
            <div class="col-md-3">
                <div class="block style2">
    <div class="block-body">
        <!-- Order Search Filter -->
        <div class="form-group">
            <label>مواصفات طلب التدريب</label>
            <div>
                <order-search-filter dataloader-param="orders.getParam('orderFilter')" class="ng-isolate-scope">
                <button type="button" class="btn btn-default" ng-click="openDialog()" ng-class="{'btn-info': hasActiveFilters(), 'btn-default': !hasActiveFilters()}">
                    <i class="fa fa-shopping-cart"></i>
                    <span ng-bind="trans('order_filter.button_label')" class="ng-binding">الطلبات</span>
                    <!-- ngIf: hasActiveFilters() -->
                </button>
            </order-search-filter>
            </div>
        </div>

        <!-- Enrollment Target Filter -->
        <div class="form-group">
            <label>هدف التسجيل</label>
            <popover content="يتحكم في عدد الدورات المعروضة لكل طلب. الدورة التالية فقط: يعرض فقط أول دورة بانتظار التسجيل على مجموعة لكل طلب، بينما جميع الدورات تعرض كل الدورات التي لا تزال بانتظار التسجيل." class="ng-isolate-scope"><i uib-popover="يتحكم في عدد الدورات المعروضة لكل طلب. الدورة التالية فقط: يعرض فقط أول دورة بانتظار التسجيل على مجموعة لكل طلب، بينما جميع الدورات تعرض كل الدورات التي لا تزال بانتظار التسجيل." popover-title="" popover-trigger="'mouseenter'" popover-placement="" class="popover-hint fa fa-question-circle"></i></popover>
            <div class="btn-group btn-group-justified">
                <a class="btn btn-sm btn-primary" ng-class="orders.getParam('enrollmentTarget').value.get() === 'next' ? 'btn-primary' : 'btn-default'" ng-click="orders.getParam('enrollmentTarget').value.set('next')">
                    الدورة التالية فقط
                </a>
                <a class="btn btn-sm btn-default" ng-class="orders.getParam('enrollmentTarget').value.get() === 'all' ? 'btn-primary' : 'btn-default'" ng-click="orders.getParam('enrollmentTarget').value.set('all')">
                    جميع الدورات
                </a>
            </div>
        </div>

        <!-- Retention Filter -->
        <div class="form-group">
            <label>حالة الاستبقاء</label>
            <popover content="التصفية حسب تأكيد الاستبقاء. &quot;المؤكدة فقط&quot; تخفي طلبات الاستبقاء التي لم يتم تأكيد دورتها التالية بعد، وتعرض فقط الطلبات الجاهزة للتسجيل." class="ng-isolate-scope"><i uib-popover="التصفية حسب تأكيد الاستبقاء. &quot;المؤكدة فقط&quot; تخفي طلبات الاستبقاء التي لم يتم تأكيد دورتها التالية بعد، وتعرض فقط الطلبات الجاهزة للتسجيل." popover-title="" popover-trigger="'mouseenter'" popover-placement="" class="popover-hint fa fa-question-circle"></i></popover>
            <div class="btn-group btn-group-justified">
                <a class="btn btn-sm btn-primary" ng-class="orders.getParam('retentionFilter').value.get() === 'all' ? 'btn-primary' : 'btn-default'" ng-click="orders.getParam('retentionFilter').value.set('all')">
                    الكل
                </a>
                <a class="btn btn-sm btn-default" ng-class="orders.getParam('retentionFilter').value.get() === 'confirmed_only' ? 'btn-primary' : 'btn-default'" ng-click="orders.getParam('retentionFilter').value.set('confirmed_only')">
                    المؤكدة فقط
                </a>
            </div>
        </div>

        <!-- Waiting Status Filter -->
        <div class="form-group">
            <label>حالة الانتظار على الإنتظار</label>
            <popover content="تصفية الطلبات حسب وجود دورات في قائمة الانتظار. في الانتظار: يعرض فقط الطلبات التي تحتوي على دورة واحدة على الأقل في قائمة الانتظار. ليس في الانتظار: يعرض الطلبات التي ليس لها دورات في قوائم الانتظار." class="ng-isolate-scope"><i uib-popover="تصفية الطلبات حسب وجود دورات في قائمة الانتظار. في الانتظار: يعرض فقط الطلبات التي تحتوي على دورة واحدة على الأقل في قائمة الانتظار. ليس في الانتظار: يعرض الطلبات التي ليس لها دورات في قوائم الانتظار." popover-title="" popover-trigger="'mouseenter'" popover-placement="" class="popover-hint fa fa-question-circle"></i></popover>
            <div class="btn-group btn-group-justified">
                <a class="btn btn-sm btn-primary" ng-class="orders.getParam('waitingStatus').value.get() === 'any' ? 'btn-primary' : 'btn-default'" ng-click="orders.getParam('waitingStatus').value.set('any')">
                    الكل
                </a>
                <a class="btn btn-sm btn-default" ng-class="orders.getParam('waitingStatus').value.get() === 'waiting' ? 'btn-primary' : 'btn-default'" ng-click="orders.getParam('waitingStatus').value.set('waiting')">
                    في الانتظار
                </a>
                <a class="btn btn-sm btn-default" ng-class="orders.getParam('waitingStatus').value.get() === 'not_waiting' ? 'btn-primary' : 'btn-default'" ng-click="orders.getParam('waitingStatus').value.set('not_waiting')">
                    ليس في الانتظار
                </a>
            </div>
        </div>

        <hr class="dashed">

        <!-- Time Slots Filter -->
        <div class="form-group">
            <label>مواعيد التدريب للعميل</label>
            <popover content="تصفية الطلبات حسب مواعيد التدريب المفضلة للعميل. ستظهر فقط الطلبات من العملاء الذين لديهم واحد على الأقل من المواعيد المحددة." class="ng-isolate-scope"><i uib-popover="تصفية الطلبات حسب مواعيد التدريب المفضلة للعميل. ستظهر فقط الطلبات من العملاء الذين لديهم واحد على الأقل من المواعيد المحددة." popover-title="" popover-trigger="'mouseenter'" popover-placement="" class="popover-hint fa fa-question-circle"></i></popover>
            <time-slots-selector dataloader-param="orders.getParam('timeSlotIds')" options="{'returnIdsOnly': true, 'multiple': true}" class="ng-isolate-scope">
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

        <!-- Client Tags Filter -->
        <div class="form-group">
            <label>وسوم العميل</label>
            <div class="tags-menu pills align-items-center ng-isolate-scope" type="clients" dataloader-param="orders.getParam('clientTagIds')">
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

        <!-- Sort Order -->
        <div class="form-group">
            <label>الترتيب</label>
            <select class="form-control ng-isolate-scope" dataloader-param-model="orders.getParam('sortOrder')">
                <option value="newest">الأحدث أولاً</option>
                <option value="oldest">الأقدم أولاً</option>
            </select>
        </div>

        <!-- Results per page -->
        <div class="form-group mb-0">
            <label>عدد النتائج بالصفحة</label>
            <select dataloader-param-model="orders.getParam('perPage')" class="form-control ng-isolate-scope">
                <!-- ngRepeat: (i, n) in orders.getParam('perPage').value.getOptions() --><option ng-repeat="(i, n) in orders.getParam('perPage').value.getOptions()" ng-value="n" class="ng-binding ng-scope" value="50">50</option><!-- end ngRepeat: (i, n) in orders.getParam('perPage').value.getOptions() --><option ng-repeat="(i, n) in orders.getParam('perPage').value.getOptions()" ng-value="n" class="ng-binding ng-scope" value="100">100</option><!-- end ngRepeat: (i, n) in orders.getParam('perPage').value.getOptions() --><option ng-repeat="(i, n) in orders.getParam('perPage').value.getOptions()" ng-value="n" class="ng-binding ng-scope" value="200">200</option><!-- end ngRepeat: (i, n) in orders.getParam('perPage').value.getOptions() -->
            </select>
        </div>
    </div>
    <div class="block-footer">
        <button class="btn btn-primary" ng-click="orders.filter()" ng-disabled="orders.isLoading()">
            <i class="fa fa-search"></i>
            تطبيق
        </button>
        <!-- ngIf: orders.isFilteringOn() -->
    </div>
</div>
            </div>

            <!-- Results Column -->
            <div class="col-md-9">
                <div class="block style2">
    <div class="block-title d-flex align-items-center flex-wrap justify-content-between flex-gap-15">
        <div>
            <span class="title">التسجيل</span>
            <!-- ngIf: orders.isLoaded() --><span class="badge ng-binding ng-scope" ng-if="orders.isLoaded()">0</span><!-- end ngIf: orders.isLoaded() -->
        </div>

        <!-- ngIf: statusCounts --><div class="d-inline-flex flex-gap-10 ms-10 ng-scope" ng-if="statusCounts">
            <span class="label label-warning ng-binding">
                بانتظار التسجيل: 0
            </span>
            <span class="label label-info ng-binding">
                في قائمة الانتظار: 0
            </span>
            <span class="label label-success ng-binding">
                مسجّل: 0
            </span>
        </div><!-- end ngIf: statusCounts -->
    </div>

    <div class="block-body p-0">
        <!-- Loading -->
        <!-- ngIf: orders.isLoading() -->

        <!-- Empty State - No filters applied -->
        <!-- ngIf: !orders.isLoading() && orders.isEmpty() && !orders.isFilteringOn() --><div ng-if="!orders.isLoading() &amp;&amp; orders.isEmpty() &amp;&amp; !orders.isFilteringOn()" class="p-20 text-center ng-scope">
            <i class="fa fa-inbox fa-3x text-muted"></i>
            <p class="mt-15">لا توجد طلبات</p>
        </div><!-- end ngIf: !orders.isLoading() && orders.isEmpty() && !orders.isFilteringOn() -->

        <!-- Empty State - Filters applied -->
        <!-- ngIf: !orders.isLoading() && orders.isEmpty() && orders.isFilteringOn() -->

        <!-- Orders Table -->
        <!-- ngIf: !orders.isLoading() && !orders.isEmpty() -->
    </div>

    <!-- Pagination -->
    <!-- ngIf: orders.pagination.showControls() -->

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
