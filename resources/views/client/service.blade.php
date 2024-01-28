@extends('layouts.master')
@section('title', 'صالون القمر العالي')
@section('body')
<section class="sm:w-[80%] md:w-[90%] lg:w-[90%] xl:w-[85%] mx-auto sm:py-[40px] md:py-[20px] bg-white" dir="rtl">
    <div class="text-[13px] flex w-fit items-center gap-x-2 font-[300]">
        <a href="{{ url('/') }}" class="block text-[#a288a6]">الرئيسة</a>
        <i class="fa-solid fa-angle-left block text-[10px]"></i>
        <a href="javascript:void(0);" class="block">{{ $category }}</a>
    </div>
    <div>
        <productslist :data="{{ $services }}" category="{{ $category }}"/>
    </div>
</section>
<div class="w-full h-fit bg-[#c5bfc7] lg:flex justify-between py-[30px] md:px-[100px] mt-[100px]" dir="rtl">
    <div class="lg:flex items-center sm:mx-auto lg:mx-0 w-fit">
        <h1 class="ml-[20px] font-[600] text-[15px] text-center sm:hidden lg:block">تلقى العروض الحصرية</h1>
        <h1 class="font-[600] max-w-[300px] text-[15px] text-center sm:block lg:hidden mb-4">تلقى العروض الحصرية</h1>
        <form action="{{ url('/newsletter') }}" method="POST" class="w-fit flex">
            @csrf
            <input class="sm:w-[200px] lg:w-[250px] bg-white text-[14px] px-2 py-2 font-[300] block border-none outline-none" type="email" name="email" placeholder="أدخل بريدك الإلكتروني">
            <button class="bg-[#a288a6] w-[100px] px-4 font-[500] text-[14px] text-white" type="submit">اشترك</button>
        </form>
    </div>
    <div class="lg:flex items-center justify-end sm:mt-4 lg:mt-0 sm:mx-auto lg:mx-0 w-fit">
        <h1 class="ml-[20px] font-[600] text-[15px] sm:hidden lg:block">تابعنا على</h1>
        <div class="flex items-center gap-x-4">
            <a href="" class="block text-[20px] text-white"><i class="fa-brands fa-instagram"></i></a>
            <a href="" class="block text-[20px] text-white"><i class="fa-brands fa-snapchat"></i></a>
            <a href="" class="block text-[20px] text-white"><i class="fa-brands fa-tiktok"></i></a>
            <a href="" class="block text-[20px] text-white"><i class="fa-brands fa-whatsapp"></i></a>
        </div>
    </div>
</div>
@endsection