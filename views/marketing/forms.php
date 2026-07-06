<?php
// إعداد المتغيرات
$pageTitle = 'النماذج';
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
            <i class="icon fa fa-pencil-square-o"></i>
            <span class="title">التسويق والمبيعات</span>

                            
                <ul class="breadcrumb inline" style="margin: 0">
                    <li class="breadcrumb-item"></li>

                                            <li class="breadcrumb-item">النماذج التسويقية</li>
                                    </ul>
                    </div>

        <div class="d-flex justify-content-center">
            <div>
                
                            </div>
        </div>
    </div>
        <div ng-app="marketingFormsApp" class="ng-scope">
            
            <ul class="nav nav-tabs">
                <li ng-class="{'active': activeTab == 'home'}" class="active">
                    <a href="#!/home">
                        <i class="icon fa fa-home"></i>
                        <span class="title">نظرة عامة</span>
                    </a>
                </li>

                <li ng-class="{'active': activeTab == 'forms'}">
                    <a href="#!/forms">
                        <i class="icon fa fa-pencil-square-o"></i>
                        <span class="title">النماذج</span>
                    </a>
                </li>
            </ul>

            
            <!-- ngView: --><div ng-view="" class="ng-scope"><div class="block style4 ng-scope">
    	<div class="block-title">
    		<span class="title">النماذج النشطة</span>
    	</div>

    	<div class="block-body">
            
            <!-- ngIf: forms.forms === null -->

            
            <!-- ngIf: forms.forms !== null && forms.forms.length == 0 --><div ng-if="forms.forms !== null &amp;&amp; forms.forms.length == 0" class="alert alert-info ng-scope">
                <i class="fa fa-info-circle"></i>
                ليس هناك نماذج بعد. النماذج التسويقية هي آداة يمكنك إستخدامها لعمل نماذج لجميع معلومات العملاء المحتملين أو إستقبال طلبات الدورات وغير ذلك.

                <div class="margin-top-15">
                    <button ng-click="createNew()" class="btn btn-sm btn-primary">
                        <i class="fa fa-plus-circle"></i>
                        إضافة النموذج الأول
                    </button>
                </div>
            </div><!-- end ngIf: forms.forms !== null && forms.forms.length == 0 -->

            
            <!-- ngIf: forms.forms !== null && forms.forms.length > 0 -->

    	</div>
    </div>

    <div class="divider-50 ng-scope"></div>
    
    <div class="row ng-scope">
        <div class="col-xs-12 col-sm-12 col-md-8">
            <div class="block style2">
                <div class="block-title">
                    <i class="icon fa fa-inbox"></i>
                    <span class="title">
                        آخر المدخلات
                    </span>

                    <button ng-click="entries.load()" class="btn btn-xs btn-default margin-before-10">
                        <i class="fa fa-refresh"></i> تحديث
                    </button>
                </div>

                <div class="block-body">
                    
                    <!-- ngIf: entries.entries === null -->

                    
                    <!-- ngIf: entries.entries !== null && entries.entries.length == 0 --><div ng-if="entries.entries !== null &amp;&amp; entries.entries.length == 0" class="alert alert-info noMargin ng-scope">
                        <i class="fa fa-info-circle"></i>
                        ليس هناك مدخلات بعد. بعد إضافة نموذج جديد ونشر هذا النموذج وإستقبال مدخلات عليه، هذه المدخلات ستظهر هنا.
                    </div><!-- end ngIf: entries.entries !== null && entries.entries.length == 0 -->

                    
                    <!-- ngIf: entries.entries !== null && entries.entries.length > 0 -->
                </div>
            </div>
        </div>
    </div>
