<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <img src="img/hero.jpg" alt="" class="opacity-90 w-full fixed" style="z-index: -1;">
        <div>
            <slot name="logo" />
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg bg-gray-150">

          <img src="img/judul.png" alt="" style="opacity: 90; background-color: aquamarine;">
            <slot />
    
        </div>
    </div>
</template>
