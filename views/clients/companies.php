<?php
// إعداد المتغيرات
$pageTitle = 'الشركات والتعاقدات';
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
            <i class="icon fa fa-building-o"></i>
            <span class="title">العملاء</span>

                            
                <ul class="breadcrumb inline" style="margin: 0">
                    <li class="breadcrumb-item"></li>

                                            <li class="breadcrumb-item">ملفات الشركات</li>
                                    </ul>
                    </div>

        <div class="d-flex justify-content-center">
            <div>
                
                            </div>
        </div>
    </div>
        <div ng-app="companies" ng-controller="main" class="ng-scope">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="block style2">
        <div class="block-body">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-4">
                    <div class="form-group margin-bottom-0">
                        <label>بحث</label>
                        <input ng-model="filters.params.search" type="text" placeholder="بحث ..." class="form-control ng-pristine ng-untouched ng-valid ng-empty">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4">
                    <div class="form-group margin-bottom-0">
                        <label>مسؤل الحساب</label>
                        <select ng-model="filters.params.owner_user_id" class="form-control ng-pristine ng-untouched ng-valid ng-empty">
                            <option ng-value="null" value="object:null" selected="selected">اي احد</option>
                                                    </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="block-footer">
            <button ng-click="filters.search()" class="btn btn-sm btn-primary">
                <i class="fa fa-search"></i> بحث
            </button>

            <!-- ngIf: filters.on -->
        </div>
    </div>                    <!-- ngIf: companies === null -->

    
    <div ng-show="companies !== null &amp;&amp; companies.length == 0" class="alert alert-info">
    	<i class="fa fa-info-circle"></i>
        <!-- ngIf: ! filters.on --><span ng-if="! filters.on" class="ng-scope">لا يوجد أي شركات مسجلة على النظام. إستخدم النموذج على الجانب لإضافة شركة جديدة. داخل ملف الشركة سيكون بإمكانك إدارة معلوماتها وجهات الإتصال والإتفاقات.</span><!-- end ngIf: ! filters.on -->
        <!-- ngIf: filters.on -->
    </div>

    
    <!-- ngIf: companies !== null && companies.length > 0 -->
                </div>

                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <form name="newCompanyForm" class="block style2 ng-pristine ng-invalid ng-invalid-required ng-valid-email">
        <div class="block-title">
            <span class="icon fa fa-plus-circle"></span>
            <span class="title">تسجيل معلومات شركة جديدة</span>
        </div>

        <div class="block-body">
            
            <!-- ngIf: newCompany.errors -->

            
            <div class="form-group">
                <label>الإسم</label>
                <input ng-model="newCompany.info.name" type="text" class="form-control input-lg ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" required="">
            </div>

            
            <div class="form-group">
                <label>مسؤل الحساب</label>
                <div class="help-block">
                    صاحب او مسؤول حساب الشركة والقادر على إدارة معلوماتها على المنصة.<b class="text-info"> سيظهر فقط من لديهم صلاحية الوصول لمعلومات الشركات وإضافة شركات جديدة (المعطى لهم صلاحية #42)</b>
                </div>
                <select ng-model="newCompany.info.owner_user_id" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty"><option value="? number:1 ?" selected="selected"></option>
                    <option ng-value="null" value="object:null">اي احد</option>
                                    </select>
            </div>

            
            <div class="form-group">
                <label>رقم الهاتف</label>
                <input ng-model="newCompany.info.phone_number" type="text" class="form-control ng-pristine ng-untouched ng-valid ng-empty" dir="ltr">
            </div>

            
            <div class="form-group">
                <label>البريد الإلكتروني</label>
                <input ng-model="newCompany.info.email" type="email" class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-email" dir="ltr">
            </div>

            
            <div class="form-group">
                <label>الموقع الإلكتروني</label>
                <input ng-model="newCompany.info.website" type="text" class="form-control ng-pristine ng-untouched ng-valid ng-empty" dir="ltr">
            </div>

            
            <div class="form-group">
                <label>العنوان</label>
                <textarea ng-model="newCompany.info.address" rows="2" class="form-control ng-pristine ng-untouched ng-valid ng-empty"></textarea>
            </div>

            
            <extra-info-data-entity-inline-fields setup="newCompany.extraInfo.setup" api="newCompany.extraInfo.api" class="ng-isolate-scope"><div class="block style2  extraInfo_entityDynamicInlineFields" ng-class="{'collapsible': setup.collapsible}">
        <!-- ngIf: ! setup.simpleLayout --><div ng-if="! setup.simpleLayout" class="block-title d-flex flex-gap-15 justify-content-between ng-scope" ng-attr-data-toggle="{{ setup.collapsible ?'collapse' :'' }}" ng-attr-data-target="#{{ collapseTargetId }}" data-toggle="" data-target="#ei-inline-fields-0FIH3uB25y">

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

        <div id="ei-inline-fields-0FIH3uB25y" class="collapse in">
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

        <div class="block-footer">
            <button ng-disabled="newCompanyForm.$invalid" ng-click="newCompany.create()" class="btn btn-primary" disabled="disabled">
                <i class="fa fa-check-circle"></i>
                متابعة
            </button>
        </div>
    </form>                </div>
            </div>
        </div>
            </div>
</div>

<?php
// تضمين footer template
include_once __DIR__ . '/../templates/footer.php';
?>
