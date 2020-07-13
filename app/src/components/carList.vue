<template>
    <div class="px-6">
        <h2>Car List</h2>
            <div v-for="vehicle in filterVehicles" :key="vehicle.id" class="px-2 md:flex shadow-lg w-full md:w-1/3 float-left">
   <img class="w-full md:w-1/3  object-cover rounded-lg rounded-r-none" v-bind:src="vehicle.image.path"/>
   <div class=" md:w-2/3 px-4 py-4 bg-white rounded-lg">

      <div class="flex">
         <h2 class="text-xl text-gray-800 font-medium mr-auto"> {{ vehicle.tittle }}</h2>
      </div>
          <div class="flex">
               <div class="text-m text-black-700 text-left" v-if="dates.daysBetween < 4">
                   <span><strong>Pick up date :</strong>{{ dates.start }}<br/></span>
                   <span><strong>Drop Off Date:</strong>{{ dates.end }}<br/></span>
                   <span><strong># of Days    :</strong>{{ dates.daysBetween}}<br/></span>
                   <span><strong>Price/day    : $</strong>{{ vehicle.price1 }}<br/></span>
                   <span><strong>Total        : $</strong>{{ total(vehicle.price1,dates.daysBetween) }}</span>
       </div>
      <div  class="text-m text-gray-700 text-left" v-else-if="dates.daysBetween >= 4 && dates.daysBetween < 7">
                    <span><strong>Pick up date :</strong>{{ dates.start }}<br/></span>
                    <span><strong>Drop Off Date:</strong>{{ dates.end }}<br/></span>
                    <span><strong># of Days    :</strong>{{ dates.daysBetween}}<br/></span>
                    <span><strong>Price/day    : $</strong>{{ vehicle.price2 }}<br/></span>
                    <span><strong>Total        : $</strong>{{ total(vehicle.price2,dates.daysBetween) }}</span>
       </div>
       <div class="text-m text-gray-700 text-left" v-else-if="dates.daysBetween >= 7">
                    <span><strong>Pick up date :</strong>{{ dates.start }}<br/></span>
                    <span><strong>Drop Off Date:</strong>{{ dates.end }}<br/></span>
                    <span><strong># of Days    :</strong>{{ dates.daysBetween}}<br/></span>
                    <span><strong>Price/day    : $</strong>{{ vehicle.price3 }}<br/></span>
                    <span><strong>Total        : $</strong>{{ total(vehicle.price3,dates.daysBetween) }}</span>
       </div>
      </div>
      <div class="flex items-center justify-end mt-4 top-auto">
         <router-link :to="{ name: 'confirmation', params: { id: vehicle.id } }">BOOK</router-link>
      </div>
   </div>
        </div>
        <router-view/>
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
