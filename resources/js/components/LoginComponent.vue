<template>
  <section class="login">
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
      <div class="field">
        <p class="control has-icons-left has-icons-right">
          <input class="input" type="email" placeholder="Adresse e-mail" v-model="email" required />
          <span class="icon is-small is-left">
            <i class="fas fa-envelope"></i>
          </span>
          <span class="icon is-small is-right">
            <i class="fas fa-check"></i>
          </span>
        </p>
      </div>
      <div class="field">
        <p class="control has-icons-left">
          <input class="input" type="password" placeholder="Mot de passe" v-model="password" required />
          <span class="icon is-small is-left">
            <i class="fas fa-lock"></i>
          </span>
        </p>
      </div>
      <div class="field">
        <p class="control">
          <button class="button is-success" v-on:click="submit()">Connexion</button>
          <button class="button is-warning">Mot de passe perdu ?</button>
        </p>
      </div>
    </section>
  </section>
</template>

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