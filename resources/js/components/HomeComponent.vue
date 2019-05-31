<template>
  <section class="container" style="margin-top: 30px">
    <section class="featured">
      <h1 class="title is-1">Sélection du mois</h1>
      <router-link tag="section" :to="{ name: 'home' }" class="columns notification">
        <div class="column cover is-one-fifth">
          <img
            src="https://img.livraddict.com/covers/170/170570/couv9758842.png"
            alt="Couverture"
            class="cover"
          >
        </div>
        <div class="column">
          <article class="info">
            <h3 class="title is-3">Voyage au bout de la nuit</h3>
            <h6 class="subtitle is-6">Ferdinand Céline - 1932</h6>

            <p class="description">
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fuga cupiditate in omnis quas aliquam doloribus nihil fugit natus. Rem nam iusto necessitatibus cupiditate eos molestias nihil explicabo. Voluptates, maiores autem.
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fuga cupiditate in omnis quas aliquam doloribus nihil fugit natus. Rem nam iusto necessitatibus cupiditate eos molestias nihil explicabo. Voluptates, maiores autem.
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fuga cupiditate in omnis quas aliquam doloribus nihil fugit natus. Rem nam iusto necessitatibus cupiditate eos molestias nihil explicabo. Voluptates, maiores autem.
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fuga cupiditate in omnis quas aliquam doloribus nihil fugit natus. Rem nam iusto necessitatibus cupiditate eos molestias nihil explicabo. Voluptates, maiores autem.
            </p>
          </article>
        </div>
      </router-link>
    </section>
  </section>
</template>

<script>
export default {
  data() {
    return {};
  },

  mounted() {
    console.log("home");
  }
};
</script>