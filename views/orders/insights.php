<?php
// إعداد المتغيرات
$pageTitle = 'تحليلات';
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
            <i class="icon fa fa-line-chart"></i>
            <span class="title">الطلبات</span>

                            
                <ul class="breadcrumb inline" style="margin: 0">
                    <li class="breadcrumb-item"></li>

                                            <li class="breadcrumb-item">تحليلات</li>
                                    </ul>
                    </div>

        <div class="d-flex justify-content-center">
            <div>
                
                            </div>
        </div>
    </div>
    <div ng-app="app" class="ng-scope">
        <!-- Sub Tabs -->
        <ul class="nav nav-tabs sub-tabs">
            <li ng-class="{'active': $root.activeTab === 'new'}" class="active">
                <a href="#!/new">
                    <span class="title">طلبات جديدة</span>
                </a>
            </li>
            <li ng-class="{'active': $root.activeTab === 'active'}">
                <a href="#!/active">
                    <span class="title">طلبات نشطة</span>
                </a>
            </li>
            <li ng-class="{'active': $root.activeTab === 'completed'}">
                <a href="#!/completed">
                    <span class="title">طلبات مكتملة</span>
                </a>
            </li>
            <li ng-class="{'active': $root.activeTab === 'canceled'}">
                <a href="#!/canceled">
                    <span class="title">طلبات ملغية</span>
                </a>
            </li>
            <li ng-class="{'active': $root.activeTab === 'retention'}">
                <a href="#!/retention">
                    <span class="title">الاستبقاء</span>
                </a>
            </li>
        </ul>

        <!-- Tab Content -->
        <!-- ngView: --><div class="tab-content ng-scope" ng-view="">
            <div class="new-orders-insights-tab ng-scope">

    <!-- Date Filter -->
    <div class="row mb-15">
        <div class="col-md-12">
            <div class="block style2">
                <div class="block-body">
                    <div class="d-flex flex-gap-10">
                        <div class="d-flex flex-gap-15 align-items-center">
                            <label>فلترة بالفترة</label>
                            <div class="timeSpanSelectorWidget ng-isolate-scope ng-not-empty ng-valid" ng-model="createdAt" options="{'acceptEmpty': true, 'span': null}">
        <div ng-show="['fromTo', 'date', 'beforeDate'].indexOf(choices.span) &lt; 0" class="form-group margin-bottom-0">
            <select ng-model="choices.span" ng-options="option.span as option.label for option in data.spans" class="form-control ng-pristine ng-untouched ng-valid ng-empty"><!-- ngIf: options.acceptEmpty === true --><option ng-if="options.acceptEmpty === true" value="" class="" selected="selected">&nbsp;</option><!-- end ngIf: options.acceptEmpty === true --><option label="اليوم" value="string:today">اليوم</option><option label="البارحة" value="string:yesterday">البارحة</option><option label="غداً" value="string:tomorrow">غداً</option><option label="هذا الإسبوع" value="string:thisWeek">هذا الإسبوع</option><option label="الإسبوع السابق" value="string:lastWeek">الإسبوع السابق</option><option label="هذا الشهر" value="string:thisMonth">هذا الشهر</option><option label="الشهر المنقضي" value="string:lastMonth">الشهر المنقضي</option><option label="تاريخ محدد" value="string:date">تاريخ محدد</option><option label="قبل تاريخ" value="string:beforeDate">قبل تاريخ</option><option label="من ... إلى" value="string:fromTo">من ... إلى</option><option label="من البداية" value="string:allTime">من البداية</option></select>
        </div>

        <!-- ngIf: choices.span === 'fromTo' -->

        <!-- ngIf: choices.span === 'date' -->

        <!-- ngIf: choices.span === 'beforeDate' -->
    </div>
                        </div>
                        <div>
                            <button type="button" class="btn btn-primary mr-5" ng-click="load()" ng-icon="filter"><i class="fa fa-filter"></i>
                                تطبيق
                            </button>
                            <!-- ngIf: createdAt --><button type="button" class="btn btn-default ng-scope" ng-click="clearFilter()" ng-if="createdAt">
                                <i class="fa fa-times m-0"></i>
                            </button><!-- end ngIf: createdAt -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Loading -->
    <!-- ngIf: loading -->

    <!-- ngIf: !loading --><div ng-if="!loading" class="ng-scope">

        <!-- Summary Stats -->
        <div class="row">
            <div class="col-md-12">
                <div class="block style2">
                    <div class="block-title">
                        <span class="title">ملخص</span>
                    </div>
                    <div class="block-body">
                        <div class="row text-center">
                            <div class="col-xs-3">
                                <div class="stat-box">
                                    <h4 class="text-primary mb-5 ng-binding">0</h4>
                                    <div class="text-muted">إجمالي الطلبات</div>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="stat-box">
                                    <h4 class="text-info mb-5 ng-binding">0.0</h4>
                                    <div class="text-muted">معدل الطلبات / يوم</div>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="stat-box">
                                    <h4 class="text-success mb-5 ng-binding">0</h4>
                                    <div class="text-muted">الإيرادات المتوقعة</div>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="stat-box">
                                    <h4 class="text-warning mb-5 ng-binding">0</h4>
                                    <div class="text-muted">إجمالي المحصّل</div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center text-muted mt-10">
                            <small class="ng-binding">EGP</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Orders Per Day + Payment Plans Demand -->
        <div class="row">
            <!-- Orders Per Day Chart -->
            <div class="col-md-7">
                <div class="block style2">
                    <div class="block-title">
                        <span class="title">الطلبات اليومية</span>
                    </div>
                    <div class="block-body">
                        <!-- ngIf: ordersPerDayChart.data[0].length > 0 -->
                        <!-- ngIf: ordersPerDayChart.data[0].length === 0 --><div ng-if="ordersPerDayChart.data[0].length === 0" class="text-center p-20 text-muted ng-scope">
                            <i class="fa fa-bar-chart fa-3x"></i>
                            <p class="mt-15">لا توجد بيانات</p>
                        </div><!-- end ngIf: ordersPerDayChart.data[0].length === 0 -->
                    </div>
                </div>
            </div>

            <!-- Payment Plans Demand Donut Chart -->
            <div class="col-md-5">
                <div class="block style2">
                    <div class="block-title">
                        <span class="title">الطلب حسب خطة الدفع</span>
                    </div>
                    <div class="block-body">
                        <!-- ngIf: paymentPlansChart.total > 0 -->
                        <!-- Custom legend with counts and percentages -->
                        <!-- ngIf: paymentPlansChart.total > 0 -->
                        <!-- ngIf: paymentPlansChart.total === 0 --><div ng-if="paymentPlansChart.total === 0" class="text-center p-20 text-muted ng-scope">
                            <i class="fa fa-pie-chart fa-3x"></i>
                            <p class="mt-15">لا توجد بيانات</p>
                        </div><!-- end ngIf: paymentPlansChart.total === 0 -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Payments Per Day -->
        <div class="row">
            <div class="col-md-12">
                <div class="block style2">
                    <div class="block-title">
                        <span class="title">المدفوعات المحصّلة يومياً</span>
                    </div>
                    <div class="block-body">
                        <!-- ngIf: paymentsPerDayChart.data[0].length > 0 -->
                        <!-- ngIf: paymentsPerDayChart.data[0].length === 0 --><div ng-if="paymentsPerDayChart.data[0].length === 0" class="text-center p-20 text-muted ng-scope">
                            <i class="fa fa-bar-chart fa-3x"></i>
                            <p class="mt-15">لا توجد بيانات</p>
                        </div><!-- end ngIf: paymentsPerDayChart.data[0].length === 0 -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Orders Per Course -->
        <div class="row">
            <div class="col-md-12">
                <div class="block style2">
                    <div class="block-title">
                        <span class="title">الطلبات لكل دورة</span>
                    </div>
                    <div class="block-body p-0">
                        <!-- ngIf: ordersPerCourse.length > 0 -->
                        <!-- ngIf: ordersPerCourse.length === 0 --><div ng-if="ordersPerCourse.length === 0" class="p-20 text-center text-muted ng-scope">
                            <i class="fa fa-calendar fa-3x"></i>
                            <p class="mt-15">لا توجد بيانات</p>
                        </div><!-- end ngIf: ordersPerCourse.length === 0 -->
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end ngIf: !loading -->
</div>
        </div>

        <!-- Sub Tab Templates -->
        <script type="text/ng-template" id="new.html">
            <div class="new-orders-insights-tab">

    <!-- Date Filter -->
    <div class="row mb-15">
        <div class="col-md-12">
            <div class="block style2">
                <div class="block-body">
                    <div class="d-flex flex-gap-10">
                        <div class="d-flex flex-gap-15 align-items-center">
                            <label>فلترة بالفترة</label>
                            <time-span-selector ng-model="createdAt" options="{'acceptEmpty': true, 'span': null}"></time-span-selector>
                        </div>
                        <div>
                            <button type="button" class="btn btn-primary mr-5" ng-click="load()" ng-icon="filter">
                                تطبيق
                            </button>
                            <button type="button" class="btn btn-default" ng-click="clearFilter()" ng-if="createdAt">
                                <i class="fa fa-times m-0"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Loading -->
    <loading-indicator ng-if="loading"></loading-indicator>

    <div ng-if="!loading">

        <!-- Summary Stats -->
        <div class="row">
            <div class="col-md-12">
                <div class="block style2">
                    <div class="block-title">
                        <span class="title">ملخص</span>
                    </div>
                    <div class="block-body">
                        <div class="row text-center">
                            <div class="col-xs-3">
                                <div class="stat-box">
                                    <h4 class="text-primary mb-5">{{ summary.total_orders | number }}</h4>
                                    <div class="text-muted">إجمالي الطلبات</div>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="stat-box">
                                    <h4 class="text-info mb-5">{{ summary.avg_orders_per_day | number:1 }}</h4>
                                    <div class="text-muted">معدل الطلبات / يوم</div>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="stat-box">
                                    <h4 class="text-success mb-5">{{ summary.projected_revenue | number:0 }}</h4>
                                    <div class="text-muted">الإيرادات المتوقعة</div>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="stat-box">
                                    <h4 class="text-warning mb-5">{{ summary.total_collected | number:0 }}</h4>
                                    <div class="text-muted">إجمالي المحصّل</div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center text-muted mt-10">
                            <small>{{ currency }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Orders Per Day + Payment Plans Demand -->
        <div class="row">
            <!-- Orders Per Day Chart -->
            <div class="col-md-7">
                <div class="block style2">
                    <div class="block-title">
                        <span class="title">الطلبات اليومية</span>
                    </div>
                    <div class="block-body">
                        <div ng-if="ordersPerDayChart.data[0].length > 0" class="chart-container" style="position: relative; height: 300px;">
                            <canvas class="chart chart-bar"
                                    chart-data="ordersPerDayChart.data"
                                    chart-labels="ordersPerDayChart.labels"
                                    chart-colors="ordersPerDayChart.colors"
                                    chart-options="ordersPerDayChart.options">
                            </canvas>
                        </div>
                        <div ng-if="ordersPerDayChart.data[0].length === 0" class="text-center p-20 text-muted">
                            <i class="fa fa-bar-chart fa-3x"></i>
                            <p class="mt-15">لا توجد بيانات</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment Plans Demand Donut Chart -->
            <div class="col-md-5">
                <div class="block style2">
                    <div class="block-title">
                        <span class="title">الطلب حسب خطة الدفع</span>
                    </div>
                    <div class="block-body">
                        <div ng-if="paymentPlansChart.total > 0" class="chart-container" style="position: relative; height: 200px;">
                            <canvas class="chart chart-doughnut"
                                    chart-data="paymentPlansChart.data"
                                    chart-labels="paymentPlansChart.labels"
                                    chart-colors="paymentPlansChart.colors"
                                    chart-options="paymentPlansChart.options">
                            </canvas>
                        </div>
                        <!-- Custom legend with counts and percentages -->
                        <div ng-if="paymentPlansChart.total > 0" class="mt-15">
                            <div ng-repeat="plan in paymentPlansDemand" class="d-flex justify-content-between align-items-center mb-10">
                                <div class="d-flex align-items-center flex-gap-10">
                                    <span style="display: inline-block; width: 12px; height: 12px; border-radius: 2px;"
                                          ng-style="{'background-color': paymentPlansChart.colors[$index]}"></span>
                                    <span>{{ plan.label }}</span>
                                </div>
                                <div>
                                    <span class="text-muted">{{ plan.count }}</span>
                                    <span class="text-muted">({{ getPlanPercentage(plan.count) }}%)</span>
                                </div>
                            </div>
                        </div>
                        <div ng-if="paymentPlansChart.total === 0" class="text-center p-20 text-muted">
                            <i class="fa fa-pie-chart fa-3x"></i>
                            <p class="mt-15">لا توجد بيانات</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Payments Per Day -->
        <div class="row">
            <div class="col-md-12">
                <div class="block style2">
                    <div class="block-title">
                        <span class="title">المدفوعات المحصّلة يومياً</span>
                    </div>
                    <div class="block-body">
                        <div ng-if="paymentsPerDayChart.data[0].length > 0" class="chart-container" style="position: relative; height: 300px;">
                            <canvas class="chart chart-bar"
                                    chart-data="paymentsPerDayChart.data"
                                    chart-labels="paymentsPerDayChart.labels"
                                    chart-series="paymentsPerDayChart.series"
                                    chart-colors="paymentsPerDayChart.colors"
                                    chart-options="paymentsPerDayChart.options">
                            </canvas>
                        </div>
                        <div ng-if="paymentsPerDayChart.data[0].length === 0" class="text-center p-20 text-muted">
                            <i class="fa fa-bar-chart fa-3x"></i>
                            <p class="mt-15">لا توجد بيانات</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Orders Per Course -->
        <div class="row">
            <div class="col-md-12">
                <div class="block style2">
                    <div class="block-title">
                        <span class="title">الطلبات لكل دورة</span>
                    </div>
                    <div class="block-body p-0">
                        <div ng-if="ordersPerCourse.length > 0">
                            <table class="table table-striped table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>الدورة</th>
                                        <th class="text-center" style="width: 120px;">من فردي</th>
                                        <th class="text-center" style="width: 120px;">من متعدد</th>
                                        <th class="text-center" style="width: 120px;">من باقة</th>
                                        <th class="text-center" style="width: 100px;">الإجمالي</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="item in ordersPerCourse">
                                        <td>
                                            <span>{{ item.name }}</span>
                                            <small class="text-muted">({{ item.code }})</small>
                                        </td>
                                        <td class="text-center">
                                            <span ng-if="item.from_single > 0" class="label label-primary">{{ item.from_single }}</span>
                                            <span ng-if="item.from_single === 0" class="text-muted">-</span>
                                        </td>
                                        <td class="text-center">
                                            <span ng-if="item.from_multiple > 0" class="label label-info">{{ item.from_multiple }}</span>
                                            <span ng-if="item.from_multiple === 0" class="text-muted">-</span>
                                        </td>
                                        <td class="text-center">
                                            <span ng-if="item.from_bundle > 0" class="label label-success">{{ item.from_bundle }}</span>
                                            <span ng-if="item.from_bundle === 0" class="text-muted">-</span>
                                        </td>
                                        <td class="text-center">
                                            <strong>{{ item.total }}</strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div ng-if="ordersPerCourse.length === 0" class="p-20 text-center text-muted">
                            <i class="fa fa-calendar fa-3x"></i>
                            <p class="mt-15">لا توجد بيانات</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        </script>

        <script type="text/ng-template" id="active.html">
            <div class="active-orders-insights-tab">
    <style>
        .active-orders-insights-tab .stat-value {
            font-size: 32px;
            font-weight: 500;
            line-height: 1.2;
            margin-bottom: 5px;
        }
        .active-orders-insights-tab .stat-label {
            font-size: 14px;
        }
    </style>

    <!-- Loading -->
    <loading-indicator ng-if="loading"></loading-indicator>

    <div ng-if="!loading">
        <!-- Summary Stats Row -->
        <div class="row">
            <!-- General Summary -->
            <div class="col-md-7">
                <div class="block style2">
                    <div class="block-title">
                        <span class="title">ملخص</span>
                    </div>
                    <div class="block-body">
                        <div class="row text-center">
                            <div class="col-xs-3">
                                <div class="stat-box">
                                    <div class="stat-value text-primary">{{ summary.total_orders | number }}</div>
                                    <div class="stat-label text-muted">الطلبات قيد التنفيذ</div>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="stat-box">
                                    <div class="stat-value text-success">{{ summary.total_clients | number }}</div>
                                    <div class="stat-label text-muted">العملاء</div>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="stat-box">
                                    <div class="stat-value text-info">{{ summary.total_courses | number }}</div>
                                    <div class="stat-label text-muted">الدورات الفريدة</div>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="stat-box">
                                    <div class="stat-value text-warning">{{ summary.total_active_batches | number }}</div>
                                    <div class="stat-label text-muted">المجموعات النشطة</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Finances Summary -->
            <div class="col-md-5">
                <div class="block style2">
                    <div class="block-title">
                        <span class="title">المالية</span>
                    </div>
                    <div class="block-body">
                        <div class="row text-center">
                            <div class="col-xs-6">
                                <div class="stat-box">
                                    <div class="stat-value text-success">{{ finances.collected_revenue | number:0 }}</div>
                                    <div class="stat-label text-muted">الإيرادات المحصّلة</div>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="stat-box">
                                    <div class="stat-value text-primary">{{ finances.total_revenue | number:0 }}</div>
                                    <div class="stat-label text-muted">إجمالي الإيرادات</div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center text-muted mt-10">
                            <small>{{ currency }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Course Summary Table -->
        <div class="row">
            <div class="col-md-12">
                <div class="block style2">
                    <div class="block-title">
                        <span class="title">ملخص الدورات</span>
                    </div>
                    <div class="block-body p-0">
                        <div ng-if="courseSummary.length > 0">
                            <table class="table table-striped table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>الدورة</th>
                                        <th class="text-center" style="width: 100px;">المجموعات</th>
                                        <th class="text-center" style="width: 100px;">المتدربين</th>
                                        <th class="text-center" style="width: 100px;">المحاضرات</th>
                                        <th class="text-center" style="width: 120px;">الحضور</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="item in courseSummary">
                                        <td>
                                            <span>{{ item.name }}</span>
                                            <small class="text-muted">({{ item.code }})</small>
                                        </td>
                                        <td class="text-center">
                                            <span class="label label-info">{{ item.num_batches }}</span>
                                        </td>
                                        <td class="text-center">
                                            <span class="label label-primary">{{ item.num_trainees }}</span>
                                        </td>
                                        <td class="text-center">
                                            <span class="label label-default">{{ item.num_lectures }}</span>
                                        </td>
                                        <td class="text-center">
                                            <span ng-if="item.attendance_percentage !== null"
                                                  class="label"
                                                  ng-class="{'label-success': item.attendance_percentage >= 75, 'label-warning': item.attendance_percentage >= 50 && item.attendance_percentage < 75, 'label-danger': item.attendance_percentage < 50}">
                                                {{ item.attendance_percentage }}%
                                            </span>
                                            <span ng-if="item.attendance_percentage === null" class="text-muted">-</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div ng-if="courseSummary.length === 0" class="p-20 text-center text-muted">
                            <i class="fa fa-book fa-3x"></i>
                            <p class="mt-15">لا توجد بيانات متاحة لتحليلات الطلبات النشطة.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Empty State -->
        <div ng-if="summary.total_orders === 0" class="text-center p-20">
            <i class="fa fa-line-chart fa-3x text-muted"></i>
            <p class="mt-15 text-muted">لا توجد بيانات متاحة لتحليلات الطلبات النشطة.</p>
        </div>
    </div>
</div>
        </script>

        <script type="text/ng-template" id="completed.html">
            <div class="completed-orders-insights-tab">
    <style>
        .completed-orders-insights-tab .stat-value {
            font-size: 28px;
            font-weight: 500;
            line-height: 1.2;
            margin-bottom: 5px;
        }
    </style>

    <!-- Loading -->
    <loading-indicator ng-if="loading"></loading-indicator>

    <div ng-if="!loading">
        <!-- Summary Stats Row -->
        <div class="row">
            <div class="col-md-12">
                <div class="block style2">
                    <div class="block-title">
                        <span class="title">ملخص</span>
                    </div>
                    <div class="block-body">
                        <div class="row text-center">
                            <div class="col-xs-3">
                                <div class="stat-box">
                                    <div class="stat-value text-success">{{ summary.total_orders | number }}</div>
                                    <div class="stat-label text-muted">إجمالي الطلبات</div>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="stat-box">
                                    <div class="stat-value text-primary">{{ summary.total_clients | number }}</div>
                                    <div class="stat-label text-muted">إجمالي العملاء</div>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="stat-box">
                                    <div class="stat-value text-info">{{ summary.total_courses | number }}</div>
                                    <div class="stat-label text-muted">إجمالي الدورات</div>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="stat-box">
                                    <div class="stat-value text-warning">{{ summary.avg_courses_per_order }}</div>
                                    <div class="stat-label text-muted">متوسط الدورات/الطلب</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Multi-Course Demand & Retention Row -->
        <div class="row">
            <!-- Multi-Course Demand -->
            <div class="col-md-6">
                <div class="block style2">
                    <div class="block-title">
                        <span class="title">طلب الدورات المتعددة</span>
                    </div>
                    <div class="block-body p-0">
                        <table class="table table-striped mb-0">
                            <tbody>
                                <tr>
                                    <td>دورة واحدة</td>
                                    <td class="text-right" style="width: 100px;">
                                        <span class="label label-default">{{ multiCourseDemand.one_course | number }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>دورتان</td>
                                    <td class="text-right">
                                        <span class="label label-info">{{ multiCourseDemand.two_courses | number }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3 دورات</td>
                                    <td class="text-right">
                                        <span class="label label-primary">{{ multiCourseDemand.three_courses | number }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4 دورات</td>
                                    <td class="text-right">
                                        <span class="label label-warning">{{ multiCourseDemand.four_courses | number }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>أكثر من 4 دورات</td>
                                    <td class="text-right">
                                        <span class="label label-success">{{ multiCourseDemand.more_than_four | number }}</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Retention Summary -->
            <div class="col-md-6">
                <div class="block style2">
                    <div class="block-title">
                        <span class="title">ملخص الاحتفاظ</span>
                    </div>
                    <div class="block-body">
                        <div class="row text-center">
                            <div class="col-xs-4">
                                <div class="stat-box">
                                    <div class="stat-value text-success">{{ retention.retained | number }}</div>
                                    <div class="stat-label text-muted">محتفظ بهم</div>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="stat-box">
                                    <div class="stat-value text-danger">{{ retention.unretained | number }}</div>
                                    <div class="stat-label text-muted">غير محتفظ بهم</div>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="stat-box">
                                    <div class="stat-value" ng-class="{'text-success': retention.retention_rate >= 50, 'text-warning': retention.retention_rate < 50}">
                                        {{ retention.retention_rate }}%
                                    </div>
                                    <div class="stat-label text-muted">معدل الاحتفاظ</div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center text-muted mt-15">
                            <small>العملاء الذين أكملوا طلبات متعددة</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Row -->
        <div class="row">
            <!-- Products Demand Donut Chart -->
            <div class="col-md-6">
                <div class="block style2">
                    <div class="block-title">
                        <span class="title">طلب المنتجات</span>
                    </div>
                    <div class="block-body">
                        <div ng-if="productsDemandChart.total > 0" class="chart-container" style="position: relative; height: 280px;">
                            <canvas class="chart chart-doughnut"
                                    chart-data="productsDemandChart.data"
                                    chart-labels="productsDemandChart.labels"
                                    chart-colors="productsDemandChart.colors"
                                    chart-options="productsDemandChart.options">
                            </canvas>
                        </div>
                        <div ng-if="productsDemandChart.total === 0" class="text-center p-20 text-muted">
                            <i class="fa fa-pie-chart fa-3x"></i>
                            <p class="mt-15">لا توجد بيانات</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment Plans Donut Chart -->
            <div class="col-md-6">
                <div class="block style2">
                    <div class="block-title">
                        <span class="title">خطط الدفع</span>
                    </div>
                    <div class="block-body">
                        <div ng-if="paymentPlansChart.total > 0" class="chart-container" style="position: relative; height: 280px;">
                            <canvas class="chart chart-doughnut"
                                    chart-data="paymentPlansChart.data"
                                    chart-labels="paymentPlansChart.labels"
                                    chart-colors="paymentPlansChart.colors"
                                    chart-options="paymentPlansChart.options">
                            </canvas>
                        </div>
                        <div ng-if="paymentPlansChart.total === 0" class="text-center p-20 text-muted">
                            <i class="fa fa-pie-chart fa-3x"></i>
                            <p class="mt-15">لا توجد بيانات</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Orders Per Year Row -->
        <div class="row">
            <div class="col-md-12">
                <div class="block style2">
                    <div class="block-title d-flex align-items-center justify-content-between">
                        <div class="title">الطلبات لكل سنة</div>
                        <div class="d-flex align-items-center flex-gap-10">
                            <button type="button" class="btn btn-sm btn-default" ng-click="prevYear()" ng-disabled="loadingYear" title="السنة السابقة">
                                <i class="fa fa-chevron-right m-0"></i>
                            </button>
                            <span class="text-strong">{{ ordersPerYear.year_label }}</span>
                            <button type="button" class="btn btn-sm btn-default" ng-click="nextYear()" ng-disabled="loadingYear || ordersPerYear.year_offset >= 0" title="السنة التالية">
                                <i class="fa fa-chevron-left m-0"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-body" style="position: relative;">
                        <div ng-if="loadingYear" class="text-center p-20">
                            <i class="fa fa-spinner fa-spin fa-2x"></i>
                        </div>
                        <div ng-if="!loadingYear && yearChart.data[0].length > 0" class="chart-container" style="position: relative; height: 300px;">
                            <canvas class="chart chart-bar"
                                    chart-data="yearChart.data"
                                    chart-labels="yearChart.labels"
                                    chart-colors="yearChart.colors"
                                    chart-options="yearChart.options">
                            </canvas>
                        </div>
                        <div ng-if="!loadingYear && yearChart.data[0].length === 0" class="text-center p-20 text-muted">
                            <i class="fa fa-bar-chart fa-3x"></i>
                            <p class="mt-15">لا توجد بيانات</p>
                        </div>
                    </div>
                    <div class="block-footer text-center">
                        <strong>إجمالي السنة:</strong>
                        <span class="label label-primary ml-5">{{ ordersPerYear.total | number }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        </script>

        <script type="text/ng-template" id="canceled.html">
            <div class="canceled-orders-insights-tab">
    <!-- Loading -->
    <loading-indicator ng-if="loading"></loading-indicator>

    <div ng-if="!loading">
        <!-- Stats Cards Row -->
        <div class="row">
            <!-- Canceled Orders Count -->
            <div class="col-md-6">
                <div class="block style2">
                    <div class="block-title">
                        <span class="title">الطلبات الملغية</span>
                    </div>
                    <div class="block-body">
                        <div class="row text-center">
                            <div class="col-xs-3">
                                <div class="stat-box">
                                    <h4 class="text-danger mb-5">{{ counts.this_month | number }}</h4>
                                    <div class="stat-label text-muted">هذا الشهر</div>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="stat-box">
                                    <h4 class="text-danger mb-5">{{ counts.this_quarter | number }}</h4>
                                    <div class="stat-label text-muted">هذا الربع</div>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="stat-box">
                                    <h4 class="text-danger mb-5">{{ counts.this_year | number }}</h4>
                                    <div class="stat-label text-muted">هذه السنة</div>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="stat-box">
                                    <h4 class="text-danger mb-5">{{ counts.all_time | number }}</h4>
                                    <div class="stat-label text-muted">الإجمالي</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Lost Revenue -->
            <div class="col-md-6">
                <div class="block style2">
                    <div class="block-title">
                        <span class="title">الإيرادات المفقودة</span>
                    </div>
                    <div class="block-body">
                        <div class="row text-center">
                            <div class="col-xs-3">
                                <div class="stat-box">
                                    <h4 class="text-warning mb-5">{{ lostRevenue.this_month | number:0 }}</h4>
                                    <div class="stat-label text-muted">هذا الشهر</div>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="stat-box">
                                    <h4 class="text-warning mb-5">{{ lostRevenue.this_quarter | number:0 }}</h4>
                                    <div class="stat-label text-muted">هذا الربع</div>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="stat-box">
                                    <h4 class="text-warning mb-5">{{ lostRevenue.this_year | number:0 }}</h4>
                                    <div class="stat-label text-muted">هذه السنة</div>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="stat-box">
                                    <h4 class="text-warning mb-5">{{ lostRevenue.all_time | number:0 }}</h4>
                                    <div class="stat-label text-muted">الإجمالي</div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center text-muted mt-10">
                            <small>{{ currency }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Row -->
        <div class="row">
            <!-- Cancellation Reasons Donut Chart -->
            <div class="col-md-5">
                <div class="block style2">
                    <div class="block-title">
                        <span class="title">أسباب الإلغاء</span>
                    </div>
                    <div class="block-body">
                        <div ng-if="reasonsChart.data.length > 0" class="chart-container" style="position: relative; height: 200px;">
                            <canvas class="chart chart-doughnut"
                                    chart-data="reasonsChart.data"
                                    chart-labels="reasonsChart.labels"
                                    chart-colors="reasonsChart.colors"
                                    chart-options="reasonsChart.options">
                            </canvas>
                        </div>
                        <!-- Reasons Legend -->
                        <div ng-if="reasonsChart.data.length > 0" class="mt-15">
                            <div ng-repeat="reason in reasons" class="d-flex justify-content-between align-items-center mb-10">
                                <div class="d-flex align-items-center flex-gap-10">
                                    <span style="display: inline-block; width: 12px; height: 12px; border-radius: 2px;" ng-style="{'background-color': reasonsChart.colors[$index]}"></span>
                                    <span>{{ reason.label }}</span>
                                </div>
                                <div>
                                    <span class="text-muted">{{ reason.count }}</span>
                                    <span class="text-muted">({{ getReasonPercentage(reason.count) }}%)</span>
                                </div>
                            </div>
                        </div>
                        <div ng-if="reasonsChart.data.length === 0" class="text-center p-20 text-muted">
                            <i class="fa fa-pie-chart fa-3x"></i>
                            <p class="mt-15">لا توجد بيانات</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Monthly Cancellations Line Chart -->
            <div class="col-md-7">
                <div class="block style2">
                    <div class="block-title">
                        <span class="title">الإلغاءات عبر الزمن</span>
                    </div>
                    <div class="block-body">
                        <div ng-if="monthlyChart.data[0].length > 0" class="chart-container" style="position: relative; height: 300px;">
                            <canvas class="chart chart-line"
                                    chart-data="monthlyChart.data"
                                    chart-labels="monthlyChart.labels"
                                    chart-series="monthlyChart.series"
                                    chart-colors="monthlyChart.colors"
                                    chart-options="monthlyChart.options">
                            </canvas>
                        </div>
                        <div ng-if="monthlyChart.data[0].length === 0" class="text-center p-20 text-muted">
                            <i class="fa fa-line-chart fa-3x"></i>
                            <p class="mt-15">لا توجد بيانات</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        </script>

        <script type="text/ng-template" id="retention.html">
            <div class="retention-insights-tab">
    <style>
        .retention-insights-tab .stat-value {
            font-size: 28px;
            font-weight: 500;
            line-height: 1.2;
            margin-bottom: 5px;
        }
        .retention-insights-tab .stat-value-lg {
            font-size: 32px;
            font-weight: 600;
            line-height: 1.2;
            margin-bottom: 5px;
        }
        .retention-insights-tab .section-divider {
            border-top: 2px solid #e8e8e8;
            margin: 25px 0 20px;
            padding-top: 5px;
        }
    </style>

    
    
    

    <h4 class="mb-15 text-strong">
        <i class="fa fa-line-chart"></i>
        أداء الاستبقاء
    </h4>

    <!-- Date Filter -->
    <div class="row mb-15">
        <div class="col-md-12">
            <div class="block style2">
                <div class="block-body">
                    <div class="d-flex flex-gap-10">
                        <div class="d-flex flex-gap-15 align-items-center">
                            <label>تاريخ القرار</label>
                            <time-span-selector ng-model="confirmedAt" options="{'acceptEmpty': true, 'span': null}"></time-span-selector>
                        </div>
                        <div>
                            <button type="button" class="btn btn-primary mr-5" ng-click="loadPerformance()" ng-icon="filter">
                                تطبيق
                            </button>
                            <button type="button" class="btn btn-default" ng-click="clearFilter()" ng-if="confirmedAt">
                                <i class="fa fa-times m-0"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Performance Loading -->
    <loading-indicator ng-if="performanceLoading === null || performanceLoading"></loading-indicator>

    <div ng-if="performanceLoading === false">
        <!-- Retention Rate + Followup Effectiveness -->
        <div class="row">
            <!-- Retention Rate -->
            <div class="col-md-4">
                <div class="block style2">
                    <div class="block-title">
                        <span class="title">معدل الاستبقاء</span>
                    </div>
                    <div class="block-body text-center">
                        <div ng-if="retentionRate.total_resolved > 0">
                            <div class="stat-value-lg" ng-class="{'text-success': retentionRate.rate >= 60, 'text-warning': retentionRate.rate >= 40 && retentionRate.rate < 60, 'text-danger': retentionRate.rate < 40}">
                                {{ retentionRate.rate }}%
                            </div>
                            <div class="text-muted mt-10 mb-15">نسبة من قرروا البقاء وإستكمال الدورات</div>
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="stat-value text-success">{{ retentionRate.confirmed | number }}</div>
                                    <div class="stat-label text-muted">قرروا الإستكمال</div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="stat-value text-danger">{{ retentionRate.churned | number }}</div>
                                    <div class="stat-label text-muted">قرروا التوقف</div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="stat-value text-muted">{{ retentionRate.total_resolved | number }}</div>
                                    <div class="stat-label text-muted">إجمالي من قرروا</div>
                                </div>
                            </div>
                        </div>
                        <div ng-if="retentionRate.total_resolved === 0" class="text-muted p-20">
                            <i class="fa fa-line-chart fa-3x"></i>
                            <p class="mt-15">من لم يقرروا بعد</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Followup Effectiveness Table -->
            <div class="col-md-8">
                <div class="block style2">
                    <div class="block-title">
                        <span class="title">فعالية المتابعات</span>
                    </div>
                    <div class="block-body p-0">
                        <div ng-if="retentionRate.total_resolved > 0">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>المتابعات</th>
                                        <th class="text-center">الإجمالي</th>
                                        <th class="text-center">قرروا الإستكمال</th>
                                        <th class="text-center">قرروا التوقف</th>
                                        <th class="text-center">معدل التأكيد</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="row in followupEffectiveness" ng-if="row.total > 0">
                                        <td>{{ row.label }}</td>
                                        <td class="text-center">{{ row.total }}</td>
                                        <td class="text-center text-success">{{ row.confirmed }}</td>
                                        <td class="text-center text-danger">{{ row.churned }}</td>
                                        <td class="text-center">
                                            <span ng-class="{'text-success': row.confirmation_rate >= 60, 'text-warning': row.confirmation_rate < 60}">
                                                {{ row.confirmation_rate }}%
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div ng-if="retentionRate.total_resolved === 0" class="text-center p-20 text-muted">
                            <i class="fa fa-table fa-3x"></i>
                            <p class="mt-15">لا توجد بيانات</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    
    
    

    <div class="section-divider"></div>

    <h4 class="mb-15 text-strong">
        <i class="fa fa-filter"></i>
        العملاء الحاليين
    </h4>

    <!-- Pipeline Loading -->
    <loading-indicator ng-if="pipelineLoading === null"></loading-indicator>

    <div ng-if="pipelineLoading === false">
        <!-- Pipeline Overview -->
        <div class="row">
            <div class="col-md-6">
                <div class="block style2">
                    <div class="block-title">
                        <span class="title">مراحل الاستبقاء</span>
                    </div>
                    <div class="block-body">
                        <div class="row text-center">
                            <div class="col-xs-3">
                                <div class="stat-box">
                                    <div class="stat-value text-primary">{{ pipeline.total | number }}</div>
                                    <div class="stat-label text-muted">عدد العملاء</div>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="stat-box">
                                    <div class="stat-value" style="color: #95a5a6">{{ pipeline.pending | number }}</div>
                                    <div class="stat-label text-muted">لم يقرروا بعد</div>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="stat-box">
                                    <div class="stat-value text-success">{{ pipeline.confirmed | number }}</div>
                                    <div class="stat-label text-muted">قرروا الإستكمال</div>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="stat-box">
                                    <div class="stat-value text-danger">{{ pipeline.churned | number }}</div>
                                    <div class="stat-label text-muted">قرروا التوقف</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Revenue at Stake -->
            <div class="col-md-6">
                <div class="block style2">
                    <div class="block-title">
                        <span class="title">الإيرادات</span>
                    </div>
                    <div class="block-body">
                        <div class="row text-center">
                            <div class="col-xs-4">
                                <div class="stat-box">
                                    <h4 class="text-primary mb-5">{{ revenue.total_revenue | number:0 }}</h4>
                                    <div class="stat-label text-muted">إجمالي الإيرادات</div>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="stat-box">
                                    <h4 class="text-success mb-5">{{ revenue.amount_collected | number:0 }}</h4>
                                    <div class="stat-label text-muted">المبلغ المحصّل</div>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="stat-box">
                                    <h4 class="text-danger mb-5">{{ revenue.amount_due | number:0 }}</h4>
                                    <div class="stat-label text-muted">المبلغ المتبقي</div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center text-muted mt-10">
                            <small>{{ currency }}</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Retention Payments -->
            <div class="col-md-6">
                <div class="block style2">
                    <div class="block-title">
                        <span class="title">دفعات الاستبقاء</span>
                    </div>
                    <div class="block-body">
                        <div class="row text-center">
                            <div class="col-xs-3">
                                <div class="stat-box">
                                    <h4 class="text-success mb-5">{{ retentionPayments.total_secured | number:0 }}</h4>
                                    <div class="stat-label text-muted">الإجمالي</div>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="stat-box">
                                    <h4 class="text-success mb-5">{{ retentionPayments.paid_count | number }}</h4>
                                    <div class="stat-label text-muted">المدفوع</div>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="stat-box">
                                    <h4 class="text-warning mb-5">{{ retentionPayments.pending_count | number }}</h4>
                                    <div class="stat-label text-muted">بإنتظار الدفع</div>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="stat-box" ng-if="retentionPayments.overdue_count > 0">
                                    <h4 class="text-danger mb-5">{{ retentionPayments.overdue_count | number }}</h4>
                                    <div class="stat-label text-muted">المتأخر</div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center text-muted mt-10">
                            <small>{{ currency }}</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="block style2">
                    <div class="block-title">
                        <span class="title">قمع الاستبقاء</span>
                    </div>
                    <div class="block-body">
                        <div ng-if="pipeline.total > 0" class="chart-container" style="position: relative; height: 200px;">
                            <canvas class="chart chart-doughnut"
                                    chart-data="funnelChart.data"
                                    chart-labels="funnelChart.labels"
                                    chart-colors="funnelChart.colors"
                                    chart-options="funnelChart.options">
                            </canvas>
                        </div>
                        <!-- Funnel Legend -->
                        <div ng-if="pipeline.total > 0" class="mt-15">
                            <div ng-repeat="segment in funnel" class="d-flex justify-content-between align-items-center mb-10">
                                <div class="d-flex align-items-center flex-gap-10">
                                    <span style="display: inline-block; width: 12px; height: 12px; border-radius: 2px;" ng-style="{'background-color': segment.color}"></span>
                                    <span>{{ segment.label }}</span>
                                </div>
                                <div>
                                    <span class="text-muted">{{ segment.count }}</span>
                                    <span class="text-muted">({{ getFunnelPercentage(segment.count) }}%)</span>
                                </div>
                            </div>
                        </div>
                        <div ng-if="pipeline.total === 0" class="text-center p-20 text-muted">
                            <i class="fa fa-pie-chart fa-3x"></i>
                            <p class="mt-15">لا توجد بيانات</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
