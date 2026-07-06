<?php
// إعداد المتغيرات
$pageTitle = 'إرسال رسالة جديدة';
$includeSessionCheck = true;
$includeCSRFRefresh = true;

// تضمين القوالب
include_once __DIR__ . '/../templates/header.php';
include_once __DIR__ . '/../templates/sidebar.php';
?>

<div id="container" class="container-fluid">
<div id="content" class="">
                    <div id="pageTitle">
            <i class="icon fa fa-send"></i>
            <span class="title">إرسال رسالة جديدة</span>
        </div>

        
        <div ng-app="messagingApp" ng-controller="controller" class="ng-scope">
            <dismissible-hint name="messaging.create" class="ng-isolate-scope">
    <!-- ngIf: visible --><div ng-if="visible" class="dismissibleHint  d-flex flex-gap-15 align-items-center justify-content-between">
        <div class="d-flex flex-gap-20 align-items-center flex-grow-1">
            <!-- ngIf: icon || img --><div ng-if="icon || img" class="iconHolder hidden-xs ng-scope">
                <!-- ngIf: img -->
                <!-- ngIf: icon --><span ng-if="icon" class="ms icon ng-binding ng-scope">info</span><!-- end ngIf: icon -->
            </div><!-- end ngIf: icon || img -->

            <div class="content flex-grow-1">
                <ng-transclude>
                من هنا يمكنك إرسال رسائل جديد للعملاء أو المدربين أو حتى فريق العمل. إبدأ باختيار نوع الرسالة ثم
		قائمة المُستلمين. يمكنك الاختيار من قوائم مختلفة للعملاء والمتدربن. بعد إرسال الرسالة يمكنك معرفة تقدم
		الإرسال والنتائج من على صفحة سجل الرسائل.
            </ng-transclude>
            </div>
        </div>

        <div>
            <!-- ngIf: dismissible --><button ng-click="dismiss()" ng-if="dismissible" class="close ng-scope" type="button">
                <span>×</span>
            </button><!-- end ngIf: dismissible -->
        </div>
    </div><!-- end ngIf: visible --></dismissible-hint>

            
                            <div class="alert alert-warning flex flex-margin-items-15">
                    <div>
                        <i class="fa fa-2x fa-exclamation-triangle"></i>
                    </div>
                    <div>
                        رجاءاً لاحظ ان إرسال رسائل البريد الإلكتروني محدود ب <u>500</u> رسالة في اليوم. إذا
		كان هذا الحد غير مناسب يمكنك إستخدام خدمة طرف ثالث مثل Mailgun. لمعلومات ودعم أكثر تحدث إلينا في اي وقت.
                    </div>
                </div>
            
            <div class="block style2">
                <div class="block-body">
                    <messaging-sender setup="setup" class="ng-isolate-scope"><form name="newMessageForm" class="ng-pristine ng-valid ng-scope">
        
        <div class="row">
        <div class="control-label col-md-3">
            <label>نوع الرسالة</label>

            <div class="help-block">
                قم باختيار كيف سيتم إرسال هذه الرسالة للمُستلمين
            </div>
        </div>

        <div class="form-group col-md-9">
            <!-- ngRepeat: method in data.methods --><div ng-repeat="method in data.methods" class="checkbox ng-scope">
                <label>
                    <input checklist-value="method.name" ng-disabled="! methods.isAvailable(method.name)" type="checkbox" ng-model="checked" class="ng-scope ng-pristine ng-untouched ng-valid ng-empty" checklist-model="methods.selected">
                    <span class="ng-binding">البريد الإلكتروني</span>

                    
                    <!-- ngIf: method.name == 'sms' -->

                    
                    <!-- ngIf: method.name == 'whatsApp' -->
                </label>
            </div><!-- end ngRepeat: method in data.methods --><div ng-repeat="method in data.methods" class="checkbox ng-scope">
                <label>
                    <input checklist-value="method.name" ng-disabled="! methods.isAvailable(method.name)" type="checkbox" ng-model="checked" class="ng-scope ng-pristine ng-untouched ng-valid ng-empty" checklist-model="methods.selected" disabled="disabled">
                    <span class="ng-binding">رسائل SMS</span>

                    
                    <!-- ngIf: method.name == 'sms' --><span ng-if="method.name == 'sms'" class="margin-before-10 small ng-scope">
                        <!-- ngIf: !methods.sms.checked -->

    
    <!-- ngIf: methods.sms.checked && !methods.sms.enabled --><span ng-if="methods.sms.checked &amp;&amp; !methods.sms.enabled" class="text-warning ng-scope">
        غير مفعل أو لم يتم ضبطه
    </span><!-- end ngIf: methods.sms.checked && !methods.sms.enabled -->

    
    <!-- ngIf: methods.sms.checked && methods.sms.enabled && methods.sms.error -->

    
    <!-- ngIf: methods.sms.checked && methods.sms.enabled && !methods.sms.error && !methods.sms.hasCredit -->

    
    <!-- ngIf: methods.sms.checked && !methods.sms.error && methods.sms.hasCredit -->

    
    &nbsp;
    <span class="small">
        <a href="/admin/settings/sms">
            <i class="fa fa-cog"></i> ضبط
        </a>
        &nbsp;

        <!-- ngIf: methods.sms.checked --><a ng-click="methods.sms.check()" ng-if="methods.sms.checked" class="ng-scope">
            <i class="fa fa-refresh"></i>
            تحقق مرة أخرى
        </a><!-- end ngIf: methods.sms.checked -->
    </span>
                    </span><!-- end ngIf: method.name == 'sms' -->

                    
                    <!-- ngIf: method.name == 'whatsApp' -->
                </label>
            </div><!-- end ngRepeat: method in data.methods --><div ng-repeat="method in data.methods" class="checkbox ng-scope">
                <label>
                    <input checklist-value="method.name" ng-disabled="! methods.isAvailable(method.name)" type="checkbox" ng-model="checked" class="ng-scope ng-pristine ng-untouched ng-valid ng-empty" checklist-model="methods.selected" disabled="disabled">
                    <span class="ng-binding">WhatsApp</span>

                    
                    <!-- ngIf: method.name == 'sms' -->

                    
                    <!-- ngIf: method.name == 'whatsApp' --><span ng-if="method.name == 'whatsApp'" class="margin-before-10 small ng-scope">
                        <!-- ngIf: !methods.whatsApp.checked -->

    <!-- ngIf: methods.whatsApp.checked && methods.whatsApp.enabled -->

    
    <!-- ngIf: methods.whatsApp.checked && !methods.whatsApp.enabled --><span ng-if="methods.whatsApp.checked &amp;&amp; !methods.whatsApp.enabled" class="text-warning ng-scope">
        غير مفعل أو لم يتم ضبطه
    </span><!-- end ngIf: methods.whatsApp.checked && !methods.whatsApp.enabled -->

    
    <!-- ngIf: methods.whatsApp.checked && methods.whatsApp.enabled && !methods.whatsApp.authenticated -->

    
    <!-- ngIf: methods.whatsApp.checked && methods.whatsApp.enabled && !!methods.whatsApp.error -->

    &nbsp;
    <span class="small">
        
        <!-- ngIf: methods.whatsApp.checked --><a ng-if="methods.whatsApp.checked" href="/admin/settings/whatsApp" class="ng-scope">
            <i class="fa fa-cog"></i> ضبط
        </a><!-- end ngIf: methods.whatsApp.checked -->

        &nbsp;

        
        <!-- ngIf: methods.whatsApp.checked --><a ng-click="methods.whatsApp.check()" ng-if="methods.whatsApp.checked" class="ng-scope">
            <i class="fa fa-refresh"></i>
            تحقق مرة أخرى
        </a><!-- end ngIf: methods.whatsApp.checked -->
    </span>                    </span><!-- end ngIf: method.name == 'whatsApp' -->
                </label>
            </div><!-- end ngRepeat: method in data.methods --><div ng-repeat="method in data.methods" class="checkbox ng-scope">
                <label>
                    <input checklist-value="method.name" ng-disabled="! methods.isAvailable(method.name)" type="checkbox" ng-model="checked" class="ng-scope ng-pristine ng-untouched ng-valid ng-empty" checklist-model="methods.selected" disabled="disabled">
                    <span class="ng-binding">إشعارات هاتف</span>

                    
                    <!-- ngIf: method.name == 'sms' -->

                    
                    <!-- ngIf: method.name == 'whatsApp' -->
                </label>
            </div><!-- end ngRepeat: method in data.methods -->
        </div>
    </div>

    
    <!-- ngIf: methods.hasWhats() && methods.whatsApp.data.channels !== null -->

    
    <!-- ngIf: methods.hasWhats() && methods.whatsApp.templates.hasAny() -->

    
    <!-- ngIf: methods.hasWhats() && methods.whatsApp.isOfficial && ! methods.whatsApp.hasTemplatesListing -->

    
    <!-- ngIf: methods.hasEmail() -->

    
    <!-- ngIf: methods.hasAny() && !(methods.hasWhats() && methods.whatsApp.isOfficial) -->
        <hr>

        
        <div class="row">
        <div class="control-label col-md-3">
            <label>إلى (المستلمين)</label>

            <div class="help-block">
                قائمة الأفراد مٌستلمي هذه الرسالة
            </div>
        </div>

        <div class="form-group col-md-9">
            <!-- ngIf: !recipients.preselected.isSet() --><div ng-if="!recipients.preselected.isSet()" class="row margin-bottom-15 ng-scope">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <select ng-model="$parent.recipients.type" ng-options="type.name as type.label for type in data.recipientTypes track by type.name" ng-change="recipients.onTypeChange()" class="form-control ng-pristine ng-untouched ng-valid ng-empty"><option value="?" selected="selected"></option><option label="عملاء\متدربين" value="clients">عملاء\متدربين</option><option label="المدربين" value="instructors">المدربين</option><option label="فريق العمل" value="staff">فريق العمل</option><option label="العملاء المحتملين" value="leads">العملاء المحتملين</option></select>
                </div>
            </div><!-- end ngIf: !recipients.preselected.isSet() -->

            
            <!-- ngIf: recipients.type == 'clients' && recipients.list.recipients === null -->

            
            <!-- ngIf: recipients.type == 'leads' && recipients.list.recipients === null -->

            
            <!-- ngIf: recipients.list.loading -->

            
            <!-- ngIf: recipients.list.recipients.length == 0 -->

            
            <!-- ngIf: recipients.list.recipients.length > 0 -->
        </div>
    </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-9">
                <button ng-click="sending.send()" ng-icon="send" ng-disabled="!methods.hasAny() || newMessageForm.$invalid || $root.ajaxRequestInProgress" class="btn btn-primary" disabled="disabled"><i class="fa fa-send"></i>
                    إرسال
                    <!-- ngIf: recipients.list.recipients.length > 0 -->
                </button>
            </div>
        </div>
    </form>

    
    <script type="text/ng-template" id="recipientsList.html" class="ng-scope">
        <div class="block style2">
        <div class="block-title">
            <div class="side">
                <button ng-click="recipients.list.toggleAll()" type="button" class="btn btn-xs btn-default">
                    <i class="fa fa-check-square"></i>
                    اختيار الكل
                </button>

                <button ng-if="recipients.type == 'clients' && !recipients.preselected.isSet()"
                        ng-click="recipients.changeClientsGroup()" class="btn btn-xs btn-default">
                    <i class="fa fa-users"></i>
                    تغيير قائمة العملاء
                </button>
            </div>

            <span class="title">
                {{ trans(['message_targets', recipients.targetType]) }}
            </span>

            
            <div ng-if="recipients.targetInfo" class="sub-title">
                <h4>{{ recipients.targetInfo.name }}</h4>
            </div>
        </div>

        <div class="block-body">
            <div class="table-responsive" style="max-height: 400px; overflow: auto">
                <table class="table">
                    <thead>
                    <tr>
                        <th width="10px"></th>
                        <th>مسلتم الرسالة</th>
                        <th>معلومات التواصل</th>

                        <th ng-if="methods.hasSms()" width="20px"><i class="fa fa-comment"></i></th>
                        <th ng-if="methods.hasEmail()" width="20px"><i class="fa fa-envelope"></i></th>
                        <th ng-if="methods.hasWhats()" width="20px"><i class="fa fa-whatsapp"></i></th>
                        <th ng-if="methods.hasPush()" width="20px"><i class="fa fa-mobile-phone"></i></th>

                        <th width="20px"></th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr ng-repeat="r in recipients.list.recipients track by $index"
                        ng-class="{'bg-danger': !recipients.recipient.isContactable(r)}">

                        <td>
                            <input ng-model="r.selected" type="checkbox"/>
                        </td>

                        <td>
                            <a href="{{ r.viewUrl }}" target="_blank" class="text-underlined">
                                {{ r.recipient.name }}</a>
                        </td>

                        <td>
                            <ul class="list-inline small">
                                <li ng-if="r.recipient.phone_number">
                                    <i class="fa fa-phone"></i> {{ r.recipient.phone_number }}</li>
                                <li ng-if="r.recipient.email">
                                    <i class="fa fa-envelope-o"></i> {{ r.recipient.email }}</li>
                            </ul>

                            <span ng-if="!r.recipient.email && !r.recipient.phone_number">
                                غير محدد
                            </span>
                        </td>

                        <td ng-if="methods.hasSms()">
                            <i class="fa" ng-class="recipients.recipient.availabilityIcon(r, 'sms')"></i>
                        </td>

                        <td ng-if="methods.hasEmail()">
                            <i class="fa" ng-class="recipients.recipient.availabilityIcon(r, 'email')"></i>
                        </td>

                        <td ng-if="methods.hasWhats()">
                            <i class="fa" ng-class="recipients.recipient.availabilityIcon(r, 'whatsApp')"></i>
                        </td>

                        <td ng-if="methods.hasPush()">
                            <i class="fa" ng-class="recipients.recipient.availabilityIcon(r, 'pushNotification')"></i>
                        </td>

                        <td>
                            <button ng-click="recipients.recipient.remove(r)" class="btn btn-xs btn-default icon-only" type="button">
                                <i class="fa fa-remove"></i>
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>    </script></messaging-sender>
                </div>
            </div>
        </div>
            </div>
</div>

<?php
// تضمين footer template
include_once __DIR__ . '/../templates/footer.php';
?>
