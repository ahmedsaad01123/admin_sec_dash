<?php
// إعداد المتغيرات
$pageTitle = 'تتبع الأقساط';
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
            <i class="icon fa fa-money"></i>
            <span class="title">الطلبات</span>

                            
                <ul class="breadcrumb inline" style="margin: 0">
                    <li class="breadcrumb-item"></li>

                                            <li class="breadcrumb-item">تتبع الأقساط</li>
                                    </ul>
                    </div>

        <div class="d-flex justify-content-center">
            <div>
                
                            </div>
        </div>
    </div>
    <div ng-app="app" ng-controller="controller" class="ng-scope">
        <style>
            .installment-tracking .stat-value {
                font-size: 28px;
                font-weight: 500;
                line-height: 1.2;
                margin-bottom: 5px;
            }
            .installment-tracking .stat-label {
                font-size: 13px;
            }
            .installment-tracking tr.paid td {
                background-color: #dff0d8 !important;
            }
            .installment-tracking tr.overdue td {
                background-color: #fcf8e3 !important;
            }
        </style>

        <div class="installment-tracking">
            <div class="row">
                <!-- Filters Column -->
                <div class="col-md-3">
                    <div class="block style2">
                        <div class="block-body">
                            <!-- Status Filter -->
                            <div class="form-group">
                                <label>الحالة</label>
                                <div class="btn-group btn-group-justified">
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-primary" ng-class="installments.getParam('status').value.is('all') ? 'btn-primary' : 'btn-default'" ng-click="installments.getParam('status').setValue('all')">
                                            الكل
                                        </button>
                                    </div>
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-default" ng-class="installments.getParam('status').value.is('upcoming') ? 'btn-primary' : 'btn-default'" ng-click="installments.getParam('status').setValue('upcoming')">
                                            قادمة
                                        </button>
                                    </div>
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-default" ng-class="installments.getParam('status').value.is('due_now') ? 'btn-primary' : 'btn-default'" ng-click="installments.getParam('status').setValue('due_now')">
                                            مستحقة الآن
                                        </button>
                                    </div>
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-default" ng-class="installments.getParam('status').value.is('overdue') ? 'btn-primary' : 'btn-default'" ng-click="installments.getParam('status').setValue('overdue')">
                                            متأخرة
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Installment Type Filter -->
                            <div class="form-group">
                                <label>نوع القسط</label>
                                <div class="btn-group btn-group-justified">
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-primary" ng-class="installments.getParam('installmentType').value.is('all') ? 'btn-primary' : 'btn-default'" ng-click="installments.getParam('installmentType').setValue('all')">
                                            الكل
                                        </button>
                                    </div>
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-default" ng-class="installments.getParam('installmentType').value.is('regular') ? 'btn-primary' : 'btn-default'" ng-click="installments.getParam('installmentType').setValue('regular')">
                                            عادي
                                        </button>
                                    </div>
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-default" ng-class="installments.getParam('installmentType').value.is('custom') ? 'btn-primary' : 'btn-default'" ng-click="installments.getParam('installmentType').setValue('custom')">
                                            مخصص
                                        </button>
                                    </div>
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-default" ng-class="installments.getParam('installmentType').value.is('retention') ? 'btn-primary' : 'btn-default'" ng-click="installments.getParam('installmentType').setValue('retention')">
                                            استبقاء
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Order Search Filter -->
                            <div class="form-group">
                                <label>تصفية الطلبات</label>
                                <div>
                                    <order-search-filter dataloader-param="installments.getParam('orderFilter')" class="ng-isolate-scope">
                <button type="button" class="btn btn-default" ng-click="openDialog()" ng-class="{'btn-info': hasActiveFilters(), 'btn-default': !hasActiveFilters()}">
                    <i class="fa fa-shopping-cart"></i>
                    <span ng-bind="trans('order_filter.button_label')" class="ng-binding">الطلبات</span>
                    <!-- ngIf: hasActiveFilters() -->
                </button>
            </order-search-filter>
                                </div>
                            </div>

                            <!-- Due Date Filter -->
                            <div class="form-group">
                                <label>تاريخ الاستحقاق</label>
                                <div class="timeSpanSelectorWidget ng-isolate-scope" dataloader-param="installments.getParam('dueDate')" options="{'acceptEmpty': true, 'span': null}">
        <div ng-show="['fromTo', 'date', 'beforeDate'].indexOf(choices.span) &lt; 0" class="form-group margin-bottom-0">
            <select ng-model="choices.span" ng-options="option.span as option.label for option in data.spans" class="form-control ng-pristine ng-untouched ng-valid ng-empty"><!-- ngIf: options.acceptEmpty === true --><option ng-if="options.acceptEmpty === true" value="" class="" selected="selected">&nbsp;</option><!-- end ngIf: options.acceptEmpty === true --><option label="اليوم" value="string:today">اليوم</option><option label="البارحة" value="string:yesterday">البارحة</option><option label="غداً" value="string:tomorrow">غداً</option><option label="هذا الإسبوع" value="string:thisWeek">هذا الإسبوع</option><option label="الإسبوع السابق" value="string:lastWeek">الإسبوع السابق</option><option label="هذا الشهر" value="string:thisMonth">هذا الشهر</option><option label="الشهر المنقضي" value="string:lastMonth">الشهر المنقضي</option><option label="تاريخ محدد" value="string:date">تاريخ محدد</option><option label="قبل تاريخ" value="string:beforeDate">قبل تاريخ</option><option label="من ... إلى" value="string:fromTo">من ... إلى</option><option label="من البداية" value="string:allTime">من البداية</option></select>
        </div>

        <!-- ngIf: choices.span === 'fromTo' -->

        <!-- ngIf: choices.span === 'date' -->

        <!-- ngIf: choices.span === 'beforeDate' -->
    </div>
                            </div>
                            
                            <!-- Amount Filter -->
                            <div class="form-group">
                                <label>المبلغ</label>
                                <div class="input-group">
                                    <span class="input-group-btn" style="width: 60px">
                                        <select class="form-control ng-isolate-scope" dataloader-param-model="installments.getParam('amountOp')">
                                            <option value="&gt;">&gt;</option>
                                            <option value="&lt;">&lt;</option>
                                            <option value="=">=</option>
                                        </select>
                                    </span>
                                    <input type="number" class="form-control ng-isolate-scope" style="max-width: 100px" dataloader-param-model="installments.getParam('amount')">
                                </div>
                            </div>

                            <hr class="dashed">

                            <!-- Client Filter -->
                            <div class="form-group">
                                <label>العميل</label>

                                <!-- ngIf: installments.getParam('clientId').value.isNotEmpty() -->

                                <!-- ngIf: installments.getParam('clientId').value.isEmpty() --><client-search-input ng-if="installments.getParam('clientId').value.isEmpty()" dataloader-param="installments.getParam('clientId')" class="ng-scope ng-isolate-scope">
    <div ng-class="{'widget-large': setup.largeInput, 'widget-small': !setup.largeInput, 'withNewClientOption': setup.newClientOption}" class="typeaheadWidget clientSearchInputWidget widget-small">

        <!--The loading indicator-->
        <!-- ngIf: searching -->

        <!--The input-->
        <div ng-class="{'input-group': newClientOption.available}">
            <input ng-model="name" uib-typeahead="client.id as client.name for client in search($viewValue)" typeahead-min-length="setup.minLength" typeahead-wait-ms="700" typeahead-on-select="select($item, $model, $label)" typeahead-loading="searching" typeahead-no-results="noResults" typeahead-template-url="clientOption.html" ng-class="{'input-lg': setup.largeInput}" type="text" class="form-control search-input  ng-empty" placeholder="بحث بالإسم او الرقم او البريد الإلكتروني ..." autocomplete="off" aria-autocomplete="list" aria-expanded="false" aria-owns="typeahead-27-2276"><ul class="dropdown-menu ng-isolate-scope ng-hide" ng-show="isOpen() &amp;&amp; !moveInProgress" ng-style="{top: position().top+'px', left: position().left+'px'}" role="listbox" aria-hidden="true" uib-typeahead-popup="" id="typeahead-27-2276" matches="matches" active="activeIdx" select="select(activeIdx, evt)" move-in-progress="moveInProgress" query="query" position="position" assign-is-open="assignIsOpen(isOpen)" debounce="debounceUpdate" template-url="clientOption.html">
    <!-- ngRepeat: match in matches track by $index -->
