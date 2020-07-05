<?php
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Http\Request;
?>

<?php $__env->startSection('title','پروفایل'); ?>
<?php $__env->startSection('profile_assets'); ?>
    <link href="<?php echo e(asset('style/profile/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css">
    <script src="<?php echo e(asset('style/profile/script.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div  class="mt-3">
        <div id="wrapper">
            <nav class="navbar navbar-dark align-items-start sidebar  sidebar-dark accordion bg-gradient-primary p-0">
                <div class="container-fluid d-flex flex-column justify-content-start p-0">
                    <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                        <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                        <div class="sidebar-brand-text mx-3"><span>فروشگاه لوازم خانگی</span></div>
                    </a>
                    <hr class="divider my-0">
                    <ul class="nav navbar-nav text-light" id="accordionSidebar">
                        <li class="nav-item" role="presentation"><a class="nav-link  text-right" href="<?php echo e(url('profile')); ?>"><i class="fa fa-user"></i><span class="mr-1">اطلاعات حساب</span></a></li>

                        <li class="nav-item" role="presentation"><a class="nav-link active text-right" href="<?php echo e(url('address')); ?>"><i class="fa fa-user"></i><span class="mr-1">جزئیات آدرس</span></a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link  text-right" href="<?php echo e(url('purchasesUser')); ?>"><i class="fa fa-shopping-cart"></i><span class="mr-1">خرید های شما</span></a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link text-right" href="<?php echo e(url('/')); ?>"><i class="fa fa-home"></i><span class="mr-1">صفحه اصلی</span></a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link text-right" href="#"><i class="fa fa-home"></i><span class="mr-1">محصولات مناسب شما</span></a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link text-right" href="<?php echo e(url('logout')); ?>"><i class="fas fa-sign-out-alt"></i><span class="mr-1">خروج</span></a></li>
                    </ul>
                </div>
            </nav>
            <div class="d-flex flex-column  justify-content-end" id="content-wrapper">
                <div id="content">

                    <div class="container-fluid">

                        <div class="row mb-3">
                            <div class="col-lg-8">
                                <div class="card mb-3">
                                    <div class="card-header text-center">جزئیات آدرس</div>
                                    <div class="card-body text-right shadow">
                                        <?php if($errors->any()): ?>
                                            <div class="alert alert-danger">
                                                <ul>
                                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li><?php echo e($error); ?></li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            </div>
                                        <?php endif; ?>
                                            <?php if(session('message')): ?>
                                                <div class="alert alert-success">
                                                   <?php echo e(session('message')); ?>

                                                </div>
                                            <?php endif; ?>

                                        <h6>لطفا جزئیات آدرس را وارد کنید.</h6>
                                        <form method="post" action="<?php echo e(url('address')); ?>" enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group text-right"><label for="first_name"><strong>استان</strong>*</label>
                                                        <select id="ostan" name="ostan" onchange="Func()">
                                                            <option   value="البرز" data_city="آسارا , اشتهارد , چهارباغ , شهر جدید هشتگرد , طالقان , کرج , کمال‌شهر , کوهسار , گرمدره , ماهدشت , محمدشهر , مشکین‌دشت , نظرآباد , هشتگرد">البرز</option>
                                                            <option value="آذربایجان شرقی" data_city="آبش‌احمد , آذرشهر , آقکند , اسکو , اهر , ایلخچی , باسمنج , بخشایش , بستان‌آباد , بناب , بناب جدید , تبریز , ترک , ترکمانچایتسوج , تیکمه‌داش , جلفا , خاروانا , خامنه , خراجو , خسروشهر , خضرلو , خمارلو , خواجه , دوزدوزان , زرنق , زنوز , سراب , سردرود , سهند , سیس , سیه‌رود , شبستر , شربیان , شرفخانه , شندآباد , صوفیان , عجب‌شیر , قره‌آغاج , کشکسرای , کلوانق , کلیبر , کوزه‌کنان , گوگان , لیلان , مراغه , مرند , ملکان , ملک‌کیان , ممقان , مهربان , میانه , نظرکهریزی , وایقان , ورزقان , هادیشهر , هرگلان , هریس , هشترود , هوراند , یامچی">آذربایجان شرقی</option>
                                                            <option value="آذربایجان غربی" data_city="آواجیق , ارومیه , اشنویه , ایواوغلی , باروق , بازرگان , بوکان , پلدشت , پیرانشهر , تازه‌شهر , تکاب , چهاربرج , خوی , ربط , سردشت , سرو , سلماس , سیلوانه , سیمینه , سیه‌چشمه , شاهین‌دژ , شوط , فیرورق , قره‌ضیاءالدین , قوشچی , کشاورز , گردکشانه , ماکو , محمدیار , محمودآباد , مهاباد , میاندوآب , میرآباد , نالوس , نقده , نوشین‌شهر">آذربایجان غربی</option>
                                                            <option value="اردبیل" data_city="خلخال , آبی‌بیگلو , اردبیل , اصلاندوز , بیله‌سوار , پارس‌آباد , تازه‌کند , تازه‌کند انگوت , جعفرآباد , رضی , سرعین , عنبران , فخرآباد , کلور , کوراییم , گرمی , گیوی , لاهرود , مشگین‌شهر , نمین , نیر , هشتجین , هیر">اردبیل</option>
                                                            <option value="اصفهان" data_city="ابریشم , اردستان , اژیه , اصفهان , افوس , انارک , ایمان‌شهر , بادرود , باغ بهادران , برف‌انبار , بهاران‌شهر , بهارستان , بویین و میاندشت , پیربکران , تودشک , تیران , جندق , جوزدان , چادگان , چرمهین , چم گردان , حبیب‌آباد , حسن‌آباد , حنا , خالدآباد , خمینی‌شهر , خوانسار , خور , خوراسگان , خورزوق , داران , دامنه , درچه‌پیاز , دستگرد , دهاقان , دهق , دولت‌آباد , دیزیچه , رزوه , رضوان‌شهر , زاینده‌رود , زرین‌شهر , زواره , زیباشهر , سده لنجان , سگزی , سمیرم , شاهین‌شهر , شهرضا , طالخونچه , عسگران , علویجه , فریدون‌شهر , فلاورجان , فولادشهر , قهدریجان , کاشان , کرکوند , کلیشاد و سودرجان , کمشجه , کمه , کهریزسنگ , کوشک , کوهپایه , گز , گلپایگان , گل‌دشت , گل‌شهر , گوگد , مبارکه , محمدآباد , مشکات , منظریه , مهاباد , میمه , نایین , نجف‌آباد , نصرآباد , نطنز , نیک‌آباد , ورزنه , ورنامخواست , وزوان , ونک , هرند">اصفهان</option>
                                                            <option value="ایلام" data_city="آبدانان , آسمان‌آباد , ارکواز , ایلام , ایوان , بدره , پهله , توحید , چوار , دره‌شهر , دلگشا , دهلران , زرنه , سرابله , سراب‌باغ , صالح‌آباد , لومار , مورموری , موسیان , مهران , میمه">ایلام</option>
                                                            <option value="بوشهر" data_city="آب‌پخش , آبدان , امام حسن , اهرم , برازجان , بردخون , بردستان , بندر بوشهر , بندر دیر , بندر دیلم , بندر ریگ , بندر کنگان , بندر گناوه , تنگ ارم , جم , چغادک , خارک , خورموج , دالکی , دلوار , ریز , سعدآباد , شبانکاره , شنبه , طاهری , عسلویه , کاکی , کلمه , نخل تقی , وحدتیه">بوشهر</option>
                                                            <option value="تهران" data_city="آبسرد , آبعلی , ارجمند , اسلام‌شهر , اندیشه , باغستان , باقرشهر , بومهن , پاکدشت , پردیس , پیشوا , تجریش , تهران , جوادآباد , چهاردانگه , حسن‌آباد , دماوند , رباطکریم , رودهن , شاهدشهر , شریف‌آباد , شهرری , شهریار , صالح‌آباد , صباشهر , صفادشت , فردوسیه , فشم , فیروزکوه , قدس , قرچک , کهریزک , کیلان , گلستان , لواسان , ملارد , نسیم‌شهر , نصیرآباد , وحیدیه , ورامین">تهران</option>
                                                            <option value="چهارمحال و بختیاری" data_city="اردل , آلونی , باباحیدر , بروجن , بلداجی , بن , جونقان , چلگرد , سامان , سفیددشت , سودجان , سورشجان , شلمزار , شهرکرد , طاقانک , فارسان , فرادنبه , فرخ‌شهر , کیان , گندمان , گهرو , لردگان , مال‌خلیفه , ناغان , نافچ , نقنه , هفشجان">چهارمحال و بختیاری</option>
                                                            <option value="خراسان جنوبی" data_city="آرین‌شهر , ارسک , اسدیه , اسفدن , اسلامیه , آیسک , بشرویه , بیرجند , حاجی‌آباد , خضری دشت بیاض , خوسف , زهان , سرایان , سربیشه , سه‌قلعه , شوسف , طبس مسینا , فردوس , قائن , قهستان , مود , نهبندان , نیمبلوک">خراسان جنوبی</option>
                                                            <option value="خراسان رضوی" data_city="انابد , باجگیران , بار , باخرز , بایگ , بجستان , بردسکن , بیدخت , تایباد , تربت جام , تربت حیدریه , جغتای , جنگل , چاپشلو , چکنه , چناران , خرو , خلیل‌آباد , خواف , داورزن , دررود , درگز , دولت‌آباد , رباط سنگ , رشتخوار , رضویه , رودآب , ریوش , سبزوار , سرخس , سلامی , سلطان‌آباد , سنگان , شادمهر , شاندیز , ششتمد , شهرآباد , صالح‌آباد , طرقبه , عشق‌آباد , فرهادگرد , فریمان , فیروزه , فیض‌آباد , قاسم‌آباد , قدمگاه , قلندرآباد , قوچان , کاخک , کاریز , کاشمر , کدکن , کلات , کندر , گناباد , لطف‌آباد , مشهد , مشهد ریزه , ملک‌آباد , نشتیفان , نصرآباد , نقاب , نوخندان , نیشابور , نیل‌شهر , همت‌آباد">خراسان رضوی</option>
                                                            <option value="خراسان شمالی" data_city="                آشخانه , اسفراین , بجنورد , پیش‌قلعه , جاجرم , حصار گرم‌خان , درق , راز , سنخواست , شوقان , شیروان , صفی‌آباد , فاروج , قاضی , گرمه , لوجلی">خراسان شمالی</option>
                                                            <option value="خوزستان" data_city="آبادان , آغاجاری , اروندکنار , الوان , امیدیه , اندیمشک , اهواز , ایذه , باغ‌ملک , بستان , بندر امام خمینی , بندر ماهشهر , بهبهان , جایزان , جنت‌مکان , چمران , حر ریاحی , حسینیه , حمیدیه , خرمشهر , دزآب , دزفول , دهدز , رامشیر , رامهرمز , رفیع , زهره , سالند , سردشت , سوسنگرد , شادگان , شوش , شوشتر , شیبان , صفی‌آباد , صیدون , قلعه خواجه , قلعه‌تل , گتوند , لالی , مسجدسلیمان , مقاومت , ملاثانی , میانرود , مینوشهر , هفتگل , هندیجان , هویزه , ویس">خوزستان</option>
                                                            <option value="زنجان" data_city="آب‌بر , ابهر , ارمغان‌خانه , چورزق , حلب , خرمدره , دندی , زرین‌آباد , زرین‌رود , زنجان , سجاس , سلطانیه , سهرورد , صائین‌قلعه , قیدار , گرماب , ماه‌نشان , هیدج ">زنجان</option>
                                                            <option value="سمنان" data_city="          آرادان , امیریه , ایوانکی , بسطام , بیارجمند , دامغان , درجزین , دیباج , سرخه , سمنان , شاهرود , شهمیرزاد , کلاته خیج , گرمسار , مجن , مهدی‌شهر , میامی">سمنان</option>
                                                            <option value="سیستان و بلوچستان" data_city="ادیمی , اسپکه , ایرانشهر , بزمان , بمپور , بنت , بنجار , پیشین , جالق , چابهار , خاش , دوست‌محمد , راسک , زابل , زابلی , زاهدان , زهک , سراوان , سرباز , سوران , سیرکان , فنوج , قصرقند , کنارک , گلمورتی , محمد‌آباد , میرجاوه , نصرت‌آباد , نگور , نوک‌آباد , نیک‌شهر">سیستان و بلوچستان</option>
                                                            <option value="فارس" data_city="آباده , آباده طشک , اردکان , ارسنجان , استهبان , اسیر , اشکنان , افزر , اقلید , اهل , اوز , ایج , ایزدخواست , باب انار , بالاده , بنارویه , بهمن , بیرم , بیضا , جنت‌شهر , جهرم , جویم , حاجی‌آباد , خاوران , خرامه , خشت , خنج , خور , خومه‌زار , داراب , داریان , دوزه , دهرم , رامجرد , رونیز , زاهدشهر , زرقان , سده , سروستان , سعادت‌شهر , سورمق , سوریان , سیدان , ششده , شهرپیر , شیراز , صغاد , صفاشهر , علامرودشت , فتح‌آباد , فراشبند , فسا , فیروزآباد , قائمیه , قادرآباد , قطب‌آباد , قیر , کازرون , کامفیروز , کره‌ای , کنارتخته , کوار , گراش , گله‌دار , لارستان , لامرد , لپوئی , لطیفی , مرودشت , مشکان , مصیری , مهر , میمند , نوجین , نودان , نورآباد , نی‌ریز , وراوی , هماشهر">فارس</option>
                                                            <option value="قزوین" data_city="آبگرم , آبیک , آوج , ارداق , اسفرورین , اقبالیه , الوند , بوئین‌زهرا , بیدستان , تاکستان , خاکعلی , خرمدشت , دانسفهان , رازمیان , سگزآباد , سیردان , شال , ضیاءآباد , قزوین , کوهین , محمدیه , محمودآباد نمونه , معلم‌کلایه , نرجه">قزوین</option>
                                                            <option value="قم" data_city="جعفریه , دستجرد , سلفچگان , قم , قنوات , کهک">قم</option>
                                                            <option value="کردستان" data_city="آرمرده , بابارشانی , بانه , بلبان‌آباد , بویین سفلی , بیجار , چناره , دزج , دلبران , دهگلان , دیواندره , زرینه , سروآباد , سریش‌آباد , سقز , سنندج , شویشه , صاحب , قروه , کامیاران , کانی‌دینار , کانی‌سور , مریوان , موچش , یاسوکند">کردستان</option>
                                                            <option value="کرمان" data_city="اختیارآباد , ارزوئیه , امین‌شهر , انار , اندوهجرد , باغین , بافت , بردسیر , بروات , بزنجان , بم , بهرمان , پاریز , جبالبارز , جوزم , جوپار , جیرفت , چترود , خاتون‌آباد , خانوک , خرسند , درب بهشت , دهج , رابر , راور , راین , رفسنجان , رودبار , ریحان‌شهر , زرند , زنگی‌آباد , زیدآباد , سیرجان , شهداد , شهربابک , صفائیه , عنبرآباد , فاریاب , فهرج , قلعه گنج , کاظم‌آباد , کرمان , کشکوئیه , کهنوج , کوهبنان , کیان‌شهر , گلباف , گلزار , ماهان , محمدآباد , محی‌آباد , مردهک , مس سرچشمه , منوجان , نجف‌شهر , نرماشیر , نظام‌شهر , نگار , نودژ , هجدک , یزدان‌شهر">کرمان</option>
                                                            <option value="کرمانشاه" data_city="ازگله , اسلام‌آباد غرب , باینگان , بیستون , پاوه , تازه‌آباد , جوانرود , حمیل , رباط , روانسر , سرپل ذهاب , سرمست , سطر , سنقر , سومار , صحنه , قصر شیرین , کرمانشاه , کرند غرب , کنگاور , کوزران , گهواره , گیلانغرب , میان‌راهان , نودشه , نوسود , هرسین , هلشی">کرمانشاه</option>
                                                            <option value="کهکیلویه و بویراحمد" data_city="باشت , پاتاوه , چرام , چیتاب , دهدشت , دوگنبدان , دیشموک , سوق , سی‌سخت , قلعه رئیسی , گراب سفلی , لنده , لیکک , مارگون , یاسوج">کهگیلویه و بویراحمد</option>
                                                            <option value="گلستان" data_city="آزادشهر ,آق‌قلا ,بندر گز ,ترکمن ,رامیان ,علی‌آباد ,کردکوی ,کلاله ,گرگان ,گنبد کاووس ,مراوه‌تپه ,مینودشت">گلستان</option>
                                                            <option value="گیلام" data_city="آستارا , آستانه اشرفیه , احمدسرگوراب , اسالم , اطاقور , املش , بازارجمعه , بره‌سر , بندر انزلی , پره‌سر , توتکابن , جیرنده , چابکسر , چاف و چمخاله , چوبر , حویق , خشکبیجار , خمام , دیلمان , رانکوه , رحیم‌آباد , رستم‌آباد , رشت , رضوانشهر , رودبار , رودسر , رودبنه , سنگر , سیاهکل , شفت , شلمان , صومعه‌سرا , فومن , کلاچای , کوچصفهان , کومله , کیاشهر , گوراب زرمیخ , لاهیجان , لشت نشا , لنگرود , لوشان , لوندویل , لیسار , ماسال , ماسوله , مرجغل , منجیل , واجارگاه , هشتپر">گیلان</option>
                                                            <option value="لرستان" data_city="زنا , اشترینان , الشتر , الیگودرز , بروجرد , پل‌دختر , چالانچولان , چغلوندی , چقابل , خرم‌آباد , درب گنبد , دورود , زاغه , سپیددشت , سراب‌دوره , فیروزآباد , کونانی , کوهدشت , گراب , معمولان , مومن‌آباد , نورآباد , ویسیان">لرستان</option>
                                                            <option value="مازندران" data_city="آلاشت , آمل , امیرشهر , ایزدشهر , بابل , بابلسر , بلده , بهشهر , بهنمیر , پل سفید , تنکابن , جویبار , چالوس , چمستان , خرم‌آباد , خلیل‌شهر , خوش‌رودپی , دابودشت , رامسر , رستمکلا , رویان , رینه , زرگرمحله , زیرآب , ساری , سرخ‌رود , سلمان‌شهر , سورک , شیرگاه , شیرود , عباس‌آباد , فریدون‌کنار , فریم , قائم‌شهر , کتالم و سادات‌شهر , کلارآباد , کلاردشت , کله‌بست , کوهی‌خیل , کیاسر , کیاکلا , گزنک , گلوگاه , گلوگاه بابل , گتاب , محمودآباد , مرزن‌آباد , مرزیکلا , نشتارود , نکا , نور , نوشهر">مازندران</option>
                                                            <option value="مرکزی" data_city="اراک , آستانه , آشتیان , پرندک , تفرش , توره , خمین , خنداب , داودآباد , دلیجان , رازقان , زاویه , ساوه , سنجانشازند , غرق‌آباد , فرمهین , قورچی‌باشی , کرهرود , کمیجان , مأمونیه , محلات , میلاجرد , نراق , نوبران , نیم‌ورهندودر">مرکزی</option>
                                                            <option value="هرمزگان" data_city="ابوموسی , بستک , بندر چارک , بندر خمیر , بندرعباس , بندر لنگه , پارسیان , جاسک , جناح , حاجی‌آباد , درگهاندهبارز , رویدر , زیارت‌علی , سندرک , سوزا , سیریک , فارغان , فین , قشم , کنگ , کیش , هرمز , هشت‌بندیمیناب">هرمزگان</option>
                                                            <option value="همدان" data_city="ازندریان , اسدآباد , برزول , بهار , تویسرکان , جورقان , جوکار , دمق , رزن , زنگنه , سامن , سرکان , شیرین‌سو , صالح‌آباد , فامنین , فرسفج , فیروزان , قروه درجزین , قهاوند , کبودرآهنگ , گل‌تپه , گیان , لالجین , مریانج , ملایر , مهاجران , نهاوند , همدان">همدان</option>
                                                            <option value="یزد" data_city="ابرکوه , احمدآباد , اردکان , اشکذر , بافق , بهاباد , تفت , حمیدیا , خضرآباد , دیهوک , زارچ , شاهدیه , طبس , عشق‌آباد , عقدا , مروست , مهردشت , مهریز , میبد , ندوشن , نیر , هرات , یزد">یزد</option> </td>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group text-right"><label for="last_name"><strong>شهرستان</strong>*</label>
                                                        <select id="city" name="city" value="<?php echo e(Auth::user()->city); ?>">
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group text-right">
                                                        <label for="first_name"><strong>نشانی پستی</strong>*</label>
                                                        <input class="form-control" type="text" placeholder="" name="neshaniposti" value= "<?php echo e(Auth::user()->neshaniposti); ?>">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group text-right">
                                                        <label for="first_name"><strong>پلاک </strong></label>
                                                        <input class="form-control" type="text" placeholder="" name="pelak" value= "<?php echo e(Auth::user()->pelak); ?>">
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="form-group text-right">
                                                        <label for="first_name"><strong>واحد</strong></label>
                                                        <input class="form-control" type="text" placeholder="" name="vahed" value= "<?php echo e(Auth::user()->vahed); ?>">
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="form-group text-right">
                                                        <label for="first_name"><strong>کد پستی</strong>*</label>
                                                        <input class="form-control" type="text" placeholder="" name="kodeposti" value= "<?php echo e(Auth::user()->kodeposti); ?>">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <input type="submit" class=" btn btn-danger" name="saveAdressdetail" value="ذخیره ">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>


    <?php echo $__env->make('ersal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script>
        function Func() {
            var city = document.getElementById('city');
            var state=document.getElementById('ostan');
            var val=state.options[state.selectedIndex].getAttribute('data_city');
            var arr=val.split(',');
            city.options.length = 0;
            for(i = 0; i < arr.length; i++)
            {
                if(arr[i] != "")
                {
                    city.options[city.options.length]=new Option(arr[i],arr[i]);


                }
            }
        }
        // set selected index of ostan
        var elmnt =  document.getElementById('ostan');
        var ostan = '<?php echo e(Auth::user()->ostan); ?>';
        var city = document.getElementById('city');
        var mycity = '<?php echo e(Auth::user()->city); ?>';

        for(var i=0; i < elmnt.options.length; i++)
        {
            if(ostan == elmnt.options[i].value  ) {

                elmnt.selectedIndex = i;
                var val=elmnt.options[elmnt.selectedIndex].getAttribute('data_city');
                var arr=val.split(',');
                city.options.length = 0;
                for(i = 0; i < arr.length; i++)
                {

                    if(arr[i] != "")
                    {
                        city.options[city.options.length]=new Option(arr[i],arr[i]);
                        if(city.options[i].value.trim() == mycity)
                        {
                            city.selectedIndex = i;
                        }


                    }
                }
                break;
            }
        }


    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\shop-laravel\resources\views/profile/useraddress.blade.php ENDPATH**/ ?>