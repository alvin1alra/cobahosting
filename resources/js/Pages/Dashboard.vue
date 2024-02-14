<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import DashboardItemBox from '@/Components/DashboardItemBox.vue';
import DashboardItemList from '@/Components/DashboardItemList.vue';
defineProps({
    spotCount: Number,
    transactionCount: Number,
    totalIncome: Number,
    userCount: Number,
    topSpots: Array
});
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <DashboardItemBox :icon="'🏖'" :title= "'Paket Wisata'" :data="spotCount" />

                    <DashboardItemBox :icon="'🤝'" :title= "'Transaksi'" :data="transactionCount" />

                    <DashboardItemBox :icon="'💰'" :title= "'Income'" :data="totalIncome" />

                    <DashboardItemBox :icon="'🤖'" :title= "'Pengguna'" :data="userCount" />

                    <DashboardItemList :topSpots="topSpots" />
                </div>
            </div>
        </div>
    </AppLayout>
</template>