<template>
    <div class="mt-[50px]">
        <section class="w-full mt-6 grid sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-x-4 gap-y-6">
            <div v-for="(item, index) in display.slice(0, end)" :key="index" class="w-full h-fit overflow-hidden rounded-[20px] pb-4 bg-gray-50 relative">
                <a :href="'/details/'+item.id">
                    <img class="w-full mx-auto h-[240px] object-contain  " :src="'/'+item.cover" alt="">
                </a>
                <div class="px-4">
                    <a :href="'/details/'+item.id" class="block text-[13px] font-[600] pt-4 text-[#1f2937] text-right ml-auto">{{ item.name }}</a>
                    <p v-if="!item.sale" class="text-[12px] font-[600] mt-2 text-[#1f2937]" dir="rtl">{{ item.price }} ر.س</p>
                    <div v-if="item.sale" class="flex gap-x-2">
                        <p class="text-[12px] font-[600] mt-2 text-[#1f2937] line-through" dir="rtl">{{ item.price }} ر.س</p>
                        <p class="text-[12px] font-[700] mt-2 text-[red]" dir="rtl">{{ item.sale.price }} ر.س</p>
                    </div>
                    <a v-if="item.type == 'خدمة'" class="block w-full text-center px-4 py-2 font-[600] text-[#a288a6] hover:bg-[#a288a6] hover:text-white rounded-[10px] border-[1px] border-[#a288a6] text-[13px] mt-4" href="#">احجز الآن <i class="fa-solid fa-clock"></i></a>
                    <a v-if="item.type == 'منتوج'" class="block w-full text-center px-4 py-2 font-[600] text-[#a288a6] hover:bg-[#a288a6] hover:text-white rounded-[10px] border-[1px] border-[#a288a6] text-[13px] mt-4" href="#">اشتري الآن <i class="fa-solid fa-clock"></i></a>
                </div>
                <div @click="remove(index)" class="cursor-pointer opacity-80 hover:opacity-100 flex items-center justify-center rounded-full bg-white absolute top-[14px] left-[20px] text-[#6b7280] border-[1px] size-[38px]">
                    <!-- <img class="size-[18px]" :src="'/icons/heart.png'" alt=""> -->
                    <i class="fa-solid fa-xmark"></i>
                </div>
            </div>
        </section>
        <div v-if="display.length > 0 && display.length > end" @click="loadmore()" class="w-fit text-center px-6 cursor-pointer py-2 my-[60px] font-[600] mx-auto bg-[#a288a6] text-white rounded-[10px] border-[1px] border-[#a288a6] text-[13px]">تحميل المزيد</div>
        <div v-if="display.length == 0" class="w-full">
            <div class="flex items-center justify-center min-h-[400px]">
                <div>
                    <div class="mx-auto rounded-full flex items-center justify-center text-[#d1d5db] bg-[#f3f4f6] w-[100px] h-[100px] text-[35px]"><i class="fa-regular fa-heart"></i></div>
                    <h1 class="text-center text-[#9ca3af] text-[16px] font-[300] mt-4">القائمة فارغة</h1>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { onMounted, ref } from 'vue'
const display = ref([])
const perpage = ref(20)
const end = ref(perpage.value)

const loadmore = () => {
    if(display.value.length > end.value)
        end.value += perpage.value
}

const remove = (index) => {
    display.value.splice(index, 1)
    localStorage.setItem('cart', JSON.stringify(display.value))
}

onMounted(() => {
    display.value = JSON.parse(localStorage.getItem('cart')) || []
})
</script>