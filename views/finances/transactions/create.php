<?php
// إعداد المتغيرات
$pageTitle = 'عملية دفع أو استلام جديدة';
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

                                            <li class="breadcrumb-item">تسجيل عملية مالية جديدة</li>
                                    </ul>
                    </div>

        <div class="d-flex justify-content-center">
            <div>
                
                            </div>
        </div>
    </div>
        <div ng-app="newTransactionApp" ng-controller="mainController" class="ng-scope">
            
            <dismissible-hint name="finances.transactions.create" class="ng-isolate-scope">
    <!-- ngIf: visible --><div ng-if="visible" class="dismissibleHint  d-flex flex-gap-15 align-items-center justify-content-between">
        <div class="d-flex flex-gap-20 align-items-center flex-grow-1">
            <!-- ngIf: icon || img --><div ng-if="icon || img" class="iconHolder hidden-xs ng-scope">
                <!-- ngIf: img -->
                <!-- ngIf: icon --><span ng-if="icon" class="ms icon ng-binding ng-scope">info</span><!-- end ngIf: icon -->
            </div><!-- end ngIf: icon || img -->

            <div class="content flex-grow-1">
                <ng-transclude>
                هنا يمكنك تسجيل كافة المعاملات المالية للمؤسسة. هذا النموذج يحتوي على كافة الخيارات لتسجيل أي نوع
		من المعاملات المالية، الصادر منها والوارد. هذا بالطبع يشمل مدفوعات المتدربين للدورات أو الدفع للمدربين أو اي
		نوع آخر. ابدأ باختيار نوع المعاملة ثم البند المالي، وبناءاً على ما تم اختياره ستظهر باقي الحقول.            </ng-transclude>
            </div>
        </div>

        <div>
            <!-- ngIf: dismissible --><button ng-click="dismiss()" ng-if="dismissible" class="close ng-scope" type="button">
                <span>×</span>
            </button><!-- end ngIf: dismissible -->
        </div>
    </div><!-- end ngIf: visible --></dismissible-hint>

            
            <!-- ngIf: !data.loaded() -->

            
            <!-- ngIf: data.loaded() --><div id="form" class="received" ng-if="data.loaded()">
                
                <form name="newTransactionForm" class="ng-pristine ng-invalid ng-invalid-required">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-1">
                            <div class="row section">
        <div class="col-md-5">
            <label class="control-label">نوع المعاملة</label>

            <popover content="نوع المعاملة الجديدة، إما وارد (ربح)، أو صادر (صرف)" class="ng-isolate-scope"><i uib-popover="نوع المعاملة الجديدة، إما وارد (ربح)، أو صادر (صرف)" popover-title="" popover-trigger="'mouseenter'" popover-placement="" class="popover-hint fa fa-question-circle"></i></popover>
        </div>

        <div class="col-md-7">
            <div class="btn-group">
                <a ng-class="{'btn-success': transaction.type.is('received'), 'btn-default': !transaction.type.is('received')}" ng-click="transaction.type.set('received')" data-toggle="tooltip" title="عملية استلام مدفوعات جديدة" href="" class="btn btn-success">
                    <i class="icon fa fa-arrow-down"></i>
                    <span class="title">وارد (ربح)</span>
                </a>

                <a ng-class="{'btn-danger': transaction.type.is('paid'), 'btn-default': !transaction.type.is('paid')}" ng-click="transaction.type.set('paid')" data-toggle="tooltip" title="عملية صرف أو دفع جديدة" href="" class="btn btn-default">
                    <i class="icon fa fa-arrow-up"></i>
                    <span class="title">صادر (صرف)</span>
                </a>
            </div>
        </div>
    </div>                            <div class="row section">
        <div class="col-md-5">
            <label class="control-label">البند المالي</label>
            <div class="help-block">
                البند المالي، أو نوع العملية التي يتم إضافتها            </div>

            <div class="margin-top-bottom-20">
                <a href="/finances/preferences/items" target="_blank" class="btn btn-xs btn-default">
                    <i class="fa fa-sliders"></i> ادارة البنود المالية                </a>
            </div>
        </div>

        <div class="col-md-7">
            
            <!-- ngIf: !items.selected.isSet() --><div ng-if="!items.selected.isSet()" class="form-group ng-scope">
                <select ng-model="items.selected.item" ng-change="items.selected.onSelect()" class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" required=""><option value="? object:null ?" selected="selected"></option>

                    <optgroup label="بنود النظام الأساسية">
                        <!-- ngRepeat: item in items.getMenu(true) --><option ng-repeat="item in items.getMenu(true)" ng-value="item" class="ng-binding ng-scope" value="object:34">إستلام مدفوعات أحد المجموعات التدريبية</option><!-- end ngRepeat: item in items.getMenu(true) --><option ng-repeat="item in items.getMenu(true)" ng-value="item" class="ng-binding ng-scope" value="object:35">استلام مبلغ مقدم أو تحت الحساب</option><!-- end ngRepeat: item in items.getMenu(true) --><option ng-repeat="item in items.getMenu(true)" ng-value="item" class="ng-binding ng-scope" value="object:36">إضافة مبلغ للرصيد</option><!-- end ngRepeat: item in items.getMenu(true) --><option ng-repeat="item in items.getMenu(true)" ng-value="item" class="ng-binding ng-scope" value="object:37">إستلام مدفوعات طلب تدريب</option><!-- end ngRepeat: item in items.getMenu(true) --><option ng-repeat="item in items.getMenu(true)" ng-value="item" class="ng-binding ng-scope" value="object:38">إستلام تكلفة حجز إختبار تحديد مستوى</option><!-- end ngRepeat: item in items.getMenu(true) -->
                    </optgroup>

                    <optgroup label="البنود الإضافية">
                        <!-- ngRepeat: item in items.getMenu(false) -->
                    </optgroup>
                </select>
            </div><!-- end ngIf: !items.selected.isSet() -->

            
            <!-- ngIf: items.selected.isSet() -->
        </div>
    </div>                            <!-- ngIf: items.selected.isSet() && service.getServicesForSelectedItem().length > 0 -->                            <!-- ngIf: transaction.type.isReceived() && items.selected.isSet() -->                            <!-- ngIf: transaction.type.isPaid() && items.selected.isSet() -->                                                        <!-- ngIf: transaction.type.isReceived() && payingParty.isSelected() && service.batch.selected.isSet() -->                            <!-- ngIf: transaction.type.isReceived() && service.selected.isSet() -->                            <div class="row section">
        <div class="col-md-5">
            <label class="control-label">
                معلومات الدفع            </label>
        </div>

        <div class="col-md-7">
            
            <div class="form-group">
                <label>الوسوم</label>
                <div class="tags-menu pills align-items-center ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty" type="transactions" ng-model="transaction.info.tagIds">
    <div>
        <div class="dropdown">
            <button data-toggle="dropdown" class="btn btn-default dropdown-toggle ng-binding" type="button">
                <i class="fa fa-tag"></i> الوسوم <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" style="max-height: 250px; min-width: 250px; overflow-y: auto">
                <li ng-show="tags.length &gt;= 6" class="border-bottom ng-hide" style="padding: 8px">
                    <input type="text" ng-model="search" class="form-control input-sm ng-pristine ng-untouched ng-valid ng-empty" placeholder="بحث ...">
                </li>

                <li ng-show="tags.length === 0" class="text-center text-muted" style="padding: 10px">
                    <small class="ng-binding">لا توجد وسوم بعد</small>
                </li>

                <!-- ngRepeat: tag in tags | filter:search track by tag.id -->

                <li class="border-top" ng-click="$event.stopPropagation()" style="padding-top: 3px">
                    <!-- ngIf: ! newTag.visible --><a ng-if="! newTag.visible" ng-click="newTag.show()" href="" class="ng-binding ng-scope">
                        <i class="fa fa-plus"></i> إنشاء وسم جديد
                    </a><!-- end ngIf: ! newTag.visible -->

                    <!-- ngIf: newTag.visible -->
                </li>
            </ul>
        </div>
    </div>

    <!-- ngRepeat: tag in selected track by tag.id -->
