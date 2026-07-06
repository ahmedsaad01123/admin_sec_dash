<?php
// إعداد المتغيرات
$pageTitle = 'إدارة قاعات التدريب';
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

                                            <li class="breadcrumb-item">إدارة قاعات التدريب</li>
                                    </ul>
                    </div>

        <div class="d-flex justify-content-center">
            <div>
                
                            </div>
        </div>
    </div>
        <div ng-app="labs" ng-controller="main" class="ng-scope">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <!-- ngIf: labs.list === null -->

    
    <div ng-show="labs.list !== null &amp;&amp; !labs.list.length" class="alert alert-info ng-hide">
    	<i class="fa fa-info-circle"></i>
        لم يتم إضافية قائمة القاعات بعد. إبدأ بإضافة القاعات من النموذج المجاور.
    </div>

    
    <div ng-show="labs.list !== null &amp;&amp; labs.list.length &gt; 0" class="block style2">
    	<div class="block-body">
            <div class="table-responsive">
                <table id="labsTable" class="table">
                    <thead>
                    <tr>
                        <th style="width: 10px"></th>
                        <th style="width: 30%">القاعة</th>
                        <th>سعة القاعة</th>
                        <!-- ngRepeat: field in labs.extraInfoFields -->
                    </tr>
                    </thead>
                    <tbody>
                    <!-- ngRepeat: lab in labs.list --><tr ng-repeat="lab in labs.list" class="ng-scope">
                        <td class="ng-binding">1</td>

                        <td>
                            <div class="btn-group btn-group-xs onSide">
                                <a ng-click="edit(lab)" href="" class="btn btn-default">
                                    <span class="glyphicon glyphicon-pencil"></span>  تعديل
                                </a>
                                <!-- ngIf: lab.deletable -->
                            </div>

                            <h4 class="ng-binding">Lab A - Main Building</h4>
                        </td>

                        <td class="ng-binding"></td>

                        <!-- ngRepeat: field in labs.extraInfoFields -->
                    </tr><!-- end ngRepeat: lab in labs.list --><tr ng-repeat="lab in labs.list" class="ng-scope">
                        <td class="ng-binding">2</td>

                        <td>
                            <div class="btn-group btn-group-xs onSide">
                                <a ng-click="edit(lab)" href="" class="btn btn-default">
                                    <span class="glyphicon glyphicon-pencil"></span>  تعديل
                                </a>
                                <!-- ngIf: lab.deletable -->
                            </div>

                            <h4 class="ng-binding">Lab B - Training Center</h4>
                        </td>

                        <td class="ng-binding"></td>

                        <!-- ngRepeat: field in labs.extraInfoFields -->
                    </tr><!-- end ngRepeat: lab in labs.list -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="panel panel-primary">
        <div class="panel-heading">
            <span class="panel-title">
                <i class="fa fa-plus-circle"></i>  إضافة قاعة جديدة
            </span>
        </div>

        <form class="form ng-pristine ng-invalid ng-invalid-required ng-valid-min" name="newLabForm">
            <div class="panel-body">
                
                <div class="form-group">
                    <label>الإسم</label>
                    <input ng-model="newLab.info.name" type="text" class="form-control input-lg ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" required="">
                </div>

                
                <div class="form-group">
                    <label>سعة القاعة</label>
                    <input ng-model="newLab.info.max_capacity" type="number" min="1" class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-min">
                </div>

                
                <extra-info-data-entity-inline-fields setup="newLab.extraInfo.setup" api="newLab.extraInfo.api" class="ng-isolate-scope"><div class="block style2  extraInfo_entityDynamicInlineFields" ng-class="{'collapsible': setup.collapsible}">
        <!-- ngIf: ! setup.simpleLayout --><div ng-if="! setup.simpleLayout" class="block-title d-flex flex-gap-15 justify-content-between ng-scope" ng-attr-data-toggle="{{ setup.collapsible ?'collapse' :'' }}" ng-attr-data-target="#{{ collapseTargetId }}" data-toggle="" data-target="#ei-inline-fields-Nk9oUFNiur">

            <div>
                <span class="title">معلومات إضافية</span>
                <popover content="المعلومات الإضافية هي ميزة تمكنك من إضافة (أنواع) بيانات جديدة بجانب ما يقدمه النظام بشكل أساسي." class="ng-isolate-scope"><i uib-popover="المعلومات الإضافية هي ميزة تمكنك من إضافة (أنواع) بيانات جديدة بجانب ما يقدمه النظام بشكل أساسي." popover-title="" popover-trigger="'mouseenter'" popover-placement="" class="popover-hint fa fa-question-circle"></i></popover>
            </div>

            <div class="d-flex flex-gap-5 align-items-center">
                <!-- ngIf: showManageOption() --><a ng-if="showManageOption()" ng-click="manageFields()" class="btn btn-xs btn-default ng-scope" href="">
                    <i class="fa fa-cog"></i> إدارة
                </a><!-- end ngIf: showManageOption() -->

                <a ng-click="reload()" class="btn btn-xs btn-default" href="">
                    <i class="fa fa-refresh m-0"></i>
                </a>
                
                <!-- ngIf: setup.collapsible -->
            </div>
        </div><!-- end ngIf: ! setup.simpleLayout -->

        <div id="ei-inline-fields-Nk9oUFNiur" class="collapse in">
            <div class="block-body padding-15" style="max-height: 350px; overflow: auto">
                
                <!-- ngIf: fields.length == 0 --><div ng-if="fields.length == 0" class="d-flex align-items-center flex-gap-15 ng-scope">
                    <div>
                        <i class="fa fa-info-circle fa-3x text-info"></i>
                    </div>

                    <div>
                        <b class="message">تريد إدخال معلومات إضافية؟</b>
                        <div class="small text-muted mt-5">يمكنك إضافة أنواع بيانات جديدة بسهولة بجانب بيانات النظام الأساسية.</div>

                        <div class="mt-10">
                            <button ng-click="manageFields()" class="btn btn-sm" type="button">
                                <i class="fa fa-plus-square"></i>
                                إضافة الحقول
                            </button>
                        </div>
                    </div>
                </div><!-- end ngIf: fields.length == 0 -->

                
                <!-- ngIf: fields.length > 0 -->
            </div>
        </div>
    </div>
