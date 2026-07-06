<?php
// إعداد المتغيرات
$pageTitle = 'قاعدة المعرفة';
$includeSessionCheck = true;
$includeCSRFRefresh = true;

// تضمين القوالب
include_once __DIR__ . '/../templates/header.php';
include_once __DIR__ . '/../templates/sidebar.php';
?>

<div id="container" class="container-fluid">
<div id="content" class="">
                    <div id="pageTitle">
            <i class="icon fa fa-info-circle"></i>
            <span class="title">
                قاعدة المعرفة
            </span>

            <div class="side">
                <a href="/shared/kb" class="btn btn-sm btn-default" target="_blank">
                    <i class="fa fa-external-link"></i>
                    عرض قاعدة المعرفة
                </a>
            </div>
        </div>

        
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="/misc/kb">
                    <i class="icon fa fa-files-o"></i>
                    <span class="title">
                        المقالات
                    </span>
                </a>
            </li>

            <li class="">
                <a href="/misc/kb/settings">
                    <i class="icon fa fa-sliders"></i>
                    <span class="title">
                        الإعدادات
                    </span>
                </a>
            </li>
        </ul>

                <div ng-app="app" ng-controller="controller" class="ng-scope">
            <dismissible-hint name="misc.knowledgeBase.home" class="ng-isolate-scope">
    <!-- ngIf: visible --><div ng-if="visible" class="dismissibleHint  d-flex flex-gap-15 align-items-center justify-content-between">
        <div class="d-flex flex-gap-20 align-items-center flex-grow-1">
            <!-- ngIf: icon || img --><div ng-if="icon || img" class="iconHolder hidden-xs ng-scope">
                <!-- ngIf: img -->
                <!-- ngIf: icon --><span ng-if="icon" class="ms icon ng-binding ng-scope">info</span><!-- end ngIf: icon -->
            </div><!-- end ngIf: icon || img -->

            <div class="content flex-grow-1">
                <ng-transclude>
                
			خاصية "قاعدة المعرفة" تساعدك على مشاركة اي دليل عمل Guides او إستخدام او شروحات Tutorials لفريق العمل او المدربين او المتدربين.
			قاعدة المعرفة مكونة من مقالات، هذه المقالات تكون مقسمة او مجمعة اسفل تصنيفات. ويكون هناك تصنيفات ومقالات لكل نوع من المستخدمين بشكل منفصل، كما توضح التبويبات بالأسفل.
		
            </ng-transclude>
            </div>
        </div>

        <div>
            <!-- ngIf: dismissible --><button ng-click="dismiss()" ng-if="dismissible" class="close ng-scope" type="button">
                <span>×</span>
            </button><!-- end ngIf: dismissible -->
        </div>
    </div><!-- end ngIf: visible --></dismissible-hint>

            
            <ul class="nav nav-tabs">
                <li ng-class="{'active': userType.type == 'staff'}" class="active">
                    <a href="" ng-click="userType.set('staff')">
                        <i class="icon fa fa-user"></i>
                        <span class="title">
                            مقالات فريق العمل
                        </span>
                    </a>
                </li>

                <li ng-class="{'active': userType.type == 'instructor'}">
                    <a href="" ng-click="userType.set('instructor')">
                        <i class="icon fa fa-user-circle"></i>
                        <span class="title">
                            مقالات المدربين
                        </span>
                    </a>
                </li>

                <li ng-class="{'active': userType.type == 'client'}">
                    <a href="" ng-click="userType.set('client')">
                        <i class="icon fa fa-users"></i>
                        <span class="title">
                            مقالات المتدربين
                        </span>
                    </a>
                </li>
            </ul>

            
             <!-- ngIf: ! userType.isEnabled() --><div class="alert alert-warning ng-scope" ng-if="! userType.isEnabled()">
        
        <i class="fa fa-exclamation-triangle"></i>
        <span ng-switch="userType.type">
                    <!-- ngSwitchWhen: staff --><span ng-switch-when="staff" class="ng-scope">رجاءاً لاحظ ان قاعدة المعرفة غير متاحة حالياً لفريق العمل من مستخدمي النظام، يمكنك تفعيلها لهم من  الإعدادات</span><!-- end ngSwitchWhen: -->
                    <!-- ngSwitchWhen: instructor -->
                    <!-- ngSwitchWhen: client -->
                </span>
    </div><!-- end ngIf: ! userType.isEnabled() --> 

            
            <!-- ngIf: categories.categories === null -->

            
            <!-- ngIf: categories.categories !== null && categories.categories.length == 0 --><div ng-if="categories.categories !== null &amp;&amp; categories.categories.length == 0" class="alert alert-info ng-scope">
                <i class="fa fa-info-circle"></i>
                لم يتم إضافة اي تصنيفات للمقالات بعد. إبدأ بإضافة التصنيفات اولاً ثم يمكنك إضافة المقالات اسفل هذه التصنيفات

                <div class="margin-top-15">
                    <a ng-click="categories.create()" href="" class="btn btn-sm btn-primary">
                        <i class="icon fa fa-plus-circle"></i>
                        إضافة تصنيف جديد
                    </a>
                </div>
            </div><!-- end ngIf: categories.categories !== null && categories.categories.length == 0 -->

            
            <!-- ngIf: categories.categories !== null && categories.categories.length > 0 -->
        </div>
                </div>
</div>

<?php
// تضمين footer template
include_once __DIR__ . '/../templates/footer.php';
?>
