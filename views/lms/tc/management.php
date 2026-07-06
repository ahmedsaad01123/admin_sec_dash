<?php
// إعداد المتغيرات
$pageTitle = 'مركز الاختبارات';
$includeSessionCheck = true;
$includeCSRFRefresh = true;

// تضمين القوالب
include_once __DIR__ . '/../../templates/header.php';
include_once __DIR__ . '/../../templates/sidebar.php';
?>

<div id="container" class="container-fluid">
<div id="content" class="">
                    <div id="pageTitle" class="d-flex flex-gap-15 flex-wrap flex-rows flex-column-on-mobile align-items-center justify-content-between">
        <div class="flex-grow-1">
            <i class="icon fa fa-laptop"></i>
            <span class="title">إدارة التعليم</span>

                            
                <ul class="breadcrumb inline" style="margin: 0">
                    <li class="breadcrumb-item"></li>

                                            <li class="breadcrumb-item">مركز الإختبارات</li>
                                    </ul>
                    </div>

        <div class="d-flex justify-content-center">
            <div>
                
                            </div>
        </div>
    </div>
        
        <ul class="nav nav-tabs">
                            <li class="active">
                    <a href="/tc/management">
                        <i class="icon fa fa-files-o"></i>
                        <span class="title">
                            الإختبارات
                        </span>
                    </a>
                </li>
            
                        <li class="">
                <a href="/tc/management/testTemplates">
                    <i class="icon fa fa-file-text"></i>
                    <span class="title">
                        قوالب الإختبارات
                    </span>
                </a>
            </li>
            
        </ul>

        
                <div ng-app="app" ng-controller="controller" class="ng-scope">

            <dismissible-hint name="testingCenter.tests.home" class="ng-isolate-scope">
    <!-- ngIf: visible --><div ng-if="visible" class="dismissibleHint  d-flex flex-gap-15 align-items-center justify-content-between">
        <div class="d-flex flex-gap-20 align-items-center flex-grow-1">
            <!-- ngIf: icon || img --><div ng-if="icon || img" class="iconHolder hidden-xs ng-scope">
                <!-- ngIf: img -->
                <!-- ngIf: icon --><span ng-if="icon" class="ms icon ng-binding ng-scope">info</span><!-- end ngIf: icon -->
            </div><!-- end ngIf: icon || img -->

            <div class="content flex-grow-1">
                <ng-transclude>
                هنا يمكنك الوصول لأي إختبارات تم إضافتها لمتدربين بالفعل. مقسمة على ثلاث انواع. إستخدم خيارات البحث والفلترة للوصول لأي إختبار تحبث عنه.

            </ng-transclude>
            </div>
        </div>

        <div>
            <!-- ngIf: dismissible --><button ng-click="dismiss()" ng-if="dismissible" class="close ng-scope" type="button">
                <span>×</span>
            </button><!-- end ngIf: dismissible -->
        </div>
    </div><!-- end ngIf: visible --></dismissible-hint>

            
            <ul class="nav nav-tabs">
                <li ng-class="{'active': tests.type.selected == 'placement'}" class="active">
                    <a ng-click="tests.type.switch('placement')" href="">
                        <i class="icon fa fa-map-signs"></i>
                        <span class="title"><test-type-name type="placement" class="ng-isolate-scope"><span class="ng-binding">إختبارات تحديد المستوى</span></test-type-name></span>
                    </a>
                </li>

                <li ng-class="{'active': tests.type.selected == 'quiz'}">
                    <a ng-click="tests.type.switch('quiz')" href="">
                        <i class="icon fa fa-question-circle"></i>
                        <span class="title"><test-type-name type="quiz" class="ng-isolate-scope"><span class="ng-binding">إختبارات اثناء التدريب</span></test-type-name></span>
                    </a>
                </li>

                <li ng-class="{'active': tests.type.selected == 'final'}">
                    <a ng-click="tests.type.switch('final')" href="">
                        <i class="icon fa fa-users"></i>
                        <span class="title"><test-type-name type="final" class="ng-isolate-scope"><span class="ng-binding">الإختبارات النهائية</span></test-type-name></span>
                    </a>
                </li>
            </ul>

            <div class="flex flex-end margin-bottom-15">
                <button ng-click="create(tests.type.selected)" class="btn btn-primary">
                    <i class="fa fa-plus-square"></i> بدء إختبار جديد
                </button>
            </div>

            
            <div class="block style2">
        <!--
        <div class="block-title">
            <i class="icon fa fa-filter"></i>
            <span class="title">التصفية</span>
        </div>
        -->

        <div class="block-body">
            <div class="row">
                
                <div class="col-xs-12 col-sm-12 col-md-3 column-bordered">
                    <div class="form-group">
                        <label>قالب إختبارات</label>
                        <test-template-picker type="tests.type.selected" setup="tests.filtering.templates.picker" class="ng-isolate-scope"><div class="tc-template-picker ng-scope">

        <!-- ngIf: templates === null -->

        <!-- ngIf: templates !== null && templates.length === 0 --><div ng-if="templates !== null &amp;&amp; templates.length === 0" class="border rounded p-10 ng-scope">
            <i class="fa fa-exclamation-triangle text-warning"></i>
            <span>ليس هناك قوالب بعد لتختار منها! لابد من إضافة قوالب للإختبارات اولاً تشمل الأسئلة.</span>

            <div class="mt-5">
                <a ng-click="create()" href="" class="btn btn-xs btn-default">
                    <i class="fa fa-plus-circle"></i> إضافة قالب
                </a>
            </div>
        </div><!-- end ngIf: templates !== null && templates.length === 0 -->

        <div ng-show="templates !== null &amp;&amp; templates.length &gt; 0" class="input-group ng-hide">
            <select ng-model="selected" ng-change="onSelect()" ng-required="setup.required" class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-required">
                <option ng-value="null" value="object:null" selected="selected">&nbsp;</option>

                <!-- ngRepeat: group in groups track by group.id -->
            </select>
            <span class="input-group-btn">
                <a href="/tc/management/testTemplates" target="_blank" class="btn btn-info" uib-tooltip="إضافة أو إدارة قوالب الإختبارات">
                    <i class="fa fa-gear m-0"></i>
                </a>
            </span>
        </div>
    </div>
