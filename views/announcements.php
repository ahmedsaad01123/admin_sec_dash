<?php
// إعداد المتغيرات
$pageTitle = 'الإعلانات';
$includeSessionCheck = true;
$includeCSRFRefresh = true;

// تضمين القوالب
include_once __DIR__ . '/templates/header.php';
include_once __DIR__ . '/templates/sidebar.php';
?>

<div id="container" class="container-fluid">
<div id="content" class="">
                    <div id="pageTitle">
            <i class="icon fa fa-bullhorn"></i>
            <span class="title">
                الإعلانات
            </span>
        </div>

        <div ng-app="announcementsApp" class="ng-scope">
            <dismissible-hint name="announcements.home" class="ng-isolate-scope">
    <!-- ngIf: visible --><div ng-if="visible" class="dismissibleHint  d-flex flex-gap-15 align-items-center justify-content-between">
        <div class="d-flex flex-gap-20 align-items-center flex-grow-1">
            <!-- ngIf: icon || img --><div ng-if="icon || img" class="iconHolder hidden-xs ng-scope">
                <!-- ngIf: img -->
                <!-- ngIf: icon --><span ng-if="icon" class="ms icon ng-binding ng-scope">info</span><!-- end ngIf: icon -->
            </div><!-- end ngIf: icon || img -->

            <div class="content flex-grow-1">
                <ng-transclude>
                من هنا يمكنك نشر وإرسال إعلانات بأي معلومات او تحديثات جديدة لمستخدمي المنصة. سيتم إرسال إشعارات بهذه الإعلانات كما ستظهر لدى كل مستخدم على حسابه الخاص عند تسجيل دخوله.
            </ng-transclude>
            </div>
        </div>

        <div>
            <!-- ngIf: dismissible --><button ng-click="dismiss()" ng-if="dismissible" class="close ng-scope" type="button">
                <span>×</span>
            </button><!-- end ngIf: dismissible -->
        </div>
    </div><!-- end ngIf: visible --></dismissible-hint>

            
            <!-- ngView: --><div ng-view="" class="ng-scope">
               <div class="block style4 ng-scope">
        <div class="block-title">
            <span class="title">
                الإعلانات
            </span>
            <!-- ngIf: announcements.list !== null --><span ng-if="announcements.list !== null" class="badge ng-binding ng-scope">0</span><!-- end ngIf: announcements.list !== null -->

            <div class="side">
                <button ng-click="create()" class="btn btn-sm btn-primary onSide">
                    <i class="fa fa-plus-circle"></i>
                    إعلان جديد
                </button>
            </div>
        </div>

        <div class="block-body">
            
            <!-- ngIf: announcements.list === null -->

            
            <!-- ngIf: announcements.list !== null && announcements.list.data.length == 0 --><div ng-if="announcements.list !== null &amp;&amp; announcements.list.data.length == 0" class="alert alert-info ng-scope">
                <i class="fa fa-info-circle"></i>
                ليس هناك إعلانات مسجلة بعد
            </div><!-- end ngIf: announcements.list !== null && announcements.list.data.length == 0 -->

            
            <!-- ngIf: announcements.list !== null && announcements.list.data.length > 0 -->
        </div>
    </div>            </div>

            
            <script type="text/ng-template" id="home.html">
               <div class="block style4">
        <div class="block-title">
            <span class="title">
                الإعلانات
            </span>
            <span ng-if="announcements.list !== null"
                  class="badge">{{ announcements.list.total }}</span>

            <div class="side">
                <button ng-click="create()" class="btn btn-sm btn-primary onSide">
                    <i class="fa fa-plus-circle"></i>
                    إعلان جديد
                </button>
            </div>
        </div>

        <div class="block-body">
            
            <loading-indicator ng-if="announcements.list === null"></loading-indicator>

            
            <div ng-if="announcements.list !== null && announcements.list.data.length == 0" class="alert alert-info">
                <i class="fa fa-info-circle"></i>
                ليس هناك إعلانات مسجلة بعد
            </div>

            
            <div ng-if="announcements.list !== null && announcements.list.data.length > 0">
                <div class="list-group">
                    <div ng-repeat="announcement in announcements.list.data" class="list-group-item">
                        <h4 class="list-group-item-heading">
                            <a href="#!/announcement/{{ announcement.id }}" class="text-underlined">
                                {{ announcement.title }}</a>
                        </h4>

                        <div class="list-group-item-text margin-top-bottom-20">
                            {{ announcement.bodyText | cut:150 }}</div>

                        <ul class="list-inline small text-muted">
                            <li>
                                <b>{{ announcement.num_recipients }}</b>
                                مستلم
                            </li>
                            <li>{{ announcement.created_at_formatted }}</li>
                            <li>{{ announcement.since }}</li>
                            <li>{{ announcement.creator.name }}</li>

                            <li>
                                <button ng-click="announcementOptions.edit(announcement)"
                                        class="btn btn-xs btn-default">
                                    <i class="fa fa-pencil"></i> تعديل
                                </button>
                                <button ng-click="announcementOptions.delete(announcement)"
                                        class="btn btn-xs btn-danger">
                                    <i class="fa fa-trash"></i> حذف
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>

                
                <pagination data="announcements.list"
                            loader="announcements.load"></pagination>
            </div>
        </div>
    </div>            </script>
            <script type="text/ng-template" id="announcement/view.html">
               <loading-indicator ng-if="announcement === null"></loading-indicator>

    
    <div ng-if="announcement" class="block style4">
        <div class="block-title">
            <a href="#!/home" class="btn btn-xs btn-default onSide">
                <i class="fa fa-chevron-right"></i> عودة
            </a>

            <span class="title">{{ announcement.title }}</span>
        </div>

        <div class="block-body">
            
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <dl class="dl-horizontal">
                        <dt>
                            نوع المستلمين
                        </dt>
                        <dd>{{ announcement.display_recipients_type }}</dd>

                        <dt>
                            المجموعة
                        </dt>
                        <dd>
                            <div ng-if="! announcement.recipients_group">--</div>

                            <div ng-if="!! announcement.recipients_group">
                                <h4 ng-if="announcement.recipientsGroup">
                                    {{ announcement.recipientsGroup.name }}
                                </h4>

                                {{ trans('announcement_recipients_groups.' + announcement.recipients_group) }}
                            </div>
                        </dd>

                        <dt>عدد المستلمين</dt>
                        <dd>{{ announcement.num_recipients }}</dd>

                        <dt>قام بالإضافة</dt>
                        <dd>{{ announcement.creator.name }}</dd>

                        <dt>وقت الإضافة</dt>
                        <dd>
                            <span dir="ltr">{{ announcement.createdAt }}</span>
                            <div class="small">
                                {{ announcement.createdSince }}</div>
                        </dd>
                    </dl>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <blockquote ng-bind-html="announcement.body" class="auto-overflow"
                                style="max-height: 250px"></blockquote>
                </div>
            </div>

            
            <div class="padding-20 text-center">
                <div class="btn-group btn-group-sm">
                    <button ng-click="options.edit()" class="btn btn-default">
                        <i class="fa fa-pencil"></i> تعديل
                    </button>
                    <button ng-click="options.delete()" class="btn btn-danger">
                        <i class="fa fa-trash"></i> حذف
                    </button>
                </div>
            </div>

            
            <div class="block style3">
        <div class="block-title">
            <i class="icon fa fa-users"></i>
            <span class="title">
                المستلمين
            </span>
        </div>

        <div class="block-body">
            
            <loading-indicator ng-if="recipients.list === null"></loading-indicator>

            
            <div ng-if="recipients.list !== null">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>الإسم</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr ng-repeat="recipient in recipients.list.data">
                            <td>
                                <h4>{{ recipient.recipient.name }}</h4>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <pagination data="recipients.list"
                            loader="recipients.load"></pagination>
            </div>
        </div>
    </div>        </div>
    </div>            </script>
        </div>
            </div>
</div>



<?php
// تضمين footer template
include_once __DIR__ . '/templates/footer.php';
?>
