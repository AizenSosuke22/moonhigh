@extends('layouts.master')
@section('title', 'صالون القمر العالي')
@section('body')
<section class="sm:w-[80%] md:w-[90%] lg:w-[90%] xl:w-[85%] mx-auto sm:py-[40px] md:py-[20px] bg-white" dir="rtl">
    <div class="text-[13px] flex w-fit items-center gap-x-2 font-[300]">
        <a href="#" class="block text-[#a288a6]">الرئيسة</a>
        <i class="fa-solid fa-angle-left block text-[10px]"></i>
        <a href="javascript:void(0);" class="block">{{ $product->name }}</a>
    </div>

    <div class="mt-[50px]">
        <section class="w-full mt-6 grid sm:grid-cols-1 md:grid-cols-2 gap-x-[40px] gap-y-6 mb-[100px]">
            <div>
                <img class="object-cover w-full block rounded-md" src="{{ url($product->cover) }}" alt="">
            </div>
            <div class="py-2 lg:pl-[50px] relative">
                <div class="sticky top-0">
                    <h1 class="text-[23px] font-[600] text-[#1f2937]">{{ $product->name }}</h1>
                    @if($product->sale)
                        <h1 class="text-[17px] font-[600] text-[#1f2937] mt-4"><span class="line-through">{{ $product->price }} ر.س</span> <span class="text-[red]">{{ $product->price }} ر.س</span></h1>
                    @else
                        <h1 class="text-[17px] font-[600] text-[#1f2937] mt-4">{{ $product->price }} ر.س</h1>
                    @endif
                    <div class="w-fit flex gap-x-4 mt-[30px]">
                        <div class="cursor-pointer opacity-80 hover:opacity-100 flex items-center justify-center rounded-full bg-white text-[#6b7280] border-[1px] size-[38px]">
                            <i class="fa-solid fa-link"></i>
                        </div>
                        <!-- <div class="cursor-pointer opacity-80 hover:opacity-100 flex items-center justify-center rounded-full bg-white text-[#6b7280] border-[1px] size-[38px]">
                            <img class="size-[18px]" src="{{ url('/icons/heart.png') }}" alt="">
                        </div> -->
                        <addcart :item="{{ $product }}" />
                    </div>

                    <div class="mt-[30px]">
                        <div class="flex justify-between items-center">
                            <h1 class="text-[14px] font-[500] text-[#1f2937]">السعر</h1>
                            <div>
                            @if($product->sale)
                                <h1 class="text-[16px] font-[600] text-[#1f2937] mt-4"><span class="line-through">{{ $product->price }} ر.س</span> <span class="text-[red]">{{ $product->price }} ر.س</span></h1>
                            @else
                                <h1 class="text-[16px] font-[600] text-[#1f2937] mt-4">{{ $product->price }} ر.س</h1>
                            @endif
                            </div>
                        </div>
                        <a class="mt-[25px] block w-full text-center px-4 py-2 font-[600] bg-[#a288a6] hover:bg-[#a288a6d6] text-white rounded-[10px] border-[1px] border-[#a288a6] text-[13px]" href="#">{{ $product->type == 'خدمة' ? 'احجز الآن ' : 'اشتري الآن'}} <i class="fa-solid fa-clock"></i></a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>
@endsection