</test-template-picker>
                    </div>
                </div>

                
                <!-- ngIf: tests.type.isPreTraining() --><div ng-if="tests.type.isPreTraining()" class="col-xs-12 col-sm-12 col-md-3 column-bordered ng-scope">
                    <div class="form-group">
                    	<label>نوع الإختبارات</label>
                        <placement-test-picker setup="tests.filtering.placementTest.picker" class="ng-isolate-scope">
    <div class="placementTestPicker">
        <div class="loading-indicator tiny ng-hide" ng-show="tests === null" size="tiny"><div class="icon loader1"><div></div><div></div><div></div><div></div></div><!--<i class="icon fa fa-2x fa-cog fa-spin fa-fw noMargin"></i>--><!--<img class="icon" ng-src="{{ iconUrl }}" />--></div>

        <select ng-show="tests !== null" ng-model="selectedTest" ng-options="test as test.menu_item for test in getTests() track by test.id" ng-disabled="!tests.length" ng-required="setup.required === true" class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-required" disabled="disabled"><option value="" class="" selected="selected">&nbsp;</option></select>
    </div>
</placement-test-picker>
                    </div>
                </div><!-- end ngIf: tests.type.isPreTraining() -->

                
                <!-- ngIf: tests.type.isForTraining() -->

                
                <div class="col-xs-12 col-sm-12 col-md-3 column-bordered">
                    <div class="form-group">
                        <label>المدرب</label>
                        <instructor-search setup="tests.filtering.instructor.picker" class="ng-isolate-scope">
    <div ng-class="{'widget-large': setup.largeInput, 'widget-small': !setup.largeInput}" class="typeaheadWidget instructorSearchWidget widget-small">
        <!--Selected-->
        <div ng-show="!! selected" class="well well-sm mb-0 ng-hide">
            <button ng-click="clear()" class="close" type="button">
                <span>×</span>
            </button>

            <div class="d-flex align-items-center flex-gap-10">
                <div>
                    <img class="instructorPicture circle small" alt="">
                </div>

                <div>
                    <a class="text-underlined ng-binding" target="_blank"></a>
                    <ul class="list-inline small text-muted mt-5">
                        <li class="ng-binding"><i class="fa fa-phone"></i> --</li>
                        <li class="ng-binding"><i class="fa fa-envelope-o"></i> --</li>
                    </ul>
                </div>
            </div>
        </div>

        <!--Not selected-->
        <!-- ngIf: ! selected --><div ng-if="! selected" class="ng-scope">
            <!--The loading indicator-->
            <!-- ngIf: searching -->

            <!--The input-->
            <input ng-model="name" uib-typeahead="instructor.id as instructor.name for instructor in search($viewValue)" typeahead-min-length="setup.minLength" typeahead-wait-ms="700" typeahead-on-select="select($item, $model, $label)" typeahead-loading="searching" typeahead-no-results="noResults" typeahead-template-url="instructorOption.html" ng-class="{'input-lg': setup.largeInput}" type="text" class="form-control  ng-empty" name="search" placeholder="بحث بالإسم او الرقم او البريد الإلكتروني ..." autocomplete="off" aria-autocomplete="list" aria-expanded="false" aria-owns="typeahead-20-4802"><ul class="dropdown-menu ng-isolate-scope ng-hide" ng-show="isOpen() &amp;&amp; !moveInProgress" ng-style="{top: position().top+'px', left: position().left+'px'}" role="listbox" aria-hidden="true" uib-typeahead-popup="" id="typeahead-20-4802" matches="matches" active="activeIdx" select="select(activeIdx, evt)" move-in-progress="moveInProgress" query="query" position="position" assign-is-open="assignIsOpen(isOpen)" debounce="debounceUpdate" template-url="instructorOption.html">
    <!-- ngRepeat: match in matches track by $index -->
