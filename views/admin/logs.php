<?php
// إعداد المتغيرات
$pageTitle = 'سجل العمليات';
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

                                            <li class="breadcrumb-item">سجل العمليات Logs</li>
                                    </ul>
                    </div>

        <div class="d-flex justify-content-center">
            <div>
                
                            </div>
        </div>
    </div>
        <div class="row">
            <div class="col-sm-12 col-md-3">
                <form action="/admin/logs" method="GET" class="block style2">

    	<div class="block-body">
            
                            <div class="form-group">
                    <label>الفرع</label>
                    
                    <select class="form-control" name="branch"><option value="1" selected="selected">Master Branch</option></select>
                </div>

            
            
            <div class="form-group">
                <label>التاريخ (من - إلى)</label>
                <div class="flex flex-margin-items-10">
                    <div class="flex-grow-1">
                        <input type="date" name="date_from" class="form-control" value="2026-04-27">
                    </div>
                    <div class="flex-grow-1">
                        <input type="date" name="date_to" class="form-control" value="2026-04-27">
                    </div>
                </div>
            </div>

            
            <div class="form-group">
                
                <label>المستخدم</label>
                <select class="form-control" name="user"><option value="" selected="selected">جميع المستخدمين</option><option value="1">Super Administrator</option></select>
            </div>

            <div class="form-group">
                <label>ترتيب النتائج</label>
                <select class="form-control" name="order"><option value="desc" selected="selected">الأحدث اولاً</option><option value="asc">الأقدم اولاً</option></select>
            </div>

            <div class="form-group margin-bottom-0">
                <label>عدد النتائج لكل صفحة</label>
                <select class="form-control" name="items_per_page"><option value="50" selected="selected">50</option><option value="150">150</option><option value="200">200</option></select>
            </div>
    	</div>

    	<div class="block-footer">
            <button class="btn btn-primary" type="submit">
                <i class="fa fa-search"></i> بحث
            </button>
    	</div>
    </form>
                <div class="block style2">
                    <div class="block-body" style="padding: 30px">
                        <h4>
                            تريد تتبع وتسجيل معلومات اكثر؟
                        </h4>

                        <p class="text-muted margin-top-15">
                            هل هناك معلومات محددة تريد تتبعها وتسجيل العمليات الخاصة بها؟ يمكنك طلب ذلك وسنقوم بإضافته!
                        </p>

                        <a href="/help/tickets/create/form?title=Request for more information logging&amp;body=Request for more information logging" class="btn btn-sm btn-default" target="_blank">
                            <i class="fa fa-envelope-o"></i>
                            طلب تتبع معلومات
                        </a>
                    </div>
                </div>

            </div>

            <div class="col-sm-12 col-md-9">
                <div class="block style2">
            <div class="block-title">
                <span class="title">العمليات</span>
                <span class="badge">48</span>
            </div>

            <div class="block-body">
                <div class="table-responsive">
                    <table class="table table-busy">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th style="width: 180px">المستخدم</th>
                            <th style="width: 200px">الوقت</th>
                            <th style="width: 250px">الحدث Action</th>
                            <th>البيانات المتعلقة بالحدث</th>
                        </tr>
                        </thead>
                        <tbody>
                                                    <tr>
                                <td class="">
                                    48
                                </td>

                                <td>
                                    <b>Super Administrator</b>

                                                                            <div class="small text-muted">
                                            <i class="fa fa-map-marker"></i>
                                            <a href="https://whatismyipaddress.com/ip/156.202.115.214" target="_blank">
                                                156.202.115.214
                                            </a>
                                        </div>
                                                                    </td>

                                <td>
                                    <span dir="ltr">27/04 2026, 06:59 PM</span>
                                    <div class="small text-muted">منذ ساعة 50 دقيقة</div>
                                </td>

                                <td>
                                    
                                    User logged in
                                    <div class="extra-small text-muted hidden">
                                        user_logged_in:App\User:1
                                    </div>
                                </td>

                                <td>
                                                                            <!--
                                        <a href="/admin/logs?model=App%5CUser&modelId=1"
                                           data-toggle="tooltip" title="View other actions associated with the same information" class="btn btn-xs btn-default onSide">
                                            <i class="fa fa-search"></i> Other actions
                                        </a>
                                        -->

                                        
                                    
                                                                            --
                                                                    </td>

                            </tr>
                                                    <tr>
                                <td class="">
                                    47
                                </td>

                                <td>
                                    <b>Super Administrator</b>

                                                                            <div class="small text-muted">
                                            <i class="fa fa-map-marker"></i>
                                            <a href="https://whatismyipaddress.com/ip/156.202.20.246" target="_blank">
                                                156.202.20.246
                                            </a>
                                        </div>
                                                                    </td>

                                <td>
                                    <span dir="ltr">26/04 2026, 11:10 AM</span>
                                    <div class="small text-muted">منذ يوم 9 ساعات</div>
                                </td>

                                <td>
                                    
                                    User logged in
                                    <div class="extra-small text-muted hidden">
                                        user_logged_in:App\User:1
                                    </div>
                                </td>

                                <td>
                                                                            <!--
                                        <a href="/admin/logs?model=App%5CUser&modelId=1"
                                           data-toggle="tooltip" title="View other actions associated with the same information" class="btn btn-xs btn-default onSide">
                                            <i class="fa fa-search"></i> Other actions
                                        </a>
                                        -->

                                        
                                    
                                                                            --
                                                                    </td>

                            </tr>
                                                    <tr>
                                <td class="">
                                    46
                                </td>

                                <td>
                                    <b>Super Administrator</b>

                                                                            <div class="small text-muted">
                                            <i class="fa fa-map-marker"></i>
                                            <a href="https://whatismyipaddress.com/ip/156.202.20.246" target="_blank">
                                                156.202.20.246
                                            </a>
                                        </div>
                                                                    </td>

                                <td>
                                    <span dir="ltr">23/04 2026, 05:42 PM</span>
                                    <div class="small text-muted">منذ 4 أيام 3 ساعات</div>
                                </td>

                                <td>
                                    
                                    User logged in
                                    <div class="extra-small text-muted hidden">
                                        user_logged_in:App\User:1
                                    </div>
                                </td>

                                <td>
                                                                            <!--
                                        <a href="/admin/logs?model=App%5CUser&modelId=1"
                                           data-toggle="tooltip" title="View other actions associated with the same information" class="btn btn-xs btn-default onSide">
                                            <i class="fa fa-search"></i> Other actions
                                        </a>
                                        -->

                                        
                                    
                                                                            --
                                                                    </td>

                            </tr>
                                                    <tr>
                                <td class="">
                                    45
                                </td>

                                <td>
                                    <b>Super Administrator</b>

                                                                            <div class="small text-muted">
                                            <i class="fa fa-map-marker"></i>
                                            <a href="https://whatismyipaddress.com/ip/156.202.20.246" target="_blank">
                                                156.202.20.246
                                            </a>
                                        </div>
                                                                    </td>

                                <td>
                                    <span dir="ltr">23/04 2026, 05:42 PM</span>
                                    <div class="small text-muted">منذ 4 أيام 3 ساعات</div>
                                </td>

                                <td>
                                    
                                    User logged out
                                    <div class="extra-small text-muted hidden">
                                        user_logged_out:App\User:1
                                    </div>
                                </td>

                                <td>
                                                                            <!--
                                        <a href="/admin/logs?model=App%5CUser&modelId=1"
                                           data-toggle="tooltip" title="View other actions associated with the same information" class="btn btn-xs btn-default onSide">
                                            <i class="fa fa-search"></i> Other actions
                                        </a>
                                        -->

                                        
                                    
                                                                            --
                                                                    </td>

                            </tr>
                                                    <tr>
                                <td class="">
                                    44
                                </td>

                                <td>
                                    <b>Super Administrator</b>

                                                                            <div class="small text-muted">
                                            <i class="fa fa-map-marker"></i>
                                            <a href="https://whatismyipaddress.com/ip/156.202.20.246" target="_blank">
                                                156.202.20.246
                                            </a>
                                        </div>
                                                                    </td>

                                <td>
                                    <span dir="ltr">23/04 2026, 05:30 PM</span>
                                    <div class="small text-muted">منذ 4 أيام 3 ساعات</div>
                                </td>

                                <td>
                                    
                                    User logged in
                                    <div class="extra-small text-muted hidden">
                                        user_logged_in:App\User:1
                                    </div>
                                </td>

                                <td>
                                                                            <!--
                                        <a href="/admin/logs?model=App%5CUser&modelId=1"
                                           data-toggle="tooltip" title="View other actions associated with the same information" class="btn btn-xs btn-default onSide">
                                            <i class="fa fa-search"></i> Other actions
                                        </a>
                                        -->

                                        
                                    
                                                                            --
                                                                    </td>

                            </tr>
                                                    <tr>
                                <td class="">
                                    43
                                </td>

                                <td>
                                    <b>Super Administrator</b>

                                                                            <div class="small text-muted">
                                            <i class="fa fa-map-marker"></i>
                                            <a href="https://whatismyipaddress.com/ip/156.202.20.246" target="_blank">
                                                156.202.20.246
                                            </a>
                                        </div>
                                                                    </td>

                                <td>
                                    <span dir="ltr">23/04 2026, 11:27 AM</span>
                                    <div class="small text-muted">منذ 4 أيام 9 ساعات</div>
                                </td>

                                <td>
                                    
                                    User logged in
                                    <div class="extra-small text-muted hidden">
                                        user_logged_in:App\User:1
                                    </div>
                                </td>

                                <td>
                                                                            <!--
                                        <a href="/admin/logs?model=App%5CUser&modelId=1"
                                           data-toggle="tooltip" title="View other actions associated with the same information" class="btn btn-xs btn-default onSide">
                                            <i class="fa fa-search"></i> Other actions
                                        </a>
                                        -->

                                        
                                    
                                                                            --
                                                                    </td>

                            </tr>
                                                    <tr>
                                <td class="">
                                    42
                                </td>

                                <td>
                                    <b>Super Administrator</b>

                                                                            <div class="small text-muted">
                                            <i class="fa fa-map-marker"></i>
                                            <a href="https://whatismyipaddress.com/ip/156.202.25.7" target="_blank">
                                                156.202.25.7
                                            </a>
                                        </div>
                                                                    </td>

                                <td>
                                    <span dir="ltr">22/04 2026, 10:44 PM</span>
                                    <div class="small text-muted">منذ 4 أيام 22 ساعة</div>
                                </td>

                                <td>
                                    
                                    User logged in
                                    <div class="extra-small text-muted hidden">
                                        user_logged_in:App\User:1
                                    </div>
                                </td>

                                <td>
                                                                            <!--
                                        <a href="/admin/logs?model=App%5CUser&modelId=1"
                                           data-toggle="tooltip" title="View other actions associated with the same information" class="btn btn-xs btn-default onSide">
                                            <i class="fa fa-search"></i> Other actions
                                        </a>
                                        -->

                                        
                                    
                                                                            --
                                                                    </td>

                            </tr>
                                                    <tr>
                                <td class="">
                                    41
                                </td>

                                <td>
                                    <b>Super Administrator</b>

                                                                            <div class="small text-muted">
                                            <i class="fa fa-map-marker"></i>
                                            <a href="https://whatismyipaddress.com/ip/156.202.20.246" target="_blank">
                                                156.202.20.246
                                            </a>
                                        </div>
                                                                    </td>

                                <td>
                                    <span dir="ltr">22/04 2026, 06:11 PM</span>
                                    <div class="small text-muted">منذ 5 أيام ساعتين</div>
                                </td>

                                <td>
                                    
                                    User logged out
                                    <div class="extra-small text-muted hidden">
                                        user_logged_out:App\User:1
                                    </div>
                                </td>

                                <td>
                                                                            <!--
                                        <a href="/admin/logs?model=App%5CUser&modelId=1"
                                           data-toggle="tooltip" title="View other actions associated with the same information" class="btn btn-xs btn-default onSide">
                                            <i class="fa fa-search"></i> Other actions
                                        </a>
                                        -->

                                        
                                    
                                                                            --
                                                                    </td>

                            </tr>
                                                    <tr>
                                <td class="">
                                    40
                                </td>

                                <td>
                                    <b>Super Administrator</b>

                                                                            <div class="small text-muted">
                                            <i class="fa fa-map-marker"></i>
                                            <a href="https://whatismyipaddress.com/ip/156.202.25.7" target="_blank">
                                                156.202.25.7
                                            </a>
                                        </div>
                                                                    </td>

                                <td>
                                    <span dir="ltr">22/04 2026, 05:10 PM</span>
                                    <div class="small text-muted">منذ 5 أيام 3 ساعات</div>
                                </td>

                                <td>
                                    
                                    User logged in
                                    <div class="extra-small text-muted hidden">
                                        user_logged_in:App\User:1
                                    </div>
                                </td>

                                <td>
                                                                            <!--
                                        <a href="/admin/logs?model=App%5CUser&modelId=1"
                                           data-toggle="tooltip" title="View other actions associated with the same information" class="btn btn-xs btn-default onSide">
                                            <i class="fa fa-search"></i> Other actions
                                        </a>
                                        -->

                                        
                                    
                                                                            --
                                                                    </td>

                            </tr>
                                                    <tr>
                                <td class="">
                                    39
                                </td>

                                <td>
                                    <b>Super Administrator</b>

                                                                            <div class="small text-muted">
                                            <i class="fa fa-map-marker"></i>
                                            <a href="https://whatismyipaddress.com/ip/156.202.20.246" target="_blank">
                                                156.202.20.246
                                            </a>
                                        </div>
                                                                    </td>

                                <td>
                                    <span dir="ltr">22/04 2026, 04:53 PM</span>
                                    <div class="small text-muted">منذ 5 أيام 3 ساعات</div>
                                </td>

                                <td>
                                    
                                    User logged in
                                    <div class="extra-small text-muted hidden">
                                        user_logged_in:App\User:1
                                    </div>
                                </td>

                                <td>
                                                                            <!--
                                        <a href="/admin/logs?model=App%5CUser&modelId=1"
                                           data-toggle="tooltip" title="View other actions associated with the same information" class="btn btn-xs btn-default onSide">
                                            <i class="fa fa-search"></i> Other actions
                                        </a>
                                        -->

                                        
                                    
                                                                            --
                                                                    </td>

                            </tr>
                                                    <tr>
                                <td class="">
                                    38
                                </td>

                                <td>
                                    <b>Super Administrator</b>

                                                                            <div class="small text-muted">
                                            <i class="fa fa-map-marker"></i>
                                            <a href="https://whatismyipaddress.com/ip/156.202.20.246" target="_blank">
                                                156.202.20.246
                                            </a>
                                        </div>
                                                                    </td>

                                <td>
                                    <span dir="ltr">22/04 2026, 11:19 AM</span>
                                    <div class="small text-muted">منذ 5 أيام 9 ساعات</div>
                                </td>

                                <td>
                                    
                                    User logged in
                                    <div class="extra-small text-muted hidden">
                                        user_logged_in:App\User:1
                                    </div>
                                </td>

                                <td>
                                                                            <!--
                                        <a href="/admin/logs?model=App%5CUser&modelId=1"
                                           data-toggle="tooltip" title="View other actions associated with the same information" class="btn btn-xs btn-default onSide">
                                            <i class="fa fa-search"></i> Other actions
                                        </a>
                                        -->

                                        
                                    
                                                                            --
                                                                    </td>

                            </tr>
                                                    <tr>
                                <td class="">
                                    37
                                </td>

                                <td>
                                    <b>Super Administrator</b>

                                                                            <div class="small text-muted">
                                            <i class="fa fa-map-marker"></i>
                                            <a href="https://whatismyipaddress.com/ip/156.202.120.235" target="_blank">
                                                156.202.120.235
                                            </a>
                                        </div>
                                                                    </td>

                                <td>
                                    <span dir="ltr">20/04 2026, 11:08 PM</span>
                                    <div class="small text-muted">منذ 6 أيام 21 ساعة</div>
                                </td>

                                <td>
                                    
                                    User logged in
                                    <div class="extra-small text-muted hidden">
                                        user_logged_in:App\User:1
                                    </div>
                                </td>

                                <td>
                                                                            <!--
                                        <a href="/admin/logs?model=App%5CUser&modelId=1"
                                           data-toggle="tooltip" title="View other actions associated with the same information" class="btn btn-xs btn-default onSide">
                                            <i class="fa fa-search"></i> Other actions
                                        </a>
                                        -->

                                        
                                    
                                                                            --
                                                                    </td>

                            </tr>
                                                    <tr>
                                <td class="">
                                    36
                                </td>

                                <td>
                                    <b>Super Administrator</b>

                                                                            <div class="small text-muted">
                                            <i class="fa fa-map-marker"></i>
                                            <a href="https://whatismyipaddress.com/ip/156.202.20.246" target="_blank">
                                                156.202.20.246
                                            </a>
                                        </div>
                                                                    </td>

                                <td>
                                    <span dir="ltr">20/04 2026, 07:48 PM</span>
                                    <div class="small text-muted">منذ أسبوع ساعة</div>
                                </td>

                                <td>
                                    
                                    User logged in
                                    <div class="extra-small text-muted hidden">
                                        user_logged_in:App\User:1
                                    </div>
                                </td>

                                <td>
                                                                            <!--
                                        <a href="/admin/logs?model=App%5CUser&modelId=1"
                                           data-toggle="tooltip" title="View other actions associated with the same information" class="btn btn-xs btn-default onSide">
                                            <i class="fa fa-search"></i> Other actions
                                        </a>
                                        -->

                                        
                                    
                                                                            --
                                                                    </td>

                            </tr>
                                                    <tr>
                                <td class="">
                                    35
                                </td>

                                <td>
                                    <b>Super Administrator</b>

                                                                            <div class="small text-muted">
                                            <i class="fa fa-map-marker"></i>
                                            <a href="https://whatismyipaddress.com/ip/156.202.20.246" target="_blank">
                                                156.202.20.246
                                            </a>
                                        </div>
                                                                    </td>

                                <td>
                                    <span dir="ltr">20/04 2026, 05:58 PM</span>
                                    <div class="small text-muted">منذ أسبوع ساعتين</div>
                                </td>

                                <td>
                                    
                                    User logged in
                                    <div class="extra-small text-muted hidden">
                                        user_logged_in:App\User:1
                                    </div>
                                </td>

                                <td>
                                                                            <!--
                                        <a href="/admin/logs?model=App%5CUser&modelId=1"
                                           data-toggle="tooltip" title="View other actions associated with the same information" class="btn btn-xs btn-default onSide">
                                            <i class="fa fa-search"></i> Other actions
                                        </a>
                                        -->

                                        
                                    
                                                                            --
                                                                    </td>

                            </tr>
                                                    <tr>
                                <td class="">
                                    34
                                </td>

                                <td>
                                    <b>Super Administrator</b>

                                                                            <div class="small text-muted">
                                            <i class="fa fa-map-marker"></i>
                                            <a href="https://whatismyipaddress.com/ip/156.202.20.246" target="_blank">
                                                156.202.20.246
                                            </a>
                                        </div>
                                                                    </td>

                                <td>
                                    <span dir="ltr">20/04 2026, 05:28 PM</span>
                                    <div class="small text-muted">منذ أسبوع 3 ساعات</div>
                                </td>

                                <td>
                                    
                                    User logged in
                                    <div class="extra-small text-muted hidden">
                                        user_logged_in:App\User:1
                                    </div>
                                </td>

                                <td>
                                                                            <!--
                                        <a href="/admin/logs?model=App%5CUser&modelId=1"
                                           data-toggle="tooltip" title="View other actions associated with the same information" class="btn btn-xs btn-default onSide">
                                            <i class="fa fa-search"></i> Other actions
                                        </a>
                                        -->

                                        
                                    
                                                                            --
                                                                    </td>

                            </tr>
                                                    <tr>
                                <td class="">
                                    33
                                </td>

                                <td>
                                    <b>Super Administrator</b>

                                                                            <div class="small text-muted">
                                            <i class="fa fa-map-marker"></i>
                                            <a href="https://whatismyipaddress.com/ip/156.202.42.79" target="_blank">
                                                156.202.42.79
                                            </a>
                                        </div>
                                                                    </td>

                                <td>
                                    <span dir="ltr">20/04 2026, 05:02 PM</span>
                                    <div class="small text-muted">منذ أسبوع 3 ساعات</div>
                                </td>

                                <td>
                                    
                                    User logged in
                                    <div class="extra-small text-muted hidden">
                                        user_logged_in:App\User:1
                                    </div>
                                </td>

                                <td>
                                                                            <!--
                                        <a href="/admin/logs?model=App%5CUser&modelId=1"
                                           data-toggle="tooltip" title="View other actions associated with the same information" class="btn btn-xs btn-default onSide">
                                            <i class="fa fa-search"></i> Other actions
                                        </a>
                                        -->

                                        
                                    
                                                                            --
                                                                    </td>

                            </tr>
                                                    <tr>
                                <td class="bg-success">
                                    30
                                </td>

                                <td>
                                    <b>[System]</b>

                                                                    </td>

                                <td>
                                    <span dir="ltr">20/04 2026, 05:02 PM</span>
                                    <div class="small text-muted">منذ أسبوع 3 ساعات</div>
                                </td>

                                <td>
                                                                            <i class="fa fa-plus-square text-success"></i>
                                    
                                    Created a new <b>lecture</b>
                                    <div class="extra-small text-muted hidden">
                                        create:App\Lecture:8
                                    </div>
                                </td>

                                <td>
                                                                            <!--
                                        <a href="/admin/logs?model=App%5CLecture&modelId=8"
                                           data-toggle="tooltip" title="View other actions associated with the same information" class="btn btn-xs btn-default onSide">
                                            <i class="fa fa-search"></i> Other actions
                                        </a>
                                        -->

                                                                                    <div class="margin-bottom-15">
                                                                                                    <a href="/batches/1/lectures#!/lectures/8" target="_blank" class="text-underlined">
                                                        Untitled
                                                    </a>

                                                                                            </div>
                                        
                                    
                                                                            <div>
                                            <ul class="list-compact margin-bottom-0">
                                                                                                    <li style="word-break: break-all">
                                                        <b>Batch</b>: General English - Level 1 #1
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Number</b>: # 0
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Starts</b>: 06/05 2026, 10:00 AM
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Ends</b>: 06/05 2026, 10:00 AM
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Instructor</b>: Ahmad Barakat
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Lab</b>: [online]
                                                    </li>
                                                                                            </ul>
                                        </div>

                                                                    </td>

                            </tr>
                                                    <tr>
                                <td class="bg-success">
                                    31
                                </td>

                                <td>
                                    <b>[System]</b>

                                                                    </td>

                                <td>
                                    <span dir="ltr">20/04 2026, 05:02 PM</span>
                                    <div class="small text-muted">منذ أسبوع 3 ساعات</div>
                                </td>

                                <td>
                                                                            <i class="fa fa-plus-square text-success"></i>
                                    
                                    Created a new <b>lecture</b>
                                    <div class="extra-small text-muted hidden">
                                        create:App\Lecture:9
                                    </div>
                                </td>

                                <td>
                                                                            <!--
                                        <a href="/admin/logs?model=App%5CLecture&modelId=9"
                                           data-toggle="tooltip" title="View other actions associated with the same information" class="btn btn-xs btn-default onSide">
                                            <i class="fa fa-search"></i> Other actions
                                        </a>
                                        -->

                                                                                    <div class="margin-bottom-15">
                                                                                                    <a href="/batches/1/lectures#!/lectures/9" target="_blank" class="text-underlined">
                                                        Untitled
                                                    </a>

                                                                                            </div>
                                        
                                    
                                                                            <div>
                                            <ul class="list-compact margin-bottom-0">
                                                                                                    <li style="word-break: break-all">
                                                        <b>Batch</b>: General English - Level 1 #1
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Number</b>: # 0
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Starts</b>: 10/05 2026, 10:00 AM
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Ends</b>: 10/05 2026, 10:00 AM
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Instructor</b>: Ahmad Barakat
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Lab</b>: [online]
                                                    </li>
                                                                                            </ul>
                                        </div>

                                                                    </td>

                            </tr>
                                                    <tr>
                                <td class="bg-success">
                                    32
                                </td>

                                <td>
                                    <b>[System]</b>

                                                                    </td>

                                <td>
                                    <span dir="ltr">20/04 2026, 05:02 PM</span>
                                    <div class="small text-muted">منذ أسبوع 3 ساعات</div>
                                </td>

                                <td>
                                                                            <i class="fa fa-plus-square text-success"></i>
                                    
                                    Created a new <b>lecture</b>
                                    <div class="extra-small text-muted hidden">
                                        create:App\Lecture:10
                                    </div>
                                </td>

                                <td>
                                                                            <!--
                                        <a href="/admin/logs?model=App%5CLecture&modelId=10"
                                           data-toggle="tooltip" title="View other actions associated with the same information" class="btn btn-xs btn-default onSide">
                                            <i class="fa fa-search"></i> Other actions
                                        </a>
                                        -->

                                                                                    <div class="margin-bottom-15">
                                                                                                    <a href="/batches/1/lectures#!/lectures/10" target="_blank" class="text-underlined">
                                                        Untitled
                                                    </a>

                                                                                            </div>
                                        
                                    
                                                                            <div>
                                            <ul class="list-compact margin-bottom-0">
                                                                                                    <li style="word-break: break-all">
                                                        <b>Batch</b>: General English - Level 1 #1
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Number</b>: # 0
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Starts</b>: 12/05 2026, 10:00 AM
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Ends</b>: 12/05 2026, 10:00 AM
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Instructor</b>: Ahmad Barakat
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Lab</b>: [online]
                                                    </li>
                                                                                            </ul>
                                        </div>

                                                                    </td>

                            </tr>
                                                    <tr>
                                <td class="bg-success">
                                    12
                                </td>

                                <td>
                                    <b>[System]</b>

                                                                    </td>

                                <td>
                                    <span dir="ltr">20/04 2026, 05:02 PM</span>
                                    <div class="small text-muted">منذ أسبوع 3 ساعات</div>
                                </td>

                                <td>
                                                                            <i class="fa fa-plus-square text-success"></i>
                                    
                                    Created a new <b>client</b>
                                    <div class="extra-small text-muted hidden">
                                        create:App\Client:1
                                    </div>
                                </td>

                                <td>
                                                                            <!--
                                        <a href="/admin/logs?model=App%5CClient&modelId=1"
                                           data-toggle="tooltip" title="View other actions associated with the same information" class="btn btn-xs btn-default onSide">
                                            <i class="fa fa-search"></i> Other actions
                                        </a>
                                        -->

                                                                                    <div class="margin-bottom-15">
                                                                                                    <a href="/clients/1" target="_blank" class="text-underlined">
                                                        Omar hadid
                                                    </a>

                                                                                            </div>
                                        
                                    
                                                                            <div>
                                            <ul class="list-compact margin-bottom-0">
                                                                                                    <li style="word-break: break-all">
                                                        <b>Name</b>: Omar hadid
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>National id</b>: --
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Phone</b>: 0500000001
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Email</b>: omar.hadid@example.com
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Origin</b>: Generic
                                                    </li>
                                                                                            </ul>
                                        </div>

                                                                    </td>

                            </tr>
                                                    <tr>
                                <td class="bg-success">
                                    13
                                </td>

                                <td>
                                    <b>[System]</b>

                                                                    </td>

                                <td>
                                    <span dir="ltr">20/04 2026, 05:02 PM</span>
                                    <div class="small text-muted">منذ أسبوع 3 ساعات</div>
                                </td>

                                <td>
                                                                            <i class="fa fa-plus-square text-success"></i>
                                    
                                    Created a new <b>client</b>
                                    <div class="extra-small text-muted hidden">
                                        create:App\Client:2
                                    </div>
                                </td>

                                <td>
                                                                            <!--
                                        <a href="/admin/logs?model=App%5CClient&modelId=2"
                                           data-toggle="tooltip" title="View other actions associated with the same information" class="btn btn-xs btn-default onSide">
                                            <i class="fa fa-search"></i> Other actions
                                        </a>
                                        -->

                                                                                    <div class="margin-bottom-15">
                                                                                                    <a href="/clients/2" target="_blank" class="text-underlined">
                                                        Layla khoury
                                                    </a>

                                                                                            </div>
                                        
                                    
                                                                            <div>
                                            <ul class="list-compact margin-bottom-0">
                                                                                                    <li style="word-break: break-all">
                                                        <b>Name</b>: Layla khoury
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>National id</b>: --
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Phone</b>: 0500000002
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Email</b>: layla.khoury@example.com
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Origin</b>: Generic
                                                    </li>
                                                                                            </ul>
                                        </div>

                                                                    </td>

                            </tr>
                                                    <tr>
                                <td class="bg-success">
                                    14
                                </td>

                                <td>
                                    <b>[System]</b>

                                                                    </td>

                                <td>
                                    <span dir="ltr">20/04 2026, 05:02 PM</span>
                                    <div class="small text-muted">منذ أسبوع 3 ساعات</div>
                                </td>

                                <td>
                                                                            <i class="fa fa-plus-square text-success"></i>
                                    
                                    Created a new <b>client</b>
                                    <div class="extra-small text-muted hidden">
                                        create:App\Client:3
                                    </div>
                                </td>

                                <td>
                                                                            <!--
                                        <a href="/admin/logs?model=App%5CClient&modelId=3"
                                           data-toggle="tooltip" title="View other actions associated with the same information" class="btn btn-xs btn-default onSide">
                                            <i class="fa fa-search"></i> Other actions
                                        </a>
                                        -->

                                                                                    <div class="margin-bottom-15">
                                                                                                    <a href="/clients/3" target="_blank" class="text-underlined">
                                                        Youssef bazzi
                                                    </a>

                                                                                            </div>
                                        
                                    
                                                                            <div>
                                            <ul class="list-compact margin-bottom-0">
                                                                                                    <li style="word-break: break-all">
                                                        <b>Name</b>: Youssef bazzi
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>National id</b>: --
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Phone</b>: 0500000003
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Email</b>: youssef.bazzi@example.com
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Origin</b>: Generic
                                                    </li>
                                                                                            </ul>
                                        </div>

                                                                    </td>

                            </tr>
                                                    <tr>
                                <td class="bg-success">
                                    15
                                </td>

                                <td>
                                    <b>[System]</b>

                                                                    </td>

                                <td>
                                    <span dir="ltr">20/04 2026, 05:02 PM</span>
                                    <div class="small text-muted">منذ أسبوع 3 ساعات</div>
                                </td>

                                <td>
                                                                            <i class="fa fa-plus-square text-success"></i>
                                    
                                    Created a new <b>client</b>
                                    <div class="extra-small text-muted hidden">
                                        create:App\Client:4
                                    </div>
                                </td>

                                <td>
                                                                            <!--
                                        <a href="/admin/logs?model=App%5CClient&modelId=4"
                                           data-toggle="tooltip" title="View other actions associated with the same information" class="btn btn-xs btn-default onSide">
                                            <i class="fa fa-search"></i> Other actions
                                        </a>
                                        -->

                                                                                    <div class="margin-bottom-15">
                                                                                                    <a href="/clients/4" target="_blank" class="text-underlined">
                                                        Nora sabbagh
                                                    </a>

                                                                                            </div>
                                        
                                    
                                                                            <div>
                                            <ul class="list-compact margin-bottom-0">
                                                                                                    <li style="word-break: break-all">
                                                        <b>Name</b>: Nora sabbagh
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>National id</b>: --
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Phone</b>: 0500000004
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Email</b>: nora.sabbagh@example.com
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Origin</b>: Generic
                                                    </li>
                                                                                            </ul>
                                        </div>

                                                                    </td>

                            </tr>
                                                    <tr>
                                <td class="bg-success">
                                    16
                                </td>

                                <td>
                                    <b>[System]</b>

                                                                    </td>

                                <td>
                                    <span dir="ltr">20/04 2026, 05:02 PM</span>
                                    <div class="small text-muted">منذ أسبوع 3 ساعات</div>
                                </td>

                                <td>
                                                                            <i class="fa fa-plus-square text-success"></i>
                                    
                                    Created a new <b>client</b>
                                    <div class="extra-small text-muted hidden">
                                        create:App\Client:5
                                    </div>
                                </td>

                                <td>
                                                                            <!--
                                        <a href="/admin/logs?model=App%5CClient&modelId=5"
                                           data-toggle="tooltip" title="View other actions associated with the same information" class="btn btn-xs btn-default onSide">
                                            <i class="fa fa-search"></i> Other actions
                                        </a>
                                        -->

                                                                                    <div class="margin-bottom-15">
                                                                                                    <a href="/clients/5" target="_blank" class="text-underlined">
                                                        Hassan al-otaibi
                                                    </a>

                                                                                            </div>
                                        
                                    
                                                                            <div>
                                            <ul class="list-compact margin-bottom-0">
                                                                                                    <li style="word-break: break-all">
                                                        <b>Name</b>: Hassan al-otaibi
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>National id</b>: --
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Phone</b>: 0500000005
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Email</b>: hassan.alotaibi@example.com
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Origin</b>: Generic
                                                    </li>
                                                                                            </ul>
                                        </div>

                                                                    </td>

                            </tr>
                                                    <tr>
                                <td class="bg-success">
                                    17
                                </td>

                                <td>
                                    <b>[System]</b>

                                                                    </td>

                                <td>
                                    <span dir="ltr">20/04 2026, 05:02 PM</span>
                                    <div class="small text-muted">منذ أسبوع 3 ساعات</div>
                                </td>

                                <td>
                                                                            <i class="fa fa-plus-square text-success"></i>
                                    
                                    Created a new <b>client</b>
                                    <div class="extra-small text-muted hidden">
                                        create:App\Client:6
                                    </div>
                                </td>

                                <td>
                                                                            <!--
                                        <a href="/admin/logs?model=App%5CClient&modelId=6"
                                           data-toggle="tooltip" title="View other actions associated with the same information" class="btn btn-xs btn-default onSide">
                                            <i class="fa fa-search"></i> Other actions
                                        </a>
                                        -->

                                                                                    <div class="margin-bottom-15">
                                                                                                    <a href="/clients/6" target="_blank" class="text-underlined">
                                                        Salma nassar
                                                    </a>

                                                                                            </div>
                                        
                                    
                                                                            <div>
                                            <ul class="list-compact margin-bottom-0">
                                                                                                    <li style="word-break: break-all">
                                                        <b>Name</b>: Salma nassar
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>National id</b>: --
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Phone</b>: 0500000006
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Email</b>: salma.nassar@example.com
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Origin</b>: Generic
                                                    </li>
                                                                                            </ul>
                                        </div>

                                                                    </td>

                            </tr>
                                                    <tr>
                                <td class="bg-success">
                                    18
                                </td>

                                <td>
                                    <b>[System]</b>

                                                                    </td>

                                <td>
                                    <span dir="ltr">20/04 2026, 05:02 PM</span>
                                    <div class="small text-muted">منذ أسبوع 3 ساعات</div>
                                </td>

                                <td>
                                                                            <i class="fa fa-plus-square text-success"></i>
                                    
                                    Created a new <b>client</b>
                                    <div class="extra-small text-muted hidden">
                                        create:App\Client:7
                                    </div>
                                </td>

                                <td>
                                                                            <!--
                                        <a href="/admin/logs?model=App%5CClient&modelId=7"
                                           data-toggle="tooltip" title="View other actions associated with the same information" class="btn btn-xs btn-default onSide">
                                            <i class="fa fa-search"></i> Other actions
                                        </a>
                                        -->

                                                                                    <div class="margin-bottom-15">
                                                                                                    <a href="/clients/7" target="_blank" class="text-underlined">
                                                        Tariq mahmoud
                                                    </a>

                                                                                            </div>
                                        
                                    
                                                                            <div>
                                            <ul class="list-compact margin-bottom-0">
                                                                                                    <li style="word-break: break-all">
                                                        <b>Name</b>: Tariq mahmoud
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>National id</b>: --
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Phone</b>: 0500000007
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Email</b>: tariq.mahmoud@example.com
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Origin</b>: Generic
                                                    </li>
                                                                                            </ul>
                                        </div>

                                                                    </td>

                            </tr>
                                                    <tr>
                                <td class="bg-success">
                                    19
                                </td>

                                <td>
                                    <b>[System]</b>

                                                                    </td>

                                <td>
                                    <span dir="ltr">20/04 2026, 05:02 PM</span>
                                    <div class="small text-muted">منذ أسبوع 3 ساعات</div>
                                </td>

                                <td>
                                                                            <i class="fa fa-plus-square text-success"></i>
                                    
                                    Created a new <b>client</b>
                                    <div class="extra-small text-muted hidden">
                                        create:App\Client:8
                                    </div>
                                </td>

                                <td>
                                                                            <!--
                                        <a href="/admin/logs?model=App%5CClient&modelId=8"
                                           data-toggle="tooltip" title="View other actions associated with the same information" class="btn btn-xs btn-default onSide">
                                            <i class="fa fa-search"></i> Other actions
                                        </a>
                                        -->

                                                                                    <div class="margin-bottom-15">
                                                                                                    <a href="/clients/8" target="_blank" class="text-underlined">
                                                        Rania haddad
                                                    </a>

                                                                                            </div>
                                        
                                    
                                                                            <div>
                                            <ul class="list-compact margin-bottom-0">
                                                                                                    <li style="word-break: break-all">
                                                        <b>Name</b>: Rania haddad
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>National id</b>: --
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Phone</b>: 0500000008
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Email</b>: rania.haddad@example.com
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Origin</b>: Generic
                                                    </li>
                                                                                            </ul>
                                        </div>

                                                                    </td>

                            </tr>
                                                    <tr>
                                <td class="bg-success">
                                    20
                                </td>

                                <td>
                                    <b>[System]</b>

                                                                    </td>

                                <td>
                                    <span dir="ltr">20/04 2026, 05:02 PM</span>
                                    <div class="small text-muted">منذ أسبوع 3 ساعات</div>
                                </td>

                                <td>
                                                                            <i class="fa fa-plus-square text-success"></i>
                                    
                                    Created a new <b>client</b>
                                    <div class="extra-small text-muted hidden">
                                        create:App\Client:9
                                    </div>
                                </td>

                                <td>
                                                                            <!--
                                        <a href="/admin/logs?model=App%5CClient&modelId=9"
                                           data-toggle="tooltip" title="View other actions associated with the same information" class="btn btn-xs btn-default onSide">
                                            <i class="fa fa-search"></i> Other actions
                                        </a>
                                        -->

                                                                                    <div class="margin-bottom-15">
                                                                                                    <a href="/clients/9" target="_blank" class="text-underlined">
                                                        Majid samara
                                                    </a>

                                                                                            </div>
                                        
                                    
                                                                            <div>
                                            <ul class="list-compact margin-bottom-0">
                                                                                                    <li style="word-break: break-all">
                                                        <b>Name</b>: Majid samara
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>National id</b>: --
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Phone</b>: 0500000009
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Email</b>: majid.samara@example.com
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Origin</b>: Generic
                                                    </li>
                                                                                            </ul>
                                        </div>

                                                                    </td>

                            </tr>
                                                    <tr>
                                <td class="bg-success">
                                    21
                                </td>

                                <td>
                                    <b>[System]</b>

                                                                    </td>

                                <td>
                                    <span dir="ltr">20/04 2026, 05:02 PM</span>
                                    <div class="small text-muted">منذ أسبوع 3 ساعات</div>
                                </td>

                                <td>
                                                                            <i class="fa fa-plus-square text-success"></i>
                                    
                                    Created a new <b>client</b>
                                    <div class="extra-small text-muted hidden">
                                        create:App\Client:10
                                    </div>
                                </td>

                                <td>
                                                                            <!--
                                        <a href="/admin/logs?model=App%5CClient&modelId=10"
                                           data-toggle="tooltip" title="View other actions associated with the same information" class="btn btn-xs btn-default onSide">
                                            <i class="fa fa-search"></i> Other actions
                                        </a>
                                        -->

                                                                                    <div class="margin-bottom-15">
                                                                                                    <a href="/clients/10" target="_blank" class="text-underlined">
                                                        Huda al-farsi
                                                    </a>

                                                                                            </div>
                                        
                                    
                                                                            <div>
                                            <ul class="list-compact margin-bottom-0">
                                                                                                    <li style="word-break: break-all">
                                                        <b>Name</b>: Huda al-farsi
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>National id</b>: --
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Phone</b>: 0500000010
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Email</b>: huda.alfarsi@example.com
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Origin</b>: Generic
                                                    </li>
                                                                                            </ul>
                                        </div>

                                                                    </td>

                            </tr>
                                                    <tr>
                                <td class="bg-success">
                                    22
                                </td>

                                <td>
                                    <b>[System]</b>

                                                                    </td>

                                <td>
                                    <span dir="ltr">20/04 2026, 05:02 PM</span>
                                    <div class="small text-muted">منذ أسبوع 3 ساعات</div>
                                </td>

                                <td>
                                                                            <i class="fa fa-plus-square text-success"></i>
                                    
                                    Created a new <b>batch</b>
                                    <div class="extra-small text-muted hidden">
                                        create:App\Batch:1
                                    </div>
                                </td>

                                <td>
                                                                            <!--
                                        <a href="/admin/logs?model=App%5CBatch&modelId=1"
                                           data-toggle="tooltip" title="View other actions associated with the same information" class="btn btn-xs btn-default onSide">
                                            <i class="fa fa-search"></i> Other actions
                                        </a>
                                        -->

                                                                                    <div class="margin-bottom-15">
                                                                                                    <a href="/batches/1" target="_blank" class="text-underlined">
                                                        General English - Level 1 #1
                                                    </a>

                                                                                            </div>
                                        
                                    
                                                                            <div>
                                            <ul class="list-compact margin-bottom-0">
                                                                                                    <li style="word-break: break-all">
                                                        <b>Name</b>: General English - Level 1 #1
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Course</b>: General English - Level 1
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Cost</b>: 1000 From each trainee
                                                    </li>
                                                                                            </ul>
                                        </div>

                                                                    </td>

                            </tr>
                                                    <tr>
                                <td class="bg-success">
                                    23
                                </td>

                                <td>
                                    <b>[System]</b>

                                                                    </td>

                                <td>
                                    <span dir="ltr">20/04 2026, 05:02 PM</span>
                                    <div class="small text-muted">منذ أسبوع 3 ساعات</div>
                                </td>

                                <td>
                                                                            <i class="fa fa-plus-square text-success"></i>
                                    
                                    Created a new <b>lecture</b>
                                    <div class="extra-small text-muted hidden">
                                        create:App\Lecture:1
                                    </div>
                                </td>

                                <td>
                                                                            <!--
                                        <a href="/admin/logs?model=App%5CLecture&modelId=1"
                                           data-toggle="tooltip" title="View other actions associated with the same information" class="btn btn-xs btn-default onSide">
                                            <i class="fa fa-search"></i> Other actions
                                        </a>
                                        -->

                                                                                    <div class="margin-bottom-15">
                                                                                                    <a href="/batches/1/lectures#!/lectures/1" target="_blank" class="text-underlined">
                                                        Untitled
                                                    </a>

                                                                                            </div>
                                        
                                    
                                                                            <div>
                                            <ul class="list-compact margin-bottom-0">
                                                                                                    <li style="word-break: break-all">
                                                        <b>Batch</b>: General English - Level 1 #1
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Number</b>: # 0
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Starts</b>: 06/04 2026, 10:00 AM
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Ends</b>: 06/04 2026, 10:00 AM
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Instructor</b>: Ahmad Barakat
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Lab</b>: Lab A - Main Building
                                                    </li>
                                                                                            </ul>
                                        </div>

                                                                    </td>

                            </tr>
                                                    <tr>
                                <td class="bg-success">
                                    24
                                </td>

                                <td>
                                    <b>[System]</b>

                                                                    </td>

                                <td>
                                    <span dir="ltr">20/04 2026, 05:02 PM</span>
                                    <div class="small text-muted">منذ أسبوع 3 ساعات</div>
                                </td>

                                <td>
                                                                            <i class="fa fa-plus-square text-success"></i>
                                    
                                    Created a new <b>lecture</b>
                                    <div class="extra-small text-muted hidden">
                                        create:App\Lecture:2
                                    </div>
                                </td>

                                <td>
                                                                            <!--
                                        <a href="/admin/logs?model=App%5CLecture&modelId=2"
                                           data-toggle="tooltip" title="View other actions associated with the same information" class="btn btn-xs btn-default onSide">
                                            <i class="fa fa-search"></i> Other actions
                                        </a>
                                        -->

                                                                                    <div class="margin-bottom-15">
                                                                                                    <a href="/batches/1/lectures#!/lectures/2" target="_blank" class="text-underlined">
                                                        Untitled
                                                    </a>

                                                                                            </div>
                                        
                                    
                                                                            <div>
                                            <ul class="list-compact margin-bottom-0">
                                                                                                    <li style="word-break: break-all">
                                                        <b>Batch</b>: General English - Level 1 #1
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Number</b>: # 0
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Starts</b>: 09/04 2026, 10:00 AM
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Ends</b>: 09/04 2026, 10:00 AM
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Instructor</b>: Ahmad Barakat
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Lab</b>: Lab A - Main Building
                                                    </li>
                                                                                            </ul>
                                        </div>

                                                                    </td>

                            </tr>
                                                    <tr>
                                <td class="bg-success">
                                    25
                                </td>

                                <td>
                                    <b>[System]</b>

                                                                    </td>

                                <td>
                                    <span dir="ltr">20/04 2026, 05:02 PM</span>
                                    <div class="small text-muted">منذ أسبوع 3 ساعات</div>
                                </td>

                                <td>
                                                                            <i class="fa fa-plus-square text-success"></i>
                                    
                                    Created a new <b>lecture</b>
                                    <div class="extra-small text-muted hidden">
                                        create:App\Lecture:3
                                    </div>
                                </td>

                                <td>
                                                                            <!--
                                        <a href="/admin/logs?model=App%5CLecture&modelId=3"
                                           data-toggle="tooltip" title="View other actions associated with the same information" class="btn btn-xs btn-default onSide">
                                            <i class="fa fa-search"></i> Other actions
                                        </a>
                                        -->

                                                                                    <div class="margin-bottom-15">
                                                                                                    <a href="/batches/1/lectures#!/lectures/3" target="_blank" class="text-underlined">
                                                        Untitled
                                                    </a>

                                                                                            </div>
                                        
                                    
                                                                            <div>
                                            <ul class="list-compact margin-bottom-0">
                                                                                                    <li style="word-break: break-all">
                                                        <b>Batch</b>: General English - Level 1 #1
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Number</b>: # 0
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Starts</b>: 21/04 2026, 10:00 AM
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Ends</b>: 21/04 2026, 10:00 AM
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Instructor</b>: Ahmad Barakat
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Lab</b>: Lab A - Main Building
                                                    </li>
                                                                                            </ul>
                                        </div>

                                                                    </td>

                            </tr>
                                                    <tr>
                                <td class="bg-success">
                                    26
                                </td>

                                <td>
                                    <b>[System]</b>

                                                                    </td>

                                <td>
                                    <span dir="ltr">20/04 2026, 05:02 PM</span>
                                    <div class="small text-muted">منذ أسبوع 3 ساعات</div>
                                </td>

                                <td>
                                                                            <i class="fa fa-plus-square text-success"></i>
                                    
                                    Created a new <b>lecture</b>
                                    <div class="extra-small text-muted hidden">
                                        create:App\Lecture:4
                                    </div>
                                </td>

                                <td>
                                                                            <!--
                                        <a href="/admin/logs?model=App%5CLecture&modelId=4"
                                           data-toggle="tooltip" title="View other actions associated with the same information" class="btn btn-xs btn-default onSide">
                                            <i class="fa fa-search"></i> Other actions
                                        </a>
                                        -->

                                                                                    <div class="margin-bottom-15">
                                                                                                    <a href="/batches/1/lectures#!/lectures/4" target="_blank" class="text-underlined">
                                                        Untitled
                                                    </a>

                                                                                            </div>
                                        
                                    
                                                                            <div>
                                            <ul class="list-compact margin-bottom-0">
                                                                                                    <li style="word-break: break-all">
                                                        <b>Batch</b>: General English - Level 1 #1
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Number</b>: # 0
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Starts</b>: 26/04 2026, 10:00 AM
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Ends</b>: 26/04 2026, 10:00 AM
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Instructor</b>: Ahmad Barakat
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Lab</b>: Lab A - Main Building
                                                    </li>
                                                                                            </ul>
                                        </div>

                                                                    </td>

                            </tr>
                                                    <tr>
                                <td class="bg-success">
                                    27
                                </td>

                                <td>
                                    <b>[System]</b>

                                                                    </td>

                                <td>
                                    <span dir="ltr">20/04 2026, 05:02 PM</span>
                                    <div class="small text-muted">منذ أسبوع 3 ساعات</div>
                                </td>

                                <td>
                                                                            <i class="fa fa-plus-square text-success"></i>
                                    
                                    Created a new <b>lecture</b>
                                    <div class="extra-small text-muted hidden">
                                        create:App\Lecture:5
                                    </div>
                                </td>

                                <td>
                                                                            <!--
                                        <a href="/admin/logs?model=App%5CLecture&modelId=5"
                                           data-toggle="tooltip" title="View other actions associated with the same information" class="btn btn-xs btn-default onSide">
                                            <i class="fa fa-search"></i> Other actions
                                        </a>
                                        -->

                                                                                    <div class="margin-bottom-15">
                                                                                                    <a href="/batches/1/lectures#!/lectures/5" target="_blank" class="text-underlined">
                                                        Untitled
                                                    </a>

                                                                                            </div>
                                        
                                    
                                                                            <div>
                                            <ul class="list-compact margin-bottom-0">
                                                                                                    <li style="word-break: break-all">
                                                        <b>Batch</b>: General English - Level 1 #1
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Number</b>: # 0
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Starts</b>: 27/04 2026, 10:00 AM
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Ends</b>: 27/04 2026, 10:00 AM
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Instructor</b>: Ahmad Barakat
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Lab</b>: Lab B - Training Center
                                                    </li>
                                                                                            </ul>
                                        </div>

                                                                    </td>

                            </tr>
                                                    <tr>
                                <td class="bg-success">
                                    28
                                </td>

                                <td>
                                    <b>[System]</b>

                                                                    </td>

                                <td>
                                    <span dir="ltr">20/04 2026, 05:02 PM</span>
                                    <div class="small text-muted">منذ أسبوع 3 ساعات</div>
                                </td>

                                <td>
                                                                            <i class="fa fa-plus-square text-success"></i>
                                    
                                    Created a new <b>lecture</b>
                                    <div class="extra-small text-muted hidden">
                                        create:App\Lecture:6
                                    </div>
                                </td>

                                <td>
                                                                            <!--
                                        <a href="/admin/logs?model=App%5CLecture&modelId=6"
                                           data-toggle="tooltip" title="View other actions associated with the same information" class="btn btn-xs btn-default onSide">
                                            <i class="fa fa-search"></i> Other actions
                                        </a>
                                        -->

                                                                                    <div class="margin-bottom-15">
                                                                                                    <a href="/batches/1/lectures#!/lectures/6" target="_blank" class="text-underlined">
                                                        Untitled
                                                    </a>

                                                                                            </div>
                                        
                                    
                                                                            <div>
                                            <ul class="list-compact margin-bottom-0">
                                                                                                    <li style="word-break: break-all">
                                                        <b>Batch</b>: General English - Level 1 #1
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Number</b>: # 0
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Starts</b>: 30/04 2026, 10:00 AM
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Ends</b>: 30/04 2026, 10:00 AM
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Instructor</b>: Ahmad Barakat
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Lab</b>: Lab B - Training Center
                                                    </li>
                                                                                            </ul>
                                        </div>

                                                                    </td>

                            </tr>
                                                    <tr>
                                <td class="bg-success">
                                    29
                                </td>

                                <td>
                                    <b>[System]</b>

                                                                    </td>

                                <td>
                                    <span dir="ltr">20/04 2026, 05:02 PM</span>
                                    <div class="small text-muted">منذ أسبوع 3 ساعات</div>
                                </td>

                                <td>
                                                                            <i class="fa fa-plus-square text-success"></i>
                                    
                                    Created a new <b>lecture</b>
                                    <div class="extra-small text-muted hidden">
                                        create:App\Lecture:7
                                    </div>
                                </td>

                                <td>
                                                                            <!--
                                        <a href="/admin/logs?model=App%5CLecture&modelId=7"
                                           data-toggle="tooltip" title="View other actions associated with the same information" class="btn btn-xs btn-default onSide">
                                            <i class="fa fa-search"></i> Other actions
                                        </a>
                                        -->

                                                                                    <div class="margin-bottom-15">
                                                                                                    <a href="/batches/1/lectures#!/lectures/7" target="_blank" class="text-underlined">
                                                        Untitled
                                                    </a>

                                                                                            </div>
                                        
                                    
                                                                            <div>
                                            <ul class="list-compact margin-bottom-0">
                                                                                                    <li style="word-break: break-all">
                                                        <b>Batch</b>: General English - Level 1 #1
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Number</b>: # 0
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Starts</b>: 03/05 2026, 10:00 AM
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Ends</b>: 03/05 2026, 10:00 AM
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Instructor</b>: Ahmad Barakat
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Lab</b>: [online]
                                                    </li>
                                                                                            </ul>
                                        </div>

                                                                    </td>

                            </tr>
                                                    <tr>
                                <td class="bg-success">
                                    2
                                </td>

                                <td>
                                    <b>[System]</b>

                                                                    </td>

                                <td>
                                    <span dir="ltr">20/04 2026, 05:02 PM</span>
                                    <div class="small text-muted">منذ أسبوع 3 ساعات</div>
                                </td>

                                <td>
                                                                            <i class="fa fa-plus-square text-success"></i>
                                    
                                    Created a new <b>instructor</b>
                                    <div class="extra-small text-muted hidden">
                                        create:App\Instructor:1
                                    </div>
                                </td>

                                <td>
                                                                            <!--
                                        <a href="/admin/logs?model=App%5CInstructor&modelId=1"
                                           data-toggle="tooltip" title="View other actions associated with the same information" class="btn btn-xs btn-default onSide">
                                            <i class="fa fa-search"></i> Other actions
                                        </a>
                                        -->

                                                                                    <div class="margin-bottom-15">
                                                                                                    <a href="/instructors/1" target="_blank" class="text-underlined">
                                                        Ahmad Barakat
                                                    </a>

                                                                                            </div>
                                        
                                    
                                                                            <div>
                                            <ul class="list-compact margin-bottom-0">
                                                                                                    <li style="word-break: break-all">
                                                        <b>Name</b>: Ahmad Barakat
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Email</b>: ahmad.barakat@example.com
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Phone number</b>: 0501000001
                                                    </li>
                                                                                            </ul>
                                        </div>

                                                                    </td>

                            </tr>
                                                    <tr>
                                <td class="bg-success">
                                    3
                                </td>

                                <td>
                                    <b>[System]</b>

                                                                    </td>

                                <td>
                                    <span dir="ltr">20/04 2026, 05:02 PM</span>
                                    <div class="small text-muted">منذ أسبوع 3 ساعات</div>
                                </td>

                                <td>
                                                                            <i class="fa fa-plus-square text-success"></i>
                                    
                                    Created a new <b>instructor</b>
                                    <div class="extra-small text-muted hidden">
                                        create:App\Instructor:2
                                    </div>
                                </td>

                                <td>
                                                                            <!--
                                        <a href="/admin/logs?model=App%5CInstructor&modelId=2"
                                           data-toggle="tooltip" title="View other actions associated with the same information" class="btn btn-xs btn-default onSide">
                                            <i class="fa fa-search"></i> Other actions
                                        </a>
                                        -->

                                                                                    <div class="margin-bottom-15">
                                                                                                    <a href="/instructors/2" target="_blank" class="text-underlined">
                                                        Fatima Al-Rashid
                                                    </a>

                                                                                            </div>
                                        
                                    
                                                                            <div>
                                            <ul class="list-compact margin-bottom-0">
                                                                                                    <li style="word-break: break-all">
                                                        <b>Name</b>: Fatima Al-Rashid
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Email</b>: fatima.alrashid@example.com
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Phone number</b>: 0501000002
                                                    </li>
                                                                                            </ul>
                                        </div>

                                                                    </td>

                            </tr>
                                                    <tr>
                                <td class="bg-success">
                                    4
                                </td>

                                <td>
                                    <b>[System]</b>

                                                                    </td>

                                <td>
                                    <span dir="ltr">20/04 2026, 05:02 PM</span>
                                    <div class="small text-muted">منذ أسبوع 3 ساعات</div>
                                </td>

                                <td>
                                                                            <i class="fa fa-plus-square text-success"></i>
                                    
                                    Created a new <b>instructor</b>
                                    <div class="extra-small text-muted hidden">
                                        create:App\Instructor:3
                                    </div>
                                </td>

                                <td>
                                                                            <!--
                                        <a href="/admin/logs?model=App%5CInstructor&modelId=3"
                                           data-toggle="tooltip" title="View other actions associated with the same information" class="btn btn-xs btn-default onSide">
                                            <i class="fa fa-search"></i> Other actions
                                        </a>
                                        -->

                                                                                    <div class="margin-bottom-15">
                                                                                                    <a href="/instructors/3" target="_blank" class="text-underlined">
                                                        Khalid Mansour
                                                    </a>

                                                                                            </div>
                                        
                                    
                                                                            <div>
                                            <ul class="list-compact margin-bottom-0">
                                                                                                    <li style="word-break: break-all">
                                                        <b>Name</b>: Khalid Mansour
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Email</b>: khalid.mansour@example.com
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Phone number</b>: 0501000003
                                                    </li>
                                                                                            </ul>
                                        </div>

                                                                    </td>

                            </tr>
                                                    <tr>
                                <td class="bg-success">
                                    5
                                </td>

                                <td>
                                    <b>[System]</b>

                                                                    </td>

                                <td>
                                    <span dir="ltr">20/04 2026, 05:02 PM</span>
                                    <div class="small text-muted">منذ أسبوع 3 ساعات</div>
                                </td>

                                <td>
                                                                            <i class="fa fa-plus-square text-success"></i>
                                    
                                    Created a new <b>course</b>
                                    <div class="extra-small text-muted hidden">
                                        create:App\Course:1
                                    </div>
                                </td>

                                <td>
                                                                            <!--
                                        <a href="/admin/logs?model=App%5CCourse&modelId=1"
                                           data-toggle="tooltip" title="View other actions associated with the same information" class="btn btn-xs btn-default onSide">
                                            <i class="fa fa-search"></i> Other actions
                                        </a>
                                        -->

                                                                                    <div class="margin-bottom-15">
                                                                                                    <a href="/courses/1" target="_blank" class="text-underlined">
                                                        General English - Level 1
                                                    </a>

                                                                                            </div>
                                        
                                    
                                                                            <div>
                                            <ul class="list-compact margin-bottom-0">
                                                                                                    <li style="word-break: break-all">
                                                        <b>Name</b>: General English - Level 1
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Code</b>: GEN-1
                                                    </li>
                                                                                            </ul>
                                        </div>

                                                                    </td>

                            </tr>
                                                    <tr>
                                <td class="bg-success">
                                    6
                                </td>

                                <td>
                                    <b>[System]</b>

                                                                    </td>

                                <td>
                                    <span dir="ltr">20/04 2026, 05:02 PM</span>
                                    <div class="small text-muted">منذ أسبوع 3 ساعات</div>
                                </td>

                                <td>
                                                                            <i class="fa fa-plus-square text-success"></i>
                                    
                                    Created a new <b>course</b>
                                    <div class="extra-small text-muted hidden">
                                        create:App\Course:2
                                    </div>
                                </td>

                                <td>
                                                                            <!--
                                        <a href="/admin/logs?model=App%5CCourse&modelId=2"
                                           data-toggle="tooltip" title="View other actions associated with the same information" class="btn btn-xs btn-default onSide">
                                            <i class="fa fa-search"></i> Other actions
                                        </a>
                                        -->

                                                                                    <div class="margin-bottom-15">
                                                                                                    <a href="/courses/2" target="_blank" class="text-underlined">
                                                        General English - Level 2
                                                    </a>

                                                                                            </div>
                                        
                                    
                                                                            <div>
                                            <ul class="list-compact margin-bottom-0">
                                                                                                    <li style="word-break: break-all">
                                                        <b>Name</b>: General English - Level 2
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Code</b>: GEN-2
                                                    </li>
                                                                                            </ul>
                                        </div>

                                                                    </td>

                            </tr>
                                                    <tr>
                                <td class="bg-success">
                                    7
                                </td>

                                <td>
                                    <b>[System]</b>

                                                                    </td>

                                <td>
                                    <span dir="ltr">20/04 2026, 05:02 PM</span>
                                    <div class="small text-muted">منذ أسبوع 3 ساعات</div>
                                </td>

                                <td>
                                                                            <i class="fa fa-plus-square text-success"></i>
                                    
                                    Created a new <b>course</b>
                                    <div class="extra-small text-muted hidden">
                                        create:App\Course:3
                                    </div>
                                </td>

                                <td>
                                                                            <!--
                                        <a href="/admin/logs?model=App%5CCourse&modelId=3"
                                           data-toggle="tooltip" title="View other actions associated with the same information" class="btn btn-xs btn-default onSide">
                                            <i class="fa fa-search"></i> Other actions
                                        </a>
                                        -->

                                                                                    <div class="margin-bottom-15">
                                                                                                    <a href="/courses/3" target="_blank" class="text-underlined">
                                                        General English - Level 3
                                                    </a>

                                                                                            </div>
                                        
                                    
                                                                            <div>
                                            <ul class="list-compact margin-bottom-0">
                                                                                                    <li style="word-break: break-all">
                                                        <b>Name</b>: General English - Level 3
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Code</b>: GEN-3
                                                    </li>
                                                                                            </ul>
                                        </div>

                                                                    </td>

                            </tr>
                                                    <tr>
                                <td class="bg-success">
                                    8
                                </td>

                                <td>
                                    <b>[System]</b>

                                                                    </td>

                                <td>
                                    <span dir="ltr">20/04 2026, 05:02 PM</span>
                                    <div class="small text-muted">منذ أسبوع 3 ساعات</div>
                                </td>

                                <td>
                                                                            <i class="fa fa-plus-square text-success"></i>
                                    
                                    Created a new <b>course</b>
                                    <div class="extra-small text-muted hidden">
                                        create:App\Course:4
                                    </div>
                                </td>

                                <td>
                                                                            <!--
                                        <a href="/admin/logs?model=App%5CCourse&modelId=4"
                                           data-toggle="tooltip" title="View other actions associated with the same information" class="btn btn-xs btn-default onSide">
                                            <i class="fa fa-search"></i> Other actions
                                        </a>
                                        -->

                                                                                    <div class="margin-bottom-15">
                                                                                                    <a href="/courses/4" target="_blank" class="text-underlined">
                                                        Digital Marketing Strategy
                                                    </a>

                                                                                            </div>
                                        
                                    
                                                                            <div>
                                            <ul class="list-compact margin-bottom-0">
                                                                                                    <li style="word-break: break-all">
                                                        <b>Name</b>: Digital Marketing Strategy
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Code</b>: BUS-DIG-MARK
                                                    </li>
                                                                                            </ul>
                                        </div>

                                                                    </td>

                            </tr>
                                                    <tr>
                                <td class="bg-success">
                                    9
                                </td>

                                <td>
                                    <b>[System]</b>

                                                                    </td>

                                <td>
                                    <span dir="ltr">20/04 2026, 05:02 PM</span>
                                    <div class="small text-muted">منذ أسبوع 3 ساعات</div>
                                </td>

                                <td>
                                                                            <i class="fa fa-plus-square text-success"></i>
                                    
                                    Created a new <b>course</b>
                                    <div class="extra-small text-muted hidden">
                                        create:App\Course:5
                                    </div>
                                </td>

                                <td>
                                                                            <!--
                                        <a href="/admin/logs?model=App%5CCourse&modelId=5"
                                           data-toggle="tooltip" title="View other actions associated with the same information" class="btn btn-xs btn-default onSide">
                                            <i class="fa fa-search"></i> Other actions
                                        </a>
                                        -->

                                                                                    <div class="margin-bottom-15">
                                                                                                    <a href="/courses/5" target="_blank" class="text-underlined">
                                                        Business Planning and Strategy
                                                    </a>

                                                                                            </div>
                                        
                                    
                                                                            <div>
                                            <ul class="list-compact margin-bottom-0">
                                                                                                    <li style="word-break: break-all">
                                                        <b>Name</b>: Business Planning and Strategy
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Code</b>: BUS-PLN-STR
                                                    </li>
                                                                                            </ul>
                                        </div>

                                                                    </td>

                            </tr>
                                                    <tr>
                                <td class="bg-success">
                                    10
                                </td>

                                <td>
                                    <b>[System]</b>

                                                                    </td>

                                <td>
                                    <span dir="ltr">20/04 2026, 05:02 PM</span>
                                    <div class="small text-muted">منذ أسبوع 3 ساعات</div>
                                </td>

                                <td>
                                                                            <i class="fa fa-plus-square text-success"></i>
                                    
                                    Created a new <b>course</b>
                                    <div class="extra-small text-muted hidden">
                                        create:App\Course:6
                                    </div>
                                </td>

                                <td>
                                                                            <!--
                                        <a href="/admin/logs?model=App%5CCourse&modelId=6"
                                           data-toggle="tooltip" title="View other actions associated with the same information" class="btn btn-xs btn-default onSide">
                                            <i class="fa fa-search"></i> Other actions
                                        </a>
                                        -->

                                                                                    <div class="margin-bottom-15">
                                                                                                    <a href="/courses/6" target="_blank" class="text-underlined">
                                                        User Experience Basics
                                                    </a>

                                                                                            </div>
                                        
                                    
                                                                            <div>
                                            <ul class="list-compact margin-bottom-0">
                                                                                                    <li style="word-break: break-all">
                                                        <b>Name</b>: User Experience Basics
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Code</b>: WEB-UX
                                                    </li>
                                                                                            </ul>
                                        </div>

                                                                    </td>

                            </tr>
                                                    <tr>
                                <td class="bg-success">
                                    11
                                </td>

                                <td>
                                    <b>[System]</b>

                                                                    </td>

                                <td>
                                    <span dir="ltr">20/04 2026, 05:02 PM</span>
                                    <div class="small text-muted">منذ أسبوع 3 ساعات</div>
                                </td>

                                <td>
                                                                            <i class="fa fa-plus-square text-success"></i>
                                    
                                    Created a new <b>course</b>
                                    <div class="extra-small text-muted hidden">
                                        create:App\Course:7
                                    </div>
                                </td>

                                <td>
                                                                            <!--
                                        <a href="/admin/logs?model=App%5CCourse&modelId=7"
                                           data-toggle="tooltip" title="View other actions associated with the same information" class="btn btn-xs btn-default onSide">
                                            <i class="fa fa-search"></i> Other actions
                                        </a>
                                        -->

                                                                                    <div class="margin-bottom-15">
                                                                                                    <a href="/courses/7" target="_blank" class="text-underlined">
                                                        JavaScript Basics
                                                    </a>

                                                                                            </div>
                                        
                                    
                                                                            <div>
                                            <ul class="list-compact margin-bottom-0">
                                                                                                    <li style="word-break: break-all">
                                                        <b>Name</b>: JavaScript Basics
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Code</b>: WEB-JS
                                                    </li>
                                                                                            </ul>
                                        </div>

                                                                    </td>

                            </tr>
                                                    <tr>
                                <td class="bg-success">
                                    1
                                </td>

                                <td>
                                    <b>[System]</b>

                                                                    </td>

                                <td>
                                    <span dir="ltr">20/04 2026, 05:02 PM</span>
                                    <div class="small text-muted">منذ أسبوع 3 ساعات</div>
                                </td>

                                <td>
                                                                            <i class="fa fa-plus-square text-success"></i>
                                    
                                    Created a new <b>user</b>
                                    <div class="extra-small text-muted hidden">
                                        create:App\User:1
                                    </div>
                                </td>

                                <td>
                                                                            <!--
                                        <a href="/admin/logs?model=App%5CUser&modelId=1"
                                           data-toggle="tooltip" title="View other actions associated with the same information" class="btn btn-xs btn-default onSide">
                                            <i class="fa fa-search"></i> Other actions
                                        </a>
                                        -->

                                                                                    <div class="margin-bottom-15">
                                                                                                    Super Administrator
                                                                                            </div>
                                        
                                    
                                                                            <div>
                                            <ul class="list-compact margin-bottom-0">
                                                                                                    <li style="word-break: break-all">
                                                        <b>Name</b>: Super Administrator
                                                    </li>
                                                                                                    <li style="word-break: break-all">
                                                        <b>Username</b>: admin
                                                    </li>
                                                                                            </ul>
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
            </div>
</div>


<?php
// تضمين footer template
include_once __DIR__ . '/../templates/footer.php';
?>
