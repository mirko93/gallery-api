<template>
  <div>
    <div class="mt-4 text-center">
        <h1>{{ user.data.attributes.firstname }} {{ user.data.attributes.lastname }}</h1>
    </div>

    <p v-if="postLoading">Loading posts...</p>

    <Post v-else v-for="post in posts.data" :post="post" :key="post.data.post_id" />

    <div>
        <p v-if="!postLoading && posts.data.length < 1" class="mt-4 text-center">
            No posts found. 
            <router-link to="/create">Create new post</router-link>
        </p>
    </div>
  </div>
</template>

<script>
import Post from '../../components/Post';

export default {
    name: "Show",

    components: {
        Post,
    },

    data: () => {
        return {
            user: null,
            posts: null,
            userLoading: true,
            postLoading: true
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
                this.userLoading = false;
            });
        
        axios.get('/api/users/' + this.$route.params.userId + '/posts')
            .then((result) => {
                this.posts = result.data;
            })
            .catch((err) => {
                console.log('Unable to fetch posts');
            })
            .finally(() => {
                this.postLoading = false;
            });
    }
}
</script>

<style>

</style>