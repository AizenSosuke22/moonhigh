<template>
    <div>
        <div class="w-full font-poppins overflow-x-scroll noscroll">
            <table class="w-full min-w-[600px] border-separate border-spacing-y-4">
              <thead class="bg-[#f9f9f9]">
                  <tr class="*:text-right *:font-[600] text-[13px] *:py-2 *:px-4">
                      <th class="rounded-r-lg">#</th>
                      <th>البريد الإلكتروني</th>
                      <th class="rounded-l-lg">تاريخ الانضمام</th>
                  </tr>
              </thead>
              <tbody>
                  <tr v-for="(item, index) in newsletter.slice(start, end)" :key="item.id" class="*:py-4 *:px-4 font-[500] text-[14px]">
                    <td class="font-[600]">{{ index+1 }}</td>
                    <td>{{ item.email }}</td>
                    <td>{{ item.created_at.split('-')[0]+'-'+item.created_at.split('-')[1]+'-'+item.created_at.split('-')[2].slice(0,2) }}</td>
                  </tr>
              </tbody>
            </table>
        </div>
        <div class="flex items-center justify-between">
          <p class="text-[14px]">عرض {{ start+1 }}-{{ end > newsletter.length ? newsletter.length : end }} من {{ newsletter.length }}</p>
          <div class="w-fit flex">
              <div @click="previous()" class="px-[13px] text-[14px] cursor-pointer py-1 rounded-md bg-[#f3f4f6] w-fit ml-2">
                  <i class="fa-solid fa-angle-right"></i>
              </div>
              <div @click="next()" class="px-[13px] text-[14px] cursor-pointer py-1 rounded-md bg-[#f3f4f6] w-fit">
                  <i class="fa-solid fa-angle-left"></i>
              </div>
          </div>
        </div>
    </div>
</template>

<script setup>
  import { ref, onMounted } from 'vue'
  const props = defineProps(['data'])
  const newsletter = ref([])

  const start = ref(0)
  const perpage = ref(1)
  const end = ref(perpage.value)

  onMounted(() => {
    newsletter.value = props.data
  })

  const next = () => {
    if(newsletter.value.length > end.value){
        start.value += perpage.value 
        end.value += perpage.value 
    }
  }

  const previous = () => {
    if(start.value > 0){
        start.value -= perpage.value 
        end.value -= perpage.value 
    }
  }
</script>

<style scoped>
    .noscroll::-webkit-scrollbar {
        width: 0px;
    }
</style>