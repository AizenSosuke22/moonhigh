@extends('layouts.admin')
@section('title', 'الإعدادات')
@section('body')
<div id="app" class="mr-auto sm:w-[calc(100%-40px)] md:w-[calc(100%-250px)] bg-[white] h-fit min-h-screen px-[50px] pt-[30px]">
    <div class="w-full flex justify-between">
        <div>
            <h1 class="text-[24px] font-bold text-[#2f3334]">الإعدادات</h1>
            <p class="text-[#2f3334] text-[14px] mt-1">معلومات الاتصال</p>
        </div>
    </div>
    <div class="mt-[50px] mb-[20px] w-fit cursor-pointer">
        <h1 class="text-[14px] font-[600] w-fit">معلومات الاتصال</h1>
        <div class="w-full h-[2px] bg-black rounded-lg"></div>
    </div>

    <form action="{{ url('/settings') }}" method="POST" class="w-full h-fit block rounded-md mt-[60px] px-[40px] pb-[60px]">
        @csrf
        <h1 class="text-[20px] font-[600] text-[#2f3334]">معلومات الاتصال</h1>
        <p class="text-[#2f3334] text-[14px] mb-[30px]">عليك ملء جميع الحقول</p>
        
        @foreach($errors->all() as $error)
            <h1 class="text-[12px] font-[600] w-fit text-[red]">{{ $error }}</h1>
        @endforeach
        @if(Session::has('success'))
            <h1 class="text-[12px] font-[600] w-fit text-[green]">{{ Session::get('success') }}</h1>
        @endif
        <div class="my-4">
          <label for="" class="text-[14px]">انستغرام</label>
          <input type="text" name="instagram" value="{{ $data['instagram'] }}" class="w-full border h-fit text-[15px] px-4 py-2 rounded-md bg-[#f0f0f041] mt-2 outline-none">
        </div>
        <div class="my-4">
          <label for="" class="text-[14px]">واتس اب</label>
          <input type="text" name="whatsapp" value="{{ $data['whatsapp'] }}" class="w-full border h-fit text-[15px] px-4 py-2 rounded-md bg-[#f0f0f041] mt-2 outline-none">
        </div>
        <div class="my-4">
          <label for="" class="text-[14px]">تيك توك</label>
          <input type="text" name="tiktok" value="{{ $data['tiktok'] }}" class="w-full border h-fit text-[15px] px-4 py-2 rounded-md bg-[#f0f0f041] mt-2 outline-none">
        </div>
        <div class="my-4">
          <label for="" class="text-[14px]">سناب شات</label>
          <input type="text" name="snapchat" value="{{ $data['snapchat'] }}" class="w-full border h-fit text-[15px] px-4 py-2 rounded-md bg-[#f0f0f041] mt-2 outline-none">
        </div>
        <div class="my-4">
          <label for="" class="text-[14px]">الموقع على الخرائط</label>
          <input type="text" name="maps" value="{{ $data['maps'] }}" class="w-full border h-fit text-[15px] px-4 py-2 rounded-md bg-[#f0f0f041] mt-2 outline-none">
        </div>
        <div class="flex mt-8 w-fit ml-auto gap-x-4">
          <button type="submit" class="cursor-pointer block w-fit text-[14px] rounded-[5px] min-w-[200px] text-center px-4 py-2 text-white bg-black">حفظ</button>
        </div>
    </form>
</div>
@endsection