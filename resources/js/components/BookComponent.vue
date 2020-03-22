<template>
    <section class="book">

        <notification type="error" v-if="error !== null">{{ error }}</notification>
        <notification type="success" v-if="success !== null">{{ success }}</notification>
        <!--Présentation d'un livre-->
        <section class=" bg-gray-900 ">
            <section class="flex w-2/4 text-white my-4 ml-10 mr-auto ml-auto">

                <!--Couverture du livre-->
                <img id="couverture-livre" class="mx-2 my-2" :src="cover">

                <!--Information du livre-->
                <article class="px-6 py-4">
                    <header class="font-bold text-4xl my-2">{{ book.title }}</header>
                    <ul class="list-none text-lg">
                        <li>De : <span v-for="author in book.authors">{{ name(author) }}</span></li>
                        <li>Editeur : </li>
                        <li>Genres : <span v-for="category in book.categories">{{ categoryName(category) }}</span></li>
                    </ul>

                    <!--Notation du livre (étoiles)-->
                    <li class="flex mt-2">
                        <ul><img class="h-6" src="/img/iconfinder_star_white.png" onmouseover="this.src='/img/iconfinder_star_white_empty.png'" onmouseout="this.src='/img/iconfinder_star_white.png'"></ul>
                        <ul><img class="h-6" src="/img/iconfinder_star_white.png" onmouseover="this.src='/img/iconfinder_star_white_empty.png'" onmouseout="this.src='/img/iconfinder_star_white.png'"></ul>
                        <ul><img class="h-6" src="/img/iconfinder_star_white.png" onmouseover="this.src='/img/iconfinder_star_white_empty.png'" onmouseout="this.src='/img/iconfinder_star_white.png'"></ul>
                        <ul><img class="h-6" src="/img/iconfinder_star_white.png" onmouseover="this.src='/img/iconfinder_star_white_empty.png'" onmouseout="this.src='/img/iconfinder_star_white.png'"></ul>
                        <ul><img class="h-6" src="/img/iconfinder_star_white.png" onmouseover="this.src='/img/iconfinder_star_white_empty.png'" onmouseout="this.src='/img/iconfinder_star_white.png'"></ul>
                        <ul class="ml-2"><p>??? notes</p></ul>
                    </li>

                    <!--Disponibilité du livre-->
                    <div class="flex"><img class="h-4 mt-1" src="/img/iconfinder_round_green.png"><p class="ml-1">Disponible</p></div>
                    <div class="flex"><img class="h-4 mt-1" src="/img/iconfinder_round_red.png"><p class="ml-1">Indisponible</p></div>

                    <!--Bouton reservation-->
                    <button class="bg-gray-600 hover:bg-gray-700 mt-4 text-white font-bold py-2 px-4 rounded">
                        Reserver l'ouvrage
                    </button>

                </article>

            </section>
        </section>

        <!--Liste éditeurs-->
        <section class="w-4/5 ml-auto mr-auto my-4 p-2 text-gray-900 flex flex-wrap justify-center">

            <article class="w-1/4 mx-2 my-2" v-for="replica in book.replicas" :key="replica.id">
                <article class="flex">
                    <img :src="replicaCover(replica.cover_url)" class="h-24 py-2">
                    <li class="mx-2 my-2 list-none">
                        <ul>Editeur : {{ replica.publisher.name }}</ul>
                        <ul>ISBN : {{ replica.isbn }}</ul>
                        <ul>Paru le {{ date(replica.published_at) }}</ul>
                    </li>
                </article>
                <button v-on:click="borrow(replica.id)" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded h-10 w-full mt-auto mb-auto">Réserver ce livre</button>
            </article>

        </section>

        <!--Description/ Résumé du livre-->
        <section class="w-2/4 mr-auto ml-auto text-lg text-gray-900">
            <h1 class="bold text-2xl mb-1">Description</h1>
            <p>{{ book.description }}</p>
        </section>

        <!--Avis / commentaire du livre-->
        <section class="w-2/4 mr-auto ml-auto mt-12 text-2xl">
            <h1>Avis des lecteurs</h1>
        </section>

        <section class="w-2/4 flex bg-gray-100 rounded overflow-hidden shadow-lg mt-10 mr-auto ml-auto mb-10">
            <aside class="w-1/5">
                <img src="/img/avatar_3.png" alt="avatar" class="h-32 mr-auto ml-auto"> <!--Avatar-->
                <p class="text-center">Jean-Michel</p> <!--Nom utilisateur-->
                <p class="text-center">Le : 21/03/2020</p> <!--Date du poste-->
                <li class="flex justify-center p-2"> <!--Note-->
                    <ul><img class="h-6" src="/img/star_black.png" onmouseover="this.src='/img/star_black_empty.png'" onmouseout="this.src='/img/star_black.png'"></ul>
                    <ul><img class="h-6" src="/img/star_black.png" onmouseover="this.src='/img/star_black_empty.png'" onmouseout="this.src='/img/star_black.png'"></ul>
                    <ul><img class="h-6" src="/img/star_black.png" onmouseover="this.src='/img/star_black_empty.png'" onmouseout="this.src='/img/star_black.png'"></ul>
                    <ul><img class="h-6" src="/img/star_black.png" onmouseover="this.src='/img/star_black_empty.png'" onmouseout="this.src='/img/star_black.png'"></ul>
                    <ul><img class="h-6" src="/img/star_black.png" onmouseover="this.src='/img/star_black_empty.png'" onmouseout="this.src='/img/star_black.png'"></ul>
                </li>
            </aside>
            <article class="w-4/5 px-6 py-4">
                <header class="font-bold text-xl mb-2">Je conseille ce livre</header> <!--Titre avis-->
                <p class="text-gray-700 text-base">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste doloremque facere, harum, sint earum dignissimos culpa, fugit voluptate ex nam asperiores. Doloremque ullam, exercitationem impedit animi ut officia vel esse?</p>
            </article>
        </section>

        <section class="w-2/4 flex bg-gray-100 rounded overflow-hidden shadow-lg my-10 mr-auto ml-auto">
            <aside class="w-1/5">
                <img src="/img/avatar_5.png" alt="avatar" class="h-32 mr-auto ml-auto"> <!--Avatar-->
                <p class="text-center">Sandrine</p> <!--Nom d'utilisateur-->
                <p class="text-center">Le : 20/03/2020</p> <!--Date du poste-->
                <li class="flex justify-center p-2"> <!--Note-->
                    <ul><img class="h-6" src="/img/star_black.png" onmouseover="this.src='/img/star_black_empty.png'" onmouseout="this.src='/img/star_black.png'"></ul>
                    <ul><img class="h-6" src="/img/star_black.png" onmouseover="this.src='/img/star_black_empty.png'" onmouseout="this.src='/img/star_black.png'"></ul>
                    <ul><img class="h-6" src="/img/star_black.png" onmouseover="this.src='/img/star_black_empty.png'" onmouseout="this.src='/img/star_black.png'"></ul>
                    <ul><img class="h-6" src="/img/star_black.png" onmouseover="this.src='/img/star_black_empty.png'" onmouseout="this.src='/img/star_black.png'"></ul>
                    <ul><img class="h-6" src="/img/star_black.png" onmouseover="this.src='/img/star_black_empty.png'" onmouseout="this.src='/img/star_black.png'"></ul>
                </li>
            </aside>
            <article class="w-4/5 px-6 py-4">
                <header class="font-bold text-xl mb-2">Super !!!</header> <!--Titre avis-->
                <p class="text-gray-700 text-base">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste doloremque facere, harum, sint earum dignissimos culpa, fugit voluptate ex nam asperiores. Doloremque ullam, exercitationem impedit animi ut officia vel esse?</p>
            </article>
        </section>

        <!--Input Avis-->
        <section class="w-2/4 ml-auto mr-auto bg-gray-100 overflow-hidden shadow-lg rounded py-2 px-2 mb-12">
            <article class="">
                <p class="text-2xl my-4">Votre avis</p>
                <p class="my-2 mx-2">Titre : <input class="bg-white focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4" type="text" placeholder="Titre avis"></p>
                <input class="bg-white mb-4 focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" type="text" placeholder="Votre avis">
            </article>

            <article class="flex mb-16">
                <p class="ml-2 mt-1">Votre note :</p>
                <li class="flex p-2"> <!--Note-->
                    <ul><img class="h-6" src="/img/star_black.png" onmouseover="this.src='/img/star_black_empty.png'" onmouseout="this.src='/img/star_black.png'"></ul>
                    <ul><img class="h-6" src="/img/star_black.png" onmouseover="this.src='/img/star_black_empty.png'" onmouseout="this.src='/img/star_black.png'"></ul>
                    <ul><img class="h-6" src="/img/star_black.png" onmouseover="this.src='/img/star_black_empty.png'" onmouseout="this.src='/img/star_black.png'"></ul>
                    <ul><img class="h-6" src="/img/star_black.png" onmouseover="this.src='/img/star_black_empty.png'" onmouseout="this.src='/img/star_black.png'"></ul>
                    <ul><img class="h-6" src="/img/star_black.png" onmouseover="this.src='/img/star_black_empty.png'" onmouseout="this.src='/img/star_black.png'"></ul>
                </li>
                <button class="bg-blue-500 ml-12 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Valider
                </button>
            </article>
        </section>
    </section>
