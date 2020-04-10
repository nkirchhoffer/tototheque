<template>
    <section class="book">

        <notification type="error" class="mt-1" v-if="error !== null">{{ error }}</notification>
        <notification type="success" class="mt-1" v-if="success !== null">{{ success }}</notification>
        <!--Présentation d'un livre-->
        <section class="bg-gray-900">
            <section class="lg:flex md:flex sm:flex-none lg:w-1/2 md:w-5/6 text-white my-4 ml-10 mr-auto ml-auto">

                <!--Couverture du livre-->
                <img id="couverture-livre" class="mx-auto my-2" :src="cover">

                <!--Information du livre-->
                <article class="px-6 py-4">
                    <header class="font-bold text-4xl my-2">{{ book.title }}</header>
                    <ul class="list-none text-lg">
                        <li>De : <router-link tag="span" :to="{ name: 'author', params: {author: author.id} }" v-for="author in book.authors">{{ name(author) }}</router-link></li>
                        <li>Genres : <router-link tag="span" :to="{ name: 'category', params: {category: category.id} }" v-for="category in book.categories">{{ categoryName(category) }}</router-link></li>
                    </ul>

                    <!--Notation du livre (étoiles)-->
                    <li class="flex mt-2">
                        <ul class="ml-2"><p>{{ book.reviews.length }} notes</p></ul>
                    </li>

                    <!--Disponibilité du livre-->
                    <div class="flex" v-if="book.is_borrowable"><img class="h-4 mt-1" src="/img/iconfinder_round_green.png"><p class="ml-1">Disponible</p></div>
                    <div class="flex" v-if="!book.is_borrowable"><img class="h-4 mt-1" src="/img/iconfinder_round_red.png"><p class="ml-1">Indisponible</p></div>

                    <!--Bouton reservation-->
                    <button class="bg-gray-600 hover:bg-gray-700 mt-4 text-white font-bold py-2 px-4 rounded" v-on:click="borrowBook()" v-if="user !== null" :disabled="!book.is_borrowable">
                        Réserver l'ouvrage
                    </button>

                </article>

            </section>
        </section>

        <!--Liste éditeurs-->
        <section class="flex flex-wrap ml-auto mr-auto my-4 p-2 text-gray-900 justify-center">

            <article class="w-1/4 mx-8 my-2" v-for="replica in book.replicas" :key="replica.id">
                <article class="flex">
                    <img :src="replicaCover(replica.cover_url)" class="h-24 py-2">
                    <li class="mx-2 my-2 list-none">
                        <ul>Editeur : {{ replica.publisher.name }}</ul>
                        <ul>ISBN : {{ replica.isbn }}</ul>
                        <ul>Paru le {{ date(replica.published_at) }}</ul>
                    </li>
                </article>
                <button v-on:click="borrow(replica)" class="bg-gray-700 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded h-10 w-full mt-auto mb-auto" :disabled="disabled(replica)">
                    Réserver ce livre
                </button>
            </article>

        </section>

        <!--Description/ Résumé du livre-->
        <section class="w-2/4 mr-auto ml-auto text-lg text-gray-900">
            <h1 class="bold text-2xl mb-1">Description</h1>
            <p>{{ book.description }}</p>
        </section>

        <!--Avis / commentaire du livre-->
        <section class="w-2/4 mr-auto ml-auto mt-12 text-2xl" v-if="book.reviews.length > 0">
            <h1>Avis des lecteurs</h1>
        </section>

        <review v-for="review in book.reviews" :key="review.id" :review="review"></review>

        <notification type="error" class="mt-2 mb-2 lg:w-1/2 md:w-5/6 ml-auto mr-auto" v-if="reviewError !== null">{{ reviewError }}</notification>
        <!--Input Avis-->
        <section class="lg:w-1/2 md:w-5/6 mt-4 ml-auto mr-auto bg-gray-100 overflow-hidden shadow-lg rounded py-2 px-2 mb-12" v-if="user !== null">
            <article class="">
                <p class="text-2xl my-4">Votre avis</p>
                <p class="my-2 mx-2">Titre : <input class="bg-white focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4" type="text" v-model="title" placeholder="Titre avis" /></p>
                <textarea class="bg-white mb-4 focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" type="text" v-model="comment" placeholder="Votre avis"></textarea>
            </article>

            <article class="flex mb-16">
                <p class="ml-2 mt-1">Votre note :</p>
                <li class="flex p-2"> <!--Note-->
                    <ul><img class="h-6" id="star-1" src="/img/star_black.png" @mouseover="hover(1)" @mouseout="unhover(1)" v-on:click="note(1)" /></ul>
                    <ul><img class="h-6" id="star-2" src="/img/star_black.png" @mouseover="hover(2)" @mouseout="unhover(2)" v-on:click="note(2)" /></ul>
                    <ul><img class="h-6" id="star-3" src="/img/star_black.png" @mouseover="hover(3)" @mouseout="unhover(3)" v-on:click="note(3)" /></ul>
                    <ul><img class="h-6" id="star-4" src="/img/star_black.png" @mouseover="hover(4)" @mouseout="unhover(4)" v-on:click="note(4)" /></ul>
                    <ul><img class="h-6" id="star-5" src="/img/star_black.png" @mouseover="hover(5)" @mouseout="unhover(5)" v-on:click="note(5)" /></ul>
                </li>
                <button class="bg-blue-500 ml-12 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" v-on:click="submit()">
                    Valider
                </button>
            </article>
        </section>
    </section>
