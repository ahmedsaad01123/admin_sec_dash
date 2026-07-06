<?php
// إعداد المتغيرات
$pageTitle = 'إدارة الفروع';
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

                                            <li class="breadcrumb-item">إدارة الفروع</li>
                                    </ul>
                    </div>

        <div class="d-flex justify-content-center">
            <div>
                
                            </div>
        </div>
    </div>
        <div ng-app="branches" ng-controller="main" class="ng-scope">
            <div class="block style2">
        <div class="block-title d-flex align-items-center justify-content-between">
            <div>
                <i class="icon fa fa-building-o"></i>
                <span class="title">الفروع</span>
            </div>
            <div>
                <span class="label label-primary">
                    1  \  1</span>
            </div>
        </div>
    	<div class="block-body">
            
            <!-- ngIf: branches === null -->

            
            <div ng-show="branches !== null &amp;&amp; branches.length == 0" class="alert alert-info ng-hide">
                <i class="fa fa-info-circle"></i>
                ليس هناك أي فروع إضافية مسجلة على النظام
            </div>

            <div ng-show="branches !== null &amp;&amp; branches.length &gt; 0" class="table-responsive">
                <table class="table table-auto-full-width">
                    <thead>
                    <tr>
                        <th>الفرع</th>
                        <th>مدير الفرع</th>
                        <th>
                            طبيعة التدريب
                            <popover content="أين تتم عملية التدريب: عبر الإنترنت فقط، داخل الفرع، ام الأثنين" class="ng-isolate-scope"><i uib-popover="أين تتم عملية التدريب: عبر الإنترنت فقط، داخل الفرع، ام الأثنين" popover-title="" popover-trigger="'mouseenter'" popover-placement="" class="popover-hint fa fa-question-circle"></i></popover>
                        </th>
                        <th>ايام ومواعيد التدريب</th>
                        <th style="width: 85px">الدولة</th>
                        <th style="width: 85px">عملة الفرع</th>
                        <th style="width: 150px">
                            منشور في الكتالوج
                            <popover content="إذا كان الفرع موجود او مستثنى من الكتالوج العلني للدورات" class="ng-isolate-scope"><i uib-popover="إذا كان الفرع موجود او مستثنى من الكتالوج العلني للدورات" popover-title="" popover-trigger="'mouseenter'" popover-placement="" class="popover-hint fa fa-question-circle"></i></popover>
                        </th>
                        <th style="width: 100px">تاريخ الإضافة</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- ngRepeat: branch in branches --><tr ng-repeat="branch in branches" class="ng-scope">
                        <td class="cell-wrap" style="min-width: 220px">
                            <div class="btn-group btn-group-xs onSide">
                                <button ng-click="edit(branch)" class="btn btn-xs btn-info">
                                    <i class="fa fa-pencil"></i> تعديل
                                </button>
                            </div>

                            <h4 class="text-primary inline ng-binding">Master Branch</h4>

                            <ul class="list-inline small">
                                <li class="ng-binding">HQ</li>
                                <!-- ngIf: branch.is_master --><li ng-if="branch.is_master" class="ng-scope">
                                    <span class="label label-info">الرئيسي\الإداري</span>
                                </li><!-- end ngIf: branch.is_master -->
                            </ul>
                        </td>

                        <td class="ng-binding">
                            Super Administrator
                            <div class="small text-muted ng-binding">
                                admin <br>
                                yousseffathy725@gmail.com
                            </div>

                            <div class="mt-10">
                                <button ng-click="resetBranchManagerPassword(branch)" uib-tooltip="سيتم تغيير كلمة السر، وإرسالها لمدير الفرع عبر البريد الإلكتروني." type="button" class="btn btn-xs btn-default">
                                    <i class="fa fa-key"></i> إعادة ضبط كلمة السر
                                </button>
                            </div>
                        </td>

                        <td style="min-width: 120px" class="cell-wrap text-break ng-binding">
                            --
                        </td>

                        <td class="cell-wrap" style="max-width: 140px; min-width: 140px">
                            <div class="mb-10 ng-binding"></div>
                            <div class="text-muted"><span dir="ltr" class="ng-binding"></span></div>
                        </td>

                        <td>
                            <b class="ng-binding">مصر</b>
                            <div class="small text-muted ng-binding">Africa/Cairo</div>
                        </td>

                        <td class="ng-binding">EGP</td>

                        <td>
                            <!-- ngIf: branch.catalog_published --><div ng-if="branch.catalog_published" class="ng-scope">
                                <i class="fa fa-check-circle text-success"></i> نعم
                            </div><!-- end ngIf: branch.catalog_published -->
                            <!-- ngIf: !branch.catalog_published -->
                        </td>

                        <td class="ng-binding">20/04, 2026</td>
                    </tr><!-- end ngRepeat: branch in branches -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <div class="block style2 primary">
                        <div class="block-title">
                            <i class="icon fa fa-plus-circle"></i>
                            <span class="title">إضافة فرع جديد</span>
                        </div>
                        <div class="block-body">
                                                            <div class="alert alert-warning">
                                    <i class="fa fa-exclamation-triangle"></i>
                                    لا يمكنك إضافة فروع جديدة طبقاً للإشتراك الخاص، لإضافة فروع جديدة رجاءاً تواصل معنا عبر نظام تذاكر الدعم الفني.

                                    <div class="mt-15">
                                        <a href="/help/tickets/create/form?title=I wish to add more branches&amp;body=I wish to add more branches" class="btn btn-primary">
                                            طلب إضافة فروع إضافية
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


<?php
// تضمين footer template
include_once __DIR__ . '/../templates/footer.php';
?>
