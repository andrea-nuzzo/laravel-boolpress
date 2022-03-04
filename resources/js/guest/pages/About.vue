<template>
  <div class="container my-5">

    <div class="title">
      <h1>Dietro all'obbiettivo</h1>
      <h6>Gli autori del nostro Blog</h6>
    </div>

      <div class="row my-5">
        <div class="col-3">
          <img src="https://static.vecteezy.com/system/resources/previews/001/192/156/non_2x/circle-png.png" alt="">
        </div>
        <div class="col-9 d-flex align-items-center">
          <p>
            Nel tempo libero, viaggio, osservo e assaggio il mondo, alla scoperta di cose belle da mangiare anche con gli occhi. Sì, perché il cibo è il mio passaporto: uno strumento per viaggiare e conoscere le sfumature e i profumi autentici delle culture gastronomiche dei luoghi più lontani.
            E il calice è un altro oblò sull’incredibile paesaggio enogastronomico di tutto il mondo.
          </p>
        </div>
      </div>
  </div>
</template>

<script>
export default {
    name: "About"
}
</script>

<style lang="scss" scoped>
  @import '../../../sass/front.scss';

  .container{
    color: $brownDark;

    img{
      width: 300px;
    }
  }

</style>