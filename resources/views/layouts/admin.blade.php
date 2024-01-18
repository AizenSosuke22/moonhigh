<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | Moonhigh</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://kit.fontawesome.com/99be30e45a.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.13.1/datatables.min.js"></script>
    @vite(
        [
            'resources/css/app.css', 
            'resources/js/app.js',
            'resources/css/menu.css',
            'resources/js/menu.js',
        ]
    )  
</head>
<body class="font-readex">
    <div class="flex relative" dir="rtl">
        <div class="w-[250px] h-screen fixed top-0 right-0 border-l-[1px] px-[30px] py-[10px] flex flex-col">
            <div class="flex items-center gap-x-2 pt-4 text-[#0c0b36] justify-center">
                <!-- <i class="fa-solid fa-cube text-[26px]"></i> -->
                <h1 class="font-[600] text-[18px]">القمر العالي</h1>
            </div>
            <div class="h-full pt-[40px] flex flex-col">
                <div class="h-full ">
                    <div class="mb-[10px]"></div>
                    <p class="font-[500] text-[13px] text-[#b6b6c9] flex items-center px-[14px] py-[10px] rounded-md">القائمة الرئيسية</p>
                    <a class="font-[600] bg-[#f3f3fb] text-black text-[13px] flex items-center px-[14px] py-[10px] rounded-md mb-2 mt-2" href="#"><i class="fa-solid fa-layer-group text-[17px] ml-[10px]"></i> التصنيفات</a>
                    <a class="font-[500] text-[13px] text-[#5c5c5c] flex items-center px-[14px] py-[10px] rounded-md my-2" href="#"><i class="fa-solid fa-cube text-[#b6b6c9] text-[17px] ml-[10px]"></i> الخدمات</a>
                    <a class="font-[500] text-[13px] text-[#5c5c5c] flex items-center px-[14px] py-[10px] rounded-md my-2" href="#"><i class="fa-solid fa-gift text-[#b6b6c9] text-[17px] ml-[10px]"></i> التخفيضات</a>

                </div>
                <div class="h-fit">
                    <a class="font-[600] text-[13px] text-[#b6b6c9] flex items-center px-[14px] py-[10px] rounded-md my-2" href="#"><i class="fa-solid fa-gear text-[17px] ml-[10px]"></i> الإعدادات</a>
                    <a class="font-[600] text-[13px] text-[#b6b6c9] flex items-center px-[14px] py-[10px] rounded-md my-2" href="#"><i class="fa-solid fa-power-off text-[17px] ml-[10px]"></i> تسجيل الخروج</a>
                </div>
            </div>
        </div>
        @yield('body')
    </div>
    @yield('scripts')
</body>
</html>