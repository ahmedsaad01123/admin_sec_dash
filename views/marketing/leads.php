<?php
// إعداد المتغيرات
$pageTitle = 'العملاء المحتملين';
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
            <i class="icon fa fa-users"></i>
            <span class="title">التسويق والمبيعات</span>

                            
                <ul class="breadcrumb inline" style="margin: 0">
                    <li class="breadcrumb-item"></li>

                                            <li class="breadcrumb-item">العملاء المحتملين</li>
                                    </ul>
                    </div>

        <div class="d-flex justify-content-center">
            <div>
                
                            </div>
        </div>
    </div>
                    <div class="alert alert-warning">
                <div class="d-flex flex-gap-15 flex-align-items-center flex-space-between">
                    <div>
                        <i class="fa fa-exclamation-triangle text-danger fa-3x"></i>
                    </div>
                    <div>
                        <b>لم يتم تحديد فريق مسؤولي المبيعات بعد!</b> تحتاج لتعيين وتحديد مستخدمي النظام المسؤولون عن المبيعات والمتابعة مع العملاء المحتملين Sales Agents. إبدأ بإضافة دور - Role جديد لهذه المجموعة (من قائمة الإدارة، المستخدمين والصلاحيات)، وبعد إختيار المستخدمين وتعيين هذا الدور لهم، توجه للإعدادات الخاصة بالتسويق وقم بإختيار هذا الدور الجديد لتعريف النظام بهذه المجموعة.
                        <div class="margin-top-15">
                            <a href="/admin/users#!/roles" class="btn btn-sm btn-primary">
                                <i class="fa fa-key"></i>
                                إضافة دور فريق المبيعات
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        
                
        <div ng-app="leadsApp" class="ng-scope">
            <ul class="nav nav-tabs">
                <li ng-class="{'active': activeTab == 'home'}" class="active">
                    <a href="#!/home">
                        <i class="icon fa fa-home"></i>
                        <span class="title">الرئيسية</span>
                    </a>
                </li>

                
                <li ng-class="{'active': activeTab == 'all'}">
                    <a href="#!/all">
                        <i class="icon fa fa-search"></i>
                        <span class="title">قاعدة البيانات</span>
                    </a>
                </li>

                
                                    <li ng-class="{'active': activeTab == 'report'}">
                        <a href="#!/report">
                            <i class="icon fa fa-line-chart"></i>
                            <span class="title">تقرير العملاء</span>
                        </a>
                    </li>

                    <li ng-class="{'active': activeTab == 'sales'}">
                        <a href="#!/sales">
                            <i class="icon fa fa-pie-chart"></i>
                            <span class="title">تقرير المبيعات</span>
                        </a>
                    </li>
                            </ul>

            
            <!-- ngView: --><div ng-view="" class="ng-scope"><div class="row ng-scope">
        <div class="col-xs-12 col-sm-12 col-md-9 column-bordered">
            <div>
                
                                    <div class="block style4">
        <div class="block-title">
            <i class="icon fa fa-line-chart"></i>
            <span class="title">إحصاءات</span>

            <div class="side extra-small">
                <div class="text-muted">
                    يتم تحديثها كل 12 ساعة
                </div>
                <a ng-click="stats.updateNow()" href="#">
                    <i class="fa fa-refresh"></i> تحديث الآن
                </a>
            </div>
        </div>

        <div class="block-body">
            
            <!-- ngIf: stats.stats === null -->

            <!-- ngIf: stats.stats !== null --><div ng-if="stats.stats !== null" class="boxes boxes-center padding-50 ng-scope">
                <div class="box">
                    <div class="title">إجمالى العملاء المحتملين</div>
                    <div class="value ng-binding">0</div>
                </div>

                <div class="box">
                    <div class="title">إجمالى المحولين لعملاء</div>
                    <div class="value ng-binding">--</div>
                </div>

                <div class="box">
                    <div class="title">نسبة التحول</div>
                    <div class="value ng-binding">0 %</div>
                </div>

                <div class="box">
                    <div class="title">معدل العملاء الجدد شهرياً</div>
                    <div class="value ng-binding">0</div>
                </div>

                <div class="box">
                    <div class="title">معدل العملاء الجدد يومياً</div>
                    <div class="value ng-binding">0</div>
                </div>

                <div class="box">
                    <div class="title">معدل التحويل الشهري</div>
                    <div class="value ng-binding">0</div>
                </div>

                <div class="box">
                    <div class="title">درجة الإهتمام الأكثر الغالبة</div>
                    <div class="value">
                        <!-- ngIf: !stats.stats['marketing.leads.most_common_interest_level'] --><span ng-if="!stats.stats['marketing.leads.most_common_interest_level']" class="ng-scope">
                            NA
                        </span><!-- end ngIf: !stats.stats['marketing.leads.most_common_interest_level'] -->
                        <!-- ngIf: !!stats.stats['marketing.leads.most_common_interest_level'] -->
                    </div>
                </div>
            </div><!-- end ngIf: stats.stats !== null -->


        </div>
    </div>                
                
                <div class="block style2">
        <div class="block-title">
            <i class="icon fa fa-history"></i>
                            <span class="title">المضافون حديثاً</span>
                    </div>

        <div class="block-body">
            
            <!-- ngIf: !recentLeads.list -->

            
            <!-- ngIf: recentLeads.list && !recentLeads.list.length --><div ng-if="recentLeads.list &amp;&amp; !recentLeads.list.length" class="alert alert-info margin-bottom-0 ng-scope">
                <div class="d-flex flex-gap-15 flex-justify-between">
                    <div>
                        <i class="fa fa-info-circle"></i>
                        ليس هناك عملاء محتملون مسجلون بعد على النظام. يمكنك إضافة عميل محتمل جديد من
			الخيار على الجانب. ايضاً اذا كان لديك قائمة جاهزة في شكل ملف يمكنك إضافتها بشكل مباشر على النظام.
                    </div>

                    <div>
                        <a ng-click="createNewLead()" href="" class="btn btn-sm btn-primary">
                            إضافة عميل جديد
                        </a>
                    </div>
                </div>
            </div><!-- end ngIf: recentLeads.list && !recentLeads.list.length -->

            
            <!-- ngIf: recentLeads.list && recentLeads.list.length > 0 -->
        </div>
    </div>

                
                <div class="block style2">
        <div class="block-title">
            <i class="icon fa fa-calendar"></i>
                            <span class="title">المتابعات القادمة (Follow-ups)</span>
                    </div>

        <div class="block-body">

            
            <!-- ngIf: !upcomingFollowUps.leads -->

            
             <!-- ngIf: upcomingFollowUps.leads && !upcomingFollowUps.leads.length --><div class="alert alert-info margin-bottom-0 ng-scope" ng-if="upcomingFollowUps.leads &amp;&amp; !upcomingFollowUps.leads.length">
        
        <i class="fa fa-info-circle"></i>
        ليس هناك عملاء محتملين مجدولين للمتابعة لاحقاً! لتحديد وقت متابعة لأحد العملاء إستخدم خيار التعديل على معلومات العميل.
    </div><!-- end ngIf: upcomingFollowUps.leads && !upcomingFollowUps.leads.length --> 

            
            <!-- ngIf: upcomingFollowUps.leads && upcomingFollowUps.leads.length > 0 -->

        </div>
    </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-3">

            <button ng-click="createNewLead()" class="btn btn-block btn-primary" type="button">
                <i class="fa fa-plus-circle"></i>
                إضافة عميل محتمل جديد
            </button>

            <div class="margin-top-5">
                <a href="/marketing/leads/import" class="btn btn-info btn-block">
                    <i class="fa fa-upload"></i>
                    إستيراد عملاء محتملين
                </a>
                <a href="/marketing/campaigns" class="btn btn-default btn-block">
                    <i class="fa fa-bullhorn"></i>
                    إدارة الحملات التسويقية
                </a>
                <a ng-click="openChannelsManager()" href="" class="btn btn-default btn-block">
                    <i class="fa fa-exchange"></i>
                    إدارة قنوات التسويق
                </a>
            </div>

            <hr class="dashed">

            
            <div class="block style3 margin-bottom-20">
                <div class="block-title">
                    <i class="icon fa fa-search"></i>
                    <span class="title">بحث</span>
                </div>
                <div class="block-body">
                    <lead-search-input setup="search.setup" class="ng-isolate-scope">
    <div ng-class="{'widget-large': setup.largeInput, 'widget-small': !setup.largeInput}" class="typeaheadWidget leadSearchInputWidget widget-large">

        <!--The loading indicator-->
        <!-- ngIf: searching -->

        <input ng-model="name" uib-typeahead="lead.id as lead.name for lead in search($viewValue)" typeahead-min-length="setup.minLength" typeahead-wait-ms="700" typeahead-on-select="select($item, $model, $label)" typeahead-loading="searching" typeahead-no-results="noResults" typeahead-template-url="leadMenuItem.html" ng-class="{'input-lg': setup.largeInput}" type="text" class="form-control ng-pristine ng-untouched ng-valid ng-empty input-lg" placeholder="البحث في العملاء المحتملين ..." aria-autocomplete="list" aria-expanded="false" aria-owns="typeahead-12-7869"><ul class="dropdown-menu ng-isolate-scope ng-hide" ng-show="isOpen() &amp;&amp; !moveInProgress" ng-style="{top: position().top+'px', left: position().left+'px'}" role="listbox" aria-hidden="true" uib-typeahead-popup="" id="typeahead-12-7869" matches="matches" active="activeIdx" select="select(activeIdx, evt)" move-in-progress="moveInProgress" query="query" position="position" assign-is-open="assignIsOpen(isOpen)" debounce="debounceUpdate" template-url="leadMenuItem.html">
    <!-- ngRepeat: match in matches track by $index -->