</ul>

            <!--Messages-->
            <!-- ngIf: noResults -->
        </div><!-- end ngIf: ! selected -->
    </div>

    <script type="text/ng-template" id="instructorOption.html">
        <a href="" class="d-flex flex-gap-15 align-items-center">
            <div>
                <img src="{{ match.model.picture_url }}" class="instructorPicture small circle" alt=""/>
            </div>
            <div>
                <span ng-bind-html="match.label | uibTypeaheadHighlight:query"></span>

                <ul ng-show="match.model.national_id || match.model.phone_number" class="list-inline details margin-top-5">
                    <li ng-if="match.model._fromAnotherBranch">
                        <span class="label label-warning">{{ match.model.branch.name | cut:12 }}</span>
                    </li>

                    <li><i class="fa fa-phone"></i> {{ match.model.phone_number || '--' }}</li>
                    <li><i class="fa fa-envelope-o"></i> {{ match.model.email }}</li>
                </ul>
            </div>
        </a>
    </script>
</instructor-search>
                    </div>
                </div>

                
                <div class="col-xs-12 col-sm-12 col-md-3">
                    <div class="form-group">
                    	<label>العميل</label>

                        
                        <!-- ngIf: !tests.filtering.client.selected --><client-search-input ng-if="!tests.filtering.client.selected" setup="tests.filtering.client.picker" class="ng-scope ng-isolate-scope">
    <div ng-class="{'widget-large': setup.largeInput, 'widget-small': !setup.largeInput, 'withNewClientOption': setup.newClientOption}" class="typeaheadWidget clientSearchInputWidget widget-small">

        <!--The loading indicator-->
        <!-- ngIf: searching -->

        <!--The input-->
        <div ng-class="{'input-group': newClientOption.available}">
            <input ng-model="name" uib-typeahead="client.id as client.name for client in search($viewValue)" typeahead-min-length="setup.minLength" typeahead-wait-ms="700" typeahead-on-select="select($item, $model, $label)" typeahead-loading="searching" typeahead-no-results="noResults" typeahead-template-url="clientOption.html" ng-class="{'input-lg': setup.largeInput}" type="text" class="form-control search-input  ng-empty" placeholder="بحث بالإسم او الرقم او البريد الإلكتروني ..." autocomplete="off" aria-autocomplete="list" aria-expanded="false" aria-owns="typeahead-25-8399"><ul class="dropdown-menu ng-isolate-scope ng-hide" ng-show="isOpen() &amp;&amp; !moveInProgress" ng-style="{top: position().top+'px', left: position().left+'px'}" role="listbox" aria-hidden="true" uib-typeahead-popup="" id="typeahead-25-8399" matches="matches" active="activeIdx" select="select(activeIdx, evt)" move-in-progress="moveInProgress" query="query" position="position" assign-is-open="assignIsOpen(isOpen)" debounce="debounceUpdate" template-url="clientOption.html">
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
</client-search-input><!-- end ngIf: !tests.filtering.client.selected -->

                        
                        <!-- ngIf: !!tests.filtering.client.selected -->
                    </div>
                </div>
            </div>
        </div>

        <div class="block-footer">
            <button ng-click="tests.filtering.search()" class="btn btn-primary">
                <i class="fa fa-search"></i> بحث
            </button>
            <button ng-disabled="!tests.filtering.on" ng-click="tests.filtering.cancel()" class="btn btn-default" disabled="disabled">
                <i class="fa fa-remove"></i> إلغاء
            </button>
        </div>
    </div>

            
            <!-- ngIf: tests.tests === null -->

    
     <!-- ngIf: tests.tests !== null && tests.tests.data.length == 0 --><div class="alert alert-info ng-scope" ng-if="tests.tests !== null &amp;&amp; tests.tests.data.length == 0">
        
        <i class="fa fa-info-circle"></i>
        <!-- ngIf: tests.filtering.on -->
        <!-- ngIf: !tests.filtering.on --><span ng-if="!tests.filtering.on" class="ng-scope">لم يتم إضافة إختبارات اسفل هذا النوع بعد. بعد إضافة قوالب الإختبارات الخاصة بهذا النوع سيكون بإمكانك إضافة او بدء إختبارات جديدة</span><!-- end ngIf: !tests.filtering.on -->
    </div><!-- end ngIf: tests.tests !== null && tests.tests.data.length == 0 --> 

    
    <!-- ngIf: tests.tests !== null && tests.tests.data.length > 0 -->        </div>
                </div>
</div>


<?php
// تضمين footer template
include_once __DIR__ . '/../../templates/footer.php';
?>
