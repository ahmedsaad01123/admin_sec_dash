<?php
// إعداد المتغيرات
$pageTitle = 'تسجيل عميل جديد';
$includeSessionCheck = true;
$includeCSRFRefresh = true;

// تضمين القوالب
include_once __DIR__ . '/../templates/header.php';
include_once __DIR__ . '/../templates/sidebar.php';
?>

<div id="container" class="container-fluid">
<div id="content" class="newClientPage">
                    <div id="pageTitle" class="d-flex flex-gap-15 flex-wrap flex-rows flex-column-on-mobile align-items-center justify-content-between">
        <div class="flex-grow-1">
            <i class="icon fa fa-user"></i>
            <span class="title">العملاء</span>

                            
                <ul class="breadcrumb inline" style="margin: 0">
                    <li class="breadcrumb-item"></li>

                                            <li class="breadcrumb-item">تسجيل عميل جديد</li>
                                    </ul>
                    </div>

        <div class="d-flex justify-content-center">
            <div>
                        <a href="/clients/all" class="btn btn-primary">
            <i class="fa fa-search"></i> عرض الكل
        </a>

        <a href="/clients/import" class="btn btn-info">
            <i class="fa fa-upload"></i> إستيراد
        </a>

        <a href="/clients/create?bulk" class="btn btn-default">
            <i class="fa fa-table"></i> إضافة متعددة
        </a>

    
                            </div>
        </div>
    </div>
        <div ng-app="newClient" ng-controller="main" class="ng-scope">
            
            <form name="newClientForm" class="form ng-pristine ng-invalid ng-invalid-required ng-valid-minlength ng-valid-email" enctype="multipart/form-data">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
                
                                    <dismissible-hint name="clients.create" class="ng-isolate-scope">
    <!-- ngIf: visible --><div ng-if="visible" class="dismissibleHint  d-flex flex-gap-15 align-items-center justify-content-between">
        <div class="d-flex flex-gap-20 align-items-center flex-grow-1">
            <!-- ngIf: icon || img --><div ng-if="icon || img" class="iconHolder hidden-xs ng-scope">
                <!-- ngIf: img -->
                <!-- ngIf: icon --><span ng-if="icon" class="ms icon ng-binding ng-scope">info</span><!-- end ngIf: icon -->
            </div><!-- end ngIf: icon || img -->

            <div class="content flex-grow-1">
                <ng-transclude>
                        هنا يمكنك إضافة العملاء الجديد على المنصة. لتتمكن بعدها من تسجيل وتوزيع هؤلاء العملاء على المجموعات أو
		قوائم الانتظار أو إختبارات تحديد المستوى وغيرها. يكون لكل عميل "ملف" خاص على المنصة، ويمكنك
		الوصول لملف أي عميل بعد ذلك بإستخدام البحث و من صفحة قاعدة بيانات العملاء.
                    </ng-transclude>
            </div>
        </div>

        <div>
            <!-- ngIf: dismissible --><button ng-click="dismiss()" ng-if="dismissible" class="close ng-scope" type="button">
                <span>×</span>
            </button><!-- end ngIf: dismissible -->
        </div>
    </div><!-- end ngIf: visible --></dismissible-hint>
                
                
                
                <div class="row" data-tour="clients.create" data-tour-text="من هنا يمكنك إدخال المعلومات الأساسية لكل عميل جديد، مثل الإسم ورقم الهاتف. كما يمكنك إدخال معلومات آخرى مثل البريد الإلكتروني والوظفية والعنوان من الجزء الخاص بالمعلومات الشخصية بالأسفل">
        <div class="col-xs-12 col-sm-12 col-md-7">
            <div class="form-group">
                <label>الإسم *</label>
                <input ng-model="info.name" name="name" type="text" id="name-input" minlength="3" class="form-control input-lg ng-pristine ng-empty ng-invalid ng-invalid-required ng-valid-minlength ng-touched" required="">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-5">
            <div class="form-group" ng-class="{'has-error': newClientForm.phone_number.$dirty &amp;&amp; newClientForm.phone_number.$invalid}">
                <label>رقم الهاتف *</label>

                <input ng-model="info.phone_number" name="phone_number" type="tel" dir="ltr" class="form-control input-lg ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" required="">
            </div>
        </div>

        
            </div>
                
                <div class="block style2 margin-top-15">
        <!--
        <div class="block-title">
            <span class="title">تفضيلات التدريب</span>
            <popover content="إختيارات العميل الجديد للتدريب، مثل المسار التدريبي، والأيام والمواعيد المتاح للتدريب فيها"></popover>
        </div>
        -->

        <div class="block-body p-0">
            <div class="grid grid-2cols grid-gap-0">
                
                <div class="grid-cell p-15" data-tour="clients.create" data-tour-text="موعد او مواعيد التدريب المناسبة لهذا العميل، من قائمة المواعيد التي تم إدخالها سابقاً (من صفحة المواعيد على قائمة تنسيق التدريب). يمكن تحديدها او تعديلها لاحقاً في أي وقت. (خيارية)">
                    <div class="form-group mb-0">
                        <label>مواعيد التدريب المناسبة</label>
                        <popover content="الموعد او المواعيد المناسبة للعميل. يمكن إختيار أكثر من موعد وتحديد المفضل بينها" class="ng-isolate-scope"><i uib-popover="الموعد او المواعيد المناسبة للعميل. يمكن إختيار أكثر من موعد وتحديد المفضل بينها" popover-title="" popover-trigger="'mouseenter'" popover-placement="" class="popover-hint fa fa-question-circle"></i></popover>
                        <client-time-slots-picker ng-model="info.timeSlots" class="ng-pristine ng-untouched ng-valid ng-isolate-scope ng-not-empty"><div class="client-time-slots-slots-picker ng-scope">
                    <div class="d-flex flex-gap-10 align-items-start justify-content-between">
                <div>
                    <i class="fa fa-info-circle"></i> لم يتم إضافة المواعيد بعد
                    <popover content="المواعيد هي جميع الأوقات المتاح للعميل الإختيار منها لجميع الدورات والمدربين، سواء للتدريب او أي نشاطات آخرى" class="ng-isolate-scope"><i uib-popover="المواعيد هي جميع الأوقات المتاح للعميل الإختيار منها لجميع الدورات والمدربين، سواء للتدريب او أي نشاطات آخرى" popover-title="" popover-trigger="'mouseenter'" popover-placement="" class="popover-hint fa fa-question-circle"></i></popover>
                </div>

                <div>
                    <button ng-click="openSlotManagement()" class="btn btn-sm btn-default" type="button">
                        <i class="fa fa-plus-circle"></i> إضافة المواعيد
                    </button>
                </div>
            </div>

            </div>
