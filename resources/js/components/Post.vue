<template>
  <div>
    <div class="jumbotron m-4">
      <h1 class="display-8">{{ post.data.attributes.title }}</h1>
      <div>
        <img src="https://images.unsplash.com/photo-1612831455359-970e23a1e4e9?ixid=MXwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=925&q=80" width="400" alt="">
      </div>
      <hr class="my-4" />
      <div class="d-flex">
        <p>Author: </p>
        <router-link to="">
          {{ post.data.attributes.posted_by.data.attributes.firstname }} 
          {{ post.data.attributes.posted_by.data.attributes.lastname }}
        </router-link>
      </div>
      
      <p>Time posted: 12 min</p>
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