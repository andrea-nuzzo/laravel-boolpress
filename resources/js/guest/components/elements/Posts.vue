<template>
  <div>
      <div class="container">
        <h2>Lista dei Posts</h2>
        <ul>
            <li v-for="post in posts" :key="post.id">
                {{post.title}}
                <p v-if="post.category">Categoria: {{post.category.name}}</p>
                <div v-if="post.tags.length > 0">
                    <span v-for="tag in post.tags" :key="tag.id"> {{tag.naem}}</span>
                </div>
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