<template>
  <div>
      <h1>Sono Home</h1>
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

<style>

</style>