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

    mounted() {
      this.$store.dispatch('fetchAuthUser');
    },

    created() {
      this.$store.dispatch('setPageTitle', this.$route.meta.title);
    },

    watch: {
      $route(to, from) {
        this.$store.dispatch('setPageTitle', to.meta.title);
      }
    }
}
</script>

<style scoped>

</style>