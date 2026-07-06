<?php
// إعداد المتغيرات
$pageTitle = 'التحليلات';
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
            <i class="icon fa fa-sliders"></i>
            <span class="title">الإدارة</span>

                            
                <ul class="breadcrumb inline" style="margin: 0">
                    <li class="breadcrumb-item"></li>

                                            <li class="breadcrumb-item">التحليلات</li>
                                    </ul>
                    </div>

        <div class="d-flex justify-content-center">
            <div>
                
                            </div>
        </div>
    </div>
    <div ng-app="app" ng-controller="controller" class="ng-scope">
        
        <div class="row margin-bottom-50">
            <div class="col-sm-12 col-md-6">
                <div class="block style2">
                    <div class="block-body grid grid-3cols">
                                                <div class="grid-cell">
                            <label>من</label>
                            <input type="date" class="form-control form-control-sm ng-pristine ng-untouched ng-valid ng-not-empty" ng-model="filters.start">
                        </div>

                        <div class="grid-cell">
                            <label>إلى</label>
                            <input type="date" class="form-control form-control-sm ng-pristine ng-untouched ng-valid ng-not-empty" ng-model="filters.end">
                        </div>
                    </div>
                    <div class="block-footer">
                        <button class="btn btn-primary" ng-click="loadData()" type="submit">
                            <i class="fa fa-refresh"></i> تحديث
                        </button>
                    </div>
                </div>
            </div>
        </div>

        
        <!-- ngIf: data === null -->

        <!-- ngIf: data !== null --><div ng-if="data !== null" class="ng-scope">
            
            <div class="row summary-cards">
                
                                <div class="col-md-3">
                    <div class="block style2 primary">
                        <div class="block-title">
                            <i class="icon fa fa-bullhorn"></i>
                            <span class="title">المبيعات</span>
                        </div>
                        <div class="block-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <b class="text-primary ng-binding">0</b>
                                    <div class="small text-muted">العملاء المحتملين</div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <b class="text-primary ng-binding">0</b>
                                    <div class="small text-muted">التحويلات</div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <b class="text-primary ng-binding">0</b>
                                    <div class="small text-muted">تعبئة النماذج</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <div class="col-md-3">
                    <div class="block style2 primary">
                        <div class="block-title">
                            <i class="icon fa fa-graduation-cap"></i>
                            <span class="title">التدريب</span>
                        </div>
                        <div class="block-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <b class="text-primary ng-binding">1</b>
                                    <div class="small text-muted">المجموعات</div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <b class="text-primary ng-binding">2</b>
                                    <div class="small text-muted">المحاضرات</div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <b class="text-primary ng-binding">10</b>
                                    <div class="small text-muted">التسجيلات</div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <b class="text-primary ng-binding">0</b>
                                    <div class="small text-muted">الحضور</div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <b class="text-primary ng-binding">0</b>
                                    <div class="small text-muted">الغياب</div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <b class="text-primary ng-binding">0</b>
                                    <div class="small text-muted">تسليمات المهام</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
                                <div class="col-md-3">
                    <div class="block style2 primary">
                        <div class="block-title">
                            <i class="icon fa fa-money"></i>
                            <span class="title">المالية</span>
                        </div>
                        <div class="block-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <b class="text-primary ng-binding">0.00</b>
                                    <div class="small text-muted">إجمالي الإيرادات</div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <b class="text-primary ng-binding">0</b>
                                    <div class="small text-muted">المعاملات</div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <b class="text-primary ng-binding">0</b>
                                    <div class="small text-muted">الفواتير</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <div class="col-md-3">
                    <div class="block style2 primary">
                        <div class="block-title">
                            <i class="icon fa fa-ellipsis-h"></i>
                            <span class="title">أخرى</span>
                        </div>
                        <div class="block-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <b class="text-primary ng-binding">10</b>
                                    <div class="small text-muted">عملاء جدد</div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <b class="text-primary ng-binding">0</b>
                                    <div class="small text-muted">تسجيل انتظار</div>
                                </div>
                                                                <div class="col-sm-12 col-md-6">
                                    <b class="text-primary ng-binding">0</b>
                                    <div class="small text-muted">اختبارات تحديد المستوى</div>
                                </div>
                                                                <div class="col-sm-12 col-md-6">
                                    <b class="text-primary ng-binding">13</b>
                                    <div class="small text-muted">دخول الموظفين</div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <b class="text-primary ng-binding">0</b>
                                    <div class="small text-muted">الرسائل</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="row">
                <div class="col-md-6">
                    <div class="block style2">
                        <div class="block-title">
                            <i class="icon fa fa-line-chart"></i>
                            <span class="title">اتجاهات النشاط</span>
                        </div>
                        <div class="block-body">
                            <div class="chart-container" style="height: 250px"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                <canvas id="activityChart" class="chart chart-line ng-isolate-scope chartjs-render-monitor" chart-data="charts.activity.data" chart-labels="charts.labels" chart-series="charts.activity.series" chart-colors="charts.activity.colors" chart-options="chartOptions" style="display: block; width: 729px; height: 250px;" width="729" height="250">
                                </canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="block style2">
                        <div class="block-title">
                            <i class="icon fa fa-bar-chart"></i>
                            <span class="title">الإيرادات</span>
                        </div>
                        <div class="block-body">
                            <div class="chart-container" style="height: 250px"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                <canvas id="revenueChart" class="chart chart-bar ng-isolate-scope chartjs-render-monitor" chart-data="charts.revenue.data" chart-labels="charts.labels" chart-series="charts.revenue.series" chart-colors="charts.revenue.colors" chart-options="chartOptions" style="display: block; width: 729px; height: 250px;" width="729" height="250">
                                </canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="block style2">
                <div class="block-title">
                    <i class="icon fa fa-table"></i>
                    <span class="title">الإحصائيات اليومية</span>
                </div>
                <div class="block-body" style="overflow-x: auto; height: 500px">
                    <table class="table table-striped table-hover table-auto-full-width">
                        <thead>
                            <tr>
                                <th>التاريخ</th>
                                                                <th>المحتملين</th>
                                <th>التحويل</th>
                                                                <th>العملاء</th>
                                <th>المجموعات</th>
                                <th>المحاضرات</th>
                                <th>التسجيل</th>
                                <th>الحضور</th>
                                <th>الغياب</th>
                                                                <th>الشهادات</th>
                                                                                                <th>الإيرادات</th>
                                <th>المعاملات</th>
                                                                <th>دخول الموظفين</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- ngRepeat: row in data.dailyStats --><tr ng-repeat="row in data.dailyStats" class="ng-scope">
                                <td class="ng-binding">Mon 20/04, 26</td>
                                                                <td class="ng-binding">0</td>
                                <td class="ng-binding">0</td>
                                                                <td class="ng-binding">10</td>
                                <td class="ng-binding">1</td>
                                <td class="ng-binding">0</td>
                                <td class="ng-binding">10</td>
                                <td class="ng-binding">0</td>
                                <td class="ng-binding"></td>
                                                                <td class="ng-binding">0</td>
                                                                                                <td class="ng-binding">0.00</td>
                                <td class="ng-binding">0</td>
                                                                <td class="ng-binding">5</td>
                            </tr><!-- end ngRepeat: row in data.dailyStats --><tr ng-repeat="row in data.dailyStats" class="ng-scope">
                                <td class="ng-binding">Tue 21/04, 26</td>
                                                                <td class="ng-binding">0</td>
                                <td class="ng-binding">0</td>
                                                                <td class="ng-binding">0</td>
                                <td class="ng-binding">0</td>
                                <td class="ng-binding">1</td>
                                <td class="ng-binding">0</td>
                                <td class="ng-binding">0</td>
                                <td class="ng-binding"></td>
                                                                <td class="ng-binding">0</td>
                                                                                                <td class="ng-binding">0.00</td>
                                <td class="ng-binding">0</td>
                                                                <td class="ng-binding">0</td>
                            </tr><!-- end ngRepeat: row in data.dailyStats --><tr ng-repeat="row in data.dailyStats" class="ng-scope">
                                <td class="ng-binding">Wed 22/04, 26</td>
                                                                <td class="ng-binding">0</td>
                                <td class="ng-binding">0</td>
                                                                <td class="ng-binding">0</td>
                                <td class="ng-binding">0</td>
                                <td class="ng-binding">0</td>
                                <td class="ng-binding">0</td>
                                <td class="ng-binding">0</td>
                                <td class="ng-binding"></td>
                                                                <td class="ng-binding">0</td>
                                                                                                <td class="ng-binding">0.00</td>
                                <td class="ng-binding">0</td>
                                                                <td class="ng-binding">4</td>
                            </tr><!-- end ngRepeat: row in data.dailyStats --><tr ng-repeat="row in data.dailyStats" class="ng-scope">
                                <td class="ng-binding">Thu 23/04, 26</td>
                                                                <td class="ng-binding">0</td>
                                <td class="ng-binding">0</td>
                                                                <td class="ng-binding">0</td>
                                <td class="ng-binding">0</td>
                                <td class="ng-binding">0</td>
                                <td class="ng-binding">0</td>
                                <td class="ng-binding">0</td>
                                <td class="ng-binding"></td>
                                                                <td class="ng-binding">0</td>
                                                                                                <td class="ng-binding">0.00</td>
                                <td class="ng-binding">0</td>
                                                                <td class="ng-binding">3</td>
                            </tr><!-- end ngRepeat: row in data.dailyStats --><tr ng-repeat="row in data.dailyStats" class="ng-scope">
                                <td class="ng-binding">Fri 24/04, 26</td>
                                                                <td class="ng-binding">0</td>
                                <td class="ng-binding">0</td>
                                                                <td class="ng-binding">0</td>
                                <td class="ng-binding">0</td>
                                <td class="ng-binding">0</td>
                                <td class="ng-binding">0</td>
                                <td class="ng-binding">0</td>
                                <td class="ng-binding"></td>
                                                                <td class="ng-binding">0</td>
                                                                                                <td class="ng-binding">0.00</td>
                                <td class="ng-binding">0</td>
                                                                <td class="ng-binding">0</td>
                            </tr><!-- end ngRepeat: row in data.dailyStats --><tr ng-repeat="row in data.dailyStats" class="ng-scope">
                                <td class="ng-binding">Sat 25/04, 26</td>
                                                                <td class="ng-binding">0</td>
                                <td class="ng-binding">0</td>
                                                                <td class="ng-binding">0</td>
                                <td class="ng-binding">0</td>
                                <td class="ng-binding">0</td>
                                <td class="ng-binding">0</td>
                                <td class="ng-binding">0</td>
                                <td class="ng-binding"></td>
                                                                <td class="ng-binding">0</td>
                                                                                                <td class="ng-binding">0.00</td>
                                <td class="ng-binding">0</td>
                                                                <td class="ng-binding">0</td>
                            </tr><!-- end ngRepeat: row in data.dailyStats --><tr ng-repeat="row in data.dailyStats" class="ng-scope">
                                <td class="ng-binding">Sun 26/04, 26</td>
                                                                <td class="ng-binding">0</td>
                                <td class="ng-binding">0</td>
                                                                <td class="ng-binding">0</td>
                                <td class="ng-binding">0</td>
                                <td class="ng-binding">1</td>
                                <td class="ng-binding">0</td>
                                <td class="ng-binding">0</td>
                                <td class="ng-binding"></td>
                                                                <td class="ng-binding">0</td>
                                                                                                <td class="ng-binding">0.00</td>
                                <td class="ng-binding">0</td>
                                                                <td class="ng-binding">1</td>
                            </tr><!-- end ngRepeat: row in data.dailyStats -->
                        </tbody>
                        <tfoot>
                            <tr class="totals-row">
                                <td><strong>الإجمالي</strong></td>
                                                                <td class="ng-binding">0</td>
                                <td class="ng-binding">0</td>
                                                                <td class="ng-binding">10</td>
                                <td class="ng-binding">1</td>
                                <td class="ng-binding">2</td>
                                <td class="ng-binding">10</td>
                                <td class="ng-binding">0</td>
                                <td class="ng-binding">0</td>
                                                                <td class="ng-binding">0</td>
                                                                                                <td class="ng-binding">0.00</td>
                                <td class="ng-binding">0</td>
                                                                <td class="ng-binding">13</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div><!-- end ngIf: data !== null -->
    </div>
        </div>
</div>


<?php
// تضمين footer template
include_once __DIR__ . '/../templates/footer.php';
?>
