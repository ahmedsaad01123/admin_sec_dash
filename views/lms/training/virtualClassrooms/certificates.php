<?php
// إعداد المتغيرات
$pageTitle = 'الشهادات';
$includeSessionCheck = true;
$includeCSRFRefresh = true;

// تضمين القوالب
include_once __DIR__ . '/../../../templates/header.php';
include_once __DIR__ . '/../../../templates/sidebar.php';
?>

<div id="container" class="container-fluid">
<div id="content" class="">
                    <div id="pageTitle">
            <i class="icon fa fa-certificate"></i>
            <span class="title">الشهادات</span>
        </div>

        <div ng-app="certificatesApp" class="ng-scope">
            
            <ul class="nav nav-tabs">
                <li ng-class="{'active': activeTab == 'issued'}" class="active">
                    <a href="#!/issued">
                        <i class="icon fa fa-search"></i>
                        <span class="title">
                            الشهادات الصادرة
                        </span>
                    </a>
                </li>
                <!-- ngIf: _user.hasAnyPermission(['issue_certificates', 'control_certificates']) --><li ng-if="_user.hasAnyPermission(['issue_certificates', 'control_certificates'])" ng-class="{'active': activeTab == 'issuing'}" class="ng-scope">
                    <a href="#!/issuing">
                        <i class="icon fa fa-list"></i>
                        <span class="title">
                            إصدار الشهادات
                        </span>
                    </a>
                </li><!-- end ngIf: _user.hasAnyPermission(['issue_certificates', 'control_certificates']) -->
                <!-- ngIf: _user.hasAnyPermission('control_certificates') --><li ng-if="_user.hasAnyPermission('control_certificates')" ng-class="{'active': activeTab == 'certificates'}" class="ng-scope">
                    <a href="#!/certificates">
                        <i class="icon fa fa-certificate"></i>
                        <span class="title">
                            إدارة الشهادات
                        </span>
                    </a>
                </li><!-- end ngIf: _user.hasAnyPermission('control_certificates') -->
                <!-- ngIf: _user.hasAnyPermission('control_certificates') --><li ng-if="_user.hasAnyPermission('control_certificates')" ng-class="{'active': activeTab == 'templates'}" class="ng-scope">
                    <a href="#!/templates">
                        <i class="icon fa fa-picture-o"></i>
                        <span class="title">
                            إدارة القوالب
                        </span>
                    </a>
                </li><!-- end ngIf: _user.hasAnyPermission('control_certificates') -->
            </ul>

            <!-- ngView: --><div ng-view="" class="ng-scope">
                <ul class="nav nav-tabs ng-scope">
        <li class="active">
            <a href="" data-toggle="tab" data-target="#clientTab">
                <i class="icon fa fa-user"></i>
                <span class="title">
                    شهادات الطلاب
                </span>
            </a>
        </li>

        <li>
            <a href="" data-toggle="tab" data-target="#batchTab">
                <i class="icon fa fa-users"></i>
                <span class="title">
                    شهادات متدربي الدورات
                </span>
            </a>
        </li>
    </ul>

    <div class="tab-content ng-scope">
        <div class="tab-pane active" id="clientTab">
            <div class="hint">
        من هنا يمكنك عرض الشهادات الخاصة بأي من الطلاب، إبدأ بالبحث عنه من خلال الإسم أو رقم الهاتف.
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
            
            <client-search-input setup="forClient.setup.searchInputSetup" class="ng-isolate-scope">
    <div ng-class="{'widget-large': setup.largeInput, 'widget-small': !setup.largeInput, 'withNewClientOption': setup.newClientOption}" class="typeaheadWidget clientSearchInputWidget widget-small">

        <!--The loading indicator-->
        <!-- ngIf: searching -->

        <!--The input-->
        <div ng-class="{'input-group': newClientOption.available}">
            <input ng-model="name" uib-typeahead="client.id as client.name for client in search($viewValue)" typeahead-min-length="setup.minLength" typeahead-wait-ms="700" typeahead-on-select="select($item, $model, $label)" typeahead-loading="searching" typeahead-no-results="noResults" typeahead-template-url="clientOption.html" ng-class="{'input-lg': setup.largeInput}" type="text" class="form-control search-input  ng-empty" placeholder="بحث بالإسم او الرقم او البريد الإلكتروني ..." autocomplete="off" aria-autocomplete="list" aria-expanded="false" aria-owns="typeahead-7-3269"><ul class="dropdown-menu ng-isolate-scope ng-hide" ng-show="isOpen() &amp;&amp; !moveInProgress" ng-style="{top: position().top+'px', left: position().left+'px'}" role="listbox" aria-hidden="true" uib-typeahead-popup="" id="typeahead-7-3269" matches="matches" active="activeIdx" select="select(activeIdx, evt)" move-in-progress="moveInProgress" query="query" position="position" assign-is-open="assignIsOpen(isOpen)" debounce="debounceUpdate" template-url="clientOption.html">
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
</client-search-input>

            <div class="divider-20"></div>
        </div>
    </div>

    
    <!-- ngIf: forClient.client -->        </div>

        <div class="tab-pane" id="batchTab">
            <!-- ngIf: data.certificates !== null --><div ng-if="data.certificates !== null" class="ng-scope">
        
        <!-- ngIf: !data.certificates.length --><div ng-if="!data.certificates.length" class="alert alert-info ng-scope">
            <i class="fa fa-info-circle"></i>
            ليس هناك أي شهادات مسجلة بعد على النظام بعد. فور إضافة الشهادات وإدخال معلومات
			المتدربين ستظهر هنا.
        </div><!-- end ngIf: !data.certificates.length -->

        
        <!-- ngIf: data.certificates.length > 0 -->

        <div class="divider-20"></div>

        
        <!-- ngIf: forBatch.records.shouldLoad -->
    </div><!-- end ngIf: data.certificates !== null -->
        </div>
    </div>            </div>

            <script type="text/ng-template" id="issuingView.html">
                <div class="row">
        <div ng-class="{'col-md-9 col-lg-9': wizard.step != 'dataEntry', 'col-md-10 col-lg-10': wizard.step == 'dataEntry'}"
             class="col-xs-12 col-sm-12">

            <div class="block style2">
            	<div class="block-title">
                    <span class="title">إصدار الشهادات</span>
            	</div>

                
                <div class="block-body">
                    
                    <div ng-if="wizard.step == 'configuration'" class="hint">
                        <i class="fa fa-info-circle"></i>
                        من هنا يمكنك إصدار الشهادات للمتدربين وإدخال معلومات كل متدرب لأى من الشهادات.
                    </div>

                    <div ng-if="wizard.step == 'dataEntry'" class="hint">
                        <i class="fa fa-info-circle"></i>
                        بالأسفل ستجد المتدربين الخاصين بالمجموعة التدريبية التي إخترتها. قم بالاختيار منهم من تريد
			إنتاج الشهادة له، ثم قم بإدخال (أو مراجعة) المعلومات الخاصة بكل متدرب.
                    </div>

                    <div ng-switch="wizard.step">
                        <div ng-switch-when="configuration">
                            <loading-indicator ng-if="!data.loaded"></loading-indicator>

    <div ng-if="data.loaded && (!data.certificates.length || !data.templates.length)" class="alert alert-info">
        <i class="fa fa-exclamation-triangle"></i>
        قبل ان تتمكن من إنتاج الشهادات يجب أن تقوم بإدخال معلومات كل شهادة والقوالب التي سيتم طباعة
			 معلومات كل متدرب عليها. توجه إلى تبويب " إدارة الشهادات " لتبدأ.
    </div>

    <div ng-if="data.loaded && (data.certificates.length > 0 && data.templates.length > 0)" class="form-horizontal">
        
        <div class="row">
            <div class="col-md-4 control-label">
                <label>الشهادة</label>
                <div class="help-block">الشهادة التي تريد إصدارة للمتدربين (ستقوم باختيارهم في الخطوة التالية)</div>
            </div>

            <div class="form-group col-md-5">
                <select ng-model="configuration.params.certificate"
                        ng-options="cert as cert.name for cert in data.certificates track by cert.id"
                        ng-change="configuration.certificate.onChange()"
                        class="form-control"></select>
            </div>
        </div>

        
        <div class="row">
            <div class="control-label col-md-4">
                <label>المجموعة</label>
                <div class="help-block">المجموعة التدريبية التي تريد إنتاج الشهادات للمتدربين المسجلين عليها.</div>
            </div>

            <div class="form-group col-md-5">
                <batch-picker setup="configuration.batch.pickerSetup"></batch-picker>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 control-label">
                <label>تاريخ الإصدار</label>
                <div class="help-block">تاريخ الإصدار الخاص بهذه الشهادة لهذه المجموعة التدريبية. سيتم طباعة هذا التاريخ
			على الشهادة في حال كان المتغير [release_date] موجود ضمن المعلومات الخاصة بالشهادة.</div>
            </div>

            <div class="col-md-5 form-group">
                <input datetime-picker="{'todayIsMax': true}"
                       datetime-model="configuration.params.releaseDate" class="form-control" type="text"/>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 control-label">
                <label>تاريخ الإنتهاء</label>
                <div class="help-block">تاريخ إنتهاء صلاحية الشهادات</div>
            </div>

            <div class="col-md-5 form-group">
                <input datetime-picker datetime-model="configuration.params.expiryDate"
                       class="form-control" type="text"/>
            </div>
        </div>

        
        <div class="row">
            <div class="col-md-4 control-label">
                <label>إرسال الشهادات إلى المتدربين</label>
                <div class="help-block">سيتم إرسال الشهاداات الصادرة عبر البريد الإلكتروني للعملاء</div>
            </div>

            <div class="col-md-8 form-group">
                <div class="checkbox">
                    <input ng-model="configuration.params.sendToTrainees" type="checkbox"/>
                </div>
            </div>
        </div>


        <div ng-if="data.templates.length > 0" class="row">
            <div class="col-md-4 control-label">
                <label>القالب</label>
                <div class="help-block">
                    القالب الذي يجب إستخدامه لطباعة الشهادات.
                </div>
            </div>

            <div class="col-md-8 form-group">
                <div class="row">
                    <div ng-repeat="template in data.templates" class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <a ng-click="configuration.template.select(template)"
                           ng-class="{'active': template == configuration.params.template}" href="" class="thumbnail">
                            <img ng-src="{{ template.thumbnailUrl }}" class="img-rounded" alt=""/>

                            <div class="caption small">
                                {{ template.name | cut:17 }}
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>                        </div>

                        <div ng-switch-when="dataEntry">
                            <loading-indicator ng-if="dataEntry.trainees.list === null"></loading-indicator>

    
    <div ng-if="dataEntry.trainees.list !== null" class="row">
        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
            <div class="auto-overflow" style="height: 500px">
        <div class="margin-bottom-10">
            <a ng-click="dataEntry.selectAllTrainees()" class="btn btn-xs btn-default onSide"
               href=""><i class="fa fa-check-square-o"></i>
                اختيار الكل

                ({{ dataEntry.trainees.list.length }})
            </a>

            <div class="clearfix"></div>
        </div>

        <div class="form-group">
            <input type="text" ng-model="dataEntry.trainees.search" class="form-control input-sm"
                   placeholder="بحث"/>
        </div>

        <div class="list-group">
            <a ng-repeat="trainee in dataEntry.trainees.list | filter:dataEntry.trainees.search "
               ng-click="dataEntry.trainees.selected.set(trainee)"
               ng-class="{'active': dataEntry.trainees.selected.is(trainee), 'list-group-item-success': trainee.record.selected}"
               class="list-group-item" href="">

                {{ selected = dataEntry.trainees.selected.is(trainee); "" }}

                <i ng-if="selected" class="fa fa-chevron-left onSide"></i>

                <h4 class="list-group-item-heading">
                    
                    <i ng-if="trainee.record.claimed" class="fa fa-check-circle"></i>

                    <input ng-if="!trainee.record.created"
                           ng-checked="trainee.record.selected"
                           ng-disabled="trainee.record.claimed === true"
                           ng-click="dataEntry.trainees.toggleSelected(trainee, $event)"
                           style="height: 15px; width: 15px" type="checkbox"/>

                    {{ trainee.client.name }}
                </h4>

                <ul ng-if="selected" class="list-inline list-group-item-text small">
                    <li class="text-strong">{{ trainee.client.public_id }}</li>
                    <li>{{ trainee.client.phone_number }}</li>
                    <li>{{ trainee.client.email }}</li>
                </ul>
            </a>
        </div>
    </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
            {{ params = configuration.params; "" }}
    {{ trainee = dataEntry.trainees.selected.object; "" }}

    <div class="block style2">
        <div class="block-title">
            <div ng-if="trainee.record.created !== true" class="form-group onSide">
                <button ng-if="!trainee.record.selected"
                        ng-click="trainee.record.selected = true" class="btn btn-xs btn-success">
                    <i class="fa fa-check-circle"></i>
                    جاهز لإنتاج الشهادة
                </button>

                <button ng-if="trainee.record.selected"
                        ng-click="trainee.record.selected = false" class="btn btn-xs btn-default">
                    <i class="fa fa-remove"></i>
                    إلغاء
                </button>
            </div>

            <i class="icon fa fa-user"></i>
            <span class="title">
                {{ trainee.client.name }}
            </span>
        </div>

        <div class="block-body">
            
            <div ng-if="trainee.record.claimed === true" class="alert alert-success">
                <i class="fa fa-info-circle"></i>
                قام هذا المتدرب باستلام الشهادة الخاصة به (في {{ trainee.record.claimed_at }}).
            </div>

            
            <div ng-repeat="info in params.certificate.info" class="row">
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 form-group">
                    <label>{{ info.name }}</label>
                    <div ng-bind="dataEntry.getTraineeInfoValue(trainee, info)"
                         class="text-primary"></div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 form-group">
                    <input ng-model="trainee.record.values[info.id]" type="text"
                           class="form-control margin-top-20"/>
                </div>
            </div>

            <hr/>

            
            <div class="form-group">
                <label>تاريخ الإصدار</label>
                <div class="help-block">
                    تاريخ إصدار الشهادة الخاصة بالمتدرب. سيتم طباعة هذا التاريخ على الشهادة
			تلقائيا في حال تم إستخدام المتغير [release_date] ضمن معلومات الشهادة.
                </div>

                <input datetime-picker="{'todayIsMax': false}" datetime-model="trainee.record.release_date"
                       type="text" class="form-control"/>
            </div>

            
            <div class="form-group">
                <label>تاريخ الإنتهاء</label>
                <div class="help-block">
                    تاريخ إنتهاء صلاحية الشهادة
                </div>

                <input datetime-picker datetime-model="trainee.record.expiry_date"
                       type="text" class="form-control"/>
            </div>

        </div>
    </div>        </div>
    </div>                        </div>

                        <div ng-switch-when="generation">
                            <div ng-if="generation.records === null">
        <h4>جاري إنتاج الشهادات</h4>
        <div class="progress margin-top-20">
            <div class="progress-bar progress-bar-striped active" style="width: 100%"></div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div ng-if="generation.records !== null && generation.records.length == 0" class="alert alert-info">
                <i class="fa fa-info-circle"></i>
                لم يتم إنتاج أي شهادات بناءاً على المعلومات التي تم إدخالها سابقاً، تأكد
			من اختيار المتدربين وإدخال المعلومات الخاصة بكل متدرب.
            </div>

            
            <div ng-if="generation.records !== null && generation.records.length > 0">
                <div class="alert alert-success">
                    <i class="fa fa-info-circle"></i>
                    تم إنتاج الشهادات بنجاح. يمكنك الوصول لاحقاً لشهادات كل متدرب أو كافة شهادات مجموعة
			 تدريبية معينة من خلال تبويب "الشهادات الصادرة" بالأعلي.
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-5">
                    	<div class="form-group">
                            <input ng-model="generation.search" type="text" class="form-control"
                                   placeholder="بحث"/>
                        </div>
                    </div>
                </div>

                <div class="table-responsive" style="max-height: 400px; overflow: auto">
                    <table class="table">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>العميل</th>
                            <th style="width: 220px">ملف الشهادة</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr ng-repeat="record in generation.records | filter:generation.search ">
                            <td>{{ $index + 1 }}</td>

                            <td>
                                <h4>
                                    <client-name client="record.client"></client-name>
                                </h4>
                            </td>

                            <td>
                                <div>
                                    <a href="{{ record.downloadUrl }}" target="_blank" class="btn btn-sm btn-primary">
                                        <i class="fa fa-download"></i> تنزيل
                                    </a>

                                    <a href="{{ record.viewUrl }}" target="_blank" class="btn btn-sm btn-default">
                                        <i class="fa fa-external-link"></i> عرض
                                    </a>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
                        </div>
                    </div>
                </div>

                <div class="block-footer">
                    <button ng-click="wizard.back()" ng-disabled="!wizard.canGoBack()" class="btn btn-default">
                        <i class="fa fa-chevron-right"></i>
                        عودة
                    </button>

                    <button ng-click="wizard.next()" ng-disabled="!wizard.canGoNext()" class="btn btn-primary">
                        متابعة
                        <i class="fa fa-chevron-left"></i>
                    </button>
                </div>

            </div>
        </div>
    </div>            </script>

            <script type="text/ng-template" id="issuedView.html">
                <ul class="nav nav-tabs">
        <li class="active">
            <a href="" data-toggle="tab" data-target="#clientTab">
                <i class="icon fa fa-user"></i>
                <span class="title">
                    شهادات الطلاب
                </span>
            </a>
        </li>

        <li>
            <a href="" data-toggle="tab" data-target="#batchTab">
                <i class="icon fa fa-users"></i>
                <span class="title">
                    شهادات متدربي الدورات
                </span>
            </a>
        </li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane active" id="clientTab">
            <div class="hint">
        من هنا يمكنك عرض الشهادات الخاصة بأي من الطلاب، إبدأ بالبحث عنه من خلال الإسم أو رقم الهاتف.
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
            
            <client-search-input setup="forClient.setup.searchInputSetup"></client-search-input>

            <div class="divider-20"></div>
        </div>
    </div>

    
    <div ng-if="forClient.client" class="block style2">
        <div class="block-title">
            <span class="title">{{ forClient.client.name }}</span>
        </div>

        <div class="block-body">
            
            <loading-indicator ng-if="forClient.records.list === null"></loading-indicator>

            
            <div ng-if="forClient.records.list !== null && forClient.records.list.length == 0"
                 class="alert alert-info margin-bottom-0">
                <i class="fa fa-info-circle"></i>
                ليس هناك أي شهادات مرتبطة بهذا المتدرب على النظام!
            </div>

            
            <div ng-if="forClient.records.list !== null && forClient.records.list.length > 0"
                 class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th style="width: 30%">الشهادة</th>
                        <th>المعومات</th>
                        <th style="width: 200px">إستلمها المتدرب</th>
                        <th style="width: 150px"></th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr ng-repeat="record in forClient.records.list">
                        <td>
                            <h4>{{ record.certificate.name }}</h4>

                            <div class="margin-top-10">
                                # {{ record.uid }}
                            </div>

                            <div class="margin-top-10 btn-group btn-group-xs">
                                <a href="{{ record.viewUrl }}" target="_blank" class="btn btn-default">
                                    <i class="fa fa-external-link"></i> عرض
                                </a>
                                <a href="{{ record.downloadUrl }}" target="_blank" class="btn btn-default">
                                    <i class="fa fa-download"></i> تنزيل
                                </a>
                            </div>
                        </td>

                        <td>
                            <ul class="list-compact">
                                <li ng-repeat="(info, value) in record.values">
                                    <span class="property">{{ info }}</span>: {{ value || '--' }}
                                </li>
                            </ul>
                        </td>

                        <td>
                            <div ng-if="record.claimed == true">
                                <i class="fa fa-check-circle text-success"></i> Yes
                                <div class="small">{{ record.claimed_at | datetime:'ymd' }}</div>

                                <div class="margin-top-10">
                                    <button ng-click="recordOptions.cancelClaiming(record)"
                                            class="btn btn-xs btn-default">
                                        <i class="fa fa-remove"></i> إلغاء
                                    </button>
                                </div>
                            </div>

                            <div ng-if="record.claimed == false">
                                <i class="fa fa-clock-o text-primary"></i>
                                لم يستلمها بعد

                                <div class="margin-top-10">
                                    <button ng-click="recordOptions.markClaimed(record)" class="btn btn-xs btn-success">
                                        <i class="fa fa-check"></i>
                                        قام باستلامها
                                    </button>
                                </div>
                            </div>
                        </td>

                        <td>
                            <button ng-click="recordOptions.edit(record, 'client')" class="btn btn-xs btn-primary">
                                <i class="fa fa-pencil"></i> تعديل
                            </button>
                            <button ng-click="recordOptions.delete(record, 'client')" class="btn btn-xs btn-danger">
                                <i class="fa fa-trash"></i> حذف
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>        </div>

        <div class="tab-pane" id="batchTab">
            <div ng-if="data.certificates !== null">
        
        <div ng-if="!data.certificates.length" class="alert alert-info">
            <i class="fa fa-info-circle"></i>
            ليس هناك أي شهادات مسجلة بعد على النظام بعد. فور إضافة الشهادات وإدخال معلومات
			المتدربين ستظهر هنا.
        </div>

        
        <form ng-if="data.certificates.length > 0" name="form">
            <div class="hint">
                من هنا يمكنك عرض شهادات المتدربين المسجلين على أحد المجموعات التدريبية. إبدأ باختيار المجموعة
			 ثم الشهادة المطلوبة.
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="block style2">
                        <div class="block-body">
                            
                            <div class="form-group">
                                <label>الشهادة</label>
                                <select ng-model="forBatch.certificate"
                                        ng-disabled="data.certificates.length == 0"
                                        ng-options="cert as cert.name for cert in data.certificates"
                                        class="form-control" required></select>
                            </div>

                            
                            <div class="form-group">
                                <batch-picker setup="forBatch.setup.searchInput"></batch-picker>
                            </div>

                            <div class="form-group margin-bottom-0">
                                <button ng-click="forBatch.records.load()" ng-disabled="form.$invalid || !forBatch.batch"
                                        class="btn btn-primary noMargin">
                                    <i class="fa fa-check"></i> عرض
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="divider-20"></div>

        
        <div ng-if="forBatch.records.shouldLoad" id="batchResultsBlock" class="block style2">
        <div class="block-title">
            <span class="title">{{ forBatch.batch.name }}</span>
        </div>

        <div class="block-body">
            
            <loading-indicator ng-if="forBatch.records.list === null"></loading-indicator>

            
            <div ng-if="forBatch.records.list !== null">
                
                <div ng-if="forBatch.records.list.length == 0" class="alert alert-info margin-bottom-0">
                    <i class="fa fa-info-circle"></i>
                    لم يتم العثور على معلومات إصدار خاصة بشهادات تابعة لهذه المجموعة التدريبية.
                </div>

                
                <div ng-if="forBatch.records.list.length > 0">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th style="width: 30%">العميل</th>
                                <th>المعومات</th>
                                <th style="width: 200px">إستلمها المتدرب</th>
                                <th style="width: 150px"></th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr ng-repeat="record in forBatch.records.list">

                                <td>
                                    <h4>
                                        <client-name client="record.client" newtab=""></client-name>
                                    </h4>

                                    <div class="margin-top-10">
                                        # {{ record.uid }}
                                    </div>

                                    <div class="margin-top-10 btn-group btn-group-xs">
                                        <a href="{{ record.viewUrl }}" target="_blank" class="btn btn-primary">
                                            <i class="fa fa-external-link"></i> عرض
                                        </a>
                                        <a href="{{ record.downloadUrl }}" target="_blank" class="btn btn-info">
                                            <i class="fa fa-download"></i> تنزيل
                                        </a>
                                    </div>
                                </td>

                                <td>
                                    <div style="overflow:auto; max-height: 120px">
                                        <ul class="list-compact">
                                            <li ng-repeat="(info, value) in record.values">
                                                <span class="property">{{ info }}</span>: {{ value || '--' }}
                                            </li>
                                        </ul>
                                    </div>
                                </td>

                                <td>
                                    <div ng-if="record.claimed == true">
                                        <i class="fa fa-check-circle text-success"></i> Yes
                                        <div class="small">{{ record.claimed_at | datetime:'ymd' }}</div>

                                        <div class="margin-top-10">
                                            <button ng-click="recordOptions.cancelClaiming(record)"
                                                    class="btn btn-xs btn-default">
                                                <i class="fa fa-remove"></i> إلغاء
                                            </button>
                                        </div>
                                    </div>

                                    <div ng-if="record.claimed == false">
                                        <i class="fa fa-clock-o text-primary"></i>
                                        لم يستلمها بعد

                                        <div class="margin-top-10">
                                            <button ng-click="recordOptions.markClaimed(record)" class="btn btn-xs btn-success">
                                                <i class="fa fa-check"></i>
                                                قام باستلامها
                                            </button>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <button ng-click="recordOptions.edit(record, 'batch')" class="btn btn-xs btn-primary">
                                        <i class="fa fa-pencil"></i> تعديل
                                    </button>
                                    <button ng-click="recordOptions.delete(record, 'batch')" class="btn btn-xs btn-danger">
                                        <i class="fa fa-trash"></i> حذف
                                    </button>
                                </td>

                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
        </div>
    </div>            </script>

            <script type="text/ng-template" id="certificatesView.html">
                <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <loading-indicator ng-if="certificates.list === null"></loading-indicator>

    
    <div ng-if="certificates.list !== null" class="block style2">
        <div class="block-body">
            
            <div ng-if="certificates.list.length == 0" class="alert alert-info">
                <i class="fa fa-info-circle"></i> ليس هناك أي شهادات بعد. إبدأ بإضافة معلومات كل شهادة تقدمها على حدي من النموذج المجاور. تذكر
			أنك هنا تقوم بإدخال معلومات الشهادات فقط، والخطوة التالية ستكون إصدار هذه الشهادات للطلاب.
            </div>

            
            <div ng-if="certificates.list.length > 0" class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th style="width: 70%">الشهادة</th>
                        <th>القالب الإفتراضي</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr ng-repeat="cert in certificates.list">
                        <td>
                            <div class="btn-group btn-group-sm onSide">
                                <a href="certificates/{{ cert.id }}/editor" class="btn btn-primary">
                                    <i class="fa fa-sliders"></i> ضبط
                                </a>

                                <button ng-click="certificateOptions.edit(cert)" class="btn btn-default">
                                    <i class="fa fa-pencil"></i>
                                    تعديل
                                </button>

                                <button ng-click="certificateOptions.delete(cert)" class="btn btn-danger icon-only">
                                    <i class="fa fa-remove"></i>
                                </button>
                            </div>

                            <h4>
                                <a href="#!/certificates/{{ cert.id }}/configure" class="text-underlined">
                                    {{ cert.name }}</a>
                            </h4>

                            <div ng-if="cert.description" class="text-muted">
                                {{ cert.description }}
                            </div>
                        </td>

                        <td>
                            {{ cert.default_template ?cert.default_template.name :'--' }}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <form name="newCertificateForm" class="block style2">
        <div class="block-title">
            <i class="icon fa fa-plus-circle"></i>
            <span class="title">إضافة معلومات شهادة جديدة</span>
        </div>

        <div class="block-body">
            <div class="hint">
                من هنا يمكنك إضافة معلومات شهادة جديدة، ولاحقاً ستتمكن من إصدار الشهادات الخاصة بالمتدربين
			بناءاً على هذه الشهادة.
            </div>

            <div>
                
                <div class="form-group">
                    <label>الإسم</label>
                    <input ng-model="newCertificate.info.name" type="text" class="form-control input-lg" required/>
                </div>

                
                <div class="form-group">
                    <label>وصف قصير</label>
                    <textarea ng-model="newCertificate.info.description"
                              rows="2" class="form-control"></textarea>
                </div>

                
                <div class="form-group margin-bottom-0">
                    <label>القالب الإفتراضي</label>
                    <div class="help-block">القالب الإفتراضي للشهادة</div>
                    <select ng-model="newCertificate.info.default_template_id"
                            ng-options="template.id as template.name for template in data.templates"
                            ng-if="data.templates.length > 0"
                            class="form-control">
                        <option value="">&nbsp;</option>
                    </select>

                    <div ng-if="data.templates.length == 0" class="">
                        <i class="fa fa-exclamation-triangle"></i>
                        لم يتم إضافة أي قوالب بعد.
                    </div>
                </div>
            </div>
        </div>

        <div class="block-footer">
            <button ng-disabled="newCertificateForm.$invalid" ng-click="newCertificate.create()"
                    class="btn btn-primary">
                <i class="fa fa-check"></i>
                إضافة
            </button>
        </div>
    </form>        </div>
    </div>            </script>

            <script type="text/ng-template" id="templatesView.html">
                <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <loading-indicator ng-if="templates.list === null"></loading-indicator>

    <div ng-if="templates.list !== null">
        
        <div ng-if="templates.list.length == 0" class="alert alert-info">
            <i class="fa fa-info-circle"></i>
            ليس هناك قوالب بعد. إبدأ بإضافة القوالب التي تستخدمها لتتمكن من طباعة الشهادات عليها.
        </div>

        
        <div ng-if="templates.list.length > 0" class="row">
            <div ng-repeat="template in templates.list" class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="thumbnail">
                    <a ng-click="templateOptions.modify(template)" href="">
                        <img ng-src="{{ template.thumbnailUrl }}" alt=""/>
                    </a>

                    <div class="caption">
                        <h4>{{ template.name }}</h4>

                        <div class="btn-group btn-group-xs margin-top-10">
                            <a href="{{ template.fileUrl }}" target="_blank" class="btn btn-link">
                                <i class="fa fa-picture-o"></i> عرض
                            </a>
                            <a ng-click="templateOptions.modify(template)" href="" class="btn btn-link">
                                <i class="fa fa-pencil"></i> تعديل
                            </a>
                            <a ng-click="templateOptions.delete(template)" href="" class="btn btn-link">
                                <i class="fa fa-trash"></i> حذف
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <form name="newTemplateForm" class="block style2">
        <div class="block-title">
            <i class="icon fa fa-plus-circle"></i>
            <span class="title">إضافة قالب جديد</span>
        </div>

        <div class="block-body">
            <div class="hint">
                من هنا يمكنك إضافة قالب شهادات جديد. قالب الشهادات هو التصميم الذي سيتم طباعة معلومات كل طالب
			عليه.
            </div>

            
            <div class="form-group">
                <label>الإسم</label>
                <input ng-model="newTemplate.info.name" type="text" class="form-control" required/>
            </div>

            
            <div class="form-group margin-bottom-0">
                <label>ملف القالب</label>
                <div class="help-block">
                    قم باختيار ملف القالب أو التصميم من على حاسبك، الصيغ المتاحة هي PNG, JPG, JPEG
                </div>
                <input ngf-select ng-model="newTemplate.info.file"
                       ngf-pattern="'.png,.jpg,.jpeg'"
                       type="file" required/>
            </div>
        </div>

        <div class="block-footer">
            <button ng-click="newTemplate.create()" disable-on-ajax ng-disabled="newTemplateForm.$invalid" class="btn btn-primary">
                <i class="fa fa-check"></i> متابعة
            </button>
            <button ng-click="newTemplate.reset()" ng-disabled="!newTemplateForm.$dirty" type="reset"
                    class="btn btn-default">
                <i class="fa fa-remove"></i> إلغاء
            </button>
        </div>
    </form>        </div>
    </div>            </script>
        </div>
            </div>
</div>

<?php
// تضمين footer template
include_once __DIR__ . '/../../../templates/footer.php';
?>
