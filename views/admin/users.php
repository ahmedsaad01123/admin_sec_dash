<?php
// إعداد المتغيرات
$pageTitle = 'المستخدمون والصلاحيات';
$includeSessionCheck = true;
$includeCSRFRefresh = true;

// تضمين القوالب
include_once __DIR__ . '/../templates/header.php';
include_once __DIR__ . '/../templates/sidebar.php';
?>

<div id="container" class="container-fluid">
<div id="content" class="usersManagement">
                    <div id="pageTitle" class="d-flex flex-gap-15 flex-wrap flex-rows flex-column-on-mobile align-items-center justify-content-between">
        <div class="flex-grow-1">
            <i class="icon fa fa-sliders"></i>
            <span class="title">الإدارة</span>

                            
                <ul class="breadcrumb inline" style="margin: 0">
                    <li class="breadcrumb-item"></li>

                                            <li class="breadcrumb-item">المستخدمين والصلاحيات</li>
                                    </ul>
                    </div>

        <div class="d-flex justify-content-center">
            <div>
                
                            </div>
        </div>
    </div>
        <div ng-app="usersApp" class="ng-scope">
            
            <dismissible-hint name="admin.users.home" class="ng-isolate-scope">
    <!-- ngIf: visible --><div ng-if="visible" class="dismissibleHint  d-flex flex-gap-15 align-items-center justify-content-between">
        <div class="d-flex flex-gap-20 align-items-center flex-grow-1">
            <!-- ngIf: icon || img --><div ng-if="icon || img" class="iconHolder hidden-xs ng-scope">
                <!-- ngIf: img -->
                <!-- ngIf: icon --><span ng-if="icon" class="ms icon ng-binding ng-scope">info</span><!-- end ngIf: icon -->
            </div><!-- end ngIf: icon || img -->

            <div class="content flex-grow-1">
                <ng-transclude>من هنا يمكنك إضافة وإدارة حسابات وأدوار فريق العمل لديك (بدون المدربين). قم اولاً بإضافة فرق العمل او الأقسام كـ "ادوار"، وإختر قائمة الصلاحيات المناسبة لكل دور. بعد ذلك قم بإضافة المستخدمين، وأختر الدور او الأدوار المناسبة لكل مستخدم جديد، وبذلك سيحصل كل المستخدم على صلاحيات الدور او الأدوار المعطاه له. الأدوار تكون متشاركة بين كافة الفروع، ولكن يكون هناك قائمة مستخدمين لكل فرع.
		<b class="ng-scope">لاحظ ان حسابات المدربين والعملاء لا يتم إنشائها هنا، ولكن اثناء إضافتهم على المنصة من الصفحات المخصصة لذلك او بعدها من دخل ملف المدرب او العميل.</b>
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
                    <li ng-class="{'active': activeTab == 'users'}" class="active">
                        <a href="#!/users">
                            <i class="icon fa fa-user"></i>
                            <span class="title">المستخدمون</span>
                        </a>
                    </li>

                    <li ng-class="{'active': activeTab == 'roles'}">
                        <a href="#!/roles">
                            <i class="icon fa fa-key"></i>
                            <span class="title">الأدوار</span>
                        </a>
                    </li>
                </ul>
            
            <div class="tab-content">
                <!-- ngView: --><div ng-view="" class="ng-scope"><!-- ngIf: users.list === null -->

    <!-- ngIf: users.list !== null --><div ng-if="users.list !== null" class="block style4 ng-scope">
            <div class="block-title">
                <i class="icon fa fa-users"></i>
                <span class="title">المستخدمون</span>
                <!--
                <button ng-click="users.load()" class="btn btn-xs btn-default">
                    <i class="fa fa-refresh"></i> تحديث
                </button>
                -->

                <div class="side">
                    <button ng-click="addNewUser()" class="btn btn-sm btn-primary">
                        <i class="fa fa-plus-circle"></i> إضافة مستخدم جديد
                    </button>

                    <a href="/admin/users/home/exportUsers" class="btn btn-sm btn-info">
                        <i class="fa fa-download"></i> تصدير
                    </a>

                    <button ng-click="sendMessage()" class="btn btn-sm btn-default icon-only">
                        <i class="fa fa-send"></i>
                    </button>
                </div>
            </div>

            <div class="block-body">
                <div class="flex flex-space-between margin-bottom-20">
                    
                                            <!-- ngIf: data.branches.length > 1 -->
                    
                    <div>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-search margin-0"></i>
                            </div>
                            <input ng-model="users.params.search" ng-change="users.load()" ng-model-options="{'debounce': 1000}" type="text" placeholder="بحث ..." class="form-control ng-pristine ng-untouched ng-valid ng-empty">
                        </div>
                    </div>
                </div>

                
                <!-- ngIf: users.list.data.length == 0 --><div ng-if="users.list.data.length == 0" class="alert alert-info ng-scope">
                    <i class="fa fa-info-circle"></i>
                    <!-- ngIf: ! users.params.search --><span ng-if="! users.params.search" class="ng-scope">ليس هناك مستخدمين آخرين بعد، إبدأ بإضافة باقي المستخدمين وتحديد صلاحياتهم</span><!-- end ngIf: ! users.params.search -->
                    <!-- ngIf: !! users.params.search -->

                    <!-- ngIf: ! users.params.search --><div ng-if="! users.params.search" class="mt-15 ng-scope">
                        <button ng-click="addNewUser()" class="btn btn-sm btn-primary">
                            <i class="fa fa-plus-circle"></i> إضافة مستخدم جديد
                        </button>
                    </div><!-- end ngIf: ! users.params.search -->
                </div><!-- end ngIf: users.list.data.length == 0 -->

                
                <!-- ngIf: users.list.data.length > 0 -->
            </div>
        </div><!-- end ngIf: users.list !== null -->
