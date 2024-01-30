@extends('layouts.master')
@section('title', 'صالون القمر العالي')
@section('style')
<style>
    .comment:last-child{
        border: none !important;
    }
</style>
@endsection
@section('body')
<section class="sm:w-[90%] md:w-[90%] lg:w-[90%] xl:w-[85%] mx-auto sm:py-[40px] md:py-[20px] bg-white" dir="rtl">
    <div class="text-[13px] flex w-fit items-center gap-x-2 font-[300]">
        <a href="{{ url('/') }}" class="block text-[#a288a6]">الرئيسة</a>
        <i class="fa-solid fa-angle-left block text-[10px]"></i>
        <a href="javascript:void(0);" class="block">{{ $product->name }}</a>
    </div>
    <div class="mt-[50px]">
        <section class="w-full mt-6 grid sm:grid-cols-1 lg:grid-cols-2 gap-x-[40px] gap-y-6 mb-[100px]">
            <div>
                <img class="object-fill w-full block rounded-md lg:min-h-[625px]" src="{{ url($product->cover) }}" alt="">
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
                        <form method="POST" action="/wishlist" class="cursor-pointer opacity-80 hover:opacity-100 flex items-center justify-center rounded-full bg-white text-[#6b7280] border-[1px] size-[38px]">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit"><img class="size-[18px]" src="{{ url('/icons/heart.png') }}" alt=""></button>
                        </form>
                    </div>
                    <div class="">
                        <h1 class="text-[14px] font-[600] text-[#1f2937] mt-4">{{ $product->description }}</h1>
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
                        <a class="mt-[25px] block w-full text-center px-4 py-2 font-[600] bg-[#a288a6] hover:bg-[#a288a6d6] text-white rounded-[10px] border-[1px] border-[#a288a6] text-[13px]" href="https://wa.me/{{ $footerData['whatsapp'] }}">{{ $product->type == 'خدمة' ? 'احجز الآن ' : 'اشتري الآن'}} <i class="fa-solid fa-clock"></i></a>
                    </div>
                </div>
            </div>
        </section>
        <div class="mx-auto sm:w-[90%] md:w-[80%]">
            <h1 class="text-[23px] font-[600] text-[#1f2937]">آراء العملاء</h1>
            @auth
                @if(Auth::user()->hasRole('user'))
                    <form method="POST" action="{{ url('/comment') }}" class="my-4 block">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}">
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <textarea name="comment" placeholder="اترك تعليقك هنا" class="w-full block border text-[15px] px-4 py-2 rounded-md bg-[#f0f0f041] mt-2 outline-none resize-none h-[200px]"></textarea>
                        <button type="submit" class="cursor-pointer mt-4 block w-fit text-[14px] rounded-[5px] min-w-[200px] mr-auto text-center px-4 py-2 text-white bg-[#a288a6]">إرسال</button>
                    </form>
                @endif
            @endauth

            @forelse($product->reviews as $review)
                <div class="my-4 border-b py-[40px] comment">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center gap-x-2">
                            <p class="inline-flex items-center gap-x-2 mr-3 text-sm text-gray-900 font-semibold">
                                <img
                                    class=" w-6 h-6 rounded-full"
                                    src="{{ url('/icons/woman.png') }}"
                                    alt="icon">{{ $review->client->fname.' '.$review->client->lname }}</p>
                            <p class="text-sm text-gray-600">{{ explode(' ',$review->created_at)[0] }}</p>
                        </div>
                        @auth
                            @if(Auth::user()->hasRole('admin') || $review->user_id == Auth::user()->id)
                                <form action="{{ url('/comment/'.$review->id) }}" method="post">
                                    @csrf 
                                    @method('DELETE')
                                    <button
                                        class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50"
                                        type="submit">
                                        <i class="fa-solid fa-xmark"></i>
                                        <span class="sr-only">Comment settings</span>
                                    </button>
                                </form>
                            @endif
                        @endauth
                    </div>
                    <p class="text-gray-500 mt-2 font-[300] text-sm">{{ $review->comment }}</p>
                </div>
            @empty
                <div class="py-[100px] w-full">
                    <i class="fa-regular fa-comments block text-[#9ca3af] text-[50px] text-center"></i>
                    <h1 class="text-center text-[15px] mt-4 text-[#9ca3af]">لا توجد تعليقات</h1>
                </div>
            @endforelse
            
        </div>
    </div>
</section>
@endsection