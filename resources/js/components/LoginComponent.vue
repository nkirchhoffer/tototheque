<template>
  <section class="login ml-auto mr-auto">
    <section class="hero is-info">
      <div class="hero-body">
        <div class="container">
          <h1 class="title">Connexion à l'espace membre</h1>
          <h2 class="subtitle">Accédez à vos informations, et empruntez des ouvrages à partir de votre espace membre</h2>
        </div>
      </div>
    </section>
    <section class="container form">
      <notification type="error" v-if="error !== null">{{ error }}</notification>       
      <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
            Adresse mail
          </label>
          <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" required/>
        </div>
        <div class="mb-6">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
            Mot de passe
          </label>
          <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="******************">
          <!-- <p class="text-red-500 text-xs italic">Please choose a password.</p> -->
        </div>
        <div class="flex items-center justify-between">
          <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
            Se connecter
          </button>
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

  methods: {

    submit() {
      const email = this.email
      const password = this.password

      if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
        this.error = 'L\'adresse e-mail renseignée est incorrecte.'
        return false
      }

      if (password.length < 8 || password.length > 64) {
        this.error = 'Le mot de passe est ' + (password.length < 8 ? 'trop court' : 'trop long')
        return false
      }

      const data = new FormData()
      data.append('email', email)
      data.append('password', password)

      this.$store.dispatch('login', data).then(() => {
        this.$router.push({ name: 'home' })
      }).catch(error => this.error = error)

    }

  },

  mounted() {
    console.log("login")
  }
}
</script>