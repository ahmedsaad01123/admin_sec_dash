<?php
// إعداد المتغيرات
$pageTitle = 'معلومات هوية المؤسسة';
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
            <i class="icon fa fa-sliders"></i>
            <span class="title">الإدارة</span>

                            
                <ul class="breadcrumb inline" style="margin: 0">
                    <li class="breadcrumb-item"></li>

                                            <li class="breadcrumb-item">معلومات هوية المؤسسة</li>
                                    </ul>
                    </div>

        <div class="d-flex justify-content-center">
            <div>
                
                            </div>
        </div>
    </div>
        <div ng-app="app" ng-controller="controller" class="row ng-scope">
            <div class="col-xs-12 col-sm-12 col-md-offset-2 col-md-8 col-lg-8">

                <div class="block style2">
                    <div class="block-body">

                        <div class="hint">
                            <i class="fa fa-info-circle"></i> هنا يمكنك إضافة معلومات أكثر عن هوية المؤسسة ومعلومات الإتصال المباشر أو عبر شبكات التواصل الإجتماعى.
		جميع الحقول بالأسفل خيارية، ولكن جميعها هام. هذه المعلومات ستظهر على واجهة الطلاب وايضاً على الموقع الإلكترونى ورسائل البريد الإلكترونى.

                                                    </div>

                        <form name="form" class="form-horizontal padding-20 ng-pristine ng-valid ng-valid-url">
                            <div class="row">
        <div class="control-label col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <label>الشعار</label>
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <input ng-model="identity.slogan" type="text" class="form-control ng-pristine ng-untouched ng-valid ng-empty">
        </div>
    </div>

    
    <div class="row">
        <div class="control-label col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <label>الموقع الإلكترونى</label>
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <input ng-model="identity.website" type="url" dir="ltr" class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-url">
        </div>
    </div>

    
    <div class="row">
        <div class="control-label col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <label>ارقام الهاتف الرئيسية</label>
            <div class="help-block">
                ارقام الهاتف الرئيسية الرسمية للمؤسسة
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <key-value-pairs ng-model="identity.phoneNumbers" names="{'key': 'label', 'value': 'number'}" labels="{'key': 'Label', 'value': 'Phone number'}" class="ng-pristine ng-untouched ng-valid ng-isolate-scope ng-not-empty">
    <div class="keyValuePairs">
        <!--New item-->
        <div class="flex flex-margin-items-15">
            <!--Key-->
            <!-- ngIf: multiLine === false --><input ng-if="multiLine === false" ng-model="newItem.key" ng-keypress="newItem.onEnter($event)" placeholder="Label" type="text" class="form-control input-sm ng-pristine ng-untouched ng-valid ng-scope ng-empty"><!-- end ngIf: multiLine === false -->

            <!-- ngIf: multiLine === true -->

            <!--Value-->

            <!-- ngIf: multiLine === true -->

            <!-- ngIf: multiLine === false --><input ng-if="multiLine === false" ng-model="newItem.value" ng-keypress="newItem.onEnter($event)" placeholder="Phone number" type="text" class="form-control input-sm ng-pristine ng-untouched ng-valid ng-scope ng-empty"><!-- end ngIf: multiLine === false -->

            <button ng-click="newItem.add()" ng-disabled="!newItem.key || !newItem.value" type="button" class="btn btn-xs btn-default icon-only" style="padding: 1px 10px" disabled="disabled">
                <i class="fa fa-plus"></i>
            </button>
        </div>

        <!--Empty-->
        <div ng-show="items.length == 0" class="small text-muted margin-top-10 ng-binding">
            إدخل المعلومات بالأعلى ثم إضغط Enter او على ايقونة الإضافة.
        </div>

        <!--Items list-->
        <ul ng-show="items.length &gt; 0" class="list-group ng-hide">
            <!-- ngRepeat: item in items track by $index -->
        </ul>
    </div>
