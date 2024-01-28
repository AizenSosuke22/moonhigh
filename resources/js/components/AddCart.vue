<template>
    <div @click="addToCart(item)" class="cursor-pointer opacity-80 hover:opacity-100 flex items-center justify-center rounded-full bg-white text-[#6b7280] border-[1px] size-[38px]">
        <img class="size-[18px]" :src="'/icons/heart.png'" alt="">
    </div>
</template>

<script setup>
import { defineProps } from 'vue'
defineProps(['item'])
const addToCart = (item) => {
    let cart = JSON.parse(localStorage.getItem('cart')) || []
    if (!cart.find(x => x.id == item.id)) {
        cart.push(item)
    }
    localStorage.setItem('cart', JSON.stringify(cart))
}
</script>