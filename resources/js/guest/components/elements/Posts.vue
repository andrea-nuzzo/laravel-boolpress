<template>
  <div>
      <div class="container">
        <h2>Lista dei Posts</h2>
        <ul>
            <li v-for="post in posts" :key="post.id">
                <strong>{{post.title}}</strong>
            </li>
        </ul>
      </div>
  </div>
</template>

<script>

export default {
    name: "Posts",

    data() {
        return {
            posts: []
        }
    },

     created() {
        axios.get("/api/posts")
            .then((response) => {
                this.posts = response.data;
            });
    },
}
</script>

<style>

</style>