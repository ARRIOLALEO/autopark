<template>
  <div class="reservation">
    <table class="table-auto">
        <imput type="text" v-model="search" placeholder="Search here "/>
  <thead>
    <tr>
      <th class="px-4 py-2">Customer</th>
      <th class="px-4 py-2"># Contact</th>
      <th class="px-4 py-2">Car Rented</th>
      <th class="px-4 py-2">Notes</th>
      <th class="px-4 py-2">Pick up</th>
      <th class="px-4 py-2">Drop Off</th>
      <th class="px-4 py-2">Days</th>
      <th class="px-4 py-2">Rented Price</th>
      <th class="px-4 py-2">Total</th>
      <th class="px-4 py-2">deposit</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="book in bookings" :key="book.id">
      <td class="border px-4 py-2">{{ book.clie_name }}</td>
      <td class="border px-4 py-2">{{ book.clie_contac }}</td>
      <td class="border px-4 py-2"><div v-for="car in book.tittle" :key="car.id">{{ car.tittle }}</div></td>
      <td class="border px-4 py-2">{{ book.notes }}</td>
      <td class="border px-4 py-2">{{ setformat(book.pickup) }}</td>
      <td class="border px-4 py-2"><div >{{ setformat(book.dropoff) }}</div></td>
      <td class="border px-4 py-2"><div >{{datepickup(book.pickup,book.dropoff)}}</div></td>
      <td class="border px-4 py-2"><div >{{ book.pricerented }}</div></td>
      <td class="border px-4 py-2"><div >{{datepickup(book.pickup,book.dropoff) * book.pricerented }}</div></td>
      <td class="border px-4 py-2"><div >{{ book.deposit}}</div></td>
    </tr>
  </tbody>
</table>
  </div>
</template>
<script>
import Store from '@/store/index.js'
import { DateTime } from 'luxon'
export default {
  data () {
    return {
      search: ''
    }
  },
  methods: {
    setformat (value) {
      const start = DateTime.fromSQL(value)
      return start.toFormat('dd/MM/yyyy')
    },
    datepickup (pickup, dropof) {
      const start = DateTime.fromSQL(pickup)
      start.toFormat('dd/MM/yyyy')
      const end = DateTime.fromSQL(dropof)
      end.toFormat('dd/MM/yyyy')
      const daysBetween = end.diff(start, ['days'])
      return Math.round(daysBetween.values.days)
    }
  },
  computed: {
    bookings () {
      return Store.getters.bookings
    }
  }
}
</script>
