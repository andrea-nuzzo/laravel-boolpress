<template>
  <main>
      <div class="container my-3">
           <h3>Lista Post</h3>

           <div class="row" v-for="post in posts" :key="post.id"> 
               <div class="col">{{post.title}}</div>
           </div>
      </div>
     

  </main>
</template>

<script>
export default {
    name: 'Main',

    data(){
        return{
            posts: []

        }
    },

    created(){
        axios.get('/api/posts')
            .then((response) => {
                this.posts = response.data;
                console.log(this.posts);
            })
    }
}
</script>

<style>

</style>