<?php
// إعداد المتغيرات
$pageTitle = 'الذكاء الاصطناعي';
$includeSessionCheck = true;
$includeCSRFRefresh = true;

// تضمين القوالب
include_once __DIR__ . '/../../templates/header.php';
include_once __DIR__ . '/../../templates/sidebar.php';
?>

<div id="container" class="container-fluid">
<div id="content" class="">
                    <div id="pageTitle" class="d-flex flex-gap-15 flex-wrap flex-rows flex-column-on-mobile align-items-center justify-content-between">
        <div class="flex-grow-1">
            <i class="icon fa fa-sliders"></i>
            <span class="title">الإدارة</span>

                            
                <ul class="breadcrumb inline" style="margin: 0">
                    <li class="breadcrumb-item"></li>

                                            <li class="breadcrumb-item">✨ الذكاء الاصطناعي</li>
                                    </ul>
                    </div>

        <div class="d-flex justify-content-center">
            <div>
                
                            </div>
        </div>
    </div>
        <div class="row">
            
            <div class="col-sm-12 col-md-3">
                <div id="current-balance" class="block style2">
                    <div class="block-body">
                        <div class="text-center" style="padding: 20px 0">
                            <h4 class="margin-top-0 margin-bottom-5">الرصيد المتاح</h4>
                            <h1 dir="ltr" class="margin-bottom-0 text-danger">
                                0
                            </h1>
                            <small class="text-muted">توكن</small>
                        </div>

                                                    <hr>
                            <div class="text-center">
                                <p class="small text-muted mb-10">جرّب ميزات الذكاء الاصطناعي مع هدية توكنات مجانية لمرة واحدة!</p>
                                <form action="/admin/subscription/ai/claimFreeCredit" method="POST">
                                    <input type="hidden" name="_token" value="6I8KuRvpEnoyRVC225dOQkQoGVsawtWiBQaPkLMj">                                    <button type="submit" class="btn btn-success btn-sm" disable-on-ajax="">
                                        <i class="fa fa-gift"></i> احصل على 500,000 توكن مجاناً
                                    </button>
                                </form>
                            </div>
                        
                                            </div>
                </div>
            </div>

            
            <div class="col-sm-12 col-md-9">
                <div class="block style3">
                    <div class="block-title">
                        <span class="title">شراء رصيد</span>
                    </div>
                    <div class="block-body">
                        <div id="token-packs" class="row">
                                                            <div class="col-xs-12 col-sm-6 col-md-3">
                                    <div class="pack block style2 mb-0">
                                        <div class="block-body" style="padding: 25px !important;">
                                            <h4 class="text-strong">Starter</h4>
                                            <h2 class="mt-15 mb-0 text-primary">500,000</h2>
                                            <small class="text-muted">توكن</small>

                                            <div class="mt-10 mb-10">
                                                                                                    <div class="small text-muted">
                                                        ~667
                                                        التحقق من صورة إيصال تحويل InstaPay
                                                    </div>
                                                                                                    <div class="small text-muted">
                                                        ~100
                                                        استيراد الأسئلة بالذكاء الاصطناعي
                                                    </div>
                                                                                            </div>

                                            <div class="mt-15">
                                                <h4 class="text-brand mb-15 text-strong">
                                                    100 EGP
                                                </h4>

                                                <form action="/admin/subscription/ai/purchase" method="POST" style="display: inline">
                                                    <input type="hidden" name="_token" value="6I8KuRvpEnoyRVC225dOQkQoGVsawtWiBQaPkLMj">                                                    <input type="hidden" name="pack_id" value="1">
                                                    <button type="submit" class="btn btn-primary" disable-on-ajax="">
                                                        <i class="fa fa-cart-plus"></i> شراء رصيد
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                                            <div class="col-xs-12 col-sm-6 col-md-3">
                                    <div class="pack block style2 mb-0">
                                        <div class="block-body" style="padding: 25px !important;">
                                            <h4 class="text-strong">Standard</h4>
                                            <h2 class="mt-15 mb-0 text-primary">1,000,000</h2>
                                            <small class="text-muted">توكن</small>

                                            <div class="mt-10 mb-10">
                                                                                                    <div class="small text-muted">
                                                        ~1,333
                                                        التحقق من صورة إيصال تحويل InstaPay
                                                    </div>
                                                                                                    <div class="small text-muted">
                                                        ~200
                                                        استيراد الأسئلة بالذكاء الاصطناعي
                                                    </div>
                                                                                            </div>

                                            <div class="mt-15">
                                                <h4 class="text-brand mb-15 text-strong">
                                                    200 EGP
                                                </h4>

                                                <form action="/admin/subscription/ai/purchase" method="POST" style="display: inline">
                                                    <input type="hidden" name="_token" value="6I8KuRvpEnoyRVC225dOQkQoGVsawtWiBQaPkLMj">                                                    <input type="hidden" name="pack_id" value="2">
                                                    <button type="submit" class="btn btn-primary" disable-on-ajax="">
                                                        <i class="fa fa-cart-plus"></i> شراء رصيد
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                                            <div class="col-xs-12 col-sm-6 col-md-3">
                                    <div class="pack block style2 mb-0">
                                        <div class="block-body" style="padding: 25px !important;">
                                            <h4 class="text-strong">Pro</h4>
                                            <h2 class="mt-15 mb-0 text-primary">5,000,000</h2>
                                            <small class="text-muted">توكن</small>

                                            <div class="mt-10 mb-10">
                                                                                                    <div class="small text-muted">
                                                        ~6,667
                                                        التحقق من صورة إيصال تحويل InstaPay
                                                    </div>
                                                                                                    <div class="small text-muted">
                                                        ~1,000
                                                        استيراد الأسئلة بالذكاء الاصطناعي
                                                    </div>
                                                                                            </div>

                                            <div class="mt-15">
                                                <h4 class="text-brand mb-15 text-strong">
                                                    1,000 EGP
                                                </h4>

                                                <form action="/admin/subscription/ai/purchase" method="POST" style="display: inline">
                                                    <input type="hidden" name="_token" value="6I8KuRvpEnoyRVC225dOQkQoGVsawtWiBQaPkLMj">                                                    <input type="hidden" name="pack_id" value="3">
                                                    <button type="submit" class="btn btn-primary" disable-on-ajax="">
                                                        <i class="fa fa-cart-plus"></i> شراء رصيد
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                                    </div>

                        <div class="small text-muted mt-15">
                            <i class="fa fa-info-circle"></i>
                            الاستخدامات المقدّرة لكل ميزة مستقلة — كل تقدير يفترض استخدام الباقة بالكامل لتلك الميزة وحدها.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="row mt-20">
            <div class="col-sm-12 col-md-8">
                <div class="block style2">
                    <div class="block-title">
                        <i class="icon fa fa-history"></i>
                        <span class="title">سجل الاستخدام الأخير</span>
                    </div>
                    <div class="block-body p-0">
                                                    <div class="p-20">
                                <div class="text-muted text-center">
                                    لا يوجد استخدام مسجل بعد
                                </div>
                            </div>
                                            </div>
                </div>
            </div>
        </div>
            </div>
</div>


<?php
// تضمين footer template
include_once __DIR__ . '/../../templates/footer.php';
?>
