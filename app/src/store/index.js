import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    cars: [],
    places: [],
    filteredlocations: [],
    pickup: '',
    dropoff: ''
  },
  getters: {
    allcars: state => state.cars,
    allplaces: state => state.places,
    filteredcars: state => state.filteredlocations,
    pickupDate: state => state.pickup,
    dropOffDate: state => state.dropoff
  },
  mutations: {
    GET_CARS: (state, cars) => {
      state.cars = cars
    },
    GET_PLACES: (state, places) => {
      state.places = places
    },
    SET_FILTERS: (state, filterlocations) => {
      state.filteredlocations = filterlocations
    },
    SET_PICKUP:(state, pickup) => {
      state.pickup= pickup
    },
    SET_DROPOFF:(state, dropoff) => {
      state.dropoff= dropoff
    }
  },
  actions: {
    getcars ({ commit }) {
      axios.get('http://localhost/sysauto/api/Cars/').then(response => {
        commit('GET_CARS', response.data)
      })
    },
    getplaces ({ commit }) {
      axios.get('http://localhost/sysauto/api/Places').then(response => {
        commit('GET_PLACES', response.data)
      })
    },
    carslocation ({ commit, state }, value) {
      const filtered = state.cars.filter(car => {
        const fundLocations = car.location.findIndex(place => {
          return place.id === value
        })
        return fundLocations !== -1
      })
      commit('SET_FILTERS', filtered)
    },
    carsdaterent ({ commit, state }, date){
      if (date.type === 'pickup') {
        commit('SET_PICKUP',date.value)
        return
      }
      commit('SET_DROPOFF',date.value)
    }
  },
  modules: {
  }
})
