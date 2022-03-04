<template>
  <header>
    <nav class="navbar navbar-expand-lg">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand" href="">
          <img src="https://www.freeiconspng.com/thumbs/fork-and-knife-png/fork-knife-icon-32.png" alt="Logo">
          <span class="title">BoolPress</span>
        </a>

        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <router-link :to="{name: 'home'}" class="nav-link colorRouterLink" >Home</router-link>
          </li>
          <li class="nav-item">
            <router-link :to="{name: 'about'}" class="nav-link colorRouterLink">Chi siamo</router-link>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/home">Area riservata</a>
          </li>
        </ul>
      </div>
    </nav>
</header>
</template>

<script>
export default {
    name: 'Header',
}
</script>

<style lang="scss" scoped>

  @import '../../../sass/front.scss';
  nav{
    background-color: $brownLight;
     a{
       text-decoration: none;
       color: $brownDark;
     }

     img {
       height: 50px;
     }  

  }
</style>