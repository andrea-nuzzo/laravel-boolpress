<template>
  <div class="singlePost my-5">

      <div class="container">

          <div class="boxPost px-5 py-3">
            <!-- Title -->
            <div class="row my-5">
                <div class="col">
                    <h1>{{post.title}}</h1>
                </div>
            </div>

            <!-- Content -->
            <div class="row my-3">
                <div class="col image d-flex justify-content-end">
                        <img :src="`/storage/${post.image}`" alt="">
                </div>
                <div class="col text my-3">
                    <p>{{post.content}}</p>
                </div>
            </div>  

          </div>

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
            })
            .catch( (error) => {
            this.$router.push({name: 'page-404'});
            });
    }
}
</script>

<style lang="scss" scoped>
  @import '../../../sass/front.scss';
  
  .singlePost{
      color: $brownDark;
      .container{
            background-color: $brownLight;
            border-radius: 5rem;
        .image{
            & img{
                border-radius: 5rem;
                height: 80%;
            }
        }

        .text{
            & p {
                line-height: 2rem;
                text-align: justify;
                }
        }
      }
      

  }

</style>