</key-value-pairs>

            <div class="small text-muted margin-top-10">
                مثال، العنوان: Customer Support Line #1, الرقم: 010123456789
            </div>
        </div>
    </div>

    
    <div class="row">
        <div class="control-label col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <label>عناوين البريد الإلكترونى الرئيسية</label>
            <div class="help-block">
                عناوين البريد الإلكترونى الرئيسية للمؤسسة
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <key-value-pairs ng-model="identity.emails" names="{'key': 'label', 'value': 'email'}" labels="{'key': 'Label', 'value': 'Email address'}" class="ng-pristine ng-untouched ng-valid ng-isolate-scope ng-not-empty">
    <div class="keyValuePairs">
        <!--New item-->
        <div class="flex flex-margin-items-15">
            <!--Key-->
            <!-- ngIf: multiLine === false --><input ng-if="multiLine === false" ng-model="newItem.key" ng-keypress="newItem.onEnter($event)" placeholder="Label" type="text" class="form-control input-sm ng-pristine ng-untouched ng-valid ng-scope ng-empty"><!-- end ngIf: multiLine === false -->

            <!-- ngIf: multiLine === true -->

            <!--Value-->

            <!-- ngIf: multiLine === true -->

            <!-- ngIf: multiLine === false --><input ng-if="multiLine === false" ng-model="newItem.value" ng-keypress="newItem.onEnter($event)" placeholder="Email address" type="text" class="form-control input-sm ng-pristine ng-untouched ng-valid ng-scope ng-empty"><!-- end ngIf: multiLine === false -->

            <button ng-click="newItem.add()" ng-disabled="!newItem.key || !newItem.value" type="button" class="btn btn-xs btn-default icon-only" style="padding: 1px 10px" disabled="disabled">
                <i class="fa fa-plus"></i>
            </button>
        </div>

        <!--Empty-->
        <div ng-show="items.length == 0" class="small text-muted margin-top-10 ng-binding">
            إدخل المعلومات بالأعلى ثم إضغط Enter او على ايقونة الإضافة.
        </div>

        <!--Items list-->
        <ul ng-show="items.length &gt; 0" class="list-group ng-hide">
            <!-- ngRepeat: item in items track by $index -->
        </ul>
    </div>
</key-value-pairs>

            <div class="small text-muted margin-top-10">
                مثال، العنوان: Customer Support, البريد: support@company.com
            </div>
        </div>
    </div>

    
    <div class="row">
        <div class="control-label col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <label>رقم تسجيل ضريبة القيمة المضافة (VAT Number)</label>
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-3">
            <input ng-model="identity.vatNumber" type="text" dir="ltr" class="form-control ng-pristine ng-untouched ng-valid ng-empty">
        </div>
    </div>

    
    <div class="row">
        <div class="control-label col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <label>رابط سياسية الخصوصية على الموقع</label>
        </div>

        <div class="form-group col-xs-12 col-sm-12 col-md-5">
            <input ng-model="identity.privacyPolicyUrl" type="url" dir="ltr" placeholder="https://..." class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-url">
        </div>
    </div>

    <div class="row margin-bottom-0">
        <div class="control-label col-xs-12 col-sm-12 col-md-4 col-lg-4"></div>

        <div class="form-group margin-bottom-0 col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <button type="submit" ng-click="save()" class="btn btn-primary">
                <i class="fa fa-check"></i> حفظ
            </button>
        </div>
    </div>

    <hr>

    
    <div class="row">
        <div class="control-label col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <label>عنوان المقر الرئيسي</label>
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <textarea ng-model="identity.address" rows="2" class="form-control ng-pristine ng-untouched ng-valid ng-empty"></textarea>
        </div>
    </div>

    
    <div class="row">
        <div class="control-label col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <label>رابط عنوان المقر الرئيسي</label>
            <div class="help-block">
                الرابط الكامل لموقع المقر الرئيسى على الخريطة(Google Maps)
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <input ng-model="identity.googleMapsUrl" type="url" dir="ltr" class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-url">
        </div>
    </div>

    
    <div class="row">
        <div class="control-label col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <label>أعضاء مجلس الإدارة</label>
            <div class="help-block">
                أعضاء مجلس إدارة المؤسسة وألقابهم
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <key-value-pairs ng-model="identity.boardMembers" names="{'key': 'title', 'value': 'name'}" labels="{'key': 'Title', 'value': 'Name'}" class="ng-pristine ng-untouched ng-valid ng-isolate-scope ng-not-empty">
    <div class="keyValuePairs">
        <!--New item-->
        <div class="flex flex-margin-items-15">
            <!--Key-->
            <!-- ngIf: multiLine === false --><input ng-if="multiLine === false" ng-model="newItem.key" ng-keypress="newItem.onEnter($event)" placeholder="Title" type="text" class="form-control input-sm ng-pristine ng-untouched ng-valid ng-scope ng-empty"><!-- end ngIf: multiLine === false -->

            <!-- ngIf: multiLine === true -->

            <!--Value-->

            <!-- ngIf: multiLine === true -->

            <!-- ngIf: multiLine === false --><input ng-if="multiLine === false" ng-model="newItem.value" ng-keypress="newItem.onEnter($event)" placeholder="Name" type="text" class="form-control input-sm ng-pristine ng-untouched ng-valid ng-scope ng-empty"><!-- end ngIf: multiLine === false -->

            <button ng-click="newItem.add()" ng-disabled="!newItem.key || !newItem.value" type="button" class="btn btn-xs btn-default icon-only" style="padding: 1px 10px" disabled="disabled">
                <i class="fa fa-plus"></i>
            </button>
        </div>

        <!--Empty-->
        <div ng-show="items.length == 0" class="small text-muted margin-top-10 ng-binding">
            إدخل المعلومات بالأعلى ثم إضغط Enter او على ايقونة الإضافة.
        </div>

        <!--Items list-->
        <ul ng-show="items.length &gt; 0" class="list-group ng-hide">
            <!-- ngRepeat: item in items track by $index -->
        </ul>
    </div>