</ul>

        <!--Messages-->
        <!-- ngIf: noResults -->
    </div>

    <script type="text/ng-template" id="leadMenuItem.html">
        <a href="">
            <span ng-bind-html="match.label | uibTypeaheadHighlight:query"></span>
            <ul ng-show="match.model.email || match.model.phone_number" class="list-inline details margin-top-5">
                <!--Branch-->
                <li ng-if="match.model.branch && ! match.model.belongs_to_current_branch">
                    <span class="label label-warning">{{ match.model.branch.name | cut:12 }}</span>
                </li>

                <!--Owner-->
                <li ng-if="match.model.converted === true">
                    <span class="label label-success">
                        <i class="fa fa-check-circle"></i> Converted
                    </span>
                </li>

                <!--Owner-->
                <li ng-if="!! match.model.owner">
                    <i class="fa fa-user"></i> {{ match.model.owner_name | cut:12 }}
                </li>

                <!--Phone number-->
                <li ng-show="!! match.model.phone_number">
                    <i class="fa fa-phone"></i> {{ match.model.phone_number }}</li>

                <!--Email-->
                <li ng-show="!! match.model.email">
                    <i class="fa fa-envelope-o"></i> {{ match.model.email }}</li>
            </ul>
        </a>
    </script></lead-search-input>
                </div>
            </div>


            
            <div class="block style3 margin-bottom-50">
        <div class="block-title">
            <i class="icon fa fa-flag"></i>
            <span class="title">
                الحملات النشطة
            </span>
        </div>

        <div class="block-body">
            
            <!-- ngIf: !activeCampaigns.list -->

            
            <!-- ngIf: activeCampaigns.list && !activeCampaigns.list.length --><p ng-if="activeCampaigns.list &amp;&amp; !activeCampaigns.list.length" class="ng-scope">
                ليس هناك حملات تسويقية نشطة حالياً
            </p><!-- end ngIf: activeCampaigns.list && !activeCampaigns.list.length -->

            
            <div style="max-height: 250px; overflow: auto">
                <!-- ngIf: activeCampaigns.list && activeCampaigns.list.length > 0 -->
            </div>
        </div>
    </div>
            
            <!-- ngIf: data.salesUsers.length > 0 -->
        </div>
    </div></div>

            <script type="text/ng-template" id="homeView.html"><div class="row">
        <div class="col-xs-12 col-sm-12 col-md-9 column-bordered">
            <div>
                
                                    <div class="block style4">
        <div class="block-title">
            <i class="icon fa fa-line-chart"></i>
            <span class="title">إحصاءات</span>

            <div class="side extra-small">
                <div class="text-muted">
                    يتم تحديثها كل 12 ساعة
                </div>
                <a ng-click="stats.updateNow()" href="#">
                    <i class="fa fa-refresh"></i> تحديث الآن
                </a>
            </div>
        </div>

        <div class="block-body">
            
            <loading-indicator ng-if="stats.stats === null"></loading-indicator>

            <div ng-if="stats.stats !== null" class="boxes boxes-center padding-50">
                <div class="box">
                    <div class="title">إجمالى العملاء المحتملين</div>
                    <div class="value">{{ stats.stats['marketing.leads.all'] || '--' }}</div>
                </div>

                <div class="box">
                    <div class="title">إجمالى المحولين لعملاء</div>
                    <div class="value">{{ stats.stats['marketing.leads.total_converted'] || '--' }}</div>
                </div>

                <div class="box">
                    <div class="title">نسبة التحول</div>
                    <div class="value">{{ stats.stats['marketing.leads.conversion'] || '--' }} %</div>
                </div>

                <div class="box">
                    <div class="title">معدل العملاء الجدد شهرياً</div>
                    <div class="value">{{ stats.stats['marketing.leads.avg_monthly_new_leads'] || '--' }}</div>
                </div>

                <div class="box">
                    <div class="title">معدل العملاء الجدد يومياً</div>
                    <div class="value">{{ stats.stats['marketing.leads.avg_daily_new_leads'] || '--' }}</div>
                </div>

                <div class="box">
                    <div class="title">معدل التحويل الشهري</div>
                    <div class="value">{{ stats.stats['marketing.leads.avg_monthly_conversions'] || '--' }}</div>
                </div>

                <div class="box">
                    <div class="title">درجة الإهتمام الأكثر الغالبة</div>
                    <div class="value">
                        <span ng-if="!stats.stats['marketing.leads.most_common_interest_level']">
                            NA
                        </span>
                        <span ng-if="!!stats.stats['marketing.leads.most_common_interest_level']">
                            {{ trans(['lead_interest_levels', stats.stats['marketing.leads.most_common_interest_level']]) }}
                        </span>
                    </div>
                </div>
            </div>


        </div>
    </div>                
                
                <div class="block style2">
        <div class="block-title">
            <i class="icon fa fa-history"></i>
                            <span class="title">المضافون حديثاً</span>
                    </div>

        <div class="block-body">
            
            <loading-indicator ng-if="!recentLeads.list"></loading-indicator>

            
            <div ng-if="recentLeads.list && !recentLeads.list.length" class="alert alert-info margin-bottom-0">
                <div class="d-flex flex-gap-15 flex-justify-between">
                    <div>
                        <i class="fa fa-info-circle"></i>
                        ليس هناك عملاء محتملون مسجلون بعد على النظام. يمكنك إضافة عميل محتمل جديد من
			الخيار على الجانب. ايضاً اذا كان لديك قائمة جاهزة في شكل ملف يمكنك إضافتها بشكل مباشر على النظام.
                    </div>

                    <div>
                        <a ng-click="createNewLead()" href="" class="btn btn-sm btn-primary">
                            إضافة عميل جديد
                        </a>
                    </div>
                </div>
            </div>

            
            <div ng-if="recentLeads.list && recentLeads.list.length > 0" class="table-responsive">
                <table class="table table-auto-full-width">
                    <thead>
                    <tr>
                        <th>الإسم</th>
                        <th>المسار التدريبي</th>
                                                    <th>مسؤول المبيعات</th>
                                                                        <th>القناة التسويقية</th>
                        <th>معلومات التواصل</th>
                        <th>وقت المتابعة القادم</th>
                        <th>الحملة التسويقية</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr ng-repeat="lead in recentLeads.list">
                        <td>
                            <!--
                            <div class="onSide">
                                <button ng-click="recentLeads.leadOptions.openChat(lead)"
                                        class="btn btn-xs btn-default icon-only">
                                    <i class="fa fa-whatsapp"></i>
                                </button>
                            </div>
                            -->

                            <lead-interest-level-icon lead="lead"></lead-interest-level-icon>
                            <lead-name lead="lead"></lead-name>

                            <ul class="list-inline margin-top-5 small">
                                                                <li ng-if="lead.job_title">{{ lead.job_title }}</li>
                            </ul>
                        </td>

                        <td class="cell-wrap" style="min-width: 150px">
                            <div ng-if="lead.current_path">
                                <div><b>{{ lead.current_path.name }}</b></div>
                                <div ng-if="lead.current_path.cost > 0" class="text-muted">
                                    {{ lead.current_path.cost }} EGP</div>
                            </div>
                            <div ng-if="! lead.current_path">--</div>
                        </td>

                                                    <td>{{ lead.owner_name || '--' | cut:15 }}</td>
                        
                        
                        <td>
                            {{ lead.source_channel ? lead.source_channel.name : '--' }}
                        </td>

                        <td class="small">
                            <div ng-if="lead.phone_number"><phone-number model="lead" /></div>
                            <div ng-if="lead.email">{{ lead.email }}</div>
                        </td>

                        <td>
                            <span ng-if="!lead.follow_up_time">--</span>
                            <span ng-if="!!lead.follow_up_time" dir="ltr">{{ lead.follow_up_time | datetime }}</span>
                        </td>

                        <td class="cell-wrap">
                            {{ lead.source_campaign ?lead.source_campaign.name :'--' }}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

                
                <div class="block style2">
        <div class="block-title">
            <i class="icon fa fa-calendar"></i>
                            <span class="title">المتابعات القادمة (Follow-ups)</span>
                    </div>

        <div class="block-body">

            
            <loading-indicator ng-if="!upcomingFollowUps.leads"></loading-indicator>

            
             <div class="alert alert-info margin-bottom-0" ng-if="upcomingFollowUps.leads && !upcomingFollowUps.leads.length">
        
        <i class="fa fa-info-circle"></i>
        ليس هناك عملاء محتملين مجدولين للمتابعة لاحقاً! لتحديد وقت متابعة لأحد العملاء إستخدم خيار التعديل على معلومات العميل.
    </div> 

            
            <div ng-if="upcomingFollowUps.leads && upcomingFollowUps.leads.length > 0" class="table-responsive">
                <table class="table table-auto-full-width">
                    <thead>
                    <tr>
                        <th>الإسم</th>
                        <th>وقت المتابعة القادم</th>
                                                    <th>مسؤول المبيعات</th>
                                                                        <th>المسار التدريبي</th>
                        <th>القناة التسويقية</th>
                        <th>درجة الإهتمام</th>
                        <th>معلومات التواصل</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr ng-repeat="lead in upcomingFollowUps.leads">
                        <td>
                            <!--
                            <div class="onSide">
                                <button ng-click="upcomingFollowUps.leadOptions.openChat(lead)"
                                        class="btn btn-xs btn-default icon-only">
                                    <i class="fa fa-whatsapp"></i>
                                </button> &nbsp;
                            </div>
                            -->

                            <lead-name lead="lead"></lead-name>

                            <ul class="list-inline margin-top-5 small">
                                
                                <li ng-if="lead.job_title">{{ lead.job_title }}</li>
                            </ul>
                        </td>

                        <td>
                            <span ng-if="!lead.follow_up_time">--</span>
                            <div ng-if="!!lead.follow_up_time">
                                <span dir="ltr">{{ lead.follow_up_time | datetime }}</span>
                                <div class="small text-muted">{{ lead.follow_up_at }}</div>
                            </div>
                        </td>

                                                    <td>
                                {{ lead.owner_name || '--' | cut:15 }}
                            </td>
                        
                        
                        <td class="cell-wrap">
                            {{ lead.current_path ? lead.current_path.name : '--' }}
                        </td>

                        <td>
                            {{ lead.source_channel ? lead.source_channel.name : '--' }}
                        </td>

                        <td>
                            <lead-interest-level-icon lead="lead"></lead-interest-level-icon>
                            {{ lead.display_interest_level }}
                        </td>

                        <td class="small">
                            <div ng-if="lead.phone_number"><phone-number model="lead"></phone-number></div>
                            <div ng-if="lead.email">{{ lead.email }}</div>
                        </td>

                    </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-3">

            <button ng-click="createNewLead()" class="btn btn-block btn-primary" type="button">
                <i class="fa fa-plus-circle"></i>
                إضافة عميل محتمل جديد
            </button>

            <div class="margin-top-5">
                <a href="/marketing/leads/import" class="btn btn-info btn-block">
                    <i class="fa fa-upload"></i>
                    إستيراد عملاء محتملين
                </a>
                <a href="/marketing/campaigns" class="btn btn-default btn-block">
                    <i class="fa fa-bullhorn"></i>
                    إدارة الحملات التسويقية
                </a>
                <a ng-click="openChannelsManager()" href="" class="btn btn-default btn-block">
                    <i class="fa fa-exchange"></i>
                    إدارة قنوات التسويق
                </a>
            </div>

            <hr class="dashed"/>

            
            <div class="block style3 margin-bottom-20">
                <div class="block-title">
                    <i class="icon fa fa-search"></i>
                    <span class="title">بحث</span>
                </div>
                <div class="block-body">
                    <lead-search-input setup="search.setup"></lead-search-input>
                </div>
            </div>


            
            <div class="block style3 margin-bottom-50">
        <div class="block-title">
            <i class="icon fa fa-flag"></i>
            <span class="title">
                الحملات النشطة
            </span>
        </div>

        <div class="block-body">
            
            <loading-indicator ng-if="!activeCampaigns.list" class="tiny"></loading-indicator>

            
            <p ng-if="activeCampaigns.list && !activeCampaigns.list.length">
                ليس هناك حملات تسويقية نشطة حالياً
            </p>

            
            <div style="max-height: 250px; overflow: auto">
                <ul ng-if="activeCampaigns.list && activeCampaigns.list.length > 0" class="list-compact">
                    <li ng-repeat="campaign in activeCampaigns.list">
                        <a ng-click="activeCampaigns.view(campaign)" href="">{{ campaign.name }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
            
            <div ng-if="data.salesUsers.length > 0" class="block style3 margin-bottom-50">
        <div class="block-title">
            <i class="icon fa fa-user"></i>
            <span class="title">
                تعينات فريق المبيعات
            </span>
        </div>

        <div class="block-body">
            <div style="max-height: 250px; overflow: auto">
                <table class="table table-headless table-condensed">
                    <tbody>
                    <tr ng-repeat="user in data.salesUsers track by user.id">
                        <td>
                            <i class="fa fa-user-o"></i> {{ user.name | cut: 20 }}
                        </td>
                        <td>
                            <b>{{ user.sales_num_assigned_leads || 0 }}</b>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="flex flex-end margin-top-15">
                <a href="#!/sales" class="small">
                    <i class="fa fa-chevron-left"></i>
                    معلومات اكثر
                </a>
            </div>
        </div>
    </div>
        </div>
    </div></script>

            
            <script type="text/ng-template" id="allView.html"><loading-indicator ng-if="!data.loaded"></loading-indicator>

    
    <div ng-if="data.loaded" class="row">
        
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 column-bordered">
            <form name="leadsFilteringForm" class="block style2">
        <!--
        <div class="block-title">
            <i class="icon fa fa-filter"></i>
            <span class="title">
                بحث
            </span>
        </div>
        -->

        <div class="block-body" style="max-height: 600px; overflow: auto">
            
            
            
            <div class="form-group">
                <label>الحالة</label> <!-- <--- is in fact category! -->
                <select ng-model="leads.params.category"
                        ng-options="option.name as option.label for option in data.categories"
                        class="form-control"></select>
            </div>

            
            <div class="form-group">
                <label>
                    التعيين لمسؤولي المبيعات
                </label>
                <select ng-model="leads.params.owner_user_id" ng-disabled="!data.users.length" class="form-control">
                    <option ng-value="'any'">جميع العملاء، المعينين وغير المعينين</option>
                    <option ng-value="'assigned'">العملاء المعينين</option>
                    <option ng-value="'unassigned'">العملاء الغير معينين</option>
                    <option ng-repeat="user in data.users" ng-value="user.id">{{ user.menu_name }}</option>
                </select>
            </div>

            
            
            
            <!--
                <div class="form-group">
                    <label>النوع</label>
                    <select ng-model="leads.params.type"
                            ng-options="option.name as option.label for option in data.types"
                            class="form-control"></select>
                </div>
                -->

            <hr/>

            
            <div class="form-group">
                <label>المسار التدريبي</label>
                <popover content="عرض فقط الذين إختاروا او تم إختيار مسار تدريبي محدد لهم"></popover>
                <path-search-helper ng-model="leads.params.path_search"></path-search-helper>
            </div>

            
            <div class="form-group">
                <label>المدفوعات</label>
                <popover content="عرض العملاء الذين قاموا، او لو يقوموا، بدفع اي مبالغ للحجز"></popover>
                <select ng-model="leads.params.paid" class="form-control">
                    <option ng-value="true">عرض فقط من قاموا بإتمام عمليات دفع للحجز</option>
                    <option ng-value="false">عرض فقط من لم يقوموا بإتمام اي عمليات دفع</option>
                    <option ng-value="null">عرض الكل، من قاموا بالدفع ومن لم يقم</option>
                </select>
            </div>

            <div class="form-group">
                <label> مواعيد التدريب المختارة</label>
                <popover content="عرض العملاء الذين إختاروا مواعيد تدريب محددة"></popover>
                <time-slots-selector ng-model="leads.params.time_slots" options="{'returnIdsOnly': true}">
                </time-slots-selector>
            </div>

            
            
            <hr/>

            
            <div class="form-group">
                <label>إسم العميل او بيانات التواصل</label>
                <input ng-model="leads.params.name"
                       placeholder="الإسم، رقم الهاتف، أو البريد الإلكتروني"
                       name="name" class="form-control" />
            </div>

            <hr/>

            
            <div class="form-group">
                <label>درجات الإهتمام</label>
                <div>
                                            <div class="checkbox-inline">
                            <label>
                                <input checklist-model="leads.params.interest_levels"
                                       checklist-value="'high'" type="checkbox"/>
                                <span class="leadInterestLevelIcon high"></span>
                                <span>عالية</span>
                            </label>
                        </div>
                                            <div class="checkbox-inline">
                            <label>
                                <input checklist-model="leads.params.interest_levels"
                                       checklist-value="'medium'" type="checkbox"/>
                                <span class="leadInterestLevelIcon medium"></span>
                                <span>متوسطة</span>
                            </label>
                        </div>
                                            <div class="checkbox-inline">
                            <label>
                                <input checklist-model="leads.params.interest_levels"
                                       checklist-value="'low'" type="checkbox"/>
                                <span class="leadInterestLevelIcon low"></span>
                                <span>منخفضة</span>
                            </label>
                        </div>
                                        <div class="checkbox-inline">
                        <label>
                            <input checklist-model="leads.params.interest_levels" checklist-value="'unknown'" type="checkbox"/>
                            <span class="leadInterestLevelIcon"></span>
                            <span>غير معروف</span>
                        </label>
                    </div>
                </div>
            </div>

            
            <div class="form-group">
                <label>وقت المتابعة القادم</label>
                <input datetime-model="leads.params.follow_up_time" datetime-picker="{'format': 'DD/MM, YYYY'}"
                       class="form-control" dir="ltr"/>
            </div>

            
            <div class="form-group">
                <label>من الحملة التسويقية</label>
                <div class="help-block">
                    الحملة التسويقية التي نتج عنها العملاء المحتملين
                </div>
                <select ng-model="leads.params.source_campaign" ng-disabled="!data.campaigns.length"
                        ng-options="campaign.id as campaign.name for campaign in data.campaigns"
                        class="form-control">
                    <option value=""></option>
                </select>
            </div>

            
            <div class="form-group">
                <label>
                    من القناة
                </label>
                <div class="help-block">
                    القناة التسويقية التي نتج عنها العملاء المحتملين
                </div>

                <div ng-if="!data.channels.length" class="text-danger small">
                    <i class="fa fa-exclamation-triangle"></i>
                    لم يتم إضافة اي قنوات بعد
                </div>

                <div ng-if="data.channels.length > 0" class="checkboxes-holder" style="max-height: 150px; overflow: auto">
                    <div ng-repeat="channel in data.channels" class="checkbox">
                        <label>
                            <input checklist-model="leads.params.source_channels"
                                   checklist-value="channel.id" type="checkbox"/> {{ channel.name }}
                        </label>
                    </div>
                </div>
            </div>

            
            <div class="form-group">
                <label>الفئة العمرية</label>
                <select ng-model="leads.params.age_range"
                        ng-options="r.name as r.label for r in data.age_ranges"
                        class="form-control">
                </select>
            </div>

            
            <div class="form-group">
                <label>قام بالإضافة</label>
                <select ng-model="leads.params.created_by" ng-disabled="!data.users.length" class="form-control">
                    <option ng-value="'any'">اي احد</option>
                    <option ng-repeat="user in data.users" ng-value="user.id">{{ user.name | cut:15 }}</option>
                </select>
            </div>

            
            <div class="form-group">
                <label>وقت الإضافة</label>
                <time-span-selector options="filtering.timeRange.options" setter="filtering.timeRange.setter"
                                    is-valid="filtering.timeRange.isValid">
                </time-span-selector>
            </div>

            
            <div class="form-group">
                <label>عدد النتائج بالصفحة</label>
                <select ng-model="leads.params.per_page" ng-change="leads.page = 1" class="form-control">
                    <option ng-value="1">1</option>
                    <option ng-value="50">50</option>
                    <option ng-value="100">100</option>
                    <option ng-value="150">150</option>
                    <option ng-value="200">200</option>
                </select>
            </div>
        </div>

        <div class="block-footer">
            <div class="form-group margin-bottom-0">
                <button ng-click="leads.fetch()" ng-disabled="leadsFilteringForm.$invalid || ! filtering.timeRange.isValid"
                        type="submit" class="btn btn-primary">
                    <i class="fa fa-search"></i> بحث
                </button>

                <!--
                <button ng-click="leads.reset()" type="reset" class="btn btn-default">
                    <i class="fa fa-refresh"></i> إعادة ضبط
                </button>
                -->
            </div>
        </div>
    </form>        </div>

        
        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
            <p ng-if="leads.loading === null">
        إستخدم خيارات البحث والفلترة على الجانب للبحث في جميع العملاء المحتملين Leads الذين تم تسجيلهم
		يوماً على النظام
    </p>

    
    <loading-indicator ng-if="leads.loading === true"></loading-indicator>

    
    <div ng-if="!leads.loading && leads.list !== null" class="block style2">
        <div class="block-title">
            <i class="icon fa fa-users"></i>
            <span class="title">نتائج البحث</span>
            <span class="badge">{{ leads.list.total }}</span>

            <div class="side">
                
                <form ng-if="leads.list.data.length > 0" action="/marketing/leads/all/export"
                      method="post" target="_blank" class="onSide">

                    <input type="hidden" name="_token" value="6I8KuRvpEnoyRVC225dOQkQoGVsawtWiBQaPkLMj">
                    <input type="hidden" name="params" value="{{ leads.params | json }}"/>

                    <button type="submit" class="btn btn-sm btn-info">
                        <i class="fa fa-download"></i> تصدير
                    </button>
                </form>
            </div>
        </div>

        <div class="block-body" style="height: 550px; padding: 0 !important;">
            
            <div ng-if="leads.list.data.length == 0" class="alert alert-info margin-15">
                <i class="fa fa-exclamation-triangle"></i>
                لم يتم العثور على أي عملاء محتملين يطابقون خيارات البحث المستخدمة!
            </div>

            
            <div ng-if="leads.list.data.length > 0" style="height: 100%; overflow: auto; padding: 15px">
                <div class="table-responsive" style="overflow-x: visible">
                    <table class="table table-auto-full-width">
                        <thead>
                        <tr>
                            <th width="10px">
                                <input ng-model="selected.allSelected" ng-click="selected.toggleSelectAll()" type="checkbox"/>
                            </th>
                            <th>الإسم</th>
                            <th>مسؤول المبيعات</th>
                            <th>المسار التدريبي</th>
                            <!--
                            <th>المدفوع (للمسار)</th>
                            -->
                            <th>إجمالي المدفوع</th>
                            <th>مواعيد التدريب المناسبة</th>
                                                        <th>المصدر</th>
                            <th>معلومات التواصل</th>
                            <th>وقت المتابعة القادم</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr ng-repeat="lead in leads.list.data" ng-class="{'bg-warning': lead.disqualified, 'bg-success': lead.converted}">
                            <td>
                                <input checklist-model="selected.leads" checklist-value="lead.id" type="checkbox"/>
                            </td>

                            <td class="cell-wrap" style="min-width: 300px">
                                <div ng-if="lead.is_manageable_by_user" class="onSide">
                                    <!--
                                    <button ng-click="leadOptions.openChat(lead)" class="btn btn-xs btn-default icon-only">
                                        <i class="fa fa-whatsapp"></i>
                                    </button>
                                    -->

                                    <div class="dropdown inline margin-0">
                                        <button class="btn btn-xs btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a ng-click="leadOptions.edit(lead)" href="">
                                                    <i class="fa fa-pencil"></i> تعديل
                                                </a>
                                            </li>
                                            <li>
                                                <a ng-click="leadOptions.sendMessage(lead)" href="">
                                                    <i class="fa fa-envelope-o"></i> إرسال رسالة
                                                </a>
                                            </li>
                                            <li ng-if="lead.category != 'converted'" class="bg-success">
                                                <a ng-click="leadOptions.convert(lead)" href="">
                                                    <i class="fa fa-address-card-o"></i> تحويل لعميل
                                                </a>
                                            </li>
                                            <li class="bg-danger">
                                                <a ng-click="leadOptions.delete(lead)" href="">
                                                    <i class="fa fa-trash"></i> حذف
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <h4>
                                    <lead-interest-level-icon lead="lead"></lead-interest-level-icon>
                                    <lead-name lead="lead"></lead-name>
                                </h4>

                                <ul class="list-inline small text-muted">
                                    <li ng-if="lead.job_title" class="small">{{ lead.job_title }}</li>
                                    <li ng-if="lead.age_range" class="small">{{ lead.age_range }}</li>
                                </ul>

                                
                                <div style="font-size: 75% !important;">
                                    <span ng-if="lead.branch && ! lead.belongs_to_current_branch" class="label label-warning">
                                        {{ lead.branch.name | cut:12 }}
                                    </span>

                                    <!--
                                    <span ng-if="leads.submittedParams.category == 'all'" class="label label-info">
                                        {{ trans('lead_categories.' + lead.category) }}
                                    </span>
                                    -->

                                    <!--
                                    <span ng-if="leads.submittedParams.type == 'all'" class="label label-info">
                                        {{ trans('lead_types.' + lead.type) }}
                                    </span>
                                    -->
                                </div>
                            </td>

                            <td>
                                {{ lead.owner_name || '--' | cut:15 }}
                            </td>

                            <td class="cell-wrap" style="min-width: 190px">
                                <div ng-if="lead.current_path">
                                    <div class="text-strong">{{ lead.current_path.name }}</div>
                                    <ul class="list-inline small text-muted">
                                        <li ng-if="lead.current_path.num_courses > 0" class="list-inline-item">
                                            <b>{{ lead.current_path.num_courses }}</b>
                                            دورة
                                        </li>

                                        <li ng-if="lead.current_path.owner_discount_percentage > 0">
                                            <b>{{ lead.current_path.owner_discount_percentage }}%</b>
                                            خصم
                                        </li>
                                    </ul>

                                    <div ng-if="lead.current_path.courses.length > 0" class="extra-small mt-10 mb-0 p-0">
                                        <ul class="list-compact">
                                            <li ng-repeat="c in lead.current_path.courses" uib-tooltip="{{ c.name }}" style="line-height: normal">
                                                {{ c.name | cut:25 }}</li>
                                        </ul>
                                    </div>
                                </div>

                                <div ng-if="! lead.current_path">--</div>
                            </td>

                            <!--total paid-->
                            <td ng-class="{'bg-warning': lead.total_paid == 0, 'bg-success': lead.current_path.amount_remaining == 0}">
                                <div ng-if="!! lead.current_path && lead.current_path.cost > 0">
                                    <b>{{ lead.current_path.total_paid | round }}</b>  \  {{ lead.current_path.cost | round }}

                                    <div class="small text-muted">
                                        المتبقى:
                                        <b class="text-warning">{{ lead.current_path.amount_remaining | round }}</b>
                                    </div>
                                </div>
                                <div ng-if="! lead.current_path || ! lead.current_path.cost">{{ lead.total_paid }}</div>
                            </td>

                            <!--selected time slots-->
                            <td>
                                <div ng-if="lead.time_slots.length === 0">
                                    --
                                </div>

                                <ul class="list-unstyled small">
                                    <li ng-repeat="s in lead.time_slots" ng-bind-html="s.html_full_label | asHtml"></li>
                                </ul>
                            </td>

                            
                            <td>
                                <div ng-if="!lead.source_campaign && !lead.source_channel">
                                    --
                                </div>

                                <div ng-if="lead.source_campaign">
                                    {{ lead.source_campaign.name }}
                                </div>

                                <div ng-if="lead.source_channel" ng-class="{'small': lead.source_campaign}">
                                    <i>{{ lead.source_channel.name }}</i>
                                </div>
                            </td>

                            <td>
                                <div ng-if="lead.phone_number">
                                    <phone-number model="lead"></phone-number>
                                </div>
                                <div ng-if="lead.email">{{ lead.email }}</div>
                            </td>

                            <td>
                                <span ng-if="!lead.follow_up_time">--</span>
                                <span ng-if="!!lead.follow_up_time" dir="ltr">
                                    {{ lead.follow_up_time | datetime }}</span>
                            </td>

                        </tr>
                        </tbody>
                    </table>
                </div>

                
                <pagination data="leads.list" loader="leads.paginate"></pagination>
            </div>
        </div>

        <div class="block-footer">
            <button ng-disabled="! selected.leads.length || leads.submittedParams.category != 'potential'" disable-on-ajax
                    uib-tooltip="إختيار او إنشاء المسار التدريبي للعملاء المحتملين المختارين"
                    type="button" class="btn btn-sm btn-primary" ng-click="selected.selectPath()">
                <i class="fa fa-th-large"></i>
                إختيار المسار
            </button>

            <button ng-disabled="! selected.leads.length || leads.submittedParams.category != 'potential'" ng-click="selected.assign()"
                    uib-tooltip="تعيين او توزيع العملاء المحتملين المختارين على مسؤولي مبيعات"
                    class="btn btn-sm btn-info" type="button">
                <i class="fa fa-user"></i> تعيين \ توزيع
            </button>

            
            <button ng-disabled="!selected.leads.length" ng-click="sendMessage()" class="btn btn-sm btn-default" type="button">
                <i class="fa fa-send"></i> إرسال رسالة
            </button>

            <button ng-disabled="!selected.leads.length" disable-on-ajax ng-click="selected.bulkDisqualify()" class="btn btn-sm btn-warning" type="button">
                <i class="fa fa-archive"></i> حفظ كغير مطابق
            </button>

            <button ng-disabled="!selected.leads.length" disable-on-ajax ng-click="selected.bulkDelete()" class="btn btn-sm btn-danger icon-only" type="button">
                <i class="fa fa-trash"></i>
            </button>
        </div>
    </div>        </div>
    </div></script>

            
                            <script type="text/ng-template" id="reportView.html"><form name="filterForm" method="POST">
        <div class="block style2">
            <div class="block-body">
                <div class="row">
        
        
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <div class="form-group">
                <label>مساحة الوقت</label>
                <!--
                <div class="help-block">
                    مساحة الوقت التي تريد إنتاج التقرير لها
                </div>
                -->
                <time-span-selector options="{'span': 'thisWeek'}" is-valid="params.timeSpan.isValid"
                    setter="params.timeSpan.setter"></time-span-selector>
            </div>
        </div>
    </div>

    <button ng-click="report.load()" ng-disabled="!params.timeSpan.isValid" class="btn btn-primary" type="submit">
        <i class="fa fa-check"></i> عرض
    </button>            </div>
        </div>
    </form>

    
    <loading-indicator ng-if="!report.loaded"></loading-indicator>

    
    <div ng-if="report.loaded" class="block style2">
        <div class="block-body">
            
            <div class="infoBoxes">
        <div class="infoBox">
            <div class="name">
                عدد المحتملين
            </div>
            <div class="value">
                {{ report.numbers.data.num_potential }}
            </div>
        </div>

        <div class="infoBox">
            <div class="name">
                عدد المحولين
            </div>
            <div class="value">{{ report.numbers.data.num_converted }}</div>
        </div>

        <div class="infoBox">
            <div class="name">
                عدد الغير مطابقين
            </div>
            <div class="value">{{ report.numbers.data.num_disqualified }}</div>
        </div>

        <div class="infoBox">
            <div class="name">
                اجمالي عدد العملاء المحتملين
            </div>
            <div class="value">
                {{ report.numbers.data.total_num_added }}
            </div>
        </div>

        <div class="infoBox">
            <div class="name">
                نسبة التحول
                <popover content="نسبة تحول العملاء المحتملين إلى عملاء فعليين"></popover>
            </div>
            <div class="value">
                {{ report.numbers.data.conversion_rate }} %
            </div>
        </div>
    </div>
            
            <div ng-if="report.numbersChart.view" class="block style4">
        <div class="block-title">
            <i class="icon fa fa-line-chart"></i>
            <span class="title"> العدد مع مرور الوقت</span>
        </div>

        <div class="block-body">
            <canvas id="line" class="chart chart-line" height="60"
                    chart-data="report.numbersChart.data"
                    chart-labels="report.numbersChart.labels"
                    chart-options="report.numbersChart.chartOptions">
            </canvas>
        </div>
    </div>
            <div class="divider-20"></div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 column-bordered">
                    <div class="block style4">
        <div class="block-title">
            <i class="icon fa fa-bullhorn"></i>
            <span class="title">
                الحملات التسويقية
            </span>
        </div>

        <div class="block-body">
            
            <div ng-if="report.campaignsLeads.data.length == 0" class="alert alert-info">
                <i class="fa fa-info-circle"></i>
                ليس هناك حملات تسويقية تمت خلال الفترة المختارة
            </div>

            
            <div ng-if="report.campaignsLeads.data.length > 0" id="campaigns" class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th width="70%">الحملة التسويقية</th>
                        <th>العملاء المحتملين الناتجين</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr ng-repeat="campaign in report.campaignsLeads.data" class="campaign">
                        <td>
                            <div>
                                {{ campaign.info.name }}
                            </div>

                            <div class="small">
                                بدأت 
                                {{ campaign.info.start_date_formatted }}
                            </div>
                        </td>

                        <td>
                            <h4>
                                {{ campaign.numLeads }}
                            </h4>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>                </div>

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="block style4">
        <div class="block-title">
            <i class="icon fa fa-map-signs"></i>
            <span class="title">
                القنوات
            </span>
        </div>

        <div class="block-body">
            
            <div ng-if="report.channelsLeads.data.length == 0" class="alert alert-info">
                <i class="fa fa-info-circle"></i>
                لم يتم إضافة القنوات التسويقية بعد
            </div>

            
            <div ng-if="report.channelsLeads.data.length > 0" id="channels" class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th width="70%">القناة التسويقية</th>
                        <th>العملاء المحتملين الناتجين</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr ng-repeat="channel in report.channelsLeads.data" class="channel">
                        <td>
                            {{ channel.info.name }}
                        </td>

                        <td>
                            {{ channel.numLeads }}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>                </div>
            </div>

            <div class="divider-20"></div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 column-bordered">
                    <div class="block style4">
        <div class="block-title">
            <i class="icon fa fa-bars"></i>
            <span class="title">
                درجة الإهتمام
            </span>
        </div>

        <div class="block-body">
            <table class="table">
                <thead>
                <tr>
                    <th width="70%">درجة الإهتمام</th>
                    <th>العدد</th>
                </tr>
                </thead>

                <tbody>
                <tr ng-repeat="level in report.interestLevelsLeads.data">
                    <td>
                        <div ng-if="level.level != 'unknown'">
                            <lead-interest-level-icon level="level.level"></lead-interest-level-icon>
                            {{ trans(['lead_interest_levels', level.level]) }}
                        </div>

                        <div ng-if="level.level == 'unknown'">
                            <i>
                                [غير معروف]
                            </i>
                        </div>
                    </td>

                    <td>
                        {{ level.numLeads }}
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="block style4">
    	<div class="block-title">
            <i class="icon fa fa-users"></i>
    		<span class="title">
                الناتجين عن كل مستخدم
            </span>
    	</div>

    	<div class="block-body">
            
            <div ng-if="!report.usersLeads.data.length" class="alert alert-info">
                <i class="fa fa-info-circle"></i>
                لم يتم إنتاج أي عملاء محتملين خلال الفترة المختارة!
            </div>

            
            <div ng-if="report.usersLeads.data.length > 0" class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>المستخدم</th>
                        <th>
                            المضافين
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr ng-repeat="user in report.usersLeads.data">
                        <td>
                            <span>{{ user.user.name }}</span>
                        </td>

                        <td>
                            <span>{{ user.numLeads }}</span>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

    	</div>
    </div>                </div>
            </div>

            <div class="divider-20"></div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="block style4">
        <div class="block-title">
            <i class="icon fa fa-user-circle-o"></i>
                <span class="title">
                    الحسابات المسؤولة من كل مستخدم
                </span>
        </div>

        <div class="block-body">
            
            <div ng-if="!report.ownedByEachUser.data.length" class="alert alert-info">
                <i class="fa fa-info-circle"></i>
                ليس هناك عملاء محتملين مسجلين اسفل مسؤولي حسابات Owners خلال الفترة المختارة.
            </div>

            
            <div ng-if="report.ownedByEachUser.data.length > 0" class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>المستخدم</th>
                        <th>
                            عدد العملاء المحتملين
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr ng-repeat="user in report.ownedByEachUser.data">
                        <td>
                            {{ user.user.name }}
                        </td>

                        <td>
                            {{ user.numLeads }}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>                </div>

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="block style4">
		<div class="block-title">
			<i class="icon fa fa-refresh"></i>
			<span class="title">
	            المحتملين المحولين لعملاء، لكل مستخدم
			</span>
		</div>
	
		<div class="block-body">
			
			<div ng-if="!report.conversionsByUsers.data.length" class="alert alert-info">
				<i class="fa fa-info-circle"></i>
				ليس هناك عملاء محتملين تم تحويلهم خلال الفترة المختارة
			</div>
	
			
			<div ng-if="report.conversionsByUsers.data.length > 0" class="table-responsive">
				<table class="table">
					<thead>
					<tr>
						<th>المستخدم</th>
						<th>
							عدد المحولين
						</th>
					</tr>
					</thead>
					<tbody>
					<tr ng-repeat="user in report.conversionsByUsers.data">
						<td>
							<span>{{ user.user.name }}</span>
						</td>
	
						<td>
							<span>{{ user.numLeads }}</span>
						</td>
					</tr>
					</tbody>
				</table>
			</div>
	
		</div>
	</div>                </div>
            </div>
        </div>
    </div></script>
                <script type="text/ng-template" id="salesView.html"><div class="alert alert-info" ng-if="! users.length">
        
        <i class="fa fa-info-circle"></i>
        <b>لم يتم تحديد فريق قسم المبيعات بعد!</b> تحتاج اولاً لتحديد مسؤولي المبيعات الذين سيتم تعيين العملاء لهم.
		إبدأ بإضافة "دور مستخدمين" جديد محدد لهم، ثم قم بإختيار هذا الدور لكل مستخدم منهم. وفي النهاية قم بتحديد هذا الدور من إعدادات التسويق من على صفحة الإعدادات العامة.

        <div class="margin-top-15">
            <a href="/admin/users" class="btn btn-sm btn-primary">
                إضافة الدور وتحديد مسؤولي المبيعات
            </a>
        </div>
    </div> 

    
    <div ng-if="users.length > 0" class="row">
        <div class="col-sm-12 col-md-3">
            <div class="list-group">
                <a ng-repeat="u in users" ng-click="user.select(u)" ng-class="{'active': user.is(u)}"
                   href="" class="list-group-item">

                    <i ng-if="user.is(u)" class="fa fa-chevron-left arrow"></i>

                    {{ u.name | cut:20 }}
                </a>
            </div>
        </div>

        <div class="col-sm-12 col-md-9">
            <p ng-if="! user.user">
                <i class="fa fa-info-circle"></i>
                قم بإختيار مسؤول المبيعات من القائمة لعرض التقرير الخاص به.
            </p>

            
            <div ng-if="!!user.user" class="block style4">
                <div class="block-title">
                    <i class="icon fa fa-user-o"></i>
                    <span class="title">{{ user.user.name }}</span>
                </div>

                <div ng-if="! summaryReport.summary" class="block-body">
                    <loading-indicator></loading-indicator>
                </div>

                <div ng-if="!! summaryReport.summary" class="block-body">
                    
                    <div class="boxes boxes-center align-items-center padding-20">
        <div class="box">
            <div class="name">إجمالي العملاء</div>
            <div class="value">{{ summaryReport.summary.leads.total }}</div>
        </div>

        <div class="box">
            <div class="name">المحتملين</div>
            <div class="value">{{ summaryReport.summary.leads.potential }}</div>
        </div>

        <div class="box">
            <div class="name">المحولين</div>
            <div class="value">{{ summaryReport.summary.leads.converted }}</div>
        </div>

        <div class="box">
            <div class="name">الغير مطابقين</div>
            <div class="value">{{ summaryReport.summary.leads.disqualified }}</div>
        </div>

        <div class="box">
            <div class="name">معدل التحويل</div>
            <div class="value">{{ summaryReport.summary.leads.conversionRate }}%</div>
        </div>

        <div class="separator">
            &boxh;
        </div>

        <div class="box">
            <div class="name">إجمالي المستحق للمسارات</div>
            <div class="value">{{ summaryReport.summary.finances.totalPathsCost }}</div>
        </div>

        <div class="box">
            <div class="name">إجمالي المستلم فعلياً</div>
            <div class="value">{{ summaryReport.summary.finances.totalReceived }}</div>
        </div>
    </div>
                    
                    <div class="block style2">
    	<div class="block-title flex flex-space-between flex-align-items-center">
            <div></div>
            <div class="flex flex-margin-items-10">
                <h4 class="text-strong margin-0">{{ monthlyReport.from.format('DD/MM') }}</h4>

                <div class="dropdown">
                    <button class="btn btn-xs btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                        <i class="fa fa-calendar margin-0"></i>
                    </button>

                    <div class="dropdown-menu padding-10" role="menu">
                        <div datetime-picker="monthlyReport.datePicker"
                             datetime-model="monthlyReport.from"></div>
                    </div>
                </div>

                <div>
                    <i class="fa fa-arrow-left"></i>
                </div>

                <h4 class="text-strong">{{ monthlyReport.to.format('DD/MM (YYYY)') }}</h4>

                <div class="dropdown">
                    <button class="btn btn-xs btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                        <i class="fa fa-calendar margin-0"></i>
                    </button>

                    <div class="dropdown-menu padding-10" role="menu">
                        <div datetime-picker="monthlyReport.datePicker"
                             datetime-model="monthlyReport.to"></div>
                    </div>
                </div>
            </div>
            <div></div>
    	</div>

    	<div ng-if="! monthlyReport.report" class="block-body">
            <loading-indicator></loading-indicator>
    	</div>

    	<div ng-if="!! monthlyReport.report" class="block-body">

            
            <div class="row padding-20">
                <div class="col-sm-12 col-md-4">
                    <h4 class="margin-bottom-15">
                        العملاء المحتملين
                    </h4>

                    <dl class="dl-horizontal">
                        <dt>إجمالي المعينين</dt>
                        <dd>{{ monthlyReport.report.stats.leads.total }}</dd>

                        <dt>محتملين</dt>
                        <dd>{{ monthlyReport.report.stats.leads.totalPotential }}</dd>

                        <dt>محولين</dt>
                        <dd>{{ monthlyReport.report.stats.leads.totalConverted }}</dd>

                        <dt>غير مؤهلين\مهتمين</dt>
                        <dd>{{ monthlyReport.report.stats.leads.totalDisqualified }}</dd>

                        <dt>معدل التحويل</dt>
                        <dd>{{ monthlyReport.report.stats.leads.overallConversionRate }}%</dd>
                    </dl>
                </div>

                <div class="col-sm-12 col-md-4">
                    <h4 class="margin-bottom-15">
                        الفواتير الصادرة
                    </h4>

                    <dl class="dl-horizontal">
                        <dt>عدد الفواتير</dt>
                        <dd>{{ monthlyReport.report.stats.invoices.total }}</dd>

                        <dt>بإجمالي (المبلغ)</dt>
                        <dd>{{ monthlyReport.report.stats.invoices.totalSum }}</dd>

                        <dt>إجمالي المدفوع</dt>
                        <dd>{{ monthlyReport.report.stats.invoices.totalPaidSum }}</dd>

                        <dt>بإنتظار الدفع</dt>
                        <dd>{{ monthlyReport.report.stats.invoices.totalPending }}</dd>
                    </dl>
                </div>

                <div class="col-sm-12 col-md-4">
                    <h4 class="margin-bottom-15">
                        مدفوعات العملاء المحتملين
                    </h4>

                    <dl class="dl-horizontal">
                        <dt>
                            إجمالي المستحق للمسارات
                            <popover content="إجمالي المبالغ المستحقة في المسارات التدريبية المختارة او المخصصة لهؤلاء العملاء"></popover>
                        </dt>
                        <dd>{{ monthlyReport.report.stats.transactions.totalPathsCost }}</dd>

                        <dt>عدد عمليات الدفع</dt>
                        <dd>{{ monthlyReport.report.stats.transactions.transactionCount }}</dd>

                        <dt>إجمالي المستلم فعلياً</dt>
                        <dd>{{ monthlyReport.report.stats.transactions.totalReceived }}</dd>

                        <dt>إجمالي المسترد Refund</dt>
                        <dd>{{ monthlyReport.report.stats.transactions.totalRefunded }}</dd>
                    </dl>
                </div>
            </div>

            
            <div class="block style2">
            	<div class="block-title">
            		<span class="title">العملاء المحتملين الجدد وعمليات التحويل اليومية</span>
                    <div class="sub-title">
                        الأرقام اليومية للعملاء المحتملين الجدد وعمليات التحويل في المقابل
                    </div>
            	</div>
            	<div class="block-body">
                    <canvas id="line" class="chart chart-line" height="80"
                            chart-data="monthlyReport.report.dailyLeadsChart.data"
                            chart-series="monthlyReport.report.dailyLeadsChart.series"
                            chart-labels="monthlyReport.report.dailyLeadsChart.labels">
                    </canvas>
            	</div>
            </div>

            
            <div class="block style2">
            	<div class="block-title">
            		<span class="title">المدفوعات اليومية</span>
                    <div class="sub-title">
                        إجمالي المبالغ المحصلة بشكل يومي من العملاء المحتملين
                    </div>
            	</div>
            	<div class="block-body">
                    <canvas id="line" class="chart chart-line" height="80"
                            chart-data="monthlyReport.report.dailyPaymentsChart.data"
                            chart-series="monthlyReport.report.dailyPaymentsChart.series"
                            chart-labels="monthlyReport.report.dailyPaymentsChart.labels">
                    </canvas>
            	</div>
            </div>

            
            <div ng-if="monthlyReport.report.leads.length > 0" class="block style2 margin-bottom-0">
            	<div class="block-title">
            		<span class="title">
                        العملاء المعينين
                    </span>
                    <span class="badge">{{ monthlyReport.report.leads.length }}</span>
                    <div class="sub-title">
                        قائمة بالعملاء المحتملين المعينين خلال الفترة المحددة
                    </div>
            	</div>
            	<div class="block-body">
                    <div class="table-responsive">
                        <table class="table" style="min-width: 1150px">
                            <thead>
                            <tr>
                                <th>العميل المحتمل</th>
                                <th>الحالة</th>
                                <th>مسار التدريب</th>
                                <th>إجمالي المدفوع</th>
                                                                <th>معلومات التواصل</th>
                                <th>تاريخ الإضافة</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr ng-repeat="lead in monthlyReport.report.leads">
                                <td>
                                    <lead-interest-level-icon lead="lead"></lead-interest-level-icon>
                                    <a href="{{ lead.view_url }}" as-popup class="text-underlined">
                                        {{ lead.name }}
                                    </a>
                                </td>

                                <td>
                                    <i ng-class="lead.display_category_icon"></i>
                                    {{ lead.display_category }}
                                </td>

                                <td class="cell-wrap" style="max-width: 180px">
                                    <div ng-if="lead.current_path">
                                        <div><b>{{ lead.current_path.name | cut:20 }}</b></div>
                                        <path-info ng-model="lead.current_path" no-finances></path-info>
                                    </div>
                                    <div ng-if="! lead.current_path">--</div>
                                </td>

                                <td>
                                    <div ng-if="lead.current_path">
                                        <b>{{ lead.current_path.total_paid }}</b>
                                        <div class="small">EGP</div>
                                    </div>

                                    <div ng-if="! lead.current_path">--</div>
                                </td>

                                
                                <td>
                                    <phone-number model="lead"></phone-number>
                                    <div ng-if="!! lead.email">{{ lead.email }}</div>
                                </td>

                                <td>
                                    <span dir="ltr">{{ lead.created_at | datetime }}</span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
            	</div>
            </div>

    	</div>
    </div>                </div>
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
