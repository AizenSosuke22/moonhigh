<template>
    <div class="mt-[50px]">
        <div class="flex justify-between items-center">
            <h1 class="text-[18px] font-[600]">جميع الخدمات</h1>
            <div class="w-fit h-fit flex items-center gap-x-2">
                <p class="text-[14px] font-400]">فلتر</p>
                <select name="" id="" class="select">
                    <option value="">جميع الخدمات</option>
                    <option value="">جميع الخدمات</option>
                    <option value="">جميع الخدمات</option>
                    <option value="">جميع الخدمات</option>
                </select>
            </div>
        </div>
        <section class="w-full mt-6 grid sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-x-4 gap-y-6">
            <div v-for="(item, index) in 10" :key="index" class="w-full h-fit overflow-hidden rounded-[20px] pb-4 bg-gray-50 relative">
                <img class="w-full mx-auto h-[240px] object-contain  " src="https://cdn.salla.sa/YrAPO/KkFgB4ovWyTuVpIzH5UD7eCTYSlAEfn1d9gNgI5Q.jpg" alt="">
                <div class="px-4">
                    <h1 class="text-[13px] font-[600] pt-4 text-[#1f2937] text-right ml-auto">جلسة معالج كولاجين مع قص اطراف</h1>
                    <p class="text-[12px] font-[600] mt-2 text-[#1f2937]" dir="rtl">100 ر.س</p>
                    <a class="block w-full text-center px-4 py-2 font-[600] text-[#a288a6] hover:bg-[#a288a6] hover:text-white rounded-[10px] border-[1px] border-[#a288a6] text-[13px] mt-4" href="#">احجز الآن <i class="fa-solid fa-clock"></i></a>
                </div>
                <div class="cursor-pointer opacity-80 hover:opacity-100 flex items-center justify-center rounded-full bg-white absolute top-[14px] left-[20px] text-[#6b7280] border-[1px] size-[38px]">
                    <img class="size-[18px]" src="http://127.0.0.1:8000/icons/heart.png" alt="">
                </div>
            </div>
        </section>
        <div class="w-fit text-center px-6 cursor-pointer py-2 my-[60px] font-[600] mx-auto bg-[#a288a6] text-white rounded-[10px] border-[1px] border-[#a288a6] text-[13px]">تحميل المزيد</div>
    </div>
</template>

<script setup>

</script>

<style scoped>

.select {
    display: inline-flex;
    cursor: pointer;
    user-select: none;
    appearance: none;
    outline: none;
    height: 40px;
    padding-right: 1rem; /* Changed from padding-left to padding-right */
    padding-left: 2.5rem; /* Changed from padding-right to padding-left */
    font-size: 0.875rem;
    line-height: 1.25rem;
    line-height: 2;
    border-width: 1px;
    border-color: #d2d4d7;
    border-radius: 5px;
    background-image: linear-gradient(-45deg, transparent 50%, currentColor 50%), linear-gradient(-135deg, currentColor 50%, transparent 50%); /* Adjusted gradient angles */
    background-position: calc(0% + 20px) calc(1px + 50%), calc(0% + 16.1px) calc(1px + 50%); /* Adjusted background positions */
    background-size: 4px 4px, 4px 4px;
    background-repeat: no-repeat;
    font-weight: 400;
}


</style>