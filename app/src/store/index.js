import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    cars: [],
    places: [],
    filteredlocations: [],
    location: null,
    bookings: [],
    pickup: '',
    dropoff: '',
    carselected: []
  },
  getters: {
    allcars: state => state.cars,
    allplaces: state => state.places,
    filteredlocations: state => state.filteredlocations,
    bookings: state => state.bookings,
    location: state => state.location,
    pickupDate: state => state.pickup,
    dropOffDate: state => state.dropoff,
    carselected: state => state.carselected
  },
  mutations: {
    GET_CARS: (state, cars) => {
      state.cars = cars
    },
    GET_PLACES: (state, places) => {
      state.places = places
    },
    GET_LOCATION: (state, location) => {
      state.location = location
    },
    SET_FILTERS: (state, filtered) => {
      state.filteredlocations = filtered
    },
    SET_PICKUP: (state, pickup) => {
      state.pickup = pickup
    },
    SET_DROPOFF: (state, dropoff) => {
      state.dropoff = dropoff
    },
    SET_BOOKINGS: (state, bookings) => {
      state.bookings = bookings
    },
    SET_CARSELECTED: (state, foundcar) => {
      state.carselected = foundcar
    }
  },
  actions: {
    getcars ({ commit }) {
      axios.get('http://localhost/sysauto/api/Cars/').then(response => {
        commit('GET_CARS', response.data)
      })
    },
    bookings ({ commit }) {
      axios.get('http://localhost/sysauto/api/Booking/').then(response => {
        commit('SET_BOOKINGS', response.data)
      })
    },
    getplaces ({ commit }) {
      axios.get('http://localhost/sysauto/api/Places').then(response => {
        commit('GET_PLACES', response.data)
      })
    },
    selectedcar ({ commit, id }) {
      const foundcar = this.state.cars.filter(car => {
        const recordedcar = car.id === this.id
        return recordedcar
      })
      commit('SET_CARSELECTED', foundcar)
    },
    carslocation ({ commit, state }) {
      const filtered = state.cars.filter(car => {
        const fundLocations = car.location.findIndex(place => {
          return place.id === this.state.location
        })
        return fundLocations !== -1
      })
      // console.log(filtered)
      commit('SET_FILTERS', filtered)
    },
    location ({ commit, state }, value) {
      commit('GET_LOCATION', value)
    },
    carsdaterent ({ commit, state }, date) {
      if (date.type === 'pickup') {
        commit('SET_PICKUP', date.value)
        return
      }
      commit('SET_DROPOFF', date.value)
    }
  },
  modules: {
  }
})
