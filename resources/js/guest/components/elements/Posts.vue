<template>
    <div class="gridColumn">
        
        <div class="boxImage"
        v-for="post in posts" :key="post.id" 
        :style="{backgroundImage:`url(/storage/${post.image})`}"
        @mouseover="isHovering = post.id" 
        @mouseout="isHovering = '' "
        >   
            <div class="cover" :class="isHovering == post.id ? 'active' : '' "></div>

            <div class="container d-flex align-items-center justify-content-center flex-column">
                <div class="categoryTag">
                    <span class="category" v-if="post.category">{{post.category.name}}</span>
                    <span class="tag" v-for="tag in post.tags" :key="tag.id"> {{tag.name}}</span>
                </div>
                <div class="title">
                    <router-link :to="{name:  'single-post', params: { slug: post.slug } }" class="titleLink">
                       {{post.title}}
                    </router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    name: "Posts",

    data() {
        return {
            posts: [],
            isHovering: "",
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

<style lang="scss" scoped>

    @import url('https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap');

    .gridColumn{
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-gap: 5px;
    }

    .boxImage{
        background-size: cover;
        background-position: center;
        height: calc(100vh / 2);
        width: 100%;
        position: relative;
    }

    .container{
        height: 100%;
        width: 100%;
    }

    
    .titleLink{
        color: white;
        font-size: 36px;
        font-family: 'Oswald', sans-serif;
        font-weight: 400;
        text-decoration: none;
        
    }
    .title, .categoryTag{
        width: 60%;
        margin: 0 auto;
        z-index: 2;
    }
    .category, .tag{
        color: #baa798;
        text-transform: uppercase;
    }

    .cover{
        display: none;
        background-color: #83786d;
        height: 100%;
        width: 100%;
        opacity: .5;
        position: absolute;
        z-index: 1;
    }
    .active{
       display: block;
    }




</style>