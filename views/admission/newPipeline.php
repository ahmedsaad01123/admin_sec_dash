<?php
// إعداد المتغيرات
$pageTitle = 'مراحل التقديم';
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
            <i class="icon fa fa-filter"></i>
            <span class="title">التقديمات</span>

                            
                <ul class="breadcrumb inline" style="margin: 0">
                    <li class="breadcrumb-item"></li>

                                            <li class="breadcrumb-item">مراحل التقديم</li>
                                    </ul>
                    </div>

        <div class="d-flex justify-content-center">
            <div>
                
                            </div>
        </div>
    </div>
	<div ng-app="app" ng-controller="controller" class="ng-scope">

		
		
		
		<!-- ngIf: hasFlowTemplates === false --><div class="alert alert-warning ng-scope" ng-if="hasFlowTemplates === false">
			<i class="fa fa-exclamation-triangle"></i>
			لم يتم إنشاء أي خطوات تقديم بعد. يرجى إنشاء خطوات التقديم في <a href="/admin/settings/training">إعدادات التدريب</a> لتحديد الخطوات التي يجب أن يمر بها العملاء قبل التسجيل.
		</div><!-- end ngIf: hasFlowTemplates === false -->

		
		
		
		<!-- ngIf: flows === null -->

		
		
		
		<!-- ngIf: flows !== null --><div ng-if="flows !== null" class="ng-scope">
			<ul class="nav nav-tabs">
				<li ng-class="{'active': tabs.active === 'new_clients'}" class="active">
					<a href="" ng-click="tabs.active = 'new_clients'">
						<i class="icon fa fa-user-plus"></i>
						<span class="title">العملاء الجدد</span>
						<!-- ngIf: newClients.isLoaded() --><span class="badge ng-binding ng-scope" ng-if="newClients.isLoaded()">0</span><!-- end ngIf: newClients.isLoaded() -->
					</a>
				</li>

				<!-- ngRepeat: flow in flows -->
			</ul>

			<div class="tab-content">
				<div class="tab-pane active" ng-class="{'active': tabs.active === 'new_clients'}">
    <dismissible-hint name="admission.newPipeline.new_clients" class="ng-isolate-scope">
    <!-- ngIf: visible --><div ng-if="visible" class="dismissibleHint  d-flex flex-gap-15 align-items-center justify-content-between">
        <div class="d-flex flex-gap-20 align-items-center flex-grow-1">
            <!-- ngIf: icon || img --><div ng-if="icon || img" class="iconHolder hidden-xs ng-scope">
                <!-- ngIf: img -->
                <!-- ngIf: icon --><span ng-if="icon" class="ms icon ng-binding ng-scope">info</span><!-- end ngIf: icon -->
            </div><!-- end ngIf: icon || img -->

            <div class="content flex-grow-1">
                <ng-transclude>
        هؤلاء هم العملاء الجدد الذين لم يتم تسجيلهم بعد في أي مجموعة تدريبية أو قائمة انتظار أو اختبار تحديد مستوى أو خطوات تقديم. للبدء، اختر خطوات التقديم المناسبة لكل عميل بناءً على تفضيلاته.
    </ng-transclude>
            </div>
        </div>

        <div>
            <!-- ngIf: dismissible --><button ng-click="dismiss()" ng-if="dismissible" class="close ng-scope" type="button">
                <span>×</span>
            </button><!-- end ngIf: dismissible -->
        </div>
    </div><!-- end ngIf: visible --></dismissible-hint>

	
	<div class="block style2 mb-20">
		<div class="block-body d-flex flex-wrap flex-gap-15">
			
			<div class="form-group mb-0 border-end pe-15" style="min-width: 200px">
				<label>وسوم العملاء</label>
				<div class="tags-menu pills align-items-center ng-isolate-scope" type="clients" dataloader-param="newClients.getParam('clientTagIds')">
    <div>
        <div class="dropdown">
            <button data-toggle="dropdown" class="btn btn-default dropdown-toggle ng-binding" type="button">
                <i class="fa fa-tag"></i> الوسوم <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" style="max-height: 250px; min-width: 250px; overflow-y: auto">
                <li ng-show="tags.length &gt;= 6" class="border-bottom ng-hide" style="padding: 8px">
                    <input type="text" ng-model="search" class="form-control input-sm ng-pristine ng-untouched ng-valid ng-empty" placeholder="بحث ..." wfd-id="id1">
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

			
			<div class="form-group mb-0 border-end pe-15" style="min-width: 200px">
				<label>الفترة الزمنية</label>
				<time-slots-selector dataloader-param="newClients.getParam('timeSlotIds')" options="{'returnIdsOnly': true}" class="ng-isolate-scope">
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

			
			<div class="form-group mb-0 border-end pe-15" style="min-width: 200px">
				<label>قام بالإضافة</label>
				<user-search dataloader-param="newClients.getParam('createdBy')" class="ng-isolate-scope">
    <!-- ngIf: !! selected -->

    <!-- ngIf: ! selected --><div ng-if="! selected" ng-class="{'widget-large': setup.largeInput, 'widget-small': !setup.largeInput}" class="typeaheadWidget ng-scope widget-small">
        <!--The input-->
        <div class="input-group">
            <!--The loading indicator-->
            <!-- ngIf: searching -->

            <input ng-model="name" uib-typeahead="user.id as user.name for user in search($viewValue)" typeahead-min-length="setup.minLength" typeahead-wait-ms="700" typeahead-on-select="select($item, $model, $label)" typeahead-loading="searching" typeahead-no-results="noResults" typeahead-template-url="userMenuItem.html" ng-class="{'input-lg': setup.largeInput}" type="text" class="form-control ng-pristine ng-untouched ng-valid ng-empty" placeholder="بحث بالإسم او الرقم او البريد الإلكتروني ..." autocomplete="off" aria-autocomplete="list" aria-expanded="false" aria-owns="typeahead-21-911" wfd-id="id2"><ul class="dropdown-menu ng-isolate-scope ng-hide" ng-show="isOpen() &amp;&amp; !moveInProgress" ng-style="{top: position().top+'px', left: position().left+'px'}" role="listbox" aria-hidden="true" uib-typeahead-popup="" id="typeahead-21-911" matches="matches" active="activeIdx" select="select(activeIdx, evt)" move-in-progress="moveInProgress" query="query" position="position" assign-is-open="assignIsOpen(isOpen)" debounce="debounceUpdate" template-url="userMenuItem.html">
    <!-- ngRepeat: match in matches track by $index -->
