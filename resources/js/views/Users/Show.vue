<template>
  <div>
    <div class="mt-4 text-center">
        <h1>{{ user.data.attributes.firstname }} {{ user.data.attributes.lastname }}</h1>
    </div>

    <div v-if="postsStatus.posts === 'loading'">Loading posts...</div>

    <div v-else-if="posts.length < 1">No posts found. Get started</div>

    <Post v-else v-for="post in posts.data" :key="post.data.post_id" :post="post" />

    <div>
        <p v-if="posts.data.length < 1" class="mt-4 text-center">
            No posts found. 
            <router-link to="/create">Create new post</router-link>
        </p>
    </div>
  </div>
</template>

<script>
import { mapGetters } from 'vuex';
import Post from '../../components/Post';

export default {
    name: "Show",

    components: {
        Post,
    },

    mounted() {
        this.$store.dispatch('fetchUser', this.$route.params.userId);
        this.$store.dispatch('fetchUserPosts', this.$route.params.userId);
    },

    computed: {
        ...mapGetters({
            user: 'user',
            userStatus: 'userStatus',
            posts: 'posts',
            postsStatus: 'postsStatus',
        })
    }
}
</script>

<style>

</style>