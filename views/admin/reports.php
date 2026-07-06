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
                                <i class="fa fa-plus"></i> إنشاء تقرير
                            </button>
                            <button type="button" class="btn btn-outline-success" onclick="exportReports()">
                                <i class="fa fa-download"></i> تصدير
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
                                <label class="form-label">البحث عن تقرير</label>
                                <input type="text" class="form-control" id="searchReport" placeholder="ابحث عن تقرير...">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">الفئة</label>
                                <select class="form-select" id="categoryFilter">
                                    <option value="all">جميع الفئات</option>
                                    <option value="financial">مالية</option>
                                    <option value="academic">أكاديمية</option>
                                    <option value="operational">تشغيلية</option>
                                    <option value="marketing">تسويق</option>
                                    <option value="hr">موارد بشرية</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">الحالة</label>
                                <select class="form-select" id="statusFilter">
                                    <option value="all">جميع الحالات</option>
                                    <option value="draft">مسودة</option>
                                    <option value="processing">قيد المعالجة</option>
                                    <option value="completed">مكتمل</option>
                                    <option value="failed">فشل</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">الفترة</label>
                                <select class="form-select" id="periodFilter">
                                    <option value="all">جميع الفترات</option>
                                    <option value="today">اليوم</option>
                                    <option value="week">هذا الأسبوع</option>
                                    <option value="month">هذا الشهر</option>
                                    <option value="quarter">هذا الربع</option>
                                    <option value="year">هذا العام</option>
                                </select>
                            </div>
                        </div>

                        <!-- ملخص الإحصائيات -->
                        <div class="row mb-4">
                            <div class="col-md-3">
                                <div class="card text-center bg-primary text-white">
                                    <div class="card-body">
                                        <h5 class="card-title">156</h5>
                                        <p class="card-text">إجمالي التقارير</p>
                                        <small>12 تقرير جديد هذا الشهر</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card text-center bg-success text-white">
                                    <div class="card-body">
                                        <h5 class="card-title">98</h5>
                                        <p class="card-text">تقارير مكتملة</p>
                                        <small>63% معدل إنجاز</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card text-center bg-warning text-white">
                                    <div class="card-body">
                                        <h5 class="card-title">34</h5>
                                        <p class="card-text">قيد المعالجة</p>
                                        <small>22% قيد التنفيذ</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card text-center bg-danger text-white">
                                    <div class="card-body">
                                        <h5 class="card-title">24</h5>
                                        <p class="card-text">فشلت</p>
                                        <small>15% معدل فشل</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- التقارير المميزة -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h5 class="mb-3">التقارير المميزة</h5>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card border-primary">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center mb-2">
                                                    <i class="fa fa-star text-warning"></i>
                                                    <span class="badge bg-primary ms-2">مالية</span>
                                                </div>
                                                <h6 class="card-title">تقرير الإيرادات الشهري</h6>
                                                <p class="card-text text-muted">ملخص إجمالي الإيرادات والمصروفات للشهر الحالي</p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <small class="text-muted">مكتمل</small>
                                                    <a href="#" class="btn btn-sm btn-outline-primary">عرض</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card border-success">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center mb-2">
                                                    <i class="fa fa-star text-warning"></i>
                                                    <span class="badge bg-success ms-2">أكاديمية</span>
                                                </div>
                                                <h6 class="card-title">تقرير أداء الطلاب</h6>
                                                <p class="card-text text-muted">تحليل أداء الطلاب في جميع الدورات</p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <small class="text-muted">مكتمل</small>
                                                    <a href="#" class="btn btn-sm btn-outline-success">عرض</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card border-warning">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center mb-2">
                                                    <i class="fa fa-star text-warning"></i>
                                                    <span class="badge bg-warning ms-2">تشغيلية</span>
                                                </div>
                                                <h6 class="card-title">تقرير استخدام القاعات</h6>
                                                <p class="card-text text-muted">إحصائيات استخدام قاعات التدريب</p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <small class="text-muted">قيد المعالجة</small>
                                                    <a href="#" class="btn btn-sm btn-outline-warning">عرض</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- قائمة التقارير -->
                        <div class="row">
                            <div class="col-md-8">
                                <h5 class="mb-3">جميع التقارير</h5>
                                <div class="list-group" id="reportsList">
                                    <!-- سيتم تحميل التقارير هنا -->
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
                            <div class="col-md-4">
                                <h5 class="mb-3">فلاتر سريعة</h5>
                                <div class="list-group">
                                    <a href="#" class="list-group-item list-group-item-action active" onclick="filterByCategory('all')">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span><i class="fa fa-list"></i> جميع التقارير</span>
                                            <span class="badge bg-primary rounded-pill">156</span>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action" onclick="filterByCategory('financial')">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span><i class="fa fa-money-bill-wave"></i> مالية</span>
                                            <span class="badge bg-success rounded-pill">45</span>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action" onclick="filterByCategory('academic')">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span><i class="fa fa-graduation-cap"></i> أكاديمية</span>
                                            <span class="badge bg-info rounded-pill">38</span>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action" onclick="filterByCategory('operational')">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span><i class="fa fa-cogs"></i> تشغيلية</span>
                                            <span class="badge bg-warning rounded-pill">32</span>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action" onclick="filterByCategory('marketing')">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span><i class="fa fa-bullhorn"></i> تسويق</span>
                                            <span class="badge bg-danger rounded-pill">28</span>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action" onclick="filterByCategory('hr')">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span><i class="fa fa-users"></i> موارد بشرية</span>
                                            <span class="badge bg-secondary rounded-pill">13</span>
                                        </div>
                                    </a>
                                </div>

                                <h5 class="mb-3 mt-4">الحالة</h5>
                                <div class="list-group">
                                    <a href="#" class="list-group-item list-group-item-action" onclick="filterByStatus('draft')">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span><i class="fa fa-file-alt text-secondary"></i> مسودة</span>
                                            <span class="badge bg-secondary rounded-pill">12</span>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action" onclick="filterByStatus('processing')">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span><i class="fa fa-spinner text-warning"></i> قيد المعالجة</span>
                                            <span class="badge bg-warning rounded-pill">34</span>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action" onclick="filterByStatus('completed')">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span><i class="fa fa-check-circle text-success"></i> مكتمل</span>
                                            <span class="badge bg-success rounded-pill">98</span>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action" onclick="filterByStatus('failed')">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span><i class="fa fa-times-circle text-danger"></i> فشل</span>
                                            <span class="badge bg-danger rounded-pill">24</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal إنشاء تقرير -->