</div>
            </div>

            
            <div class="form-group">
                <label>مرفق</label>

                <!-- ngIf: !transaction.info.attachment --><div ng-if="!transaction.info.attachment" class="ng-scope">
                    <button type="button" class="btn btn-default ng-pristine ng-untouched ng-valid ng-empty" ngf-select="" ng-model="transaction.info.attachment" ngf-max-size="50MB">
                        <i class="fa fa-paperclip"></i> اختر ملف                    </button>
                </div><!-- end ngIf: !transaction.info.attachment -->

                <!-- ngIf: transaction.info.attachment -->
            </div>

            <hr>

            
            <!-- ngIf: transaction.type.isReceived() --><div ng-if="transaction.type.isReceived()" class="ng-scope">
        <div class="form-group">
            <label>الضريبة</label>

            
            <!-- ngIf: data.get('taxes').length == 0 -->

            
            <!-- ngIf: data.get('taxes').length > 0 --><div ng-if="data.get('taxes').length &gt; 0" class="row ng-scope">
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 column-bordered">
                    <div class="noPadding">
                        
                        <!-- ngRepeat: t in data.get('taxes') --><div ng-repeat="t in data.get('taxes')" class="checkbox ng-scope">
                            <label class="ng-binding">
                                <input checklist-value="t" ng-disabled="transaction.method.selected.isBalance()" type="checkbox" ng-model="checked" class="ng-scope ng-pristine ng-untouched ng-valid ng-empty" checklist-model="amount.taxes.selected.taxes"> VAT
                                ( <b class="ng-binding">15.00%</b> )
                            </label>
                        </div><!-- end ngRepeat: t in data.get('taxes') -->

                        
                        <div class="margin-top-20">
                            <a ng-click="amount.taxes.create()" class="btn btn-xs btn-link" target="_blank">
                                <i class="fa fa-plus-circle"></i> إضافة ضريبة                            </a>
                            <a href="/finances/preferences/taxes" class="btn btn-xs btn-link" target="_blank">
                                <i class="fa fa-list"></i> ادارة الضرائب                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <div data-toggle="tooltip" title="إختر إذا ما كانت الضريبة تضاف إلى الرقم النهائي أو إذا كانت تحسب أنها مضمنة بالفعل في
				 هذا الرقم">
                        <div class="radio">
                            <label>
                                <input ng-model="amount.taxes.adding.added" ng-value="true" ng-change="amount.taxes.adding.onChange()" type="radio" class="ng-pristine ng-untouched ng-valid ng-not-empty" name="45" value="true"> مضافة
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input ng-model="amount.taxes.adding.added" ng-value="false" ng-change="amount.taxes.adding.onChange()" type="radio" class="ng-pristine ng-untouched ng-valid ng-not-empty" name="46" value="false"> مضمنة
                            </label>
                        </div>
                    </div>
                </div>
            </div><!-- end ngIf: data.get('taxes').length > 0 -->
        </div>

        <hr>
    </div><!-- end ngIf: transaction.type.isReceived() -->
            <div class="row">
                
                <div class="form-group col-md-6">
                    <label>
                        العملة
                        <popover content="العملة الفعلية التي تم إتمام عملية الدفع بها" class="ng-isolate-scope"><i uib-popover="العملة الفعلية التي تم إتمام عملية الدفع بها" popover-title="" popover-trigger="'mouseenter'" popover-placement="" class="popover-hint fa fa-question-circle"></i></popover>
                    </label>
                    <select ng-model="transaction.info.currency" ng-options="iso as label for (iso, label) in data.get('currencies')" ng-disabled="amount.currencyConversion.inProgress() || transaction.method.selected.isBalance() || items.selected.isBalanceRecharge()" ng-change="transaction.currency.onChange()" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty"><option label="SAR - ريال سعودي" value="string:SAR">SAR - ريال سعودي</option><option label="EGP - جنيه مصري" value="string:EGP" selected="selected">EGP - جنيه مصري</option><option label="USD - دولار أمريكي" value="string:USD">USD - دولار أمريكي</option><option label="AED - ديرهم إماراتي" value="string:AED">AED - ديرهم إماراتي</option><option label="DZD - دينار جزائري" value="string:DZD">DZD - دينار جزائري</option><option label="BHD - دينار بحريني" value="string:BHD">BHD - دينار بحريني</option><option label="CAD - دولار كندي" value="string:CAD">CAD - دولار كندي</option><option label="INR - روبية هندي" value="string:INR">INR - روبية هندي</option><option label="IDR - روبية إندونيسية" value="string:IDR">IDR - روبية إندونيسية</option><option label="IQD - دينار عراقي" value="string:IQD">IQD - دينار عراقي</option><option label="JOD - دينار أردني" value="string:JOD">JOD - دينار أردني</option><option label="KWD - دينار كويتي" value="string:KWD">KWD - دينار كويتي</option><option label="LBP - جنيه لبناني" value="string:LBP">LBP - جنيه لبناني</option><option label="LYD - دينار ليبي" value="string:LYD">LYD - دينار ليبي</option><option label="MAD - ديرهم مغربي" value="string:MAD">MAD - ديرهم مغربي</option><option label="OMR - ريال عماني" value="string:OMR">OMR - ريال عماني</option><option label="QAR - ريال قطري" value="string:QAR">QAR - ريال قطري</option><option label="SYP - جنيه سوري" value="string:SYP">SYP - جنيه سوري</option><option label="TND - دينار تونسي" value="string:TND">TND - دينار تونسي</option><option label="TRY - ليرة تركية" value="string:TRY">TRY - ليرة تركية</option><option label="GBP - جنيه إسترليني" value="string:GBP">GBP - جنيه إسترليني</option><option label="YER - ريال يمني" value="string:YER">YER - ريال يمني</option><option label="SDG - جنيه سوداني" value="string:SDG">SDG - جنيه سوداني</option></select>
                </div>

                
                <div class="form-group col-md-6">
                    <label>طريقة الدفع</label>
                    <select ng-model="transaction.info.method" ng-change="transaction.method.onSelect()" ng-options="method.name as method.label for method in data.get('paymentMethods')" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty ng-valid-required" required=""><option label="Cash" value="string:cash" selected="selected">Cash</option><option label="Credit card" value="string:credit-card">Credit card</option><option label="Cheque" value="string:cheque">Cheque</option><option label="Bank transfer/deposit" value="string:bank">Bank transfer/deposit</option><option label="Online Payment" value="string:online">Online Payment</option><option label="Balance withdrawal" value="string:balance">Balance withdrawal</option></select>
                </div>
            </div>

            
            <div class="form-group">
                <label>
                    العنوان
                    ( خياري )</label>

                <div class="input-group">
                    <input ng-model="transaction.info.label" type="text" class="form-control ng-pristine ng-untouched ng-valid ng-empty">
                    <span class="input-group-btn">
                        <button ng-click="transaction.label.generate()" type="button" class="btn btn-default icon-only">
                            <i class="fa fa-lightbulb-o"></i>
                        </button>
                    </span>
                </div>
            </div>

            <div class="row">
                
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label>
                            وقت الدفع
                            <popover content="الوقت الفعلي لعملية الدفع" class="ng-isolate-scope"><i uib-popover="الوقت الفعلي لعملية الدفع" popover-title="" popover-trigger="'mouseenter'" popover-placement="" class="popover-hint fa fa-question-circle"></i></popover>
                        </label>
                        <input datetime-picker="transaction.time.picker.options" datetime-model="transaction.info.time" datetime-picker-api="transaction.time.picker.api" ng-disabled="transaction.method.selected.isBalance()" class="form-control ng-isolate-scope" dir="ltr" required="">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group">
                    	<label>
                            كود الإيصال

                            <!-- ngIf: !setup.receiptSerialMandatory && transaction.type.isReceived() --><span ng-if="!setup.receiptSerialMandatory &amp;&amp; transaction.type.isReceived()" class="ng-scope">&nbsp;( خياري )</span><!-- end ngIf: !setup.receiptSerialMandatory && transaction.type.isReceived() -->
                            <!-- ngIf: setup.receiptSerialMandatory && transaction.type.isReceived() -->
                        </label>
                    	<input ng-model="transaction.info.receipt_serial" ng-required="setup.receiptSerialMandatory &amp;&amp; transaction.type.isReceived()" name="receiptSerial" class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-required">
                    </div>
                </div>
            </div>

            
            <div class="form-group">
                <label>ملحوظات ( خياري )</label>
                <textarea ng-model="transaction.info.note" rows="3" class="form-control ng-pristine ng-untouched ng-valid ng-empty"></textarea>
            </div>

            
            <div class="small margin-top-15">
                <!-- ngIf: transaction.type.isReceived() --><div ng-if="transaction.type.isReceived()" class="ng-scope">
                    <a ng-click="transaction.cashBillsCodes.set()" href="">إدخال ارقام الأوراق المالية</a>

                    <!-- ngIf: transaction.cashBillsCodes.isSet() -->
                </div><!-- end ngIf: transaction.type.isReceived() -->
            </div>
        </div>
    </div>                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                            <div id="receipt" class="border-info">
        <dl>
            <!-- ngIf: transaction.type.isPaid() -->
            <!-- ngIf: transaction.type.isReceived() --><dt ng-if="transaction.type.isReceived()" class="ng-scope">المبلغ الأصلي</dt><!-- end ngIf: transaction.type.isReceived() -->
            <dd>
                <div class="form-group">

                    <input ng-model="amount.amount" ng-model-options="{'debounce': 500}" ng-change="amount.onAmountChange()" lang="en_US" ng-class="{'invalid': newTransactionForm.amount.$invalid}" only-digits="" dir="ltr" type="text" name="amount" autocomplete="off" class="amount ng-pristine ng-untouched ng-valid ng-not-empty ng-valid-required" required="">

                    <span class="currency">EGP</span>
                </div>
            </dd>

            
            <!--
            <div ng-if="amount.currencyConversion.needed()">
                <dt>يُحول إلى</dt>

                
                <dd ng-if="amount.currencyConversion.inProgress()">
                    جاري تحويل العملة ...                </dd>

                <dd ng-if="amount.currencyConversion.done()">
                    <h4>{{ amount.currencyConversion.resultAmount | money }} {{ transaction.info.currency }}</h4>
                    <div class="text-muted small">
                        سعر الصرف: <b>{{ amount.currencyConversion.exchangeRate | money }}</b>
                    </div>
                </dd>
            </div>
            -->

            
            <!-- ngIf: amount.discount.isSet() -->

            
            <!-- ngIf: transaction.type.isReceived() --><ng-container ng-if="transaction.type.isReceived()" class="ng-scope">
                <dt>
                    الضريبة

                    <!-- ngIf: !amount.taxes.adding.added -->
                    <!-- ngIf: amount.taxes.adding.added --><span ng-if="amount.taxes.adding.added" class="ng-scope">
                        ─ مضافة</span><!-- end ngIf: amount.taxes.adding.added -->
                </dt>
                <dd>
                    <!-- ngIf: !amount.taxes.hasAny() --><span ng-if="!amount.taxes.hasAny()" class="ng-scope">--</span><!-- end ngIf: !amount.taxes.hasAny() -->
                    <!-- ngIf: amount.taxes.hasAny() -->
                </dd>
            </ng-container><!-- end ngIf: transaction.type.isReceived() -->

            
            <!--
            <div ng-if="transaction.type.isReceived() && amount.taxes.hasAny()">
                <dt>بعد الضرائب</dt>
                <dd>
                    <h4>
                        {{ amount.getAmountAfterTax() | money }} EGP
                    </h4>
                </dd>
            </div>
            -->

            
            <!-- ngIf: transaction.type.isReceived() && payingParty.info.isSet() -->

            <hr>

            <ng-container>
                <dt>المبلغ النهائي</dt>

                
                <!-- ngIf: amount.currencyConversion.inProgress() -->

                <!-- ngIf: !amount.currencyConversion.inProgress() --><dd ng-if="!amount.currencyConversion.inProgress()" class="ng-scope">
                    <h3 class="text-strong inline ng-binding" dir="ltr">
                        <b class="finalAmount ng-binding ng-isolate-scope" highlight-on-change="amount.getFinalAmount()">
                            0.00
                        </b>

                        EGP
                    </h3>

                    <!-- ngIf: amount.currencyConversion.done() -->
                </dd><!-- end ngIf: !amount.currencyConversion.inProgress() -->
            </ng-container>
        </dl>
    </div>                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-offset-1 col-md-8">
                            <div class="row">
                                <div class="col-md-offset-5 col-md-7">
                                    <button ng-click="creation.create()" ng-disabled="newTransactionForm.$invalid || !amount.isSet()" disable-on-ajax="" type="submit" class="btn btn-primary disabled" disabled="">
                                        <i class="fa fa-check-circle"></i>
                                        إضافة المعاملة الجديدة                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div><!-- end ngIf: data.loaded() -->

            
            <script type="text/ng-template" id="services.pickByTrainee.html">
                <div class="modal-header">
                    <button ng-click="$close()" type="button" class="close">
                        <span>&times;</span>
                    </button>

                    <h4 class="modal-title">بحث</h4>
                </div>

                <div class="modal-body">
                    <client-search-input setup="setup"></client-search-input>
                </div>
            </script>

            <script type="text/ng-template" id="cashBillsCodes.html">
                <div class="modal-header">
        <button ng-click="$close()" type="button" class="close">
            <span>&times;</span>
        </button>

        <h4 class="modal-title">
            ارقام الأوراق المالية
        </h4>
    </div>

    <form name="form">
        <div class="modal-body">
            <p class="small">
                من هنا يمكنك إرفاق ارقام العملات المالية المدفوعة لحفظها مع عملية الدفع، لتتمكن من
					تتبع أي اموال مزورة تم استلامها.            </p>

            <list-manager ng-model="items"></list-manager>
        </div>

        <div class="modal-footer">
            <button ng-click="save()" ng-disabled="form.$invalid && items.length == 0"
                    type="submit" class="btn btn-primary">
                <i class="fa fa-check"></i> حفظ
            </button>

            <button ng-click="$close()" type="button" class="btn btn-default">
                <i class="fa fa-remove"></i> إلغاء
            </button>
        </div>
    </form>            </script>

            <!--
            <audio id="cashRegisterSound">
                <source src="/sounds/cash-register.mp3" type="audio/mpeg">
            </audio>
            -->
        </div>

            </div>
</div>


<?php
// تضمين footer template
include_once __DIR__ . '/../../templates/footer.php';
?>