</ul>

            <!-- ngIf: newClientOption.available -->
        </div>

        <!--Messages-->
        <!-- ngIf: noResults -->
    </div>

    <script type="text/ng-template" id="clientOption.html">
        <a href="" class="d-flex flex-row flex-gap-10">
            <div>
                <img src="{{ match.model.picture_url }}" alt="" class="clientPicture small circle"/>
            </div>

            <div>
                <span ng-bind-html="match.label | uibTypeaheadHighlight:query"></span>

                <ul ng-show="match.model.national_id || match.model.phone_number" class="list-inline details margin-top-5">
                    <li ng-if="match.model.trashed">
                        <label class="label label-danger">DELETED</label>
                    </li>

                    <li ng-if="match.model._fromAnotherBranch">
                        <span class="label label-warning">{{ match.model.branch.name | cut:12 }}</span>
                    </li>

                    <li class="text-strong">{{ match.model.public_id }}</li>

                    <li ng-if="match.model.current_path">{{ match.model.current_path.name }}</li>

                    <li>{{ match.model.phone_number || '--' }}</li>
                </ul>
            </div>
        </a>
    </script>
</client-search-input><!-- end ngIf: installments.getParam('clientId').value.isEmpty() -->
                            </div>

                            <!-- Time Slots Filter -->
                            <div class="form-group">
                                <label>أوقات التدريب</label>
                                <time-slots-selector dataloader-param="installments.getParam('timeSlotIds')" options="{'returnIdsOnly': true, 'multiple': true}" class="ng-isolate-scope">
    <div class="time-slots-selector">
        <div ng-show="selected.length &gt; 0" class="pills small ng-hide">
            <!-- ngRepeat: slot in selected -->

            <div>
                <button ng-click="openSelector()" class="btn btn-sm ng-binding" type="button">
                    <i class="fa fa-refresh"></i> تغيير
                </button>
            </div>
        </div>

        <button ng-show="! selected.length" ng-click="openSelector()" disable-on-ajax="" ng-icon="clock-o" class="btn btn-default" type="button"><i class="fa fa-clock-o"></i>
            <!-- ngIf: options.multiple --><span ng-if="options.multiple" class="ng-binding ng-scope">إختيار المواعيد</span><!-- end ngIf: options.multiple -->
            <!-- ngIf: ! options.multiple -->
        </button>
    </div>