</div>
            </div>

            <script type="text/ng-template" id="roles.html"><loading-indicator ng-if="roles.roles === null"></loading-indicator>

    
     <div class="alert alert-info" ng-if="roles.roles.length !== null && roles.roles.length == 0">
        
        <i class="fa fa-info-circle"></i>
        لم يتم إضافة او تحديد ادوار المستخدمين وفريق العمل بعد. قم بإضافة الأدور وتحديد الصلاحيات لكل دور.

        <div class="margin-top-15">
            <button ng-click="create()" class="btn btn-primary">
                <i class="fa fa-plus-circle"></i> إضافة دور جديد
            </button>
        </div>
    </div> 

    
    <div ng-if="roles.roles !== null && roles.roles.length > 0">
        
        <div class="flex flex-end margin-bottom-15">
            <button ng-click="create()" class="btn btn-sm btn-primary">
                <i class="fa fa-plus-circle"></i> إضافة دور جديد
            </button>
        </div>

        
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th style="width: 30%">الدور</th>
                    <th style="width: 25%">
                        معين لـ

                                            </th>
                    <th>الصلاحيات</th>
                </tr>
                </thead>

                <tbody>
                <tr ng-repeat="role in roles.roles">
                    <td>
                        <div class="onSide">
                            <button ng-click="edit(role)" class="btn btn-xs btn-default">
                                <i class="fa fa-edit"></i> تعديل
                            </button>
                            <button ng-click="delete(role)" class="btn btn-xs btn-danger icon-only">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>

                        <a ng-click="view(role)" class="text-underlined text-strong"
                           href="">{{ role.name }}</a>

                        <div class="text-muted">{{ role.description }}</div>

                        <div class="extra-small text-muted margin-top-15">
                            وقت الإضافة:
                            <span dir="ltr">{{ role.created_at | datetime }}</span>
                        </div>
                    </td>

                    <td>
                        <div ng-if="! role.users.length">
                            لا احد
                        </div>

                        <div style="max-height: 250px; overflow: auto">
                            <ul ng-if="role.users.length > 0" class="list-compact">
                                <li ng-repeat="user in role.users">
                                    {{ user.name | cut:70 }}
                                </li>
                            </ul>
                        </div>
                    </td>

                    <td>
                        <div ng-if="! role.permissions.length">
                            <i class="fa fa-exclamation-circle"></i> لا شئ
                        </div>

                        <ul ng-if="role.permissions.length > 0" class="list-compact">
                            <li ng-repeat="permission in role.permissions | limitTo:5">
                                [<b>{{ permission.id }}</b>] &nbsp; {{ permission.display_name | cut:60 }}
                            </li>
                        </ul>

                        <a ng-if="role.permissions.length > 5" ng-click="view(role)"
                           href="" class="btn btn-xs btn-link">
                            <i class="fa fa-list"></i> عرض الكل
                            ({{ role.permissions.length }})
                        </a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div></script>
            <script type="text/ng-template" id="users.html"><loading-indicator ng-if="users.list === null"></loading-indicator>

    <div ng-if="users.list !== null" class="block style4">
            <div class="block-title">
                <i class="icon fa fa-users"></i>
                <span class="title">المستخدمون</span>
                <!--
                <button ng-click="users.load()" class="btn btn-xs btn-default">
                    <i class="fa fa-refresh"></i> تحديث
                </button>
                -->

                <div class="side">
                    <button ng-click="addNewUser()" class="btn btn-sm btn-primary">
                        <i class="fa fa-plus-circle"></i> إضافة مستخدم جديد
                    </button>

                    <a href="/admin/users/home/exportUsers" class="btn btn-sm btn-info">
                        <i class="fa fa-download"></i> تصدير
                    </a>

                    <button ng-click="sendMessage()" class="btn btn-sm btn-default icon-only">
                        <i class="fa fa-send"></i>
                    </button>
                </div>
            </div>

            <div class="block-body">
                <div class="flex flex-space-between margin-bottom-20">
                    
                                            <select ng-if="data.branches.length > 1" ng-model="users.params.branchId" ng-change="users.load()"
                                ng-options="b.id as b.name for b in data.branches"
                                class="form-control" style="width: 250px">
                        </select>
                    
                    <div>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-search margin-0"></i>
                            </div>
                            <input ng-model="users.params.search" ng-change="users.load()"
                                   ng-model-options="{'debounce': 1000}"
                                   type="text" placeholder="بحث ..."
                                   class="form-control"/>
                        </div>
                    </div>
                </div>

                
                <div ng-if="users.list.data.length == 0" class="alert alert-info">
                    <i class="fa fa-info-circle"></i>
                    <span ng-if="! users.params.search">ليس هناك مستخدمين آخرين بعد، إبدأ بإضافة باقي المستخدمين وتحديد صلاحياتهم</span>
                    <span ng-if="!! users.params.search">لم يتم العثور على مستخدمين تطابق معلوماتهم البحث المدخل!</span>

                    <div ng-if="! users.params.search" class="mt-15">
                        <button ng-click="addNewUser()" class="btn btn-sm btn-primary">
                            <i class="fa fa-plus-circle"></i> إضافة مستخدم جديد
                        </button>
                    </div>
                </div>

                
                <div ng-if="users.list.data.length > 0">
                    <div class="table-responsive overflow-visible">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>المستخدم</th>
                                <th style="width: 200px">الأدوار</th>
                                <th style="width: 320px">الصلاحيات</th>
                                <th style="width: 110px">
                                    متواجد الآن
                                    <popover content="تُظهر اذا كان المستخدم متواجد الآن على النظام أو لا. هذه المعلومة يتم تحديثها كل 60
			 ثانية وليس بشكل فوري!"></popover>
                                </th>
                                <th style="width: 130px">آخر نشاط</th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr ng-repeat="user in users.list.data" ng-class="{'bg-warning': user.suspended, 'bg-danger': user.trashed}">

                                <td>
                                    <div class="onSide">
                                        <button ng-click="editUser(user)" ng-if="! user.trashed" class="btn btn-xs btn-info" type="button">
                                            <i class="fa fa-pencil"></i> تعديل
                                        </button>

                                        
                                        <div ng-if="! user._isCurrentUser && ! user.trashed" class="dropdown d-inline">
                                            <button class="btn btn-xs btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a ng-click="view(user)" href="">
                                                        <i class="fa fa-info-circle"></i>
                                                        عرض معلومات وصلاحيات المستخدم
                                                    </a>
                                                </li>
                                                <li>
                                                    <a ng-click="editUser(user)" href="">
                                                        <i class="fa fa-pencil"></i>
                                                        تعديل الحساب والصلاحيات
                                                    </a>
                                                </li>
                                                                                                    <li>
                                                        <a href="/admin/users/{{ user.id }}/login">
                                                            <i class="fa fa-sign-in"></i> الدخول بحساب هذا المستخدم
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a ng-click="manageAccessibleAccounts(user)" href="">
                                                            <i class="fa fa-window-restore"></i>
                                                            الحسابات الأخرى المصرح إستخدامها
                                                        </a>
                                                    </li>
                                                                                                <li>
                                                    <a ng-click="sendMessage(user)" href="">
                                                        <i class="fa fa-send"></i> إرسال رسالة
                                                    </a>
                                                </li>

                                                <li ng-if="!user.suspended" class="bg-warning">
                                                    <a ng-click="suspendUser(user)" href="">
                                                        <i class="fa fa-ban"></i>
                                                        تعليق الحساب
                                                    </a>
                                                </li>

                                                <li ng-if="user.suspended" class="bg-success">
                                                    <a ng-click="unsuspendUser(user)" href="">
                                                        <i class="fa fa-check-circle"></i>
                                                        إلغاء التعليق
                                                    </a>
                                                </li>

                                                <li ng-if="user._isOnline">
                                                    <a ng-click="forceLogin(user)" href="">
                                                        <i class="fa fa-sign-out"></i> تسجيل خروج إجباري
                                                    </a>
                                                </li>
                                                <li ng-if="!user._isBranchManager" class="bg-danger">
                                                    <a ng-click="deleteUser(user)" href="">
                                                        <i class="fa fa-trash"></i> حذف
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <h4 class="inline text-primary">
                                        <a ng-click="view(user)" class="text-underlined"
                                           href="">{{ user.name }}</a>

                                        <i ng-if="user._isBranchManager" data-toggle="tooltip"
                                           title="This is the branch manager"
                                           class="fa fa-key text-danger"></i>

                                            <span ng-if="user._isCurrentUser" class="small margin-before-10">
                                                (أنت)
                                            </span>
                                    </h4>

                                    <ul class="list-inline margin-top-10 small text-muted">
                                        <li ng-if="user.suspended" class="text-strong text-danger">
                                            [الحساب معلق]
                                        </li>
                                        <li ng-if="user.job_title" class="text-strong">{{ user.job_title | cut:25 }}</li>
                                        <li>{{ user.username }}</li>
                                        <li>{{ user.email || '--' }}</li>
                                    </ul>

                                    <div class="small text-muted margin-top-5">
                                        وقت الإضافة
                                        <span dir="ltr">{{ user.created_at | datetime:'dmyhma' }}</span>
                                    </div>

                                    <div ng-if="user.trashed" class="small text-muted">
                                        <i class="fa fa-exclamation-triangle text-danger"></i>
                                        تم الحذف في
                                        <span dir="ltr">{{ user.deleted_at | datetime:'dmyhma' }}</span>
                                    </div>
                                </td>

                                <td ng-switch="user._isBranchManager" style="max-width: 200px">
                                    <div ng-switch-when="false">
                                        <span ng-if="! user._roles.length">[لا شئ]</span>

                                        <span ng-if="user._roles.length" ng-repeat="role in user._roles"
                                              class="label label-primary" style="display: inline-block; font-size: 11pt; margin-bottom: 5px">
                                            {{ role | cut:20 }}
                                        </span>
                                    </div>

                                    <div ng-switch-when="true">
                                        --
                                    </div>
                                </td>

                                <td ng-switch="user._isBranchManager">
                                    <div ng-switch-when="false">
                                        <div ng-if="! user._permissions.length">
                                            <i class="fa fa-exclamation-circle"></i> لا شئ
                                        </div>

                                        <ul ng-if="user._permissions.length > 0" class="list-compact">
                                            <li ng-repeat="permission in user._permissions | limitTo:5">
                                                [<b>{{ permission.id }}</b>] &nbsp;{{ permission.display_name | cut:30 }}
                                            </li>
                                        </ul>

                                        <a ng-click="view(user)" ng-if="user._permissions.length > 5" href=""
                                           class="btn btn-xs btn-link">
                                            <i class="fa fa-list"></i> عرض الكل
                                            ({{ user._permissions.length }})
                                        </a>

                                        <div ng-if="! user.trashed" class="mt-15">
                                            <button ng-click="editUser(user)" class="btn btn-xs btn-default">
                                                <i class="fa fa-pencil"></i> تغيير
                                            </button>
                                        </div>
                                    </div>

                                    <div ng-switch-when="true" class="text-strong">
                                        <i class="fa fa-exclamation-triangle text-warning"></i>
                                        لديه كافة الصلاحيات، ولكن فقط على الفرع الخاص به.
                                    </div>
                                </td>

                                <td>
                                    <div ng-if="user._isOnline" class="text-success">
                                        <i class="fa fa-check-square"></i>
                                        نعم
                                    </div>

                                    <div ng-if="!user._isOnline" class="text-warning">
                                        <i class="fa fa-ban"></i> لا
                                    </div>
                                </td>

                                <td>
                                    <div ng-if="user.last_activity">
                                        <span dir="ltr">{{ user.last_activity | datetime }}</span>
                                        <div class="small text-muted">
                                            {{ user._lastActivitySince }}
                                        </div>
                                    </div>
                                    <div ng-if="!user.last_activity">
                                        لم يقم بتسجيل الدخول بعد
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <pagination data="users.list" loader="users.paginate"></pagination>
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
