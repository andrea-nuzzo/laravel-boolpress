<template>
  <div class="home">
      <Posts/>
  </div>
</template>

<script>
import Posts from "../components/elements/Posts.vue";
export default {
    name: "Home",

    components: {
        Posts,
    }
}
</script>

<style lang="scss" scoped>
    .home {
        height: calc(100vh - 100px);
    }

</style>