</time-slots-selector>
                            </div>

                            <!-- Client Tags Filter -->
                            <div class="form-group mb-0">
                                <label>تصنيفات العملاء</label>
                                <div class="tags-menu pills align-items-center ng-isolate-scope" type="clients" dataloader-param="installments.getParam('clientTagIds')">
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
                        <div class="block-footer">
                            <button class="btn btn-primary" ng-click="installments.filter()" ng-disabled="installments.isLoading()">
                                <i class="fa fa-search"></i>
                                تطبيق التصفية
                            </button>
                            <!-- ngIf: installments.isFilteringOn() -->
                        </div>
                    </div>
                </div>

                <!-- Results Column -->
                <div class="col-md-9">
                    <!-- Summary Boxes -->
                    <!-- ngIf: !installments.isLoading() && summary --><div class="block style2 mb-15 ng-scope" ng-if="!installments.isLoading() &amp;&amp; summary">
                        <div class="block-body d-flex justify-content-center align-items-center">
                            <div class="d-flex text-center flex-gap-20">
                                <div class="d-flex flex-gap-20 border-end pe-20">
                                    <div class="stat-box">
                                        <div class="stat-value text-primary ng-binding">0</div>
                                        <div class="stat-label text-muted">الأقساط</div>
                                    </div>
                                    <div class="stat-box">
                                        <div class="stat-value text-danger ng-binding">0</div>
                                        <div class="stat-label text-muted">عدد المتأخرة</div>
                                    </div>
                                </div>
                                <div class="d-flex flex-gap-20">
                                    <div class="stat-box">
                                        <div class="stat-value ng-binding">0 <span class="small text-muted ng-binding">EGP</span></div>
                                        <div class="stat-label text-muted">المبلغ الإجمالي</div>
                                    </div>
                                    <div class="stat-box">
                                        <div class="stat-value text-success ng-binding">0 <span class="small text-muted ng-binding">EGP</span></div>
                                        <div class="stat-label text-muted">إجمالي المدفوع</div>
                                    </div>
                                    <div class="stat-box">
                                        <div class="stat-value text-info ng-binding">0 <span class="small text-muted ng-binding">EGP</span></div>
                                        <div class="stat-label text-muted">إجمالي غير المدفوع</div>
                                    </div>
                                    <div class="stat-box">
                                        <div class="stat-value text-warning ng-binding">0 <span class="small text-muted ng-binding">EGP</span></div>
                                        <div class="stat-label text-muted">إجمالي المتأخر</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngIf: !installments.isLoading() && summary -->

                    <!-- Results Table -->
                    <div class="block style2">
                        <div class="block-title d-flex justify-content-between align-items-center">
                            <div>
                                <span class="title">الأقساط</span>
                                <span class="badge ng-binding">0</span>
                            </div>
                            
                            <div class="d-flex align-items-center flex-gap-10">
                                <button class="btn btn-default btn-sm" ng-click="exportToExcel()">
                                    <i class="fa fa-download m-0"></i>
                                </button>
                            </div>
                        </div>

                        <div class="block-body p-0">
                            <!-- Loading -->
                            <!-- ngIf: installments.isLoading() -->

                            <!-- Empty State - No filters applied -->
                            <!-- ngIf: !installments.isLoading() && installments.isEmpty() && !installments.isFilteringOn() --><div ng-if="!installments.isLoading() &amp;&amp; installments.isEmpty() &amp;&amp; !installments.isFilteringOn()" class="p-20 text-center ng-scope">
                                <i class="fa fa-calendar-check-o fa-3x text-muted"></i>
                                <p class="mt-15 text-muted">لا توجد أقساط في الفترة المحددة.</p>
                            </div><!-- end ngIf: !installments.isLoading() && installments.isEmpty() && !installments.isFilteringOn() -->

                            <!-- Empty State - Filters applied -->
                            <!-- ngIf: !installments.isLoading() && installments.isEmpty() && installments.isFilteringOn() -->

                            <!-- Installments Table -->
                            <!-- ngIf: !installments.isLoading() && !installments.isEmpty() -->
                        </div>

                        <!-- Pagination -->
                        <!-- ngIf: installments.pagination.showControls() -->
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