</client-time-slots-picker>
                    </div>
                </div>
            </div>

            <hr class="m-0">

            <div class="grid grid-3cols grid-gap-0">
                <div class="grid-cell border-end p-15" data-tour="clients.create" data-tour-text="وسوم يمكنك إستخدامها لتميز العميل او تصنيفه مع مجموعة آخرى من العملاء بتصنيف او وصف خاص.  (خيارية)">
                    <div class="form-group">
                        <label>الوسوم</label>
                        <popover content="الوسم او الوسوم المناسبة لتصنيف هذا العميل." class="ng-isolate-scope"><i uib-popover="الوسم او الوسوم المناسبة لتصنيف هذا العميل." popover-title="" popover-trigger="'mouseenter'" popover-placement="" class="popover-hint fa fa-question-circle"></i></popover>
                        <div class="tags-menu pills align-items-center ng-isolate-scope ng-not-empty ng-valid" type="clients" ng-model="tags.selected">
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

                <div class="grid-cell border-end p-15">
                    <div class="form-group mb-0">
                        <label>تحديد منسق ؟</label>
                        <popover content="توزيع العميل الجديد على أحد افراد فريق منسقي التدريب، ليتابع معه اثناء فترة التقديم والتدريب" class="ng-isolate-scope"><i uib-popover="توزيع العميل الجديد على أحد افراد فريق منسقي التدريب، ليتابع معه اثناء فترة التقديم والتدريب" popover-title="" popover-trigger="'mouseenter'" popover-placement="" class="popover-hint fa fa-question-circle"></i></popover>

                                                    <div class="text-muted">
                                <i class="fa fa-info-circle"></i>
                                خاصية توزيع العملاء على المنسقين غير مفعلة (من الإعدادات).
                            </div>

                                            </div>
                </div>

                <div class="grid-cell p-15">
                    <div class="form-group margin-bottom-0">
                        <label>تابع لشركة ؟</label>
                        <popover content="في حال أن هذا العميل هو ضمن تعاقد مع أحد الشركات ولن يحصل على التدريب بشكل فردي" class="ng-isolate-scope"><i uib-popover="في حال أن هذا العميل هو ضمن تعاقد مع أحد الشركات ولن يحصل على التدريب بشكل فردي" popover-title="" popover-trigger="'mouseenter'" popover-placement="" class="popover-hint fa fa-question-circle"></i></popover>
                        <company-search ng-model="info.companyId" class="ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty">
    <!-- ngIf: !! selected -->

    <!-- ngIf: ! selected --><div ng-if="! selected" ng-class="{'widget-large': setup.largeInput, 'widget-small': ! setup.largeInput}" class="typeaheadWidget company-search-widget ng-scope widget-small">

        <!--The loading indicator-->
        <!-- ngIf: searching -->

        <!--The input-->
        <input ng-model="name" uib-typeahead="company.id as company.name for company in search($viewValue)" typeahead-min-length="setup.minLength" typeahead-wait-ms="700" typeahead-on-select="select($item, $model, $label)" typeahead-loading="searching" typeahead-no-results="noResults" ng-class="{'input-lg': setup.largeInput}" type="text" class="form-control ng-pristine ng-untouched ng-valid ng-empty" placeholder="جزء من الإسم او رقم الهاتف او البريد الإلكتروني" autocomplete="off" aria-autocomplete="list" aria-expanded="false" aria-owns="typeahead-31-9841"><ul class="dropdown-menu ng-isolate-scope ng-hide" ng-show="isOpen() &amp;&amp; !moveInProgress" ng-style="{top: position().top+'px', left: position().left+'px'}" role="listbox" aria-hidden="true" uib-typeahead-popup="" id="typeahead-31-9841" matches="matches" active="activeIdx" select="select(activeIdx, evt)" move-in-progress="moveInProgress" query="query" position="position" assign-is-open="assignIsOpen(isOpen)" debounce="debounceUpdate">
    <!-- ngRepeat: match in matches track by $index -->
