<template>
  <div>
      <div>
        <Nav />
      </div>

      <router-view></router-view>
  </div>
</template>

<script>
import Nav from './Nav.vue';

export default {
    name: "App",

    components: {
      Nav,
    },
}
</script>

<style scoped>

</style>