</div>

            <script type="text/ng-template" id="home.html"><div class="block style4">
    	<div class="block-title">
    		<span class="title">النماذج النشطة</span>
    	</div>

    	<div class="block-body">
            
            <loading-indicator ng-if="forms.forms === null"></loading-indicator>

            
            <div ng-if="forms.forms !== null && forms.forms.length == 0" class="alert alert-info">
                <i class="fa fa-info-circle"></i>
                ليس هناك نماذج بعد. النماذج التسويقية هي آداة يمكنك إستخدامها لعمل نماذج لجميع معلومات العملاء المحتملين أو إستقبال طلبات الدورات وغير ذلك.

                <div class="margin-top-15">
                    <button ng-click="createNew()" class="btn btn-sm btn-primary">
                        <i class="fa fa-plus-circle"></i>
                        إضافة النموذج الأول
                    </button>
                </div>
            </div>

            
            <div ng-if="forms.forms !== null && forms.forms.length > 0" class="boxes">
                <div ng-repeat="form in forms.forms" class="box">
                    <h4 class="title">
                        <a href="#!/forms/{{ form.id }}">
                            {{ form.title | cut:25 }}
                        </a>
                    </h4>

                    <div class="labels">
                        <span ng-if="form._expired" class="label label-danger">
                            منتهى
                        </span>
                    </div>

                    <div class="margin-top-15">
                        <div class="dropdown">
                            <button class="btn btn-xs btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                                الخيارات <span class="caret"></span>
                            </button>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="#!/forms/{{ form.id }}/edit">
                                        <i class="fa fa-pencil"></i> تعديل
                                    </a>
                                </li>

                                <li class="bg-info">
                                    <a href="{{ form._displayUrl }}" target="_blank">
                                        <i class="fa fa-window-maximize"></i> فتح
                                    </a>
                                </li>

                                <li>
                                    <a ng-click="forms.share(form)" href="" target="_blank">
                                        <i class="fa fa-share"></i>
                                        مشاركة
                                    </a>
                                </li>

                                <li class="bg-warning">
                                    <a ng-click="forms.archive(form)" href="">
                                        <i class="fa fa-archive"></i> ارشفة
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <button ng-click="createNew()" class="box btn btn-default">
                    <i class="fa fa-2x fa-plus-circle"></i>
                    <span class="display-block margin-top-5">
                        نموذج جديد
                    </span>
                </button>
            </div>

    	</div>
    </div>

    <div class="divider-50"></div>
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-8">
            <div class="block style2">
                <div class="block-title">
                    <i class="icon fa fa-inbox"></i>
                    <span class="title">
                        آخر المدخلات
                    </span>

                    <button ng-click="entries.load()" class="btn btn-xs btn-default margin-before-10">
                        <i class="fa fa-refresh"></i> تحديث
                    </button>
                </div>

                <div class="block-body">
                    
                    <loading-indicator ng-if="entries.entries === null"></loading-indicator>

                    
                    <div ng-if="entries.entries !== null && entries.entries.length == 0" class="alert alert-info noMargin">
                        <i class="fa fa-info-circle"></i>
                        ليس هناك مدخلات بعد. بعد إضافة نموذج جديد ونشر هذا النموذج وإستقبال مدخلات عليه، هذه المدخلات ستظهر هنا.
                    </div>

                    
                    <div ng-if="entries.entries !== null && entries.entries.length > 0" class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>العميل المحتمل</th>
                                <th>النموذج</th>
                                <th>الوقت</th>
                                <th width="15px"></th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr ng-repeat="entry in entries.entries">

                                
                                <td>
                                    
                                    <div ng-if="!entry.lead">لم يتم إنتاج عميل محتمل</div>

                                    
                                    <div ng-if="entry.lead">
                                        <a ng-click="entries.viewLead(entry)" href="" class="text-underlined">
                                            {{ entry.lead.name }}
                                        </a>

                                        <ul class="list-inline small text-muted margin-top-5">
                                            <li><i class="fa fa-phone"></i> {{ entry.lead.phone_number || '--' }}</li>
                                            <li><i class="fa fa-envelope-o"></i> {{ entry.lead.email || '--' }}</li>
                                        </ul>
                                    </div>
                                </td>

                                
                                <td>
                                    <a href="#!/forms/{{ entry.form_id }}" class="text-underlined">
                                        {{ entry.form.title }}</a>
                                </td>

                                <td><span dir="ltr">{{ entry.created_at_formatted }}</span></td>

                                <td>
                                    <button ng-click="entries.view(entry)" class="btn btn-xs btn-default icon-only">
                                        <i class="fa fa-eye"></i>
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
</script>
            <script type="text/ng-template" id="forms.html"><div class="block style4">
        <div class="block-title">
            <span class="title">النماذج</span>

                <span ng-if="forms.forms !== null" class="badge">
                    {{ forms.forms.total }}
                </span>

            <div class="side">
                <button ng-click="createNewForm()" class="btn btn-sm btn-primary">
                    <i class="fa fa-plus-circle"></i>
                    نموذج جديد
                </button>
            </div>
        </div>

        <div class="block-body">

            
            <loading-indicator ng-if="forms.forms === null"></loading-indicator>

            
            <div ng-if="forms.forms !== null && forms.forms.data.length == 0" class="alert alert-info noMargin">
                <i class="fa fa-info-circle"></i>
                لم يتم إضافة اي نماذج بعد. ابدأ بإضافة النموذج الأول.
            </div>

            
            <div ng-if="forms.forms !== null && forms.forms.data.length > 0">
                <div class="table-responsive overflow-visible">
                    <table class="table">
                        <thead>
                        <tr>
                            <th width="55%">النموذج</th>
                            <th>المدخلات</th>
                            <th width="200px">الحملة التسويقية</th>
                            <th>ينتهى في</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr ng-repeat="form in forms.forms.data">
                            <td>
                                <div class="inline">
                                    <h4 class="inline margin-after-10">
                                        <a href="#!/forms/{{ form.id }}" class="text-underlined">
                                            {{ form.title }}</a>
                                    </h4>

                                    <span ng-if="!form.published" class="label label-warning">
                                        غير منشور
                                    </span>
                                    <span ng-if="form.archived" class="label label-danger">
                                        مؤرشف
                                    </span>
                                    <span ng-if="!form.archived && form._expired" class="label label-danger">
                                        منتهى
                                    </span>
                                </div>

                                <div class="dropdown inline">
                                    <button class="btn btn-xs btn-default dropdown-toggle" type="button"
                                            data-toggle="dropdown">
                                        <span class="caret"></span>
                                    </button>

                                    <ul class="dropdown-menu">
                                        <li>
                                            <a ng-click="formOptions.preview(form)" href="">
                                                <i class="fa fa-window-maximize"></i> فتح
                                            </a>
                                        </li>

                                        <li>
                                            <a ng-click="formOptions.share(form)" href="">
                                                <i class="fa fa-send"></i> مشاركة
                                            </a>
                                        </li>

                                        <li ng-if="form._manageable">
                                            <a href="#!/forms/{{ form.id }}/edit">
                                                <i class="fa fa-pencil"></i> تعديل
                                            </a>
                                        </li>

                                        <li ng-if="form._manageable && !form.published" class="bg-success">
                                            <a ng-click="formOptions.publish(form)" href="">
                                                <i class="fa fa-check-square-o"></i> نشر
                                            </a>
                                        </li>

                                        <li ng-if="form._manageable && form.published" class="bg-warning">
                                            <a ng-click="formOptions.unpublish(form)" href="">
                                                <i class="fa fa-ban"></i> إلغاء النشر
                                            </a>
                                        </li>

                                        <li ng-if="form._manageable && !form.archived" class="bg-warning">
                                            <a ng-click="formOptions.archive(form)" href="">
                                                <i class="fa fa-archive"></i> ارشفة
                                            </a>
                                        </li>

                                        <li ng-if="form._manageable && form.archived" class="bg-success">
                                            <a ng-click="formOptions.unarchive(form)" href="">
                                                <i class="fa fa-check-square"></i> إلغاء الأرشفة
                                            </a>
                                        </li>

                                        <li ng-if="form._manageable" class="bg-danger">
                                            <a ng-click="formOptions.delete(form)" href="">
                                                <i class="fa fa-trash"></i> حذف
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                            </td>

                            <td>{{ form._numEntries }}</td>

                            <td>{{ form.campaign ?form.campaign.name :'--' }}</td>

                            <td>
                                <span ng-if="form.expires_at">{{ form._expiresAt }}</span>
                                <span ng-if="!form.expires_at">--</span>
                            </td>

                        </tr>
                        </tbody>
                    </table>
                </div>

                
                <pagination data="forms.forms" loader="forms.paginate"></pagination>
            </div>

        </div>
    </div></script>
            <script type="text/ng-template" id="forms/edit.html"><loading-indicator ng-if="form === null"></loading-indicator>

    <div ng-if="form !== null" class="block style4">
        <div class="block-title">
            <span class="title">{{ form.title }}</span>

            <div class="side">
                <button ng-click="formOptions.preview()" ng-disabled="ajaxRequestInProgress" class="btn btn-sm btn-primary">
                    <i class="fa fa-window-maximize"></i> فتح
                </button>

                <a href="#!/forms/{{ form.id }}" class="btn btn-sm btn-info">
                    <i class="fa fa-users"></i> عرض
                </a>

                <a href="#!/forms" class="btn btn-sm btn-default">
                    <i class="fa fa-chevron-right"></i> عودة
                </a>
            </div>
        </div>

        <div class="block-body">
            
            <div ng-if="form.archived" class="alert alert-warning">
                <i class="fa fa-exclamation-triangle"></i>
                رجاءاً لاحظ ان هذا النموذج قد تم ارشفته، أي تعديلات تقوم بها لن تكون فعالة حتى يتم إلغاء الأرشفة ونشر النموذج مرة آخرى.

                <div class="margin-top-15">
                    <button ng-click="formOptions.unarchive()" class="btn btn-sm btn-default">
                        <i class="fa fa-check-circle"></i>
                        نشر
                    </button>
                </div>
            </div>
            
            
            <div ng-if="!form.published" class="alert alert-info">
                <i class="fa fa-exclamation-triangle"></i>
                رجاءاً لاحظ ان هذا النموذج غير منشور بعد، أي انه غير متاح لأي أحد. بعد الإنتهاء من تحديد حقول النموذج وضبط إعداداته قم بالضغط على خيار النشر. بعدها يمكنك نشر رابط النموذج أينما أردت.

                <div class="margin-top-15">
                    <button ng-click="formOptions.publish()" class="btn btn-sm btn-primary">
                        <i class="fa fa-check-circle"></i> نشر
                    </button>
                </div>
            </div>

            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="" data-toggle="tab" data-target="#setupTab">
                        <i class="icon fa fa-sliders"></i>
                        <span class="title">الإعدادات</span>
                    </a>
                </li>
                <li>
                    <a href="" data-toggle="tab" data-target="#fieldsTab">
                        <i class="icon fa fa-bars"></i>
                        <span class="title">الحقول</span>
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="active tab-pane" id="setupTab">
                    <form name="editForm">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6">

                
                <div class="form-group">
                    <label>العنوان *</label>
                    <input ng-model="form.title" name="title" class="form-control input-lg" required/>
                </div>

                
                <div class="form-group">
                    <label>الحملة التسويقية</label>
                    <div class="help-block">
                        الحملة التسويقية المرتبطة بهذا النموذج. جميع العملاء المحتملين الذين سيتم جمعهم من خلال هذا النموذج سيتم ربطهم مع هذه الحملة.
                    </div>
                    <select ng-model="form.campaign_id"
                            ng-disabled="data.campaigns.length == 0"
                            ng-options="campaign.id as campaign.name for campaign in data.campaigns"
                            class="form-control">
                        <option value="">&nbsp;</option>
                    </select>
                </div>

                <div class="row">
                    
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label>اللغة</label>
                            <select ng-model="form.locale" class="form-control">
                                <option value="">
                                    الإفتراضية للنظام
                                </option>
                                <option value="en">English</option>
                                <option value="ar">العربية</option>
                            </select>
                        </div>
                    </div>

                    
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label>ينتهى في</label>
                            <input datetime-picker="setup.expiresAt.pickerOptions"
                                   datetime-model="form.expires_at" dir="ltr"
                                   name="expires_at" class="form-control" />
                        </div>
                    </div>
                </div>

                
                <div class="form-group">
                    <label>
                        رسالة نجاح الإرسال
                    </label>
                    <div class="help-block">
                        الرسالة التي يجب ان تظهر للزائر بعد ملئ النموذج. يمكنك ترك هذه الخانة فارغة، وستظهر رسالة إفتراضية.
                    </div>

                    <textarea ng-editor="{'height': 150}" ng-editor-profile="minimal"
                              ng-model="form.submit_success_message" id="form_submit_success_message"
                              name="submit_success_message" class="form-control"
                              rows="4"></textarea>
                </div>

                
                <div class="form-group">
                    <label>
                        رد تلقائي بعد الإرسال
                    </label>
                    <div class="help-block">
                        رد تلقائي خياري يتم إرساله لصاحب الطلب بعد إرسال النموذج. عبر البريد او الـ SMS او WhatsApp.
                    </div>

                    <textarea ng-editor="{'height': 150}" ng-editor-profile="minimal"
                        ng-model="form.submit_auto_reply" id="submit_auto_reply"
                        name="submit_auto_reply" class="form-control"
                        rows="4"></textarea>
                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="block style2">
                    <div class="block-body">
                        <div class="checkbox">
                            <label>
                                <input ng-model="form.saved_lead_full_phone_number" type="checkbox"/>
                                حفظ رقم الهاتف كامل (شامل كود الدولة) للعملاء المحتملين
                            </label>
                        </div>

                                            </div>
                </div>

                <div class="form-group">
                    <label>وصف قصير</label>
                    <div class="help-block">
                        المعلومات او الملحوظات التي ستظهر أعلي النموذج. يمكنك ترك أي ملحوظات أو توضيحات للخطوات التالية في هذه الخانة.
                    </div>

                    <textarea id="formDescription" ng-model="form.description"
                          ng-editor="{'height': 200}" ng-editor-profile="minimal"></textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                    <button ng-click="save()" ng-disabled="editForm.$invalid || ajaxRequestInProgress" type="submit"
                            class="btn btn-primary">
                        <i class="fa fa-check-circle"></i> حفظ
                    </button>
                    <button ng-click="formOptions.preview()" ng-disabled="ajaxRequestInProgress" class="btn btn-default">
                        <i class="fa fa-window-maximize"></i> عرض
                    </button>
                </div>
            </div>

        </div>
    </form>
                </div>

                <div class="tab-pane" id="fieldsTab">
                    <loading-indicator ng-if="fields.fields === null"></loading-indicator>

    
    <div ng-if="fields.fields !== null && fields.fields.length == 0" class="alert alert-info">
        <i class="fa fa-info-circle"></i>
        لم يتم تحديد حقول النموذج بعد. الحقول تمثل المعلومات التي تريد طلبها من الزائر او جمعها عنه.

        <div class="margin-top-15">
            <button ng-click="fields.add()" class="btn btn-sm btn-primary">
                <i class="fa fa-plus-circle"></i>
                إضافة الحقل الأول
            </button>
        </div>
    </div>

    
    <div ng-if="fields.fields !== null && fields.fields.length > 0">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-5 col-md-offset-1">
                <form name="fieldsForm">
                    <div ng-if="fields.fields.length > 4" class="margin-bottom-15">
                        <button ng-click="fields.save()" ng-disabled="fieldsForm.$invalid || ajaxRequestInProgress"
                                class="btn btn-primary">
                            <i class="fa fa-check"></i> حفظ
                        </button>
                    </div>

                    <div ui-sortable="setup.fields.sortingOptions" ng-model="fields.fields" id="fieldsList">
                        <div ng-repeat="field in fields.fields track by $index"
                             class="field block style2">

                            <div class="block-body flex flex-space-between flex-margin-items-15">
                                
                                <div style="flex: 1">
                                    <div class="form-group">
        <input ng-model="field.label" type="text" class="form-control"
               placeholder="Label" required/>
    </div>

    
    <div class="form-group flex flex-margin-items-15 flex-align-items-center">
        <div class="flex-grow-1">
            <select ng-model="field.type" ng-change="fields.onTypeSelect(field)"
                    class="form-control" required>
                <optgroup ng-repeat="(group, options) in data.fieldTypes"
                          label="{{ trans('field_type_groups.' + group) }}">
                    <option ng-repeat="t in data.fieldTypes[group]" ng-value="t.name">
                        {{ t.label }}
                    </option>
                </optgroup>
            </select>
        </div>

        <div ng-if="fields.canHasProps(field)">
            <button ng-click="fields.props(field)" uib-tooltip="خيارات"
                    class="btn btn-sm btn-default icon-only">
                <i class="fa fa-cog"></i>
            </button>
        </div>

        <div>
            <div class="checkbox-inline">
                <label>
                    <input ng-model="field.required" type="checkbox" />
                    إلزامي
                </label>
            </div>
        </div>
    </div>

    
    <div ng-if="field.type == 'options'" class="form-group margin-bottom-0">
        <label>الخيارات</label>
        <div class="help-block">الخيارات المتاح الاختيار منها. كل خيار في سطر جديد</div>

        <textarea ng-model="field.options" rows="5" class="form-control"
                  required></textarea>
    </div>                                </div>

                                
                                <div class="side-options">
                                    <i uib-tooltip="تحريك" class="option moveHandle fa fa-arrows-v margin-5 text-primary"></i>
                                    <i ng-click="fields.remove(field)" disable-on-ajax class="option fa fa-remove margin-5 text-danger"></i>
                                </div>
                            </div>

                        </div>

                        
                        <div class="block style2">
                        	<div class="block-body text-center">
                                <button ng-click="fields.add()" class="btn btn-sm btn-primary" type="button">
                                    <i class="fa fa-plus-circle"></i>
                                    حقل جديد
                                </button>
                        	</div>
                        </div>
                    </div>

                    <div class="text-center margin-top-50">
                        <button ng-click="fields.save()" ng-disabled="fieldsForm.$invalid || ajaxRequestInProgress" class="btn btn-success">
                            <i class="fa fa-check"></i> حفظ
                        </button>
                        <button ng-click="formOptions.preview()" ng-disabled="fieldsForm.$invalid || ajaxRequestInProgress"
                                class="btn btn-default" type="button">
                            <i class="fa fa-window-maximize"></i> فتح
                        </button>
                    </div>
                </form>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-offset-1 col-md-5 col-lg-5">
                <div id="fields-hints" class="block style2">
                	<div class="block-title">
                        <i class="icon fa fa-life-ring"></i>
                		<span class="title">
                            الدليل
                        </span>
                	</div>

                	<div class="block-body padding-20" style="max-height: 450px; overflow-y: auto">
                        <ul class="list-compact text-muted text-justify">
                            <li>هنا تقوم بتحديد الحقول الخاصة بالنموذج، وهى تمثل المعلومات التي تريد جمعها او طلبها من
				الزائر. يمكنك إضافة أي عدد من حقول المعلومات، كما يمكنك إختيار ان يكون الحقل إزامي.</li>
                            <li>هناك أكثر من نوع من الحقول، إختر النوع المناسب لصيغة وطول المعلومة التي تريد تسجيلها.</li>
                            <li class="text-strong">أنواع الحقول مثل "الإسم" و "رقم الهاتف" و "البريد الإلكتروني" هي انواع خاصة ومحفوظة
				للنظام، حيث يستخدمها لإنشاء ملف للعميل المحتمل علي النظام.

				هذه الحقول ليست إلزمامية في حال انك لا تريد جمع معلومات الزائر أو إضافة معلوماته إلي قاعدة البيانات.
				ولكنها ضرورية إذا كنت تخطط عكس ذلك، لابد من إضافة حقلي الإسم ورقم الهاتف أو البريد الإلكتروني، ويجب أن يكونوا إلزاميين.</li>
                            <li>
					إذا كنت تريد ان يختار الزائر من قائمة الدورات، فلابد من إضافة حقول الإسم ورقم الهاتف او البريد الإلكتروني،
					ولكن ايضاً لابد من إضافة حقل "الدورة"، والذي سيعرض على الزائر قائمة الدورات ليختار منها.</li>
                            <li>قم بنشر النموذج فقط بعد تحديد جميع الحقول وإختيار الإعدادات المناسبة. بعدها
				يمكنك نشر النموذج على الموقع او حسابات الشبكات الإجتماعية.</li>
                            <li class="text-strong">أي تغيرات تقوم بها يجب حفظها اولاً حتى تصبح متاحة مع الزائر او عند عرض النموذج.
                                أيضاً تذكر ان تقوم بالحفظ قبل ترك الصفحة أو إعلاق التبويب او المتصفح.</li>
                            <li>حذف حقل من النموذج ينتج عنه حذف اي معلومات مرتبطة بهذا الحقل من المعلومات التي تم إستقبالها</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
                </div>
            </div>
        </div>
    </div></script>
            <script type="text/ng-template" id="forms/view.html"><loading-indicator ng-if="form === null"></loading-indicator>

    
    <div ng-if="form !== null" class="block style4">
    	<div class="block-title">
    		<span class="title">{{ form.title }}</span>

            <div class="side">
                <a href="#!/forms" class="btn btn-xs btn-default">
                    <i class="fa fa-chevron-right"></i> عودة
                </a>
            </div>
    	</div>

    	<div class="block-body">
            
            <div ng-if="form._createdAtAnotherBranch" class="alert alert-info">
                <i class="fa fa-exclamation-triangle text-danger"></i>
                رجاءاً لاحظ ان هذا النموذج تم إضافته علي فرع آخر مختلف ({{ form.branch.name }}),
		ولكنه يظهر لك هنا لأنه غير حصري لهذا الفرع, ويجمع معلومات ليس لهذا الفرع فقط ولكن لجميع الفروع.
		ولكن المخدلات التي ستظهر لك هي خاصة بهذا الفرع فقط! وهي التي قام فيها الزائر بإختيار هذا الفرع عند الإرسال.
            </div>

            
            <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6">

            <dl class="dl-horizontal">
                <dt>الحالة</dt>
                <dd>
                    <span ng-if="!form.archived && form.published" class="label label-success">
                        منشور
                    </span>
                    <span ng-if="!form.archived && !form.published" class="label label-warning">
                        غير منشور
                    </span>
                    <span ng-if="form.archived" class="label label-danger">
                        global/marketing/forms.form_archived
                    </span>
                </dd>

                <dt>
                    الحملة التسويقية
                    <popover content="الحملة التسويقية المتربط بها هذا النموذج. جميع العملاء المحتملين الذين سيتم إنتاجهم سيتم ربطهم بهذه الحملة."></popover>
                </dt>
                <dd>{{ form.campaign ?form.campaign.name :'--' }}</dd>

                <dt>ينتهى في</dt>
                <dd>
                    <div ng-if="!form.expires_at">غير محدد</div>

                    <div ng-if="form.expires_at">
                        <span dir="ltr">{{ form._expiryDate }}</span>
                        <div class="text-muted small">{{ form._expiresAt }}</div>
                    </div>
                </dd>

                <dt>وقت الإضافة</dt>
                <dd><span dir="ltr">{{ form.created_at | datetime }}</span></dd>
            </dl>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-6">
        	<dl class="dl-horizontal">

                <dt>
                    عدد المدخلات
                    <popover content="جميع المدخلات المرسلة، لجميع الفروع، في حال ان النموذج غير حصري لهذا الفرع"></popover>
                </dt>
                <dd>{{ form._numEntries }}</dd>

                                    <dt>
                        اتمتة المبيعات
                        <popover content="قواعد الأتمتة التي تقوم بمهام فريق المبيعات وحتى تتولى توزيع العملاء المحتملين الجدد الصادرين من على هذا النموذج بشكل اوتوماتيكي"></popover>
                    </dt>
                    <dd>
                        
                        <div ng-if="!form.automation_rules.length">
                            <a href="/marketing/sa?trigger=marketing_forms_new_entry&add"
                               class="btn btn-xs btn-primary">
                                <i class="fa fa-wrench"></i> ضبط
                            </a>
                        </div>

                        <ul ng-if="form.automation_rules.length > 0" class="list-compact">
                            <li ng-repeat="rule in form.automation_rules">
                                <a href="{{ rule.view_url }}" target="_blank" class="text-underlined">
                                    {{ rule.name | cut:20 }}</a>
                            </li>
                        </ul>
                    </dd>
                            </dl>
        </div>
    </div>

    <div class="margin-top-bottom-50 text-center">

        <a ng-click="formOptions.preview()" href="" class="btn btn-sm btn-primary">
            <i class="fa fa-window-maximize"></i> فتح
        </a>

        <a ng-click="formOptions.share()" href="" class="btn btn-sm btn-info">
            <i class="fa fa-send"></i> مشاركة
        </a>

        <a ng-if="form._manageable" href="#!/forms/{{ form.id }}/edit" class="btn btn-sm btn-default">
            <i class="fa fa-pencil"></i> تعديل النموذج
        </a>

        <a ng-if="form._manageable && !form.published" ng-click="formOptions.publish(form)" href="" class="btn btn-sm btn-success">
            <i class="fa fa-check-square-o"></i> نشر
        </a>

        <a ng-if="form._manageable && form.published" ng-click="formOptions.unpublish(form)" href="" class="btn btn-sm btn-warning">
            <i class="fa fa-ban"></i> إلغاء النشر
        </a>

        <a ng-if="form._manageable && !form.archived" ng-click="formOptions.archive(form)" href="" class="btn btn-sm btn-warning">
            <i class="fa fa-archive"></i> ارشفة
        </a>

        <a ng-if="form._manageable && form.archived" ng-click="formOptions.unarchive(form)"
           href="" class="btn btn-sm btn-default">
            <i class="fa fa-check-square"></i> إلغاء الأرشفة
        </a>

        <a ng-if="form._manageable" ng-click="formOptions.delete(form)" href="" class="btn btn-sm btn-danger icon-only">
            <i class="fa fa-trash"></i>
        </a>

    </div>
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="" data-toggle="tab" data-target="#entriesTab">
                        <i class="icon fa fa-inbox"></i>
                        <span class="title">المدخلات</span>
                    </a>
                </li>
                <li>
                    <a href="" data-toggle="tab" data-target="#insightsTab">
                        <i class="icon fa fa-pie-chart"></i>
                        <span class="title">إحصاءات</span>
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="active tab-pane" id="entriesTab">
                    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <form name="filtersForm" class="block style2">
    	<div class="block-title">
            <i class="icon fa fa-filter"></i>
    		<span class="title">فلترة</span>
    	</div>

        <div class="block-body" style="height: 550px; overflow: auto">
            
            <div class="form-group">
                <label>
                    وقت الاستلام
                </label>
                <time-span-selector options="entries.filtering.timeRange.options"
                                    setter="entries.filtering.timeRange.setter">
                </time-span-selector>
            </div>

            
            <div ng-show="form._generatesLeads" class="form-group">
                <label>
                    تعيين العملاء على المبيعات
                </label>
                <select ng-model="entries.filtering.params.owner" class="form-control">
                    <option ng-value="'any'">عرض جميع العملاء، المعين والغير معين بعد</option>
                    <option ng-value="'assigned'">العملاء المعينين فقط</option>
                    <option ng-value="'unassigned'">الغير معينين بعد فقط</option>
                    <option ng-repeat="u in data.owners" ng-value="u.id">
                        المعينين لـ  {{ u.name }}</option>
                </select>
            </div>

            <hr style="margin-left: -15px; margin-right: -15px"/>

            
            <div ng-repeat="field in entries.filtering.data.fields" class="form-group">
                <label class="text-primary">{{ field.label }}</label>

                
                <input ng-if="['leadName', 'leadPhoneNumber', 'leadEmail', 'text', 'longText', 'number'].indexOf(field.type) >= 0 || field.is_extra_info_field"
                       ng-model="entries.filtering.params.fields[field.id]"
                       type="text" class="form-control"/>

                
                <select ng-if="field.type == 'options'"
                        ng-options="option as option for (i, option) in field.options"
                        ng-model="entries.filtering.params.fields[field.id]"
                        class="form-control">
                    <option value="">&nbsp;</option>
                </select>

                
                <select ng-if="field.type == 'yesNo'"
                        ng-options="option as option for (i, option) in ['Yes', 'No']"
                        ng-model="entries.filtering.params.fields[field.id]"
                        class="form-control">
                    <option value="">&nbsp;</option>
                </select>

                
                <course-menu ng-if="field.type == 'course'" setup="entries.filtering.coursePicker"></course-menu>

                
                <path-menu ng-if="field.type == 'path'" setup="entries.filtering.pathPicker"></path-menu>
            </div>

            <hr style="margin-left: -15px; margin-right: -15px"/>

            
            <div class="form-group">
                <button ng-click="entries.filtering.users.toggleAll()" style="margin-top: -5px"
                        class="btn btn-xs btn-default onSide">
                    <i class="fa fa-check-circle"></i> إختيار الكل
                </button>

                <label>
                    من إنتائج
                </label>
                <div class="checkboxes-holder" style="max-height: 200px; overflow: auto">
                    <div class="checkbox">
                        <label>
                            <input checklist-model="entries.filtering.params.users" checklist-value="'none'"
                                   type="checkbox"/>
                            <b>[جميع المستخدمين]</b>
                        </label>
                    </div>

                    <div ng-repeat="user in entries.filtering.data.users" class="checkbox">
                        <label>
                            <input checklist-model="entries.filtering.params.users"
                                   checklist-value="user.id" type="checkbox"/> {{ user.name }}
                        </label>
                    </div>
                </div>
            </div>

            
            <div ng-if="form._generatesLeads" class="form-group">
                <div class="checkbox">
                    <label>
                        <input ng-model="entries.filtering.params.nonDispatchedOnly" type="checkbox"/>
                        عرض فقط المنتظرين التوزيع
                    </label>
                </div>
            </div>
        </div>

        <div class="block-footer">
            <button ng-click="entries.filter()" type="submit" class="btn btn-primary">
                <i class="fa fa-search"></i> بحث
            </button>
        </div>
    </form>        </div>

        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
            <loading-indicator ng-if="entries.entries === null"></loading-indicator>

    
    <div ng-if="entries.entries !== null && entries.entries.data.length == 0" class="alert alert-info noMargin">
        <i class="fa fa-info-circle"></i>
        لم يتم العثور على مدخلات تطابق البحث. جرب تغيير مساحة الوقت المحددة.
    </div>

    
    <div ng-if="entries.entries !== null && entries.entries.data.length > 0" class="block style2">
        <div ng-if="form.generates_leads" class="block-title">
            <span class="title">&nbsp;</span>
            <form action="{{ formOptions.getExportUrl() }}" method="POST" class="side">
                <input type="hidden" name="_token" value="6I8KuRvpEnoyRVC225dOQkQoGVsawtWiBQaPkLMj">                <input name="params" value="{{ entries.filtering.getParams() }}" type="hidden"/>

                <button class="btn btn-sm btn-default">
                    <i class="fa fa-print"></i> تصدير
                </button>
            </form>
        </div>

        <div class="block-body" style="height: 550px; overflow: auto">
            <div class="table-responsive" style="height: 100%; overflow: initial">
                <table class="table table-auto-full-width">
                    <thead>

                    <tr>
                        <th width="15px">
                            <input ng-change="entries.selected.toggleSelectAll()"
                                   ng-model="entries.selected.allSelected" type="checkbox"/>
                        </th>
                        <th ng-if="form.generates_leads">العميل المحتمل</th>
                        <th width="75px"></th>
                        <th ng-if="form.generates_leads">
                            تم التوزيع
                        </th>
                        <th ng-if="form.generates_leads">
                            معين لـ
                        </th>
                        <th ng-repeat="field in entries.fields" style="min-width: 180px; max-width: 180px; overflow-wrap: break-word; white-space: normal">
                            {{ field.label }}
                        </th>
                        <th>الوقت</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr ng-repeat="entry in entries.entries.data track by entry.id">

                        <td>
                            <input checklist-model="entries.selected.entries" checklist-value="entry.id"
                                   type="checkbox"/>
                        </td>

                        
                        <td ng-if="form.generates_leads" class="cell-wrap">
                            <a href="{{ entry.lead.view_url }}" class="btn btn-xs btn-default icon-only onSide" target="_blank">
                                <i class="fa fa-user"></i>
                            </a>

                            <a ng-click="entries.view(entry)" href="" class="text-underlined">
                                {{ entry.lead.name }}
                            </a>

                            <span ng-if="entry.lead._converted" class="label label-success">
                                مُحول
                            </span>

                            <ul class="list-inline small text-muted margin-top-5">
                                <li><i class="fa fa-phone"></i> {{ entry.lead.phone_number || '--' }}</li>
                                <li><i class="fa fa-envelope-o"></i> {{ entry.lead.email || '--' }}</li>
                            </ul>
                        </td>

                        <td style="min-width: 70px !important;">
                            <div class="btn-group btn-group-xs">
                                <button ng-if="form.generates_leads && !entry.dispatchment" ng-click="entries.dispatch(entry)"
                                        uib-tooltip="Dispatch the generated lead"
                                        class="btn btn-default icon-only">
                                    <i class="fa fa-map-signs"></i>
                                </button>
                                <button ng-click="entries.delete(entry)" class="btn btn-danger icon-only">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </td>

                        
                        <td ng-if="form.generates_leads">
                            <span ng-if="!entry.dispatchment">
                                <i class="fa fa-hourglass-half"></i> ليس بعد
                            </span>

                            <span ng-if="entry.dispatchment">
                                <i class="fa fa-check-circle text-success"></i>
                                {{ trans(['dispatchment', 'dispatch_channels', entry.dispatchment.to]) }}
                            </span>
                        </td>

                        
                        <td ng-if="form.generates_leads">
                            {{ entry.lead.owner ?entry.lead.owner.name :'--' | cut:15 }}
                        </td>

                        <td ng-repeat="field in entries.fields">
                            {{ entries.getFieldAnswer(entry, field) || '--' }}
                        </td>

                        <td>
                            <span dir="ltr">{{ entry.created_at_formatted }}</span>
                        </td>

                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="block-footer padding-0">
            
            <pagination data="entries.entries" loader="entries.paginate"></pagination>
        </div>
        <div class="block-footer">
            <button ng-disabled="! entries.selected.hasAny() || ! form.generates_leads" ng-click="entries.selected.dispatch()" disable-on-ajax class="btn btn-sm btn-primary">
                <i class="fa fa-map-signs"></i>
                توزيع العملاء المحتملين
            </button>

            <!--
            <button ng-disabled="! entries.selected.hasAny() || ! form.has_path_field || ! form.generates_leads" ng-click="entries.selected.createPaths()"
                    uib-tooltip="سيتم إنشاء وبدء المسارات التدريبية التي إختارها كل عميل"
                    disable-on-ajax class="btn btn-sm btn-primary">
                <i class="fa fa-map-signs"></i>
                إنشاء المسارات المختارة
            </button>
            -->

            <button ng-disabled="! entries.selected.hasAny() || ! form.generates_leads" ng-click="entries.selected.assign()"
                    uib-tooltip="تعيين العملاء المحتملين المختارين لفريق المبيعات"
                    class="btn btn-sm btn-default" type="button">
                <i class="fa fa-user"></i>
                تعيين للمبيعات
            </button>

            <button ng-click="entries.selected.sendMessage() || ! form.generates_leads" ng-disabled="!entries.selected.hasAny()" disable-on-ajax class="btn btn-sm btn-default">
                <i class="fa fa-send"></i> إرسال رسالة
            </button>
        </div>
    </div>
        </div>
    </div>                </div>
                <div class="tab-pane" id="insightsTab">
                    <loading-indicator ng-if="insights.html === null"></loading-indicator>

    
    <div ng-bind-html="insights.html"></div>                </div>
            </div>

    	</div>
    </div></script>
        </div>
            </div>
</div>


<?php
// تضمين footer template
include_once __DIR__ . '/../templates/footer.php';
?>