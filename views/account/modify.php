<?php
// إعداد المتغيرات
$pageTitle = 'تعديل الحساب';
$includeSessionCheck = true;
$includeCSRFRefresh = true;

// تضمين القوالب
include_once __DIR__ . '/../templates/header.php';
include_once __DIR__ . '/../templates/sidebar.php';
?>

<div id="container" class="container-fluid">
<div id="content" class="">
                    <div id="pageTitle">
            <i class="icon fa fa-user"></i>
            <span class="title">تعديل معلومات الحساب</span>
        </div>

        
        
        <div ng-app="app" class="row ng-scope">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <form action="/account/update" method="POST" accept-charset="utf-8" class="block style2 ng-pristine ng-valid">
    	<div class="block-body">
            
            
            <input type="hidden" name="_token" value="6I8KuRvpEnoyRVC225dOQkQoGVsawtWiBQaPkLMj" autocomplete="off">

            
            <div class="form-group">
                <label>الإسم *</label>
                <input name="name" value="Super Administrator" type="text" class="form-control input-lg" required="">
            </div>

            <div class="row">
                
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label>اسم المستخدم *</label>
                        <input name="username" value="admin" type="text" dir="ltr" class="form-control" required="">
                    </div>
                </div>

                
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label>تغيير كلمة السر</label>
                        <input name="password" type="password" class="form-control" dir="ltr" autocomplete="off">
                    </div>
                </div>
            </div>

            <div class="row">
                
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label>البريد الإلكتروني</label>
                        <input name="email" value="yousseffathy725@gmail.com" type="email" dir="ltr" class="form-control" autocomplete="off">
                    </div>
                </div>

                
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label>رقم الهاتف</label>
                        <input name="phone_number" value="" type="text" dir="ltr" class="form-control" autocomplete="off">
                    </div>
                </div>
            </div>

            
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    
                    <div class="form-group margin-bottom-0">
                        <label>لغة واجهة النظام</label>
                        <select class="form-control" name="ui_language"><option value="ar" selected="selected">العربية</option><option value="en">English</option></select>
                    </div>
                </div>
            </div>
    	</div>

        
        <div class="block-footer">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-check"></i>  حفظ
            </button>
        </div>
    </form>
                <div ng-controller="reminders" class="block style2 ng-scope">
    	<div class="block-title">
            <i class="icon fa fa-bell"></i>
    		<span class="title">رسائل التذكير القادمة</span>
            
                	</div>
    	<div class="block-body p-0 overflow-x-auto" style="max-height: 600px">
                            <div class="p-15">
                    <div>
                        <i class="fa fa-info-circle"></i>
                        ليس هناك اي رسائل تذكير مجدولة في المستقبل. يمكنك إضافة رسائل تذكير من على ملف اي عميل او دورة او محاضرة (واماكن آخرى على النظام) وسيظهر هنا المجدول منها للمستقبل (لم يحين وقته بعد).
                    </div>

                    <div class="margin-top-15">
                        <button ng-click="reminders.create()" class="btn btn-primary">
                            <i class="fa fa-clock-o"></i> إضافة تذكير
                        </button>
                    </div>
                </div>

                	</div>
    </div>            </div>

            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                <div class="block style2">
        <div class="block-body" style="max-height: 500px; overflow: auto">
            <dl>
                                    <div class="margin-bottom-20">
                        <dt>الأدوار</dt>
                        <dd>
                            <ul class="list-inline">
                                                                    <li>
                                        <h5 class="text-primary">
                                            <i class="fa fa-key"></i> الإدارة</h5>
                                    </li>
                                                            </ul>
                        </dd>
                    </div>
                
                <dt>الصلاحيات</dt>
                <dd>
                                            حسابك كمدير عام على النظام له كافة الصلاحيات على كافة الفروع.

                                    </dd>
            </dl>
        </div>
    </div>            </div>
        </div>
            </div>
</div>

<?php
// تضمين footer template
include_once __DIR__ . '/../templates/footer.php';
?>
