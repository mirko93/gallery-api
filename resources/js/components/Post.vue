<template>
  <div>
    <div class="jumbotron m-4">
      <router-link to="">
        <h1 class="display-8">{{ post.data.attributes.title }}</h1>
      </router-link>

      <router-link to="">
        <div v-if="post.data.attributes.image">
        <img :src="post.data.attributes.image" width="400" alt="">
      </div>
      </router-link>

      <hr class="my-4" />
      <div class="d-flex">
        <p>Author: </p>
        <router-link to="">
          {{ post.data.attributes.posted_by.data.attributes.firstname }} 
          {{ post.data.attributes.posted_by.data.attributes.lastname }}
        </router-link>
      </div>
      
      <p>Time posted: {{ post.data.attributes.posted_at }}</p>
    </div>
  </div>
</template>

<script>
export default {
    name: "Post",

    props: [
      'post'
    ]
}
</script>

<style>

</style>