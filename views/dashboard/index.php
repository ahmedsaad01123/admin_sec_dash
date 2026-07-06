<?php
// إعداد المتغيرات للقوالب
$pageTitle = 'لوحة التحكم';
$includeSessionCheck = true;
$includeCSRFRefresh = true;

// تضمين القوالب
include_once __DIR__ . '/../templates/header.php';
include_once __DIR__ . '/../templates/sidebar.php';
?>

      <div id="container" class="container-fluid">

        
            <div id="content" class="dashboardPage">
                     <div ng-app="dashboardApp" ng-controller="mainController" class="ng-scope">
      <div class="d-flex flex-gap-15 justify-content-between flex-wrap mt-10 mb-15" style="position: relative; z-index: 10">
         <div>
            <h3 class="mb-5">
               أهلاً، Super ...
            </h3>
            <small class="text-muted">نتمنى لك يوماً سعيداً 🌷</small>
         </div>
         <div>
            <a ng-click="configure()" href="" class="btn btn-sm btn-default">
            <i class="fa fa-sliders"></i> ضبط الصفحة                        </a>
         </div>
      </div>
      <dismissible-hint name="dashboard.whatsapp_channel" icon="'/images/whatsapp.png'" no-title="" class="ng-isolate-scope">
         <!-- ngIf: visible -->
      </dismissible-hint>
      <dismissible-hint name="system_update_12.27.1" icon="'new_releases'" no-title="" class="ng-isolate-scope">
         <!-- ngIf: visible -->
         <div ng-if="visible" class="dismissibleHint  d-flex flex-gap-15 align-items-center justify-content-between">
            <div class="d-flex flex-gap-20 align-items-center flex-grow-1">
               <!-- ngIf: icon || img -->
               <div ng-if="icon || img" class="iconHolder hidden-xs ng-scope">
                  <!-- ngIf: img -->
                  <!-- ngIf: icon --><span ng-if="icon" class="ms icon ng-binding ng-scope">new_releases</span><!-- end ngIf: icon -->
               </div>
               <!-- end ngIf: icon || img -->
               <div class="content flex-grow-1">
                  <ng-transclude>
                     <h4 class="title ng-scope">
                        آخر التحديثات        
                     </h4>
                     <ul class="list-compact ng-scope" style="direction: rtl; text-align: right; padding-right: 10px">
                        <li class="text-strong">
                           ( 24/04 )
                           <span style="color: #a3ff15">الآن يمكنك ضبط "إستراتيجية تقييم إفتراضية" على مستوى كل فرع.</span>
                        </li>
                        <li class="text-strong">
                           ( 22/04 )
                           <span style="color: #a3ff15">تم إتاحة خاصية المراسلة عبر مقدمي خدمات واتساب الرسميين (من خلال نظام القوالب)</span>
                        </li>
                        <li class="">
                           ( 20/04 )
                           <span style="color: inherit">تم إضافة مساحة لإحصاءات حضور العملاء على تبويب الحضور داخل ملف المجموعة</span>
                        </li>
                        <li class="text-strong">
                           ( 20/04 )
                           <span style="color: #a3ff15">الآن يمكنك تسجيل اسباب غياب المتدربين عن المحاضرات</span>
                        </li>
                        <li class="text-strong">
                           ( 18/04 )
                           <span style="color: #a3ff15">الآن يتأكد النظام من توفر المدربين عند إضافة محاضرات جديدة</span>
                        </li>
                     </ul>
                     <div class="mt-15 ng-scope">
                        <a href="/misc/about#update" class="btn btn-primary">
                        <i class="fa fa-bars"></i> عرض التغييرات            </a>
                        <a ng-click="$parent.dismiss()" href="" class="btn btn-default">
                        <i class="fa fa-remove"></i> إخفاء
                        </a>
                     </div>
                  </ng-transclude>
               </div>
            </div>
            <div>
               <!-- ngIf: dismissible --><button ng-click="dismiss()" ng-if="dismissible" class="close ng-scope" type="button">
               <span>×</span>
               </button><!-- end ngIf: dismissible -->
            </div>
         </div>
         <!-- end ngIf: visible -->
      </dismissible-hint>
      <div id="widgets-holder" class="grid grid-2cols ui-sortable">
         <div ng-controller="widgets.quick-actions" data-name="quick-actions" id="widget-quick-actions" class="grid-cell dashboard-widget size-100 ng-scope">
            <!--Start widget block-->
            <div class="block style2 block-widget">
               <div class="block-title">
                  <i class="handle glyphicon glyphicon-move onSide ui-sortable-handle"></i>
                  <span class="title">إختصارات</span>
               </div>
               <div class="block-body">
                  <div id="actions" class="flex flex-center">
                     <a href="/clients/create" class="action">
                        <div class="icon">
                           <span class="ms ms-lg">person_add</span>
                        </div>
                        <div class="title">
                           عميل جديد                
                        </div>
                     </a>
                     <!--
                        <a href="/batches" class="action">
                            <div class="icon">
                                <span class="ms ms-lg">folder_shared</span>
                            </div>
                            <div class="title">
                                المجموعات النشطة            </div>
                        </a>
                        
                        <a href="/lectures" class="action">
                            <div class="icon">
                                <span class="ms ms-lg">calendar_month</span>
                            </div>
                            <div class="title">
                                جدول المحاضرات            </div>
                        </a>
                        -->
                     <a href="/lectures/create" class="action">
                        <div class="icon">
                           <span class="ms ms-lg">event_available</span>
                        </div>
                        <div class="title">
                           محاضرة جديدة                
                        </div>
                     </a>
                     <a ng-click="saveAttendance()" href="" class="action">
                        <div class="icon">
                           <span class="ms ms-lg">inventory</span>
                        </div>
                        <div class="title">
                           تسجيل الحضور                
                        </div>
                     </a>
                     <div class="separator"></div>
                     <a href="/finances/transactions/create" class="action">
                        <div class="icon">
                           <span class="ms ms-lg">payments</span>
                        </div>
                        <div class="title">
                           عملية مالية جديدة                    
                        </div>
                     </a>
                     <a href="/finances/invoices/create" class="action">
                        <div class="icon">
                           <span class="ms ms-lg">receipt_long</span>
                        </div>
                        <div class="title">
                           فاتورة جديدة                    
                        </div>
                     </a>
                     <div class="separator"></div>
                     <a ng-click="newBatchEnrollment()" href="" class="action">
                        <div class="icon">
                           <span class="ms ms-lg">group_add</span>
                        </div>
                        <div class="title">
                           تسجيل على مجموعة                
                        </div>
                     </a>
                     <!--
                        <a class="action" href="/training/requests?create">
                            <div class="icon">
                                <span class="ms ms-lg">move_to_inbox</span>
                            </div>
                        
                            <div class="title">
                                إضافة طلب تدريب                </div>
                        </a>
                        -->
                     <a ng-click="newWaitingListEnrollment()" class="action" href="">
                        <div class="icon">
                           <span class="ms ms-lg">recent_actors</span>
                        </div>
                        <div class="title">
                           تسجيل عميل كانتظار                
                        </div>
                     </a>
                     <a ng-click="newPTOneOnOne()" class="action" href="">
                        <div class="icon">
                           <span class="ms ms-lg">signpost</span>
                        </div>
                        <div class="title">
                           إختبار تحديد مستوى جديد                
                        </div>
                     </a>
                     <div class="separator"></div>
                     <a ng-click="newRemark()" href="" class="action">
                        <div class="icon">
                           <span class="ms ms-lg">post_add</span>
                        </div>
                        <div class="title">
                           ملحوظة أو مهمة جديدة                
                        </div>
                     </a>
                     <!--
                        <a ng-click="newFormEntry()" class="action" href="">
                            <div class="icon">
                                <span class="ms ms-lg">dns</span>
                            </div>
                        
                            <div class="title">
                                ملئ نموذج لأحد العملاء                    </div>
                        </a>
                        -->
                     <div class="separator"></div>
                     <!--
                        <a class="action" href="/messaging/create">
                            <div class="icon">
                                <span class="ms ms-lg">mail</span>
                            </div>
                        
                            <div class="title">
                                إرسال رسالة                </div>
                        </a>
                        -->
                     <div class="separator"></div>
                     <a ng-click="newLead()" href="" class="action">
                        <div class="icon">
                           <span class="ms ms-lg">badge</span>
                        </div>
                        <div class="title">
                           عميل محتمل جديد                
                        </div>
                     </a>
                     <!--
                        <a href="/marketing/enquiries#!/create" class="action">
                            <div class="icon">
                                <span class="ms ms-lg">move_to_inbox</span>
                            </div>
                            <div class="title">
                                إستعلام جديد                </div>
                        </a>
                        -->
                     <!--
                        <a onclick="return window.App.openCSChatWindow()" class="action" href="">
                            <div class="icon">
                                <span class="ms ms-lg">forum</span>
                            </div>
                        
                            <div class="title">
                                دعم العملاء                </div>
                        </a>
                        -->
                     <!--
                        <a ng-click="newAnnouncement()" class="action" href="">
                            <div class="icon">
                                <img src=""/>
                            </div>
                        
                            <div class="title">
                                إعلان جديد            </div>
                        </a>
                        
                        -->
                     <!--
                        <a onclick="return window.App.showSearchBox()" href="" class="action">
                            <div class="icon">
                                <img src=""/>
                            </div>
                        
                            <div class="title">
                                بحث
                            </div>
                        </a>
                        -->
                     <div class="separator"></div>
                     <a href="/admin/settings" class="action">
                        <div class="icon">
                           <span class="ms ms-lg">tune</span>
                        </div>
                        <div class="title">
                           الإعدادات العامة                
                        </div>
                     </a>
                     <a href="/account/modify" class="action">
                        <div class="icon">
                           <span class="ms ms-lg">manage_accounts</span>
                        </div>
                        <div class="title">
                           حسابى            
                        </div>
                     </a>
                     <!--
                        <a onclick="return window.App.sharedAssets.open()" href="" class="action">
                            <div class="icon">
                                <span class="ms ms-lg">folder_copy</span>
                            </div>
                        
                            <div class="title">
                                مركز الملفات            </div>
                        </a>
                        -->
                     <a href="/help" class="action">
                        <div class="icon">
                           <span class="ms ms-lg">support</span>
                        </div>
                        <div class="title">
                           مساعدة
                        </div>
                     </a>
                  </div>
               </div>
            </div>
            <!--End widget block-->
         </div>
         <div ng-controller="widgets.finances-latest-transactions" data-name="finances-latest-transactions" id="widget-finances-latest-transactions" class="grid-cell dashboard-widget size-100 ng-scope">
            <!--Start widget block-->
            <div class="block style2 block-widget">
               <div class="block-title">
                  <i class="handle glyphicon glyphicon-move onSide ui-sortable-handle"></i>
                  <i class="icon fa fa-bars"></i>
                  <span class="title">آخر المعاملات المالية</span>
               </div>
               <div class="block-body">
                  <p>
                     لم يتم تسجيل آي معاملات مالية بعد على النظام        
                  </p>
               </div>
            </div>
            <!--End widget block-->
         </div>
         <div ng-controller="widgets.clients-latest" data-name="clients-latest" id="widget-clients-latest" class="grid-cell dashboard-widget size-50 ng-scope">
            <!--Start widget block-->
            <div class="block style2 block-widget">
               <div class="block-title">
                  <i class="handle glyphicon glyphicon-move onSide ui-sortable-handle"></i>
                  <i class="icon fa fa-users"></i>
                  <span class="title">احدث العملاء</span>
               </div>
               <div class="block-body">
                  <div class="table-responsive">
                     <table class="table">
                        <thead>
                           <tr>
                              <th width="15px"></th>
                              <th>العميل</th>
                              <th style="width: 130px">تاريخ الإضافة</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>
                                 <img src="" class="clientPicture small circle" alt="">
                              </td>
                              <td>
                                 <div>
                                    <a href="/clients/1" class="text-underlined">Omar hadid</a>
                                 </div>
                                 <div class="small text-muted">
                                    0500000001
                                 </div>
                              </td>
                              <td>
                                 <span dir="ltr">
                                 20/04, 05 PM
                                 </span>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <img src="" class="clientPicture small circle" alt="">
                              </td>
                              <td>
                                 <div>
                                    <a href="/clients/2" class="text-underlined">Layla khoury</a>
                                 </div>
                                 <div class="small text-muted">
                                    0500000002
                                 </div>
                              </td>
                              <td>
                                 <span dir="ltr">
                                 20/04, 05 PM
                                 </span>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <img src="" class="clientPicture small circle" alt="">
                              </td>
                              <td>
                                 <div>
                                    <a href="/clients/3" class="text-underlined">Youssef bazzi</a>
                                 </div>
                                 <div class="small text-muted">
                                    0500000003
                                 </div>
                              </td>
                              <td>
                                 <span dir="ltr">
                                 20/04, 05 PM
                                 </span>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <img src="" class="clientPicture small circle" alt="">
                              </td>
                              <td>
                                 <div>
                                    <a href="/clients/4" class="text-underlined">Nora sabbagh</a>
                                 </div>
                                 <div class="small text-muted">
                                    0500000004
                                 </div>
                              </td>
                              <td>
                                 <span dir="ltr">
                                 20/04, 05 PM
                                 </span>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <img src="" class="clientPicture small circle" alt="">
                              </td>
                              <td>
                                 <div>
                                    <a href="/clients/5" class="text-underlined">Hassan al-otaibi</a>
                                 </div>
                                 <div class="small text-muted">
                                    0500000005
                                 </div>
                              </td>
                              <td>
                                 <span dir="ltr">
                                 20/04, 05 PM
                                 </span>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
                  <div class="margin-top-10 flex flex-end">
                     <a href="/clients/all" class="small">
                     <i class="fa fa-bars"></i> عرض الكل
                     </a>
                  </div>
               </div>
            </div>
            <!--End widget block-->
         </div>
         <div ng-controller="widgets.finances-past-due-invoices" data-name="finances-past-due-invoices" id="widget-finances-past-due-invoices" class="grid-cell dashboard-widget size-50 ng-scope">
            <!--Start widget block-->
            <div class="block style2 block-widget">
               <div class="block-title">
                  <i class="handle glyphicon glyphicon-move onSide ui-sortable-handle"></i>
                  <i class="icon fa fa-exclamation-triangle"></i>
                  <span class="title">فواتير قديمة بإنتظار الدفع (اقدم 10)</span>
               </div>
               <div class="block-body">
                  <p>ليس هناك اي فواتير قديمة بإنتظار الدفع</p>
               </div>
            </div>
            <!--End widget block-->
         </div>
         <div ng-controller="widgets.finances-summary" data-name="finances-summary" id="widget-finances-summary" class="grid-cell dashboard-widget size-100 ng-scope">
            <!--Start widget block-->
            <div class="block style2 block-widget">
               <div class="block-title">
                  <i class="handle glyphicon glyphicon-move onSide ui-sortable-handle"></i>
                  <span class="title">الملخص المالي لليوم</span>
               </div>
               <div class="block-body">
                  <div class="boxes boxes-side-icons boxes-center">
                     <div class="box received">
                        <div class="icon-holder">
                           <span class="ms icon">arrow_downward</span>
                        </div>
                        <div>
                           <div class="title">إجمالى المستلم فعلياً</div>
                           <h5 class="value">0.00</h5>
                        </div>
                     </div>
                     <div class="box paid">
                        <div class="icon-holder">
                           <span class="ms icon">arrow_upward</span>
                        </div>
                        <div class="body">
                           <div class="title">إجمالي المدفوع فعلياً</div>
                           <h5 class="value">0.00</h5>
                        </div>
                     </div>
                     <div class="box profit">
                        <div class="icon-holder">
                           <span class="ms icon">payments</span>
                        </div>
                        <div class="body">
                           <div class="title">صافي الربح</div>
                           <h5 class="value">0.00</h5>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!--End widget block-->
         </div>
         <div ng-controller="widgets.lectures-in-progress" data-name="lectures-in-progress" id="widget-lectures-in-progress" class="grid-cell dashboard-widget size-100 ng-scope">
            <!--Start widget block-->
            <div class="block style2 block-widget">
               <div class="block-title">
                  <i class="handle glyphicon glyphicon-move onSide ui-sortable-handle"></i>
                  <i class="icon fa fa-desktop"></i>
                  <span class="title">المحاضرات التي تتم الآن</span>
               </div>
               <div class="block-body">
                  <div>
                     <in-progress-lectures class="ng-isolate-scope">
                        <div class="lectures-in-progress ng-scope">
                           <!-- ngIf: lectures === null -->
                           <!-- ngIf: lectures !== null && lectures.length == 0 -->
                           <div ng-if="lectures !== null &amp;&amp; lectures.length == 0" class="mb-0 d-flex align-items-center flex-gap-15 ng-scope">
                              <div>
                                 <i class="fa fa-info-circle"></i>
                                 ليس هناك اي محاضرات مسجلة في أي من القاعات الان
                              </div>
                              <div>
                                 <a ng-click="load()" href="" class="btn btn-default">
                                 <i class="fa fa-refresh"></i> تحقق الآن
                                 </a>
                                 <!--
                                    <a href="/lectures/create" class="btn btn-default">
                                        <i class="fa fa-plus-circle"></i> بدء محاضرة جديدة
                                    </a>
                                    -->
                              </div>
                           </div>
                           <!-- end ngIf: lectures !== null && lectures.length == 0 -->
                           <!-- ngIf: lectures !== null && lectures.length > 0 -->
                           <!-- ngIf: lectures !== null && lectures.length > 0 -->
                        </div>
                     </in-progress-lectures>
                  </div>
               </div>
            </div>
            <!--End widget block-->
         </div>
         <div ng-controller="widgets.global-stats" data-name="global-stats" id="widget-global-stats" class="grid-cell dashboard-widget size-100 ng-scope">
            <!--Start widget block-->
            <div class="block style2 block-widget">
               <div class="block-title">
                  <i class="handle glyphicon glyphicon-move onSide ui-sortable-handle"></i>
                  <span class="title">ارقام وإحصاءات</span>
               </div>
               <div class="block-body">
                  <div class="boxes justify-content-center align-items-center flex-wrap" style="margin-left: 5%; margin-right: 5%">
                     <div class="box">
                        <div class="name">
                           المجموعات التدريبية النشطة
                           <popover content="عدد المجموعات التدريبية التي تتم الآن" class="ng-isolate-scope"><i uib-popover="عدد المجموعات التدريبية التي تتم الآن" popover-title="" popover-trigger="'mouseenter'" popover-placement="" class="popover-hint fa fa-question-circle"></i></popover>
                        </div>
                        <div class="value">1</div>
                     </div>
                     <div class="box">
                        <div class="name">
                           عدد المتدربين بالمجموعات
                           <popover content="عدد المتدربين المسجلين حالياً على المجموعات التدريبية النشطة" class="ng-isolate-scope"><i uib-popover="عدد المتدربين المسجلين حالياً على المجموعات التدريبية النشطة" popover-title="" popover-trigger="'mouseenter'" popover-placement="" class="popover-hint fa fa-question-circle"></i></popover>
                        </div>
                        <div class="value">10</div>
                     </div>
                     <div class="box">
                        <div class="name">
                           على قوائم الانتظار
                           <popover content="إجمالي عدد المُسجلين على قوائم الانتظار" class="ng-isolate-scope"><i uib-popover="إجمالي عدد المُسجلين على قوائم الانتظار" popover-title="" popover-trigger="'mouseenter'" popover-placement="" class="popover-hint fa fa-question-circle"></i></popover>
                        </div>
                        <div class="value">0</div>
                     </div>
                     <div class="box">
                        <div class="name">
                           محاضرات اليوم المتبقية
                           <popover content="عدد المحاضرات المسجلة لليوم ولم تبدأ بعد" class="ng-isolate-scope"><i uib-popover="عدد المحاضرات المسجلة لليوم ولم تبدأ بعد" popover-title="" popover-trigger="'mouseenter'" popover-placement="" class="popover-hint fa fa-question-circle"></i></popover>
                        </div>
                        <div class="value">1</div>
                     </div>
                     <div class="box">
                        <div class="name">
                           بانتظار تحديد المستوى
                           <popover content="على المُختبرين الذين بانتظار الإختبار وتحديد المستوى" class="ng-isolate-scope"><i uib-popover="على المُختبرين الذين بانتظار الإختبار وتحديد المستوى" popover-title="" popover-trigger="'mouseenter'" popover-placement="" class="popover-hint fa fa-question-circle"></i></popover>
                        </div>
                        <div class="value">0</div>
                     </div>
                     <div class="box">
                        <div class="name">
                           الأقساط المستحقة لليوم
                           <popover content="عدد اقساط المجموعات التدريبية المستحقة لليوم" class="ng-isolate-scope"><i uib-popover="عدد اقساط المجموعات التدريبية المستحقة لليوم" popover-title="" popover-trigger="'mouseenter'" popover-placement="" class="popover-hint fa fa-question-circle"></i></popover>
                        </div>
                        <div class="value">0</div>
                     </div>
                     <div class="box">
                        <div class="name">
                           عميل محتمل حالي
                           <popover content="عدد العملاء المحتملين الحاليين" class="ng-isolate-scope"><i uib-popover="عدد العملاء المحتملين الحاليين" popover-title="" popover-trigger="'mouseenter'" popover-placement="" class="popover-hint fa fa-question-circle"></i></popover>
                        </div>
                        <div class="value">0</div>
                     </div>
                     <div class="box">
                        <div class="name">
                           نسبة تحول المبيعات
                           <popover content="نسبة تحول العملاء المحتملين لقسم المبيعات" class="ng-isolate-scope"><i uib-popover="نسبة تحول العملاء المحتملين لقسم المبيعات" popover-title="" popover-trigger="'mouseenter'" popover-placement="" class="popover-hint fa fa-question-circle"></i></popover>
                        </div>
                        <div class="value">--</div>
                     </div>
                  </div>
               </div>
            </div>
            <!--End widget block-->
         </div>
         <div ng-controller="widgets.assigned-remarks" data-name="assigned-remarks" id="widget-assigned-remarks" class="grid-cell dashboard-widget size-50 ng-scope">
            <!--Start widget block-->
            <div class="block style2 block-widget">
               <div class="block-title">
                  <i class="handle glyphicon glyphicon-move onSide ui-sortable-handle"></i>
                  <i class="icon fa fa-sticky-note"></i>
                  <span class="title">المهام المعينة لك</span>
                  <span class="badge ng-binding">0</span>
               </div>
               <div class="block-body">
                  <!-- ngIf: remarks.list === null -->
                  <!-- ngIf: remarks.list !== null -->
                  <div ng-if="remarks.list !== null" class="ng-scope">
                     <!-- ngIf: remarks.list.length == 0 -->
                     <p ng-if="remarks.list.length == 0" class="ng-scope">
                        ليس هناك أي مهام معينة لك لتقوم بالإهتمام بها حالياً
                        <a href="/clients/remarks?tab=all" class="text-underlined">
                        عرض الكل
                        </a>
                     </p>
                     <!-- end ngIf: remarks.list.length == 0 -->
                     <!-- ngIf: remarks.list.length > 0 -->
                  </div>
                  <!-- end ngIf: remarks.list !== null -->                    
               </div>
            </div>
            <!--End widget block-->
         </div>
         <div ng-controller="widgets.batches-active" data-name="batches-active" id="widget-batches-active" class="grid-cell dashboard-widget size-50 ng-scope">
            <!--Start widget block-->
            <div class="block style2 block-widget">
               <div class="block-title">
                  <i class="handle glyphicon glyphicon-move onSide ui-sortable-handle"></i>
                  <i class="icon fa fa-flag"></i>
                  <span class="title">المجموعات النشطة</span>
               </div>
               <div class="block-body">
                  <div class="list-group no-shadow noMargin">
                     <div class="batch list-group-item">
                        <div class="hidden-xs progress onSide">
                           <div class="progress-bar" style="width: 20%;">20 %</div>
                        </div>
                        <div class="list-group-item-heading">
                           <a href="/batches/1" class="text-underlined">
                           General English - Level 1 #1</a>
                           <a href="/reports/batches.batchSummary/generate?batchId=1" class="btn btn-xs btn-link icon-only margin-before-10">
                           <i class="fa fa-file-text-o"></i>
                           </a>
                        </div>
                        <div class="list-group-item-text text-muted small">
                           General English - Level 1
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!--End widget block-->
         </div>
         <div ng-controller="widgets.finances-totals-chart" data-name="finances-totals-chart" id="widget-finances-totals-chart" class="grid-cell dashboard-widget size-50 ng-scope">
            <!--Start widget block-->
            <div class="block style2 block-widget">
               <div class="block-title">
                  <i class="handle glyphicon glyphicon-move onSide ui-sortable-handle"></i>
                  <span class="title">ملخص الوارد والصادر لآخر 7 ايام</span>
               </div>
               <div class="block-body">
                  <div id="chartHolder">
                     <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                           <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                           <div class=""></div>
                        </div>
                     </div>
                     <canvas class="chart chart-line ng-isolate-scope chartjs-render-monitor" chart-data="data" chart-labels="labels" chart-options="options" chart-colors="['#4169b4']" chart-dataset-override="datasetOverride" style="display: block; width: 737px; height: 250px;" width="737" height="250">
                     </canvas>
                  </div>
               </div>
            </div>
            <!--End widget block-->
         </div>
         <div ng-controller="widgets.lectures-schedule" data-name="lectures-schedule" id="widget-lectures-schedule" class="grid-cell dashboard-widget size-100 ng-scope">
            <!--Start widget block-->
            <div class="block style2 block-widget">
               <div class="block-title">
                  <i class="handle glyphicon glyphicon-move onSide ui-sortable-handle"></i>
                  <i class="icon fa fa-calendar"></i>
                  <span class="title">جدول المحاضرات</span>
               </div>
               <div class="block-body">
                  <div class="row">
                     <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 column-bordered">
                        <div>
                           <div datetime-picker="pickerSetup" datetime-model="selectedDate" class="ng-isolate-scope">
                              <div class="bootstrap-datetimepicker-widget usetwentyfour">
                                 <ul class="list-unstyled">
                                    <li>
                                       <div class="datepicker">
                                          <div class="datepicker-days" style="">
                                             <table class="table-condensed">
                                                <thead>
                                                   <tr>
                                                      <th class="prev" data-action="previous"><span class="glyphicon glyphicon-chevron-right" title="Previous Month"></span></th>
                                                      <th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Month">April 2026</th>
                                                      <th class="next" data-action="next"><span class="glyphicon glyphicon-chevron-left" title="Next Month"></span></th>
                                                   </tr>
                                                   <tr>
                                                      <th class="dow">Su</th>
                                                      <th class="dow">Mo</th>
                                                      <th class="dow">Tu</th>
                                                      <th class="dow">We</th>
                                                      <th class="dow">Th</th>
                                                      <th class="dow">Fr</th>
                                                      <th class="dow">Sa</th>
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                   <tr>
                                                      <td data-action="selectDay" data-day="03/29/2026" class="day old weekend">29</td>
                                                      <td data-action="selectDay" data-day="03/30/2026" class="day old">30</td>
                                                      <td data-action="selectDay" data-day="03/31/2026" class="day old">31</td>
                                                      <td data-action="selectDay" data-day="04/01/2026" class="day">1</td>
                                                      <td data-action="selectDay" data-day="04/02/2026" class="day">2</td>
                                                      <td data-action="selectDay" data-day="04/03/2026" class="day">3</td>
                                                      <td data-action="selectDay" data-day="04/04/2026" class="day weekend">4</td>
                                                   </tr>
                                                   <tr>
                                                      <td data-action="selectDay" data-day="04/05/2026" class="day weekend">5</td>
                                                      <td data-action="selectDay" data-day="04/06/2026" class="day">6</td>
                                                      <td data-action="selectDay" data-day="04/07/2026" class="day">7</td>
                                                      <td data-action="selectDay" data-day="04/08/2026" class="day">8</td>
                                                      <td data-action="selectDay" data-day="04/09/2026" class="day">9</td>
                                                      <td data-action="selectDay" data-day="04/10/2026" class="day">10</td>
                                                      <td data-action="selectDay" data-day="04/11/2026" class="day weekend">11</td>
                                                   </tr>
                                                   <tr>
                                                      <td data-action="selectDay" data-day="04/12/2026" class="day weekend">12</td>
                                                      <td data-action="selectDay" data-day="04/13/2026" class="day">13</td>
                                                      <td data-action="selectDay" data-day="04/14/2026" class="day">14</td>
                                                      <td data-action="selectDay" data-day="04/15/2026" class="day">15</td>
                                                      <td data-action="selectDay" data-day="04/16/2026" class="day">16</td>
                                                      <td data-action="selectDay" data-day="04/17/2026" class="day">17</td>
                                                      <td data-action="selectDay" data-day="04/18/2026" class="day weekend">18</td>
                                                   </tr>
                                                   <tr>
                                                      <td data-action="selectDay" data-day="04/19/2026" class="day weekend">19</td>
                                                      <td data-action="selectDay" data-day="04/20/2026" class="day">20</td>
                                                      <td data-action="selectDay" data-day="04/21/2026" class="day">21</td>
                                                      <td data-action="selectDay" data-day="04/22/2026" class="day">22</td>
                                                      <td data-action="selectDay" data-day="04/23/2026" class="day">23</td>
                                                      <td data-action="selectDay" data-day="04/24/2026" class="day">24</td>
                                                      <td data-action="selectDay" data-day="04/25/2026" class="day weekend">25</td>
                                                   </tr>
                                                   <tr>
                                                      <td data-action="selectDay" data-day="04/26/2026" class="day active today weekend">26</td>
                                                      <td data-action="selectDay" data-day="04/27/2026" class="day">27</td>
                                                      <td data-action="selectDay" data-day="04/28/2026" class="day">28</td>
                                                      <td data-action="selectDay" data-day="04/29/2026" class="day">29</td>
                                                      <td data-action="selectDay" data-day="04/30/2026" class="day">30</td>
                                                      <td data-action="selectDay" data-day="05/01/2026" class="day new">1</td>
                                                      <td data-action="selectDay" data-day="05/02/2026" class="day new weekend">2</td>
                                                   </tr>
                                                   <tr>
                                                      <td data-action="selectDay" data-day="05/03/2026" class="day new weekend">3</td>
                                                      <td data-action="selectDay" data-day="05/04/2026" class="day new">4</td>
                                                      <td data-action="selectDay" data-day="05/05/2026" class="day new">5</td>
                                                      <td data-action="selectDay" data-day="05/06/2026" class="day new">6</td>
                                                      <td data-action="selectDay" data-day="05/07/2026" class="day new">7</td>
                                                      <td data-action="selectDay" data-day="05/08/2026" class="day new">8</td>
                                                      <td data-action="selectDay" data-day="05/09/2026" class="day new weekend">9</td>
                                                   </tr>
                                                </tbody>
                                             </table>
                                          </div>
                                          <div class="datepicker-months" style="display: none;">
                                             <table class="table-condensed">
                                                <thead>
                                                   <tr>
                                                      <th class="prev" data-action="previous"><span class="glyphicon glyphicon-chevron-right" title="Previous Year"></span></th>
                                                      <th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Year">2026</th>
                                                      <th class="next" data-action="next"><span class="glyphicon glyphicon-chevron-left" title="Next Year"></span></th>
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                   <tr>
                                                      <td colspan="7"><span data-action="selectMonth" class="month">Jan</span><span data-action="selectMonth" class="month">Feb</span><span data-action="selectMonth" class="month">Mar</span><span data-action="selectMonth" class="month active">Apr</span><span data-action="selectMonth" class="month">May</span><span data-action="selectMonth" class="month">Jun</span><span data-action="selectMonth" class="month">Jul</span><span data-action="selectMonth" class="month">Aug</span><span data-action="selectMonth" class="month">Sep</span><span data-action="selectMonth" class="month">Oct</span><span data-action="selectMonth" class="month">Nov</span><span data-action="selectMonth" class="month">Dec</span></td>
                                                   </tr>
                                                </tbody>
                                             </table>
                                          </div>
                                          <div class="datepicker-years" style="display: none;">
                                             <table class="table-condensed">
                                                <thead>
                                                   <tr>
                                                      <th class="prev" data-action="previous"><span class="glyphicon glyphicon-chevron-right" title="Previous Decade"></span></th>
                                                      <th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Decade">2021-2032</th>
                                                      <th class="next" data-action="next"><span class="glyphicon glyphicon-chevron-left" title="Next Decade"></span></th>
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                   <tr>
                                                      <td colspan="7"><span data-action="selectYear" class="year">2021</span><span data-action="selectYear" class="year">2022</span><span data-action="selectYear" class="year">2023</span><span data-action="selectYear" class="year">2024</span><span data-action="selectYear" class="year">2025</span><span data-action="selectYear" class="year active">2026</span><span data-action="selectYear" class="year">2027</span><span data-action="selectYear" class="year">2028</span><span data-action="selectYear" class="year">2029</span><span data-action="selectYear" class="year">2030</span><span data-action="selectYear" class="year">2031</span><span data-action="selectYear" class="year">2032</span></td>
                                                   </tr>
                                                </tbody>
                                             </table>
                                          </div>
                                          <div class="datepicker-decades" style="display: none;">
                                             <table class="table-condensed">
                                                <thead>
                                                   <tr>
                                                      <th class="prev" data-action="previous"><span class="glyphicon glyphicon-chevron-right" title="Previous Century"></span></th>
                                                      <th class="picker-switch" data-action="pickerSwitch" colspan="5">2000-2107</th>
                                                      <th class="next" data-action="next"><span class="glyphicon glyphicon-chevron-left" title="Next Century"></span></th>
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                   <tr>
                                                      <td colspan="7"><span data-action="selectDecade" class="decade" data-selection="2005">2000 - 2011</span><span data-action="selectDecade" class="decade" data-selection="2017">2012 - 2023</span><span data-action="selectDecade" class="decade active" data-selection="2029">2024 - 2035</span><span data-action="selectDecade" class="decade" data-selection="2041">2036 - 2047</span><span data-action="selectDecade" class="decade" data-selection="2053">2048 - 2059</span><span data-action="selectDecade" class="decade" data-selection="2065">2060 - 2071</span><span data-action="selectDecade" class="decade" data-selection="2077">2072 - 2083</span><span data-action="selectDecade" class="decade" data-selection="2089">2084 - 2095</span><span data-action="selectDecade" class="decade" data-selection="2101">2096 - 2107</span><span></span><span></span><span></span></td>
                                                   </tr>
                                                </tbody>
                                             </table>
                                          </div>
                                       </div>
                                    </li>
                                    <li class="picker-switch accordion-toggle">
                                       <table class="table-condensed">
                                          <tbody>
                                             <tr></tr>
                                          </tbody>
                                       </table>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                        <!-- ngIf: lectures === null -->
                        <!-- ngIf: lectures !== null -->
                        <div ng-if="lectures !== null" class="ng-scope">
                           <!-- ngIf: lectures.length == 0 -->
                           <!-- ngIf: lectures.length > 0 -->
                           <div ng-if="lectures.length &gt; 0" class="ng-scope">
                              <div class="margin-bottom-10 flex flex-end">
                                 <div>
                                    <a href="/lectures" class="btn btn-xs btn-info">
                                    <i class="fa fa-calendar"></i>  عرض الجدول كامل                            </a>
                                    <a href="/lectures/all" class="btn btn-xs btn-default">
                                    <i class="fa fa-list"></i>  إدارة المحاضرات                            </a>
                                 </div>
                              </div>
                              <div class="table-responsive">
                                 <table class="table">
                                    <thead>
                                       <tr>
                                          <th width="35%">محاضرة</th>
                                          <th>الوقت</th>
                                          <th>الحالة</th>
                                          <th width="200px">المدرب</th>
                                          <th>القاعة</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <!-- ngRepeat: lecture in lectures -->
                                       <tr ng-repeat="lecture in lectures" class="ng-scope">
                                          <td>
                                             <div class="dropdown onSide">
                                                <button class="btn btn-xs btn-default dropdown-toggle" type="button" data-toggle="dropdown"> <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-left">
                                                   <!-- ngIf: !lecture.confirmed && !lecture.canceled -->
                                                   <li ng-if="!lecture.confirmed &amp;&amp; !lecture.canceled" class="bg-success ng-scope">
                                                      <a ng-click="lectureOptions.confirm(lecture)" tabindex="-1" href="">
                                                      <i class="fa fa-check"></i> تأكيد المحاضرة
                                                      </a>
                                                   </li>
                                                   <!-- end ngIf: !lecture.confirmed && !lecture.canceled -->
                                                   <!-- ngIf: !lecture.confirmed && !lecture.canceled -->
                                                   <li ng-if="!lecture.confirmed &amp;&amp; !lecture.canceled" class="bg-warning ng-scope">
                                                      <a ng-click="lectureOptions.cancel(lecture)" tabindex="-1" href="">
                                                      <i class="fa fa-remove"></i> إلغاء
                                                      </a>
                                                   </li>
                                                   <!-- end ngIf: !lecture.confirmed && !lecture.canceled -->
                                                   <!-- ngIf: !lecture.confirmed && !lecture.canceled -->
                                                   <li ng-if="!lecture.confirmed &amp;&amp; !lecture.canceled" class="ng-scope">
                                                      <a ng-click="lectureOptions.reschedule(lecture)" tabindex="-1" href="">
                                                      <i class="fa fa-calendar"></i> إعادة جدولة
                                                      </a>
                                                   </li>
                                                   <!-- end ngIf: !lecture.confirmed && !lecture.canceled -->
                                                   <li class="bg-danger">
                                                      <a ng-click="lectureOptions.delete(lecture)" tabindex="-1" href="">
                                                      <i class="fa fa-trash"></i> حذف
                                                      </a>
                                                   </li>
                                                </ul>
                                             </div>
                                             <a href="/batches/1/lectures#!/lectures/4" class="text-underlined ng-binding" target="_blank">
                                             General English - Level 1 #1 <b class="ng-binding">#4</b>
                                             </a>
                                          </td>
                                          <td>
                                             <span dir="ltr" class="ng-binding">10:00 AM</span>
                                          </td>
                                          <td class="ng-binding">
                                             <i class="fa fa-clock-o text-info"></i>
                                             غير مؤكدة
                                          </td>
                                          <td class="ng-binding">Ahmad Barakat</td>
                                          <td>
                                             <!-- ngIf: lecture.lab -->
                                             <div ng-if="lecture.lab" class="ng-binding ng-scope">Lab A - Main Bu ...</div>
                                             <!-- end ngIf: lecture.lab -->
                                             <!-- ngIf: lecture.virtual -->
                                          </td>
                                       </tr>
                                       <!-- end ngRepeat: lecture in lectures -->
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                           <!-- end ngIf: lectures.length > 0 -->
                        </div>
                        <!-- end ngIf: lectures !== null -->
                     </div>
                  </div>
               </div>
            </div>
            <!--End widget block-->
         </div>
      </div>
      <div id="welcomeModal" class="modal fade" tabindex="-1" role="dialog">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-body">
                  <div class="text-center padding-50">
                     <img src="">
                  </div>
                  <div class="text-center">
                     <h4>أهلا بك ...</h4>
                     <p style="text-align: justify; padding: 15px">أهلاً بك على نظام تمكين، نتمني لك إستخدام سلس وتعود سريع على النظام. كل التوفيق
                        لك في عملك، ورجاءاً لا تتردد في التواصل معنا بأي إستفسارات أو تعليقات في أي وقت.
                        ننصح بتصفح ملفات المساعدة أولاً لتتعرف على النظام وطريقة عمله أكثر.
                     </p>
                  </div>
                  <div class="text-center padding-20">
                     <a href="/help" class="btn btn-primary">
                     <span class="glyphicon glyphicon-question-sign"></span>
                     دليل الإستخدام                        </a>
                     <a href="#" target="_blank" class="btn btn-primary">
                     <i class="fa fa-play"></i>
                     شرح فيديو                        </a>
                     <button type="button" class="btn btn-default" data-dismiss="modal">
                     <i class="fa fa-remove"></i>
                     إغلاق
                     </button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script type="text/ng-template" id="batchPicker.html">
         <div class="modal-header">
         <button ng-click="$close()" class="close">
         <span>&times;</span>
         </button>
         </div>
         
         <div class="modal-body">
         <batch-picker setup="pickerOptions"></batch-picker>
         </div>                
      </script>
      <script type="text/ng-template" id="changeLog/itemPopup.html">
         <div class="modal-header text-center">
         <h4 class="modal-title">
         إعلان هام
         </h4>
         </div>
         
         <div class="modal-body text-center">
         
         <div class="margin-bottom-20" ng-cloak>
         <img ng-if="item.image" ng-src="{{ item.image }}" class="img-fluid"
         style="max-width: 100%"/>
         
         <div ng-if="! item.image">
         <i class="fa fa-exclamation-circle fa-5x text-warning"></i>
         </div>
         </div>
         
         <h3 ng-class="{'text-danger': item.highlighted, 'text-primary': ! item.highlighted}">
         {{ item.title }}
         </h3>
         
         <div class="text-nl2br">
         {{ item.desc }}
         </div>
         
         </div>
         
         <div class="modal-footer">
         <div class="d-flex flex-space-between flex-align-items-center">
         <div>
         الإصدارة: 
         <b>{{ item.version }}</b>
         </div>
         
         <div>
         <button ng-click="continue()" ng-disabled="! allowContinue.allow" type="button" class="btn btn-primary">
         <i class="fa fa-check-circle"></i> متابعة
         
         <span ng-if="! allowContinue.allow">(<b>{{ allowContinue.count }}</b>)</span>
         </button>
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
