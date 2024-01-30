@extends('layouts.auth')
@section('title', 'إنشاء حساب')
@section('body')
<div>
    <div dir="rtl" class="bg-black w-full min-h-screen bg-cover bg-[url('https://images.unsplash.com/photo-1634449571010-02389ed0f9b0?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')] flex lg:flex-row sm:flex-col sm:py-[100px] lg:py-8 gap-y-10">
        <div class="flex-1 lg:flex lg:justify-center lg:items-center">
            <div class="sm:mx-auto sm:w-[90%] md:w-[80%] lg:w-[80%] h-fit px-4">
                <h1 class="text-white font-semibold sm:text-[26px] md:text-[40px]">القمر العالي</h1>
                <p class="text-white mt-3 font-[300] text-[14px]">مرحبًا بكِ في صالون القمر العالي للتجميل، المكان المثالي لتجربة تحول جمالي. نحن هنا لتلبية احتياجاتكِ وإبراز أنوثتكِ بأفضل طريقة. انطلقي في رحلة جمالكِ معنا، حيث نقدم خدمات مميزة لتعزيز إشراقتكِ وجاذبيتكِ. انضمي إلى صالون القمر العالي اليوم لترتقي بجمالكِ إلى مستويات جديدة.</p>
            </div>
        </div>
        <div class="flex-1 lg:flex lg:justify-center lg:items-center">
            <div class="sm:mx-auto sm:w-[90%] md:w-[80%] lg:w-[80%] h-fit px-8 py-10 rounded-lg bg-[white]">
                <h1 class="text-2xl font-medium text-gray-700">مرحبًا بعودتك</h1>

                <p class="mt-4 text-gray-500 font-[400] text-[14px]">
                مرحبًا في صالون القمر العالي للتجميل! نحن متحمسون لخدمتك ونرحب بك بكل ترحاب!
                </p>

                <form method="POST" action="{{ route('register') }}" class="mt-6 font-[400] text-[14px]">
                    @csrf
                    <div class="flex-1 mt-6">
                        <label class="block mb-2 text-sm text-gray-600">الاسم</label>
                        <input type="text" id="fname" name="fname" value="{{ old('fname') }}" placeholder="الاسم" class="block w-full px-5 py-3 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md" />
                        <x-input-error :messages="$errors->get('fname')" class="mt-2" />
                    </div>

                    <div class="flex-1 mt-6">
                        <label class="block mb-2 text-sm text-gray-600">النسب</label>
                        <input type="text" id="lname" name="lname" value="{{ old('lname') }}" placeholder="النسب" class="block w-full px-5 py-3 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md" />
                        <x-input-error :messages="$errors->get('lname')" class="mt-2" />
                    </div>

                    <div class="flex-1 mt-6">
                        <label class="block mb-2 text-sm text-gray-600">البريد الإلكتروني</label>
                        <input type="text" id="email" name="email" value="{{ old('email') }}" placeholder="البريد الإلكتروني" class="block w-full px-5 py-3 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="flex-1 mt-6">
                        <label class="block mb-2 text-sm text-gray-600">كلمة السر</label>
                        <input type="password" id="password" name="password" placeholder="كلمة السر" class="block w-full px-5 py-3 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    
                    <div class="flex-1 mt-6">
                        <label class="block mb-2 text-sm text-gray-600">تأكيد كلمة المرور</label>
                        <input type="password" id="password" name="password_confirmation" placeholder="تأكيد كلمة المرور" class="block w-full px-5 py-3 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="flex-1 mt-6">
                        <a href="{{ url('/login') }}" class="font-[600] underline text-[#a288a6]">هل لديك حساب بالفعل؟</a>
                    </div>

                    <button type="submit" id="login" class="w-full px-6 py-3 mt-6 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-[#a288a6] rounded-md focus:outline-none focus:ring focus:ring-[#00000082] focus:ring-opacity-50">
                    إنشاء حساب
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection