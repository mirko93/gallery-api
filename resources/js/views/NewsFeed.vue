<template>
  <div>
    <p v-if="loading">Loading posts...</p>

    <Post v-else v-for="post in posts.data" :post="post" :key="post.data.post_id" />
  </div>
</template>

<script>
import Post from "../components/Post";

export default {
  name: "NewsFeed",

  components: {
    Post,
  },

  data: () => {
    return {
      user: null,
      posts: [],
      loading: true,
    }
  },

  mounted() {
    axios.get('/api/posts')
      .then((result) => {
        this.posts = result.user.data;
        this.posts = result.data;
      })
      .catch((err) => {
        console.log('Unable to fetch posts');
      })
      .finally(() => {
        this.loading = false;
      });
  }
};
</script>

<style scoped></style>
