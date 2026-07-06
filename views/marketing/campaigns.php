<?php
// إعداد المتغيرات
$pageTitle = 'الحملات التسويقية';
$includeSessionCheck = true;
$includeCSRFRefresh = true;

// تضمين القوالب
include_once __DIR__ . '/../templates/header.php';
include_once __DIR__ . '/../templates/sidebar.php';
?>

<div id="container" class="container-fluid">
<div id="content" class="">
                    <div ng-app="campaignsApp" class="ng-scope">
            
            <div id="pageTitle" class="d-flex flex-gap-15 flex-wrap flex-rows flex-column-on-mobile align-items-center justify-content-between">
        <div class="flex-grow-1">
            <i class="icon fa fa-bullhorn"></i>
            <span class="title">التسويق والمبيعات</span>

                            
                <ul class="breadcrumb inline" style="margin: 0">
                    <li class="breadcrumb-item"></li>

                                            <li class="breadcrumb-item">الحملات التسويقية </li>
                                    </ul>
                    </div>

        <div class="d-flex justify-content-center">
            <div>
                
                            </div>
        </div>
    </div>
            <!-- ngView: --><div ng-view="" class="ng-scope">
                <dismissible-hint name="marketing.campaigns.home" class="ng-scope ng-isolate-scope">
    <!-- ngIf: visible --><div ng-if="visible" class="dismissibleHint  d-flex flex-gap-15 align-items-center justify-content-between">
        <div class="d-flex flex-gap-20 align-items-center flex-grow-1">
            <!-- ngIf: icon || img --><div ng-if="icon || img" class="iconHolder hidden-xs ng-scope">
                <!-- ngIf: img -->
                <!-- ngIf: icon --><span ng-if="icon" class="ms icon ng-binding ng-scope">info</span><!-- end ngIf: icon -->
            </div><!-- end ngIf: icon || img -->

            <div class="content flex-grow-1">
                <ng-transclude>
        هنا يمكنك تسجيل وإدارة الحملات التسويقية والدعائية للمؤسسة. لاحقاً وعند إضافة Leads جديدة يمكنك
		اختيار الحملة التي نتج عنها كل Lead، وبهذا ستستطيع قياس مدي نجاح الحملة بناءاً على عدد الـ Leads.
    </ng-transclude>
            </div>
        </div>

        <div>
            <!-- ngIf: dismissible --><button ng-click="dismiss()" ng-if="dismissible" class="close ng-scope" type="button">
                <span>×</span>
            </button><!-- end ngIf: dismissible -->
        </div>
    </div><!-- end ngIf: visible --></dismissible-hint>

    
    <!-- ngIf: campaigns.loading -->

    
    <!-- ngIf: !campaigns.loading --><div ng-if="!campaigns.loading" class="ng-scope">
        
        <!-- ngIf: campaigns.total == 0 --><div ng-if="campaigns.total == 0" class="alert alert-info ng-scope">
            <i class="fa fa-info-circle"></i>
            لم يتم تسجيل أي حملات تسويقية بعد. لبدء أو جدولة حملة جديدة إضغط على "بدء حملة جديدة"

            <div class="margin-top-15">
                <button ng-click="newCampaign()" class="btn btn-sm btn-primary">
                    <i class="fa fa-plus-circle"></i>
                    بدء حملة جديدة
                </button>
            </div>
        </div><!-- end ngIf: campaigns.total == 0 -->

        
        <!-- ngIf: campaigns.total > 0 -->
    </div><!-- end ngIf: !campaigns.loading -->            </div>

            
            <script type="text/ng-template" id="homeController.html">
                <dismissible-hint name="marketing.campaigns.home">
        هنا يمكنك تسجيل وإدارة الحملات التسويقية والدعائية للمؤسسة. لاحقاً وعند إضافة Leads جديدة يمكنك
		اختيار الحملة التي نتج عنها كل Lead، وبهذا ستستطيع قياس مدي نجاح الحملة بناءاً على عدد الـ Leads.
    </dismissible-hint>

    
    <loading-indicator ng-if="campaigns.loading"></loading-indicator>

    
    <div ng-if="!campaigns.loading">
        
        <div ng-if="campaigns.total == 0" class="alert alert-info">
            <i class="fa fa-info-circle"></i>
            لم يتم تسجيل أي حملات تسويقية بعد. لبدء أو جدولة حملة جديدة إضغط على "بدء حملة جديدة"

            <div class="margin-top-15">
                <button ng-click="newCampaign()" class="btn btn-sm btn-primary">
                    <i class="fa fa-plus-circle"></i>
                    بدء حملة جديدة
                </button>
            </div>
        </div>

        
        <div ng-if="campaigns.total > 0">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="" data-toggle="tab" data-target="#activeCampaigns">
                        <i class="icon fa fa-bullhorn"></i>
                        <span class="title">الحملات النشطة</span>
                    </a>
                </li>

                <li>
                    <a href="" data-toggle="tab" data-target="#activedCampaign">
                        <i class="icon fa fa-archive"></i>
                        <span class="title">الحملات المؤرشفة</span>
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                
                <div class="active tab-pane" id="activeCampaigns">
                    <div class="d-flex flex-end">
                        <div class="margin-bottom-15">
                            <button ng-click="newCampaign()" class="btn btn-sm btn-primary">
                                <i class="fa fa-plus-circle"></i>
                                بدء حملة جديدة
                            </button>
                        </div>
                    </div>

                    <div ng-if="campaigns.active.length == 0">
        <div class="alert alert-info">
            <i class="fa fa-info-circle"></i>
            ليس هناك حملات تسويقية نشطة حالياً. إبدأ بإضافة حملة جديدة.
        </div>
    </div>

    
    <div ng-if="campaigns.active.length > 0">
        <div class="row">
            <div ng-repeat="campaign in campaigns.active" class="campaign col-xs-12 col-sm-12 col-md-4">
                <div class="thumbnail">
                    <div class="caption text-center">
                        <h4 class="title inline-block text-primary text-strong">
                            {{ campaign.name }}
                        </h4>
                        <span ng-if="campaign._expired" class="label label-danger">
                            <i class="fa fa-clock-o"></i>
                            إنتهت
                        </span>
                    </div>

                    <dl class="dl-horizontal">
                        <dt>العملاء المحتملين المولدة</dt>
                        <dd>{{ campaign.numGeneratedLeads }}</dd>

                        <dt>العملاء المولدين</dt>
                        <dd>{{ campaign.numGeneratedClients }}</dd>
                    </dl>

                    <hr class="dashed"/>

                    <dl class="dl-horizontal">
                        <dt>تاريخ البدء</dt>
                        <dd>{{ campaign.start_date_formatted }}</dd>

                        <dt>تاريخ الإنتهاء</dt>
                        <dd>{{ campaign.end_date_formatted }}</dd>

                        <dt>المدة</dt>
                        <dd>
                            <strong>{{ campaign.duration }}</strong>
                            ايام
                        </dd>

                                            </dl>

                    <div class="text-center">
                        <a ng-click="campaignOptions.view(campaign)" href="" class="btn btn-xs btn-default">
                            <i class="fa fa-chevron-circle-right"></i> عرض</a>

                        <a ng-click="campaignOptions.edit(campaign)" href="" class="btn btn-xs btn-default">
                            <i class="fa fa-pencil"></i> تعديل</a>

                        <a ng-click="campaignOptions.archive(campaign)" href="" class="btn btn-xs btn-warning">
                            <i class="fa fa-archive"></i>
                            ارشفة
                        </a>

                        <a ng-click="campaignOptions.delete(campaign)" href="" class="btn btn-xs btn-danger icon-only">
                            <i class="fa fa-trash"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
                </div>

                
                <div class="tab-pane" id="activedCampaign">
                    <div ng-if="campaigns.archived.length == 0">
        <div class="alert alert-info">
            <i class="fa fa-info-circle"></i>
            ليس هناك اي حملات تسويقية مؤرشفة. فور إنتهاء احد الحملات يجب ان تقوم بأرشفتها، حيث ستظهر هنا على هذا التبويب بعيداً عن الحملات النشطة والجديدة.
        </div>
    </div>

    <div ng-if="campaigns.archived.length > 0" class="block-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th width="30%">الإسم</th>
                    <th>تاريخ البدء</th>
                    <th>تاريخ الإنتهاء</th>
                    <th>العملاء المولدين</th>
                    <th style="width: 100px"></th>
                </tr>
                </thead>

                <tbody>
                <tr ng-repeat="campaign in campaigns.archived">
                    <td>
                        <h4>
                            <a ng-click="campaignOptions.view(campaign)" href="" class="text-underlined">
                                {{ campaign.name }}
                            </a>
                        </h4>
                    </td>

                    <td>{{ campaign.start_date_formatted }}</td>
                    <td>{{ campaign.end_date_formatted }}</td>
                    <td>{{ campaign.numGeneratedClients }}</td>

                    <td>
                        <div class="btn-group btn-group-xs">
                            <button ng-click="campaignOptions.unArchive(campaign)" class="btn btn-default">
                                <i class="fa fa-check-circle"></i>
                                إلغاء الأرشفة
                            </button>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
                </div>
            </div>
        </div>
    </div>            </script>
        </div>
            </div>
</div>



<?php
// تضمين footer template
include_once __DIR__ . '/../templates/footer.php';
?>
