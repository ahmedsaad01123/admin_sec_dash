<?php
// إعداد المتغيرات
$pageTitle = 'التقارير';
$includeSessionCheck = true;
$includeCSRFRefresh = true;

// تضمين القوالب
include_once __DIR__ . '/../templates/header.php';
include_once __DIR__ . '/../templates/sidebar.php';
?>

<div id="container" class="container-fluid">
    <div id="content" class="dashboardPage">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">
                            <i class="fa fa-chart-bar"></i> التقارير
                        </h4>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-primary" onclick="generateReport()">
                                <i class="fa fa-file-pdf"></i> إنشاء تقرير PDF
                            </button>
                            <button type="button" class="btn btn-outline-success" onclick="exportExcel()">
                                <i class="fa fa-file-excel"></i> تصدير Excel
                            </button>
                            <button type="button" class="btn btn-outline-secondary" onclick="refreshReports()">
                                <i class="fa fa-refresh"></i> تحديث
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php if (isset($_SESSION['success'])): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= htmlspecialchars($_SESSION['success']) ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                            <?php unset($_SESSION['success']); ?>
                        <?php endif; ?>
                        
                        <?php if (isset($_SESSION['error'])): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= htmlspecialchars($_SESSION['error']) ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                            <?php unset($_SESSION['error']); ?>
                        <?php endif; ?>

                        <!-- فلاتر التقارير -->
                        <div class="row mb-4">
                            <div class="col-md-3">
                                <label class="form-label">من تاريخ</label>
                                <input type="date" class="form-control" id="fromDate" value="2024-01-01">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">إلى تاريخ</label>
                                <input type="date" class="form-control" id="toDate" value="2024-12-31">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">نوع التقرير</label>
                                <select class="form-select" id="reportType">
                                    <option value="all">جميع التقارير</option>
                                    <option value="campaigns">تقارير الحملات</option>
                                    <option value="leads">تقارير العملاء المحتملين</option>
                                    <option value="conversions">تقارير التحويلات</option>
                                    <option value="roi">عائد الاستثمار</option>
                                    <option value="performance">تقارير الأداء</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">&nbsp;</label>
                                <button type="button" class="btn btn-primary w-100" onclick="applyFilters()">
                                    <i class="fa fa-filter"></i> تطبيق الفلاتر
                                </button>
                            </div>
                        </div>

                        <!-- ملخص الإحصائيات -->
                        <div class="row mb-4">
                            <div class="col-md-3">
                                <div class="card text-center bg-primary text-white">
                                    <div class="card-body">
                                        <h5 class="card-title">1,245</h5>
                                        <p class="card-text">العملاء المحتملين</p>
                                        <small>+23% هذا الشهر</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card text-center bg-success text-white">
                                    <div class="card-body">
                                        <h5 class="card-title">856</h5>
                                        <p class="card-text">التحويلات</p>
                                        <small>+15% هذا الشهر</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card text-center bg-info text-white">
                                    <div class="card-body">
                                        <h5 class="card-title">68.7%</h5>
                                        <p class="card-text">معدل التحويل</p>
                                        <small>+5% عن الشهر الماضي</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card text-center bg-warning text-white">
                                    <div class="card-body">
                                        <h5 class="card-title">324%</h5>
                                        <p class="card-text">عائد الاستثمار</p>
                                        <small>+2.1% تحسن</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- الرسوم البيانية -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h6 class="card-title mb-0">تطور العملاء المحتملين</h6>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="leadsChart" height="300"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h6 class="card-title mb-0">مصادر العملاء المحتملين</h6>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="leadsSourceChart" height="300"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h6 class="card-title mb-0">أداء الحملات</h6>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="campaignPerformanceChart" height="300"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h6 class="card-title mb-0">عائد الاستثمار حسب الحملة</h6>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="roiChart" height="300"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- جدول التقارير التفصيلي -->
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h6 class="card-title mb-0">تفاصيل التقارير</h6>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary" onclick="toggleTableColumns()">
                                        <i class="fa fa-columns"></i> الأعمدة
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary" onclick="printTable()">
                                        <i class="fa fa-print"></i> طباعة
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover" id="reportsTable">
                                        <thead>
                                            <tr>
                                                <th onclick="sortTable('date')">التاريخ <i class="fa fa-sort"></i></th>
                                                <th onclick="sortTable('type')">نوع التقرير <i class="fa fa-sort"></i></th>
                                                <th onclick="sortTable('campaign')">الحملة <i class="fa fa-sort"></i></th>
                                                <th onclick="sortTable('leads')">العملاء المحتملين <i class="fa fa-sort"></i></th>
                                                <th onclick="sortTable('conversions')">التحويلات <i class="fa fa-sort"></i></th>
                                                <th onclick="sortTable('conversionRate')">معدل التحويل <i class="fa fa-sort"></i></th>
                                                <th onclick="sortTable('cost')">التكلفة <i class="fa fa-sort"></i></th>
                                                <th onclick="sortTable('revenue')">الإيرادات <i class="fa fa-sort"></i></th>
                                                <th onclick="sortTable('roi')">عائد الاستثمار <i class="fa fa-sort"></i></th>
                                                <th>الإجراءات</th>
                                            </tr>
                                        </thead>
                                        <tbody id="reportsTableBody">
                                            <!-- سيتم تحميل البيانات هنا -->
                                        </tbody>
                                    </table>
                                </div>
                                
                                <!-- Pagination -->
                                <nav aria-label="Page navigation" class="mt-3">
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1">السابق</a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">التالي</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>

                        <!-- ملخص إضافي -->
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h6 class="card-title mb-0">أفضل 5 حملات</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="list-group">
                                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h6 class="mb-1">حملة رمضان 2024</h6>
                                                    <small class="text-muted">324 تحويل، 456% ROI</small>
                                                </div>
                                                <span class="badge bg-success rounded-pill">الأول</span>
                                            </div>
                                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h6 class="mb-1">حملة العودة للمدارس</h6>
                                                    <small class="text-muted">289 تحويل، 324% ROI</small>
                                                </div>
                                                <span class="badge bg-primary rounded-pill">الثاني</span>
                                            </div>
                                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h6 class="mb-1">حملة الصيف</h6>
                                                    <small class="text-muted">256 تحويل، 289% ROI</small>
                                                </div>
                                                <span class="badge bg-info rounded-pill">الثالث</span>
                                            </div>
                                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h6 class="mb-1">حملة نهاية العام</h6>
                                                    <small class="text-muted">198 تحويل، 245% ROI</small>
                                                </div>
                                                <span class="badge bg-warning rounded-pill">الرابع</span>
                                            </div>
                                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h6 class="mb-1">حملة الربيع</h6>
                                                    <small class="text-muted">145 تحويل، 198% ROI</small>
                                                </div>
                                                <span class="badge bg-secondary rounded-pill">الخامس</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h6 class="card-title mb-0">مصادر التحويل</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="list-group">
                                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h6 class="mb-1">موقع الويب</h6>
                                                    <small class="text-muted">45% من التحويلات</small>
                                                </div>
                                                <span class="badge bg-primary rounded-pill">385</span>
                                            </div>
                                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h6 class="mb-1">وسائل التواصل الاجتماعي</h6>
                                                    <small class="text-muted">28% من التحويلات</small>
                                                </div>
                                                <span class="badge bg-info rounded-pill">240</span>
                                            </div>
                                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h6 class="mb-1">البريد الإلكتروني</h6>
                                                    <small class="text-muted">15% من التحويلات</small>
                                                </div>
                                                <span class="badge bg-success rounded-pill">128</span>
                                            </div>
                                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h6 class="mb-1">الإعلانات المدفوعة</h6>
                                                    <small class="text-muted">8% من التحويلات</small>
                                                </div>
                                                <span class="badge bg-warning rounded-pill">68</span>
                                            </div>
                                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h6 class="mb-1">مصادر أخرى</h6>
                                                    <small class="text-muted">4% من التحويلات</small>
                                                </div>
                                                <span class="badge bg-secondary rounded-pill">35</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal تفاصيل التقرير -->
