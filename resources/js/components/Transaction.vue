<template>
<div>
  <button @click="show = !show">上戸さーん</button>
  <transition>
  <img src="/images/ayaueto.jpg" alt="ueto" v-if="show">
  </transition>
</div>
</template>

<script>
import { ref } from 'vue'

export default {
  name: 'Transaction',
  setup() {
    let show = ref(true)

    return {
      show
    }
  },
}
</script>

<style scoped>
.v-enter, .v-leave-to{
  opacity: 0;
}

.v-enter-to, .v-leave{
  opacity: 1;
}

.v-enter-active, .v-leave-active{
  transition: opacity 1s;
}
</style>
