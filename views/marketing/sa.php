<?php
// إعداد المتغيرات
$pageTitle = 'اتمتة المبيعات';
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
            <i class="icon fa fa-magic"></i>
            <span class="title">التسويق والمبيعات</span>

                            
                <ul class="breadcrumb inline" style="margin: 0">
                    <li class="breadcrumb-item"></li>

                                            <li class="breadcrumb-item">أتمتة المبيعات Sales Automation</li>
                                    </ul>
                    </div>

        <div class="d-flex justify-content-center">
            <div>
                
                            </div>
        </div>
    </div>
                <div ng-app="app" ng-controller="controller" class="ng-scope">

            <div class="margin-bottom-10 flex flex-end">
                <button ng-click="rules.create()" class="btn btn-sm btn-primary">
                    <i class="fa fa-plus-circle"></i>
                    إضافة قاعدة جديدة
                </button>
            </div>

            <ul class="nav nav-tabs">
                <li ng-class="{'active': !rules.params.archived}" class="active">
                    <a ng-click="rules.load(false)" href="">
                        <i class="icon fa fa-magic"></i>
                        <span class="title">
                            القواعد النشطة
                        </span>
                    </a>
                </li>
                <li ng-class="{'active': rules.params.archived}">
                    <a ng-click="rules.load(true)" href="">
                        <i class="icon fa fa-archive"></i>
                        <span class="title">
                            القواعد المؤرشفة
                        </span>
                    </a>
                </li>
            </ul>

            
            <!-- ngIf: rules.rules === null -->

            
            <!-- ngIf: rules.rules !== null && rules.rules.data.length == 0 --><div ng-if="rules.rules !== null &amp;&amp; rules.rules.data.length == 0" class="alert alert-info ng-scope">
                <i class="fa fa-info-circle"></i>
                <!-- ngIf: rules.params.archived -->
                <!-- ngIf: !rules.params.archived --><span ng-if="!rules.params.archived" class="ng-scope">
                    ليس هناك اي قواعد اتمتة نشطة حالياً. إبدأ بإضافة قاعدة جديدة لتحديد الحدث والمهام المترتبة عليه.
                </span><!-- end ngIf: !rules.params.archived -->
            </div><!-- end ngIf: rules.rules !== null && rules.rules.data.length == 0 -->

            <!-- ngIf: rules.rules !== null && rules.rules.data.length > 0 -->

        </div>
                </div>
</div>

<?php
// تضمين footer template
include_once __DIR__ . '/../templates/footer.php';
?>
