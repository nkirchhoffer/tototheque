<template>
  <section class="login ml-auto mr-auto">
    <section class="hero is-info">
      <div class="hero-body">
        <div class="container">
          <h1 class="title mt-4 text-gray-600 text-4xl">Connexion à l'espace membre</h1>
          <h2 class="subtitle text-teal-900">Accédez à vos informations, et empruntez des ouvrages à partir de votre espace membre</h2>
        </div>
      </div>
    </section>
    <section class="container form">
      <notification type="error" v-if="error !== null">{{ error }}</notification>       
      <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" action="/member/login">
        <input type="hidden" name="_token" :value="csrf" />
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
            Adresse mail
          </label>
          <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" v-model="email" id="email" name="email" type="email" required/>
        </div>
        <div class="mb-6">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
            Mot de passe
          </label>
          <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" v-model="password" id="password" name="password" type="password" placeholder="******************">
          <!-- <p class="text-red-500 text-xs italic">Please choose a password.</p> -->
        </div>
        <div class="flex items-center justify-between">
          <section class="buttons">
            <button class="border border-blue-500 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
              Se connecter
            </button>
            <router-link tag="button" :to="{ name: 'register' }" class="border border-blue-500 hover:bg-blue-500 text-blue-500 hover:text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
              Créer un compte
            </router-link>
          </section>
          <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="#">
            Mot de passe oublié ?
          </a>
        </div>
      </form>
    </section>
  </section>
</template>

<style>
  .form {
    margin-top: 5%;
  }
</style>


<script>

export default {
  data() {
    return {
      email: null,
      password: null,
      error: null
    }
  },

  computed: {
    csrf() {
      return document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    }
  }
}
</script>