<div class="modal fade" id="reportDetailsModal" tabindex="-1" aria-labelledby="reportDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reportDetailsModalLabel">
                    <i class="fa fa-chart-bar"></i> تفاصيل التقرير
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="reportDetailsContent">
                    <!-- سيتم تحميل التفاصيل هنا -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                <button type="button" class="btn btn-info" id="printReportBtn">
                    <i class="fa fa-print"></i> طباعة التقرير
                </button>
                <button type="button" class="btn btn-success" id="downloadReportBtn">
                    <i class="fa fa-download"></i> تحميل التقرير
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal اختيار الأعمدة -->
<div class="modal fade" id="columnsModal" tabindex="-1" aria-labelledby="columnsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="columnsModalLabel">
                    <i class="fa fa-columns"></i> اختيار الأعمدة
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="colDate" checked>
                    <label class="form-check-label" for="colDate">التاريخ</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="colType" checked>
                    <label class="form-check-label" for="colType">نوع التقرير</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="colCampaign" checked>
                    <label class="form-check-label" for="colCampaign">الحملة</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="colLeads" checked>
                    <label class="form-check-label" for="colLeads">العملاء المحتملين</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="colConversions" checked>
                    <label class="form-check-label" for="colConversions">التحويلات</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="colConversionRate" checked>
                    <label class="form-check-label" for="colConversionRate">معدل التحويل</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="colCost" checked>
                    <label class="form-check-label" for="colCost">التكلفة</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="colRevenue" checked>
                    <label class="form-check-label" for="colRevenue">الإيرادات</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="colROI" checked>
                    <label class="form-check-label" for="colROI">عائد الاستثمار</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                <button type="button" class="btn btn-primary" onclick="applyColumnSelection()">تطبيق</button>
            </div>
        </div>
    </div>
