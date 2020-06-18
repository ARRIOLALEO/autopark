<template>
    <div class="home">
        <div class="HeroBlock bg-grey">
            <div>
              <formReservation />
            </div>
        </div>
        <div class="container">
           <carlist filtered />
        </div>
    </div>
</template>
<script>
import formReservation from '@/components/form.vue'
import carlist from '@/components/carList.vue'
export default {
  name: 'Home',
  components: {
    formReservation,
    carlist
  }
}
</script>
