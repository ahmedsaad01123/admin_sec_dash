<?php
// إعداد المتغيرات
$pageTitle = 'القوالب';
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

                                            <li class="breadcrumb-item">القوالب</li>
                                    </ul>
                    </div>

        <div class="d-flex justify-content-center">
            <div>
                
                            </div>
        </div>
    </div>
        <div ng-app="templatesApp" class="ng-scope">
            <!-- ngView: --><div ng-view="" class="ng-scope"><dismissible-hint name="admin.templates.home" class="ng-scope ng-isolate-scope">
    <!-- ngIf: visible --><div ng-if="visible" class="dismissibleHint  d-flex flex-gap-15 align-items-center justify-content-between">
        <div class="d-flex flex-gap-20 align-items-center flex-grow-1">
            <!-- ngIf: icon || img --><div ng-if="icon || img" class="iconHolder hidden-xs ng-scope">
                <!-- ngIf: img -->
                <!-- ngIf: icon --><span ng-if="icon" class="ms icon ng-binding ng-scope">info</span><!-- end ngIf: icon -->
            </div><!-- end ngIf: icon || img -->

            <div class="content flex-grow-1">
                <ng-transclude>
        من هنا يمكنك إدارة القوالب التي يستخدمها ، مثلاً يمكنك  تعديل قالب إيصال
			الدفع أو الإطار الخاص برسائل البريد الإلكتروني التي يتم إرسالها من نظام المراسلة
    </ng-transclude>
            </div>
        </div>

        <div>
            <!-- ngIf: dismissible --><button ng-click="dismiss()" ng-if="dismissible" class="close ng-scope" type="button">
                <span>×</span>
            </button><!-- end ngIf: dismissible -->
        </div>
    </div><!-- end ngIf: visible --></dismissible-hint>

    
    <!-- ngIf: templates === null -->

    <!-- ngIf: templates !== null --><div ng-if="templates !== null" class="ng-scope">
        <div id="templates" class="flex flex-wrap">
            <!-- ngRepeat: template in templates --><div ng-repeat="template in templates" class="template ng-scope">
                <a href="#!/templates/3/edit" class="text-underlined">
                    <div class="icon">
                        <span class="ms ms-lg">terminal</span>
                    </div>
                    <div class="title ng-binding">
                        [ماليات] فاتورة
                    </div>
                </a>
            </div><!-- end ngRepeat: template in templates --><div ng-repeat="template in templates" class="template ng-scope">
                <a href="#!/templates/2/edit" class="text-underlined">
                    <div class="icon">
                        <span class="ms ms-lg">terminal</span>
                    </div>
                    <div class="title ng-binding">
                        [الماليات] سند صرف
                    </div>
                </a>
            </div><!-- end ngRepeat: template in templates --><div ng-repeat="template in templates" class="template ng-scope">
                <a href="#!/templates/1/edit" class="text-underlined">
                    <div class="icon">
                        <span class="ms ms-lg">terminal</span>
                    </div>
                    <div class="title ng-binding">
                        [ماليات] سند قبض
                    </div>
                </a>
            </div><!-- end ngRepeat: template in templates -->
        </div>
    </div><!-- end ngIf: templates !== null -->
</div>

            <script type="text/ng-template" id="home.html"><dismissible-hint name="admin.templates.home">
        من هنا يمكنك إدارة القوالب التي يستخدمها ، مثلاً يمكنك  تعديل قالب إيصال
			الدفع أو الإطار الخاص برسائل البريد الإلكتروني التي يتم إرسالها من نظام المراسلة
    </dismissible-hint>

    
    <loading-indicator ng-if="templates === null"></loading-indicator>

    <div ng-if="templates !== null">
        <div id="templates" class="flex flex-wrap">
            <div ng-repeat="template in templates" class="template">
                <a href="#!/templates/{{ template.id }}/edit" class="text-underlined">
                    <div class="icon">
                        <span class="ms ms-lg">terminal</span>
                    </div>
                    <div class="title">
                        {{ trans(['templates_names', template.name]) }}
                    </div>
                </a>
            </div>
        </div>
    </div>