<div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="reportModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reportModalLabel">
                    <i class="fa fa-plus"></i> إنشاء تقرير جديد
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="reportForm">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">عنوان التقرير *</label>
                                <input type="text" class="form-control" id="reportTitle" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">الفئة *</label>
                                <select class="form-select" id="reportCategory" required>
                                    <option value="financial">مالية</option>
                                    <option value="academic">أكاديمية</option>
                                    <option value="operational">تشغيلية</option>
                                    <option value="marketing">تسويق</option>
                                    <option value="hr">موارد بشرية</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">نوع التقرير *</label>
                                <select class="form-select" id="reportType" required>
                                    <option value="summary">ملخص</option>
                                    <option value="detailed">تفصيلي</option>
                                    <option value="analytical">تحليلي</option>
                                    <option value="statistical">إحصائي</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">الأولوية</label>
                                <select class="form-select" id="reportPriority">
                                    <option value="low">منخفضة</option>
                                    <option value="medium">متوسطة</option>
                                    <option value="high">عالية</option>
                                    <option value="urgent">عاجلة</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">تاريخ البدء *</label>
                                <input type="date" class="form-control" id="startDate" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">تاريخ الانتهاء *</label>
                                <input type="date" class="form-control" id="endDate" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">الوصف</label>
                        <textarea class="form-control" id="reportDescription" rows="3" placeholder="وصف التقرير والبيانات المطلوبة..."></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">البيانات المطلوبة</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="includeRevenue">
                                    <label class="form-check-label" for="includeRevenue">
                                        الإيرادات
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="includeExpenses">
                                    <label class="form-check-label" for="includeExpenses">
                                        المصروفات
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="includeStudents">
                                    <label class="form-check-label" for="includeStudents">
                                        بيانات الطلاب
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="includeInstructors">
                                    <label class="form-check-label" for="includeInstructors">
                                        بيانات المدربين
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">صيغة الإخراج</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="outputFormat" id="pdfFormat" value="pdf" checked>
                                    <label class="form-check-label" for="pdfFormat">
                                        PDF
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="outputFormat" id="excelFormat" value="excel">
                                    <label class="form-check-label" for="excelFormat">
                                        Excel
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="outputFormat" id="wordFormat" value="word">
                                    <label class="form-check-label" for="wordFormat">
                                        Word
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="outputFormat" id="csvFormat" value="csv">
                                    <label class="form-check-label" for="csvFormat">
                                        CSV
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="autoGenerate">
                                <label class="form-check-label" for="autoGenerate">
                                    إنشاء تلقائي دوري
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="emailNotification">
                                <label class="form-check-label" for="emailNotification">
                                    إشعار بالبريد الإلكتروني عند اكتمال
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="includeCharts">
                                <label class="form-check-label" for="includeCharts">
                                    تضمين رسوم بيانية
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="includeSummary">
                                <label class="form-check-label" for="includeSummary">
                                    تضمين ملخص تنفيذي
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                <button type="button" class="btn btn-outline-info" onclick="previewReport()">
                    <i class="fa fa-eye"></i> معاينة
                </button>
                <button type="button" class="btn btn-primary" onclick="saveReport()">
                    <i class="fa fa-save"></i> إنشاء التقرير
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal عرض تفاصيل التقرير -->
<div class="modal fade" id="reportDetailsModal" tabindex="-1" aria-labelledby="reportDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reportDetailsModalLabel">
                    <i class="fa fa-eye"></i> عرض التقرير
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="reportDetailsContent">
                    <!-- سيتم تحميل المحتوى هنا -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                <button type="button" class="btn btn-outline-primary" id="downloadReportBtn">
                    <i class="fa fa-download"></i> تحميل
                </button>
                <button type="button" class="btn btn-outline-success" id="shareReportBtn">
                    <i class="fa fa-share"></i> مشاركة
                </button>
                <button type="button" class="btn btn-outline-danger" id="deleteReportBtn">
                    <i class="fa fa-trash"></i> حذف
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal معاينة التقرير -->
<div class="modal fade" id="reportPreviewModal" tabindex="-1" aria-labelledby="reportPreviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reportPreviewModalLabel">
                    <i class="fa fa-eye"></i> معاينة التقرير
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="reportPreviewContent">
                    <!-- سيتم تحميل المحتوى هنا -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>

