<script setup>
defineProps({
    icon: String,
    title: String,
    data: Number,
});
</script>

<template>
    <div class="p-4 rounded-md shadow-lg text-center bg-neutral-200  grid drid-cols-4 w-full h-fit hover:scale-110 duration-300">
        <!-- icon -->
        <div v-if="icon" class="bg bg-yellow-400 w-20 h-20 rounded-full mx-auto text-6xl text-white">{{ icon }}</div>
        <!-- Title -->
        <p v-if="title" class="text-lg text-blue-800 font-semibold tracking-widest mt-5">{{ title }}</p>
        <!-- value -->
        <p v-if="data" class="text-2x1 font-bold tracking-wider text-neutral-500 mt-3 ">{{ data }}</p>
    </div>
</template>
