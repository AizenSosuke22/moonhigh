@extends('layouts.master')
@section('title', 'صالون القمر العالي')
@section('body')
<section class="sm:w-[80%] md:w-[90%] lg:w-[90%] xl:w-[85%] mx-auto sm:py-[40px] md:py-[20px] bg-white" dir="rtl" id="app">
    <div class="text-[13px] flex w-fit items-center gap-x-2 font-[300]">
        <a href="#" class="block text-[#a288a6]">الرئيسة</a>
        <i class="fa-solid fa-angle-left block text-[10px]"></i>
        <a href="javascript:void(0);" class="block">جميع الخدمات</a>
    </div>
    <productslist/>
</section>
@endsection