</template>

<style>
    #couverture-livre { width: 250px; height: 325px; }
</style>

<script>
    import http from '../http'
    import moment from 'moment'
    moment().locale('fr')

    export default {
        data () {
            return {
                book: null,
                cdn: 'https://tototheque.s3.fr-par.scw.cloud/',
                error: null,
                success: null
            }
        },

        computed: {
          cover() {
              if (this.book !== null) {
                  return this.cdn + this.book.cover_url
              }
          }
        },

        methods: {
            name(author) {
                if (this.book.authors[this.book.authors.length - 1] === author) {
                    return author.firstname + ' ' + author.lastname.toUpperCase()
                }

                return author.firstname + ' ' + author.lastname.toUpperCase() + ', '
            },

            categoryName(category) {
                if (this.book.categories[this.book.categories.length - 1] === category) {
                    return category.name
                }

                return category.name + ', '
            },

            replicaCover(cover_url) {
                return this.cdn + cover_url
            },

            date(date) {
                return moment(date).format('L')
            },

            borrow(id) {
                http.get('/replicas/borrow/' + id).then(res => {
                    this.error = null
                    this.success = null
                    res.json().then(data => {
                        if (res.statusCode != 200) {
                            this.error = data.message
                        }

                        this.success = data.message
                    })
                })
            }
        },

        mounted() {
            const id = this.$route.params.id

            http.get('/books/' + id).then(res => {
                res.json().then(data => {
                    this.book = data
                    console.log(data.replicas)
                })
            })
        }

    }
</script>