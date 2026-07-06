<?php
// إعداد المتغيرات
$pageTitle = 'إصدار فاتورة جديدة';
$includeSessionCheck = true;
$includeCSRFRefresh = true;

// تضمين القوالب
include_once __DIR__ . '/../../templates/header.php';
include_once __DIR__ . '/../../templates/sidebar.php';
?>

<div id="container" class="container-fluid">
<div id="content" class="">
                    <div id="pageTitle" class="d-flex flex-gap-15 flex-wrap flex-rows flex-column-on-mobile align-items-center justify-content-between">
        <div class="flex-grow-1">
            <i class="icon fa fa-dollar"></i>
            <span class="title">الماليات</span>

                            
                <ul class="breadcrumb inline" style="margin: 0">
                    <li class="breadcrumb-item"></li>

                                            <li class="breadcrumb-item">الفواتير</li>
                                    </ul>
                    </div>

        <div class="d-flex justify-content-center">
            <div>
                            
                            </div>
        </div>
    </div>
                <div class="block style4">
            <div class="block-title">
                <i class="icon fa fa-plus-circle"></i>
                <span class="title">
                    إصدار فاتورة جديدة
                </span>

                <div class="side">
                    <a href="/finances/invoices" class="btn btn-default">
                        <i class="fa fa-chevron-right"></i> عودة
                    </a>
                </div>
            </div>

            <div ng-app="newInvoiceApp" ng-controller="mainController" class="block-body ng-scope">
                <dismissible-hint name="finances.invoices.create" class="ng-isolate-scope">
    <!-- ngIf: visible --><div ng-if="visible" class="dismissibleHint  d-flex flex-gap-15 align-items-center justify-content-between">
        <div class="d-flex flex-gap-20 align-items-center flex-grow-1">
            <!-- ngIf: icon || img --><div ng-if="icon || img" class="iconHolder hidden-xs ng-scope">
                <!-- ngIf: img -->
                <!-- ngIf: icon --><span ng-if="icon" class="ms icon ng-binding ng-scope">info</span><!-- end ngIf: icon -->
            </div><!-- end ngIf: icon || img -->

            <div class="content flex-grow-1">
                <ng-transclude>
                    يمكنك إستخدام هذا النموذج لإصدارة فاتورة لأحد العملاء. سيتم إرسال رابط الدفع المباشر للعميل فى رساله على هاتفه أو بريده الإلكتروني.
		فور إتمام الدفع سيتم تسجيل معاملة مالية اوتوماتيكياً بالمبلغ وضمها إلى الحسابات. يمكنك متابعة جميع الفواتير وحالة كل منها من على صفحة الفواتير من على قائمة الماليات.
                </ng-transclude>
            </div>
        </div>

        <div>
            <!-- ngIf: dismissible --><button ng-click="dismiss()" ng-if="dismissible" class="close ng-scope" type="button">
                <span>×</span>
            </button><!-- end ngIf: dismissible -->
        </div>
    </div><!-- end ngIf: visible --></dismissible-hint>

                
                 <!-- ngIf: ! hasPaymentGateways() --> 

                <div class="row">
                    <form name="newInvoiceForm" class="form-horizontal ng-pristine ng-invalid ng-invalid-required ng-invalid-min ng-valid-step">
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div>
        
        <div class="row">
            <div class="control-label col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <label for="invoiceItem">البند المالي *</label>
                <div class="help-block">
                    إختر البند المالى. فقط عدد محدود من البنود المالية مدعوم الآن
                </div>
            </div>

            <div class="form-group col-xs-12 col-sm-12 col-md-5">
                <select ng-model="items.selected" ng-options="item as item.name for item in data.items" ng-change="items.onSelect()" class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" id="invoiceItem" required=""><option value="?" selected="selected"></option><option label="إستلام مدفوعات أحد المجموعات التدريبية" value="object:3">إستلام مدفوعات أحد المجموعات التدريبية</option><option label="استلام مبلغ مقدم أو تحت الحساب" value="object:4">استلام مبلغ مقدم أو تحت الحساب</option><option label="إضافة مبلغ للرصيد" value="object:5">إضافة مبلغ للرصيد</option><option label="إستلام مدفوعات طلب تدريب" value="object:6">إستلام مدفوعات طلب تدريب</option><option label="إستلام تكلفة حجز إختبار تحديد مستوى" value="object:7">إستلام تكلفة حجز إختبار تحديد مستوى</option></select>
            </div>
        </div>

        
        <!-- ngIf: !! items.selected -->

    
    <!-- ngIf: invoice.payer_type == 'client' -->

    
    <!-- ngIf: invoice.payer_type == 'lead' -->

        
        <!-- ngIf: !!service.service -->

        
        <div class="row">
        <div class="control-label col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <label>المبلغ الأصلي (Subtotal) *</label>
            <div class="help-block">
                المبلغ الأصلي Gross قبل اي خصومات او ضرائب
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-3">
            <div class="input-group">
                <input ng-model="invoice.amount" type="number" step="any" min="1" class="form-control ng-pristine ng-untouched ng-not-empty ng-invalid ng-invalid-min ng-valid-step ng-valid-required" required="">

                <div class="input-group-addon">
                    EGP
                </div>
            </div>
        </div>
    </div>

    
    <div class="row">
        <div class="control-label col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <label>إجمالي المخصوم *</label>
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-2">
            <input ng-model="invoice.discount_total" type="text" only-digits="" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty ng-valid-required" required="">
        </div>
    </div>

    
    <div class="row">
        <div class="control-label col-xs-12 col-sm-12 col-md-4">
            <label>الضرائب</label>
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-4">
            <div class="checkboxes-holder">
                <!-- ngRepeat: tax in data.taxes --><div ng-repeat="tax in data.taxes" class="checkbox ng-scope">
                    <label>
                        <input checklist-value="tax" type="checkbox" ng-model="checked" class="ng-scope ng-pristine ng-untouched ng-valid ng-empty" checklist-model="taxes.selected">
                        <b class="ng-binding">VAT</b> <i class="ng-binding">(15.00%)</i>
                    </label>
                </div><!-- end ngRepeat: tax in data.taxes -->
            </div>
        </div>
    </div>

        
        <div class="row">
            <div class="control-label col-xs-12 col-sm-12 col-md-4">
                <label>بوابة الدفع</label>
                <div class="help-block">بوابة الدفع التي سيتم إستخدامها لإتمام عملية الدفع لهذه الفاتورة.<b>سيظهر على هذه القائمة فقط الخدمات التي تم إعداد الربط لها مع المنصة</b></div>
            </div>
            <div class="form-group col-xs-12 col-sm-12 col-md-5">
                <select ng-model="invoice.payment_gateway" ng-options="name as label for (name, label) in data.paymentGateways" ng-disabled="!hasPaymentGateways()" name="payment_gateway" class="form-control ng-pristine ng-untouched ng-valid ng-empty"><option value="?" selected="selected"></option><option label="إنستاباي (غير رسمي)" value="string:instapay-unofficial">إنستاباي (غير رسمي)</option></select>
            </div>
        </div>

        
        <div class="row">
            <div class="control-label col-xs-12 col-sm-12 col-md-4">
                <label>المسمى</label>
            </div>
            <div class="form-group col-xs-12 col-sm-12 col-md-5">
                <input ng-model="invoice.label" type="text" class="form-control ng-pristine ng-untouched ng-valid ng-empty">
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="control-label col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <label></label>
            </div>
            <div class="form-group col-xs-12 col-sm-12 col-md-7">
                <button ng-click="create()" ng-disabled="newInvoiceForm.$invalid" disable-on-ajax="" type="submit" class="btn btn-primary disabled" disabled="disabled">
                    <i class="fa fa-check-circle"></i>
                    إصدار الفاتورة
                </button>

                <button ng-click="create(true)" ng-disabled="newInvoiceForm.$invalid" disable-on-ajax="" type="button" class="btn btn-info disabled" disabled="disabled">
                    <i class="fa fa-plus-circle"></i>
                    حفظ وإضافة أخرى
                </button>
            </div>
        </div>

    </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-3">
                            <dl id="summary" class="bg-color-white box-shadow rounded border">
        <dt>المبلغ الأصلي (Subtotal)</dt>
        <dd>
            <h4 class="ng-binding">0.00</h4>
        </dd>

        <dt>إجمالي المخصوم</dt>
        <dd>
            <h4 class="ng-binding">0.00</h4>
        </dd>

        <dt>إجمالي الضرائب</dt>
        <dd>
            <h4 class="ng-binding">0.00</h4>
        </dd>

        <dt>الإجمالي النهائي (Total)</dt>
        <dd><h4 class="ng-binding">0.00</h4></dd>
    </dl>                        </div>
                    </form>
                </div>

            </div>
        </div>

                </div>
</div>

<?php
// تضمين footer template
include_once __DIR__ . '/../../templates/footer.php';
?>
