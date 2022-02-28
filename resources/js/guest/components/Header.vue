<template>
  <header>
    <div class="head container d-flex justify-content-between align-items-center">

      <div class="logo">
          <img src="https://freepikpsd.com/file/2020/04/chef-icon-png-1.png" alt="Logo">
          <span class="title">BoolPress</span>
      </div>

      <nav>
        <ul class="d-flex align-items-center">
          <li>
            <router-link :to="{name: 'home'}" class="colorRouterLink" >Home</router-link>
          </li>
          <li>
            <router-link :to="{name: 'about'}" class="colorRouterLink">Chi siamo</router-link>
          </li>
        </ul>
      </nav>
    </div>
  </header>
</template>

<script>
export default {
    name: 'Header',
}
</script>

<style lang="scss" scoped>
  header{
    color: #60554a;
    background-color: #e5dfd6;
    .head {
      height: 100px;
      img{
        height: 50px;
      }
      .title{
        font-size: 22px;
      }
      nav{
        height: 100%;
        ul{
          height: 100%;
          li{
            list-style: none;
            margin-right: 10px ;
            .colorRouterLink{color: #60554a;}
          }
        }
      }
    }
  }

</style>