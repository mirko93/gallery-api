<template>
  <div></div>
</template>

<script>
export default {
    name: "Show",

    data: () => {
        return {
            user: null,
            loading: true
        }
    },

    mounted() {
        axios.get('/api/users/' + this.$route.params.userId)
            .then((result) => {
                this.user = result.data;
            }).catch((err) => {
                console.log('Unable to fetch user');
            })
            .finally(() => {
                this.loading = false;
            });
        
        axios.get('/api/posts/' + this.$route.params.userid)
            .then((result) => {
                this.posts = result.data;
            })
            .catch((err) => {
                console.log('Unable to fetch posts');
            })
            .finally(() => {
                this.loading = false;
            });
    }
}
</script>

<style>

</style>