<?php
// تضمين footer template
include_once __DIR__ . '/../templates/footer.php';
?>

<style>
.report-item {
    border: 1px solid #dee2e6;
    border-radius: 8px;
    margin-bottom: 1rem;
    transition: all 0.3s ease;
}

.report-item:hover {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.report-item-header {
    padding: 1rem;
    border-bottom: 1px solid #dee2e6;
}

.report-item-body {
    padding: 1rem;
}

.report-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 0.5rem;
    font-size: 0.875rem;
    color: #6c757d;
}

.report-actions {
    display: flex;
    gap: 0.5rem;
    margin-top: 1rem;
}

.category-badge {
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: bold;
}

.category-financial {
    background: #d4edda;
    color: #155724;
}

.category-academic {
    background: #d1ecf1;
    color: #0c5460;
}

.category-operational {
    background: #fff3cd;
    color: #856404;
}

.category-marketing {
    background: #f8d7da;
    color: #721c24;
}

.category-hr {
    background: #e2e3e5;
    color: #383d41;
}

.status-badge {
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: bold;
}

.status-draft {
    background: #e2e3e5;
    color: #383d41;
}

.status-processing {
    background: #fff3cd;
    color: #856404;
}

.status-completed {
    background: #d4edda;
    color: #155724;
}

