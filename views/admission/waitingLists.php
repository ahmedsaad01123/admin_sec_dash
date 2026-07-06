<?php
// إعداد المتغيرات
$pageTitle = 'قوائم الإنتظار';
$includeSessionCheck = true;
$includeCSRFRefresh = true;

// تضمين القوالب
include_once __DIR__ . '/../templates/header.php';
include_once __DIR__ . '/../templates/sidebar.php';
?>

<div id="container" class="container-fluid">
<div id="content" class="">
                    <div ng-app="waitingListsApp" class="ng-scope">
            <div id="pageTitle" class="d-flex flex-gap-15 flex-wrap flex-rows flex-column-on-mobile align-items-center justify-content-between">
        <div class="flex-grow-1">
            <i class="icon fa fa-filter"></i>
            <span class="title">التقديمات</span>

                            
                <ul class="breadcrumb inline" style="margin: 0">
                    <li class="breadcrumb-item"></li>

                                            <li class="breadcrumb-item">قوائم الانتظار</li>
                                    </ul>
                    </div>

        <div class="d-flex justify-content-center">
            <div>
                
                            </div>
        </div>
    </div>
            <div class="tab-content">
                <!-- ngView: --><div ng-view="" class="ng-scope"><dismissible-hint name="waiting.home-new" class="ng-scope ng-isolate-scope">
    <!-- ngIf: visible --><div ng-if="visible" class="dismissibleHint  d-flex flex-gap-15 align-items-center justify-content-between">
        <div class="d-flex flex-gap-20 align-items-center flex-grow-1">
            <!-- ngIf: icon || img --><div ng-if="icon || img" class="iconHolder hidden-xs ng-scope">
                <!-- ngIf: img -->
                <!-- ngIf: icon --><span ng-if="icon" class="ms icon ng-binding ng-scope">info</span><!-- end ngIf: icon -->
            </div><!-- end ngIf: icon || img -->

            <div class="content flex-grow-1">
                <ng-transclude>
        قوائم الإنتظار هي قوائم عملاء مؤقتة، مخصصة للعملاء الذين قاموا بطلب دورة محددة ولكن لم يكن هناك مجموعات مناسبة لهم الآن لبدء التدريب، وتم وضعهم على الإنتظار لحين توفر مقاعد. فور بدء مجموعات جديدة يمكنك الإختيار من العملاء هنا والتوزيع على المجموعات الجديدة. قوائم الإنتظار هي نفسها الدورات، أي ان كل دورة تساوي قائمة إنتظار، تشمل العملاء تحديداً المنتظرين لهذه الدورة فقط.
    </ng-transclude>
            </div>
        </div>

        <div>
            <!-- ngIf: dismissible --><button ng-click="dismiss()" ng-if="dismissible" class="close ng-scope" type="button">
                <span>×</span>
            </button><!-- end ngIf: dismissible -->
        </div>
    </div><!-- end ngIf: visible --></dismissible-hint>

    
    <!-- ngIf: !picker.loaded -->

    
    <div ng-show="picker.loaded === true" class="ng-scope">
        <div class="row" style="margin-bottom: 25px !important;">
            <div class="col-xs-12 col-sm-12 col-md-3">
                <div class="block style2 primary">
                    <div class="block-body p-0">
                        <waiting-list-picker setup="picker.setup" api="picker.api" class="ng-isolate-scope"><div class="widget waitingListPicker bg-color-body ng-scope bg-color-white" ng-class="setup.containerClass">
        
        <div ng-show="categories.all.length == 0" class="ng-hide">
            <i class="fa fa-exclamation-triangle"></i>
            ليس هناك دورات تدريبية بعد مسجلة لتختار منها!
        </div>

        
        <div ng-show="categories.all.length &gt; 0">
            
            <div class="form-group margin-bottom-0" ng-class="{'margin-bottom-0': ! categories.selected.object}">
                <label>
                    تصنيف الدورات
                    <popover content="لكل دورة تدريبية قائمة الانتظار الخاصة بها. ولهذا قوائم الانتظار مسجلة أسفل نفس
		تصنيفات الدورات. إختر التصنيف لعرض الدورات\قوائم الانتظار المسجلة أسفله." position="bottom" class="ng-isolate-scope"><i uib-popover="لكل دورة تدريبية قائمة الانتظار الخاصة بها. ولهذا قوائم الانتظار مسجلة أسفل نفس
		تصنيفات الدورات. إختر التصنيف لعرض الدورات\قوائم الانتظار المسجلة أسفله." popover-title="" popover-trigger="'mouseenter'" popover-placement="bottom" class="popover-hint fa fa-question-circle"></i></popover>
                </label>
                <select ng-model="categories.selected.object" ng-change="categories.onSelect()" class="form-control ng-pristine ng-valid ng-empty ng-touched"><option value="? object:null ?" selected="selected"></option>
                    <!-- ngRepeat: cat in categories.all --><option ng-repeat="cat in categories.all" ng-value="cat" class="ng-binding ng-scope" value="object:15">
                        Business Development (0)
                    </option><!-- end ngRepeat: cat in categories.all --><option ng-repeat="cat in categories.all" ng-value="cat" class="ng-binding ng-scope" value="object:16">
                        General English (0)
                    </option><!-- end ngRepeat: cat in categories.all --><option ng-repeat="cat in categories.all" ng-value="cat" class="ng-binding ng-scope" value="object:17">
                        Web Development (0)
                    </option><!-- end ngRepeat: cat in categories.all -->
                </select>
            </div>

            
            <!-- ngIf: categories.selected.object -->
        </div>
    </div>
