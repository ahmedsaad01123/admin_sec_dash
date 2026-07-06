<?php
// إعداد المتغيرات
$pageTitle = 'المدربين';
$includeSessionCheck = true;
$includeCSRFRefresh = true;

// تضمين القوالب
include_once __DIR__ . '/../templates/header.php';
include_once __DIR__ . '/../templates/sidebar.php';
?>

<div id="container" class="container-fluid">
<div id="content" class="">
                    <div ng-app="instructorsApp" class="ng-scope">
            <div id="pageTitle" class="d-flex flex-gap-15 flex-wrap flex-rows flex-column-on-mobile align-items-center justify-content-between">
        <div class="flex-grow-1">
            <i class="icon fa fa-user-circle"></i>
            <span class="title">المدربين</span>

                            
                <ul class="breadcrumb inline" style="margin: 0">
                    <li class="breadcrumb-item"></li>

                                            <li class="breadcrumb-item">معلومات المدربين</li>
                                    </ul>
                    </div>

        <div class="d-flex justify-content-center">
            <div>
                
                            </div>
        </div>
    </div>
            <!-- ngView: --><div ng-view="" class="ng-scope">
                    <dismissible-hint name="instructors.home" class="ng-scope ng-isolate-scope">
    <!-- ngIf: visible --><div ng-if="visible" class="dismissibleHint  d-flex flex-gap-15 align-items-center justify-content-between">
        <div class="d-flex flex-gap-20 align-items-center flex-grow-1">
            <!-- ngIf: icon || img --><div ng-if="icon || img" class="iconHolder hidden-xs ng-scope">
                <!-- ngIf: img -->
                <!-- ngIf: icon --><span ng-if="icon" class="ms icon ng-binding ng-scope">info</span><!-- end ngIf: icon -->
            </div><!-- end ngIf: icon || img -->

            <div class="content flex-grow-1">
                <ng-transclude>
        هنا يمكنك إضافة وإدارة معلومات المدربين والمدربين المساعدين (co-instructors). يمكنك إدخال نوع العمل\التعاقد، وأيضا المهمات الأساسية، الدورات التي يقدمها، وحتى مواعيد وورديات العمل لكل مدرب. هذه المعلومات ستكون هامة لاحقاً عند البحث عن المدرب المناسب لكل تدريب جديد او أي نشاط آخر.
    </ng-transclude>
            </div>
        </div>

        <div>
            <!-- ngIf: dismissible --><button ng-click="dismiss()" ng-if="dismissible" class="close ng-scope" type="button">
                <span>×</span>
            </button><!-- end ngIf: dismissible -->
        </div>
    </div><!-- end ngIf: visible --></dismissible-hint>

    
    <div class="block style4 ng-scope">
        <div class="block-title">
            <span class="title">
                قائمة المدربين
                <span class="badge ng-binding">3</span>
            </span>

            <div class="side">
                <button ng-click="create()" class="btn btn-sm btn-primary">
                    <i class="fa fa-plus-circle"></i>
                    إضافة مدرب جديد
                </button>

                <button ng-click="bulkCreate()" class="btn btn-sm btn-info">
                    <i class="fa fa-users"></i>
                    إضافة متعددة
                </button>



                <a ng-click="sendMessage()" uib-tooltip="إرسال رسالة" href="" class="btn btn-sm btn-default icon-only">
                    <i class="fa fa-send"></i>
                </a>
            </div>
        </div>

        <div class="block-body">
            
                            <div class="block style2">
    <div class="block-body p-0">
        <div class="flex flex-wrap">
            <div style="width: 200px" class="border-end p-10">
                <div class="form-group mb-0">
                    <label>البحث بالإسم او المعلومات</label>
                    <input ng-model="instructors.filtering.params.search" type="text" placeholder="" class="form-control ng-pristine ng-untouched ng-valid ng-empty">
                </div>
            </div>

            
                            <div style="width: 300px" class="border-end p-10">
                    <div class="form-group mb-0">
                        <label>المهمة الأساسية</label>
                        <popover content="البحث عن مدربين معين لهم نوع معين من مهام العمل (او اكثر)" class="ng-isolate-scope"><i uib-popover="البحث عن مدربين معين لهم نوع معين من مهام العمل (او اكثر)" popover-title="" popover-trigger="'mouseenter'" popover-placement="" class="popover-hint fa fa-question-circle"></i></popover>
                        <div>
                                                            <div class="checkbox-inline">
                                    <label class="text-normal-weight ">
                                        <input checklist-value="'lectures'" type="checkbox" ng-model="checked" class="ng-scope ng-pristine ng-untouched ng-valid ng-empty" checklist-model="instructors.filtering.params.duties">
                                        المحاضرات الأساسية
                                    </label>
                                </div>
                                                            <div class="checkbox-inline">
                                    <label class="text-normal-weight mb-0">
                                        <input checklist-value="'placement-tests'" type="checkbox" ng-model="checked" class="ng-scope ng-pristine ng-untouched ng-valid ng-empty" checklist-model="instructors.filtering.params.duties">
                                        إختبارات تحديد المستوى
                                    </label>
                                </div>
                                                    </div>
                    </div>
                </div>
            
            <div style="width: 180px" class="border-end p-10">
                <div class="form-group mb-0">
                    <label>نوع العمل\التعاقد</label>
                    <select ng-model="instructors.filtering.params.employment_type" class="form-control ng-pristine ng-untouched ng-valid ng-empty">
                        <option ng-value="null" value="object:null" selected="selected">أي</option>
                                                    <option value="full_time">دوام كامل Full-time</option>
                                                    <option value="part_time">دوام جزئي - Part-time</option>
                                                    <option value="freelance">Freelance - مستقل</option>
                                                    <option value="contract">Contractual - تعاقد</option>
                                                    <option value="internship">Internship - تدريب</option>
                                            </select>
                </div>
            </div>

            <div style="width: 220px" class="border-end p-10">
                <div class="form-group mb-0">
                    <label>الذين يقدموا دورة</label>
                    <popover content="عرض فقط المدربين الذين يقدموا (معينين لـ) دورة تدريبية معينة" class="ng-isolate-scope"><i uib-popover="عرض فقط المدربين الذين يقدموا (معينين لـ) دورة تدريبية معينة" popover-title="" popover-trigger="'mouseenter'" popover-placement="" class="popover-hint fa fa-question-circle"></i></popover>
                    <course-menu ng-model="instructors.filtering.params.assigned_course_id" class="ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty"><div class="course-menu ng-scope">
        
        <!-- ngIf: !data.courses.length -->

        
        <div ng-show="data.courses.length &gt; 0" ng-switch="searchMode">
            <!-- ngSwitchWhen: false --><div ng-switch-when="false" class="input-group ng-scope">
                <select ng-model="$parent.selected" ng-required="setup.required" ng-disabled="disabled" class="form-control has-groups ng-pristine ng-untouched ng-valid ng-empty ng-valid-required">
                    <option value="" selected="selected">&nbsp;</option>

                    <!-- ngRepeat: category in data.categories --><optgroup ng-repeat="category in data.categories" label="[ Business Development ]" class="ng-scope">
                        <!-- ngRepeat: course in getCategoryCourses(category) --><option ng-repeat="course in getCategoryCourses(category)" ng-value="course" class="ng-binding ng-scope" value="object:30">
                            Digital Marketing Strateg ... (BUS-DIG-MARK)
                        </option><!-- end ngRepeat: course in getCategoryCourses(category) --><option ng-repeat="course in getCategoryCourses(category)" ng-value="course" class="ng-binding ng-scope" value="object:31">
                            Business Planning and Str ... (BUS-PLN-STR)
                        </option><!-- end ngRepeat: course in getCategoryCourses(category) -->
                    </optgroup><!-- end ngRepeat: category in data.categories --><optgroup ng-repeat="category in data.categories" label="[ General English ]" class="ng-scope">
                        <!-- ngRepeat: course in getCategoryCourses(category) --><option ng-repeat="course in getCategoryCourses(category)" ng-value="course" class="ng-binding ng-scope" value="object:34">
                            General English - Level 1 (GEN-1)
                        </option><!-- end ngRepeat: course in getCategoryCourses(category) --><option ng-repeat="course in getCategoryCourses(category)" ng-value="course" class="ng-binding ng-scope" value="object:35">
                            General English - Level 2 (GEN-2)
                        </option><!-- end ngRepeat: course in getCategoryCourses(category) --><option ng-repeat="course in getCategoryCourses(category)" ng-value="course" class="ng-binding ng-scope" value="object:36">
                            General English - Level 3 (GEN-3)
                        </option><!-- end ngRepeat: course in getCategoryCourses(category) -->
                    </optgroup><!-- end ngRepeat: category in data.categories --><optgroup ng-repeat="category in data.categories" label="[ Web Development ]" class="ng-scope">
                        <!-- ngRepeat: course in getCategoryCourses(category) --><option ng-repeat="course in getCategoryCourses(category)" ng-value="course" class="ng-binding ng-scope" value="object:40">
                            User Experience Basics (WEB-UX)
                        </option><!-- end ngRepeat: course in getCategoryCourses(category) --><option ng-repeat="course in getCategoryCourses(category)" ng-value="course" class="ng-binding ng-scope" value="object:41">
                            JavaScript Basics (WEB-JS)
                        </option><!-- end ngRepeat: course in getCategoryCourses(category) -->
                    </optgroup><!-- end ngRepeat: category in data.categories -->
                </select>

                <div class="input-group-btn">
                    <button ng-click="toggleSearch()" type="button" class="btn btn-default icon-only">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div><!-- end ngSwitchWhen: -->

            <!-- ngSwitchWhen: true -->
        </div>
    </div></course-menu>
                </div>
            </div>

            <div style="width: 300px !important" class="p-10">
                <div class="form-group mb-0">
                    <label>الوسوم</label>
                    <div class="tags-menu pills align-items-center ng-isolate-scope ng-empty ng-valid" type="instructors" ng-model="instructors.filtering.params.tag_ids">
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

                    </div>
    </div>

    <div class="block-footer">
        <button ng-click="instructors.filtering.search()" class="btn btn-primary">
            <i class="fa fa-search"></i> بحث
        </button>

        <!-- ngIf: instructors.filtering.on -->

    </div>
