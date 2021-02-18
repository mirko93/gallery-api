<template>
  <div>
    <NewPost />

    <p v-if="loading">Loading posts...</p>

    <Post v-else v-for="post in posts.data" :post="post" :key="post.data.post_id" />
  </div>
</template>

<script>
import NewPost from "../components/NewPost";
import Post from "../components/Post";

export default {
  name: "NewsFeed",

  components: {
    NewPost,
    Post,
  },

  data: () => {
    return {
      posts: [],
      loading: true,
    }
  },

  mounted() {
    axios.get('/api/posts')
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
};
</script>

<style scoped></style>
