<script setup>
defineProps({
    topSpots: Array
});
</script>

<template>
    <div class="col-span-4 p-6 shadow-lg">
        <!-- title -->
        <p class="text-lg tracking-widest font-semibold text-blue-600"> Daftar Paket Wisata Terpopuler</p>
        <!-- the list -->
        <div v-for="item, index in topSpots" class="w-full text-center hover:scale-95 duration-300 bg-yellow-100 shadow-lg p-3 grid grid-cols-3 rounded-3 mb-3">
            <div>{{  index+1 }}</div>
            <div class="text-xl">{{  item.pleace }}</div>
            <div class="font-bold text-2xl">{{  item.total }}</div>
        </div>
    </div>
</template>
