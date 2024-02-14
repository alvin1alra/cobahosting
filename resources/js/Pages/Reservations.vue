<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import DashboardItemBox from '@/Components/DashboardItemBox.vue';
import TransactionTable from '@/Components/TransactionTable.vue';

defineProps({
    Reservations: Array
    
   

})
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
        <h2>All Transaction</h2>
       </template>
      
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex bg-white grid grid-cols-4 overflow-hidden shadow-xl sm:rounded-lg">
                    
                    <TransactionTable :Reservations="Reservations"/>

                </div>
            </div>
        </div>


    </AppLayout>
</template>