</ul>

        <!--Messages-->
        <!-- ngIf: noResults -->
    </div><!-- end ngIf: ! selected --></company-search>
                    </div>
                </div>
            </div>
        </div>
    </div>


                
                <div data-tour="clients.create" data-tour-text="من هنا يمكنك إضافة معلومات آخرى جديدة لمعلومات العملاء، كمثال: رقم هاتف آخر، او الجماعة، او المدينة، ... وهكذا">
                    <extra-info-data-entity-inline-fields setup="extraInfo.setup" api="extraInfo.api" class="ng-isolate-scope"><div class="block style2  extraInfo_entityDynamicInlineFields collapsible" ng-class="{'collapsible': setup.collapsible}">
        <!-- ngIf: ! setup.simpleLayout --><div ng-if="! setup.simpleLayout" class="block-title d-flex flex-gap-15 justify-content-between ng-scope" ng-attr-data-toggle="{{ setup.collapsible ?'collapse' :'' }}" ng-attr-data-target="#{{ collapseTargetId }}" data-toggle="collapse" data-target="#ei-inline-fields-xE1tJreNXs">

            <div>
                <span class="title">معلومات إضافية</span>
                <popover content="المعلومات الإضافية هي ميزة تمكنك من إضافة (أنواع) بيانات جديدة بجانب ما يقدمه النظام بشكل أساسي." class="ng-isolate-scope"><i uib-popover="المعلومات الإضافية هي ميزة تمكنك من إضافة (أنواع) بيانات جديدة بجانب ما يقدمه النظام بشكل أساسي." popover-title="" popover-trigger="'mouseenter'" popover-placement="" class="popover-hint fa fa-question-circle"></i></popover>
            </div>

            <div class="d-flex flex-gap-5 align-items-center">
                <!-- ngIf: showManageOption() --><a ng-if="showManageOption()" ng-click="manageFields()" class="btn btn-xs btn-default ng-scope" href="">
                    <i class="fa fa-cog"></i> إدارة
                </a><!-- end ngIf: showManageOption() -->

                <a ng-click="reload()" class="btn btn-xs btn-default" href="">
                    <i class="fa fa-refresh m-0"></i>
                </a>
                
                <!-- ngIf: setup.collapsible --><i ng-if="setup.collapsible" class="fa fa-chevron-down toggle-arrow margin-before-10 ng-scope"></i><!-- end ngIf: setup.collapsible -->
            </div>
        </div><!-- end ngIf: ! setup.simpleLayout -->

        <div id="ei-inline-fields-xE1tJreNXs" class="collapse in">
            <div class="block-body padding-15" style="max-height: 350px; overflow: auto">
                
                <!-- ngIf: fields.length == 0 --><div ng-if="fields.length == 0" class="d-flex align-items-center flex-gap-15 ng-scope">
                    <div>
                        <i class="fa fa-info-circle fa-3x text-info"></i>
                    </div>

                    <div>
                        <b class="message">تريد إدخال معلومات إضافية؟</b>
                        <div class="small text-muted mt-5">يمكنك إضافة أنواع بيانات جديدة بسهولة بجانب بيانات النظام الأساسية.</div>

                        <div class="mt-10">
                            <button ng-click="manageFields()" class="btn btn-sm" type="button">
                                <i class="fa fa-plus-square"></i>
                                إضافة الحقول
                            </button>
                        </div>
                    </div>
                </div><!-- end ngIf: fields.length == 0 -->

                
                <!-- ngIf: fields.length > 0 -->
            </div>
        </div>
    </div>
