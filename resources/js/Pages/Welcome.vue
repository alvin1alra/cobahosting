<script setup>
import { Head, Link } from "@inertiajs/vue3";

defineProps({
    spots: Array,
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
    code: String,
    name: String,
    bill: Number,
    date: String,
    showInvoice: {type: Boolean, default: true}
});
</script>

<template>
    <Head title="Welcome" />

    <!--popup-->
   <div class="fixed z-50 bg-black bg-opacity-50 backdrop-blur w-full h-full " v-if="bill > 0 " v-show="showInvoice">
        <div class="w-fit h-fit p-5 rounded-lg text-center mx-auto bg-white mt-20 ">
           <p>selamat, pesanan anda sudah terdaftar dengan kode: {{  code }}</p>
           <p>nama: {{ name }}</p>
           <p>Total tagihan: {{ bill }}</p>
           <p>perjalanan pada tanggal {{ date }}</p>
           <p>silahkan segera hubungi admin untuk mengetahui detail pembayaran </p>
           <button @click="showInvoice = false" class="px-3 py-1 bg-sky-500 text-white rounded-lg">kembali</button>
        </div>
     </div> 

    <div class="relative items-center h-fit bg-center selection:bg-red-500 selection:text-white">

        <div v-if="canLogin"
            class="fixed top-0 right-0 p-6 text-right z-10 bg-black bg-opacity-30 w-full h-20 backdrop-blur">
            <Link v-if="$page.props.auth.user" :href="route('dashboard')"
                class="font-semibold text-gray-100 hover:text-gray-900 dark:hover:text-gray-600 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
            Dashboard</Link>

            <template v-else>
                <Link :href="route('login')"
                    class="font-semibold text-gray-100 hover:text-gray-900 dark:hover:text-gray-600 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                Log in</Link>

                <Link v-if="canRegister" :href="route('register')"
                    class="ml-4 font-semibold text-gray-100 hover:text-gray-900 dark:hover:text-gray-600 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                Register</Link>

                <Link :href="route('login')"
                    class="ml-4 font-semibold text-gray-100 hover:text-gray-900 dark:hover:text-gray-600 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                Cek Pesanan</Link>

                <Link :href="route('login')"
                    class="ml-4 font-semibold text-gray-100 hover:text-gray-900 dark:hover:text-gray-600 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                Reward</Link>

                <Link :href="route('login')"
                    class="ml-4 font-semibold text-gray-100 hover:text-gray-900 dark:hover:text-gray-600 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                Partner</Link>
                <img class="w-10 h-10 rounded-full ring-2 ring-gray-300 dark:ring-gray-500" src="img/pp.jpeg">
            </template>
        </div>

        <div class="fixed left-0 top-0 z-10 p-6">
            <p class="font-extrabold text-white tracking-widest text-xl"><img src="img/judul.png" alt="" style="height: 40px;"> </p>
        </div>

        <!--logo-->
        <div class="absolute top-0 left-0 z-10 p-6">
        </div>

        <!--cover-->
        <div class="w-full h-24 overflow-hidden " style="height:400px;">
            <img src="img/hero.jpg" alt="" class="opacity-90 w-full">
            <div class="absolute top-0 left-0 mx-auto mt-40 text-center w-full">
                <p align="center"><img src="img/judul.png" alt="" style="height: 60px;"> </p>
                <div
                class="text-5x1 tracking-widest w-full mx-auto p-5 text-white font-semibold bg-neutral-500 bg-opacity-30 ">
                AYO BERKUNJUNG KE BENGKULU</div>
                <form>
                    <div class="flex">
                        <div class="relative w-full">
                            <input align="center" type="search" id="search-dropdown"
                                class="blok p-2 z-10 text-sm text-gray-500 bg-gray-10 rounded-full border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                                placeholder="selamat datang, Mau kemana??" style="width: 400px;">
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <!--catalog-->
    <div class="p-3 w-full h-fit grid grid-cols-1 sm:grid-cols-5 gab-10 bg-gray-300" style="margin-top: 20px;">
        <div v-for="spot in spots"
            class="w-56 h-70  rounded-lg shadow-lg bg-gray-500 m-10 hover:translate-y-10 duration-500 p-1">
            <p class="text-xl font-bold text-white tracking-winder text-center">{{ spot.type_id }}.{{ spot.name }}</p>
            <img :src="spot.image" class="p-30 w-60 h-40 hover:scale-150 duration-500 rounded-lg ">
            <p class="text-while text-white">
            <p class="font-bold">
                HARGA:
            </p>Rp.{{ spot.price }}</p>
            <a :href="'/order'+spot.id">
            <button
                class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-green-600 font-medium rounded-lg text-center mr-2 mb-2 dark:border-blue-300 dark:text-blue-300 dark:hover:text-white dark:hover:bg-blue-300 dark:focus:ring-green-600 font-bold text-white  rounded-lg p-3"
                style="margin-left: 135px;">pesan</button>
            </a>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>

    <!--floating Button-->
    <div class="fixed bottom-5 right-5">
        <div
        class="w-20 h-20 rounded-full bg-green-500 text-white flex items-center text-center transition-all hover: w-fit hover:h-64 duration-200 hover:bg-transparent overflow-hidden rounded-full hover:rounded-none mb-5">
        <p class="font-bold ml-3">contact</p>
        <button onclick="window.location.href = 'https://wa.me/+6282289597574'"><img src="img/wa.png" alt=""
                style="height: 80px;" class="opacity-1000" flex></button>
    </div>
</div>
<!-- ini bagian footer -->
<div
    style=" position: fixed; bottom: 0; width: 100%; height: 20px; background-color:rgb(67, 67, 67); color: rgb(220, 215, 243); text-align: center; padding: 0px; z-index: 3; letter-spacing: 3px; ">
    Alvin_Alra. Bengkulu. 2023.
</div></template>

<style></style>