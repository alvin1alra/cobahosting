<script setup>
import { Head } from "@inertiajs/vue3";
defineProps({
  spot: Object,
  bill: Number,
  csrf:{ type: String, default: document.querySelector('meta[name="csrf-token"]').
  getAttribute('content')}
});
</script>

<template>
  
  <img src="img/hero.jpg" alt="" class=" opacity-90 w-full fixed" style="z-index: -1;">
  <!--header-->
  <div class=" fixed top-0 left-0 w-full bg-black bg-opacity-70 h-fit">
    <div class="flex">
      <!--logo-->
      <div class="w-2/3 p-4">
        <a href="/">
          <p class="font-extrabold text-white tracking-widest text-xl">
            <img src="img/judul.png" alt="" style="height: 40px" />
          </p>
        </a>
      </div>

      <!--Title-->
      <div class="w-1/3 p-4">
        <p class="text-neutral-300 tracking-widest text-right text-xl font-right">
          {{ spot.name }}
        </p>
      </div>
    </div>
  </div>

  <form
    action="/ordering"
    method="post"
    class="bg-gray-300 w-full sm:w-fit h-fit p-5 mx-auto mt-20 shadow-lg rounded-lg">

    <input type="hidden" name="_token" :value="csrf">
<div>
  <div class="text-center mb-10 text-xl t">Form pemesanan wisata</div>

</div>

    <div class="flex gap-10 p-5 w-70"> 
      <div>
        <img :src="spot.image" alt="" class="rounded-lg" />
      </div>

      <div>
        <div class="w-full mb-5">
          <label for="customer">Nama</label>
          <input
            name="customer"
            type="text"
            class="w-full rounded-md"
            maxlength="225"
            required
          />
        </div>
        <div class="w-full mb-5">
          <label for="spot_id">Pilihan Spot</label>
          <input
            name="spot_id"
            type="number"
            :value="spot.id"
            class="w-full rounded-md"
            readonly
          />
        </div>
        <div class="w-full mb-5">
          <label for="status_id">Status</label>
          <input
            name="status_id"
            type="number"
            value="1"
            class="w-full rounded-md"
            required
          />
        </div>
        <div class="w-full mb-5">
          <label for="date">Tanggal</label>
          <input name="date" type="date" class="w-full rounded-md" required />
        </div>
        <div class="w-full mb-5">
          <label for="person">Total Orang</label>
          <input
            name="person"
            :value="bill" @input="event => bill =event.target.value"
            type="number"
            class="w-full rounded-md"
            required
          />
        </div>
        <input type="hidden" :value="bill * spot.price" name="bill">
        <div class="text-right">
          <span class="ml-4">Harga: Rp {{ bill * spot.price }},.</span>
          <button class="bg-sky-500 text-white p-3 rounded-lg ml-4">
            Pesan...
          </button>
        </div>
        <div class="p-4">
          <a href="/">
            <p class="bg-sky-500 text-white p-3 rounded-lg w-13 h-10 ml-4">
              Batal
            </p>
          </a>
        </div>
      </div>
    </div>
  </form>
</template>


<style>
</style>