</extra-info-data-entity-inline-fields>
            </div>

            <div class="panel-footer">
                <button ng-click="newLab.create()" ng-disabled="newLabForm.$invalid" class="btn btn-primary" disabled="disabled">
                    <span class="glyphicon glyphicon-ok"></span>  إضافة القاعة الجديدة
                </button>
            </div>
        </form>
    </div>                </div>
            </div>

            <script type="text/ng-template" id="editLab.html">
        <div class="modal-header">
            <h5 class="modal-title">تعديل معلومات القاعة</h5>
        </div>

        <form class="form" name="editLabForm">
            <div class="modal-body auto-overflow" style="max-height: 400px">
                
                <div class="form-group">
                    <label>الإسم</label>
                    <input ng-model="info.name" type="text" class="form-control" required/>
                </div>

                
                <div class="form-group">
                    <label>سعة القاعة</label>
                    <input ng-model="info.max_capacity" type="number" min="1" class="form-control"/>
                </div>

                
                <extra-info-data-entity-inline-fields setup="extraInfo.setup" api="extraInfo.api">
                </extra-info-data-entity-inline-fields>
            </div>

            <div class="modal-footer">
                <button ng-click="save()" ng-disabled="editLabForm.$invalid" class="btn btn-primary">
                    <span class="glyphicon glyphicon-ok"></span>  حفظ التعديلات
                </button>
            </div>
        </form>
    </script>        </div>
            </div>
</div>


<?php
// تضمين footer template
include_once __DIR__ . '/../templates/footer.php';
?>
