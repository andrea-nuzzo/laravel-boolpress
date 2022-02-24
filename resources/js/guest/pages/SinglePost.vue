<template>
  <div>
      <div class="container">
        <h1>{{post.title}}</h1>
        <p>{{post.content}}</p>
        
      </div>
  </div>
</template>

<script>
export default {
    name: "SinglePost",

    data(){
        return{
            post:[]
        }
    },

    created() {

        axios.get(`/api/posts/${this.$route.params.slug}`)
            .then( (response) => {
                this.post = response.data;
            });
    }
}
</script>

<style>

</style>