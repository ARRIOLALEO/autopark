<template>
   <div class="ReservationForm p-5 bg-white flex items-end">
      <div class="ReservationForm p-5 bg-white flex items-end">
      <div class="mr-4">
         <locations @onSelect="setLocation"/>
      </div>
      <div class="mr-4">
         <label for="">Pickup time</label>
         <datetime type="datetime" input-class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey mt-2" @input="setDate($event, 'pickup')"
            :min-datetime="now"
            />
      </div>
      <div class="mr-4">
         <label for="">Drop off time</label>
         <datetime type="datetime" input-class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey mt-2" @input="setDate($event, 'dropoff')" :min-datetime="now"/>
      </div>
      <button class="text-white font-bold py-3 px-4 rounded ml-4" @click="filterVehicles">Filter vehicles</button>
      <div>
      </div>
      </div>
   </div>
</template>
<script>
import Store from '@/store/index.js'
import locations from '@/components/locations.vue'
import { Datetime } from 'vue-datetime'
import 'vue-datetime/dist/vue-datetime.css'
export default {
  components: {
    locations,
    Datetime
  },
  methods: {
    setLocation (value) {
      Store.dispatch('carslocation', +value)
    },
    setDate(value,type){
     Store.dispatch('carsdaterent', { value , type })
    }
  }
}
</script>
