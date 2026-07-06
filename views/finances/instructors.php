<?php
// إعداد المتغيرات
$pageTitle = 'ماليات المدربين';
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

                                            <li class="breadcrumb-item">ماليات المدربين</li>
                                    </ul>
                    </div>

        <div class="d-flex justify-content-center">
            <div>
                
                            </div>
        </div>
    </div>
        <!--
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="/finances/instructors/accounts">
                    <i class="icon fa fa-bars"></i>
                    <span class="title">Instructors</span>
                </a>
            </li>
        </ul>
        -->

                <div ng-app="accountsApp" ng-controller="mainController" class="ng-scope">
            
            <!-- ngIf: instructors.list === null -->

            
            <!-- ngIf: instructors.list !== null && instructors.list.length == 0 -->

            
            <!-- ngIf: instructors.list !== null && instructors.list.length > 0 --><div ng-if="instructors.list !== null &amp;&amp; instructors.list.length &gt; 0" class="row ng-scope">
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="block style4">
        <div class="block-title">
            <span class="title">
                المدربين
            </span>
        </div>

        <div class="block-body">
            <div class="list-group">
                <!-- ngRepeat: instructor in instructors.list --><a ng-repeat="instructor in instructors.list" ng-click="selected.set(instructor)" ng-class="{'active': selected.is(instructor)}" href="" class="list-group-item ng-binding ng-scope">
                    Ahmad Barakat

                    <!-- ngIf: instructor.inactive -->
                </a><!-- end ngRepeat: instructor in instructors.list --><a ng-repeat="instructor in instructors.list" ng-click="selected.set(instructor)" ng-class="{'active': selected.is(instructor)}" href="" class="list-group-item ng-binding ng-scope">
                    Fatima Al-Rashid

                    <!-- ngIf: instructor.inactive -->
                </a><!-- end ngRepeat: instructor in instructors.list --><a ng-repeat="instructor in instructors.list" ng-click="selected.set(instructor)" ng-class="{'active': selected.is(instructor)}" href="" class="list-group-item ng-binding ng-scope">
                    Khalid Mansour

                    <!-- ngIf: instructor.inactive -->
                </a><!-- end ngRepeat: instructor in instructors.list -->
            </div>
        </div>
    </div>                </div>

                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    
                    <!-- ngIf: !selected.isSet() --><div ng-if="!selected.isSet()" class="ng-scope">
                        اختار المدرب من القائمة بالجانب لعرض الحساب المالى الخاص به.
                    </div><!-- end ngIf: !selected.isSet() -->

                    
                    <!-- ngIf: selected.isSet() -->
                </div>
            </div><!-- end ngIf: instructors.list !== null && instructors.list.length > 0 -->
        </div>
                </div>
</div>

<?php
// تضمين footer template
include_once __DIR__ . '/../templates/footer.php';
?>