</extra-info-data-entity-inline-fields>
                </div>

                
                <div class="block style2 margin-top-20 collapsible collapsed">
        <div class="block-title" data-toggle="collapse" data-target="#personal-section" href="">
            <i class="fa fa-chevron-down toggle-arrow"></i>

            <span class="title">بيانات شخصية</span>
        </div>

        <div id="personal-section" class="collapse">
            <div class="block-body padding-15">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                                    <div class="form-group">
                                <label>الرقم القومي</label>
                                <input ng-model="info.national_id" name="national_id" type="text" dir="ltr" class="form-control ng-pristine ng-untouched ng-valid ng-empty">
                            </div>
                        
                        
                        <!-- ngIf: info.birthdateCalendar == 'hijri' -->

                        <div class="form-group">
                            <label>النوع (Gender)</label>
                            <div>
                                <div class="radio-inline">
                                    <label>
                                        <input ng-model="info.gender" value="male" type="radio" class="ng-pristine ng-untouched ng-valid ng-empty" name="15"> ذكر
                                    </label>
                                </div>
                                <div class="radio-inline">
                                    <label>
                                        <input ng-model="info.gender" value="female" type="radio" class="ng-pristine ng-untouched ng-valid ng-empty" name="16"> انثي
                                    </label>
                                </div>
                            </div>
                        </div>

                        
                        <!-- ngIf: info.birthdateCalendar == 'gregorian' --><div ng-if="info.birthdateCalendar == 'gregorian'" class="form-group ng-scope">
                            <a ng-click="info.birthdateCalendar = 'hijri'" href="" class="small onSide">
                                (التحويل إلى الهجري)</a>

                            <label>
                                تاريخ الميلاد
                            </label>
                            <input ng-model="info.birthday" type="date" class="form-control ng-pristine ng-untouched ng-valid ng-empty" dir="ltr">
                        </div><!-- end ngIf: info.birthdateCalendar == 'gregorian' -->

                        <div class="form-group mb-0">
                            <label>العنوان</label>
                            <textarea ng-model="info.address" rows="2" class="form-control ng-pristine ng-untouched ng-valid ng-empty"></textarea>
                        </div>
                    </div>

                    <!--
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label>المنطقة</label>

                            <div class="input-group">
                                <select ng-model="info.district_id"
                                        ng-disabled="!data.districts.length || !onCurrentBranch()"
                                        ng-options="d.id as d.name for d in data.districts"
                                        class="form-control">
                                </select>

                                <div class="input-group-btn">
                                    <button ng-click="districts.manage()" ng-disabled="!onCurrentBranch()"
                                            class="btn btn-default icon-only" type="button">
                                        <i class="fa fa-bars"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    -->

                    <!--
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label>الموقع على الخريطة</label>
                            <div class="help-block">
                                قم بنسخ ولصق عنوان صفحة خريطة العنوان
                            </div>
                            <input ng-model="info.map_location" type="url" class="form-control"/>
                        </div>
                    </div>
                    -->

                    <!--
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group margin-bottom-0">
                            <label>وقت التسجيل</label>
                            <div class="help-block">الوقت الفعلي لتقديم طلب التسجيل داخل المؤسسة</div>
                            <input datepicker-model="info.registrationDate"
                                   datepicker-api="data.registrationDateDatepickerSetup.api"
                                   datepicker="data.registrationDateDatepickerSetup.setup"
                                   class="form-control" dir="ltr"/>
                        </div>
                    </div>
                    -->

                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                                    <div class="form-group">
                                <label>البريد الإلكتروني</label>
                                <input ng-model="info.email" name="email" type="email" class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-email" dir="ltr">
                            </div>
                        
                        <div class="form-group">
                            <label>الوظفية</label>
                            <input ng-model="info.job_title" type="text" class="form-control ng-pristine ng-untouched ng-valid ng-empty">
                        </div>

                        <div class="form-group mb-0">
                            <label>الصورة الشخصية</label>

                            <div class="flex flex-gap-15 w-100 align-items-center">
                                <div style="width: 70px" class="flex-shrink-0">
                                    <!-- ngIf: info.picture -->
                                    <!-- ngIf: !info.picture --><img ng-if="!info.picture" src="https://dznommenf76q0.cloudfront.net/app/images/icons/clients/picture-placeholder.png?v=zzrlRl5vI9zKmwa" class="w-100 ng-scope"><!-- end ngIf: !info.picture -->
                                </div>

                                <div class="flex-grow-1">
                                    <input ngf-select="" ng-model="info.picture" ngf-pattern="'image/*'" ngf-accept="'image/*'" ngf-max-size="10MB" name="picture" type="file" class="ng-pristine ng-untouched ng-valid ng-empty" accept="image/*">

                                    <div class="mt-10 text-muted">الصورة الشخصية للعميل. (اقصي حجم هو 3 ميجابايت)</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--
                <hr style="margin-left: -15px; margin-right: -15px"/>

                
                <div id="socialProfilesSection" class="form-group margin-bottom-0">
                    <label>حسابات الشبكات الإجتماعية</label>
                    <div class="help-block">حسابات العميل الجديد على الشبكات الإجتماعية، في حال كانت متوفرة.</div>

                    <div class="row">
                        
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-facebook noMargin"></i></span>
                                    <input ng-model="info.socialProfiles.facebook" type="url" placeholder="Facebook"
                                           class="form-control" dir="ltr"/>
                                </div>
                            </div>
                        </div>

                        
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-linkedin noMargin"></i></span>
                                    <input ng-model="info.socialProfiles.linkedIn" type="url" placeholder="LinkedIn"
                                           class="form-control" dir="ltr"/>
                                </div>
                            </div>
                        </div>

                        
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group margin-bottom-0">
                                <div class="input-group"><span class="input-group-addon"><i class="fa fa-twitter noMargin"></i></span>
                                    <input ng-model="info.socialProfiles.twitter" type="url" placeholder="Twitter"
                                           class="form-control" dir="ltr"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                -->

            </div>
        </div>
    </div>
                <div class="form-group">
                    <label>ملحوظات</label>
                    <textarea ng-model="info.note" rows="3" class="form-control ng-pristine ng-untouched ng-valid ng-empty"></textarea>
                </div>

                
                <div id="account">
                    <div class="form-group margin-bottom-0" data-tour="clients.create" data-tour-text="إضغط هنا ليتم إنشاء حساب للعميل على المنصة، ليستطيع الدخول عبر هذا الحساب وعرض جدول المحاضرات والمحتوى التعليمي والإختبارات والمهام. سيتم إرسال معلومات الدخول له عبر البريد او الـ WhatsApp او الـ SMS (طبقاً للإعدادات)">
                            <div class="checkbox">
                                <label>
                                    <input ng-model="info.account.create" type="checkbox" class="ng-pristine ng-untouched ng-valid ng-empty">
                                    إنشاء حساب للعميل الجديد

                                    <popover content="سيتم إنشاء حساب للعميل الجديد على النظام. وسيتم إرسال معلومات الدخول اوتوماتيكياً." class="ng-isolate-scope"><i uib-popover="سيتم إنشاء حساب للعميل الجديد على النظام. وسيتم إرسال معلومات الدخول اوتوماتيكياً." popover-title="" popover-trigger="'mouseenter'" popover-placement="" class="popover-hint fa fa-question-circle"></i></popover>
                                </label>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="form-group">
                        <div class="d-flex flex-gap-15 align-items-center">
                            <div>
                                <button ng-disabled="newClientForm.$invalid || $root.ajaxRequestInProgress" ng-click="creation.submit(false)" ng-icon="" type="submit" class="btn btn-primary" disabled="disabled"><i class="fa fa-check-circle"></i>
                                    إضافة العميل
                                </button>
                            </div>

                            <div class="text-strong" style="font-size: 14pt">
                                أو
                            </div>

                                                            <div>
                                    <button ng-disabled="newClientForm.$invalid || $root.ajaxRequestInProgress" ng-icon="refresh" ng-click="creation.submit(true)" type="button" class="btn btn-info" disabled="disabled"><i class="fa fa-refresh"></i>
                                        حفظ ثم إضافة عميل آخر
                                    </button>
                                </div>
                                                    </div>
                    </div>
            </div>
        </div>
    </form>
            <script type="text/ng-template" id="duplicateException.html">
                    <div class="modal-header">
        <button ng-click="$close()" class="close">
            <span>&times;</span>
        </button>

        <h4 class="modal-title">معلومات متكررة!</h4>
    </div>

    <div class="modal-body text-center">
        <div class="margin-20">
            <img src="https://dznommenf76q0.cloudfront.net/app/images/icons/alert.png?v=zzrlRl5vI9zKmwa" alt=""/>
        </div>

        <div class="padding-15">
            <h4 class="margin-bottom-15">هناك عميل موجود بالفعل بهذه البيانات:</h4>
            <h3 class="text-primary margin-bottom-15">{{ existing.name }}</h3>
            <p>هناك عميل او عميل محتمل مسجل بالفعل بهذه المعلومات في قاعدة البيانات! يمكنك إضافة عميل (جديد) بنفس المعلومات <b class="text-danger">بشكل إستثنائي (فقط عند الضرورة)</b>، او يمكنك إلغاء الإضافة وعرض العميل الموجود بالفعل بهذه المعلومات.</p>
        </div>
    </div>

    <div class="modal-footer">
        <button ng-click="allow()" type="submit" class="btn btn-block btn-warning">
            <i class="fa fa-exclamation-triangle"></i> السماح بالتكرار، وإضافة عميل (جديد)
        </button>

        <a href="{{ existing.view_url }}" target="_blank" class="btn btn-block btn-primary">
            <i class="fa fa-remove"></i> إلغاء. وعرض العميل الموجود
        </a>
    </div>
            </script>
        </div>
            </div>
</div>

<?php
// تضمين footer template
include_once __DIR__ . '/../templates/footer.php';
?>
