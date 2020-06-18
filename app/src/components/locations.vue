<template>
  <div class="w-full">
     <div class="w-full">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
        Location
      </label>
      <div class="relative">
        <select @input="$emit('onSelect', $event.target.value)" class="mx-3 block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
          <option value="null"> ------ </option>
          <option v-for="place in places" :key="place.id" :value="place.id"> {{ place.location }}</option>
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
        </div>
      </div>
    </div>
   </div>
</template>
<script>
import Store from '@/store/index.js'
export default {
  computed: {
    places () {
      return Store.getters.allplaces
    }
  }
}
</script>
