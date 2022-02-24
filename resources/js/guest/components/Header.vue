<template>
  <header>
    <div class="head">
      <h1>Header</h1>
      <ul>
        <li>
          <router-link :to="{name: 'home'}">Home</router-link>
        </li>
        <li>
          <router-link :to="{name: 'about'}">Chi siamo</router-link>
        </li>
      </ul>

    </div>
    
  </header>
</template>

<script>
export default {
    name: 'Header',
}
</script>

<style>

header .head{
    height: 100px;
    widows: 100%;
    background-color: greenyellow;
}

</style>