</div>

<?php
// تضمين footer template
include_once __DIR__ . '/../templates/footer.php';
?>

<style>
.status-badge {
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: bold;
}

.status-active {
    background: #d4edda;
    color: #155724;
}

.status-completed {
    background: #d1ecf1;
    color: #0c5460;
}

.status-pending {
    background: #fff3cd;
    color: #856404;
}

.status-cancelled {
    background: #f8d7da;
    color: #721c24;
}

.type-badge {
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: bold;
}

.type-campaign {
    background: #cce5ff;
    color: #004085;
}

.type-leads {
    background: #d4edda;
    color: #155724;
}

.type-conversions {
    background: #fff3cd;
    color: #856404;
}

.type-roi {
    background: #f8d7da;
    color: #721c24;
}

.type-performance {
    background: #e2e3e5;
    color: #383d41;
}

.table th {
    background-color: #f8f9fa;
    border-top: none;
    font-weight: 600;
    color: #495057;
    cursor: pointer;
}

.table th:hover {
    background-color: #e9ecef;
}

.table-responsive {
    border-radius: 0.375rem;
    overflow: hidden;
}

.card {
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    border: 1px solid rgba(0, 0, 0, 0.125);
}

.card-header {
    background-color: #f8f9fa;
    border-bottom: 1px solid rgba(0, 0, 0, 0.125);
}

.alert {
    border: none;
    border-radius: 10px;
}

.text-primary {
    color: #007bff !important;
}

.text-success {
    color: #28a745 !important;
}

.text-info {
    color: #17a2b8 !important;
}

.text-warning {
    color: #ffc107 !important;
}

.text-danger {
    color: #dc3545 !important;
}

.text-muted {
    color: #6c757d !important;
}

.btn:disabled {
    opacity: 0.5;
    cursor: not-allowed;
}

.form-check {
    padding-right: 1.5rem;
}

.form-check-input {
    margin-right: 0.5rem;
}

.form-check-input:checked {
    background-color: #007bff;
    border-color: #007bff;
}

.form-label {
    font-weight: 600;
    color: #495057;
}

