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
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    @yield('style')
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
    <!-- <div class="bg-[#a288a6] text-center py-[6px] font-[600] sm:text-[12px] md:text-[14px] lg:text-[15px] px-4">دلعي نفسك بخصم <span class="text-white">30%</span> على جميع الخدمات</div> -->
    <div class="bg-[#a288a6] text-center py-[6px] font-[600] sm:text-[12px] md:text-[14px] lg:text-[15px] px-4">{!! preg_replace('/(\d+)%/', '<span class="text-white">$1%</span>', $footerData['title']) !!}</div>
    <div class="bg-white py-2 px-4 flex items-center justify-end">
        <div class="relative sm:w-full lg:w-[500px]">
            <searchfield />
        </div>
        <ul class="xs:hidden lg:flex w-fit *:mx-3 text-[14px] font-[400]">            
            <li>
                <a href="{{ url('/#location') }}">موقع الصالون</a>
            </li>
            <li>
                <a href="{{ url('/#time') }}">أوقات العمل</a>
            </li>
            <li>
                <a href="{{ url('/#who') }}">من نحن</a>
            </li>
        </ul>
    </div>
    <div class="bg-[#c5bfc7] flex items-center py-1 px-4" dir="rtl">
        <a href="{{ url('/') }}" class="block"><img class="block w-[40px] object-cover ml-[40px]" src="{{ url('/images/logo.png') }}" alt=""></a>
        <ul id="mainnav" class="xs:hidden lg:flex w-fit relative *:mx-2 text-[14px] font-[500] text-white">            
            <li class="text-[#ff5757]">
                <a href="{{ url('/promotion') }}">تخفيضات</a>
            </li>
            <li>
                <a href="{{ url('/services') }}">جميع الخدمات</a>
            </li>
            <li>
                <a href="{{ url('/ourproducts') }}">المنتجات</a>
            </li>
            <li class="dropdown relative">
                <a href="{{ url('/subcategories/خدمات الشعر') }}" class="dropdown-toggle">خدمات الشعر</a>
                <div class="dropdown-menu">
                    <ul class="overflow-hidden w-fit min-w-[220px] *:text-[12px] rounded-b-lg border-t-[1px] bg-white shadow-md">
                        <li class="text-black px-[25px] py-[12px] font-[300] cursor-pointer hover:bg-[#c5bfc71c]">
                            <a class="block" href="{{ url('/subcategories/خدمات الشعر#تساريح_الشعر') }}">تساريح الشعر</a>
                        </li>
                        <li class="text-black px-[25px] py-[12px] font-[300] cursor-pointer hover:bg-[#c5bfc71c]">
                            <a class="block" href="{{ url('/subcategories/خدمات الشعر#صبغات_الشعر') }}">صبغات الشعر</a>
                        </li>
                        <li class="text-black px-[25px] py-[12px] font-[300] cursor-pointer hover:bg-[#c5bfc71c]">
                            <a class="block" href="{{ url('/subcategories/خدمات الشعر#العناية_بالشعر') }}">العناية بالشعر</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="dropdown relative">
                <a href="{{ url('/subcategories/المعالجات') }}" class="dropdown-toggle">المعالجات</a>
                <div class="dropdown-menu">
                    <ul class="overflow-hidden w-fit min-w-[220px] *:text-[12px] rounded-b-lg border-t-[1px] bg-white shadow-md">
                        <li class="text-black px-[25px] py-[12px] font-[300] cursor-pointer hover:bg-[#c5bfc71c]">
                            <a class="block" href="{{ url('/subcategories/المعالجات#المعالجات_الحارة') }}">المعالجات الحارة</a>
                        </li>
                        <li class="text-black px-[25px] py-[12px] font-[300] cursor-pointer hover:bg-[#c5bfc71c]">
                            <a class="block" href="{{ url('/subcategories/المعالجات#المعالجات_الباردة') }}">المعالجات الباردة</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="dropdown relative">
                <a href="{{ url('/subcategories/المكياج') }}" class="dropdown-toggle">المكياج</a>
                <div class="dropdown-menu">
                    <ul class="overflow-hidden w-fit min-w-[220px] *:text-[12px] rounded-b-lg border-t-[1px] bg-white shadow-md">
                        <li class="text-black px-[25px] py-[12px] font-[300] cursor-pointer hover:bg-[#c5bfc71c]">
                            <a class="block" href="{{ url('/subcategories/المكياج#مكياج_أساسي') }}">مكياج أساسي</a>
                        </li>
                        <li class="text-black px-[25px] py-[12px] font-[300] cursor-pointer hover:bg-[#c5bfc71c]">
                            <a class="block" href="{{ url('/subcategories/المكياج#مكياج_مؤقت') }}">مكياج مؤقت</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="dropdown relative">
                <a href="{{ url('/subcategories/قسم العناية') }}" class="dropdown-toggle">قسم العناية</a>
                <div class="dropdown-menu">
                    <ul class="overflow-hidden w-fit min-w-[220px] *:text-[12px] rounded-b-lg border-t-[1px] bg-white shadow-md">
                        <li class="text-black px-[25px] py-[12px] font-[300] cursor-pointer hover:bg-[#c5bfc71c]">
                            <a class="block" href="{{ url('/services/قسم العناية#عناية_بالأيدي_والأرجل') }}">عناية بالأيدي والأرجل</a>
                        </li>
                        <li class="text-black px-[25px] py-[12px] font-[300] cursor-pointer hover:bg-[#c5bfc71c]">
                            <a class="block" href="{{ url('/subcategories/قسم العناية#حمام_مغربي') }}">حمام مغربي</a>
                        </li>
                        <li class="text-black px-[25px] py-[12px] font-[300] cursor-pointer hover:bg-[#c5bfc71c]">
                            <a class="block" href="{{ url('/subcategories/قسم العناية#تنظيف_البشرة') }}">تنظيف البشرة</a>
                        </li>
                        <li class="text-black px-[25px] py-[12px] font-[300] cursor-pointer hover:bg-[#c5bfc71c]">
                            <a class="block" href="{{ url('/subcategories/قسم العناية#إزالة_الشعر') }}">إزالة الشعر</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="dropdown relative">
                <a href="{{ url('/subcategories/بكجات العروس') }}" class="dropdown-toggle">بكجات العروس</a>
                <div class="dropdown-menu">
                    <ul class="overflow-hidden w-fit min-w-[220px] *:text-[12px] rounded-b-lg border-t-[1px] bg-white shadow-md">
                        <li class="text-black px-[25px] py-[12px] font-[300] cursor-pointer hover:bg-[#c5bfc71c]">
                            <a class="block" href="{{ url('/subcategories/بكجات العروس#الملكة') }}">الملكة</a>
                        </li>
                        <li class="text-black px-[25px] py-[12px] font-[300] cursor-pointer hover:bg-[#c5bfc71c]">
                            <a class="block" href="{{ url('/subcategories/بكجات العروس#عروس_VIP') }}">عروس VIP</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
        <div class="w-fit flex mr-auto gap-x-2">
            <a href="{{ url('/wishlist') }}" class="block w-fit h-fit"><img class="size-[22px] object-cover" src="{{ url('/icons/wishlist.png') }}" alt=""></a>
            @auth
                <form action="{{ url('/logout') }}" method="post">
                    @csrf
                    <button type="submit" class="block w-fit h-fit"><img class="size-[22px] object-cover" src="{{ url('/icons/logout.png') }}" alt=""></button>
                    <!-- <button type="submit" class="font-[600] text-[13px] text-[#b6b6c9] flex items-center px-[14px] py-[10px] rounded-md my-2"><i class="fa-solid fa-power-off text-[17px] ml-[10px]"></i> تسجيل الخروج</button> -->
                </form>
            @else
                <a href="{{ url('/login') }}" class="block w-fit h-fit"><img class="size-[22px] object-cover" src="{{ url('/icons/user.png') }}" alt=""></a>
            @endauth
        </div>
        <div id="open" class="text-white flex items-center justify-center text-[20px] cursor-pointer mr-2 sm:block lg:hidden">
            <img src="{{ url('icons/menu.svg') }}" alt="">
        </div>
    </div>
    @yield('body')
    <div class="w-full h-fit bg-[#c5bfc7] lg:flex justify-between py-[30px] md:px-[100px] mt-[100px]" dir="rtl">
        <div class="lg:flex items-center sm:mx-auto lg:mx-0 w-fit">
            <h1 class="ml-[20px] font-[600] text-[15px] text-center sm:hidden lg:block">تلقى العروض الحصرية</h1>
            <h1 class="font-[600] max-w-[300px] text-[15px] text-center sm:block lg:hidden mb-4">تلقى العروض الحصرية</h1>
            <form action="{{ url('/newsletter') }}" method="POST" class="w-fit flex">
                @csrf
                @auth 
                    <input class="sm:w-[200px] lg:w-[250px] bg-white text-[14px] px-2 py-2 font-[300] block border-none outline-none" type="email" value="{{ Auth()->user()->email }}" name="email" placeholder="أدخل بريدك الإلكتروني">
                @else 
                    <input class="sm:w-[200px] lg:w-[250px] bg-white text-[14px] px-2 py-2 font-[300] block border-none outline-none" type="email" name="email" placeholder="أدخل بريدك الإلكتروني">
                @endauth
                <button class="bg-[#a288a6] w-[100px] px-4 font-[500] text-[14px] text-white" type="submit">اشترك</button>
            </form>
        </div>
        <div class="lg:flex items-center justify-end sm:mt-4 lg:mt-0 sm:mx-auto lg:mx-0 w-fit">
            <h1 class="ml-[20px] font-[600] text-[15px] sm:hidden lg:block">تابعنا على</h1>
            <div class="flex items-center gap-x-4">
                <a href="{{ $footerData['instagram'] }}" class="block text-[20px] text-white"><i class="fa-brands fa-instagram"></i></a>
                <a href="{{ $footerData['snapchat'] }}" class="block text-[20px] text-white"><i class="fa-brands fa-snapchat"></i></a>
                <a href="{{ $footerData['tiktok'] }}" class="block text-[20px] text-white"><i class="fa-brands fa-tiktok"></i></a>
                <a href="https://wa.me/{{ $footerData['whatsapp'] }}" class="block text-[20px] text-white"><i class="fa-brands fa-whatsapp"></i></a>
            </div>
        </div>
    </div>
    <footer class="bg-[#f3f4f6] font-readex font-[500] text-[#374151]" dir="rtl">
        <div class="container px-6 pt-[60px] pb-[20px] mx-auto">
            <div class="lg:flex">
                <div class="w-full -mx-6 lg:w-2/5">
                    <div class="px-6">
                        <a href="#" class="mb-4 block">
                            القمر العالي
                        </a>
    
                        <p class="max-w-sm mt-1 font-[400] text-[14px]">
                        القمر العالي يقدم لك سحرًا فريدًا، ملتقى الاستثنائيين. انغمس في جمال الهدوء، حيث ينحت حرفيونا أسلوبك ليبرز جاذبيتك. اكتشف جمالك ورونقك الفريد - القمر العالي يتجاوز العادي بتجربة استثنائية.                        
                        </p>
                    </div>
                </div>
    
                <div class="mt-6 lg:mt-0 lg:flex-1">
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-4">
                        <div>
                            <h3 class="uppercase mb-4">روابط مهمة</h3>
                            <a href="#" class="block mt-2 text-sm font-[400]">خدماتنا المميزة</a>
                            <a href="{{ url('/subcategories/المعالجات') }}" class="block mt-2 text-sm font-[400]">معالجات الشعر</a>
                            <a href="{{ url('/subcategories/بكجات العروس') }}" class="block mt-2 text-sm font-[400]">بكجات العروس</a>
                            <a href="{{ url('/ourproducts') }}" class="block mt-2 text-sm font-[400]">المنتجات</a>
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
                            <a href="{{ $footerData['snapchat'] }}" class="block mt-2 text-sm font-[400]">سناب شات</a>
                            <a href="https://wa.me/{{ $footerData['whatsapp'] }}" class="block mt-2 text-sm font-[400]">واتس اب</a>
                            <a href="{{ $footerData['instagram'] }}" class="block mt-2 text-sm font-[400]">انستغرام</a>
                            <a href="tel:{{ $footerData['phone'] }}" class="block mt-2 text-sm font-[400]">رقم الصالون</a>
                        </div>
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