.status-failed {
    background: #f8d7da;
    color: #721c24;
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

.form-label {
    font-weight: 600;
    color: #495057;
}

.form-control:focus,
.form-select:focus {
    border-color: #007bff;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

.btn:disabled {
    opacity: 0.5;
    cursor: not-allowed;
}

.list-group-item {
    border: none;
    border-bottom: 1px solid #dee2e6;
}

.list-group-item:last-child {
    border-bottom: none;
}

.list-group-item.active {
    background-color: #007bff;
    border-color: #007bff;
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

.report-preview {
    border: 1px solid #dee2e6;
    border-radius: 8px;
    padding: 1rem;
    background-color: #f8f9fa;
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
    
    .report-meta {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.5rem;
    }
}
</style>

<script>
// بيانات التقارير
let reportsData = [];
let currentReportId = null;
let currentPage = 1;
let itemsPerPage = 10;

// تهيئة الصفحة
function initReports() {
    loadReports();
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
    document.getElementById('searchReport').addEventListener('input', applyFilters);
    document.getElementById('categoryFilter').addEventListener('change', applyFilters);
    document.getElementById('statusFilter').addEventListener('change', applyFilters);
    document.getElementById('periodFilter').addEventListener('change', applyFilters);
}

// عرض التقارير
function renderReports() {
    const container = document.getElementById('reportsList');
    const startIndex = (currentPage - 1) * itemsPerPage;
    const endIndex = startIndex + itemsPerPage;
    const pageData = reportsData.slice(startIndex, endIndex);
    
    container.innerHTML = pageData.map(report => `
        <div class="report-item">
            <div class="report-item-header">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h6 class="mb-1">${report.title}</h6>
                        <p class="text-muted mb-2">${report.description || 'لا يوجد وصف'}</p>
                        <div class="d-flex gap-2">
                            <span class="category-badge category-${report.category}">${getCategoryText(report.category)}</span>
                            <span class="status-badge status-${report.status}">${getStatusText(report.status)}</span>
                            <span class="badge bg-info">${getTypeText(report.type)}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="report-item-body">
                <div class="report-meta">
                    <div class="d-flex gap-3">
                        <span><i class="fa fa-calendar"></i> ${new Date(report.start_date).toLocaleDateString('ar-EG')} - ${new Date(report.end_date).toLocaleDateString('ar-EG')}</span>
                        <span><i class="fa fa-user"></i> ${report.created_by}</span>
                    </div>
                    <div class="d-flex gap-3">
                        <span><i class="fa fa-flag"></i> ${getPriorityText(report.priority)}</span>
                        <span><i class="fa fa-clock"></i> ${new Date(report.created_at).toLocaleDateString('ar-EG')}</span>
                    </div>
                </div>
                <div class="report-actions">
                    <button class="btn btn-sm btn-outline-primary" onclick="viewReportDetails('${report.id}')" title="عرض">
                        <i class="fa fa-eye"></i> عرض
                    </button>
                    <button class="btn btn-sm btn-outline-success" onclick="downloadReport('${report.id}')" title="تحميل">
                        <i class="fa fa-download"></i> تحميل
                    </button>
                    <button class="btn btn-sm btn-outline-info" onclick="shareReport('${report.id}')" title="مشاركة">
                        <i class="fa fa-share"></i> مشاركة
                    </button>
                    <button class="btn btn-sm btn-outline-warning" onclick="regenerateReport('${report.id}')" title="إعادة إنشاء">
                        <i class="fa fa-refresh"></i> إعادة إنشاء
                    </button>
                    <button class="btn btn-sm btn-outline-danger" onclick="deleteReport('${report.id}')" title="حذف">
                        <i class="fa fa-trash"></i> حذف
                    </button>
                </div>
            </div>
        </div>
    `).join('');
}

// تطبيق الفلاتر
function applyFilters() {
    const searchTerm = document.getElementById('searchReport').value.toLowerCase();
    const categoryFilter = document.getElementById('categoryFilter').value;
    const statusFilter = document.getElementById('statusFilter').value;
    const periodFilter = document.getElementById('periodFilter').value;
    
    let filteredData = getMockReports();
    
    if (searchTerm) {
        filteredData = filteredData.filter(report => 
            report.title.toLowerCase().includes(searchTerm) ||
            (report.description && report.description.toLowerCase().includes(searchTerm))
        );
    }
    
    if (categoryFilter !== 'all') {
        filteredData = filteredData.filter(report => report.category === categoryFilter);
    }
    
    if (statusFilter !== 'all') {
        filteredData = filteredData.filter(report => report.status === statusFilter);
    }
    
    if (periodFilter !== 'all') {
        filteredData = filterByPeriod(filteredData, periodFilter);
    }
    
    reportsData = filteredData;
    currentPage = 1;
    renderReports();
}

// فلترة حسب الفترة
function filterByPeriod(data, period) {
    const now = new Date();
    let startDate;
    
    switch (period) {
        case 'today':
            startDate = new Date(now.getFullYear(), now.getMonth(), now.getDate());
            break;
        case 'week':
            startDate = new Date(now.getFullYear(), now.getMonth(), now.getDate() - 7);
            break;
        case 'month':
            startDate = new Date(now.getFullYear(), now.getMonth(), 1);
            break;
        case 'quarter':
            startDate = new Date(now.getFullYear(), Math.floor(now.getMonth() / 3) * 3, 1);
            break;
        case 'year':
            startDate = new Date(now.getFullYear(), 0, 1);
            break;
        default:
            return data;
    }
    
    return data.filter(report => new Date(report.created_at) >= startDate);
}

// فلترة حسب الفئة
function filterByCategory(category) {
    document.getElementById('categoryFilter').value = category;
    applyFilters();
    
    // تحديث الواجهة
    document.querySelectorAll('.list-group-item').forEach(item => {
        item.classList.remove('active');
    });
    event.target.classList.add('active');
}

// فلترة حسب الحالة
function filterByStatus(status) {
    document.getElementById('statusFilter').value = status;
    applyFilters();
    
    // تحديث الواجهة
    document.querySelectorAll('.list-group-item').forEach(item => {
        item.classList.remove('active');
    });
    event.target.classList.add('active');
}

// إنشاء تقرير جديد
function generateReport() {
    currentReportId = null;
    document.getElementById('reportModalLabel').innerHTML = '<i class="fa fa-plus"></i> إنشاء تقرير جديد';
    document.getElementById('reportForm').reset();
    
    const modal = new bootstrap.Modal(document.getElementById('reportModal'));
    modal.show();
}

// حفظ التقرير
function saveReport() {
    const formData = {
        title: document.getElementById('reportTitle').value,
        category: document.getElementById('reportCategory').value,
        type: document.getElementById('reportType').value,
        priority: document.getElementById('reportPriority').value,
        start_date: document.getElementById('startDate').value,
        end_date: document.getElementById('endDate').value,
        description: document.getElementById('reportDescription').value,
        includeRevenue: document.getElementById('includeRevenue').checked,
        includeExpenses: document.getElementById('includeExpenses').checked,
        includeStudents: document.getElementById('includeStudents').checked,
        includeInstructors: document.getElementById('includeInstructors').checked,
        outputFormat: document.querySelector('input[name="outputFormat"]:checked').value,
        autoGenerate: document.getElementById('autoGenerate').checked,
        emailNotification: document.getElementById('emailNotification').checked,
        includeCharts: document.getElementById('includeCharts').checked,
        includeSummary: document.getElementById('includeSummary').checked
    };
    
    if (!formData.title || !formData.category || !formData.type || !formData.start_date || !formData.end_date) {
        showErrorMessage('يرجى ملء جميع الحقول المطلوبة');
        return;
    }
    
    // محاكاة حفظ البيانات
    console.log('Saving report:', formData);
    
    // إغلاق المودال
    const modal = bootstrap.Modal.getInstance(document.getElementById('reportModal'));
    if (modal) modal.hide();
    
    // إعادة تحميل البيانات
    loadReports();
    showSuccessMessage('تم إنشاء التقرير بنجاح');
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
                        <tr><td>العنوان:</td><td>${report.title}</td></tr>
                        <tr><td>الفئة:</td><td><span class="category-badge category-${report.category}">${getCategoryText(report.category)}</span></td></tr>
                        <tr><td>النوع:</td><td>${getTypeText(report.type)}</td></tr>
                        <tr><td>الحالة:</td><td><span class="status-badge status-${report.status}">${getStatusText(report.status)}</span></td></tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table table-sm">
                        <tr><td>الأولوية:</td><td>${getPriorityText(report.priority)}</td></tr>
                        <tr><td>المنشئ:</td><td>${report.created_by}</td></tr>
                        <tr><td>تاريخ الإنشاء:</td><td>${new Date(report.created_at).toLocaleString('ar-EG')}</td></tr>
                        <tr><td>صيغة الإخراج:</td><td>${report.output_format.toUpperCase()}</td></tr>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="report-details-section">
            <h6><i class="fa fa-calendar"></i> الفترة الزمنية</h6>
            <div>
                <p><strong>من:</strong> ${new Date(report.start_date).toLocaleDateString('ar-EG')}</p>
                <p><strong>إلى:</strong> ${new Date(report.end_date).toLocaleDateString('ar-EG')}</p>
                <p><strong>المدة:</strong> ${calculateDuration(report.start_date, report.end_date)}</p>
            </div>
        </div>
        
        <div class="report-details-section">
            <h6><i class="fa fa-file-alt"></i> الوصف</h6>
            <div>
                <p>${report.description || 'لا يوجد وصف'}</p>
            </div>
        </div>
        
        <div class="report-details-section">
            <h6><i class="fa fa-cogs"></i> الإعدادات</h6>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" ${report.includeRevenue ? 'checked' : ''} disabled>
                        <label class="form-check-label">تضمين الإيرادات</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" ${report.includeExpenses ? 'checked' : ''} disabled>
                        <label class="form-check-label">تضمين المصروفات</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" ${report.includeStudents ? 'checked' : ''} disabled>
                        <label class="form-check-label">تضمين بيانات الطلاب</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" ${report.includeInstructors ? 'checked' : ''} disabled>
                        <label class="form-check-label">تضمين بيانات المدربين</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" ${report.includeCharts ? 'checked' : ''} disabled>
                        <label class="form-check-label">تضمين رسوم بيانية</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" ${report.includeSummary ? 'checked' : ''} disabled>
                        <label class="form-check-label">تضمين ملخص تنفيذي</label>
                    </div>
                </div>
            </div>
        </div>
    `;
    
    document.getElementById('reportDetailsContent').innerHTML = content;
    
    // إعداد أزرار الإجراءات
    document.getElementById('downloadReportBtn').onclick = () => downloadReport(reportId);
    document.getElementById('shareReportBtn').onclick = () => shareReport(reportId);
    document.getElementById('deleteReportBtn').onclick = () => deleteReport(reportId);
    
    // عرض المودال
    const modal = new bootstrap.Modal(document.getElementById('reportDetailsModal'));
    modal.show();
}

// معاينة التقرير
function previewReport(reportId) {
    if (reportId) {
        const report = reportsData.find(r => r.id === reportId);
        if (!report) return;
        
        document.getElementById('reportPreviewContent').innerHTML = `
            <div class="report-preview">
                <h6>${report.title}</h6>
                <p><strong>الفئة:</strong> ${getCategoryText(report.category)}</p>
                <p><strong>النوع:</strong> ${getTypeText(report.type)}</p>
                <p><strong>الفترة:</strong> ${new Date(report.start_date).toLocaleDateString('ar-EG')} - ${new Date(report.end_date).toLocaleDateString('ar-EG')}</p>
                <p><strong>الوصف:</strong> ${report.description || 'لا يوجد وصف'}</p>
            </div>
        `;
    } else {
        const title = document.getElementById('reportTitle').value;
        const category = document.getElementById('reportCategory').value;
        const type = document.getElementById('reportType').value;
        const startDate = document.getElementById('startDate').value;
        const endDate = document.getElementById('endDate').value;
        const description = document.getElementById('reportDescription').value;
        
        document.getElementById('reportPreviewContent').innerHTML = `
            <div class="report-preview">
                <h6>${title || 'عنوان التقرير'}</h6>
                <p><strong>الفئة:</strong> ${getCategoryText(category)}</p>
                <p><strong>النوع:</strong> ${getTypeText(type)}</p>
                <p><strong>الفترة:</strong> ${new Date(startDate).toLocaleDateString('ar-EG')} - ${new Date(endDate).toLocaleDateString('ar-EG')}</p>
                <p><strong>الوصف:</strong> ${description || 'لا يوجد وصف'}</p>
            </div>
        `;
    }
    
    // عرض المودال
    const modal = new bootstrap.Modal(document.getElementById('reportPreviewModal'));
    modal.show();
}

// تحميل التقرير
function downloadReport(reportId) {
    const report = reportsData.find(r => r.id === reportId);
    if (!report) return;
    
    console.log(`Downloading report: ${report.title}`);
    showSuccessMessage(`جاري تحميل تقرير "${report.title}"...`);
    
    setTimeout(() => {
        showSuccessMessage('تم تحميل التقرير بنجاح');
    }, 2000);
}

// مشاركة التقرير
function shareReport(reportId) {
    const report = reportsData.find(r => r.id === reportId);
    if (!report) return;
    
    console.log(`Sharing report: ${report.title}`);
    showSuccessMessage(`تم مشاركة تقرير "${report.title}" بنجاح`);
}

// إعادة إنشاء التقرير
function regenerateReport(reportId) {
    const report = reportsData.find(r => r.id === reportId);
    if (!report) return;
    
    if (confirm(`هل تريد إعادة إنشاء تقرير "${report.title}"؟`)) {
        report.status = 'processing';
        
        // إعادة تحميل البيانات
        renderReports();
        showSuccessMessage('جاري إعادة إنشاء التقرير...');
        
        setTimeout(() => {
            report.status = 'completed';
            renderReports();
            showSuccessMessage('تم إعادة إنشاء التقرير بنجاح');
        }, 3000);
    }
}

// حذف التقرير
function deleteReport(reportId) {
    if (confirm('هل أنت متأكد من حذف هذا التقرير؟ هذا الإجراء لا يمكن التراجع عنه.')) {
        // محاكاة حذف التقرير
        reportsData = reportsData.filter(r => r.id !== reportId);
        
        // إعادة تحميل البيانات
        renderReports();
        showSuccessMessage('تم حذف التقرير بنجاح');
    }
}

// تصدير التقارير
function exportReports() {
    showSuccessMessage('جاري تصدير التقارير...');
    
    setTimeout(() => {
        showSuccessMessage('تم تصدير التقارير بنجاح');
    }, 2000);
}

// تحديث التقارير
function refreshReports() {
    loadReports();
    showSuccessMessage('تم تحديث التقارير بنجاح');
}

// دوال مساعدة
function getCategoryText(category) {
    const categories = {
        'financial': 'مالية',
        'academic': 'أكاديمية',
        'operational': 'تشغيلية',
        'marketing': 'تسويق',
        'hr': 'موارد بشرية'
    };
    return categories[category] || category;
}

function getStatusText(status) {
    const statuses = {
        'draft': 'مسودة',
        'processing': 'قيد المعالجة',
        'completed': 'مكتمل',
        'failed': 'فشل'
    };
    return statuses[status] || status;
}

function getTypeText(type) {
    const types = {
        'summary': 'ملخص',
        'detailed': 'تفصيلي',
        'analytical': 'تحليلي',
        'statistical': 'إحصائي'
    };
    return types[type] || type;
}

function getPriorityText(priority) {
    const priorities = {
        'low': 'منخفضة',
        'medium': 'متوسطة',
        'high': 'عالية',
        'urgent': 'عاجلة'
    };
    return priorities[priority] || priority;
}

function calculateDuration(startDate, endDate) {
    const start = new Date(startDate);
    const end = new Date(endDate);
    const diffTime = Math.abs(end - start);
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
    
    if (diffDays < 30) {
        return `${diffDays} يوم`;
    } else if (diffDays < 365) {
        const months = Math.floor(diffDays / 30);
        return `${months} شهر`;
    } else {
        const years = Math.floor(diffDays / 365);
        return `${years} سنة`;
    }
}

// بيانات وهمية للتقارير
function getMockReports() {
    return [
        {
            id: 'RPT-001',
            title: 'تقرير الإيرادات الشهري',
            category: 'financial',
            type: 'summary',
            status: 'completed',
            priority: 'high',
            start_date: '2024-01-01',
            end_date: '2024-01-31',
            description: 'ملخص إجمالي الإيرادات والمصروفات للشهر الحالي',
            created_by: 'أحمد محمد',
            output_format: 'pdf',
            includeRevenue: true,
            includeExpenses: true,
            includeStudents: false,
            includeInstructors: false,
            includeCharts: true,
            includeSummary: true,
            created_at: '2024-01-16T09:00:00Z'
        },
        {
            id: 'RPT-002',
            title: 'تقرير أداء الطلاب',
            category: 'academic',
            type: 'analytical',
            status: 'completed',
            priority: 'medium',
            start_date: '2024-01-01',
            end_date: '2024-01-31',
            description: 'تحليل أداء الطلاب في جميع الدورات',
            created_by: 'فاطمة علي',
            output_format: 'excel',
            includeRevenue: false,
            includeExpenses: false,
            includeStudents: true,
            includeInstructors: false,
            includeCharts: true,
            includeSummary: true,
            created_at: '2024-01-15T14:30:00Z'
        },
        {
            id: 'RPT-003',
            title: 'تقرير استخدام القاعات',
            category: 'operational',
            type: 'statistical',
            status: 'processing',
            priority: 'medium',
            start_date: '2024-01-01',
            end_date: '2024-01-31',
            description: 'إحصائيات استخدام قاعات التدريب',
            created_by: 'محمد خالد',
            output_format: 'pdf',
            includeRevenue: false,
            includeExpenses: false,
            includeStudents: false,
            includeInstructors: false,
            includeCharts: true,
            includeSummary: false,
            created_at: '2024-01-14T11:00:00Z'
        },
        {
            id: 'RPT-004',
            title: 'تقرير الحملات التسويقية',
            category: 'marketing',
            type: 'detailed',
            status: 'completed',
            priority: 'low',
            start_date: '2024-01-01',
            end_date: '2024-01-31',
            description: 'تحليل أداء الحملات التسويقية',
            created_by: 'سارة أحمد',
            output_format: 'pdf',
            includeRevenue: true,
            includeExpenses: false,
            includeStudents: false,
            includeInstructors: false,
            includeCharts: true,
            includeSummary: true,
            created_at: '2024-01-13T16:20:00Z'
        },
        {
            id: 'RPT-005',
            title: 'تقرير الموظفين',
            category: 'hr',
            type: 'summary',
            status: 'failed',
            priority: 'low',
            start_date: '2024-01-01',
            end_date: '2024-01-31',
            description: 'إحصائيات الموظفين والأداء',
            created_by: 'عبدالله محمد',
            output_format: 'excel',
            includeRevenue: false,
            includeExpenses: false,
            includeStudents: false,
            includeInstructors: true,
            includeCharts: false,
            includeSummary: true,
            created_at: '2024-01-12T18:45:00Z'
        },
        {
            id: 'RPT-006',
            title: 'تقرير التسجيلات',
            category: 'academic',
            type: 'statistical',
            status: 'draft',
            priority: 'medium',
            start_date: '2024-01-01',
            end_date: '2024-01-31',
            description: 'إحصائيات التسجيلات في الدورات',
            created_by: 'نورة سعود',
            output_format: 'pdf',
            includeRevenue: true,
            includeExpenses: false,
            includeStudents: true,
            includeInstructors: false,
            includeCharts: true,
            includeSummary: true,
            created_at: '2024-01-11T12:15:00Z'
        }
    ];
}

function showSuccessMessage(message) {
    console.log(message);
    // في التطبيق الحقيقي، سيتم عرض رسالة نجاح مناسبة
}

function showErrorMessage(message) {
    console.log(message);
    // في التطبيق الحقيقي، سيتم عرض رسالة خطأ مناسبة
}

// تهيئة الصفحة عند تحميلها
document.addEventListener('DOMContentLoaded', initReports);
</script>