</template>

<style>
    #couverture-livre { width: 250px; height: 325px; }
    button:disabled {
        cursor: not-allowed;
        @apply bg-gray-600;
    }
</style>

<script>
    import http from '../http'
    import moment from 'moment'
    import { mapState } from 'vuex'
    moment().locale('fr')

    import ReviewComponent from './ReviewComponent'

    export default {
        data () {
            return {
                book: null,
                cdn: 'https://tototheque.s3.fr-par.scw.cloud/',
                comment: null,
                title: null,
                rate: null,
                error: null,
                success: null,
                reviewError: null
            }
        },

        components: {
            'review': ReviewComponent
        },

        computed: {
            cover() {
              if (this.book !== null) {
                  return this.cdn + this.book.cover_url
              }
            },
            ...mapState(['user'])
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

            borrow(replica) {
                if (!replica.is_borrowed && this.user !== null) {
                    http.get('/replicas/borrow/' + replica.id).then(res => {
                        this.error = null
                        this.success = null
                        res.json().then(data => {
                            if (data.status === 200) {
                                this.success = data.message
                            } else {
                                this.error = data.message
                            }
                        })
                    })
                }
            },

            disabled(replica) {
                if (replica.is_borrowed) {
                    return true
                }

                if (this.user === null) {
                    return true
                }

                return false
            },

            hover(star) {
                for (let i = star; i >= 1; i--) {
                    document.getElementById('star-' + i).src = '/img/star_black_empty.png'
                }
            },

            unhover(star) {
                if (this.rate !== null) {
                    for (let i = star; i >= 1; i--) {
                        document.getElementById('star-' + i).src = '/img/star_black.png'
                    }
                }
            },

            note(stars) {
                this.rate = stars

                for (let i = 0; i <= stars; i++) {
                    document.getElementById('star-' + i).src = '/img/star_black_empty.png'
                }

                for (let i = stars; i <= 5; i++) {
                    console.log(i)
                    document.getElementById('star-' + i).src = '/img/star_black.png'
                }
            },

            submit() {
                let review = new FormData()
                review.append('title', this.title)
                review.append('comment', this.comment)
                review.append('note', this.rate)

                http.post('/book/' + this.book.id + '/review', review)
                    .then(res => {
                        res.json().then(data => {
                            if (res.status === 200) {
                                this.book.reviews.push(data)
                            } else {
                                this.reviewError = data.errors.comment[0]
                            }
                        })
                    })
            },

            borrowBook() {
                if (this.user == null) {
                    return false;
                }

                http.get('/books/' + this.book.id + '/borrow').then(res => {
                    res.json().then(data => {
                        if (res.status === 200) {
                            this.success = data.message
                        } else {
                            this.error = data.message
                        }
                    })
                })
            }
        },

        mounted() {
            const id = this.$route.params.id

            http.get('/books/' + id).then(res => {
                res.json().then(data => {
                    this.book = data

                    Echo.channel('book.' + this.book.id)
                        .listen('NewReviewEvent', e => {
                            const review = e.review
                            this.book.reviews.push(review)
                        })
                })
            })

        }

    }
</script>