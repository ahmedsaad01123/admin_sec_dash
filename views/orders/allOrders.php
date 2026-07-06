<?php
// إعداد المتغيرات
$pageTitle = 'جميع الطلبات';
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
            <i class="icon fa fa-shopping-cart"></i>
            <span class="title">الطلبات</span>

                            
                <ul class="breadcrumb inline" style="margin: 0">
                    <li class="breadcrumb-item"></li>

                                            <li class="breadcrumb-item">جميع الطلبات</li>
                                    </ul>
                    </div>

        <div class="d-flex justify-content-center">
            <div>
                
                            </div>
        </div>
    </div>
    <div ng-app="app" ng-controller="controller" class="ng-scope">
        <div class="row">
            <div class="col-md-3">
    <div class="block style2">
        <div class="block-body">
            <!-- Status Filter -->
            <div class="form-group">
                <label>الحالة</label>
                <div>
                    <div class="btn-group">
                        <button class="btn btn-primary" ng-class="orders.getParam('status').value.is('all') ? 'btn-primary' : 'btn-default'" ng-click="orders.getParam('status').setValue('all')">
                            الكل
                        </button>
                        <button class="btn btn-default" ng-class="orders.getParam('status').value.is('active') ? 'btn-primary' : 'btn-default'" ng-click="orders.getParam('status').setValue('active')">
                            نشط
                        </button>
                        <button class="btn btn-default" ng-class="orders.getParam('status').value.is('completed') ? 'btn-primary' : 'btn-default'" ng-click="orders.getParam('status').setValue('completed')">
                            مكتمل
                        </button>
                        <button class="btn btn-default" ng-class="orders.getParam('status').value.is('canceled') ? 'btn-primary' : 'btn-default'" ng-click="orders.getParam('status').setValue('canceled')">
                            ملغي
                        </button>
                    </div>
                </div>
            </div>

            <!-- Order Search Filter -->
            <div class="form-group">
                <label>تصفية الطلبات</label>
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

            <!-- Client Tags Filter -->
            <div class="form-group">
                <label>وسوم العملاء</label>
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

            <!-- Active Status Sub-filters -->
            <!-- ngIf: orders.getParam('status').value.is('active') -->

            <!-- Completed Status Sub-filters -->
            <!-- ngIf: orders.getParam('status').value.is('completed') -->

            <!-- Canceled Status Sub-filters -->
            <!-- ngIf: orders.getParam('status').value.is('canceled') -->
        </div>
        <div class="block-footer">
            <button class="btn btn-primary" ng-click="orders.filter()" ng-disabled="orders.isLoading()">
                <i class="fa fa-search"></i>
                تطبيق التصفية
            </button>
            <!-- ngIf: orders.isFilteringOn() -->
        </div>
    </div>
</div>
            <div class="col-md-9">
    <div class="block style2">
        <div class="block-title">
            <span class="title">الطلبات</span>
            <span class="badge ng-binding">0</span>

            <!-- ngIf: !orders.isLoading() && !orders.isEmpty() -->
        </div>

        <div class="block-body p-0">
            <!-- Loading -->
            <!-- ngIf: orders.isLoading() -->

            <!-- Empty State - No filters -->
            <!-- ngIf: !orders.isLoading() && orders.isEmpty() && !orders.isFilteringOn() --><div ng-if="!orders.isLoading() &amp;&amp; orders.isEmpty() &amp;&amp; !orders.isFilteringOn()" class="p-20 text-center ng-scope">
                <i class="fa fa-shopping-cart fa-3x text-muted"></i>
                <p class="mt-15 text-muted">لا توجد طلبات.</p>
            </div><!-- end ngIf: !orders.isLoading() && orders.isEmpty() && !orders.isFilteringOn() -->

            <!-- Empty State - Filtered -->
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