.form-control:focus,
.form-select:focus {
    border-color: #007bff;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

.badge {
    font-size: 0.75rem;
    font-weight: bold;
}

.pagination {
    margin-bottom: 0;
}

.report-details-section {
    margin-bottom: 2rem;
}

.report-details-section h6 {
    color: #495057;
    font-weight: 600;
    margin-bottom: 1rem;
    border-bottom: 2px solid #007bff;
    padding-bottom: 0.5rem;
}

.list-group-item {
    border: none;
    border-bottom: 1px solid #dee2e6;
}

.list-group-item:last-child {
    border-bottom: none;
}

@media (max-width: 768px) {
    .d-flex.justify-content-between {
        flex-direction: column;
        gap: 1rem;
    }
    
    .d-flex.justify-content-between > div {
        display: flex;
        gap: 0.5rem;
    }
    
    .col-md-8,
    .col-md-4 {
        margin-bottom: 1rem;
    }
}
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
// بيانات التقارير
let reportsData = [];
let currentSortField = '';
let currentSortDirection = 'asc';
let currentPage = 1;
let itemsPerPage = 10;

// تهيئة الصفحة
function initMarketingReports() {
    loadReports();
    setupCharts();
    setupEventListeners();
}

// تحميل التقارير
function loadReports() {
    // محاكاة تحميل البيانات من الخادم
    reportsData = getMockReports();
    renderReports();
}

// إعداد مستمعي الأحداث
function setupEventListeners() {
    // البحث والفلترة
    document.getElementById('fromDate').addEventListener('change', applyFilters);
    document.getElementById('toDate').addEventListener('change', applyFilters);
    document.getElementById('reportType').addEventListener('change', applyFilters);
}

// عرض التقارير
function renderReports() {
    const tbody = document.getElementById('reportsTableBody');
    const startIndex = (currentPage - 1) * itemsPerPage;
    const endIndex = startIndex + itemsPerPage;
    const pageData = reportsData.slice(startIndex, endIndex);
    
    tbody.innerHTML = pageData.map(report => `
        <tr>
            <td>
                <div class="fw-bold">${new Date(report.date).toLocaleDateString('ar-EG')}</div>
                <small class="text-muted">${new Date(report.date).toLocaleTimeString('ar-EG')}</small>
            </td>
            <td>
                <span class="type-badge type-${report.type}">${getReportTypeText(report.type)}</span>
            </td>
            <td>
                <div class="fw-bold">${report.campaign}</div>
                <small class="text-muted">${report.campaign_type || ''}</small>
            </td>
            <td>
                <div class="fw-bold text-primary">${report.leads.toLocaleString('ar-EG')}</div>
                <small class="text-muted">+${report.leads_growth}%</small>
            </td>
            <td>
                <div class="fw-bold text-success">${report.conversions.toLocaleString('ar-EG')}</div>
                <small class="text-muted">+${report.conversions_growth}%</small>
            </td>
            <td>
                <div class="fw-bold text-info">${report.conversion_rate}%</div>
                <small class="text-muted">+${report.conversion_rate_growth}%</small>
            </td>
            <td>
                <div class="fw-bold text-danger">${report.cost.toLocaleString('ar-EG')} ريال</div>
                <small class="text-muted">${report.cost_per_lead} للعميل المحتمل</small>
            </td>
            <td>
                <div class="fw-bold text-success">${report.revenue.toLocaleString('ar-EG')} ريال</div>
                <small class="text-muted">${report.revenue_per_conversion} للتحويل</small>
            </td>
            <td>
                <div class="fw-bold ${report.roi >= 100 ? 'text-success' : 'text-warning'}">${report.roi}%</div>
                <small class="text-muted">${report.roi_growth}% نمو</small>
            </td>
            <td>
                <div class="action-buttons">
                    <button class="btn btn-sm btn-outline-primary" onclick="viewReportDetails('${report.id}')" title="عرض التفاصيل">
                        <i class="fa fa-eye"></i>
                    </button>
                    <button class="btn btn-sm btn-outline-info" onclick="printReport('${report.id}')" title="طباعة التقرير">
                        <i class="fa fa-print"></i>
                    </button>
                    <button class="btn btn-sm btn-outline-success" onclick="downloadReport('${report.id}')" title="تحميل التقرير">
                        <i class="fa fa-download"></i>
                    </button>
                </div>
            </td>
        </tr>
    `).join('');
}

// إعداد الرسوم البيانية
function setupCharts() {
    // رسم بياني تطور العملاء المحتملين
    const leadsCtx = document.getElementById('leadsChart');
    if (leadsCtx) {
        new Chart(leadsCtx, {
            type: 'line',
            data: {
                labels: ['يناير', 'فبراير', 'مارس', 'أبريل', 'مايو', 'يونيو', 'يوليو', 'أغسطس', 'سبتمبر', 'أكتوبر', 'نوفمبر', 'ديسمبر'],
                datasets: [{
                    label: 'العملاء المحتملين',
                    data: [85, 92, 88, 105, 98, 112, 108, 115, 125, 118, 132, 145],
                    borderColor: '#007bff',
                    backgroundColor: 'rgba(0, 123, 255, 0.1)',
                    tension: 0.4,
                    fill: true
                }, {
                    label: 'التحويلات',
                    data: [45, 52, 48, 65, 58, 72, 68, 75, 85, 78, 92, 105],
                    borderColor: '#28a745',
                    backgroundColor: 'rgba(40, 167, 69, 0.1)',
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }
    
    // رسم بياني مصادر العملاء المحتملين
    const sourceCtx = document.getElementById('leadsSourceChart');
    if (sourceCtx) {
        new Chart(sourceCtx, {
            type: 'doughnut',
            data: {
                labels: ['موقع الويب', 'وسائل التواصل الاجتماعي', 'البريد الإلكتروني', 'الإعلانات المدفوعة', 'مصادر أخرى'],
                datasets: [{
                    data: [45, 28, 15, 8, 4],
                    backgroundColor: ['#007bff', '#28a745', '#ffc107', '#dc3545', '#6c757d']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    }
    
    // رسم بياني أداء الحملات
    const performanceCtx = document.getElementById('campaignPerformanceChart');
    if (performanceCtx) {
        new Chart(performanceCtx, {
            type: 'bar',
            data: {
                labels: ['حملة رمضان', 'العودة للمدارس', 'الصيف', 'نهاية العام', 'الربيع'],
                datasets: [{
                    label: 'العملاء المحتملين',
                    data: [324, 289, 256, 198, 145],
                    backgroundColor: '#007bff'
                }, {
                    label: 'التحويلات',
                    data: [198, 165, 142, 98, 75],
                    backgroundColor: '#28a745'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    }
    
    // رسم بياني عائد الاستثمار
    const roiCtx = document.getElementById('roiChart');
    if (roiCtx) {
        new Chart(roiCtx, {
            type: 'bar',
            data: {
                labels: ['حملة رمضان', 'العودة للمدارس', 'الصيف', 'نهاية العام', 'الربيع'],
                datasets: [{
                    label: 'عائد الاستثمار (%)',
                    data: [456, 324, 289, 245, 198],
                    backgroundColor: '#ffc107'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return value + '%';
                            }
                        }
                    }
                }
            }
        });
    }
}

// تطبيق الفلاتر
function applyFilters() {
    const fromDate = document.getElementById('fromDate').value;
    const toDate = document.getElementById('toDate').value;
    const reportType = document.getElementById('reportType').value;
    
    // محاكاة تطبيق الفلاتر
    console.log('Applying filters:', { fromDate, toDate, reportType });
    
    // إعادة تحميل البيانات
    loadReports();
    showSuccessMessage('تم تطبيق الفلاتر بنجاح');
}

// عرض تفاصيل التقرير
function viewReportDetails(reportId) {
    const report = reportsData.find(r => r.id === reportId);
    if (!report) return;
    
    const content = `
        <div class="report-details-section">
            <h6><i class="fa fa-info-circle"></i> معلومات التقرير</h6>
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-sm">
                        <tr><td>رقم التقرير:</td><td>#${report.id}</td></tr>
                        <tr><td>التاريخ:</td><td>${new Date(report.date).toLocaleString('ar-EG')}</td></tr>
                        <tr><td>النوع:</td><td><span class="type-badge type-${report.type}">${getReportTypeText(report.type)}</span></td></tr>
                        <tr><td>الحملة:</td><td>${report.campaign}</td></tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table table-sm">
                        <tr><td>العملاء المحتملين:</td><td class="fw-bold text-primary">${report.leads.toLocaleString('ar-EG')}</td></tr>
                        <tr><td>التحويلات:</td><td class="fw-bold text-success">${report.conversions.toLocaleString('ar-EG')}</td></tr>
                        <tr><td>معدل التحويل:</td><td class="fw-bold text-info">${report.conversion_rate}%</td></tr>
                        <tr><td>عائد الاستثمار:</td><td class="fw-bold ${report.roi >= 100 ? 'text-success' : 'text-warning'}">${report.roi}%</td></tr>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="report-details-section">
            <h6><i class="fa fa-money"></i> المعلومات المالية</h6>
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-sm">
                        <tr><td>التكلفة الإجمالية:</td><td class="fw-bold text-danger">${report.cost.toLocaleString('ar-EG')} ريال</td></tr>
                        <tr><td>التكلفة للعميل المحتمل:</td><td>${report.cost_per_lead} ريال</td></tr>
                        <tr><td>التكلفة للتحويل:</td><td>${report.cost_per_conversion} ريال</td></tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table table-sm">
                        <tr><td>الإيرادات الإجمالية:</td><td class="fw-bold text-success">${report.revenue.toLocaleString('ar-EG')} ريال</td></tr>
                        <tr><td>الإيراد للتحويل:</td><td>${report.revenue_per_conversion} ريال</td></tr>
                        <tr><td>صافي الربح:</td><td class="fw-bold text-primary">${(report.revenue - report.cost).toLocaleString('ar-EG')} ريال</td></tr>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="report-details-section">
            <h6><i class="fa fa-chart-line"></i> مؤشرات الأداء</h6>
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-sm">
                        <tr><td>نمو العملاء المحتملين:</td><td class="text-success">+${report.leads_growth}%</td></tr>
                        <tr><td>نمو التحويلات:</td><td class="text-success">+${report.conversions_growth}%</td></tr>
                        <tr><td>نمو معدل التحويل:</td><td class="text-success">+${report.conversion_rate_growth}%</td></tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table table-sm">
                        <tr><td>نمو عائد الاستثمار:</td><td class="text-success">+${report.roi_growth}%</td></tr>
                        <tr><td>نمو الإيرادات:</td><td class="text-success">+${report.revenue_growth}%</td></tr>
                        <tr><td>نمو التكاليف:</td><td class="${report.cost_growth > 0 ? 'text-danger' : 'text-success'}">${report.cost_growth > 0 ? '+' : ''}${report.cost_growth}%</td></tr>
                    </table>
                </div>
            </div>
        </div>
    `;
    
    document.getElementById('reportDetailsContent').innerHTML = content;
    
    // إعداد أزرار الإجراءات
    document.getElementById('printReportBtn').onclick = () => printReport(reportId);
    document.getElementById('downloadReportBtn').onclick = () => downloadReport(reportId);
    
    // عرض المودال
    const modal = new bootstrap.Modal(document.getElementById('reportDetailsModal'));
    modal.show();
}

// طباعة التقرير
function printReport(reportId) {
    const report = reportsData.find(r => r.id === reportId);
    if (!report) return;
    
    window.print();
    showSuccessMessage('جاري طباعة التقرير...');
}

// تحميل التقرير
function downloadReport(reportId) {
    const report = reportsData.find(r => r.id === reportId);
    if (!report) return;
    
    showSuccessMessage('جاري تحميل التقرير...');
    
    setTimeout(() => {
        showSuccessMessage('تم تحميل التقرير بنجاح');
    }, 2000);
}

// الترتيب
function sortTable(field) {
    if (currentSortField === field) {
        currentSortDirection = currentSortDirection === 'asc' ? 'desc' : 'asc';
    } else {
        currentSortField = field;
        currentSortDirection = 'asc';
    }
    
    reportsData.sort((a, b) => {
        let aVal = a[field];
        let bVal = b[field];
        
        if (typeof aVal === 'string') {
            aVal = aVal.toLowerCase();
            bVal = bVal.toLowerCase();
        }
        
        if (currentSortDirection === 'asc') {
            return aVal > bVal ? 1 : -1;
        } else {
            return aVal < bVal ? 1 : -1;
        }
    });
    
    renderReports();
}

// تبديل أعمدة الجدول
function toggleTableColumns() {
    const modal = new bootstrap.Modal(document.getElementById('columnsModal'));
    modal.show();
}

// تطبيق اختيار الأعمدة
function applyColumnSelection() {
    const columns = {
        date: document.getElementById('colDate').checked,
        type: document.getElementById('colType').checked,
        campaign: document.getElementById('colCampaign').checked,
        leads: document.getElementById('colLeads').checked,
        conversions: document.getElementById('colConversions').checked,
        conversionRate: document.getElementById('colConversionRate').checked,
        cost: document.getElementById('colCost').checked,
        revenue: document.getElementById('colRevenue').checked,
        roi: document.getElementById('colROI').checked
    };
    
    // تطبيق الأعمدة المختارة
    console.log('Applying column selection:', columns);
    
    // إغلاق المودال
    const modal = bootstrap.Modal.getInstance(document.getElementById('columnsModal'));
    if (modal) modal.hide();
    
    showSuccessMessage('تم تحديث الأعمدة بنجاح');
}

// طباعة الجدول
function printTable() {
    window.print();
    showSuccessMessage('جاري طباعة الجدول...');
}

// إنشاء تقرير PDF
function generateReport() {
    showSuccessMessage('جاري إنشاء تقرير PDF...');
    
    setTimeout(() => {
        showSuccessMessage('تم إنشاء التقرير بنجاح');
    }, 2000);
}

// تصدير Excel
function exportExcel() {
    showSuccessMessage('جاري تصدير البيانات إلى Excel...');
    
    setTimeout(() => {
        showSuccessMessage('تم تصدير البيانات بنجاح');
    }, 2000);
}

// تحديث التقارير
function refreshReports() {
    loadReports();
    setupCharts();
    showSuccessMessage('تم تحديث التقارير بنجاح');
}

// دوال مساعدة
function getReportTypeText(type) {
    const types = {
        'campaigns': 'تقارير الحملات',
        'leads': 'تقارير العملاء المحتملين',
        'conversions': 'تقارير التحويلات',
        'roi': 'عائد الاستثمار',
        'performance': 'تقارير الأداء'
    };
    return types[type] || type;
}

// بيانات وهمية للتقارير
function getMockReports() {
    return [
        {
            id: 'RPT-2024-001',
            date: '2024-01-15T10:30:00Z',
            type: 'campaigns',
            campaign: 'حملة رمضان 2024',
            campaign_type: 'حملة موسمية',
            leads: 324,
            conversions: 198,
            conversion_rate: 61.1,
            cost: 45000,
            cost_per_lead: 139,
            cost_per_conversion: 227,
            revenue: 205000,
            revenue_per_conversion: 1035,
            roi: 356,
            roi_growth: 12.5,
            leads_growth: 23.4,
            conversions_growth: 18.7,
            conversion_rate_growth: -2.3,
            revenue_growth: 15.8,
            cost_growth: 8.2
        },
        {
            id: 'RPT-2024-002',
            date: '2024-01-16T14:20:00Z',
            type: 'leads',
            campaign: 'العودة للمدارس',
            campaign_type: 'حملة تعليمية',
            leads: 289,
            conversions: 165,
            conversion_rate: 57.1,
            cost: 38000,
            cost_per_lead: 131,
            cost_per_conversion: 230,
            revenue: 168000,
            revenue_per_conversion: 1018,
            roi: 342,
            roi_growth: 8.9,
            leads_growth: 19.2,
            conversions_growth: 15.3,
            conversion_rate_growth: -1.8,
            revenue_growth: 12.4,
            cost_growth: 5.6
        },
        {
            id: 'RPT-2024-003',
            date: '2024-01-17T09:15:00Z',
            type: 'conversions',
            campaign: 'حملة الصيف',
            campaign_type: 'حملة موسمية',
            leads: 256,
            conversions: 142,
            conversion_rate: 55.5,
            cost: 32000,
            cost_per_lead: 125,
            cost_per_conversion: 225,
            revenue: 145000,
            revenue_per_conversion: 1021,
            roi: 353,
            roi_growth: 10.2,
            leads_growth: 16.8,
            conversions_growth: 13.1,
            conversion_rate_growth: -1.2,
            revenue_growth: 11.7,
            cost_growth: 4.3
        },
        {
            id: 'RPT-2024-004',
            date: '2024-01-18T11:45:00Z',
            type: 'roi',
            campaign: 'نهاية العام',
            campaign_type: 'حملة ترويجية',
            leads: 198,
            conversions: 98,
            conversion_rate: 49.5,
            cost: 25000,
            cost_per_lead: 126,
            cost_per_conversion: 255,
            revenue: 98000,
            revenue_per_conversion: 1000,
            roi: 292,
            roi_growth: 6.5,
            leads_growth: 12.4,
            conversions_growth: 9.8,
            conversion_rate_growth: -0.8,
            revenue_growth: 8.9,
            cost_growth: 3.2
        },
        {
            id: 'RPT-2024-005',
            date: '2024-01-19T16:30:00Z',
            type: 'performance',
            campaign: 'الربيع',
            campaign_type: 'حملة موسمية',
            leads: 145,
            conversions: 75,
            conversion_rate: 51.7,
            cost: 18000,
            cost_per_lead: 124,
            cost_per_conversion: 240,
            revenue: 78000,
            revenue_per_conversion: 1040,
            roi: 333,
            roi_growth: 7.8,
            leads_growth: 10.1,
            conversions_growth: 8.3,
            conversion_rate_growth: -0.5,
            revenue_growth: 9.6,
            cost_growth: 2.8
        }
    ];
}

function showSuccessMessage(message) {
    console.log(message);
    // في التطبيق الحقيقي، سيتم عرض رسالة نجاح مناسبة
}

// تهيئة الصفحة عند تحميلها
document.addEventListener('DOMContentLoaded', initMarketingReports);
</script>