</div>            
            
            <div class="block style2">
                <div class="block-body overflow-auto" style="max-height: 650px;">
                    <!-- ngIf: instructors.list === null -->

     <!-- ngIf: instructors.list !== null && instructors.list.data.length == 0 --> 

    <!-- ngIf: instructors.list !== null && instructors.list.data.length > 0 --><table ng-if="instructors.list !== null &amp;&amp; instructors.list.data.length &gt; 0" class="table table-auto-full-width ng-scope">
        <thead>
        <tr>
            <th class="cell-wrap">المدرب</th>

                            <th>المهمة الأساسية</th>
            
            <th>
                الدورات التدريبية
                <popover content="الدورات التدريبية المرتبط بها كل مدرب على القائمة" class="ng-isolate-scope"><i uib-popover="الدورات التدريبية المرتبط بها كل مدرب على القائمة" popover-title="" popover-trigger="'mouseenter'" popover-placement="" class="popover-hint fa fa-question-circle"></i></popover>
            </th>

            <th style="max-width: 250px">
                المجموعات الحالية
                <popover content="عدد المجموعات التدريبية الجديدة او النشطة المعينة للمدرب حالياً" class="ng-isolate-scope"><i uib-popover="عدد المجموعات التدريبية الجديدة او النشطة المعينة للمدرب حالياً" popover-title="" popover-trigger="'mouseenter'" popover-placement="" class="popover-hint fa fa-question-circle"></i></popover>
            </th>

            <th>جدول مواعيد العمل</th>

            <!-- ifLmsEnabled: --><th if-lms-enabled="" style="width: 180px" class="ng-scope">
                الحساب
                <popover content="حساب المدرب على النظام" class="ng-isolate-scope"><i uib-popover="حساب المدرب على النظام" popover-title="" popover-trigger="'mouseenter'" popover-placement="" class="popover-hint fa fa-question-circle"></i></popover>
            </th><!-- end ngIf: function() {
                    return window.App.lms.enabled;
                } -->

                    </tr>
        </thead>

        <tbody>
        <!-- ngRepeat: instructor in instructors.list.data --><tr ng-repeat="instructor in instructors.list.data" ng-class="{'bg-warning': instructor.inactive}" class="ng-scope">
            <td class="cell-wrap" style="min-width: 300px">
                <div class="dropdown onSide">
                    <button class="btn btn-xs btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a ng-click="instructorOptions.editInstructor(instructor)" href="">
                                <i class="fa fa-pencil"></i> تعديل
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="fa fa-graduation-cap"></i>
                                إختيار دورات المدرب
                            </a>
                        </li>

                        
                        <li>
                            <a href="#">
                                <i class="fa fa-calendar"></i>
                                جدول المحاضرات
                            </a>
                        </li>

                        <li>
                            <a ng-click="instructorOptions.sendMessage(instructor)" href="">
                                <i class="fa fa-send"></i> إرسال رسالة
                            </a>
                        </li>

                        <li>
                            <a ng-click="instructorOptions.generateBatchesReport(instructor)" href="">
                                <i class="fa fa-print"></i>
                                تقرير مجموعات المدرب
                            </a>
                        </li>
                        
                        <!-- ngIf: !instructor.inactive --><li ng-if="!instructor.inactive" class="bg-warning ng-scope">
                            <a ng-click="instructorOptions.deactivate(instructor)" href="">
                                <i class="fa fa-ban"></i>
                                حفظ كغير نشط
                            </a>
                        </li><!-- end ngIf: !instructor.inactive -->
                        
                        <!-- ngIf: instructor.inactive -->
                        <li class="bg-danger">
                            <a ng-click="instructorOptions.deleteInstructor(instructor)" href="">
                                <i class="fa fa-trash"></i> حذف
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="flex flex-margin-items-15">
                    
                    <div>
                        <a href="#">
                            <img ng-src="https://dznommenf76q0.cloudfront.net/app/images/icons/instructors/picture-placeholder.png?v=zzrlRl5vI9zKmwa" class="instructorPicture circle small box-shadow" alt="" src="https://dznommenf76q0.cloudfront.net/app/images/icons/instructors/picture-placeholder.png?v=zzrlRl5vI9zKmwa">
                        </a>
                    </div>

                    <div>
                        <a href="#" class="text-underlined ng-binding">
                            Ahmad Barakat
                        </a> &nbsp;

                        <!-- ngIf: instructor.inactive -->

                        <ul class="mt-5 list-inline text-muted">
                            <!-- ngIf: !! instructor.employment_type --><li ng-if="!! instructor.employment_type" class="ng-scope">
                                <span class="label label-info rounded ng-binding">دوام كامل Full-time</span>
                            </li><!-- end ngIf: !! instructor.employment_type -->
                            <!-- ngIf: !! instructor.phone_number --><li ng-if="!! instructor.phone_number" class="small ng-binding ng-scope">
                                <i class="fa fa-phone"></i> 0501000001
                            </li><!-- end ngIf: !! instructor.phone_number -->
                            <!-- ngIf: !! instructor.email --><li ng-if="!! instructor.email" class="small ng-binding ng-scope">
                                <i class="fa fa-envelope-o"></i> ahmad.barakat@example.com
                            </li><!-- end ngIf: !! instructor.email -->
                        </ul>

                        <!-- ngIf: instructor.tags.length -->
                    </div>
                </div>
            </td>

                            <td>
                    <!-- ngIf: instructor.display_duties.length == 0 -->

                    <!-- ngIf: instructor.display_duties.length == 1 --><div ng-if="instructor.display_duties.length == 1" class="ng-binding ng-scope">
                        <i class="fa fa-check-square text-success"></i> المحاضرات الأساسية
                    </div><!-- end ngIf: instructor.display_duties.length == 1 -->

                    <!-- ngIf: instructor.display_duties.length > 1 -->
                </td>
            
            <td class="cell-wrap" style="max-width: 230px; min-width: 230px">
                <!-- ngIf: ! instructor.courses.length -->

                
                <!-- ngIf: instructor.courses.length > 0 --><div ng-if="instructor.courses.length &gt; 0" class="ng-scope">
                    <ul class="list-compact small">
                        <!-- ngRepeat: course in instructor.courses | limitTo:5 --><li ng-repeat="course in instructor.courses | limitTo:5" class="ng-scope">
                            <a href="#" class="text-underlined ng-binding">
                                General English - Level 1</a>
                        </li><!-- end ngRepeat: course in instructor.courses | limitTo:5 --><li ng-repeat="course in instructor.courses | limitTo:5" class="ng-scope">
                            <a href="#" class="text-underlined ng-binding">
                                General English - Level 2</a>
                        </li><!-- end ngRepeat: course in instructor.courses | limitTo:5 --><li ng-repeat="course in instructor.courses | limitTo:5" class="ng-scope">
                            <a href="#" class="text-underlined ng-binding">
                                General English - Level 3</a>
                        </li><!-- end ngRepeat: course in instructor.courses | limitTo:5 -->
                        <!-- ngIf: instructor.courses.length > 5 -->
                    </ul>
                </div><!-- end ngIf: instructor.courses.length > 0 -->
            </td>

            
            <td>
                <span class="ng-binding">1</span>
            </td>

            <!--Current Schedule-->
            <td style="min-width: 220px" class="cell-wrap">
                <!-- ngIf: ! instructor.display_schedule --><div ng-if="! instructor.display_schedule" class="small ng-scope">
                    <i class="fa fa-exclamation-triangle text-warning"></i> غير محدد
                </div><!-- end ngIf: ! instructor.display_schedule -->

                <!-- ngIf: !! instructor.display_schedule -->

                <div class="mt-10">
                    <button ng-click="schedules.manage(instructor)" class="btn btn-xs btn-default">
                        <i class="fa fa-check-square-o"></i> ضبط \ تغيير
                    </button>
                </div>
            </td>

            
            <!-- ifLmsEnabled: --><td if-lms-enabled="" class="ng-scope">
                
                <!-- ngIf: instructor.account.exists -->

                
                <!-- ngIf: ! instructor.account.exists --><div ng-if="! instructor.account.exists" class="ng-scope">
                    <button ng-click="instructorOptions.createAccount(instructor)" class="btn btn-xs btn-info">
                        <i class="fa fa-key"></i> إنشاء حساب
                    </button>
                </div><!-- end ngIf: ! instructor.account.exists -->
            </td><!-- end ngIf: function() {
                    return window.App.lms.enabled;
                } -->

            
                    </tr><!-- end ngRepeat: instructor in instructors.list.data --><tr ng-repeat="instructor in instructors.list.data" ng-class="{'bg-warning': instructor.inactive}" class="ng-scope">
            <td class="cell-wrap" style="min-width: 300px">
                <div class="dropdown onSide">
                    <button class="btn btn-xs btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a ng-click="instructorOptions.editInstructor(instructor)" href="">
                                <i class="fa fa-pencil"></i> تعديل
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="fa fa-graduation-cap"></i>
                                إختيار دورات المدرب
                            </a>
                        </li>

                        
                        <li>
                            <a href="#">
                                <i class="fa fa-calendar"></i>
                                جدول المحاضرات
                            </a>
                        </li>

                        <li>
                            <a ng-click="instructorOptions.sendMessage(instructor)" href="">
                                <i class="fa fa-send"></i> إرسال رسالة
                            </a>
                        </li>

                        <li>
                            <a ng-click="instructorOptions.generateBatchesReport(instructor)" href="">
                                <i class="fa fa-print"></i>
                                تقرير مجموعات المدرب
                            </a>
                        </li>
                        
                        <!-- ngIf: !instructor.inactive --><li ng-if="!instructor.inactive" class="bg-warning ng-scope">
                            <a ng-click="instructorOptions.deactivate(instructor)" href="">
                                <i class="fa fa-ban"></i>
                                حفظ كغير نشط
                            </a>
                        </li><!-- end ngIf: !instructor.inactive -->
                        
                        <!-- ngIf: instructor.inactive -->
                        <li class="bg-danger">
                            <a ng-click="instructorOptions.deleteInstructor(instructor)" href="">
                                <i class="fa fa-trash"></i> حذف
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="flex flex-margin-items-15">
                    
                    <div>
                        <a href="#">
                            <img ng-src="https://dznommenf76q0.cloudfront.net/app/images/icons/instructors/picture-placeholder.png?v=zzrlRl5vI9zKmwa" class="instructorPicture circle small box-shadow" alt="" src="https://dznommenf76q0.cloudfront.net/app/images/icons/instructors/picture-placeholder.png?v=zzrlRl5vI9zKmwa">
                        </a>
                    </div>

                    <div>
                        <a href="#" class="text-underlined ng-binding">
                            Fatima Al-Rashid
                        </a> &nbsp;

                        <!-- ngIf: instructor.inactive -->

                        <ul class="mt-5 list-inline text-muted">
                            <!-- ngIf: !! instructor.employment_type --><li ng-if="!! instructor.employment_type" class="ng-scope">
                                <span class="label label-info rounded ng-binding">دوام كامل Full-time</span>
                            </li><!-- end ngIf: !! instructor.employment_type -->
                            <!-- ngIf: !! instructor.phone_number --><li ng-if="!! instructor.phone_number" class="small ng-binding ng-scope">
                                <i class="fa fa-phone"></i> 0501000002
                            </li><!-- end ngIf: !! instructor.phone_number -->
                            <!-- ngIf: !! instructor.email --><li ng-if="!! instructor.email" class="small ng-binding ng-scope">
                                <i class="fa fa-envelope-o"></i> fatima.alrashid@example.com
                            </li><!-- end ngIf: !! instructor.email -->
                        </ul>

                        <!-- ngIf: instructor.tags.length -->
                    </div>
                </div>
            </td>

                            <td>
                    <!-- ngIf: instructor.display_duties.length == 0 -->

                    <!-- ngIf: instructor.display_duties.length == 1 --><div ng-if="instructor.display_duties.length == 1" class="ng-binding ng-scope">
                        <i class="fa fa-check-square text-success"></i> المحاضرات الأساسية
                    </div><!-- end ngIf: instructor.display_duties.length == 1 -->

                    <!-- ngIf: instructor.display_duties.length > 1 -->
                </td>
            
            <td class="cell-wrap" style="max-width: 230px; min-width: 230px">
                <!-- ngIf: ! instructor.courses.length -->

                
                <!-- ngIf: instructor.courses.length > 0 --><div ng-if="instructor.courses.length &gt; 0" class="ng-scope">
                    <ul class="list-compact small">
                        <!-- ngRepeat: course in instructor.courses | limitTo:5 --><li ng-repeat="course in instructor.courses | limitTo:5" class="ng-scope">
                            <a href="#" class="text-underlined ng-binding">
                                Digital Marketing Strategy</a>
                        </li><!-- end ngRepeat: course in instructor.courses | limitTo:5 --><li ng-repeat="course in instructor.courses | limitTo:5" class="ng-scope">
                            <a href="#" class="text-underlined ng-binding">
                                Business Planning and Strategy</a>
                        </li><!-- end ngRepeat: course in instructor.courses | limitTo:5 -->
                        <!-- ngIf: instructor.courses.length > 5 -->
                    </ul>
                </div><!-- end ngIf: instructor.courses.length > 0 -->
            </td>

            
            <td>
                <span class="ng-binding">0</span>
            </td>

            <!--Current Schedule-->
            <td style="min-width: 220px" class="cell-wrap">
                <!-- ngIf: ! instructor.display_schedule --><div ng-if="! instructor.display_schedule" class="small ng-scope">
                    <i class="fa fa-exclamation-triangle text-warning"></i> غير محدد
                </div><!-- end ngIf: ! instructor.display_schedule -->

                <!-- ngIf: !! instructor.display_schedule -->

                <div class="mt-10">
                    <button ng-click="schedules.manage(instructor)" class="btn btn-xs btn-default">
                        <i class="fa fa-check-square-o"></i> ضبط \ تغيير
                    </button>
                </div>
            </td>

            
            <!-- ifLmsEnabled: --><td if-lms-enabled="" class="ng-scope">
                
                <!-- ngIf: instructor.account.exists -->

                
                <!-- ngIf: ! instructor.account.exists --><div ng-if="! instructor.account.exists" class="ng-scope">
                    <button ng-click="instructorOptions.createAccount(instructor)" class="btn btn-xs btn-info">
                        <i class="fa fa-key"></i> إنشاء حساب
                    </button>
                </div><!-- end ngIf: ! instructor.account.exists -->
            </td><!-- end ngIf: function() {
                    return window.App.lms.enabled;
                } -->

            
                    </tr><!-- end ngRepeat: instructor in instructors.list.data --><tr ng-repeat="instructor in instructors.list.data" ng-class="{'bg-warning': instructor.inactive}" class="ng-scope">
            <td class="cell-wrap" style="min-width: 300px">
                <div class="dropdown onSide">
                    <button class="btn btn-xs btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a ng-click="instructorOptions.editInstructor(instructor)" href="">
                                <i class="fa fa-pencil"></i> تعديل
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="fa fa-graduation-cap"></i>
                                إختيار دورات المدرب
                            </a>
                        </li>

                        
                        <li>
                            <a href="#">
                                <i class="fa fa-calendar"></i>
                                جدول المحاضرات
                            </a>
                        </li>

                        <li>
                            <a ng-click="instructorOptions.sendMessage(instructor)" href="">
                                <i class="fa fa-send"></i> إرسال رسالة
                            </a>
                        </li>

                        <li>
                            <a ng-click="instructorOptions.generateBatchesReport(instructor)" href="">
                                <i class="fa fa-print"></i>
                                تقرير مجموعات المدرب
                            </a>
                        </li>
                        
                        <!-- ngIf: !instructor.inactive --><li ng-if="!instructor.inactive" class="bg-warning ng-scope">
                            <a ng-click="instructorOptions.deactivate(instructor)" href="">
                                <i class="fa fa-ban"></i>
                                حفظ كغير نشط
                            </a>
                        </li><!-- end ngIf: !instructor.inactive -->
                        
                        <!-- ngIf: instructor.inactive -->
                        <li class="bg-danger">
                            <a ng-click="instructorOptions.deleteInstructor(instructor)" href="">
                                <i class="fa fa-trash"></i> حذف
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="flex flex-margin-items-15">
                    
                    <div>
                        <a href="#">
                            <img ng-src="https://dznommenf76q0.cloudfront.net/app/images/icons/instructors/picture-placeholder.png?v=zzrlRl5vI9zKmwa" class="instructorPicture circle small box-shadow" alt="" src="https://dznommenf76q0.cloudfront.net/app/images/icons/instructors/picture-placeholder.png?v=zzrlRl5vI9zKmwa">
                        </a>
                    </div>

                    <div>
                        <a href="/instructors/3" class="text-underlined ng-binding">
                            Khalid Mansour
                        </a> &nbsp;

                        <!-- ngIf: instructor.inactive -->

                        <ul class="mt-5 list-inline text-muted">
                            <!-- ngIf: !! instructor.employment_type --><li ng-if="!! instructor.employment_type" class="ng-scope">
                                <span class="label label-info rounded ng-binding">دوام كامل Full-time</span>
                            </li><!-- end ngIf: !! instructor.employment_type -->
                            <!-- ngIf: !! instructor.phone_number --><li ng-if="!! instructor.phone_number" class="small ng-binding ng-scope">
                                <i class="fa fa-phone"></i> 0501000003
                            </li><!-- end ngIf: !! instructor.phone_number -->
                            <!-- ngIf: !! instructor.email --><li ng-if="!! instructor.email" class="small ng-binding ng-scope">
                                <i class="fa fa-envelope-o"></i> khalid.mansour@example.com
                            </li><!-- end ngIf: !! instructor.email -->
                        </ul>

                        <!-- ngIf: instructor.tags.length -->
                    </div>
                </div>
            </td>

                            <td>
                    <!-- ngIf: instructor.display_duties.length == 0 -->

                    <!-- ngIf: instructor.display_duties.length == 1 --><div ng-if="instructor.display_duties.length == 1" class="ng-binding ng-scope">
                        <i class="fa fa-check-square text-success"></i> المحاضرات الأساسية
                    </div><!-- end ngIf: instructor.display_duties.length == 1 -->

                    <!-- ngIf: instructor.display_duties.length > 1 -->
                </td>
            
            <td class="cell-wrap" style="max-width: 230px; min-width: 230px">
                <!-- ngIf: ! instructor.courses.length -->

                
                <!-- ngIf: instructor.courses.length > 0 --><div ng-if="instructor.courses.length &gt; 0" class="ng-scope">
                    <ul class="list-compact small">
                        <!-- ngRepeat: course in instructor.courses | limitTo:5 --><li ng-repeat="course in instructor.courses | limitTo:5" class="ng-scope">
                            <a href="/courses/6" class="text-underlined ng-binding">
                                User Experience Basics</a>
                        </li><!-- end ngRepeat: course in instructor.courses | limitTo:5 --><li ng-repeat="course in instructor.courses | limitTo:5" class="ng-scope">
                            <a href="/courses/7" class="text-underlined ng-binding">
                                JavaScript Basics</a>
                        </li><!-- end ngRepeat: course in instructor.courses | limitTo:5 -->
                        <!-- ngIf: instructor.courses.length > 5 -->
                    </ul>
                </div><!-- end ngIf: instructor.courses.length > 0 -->
            </td>

            
            <td>
                <span class="ng-binding">0</span>
            </td>

            <!--Current Schedule-->
            <td style="min-width: 220px" class="cell-wrap">
                <!-- ngIf: ! instructor.display_schedule --><div ng-if="! instructor.display_schedule" class="small ng-scope">
                    <i class="fa fa-exclamation-triangle text-warning"></i> غير محدد
                </div><!-- end ngIf: ! instructor.display_schedule -->

                <!-- ngIf: !! instructor.display_schedule -->

                <div class="mt-10">
                    <button ng-click="schedules.manage(instructor)" class="btn btn-xs btn-default">
                        <i class="fa fa-check-square-o"></i> ضبط \ تغيير
                    </button>
                </div>
            </td>

            
            <!-- ifLmsEnabled: --><td if-lms-enabled="" class="ng-scope">
                
                <!-- ngIf: instructor.account.exists -->

                
                <!-- ngIf: ! instructor.account.exists --><div ng-if="! instructor.account.exists" class="ng-scope">
                    <button ng-click="instructorOptions.createAccount(instructor)" class="btn btn-xs btn-info">
                        <i class="fa fa-key"></i> إنشاء حساب
                    </button>
                </div><!-- end ngIf: ! instructor.account.exists -->
            </td><!-- end ngIf: function() {
                    return window.App.lms.enabled;
                } -->

            
                    </tr><!-- end ngRepeat: instructor in instructors.list.data -->
        </tbody>
    </table><!-- end ngIf: instructors.list !== null && instructors.list.data.length > 0 -->                </div>
                <div ng-show="instructors.list.total &gt; instructors.list.per_page" class="block-footer ng-hide">
                    <div class="paginationHolder ng-isolate-scope" data="instructors.list" loader="instructors.navigate">
        <!-- ngIf: data && data.last_page > 1 -->
    </div>
                </div>
            </div>
        </div>
    </div>
            </div>

            <script type="text/ng-template" id="instructors/home.html">
                    <dismissible-hint name="instructors.home">
        هنا يمكنك إضافة وإدارة معلومات المدربين والمدربين المساعدين (co-instructors). يمكنك إدخال نوع العمل\التعاقد، وأيضا المهمات الأساسية، الدورات التي يقدمها، وحتى مواعيد وورديات العمل لكل مدرب. هذه المعلومات ستكون هامة لاحقاً عند البحث عن المدرب المناسب لكل تدريب جديد او أي نشاط آخر.
    </dismissible-hint>

    
    <div class="block style4">
        <div class="block-title">
            <span class="title">
                قائمة المدربين
                <span class="badge">{{ instructors.list.total }}</span>
            </span>

            <div class="side">
                <button ng-click="create()" class="btn btn-sm btn-primary">
                    <i class="fa fa-plus-circle"></i>
                    إضافة مدرب جديد
                </button>

                <button ng-click="bulkCreate()" class="btn btn-sm btn-info">
                    <i class="fa fa-users"></i>
                    إضافة متعددة
                </button>

                <!--
                <a href="/courses#!/instructorsMap" class="btn btn-sm btn-default">
                    <i class="fa fa-graduation-cap"></i>
                    توزيع المدربين
                </a>
                -->

                <a ng-click="sendMessage()" uib-tooltip="إرسال رسالة"
                   href="" class="btn btn-sm btn-default icon-only">
                    <i class="fa fa-send"></i>
                </a>
            </div>
        </div>

        <div class="block-body">
            
                            <div class="block style2">
    <div class="block-body p-0">
        <div class="flex flex-wrap">
            <div style="width: 200px" class="border-end p-10">
                <div class="form-group mb-0">
                    <label>البحث بالإسم او المعلومات</label>
                    <input ng-model="instructors.filtering.params.search" type="text" placeholder=""
                           class="form-control"/>
                </div>
            </div>

            
                            <div style="width: 300px" class="border-end p-10">
                    <div class="form-group mb-0">
                        <label>المهمة الأساسية</label>
                        <popover content="البحث عن مدربين معين لهم نوع معين من مهام العمل (او اكثر)"></popover>
                        <div>
                                                            <div class="checkbox-inline">
                                    <label class="text-normal-weight ">
                                        <input checklist-model="instructors.filtering.params.duties" checklist-value="'lectures'" type="checkbox"/>
                                        المحاضرات الأساسية
                                    </label>
                                </div>
                                                            <div class="checkbox-inline">
                                    <label class="text-normal-weight mb-0">
                                        <input checklist-model="instructors.filtering.params.duties" checklist-value="'placement-tests'" type="checkbox"/>
                                        إختبارات تحديد المستوى
                                    </label>
                                </div>
                                                    </div>
                    </div>
                </div>
            
            <div style="width: 180px" class="border-end p-10">
                <div class="form-group mb-0">
                    <label>نوع العمل\التعاقد</label>
                    <select ng-model="instructors.filtering.params.employment_type" class="form-control">
                        <option ng-value="null">أي</option>
                                                    <option value="full_time">دوام كامل Full-time</option>
                                                    <option value="part_time">دوام جزئي - Part-time</option>
                                                    <option value="freelance">Freelance - مستقل</option>
                                                    <option value="contract">Contractual - تعاقد</option>
                                                    <option value="internship">Internship - تدريب</option>
                                            </select>
                </div>
            </div>

            <div style="width: 220px" class="border-end p-10">
                <div class="form-group mb-0">
                    <label>الذين يقدموا دورة</label>
                    <popover content="عرض فقط المدربين الذين يقدموا (معينين لـ) دورة تدريبية معينة"></popover>
                    <course-menu ng-model="instructors.filtering.params.assigned_course_id"></course-menu>
                </div>
            </div>

            <div style="width: 300px !important" class="p-10">
                <div class="form-group mb-0">
                    <label>الوسوم</label>
                    <tags-menu type="instructors" ng-model="instructors.filtering.params.tag_ids"></tags-menu>
                </div>
            </div>

                    </div>
    </div>

    <div class="block-footer">
        <button ng-click="instructors.filtering.search()" class="btn btn-primary">
            <i class="fa fa-search"></i> بحث
        </button>

        <button ng-if="instructors.filtering.on" ng-click="instructors.filtering.cancel()" class="btn btn-default">
            <i class="fa fa-remove"></i> إلغاء
        </button>

    </div>
