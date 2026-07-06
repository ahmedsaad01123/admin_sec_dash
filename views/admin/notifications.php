<?php
// إعداد المتغيرات
$pageTitle = 'إدارة الإشعارات';
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

                                            <li class="breadcrumb-item">إدارة الإشعارات</li>
                                    </ul>
                    </div>

        <div class="d-flex justify-content-center">
            <div>
                
                            </div>
        </div>
    </div>
        <div ng-app="notificationsApp" ng-controller="mainController" class="ng-scope">
            
            <!-- ngIf: notifications.all === null -->

            
            <!-- ngIf: notifications.all !== null --><div ng-if="notifications.all !== null" class="ng-scope">
                
                <dismissible-hint name="admin.notifications" class="ng-isolate-scope">
    <!-- ngIf: visible --><div ng-if="visible" class="dismissibleHint  d-flex flex-gap-15 align-items-center justify-content-between">
        <div class="d-flex flex-gap-20 align-items-center flex-grow-1">
            <!-- ngIf: icon || img --><div ng-if="icon || img" class="iconHolder hidden-xs ng-scope">
                <!-- ngIf: img -->
                <!-- ngIf: icon --><span ng-if="icon" class="ms icon ng-binding ng-scope">info</span><!-- end ngIf: icon -->
            </div><!-- end ngIf: icon || img -->

            <div class="content flex-grow-1">
                <ng-transclude>
                    من هنا يمكنك تفعيل الإشعارات التي يرسلها النظام، والتحكم في القنوات التي يتم الإرسال عبرها والمستخدمين الذين تصلهم هذه الإشعارات.<br class="ng-scope"><br class="ng-scope"><b class="ng-scope">ملاحظة:</b> إذا كان لديك أكثر من فرع، فإن إعدادات كل إشعار (حالة التفعيل، القنوات، المستلمين، والرسائل المخصصة) يتم ضبطها بشكل منفصل لكل فرع. ولكن عند تعديل إعدادات أي إشعار، يمكنك تطبيق تغييرات (القنوات أو الرسائل المخصصة) على جميع الفروع الأخرى دفعة واحدة.
                </ng-transclude>
            </div>
        </div>

        <div>
            <!-- ngIf: dismissible --><button ng-click="dismiss()" ng-if="dismissible" class="close ng-scope" type="button">
                <span>×</span>
            </button><!-- end ngIf: dismissible -->
        </div>
    </div><!-- end ngIf: visible --></dismissible-hint>

                <div class="row margin-bottom-20">
                    <div class="col-xs-12 col-md-4">
                        <input ng-model="notifications.search" type="text" class="form-control ng-pristine ng-untouched ng-valid ng-empty" placeholder="بحث ...">
                    </div>
                </div>

                <div class="block style2">
                    <div class="block-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th width="40px">#</th>
                                    <th colspan="2">الإشعار</th>
                                    <th width="200px">تُرسل إلى</th>
                                    <th width="170px">من خلال</th>
                                    <th width="40px"></th>
                                </tr>
                                </thead>

                                <!-- ngRepeat: group in data.notificationsGroups --><tbody ng-repeat="group in data.notificationsGroups" class="ng-scope">
                                <tr>
                                    <td colspan="5" style="padding: 20px 10px">
                                        <h4 class="text-primary ng-binding">المجموعات التدريبية</h4>
                                    </td>
                                </tr>

                                <!-- ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">1</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}" data-tour="admin.notifications" data-tour-text="تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid fa-rotate-180 inactive" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">إشعارات تسجيل متدربين جدد على المجموعات</h4>
                                        <div class="text-muted margin-top-5 ng-binding">يتم إشعار مستخدمي النظام عند تسجيل متدربين جدد على أحد المجموعات</div>
                                    </td>

                                    <td class="ng-binding">
                                        فريق العمل
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}" data-tour="admin.notifications" data-tour-text="تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات النظام" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-laptop"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات المتصفح" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-bell-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="البريد إلكتروني" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-envelope-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="SMS" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-comment-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}" data-tour="admin.notifications" data-tour-text="اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5" disabled="disabled">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">2</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid fa-rotate-180 inactive" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">إشعارات للمدربين بالتعيين للمجموعات التدريبية</h4>
                                        <div class="text-muted margin-top-5 ng-binding">يتم تنبيه المدرب عند التعيين لاحد المجموعات التدريبية</div>
                                    </td>

                                    <td class="ng-binding">
                                        المدربين
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="البريد إلكتروني" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-envelope-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات النظام" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-laptop"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="SMS" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-comment-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5" disabled="disabled">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">3</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid fa-rotate-180 inactive" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">إشعارات للعملاء حين يتم التسجيل على احد المجموعات التدريبية</h4>
                                        <div class="text-muted margin-top-5 ng-binding">يتم تنبيه العميل حين يتم تسجيله على احد المجموعات التدريبية النشطة</div>
                                    </td>

                                    <td class="ng-binding">
                                        العملاء/المتدربين
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="البريد إلكتروني" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-envelope-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات النظام" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-laptop"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="SMS" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-comment-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5" disabled="disabled">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">6</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid fa-rotate-180 inactive" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">إشعارات للمتدربين بإقتراب الحد الأقصي للغياب</h4>
                                        <div class="text-muted margin-top-5 ng-binding">يتم إشعار المتدرب حين يقترب من الحد الأقصي للغياب</div>
                                    </td>

                                    <td class="ng-binding">
                                        العملاء/المتدربين
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات النظام" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-laptop"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="البريد إلكتروني" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-envelope-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="SMS" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-comment-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5" disabled="disabled">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">7</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid fa-rotate-180 inactive" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">إشعارات بتخطي المتدربين الحد المسموح للغياب بالمجموعات التدريبية</h4>
                                        <div class="text-muted margin-top-5 ng-binding">سيتم إعلام مستخدمي النظام المختارين عندما يتخطي أحد المتدربين بأحد الدورات النشطة حد الغياب المسموح به</div>
                                    </td>

                                    <td class="ng-binding">
                                        فريق العمل
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات المتصفح" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-bell-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="إشعارات النظام" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-laptop"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="البريد إلكتروني" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-envelope-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="SMS" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-comment-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5" disabled="disabled">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">8</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid fa-rotate-180 inactive" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">إشعارات الغياب المتتالي للمتدربين</h4>
                                        <div class="text-muted margin-top-5 ng-binding">سيتم إعلام مستخدمي النظام المختارين عند غيار أحد المتدربين عدد حدد من المحاضرات بشكل متتالي</div>
                                    </td>

                                    <td class="ng-binding">
                                        فريق العمل
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات المتصفح" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-bell-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="إشعارات النظام" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-laptop"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="البريد إلكتروني" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-envelope-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="SMS" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-comment-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5" disabled="disabled">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">9</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid fa-rotate-180 inactive" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">إشعار للمتدربين بوجود مهمات او واجبات جديدة</h4>
                                        <div class="text-muted margin-top-5 ng-binding">يتم تنبيه المتدربين بأي واجبات او مهام جديدة يقوم المدربين بإضافتها</div>
                                    </td>

                                    <td class="ng-binding">
                                        العملاء/المتدربين
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="البريد إلكتروني" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-envelope-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات النظام" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-laptop"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="SMS" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-comment-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5" disabled="disabled">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">10</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid fa-rotate-180 inactive" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">إشعار بأي نقاشات جديدة</h4>
                                        <div class="text-muted margin-top-5 ng-binding">يتم تنبيه المدربين والمتدربين بأي نقاشات جديدة يتم إضافتها داخل المجموعات التدريبية التابعين لها</div>
                                    </td>

                                    <td class="ng-binding">
                                        العملاء/المتدربين, المدربين
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="البريد إلكتروني" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-envelope-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات النظام" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-laptop"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="SMS" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-comment-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5" disabled="disabled">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">11</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid fa-rotate-180 inactive" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">إشعارات بالتعيقات والردود الجديدة على احد النقاشات المفتوحة</h4>
                                        <div class="text-muted margin-top-5 ng-binding">يتم تنبيه المتدربين والمدربين حين يتم إضافة ردود او تعليقات جديدة على احد الموضوعات</div>
                                    </td>

                                    <td class="ng-binding">
                                        العملاء/المتدربين, المدربين
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="البريد إلكتروني" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-envelope-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات النظام" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-laptop"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="SMS" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-comment-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5" disabled="disabled">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">12</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid fa-rotate-180 inactive" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">إشعار تسليم المهام للمدربين</h4>
                                        <div class="text-muted margin-top-5 ng-binding">يتم إشعار المدرب عندما يقوم أحد المتدربين بتسليم مهمة</div>
                                    </td>

                                    <td class="ng-binding">
                                        المدربين
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات النظام" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-laptop"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات المتصفح" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-bell-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="البريد إلكتروني" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-envelope-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="SMS" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-comment-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5" disabled="disabled">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  -->
                                </tbody><!-- end ngRepeat: group in data.notificationsGroups --><tbody ng-repeat="group in data.notificationsGroups" class="ng-scope">
                                <tr>
                                    <td colspan="5" style="padding: 20px 10px">
                                        <h4 class="text-primary ng-binding">المحاضرات</h4>
                                    </td>
                                </tr>

                                <!-- ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">4</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid fa-rotate-180 inactive" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">إشعارات إعادة جدولة المحاضرات</h4>
                                        <div class="text-muted margin-top-5 ng-binding">سيتم إعلام مستخدمي النظام المختارين عند القيام بتعديل أحد المحاضرات (مثل تغيير الموعد او القاعة أو المدرب)</div>
                                    </td>

                                    <td class="ng-binding">
                                        فريق العمل, العملاء/المتدربين, المدربين
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات النظام" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-laptop"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات المتصفح" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-bell-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="البريد إلكتروني" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-envelope-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="SMS" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-comment-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5" disabled="disabled">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">5</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid fa-rotate-180 inactive" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">إشعارات إلغاء المحاضرات</h4>
                                        <div class="text-muted margin-top-5 ng-binding">سيتم إعلام مستخدمي النظام المختارين عند إلغاء أحد المحاضرات لإعلام فريق العمل والمدربين والمتدربين بإلغاء المحاضرة.</div>
                                    </td>

                                    <td class="ng-binding">
                                        فريق العمل, العملاء/المتدربين, المدربين
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات النظام" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-laptop"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات المتصفح" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-bell-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="البريد إلكتروني" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-envelope-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="SMS" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-comment-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5" disabled="disabled">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">14</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid fa-rotate-180 inactive" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">إشعارات بإقتراب مواعيد بدء المحاضرات</h4>
                                        <div class="text-muted margin-top-5 ng-binding">سيتم إعلام متدربي المجموعات عند إقتراب موعد أحد المحاضرات المسجلة (قبلها بساعة)</div>
                                    </td>

                                    <td class="ng-binding">
                                        العملاء/المتدربين
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="البريد إلكتروني" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-envelope-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="SMS" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-comment-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5" disabled="disabled">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">15</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid fa-rotate-180 inactive" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">إشعار تأكيد محاضرة بواسطة المدرب</h4>
                                        <div class="text-muted margin-top-5 ng-binding">يتم إشعار المستخدمين المختارين حين يقوم أحد المدربين بتأكيد أحد محاضراته من على الواجهة الخاصة به.</div>
                                    </td>

                                    <td class="ng-binding">
                                        فريق العمل
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات المتصفح" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-bell-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات النظام" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-laptop"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="البريد إلكتروني" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-envelope-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5" disabled="disabled">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">16</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid fa-rotate-180 inactive" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">إشعار بدء المحاضرة بواسطة فريق العمل</h4>
                                        <div class="text-muted margin-top-5 ng-binding">إشعار المدربين عند بدء محاضرة بواسطة أحد أفراد فريق العمل</div>
                                    </td>

                                    <td class="ng-binding">
                                        العملاء/المتدربين, المدربين
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="البريد إلكتروني" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-envelope-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="SMS" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-comment-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5" disabled="disabled">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">17</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid fa-rotate-180 inactive" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">إشعار إعادة جدولة عدة محاضرات</h4>
                                        <div class="text-muted margin-top-5 ng-binding">إشعار المتدربين عند إعادة جدولة عدة محاضرات</div>
                                    </td>

                                    <td class="ng-binding">
                                        العملاء/المتدربين, المدربين
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات النظام" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-laptop"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="البريد إلكتروني" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-envelope-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="SMS" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-comment-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5" disabled="disabled">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  -->
                                </tbody><!-- end ngRepeat: group in data.notificationsGroups --><tbody ng-repeat="group in data.notificationsGroups" class="ng-scope">
                                <tr>
                                    <td colspan="5" style="padding: 20px 10px">
                                        <h4 class="text-primary ng-binding">الماليات</h4>
                                    </td>
                                </tr>

                                <!-- ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">13</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid fa-rotate-180 inactive" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">تذكير العملاء بالأقساط</h4>
                                        <div class="text-muted margin-top-5 ng-binding">تذكير العملاء بمواعيد الأقساط المستحقة عليهم</div>
                                    </td>

                                    <td class="ng-binding">
                                        العملاء/المتدربين
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات النظام" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-laptop"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="البريد إلكتروني" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-envelope-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="SMS" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-comment-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5" disabled="disabled">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">33</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid fa-rotate-180 inactive" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">تذكير فريق العمل بالأقساط</h4>
                                        <div class="text-muted margin-top-5 ng-binding">يتم تذكير مستخدمين محددين بالأقساط المستحق دفعها (لليوم)</div>
                                    </td>

                                    <td class="ng-binding">
                                        فريق العمل
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات النظام" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-laptop"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="إشعارات المتصفح" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-bell-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="البريد إلكتروني" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-envelope-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="SMS" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-comment-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5" disabled="disabled">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">34</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid fa-rotate-180 inactive" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">إشعار للعميل انه تم إصدار فاتورة له</h4>
                                        <div class="text-muted margin-top-5 ng-binding">إشعار للعميل مع كل فاتورة جديدة يتم إصادرها له، مع رابط الدفع</div>
                                    </td>

                                    <td class="ng-binding">
                                        العملاء/المتدربين
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات النظام" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-laptop"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="البريد إلكتروني" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-envelope-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="SMS" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-comment-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5" disabled="disabled">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">35</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid fa-rotate-180 inactive" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">تذكير بدفع الفاتورة</h4>
                                        <div class="text-muted margin-top-5 ng-binding">تذكير العملاء بالفواتير المعلقة غير المدفوعة</div>
                                    </td>

                                    <td class="ng-binding">
                                        العملاء/المتدربين
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="البريد إلكتروني" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-envelope-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="إشعارات النظام" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-laptop"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="SMS" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-comment-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5" disabled="disabled">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">36</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid fa-rotate-180 inactive" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">إشعار للعميل انه قد تم إتمام دفع احد الفواتير</h4>
                                        <div class="text-muted margin-top-5 ng-binding">إشعار لتنبيه العميل حين يتم إتمام عملية دفع فاتورة كانت مستحقة عليه</div>
                                    </td>

                                    <td class="ng-binding">
                                        العملاء/المتدربين
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="البريد إلكتروني" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-envelope-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="إشعارات النظام" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-laptop"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="SMS" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-comment-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5" disabled="disabled">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  -->
                                </tbody><!-- end ngRepeat: group in data.notificationsGroups --><tbody ng-repeat="group in data.notificationsGroups" class="ng-scope">
                                <tr>
                                    <td colspan="5" style="padding: 20px 10px">
                                        <h4 class="text-primary ng-binding">إختبارات تحديد المستوى</h4>
                                    </td>
                                </tr>

                                <!-- ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">18</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid fa-rotate-180 inactive" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">إشعار للعميل انه قد تم جدولة إختبار تحديد المستوى له</h4>
                                        <div class="text-muted margin-top-5 ng-binding">إشعار لتنبيه العميل بموعد إختبار تحديد المستوى الذي تم جدولته له</div>
                                    </td>

                                    <td class="ng-binding">
                                        العملاء/المتدربين
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="البريد إلكتروني" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-envelope-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات النظام" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-laptop"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="SMS" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-comment-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5" disabled="disabled">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">19</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid fa-rotate-180 inactive" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">إشعار للمدرب انه لديه إختبار تحديد مستوى جديد مجدول</h4>
                                        <div class="text-muted margin-top-5 ng-binding">يتم تنبيه المدرب انه لديه إختبار تحديد مستوى جديد مجدول مع احد المتقدمين</div>
                                    </td>

                                    <td class="ng-binding">
                                        المدربين
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="البريد إلكتروني" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-envelope-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات النظام" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-laptop"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="SMS" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-comment-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5" disabled="disabled">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">20</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid fa-rotate-180 inactive" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">دعوة الإنضمام لإختبار تحديد مستوى</h4>
                                        <div class="text-muted margin-top-5 ng-binding">إشعار من النظام إلى عميل  عميل للحصول على إختبار تحديد مستوى بالإنضمام إلى الإختبار</div>
                                    </td>

                                    <td class="ng-binding">
                                        العملاء/المتدربين
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات النظام" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-laptop"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="البريد إلكتروني" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-envelope-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="SMS" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-comment-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5" disabled="disabled">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">21</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid fa-rotate-180 inactive" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">إشعار للعميل بأنه قد تم تغيير موعد الإختبار</h4>
                                        <div class="text-muted margin-top-5 ng-binding">يتم تنبيه العميل المُختبر بموعد الإختبار الجديد بعد تغييره</div>
                                    </td>

                                    <td class="ng-binding">
                                        العملاء/المتدربين
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="البريد إلكتروني" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-envelope-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات النظام" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-laptop"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="SMS" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-comment-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5" disabled="disabled">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">22</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid fa-rotate-180 inactive" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">إشعار للمدرب المُختَبر انه قد تم تغيير موعد احد إختبارات تحديد المستوى</h4>
                                        <div class="text-muted margin-top-5 ng-binding">يتم تنبيه المدرب بالموعد الجديد لأحد إختبارات تحديد المستوى بعد تغييره</div>
                                    </td>

                                    <td class="ng-binding">
                                        المدربين
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="البريد إلكتروني" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-envelope-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات النظام" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-laptop"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="SMS" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-comment-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5" disabled="disabled">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">23</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid fa-rotate-180 inactive" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">تنبيه العميل المختَبر انه قد تم إلغاء الإختبار في الموعد المحدد</h4>
                                        <div class="text-muted margin-top-5 ng-binding">إشعار لعميل مجدول ان يحصل على إختبار تحديد مستوى ان الإختبار قد تم إلغاؤه</div>
                                    </td>

                                    <td class="ng-binding">
                                        العملاء/المتدربين
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="البريد إلكتروني" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-envelope-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات النظام" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-laptop"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="SMS" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-comment-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5" disabled="disabled">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">24</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid fa-rotate-180 inactive" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">إشعار للمدرب المُختَبر انه قدم إلغاء إختبار تحديد المستوى</h4>
                                        <div class="text-muted margin-top-5 ng-binding">يتم تنبيه المدرب انه قد تم إلغاء احد إختبارات تحديد المستوى المجدولة</div>
                                    </td>

                                    <td class="ng-binding">
                                        المدربين
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="البريد إلكتروني" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-envelope-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات النظام" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-laptop"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="SMS" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-comment-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5" disabled="disabled">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">25</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid fa-rotate-180 inactive" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">إشعار عميل بأنه قد تم إختيار المستوى له بعد الإختبار</h4>
                                        <div class="text-muted margin-top-5 ng-binding">إشعار عميل حصل على إختبار تحديد مستوى بأنه قد تم تحديد مستواه من قبل المُختبر</div>
                                    </td>

                                    <td class="ng-binding">
                                        العملاء/المتدربين
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="البريد إلكتروني" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-envelope-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات النظام" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-laptop"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="SMS" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-comment-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5" disabled="disabled">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  -->
                                </tbody><!-- end ngRepeat: group in data.notificationsGroups --><tbody ng-repeat="group in data.notificationsGroups" class="ng-scope">
                                <tr>
                                    <td colspan="5" style="padding: 20px 10px">
                                        <h4 class="text-primary ng-binding">قوائم الانتظار</h4>
                                    </td>
                                </tr>

                                <!-- ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">26</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid fa-rotate-180 inactive" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">إشعار للعميل حين يتم تسجيله على احد قوائم الإنتظار</h4>
                                        <div class="text-muted margin-top-5 ng-binding">يتم إشعار العميل انه قد تم تسجله على قائمة الإنتظار لأحد الدورات التدريبية</div>
                                    </td>

                                    <td class="ng-binding">
                                        العملاء/المتدربين
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="البريد إلكتروني" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-envelope-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات النظام" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-laptop"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="SMS" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-comment-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5" disabled="disabled">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  -->
                                </tbody><!-- end ngRepeat: group in data.notificationsGroups --><tbody ng-repeat="group in data.notificationsGroups" class="ng-scope">
                                <tr>
                                    <td colspan="5" style="padding: 20px 10px">
                                        <h4 class="text-primary ng-binding">التسويق والمبيعات</h4>
                                    </td>
                                </tr>

                                <!-- ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">27</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid fa-rotate-180 inactive" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">إشعار تعيين عميل محتمل</h4>
                                        <div class="text-muted margin-top-5 ng-binding">إشعار أفراد فريق العمل عند تعيين عميل محتمل لهم</div>
                                    </td>

                                    <td class="ng-binding">
                                        فريق العمل
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات النظام" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-laptop"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات المتصفح" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-bell-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="البريد إلكتروني" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-envelope-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="SMS" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-comment-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5" disabled="disabled">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">28</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid fa-rotate-180 inactive" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">إشعار إعادة تعيين العميل المحتمل</h4>
                                        <div class="text-muted margin-top-5 ng-binding">إشعار المالك السابق عند إعادة تعيين عميل محتمل لشخص آخر</div>
                                    </td>

                                    <td class="ng-binding">
                                        فريق العمل
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات النظام" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-laptop"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات المتصفح" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-bell-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="البريد إلكتروني" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-envelope-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="SMS" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-comment-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5" disabled="disabled">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">29</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid fa-rotate-180 inactive" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">إشعار تحويل العميل المحتمل تلقائياً</h4>
                                        <div class="text-muted margin-top-5 ng-binding">إشعار مالك العميل المحتمل عند تحويله تلقائياً إلى عميل</div>
                                    </td>

                                    <td class="ng-binding">
                                        فريق العمل
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات النظام" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-laptop"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات المتصفح" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-bell-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="البريد إلكتروني" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-envelope-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="SMS" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-comment-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5" disabled="disabled">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">30</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid fa-rotate-180 inactive" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">تذكير متابعة العميل المحتمل</h4>
                                        <div class="text-muted margin-top-5 ng-binding">تذكير مالك العميل المحتمل بمواعيد المتابعة المجدولة</div>
                                    </td>

                                    <td class="ng-binding">
                                        فريق العمل
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات المتصفح" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-bell-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="البريد إلكتروني" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-envelope-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="إشعارات النظام" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-laptop"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="SMS" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-comment-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5" disabled="disabled">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">31</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid fa-rotate-180 inactive" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">إشعار تعيين عدة عملاء محتملين</h4>
                                        <div class="text-muted margin-top-5 ng-binding">إشعار فريق العمل عند تعيين عدة عملاء محتملين لهم دفعة واحدة</div>
                                    </td>

                                    <td class="ng-binding">
                                        فريق العمل
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات النظام" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-laptop"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات المتصفح" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-bell-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="البريد إلكتروني" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-envelope-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="SMS" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-comment-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5" disabled="disabled">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">32</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid fa-rotate-180 inactive" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">الرد التلقائي على النماذج</h4>
                                        <div class="text-muted margin-top-5 ng-binding">رد تلقائي يُرسل للعملاء المحتملين بعد تقديم النموذج</div>
                                    </td>

                                    <td class="ng-binding">
                                        العملاء/المتدربين
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="البريد إلكتروني" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-envelope-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="SMS" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-comment-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5" disabled="disabled">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  -->
                                </tbody><!-- end ngRepeat: group in data.notificationsGroups --><tbody ng-repeat="group in data.notificationsGroups" class="ng-scope">
                                <tr>
                                    <td colspan="5" style="padding: 20px 10px">
                                        <h4 class="text-primary ng-binding">الميزات</h4>
                                    </td>
                                </tr>

                                <!-- ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">37</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid fa-rotate-180 inactive" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">إشعار تعيين مهمة فريق عمل</h4>
                                        <div class="text-muted margin-top-5 ng-binding">إشعار أفراد فريق العمل عند تعيين مهمة عميل لهم</div>
                                    </td>

                                    <td class="ng-binding">
                                        فريق العمل
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات النظام" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-laptop"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات المتصفح" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-bell-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="البريد إلكتروني" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-envelope-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="SMS" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-comment-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5" disabled="disabled">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">38</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid fa-rotate-180 inactive" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">إشعار إتمام مهمة فريق عمل</h4>
                                        <div class="text-muted margin-top-5 ng-binding">إشعار للمستخدم المعين له المهمة، عند إتمام المهمة</div>
                                    </td>

                                    <td class="ng-binding">
                                        فريق العمل
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات النظام" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-laptop"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات المتصفح" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-bell-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="البريد إلكتروني" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-envelope-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="SMS" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-comment-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5" disabled="disabled">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">39</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid fa-rotate-180 inactive" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">تذكير المتابعة لأحد المهام - Team Tasks</h4>
                                        <div class="text-muted margin-top-5 ng-binding">تذكير للمستخدم المعين بمتابعة المهام الخاصة به</div>
                                    </td>

                                    <td class="ng-binding">
                                        فريق العمل
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات النظام" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-laptop"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات المتصفح" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-bell-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="البريد إلكتروني" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-envelope-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="SMS" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-comment-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5" disabled="disabled">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">40</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid fa-rotate-180 inactive" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">إشعار تأخر مهمة</h4>
                                        <div class="text-muted margin-top-5 ng-binding">يتم إعلام المستخدم الذي قام بإضافة المهمة عند تأخرها وعدم حلها من قبل المعين له</div>
                                    </td>

                                    <td class="ng-binding">
                                        فريق العمل
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات النظام" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-laptop"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات المتصفح" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-bell-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="البريد إلكتروني" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-envelope-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="SMS" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-comment-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5" disabled="disabled">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">41</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid fa-rotate-180 inactive" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">إشعارات التعيين</h4>
                                        <div class="text-muted margin-top-5 ng-binding">إشعار أفراد فريق العمل عند تعيينهم لشئ (عميل، مجموعة، دورة، إلخ)</div>
                                    </td>

                                    <td class="ng-binding">
                                        فريق العمل
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات النظام" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-laptop"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات المتصفح" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-bell-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="البريد إلكتروني" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-envelope-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="SMS" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-comment-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5" disabled="disabled">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">42</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid active" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">إشعار إلغاء التعيين</h4>
                                        <div class="text-muted margin-top-5 ng-binding">إشعار أفراد فريق العمل عند إلغاء تعيينهم من شئ محدد</div>
                                    </td>

                                    <td class="ng-binding">
                                        فريق العمل
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات النظام" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-laptop"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات المتصفح" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-bell-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="البريد إلكتروني" data-toggle="tooltip" class="btn btn-xs ng-scope btn-success">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-envelope-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="SMS" data-toggle="tooltip" class="btn btn-xs ng-scope btn-success">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-comment-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-success">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">43</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid fa-rotate-180 inactive" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">إشعار التعيين الجماعي</h4>
                                        <div class="text-muted margin-top-5 ng-binding">إشعار أفراد فريق العمل عند تعيين عدة اشياء لهم دفعة واحدة</div>
                                    </td>

                                    <td class="ng-binding">
                                        فريق العمل
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات النظام" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-laptop"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات المتصفح" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-bell-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="البريد إلكتروني" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-envelope-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="SMS" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-comment-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5" disabled="disabled">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">44</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid fa-rotate-180 inactive" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">إشعار الإشارة (mention) في مهمة</h4>
                                        <div class="text-muted margin-top-5 ng-binding">إشعار أفراد فريق العمل عند الإشارة إليهم في مهمة فريق عمل</div>
                                    </td>

                                    <td class="ng-binding">
                                        فريق العمل
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات النظام" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-laptop"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات المتصفح" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-bell-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="البريد إلكتروني" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-envelope-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="SMS" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-comment-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5" disabled="disabled">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">45</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid fa-rotate-180 inactive" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">تذكير المتابعة - Followups</h4>
                                        <div class="text-muted margin-top-5 ng-binding">تذكير المستخدم المعين عند حلول موعد المتابعة</div>
                                    </td>

                                    <td class="ng-binding">
                                        فريق العمل
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات النظام" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-laptop"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات المتصفح" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-bell-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="البريد إلكتروني" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-envelope-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="SMS" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-comment-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5" disabled="disabled">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  -->
                                </tbody><!-- end ngRepeat: group in data.notificationsGroups --><tbody ng-repeat="group in data.notificationsGroups" class="ng-scope">
                                <tr>
                                    <td colspan="5" style="padding: 20px 10px">
                                        <h4 class="text-primary ng-binding">مركز الاختبارات</h4>
                                    </td>
                                </tr>

                                <!-- ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">46</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid fa-rotate-180 inactive" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">إشعار توفر الاختبار</h4>
                                        <div class="text-muted margin-top-5 ng-binding">إشعار العملاء عند توفر اختبار لهم</div>
                                    </td>

                                    <td class="ng-binding">
                                        العملاء/المتدربين
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات النظام" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-laptop"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="البريد إلكتروني" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-envelope-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="SMS" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-comment-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5" disabled="disabled">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">47</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid fa-rotate-180 inactive" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">إشعار تصحيح الاختبار</h4>
                                        <div class="text-muted margin-top-5 ng-binding">إشعار العملاء عند تصحيح اختبارهم</div>
                                    </td>

                                    <td class="ng-binding">
                                        العملاء/المتدربين
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات النظام" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-laptop"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="البريد إلكتروني" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-envelope-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="SMS" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-comment-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5" disabled="disabled">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">48</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid fa-rotate-180 inactive" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">إشعار اجتماع الاختبار عبر الإنترنت للمرشحين</h4>
                                        <div class="text-muted margin-top-5 ng-binding">إشعار العملاء عند بدء اجتماع الاختبار عبر الإنترنت</div>
                                    </td>

                                    <td class="ng-binding">
                                        العملاء/المتدربين
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات النظام" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-laptop"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="البريد إلكتروني" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-envelope-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="SMS" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-comment-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5" disabled="disabled">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">49</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid fa-rotate-180 inactive" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">إشعار اجتماع الاختبار عبر الإنترنت للمدربين</h4>
                                        <div class="text-muted margin-top-5 ng-binding">إشعار المدربين عند بدء اجتماع الاختبار عبر الإنترنت</div>
                                    </td>

                                    <td class="ng-binding">
                                        المدربين
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات النظام" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-laptop"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="البريد إلكتروني" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-envelope-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="SMS" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-comment-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5" disabled="disabled">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  -->
                                </tbody><!-- end ngRepeat: group in data.notificationsGroups --><tbody ng-repeat="group in data.notificationsGroups" class="ng-scope">
                                <tr>
                                    <td colspan="5" style="padding: 20px 10px">
                                        <h4 class="text-primary ng-binding">التدريب</h4>
                                    </td>
                                </tr>

                                <!-- ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">50</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid fa-rotate-180 inactive" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">دعوة بدء الخدمة الذاتية للمسار التدريبي</h4>
                                        <div class="text-muted margin-top-5 ng-binding">إشعار العملاء عند جاهزية مسار التدريب الخاص بهم للبدء</div>
                                    </td>

                                    <td class="ng-binding">
                                        العملاء/المتدربين
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات النظام" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-laptop"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="البريد إلكتروني" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-envelope-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="SMS" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-comment-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5" disabled="disabled">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">51</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid fa-rotate-180 inactive" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">إشعار تحديث جديد لمسار تدريب لأحد العملاء</h4>
                                        <div class="text-muted margin-top-5 ng-binding">إشعار لفريق العمل بالتحديثات والتقدم على مسار تدريب لأحد العملاء</div>
                                    </td>

                                    <td class="ng-binding">
                                        فريق العمل
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات المتصفح" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-bell-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="البريد إلكتروني" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-envelope-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="إشعارات النظام" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-laptop"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="SMS" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-comment-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5" disabled="disabled">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">52</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid fa-rotate-180 inactive" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">تذكير باستحقاق خطوة المسار قريباً</h4>
                                        <div class="text-muted margin-top-5 ng-binding">تذكير فريق العمل عندما تكون خطوة في مسار العميل مستحقة قريباً</div>
                                    </td>

                                    <td class="ng-binding">
                                        فريق العمل
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات المتصفح" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-bell-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="البريد إلكتروني" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-envelope-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="إشعارات النظام" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-laptop"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="SMS" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-comment-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5" disabled="disabled">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">53</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid fa-rotate-180 inactive" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">إشعار رفض طلب التدريب</h4>
                                        <div class="text-muted margin-top-5 ng-binding">إشعار العملاء عند رفض طلب التدريب الخاص بهم</div>
                                    </td>

                                    <td class="ng-binding">
                                        العملاء/المتدربين
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="البريد إلكتروني" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-envelope-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="إشعارات النظام" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-laptop"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="SMS" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-comment-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5" disabled="disabled">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">54</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid fa-rotate-180 inactive" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">تذكير بموعد استحقاق قسط الطلب</h4>
                                        <div class="text-muted margin-top-5 ng-binding">تذكير العملاء قبل يومين من موعد استحقاق قسط الطلب</div>
                                    </td>

                                    <td class="ng-binding">
                                        العملاء/المتدربين
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات النظام" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-laptop"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="البريد إلكتروني" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-envelope-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="SMS" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-comment-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5" disabled="disabled">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">55</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid fa-rotate-180 inactive" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">دعوة بدء الخدمة الذاتية في مرحلة التقديم والقبول</h4>
                                        <div class="text-muted margin-top-5 ng-binding">إشعار يُرسل للعميل عند بدء خطوات التقديم، يحتوي على رابط الخدمة الذاتية</div>
                                    </td>

                                    <td class="ng-binding">
                                        العملاء/المتدربين
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="البريد إلكتروني" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-envelope-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="إشعارات النظام" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-laptop"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="SMS" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-comment-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5" disabled="disabled">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">56</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid fa-rotate-180 inactive" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">تحديثات الخدمة الذاتية لخاصية خطوات التقديم</h4>
                                        <div class="text-muted margin-top-5 ng-binding">إشعار يُرسل لفريق العمل عندما يقوم العميل بأي إجراء في خطوات التقديم عبر رابط الخدمة الذاتية الخاص به.</div>
                                    </td>

                                    <td class="ng-binding">
                                        فريق العمل
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات المتصفح" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-bell-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="البريد إلكتروني" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-envelope-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="إشعارات النظام" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-laptop"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="SMS" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-comment-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5" disabled="disabled">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">58</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid fa-rotate-180 inactive" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">تنبيهات بطلبات التدريب الجديدة</h4>
                                        <div class="text-muted margin-top-5 ng-binding">تنبيهات بطلبات التدريب التى تصل من المصادر المختلفة، مثل واجهة الموقع الخاصة بتمكين او تطبيق الهاتف او الـ API.</div>
                                    </td>

                                    <td class="ng-binding">
                                        فريق العمل
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات المتصفح" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-bell-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات النظام" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-laptop"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="البريد إلكتروني" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-envelope-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="SMS" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-comment-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5" disabled="disabled">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  -->
                                </tbody><!-- end ngRepeat: group in data.notificationsGroups --><tbody ng-repeat="group in data.notificationsGroups" class="ng-scope">
                                <tr>
                                    <td colspan="5" style="padding: 20px 10px">
                                        <h4 class="text-primary ng-binding">العملاء</h4>
                                    </td>
                                </tr>

                                <!-- ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">57</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid fa-rotate-180 inactive" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">إشعارات التسجيلات الجديدة للعملاء (Registration)</h4>
                                        <div class="text-muted margin-top-5 ng-binding">إشعارات لفريق العمل بالعملاء الجدد المسجلين ذاتياً من خلال نموذج التسجيل</div>
                                    </td>

                                    <td class="ng-binding">
                                        فريق العمل
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="البريد إلكتروني" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-envelope-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="إشعارات النظام" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-laptop"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="SMS" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-comment-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5" disabled="disabled">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  --><tr ng-repeat="n in notifications.getGroup(group) | filter:notifications.search " class="ng-scope">
                                    <td class="text-muted ng-binding">59</td>
                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تفعيل أو تعطيل الإشعار. عند التعطيل، لن يتم إرسال هذا النوع من الإشعارات لأي شخص.' : undefined }}">
                                        <i class="switch fa fa-toggle-on ng-isolate-scope ng-not-empty ng-valid fa-rotate-180 inactive" ng-class="getClasses()" ng-click="onClick()" ng-model="n.active" callback-data="n" data-toggle="tooltip" title="تفعيل \ تعطيل الإشعار" callback="notification.toggle"></i>
                                    </td>

                                    <td>
                                        <h4 class="ng-binding">تنبيه رفض العملاء للشروط والأحكام</h4>
                                        <div class="text-muted margin-top-5 ng-binding">تنبيه لفريق العمل عند رفض احد العملاء لبنود العمل والشروط والأحكام (والتي تعرض عليه عند تسجيل الدخول اول مرة على حسابه).</div>
                                    </td>

                                    <td class="ng-binding">
                                        فريق العمل
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'تحكم في قنوات التوصيل لهذا الإشعار. القنوات الافتراضية (باللون الأزرق) مفعّلة دائماً. اضغط على أزرار القنوات الاختيارية لتفعيلها أو تعطيلها.' : undefined }}">
                                        <!-- ngIf: !n.defaultChannels.length && !n.optionalChannels.length -->
                                        <!-- ngIf: n.defaultChannels.length || n.optionalChannels.length --><div class="d-flex flex-gap-5 align-items-center text-strong ng-scope" ng-if="n.defaultChannels.length || n.optionalChannels.length">
                                        <!-- ngRepeat: channel in n.defaultChannels --><span ng-repeat="channel in n.defaultChannels" title="البريد إلكتروني" data-toggle="tooltip" class="ng-scope">
                                            <i ng-class="getChannelIcon(channel)" class="fa text-primary fa-envelope-o"></i>
                                        </span><!-- end ngRepeat: channel in n.defaultChannels -->
                                            <!-- ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="إشعارات النظام" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-laptop"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="SMS" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-comment-o"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels --><button ng-repeat="channel in n.optionalChannels" type="button" ng-click="notification.toggleChannel(n, channel)" ng-disabled="ajaxRequestInProgress" ng-class="{'btn-success': isChannelActive(n, channel), 'btn-default': !isChannelActive(n, channel)}" title="WhatsApp" data-toggle="tooltip" class="btn btn-xs ng-scope btn-default">
                                                <i ng-class="getChannelIcon(channel)" class="fa m-0 fa-whatsapp"></i>
                                            </button><!-- end ngRepeat: channel in n.optionalChannels -->
                                        </div><!-- end ngIf: n.defaultChannels.length || n.optionalChannels.length -->
                                    </td>

                                    <td ng-attr-data-tour="{{ $first &amp;&amp; $parent.$first ? 'admin.notifications' : undefined }}" ng-attr-data-tour-text="{{ $first &amp;&amp; $parent.$first ? 'اضغط هنا لضبط الإعدادات المتقدمة لهذا الإشعار، بما في ذلك المستلمين والقنوات ومحتوى الرسالة المخصص.' : undefined }}">
                                        <button ng-disabled="ajaxRequestInProgress || !n.enabled" ng-click="notification.setup(n)" class="btn btn-sm btn-primary onSide margin-top-5" disabled="disabled">
                                            <i class="fa fa-cog"></i> الضبط
                                        </button>
                                    </td>
                                </tr><!-- end ngRepeat: n in notifications.getGroup(group) | filter:notifications.search  -->
                                </tbody><!-- end ngRepeat: group in data.notificationsGroups -->
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- end ngIf: notifications.all !== null -->
        </div>
            </div>
</div>

<?php
// تضمين footer template
include_once __DIR__ . '/../templates/footer.php';
?>
