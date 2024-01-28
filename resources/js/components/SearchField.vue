<template>
    <div>
        <div class="w-full md:mr-[26px] bg-[#eff1f3] rounded-full px-4 py-[6px] flex items-center gap-x-[12px]" dir="rtl">
            <i class="fa-solid fa-magnifying-glass block text-[#424242]"></i>
            <input v-model="search" class="border-none font-[300] text-[#ada7a5] placeholder:text-[#ada7a5] outline-none w-full block bg-transparent text-[14px]" dir="rtl" placeholder="ادخل كلمة البحث" type="search" name="" id="">
        </div>
        <div class="w-full h-fit overflow-y-scroll max-h-[250px] bg-white absolute z-[10] text-[#4b5563]" dir="rtl">
            <a v-for="(item, index) in displayed" :key="index" :href="'/details/'+item.id" class="bg-white hover:bg-[#c5bfc71c] w-full px-4 py-2 flex gap-x-4 border-b border-[#f3f4f6]">
                <img class="w-[80px] h-[56px] object-cover rounded-md block" :src="'/'+item.cover" alt="">
                <div class="flex flex-col justify-around">
                    <h1 class="text-[12px] font-[700]">{{ item.name }}</h1>
                    
                    <h1 v-if="item.sale" class="text-[12px] font-[700] text-[#852294]"><span class="line-through text-black">{{ item.price }} ر.س</span> <span class="">{{ item.sale.price }} ر.س</span></h1>
                    <h1 v-else="item.sale" class="text-[12px] font-[700] text-[#852294]"><span class="">{{ item.price }} ر.س</span></h1>
                </div>
            </a>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue'
import axios from 'axios'

const data = ref([])
const search = ref('')
const displayed = computed(() => search.value.trim().length > 0 ? data.value.filter(x => x.name.includes(search.value)) : [])

onMounted(async () => {
    const response = await axios.get('/api/services')
    data.value = response.data
    console.log(data.value)
})
</script>