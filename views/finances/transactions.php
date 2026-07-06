<?php
// إعداد المتغيرات
$pageTitle = 'المعاملات المالية';
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

                                            <li class="breadcrumb-item">المعاملات المالية</li>
                                    </ul>
                    </div>

        <div class="d-flex justify-content-center">
            <div>
                        <a href="/reports#finances" class="btn btn-xs btn-default">
            <i class="fa fa-print"></i> التقارير
        </a>
    
                            </div>
        </div>
    </div>
        
        <div ng-app="transactionsApp" ng-controller="mainController" class="ng-scope">
            <dismissible-hint name="finances.transactions" class="ng-isolate-scope">
    <!-- ngIf: visible --><div ng-if="visible" class="dismissibleHint  d-flex flex-gap-15 align-items-center justify-content-between">
        <div class="d-flex flex-gap-20 align-items-center flex-grow-1">
            <!-- ngIf: icon || img --><div ng-if="icon || img" class="iconHolder hidden-xs ng-scope">
                <!-- ngIf: img -->
                <!-- ngIf: icon --><span ng-if="icon" class="ms icon ng-binding ng-scope">info</span><!-- end ngIf: icon -->
            </div><!-- end ngIf: icon || img -->

            <div class="content flex-grow-1">
                <ng-transclude>
                هنا يمكنك فلترة والبحث في كافة المعاملات المالية التي تم تسجيلها يوماً على النظام. ابدأ باختيار
		نوع المعاملات التي تريد عرضه، ويمكنك تخصيص البحث أكثر باختيار بنود مالية محددة، أو باستخدام اي من الخيارات
		الأخرى.
            </ng-transclude>
            </div>
        </div>

        <div>
            <!-- ngIf: dismissible --><button ng-click="dismiss()" ng-if="dismissible" class="close ng-scope" type="button">
                <span>×</span>
            </button><!-- end ngIf: dismissible -->
        </div>
    </div><!-- end ngIf: visible --></dismissible-hint>

            <!-- ngIf: data.loaded --><form name="searchForm" ng-if="data.loaded" id="filters" class="block style2 ng-pristine ng-valid ng-scope">
        <div class="block-body">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 column-bordered">
                    <div>
                        
                        <div class="form-group">
                            <label>النوع</label>
                            <select ng-model="filtering.params.type" ng-options="type.name as type.label for type in data.transactionTypes" ng-change="filtering.type.onSelect()" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty"><option label="وارد (ربح)" value="string:received">وارد (ربح)</option><option label="صادر (صرف)" value="string:paid">صادر (صرف)</option><option label="الوارد والصادر" value="string:both" selected="selected">الوارد والصادر</option></select>
                        </div>

                        
                        <div class="form-group">
        <button ng-click="filtering.items.toggleSelectAll()" type="button" class="btn btn-xs btn-link onSide">
            اختيار الكل
        </button>

        <label>
            البنود
            <popover content="إختر البنود المالية التي تريد عرض المعاملات الخاصة بها" class="ng-isolate-scope"><i uib-popover="إختر البنود المالية التي تريد عرض المعاملات الخاصة بها" popover-title="" popover-trigger="'mouseenter'" popover-placement="" class="popover-hint fa fa-question-circle"></i></popover>
        </label>

        <div class="limitedHeightBox" style="min-height: 400px !important;">
            
            <!-- ngIf: !filtering.type.isBoth() -->

            
            <!-- ngIf: filtering.type.isBoth() --><div ng-if="filtering.type.isBoth()" class="ng-scope">
                <div>
                    <h4>
                        الواردة
                    </h4>
                    <!-- ngRepeat: i in data.items | filter:{'type': 'receivable'} --><div ng-repeat="i in data.items | filter:{'type': 'receivable'}" title="إستلام مدفوعات أحد المسارات التدريبية" class="checkbox ng-scope">
                        <label class="ng-binding">
                            <input checklist-value="i.id" type="checkbox" ng-model="checked" class="ng-scope ng-pristine ng-untouched ng-valid ng-not-empty" checklist-model="filtering.params.items"> إستلام مدفوعات أحد المسارات التدريبية
                            <!-- ngIf: !! i.deleted_at -->
                        </label>
                    </div><!-- end ngRepeat: i in data.items | filter:{'type': 'receivable'} --><div ng-repeat="i in data.items | filter:{'type': 'receivable'}" title="إستلام مدفوعات أحد المجموعات التدريبية" class="checkbox ng-scope">
                        <label class="ng-binding">
                            <input checklist-value="i.id" type="checkbox" ng-model="checked" class="ng-scope ng-pristine ng-untouched ng-valid ng-not-empty" checklist-model="filtering.params.items"> إستلام مدفوعات أحد المجموعات التدريبية
                            <!-- ngIf: !! i.deleted_at -->
                        </label>
                    </div><!-- end ngRepeat: i in data.items | filter:{'type': 'receivable'} --><div ng-repeat="i in data.items | filter:{'type': 'receivable'}" title="إستلام تكلفة أحد المنتجات" class="checkbox ng-scope">
                        <label class="ng-binding">
                            <input checklist-value="i.id" type="checkbox" ng-model="checked" class="ng-scope ng-pristine ng-untouched ng-valid ng-not-empty" checklist-model="filtering.params.items"> إستلام تكلفة أحد المنتجات
                            <!-- ngIf: !! i.deleted_at -->
                        </label>
                    </div><!-- end ngRepeat: i in data.items | filter:{'type': 'receivable'} --><div ng-repeat="i in data.items | filter:{'type': 'receivable'}" title="استلام مبلغ مقدم أو تحت الحساب" class="checkbox ng-scope">
                        <label class="ng-binding">
                            <input checklist-value="i.id" type="checkbox" ng-model="checked" class="ng-scope ng-pristine ng-untouched ng-valid ng-not-empty" checklist-model="filtering.params.items"> استلام مبلغ مقدم أو تحت الحساب
                            <!-- ngIf: !! i.deleted_at -->
                        </label>
                    </div><!-- end ngRepeat: i in data.items | filter:{'type': 'receivable'} --><div ng-repeat="i in data.items | filter:{'type': 'receivable'}" title="إضافة مبلغ للرصيد" class="checkbox ng-scope">
                        <label class="ng-binding">
                            <input checklist-value="i.id" type="checkbox" ng-model="checked" class="ng-scope ng-pristine ng-untouched ng-valid ng-not-empty" checklist-model="filtering.params.items"> إضافة مبلغ للرصيد
                            <!-- ngIf: !! i.deleted_at -->
                        </label>
                    </div><!-- end ngRepeat: i in data.items | filter:{'type': 'receivable'} --><div ng-repeat="i in data.items | filter:{'type': 'receivable'}" title="إستلام مدفوعات طلب تدريب" class="checkbox ng-scope">
                        <label class="ng-binding">
                            <input checklist-value="i.id" type="checkbox" ng-model="checked" class="ng-scope ng-pristine ng-untouched ng-valid ng-not-empty" checklist-model="filtering.params.items"> إستلام مدفوعات طلب تدريب
                            <!-- ngIf: !! i.deleted_at -->
                        </label>
                    </div><!-- end ngRepeat: i in data.items | filter:{'type': 'receivable'} --><div ng-repeat="i in data.items | filter:{'type': 'receivable'}" title="إستلام تكلفة حجز إختبار تحديد مستوى" class="checkbox ng-scope">
                        <label class="ng-binding">
                            <input checklist-value="i.id" type="checkbox" ng-model="checked" class="ng-scope ng-pristine ng-untouched ng-valid ng-not-empty" checklist-model="filtering.params.items"> إستلام تكلفة حجز إختبار تحديد مستوى
                            <!-- ngIf: !! i.deleted_at -->
                        </label>
                    </div><!-- end ngRepeat: i in data.items | filter:{'type': 'receivable'} -->
                </div>

                <hr>

                <div>
                    <h4>
                        الصادرة
                    </h4>
                    <!-- ngRepeat: i in data.items | filter:{'type': 'payable'} --><div ng-repeat="i in data.items | filter:{'type': 'payable'}" title="دفع مستحقات المدرب لأحد المجموعات" class="checkbox ng-scope">
                        <label class="ng-binding">
                            <input checklist-value="i.id" type="checkbox" ng-model="checked" class="ng-scope ng-pristine ng-untouched ng-valid ng-not-empty" checklist-model="filtering.params.items"> دفع مستحقات المدرب لأحد المجموعات
                            <!-- ngIf: !! i.deleted_at -->
                        </label>
                    </div><!-- end ngRepeat: i in data.items | filter:{'type': 'payable'} --><div ng-repeat="i in data.items | filter:{'type': 'payable'}" title="الدفع مقابل أحد مصاريف المجموعات" class="checkbox ng-scope">
                        <label class="ng-binding">
                            <input checklist-value="i.id" type="checkbox" ng-model="checked" class="ng-scope ng-pristine ng-untouched ng-valid ng-not-empty" checklist-model="filtering.params.items"> الدفع مقابل أحد مصاريف المجموعات
                            <!-- ngIf: !! i.deleted_at -->
                        </label>
                    </div><!-- end ngRepeat: i in data.items | filter:{'type': 'payable'} --><div ng-repeat="i in data.items | filter:{'type': 'payable'}" title="عملية إضافة لمخزون المنتجات" class="checkbox ng-scope">
                        <label class="ng-binding">
                            <input checklist-value="i.id" type="checkbox" ng-model="checked" class="ng-scope ng-pristine ng-untouched ng-valid ng-not-empty" checklist-model="filtering.params.items"> عملية إضافة لمخزون المنتجات
                            <!-- ngIf: !! i.deleted_at -->
                        </label>
                    </div><!-- end ngRepeat: i in data.items | filter:{'type': 'payable'} --><div ng-repeat="i in data.items | filter:{'type': 'payable'}" title="دفع مقدم أو مبلغ تحت الحساب" class="checkbox ng-scope">
                        <label class="ng-binding">
                            <input checklist-value="i.id" type="checkbox" ng-model="checked" class="ng-scope ng-pristine ng-untouched ng-valid ng-not-empty" checklist-model="filtering.params.items"> دفع مقدم أو مبلغ تحت الحساب
                            <!-- ngIf: !! i.deleted_at -->
                        </label>
                    </div><!-- end ngRepeat: i in data.items | filter:{'type': 'payable'} --><div ng-repeat="i in data.items | filter:{'type': 'payable'}" title="رد مبلغ مستلم سابقاً" class="checkbox ng-scope">
                        <label class="ng-binding">
                            <input checklist-value="i.id" type="checkbox" ng-model="checked" class="ng-scope ng-pristine ng-untouched ng-valid ng-not-empty" checklist-model="filtering.params.items"> رد مبلغ مستلم سابقاً
                            <!-- ngIf: !! i.deleted_at -->
                        </label>
                    </div><!-- end ngRepeat: i in data.items | filter:{'type': 'payable'} -->
                </div>
            </div><!-- end ngIf: filtering.type.isBoth() -->
        </div>
    </div>                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <div>
                        
                        <div class="row ng-binding">
                            

    <div class="col-xs-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>
                جهة الدفع
            </label>

            <select ng-model="payingParty.selectedType.type" ng-change="payingParty.selectedType.onSelect()" class="form-control ng-pristine ng-untouched ng-valid ng-empty">
                <option value="" selected="selected">&nbsp;</option>
                <option ng-value="'client'" value="string:client">العميل</option>
                                    <option ng-value="'lead'" value="string:lead">العميل المحتمل</option>
                                <option ng-value="'company'" value="string:company">الشركة</option>
            </select>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-4">
        
        <!-- ngIf: payingParty.selectedType.isClient() -->

        
        <!-- ngIf: payingParty.selectedType.isLead() -->

        
        <!-- ngIf: payingParty.selectedType.isCompany() -->
    </div>
                        </div>

                        <hr>

                        
                        <div class="row ng-binding">
                            

    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label>جهة استلام الدفع</label>
            <select ng-model="receivingParty.selectedType.type" ng-options="type.name as type.label for type in data.receivingPartyTypes" ng-change="receivingParty.selectedType.onSelect()" class="form-control ng-pristine ng-untouched ng-valid ng-empty"><option value="" class="" selected="selected">&nbsp;</option><option label="مدرب" value="string:instructor">مدرب</option><option label="مقدم خدمة Vendor" value="string:vendor">مقدم خدمة Vendor</option><option label="غير مسجل" value="string:unregistered">غير مسجل</option></select>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        
        <!-- ngIf: receivingParty.selectedType.isInstructor() -->

        
        <!-- ngIf: receivingParty.selectedType.isVendor() -->

        
        <!-- ngIf: receivingParty.selectedType.isUnregistered() -->
    </div>
                        </div>

                        <hr>
                    </div>

                    <div class="row">
                        
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 column-bordered">
                            <div class="form-group">
                                <label>
                                    وقت العمليات
                                </label>
                                <div class="timeSpanSelectorWidget ng-isolate-scope" setter="filtering.timeRange.setter" is-valid="filtering.timeRange.isValid" options="filtering.timeRange.options">
        <div ng-show="['fromTo', 'date', 'beforeDate'].indexOf(choices.span) &lt; 0" class="form-group margin-bottom-0">
            <select ng-model="choices.span" ng-options="option.span as option.label for option in data.spans" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty"><!-- ngIf: options.acceptEmpty === true --><option label="اليوم" value="string:today" selected="selected">اليوم</option><option label="البارحة" value="string:yesterday">البارحة</option><option label="غداً" value="string:tomorrow">غداً</option><option label="هذا الإسبوع" value="string:thisWeek">هذا الإسبوع</option><option label="الإسبوع السابق" value="string:lastWeek">الإسبوع السابق</option><option label="هذا الشهر" value="string:thisMonth">هذا الشهر</option><option label="الشهر المنقضي" value="string:lastMonth">الشهر المنقضي</option><option label="تاريخ محدد" value="string:date">تاريخ محدد</option><option label="قبل تاريخ" value="string:beforeDate">قبل تاريخ</option><option label="من ... إلى" value="string:fromTo">من ... إلى</option><option label="من البداية" value="string:allTime">من البداية</option></select>
        </div>

        <!-- ngIf: choices.span === 'fromTo' -->

        <!-- ngIf: choices.span === 'date' -->

        <!-- ngIf: choices.span === 'beforeDate' -->
    </div>
                            </div>
                        </div>

                        
                        
                        
                        <div class="col-xs-12 col-md-4 col-lg-4 column-bordered">
                            <div class="form-group">
                                <label>المجموعة التدريبية المرتبطة</label>

                                
                                <batch-picker setup="filtering.batch.picker.setup" class="ng-isolate-scope"><div ng-class="setup.containerClass" class="batch-picker-widget ng-scope">
        
        <!-- ngIf: setup.multiple && selectedBatches.length > 0 -->

        
        <!-- ngIf: !setup.multiple && selectedBatch -->

        
        <!-- ngIf: setup.multiple || ! hasSelection() --><div ng-if="setup.multiple || ! hasSelection()" class="ng-scope">
            
            <!-- ngIf: activeBatches.length == 0 -->

            
            <!-- ngIf: activeBatches.length > 0 --><div ng-if="activeBatches.length &gt; 0" class="ng-scope">
                <div class="d-flex flex-gap-10 align-items-center">
                    
                    <!-- ngIf: !setup.multiple --><select ng-if="!setup.multiple" class="form-control has-groups ng-pristine ng-untouched ng-valid ng-scope ng-empty" ng-model="pickedBatch" ng-change="pickFromActiveMenu(pickedBatch)" ng-options="batch as batch.name group by groupByCourseName(batch) for batch in activeBatches track by batch.id"><option value="" class="" selected="selected">اختر مجموعة...</option><optgroup label="General English - Level 1"><option label="General English - Level 1 #1" value="1">General English - Level 1 #1</option></optgroup></select><!-- end ngIf: !setup.multiple -->

                    
                    <!-- ngIf: setup.multiple -->

                    <button type="button" class="btn btn-default" uib-tooltip="بحث متقدم" ng-click="openSearchDialog()" disable-on-ajax="">
                        <i class="fa fa-search m-0"></i>
                    </button>
                </div>

                <!-- ngIf: setup.multiple === true -->
            </div><!-- end ngIf: activeBatches.length > 0 -->
        </div><!-- end ngIf: setup.multiple || ! hasSelection() -->
    </div>