</key-value-pairs>

            <div class="small text-muted margin-top-10">
                مثال، اللقب: مدير عام، الإسم: احمد محمد
            </div>
        </div>
    </div>

    <hr>

    
    <div class="row">
        <div class="control-label col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <label>حسابات مواقع السوشيال ميديا</label>
            <div class="help-block">
                حسابات المؤسسة الرسمية على مواقع السوشيال ميديا(روابط كاملة)
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-8 col-lg-8">
            
            <div class="input-group margin-bottom-10">
                <span class="input-group-addon">Facebook</span>
                <input ng-model="identity.facebook" type="url" class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-url" dir="ltr">
            </div>

            
            <div class="input-group margin-bottom-10">
                <span class="input-group-addon">Instagram</span>
                <input ng-model="identity.instagram" type="url" class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-url" dir="ltr">
            </div>

            
            <div class="input-group margin-bottom-10">
                <span class="input-group-addon">Messenger</span>
                <input ng-model="identity.messenger" type="url" class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-url" dir="ltr">
            </div>

            
            <div class="input-group margin-bottom-10">
                <span class="input-group-addon">Twitter (X)</span>
                <input ng-model="identity.twitter" type="url" class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-url" dir="ltr">
            </div>

            
            <div class="input-group margin-bottom-10">
                <span class="input-group-addon">TikTok</span>
                <input ng-model="identity.tiktok" type="url" class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-url" dir="ltr">
            </div>

            
            <div class="input-group margin-bottom-10">
                <span class="input-group-addon">Linkedin</span>
                <input ng-model="identity.linkedin" type="url" class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-url" dir="ltr">
            </div>

            
            <div class="input-group">
                <span class="input-group-addon">Youtube قناة</span>
                <input ng-model="identity.youtube" type="url" class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-url" dir="ltr">
            </div>
        </div>
    </div>

    <hr>

    <div class="margin-top-20 row">
        <div class="control-label col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <label>معرف صفحة Facebook</label>
            <div class="help-block">
                معرف Id الخاص بصفحة Facebook الأساسية
            </div>
        </div>

        <div class="form-group col-xs-12 col-sm-12 col-md-4">
            <input ng-model="identity.facebookPageId" type="text" dir="ltr" class="form-control ng-pristine ng-untouched ng-valid ng-empty">
        </div>
    </div>

    <div class="row">
        <div class="control-label col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <label>معرف Facebook Pixel</label>
            <div class="help-block">
                المعرف الأساسي الخاص بـ FB Pixel. وسيتم إستخدامه مع الصفحات العلنية مثل النماذج التسويقية ونموذج الإستعلامات العلني
            </div>
        </div>

        <div class="form-group col-xs-12 col-sm-12 col-md-4">
            <input ng-model="identity.facebookPixelId" type="text" dir="ltr" class="form-control ng-pristine ng-untouched ng-valid ng-empty">
        </div>
    </div>

    <div class="margin-top-20 row">
        <div class="control-label col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <label>كود تأكيد النطاق Facebook Domain Verification</label>
            <div class="help-block">
                قم بلصق محتوى خانة ال Content من كود ال Meta الخاص بالـ Domain Verification من Facebook
            </div>
        </div>

        <div class="form-group col-xs-12 col-sm-12 col-md-4">
            <input ng-model="identity.facebookDomainVerificationMeta" type="text" dir="ltr" class="form-control ng-pristine ng-untouched ng-valid ng-empty">
        </div>
    </div>

    <!-- ngIf: data.branches.length > 0 -->

    <!-- ngRepeat: branch in data.branches -->

    <div class="row margin-bottom-0">
        <div class="control-label col-xs-12 col-sm-12 col-md-4 col-lg-4">
        </div>

        <div class="form-group margin-bottom-0 col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <button type="submit" ng-click="save()" class="btn btn-primary">
                <i class="fa fa-check"></i> حفظ
            </button>
        </div>
    </div>                        </form>
                    </div>
                </div>

                <div class="block style2">
        <div class="block-title">
            <i class="icon fa fa-credit-card"></i>
            <span class="title">
            خيارات الدفع اليدوي
            </span>
        </div>
        <div class="block-body">
            <div class="row margin-bottom-15">
                <div class="col-xs-12 col-sm-12 col-md-4">
                    الخيارات
                    <div class="help-block">
                        من هنا يمكنك إضافة خيارات الدفع اليدوي للمؤسسة، مثل محافظ الموبايل و إنستاباي ، والتحويلات البنكية. سيتم عرض هذه الخيارات في صفحات الدفع والفاتورة (خياري)
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-8">
                    <div class="margin-bottom-15 small text-muted">
                        <i class="fa fa-info-circle"></i>
                        مثال، العنوان: Vodafone Cash, الرقم: 010123456789
                    </div>

                    <key-value-pairs ng-model="identity.manualPaymentOptions" names="{'key': 'name', 'value': 'id'}" labels="{'key': 'Option name', 'value': 'Number/handle'}" class="ng-pristine ng-untouched ng-valid ng-isolate-scope ng-not-empty">
    <div class="keyValuePairs">
        <!--New item-->
        <div class="flex flex-margin-items-15">
            <!--Key-->
            <!-- ngIf: multiLine === false --><input ng-if="multiLine === false" ng-model="newItem.key" ng-keypress="newItem.onEnter($event)" placeholder="Option name" type="text" class="form-control input-sm ng-pristine ng-untouched ng-valid ng-scope ng-empty"><!-- end ngIf: multiLine === false -->

            <!-- ngIf: multiLine === true -->

            <!--Value-->

            <!-- ngIf: multiLine === true -->

            <!-- ngIf: multiLine === false --><input ng-if="multiLine === false" ng-model="newItem.value" ng-keypress="newItem.onEnter($event)" placeholder="Number/handle" type="text" class="form-control input-sm ng-pristine ng-untouched ng-valid ng-scope ng-empty"><!-- end ngIf: multiLine === false -->

            <button ng-click="newItem.add()" ng-disabled="!newItem.key || !newItem.value" type="button" class="btn btn-xs btn-default icon-only" style="padding: 1px 10px" disabled="disabled">
                <i class="fa fa-plus"></i>
            </button>
        </div>

        <!--Empty-->
        <div ng-show="items.length == 0" class="small text-muted margin-top-10 ng-binding">
            إدخل المعلومات بالأعلى ثم إضغط Enter او على ايقونة الإضافة.
        </div>

        <!--Items list-->
        <ul ng-show="items.length &gt; 0" class="list-group ng-hide">
            <!-- ngRepeat: item in items track by $index -->
        </ul>
    </div>
