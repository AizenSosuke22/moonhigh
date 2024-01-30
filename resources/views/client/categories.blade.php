@extends('layouts.master')
@section('title', 'صالون القمر العالي')
@section('body')
<section class="sm:w-[80%] md:w-[90%] lg:w-[90%] xl:w-[85%] mx-auto sm:py-[40px] md:py-[20px] bg-white" dir="rtl">
    <div class="text-[13px] flex w-fit items-center gap-x-2 font-[300]">
        <a href="{{ url('/') }}" class="block text-[#a288a6]">الرئيسة</a>
        <i class="fa-solid fa-angle-left block text-[10px]"></i>
        <a href="javascript:void(0);" class="block">{{ $category }}</a>
    </div>
    <h1 class="text-center text-[#852294] font-bold lg:text-[22px] xl:text-[25px] my-[40px]">{{ $category }}</h1>
</section>
@foreach($subs as $subcategory)
    <section class="w-full pb-[100px]" id="{{ str_replace(' ', '_', $subcategory['title']) }}">
        <div class="w-full flex gap-x-6 items-center justify-between">
            <div class="w-full h-[10px] bg-[#a288a6]"></div>
            <h1 class="sm:min-w-[160px] md:min-w-[200px] text-center text-black font-bold lg:text-[22px] xl:text-[25px]">{{ $subcategory['title'] }}</h1>
            <div class="w-full h-[10px] bg-[#a288a6]"></div>
        </div>
        <div class="mt-[40px]">
            <subcat :data="{{ $subcategory['items'] }}" :contact="{{ json_encode($footerData) }}" />
        </div>
    </section>
@endforeach

@endsection