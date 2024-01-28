@extends('layouts.admin')
@section('title', 'لائحة الزبناء')
@section('body')
<div id="app" class="mr-auto sm:w-[calc(100%-40px)] md:w-[calc(100%-250px)] bg-[white] h-fit min-h-screen px-[50px] pt-[30px]">
    <div class="w-full flex justify-between">
        <div>
            <h1 class="text-[24px] font-bold text-[#2f3334]">الزبناء</h1>
            <p class="text-[#2f3334] text-[14px] mt-1">لائحة الزبناء</p>
        </div>
    </div>
    <div class="mt-[50px] mb-[20px] w-fit cursor-pointer">
        <h1 class="text-[14px] font-[600] w-fit">لائحة الزبناء</h1>
        <div class="w-full h-[2px] bg-black rounded-lg"></div>
    </div>
    <newsletter :data="{{ $data }}" />
</div>
@endsection