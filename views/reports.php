<?php
// إعداد المتغيرات
$pageTitle = 'التقارير';
$includeSessionCheck = true;
$includeCSRFRefresh = true;

// تضمين القوالب
include_once __DIR__ . '/templates/header.php';
include_once __DIR__ . '/templates/sidebar.php';
?>


<!-- محتوى الصفحة هنا -->
<div id="container" class="container-fluid">
<div id="content" class="">
                    <div id="pageTitle" class="d-flex flex-gap-15 flex-wrap flex-rows flex-column-on-mobile align-items-center justify-content-between">
        <div class="flex-grow-1">
            <i class="icon fa fa-print"></i>
            <span class="title">التقارير</span>

                    </div>

        <div class="d-flex justify-content-center">
            <div>
                            
                            </div>
        </div>
    </div>
        
                
                    
            <div id="batches" class="reportsGroup block style4">
                <div class="block-title">
                    <span class="title">
                        المجموعات التدريبية
                    </span>
                </div>
                <div class="block-body">
                    <div class="reports flex">
                                                    
                            <a href="/reports/batches.activeBatches" class="report">
                                <div>
                                    <span class="ms ms-lg">feed</span>
                                </div>
                                <div class="name">
                                    المجموعات النشطة
                                </div>
                            </a>
                                                    
                            <a href="/reports/batches.activeBatchesTrainees" class="report">
                                <div>
                                    <span class="ms ms-lg">feed</span>
                                </div>
                                <div class="name">
                                    جميع متدربي المجموعات النشطة
                                </div>
                            </a>
                                                    
                            <a href="/reports/batches.trainingSchedule" class="report">
                                <div>
                                    <span class="ms ms-lg">feed</span>
                                </div>
                                <div class="name">
                                    مواعيد التدريب للمجموعات
                                </div>
                            </a>
                                                    
                            <a href="/reports/batches.trainingStats" class="report">
                                <div>
                                    <span class="ms ms-lg">feed</span>
                                </div>
                                <div class="name">
                                    إحصاءات التدريب والمجموعات
                                </div>
                            </a>
                                                    
                            <a href="/reports/batches.batchSummary" class="report">
                                <div>
                                    <span class="ms ms-lg">feed</span>
                                </div>
                                <div class="name">
                                    ملخص أحد المجموعات
                                </div>
                            </a>
                                                    
                            <a href="/reports/batches.batchTrainees" class="report">
                                <div>
                                    <span class="ms ms-lg">feed</span>
                                </div>
                                <div class="name">
                                    متدربي أحد المجموعات
                                </div>
                            </a>
                                                    
                            <a href="/reports/batches.batchLectures" class="report">
                                <div>
                                    <span class="ms ms-lg">feed</span>
                                </div>
                                <div class="name">
                                    محاضرات أحد المجموعات
                                </div>
                            </a>
                                                    
                            <a href="/reports/batches.batchOngoingAssessment" class="report">
                                <div>
                                    <span class="ms ms-lg">feed</span>
                                </div>
                                <div class="name">
                                    التقييم المستمر لمجموعة
                                </div>
                            </a>
                                                    
                            <a href="/reports/batches.traineeOngoingAssessment" class="report">
                                <div>
                                    <span class="ms ms-lg">feed</span>
                                </div>
                                <div class="name">
                                    التقييم المستمر لمتدرب
                                </div>
                            </a>
                                                    
                            <a href="/reports/batches.batchAttendance" class="report">
                                <div>
                                    <span class="ms ms-lg">feed</span>
                                </div>
                                <div class="name">
                                    حضور متدربي أحد المجموعات
                                </div>
                            </a>
                                                    
                            <a href="/reports/batches.batchesAbsentees" class="report">
                                <div>
                                    <span class="ms ms-lg">feed</span>
                                </div>
                                <div class="name">
                                    تقرير المتغيبين للمجموعات
                                </div>
                            </a>
                                                    
                            <a href="/reports/batches.batchCertificate" class="report">
                                <div>
                                    <span class="ms ms-lg">feed</span>
                                </div>
                                <div class="name">
                                    شهادات متدربي أحد المجموعات
                                </div>
                            </a>
                                                    
                            <a href="/reports/batches.traineeFinalEvaluation" class="report">
                                <div>
                                    <span class="ms ms-lg">feed</span>
                                </div>
                                <div class="name">
                                    التقييم النهائي لمتدرب
                                </div>
                            </a>
                                                    
                            <a href="/reports/batches.batchFinalEvaluation" class="report">
                                <div>
                                    <span class="ms ms-lg">feed</span>
                                </div>
                                <div class="name">
                                    التقييم النهائي لمجموعة
                                </div>
                            </a>
                                                    
                            <a href="/reports/batches.batchFailedTrainees" class="report">
                                <div>
                                    <span class="ms ms-lg">feed</span>
                                </div>
                                <div class="name">
                                    المتدربين الغير ناجحين
                                </div>
                            </a>
                                                    
                            <a href="/reports/batches.districtsTraineesStats" class="report">
                                <div>
                                    <span class="ms ms-lg">feed</span>
                                </div>
                                <div class="name">
                                    نتائج التدريب طبقاً مناطق المتدربين
                                </div>
                            </a>
                                                    
                            <a href="/reports/batches.batchEvaluation" class="report">
                                <div>
                                    <span class="ms ms-lg">feed</span>
                                </div>
                                <div class="name">
                                    نتائج نموذج تقييم التدريب
                                </div>
                            </a>
                                            </div>
                </div>
            </div>
                    
            <div id="clients" class="reportsGroup block style4">
                <div class="block-title">
                    <span class="title">
                        العملاء
                    </span>
                </div>
                <div class="block-body">
                    <div class="reports flex">
                                                    
                            <a href="/reports/clients.list" class="report">
                                <div>
                                    <span class="ms ms-lg">feed</span>
                                </div>
                                <div class="name">
                                    قائمة العملاء
                                </div>
                            </a>
                                                    
                            <a href="/reports/clients.clientBatches" class="report">
                                <div>
                                    <span class="ms ms-lg">feed</span>
                                </div>
                                <div class="name">
                                    مجموعة أحد المتدربين
                                </div>
                            </a>
                                                    
                            <a href="/reports/clients.clientTrainingResults" class="report">
                                <div>
                                    <span class="ms ms-lg">feed</span>
                                </div>
                                <div class="name">
                                    نتائج التدريب وتقدم أحد العملاء
                                </div>
                            </a>
                                                    
                            <a href="/reports/clients.blacklisted" class="report">
                                <div>
                                    <span class="ms ms-lg">feed</span>
                                </div>
                                <div class="name">
                                    عملاء القائمة السوداء
                                </div>
                            </a>
                                            </div>
                </div>
            </div>
                    
            <div id="companies" class="reportsGroup block style4">
                <div class="block-title">
                    <span class="title">
                        الشركات
                    </span>
                </div>
                <div class="block-body">
                    <div class="reports flex">
                                                    
                            <a href="/reports/companies.companyTrainees" class="report">
                                <div>
                                    <span class="ms ms-lg">feed</span>
                                </div>
                                <div class="name">
                                    عملاء أحد الشركات
                                </div>
                            </a>
                                            </div>
                </div>
            </div>
                    
            <div id="courses" class="reportsGroup block style4">
                <div class="block-title">
                    <span class="title">
                        الدورات التدريبية
                    </span>
                </div>
                <div class="block-body">
                    <div class="reports flex">
                                                    
                            <a href="/reports/courses.allCourses" class="report">
                                <div>
                                    <span class="ms ms-lg">feed</span>
                                </div>
                                <div class="name">
                                    جميع الدورات
                                </div>
                            </a>
                                                    
                            <a href="/reports/courses.courseBatches" class="report">
                                <div>
                                    <span class="ms ms-lg">feed</span>
                                </div>
                                <div class="name">
                                    مجموعات أحد الدورات
                                </div>
                            </a>
                                                    
                            <a href="/reports/courses.courseTrainees" class="report">
                                <div>
                                    <span class="ms ms-lg">feed</span>
                                </div>
                                <div class="name">
                                    متدربي أحد الدورات
                                </div>
                            </a>
                                                    
                            <a href="/reports/courses.courseRetentionTargets" class="report">
                                <div>
                                    <span class="ms ms-lg">feed</span>
                                </div>
                                <div class="name">
                                    اهدف الإستبقاء للدورات Course Retention Targets
                                </div>
                            </a>
                                                    
                            <a href="/reports/courses.courseRevenue" class="report">
                                <div>
                                    <span class="ms ms-lg">feed</span>
                                </div>
                                <div class="name">
                                    عائد دورة تدريبية
                                </div>
                            </a>
                                            </div>
                </div>
            </div>
                    
            <div id="instructors" class="reportsGroup block style4">
                <div class="block-title">
                    <span class="title">
                        المدربين
                    </span>
                </div>
                <div class="block-body">
                    <div class="reports flex">
                                                    
                            <a href="/reports/instructors.instructorBatches" class="report">
                                <div>
                                    <span class="ms ms-lg">feed</span>
                                </div>
                                <div class="name">
                                    مجموعات أحد المدربين
                                </div>
                            </a>
                                                    
                            <a href="/reports/instructors.instructorLectures" class="report">
                                <div>
                                    <span class="ms ms-lg">feed</span>
                                </div>
                                <div class="name">
                                    محاضرات احد المدربين
                                </div>
                            </a>
                                            </div>
                </div>
            </div>
                    
            <div id="finances" class="reportsGroup block style4">
                <div class="block-title">
                    <span class="title">
                        الماليات
                    </span>
                </div>
                <div class="block-body">
                    <div class="reports flex">
                                                    
                            <a href="/reports/finances.summary" class="report">
                                <div>
                                    <span class="ms ms-lg">feed</span>
                                </div>
                                <div class="name">
                                    ملخص المعاملات المالية لفترة
                                </div>
                            </a>
                                                    
                            <a href="/reports/finances.activeBatchesTraineesWithPendingPayments" class="report">
                                <div>
                                    <span class="ms ms-lg">feed</span>
                                </div>
                                <div class="name">
                                    عملاء عليهم مستحقات في المجموعات
                                </div>
                            </a>
                                                    
                            <a href="/reports/finances.traineesWhoMissedPayments" class="report">
                                <div>
                                    <span class="ms ms-lg">feed</span>
                                </div>
                                <div class="name">
                                    المتدربين الذين لم يدفعوا خلال فترة محددة (للمجموعات)
                                </div>
                            </a>
                                                    
                            <a href="/reports/finances.pastDueInstallments" class="report">
                                <div>
                                    <span class="ms ms-lg">feed</span>
                                </div>
                                <div class="name">
                                    المتدربين المتأخرين في دفع الأقساط (للمجموعات)
                                </div>
                            </a>
                                                    
                            <a href="/reports/finances.activeBatchesSummaries" class="report">
                                <div>
                                    <span class="ms ms-lg">feed</span>
                                </div>
                                <div class="name">
                                    ملخصات ماليات المجموعات النشطة
                                </div>
                            </a>
                                                    
                            <a href="/reports/finances.batchSummary" class="report">
                                <div>
                                    <span class="ms ms-lg">feed</span>
                                </div>
                                <div class="name">
                                    الملخص مالي لمجموعة محددة
                                </div>
                            </a>
                                                    
                            <a href="/reports/finances.batchTraineesSummary" class="report">
                                <div>
                                    <span class="ms ms-lg">feed</span>
                                </div>
                                <div class="name">
                                    ماليات متدربي أحد مجموعة
                                </div>
                            </a>
                                                    
                            <a href="/reports/finances.batchTraineeFinances" class="report">
                                <div>
                                    <span class="ms ms-lg">feed</span>
                                </div>
                                <div class="name">
                                    ماليات متدرب لأحد المجموعات
                                </div>
                            </a>
                                                    
                            <a href="/reports/finances.clientTransactionSummary" class="report">
                                <div>
                                    <span class="ms ms-lg">feed</span>
                                </div>
                                <div class="name">
                                    جميع معاملات احد العملاء
                                </div>
                            </a>
                                                    
                            <a href="/reports/finances.balances" class="report">
                                <div>
                                    <span class="ms ms-lg">feed</span>
                                </div>
                                <div class="name">
                                    الأرصدة الحالية للعملاء والشركات
                                </div>
                            </a>
                                            </div>
                </div>
            </div>
                    
            <div id="certificates" class="reportsGroup block style4">
                <div class="block-title">
                    <span class="title">
                        الشهادات
                    </span>
                </div>
                <div class="block-body">
                    <div class="reports flex">
                                                    
                            <a href="/reports/certificates.issuingRecords" class="report">
                                <div>
                                    <span class="ms ms-lg">feed</span>
                                </div>
                                <div class="name">
                                    الشهادات الصادرة
                                </div>
                            </a>
                                            </div>
                </div>
            </div>
                        </div>>
</div>

<?php
// تضمين footer template
include_once __DIR__ . '/templates/footer.php';
?>