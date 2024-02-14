<script setup>
import { Link } from "@inertiajs/vue3";
defineProps({
    Reservations: Array,
    csrf: {
        type: String,
        default: document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content"),
    },
});
</script>

<template>
    <div class="col-span-4 p-6 shadow-lg roun">
        <div class="w-full max-w-7xl mx-auto">
            <div class="bg-white shadow-md rounded-lg my-6">
                <table class="text-left w-full border-collapse rounded-lg h-full shadow-lg">
                    <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th
                                class="hidden rounded-lg lg:block px-2 lg:py-4 lg:px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                #
                            </th>

                            <th
                                class="px-2 lg:py-4 lg:px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                id
                            </th>

                            <th
                                class="px-2 lg:py-4 lg:px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                Customer
                            </th>

                            <th
                                class="px-2 lg:py-4 lg:px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                Spot_id
                            </th>

                            <th
                                class="px-2 hidden lg:block lg:py-4 lg:px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                Status_id
                            </th>

                            <th
                                class="px-2 lg:py-4 lg:px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                Date
                            </th>

                            <th
                                class="px-2 lg:py-4 lg:px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                Person
                            </th>
                            <th
                                class="px-2 lg:py-4 lg:px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                Bill
                            </th>
                            <th
                                class="hidden lg:block px-2 lg:py-4 lg:px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                Action
                            </th>
                        </tr>
                    </thead>

                    <tbody class="text-gray-700">
                        <tr v-for="(item, index) in Reservations" :key="item.id" class="hover:bg-grey-lighter">
                            <td class="py-4 lg:px-6 border-b border-grey-light">
                                {{ index + 1 }}
                            </td>
                            <td class="px-2 lg:py-4 lg:px-6 border-b border-grey-light">
                                {{ item.id }}
                            </td>
                            <td class="px-2 lg:py-4 lg:px-6 border-b border-grey-light">
                                {{ item.customer }}
                            </td>
                            <td class="px-2 lg:py-4 lg:px-6 border-b border-grey-light">
                                {{ item.spot_id }}
                            </td>
                            <td class="px-2 lg:py-4 lg:px-6 border-b border-grey-light">
                                {{ item.status_id }}
                            </td>
                            <td class="px-2 lg:py-4 lg:px-6 border-b border-grey-light">
                                {{ item.date }}
                            </td>
                            <td class="px-2 lg:py-4 lg:px-6 border-b border-grey-light">
                                <input name="person" :value="item.person"
                                    @input="(event) => (item.person = event.target.value)" type="number"
                                    class="w-full rounded-md" required />
                            </td>
                            <td class="px-2 lg:py-4 lg:px-6 border-b border-grey-light">
                                <input name="person" :value="item.bill"
                                    @input="(event) => (item.bill = event.target.value)" type="number"
                                    class="w-full rounded-md" required />
                            </td>
                            <td class="px-2 hidden lg:block lg:py-4 lg:px-6 border-b border-grey-light">
                                <form action="/update_reservation" method="post">
                                    <input type="hidden" name="_token" :value="csrf" />
                                    <input type="hidden" name="index" :value="item.id" />
                                    <input type="hidden" name="status_id" :value="item.status_id" />
                                    <input type="hidden" name="person" :value="item.person" />
                                    <input type="hidden" name="bill" :value="item.bill" />
                                    <input type="hidden" name="date" :value="item.date" />
                                    <button>Edit</button>
                                </form>

                                <form action="/delete_reservation" method="post">
                                    <input type="hidden" name="_token" :value="csrf" />
                                    <input type="hidden" name="index" :value="item.id" />
                                    <button>Delete</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>