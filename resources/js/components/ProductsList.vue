<template>
    <div class="mt-[50px]">
        <div class="flex justify-between items-center">
            <h1 class="text-[18px] font-[600]">{{ category }}</h1>
            <div class="w-fit h-fit flex items-center gap-x-2">
                <p class="text-[14px] font-400]">فلتر</p>
                <select v-model="filter" class="select">
                    <option value="recent">التوصية</option>
                    <option value="high">السعر من الاعلى الى الادنى</option>
                    <option value="low">السعر من الادنى الى الاعلى</option>
                </select>
            </div>
        </div>
        <section class="w-full mt-6 grid sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-x-4 gap-y-6">
            <div v-for="(item, index) in displayed.slice(0, end)" :key="index" class="w-full h-fit overflow-hidden rounded-[20px] pb-4 bg-gray-50 relative">
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
                <div @click="addToCart(item)" class="cursor-pointer opacity-80 hover:opacity-100 flex items-center justify-center rounded-full bg-white absolute top-[14px] left-[20px] text-[#6b7280] border-[1px] size-[38px]">
                    <img class="size-[18px]" :src="'/icons/heart.png'" alt="">
                </div>
            </div>
        </section>
        <div v-if="display.length > 0 && display.length > end" @click="loadmore()" class="w-fit text-center px-6 cursor-pointer py-2 mt-[20px] font-[600] mx-auto bg-[#a288a6] text-white rounded-[10px] border-[1px] border-[#a288a6] text-[13px]">تحميل المزيد</div>
        <div v-if="display.length == 0" class="w-full">
            <div class="flex items-center justify-center min-h-[400px]">
                <div>
                    <div class="mx-auto rounded-full flex items-center justify-center text-[#d1d5db] bg-[#f3f4f6] w-[100px] h-[100px] text-[35px]"><i class="fa-solid fa-magnifying-glass"></i></div>
                    <h1 class="text-center text-[#9ca3af] text-[16px] font-[300] mt-4">لا توجد نتائج</h1>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { onMounted, ref, computed } from 'vue'
const props = defineProps(['data', 'category'])
const display = ref([])
const filter = ref('recent')
const perpage = ref(20)
const end = ref(perpage.value)
const displayed = computed(() => {
    if(filter.value == 'high'){
        return display.value.sort((a,b) => b.price - a.price)
    }else if(filter.value == 'low'){
        return display.value.sort((a,b) => a.price - b.price)
    }
    return display.value.sort((a,b) => b.created_at.localeCompare(a.created_at))
})

const loadmore = () => {
    if(display.value.length > end.value)
        end.value += perpage.value
}

const addToCart = (item) => {
    let cart = JSON.parse(localStorage.getItem('cart')) || []
    if (!cart.find(x => x.id == item.id)) {
        cart.push(item)
    }
    localStorage.setItem('cart', JSON.stringify(cart))
}

onMounted(() => {
    display.value = props.data
})
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