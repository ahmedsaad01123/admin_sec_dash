<?php
// إعداد المتغيرات
$pageTitle = 'الإعدادات المالية';
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

                                            <li class="breadcrumb-item">الإعدادات المالية</li>
                                    </ul>
                    </div>

        <div class="d-flex justify-content-center">
            <div>
                
                            </div>
        </div>
    </div>
        <ul id="preferencesTabs" class="nav nav-tabs">
            <li class="items active">
                <a href="/finances/preferences/items">
                    <i class="icon fa fa-list"></i>
                    <span class="title">البنود المالية</span>
                </a>
            </li>

            <li class="vendors">
                <a href="/finances/preferences/vendors">
                    <i class="icon fa fa-cubes"></i>
                    <span class="title">الموردين</span>
                </a>
            </li>

            <li class="taxes">
                <a href="/finances/preferences/taxes">
                    <i class="icon fa fa-percent"></i>
                    <span class="title">الضرائب</span>
                </a>
            </li>

            <li class="discountPeriods">
                <a href="/finances/preferences/discountPeriods">
                    <i class="icon fa fa-calendar"></i>
                    <span class="title">اوقات الخصومات</span>
                </a>
            </li>

            <li class="paymentMethods">
                <a href="/finances/preferences/paymentMethods">
                    <i class="icon fa fa-credit-card"></i>
                    <span class="title">طرق الدفع</span>
                </a>
            </li>
        </ul>
        
        <div class="tab-content">
                    <div ng-app="items" ng-controller="main" class="ng-scope">
            <dismissible-hint name="finances.preferences.items" class="ng-isolate-scope">
    <!-- ngIf: visible --><div ng-if="visible" class="dismissibleHint  d-flex flex-gap-15 align-items-center justify-content-between">
        <div class="d-flex flex-gap-20 align-items-center flex-grow-1">
            <!-- ngIf: icon || img --><div ng-if="icon || img" class="iconHolder hidden-xs ng-scope">
                <!-- ngIf: img -->
                <!-- ngIf: icon --><span ng-if="icon" class="ms icon ng-binding ng-scope">info</span><!-- end ngIf: icon -->
            </div><!-- end ngIf: icon || img -->

            <div class="content flex-grow-1">
                <ng-transclude>
                هنا يتم إدارة بنود وتصنيفات عمليات استلام المدفوعات وعمليات الدفع من و إلى أي جهة. هذه البنود
		هدفها تنظيم وتصنيف المدفوعات إلى و من المؤسسة مع الأطراف الأخري.            </ng-transclude>
            </div>
        </div>

        <div>
            <!-- ngIf: dismissible --><button ng-click="dismiss()" ng-if="dismissible" class="close ng-scope" type="button">
                <span>×</span>
            </button><!-- end ngIf: dismissible -->
        </div>
    </div><!-- end ngIf: visible --></dismissible-hint>

            <ul class="nav nav-tabs">
                <li class="active">
                    <a ng-click="activeType = 'receivable'" href="" data-toggle="tab">
                        <i class="icon fa fa-download"></i>
                        <span class="title">
                            بنود استلام المدفوعات ( الوارد )                        </span>
                    </a>
                </li>

                <li>
                    <a ng-click="activeType = 'payable'" href="" data-toggle="tab">
                        <i class="icon fa fa-upload"></i>
                        <span class="title">
                            بنود الدفع ( الصادر )                        </span>
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="active tab-pane">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                            <!-- ngIf: items.list === null -->

    
    <!-- ngIf: items.list !== null && items.list.length > 0 --><div ng-if="items.list !== null &amp;&amp; items.list.length &gt; 0" class="table-responsive ng-scope">
        <table class="table">
            <thead>
            <tr>


                <th style="width: 60%">البند</th>

                <th>التكلفة</th>

                <!--
                <th ng-show="activeType == 'payable'" style="width: 200px">
                    global.finances.item_recurrence</th>-->

                <th style="width: 50px">Id</th>

                <th style="width: 130px">وقت الإضافة</th>
            </tr>
            </thead>

            <tbody>
                <!-- ngRepeat: item in items.get() track by item.id --><tr ng-repeat="item in items.get() track by item.id" class="ng-scope">


                    
                    <td>
                        
                        <!-- ngIf: !item.deleted_at --><div ng-if="!item.deleted_at" class="btn-group btn-group-xs onSide ng-scope">
                            <button ng-click="items.edit(item)" class="btn btn-default icon-only">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </button>

                            <!-- ngIf: !item.readonly -->
                        </div><!-- end ngIf: !item.deleted_at -->

                        <div>
                            <h4 class="text-primary ng-binding">إستلام مدفوعات أحد المسارات التدريبية</h4>

                            <!-- ngIf: item.deleted_at -->
                        </div>

                        <div ng-show="item.description" class="text-muted small ng-binding">
                            مدفوعات العملاء او العملاء المحتملين لخطوات المسارات الإلكترونية
                        </div>

                        <!-- ngIf: !!item.code --><div ng-if="!!item.code" class="extra-small text-muted ng-binding ng-scope">
                            <i class="fa fa-code"></i> path_fees
                        </div><!-- end ngIf: !!item.code -->

                        
                        <div class="itemPermittedUsersList">
                            <!-- ngRepeat: user in item.permittedUsers -->
                        </div>
                    </td>

                    
                    <td>
                        <!-- ngIf: item.price -->

                        <!-- ngIf: !item.price --><span ng-if="!item.price" class="ng-scope">--</span><!-- end ngIf: !item.price -->
                    </td>

                    
                    <!--
                    <td ng-show="activeType == 'payable'">
                        {{ item.recurrenceLine || '--' }}
                    </td>
                    -->

                    <td class="ng-binding">1</td>

                    
                    <td>
                        <span dir="ltr" class="ng-binding">20/04, 05:02 PM</span>
                    </td>
                </tr><!-- end ngRepeat: item in items.get() track by item.id --><tr ng-repeat="item in items.get() track by item.id" class="ng-scope">


                    
                    <td>
                        
                        <!-- ngIf: !item.deleted_at --><div ng-if="!item.deleted_at" class="btn-group btn-group-xs onSide ng-scope">
                            <button ng-click="items.edit(item)" class="btn btn-default icon-only">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </button>

                            <!-- ngIf: !item.readonly -->
                        </div><!-- end ngIf: !item.deleted_at -->

                        <div>
                            <h4 class="text-primary ng-binding">إستلام مدفوعات أحد المجموعات التدريبية</h4>

                            <!-- ngIf: item.deleted_at -->
                        </div>

                        <div ng-show="item.description" class="text-muted small ng-binding">
                            مدفوعات المتدربين للمجموعات التدريبية
                        </div>

                        <!-- ngIf: !!item.code --><div ng-if="!!item.code" class="extra-small text-muted ng-binding ng-scope">
                            <i class="fa fa-code"></i> batch_fees
                        </div><!-- end ngIf: !!item.code -->

                        
                        <div class="itemPermittedUsersList">
                            <!-- ngRepeat: user in item.permittedUsers -->
                        </div>
                    </td>

                    
                    <td>
                        <!-- ngIf: item.price -->

                        <!-- ngIf: !item.price --><span ng-if="!item.price" class="ng-scope">--</span><!-- end ngIf: !item.price -->
                    </td>

                    
                    <!--
                    <td ng-show="activeType == 'payable'">
                        {{ item.recurrenceLine || '--' }}
                    </td>
                    -->

                    <td class="ng-binding">2</td>

                    
                    <td>
                        <span dir="ltr" class="ng-binding">20/04, 05:02 PM</span>
                    </td>
                </tr><!-- end ngRepeat: item in items.get() track by item.id --><tr ng-repeat="item in items.get() track by item.id" class="ng-scope">


                    
                    <td>
                        
                        <!-- ngIf: !item.deleted_at --><div ng-if="!item.deleted_at" class="btn-group btn-group-xs onSide ng-scope">
                            <button ng-click="items.edit(item)" class="btn btn-default icon-only">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </button>

                            <!-- ngIf: !item.readonly -->
                        </div><!-- end ngIf: !item.deleted_at -->

                        <div>
                            <h4 class="text-primary ng-binding">إستلام تكلفة أحد المنتجات</h4>

                            <!-- ngIf: item.deleted_at -->
                        </div>

                        <div ng-show="item.description" class="text-muted small ng-binding">
                            عملية بيع لمنتج أو أكثر من المنتجات المسجلة بالمخزن
                        </div>

                        <!-- ngIf: !!item.code --><div ng-if="!!item.code" class="extra-small text-muted ng-binding ng-scope">
                            <i class="fa fa-code"></i> stock_products_sale
                        </div><!-- end ngIf: !!item.code -->

                        
                        <div class="itemPermittedUsersList">
                            <!-- ngRepeat: user in item.permittedUsers -->
                        </div>
                    </td>

                    
                    <td>
                        <!-- ngIf: item.price -->

                        <!-- ngIf: !item.price --><span ng-if="!item.price" class="ng-scope">--</span><!-- end ngIf: !item.price -->
                    </td>

                    
                    <!--
                    <td ng-show="activeType == 'payable'">
                        {{ item.recurrenceLine || '--' }}
                    </td>
                    -->

                    <td class="ng-binding">3</td>

                    
                    <td>
                        <span dir="ltr" class="ng-binding">20/04, 05:02 PM</span>
                    </td>
                </tr><!-- end ngRepeat: item in items.get() track by item.id --><tr ng-repeat="item in items.get() track by item.id" class="ng-scope">


                    
                    <td>
                        
                        <!-- ngIf: !item.deleted_at --><div ng-if="!item.deleted_at" class="btn-group btn-group-xs onSide ng-scope">
                            <button ng-click="items.edit(item)" class="btn btn-default icon-only">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </button>

                            <!-- ngIf: !item.readonly -->
                        </div><!-- end ngIf: !item.deleted_at -->

                        <div>
                            <h4 class="text-primary ng-binding">استلام مبلغ مقدم أو تحت الحساب</h4>

                            <!-- ngIf: item.deleted_at -->
                        </div>

                        <div ng-show="item.description" class="text-muted small ng-binding">
                            استلام مبلغ كمقدم أو تحت الحساب. ويمكنك عدم اختيار الخدمة المرتبط
				 بها الدفع الآن وتحديدها لاحقاً
                        </div>

                        <!-- ngIf: !!item.code --><div ng-if="!!item.code" class="extra-small text-muted ng-binding ng-scope">
                            <i class="fa fa-code"></i> receivable_upfront
                        </div><!-- end ngIf: !!item.code -->

                        
                        <div class="itemPermittedUsersList">
                            <!-- ngRepeat: user in item.permittedUsers -->
                        </div>
                    </td>

                    
                    <td>
                        <!-- ngIf: item.price -->

                        <!-- ngIf: !item.price --><span ng-if="!item.price" class="ng-scope">--</span><!-- end ngIf: !item.price -->
                    </td>

                    
                    <!--
                    <td ng-show="activeType == 'payable'">
                        {{ item.recurrenceLine || '--' }}
                    </td>
                    -->

                    <td class="ng-binding">4</td>

                    
                    <td>
                        <span dir="ltr" class="ng-binding">20/04, 05:02 PM</span>
                    </td>
                </tr><!-- end ngRepeat: item in items.get() track by item.id --><tr ng-repeat="item in items.get() track by item.id" class="ng-scope">


                    
                    <td>
                        
                        <!-- ngIf: !item.deleted_at --><div ng-if="!item.deleted_at" class="btn-group btn-group-xs onSide ng-scope">
                            <button ng-click="items.edit(item)" class="btn btn-default icon-only">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </button>

                            <!-- ngIf: !item.readonly -->
                        </div><!-- end ngIf: !item.deleted_at -->

                        <div>
                            <h4 class="text-primary ng-binding">إضافة مبلغ للرصيد</h4>

                            <!-- ngIf: item.deleted_at -->
                        </div>

                        <div ng-show="item.description" class="text-muted small ng-binding">
                            عملية إستلام مبلغ من عميل للإضافة إلى رصيده على النظام، للخصم منه عند إستحقاق الدفع لاحقاً
                        </div>

                        <!-- ngIf: !!item.code --><div ng-if="!!item.code" class="extra-small text-muted ng-binding ng-scope">
                            <i class="fa fa-code"></i> receivable_balance_recharge
                        </div><!-- end ngIf: !!item.code -->

                        
                        <div class="itemPermittedUsersList">
                            <!-- ngRepeat: user in item.permittedUsers -->
                        </div>
                    </td>

                    
                    <td>
                        <!-- ngIf: item.price -->

                        <!-- ngIf: !item.price --><span ng-if="!item.price" class="ng-scope">--</span><!-- end ngIf: !item.price -->
                    </td>

                    
                    <!--
                    <td ng-show="activeType == 'payable'">
                        {{ item.recurrenceLine || '--' }}
                    </td>
                    -->

                    <td class="ng-binding">5</td>

                    
                    <td>
                        <span dir="ltr" class="ng-binding">20/04, 05:02 PM</span>
                    </td>
                </tr><!-- end ngRepeat: item in items.get() track by item.id --><tr ng-repeat="item in items.get() track by item.id" class="ng-scope">


                    
                    <td>
                        
                        <!-- ngIf: !item.deleted_at --><div ng-if="!item.deleted_at" class="btn-group btn-group-xs onSide ng-scope">
                            <button ng-click="items.edit(item)" class="btn btn-default icon-only">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </button>

                            <!-- ngIf: !item.readonly -->
                        </div><!-- end ngIf: !item.deleted_at -->

                        <div>
                            <h4 class="text-primary ng-binding">إستلام مدفوعات طلب تدريب</h4>

                            <!-- ngIf: item.deleted_at -->
                        </div>

                        <div ng-show="item.description" class="text-muted small ng-binding">
                            عملية إستلام مدفوعات طلب تدريب (دورة أو باقة دورات)
                        </div>

                        <!-- ngIf: !!item.code --><div ng-if="!!item.code" class="extra-small text-muted ng-binding ng-scope">
                            <i class="fa fa-code"></i> order_payment
                        </div><!-- end ngIf: !!item.code -->

                        
                        <div class="itemPermittedUsersList">
                            <!-- ngRepeat: user in item.permittedUsers -->
                        </div>
                    </td>

                    
                    <td>
                        <!-- ngIf: item.price -->

                        <!-- ngIf: !item.price --><span ng-if="!item.price" class="ng-scope">--</span><!-- end ngIf: !item.price -->
                    </td>

                    
                    <!--
                    <td ng-show="activeType == 'payable'">
                        {{ item.recurrenceLine || '--' }}
                    </td>
                    -->

                    <td class="ng-binding">6</td>

                    
                    <td>
                        <span dir="ltr" class="ng-binding">20/04, 05:02 PM</span>
                    </td>
                </tr><!-- end ngRepeat: item in items.get() track by item.id --><tr ng-repeat="item in items.get() track by item.id" class="ng-scope">


                    
                    <td>
                        
                        <!-- ngIf: !item.deleted_at --><div ng-if="!item.deleted_at" class="btn-group btn-group-xs onSide ng-scope">
                            <button ng-click="items.edit(item)" class="btn btn-default icon-only">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </button>

                            <!-- ngIf: !item.readonly -->
                        </div><!-- end ngIf: !item.deleted_at -->

                        <div>
                            <h4 class="text-primary ng-binding">إستلام تكلفة حجز إختبار تحديد مستوى</h4>

                            <!-- ngIf: item.deleted_at -->
                        </div>

                        <div ng-show="item.description" class="text-muted small ng-binding">
                            عملية دفع مقابل إختبار تحديد مستوى. سواء كانت هذه التكلفة منفصلة للإختبار تحديداً او تعتبر جزء من تكلفة التدريب بعد ذلك.
                        </div>

                        <!-- ngIf: !!item.code --><div ng-if="!!item.code" class="extra-small text-muted ng-binding ng-scope">
                            <i class="fa fa-code"></i> placement_test_separate_cost
                        </div><!-- end ngIf: !!item.code -->

                        
                        <div class="itemPermittedUsersList">
                            <!-- ngRepeat: user in item.permittedUsers -->
                        </div>
                    </td>

                    
                    <td>
                        <!-- ngIf: item.price -->

                        <!-- ngIf: !item.price --><span ng-if="!item.price" class="ng-scope">--</span><!-- end ngIf: !item.price -->
                    </td>

                    
                    <!--
                    <td ng-show="activeType == 'payable'">
                        {{ item.recurrenceLine || '--' }}
                    </td>
                    -->

                    <td class="ng-binding">7</td>

                    
                    <td>
                        <span dir="ltr" class="ng-binding">20/04, 05:02 PM</span>
                    </td>
                </tr><!-- end ngRepeat: item in items.get() track by item.id -->
            </tbody>
        </table>
    </div><!-- end ngIf: items.list !== null && items.list.length > 0 -->                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                            <div class="block style2">
        <div class="block-title">
            <i class="icon fa fa-plus-circle"></i>
            <span class="title">
                إضافة بند ماليات جديد            </span>
        </div>

        <div class="block-body">
            <form name="newItemForm" class="ng-pristine ng-invalid ng-invalid-required">
                <div class="block-body">
                    
                    <!-- ngIf: newItem.errors -->

                    
                    <div class="form-group">
                        <label>مسمى البند الجديد</label>
                        <input ng-model="newItem.info.name" type="text" class="form-control input-lg ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" required="" wfd-id="id1">
                    </div>

                    
                    <div class="form-group">
                        <label>وصف قصير</label>
                        <textarea ng-model="newItem.info.description" class="form-control ng-pristine ng-untouched ng-valid ng-empty" rows="3"></textarea>
                    </div>

                    
                    <div class="form-group">
                        <label>التكلفة ( خياري )</label>

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                                <input ng-model="newItem.info.price" type="text" class="form-control ng-pristine ng-untouched ng-valid ng-empty" wfd-id="id2">
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                                <select ng-model="newItem.info.currency" ng-options="iso as name for (iso, name) in trans('currencies')" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty"><option label="SAR - ريال سعودي" value="string:SAR">SAR - ريال سعودي</option><option label="EGP - جنيه مصري" value="string:EGP" selected="selected">EGP - جنيه مصري</option><option label="USD - دولار أمريكي" value="string:USD">USD - دولار أمريكي</option><option label="AED - ديرهم إماراتي" value="string:AED">AED - ديرهم إماراتي</option><option label="DZD - دينار جزائري" value="string:DZD">DZD - دينار جزائري</option><option label="BHD - دينار بحريني" value="string:BHD">BHD - دينار بحريني</option><option label="CAD - دولار كندي" value="string:CAD">CAD - دولار كندي</option><option label="INR - روبية هندي" value="string:INR">INR - روبية هندي</option><option label="IDR - روبية إندونيسية" value="string:IDR">IDR - روبية إندونيسية</option><option label="IQD - دينار عراقي" value="string:IQD">IQD - دينار عراقي</option><option label="JOD - دينار أردني" value="string:JOD">JOD - دينار أردني</option><option label="KWD - دينار كويتي" value="string:KWD">KWD - دينار كويتي</option><option label="LBP - جنيه لبناني" value="string:LBP">LBP - جنيه لبناني</option><option label="LYD - دينار ليبي" value="string:LYD">LYD - دينار ليبي</option><option label="MAD - ديرهم مغربي" value="string:MAD">MAD - ديرهم مغربي</option><option label="OMR - ريال عماني" value="string:OMR">OMR - ريال عماني</option><option label="QAR - ريال قطري" value="string:QAR">QAR - ريال قطري</option><option label="SYP - جنيه سوري" value="string:SYP">SYP - جنيه سوري</option><option label="TND - دينار تونسي" value="string:TND">TND - دينار تونسي</option><option label="TRY - ليرة تركية" value="string:TRY">TRY - ليرة تركية</option><option label="GBP - جنيه إسترليني" value="string:GBP">GBP - جنيه إسترليني</option><option label="YER - ريال يمني" value="string:YER">YER - ريال يمني</option><option label="SDG - جنيه سوداني" value="string:SDG">SDG - جنيه سوداني</option></select>
                            </div>
                        </div>
                    </div>

                    
                    <div ng-show="data.users.length &gt; 0" class="form-group ng-hide">
                        <label>
                            <span class="glyphicon glyphicon-lock"></span>
                            المستخدمين المصرح لهم اختيار هذا البند ( خياري )
                        </label>
                        <div class="help-block">قم باختيار مستخدمي النظام المصرح لهم اختيار هذا البند عند إضافة عمليات مالية
			جديدة أو عند إدارة العمليات المسجلة بالفعل أسفله. <strong> سيظهر على هذه القائمة فقط من لديهم صلاحيات إدارة
			الماليات أو تسجيل التعاملات المالية.</strong></div>

                        <div class="permittedUsersList">
                            <!-- ngRepeat: user in data.users -->
                        </div>
                    </div>

                    <div class="form-group">
                        <button ng-disabled="newItemForm.$invalid" ng-click="newItem.create()" class="btn btn-primary" disabled="disabled">
                            <span class="glyphicon glyphicon-ok"></span>
                            حفظ
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <script type="text/ng-template" id="editItem.html">
                <div class="modal-header">
        <button ng-click="$close()" class="close">
            <span>&times;</span>
        </button>

        <h4>
            تعديل معلومات البند: {{ info.name }}        </h4>
    </div>

    <form name="editItemForm">
        <div class="modal-body">
            
            <div ng-if="errors" ng-cloak class="validationErrors alert alert-danger">
		<ul>
			<li ng-repeat="error in errors">{{ error }}</li>
		</ul>
	</div>

            
             <div class="alert alert-danger" ng-if="info.readonly">
        
        <i class="fa fa-exclamation-triangle"></i>
        هذا البند المالي هو خاص بالنظام، ومصمم لغرض واحد محدد واضح من إسمه. رجاءاً لا تقم بتغيير هذا الإسم او تستخدم هذا البند بشكل مغاير للهدف منه او طبيعته.
    </div> 

            
            <div class="form-group">
                <label>الإسم</label>
                <input ng-model="info.name" type="text"
                       class="form-control input-lg" required/>
            </div>

            
            <div class="form-group">
                <label>وصف قصير</label>
                <textarea ng-model="info.description" class="form-control" rows="3"></textarea>
            </div>

            
            <div class="form-group">
                <label>التكلفة ( خياري )</label>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                        <input ng-model="info.price" type="text" class="form-control"/>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                        <select ng-model="info.currency"
                                ng-options="iso as name for (iso, name) in trans('currencies')"
                                class="form-control"></select>
                    </div>
                </div>
            </div>

            
            <div ng-show="data.users.length > 0" ng-cloak class="form-group">
                <label>
                    <span class="glyphicon glyphicon-lock"></span>
                    المستخدمين المصرح لهم اختيار هذا البند ( خياري )
                </label>
                <div class="help-block">قم باختيار مستخدمي النظام المصرح لهم اختيار هذا البند عند إضافة عمليات مالية
			جديدة أو عند إدارة العمليات المسجلة بالفعل أسفله.<strong> سيظهر على هذه القائمة فقط من لديهم صلاحيات إدارة
			الماليات أو تسجيل التعاملات المالية.</strong></div>

                <div class="permittedUsersList">
                    <div ng-repeat="user in data.users" class="checkbox">
                        <label>
                            <input checklist-model="info.permittedUsers"
                                   checklist-value="user.id" type="checkbox"/> {{ user.name }}
                        </label>
                    </div>
                </div>
            </div>

        </div>

        <div class="modal-footer">
            <button ng-disabled="editItemForm.$invalid" ng-click="save()" type="submit" class="btn btn-primary">
                <i class="fa fa-check"></i>
                حفظ
            </button>

            <button ng-click="$close()" class="btn btn-default" type="button">
                <i class="fa fa-close"></i> إغلاق
            </button>
        </div>
    </form>
            </script>
        </div>
            </div>

            </div>
</div>

<?php
// تضمين footer template
include_once __DIR__ . '/../templates/footer.php';
?>