</div>            
            
            <div class="block style2">
                <div class="block-body overflow-auto" style="max-height: 650px;">
                    <loading-indicator ng-if="instructors.list === null"></loading-indicator>

     <div class="alert alert-info margin-bottom-0" ng-if="instructors.list !== null && instructors.list.data.length == 0">
        
        <i class="fa fa-info-circle"></i>
        <span ng-if="! instructors.filtering.on">
            ليس هناك مدربين مسجلين بعد. المدربين هم المعلمين الذين يقدموا عملية التدريب بشكل
			فعلي داخل المؤسسة. ايضاً هنا يتم إضافة المدربين المساعدين والذين يتولوا المهمات الإضافية مثل إختبارات تحديد المستوى والجلسات والنشاطات الجانبية للتدريب الأساسي.
        </span>

        <span ng-if="instructors.filtering.on">
            ليس هناك مدربين تطابق معلوماتهم البحث المدخل!</span>

        <div ng-if="! instructors.filtering.on" class="margin-top-15">
            <button ng-click="create()" class="btn btn-sm btn-primary">
                <i class="fa fa-plus-circle"></i>
                إضافة مدرب جديد
            </button>

            <button ng-click="bulkCreate()" class="btn btn-sm btn-info">
                <i class="fa fa-users"></i>
                إضافة متعددة
            </button>
        </div>
    </div> 

    <table ng-if="instructors.list !== null && instructors.list.data.length > 0" class="table table-auto-full-width">
        <thead>
        <tr>
            <th class="cell-wrap">المدرب</th>

                            <th>المهمة الأساسية</th>
            
            <th>
                الدورات التدريبية
                <popover content="الدورات التدريبية المرتبط بها كل مدرب على القائمة"></popover>
            </th>

            <th style="max-width: 250px">
                المجموعات الحالية
                <popover content="عدد المجموعات التدريبية الجديدة او النشطة المعينة للمدرب حالياً"></popover>
            </th>

            <th>جدول مواعيد العمل</th>

            <th if-lms-enabled style="width: 180px">
                الحساب
                <popover content="حساب المدرب على النظام"></popover>
            </th>

                    </tr>
        </thead>

        <tbody>
        <tr ng-repeat="instructor in instructors.list.data" ng-class="{'bg-warning': instructor.inactive}">
            <td class="cell-wrap" style="min-width: 300px">
                <div class="dropdown onSide">
                    <button class="btn btn-xs btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a ng-click="instructorOptions.editInstructor(instructor)" href="">
                                <i class="fa fa-pencil"></i> تعديل
                            </a>
                        </li>

                        <li>
                            <a href="/instructors/{{ instructor.id }}/courses">
                                <i class="fa fa-graduation-cap"></i>
                                إختيار دورات المدرب
                            </a>
                        </li>

                        
                        <li>
                            <a href="/lectures?instructor={{ instructor.id }}">
                                <i class="fa fa-calendar"></i>
                                جدول المحاضرات
                            </a>
                        </li>

                        <li>
                            <a ng-click="instructorOptions.sendMessage(instructor)" href="">
                                <i class="fa fa-send"></i> إرسال رسالة
                            </a>
                        </li>

                        <li>
                            <a ng-click="instructorOptions.generateBatchesReport(instructor)" href="">
                                <i class="fa fa-print"></i>
                                تقرير مجموعات المدرب
                            </a>
                        </li>
                        
                        <li ng-if="!instructor.inactive" class="bg-warning">
                            <a ng-click="instructorOptions.deactivate(instructor)" href="">
                                <i class="fa fa-ban"></i>
                                حفظ كغير نشط
                            </a>
                        </li>
                        
                        <li ng-if="instructor.inactive" class="bg-success">
                            <a ng-click="instructorOptions.activate(instructor)" href="">
                                <i class="fa fa-check-square-o"></i>
                                تفعيل مرة أخرى
                            </a>
                        </li>
                        <li class="bg-danger">
                            <a ng-click="instructorOptions.deleteInstructor(instructor)" href="">
                                <i class="fa fa-trash"></i> حذف
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="flex flex-margin-items-15">
                    
                    <div>
                        <a href="{{ instructor.view_url }}">
                            <img ng-src="{{ instructor.picture_url }}"
                                 class="instructorPicture circle small box-shadow" alt=""/>
                        </a>
                    </div>

                    <div>
                        <a href="{{ instructor.view_url }}" class="text-underlined">
                            {{ instructor.name }}
                        </a> &nbsp;

                        <span ng-if="instructor.inactive" class="label label-danger">
                                <i class="fa fa-exclamation-circle"></i> غير نشط</span>

                        <ul class="mt-5 list-inline text-muted">
                            <li ng-if="!! instructor.employment_type">
                                <span class="label label-info rounded">{{ instructor.display_employment_type }}</span>
                            </li>
                            <li ng-if="!! instructor.phone_number" class="small">
                                <i class="fa fa-phone"></i> {{ instructor.phone_number }}
                            </li>
                            <li ng-if="!! instructor.email" class="small">
                                <i class="fa fa-envelope-o"></i> {{ instructor.email }}
                            </li>
                        </ul>

                        <div ng-if="instructor.tags.length" class="pills small mt-10" style="gap: 4px">
                            <span ng-repeat="tag in instructor.tags" class="pill" data-toggle="tooltip" title="{{ tag.name }}">
                                <span class="tag-color-box" ng-style="{'background-color': '#' + tag.color}"></span>
                                {{ tag.name | cut:12 }}
                            </span>
                        </div>
                    </div>
                </div>
            </td>

                            <td>
                    <div ng-if="instructor.display_duties.length == 0">
                        <i class="fa fa-exclamation-triangle text-warning"></i> غير محدد
                    </div>

                    <div ng-if="instructor.display_duties.length == 1">
                        <i class="fa fa-check-square text-success"></i> {{ instructor.display_duties[0] }}
                    </div>

                    <div ng-if="instructor.display_duties.length > 1">
                        <div ng-repeat="(i, d) in instructor.display_duties"><i class="fa fa-check-square text-success"></i> {{ d }}</div>
                    </div>
                </td>
            
            <td class="cell-wrap" style="max-width: 230px; min-width: 230px">
                <div ng-if="! instructor.courses.length">
                    <div class="small">
                        <i class="fa fa-exclamation-triangle text-warning"></i>
                        لم يتم تعيين الدورات بعد!
                    </div>

                    <div class="mt-10">
                        <a href="/instructors/{{ instructor.id }}/courses?add" class="btn btn-xs btn-default">
                            <i class="fa fa-check-square-o"></i> إختيار الدورات
                        </a>
                    </div>
                </div>

                
                <div ng-if="instructor.courses.length > 0">
                    <ul class="list-compact small">
                        <li ng-repeat="course in instructor.courses | limitTo:5">
                            <a href="{{ course.view_url }}" class="text-underlined">
                                {{ course.name }}</a>
                        </li>
                        <li ng-if="instructor.courses.length > 5">
                            + {{ instructor.courses.length - 5 }} آخرين
                        </li>
                    </ul>
                </div>
            </td>

            
            <td>
                <span>{{ instructor.batches_count }}</span>
            </td>

            <!--Current Schedule-->
            <td style="min-width: 220px" class="cell-wrap">
                <div ng-if="! instructor.display_schedule" class="small">
                    <i class="fa fa-exclamation-triangle text-warning"></i> غير محدد
                </div>

                <div ng-if="!! instructor.display_schedule" style="max-height: 100px; max-width: 100%; overflow-x: hidden; overflow-y: auto">
                    <div ng-bind-html="instructor.display_schedule | asHtml" class="small"></div>
                </div>

                <div class="mt-10">
                    <button ng-click="schedules.manage(instructor)" class="btn btn-xs btn-default">
                        <i class="fa fa-check-square-o"></i> ضبط \ تغيير
                    </button>
                </div>
            </td>

            
            <td if-lms-enabled>
                
                <div ng-if="instructor.account.exists">
                    <div class="margin-bottom-5">
                        <a href="{{ instructor.account.login_url }}" uib-tooltip="تسجيل الدخول إلى الحساب وإستخدامه بشكل مؤقت"
                           class="btn btn-xs btn-default">
                            <i class="fa fa-sign-in"></i> دخول إلى الحساب
                        </a>
                    </div>

                    <div class="small text-muted">
                            <span ng-if="instructor.account.last_login">
                                <i class="fa fa-history"></i> آخر تسجيل دخول:
                                <span dir="ltr">{{ instructor.account.last_login }}</span>
                            </span>

                        <!--<span ng-if="! instructor.account.last_login">لم يقم بتسجيل الدخول بعد</span>-->
                    </div>
                </div>

                
                <div ng-if="! instructor.account.exists">
                    <button ng-click="instructorOptions.createAccount(instructor)" class="btn btn-xs btn-info">
                        <i class="fa fa-key"></i> إنشاء حساب
                    </button>
                </div>
            </td>

            
                    </tr>
        </tbody>
    </table>                </div>
                <div ng-show="instructors.list.total > instructors.list.per_page" class="block-footer">
                    <pagination data="instructors.list" loader="instructors.navigate"></pagination>
                </div>
            </div>
        </div>
    </div>
            </script>
        </div>
            </div>
</div>


<?php
// تضمين footer template
include_once __DIR__ . '/../templates/footer.php';
?>
