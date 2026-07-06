<?php
// إعداد المتغيرات
$pageTitle = 'الكورسات';
$includeSessionCheck = true;
$includeCSRFRefresh = true;

// تضمين القوالب
include_once __DIR__ . '/../templates/header.php';
include_once __DIR__ . '/../templates/sidebar.php';
?>

<div id="container" class="container-fluid">
<div id="content" class="">
                    <div id="pageTitle">
            <i class="icon fa fa-graduation-cap"></i>
            <span class="title">إدارة الدورات التدريبية</span>

            <div class="side">
                <a href="/reports#courses" class="btn btn-xs btn-default">
                    <i class="fa fa-print"></i> التقارير
                </a>
            </div>
        </div>

        <div ng-app="coursesApp" class="ng-scope">
            <ul class="nav nav-tabs">
                <li ng-class="{'active': activeTab == 'courses'}" class="active">
                    <a href="#!/courses">
                        <i class="icon fa fa-graduation-cap"></i>
                        <span class="title">الدورات التدريبية</span>
                    </a>
                </li>

                                    <li ng-class="{'active': activeTab == 'bundles'}">
                        <a href="#!/bundles">
                            <i class="icon fa fa-cubes"></i>
                            <span class="title">الباقات</span>
                        </a>
                    </li>
                
                
                
                <li ng-class="{'active': activeTab == 'instructorsMap'}">
                    <a href="#!/instructorsMap">
                        <i class="icon fa fa-user-circle"></i>
                        <span class="title">توزيع المدربين</span>
                    </a>
                </li>
            </ul>

            <!-- ngView: --><div ng-view="" class="ng-scope">
                <dismissible-hint name="courses.home" class="ng-scope ng-isolate-scope">
    <!-- ngIf: visible --><div ng-if="visible" class="dismissibleHint  d-flex flex-gap-15 align-items-center justify-content-between">
        <div class="d-flex flex-gap-20 align-items-center flex-grow-1">
            <!-- ngIf: icon || img --><div ng-if="icon || img" class="iconHolder hidden-xs ng-scope">
                <!-- ngIf: img -->
                <!-- ngIf: icon --><span ng-if="icon" class="ms icon ng-binding ng-scope">info</span><!-- end ngIf: icon -->
            </div><!-- end ngIf: icon || img -->

            <div class="content flex-grow-1">
                <ng-transclude>
        <div class="flex flex-margin-items-15 ng-scope">
            <div>
                من هنا يمكنك إضافة وإدارة الدورات التدريبية. "الدورات التدريبية" هي الموضوعات أو المواد
				التي توفرها لعملاءك، مثل "اللغة الإنجليزية"، "الحاسب الآلي"، "التنمية البشرية" ... وهكذا. بالنسبة
				للدورات التي لها أكثر من مستوى فلابد إضافة كل مستوى كدورة تدريبية منفصلة! الدورات يتم إضافتها أسفل
				"التصنيفات"، والتصنيفات هي طريقك لتجميع الدورات التدريبية المرتبطة ببعضها أو المستويات المختلفة أسفل
				مجموعة واحدة لتسهيل تنظيم الدورات والوصول إليها. يمكنك تجميع هذه الدورات في شكل باقات او عروض او دبلومات من خلال خاصية "مسارات التدريب".            </div>

        </div>
    </ng-transclude>
            </div>
        </div>

        <div>
            <!-- ngIf: dismissible --><button ng-click="dismiss()" ng-if="dismissible" class="close ng-scope" type="button">
                <span>×</span>
            </button><!-- end ngIf: dismissible -->
        </div>
    </div><!-- end ngIf: visible --></dismissible-hint>

    
    <!-- ngIf: categories.all.list === null -->

    
    <!-- ngIf: categories.all.list !== null && categories.all.list.length == 0 -->

    
    <!-- ngIf: categories.all.list !== null && categories.all.list.length > 0 --><div ng-if="categories.all.list !== null &amp;&amp; categories.all.list.length &gt; 0" class="ng-scope">
        <div class="row margin-bottom-20">
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="block style2 primary">
                <div class="block-title">
                    <span class="title">تصنيفات الدورات</span>
                </div>
                <div class="block-body">
                    <div class="form-group noMargin">
                        <select ng-model="categories.selected.object" ng-change="categories.selected.onSelect()" class="form-control ng-pristine ng-untouched ng-valid ng-empty"><option value="? object:null ?" selected="selected"></option>
                            <!-- ngRepeat: c in categories.all.list --><option ng-repeat="c in categories.all.list" ng-value="c" ng-class="{'bg-danger': c.archived}" class="ng-binding ng-scope" value="object:12">
                                Business Development
                            </option><!-- end ngRepeat: c in categories.all.list --><option ng-repeat="c in categories.all.list" ng-value="c" ng-class="{'bg-danger': c.archived}" class="ng-binding ng-scope" value="object:13">
                                General English
                            </option><!-- end ngRepeat: c in categories.all.list --><option ng-repeat="c in categories.all.list" ng-value="c" ng-class="{'bg-danger': c.archived}" class="ng-binding ng-scope" value="object:14">
                                Web Development
                            </option><!-- end ngRepeat: c in categories.all.list -->
                        </select>

                        <div class="margin-top-15 flex flex-space-between">
                            <div>
                                <a ng-click="categories.create()" href="" class="btn btn-primary">
                                    <i class="fa fa-plus-circle"></i> إضافة تصنيف جديد                                </a>
                            </div>

                                                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        
        <!-- ngIf: categories.selected.object -->
    </div><!-- end ngIf: categories.all.list !== null && categories.all.list.length > 0 -->            </div>

            <script type="text/ng-template" id="coursesView.html">
                <dismissible-hint name="courses.home">
        <div class="flex flex-margin-items-15">
            <div>
                من هنا يمكنك إضافة وإدارة الدورات التدريبية. "الدورات التدريبية" هي الموضوعات أو المواد
				التي توفرها لعملاءك، مثل "اللغة الإنجليزية"، "الحاسب الآلي"، "التنمية البشرية" ... وهكذا. بالنسبة
				للدورات التي لها أكثر من مستوى فلابد إضافة كل مستوى كدورة تدريبية منفصلة! الدورات يتم إضافتها أسفل
				"التصنيفات"، والتصنيفات هي طريقك لتجميع الدورات التدريبية المرتبطة ببعضها أو المستويات المختلفة أسفل
				مجموعة واحدة لتسهيل تنظيم الدورات والوصول إليها. يمكنك تجميع هذه الدورات في شكل باقات او عروض او دبلومات من خلال خاصية "مسارات التدريب".            </div>

        </div>
    </dismissible-hint>

    
    <loading-indicator ng-if="categories.all.list === null"></loading-indicator>

    
    <div ng-if="categories.all.list !== null && categories.all.list.length == 0" class="alert alert-info">
        <i class="fa fa-info-circle"></i>
        ليس هناك أي تصنيفات بعد. تصنيفات الدورات ستساعدك في تنظيم الدورات عن طريق وضعهم
				في مجموعات.
        <div class="margin-top-15">
            <a ng-click="categories.create()" href="" class="btn btn-primary">
                <i class="fa fa-plus-circle"></i>
                إضافة التصنيف الأول            </a>

        </div>
    </div>

    
    <div ng-if="categories.all.list !== null && categories.all.list.length > 0">
        <div class="row margin-bottom-20">
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="block style2 primary">
                <div class="block-title">
                    <span class="title">تصنيفات الدورات</span>
                </div>
                <div class="block-body">
                    <div class="form-group noMargin">
                        <select ng-model="categories.selected.object" ng-change="categories.selected.onSelect()" class="form-control">
                            <option ng-repeat="c in categories.all.list" ng-value="c" ng-class="{'bg-danger': c.archived}">
                                {{ c.menu_name }}
                            </option>
                        </select>

                        <div class="margin-top-15 flex flex-space-between">
                            <div>
                                <a ng-click="categories.create()" href="" class="btn btn-primary">
                                    <i class="fa fa-plus-circle"></i> إضافة تصنيف جديد                                </a>
                            </div>

                                                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        
        <div ng-if="categories.selected.object">
            <div class="block style2">
        <div class="block-title flex flex-space-between flex-column-on-mobile">
            <div class="flex flex-margin-items-15 flex-align-items-center">
                
                <div>
                    <span class="title text-strong">{{ categories.selected.object.name }}</span>

                    <b ng-if="categories.selected.object.archived" class="text-danger">
                        <i class="fa fa-exclamation-triangle"></i> مؤرشف
                    </b>

                    <span ng-if="! courses.filtering.on" class="badge">{{ courses.list.length }}</span>

                    <div class="dropdown inline">
                        <a href="" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">
                            الخيارات <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                                <a ng-click="categories.edit()" href="">
                                    <i class="fa fa-pencil"></i> تعديل
                                </a>
                            </li>

                            
                            <li class="divider"></li>

                            <li ng-if="! categories.selected.object.archived" class="bg-warning">
                                <a ng-click="categories.toggleArchive(true)" href="">
                                    <i class="fa fa-eye-slash"></i> ارشفة
                                </a>
                            </li>

                            <li ng-if="categories.selected.object.archived" class="bg-success">
                                <a ng-click="categories.toggleArchive(false)" href="">
                                    <i class="fa fa-eye"></i> إلغاء الأرشفة
                                </a>
                            </li>

                            <li class="bg-danger">
                                <a ng-click="categories.delete()" href="">
                                    <i class="fa fa-trash"></i> حذف
                                </a>
                            </li>
                        </ul>
                    </div>


                    
                    <div ng-if="categories.selected.object.description"
                         class="text-muted margin-top-5">{{ categories.selected.object.description | cut:70 }}</div>

                                    </div>
            </div>

            <div ng-if="! categories.selected.object.archived">
                <button ng-click="courses.createNew()" class="btn btn-primary">
                    <i class="fa fa-plus-circle"></i> دورة جديدة                </button>
                <button ng-click="courses.bulkCreate()" class="btn btn-info">
                    <i class="fa fa-table"></i> إضافة دورات جديدة                </button>
            </div>
        </div>

        <div class="block-body">
            
            <loading-indicator ng-if="courses.list === null"></loading-indicator>

            
            <div ng-if="courses.list !== null">
                <div class="block style2">
    	<div class="block-body">
            <div class="flex flex-margin-items-20 flex-wrap">
                <div style="width: 200px">
                    <div class="form-group margin-bottom-0">
                        <label>بحث</label>
                        <input ng-model="courses.filtering.params.search" type="text" placeholder=""
                               class="form-control"/>
                    </div>
                </div>

                            </div>
    	</div>

    	<div class="block-footer">
            
            <button ng-click="courses.filtering.search()" class="btn btn-sm btn-primary">
                <i class="fa fa-search"></i> بحث
            </button>

            <button ng-if="courses.filtering.on" ng-click="courses.filtering.cancel()"
                    class="btn btn-sm btn-default">
                <i class="fa fa-remove"></i> إلغاء
            </button>

    	</div>
    </div>            </div>

            
            <div ng-if="courses.list !== null && courses.list.length == 0" class="alert alert-info mb-0">
                <i class="fa fa-info-circle"></i>

                <span ng-if="! courses.filtering.on">ليس هناك دورات أسفل هذا التصنيف. إبدأ بإضافة الدورات التدريبية الخاصة
				 بهذا التصنيف.</span>
                <span ng-if="courses.filtering.on">لم يتم العثور على دورات تطابق محددات البحث المقدمة!</span>

                <div class="margin-top-15">
                    <button ng-if="courses.filtering.on" ng-click="courses.filtering.cancel()" class="btn btn-default">
                        <i class="fa fa-plus-circle"></i> إلغاء
                    </button>

                    <button ng-click="courses.createNew()" class="btn btn-primary">
                        <i class="fa fa-plus-circle"></i> دورة جديدة                    </button>
                </div>
            </div>

            
            <div ng-if="courses.list !== null && courses.list.length > 0">
                
                <div class="table-responsive">
                    <table class="table table-auto-full-width">
                        <thead>
                        <tr>
                            <th>الدورة</th>
                            <th>
                                المدربين                                <popover content="المدربين الذين يقدموا التدريب لكل دورة تدريبية"></popover>
                            </th>
                                                                                    <th>
                                الانتظار                                <popover content="عدد من هم على قائمة الانتظار لهذه الدورة التدريبية"></popover>
                            </th>
                            <th>تكلفة الدورة</th>
                            <th>المدة</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr ng-repeat="course in courses.list" ng-class="{'bg-danger': course.archived}">
                            <td class="cell-wrap" style="min-width: 400px !important;">
                                <div class="onSide">
                                    <a href="#!/courses/{{ course.id }}/edit" uib-tooltip="تعديل" class="btn btn-xs btn-default icon-only">
                                        <i class="fa fa-pencil"></i>
                                    </a>

                                    <div class="dropdown inline">
                                        <a href="" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">
                                            <span class="caret"></span>
                                        </a>

                                        <ul class="dropdown-menu">
                                            <li ng-if="! course.archived" class="bg-success">
                                                <a href="/batches/create?course={{ course.id }}">
                                                    <i class="fa fa-plus-circle"></i>
                                                    بدء مجموعة جديدة                                                </a>
                                            </li>

                                            <li>
                                                <a ng-click="courseOptions.copy(course)" href="">
                                                    <i class="fa fa-copy"></i>
                                                    نسخ لدورة اخرى                                                </a>
                                            </li>

                                            
                                            <li>
                                                <a ng-click="courseOptions.manageTools(course)" href="">
                                                    <i class="fa fa-shopping-bag"></i>
                                                    إدارة ادوات التدريب                                                </a>
                                            </li>

                                            
                                            <li class="divider"></li>

                                            <li>
                                                <a href="/waitingLists?enroll#!/lists/{{ course.id }}">
                                                    <i class="fa fa-clipboard"></i>
                                                    تسجيل مُنتظرين جدد                                                </a>
                                            </li>

                                            <li>
                                                <a href="{{ course.waiting_view_url }}" target="_blank">
                                                    <i class="fa fa-clipboard"></i>
                                                    فتح قائمة الانتظار                                                </a>
                                            </li>

                                            <li class="divider"></li>

                                            <li>
                                                <a ng-click="courseOptions.generateBatchesReport(course)" href="">
                                                    <i class="fa fa-print"></i> تقرير بمجموعات الدورة                                                </a>
                                            </li>
                                            <li>
                                                <a ng-click="courseOptions.generateTraineesReport(course)" href="">
                                                    <i class="fa fa-print"></i> تقرير بمتدربي الدورة                                                </a>
                                            </li>

                                            <li class="divider"></li>

                                            <li ng-if="! course.archived" class="bg-warning">
                                                <a ng-click="courseOptions.toggleArchive(course, true)" href="">
                                                    <i class="fa fa-eye-slash"></i> ارشفة
                                                </a>
                                            </li>

                                            <li ng-if="course.archived" class="bg-success">
                                                <a ng-click="courseOptions.toggleArchive(course, false)" href="">
                                                    <i class="fa fa-eye"></i> إلغاء الأرشفة
                                                </a>
                                            </li>

                                            <li class="bg-danger">
                                                <a ng-click="courseOptions.delete(course)" href="">
                                                    <i class="fa fa-remove"></i> حذف
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <h4 class="name text-primary inline">
                                    <a href="{{ course.view_url }}" class="text-underlined">
                                        {{ course.name }}
                                    </a>
                                </h4>

                                <div ng-if="course.archived" class="text-danger margin-top-5">
                                    <b>
                                        <i class="fa fa-exclamation-triangle"></i>
                                        مؤرشفة
                                    </b>
                                </div>

                                <div class="margin-top-5">
                                    <ul class="list-inline small">
                                        <li class="text-strong">{{ course.code }}</li>
                                        <li ng-if="categories.selected.object.has_levels && course.level">
                                            المستوى <b>{{ course.level }}</b>
                                        </li>
                                    </ul>
                                    <div ng-if="course.description" class="text-muted description small mb-5">
                                        {{ course.description | cut:100 }}</div>

                                                                            <div ng-if="course.display_delivery_formats" class="label label-info">{{ course.display_delivery_formats }}</div>
                                                                    </div>
                            </td>

                            <td>
                                <span ng-if="!course.instructors.length">--</span>

                                <div ng-if="course.instructors.length > 0" style="max-height: 130px; overflow: auto">
                                    <ul class="list-compact">
                                        <li ng-repeat="instructor in course.instructors">
                                            {{ instructor.name }}
                                        </li>
                                    </ul>
                                </div>
                            </td>

                            
                            
                            <td><h4>{{ course.num_waiting }}</h4></td>

                            <td class="cell-wrap">
                                <ul ng-if="course.display_price_points.length > 1" class="list-compact small">
                                    <li ng-repeat="point in course.display_price_points"
                                        ng-bind-html="point | asHtml"></li>
                                </ul>

                                <div ng-if="course.display_price_points.length == 1"
                                    ng-bind-html="course.display_price_points[0] | asHtml"></div>

                                <div ng-if="course.display_price_points.length == 0">--</div>
                            </td>

                            <td>
                                <ul ng-if="course.duration_days || course.duration_lectures || course.total_hours" class="list-unstyled small">
                                    <li ng-if="course.duration_days"><b>{{ course.duration_days }}</b> ايام</li>
                                    <li ng-if="course.duration_lectures"><b>{{ course.duration_lectures }}</b> المحاضرات</li>
                                    <li ng-if="course.total_hours"><b>{{ course.total_hours }}</b> ساعة\ساعات</li>
                                </ul>
                                <span ng-if="!course.duration_days && !course.duration_lectures && !course.total_hours">--</span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                
                <!--
                <pagination data="courses.list"
                            loader="courses.paginate"></pagination>
                            -->
            </div>
        </div>
    </div>        </div>
    </div>            </script>

            <script type="text/ng-template" id="newCourseView.html">
                <div class="block style4">
        <div class="block-title">
            <a href="#!/courses" class="btn btn-xs btn-default onSide">
                <i class="fa fa-chevron-right"></i> عودة
            </a>

            <i class="icon fa fa-plus-circle"></i>
            <span class="title">إضافة دورة جديدة</span>
        </div>

        <div class="hint">
            من هنا يتم إضافة قائمة الدورات التدريبية التي توفرها المؤسسة والمعلومات الأساسية الخاصة
				بكل دورة تدريبية. لاحظ أنه لا يتم هنا تسجيل طلاب أو توزيع محاضرات، هنا فقط يتم إدخال الدورات المتوفرة
				 للاختيار منها لاحقاً. لاحظ أيضاً أن كل مستوى لأى دورة يعتبر دورة منفصلة ويجب إدخاله بشكل منفصل.        </div>

        <div class="block-body">
            <form name="newCourseForm">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label>التصنيف *</label>
            <!--
        <div class="help-block">تصنيف الدورة</div>
        -->

                <select ng-model="info.category_id"
                        ng-disabled="!data.categories.length"
                        ng-options="category.id as category.name for category in data.categories"
                        class="form-control" required></select>

                <!--
                <div class="input-group">

                    <span class="input-group-btn">
                        <button ng-click="categories.createNew()" ng-disabled="!data.categories.length"
                            class="btn btn-default icon-only" type="button">
                            <i class="fa fa-plus-circle"></i>
                        </button>
                    </span>
                </div>
                -->
            </div>
        </div>
    </div>

    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label>الإسم *</label>
                <div class="help-block">الإسم الكامل للدورة</div>

                <input id="new-course-name" ng-if="levels.list.length == 0" ng-model="info.name" type="text"
                       placeholder="{{ categories.getSelected().name }} - "
                       class="form-control" required/>
            </div>
        </div>
    </div>

    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <label>الإسم الكودي *</label>
                <div class="help-block">الإسم القصير الكودي للدورة</div>
                <input ng-model="info.code" type="text" dir="ltr" class="text-uppercase form-control" required/>

                <div ng-if="!! codeSuggestion.suggestion" class="small margin-top-5">
                    ✨ الكود المقترح:                     <b ng-click="codeSuggestion.fill()" class="text-primary cursor-pointer">{{ codeSuggestion.suggestion }}</b>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <label>
                    المستوى
                    <span ng-if="categories.getSelected() && categories.getSelected().has_levels">*</span>
                </label>
                <div class="help-block">رقم مستوى الدورة ضمن التصنيف</div>
                <input ng-model="info.level" type="number" min="1" class="form-control"
                       ng-disabled="! categories.getSelected() || ! categories.getSelected().has_levels"
                       ng-required="categories.getSelected() && categories.getSelected().has_levels"/>
            </div>
        </div>
    </div>

    
    <div class="form-group">
        <label>وصف قصير</label>
        <textarea ng-model="info.description" rows="2" class="form-control"></textarea>
    </div>

    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3">
            <div class="form-group">
                <label>المدة (بالأيام)</label>
                <popover content="المدة الإجمالية للدورة بالأيام — ليس فقط أيام التدريب، بل كامل الفترة من البداية إلى النهاية."></popover>
                <input ng-model="info.duration_days" type="number" min="1" class="form-control"/>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-3">
            <div class="form-group">
                <label>إجمالي عدد المحاضرات</label>
                <input ng-model="info.duration_lectures" type="number" min="1" class="form-control"/>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-3">
        	<div class="form-group">
                <label>إجمالي عدد الساعات</label>
                <input ng-model="info.total_hours" type="number" min="1" class="form-control"/>
            </div>
        </div>
    </div>

    
    <div class="row">
        <div class="col-sm-12 col-md-6">
        	<div class="form-group">
                <label>بداية ترقيم المجموعات</label>
                <popover content="في حال أن تسمية المجموعات لديك تكون : اسم الدورة + رقم المجموعة،
				فمن هنا يمكنك تحديد الرقم الذي يجب أن تبدأ منه المجموعة الأولي."></popover>
                <input ng-model="info.batches_numbering_start" type="number" class="form-control"/>
            </div>
        </div>

        
        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                <label>
                    سعة المجموعة الإفتراضية
                    <popover content="العدد الإفتراضي للمقاعد/المتدربين في كل مجموعة لهذه الدورة"></popover>
                </label>
                <input ng-model="info.default_batch_capacity" type="number" min="1" class="form-control"/>
            </div>
        </div>
    </div>

            <div class="form-group">
            <label>طريقة التدريب</label>
            <div>
                <div class="checkbox-inline">
                    <label>
                        <input ng-model="info.is_offline" type="checkbox"/>
                        حضورياً                    </label>
                </div>
                <div class="checkbox-inline">
                    <label>
                        <input ng-model="info.is_virtual" type="checkbox"/>
                        عبر الإنترنت                    </label>
                </div>
            </div>
        </div>
    

    
    
    <!--
    <div class="form-group">
        <label>مدة الدورة *</label>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                <input ng-model="info.duration" ng-change="onDurationChange()"
                       type="number" min="0" class="form-control"/>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                <select ng-model="info.duration_unit" ng-disabled="!info.duration"
                        ng-options="option.name as option.label for option in data.durationUnits"
                        ng-required="info.duration"
                        class="form-control">
                    <option value="">&nbsp;</option>
                </select>
            </div>
        </div>
    </div>
    -->
                        <div class="block style2">
        <div class="block-title">
            <i class="icon fa fa-user-circle"></i>
            <span class="title">مدربين هذه الدورة</span>
            <popover content="قم باختيار المدربين المسؤولين عن تقديم التدريب لهذا الدورة التدريبية الجديدة"></popover>
        </div>

        <div class="block-body">
            
            <div ng-if="data.instructors.length == 0" class="alert alert-warning noMargin">
                <i class="fa fa-info-circle"></i>
                لم يتم إضافة قائمة المدربين بعد. إبدأ بإضافة المدربين لتتمكن من الربط بينهم وبين
					الدورات التدريبية            </div>
            
            
            <div ng-if="data.instructors.length > 0">
                <div class="checkboxes-holder-search">
                    <input ng-model="instructors.search" type="text" class="form-control input-sm"
                           placeholder="بحث ..."/>
                </div>
                <div class="checkboxes-holder" style="min-height: 150px">
                    <div ng-repeat="instructor in data.instructors | filter: instructors.search" class="checkbox">
                        <label>
                            <input checklist-model="info.instructors"
                                   checklist-value="instructor.id" type="checkbox"/> {{ instructor.name }}
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>                        <div class="block style2">
        <div class="block-title">
            <i class="icon fa fa-clock-o"></i>
            <span class="title">مواعيد المحاضرات اسبوعياً</span>
        </div>
        <div class="block-body">
             <div class="alert alert-warning margin-bottom-0">
        
        <i class="fa fa-exclamation-triangle"></i>
        من الآن لم تعد تحتاج لإدخال مواعيد التدريب لكل دورة بشكل منفصل! يمكنك إستخدام خاصية "المواعيد" (صفحة "المواعيد" من قائمة "تنسيق التدريب") الجديدة لإدخال مواعيد التدريب المتاحة. والتي يختار منها العملاء، ويمكنك بناءاً عليها إنشاء المجموعات التدريب وإختيار العملاء الراغبين في موعد معين.
                <div class="mt-15">
                    <a href="/training/timeSlots" class="btn btn-sm btn-primary">
                        <i class="fa fa-external-link"></i>
                        إضافة المواعيد                    </a>
                </div>
    </div> 
        </div>
    </div>                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                        <div class="block style2">
    	<div class="block-title">
            <i class="icon fa fa-th"></i>
    		<span class="title">
                التسعير الفردي            </span>
    	</div>
    	<div class="block-body">
            <h4>نقاط السعر</h4>
            <div class="small text-muted">
                تسعيرات هذه الدورة عند بيعها بشكل فردي (وليس ضمن حزمة). لتسعير الحزم، حدد السعر على الحزمة نفسها. يجب أن يكون هناك سعر أساسي علني يظهر مع الدورة للعامة.            </div>

            <div ng-if="info.price_points.length > 0" class="table-responsive no-min-height margin-top-10" style="overflow-x: visible">
                <table class="table">
                    <thead>
                    <tr>
                        <th ng-if="info.price_points.length > 1">
                            <span uib-tooltip="السعر الأساسي والعلني الذي سيظهر في الأماكن العلنية مثل الموقع، لجميع العملاء">
                                الأساسي
                            </span>
                        </th>
                        <th>المسمى</th>
                        <th style="width: 27%">التكلفة (<i>EGP</i>)</th>
                        <th style="width: 23%" colspan="2">قبل الخصم</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="point in info.price_points track by $index">
                            <td ng-if="info.price_points.length > 1" class="text-center">
                                <input ng-model="pricingPoints.primary" ng-disabled="! point.name || ! point.cost"
                                       ng-value="$index" type="radio"/>
                            </td>

                            <td>
                                <input ng-model="point.name" type="text" class="form-control input-sm"/>
                            </td>
                            <td>
                                <div class="input-group">
                                    <input ng-model="point.cost" type="number" min="0" class="form-control input-sm"/>
                                    <div class="dropdown input-group-btn">
                                        <button data-toggle="dropdown" class="btn btn-sm btn-default dropdown-toggle" type="button">
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li ng-repeat="basis in ['trainee', 'lecture', 'hour']" ng-click="point.basis = basis" ng-class="{'active': point.basis == basis}">
                                                <a href="" class="dropdown-item">
                                                    <i ng-if="point.basis == basis" class="fa fa-check-circle"></i>
                                                    {{ trans('cost_basis_options')[basis] }}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <input ng-model="point.beforeDiscount" min="0"
                                       type="number" class="form-control input-sm"/>
                            </td>
                            <td style="width: 30px">
                                <button ng-click="pricingPoints.remove(point)" class="close" type="button">
                                    <span>&times;</span>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="margin-top-15">
                <button ng-click="pricingPoints.add()" class="btn btn-sm btn-default" type="button">
                    <i class="fa fa-plus-circle"></i> إضافة سعر                </button>
            </div>

            <hr class="dashed"/>

            <h4>الخيارات الإضافية</h4>
            <div class="small text-muted">
                اي خيارات إضافية مرتبطة بالدورة التدريبية يختار منها المتدرب عن التسجيل على مجموعة اسفل هذه الدورة            </div>

            <course-addon-manager course="info"></course-addon-manager>
    	</div>
    </div>
                        
                        <extra-info-data-entity-inline-fields setup="extraInfo.setup" api="extraInfo.api">
                        </extra-info-data-entity-inline-fields>

                        
                    </div>
                </div>

                <hr/>

                <div class="form-group">
                    <button ng-disabled="newCourseForm.$invalid" ng-click="create()" disable-on-ajax
                            class="btn btn-primary" type="submit">
                        <i class="fa fa-check"></i> إضافة الدورة الجديدة                    </button>

                    <button ng-disabled="newCourseForm.$invalid" ng-click="create(true)" disable-on-ajax
                            class="btn btn-info" type="submit">
                        <i class="fa fa-check"></i> إضافة الدورة ثم إضافة أخرى                    </button>

                    <button ng-click="go('/courses')" class="btn btn-default" type="button">
                        <i class="fa fa-chevron-right"></i> إلغاء
                    </button>
                </div>
            </form>
        </div>
    </div>
            </script>

            <script type="text/ng-template" id="newCourseView_levels.html">
                <div class="modal-header">
        <button ng-click="$close()" class="close">
            <span>&times</span>
        </button>

        <h4 class="modal-title">تحديد المستويات الأخري</h4>
    </div>

    <div class="hint">
        من هنا يمكنك تحديد المستويات التالية لهذا المستوى (لنفس الدورة التدريبيةة). يمكنك
						تغيير تكلفة ومدة كل مستوى بشكل منفصل، وبعض الخيارات الأخري سيتم نسخها من معلومات الدورة
						الأصلية(المستوى الأول). الدورة الأصلية هذه سيصبح إسمها "{{ data.originalCourse.name }} -
						Level 1"، والمستويات التالية سيتم تسميتها تباعاً.    </div>

    <div class="modal-body">
        
        <div ng-if="levels.length > 0" class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th style="width: 40%">الإسم</th>
                    <th style="width: 20%">الإسم الكودي</th>
                    <th>
                        تكلفة الدورة
                        <div class="small">
                            ({{ translation.getConstant(data.originalCourse.cost_basis, 'course_cost_basis_options') }})
                        </div>
                    </th>
                    <th style="width: 10px"></th>
                </tr>
                </thead>
                <tbody>
                <tr ng-repeat="level in levels">
                    <td>
                        <span>{{ levelOptions.getName(level.number) }}</span>
                    </td>
                    <td>
                        <span>{{ levelOptions.getCode(level.number) }}</span>
                    </td>
                    <th>
                        <div class="input-group">
                            <input ng-model="level.cost" type="text" only-digits
                                   class="form-control input-sm" required/>
                            <span class="input-group-addon">{{ data.currency }}</span>
                        </div>
                    </th>
                    <th>
                        <input ng-model="level.duration" ng-disabled="!data.originalCourse.duration_unit"
                               type="number" class="form-control input-sm" required/>
                    </th>
                    <th>
                        <button ng-if="$last" ng-click="deleteLevel(level)" class="btn btn-sm btn-primary icon-only">
                            <i class="fa fa-remove"></i>
                        </button>
                    </th>
                </tr>
                </tbody>
            </table>
        </div>

        <button ng-click="addLevel()" class="btn btn-default">
            <i class="fa fa-copy"></i> إضافة مستوى جديد        </button>
    </div>

    <div class="modal-footer">
        <button ng-click="$close()" class="btn btn-primary">
            <i class="fa fa-check"></i> حفظ
        </button>
    </div>
            </script>

            <script type="text/ng-template" id="editCourseView.html">
                <loading-indicator ng-if="!info"></loading-indicator>

    <div ng-if="info" class="block style4">
        <div class="block-title">
            <a href="#!/courses" class="btn btn-xs btn-default onSide">
                <i class="fa fa-chevron-right"></i> عودة
            </a>

            <i class="icon fa fa-edit"></i>
            <span class="title">{{ info.name }}</span>
        </div>

        <div class="block-body">
             <div class="alert alert-warning" ng-if="info.archived">
        
        <i class="fa fa-exclamation-triangle"></i>
        هذه الدورة مؤرشفة! رجاءاً لاحظ انه تم ارشفة هذه الدورة سابقا وغير متاح الآن بدء دورة جديدة اسفلها او تسجيل إنتظار لها.
    </div> 


            
            <div class="tab-content">
                <div id="edit-course-info" class="tab-pane active">
                    <form name="editCourseForm">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5">
                                <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label>الإسم</label>
                <div class="help-block">الإسم الكامل للدورة</div>
                <input ng-model="info.name" type="text" class="form-control" required/>
            </div>
        </div>
    </div>

    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <label>الإسم الكودي</label>
                <div class="help-block">الإسم القصير الكودي للدورة</div>
                <input ng-model="info.code" type="text" class="form-control text-uppercase" required/>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <label>
                    المستوى
                    <span ng-if="data.category.has_levels">*</span>
                </label>
                <div class="help-block">رقم مستوى الدورة ضمن التصنيف</div>
                <input ng-model="info.level" type="number" min="1" class="form-control"
                       ng-disabled="! data.category || ! data.category.has_levels"
                       ng-required="data.category && data.category.has_levels"/>
            </div>
        </div>
    </div>

    
    <!--
    <div class="row">
        <div class="form-group col-md-6">
            <label>التصنيف</label>
            <div class="help-block">تصنيف الدورة</div>

            <div class="input-group">
                <select ng-model="info.category_id"
                        ng-disabled="!data.categories.length"
                        ng-options="category.id as category.name for category in data.categories"
                        class="form-control" required></select>

                <span class="input-group-btn">
                    <button ng-click="categories.createNew()" ng-disabled="!data.categories.length"
                            class="btn btn-default icon-only" type="button">
                        <i class="fa fa-plus-circle"></i>
                    </button>
                </span>
            </div>
        </div>
    </div>
    -->

    
    <div class="form-group">
        <label>وصف قصير</label>
        <textarea ng-model="info.description" rows="2" class="form-control"></textarea>
    </div>

    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3">
            <div class="form-group">
                <label>المدة (بالأيام)</label>
                <popover content="المدة الإجمالية للدورة بالأيام — ليس فقط أيام التدريب، بل كامل الفترة من البداية إلى النهاية."></popover>
                <input ng-model="info.duration_days" type="number" min="1" class="form-control"/>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-3">
            <div class="form-group">
                <label>إجمالي عدد المحاضرات</label>
                <input ng-model="info.duration_lectures" type="number" min="1" class="form-control"/>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-3">
            <div class="form-group">
                <label>إجمالي عدد الساعات</label>
                <input ng-model="info.total_hours" type="number" min="1" class="form-control"/>
            </div>
        </div>
    </div>

    <div class="row">
        
        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                <label>بداية ترقيم المجموعات</label>
                <popover content="في حال أن تسمية المجموعات لديك تكون : اسم الدورة + رقم المجموعة،
				فمن هنا يمكنك تحديد الرقم الذي يجب أن تبدأ منه المجموعة الأولي."></popover>
                <input ng-model="info.batches_numbering_start"
                       ng-disabled="!setup.canChangeBatchNumberingStart"
                       type="number" class="form-control"/>
            </div>
        </div>

        
        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                <label>
                    سعة المجموعة الإفتراضية
                    <popover content="العدد الإفتراضي للمقاعد/المتدربين في كل مجموعة لهذه الدورة"></popover>
                </label>
                <input ng-model="info.default_batch_capacity" type="number" min="1" class="form-control"/>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label>طريقة التدريب</label>
        <div>
            <div class="checkbox-inline">
                <label>
                    <input ng-model="info.is_offline" type="checkbox"/>
                    حضورياً                </label>
            </div>
            <div class="checkbox-inline">
                <label>
                    <input ng-model="info.is_virtual" type="checkbox"/>
                    عبر الإنترنت                </label>
            </div>
        </div>
    </div>

    
    <!--
    <div class="form-group">
        <label>مدة الدورة</label>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                <input ng-model="info.duration" type="number" class="form-control"/>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                <select ng-model="info.duration_unit"
                        ng-disabled="!info.duration"
                        ng-options="option.name as option.label for option in data.durationUnits"
                        ng-required="info.duration"
                        class="form-control">
                    <option value="">&nbsp;</option>
                </select>
            </div>
        </div>
    </div>
    -->

                                <div class="block style2">
        <div class="block-title">
            <i class="icon fa fa-user-circle"></i>
            <span class="title">مدربين هذه الدورة</span>
            <popover content="قم باختيار المدربين المسؤولين عن تقديم التدريب لهذا الدورة التدريبية الجديدة"></popover>
        </div>

        <div class="block-body">
            
            <div ng-if="data.instructors.length == 0" class="alert alert-warning noMargin">
                <i class="fa fa-info-circle"></i>
                لم يتم إضافة قائمة المدربين بعد. إبدأ بإضافة المدربين لتتمكن من الربط بينهم وبين
					الدورات التدريبية            </div>

            
            <div ng-if="data.instructors.length > 0">
                <div class="checkboxes-holder-search">
                    <input ng-model="instructors.search" type="text" class="form-control input-sm"
                           placeholder="بحث ..."/>
                </div>
                <div class="checkboxes-holder" style="height: 120px">
                    <div ng-repeat="instructor in data.instructors | filter:instructors.search" class="checkbox">
                        <label>
                            <input checklist-model="info.instructorsIds"
                                   checklist-value="instructor.id" type="checkbox"/> {{ instructor.name }}
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>                                <div class="block style2">
        <div class="block-title">
            <i class="icon fa fa-clock-o"></i>
            <span class="title">مواعيد المحاضرات اسبوعياً</span>
        </div>
        <div class="block-body">
             <div class="alert alert-warning margin-bottom-0">
        
        <i class="fa fa-exclamation-triangle"></i>
        من الآن لم تعد تحتاج لإدخال مواعيد التدريب لكل دورة بشكل منفصل! يمكنك إستخدام خاصية "المواعيد" (صفحة "المواعيد" من قائمة "تنسيق التدريب") الجديدة لإدخال مواعيد التدريب المتاحة. والتي يختار منها العملاء، ويمكنك بناءاً عليها إنشاء المجموعات التدريب وإختيار العملاء الراغبين في موعد معين.
                <div class="mt-15">
                    <a href="/training/timeSlots" class="btn btn-sm btn-primary">
                        <i class="fa fa-external-link"></i>
                        إضافة المواعيد                    </a>
                </div>
    </div> 
        </div>
    </div>                                <div class="block style2 margin-bottom-0">
        <div class="block-title">
            <i class="icon fa fa-shopping-bag"></i>
            <span class="title">ادوات التدريب</span>
        </div>

        <div class="block-body">
            <div class="flex flex-margin-items-15">
                <div>
                    <img src="https://dznommenf76q0.cloudfront.net/app/images/icons/courses/courses/course-training-tools.png?v=zzrlRl5vI9zKmwa" alt=""/>
                </div>
                <div>
                    <p class="small">
                        "ادوات التدريب" هي اي نوع من المواد أو الأدوات التي يحصل عليها المتدربين قبل أو اثناء
					او بعد إنتهاء التدريب، مثل الكتب أو الـ CDs والهدايا ... وهكذا. يمكنك تحديد هذه المواد والأدوات
					لكل دورة تدريبية بشكل منفصل، وسيتم نسخها مع كل مجموعة جديدة، وهناك يمكنك تسجيل عمليات تسليم او
					شراء هذه الأدوات                    </p>

                    <button ng-click="manageTools()" class="btn btn-sm btn-default" type="button">
                        إدارة الأدوات                    </button>
                </div>
            </div>
        </div>
    </div>                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5">
                                <div class="block style2">
    	<div class="block-title">
            <i class="icon fa fa-th"></i>
    		<span class="title">
                التسعير الفردي            </span>
    	</div>
    	<div class="block-body">


            <h4>نقاط السعر</h4>
            <div class="small text-muted">
                تسعيرات هذه الدورة عند بيعها بشكل فردي (وليس ضمن حزمة). لتسعير الحزم، حدد السعر على الحزمة نفسها. يجب أن يكون هناك سعر أساسي علني يظهر مع الدورة للعامة.            </div>

            <div ng-if="info.price_points.length > 0" class="table-responsive no-min-height margin-top-10" style="overflow-x: visible">
                <table class="table">
                    <thead>
                    <tr>
                        <th ng-if="info.price_points.length > 1">
                            <span uib-tooltip="السعر الأساسي والعلني الذي سيظهر في الأماكن العلنية مثل الموقع، لجميع العملاء">
                                الأساسي
                            </span>
                        </th>
                        <th>المسمى</th>
                        <th style="width: 27%">التكلفة (<i>EGP</i>)</th>
                        <th style="width: 23%" colspan="2">قبل الخصم</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr ng-repeat="point in info.price_points track by $index">
                        <td ng-if="info.price_points.length > 1" class="text-center">
                            <input ng-model="pricingPoints.primary" ng-disabled="! point.name || ! point.cost"
                                   ng-value="$index" type="radio"/>
                        </td>

                        <td>
                            <input ng-model="point.name" type="text" class="form-control input-sm"/>
                        </td>

                        <td>
                            <div class="input-group">
                                <input ng-model="point.cost" type="number" min="0" class="form-control input-sm"/>
                                <div class="dropdown input-group-btn">
                                    <button data-toggle="dropdown" class="btn btn-sm btn-default dropdown-toggle" type="button">
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li ng-repeat="basis in ['trainee', 'lecture', 'hour']" ng-click="point.basis = basis" ng-class="{'active': point.basis == basis}">
                                            <a href="" class="dropdown-item">
                                                <i ng-if="point.basis == basis" class="fa fa-check-circle"></i>
                                                {{ trans('cost_basis_options')[basis] }}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </td>
                        <td>
                            <input ng-model="point.beforeDiscount" min="0"
                                   type="number" class="form-control input-sm"/>
                        </td>
                        <td style="width: 30px">
                            <button ng-click="pricingPoints.remove(point)" class="close" type="button">
                                <span>&times;</span>
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="margin-top-15">
                <button ng-click="pricingPoints.add()" class="btn btn-sm btn-default" type="button">
                    <i class="fa fa-plus-circle"></i> إضافة سعر                </button>
            </div>

            <hr class="dashed"/>

            <h4>الخيارات الإضافية</h4>
            <div class="small text-muted">
                اي خيارات إضافية مرتبطة بالدورة التدريبية يختار منها المتدرب عن التسجيل على مجموعة اسفل هذه الدورة            </div>

            <course-addon-manager course="info"></course-addon-manager>
    	</div>
    </div>
                                
                                <extra-info-data-entity-inline-fields setup="extraInfo.setup" api="extraInfo.api">
                                </extra-info-data-entity-inline-fields>
                            </div>
                        </div>
                    </form>
                </div>

                            </div>

            <hr/>

            <div class="form-group">
                <button ng-disabled="editCourseForm.$invalid" ng-click="submit()" class="btn btn-primary">
                    <i class="fa fa-check"></i> حفظ
                </button>
                <button ng-click="go('/courses')" class="btn btn-default" type="button">
                    <i class="fa fa-chevron-right"></i> عودة
                </button>
            </div>

        </div>
    </div>            </script>

            <script type="text/ng-template" id="courseView.html">
            </script>

            <script type="text/ng-template" id="instructorsMap.html">
                <loading-indicator ng-if="map === null"></loading-indicator>

    
    <div ng-if="map !== null">
        
        <div ng-bind-html="map"></div>
    </div>            </script>

            
            <script type="text/ng-template" id="bundles.html">
                <loading-indicator ng-if="bundles.loading"></loading-indicator>

    
    <div ng-if="!bundles.loading && bundles.list !== null && bundles.list.length === 0 && bundles.deletedCount === 0" class="alert alert-info">
        <i class="fa fa-info-circle"></i>
        لم يتم إنشاء أي باقات دورات بعد. تتيح لك الباقات تجميع الدورات معاً بسعر موحد.

        <div class="margin-top-15">
            <button ng-click="bundleOptions.create()" class="btn btn-primary">
                <i class="fa fa-plus-circle"></i> باقة جديدة
            </button>
        </div>
    </div>

    
    <div ng-if="!bundles.loading && bundles.list !== null && (bundles.list.length > 0 || bundles.deletedCount > 0)">
        
        <div class="d-flex justify-content-between align-items-center mb-15">
            <div>
                <button ng-click="bundleOptions.create()" class="btn btn-primary">
                    <i class="fa fa-plus-circle"></i>
                    باقة جديدة
                </button>
            </div>

            <div ng-if="bundles.deletedCount > 0" class="d-flex align-items-center flex-gap-10">
                <switch ng-model="filters.showDeleted" callback="bundles.load"></switch>
                Show deleted
            </div>
        </div>

        
        <div ng-if="bundles.getActive().length > 0" class="bundles-grid grid grid-3cols">
            <div ng-repeat="bundle in bundles.getActive() track by bundle.id" class="grid-cell">
                <div class="block style2" ng-class="{'deleted-bundle': bundle.deleted_at}">
        
        <div class="block-title">
            
            <div ng-if="bundle.deleted_at" class="onSide">
                <span class="label label-danger">
                    <i class="fa fa-trash"></i> محذوف
                </span>
            </div>

            <h4 class="title" ng-class="{'text-muted': bundle.deleted_at}">{{ bundle.name }}</h4>
            <span ng-if="bundle.code" class="label label-default small">{{ bundle.code }}</span>
        </div>

        
        <div class="block-body">
            
            <div ng-if="bundle.description" class="small mb-10">
                {{ bundle.description | cut:100 }}
            </div>

            
            <div class="d-flex justify-content-between mb-10">
                <div>
                    <span class="h4 margin-0" ng-class="bundle.deleted_at ? 'text-muted' : 'text-primary text-strong'">
                        {{ bundle.total_price | number:2 }}
                    </span>
                    <span class="text-muted small">{{ bundle.currency }}</span>
                </div>

                <div>
                    <span class="label" ng-class="bundle.deleted_at ? 'label-default' : 'label-info'">
                        <i class="fa fa-book"></i>
                        {{ bundle.num_courses }} دورات
                    </span>
                </div>
            </div>

            
            <div ng-if="bundle.total_duration_days || bundle.total_duration_lectures || bundle.total_hours" class="small text-muted mb-10">
                <i class="fa fa-clock-o"></i>
                <span ng-if="bundle.total_duration_days">{{ bundle.total_duration_days }} ايام</span>
                <span ng-if="bundle.total_duration_days && (bundle.total_duration_lectures || bundle.total_hours)">&bull;</span>
                <span ng-if="bundle.total_duration_lectures">{{ bundle.total_duration_lectures }} المحاضرات</span>
                <span ng-if="bundle.total_duration_lectures && bundle.total_hours">&bull;</span>
                <span ng-if="bundle.total_hours">{{ bundle.total_hours }} ساعة\ساعات</span>
            </div>

            
            <div ng-if="bundle.courses && bundle.courses.length > 0" class="border-top mt-15">
                <div class="text-muted small text-strong mb-5 mt-15">
                    الدورات المضمنة:
                </div>
                <ul class="list-unstyled small" ng-class="{'text-muted': bundle.deleted_at}">
                    <li ng-repeat="course in bundle.courses" class="mb-5">
                        <a ng-href="{{ course.view_url }}" class="text-underlined" target="_blank">
                            {{ course.full_name }}</a>
                    </li>
                </ul>
            </div>

            <div ng-if="!bundle.courses || bundle.courses.length === 0" class="text-muted small">
                <i class="fa fa-info-circle"></i> الدورات ليست محددة، ولكن يتم إختيارها لكل عميل لاحقاً (مثلا بعد إختبار تحديد المستوى)
            </div>
        </div>

        
        <div class="block-footer">
            
            <ng-container ng-if="!bundle.deleted_at">
                <a ng-click="bundleOptions.edit(bundle)" href="" class="btn btn-sm btn-default">
                    <i class="fa fa-pencil"></i> تعديل
                </a>

                <a ng-click="bundleOptions.delete(bundle)" href="" class="btn btn-sm btn-danger">
                    <i class="fa fa-trash"></i> حذف
                </a>
            </ng-container>

            
            <a ng-if="bundle.deleted_at" ng-click="bundleOptions.restore(bundle)" href="" class="btn btn-sm btn-success">
                <i class="fa fa-undo"></i> إلغاء الحذف
            </a>
        </div>
    </div>
            </div>
        </div>

        
        <div ng-if="bundles.getActive().length === 0 && bundles.deletedCount > 0" class="alert alert-warning">
            <i class="fa fa-info-circle"></i>
            جميع الباقات مؤرشفة. استخدم زر التبديل أعلاه لعرضها.
        </div>

        
        <div ng-if="filters.showDeleted && bundles.getDeleted().length > 0" class="margin-top-30">
            <h4 class="text-muted mb-15">
                <i class="fa fa-trash"></i> Deleted Bundles
            </h4>

            <div class="bundles-grid grid grid-3cols">
                <div ng-repeat="bundle in bundles.getDeleted() track by bundle.id" class="grid-cell">
                    <div class="block style2" ng-class="{'deleted-bundle': bundle.deleted_at}">
        
        <div class="block-title">
            
            <div ng-if="bundle.deleted_at" class="onSide">
                <span class="label label-danger">
                    <i class="fa fa-trash"></i> محذوف
                </span>
            </div>

            <h4 class="title" ng-class="{'text-muted': bundle.deleted_at}">{{ bundle.name }}</h4>
            <span ng-if="bundle.code" class="label label-default small">{{ bundle.code }}</span>
        </div>

        
        <div class="block-body">
            
            <div ng-if="bundle.description" class="small mb-10">
                {{ bundle.description | cut:100 }}
            </div>

            
            <div class="d-flex justify-content-between mb-10">
                <div>
                    <span class="h4 margin-0" ng-class="bundle.deleted_at ? 'text-muted' : 'text-primary text-strong'">
                        {{ bundle.total_price | number:2 }}
                    </span>
                    <span class="text-muted small">{{ bundle.currency }}</span>
                </div>

                <div>
                    <span class="label" ng-class="bundle.deleted_at ? 'label-default' : 'label-info'">
                        <i class="fa fa-book"></i>
                        {{ bundle.num_courses }} دورات
                    </span>
                </div>
            </div>

            
            <div ng-if="bundle.total_duration_days || bundle.total_duration_lectures || bundle.total_hours" class="small text-muted mb-10">
                <i class="fa fa-clock-o"></i>
                <span ng-if="bundle.total_duration_days">{{ bundle.total_duration_days }} ايام</span>
                <span ng-if="bundle.total_duration_days && (bundle.total_duration_lectures || bundle.total_hours)">&bull;</span>
                <span ng-if="bundle.total_duration_lectures">{{ bundle.total_duration_lectures }} المحاضرات</span>
                <span ng-if="bundle.total_duration_lectures && bundle.total_hours">&bull;</span>
                <span ng-if="bundle.total_hours">{{ bundle.total_hours }} ساعة\ساعات</span>
            </div>

            
            <div ng-if="bundle.courses && bundle.courses.length > 0" class="border-top mt-15">
                <div class="text-muted small text-strong mb-5 mt-15">
                    الدورات المضمنة:
                </div>
                <ul class="list-unstyled small" ng-class="{'text-muted': bundle.deleted_at}">
                    <li ng-repeat="course in bundle.courses" class="mb-5">
                        <a ng-href="{{ course.view_url }}" class="text-underlined" target="_blank">
                            {{ course.full_name }}</a>
                    </li>
                </ul>
            </div>

            <div ng-if="!bundle.courses || bundle.courses.length === 0" class="text-muted small">
                <i class="fa fa-info-circle"></i> الدورات ليست محددة، ولكن يتم إختيارها لكل عميل لاحقاً (مثلا بعد إختبار تحديد المستوى)
            </div>
        </div>

        
        <div class="block-footer">
            
            <ng-container ng-if="!bundle.deleted_at">
                <a ng-click="bundleOptions.edit(bundle)" href="" class="btn btn-sm btn-default">
                    <i class="fa fa-pencil"></i> تعديل
                </a>

                <a ng-click="bundleOptions.delete(bundle)" href="" class="btn btn-sm btn-danger">
                    <i class="fa fa-trash"></i> حذف
                </a>
            </ng-container>

            
            <a ng-if="bundle.deleted_at" ng-click="bundleOptions.restore(bundle)" href="" class="btn btn-sm btn-success">
                <i class="fa fa-undo"></i> إلغاء الحذف
            </a>
        </div>
    </div>
                </div>
            </div>
        </div>
    </div>

                </script>

            <script type="text/ng-template" id="catalog.html">
                <dismissible-hint name="public-catalog.home">
        من هنا يمكنك التحكم في خصائص محتوى الكتالوج العلني للدورات. هذا الكتالوج هو نسخة مطابقة من قائمة الدورات والمسارات الموجودة داخليا، ولكن مخصصة لتظهر خارج المنصة، في الأماكن العلنية مثل الموقع الإلكتروني او تطبيق الهاتف. حيث يمكن للعملاء الجدد والحاليين الأطلاع عليها والإختيار منها للطلب. ابدأ بإدخال الدورات والتصنيفات، ثم سيكون بإمكانك تخصيص إعدادت ومظهر كل دورة من هنا او من إعدادات الدورة نفسها.
    </dismissible-hint>

    
    <ul class="nav nav-tabs">
        <li class="active">
            <a data-toggle="tab" data-target="#courses-items" href="">
                <span class="title">الدورات التدريبية</span>
            </a>
        </li>
            </ul>

    <div class="tab-content">
        <div id="courses-items" class="tab-pane active">
            <loading-indicator ng-if="categories.categories === null"></loading-indicator>

     <div class="alert alert-info" ng-if="categories.categories !== null && categories.categories.length === 0">
        
        <i class="fa fa-info-circle"></i>
        ليس هناك اي دورات بعد. بعد إضافة الدورات وتصنيفاتها سيمكنك من هنا التحكم في مظهر هذه الدورات على الأماكن العلنية لها. الكتالوج العلني هو نسخة يمكن تخصيصها لنفس قائمة الدورات والتصنيفات المدخلة بالفعل.
    </div> 

    <div ng-if="categories.categories !== null && ! categories.selected.category" id="categories-view">
        <div class="catalog-items-wrapper category-items grid grid-3cols">
        <div ng-repeat="category in categories.categories" class="grid-cell catalog-item">
            <div class="block style2">

                
                <div class="flags">
                    <div ng-if="! category.catalog_item.viewable" class="unviewable-flag label label-danger box-shadow">
                        <i class="fa fa-eye-slash"></i> غير ظاهر
                    </div>

                    <div ng-if="category.catalog_item.viewable && ! category.catalog_item.accepts_requests" class="unrequestable-flag label label-warning box-shadow">
                        <i class="fa fa-ban"></i> غير متاح للطلب
                    </div>

                    <span ng-if="category.catalog_item.featured" uib-tooltip="مميز" class="featured-flag label label-primary">
                        <i class="fa fa-star margin-0"></i>
                    </span>
                </div>

                
                <div ng-click="categories.selected.set(category, $event)" class="thumb-image cursor-pointer"
                     style="background-image: url('{{ category.catalog_item.thumbnail_url }}')"></div>

                
                <div ng-click="categories.selected.set(category, $event)" class="block-body cursor-pointer">
                    <h4 class="text-strong">{{ category.catalog_item.name }}</h4>
                    <div class="text-muted small">{{ category.catalog_item.description | cut:80 }}</div>
                </div>

                
                <div class="block-footer">
                    <a ng-click="items.editCategory(category.catalog_item)" href="" target="_blank" class="btn btn-xs btn-default">
                        <i class="fa fa-pencil"></i> تعديل
                    </a>

                                    </div>

            </div>
        </div>
    </div>    </div>

    <div ng-if="categories.categories !== null && !! categories.selected.category" id="category-view">
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3">
            <div class="margin-bottom-15">
                <a ng-click="categories.selected.clear()" href="" class="btn btn-default icon-only">
                    <i class="fa fa-chevron-right"></i>
                </a>
            </div>

        	<div class="list-group">
                <a ng-repeat="category in categories.categories" ng-click="categories.selected.set(category)"
                   ng-class="{'active': categories.selected.is(category)}" href="" class="list-group-item">
                    <i ng-if="categories.selected.is(category)" class="arrow fa fa-chevron-left"></i>
                    {{ category.catalog_item.name }}
                </a>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-9">
            <div class="block style4">

                <div ng-if="categories.selected.category.catalog_item.cover_image"
                     class="cover-image box-shadow margin-bottom-15 roundedCorners"
                     style="background-image: url('{{ categories.selected.category.catalog_item.cover_image_url }}')"></div>

                <div class="block-title">
                    <div>
                        <span class="title">{{ categories.selected.category.catalog_item.name }}</span>

                        <span ng-if="! categories.selected.category.catalog_item.viewable" class="unviewable-flag label label-danger box-shadow">
                            <i class="fa fa-eye-slash"></i> غير ظاهر
                        </span>

                        <div ng-if="categories.selected.category.catalog_item.viewable && ! categories.selected.category.catalog_item.accepts_requests"
                             class="unrequestable-flag label label-warning box-shadow">
                            <i class="fa fa-ban"></i> غير متاح للطلب
                        </div>
                    </div>

                    <div class="sub-title">{{ categories.selected.category.catalog_item.description }}</div>

                    <div class="side">
                        <a ng-click="items.editCategory(categories.selected.category.catalog_item)" href="" class="btn btn-xs btn-primary">
                            <i class="fa fa-pencil"></i> تعديل
                        </a>

                        <a ng-if="! categories.selected.category.catalog_item.published" ng-click="items.togglePublish(categories.selected.category.catalog_item)" href="" class="btn btn-xs btn-success">
                            <i class="fa fa-eye"></i> نشر
                        </a>

                        <a ng-if="categories.selected.category.catalog_item.published" ng-click="items.togglePublish(categories.selected.category.catalog_item)" href="" class="btn btn-xs btn-warning">
                            <i class="fa fa-eye-slash"></i> إلغاء النشر
                        </a>

                                            </div>
                </div>

                <div class="block-body">

                    <div class="row margin-bottom-15">
                        <div class="col-xs-12 col-sm-12 col-md-4 col-md-offset-4">
                            <div class="form-group">
                                <input ng-model="courses.search" type="text"
                                       placeholder="بحث ..." class="form-control input-lg"/>
                            </div>
                        </div>
                    </div>

                    <loading-indicator ng-if="courses.courses === null"></loading-indicator>

                    <div ng-if="courses.courses !== null" class="catalog-items-wrapper course-items grid grid-3cols">
                        <div ng-repeat="course in courses.courses | filter: courses.search" class="grid-cell catalog-item">
                        	<div class="block style2 m-0">

                                
                                <div class="flags">
                                    <div ng-if="! course.catalog_item.viewable" class="unviewable-flag label label-danger box-shadow">
                                        <i class="fa fa-eye-slash"></i> غير ظاهر
                                    </div>

                                    <div ng-if="course.catalog_item.viewable && ! course.catalog_item.requestable" class="unrequestable-flag label label-warning box-shadow">
                                        <i class="fa fa-ban"></i> غير متاح للطلب
                                    </div>

                                    <span ng-if="course.catalog_item.featured" uib-tooltip="مميز" class="featured-flag label label-primary">
                                        <i class="fa fa-star margin-0"></i>
                                    </span>
                                </div>

                                <div ng-click="items.editCourse(course.catalog_item)" class="thumb-image cursor-pointer" style="background-image: url('{{ items.getCourseThumbUrl(course) }}')"></div>

                        		<div class="block-body">
                                    <div>
                                        <h4>{{ course.catalog_item.name }}</h4>
                                        <div class="text-muted small">{{ course.catalog_item.description | cut:80 }}</div>
                                    </div>

                                    <ul class="list-inline text-muted margin-top-10">
                                        <li ng-if="course.cost > 0">
                                            <i class="fa fa-money"></i>
                                            <s ng-if="course.before_discount_cost">{{ course.before_discount_cost }}</s>
                                            <b>{{ course.cost }}</b>
                                            {{ course.display_cost_basis }}
                                        </li>
                                        <li><i class="fa fa-clock-o"></i> {{ course.total_hours }} ساعة\ساعات</li>
                                    </ul>
                        		</div>

                                <div class="block-footer">
                                    <a ng-click="items.editCourse(course.catalog_item)" href="" class="btn btn-xs btn-default">
                                        <i class="fa fa-pencil"></i> تعديل
                                    </a>

                                    <a ng-if="! course.catalog_item.published" ng-click="items.togglePublish(course.catalog_item)" href="" class="btn btn-xs btn-success">
                                        <i class="fa fa-eye"></i> نشر
                                    </a>

                                    <a ng-if="course.catalog_item.published" ng-click="items.togglePublish(course.catalog_item)" href="" class="btn btn-xs btn-warning">
                                        <i class="fa fa-eye-slash"></i> إلغاء النشر
                                    </a>

                                                                    </div>
                        	</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>        </div>
            </div>            </script>
        </div>
            </div>
</div>

<?php
// تضمين footer template
include_once __DIR__ . '/../templates/footer.php';
?>
