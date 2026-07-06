<?php
// إعداد المتغيرات
$pageTitle = 'الإعدادات';
$includeSessionCheck = true;
$includeCSRFRefresh = true;

// تضمين القوالب
include_once __DIR__ . '/../templates/header.php';
include_once __DIR__ . '/../templates/sidebar.php';
?>

<div id="container" class="container-fluid">
<div id="content" class="adminSettingsPage">
                    <div id="pageTitle" class="d-flex flex-gap-15 flex-wrap flex-rows flex-column-on-mobile align-items-center justify-content-between">
        <div class="flex-grow-1">
            <i class="icon fa fa-sliders"></i>
            <span class="title">الإدارة</span>

                            
                <ul class="breadcrumb inline" style="margin: 0">
                    <li class="breadcrumb-item"></li>

                                            <li class="breadcrumb-item">الإعدادات</li>
                                    </ul>
                    </div>

        <div class="d-flex justify-content-center">
            <div>
                
                            </div>
        </div>
    </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="list-group">
                                            
                        
                        <a href="/admin/settings/general" class="list-group-item active">
                            <i class="icon fa fa-sliders"></i>
                            الإعدادات العامة
                        </a>
                                            
                        
                        <a href="/admin/settings/training" class="list-group-item ">
                            <i class="icon fa fa-graduation-cap"></i>
                            التدريب
                        </a>
                                            
                        
                        <a href="/admin/settings/clients" class="list-group-item ">
                            <i class="icon fa fa-users"></i>
                            العملاء
                        </a>
                                            
                        
                        <a href="/admin/settings/lectures" class="list-group-item ">
                            <i class="icon fa fa-calendar"></i>
                            المحاضرات
                        </a>
                                                                        <div class="list-group-separator" style="margin: 5px 0;"></div>
                                                    
                        
                        <a href="/admin/settings/lms" class="list-group-item ">
                            <i class="icon fa fa-laptop"></i>
                            إدارة التعليم (LMS)
                        </a>
                                            
                        
                        <a href="/admin/settings/vc" class="list-group-item ">
                            <i class="icon fa fa-video-camera"></i>
                            الفصول الإفتراضية
                        </a>
                                                                        <div class="list-group-separator" style="margin: 5px 0;"></div>
                                                    
                        
                        <a href="/admin/settings/finances" class="list-group-item ">
                            <i class="icon fa fa-dollar"></i>
                            المالية
                        </a>
                                            
                        
                        <a href="/admin/settings/marketing" class="list-group-item ">
                            <i class="icon fa fa-bullhorn"></i>
                            التسويق والمبيعات
                        </a>
                                            
                        
                        <a href="/admin/settings/certificates" class="list-group-item ">
                            <i class="icon fa fa-certificate"></i>
                            الشهادات
                        </a>
                                                                        <div class="list-group-separator" style="margin: 5px 0;"></div>
                                                    
                        
                        <a href="/admin/settings/extraInfo" class="list-group-item ">
                            <i class="icon fa fa-list"></i>
                            حقول المعلومات الإضافية
                        </a>
                                            
                        
                        <a href="/admin/settings/tags" class="list-group-item ">
                            <i class="icon fa fa-tags"></i>
                            الوسوم
                        </a>
                                            
                        
                        <a href="/admin/settings/services" class="list-group-item ">
                            <i class="icon fa fa-plug"></i>
                            الخدمات
                        </a>
                                            
                        
                        <a href="/admin/settings/theming" class="list-group-item ">
                            <i class="icon fa fa-star"></i>
                            الهوية والألوان
                        </a>
                                            
                        
                        <a href="/admin/settings/compliance" class="list-group-item ">
                            <i class="icon fa fa-shield"></i>
                            الامتثال
                        </a>
                                                                        <div class="list-group-separator" style="margin: 5px 0;"></div>
                                                    
                        
                        <a href="/admin/settings/whatsApp" class="list-group-item ">
                            <i class="icon fa fa-whatsapp"></i>
                            WhatsApp
                        </a>
                                            
                        
                        <a href="/admin/settings/sms" class="list-group-item ">
                            <i class="icon fa fa-comment"></i>
                            SMS
                        </a>
                                            
                        
                        <a href="/admin/settings/callCenter" class="list-group-item ">
                            <i class="icon fa fa-phone"></i>
                            Call Center
                        </a>
                                    </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-9">
                
                
                        
        
        <form ng-app="app" ng-controller="controller" action="/admin/settings/general/save" method="POST" enctype="multipart/form-data" class="form-horizontal ng-pristine ng-valid ng-scope">

            <input type="hidden" name="_token" value="6I8KuRvpEnoyRVC225dOQkQoGVsawtWiBQaPkLMj" autocomplete="off">

	        <div class="container-fluid">
		        
		        <div class="row">
			        <div class="col-xs-12 col-md-4 control-label">
				        <label>شعار المؤسسة</label>
				        <div class="help-block">
					        اختيار أو تغيير شعار المؤسسة
				        </div>
			        </div>
			        <div class="col-xs-12 col-md-6 form-group">
				        <div class="flex">
					        <div class="margin-after-20">
						        <img src="https://d2cpa763trvgaw.cloudfront.net/a2z-9nyzpz/logo.png?v=EAjG3GpCAppSlhT" id="logoPreview" class="img-rounded" style="max-width: 120px;" alt="">
					        </div>

					        <div style="overflow: hidden">
						        <input name="logo" id="newLogo" type="file" accept="image/*">
						        <div class="margin-top-15 small text-muted">
							        الانواع المدعومة: JPG, JPEG, PNG. <br>
							        اقصي حجم للملف: 3 Mp
						        </div>
					        </div>
				        </div>
			        </div>
		        </div>

		        
		        <div class="row">
			        <div class="col-xs-12 col-md-4 control-label">
				        <label>اللغة الإفتراضية للواجهة</label>
			        </div>
			        <div class="col-xs-12 col-md-6 form-group">
				        <select class="form-control" name="default_language"><option value="en">English</option><option value="ar" selected="selected">العربية</option></select>
			        </div>
		        </div>

		        
		        <div class="row">
			        <div class="col-xs-12 col-md-4 control-label">
				        <label>البريد الإلكتروني الرئيسي للمؤسسة</label>
			        </div>
			        <div class="col-xs-12 col-md-6 form-group">
						<div class="flex flex-margin-items-15 flex-align-items-center">
							<input name="email" type="email" value="yousseffathy725@gmail.com" class="form-control" dir="ltr">

							<!-- ngIf: emailVerification.status == 'verified' -->

							<!-- ngIf: emailVerification.status === 'not-listed' -->
						</div>
			        </div>
		        </div>

                <hr>

				
		        <div class="row">
			        <div class="col-xs-12 col-md-4 control-label">
				        <label>بوابة الدفع</label>
				        <div class="help-block">
					        بوابة المدفوعات الإلكترونية المستخدمة للتحصير والدفع عبر الإنترنت
				        </div>
			        </div>
			        <div class="col-xs-12 col-md-4 form-group">
													
                            <div class="flex flex-margin-items-10">
                                <div style="width: 100%">
                                    <select class="form-control" name="default_payment_gateway"><option value="" selected="selected">لا شئ</option><option value="hyperpay">HyperPay</option><option value="fawry">فوري</option><option value="geidea">Geidea</option><option value="easykash">EasyKash</option><option value="cowpay">CowPay</option><option value="kashier">Kashier</option><option value="paymob">PayMob</option><option value="paytabs">PayTabs</option><option value="moyasar">مُيسر</option><option value="stspayone">STS PayOne</option><option value="paypal">PayPal</option><option value="instapay-unofficial">إنستاباي (غير رسمي)</option></select>
                                </div>

                                                            </div>

									        </div>
		        </div>

                
                <div class="row">
                    <div class="col-xs-12 col-md-4 control-label">
                        <label>مقدم خدمة الفصول الإفتراضية</label>
                        <div class="help-block">
                            الآداة او الخدمة التي سيتم تقديم الفصول الإفتراضية او التعليم عبر الإنترنت من خلالها (مثل Zoom).
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4 form-group">
                        <a href="/admin/settings/vc" class="btn btn-sm btn-default">
                            <i class="fa fa-cog"></i> ضبط
                        </a>
                    </div>
                </div>

				
				<div class="row">
					<div class="col-xs-12 col-md-4 control-label">
						<label>بوابة إرسال رسائل البريد الإفتراضية</label>
						<div class="help-block">
							البوابة الإفتراضية لإرسال رسائل البريد الإلكتروني. الطريقة الإفتراضية
		 هي من خلال مخدم النظام نفسه، ويمكنك إستخدام
		 خدمة طرف ثالث مثل MailGun أو SparkPost.
						</div>
					</div>
					<div class="col-xs-12 col-md-4 form-group">
						
						<select class="form-control" name="default_mail_provider"><option value="system" selected="selected">System</option><option value="mailgun">MailGun</option></select>
					</div>
				</div>

				
				<div class="row">
					<div class="col-xs-12 col-md-4 control-label">
						<label>مقدم خدمة التكامل مع WhatsApp</label>
						<div class="help-block">
							الخدمة التي ستستخدمها لإرسال رسائل الـ WhatsApp
						</div>
					</div>
					<div class="col-xs-12 col-md-4 form-group">
                        <a href="/admin/settings/whatsApp" class="btn btn-sm btn-default">
                            <i class="fa fa-cog"></i> ضبط
                        </a>
					</div>
				</div>

				
				<div class="row">
					<div class="col-xs-12 col-md-4 control-label">
						<label>مقدم خدمة رسائل الـ SMS</label>
						<div class="help-block">
							بوابة الإرسال التي ستستخدمها لإرسال رسائل الـ SMS
						</div>
					</div>
					<div class="col-xs-12 col-md-4 form-group">
                        <a href="/admin/settings/sms" class="btn btn-sm btn-default">
                            <i class="fa fa-cog"></i> ضبط
                        </a>
					</div>
				</div>

				
				<div class="row">
					<div class="col-xs-12 col-md-4 control-label">
						<label>خدمة الـ Call-center</label>
						<div class="help-block">
							الآدة او الخدمة المستخدمة لإدارة مركز الإتصال او الـ Call-center
						</div>
					</div>
					<div class="col-xs-12 col-md-4 form-group">
                        <a href="/admin/settings/callCenter" class="btn btn-sm btn-default">
                            <i class="fa fa-cog"></i> ضبط
                        </a>
					</div>
				</div>

                <hr>

		        <div class="row">
			        <div class="col-xs-12 col-md-4 control-label">
			        </div>
			        <div class="col-xs-12 col-md-6 form-group">
				        <button class="btn btn-primary" type="submit">
					        <i class="fa fa-check"></i> حفظ الإعدادات				        </button>
			        </div>
		        </div>
	        </div>

        </form>
                </div>
        </div>

            </div>
</div>

<?php
// تضمين footer template
include_once __DIR__ . '/../templates/footer.php';
?>
