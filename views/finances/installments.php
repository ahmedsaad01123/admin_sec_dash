<?php
// إعداد المتغيرات
$pageTitle = 'متابعة الأقساط';
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

                                            <li class="breadcrumb-item">متابعة الأقساط</li>
                                    </ul>
                    </div>

        <div class="d-flex justify-content-center">
            <div>
                
                            </div>
        </div>
    </div>
        <div ng-app="app" ng-controller="controller" class="ng-scope">
            <dismissible-hint name="finances.installments" class="ng-isolate-scope">
    <!-- ngIf: visible --><div ng-if="visible" class="dismissibleHint  d-flex flex-gap-15 align-items-center justify-content-between">
        <div class="d-flex flex-gap-20 align-items-center flex-grow-1">
            <!-- ngIf: icon || img --><div ng-if="icon || img" class="iconHolder hidden-xs ng-scope">
                <!-- ngIf: img -->
                <!-- ngIf: icon --><span ng-if="icon" class="ms icon ng-binding ng-scope">info</span><!-- end ngIf: icon -->
            </div><!-- end ngIf: icon || img -->

            <div class="content flex-grow-1">
                <ng-transclude>
                
		هنا يظهر لك اقساط المجموعات والمدفوعات المجدولة للمسارات. 
		يمكنك تحديد اقساط لمجموعة تدريبية (لكل المتدربين)، كما يمكنك تحديد اقساط خاصة لمتدرب معين داخل نفس المجموعة. 
		كما يظهر هنا خطوات الدفع للمسارات التدريبية (المحددة بتاريخ إستحقاق).
		            </ng-transclude>
            </div>
        </div>

        <div>
            <!-- ngIf: dismissible --><button ng-click="dismiss()" ng-if="dismissible" class="close ng-scope" type="button">
                <span>×</span>
            </button><!-- end ngIf: dismissible -->
        </div>
    </div><!-- end ngIf: visible --></dismissible-hint>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-offset-1 col-md-10">
                <div class="block style2">

                    <div class="block-title">
                        <div class="flex flex-space-between flex-align-items-center">
        <div class="d-flex flex-gap-15 align-items-center">
            <div class="btn-group">
                                    
                    <a href="/finances/installments?month=2025-10" class="btn btn-info" data-toggle="tooltip" title="October, 2025">
                        10

                                                    /25
                                            </a>
                                    
                    <a href="/finances/installments?month=2025-11" class="btn btn-info" data-toggle="tooltip" title="November, 2025">
                        11

                                                    /25
                                            </a>
                                    
                    <a href="/finances/installments?month=2025-12" class="btn btn-info" data-toggle="tooltip" title="December, 2025">
                        12

                                                    /25
                                            </a>
                                    
                    <a href="/finances/installments?month=2026-01" class="btn btn-info" data-toggle="tooltip" title="January, 2026">
                        01

                                            </a>
                                    
                    <a href="/finances/installments?month=2026-02" class="btn btn-info" data-toggle="tooltip" title="February, 2026">
                        02

                                            </a>
                                    
                    <a href="/finances/installments?month=2026-03" class="btn btn-info" data-toggle="tooltip" title="March, 2026">
                        03

                                            </a>
                            </div>
            <div><i class="fa fa-arrow-right"></i></div>
        </div>

        <div class="bg-color-body rounded p-10 px-15">
            <h4 dir="ltr" class="m-0 p-0 text-primary">
                <b>April</b>,
                <span>04/2026</span>
            </h4>
        </div>

        <div class="d-flex flex-gap-15 align-items-center">
            <div><i class="fa fa-arrow-left"></i></div>
            <div class="btn-group">
                                    
                    <a href="/finances/installments?month=2026-05" class="btn btn-info" data-toggle="tooltip" title="May, 2026">
                        05
                                            </a>
                                    
                    <a href="/finances/installments?month=2026-06" class="btn btn-info" data-toggle="tooltip" title="June, 2026">
                        06
                                            </a>
                                    
                    <a href="/finances/installments?month=2026-07" class="btn btn-info" data-toggle="tooltip" title="July, 2026">
                        07
                                            </a>
                                    
                    <a href="/finances/installments?month=2026-08" class="btn btn-info" data-toggle="tooltip" title="August, 2026">
                        08
                                            </a>
                                    
                    <a href="/finances/installments?month=2026-09" class="btn btn-info" data-toggle="tooltip" title="September, 2026">
                        09
                                            </a>
                                    
                    <a href="/finances/installments?month=2026-10" class="btn btn-info" data-toggle="tooltip" title="October, 2026">
                        10
                                            </a>
                            </div>
        </div>
    </div>
                    </div>

                    <div class="block-body">
                                                     <div class="alert alert-info margin-bottom-0">
        
        <i class="fa fa-info-circle"></i>
        ليس هناك اقساط في الشهر المختار! إستخدم خيارات التنقل بالأعلى لإختيار شهر آخر.
    </div> 

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
