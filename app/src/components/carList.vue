<template>
    <div>
        <h2>Car List</h2>
            <div v-for="vehicle in filterVehicles" :key="vehicle.id" class="md:flex shadow-lg  mx-5 md:mx-auto my-5 max-w-lg md:max-w-1xl float-left">
   <img class="w-full md:w-1/3  object-cover rounded-lg rounded-r-none pb-5/6" v-bind:src="vehicle.image.path"/>
   <div class=" md:w-2/3 px-4 py-4 bg-white rounded-lg">
   {{ dates.start }}<br/>
    {{ dates.end }}<br/>
    {{ dates.daysBetween}}
      <div class="flex items-center">
         <h2 class="text-xl text-gray-800 font-medium mr-auto"> {{ vehicle.tittle }}</h2>
            <i class="text-gray-600 line-through">
               <div class="text-sm text-gray-700 mt-4" v-if="dates.daysBetween < 4">
{{ vehicle.price1 }}
{{ total(vehicle.price1,dates.daysBetween) }}
</div>
<div  class="text-sm text-gray-700 mt-4" v-else-if="dates.daysBetween >= 4 && dates.daysBetween < 7">
{{ vehicle.price2 }}
{{ total(vehicle.price2,dates.daysBetween) }}
</div>
<div class="text-sm text-gray-700 mt-4" v-else-if="dates.daysBetween >= 7">
{{ vehicle.price3 }}
{{ total(vehicle.price3,dates.daysBetween) }}
</div>
               </i>
      </div>
      <div class="flex items-center justify-end mt-4 top-auto">
         <button class="bg-white text-red-500 px-4 py-2 rounded mr-auto hover:underline">Delete</button>
         <button class=" bg-gray-200 text-blue-600 px-2 py-2 rounded-md mr-2">Edit</button>
         <button class=" bg-blue-600 text-gray-200 px-2 py-2 rounded-md ">Publish</button>
      </div>
   </div>
        </div>
    </div>
</template>
<script>
import Store from '@/store/index.js'
import { DateTime } from 'luxon'
export default {
  methods: {
    total (prices, days) {
      const total = prices * days
      return total
    }
  },
  computed: {
    filterVehicles () {
      return Store.getters.filteredlocations
    },
    dates () {
      const start = DateTime.fromISO(Store.getters.pickupDate)
      const end = DateTime.fromISO(Store.getters.dropOffDate)
      const daysBetween = end.diff(start, ['days'])
      return {
        start: start.toFormat('dd/MM/yyyy'),
        end: end.toFormat('dd/MM/yyyy'),
        daysBetween: daysBetween.values.days
      }
    }
  }
}
</script>