</batch-picker>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        
                        
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 column-bordered">
                            <div class="form-group">
                                <label>
                                    المبلغ
                                    <popover content="حدد المبلغ وإختر علامة المقارنة (&gt;, &lt;, = ...)" class="ng-isolate-scope"><i uib-popover="حدد المبلغ وإختر علامة المقارنة (&gt;, &lt;, = ...)" popover-title="" popover-trigger="'mouseenter'" popover-placement="" class="popover-hint fa fa-question-circle"></i></popover>
                                </label>

                                <div class="input-group">
                                        <span id="amountOperator" ng-click="filtering.amount.switchOperator()" class="input-group-addon ng-binding">
                                            &gt;=
                                        </span>

                                    <input ng-model="filtering.params.amount" only-digits="" class="form-control ng-pristine ng-untouched ng-valid ng-empty">
                                </div>
                            </div>
                        </div>

                        
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label>العنوان</label>
                                <input ng-model="filtering.params.label" class="form-control ng-pristine ng-untouched ng-valid ng-empty">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        
                                                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 column-bordered">
                                <div class="form-group">
                                    <label>قام بالإضافة</label>
                                    <select ng-model="filtering.params.by" ng-options="user.id as user.name for user in data.users" class="form-control ng-pristine ng-untouched ng-valid ng-empty"><option value="" class="" selected="selected">&nbsp;</option><option label="Super Administrator" value="number:1">Super Administrator</option></select>
                                </div>
                            </div>
                        
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label>طريقة الدفع</label>
                                <select ng-model="filtering.params.method" ng-options="method.name as method.label for method in data.paymentMethods" class="form-control ng-pristine ng-untouched ng-valid ng-empty"><option value="" class="" selected="selected">&nbsp;</option><option label="Cash" value="string:cash">Cash</option><option label="Credit card" value="string:credit-card">Credit card</option><option label="Cheque" value="string:cheque">Cheque</option><option label="Bank transfer/deposit" value="string:bank">Bank transfer/deposit</option><option label="Online Payment" value="string:online">Online Payment</option><option label="Balance withdrawal" value="string:balance">Balance withdrawal</option></select>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label>الملحوظات</label>
                                <input type="text" class="form-control ng-pristine ng-untouched ng-valid ng-empty" ng-model="filtering.params.note">
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                    <!--
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 column-bordered">
                                <div class="form-group">
        <label>
            الضريبة
            <popover content="Use to find payments with specific tax(s)"></popover>
        </label>

        
        <div ng-if="data.taxes.length == 0" class="message-small">
            No taxes available to pick from
        </div>

        
        <div class="limitedHeightBox">
            <div ng-repeat="t in data.taxes">
                <label>
                    <input checklist-model="filtering.params.taxes"
                           checklist-value="t.id" type="checkbox"/>
                    {{ t.name }} (<b>{{ t.percentage }} %</b>)
                </label>
            </div>
        </div>
    </div>                            </div>
                            -->

                        <div class="col-xs-12 col-sm-12 col-md-5 column-bordered">
                            <div class="form-group">
                                <label>الوسوم</label>
                                <div class="tags-menu pills align-items-center ng-pristine ng-untouched ng-valid ng-isolate-scope ng-not-empty" type="transactions" ng-model="filtering.params.tagIds">
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
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-7">
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input ng-model="filtering.params.onlyWithDiscount" type="checkbox" class="ng-pristine ng-untouched ng-valid ng-empty">
                                        فقط المعاملات ذات الخصم
                                    </label>
                                </div>

                                                                    <div class="checkbox">
                                        <label>
                                            <input ng-model="filtering.params.onlyDeleted" type="checkbox" class="ng-pristine ng-untouched ng-valid ng-empty">
                                            عرض المعاملات المحزوفة فقط
                                        </label>
                                    </div>
                                                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="block-footer">
            <button ng-click="transactions.filter()" ng-disabled="! filtering.timeRange.isValid" type="submit" class="btn btn-primary">
                <i class="fa fa-search"></i> بحث
            </button>

            <!-- ngIf: filtering.on -->
        </div>
    </form><!-- end ngIf: data.loaded -->            <!-- ngIf: !transactions.loaded() -->

    
    <!-- ngIf: transactions.loaded() --><div ng-if="transactions.loaded()" class="block style2 primary ng-scope">
        <div class="block-title">
            <div class="side">
                                    <!-- ngIf: transactions.list.data.length > 0 -->
                            </div>

            <i class="icon fa fa-list"></i>

            <!-- ngIf: !filtering.on --><span ng-if="!filtering.on" class="title ng-scope">
                معاملات اليوم
            </span><!-- end ngIf: !filtering.on -->
            <!-- ngIf: filtering.on -->

            <span class="badge ng-binding">
                0  \  0
            </span>
        </div>

        <div class="block-body p-0">
            <!-- ngIf: !filtering.paramsSubmitted.onlyDeleted && filtering.paramsSubmitted.type != 'both' -->

            <!-- ngIf: !filtering.paramsSubmitted.onlyDeleted && filtering.paramsSubmitted.type == 'both' --><div ng-if="!filtering.paramsSubmitted.onlyDeleted &amp;&amp; filtering.paramsSubmitted.type == 'both'" class="row p-15 ng-scope">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="boxes boxes-center">
        
        <div class="box">
            <div class="title">
                المعاملات
            </div>
            <div class="value ng-binding">0</div>
        </div>

        
        <div class="box">
            <div class="title">إجمالي الوارد</div>
            <div class="value"><span class="text-info ng-binding">0.00</span></div>
        </div>

        
        <div class="box">
            <div class="title">إجمالي الصادر</div>
            <div class="value"><span class="text-warning ng-binding">0.00</span></div>
        </div>

        
        <div class="box">
            <div class="title">صافي الربح</div>
            <div class="value"><span class="text-success ng-binding">0.00</span></div>
        </div>
    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div id="totalsChart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
        <canvas class="chart chart-line ng-isolate-scope chartjs-render-monitor" chart-data="transactions.totalsChart.data" chart-labels="transactions.totalsChart.labels" chart-options="transactions.totalsChart.options" chart-colors="['#60c280', '#d9534f']" chart-dataset-override="datasetOverride" style="display: block; width: 1001px; height: 300px;" width="1001" height="300">
        </canvas>
    </div>
                </div>
            </div><!-- end ngIf: !filtering.paramsSubmitted.onlyDeleted && filtering.paramsSubmitted.type == 'both' -->

            
            <!-- ngIf: transactions.list.data.length == 0 && !filtering.on --><div ng-if="transactions.list.data.length == 0 &amp;&amp; !filtering.on" class="alert alert-info m-15 ng-scope">
                <i class="fa fa-info-circle"></i>
                لم يتم تسجيل اي معاملات مالية لليوم بعد.

                <div class="margin-top-15">
                    <a href="/finances/transactions/create" class="btn btn-sm btn-primary">
                        <i class="fa fa-plus-circle"></i>
                        إضافة معاملة جديدة
                    </a>
                </div>
            </div><!-- end ngIf: transactions.list.data.length == 0 && !filtering.on -->

            
            <!-- ngIf: transactions.list.data.length == 0 && filtering.on -->

            
            <!-- ngIf: transactions.list.data.length > 0 -->
        </div>
    </div><!-- end ngIf: transactions.loaded() -->
        </div>
            </div>
</div>

<?php
// تضمين footer template
include_once __DIR__ . '/../templates/footer.php';
?>
