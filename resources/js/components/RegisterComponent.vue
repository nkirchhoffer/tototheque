<template>
    <section class="register">
        <section class="hero is-info">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title mt-4 text-gray-600 text-4xl">S'inscrire à l'espace membre</h1>
                    <h2 class="subtitle text-teal-900">Effectuez des emprunts, déposez des avis...</h2>
                </div>
            </div>
        </section>
        <section class="container form">
            <notification type="error" v-if="error !== null">{{ error }}</notification>
            <notification type="success" v-if="success !== null">{{ success }}</notification>
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Nom complet
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" v-model="name" id="fullname" type="text" required/>
                    <div class="text-gray-500 text-xs italic">Utilisé pour les emprunts, d'autres informations pourront vous être demandées</div>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Identifiant
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" v-model="nick" id="nick" type="text" required/>
                    <div class="text-gray-500 text-xs italic">Doit uniquement comprendre des lettres, pas d'espaces</div>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Adresse mail
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" v-model="email" id="email" type="text" required/>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Mot de passe
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" v-model="password" id="password" type="password" placeholder="******************" required/>
                    <p class="text-gray-500 text-xs italic">Doit être compris entre 6 et 64 caractères</p>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Confirmation du mot de passe
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" v-model="password_confirmation" id="repassword" type="password" placeholder="******************" required/>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Téléphone portable (optionnel)
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" v-model="phone_number" id="phone_number" type="text" placeholder="0600000000">
                </div>
                <div class="flex items-center justify-between">
                    <button class="border border-blue-500 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" v-on:click="submit()" type="button">
                        Créer son compte
                    </button>

                    <router-link tag="a" :to="{ name: 'login' }" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                        J'ai déjà un compte
                    </router-link>
                </div>
            </form>
        </section>
    </section>
</template>

<script>
export default {
    data() {
        return {
            success: null,
            error: null,
            name: null,
            nick: null,
            email: null,
            password: null,
            password_confirmation: null,
            phone_number: null
        }
    },

    methods: {
        submit() {
            const name = this.name
            const nick = this.nick
            const email = this.email
            const password = this.password
            const password_confirmation = this.password

            if (password !== null) {
                if (password.length < 6 || password.length > 64) {
                    this.error = 'La longueur du mot de passe doit être comprise entre 6 et 64 caractères'
                    return false
                }
            }

            if (password !== password_confirmation) {
                this.error = 'Les deux mots de passe doivent correspondre'
                return false
            }

            let data = new FormData()
            data.append('name', name)
            data.append('nick', nick)
            data.append('email', email)
            data.append('password', password)
            data.append('password_confirmation', password_confirmation)
            data.append('phone_number', parseInt(phone_number))

            this.$store.dispatch('register', data).then(() => {
                this.success = 'Votre compte a bien été créé. Un mail vous sera envoyé pour vérifier votre adresse e-mail'
            })
        }
    }
}
</script>