</ul>

            <div class="input-group-btn">
                <button ng-click="selectMe()" class="btn btn-default ng-binding" type="button">
                    انا
                </button>
            </div>
        </div>

        <!--Messages-->
        <!-- ngIf: noResults -->
    </div><!-- end ngIf: ! selected -->

    <script type="text/ng-template" id="userMenuItem.html">
        <a href="">
            <span ng-bind-html="match.label | uibTypeaheadHighlight:query"></span>
            <ul class="list-inline details margin-top-5">
                <li><i class="fa fa-suitcase"></i> {{ match.model.job_title || '--' }}</li>
                <li><i class="fa fa-phone"></i> {{ match.model.phone_number || '--' }}</li>
            </ul>
        </a>
    </script>
</user-search>
			</div>

			
			<div class="form-group mb-0" style="min-width: 200px">
				<label>وقت إضافة العميل</label>
				<div class="timeSpanSelectorWidget ng-isolate-scope" dataloader-param="newClients.getParam('createdAt')" options="{'acceptEmpty': true, 'span': null}">
        <div ng-show="['fromTo', 'date', 'beforeDate'].indexOf(choices.span) &lt; 0" class="form-group margin-bottom-0">
            <select ng-model="choices.span" ng-options="option.span as option.label for option in data.spans" class="form-control ng-pristine ng-untouched ng-valid ng-empty"><!-- ngIf: options.acceptEmpty === true --><option ng-if="options.acceptEmpty === true" value="" class="" selected="selected">&nbsp;</option><!-- end ngIf: options.acceptEmpty === true --><option label="اليوم" value="string:today">اليوم</option><option label="البارحة" value="string:yesterday">البارحة</option><option label="غداً" value="string:tomorrow">غداً</option><option label="هذا الإسبوع" value="string:thisWeek">هذا الإسبوع</option><option label="الإسبوع السابق" value="string:lastWeek">الإسبوع السابق</option><option label="هذا الشهر" value="string:thisMonth">هذا الشهر</option><option label="الشهر المنقضي" value="string:lastMonth">الشهر المنقضي</option><option label="تاريخ محدد" value="string:date">تاريخ محدد</option><option label="قبل تاريخ" value="string:beforeDate">قبل تاريخ</option><option label="من ... إلى" value="string:fromTo">من ... إلى</option><option label="من البداية" value="string:allTime">من البداية</option></select>
        </div>

        <!-- ngIf: choices.span === 'fromTo' -->

        <!-- ngIf: choices.span === 'date' -->

        <!-- ngIf: choices.span === 'beforeDate' -->
    </div>
			</div>
		</div>

		<div class="block-footer">
			<button class="btn btn-primary" ng-click="newClients.filter()">
				<i class="fa fa-search"></i> بحث
			</button>

			<!-- ngIf: newClients.isFilteringOn() -->
		</div>
	</div>

	<div class="block style2">
		<div class="block-body p-0">
			
			<!-- ngIf: newClients.isLoading() -->

			
			<!-- ngIf: !newClients.isLoading() && newClients.isEmpty() --><div ng-if="!newClients.isLoading() &amp;&amp; newClients.isEmpty()" class="p-20 text-center ng-scope">
				<i class="fa fa-inbox fa-3x text-muted"></i>
				<!-- ngIf: !newClients.isFilteringOn() --><div class="mt-15 text-muted ng-scope" ng-if="!newClients.isFilteringOn()">لا يوجد عملاء جدد.</div><!-- end ngIf: !newClients.isFilteringOn() -->
				<!-- ngIf: newClients.isFilteringOn() -->
			</div><!-- end ngIf: !newClients.isLoading() && newClients.isEmpty() -->

			
			<!-- ngIf: !newClients.isLoading() && !newClients.isEmpty() -->
		</div>

		
		<!-- ngIf: newClients.pagination.showControls() -->
	</div>
</div>
				<!-- ngRepeat: flow in flows -->
			</div>
		</div><!-- end ngIf: flows !== null -->
	</div>
        </div>
</div>

<?php
// تضمين footer template
include_once __DIR__ . '/../templates/footer.php';
?>
