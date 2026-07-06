<?php
// إعداد المتغيرات
$pageTitle = 'المحاضرات';
$includeSessionCheck = true;
$includeCSRFRefresh = true;

// تضمين القوالب
include_once __DIR__ . '/../templates/header.php';
include_once __DIR__ . '/../templates/sidebar.php';
?>

<div id="container" class="container-fluid">
<div id="content" class="lectureSchedulePage">
                    <div id="pageTitle" class="d-flex flex-gap-15 flex-wrap flex-rows flex-column-on-mobile align-items-center justify-content-between">
        <div class="flex-grow-1">
            <i class="icon fa fa-calendar"></i>
            <span class="title">المحاضرات</span>

                            
                <ul class="breadcrumb inline" style="margin: 0">
                    <li class="breadcrumb-item"></li>

                                            <li class="breadcrumb-item">جدول المحاضرات</li>
                                    </ul>
                    </div>

        <div class="d-flex justify-content-center">
            <div>
                                    <a href="/lectures/create" class="btn btn-primary">
                <i class="fa fa-plus-circle"></i>  إضافة محاضرات جديدة
            </a>
            
                            </div>
        </div>
    </div>
        <ul class="nav nav-tabs" role="tablist">
        <li class="active">
            <a href="/lectures">
                <i class="icon fa fa-calendar-o"></i>
                <span class="title">جدول المحاضرات</span>
            </a>
        </li>

                    <li class="">
                <a href="/lectures/all">
                    <i class="icon fa fa-search"></i>
                    <span class="title">إدارة المحاضرات</span>
                </a>
            </li>
        
        <li class="">
            <a href="/lectures/inProgress">
                <i class="icon fa fa-clock-o"></i>
                <span class="title">التي تتم الآن</span>
            </a>
        </li>

                    <li class="">
                <a href="/lectures/selfAttendance">
                    <i class="icon fa fa-address-card-o"></i>
                    <span class="title">التحضير الذاتي في الفروع</span>
                </a>
            </li>
            </ul>

        <div ng-app="scheduleApp" ng-controller="mainController" class="ng-scope">
            <dismissible-hint name="lectures.schedule" class="ng-isolate-scope">
    <!-- ngIf: visible --><div ng-if="visible" class="dismissibleHint  d-flex flex-gap-15 align-items-center justify-content-between">
        <div class="d-flex flex-gap-20 align-items-center flex-grow-1">
            <!-- ngIf: icon || img --><div ng-if="icon || img" class="iconHolder hidden-xs ng-scope">
                <!-- ngIf: img -->
                <!-- ngIf: icon --><span ng-if="icon" class="ms icon ng-binding ng-scope">info</span><!-- end ngIf: icon -->
            </div><!-- end ngIf: icon || img -->

            <div class="content flex-grow-1">
                <ng-transclude>
                من هنا يمكنك عرض كافة المحاضرات المضافة. ايضاً
		يمكنك نقل المحاضرات من يوم لآخر بالسحب والإفلات. إضغط على المحاضرة لمعلومات وخيارات اكثر.
            </ng-transclude>
            </div>
        </div>

        <div>
            <!-- ngIf: dismissible --><button ng-click="dismiss()" ng-if="dismissible" class="close ng-scope" type="button">
                <span>×</span>
            </button><!-- end ngIf: dismissible -->
        </div>
    </div><!-- end ngIf: visible --></dismissible-hint>

            <div class="block style2" id="filtering">
        <div class="block-body">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 column-bordered">
                    <div class="form-group m-0">
                        <label>فلترة بمدرب او اكثر</label>

                        <div class="d-flex flex-gap-15">
                            <div>
                                <instructor-search setup="lectures.filtering.instructors.searchSetup" class="ng-isolate-scope">
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
            <input ng-model="name" uib-typeahead="instructor.id as instructor.name for instructor in search($viewValue)" typeahead-min-length="setup.minLength" typeahead-wait-ms="700" typeahead-on-select="select($item, $model, $label)" typeahead-loading="searching" typeahead-no-results="noResults" typeahead-template-url="instructorOption.html" ng-class="{'input-lg': setup.largeInput}" type="text" class="form-control  ng-empty" name="search" placeholder="بحث بالإسم او الرقم او البريد الإلكتروني ..." autocomplete="off" aria-autocomplete="list" aria-expanded="false" aria-owns="typeahead-20-6970"><ul class="dropdown-menu ng-isolate-scope ng-hide" ng-show="isOpen() &amp;&amp; !moveInProgress" ng-style="{top: position().top+'px', left: position().left+'px'}" role="listbox" aria-hidden="true" uib-typeahead-popup="" id="typeahead-20-6970" matches="matches" active="activeIdx" select="select(activeIdx, evt)" move-in-progress="moveInProgress" query="query" position="position" assign-is-open="assignIsOpen(isOpen)" debounce="debounceUpdate" template-url="instructorOption.html">
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

                            <div class="pills">
                                <!-- ngRepeat: i in lectures.filtering.instructors.selected track by i.id -->
                            </div>
                        </div>
                    </div>
                </div>

                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group m-0">
                            <label>فلترة بمكان التدريب</label>

                            <div class="pills">
                                <!-- ngRepeat: v in lectures.filtering.venues.options --><div ng-repeat="v in lectures.filtering.venues.options" ng-click="lectures.filtering.venues.toggle(v)" ng-class="{'active': lectures.filtering.venues.selectedHas(v)}" class="pill d-flex flex-gap-10 align-items-center ng-scope">
                                    <i class="fa fa-video-camera"></i>
                                    <span uib-tooltip="عبر الإنترنت" class="ng-binding">عبر الإنترنت</span>
                                </div><!-- end ngRepeat: v in lectures.filtering.venues.options --><div ng-repeat="v in lectures.filtering.venues.options" ng-click="lectures.filtering.venues.toggle(v)" ng-class="{'active': lectures.filtering.venues.selectedHas(v)}" class="pill d-flex flex-gap-10 align-items-center ng-scope">
                                    <i class="fa fa-building-o"></i>
                                    <span uib-tooltip="Lab A - Main Building" class="ng-binding">Lab A - Main Bu ...</span>
                                </div><!-- end ngRepeat: v in lectures.filtering.venues.options --><div ng-repeat="v in lectures.filtering.venues.options" ng-click="lectures.filtering.venues.toggle(v)" ng-class="{'active': lectures.filtering.venues.selectedHas(v)}" class="pill d-flex flex-gap-10 align-items-center ng-scope">
                                    <i class="fa fa-building-o"></i>
                                    <span uib-tooltip="Lab B - Training Center" class="ng-binding">Lab B - Trainin ...</span>
                                </div><!-- end ngRepeat: v in lectures.filtering.venues.options -->
                            </div>
                        </div>
                    </div>
                            </div>

                    </div>
    </div>

            <div id="calendar" class="fc fc-rtl fc-unthemed" style=""><div class="fc-toolbar fc-header-toolbar"><div class="fc-left"><div class="fc-button-group"><button type="button" class="fc-next-button fc-button fc-button-primary" aria-label="next"><span class="fc-icon fc-icon-chevron-left"></span></button><button type="button" class="fc-prev-button fc-button fc-button-primary" aria-label="prev"><span class="fc-icon fc-icon-chevron-right"></span></button></div></div><div class="fc-center"><div class="fc-button-group"><button type="button" class="fc-dayGridMonth-button fc-button fc-button-primary">شهري</button><button type="button" class="fc-timeGridWeek-button fc-button fc-button-primary fc-button-active">عرض إسبوعي</button></div></div><div class="fc-right"><h2>25 أبريل – 1 مايو 2026</h2></div></div><div class="fc-view-container"><div class="fc-view fc-timeGridWeek-view fc-timeGrid-view" style=""><table class=""><thead class="fc-head"><tr><td class="fc-head-container fc-widget-header"><div class="fc-row fc-widget-header" style="border-right-width: 1px; margin-right: 11px;"><table class=""><thead><tr><th class="fc-day-header fc-widget-header fc-fri fc-future" data-date="2026-05-01"><span>جمعة 1/5</span></th><th class="fc-day-header fc-widget-header fc-thu fc-future" data-date="2026-04-30"><span>خميس 30/4</span></th><th class="fc-day-header fc-widget-header fc-wed fc-future" data-date="2026-04-29"><span>أربعاء 29/4</span></th><th class="fc-day-header fc-widget-header fc-tue fc-future" data-date="2026-04-28"><span>ثلاثاء 28/4</span></th><th class="fc-day-header fc-widget-header fc-mon fc-today" data-date="2026-04-27"><span>إثنين 27/4</span></th><th class="fc-day-header fc-widget-header fc-sun fc-past" data-date="2026-04-26"><span>أحد 26/4</span></th><th class="fc-day-header fc-widget-header fc-sat fc-past" data-date="2026-04-25"><span>سبت 25/4</span></th><th class="fc-axis fc-widget-header" style="width: 44.9219px;"></th></tr></thead></table></div></td></tr></thead><tbody class="fc-body"><tr><td class="fc-widget-content"><div class="fc-scroller fc-time-grid-container" style="overflow: hidden scroll; height: 715.438px;"><div class="fc-time-grid"><div class="fc-bg"><table class=""><tbody><tr><td class="fc-day fc-widget-content fc-fri fc-future" data-date="2026-05-01"></td><td class="fc-day fc-widget-content fc-thu fc-future" data-date="2026-04-30"></td><td class="fc-day fc-widget-content fc-wed fc-future" data-date="2026-04-29"></td><td class="fc-day fc-widget-content fc-tue fc-future" data-date="2026-04-28"></td><td class="fc-day fc-widget-content fc-mon fc-today " data-date="2026-04-27"></td><td class="fc-day fc-widget-content fc-sun fc-past" data-date="2026-04-26"></td><td class="fc-day fc-widget-content fc-sat fc-past" data-date="2026-04-25"></td><td class="fc-axis fc-widget-content" style="width: 44.9219px;"></td></tr></tbody></table></div><div class="fc-slats"><table class=""><tbody><tr data-time="00:00:00"><td class="fc-widget-content"></td><td class="fc-axis fc-time fc-widget-content" style="width: 44.9219px;"><span>12 ص</span></td></tr><tr data-time="00:30:00" class="fc-minor"><td class="fc-widget-content"></td><td class="fc-axis fc-time fc-widget-content" style="width: 44.9219px;"></td></tr><tr data-time="01:00:00"><td class="fc-widget-content"></td><td class="fc-axis fc-time fc-widget-content" style="width: 44.9219px;"><span>1 ص</span></td></tr><tr data-time="01:30:00" class="fc-minor"><td class="fc-widget-content"></td><td class="fc-axis fc-time fc-widget-content" style="width: 44.9219px;"></td></tr><tr data-time="02:00:00"><td class="fc-widget-content"></td><td class="fc-axis fc-time fc-widget-content" style="width: 44.9219px;"><span>2 ص</span></td></tr><tr data-time="02:30:00" class="fc-minor"><td class="fc-widget-content"></td><td class="fc-axis fc-time fc-widget-content" style="width: 44.9219px;"></td></tr><tr data-time="03:00:00"><td class="fc-widget-content"></td><td class="fc-axis fc-time fc-widget-content" style="width: 44.9219px;"><span>3 ص</span></td></tr><tr data-time="03:30:00" class="fc-minor"><td class="fc-widget-content"></td><td class="fc-axis fc-time fc-widget-content" style="width: 44.9219px;"></td></tr><tr data-time="04:00:00"><td class="fc-widget-content"></td><td class="fc-axis fc-time fc-widget-content" style="width: 44.9219px;"><span>4 ص</span></td></tr><tr data-time="04:30:00" class="fc-minor"><td class="fc-widget-content"></td><td class="fc-axis fc-time fc-widget-content" style="width: 44.9219px;"></td></tr><tr data-time="05:00:00"><td class="fc-widget-content"></td><td class="fc-axis fc-time fc-widget-content" style="width: 44.9219px;"><span>5 ص</span></td></tr><tr data-time="05:30:00" class="fc-minor"><td class="fc-widget-content"></td><td class="fc-axis fc-time fc-widget-content" style="width: 44.9219px;"></td></tr><tr data-time="06:00:00"><td class="fc-widget-content"></td><td class="fc-axis fc-time fc-widget-content" style="width: 44.9219px;"><span>6 ص</span></td></tr><tr data-time="06:30:00" class="fc-minor"><td class="fc-widget-content"></td><td class="fc-axis fc-time fc-widget-content" style="width: 44.9219px;"></td></tr><tr data-time="07:00:00"><td class="fc-widget-content"></td><td class="fc-axis fc-time fc-widget-content" style="width: 44.9219px;"><span>7 ص</span></td></tr><tr data-time="07:30:00" class="fc-minor"><td class="fc-widget-content"></td><td class="fc-axis fc-time fc-widget-content" style="width: 44.9219px;"></td></tr><tr data-time="08:00:00"><td class="fc-widget-content"></td><td class="fc-axis fc-time fc-widget-content" style="width: 44.9219px;"><span>8 ص</span></td></tr><tr data-time="08:30:00" class="fc-minor"><td class="fc-widget-content"></td><td class="fc-axis fc-time fc-widget-content" style="width: 44.9219px;"></td></tr><tr data-time="09:00:00"><td class="fc-widget-content"></td><td class="fc-axis fc-time fc-widget-content" style="width: 44.9219px;"><span>9 ص</span></td></tr><tr data-time="09:30:00" class="fc-minor"><td class="fc-widget-content"></td><td class="fc-axis fc-time fc-widget-content" style="width: 44.9219px;"></td></tr><tr data-time="10:00:00"><td class="fc-widget-content"></td><td class="fc-axis fc-time fc-widget-content" style="width: 44.9219px;"><span>10 ص</span></td></tr><tr data-time="10:30:00" class="fc-minor"><td class="fc-widget-content"></td><td class="fc-axis fc-time fc-widget-content" style="width: 44.9219px;"></td></tr><tr data-time="11:00:00"><td class="fc-widget-content"></td><td class="fc-axis fc-time fc-widget-content" style="width: 44.9219px;"><span>11 ص</span></td></tr><tr data-time="11:30:00" class="fc-minor"><td class="fc-widget-content"></td><td class="fc-axis fc-time fc-widget-content" style="width: 44.9219px;"></td></tr><tr data-time="12:00:00"><td class="fc-widget-content"></td><td class="fc-axis fc-time fc-widget-content" style="width: 44.9219px;"><span>12 م</span></td></tr><tr data-time="12:30:00" class="fc-minor"><td class="fc-widget-content"></td><td class="fc-axis fc-time fc-widget-content" style="width: 44.9219px;"></td></tr><tr data-time="13:00:00"><td class="fc-widget-content"></td><td class="fc-axis fc-time fc-widget-content" style="width: 44.9219px;"><span>1 م</span></td></tr><tr data-time="13:30:00" class="fc-minor"><td class="fc-widget-content"></td><td class="fc-axis fc-time fc-widget-content" style="width: 44.9219px;"></td></tr><tr data-time="14:00:00"><td class="fc-widget-content"></td><td class="fc-axis fc-time fc-widget-content" style="width: 44.9219px;"><span>2 م</span></td></tr><tr data-time="14:30:00" class="fc-minor"><td class="fc-widget-content"></td><td class="fc-axis fc-time fc-widget-content" style="width: 44.9219px;"></td></tr><tr data-time="15:00:00"><td class="fc-widget-content"></td><td class="fc-axis fc-time fc-widget-content" style="width: 44.9219px;"><span>3 م</span></td></tr><tr data-time="15:30:00" class="fc-minor"><td class="fc-widget-content"></td><td class="fc-axis fc-time fc-widget-content" style="width: 44.9219px;"></td></tr><tr data-time="16:00:00"><td class="fc-widget-content"></td><td class="fc-axis fc-time fc-widget-content" style="width: 44.9219px;"><span>4 م</span></td></tr><tr data-time="16:30:00" class="fc-minor"><td class="fc-widget-content"></td><td class="fc-axis fc-time fc-widget-content" style="width: 44.9219px;"></td></tr><tr data-time="17:00:00"><td class="fc-widget-content"></td><td class="fc-axis fc-time fc-widget-content" style="width: 44.9219px;"><span>5 م</span></td></tr><tr data-time="17:30:00" class="fc-minor"><td class="fc-widget-content"></td><td class="fc-axis fc-time fc-widget-content" style="width: 44.9219px;"></td></tr><tr data-time="18:00:00"><td class="fc-widget-content"></td><td class="fc-axis fc-time fc-widget-content" style="width: 44.9219px;"><span>6 م</span></td></tr><tr data-time="18:30:00" class="fc-minor"><td class="fc-widget-content"></td><td class="fc-axis fc-time fc-widget-content" style="width: 44.9219px;"></td></tr><tr data-time="19:00:00"><td class="fc-widget-content"></td><td class="fc-axis fc-time fc-widget-content" style="width: 44.9219px;"><span>7 م</span></td></tr><tr data-time="19:30:00" class="fc-minor"><td class="fc-widget-content"></td><td class="fc-axis fc-time fc-widget-content" style="width: 44.9219px;"></td></tr><tr data-time="20:00:00"><td class="fc-widget-content"></td><td class="fc-axis fc-time fc-widget-content" style="width: 44.9219px;"><span>8 م</span></td></tr><tr data-time="20:30:00" class="fc-minor"><td class="fc-widget-content"></td><td class="fc-axis fc-time fc-widget-content" style="width: 44.9219px;"></td></tr><tr data-time="21:00:00"><td class="fc-widget-content"></td><td class="fc-axis fc-time fc-widget-content" style="width: 44.9219px;"><span>9 م</span></td></tr><tr data-time="21:30:00" class="fc-minor"><td class="fc-widget-content"></td><td class="fc-axis fc-time fc-widget-content" style="width: 44.9219px;"></td></tr><tr data-time="22:00:00"><td class="fc-widget-content"></td><td class="fc-axis fc-time fc-widget-content" style="width: 44.9219px;"><span>10 م</span></td></tr><tr data-time="22:30:00" class="fc-minor"><td class="fc-widget-content"></td><td class="fc-axis fc-time fc-widget-content" style="width: 44.9219px;"></td></tr><tr data-time="23:00:00"><td class="fc-widget-content"></td><td class="fc-axis fc-time fc-widget-content" style="width: 44.9219px;"><span>11 م</span></td></tr><tr data-time="23:30:00" class="fc-minor"><td class="fc-widget-content"></td><td class="fc-axis fc-time fc-widget-content" style="width: 44.9219px;"></td></tr></tbody></table></div><hr class="fc-divider fc-widget-header" style="display:none"><div class="fc-content-skeleton"><table><tbody><tr><td><div class="fc-content-col"><div class="fc-event-container fc-mirror-container"></div><div class="fc-event-container"></div><div class="fc-highlight-container"></div><div class="fc-bgevent-container"></div><div class="fc-business-container"></div></div></td><td><div class="fc-content-col"><div class="fc-event-container fc-mirror-container"></div><div class="fc-event-container"><a class="fc-time-grid-event fc-event fc-start fc-end lecture scheduled fc-draggable fc-resizable" style="inset: 499.5px 0% -599.5px; z-index: 1;"><div class="fc-content"><div class="fc-time" data-start="10:00 ص" data-full="10:00 ص - 12:00 م"><span>10:00 ص - 12:00 م</span></div><div class="fc-title">General English - Level 1... #6<br>Ahmad Barakat<br>Lab B - Trainin...</div></div><div class="fc-resizer fc-end-resizer"></div></a></div><div class="fc-highlight-container"></div><div class="fc-bgevent-container"></div><div class="fc-business-container"></div></div></td><td><div class="fc-content-col"><div class="fc-event-container fc-mirror-container"></div><div class="fc-event-container"></div><div class="fc-highlight-container"></div><div class="fc-bgevent-container"></div><div class="fc-business-container"></div></div></td><td><div class="fc-content-col"><div class="fc-event-container fc-mirror-container"></div><div class="fc-event-container"></div><div class="fc-highlight-container"></div><div class="fc-bgevent-container"></div><div class="fc-business-container"></div></div></td><td><div class="fc-content-col"><div class="fc-event-container fc-mirror-container"></div><div class="fc-event-container"><a class="fc-time-grid-event fc-event fc-start fc-end lecture pending_confirmation fc-draggable fc-resizable" style="inset: 499.5px 0% -599.5px; z-index: 1;"><div class="fc-content"><div class="fc-time" data-start="10:00 ص" data-full="10:00 ص - 12:00 م"><span>10:00 ص - 12:00 م</span></div><div class="fc-title">General English - Level 1... #5<br>Ahmad Barakat<br>Lab B - Trainin...</div></div><div class="fc-resizer fc-end-resizer"></div></a></div><div class="fc-highlight-container"></div><div class="fc-bgevent-container"></div><div class="fc-business-container"></div><div class="fc-now-indicator fc-now-indicator-line" style="top: 964.525px;"></div></div></td><td><div class="fc-content-col"><div class="fc-event-container fc-mirror-container"></div><div class="fc-event-container"><a class="fc-time-grid-event fc-event fc-start fc-end lecture pending_confirmation fc-draggable fc-resizable" style="inset: 499.5px 0% -599.5px; z-index: 1;"><div class="fc-content"><div class="fc-time" data-start="10:00 ص" data-full="10:00 ص - 12:00 م"><span>10:00 ص - 12:00 م</span></div><div class="fc-title">General English - Level 1... #4<br>Ahmad Barakat<br>Lab A - Main Bu...</div></div><div class="fc-resizer fc-end-resizer"></div></a></div><div class="fc-highlight-container"></div><div class="fc-bgevent-container"></div><div class="fc-business-container"></div></div></td><td><div class="fc-content-col"><div class="fc-event-container fc-mirror-container"></div><div class="fc-event-container"></div><div class="fc-highlight-container"></div><div class="fc-bgevent-container"></div><div class="fc-business-container"></div></div></td><td class="fc-axis" style="width: 44.9219px;"></td></tr></tbody></table><div class="fc-now-indicator fc-now-indicator-arrow" style="top: 964.525px;"></div></div></div></div></td></tr></tbody></table></div></div></div>

            <!-- ngIf: stats.ready() --><div ng-if="stats.ready()" class="row ng-scope">
        <div class="col-sm-12 col-md-10">
            <div class="block style2 mt-15">
                <div class="block-body">
                    <div class="row">

                        <div class="col-sm-12 col-md-4">
                            <div class="text-uppercase mb-15">إحصاءات سريعة (للفترة الظاهرة بالأعلى)</div>
                            <dl class="dl-horizontal mb-0">
                                <dt>عدد المحاضرات</dt>
                                <dd class="ng-binding">3</dd>

                                <dt>التي تمت منها بالفعل</dt>
                                <dd class="ng-binding">0</dd>

                                <dt>التي تم إلغائها</dt>
                                <dd class="ng-binding">0</dd>

                                <dt>إجمالي وقت التدريب</dt>
                                <dd class="ng-binding">06:00</dd>

                                <dt>عدد المدربين المعينين</dt>
                                <dd class="ng-binding">1</dd>

                                <dt>نسبة الحضور</dt>
                                <dd class="ng-binding">0%</dd>

                                <dt>مرات الغياب</dt>
                                <dd class="ng-binding">0</dd>
                            </dl>
                        </div>

                        <div ng-show="stats.stats.instructorsLectures.length &gt; 0" class="col-sm-12 col-md-8">
                            <div class="text-uppercase mb-15">محاضرات كل مدرب</div>
                            <div class="pills">
                                <!-- ngRepeat: i in stats.stats.instructorsLectures --><div ng-repeat="i in stats.stats.instructorsLectures" class="pill small d-flex align-items-center flex-gap-5 cursor-auto ng-scope">
                                    <img ng-src="https://dznommenf76q0.cloudfront.net/app/images/icons/instructors/picture-placeholder.png?v=zzrlRl5vI9zKmwa" class="instructorPicture circle extra-small" alt="" src="https://dznommenf76q0.cloudfront.net/app/images/icons/instructors/picture-placeholder.png?v=zzrlRl5vI9zKmwa">
                                    <span uib-tooltip="Ahmad Barakat" class="ng-binding">Ahmad Baraka ...</span>
                                    <span class="badge ng-binding">3</span>
                                </div><!-- end ngRepeat: i in stats.stats.instructorsLectures -->
                            </div>
                        </div>

                        <!--
                        <div class="col-sm-12 col-md-4">
                            <div class="text-uppercase mb-15">Lectures per day of week</div>
                            <canvas class="chart chart-pie" style="height: 200px;"
                                    chart-data="stats.stats.dayAllocationChart.data"
                                    chart-labels="stats.stats.dayAllocationChart.labels"
                                    chart-colors="stats.dayAllocationChart.colors"
                                    chart-options="stats.dayAllocationChart.options">
                            </canvas>
                        </div>
                        -->
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end ngIf: stats.ready() -->
        </div>
            </div>
</div>


<?php
// تضمين footer template
include_once __DIR__ . '/../templates/footer.php';
?>
