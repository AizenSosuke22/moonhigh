<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | Moonhigh</title>
    <link rel="icon" type="image/x-icon" href="{{url('/images/logo.png')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://kit.fontawesome.com/99be30e45a.js" crossorigin="anonymous"></script>
    @vite(
        [
            'resources/css/app.css', 
            'resources/js/app.js',
            'resources/js/menu.js',
        ]
    )

    <style>
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            background-color: transparent;
            min-width: 160px;
            padding: 14px 0;
            z-index: 1;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }

        .bgimage{
            background-image: url('images/backgroundheader.png');
            background-repeat: no-repeat;
            background-size: cover;
            background-color: #a288a6e7;
            background-blend-mode: multiply;
        }

        @media (min-width: 768px) {
            .bgimage {
                background-image: none;
                background-color: white;
            }
        }
    </style>
</head>
<body class="font-readex" id="app">

    <div id="mainmenu" class="sm:hidden lg:hidden fixed z-[1000] w-full h-full bg-[#00000046] text-[#231f1e] top-0 left-0">
        <div class="bg-white overflow-x-hidden relative sm:w-full sm:max-w-[400px] md:max-w-full md:w-[50%] h-full ml-auto" dir="rtl">
            <div class="flex justify-between items-center py-4 px-4 border-b border-[#d9d9d9]">
                <h1 class="font-[600] text-[14px]">القائمة الرئيسية</h1>
                <i id="close" class="fa-solid fa-xmark block text-[18px] cursor-pointer"></i>
            </div>
            <ul class="block w-full h-fit *:border-[#f7f7f7] *:text-[12px] *:font-[700]">
                <li class="block py-[18px] px-4 border-b text-[#ff5757]"><a href="{{ url('/promotion') }}">تخفيضات</a></li>
                <li class="block py-[18px] px-4 border-b"><a class="block" href="{{ url('/services') }}">جميع الخدمات</a></li>
                <li class="block py-[18px] px-4 border-b"><a class="block" href="{{ url('/ourproducts') }}">المنتجات</a></li>
                <li class="itemdev flex items-center justify-between py-[18px] px-4 border-b cursor-pointer">
                    <h1>خدمات الشعر</h1>
                    <i class="fa-solid fa-chevron-left text-[#999999] text-[12px]"></i>
                </li>
                <li class="itemdev flex items-center justify-between py-[18px] px-4 border-b cursor-pointer">
                    <h1>المعالجات</h1>
                    <i class="fa-solid fa-chevron-left text-[#999999] text-[12px]"></i>
                </li>
                <li class="itemdev flex items-center justify-between py-[18px] px-4 border-b cursor-pointer">
                    <h1>المكياج</h1>
                    <i class="fa-solid fa-chevron-left text-[#999999] text-[12px]"></i>
                </li>
                <li class="itemdev flex items-center justify-between py-[18px] px-4 border-b cursor-pointer">
                    <h1>قسم العناية</h1>
                    <i class="fa-solid fa-chevron-left text-[#999999] text-[12px]"></i>
                </li>
                <li class="itemdev flex items-center justify-between py-[18px] px-4 border-b cursor-pointer">
                    <h1>بكجات العروس</h1>
                    <i class="fa-solid fa-chevron-left text-[#999999] text-[12px]"></i>
                </li>
            </ul>
            <div id="submenu" class="hidden absolute top-0 left-0 w-full h-full bg-[white]">
                <div class="flex justify-between items-center py-4 px-4 border-b border-[#d9d9d9]">
                    <h1 id="menutitle" class="font-[600] text-[14px]">القائمة الرئيسية</h1>
                    <i id="subback" class="fa-solid fa-chevron-left block text-[18px] cursor-pointer"></i>
                </div>
                <ul id="menuul" class="block w-full h-fit *:border-[#f7f7f7] *:text-[12px] *:font-[700]">
                    <li class="block py-[18px] px-4 border-b"><a href="#">عرض الكل</a></li>
                    <li class="block py-[18px] px-4 border-b"><a href="#">تساريح الشعر</a></li>
                    <li class="block py-[18px] px-4 border-b"><a href="#">صبغات الشعر</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="bg-[#a288a6] text-center py-[6px] font-[600] sm:text-[12px] md:text-[14px] lg:text-[15px] px-4">دلعي نفسك بخصم <span class="text-white">30%</span> على جميع الخدمات</div>
    <div class="bg-white py-2 px-4 flex items-center justify-end">
        <div class="relative sm:w-full lg:w-[500px]">
            <searchfield />
        </div>
        <ul class="xs:hidden lg:flex w-fit *:mx-3 text-[14px] font-[400]">            
            <li>
                <a href="#">موقع الصالون</a>
            </li>
            <li>
                <a href="#">أوقات العمل</a>
            </li>
            <li>
                <a href="#">من نحن</a>
            </li>
        </ul>
    </div>
    <div class="bg-[#c5bfc7] flex items-center py-1 px-4" dir="rtl">
        <img class="block w-[40px] object-cover ml-[40px]" src="{{ url('/images/logo.png') }}" alt="">
        <ul id="mainnav" class="xs:hidden lg:flex w-fit relative *:mx-2 text-[14px] font-[500] text-white">            
            <li class="text-[#ff5757]">
                <a href="{{ url('/promotion') }}">تخفيضات</a>
            </li>
            <li>
                <a href="{{ url('/services') }}">جميع الخدمات</a>
            </li>
            <li>
                <a href="{{ url('ourproducts') }}">المنتجات</a>
            </li>
            <li class="dropdown relative">
                <a href="{{ url('/services/خدمات الشعر') }}" class="dropdown-toggle">خدمات الشعر</a>
                <div class="dropdown-menu">
                    <ul class="overflow-hidden w-fit min-w-[220px] *:text-[12px] rounded-b-lg border-t-[1px] bg-white shadow-md">
                        <li class="text-black px-[25px] py-[12px] font-[300] cursor-pointer hover:bg-[#c5bfc71c]">
                            <a class="block" href="{{ url('/services/تساريح الشعر') }}">تساريح الشعر</a>
                        </li>
                        <li class="text-black px-[25px] py-[12px] font-[300] cursor-pointer hover:bg-[#c5bfc71c]">
                            <a class="block" href="{{ url('/services/صبغات الشعر') }}">صبغات الشعر</a>
                        </li>
                        <li class="text-black px-[25px] py-[12px] font-[300] cursor-pointer hover:bg-[#c5bfc71c]">
                            <a class="block" href="{{ url('/services/العناية بالشعر') }}">العناية بالشعر</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="dropdown relative">
                <a href="{{ url('/services/المعالجات') }}" class="dropdown-toggle">المعالجات</a>
                <div class="dropdown-menu">
                    <ul class="overflow-hidden w-fit min-w-[220px] *:text-[12px] rounded-b-lg border-t-[1px] bg-white shadow-md">
                        <li class="text-black px-[25px] py-[12px] font-[300] cursor-pointer hover:bg-[#c5bfc71c]">
                            <a class="block" href="{{ url('/services/المعالجات الحارة') }}">المعالجات الحارة</a>
                        </li>
                        <li class="text-black px-[25px] py-[12px] font-[300] cursor-pointer hover:bg-[#c5bfc71c]">
                            <a class="block" href="{{ url('/services/المعالجات الباردة') }}">المعالجات الباردة</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="dropdown relative">
                <a href="{{ url('/services/المكياج') }}" class="dropdown-toggle">المكياج</a>
                <div class="dropdown-menu">
                    <ul class="overflow-hidden w-fit min-w-[220px] *:text-[12px] rounded-b-lg border-t-[1px] bg-white shadow-md">
                        <li class="text-black px-[25px] py-[12px] font-[300] cursor-pointer hover:bg-[#c5bfc71c]">
                            <a class="block" href="{{ url('/services/مكياج أساسي') }}">مكياج أساسي</a>
                        </li>
                        <li class="text-black px-[25px] py-[12px] font-[300] cursor-pointer hover:bg-[#c5bfc71c]">
                            <a class="block" href="{{ url('/services/مكياج مؤقت') }}">مكياج مؤقت</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="dropdown relative">
                <a href="{{ url('/services/قسم العناية') }}" class="dropdown-toggle">قسم العناية</a>
                <div class="dropdown-menu">
                    <ul class="overflow-hidden w-fit min-w-[220px] *:text-[12px] rounded-b-lg border-t-[1px] bg-white shadow-md">
                        <li class="text-black px-[25px] py-[12px] font-[300] cursor-pointer hover:bg-[#c5bfc71c]">
                            <a class="block" href="{{ url('/services/عناية بالأيدي والأرجل') }}">عناية بالأيدي والأرجل</a>
                        </li>
                        <li class="text-black px-[25px] py-[12px] font-[300] cursor-pointer hover:bg-[#c5bfc71c]">
                            <a class="block" href="{{ url('/services/حمام مغربي') }}">حمام مغربي</a>
                        </li>
                        <li class="text-black px-[25px] py-[12px] font-[300] cursor-pointer hover:bg-[#c5bfc71c]">
                            <a class="block" href="{{ url('/services/تنظيف البشرة') }}">تنظيف البشرة</a>
                        </li>
                        <li class="text-black px-[25px] py-[12px] font-[300] cursor-pointer hover:bg-[#c5bfc71c]">
                            <a class="block" href="{{ url('/services/إزالة الشعر') }}">إزالة الشعر</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="dropdown relative">
                <a href="{{ url('/services/بكجات العروس') }}" class="dropdown-toggle">بكجات العروس</a>
                <div class="dropdown-menu">
                    <ul class="overflow-hidden w-fit min-w-[220px] *:text-[12px] rounded-b-lg border-t-[1px] bg-white shadow-md">
                        <li class="text-black px-[25px] py-[12px] font-[300] cursor-pointer hover:bg-[#c5bfc71c]">
                            <a class="block" href="{{ url('/services/الملكة') }}">الملكة</a>
                        </li>
                        <li class="text-black px-[25px] py-[12px] font-[300] cursor-pointer hover:bg-[#c5bfc71c]">
                            <a class="block" href="{{ url('/services/عروس VIP') }}">عروس VIP</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
        <div class="w-fit flex mr-auto gap-x-2">
            <a href="{{ url('/wishlist') }}" class="block w-fit h-fit"><img class="size-[22px] object-cover" src="{{ url('/icons/wishlist.png') }}" alt=""></a>
            <a href="{{ url('/login') }}" class="block w-fit h-fit"><img class="size-[22px] object-cover" src="{{ url('/icons/user.png') }}" alt=""></a>
        </div>
        <div id="open" class="text-white flex items-center justify-center text-[20px] cursor-pointer mr-2 sm:block lg:hidden">
            <img src="{{ url('icons/menu.svg') }}" alt="">
        </div>
    </div>
    @yield('body')
    <footer class="bg-[#f3f4f6] font-readex font-[500] text-[#374151]" dir="rtl">
        <div class="container px-6 pt-[60px] pb-[20px] mx-auto">
            <div class="lg:flex">
                <div class="w-full -mx-6 lg:w-2/5">
                    <div class="px-6">
                        <a href="#" class="mb-4 block">
                            القمر العالي
                        </a>
    
                        {{-- <p class="max-w-sm mt-2 font-[300] text-[14px]">تجميل فائق في صالون القمر العالي ! احجزي الآن لتجربة جمال متميزة.</p> --}}
                        <p class="max-w-sm mt-1 font-[400] text-[14px]">
                            استمتع بسحر Moon High: ملتقى الاستثنائيين. انغمس في جمال الهدوء، حيث ينحت حرفيونا أسلوبك ليبرز جاذبيتك. اكتشف جمالك ورونقك الفريد - Moon High يتجاوز العادي بتجربة استثنائية.
                        </p>
                    </div>
                </div>
    
                <div class="mt-6 lg:mt-0 lg:flex-1">
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-4">
                        <div>
                            <h3 class="uppercase mb-4">روابط مهمة</h3>
                            <a href="#" class="block mt-2 text-sm font-[400]">رابط1</a>
                            <a href="#" class="block mt-2 text-sm font-[400]">رابط1</a>
                            <a href="#" class="block mt-2 text-sm font-[400]">رابط1</a>
                            <a href="#" class="block mt-2 text-sm font-[400]">رابط1</a>
                        </div>
    
                        <div>
                            <h3 class="uppercase mb-4">أهم المنتوجات</h3>
                            <a href="#" class="block mt-2 text-sm font-[400]">رابط1</a>
                            <a href="#" class="block mt-2 text-sm font-[400]">رابط1</a>
                            <a href="#" class="block mt-2 text-sm font-[400]">رابط1</a>
                            <a href="#" class="block mt-2 text-sm font-[400]">رابط1</a>
                        </div>
    
                        <div>
                            <h3 class="uppercase mb-4">تواصل معنا</h3>
                            <a href="#" class="block mt-2 text-sm font-[400]">رابط1</a>
                            <a href="#" class="block mt-2 text-sm font-[400]">رابط1</a>
                            <a href="#" class="block mt-2 text-sm font-[400]">رابط1</a>
                            <a href="#" class="block mt-2 text-sm font-[400]">رابط1</a>
                        </div>
    
                        {{-- <div>
                            <h3 class="uppercase mb-4">تابعنا عل</h3>
                            <a href="#" class="block mt-2 text-sm font-[400]">رابط1</a>
                            <a href="#" class="block mt-2 text-sm font-[400]">رابط1</a>
                            <a href="#" class="block mt-2 text-sm font-[400]">رابط1</a>
                            <a href="#" class="block mt-2 text-sm font-[400]">رابط1</a>
                        </div> --}}
                    </div>
                </div>
            </div>
    
            <hr class="h-px mt-6 mb-4 bg-gray-200 border-none">
    
            <div>
                <p class="text-center font-[400] text-[14px]">©  القمر العالي 2024 - جميع الحقوق محفوظة</p>
            </div>
        </div>
    </footer>
</body>
</html>