</script>
            <script type="text/ng-template" id="template/edit.html"><loading-indicator ng-if="template === null"></loading-indicator>

    
    <div ng-if="template !== null" class="block style4">
        <div class="block-title">
            <div class="side">
                <button go-back-on-click class="btn btn-xs btn-default">
                    <i class="fa fa-chevron-right"></i> عودة
                </button>
            </div>

            <span class="title">{{ trans(['templates_names', template.name]) }}</span>
        </div>

        <div class="block-body">
            
            <dismissible-hint name="admin.templates.template.edit">
                هنا يمكنك تصميم وتعديل القالب نفسه. استخدم المحرر بالأسفل لبناء القالب وتوزيع
					المعلومات عليه. ستحتاج لإستخدام "المتغيرات"، وهي مجموعة من المصطلحات الثابتة التي يمكنك استخدامها
					 في القالب لطباعة المحتوى الحقيقي. مثلا المتغير <code>company_logo</code> سيقوم بطباعة اسم المؤسسة.
            </dismissible-hint>

            <form name="editTemplateForm">
                
                <div class="form-group">
                    <div class="flex flex-space-between">
                        <div>
                            <label>محتوي القالب</label>
                            <div class="text-muted margin-bottom-15">
                                محتوي القالب نفسه الذي سيظهر عند الإستخدام. بالإعتمال على HTML و محرك قوالب Blade
					. إستخدم المتغيرات على القائمة لعرض المعلومات في القالب
                            </div>
                        </div>

                        <div style="flex-shrink: 0">
                            <div class="dropdown margin-after-5 inlineBlock">
                                <button ng-disabled="vars.list === null" class="btn btn-sm btn-primary dropdown-toggle"
                                        type="button" data-toggle="dropdown">
                                    <i class="fa fa-code"></i>
                                    المتغيرات
                                    <span class="caret"></span>
                                </button>

                                <ul class="variables dropdown-menu dropdown-menu-left"
                                    style="max-height: 380px; min-width: 350px;  overflow: auto" role="menu">
                                    <li ng-repeat="v in vars.list">
                                        <a ng-click="vars.insert(v.variable)" href="" class="var">
                                            <i class="fa fa-money"></i>

                                            <span class="title">{{ v.name }} </span>
                                            <div ng-if="v.description" class="desc small text-muted">
                                                {{ v.description }}
                                            </div>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a ng-click="vars.addClientExtraInfo()" href="">
                                            <i class="fa fa-money"></i>

                                            <span class="title">
                                                حقل معلومات إضافي للعميل
                                            </span>
                                            <div class="desc small text-muted">
                                                طباعة قيمة حقل معلومات إضافي للعميل، في حال تم إدخال قيمة لهذا الحقل، ولهذا العميل
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="inlineBlock">
                                <button ng-if="props.preview" ng-click="preview()" class="btn btn-sm btn-default" type="button">
                                    <i class="fa fa-external-link-square"></i>
                                    عرض
                                </button>

                                <a href="/admin/templates/{{ template.id }}/reset"
                                   class="btn btn-sm btn-default" type="button" data-toggle="tooltip"
                                   title="سيتم إعادة ضبط القالب والتعديلات وإستخدام القالب الأصلي">
                                    <i class="fa fa-refresh"></i>
                                    إعادة ضبط
                                </a>
                            </div>
                        </div>
                    </div>

                    
                    <div id="editorLoadingMessage" class="editorLoadingMessage">
                        <i class="fa fa-circle-o-notch fa-pulse fa-fw"></i>
                        جاري تحميل المحرر ...
                    </div>

                    
                    <textarea ng-editor="editorSetup" ng-model="template.template" id="template"></textarea>
                </div>

                <div ng-if="requiresStyling()" class="row">
                    <div class="form-group col-md-6">
                        <label>
                            خواص التصميم (CSS)
                            <popover content="خيار اضافي لتضمين خواص تصميم من نوع CSS"></popover>
                        </label>
                        <div ui-ace="cssEditor.setup" ng-model="template.css"></div>
                    </div>
                </div>

                
                                
                <div class="form-group">
                    <button ng-click="save()" class="btn btn-primary">
                        <i class="fa fa-check"></i> حفظ
                    </button>
                </div>
            </form>
        </div>
    </div></script>
        </div>
            </div>
</div>


<?php
// تضمين footer template
include_once __DIR__ . '/../templates/footer.php';
?>
