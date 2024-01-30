<template>
    <div v-if="products.length > 0" class="w-[90%] mx-auto" dir="rtl">
        <div class="w-fit flex gap-x-2 mb-[30px] mr-auto">
            <div @click="goPrev()" class="cursor-pointer hover:text-[#852294] hover:border-[#852294] flex items-center justify-center rounded-full bg-white text-[#6b7280] border-[1px] size-[38px]">
                <i class="fa-solid fa-angle-right"></i>
            </div>
            <div @click="goNext()" class="cursor-pointer hover:text-[#852294] hover:border-[#852294] flex items-center justify-center rounded-full bg-white text-[#6b7280] border-[1px] size-[38px]">
                <i class="fa-solid fa-angle-left"></i>
            </div>
        </div>
        <swiper
        :slides-per-view="'auto'" 
        :space-between="24" 
        :modules="[Navigation]"
        @swiper="onSwiperInit"
        :direction="'horizontal'"
        :rtl="true"
        >
            <swiper-slide v-for="(item, index) in products" :key="index" :style="'width:285.52px;'">
                <div class=" h-fit overflow-hidden rounded-[20px] pb-4 bg-gray-50 relative">
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
                        <a class="block w-full text-center px-4 py-2 font-[600] text-[#a288a6] hover:bg-[#a288a6] hover:text-white rounded-[10px] border-[1px] border-[#a288a6] text-[13px] mt-4" :href="'https://wa.me/'+contact.whatsapp">احجز الآن <i class="fa-solid fa-clock"></i></a>
                    </div>
                    <form method="POST" action="/wishlist" class="cursor-pointer opacity-80 hover:opacity-100 flex items-center justify-center rounded-full bg-white absolute top-[14px] left-[20px] text-[#6b7280] border-[1px] size-[38px]">
                        <button type="submit"><img class="size-[18px]" :src="'/icons/heart.png'" alt=""></button>
                        <input type="hidden" name="_token" :value="csrfToken">
                        <input type="hidden" name="product_id" :value="item.id">
                    </form>
                </div>
            </swiper-slide>
        </swiper>
    </div>

    <div v-else>
        <div class="py-[100px] w-full">
            <i class="fa-solid fa-magnifying-glass block text-[#9ca3af] text-[50px] text-center"></i>
            <h1 class="text-center text-[15px] mt-4 text-[#9ca3af]">لا توجد خدمات بعد</h1>
        </div>
    </div>
  </template>
  
<script setup>
import { ref, onMounted, defineProps } from 'vue'
import { Swiper, SwiperSlide } from 'swiper/vue'
import 'swiper/css'
import { Navigation  } from 'swiper/modules'
const csrfToken = ref('')

const props = defineProps(['data', 'contact'])
const products = ref([])

const swiperInstance = ref(null)

const goNext = () => {
  if (swiperInstance.value) {
    swiperInstance.value.slideNext()
  }
}

const goPrev = () => {
  if (swiperInstance.value) {
    swiperInstance.value.slidePrev()
  }
}

const onSwiperInit = (swiper) => {
  swiperInstance.value = swiper
}

onMounted(() => {
    csrfToken.value = document.querySelector('meta[name="csrf-token"]').getAttribute('content') || ''
    products.value = props.data || []
})

</script>
  
<style scoped>
    .shad{
        margin: 0 20px;
        height: 242px;
    }

    .shad:hover{
        background: linear-gradient(135deg, #673ab785 18.23%, #673ab7 76.95%);
    }
    
    .shad:hover :where(h1,p){
        color: white;
    }

    .shad:hover :where(div){
        color: #673ab7; 
        background: white;
    }
</style>
  