</key-value-pairs>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-4"></div>
                <div class="col-xs-12 col-sm-12 col-md-8">
                    <button type="submit" ng-click="save()" class="btn btn-primary">
                        <i class="fa fa-check"></i> حفظ
                    </button>
                </div>
            </div>
        </div>
    </div>
                <div class="block style2">
        <div class="block-title">
            <i class="icon fa fa-file-text-o"></i>
            <span class="title">الشروط والأحكام</span>
        </div>
        <div class="block-body">
            <div class="form-group">
                <div class="hint">
                    <i class="fa fa-info-circle"></i> هنا يمكنك تحميل شروط وأحكام خدمات منظمتك. سيتم عرض هذه الشروط في أماكن مثل موقع المنصة، ونموذج التسجيل، وفي خطوة الموافقة على الشروط والأحكام للعملاء الجدد عند تسجيل الدخول اول مرة (في حال انك فعلت هذه الخاصية). يمكنك ايضاً إدخال سياسة خاصة منفصلة للمدفوعات والفواتير على صفحة إعدادات الماليات
                </div>

                
                <div id="mceu_11" class="mce-tinymce mce-container mce-panel" hidefocus="1" tabindex="-1" role="application" style="visibility: hidden; border-width: 1px; width: 100%;"><div id="mceu_11-body" class="mce-container-body mce-stack-layout"><div id="mceu_12" class="mce-top-part mce-container mce-stack-layout-item mce-first"><div id="mceu_12-body" class="mce-container-body"><div id="mceu_13" class="mce-toolbar-grp mce-container mce-panel mce-first mce-last" hidefocus="1" tabindex="-1" role="group"><div id="mceu_13-body" class="mce-container-body mce-stack-layout"><div id="mceu_14" class="mce-container mce-toolbar mce-stack-layout-item mce-first mce-last" role="toolbar"><div id="mceu_14-body" class="mce-container-body mce-flow-layout"><div id="mceu_15" class="mce-container mce-flow-layout-item mce-first mce-btn-group" role="group"><div id="mceu_15-body"><div id="mceu_0" class="mce-widget mce-btn mce-first" tabindex="-1" aria-pressed="false" role="button" aria-label="Bold"><button id="mceu_0-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-bold"></i></button></div><div id="mceu_1" class="mce-widget mce-btn" tabindex="-1" aria-pressed="false" role="button" aria-label="Italic"><button id="mceu_1-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-italic"></i></button></div><div id="mceu_2" class="mce-widget mce-btn mce-last" tabindex="-1" aria-pressed="false" role="button" aria-label="Underline"><button id="mceu_2-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-underline"></i></button></div></div></div><div id="mceu_16" class="mce-container mce-flow-layout-item mce-btn-group" role="group"><div id="mceu_16-body"><div id="mceu_3" class="mce-widget mce-btn mce-first" tabindex="-1" aria-pressed="false" role="button" aria-label="Bullet list"><button id="mceu_3-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-bullist"></i></button></div><div id="mceu_4" class="mce-widget mce-btn" tabindex="-1" aria-pressed="false" role="button" aria-label="Numbered list"><button id="mceu_4-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-numlist"></i></button></div><div id="mceu_5" class="mce-widget mce-btn" tabindex="-1" aria-pressed="false" role="button" aria-label="Insert/edit link"><button id="mceu_5-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-link"></i></button></div><div id="mceu_6" class="mce-widget mce-btn" tabindex="-1" aria-pressed="false" role="button" aria-label="Remove link"><button id="mceu_6-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-unlink"></i></button></div><div id="mceu_7" class="mce-widget mce-btn" tabindex="-1" aria-pressed="false" role="button" aria-label="Insert/edit image"><button id="mceu_7-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-image"></i></button></div><div id="mceu_8" class="mce-widget mce-btn" tabindex="-1" aria-pressed="false" role="button" aria-label="Insert/edit media"><button id="mceu_8-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-media"></i></button></div><div id="mceu_9" class="mce-widget mce-btn mce-menubtn mce-last" tabindex="-1" aria-labelledby="mceu_9" role="button" aria-label="Table" aria-haspopup="true"><button id="mceu_9-open" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-table"></i> <i class="mce-caret"></i></button></div></div></div><div id="mceu_17" class="mce-container mce-flow-layout-item mce-last mce-btn-group" role="group"><div id="mceu_17-body"><div id="mceu_10" class="mce-widget mce-btn mce-first mce-last" tabindex="-1" role="button" aria-label="Source code"><button id="mceu_10-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-code"></i></button></div></div></div></div></div></div></div></div></div><div id="mceu_18" class="mce-edit-area mce-container mce-panel mce-stack-layout-item mce-last" hidefocus="1" tabindex="-1" role="group" style="border-width: 1px 0px 0px;"><iframe id="terms_ifr" frameborder="0" allowtransparency="true" title="Rich Text Area. Press ALT-F9 for menu. Press ALT-F10 for toolbar. Press ALT-0 for help" style="width: 100%; height: 400px; display: block;"></iframe></div></div></div><textarea ng-editor="{'height': 400}" ng-model="terms" ng-editor-profile="minimal" id="terms" rows="20" class="form-control ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty" style="display: none; visibility: visible;" aria-hidden="true"></textarea>
            </div>

            <div class="form-group margin-bottom-0">
                <button type="submit" ng-click="save()" class="btn btn-primary">
                    <i class="fa fa-check"></i> حفظ
                </button>

                <a href="/public/misc/terms" class="btn btn btn-default" target="_blank">
                    <i class="fa fa-window-maximize"></i> عرض
                </a>
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
