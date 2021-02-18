<template>
  <div>
    <NewPost />

    <Post v-for="post in posts.data" :post="post" :key="post.data.post_id" />
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
      posts: null,
    }
  },

  mounted() {
    axios.get('/api/posts')
      .then((result) => {
        this.posts = result.data;
      })
      .catch((err) => {
        console.log('Unable to fetch posts');
      });
  }
};
</script>

<style scoped></style>
