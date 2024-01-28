@extends('layouts.master')
@section('title', 'صالون القمر العالي')
@section('body')
<section class="sm:w-[80%] md:w-[90%] lg:w-[90%] xl:w-[85%] mx-auto sm:py-[40px] md:py-[20px] bg-white" dir="rtl">
    <div class="text-[13px] flex w-fit items-center gap-x-2 font-[300]">
        <a href="#" class="block text-[#a288a6]">الرئيسة</a>
        <i class="fa-solid fa-angle-left block text-[10px]"></i>
        <a href="javascript:void(0);" class="block">التخفيضات</a>
    </div>
    @php 

    $data = [
        [
            'title' => 'المنتجات',
            'image' => 'https://images.unsplash.com/photo-1705642373439-27963d4b9908?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
        ],
        [
            'title' => 'خدمات الشعر',
            'image' => 'https://images.unsplash.com/photo-1705642373439-27963d4b9908?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
        ],
        [
            'title' => 'المعالجات',
            'image' => 'https://images.unsplash.com/photo-1705642373439-27963d4b9908?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
        ],
        [
            'title' => 'المكياج',
            'image' => 'https://images.unsplash.com/photo-1705642373439-27963d4b9908?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
        ],
        [
            'title' => 'قسم العناية',
            'image' => 'https://images.unsplash.com/photo-1705642373439-27963d4b9908?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
        ],
        [
            'title' => 'بكجات العروس',
            'image' => 'https://images.unsplash.com/photo-1705642373439-27963d4b9908?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
        ]
    ];

    @endphp
    <div class="mt-[50px]">
        <h1 class="text-[18px] font-[600]">التخفيضات</h1>
        <section class="w-full mt-6 grid sm:grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-6 mb-[100px]">
            @foreach($data as $item)
                <div class="w-full h-[240px] relative">
                    <a class="bg-gradient-to-br from-purple-400 to-gray-300 block absolute left-0 right-0 w-fit mx-auto bottom-4 sm:px-[10px] sm:py-[4px] md:px-4 md:py-2 font-bold lg:min-w-[150px] sm:text-[11px] md:text-[12px] lg:text-[15px] text-center" @if($item['title'] != 'المنتجات') href="{{ url('/promotion/خدمة/'.$item['title']) }}" @else href="{{ url('/promotion/منتوج/'.$item['title']) }}" @endif>{{ $item['title'] }}</a>
                    <img class="block object-cover object-right-top w-full h-full" src="https://images.unsplash.com/photo-1705642373439-27963d4b9908?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                </div>
            @endforeach
        </section>
    </div>
</section>
@endsection