</waiting-list-picker>
                    </div>
                </div>
            </div>
        </div>

        <!-- ngIf: !! selectedCourse.course -->
    </div></div>
            </div>

            <script type="text/ng-template" id="lists.html"><dismissible-hint name="waiting.home-new">
        قوائم الإنتظار هي قوائم عملاء مؤقتة، مخصصة للعملاء الذين قاموا بطلب دورة محددة ولكن لم يكن هناك مجموعات مناسبة لهم الآن لبدء التدريب، وتم وضعهم على الإنتظار لحين توفر مقاعد. فور بدء مجموعات جديدة يمكنك الإختيار من العملاء هنا والتوزيع على المجموعات الجديدة. قوائم الإنتظار هي نفسها الدورات، أي ان كل دورة تساوي قائمة إنتظار، تشمل العملاء تحديداً المنتظرين لهذه الدورة فقط.
    </dismissible-hint>

    
    <loading-indicator ng-if="!picker.loaded"></loading-indicator>

    
    <div ng-show="picker.loaded === true">
        <div class="row" style="margin-bottom: 25px !important;">
            <div class="col-xs-12 col-sm-12 col-md-3">
                <div class="block style2 primary">
                    <div class="block-body p-0">
                        <waiting-list-picker setup="picker.setup" api="picker.api"></waiting-list-picker>
                    </div>
                </div>
            </div>
        </div>

        <div ng-if="!! selectedCourse.course" class="block style2" id="candidates-wrapper">
            <div class="block-title d-flex flex-gap-15 flex-column-on-mobile justify-content-between">
                <div class="d-flex flex-gap-10 align-items-center">
                    <div>
                        <i class="fa fa-2x fa-clipboard text-info"></i>
                    </div>
                    <div>
                        <b class="title">{{ selectedCourse.course.name }}</b> <b>( {{ selectedCourse.course.code }} )</b>
                        <span class="badge">{{ candidates.getTotal() }}</span>
                        <div>{{ selectedCourse.course.category.name }}</div>
                    </div>
                </div>

                <div class="d-flex flex-gap-5 flex-wrap">
                    <div>
                        <button ng-click="selectedCourse.addCandidates()" class="btn btn-primary" data-tour="waitingLists.list" data-tour-text="من هنا يمكنك إضافة عميل او عملاء جدد على قائمة الإنتظار لهذه الدورة التدريبية. يمكنك أيضاً إضافة أي عميل على أي قائمة من داخل ملفه">
                            <i class="fa fa-plus-circle"></i> إضافة عملاء جدد
                        </button>
                    </div>

                    <div>
                        <a href="/courses/{{ selectedCourse.course.id  }}" target="_blank" class="btn btn-default">
                            <i class="fa fa-external-link"></i> الذهاب للدورة
                        </a>
                    </div>

                    <form method="POST" action="{{ selectedCourse.getExportFormUrl() }}">
                        <input type="hidden" name="_token" value="6I8KuRvpEnoyRVC225dOQkQoGVsawtWiBQaPkLMj">                        <input type="hidden" name="params" ng-value="candidates.params.getRequestPayload() | json"/>
                        <button ng-disabled="candidates.isLoading() || candidates.isEmpty()" class="btn btn-info">
                            <i class="fa fa-download"></i> تصدير
                        </button>
                    </form>
                </div>
            </div>

            
            <div class="block-body border-bottom rounded-0 box-shadow" data-tour="waitingLists.list" data-tour-text="إستخدم هذه الخيارات للبحث في العملاء المسجلين بالفعل على قائمة الإنتظار">
                <div>
        <div class="row">
            
                            <div class="col-xs-12 col-sm-12 col-md-3">
                    <div class="form-group">
                        <label>بعد إختبار تحديد المستوى</label>
                        <popover content="إختبار تحديد المستوى الذي تم مع العميل قبل التسجيل على قائمة الإنتظار هذه"></popover>
                        <select dataloader-param-model="candidates.getParam('sourcePlacementTestId')" class="form-control ">
                            <option ng-value="null"></option>
                            <option ng-value="'any'">أي</option>
                            <option ng-value="'none'">لا شئ</option>

                            
                                                    </select>
                    </div>
                </div>
            
            
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <div class="form-group">
                    <label>وقت الإضافة للإنتظار</label>
                    <time-span-selector dataloader-param="candidates.getParam('signupTime')" options="{'acceptEmpty': true}"></time-span-selector>
                </div>
            </div>

            
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <div class="form-group">
                    <label>ملحوظات الإضافة للإنتظار</label>
                    <input dataloader-param-model="candidates.getParam('signupNote')" name="note"
                           class="form-control " />
                </div>
            </div>

            
            <div class="col-sm-12 col-md-3">
                <div class="form-group">
                    <label>عملاء إختاروا موعد تدريب محدد</label>
                    <popover content="عرض العملاء الذين إختاروا مواعيد تدريب محددة سابقاً"></popover>
                    <time-slots-selector dataloader-param="candidates.getParam('client_time_slot_ids')"
                                         options="{'returnIdsOnly': true}"></time-slots-selector>
                </div>
            </div>
        </div>

        <div class="row">
            
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <div class="form-group">
                    <label>عملاء مسارات محددة</label>
                    <popover content="هذا الخيار سيتم حذفه قريباً، ابدأ بتحديد الوقت المناسب لكل عميل من خلال ملفه مباشرةً (خيار التعديل)"></popover>
                    <path-search-helper dataloader-param="candidates.getParam('pathSearch')">
                    </path-search-helper>
                </div>
            </div>

            <div class="form-group col-sm-12 col-md-3">
                <label>عملاء بوسوم محددة</label>
                <popover content="للبحث عن عملاء مضافين اسفل وسوم محددة (كل الوسوم التي تختارها، وليس إحداها فقط)"></popover>
                <tags-menu type="clients" dataloader-param="candidates.getParam('clientTags')"></tags-menu>
            </div>

            
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <div class="form-group">
                    <label>بحث عن عميل محدد</label>

                    <div ng-if="candidates.getParam('clientId').value.isNotEmpty()" class="well well-sm">
                        <div class="d-flex justify-content-between">
                            <h4>{{ candidates.getParam('clientId').getValue().name }}</h4>
                            <button ng-click="candidates.getParam('clientId').reset()" class="close" type="button">
                                <span>&times;</span>
                            </button>
                        </div>
                        <client-info client="candidates.getParam('clientId').getValue()"></client-info>
                    </div>

                    <client-search-input ng-if="candidates.getParam('clientId').value.isEmpty()"
                                         dataloader-param="candidates.getParam('clientId')"></client-search-input>
                </div>
            </div>

            
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <div class="d-flex flex-gap-10 flex-wrap">
                    <div class="form-group mb-0">
                        <label>ترتيب العملاء</label>
                        <select dataloader-param-model="candidates.getParam('orderBy')" class="form-control">
                            <option ng-repeat="option in ['oldest_first', 'latest_first']"
                                    value="{{ option }}">{{ trans('ordering.' + option) }}</option>
                        </select>
                    </div>

                    <div class="form-group mb-0">
                        <label>عدد النتائج بالصفحة</label>
                        <select dataloader-param-model="candidates.getParam('resultsPerPage')" class="form-control">
                            <option ng-repeat="(i, n) in candidates.getParam('resultsPerPage').value.getOptions()"
                                    ng-value="n">{{ n }}</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group mb-0">
            <button ng-click="candidates.filter()" ng-disabled="candidates.isLoading() || ! candidates.params.areValid()" disable-on-ajax class="btn btn-primary" type="button">
                <i class="fa fa-search"></i> بحث
            </button>

            <button ng-click="candidates.cancelFiltering()" ng-disabled="candidates.isLoading() || ! candidates.isFilteringOn()" disable-on-ajax class="btn btn-default" type="button">
                <i class="fa fa-remove"></i> إلغاء
            </button>
        </div>
    </div>
            </div>

            <div class="block-body overflow-auto" style="height: 600px">
                
                <loading-indicator ng-if="candidates.isLoading()"></loading-indicator>

                
                <div ng-if="candidates.isLoaded() && candidates.isEmpty()" class="alert alert-info noMargin">
                    <i class="fa fa-info-circle"></i>

                    <span ng-if="candidates.isFilteringOn()">لم يتم العثور على عملاء على قائمة الإنتظار هذه يطابقوا خيارات البحث المحددة. جرب تغيير هذه الخيارات او إضغط إلغاء للرجوع.</span>
                    <span ng-if="!candidates.isFilteringOn()">ليس هناك أي عملاء بالإنتظار حالياً لهذه الدورة. لإضافة عملاء جدد إضغط على زر "إضافة عملاء جدد" بالأعلى، ومن داخل ملف العميل، من قائمة "التسجيل".</span>

                    
                    <span ng-if="candidates.isFilteringOn()">لم يتم العثور على عملاء على قائمة الإنتظار هذه يطابقوا خيارات البحث المحددة. جرب تغيير هذه الخيارات او إضغط إلغاء للرجوع.</span>
                </div>

                
                <div ng-if="candidates.isLoaded() && candidates.isNotEmpty()" class="h-100 w-100">
                    <table class="table table-busy table-auto-full-width">
                        <thead>
                        <tr>
                            <th style="width: 10px">
                                <input ng-checked="candidates.selected.isAll()"
                                       ng-click="candidates.selected.toggleAll()" type="checkbox"/>
                            </th>

                            <th>العميل</th>
                            <th>المسار التدريبي</th>
                            <th>
                                مواعيد العميل المختارة
                                <popover content="عرض العملاء الذين إختاروا مواعيد تدريب محددة سابقاً"></popover>
                            </th>

                                                            <th>بعد اختبار تحديد المستوى</th>
                            
                            <th>ملحوظات</th>
                            <th>وقت الإضافة للإنتظار</th>
                        </tr>
                        </thead>

                        <tbody>

                        <tr ng-repeat="candidate in candidates.getItems()">
                            <td>
                                <input type="checkbox" ng-checked="candidates.selected.has(candidate)"
                                       ng-click="candidates.selected.toggleOne(candidate)"/>
                            </td>

                            <td style="max-width: 25%" class="cell-wrap">
                                <div class="dropdown onSide">
                                    <button class="btn btn-xs btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li class="bg-success">
                                            <a ng-click="candidateOptions.enroll(candidate)" href="">
                                                <i class="fa fa-users"></i> التوزيع على المجموعات
                                            </a>
                                        </li>

                                        <li>
                                            <a ng-click="candidateOptions.edit(candidate)" href="">
                                                <i class="fa fa-pencil"></i> تعديل معلومات التسجيل على الإنتظار
                                            </a>
                                        </li>

                                        <li>
                                            <a ng-click="candidateOptions.move(candidate)" href="">
                                                <i class="fa fa-share"></i> نقل لقائمة إنتظار دورة اخرى
                                            </a>
                                        </li>

                                        <li class="divider"></li>

                                        <li class="bg-warning">
                                            <a ng-click="candidateOptions.deactivate(candidate)" href="">
                                                <i class="fa fa-exclamation-triangle"></i> تأجيل \ إلغاء
                                            </a>
                                        </li>

                                        <li class="bg-danger">
                                            <a ng-click="candidateOptions.drop(candidate)" href="">
                                                <i class="fa fa-remove"></i> حذف من الإنتظار
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="d-flex flex-gap-15">
                                    <div>
                                        <img src="{{ candidate.client.picture_url }}" ng-click="candidates.selected.toggleOne(candidate)"
                                             class="clientPicture small circle" alt=""/>
                                    </div>

                                    <div>
                                        <a href="{{ candidate.client.view_url }}" as-popup class="text-underlined">
                                            {{ candidate.client.name }}
                                        </a>

                                        <client-info client="candidate.client"></client-info>
                                    </div>
                                </div>
                            </td>

                            <td class="cell-wrap" ng-class="{'bg-warning': ! candidate.path}" style="min-width: 180px">
                                <div ng-if="!! candidate.path">
                                    <b>{{ candidate.path.name }}</b>
                                    <path-info ng-model="candidate.path"></path-info>
                                </div>

                                <div ng-if="! candidate.path">
                                    <i class="fa fa-exclamation-triangle text-warning"></i> غير محدد
                                </div>
                            </td>

                            <td>
                                <div ng-if="candidate.client.time_slots.length === 0">
                                    <i class="fa fa-exclamation-triangle text-warning"></i> غير محدد
                                </div>

                                <ul class="list-unstyled small">
                                    <li ng-repeat="s in candidate.client.time_slots" ng-bind-html="s.html_full_label | asHtml"></li>
                                </ul>
                            </td>

                                                            <td>
                                    <div ng-if="!! candidate.source_placement_test">
                                        <a href="{{ candidate.source_placement_test.view_url }}" class="text-underlined" target="_blank">
                                            {{ candidate.source_placement_test.name }}</a>
                                        <div class="text-muted">{{ candidate.source_placement_test.display_form }}</div>
                                    </div>

                                    <div ng-if="! candidate.source_placement_test">--</div>
                                </td>
                            
                            <td class="cell-wrap">
                                <div text-to-dialog="candidate.note"></div>
                            </td>

                            <td>
                                <span dir="ltr">{{ candidate.created_at | datetime }}</span>
                                <div class="small text-muted">{{ candidate.created_since  }}</div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            
            <div ng-if="candidates.pagination.showControls()" class="block-body border-top rounded-0">
                <pagination dataloader="candidates"></pagination>
            </div>

            <div class="block-footer d-flex flex-gap-15 align-items-center flex-wrap" data-tour="waitingLists.list" data-tour-text="بعد إختيار عميل أو اكثر يمكنك إستخدام هذه الخيارات لتوزيعهم على المجموعات التدريبية (التابعة لهذه الدورة) او نقلهم لقائمة آخرى، أو حتى تأجيل التدريب لهم!">
                <div>
                    <button ng-disabled="candidates.selected.isEmpty()" ng-click="selectedCandidates.enrollIntoBatches()" disable-on-ajax class="btn btn-primary">
                        <i class="fa fa-users"></i> التوزيع على المجموعات
                    </button>

                    <button ng-disabled="candidates.selected.isEmpty()" ng-click="selectedCandidates.move()" disable-on-ajax class="btn btn-info">
                        <i class="fa fa-share"></i> نقل لقائمة إنتظار دورة اخرى
                    </button>

                    <button ng-disabled="candidates.selected.isEmpty()" ng-click="selectedCandidates.deactivate()"
                            uib-tooltip="تأجيل، إيقاف، أو إلغاء تدريب العملاء المحددين" disable-on-ajax class="btn btn-warning">
                        <i class="fa fa-exclamation-triangle"></i> تأجيل \ إلغاء
                    </button>
                </div>

                <div>&boxh;</div>

                <div>
                    <button ng-disabled="candidates.selected.isEmpty()" ng-click="selectedCandidates.drop()" disable-on-ajax class="btn btn-danger">
                        <i class="fa fa-trash"></i> حذف من الإنتظار
                    </button>

                    <button ng-disabled="candidates.selected.isEmpty()" ng-click="selectedCandidates.sendMessage()" disable-on-ajax class="btn btn-default">
                        <i class="fa fa-send"></i> إرسال رسالة
                    </button>
                </div>
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
