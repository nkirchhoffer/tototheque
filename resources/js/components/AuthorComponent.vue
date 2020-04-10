<template>
    <section class="author">
        <h1 class="text-3xl text-gray-700">{{ title }}</h1>
        <section class="grid grid-cols-3 gap-4 my-4">
            <!--Présentation de livre-->
            <article class="book max-w-sm rounded overflow-hidden shadow-lg" v-for="book in books" :key="book.id">
                <div class="bg-white"><router-link tag="img" class="couverture" :to="{ name: 'book', params: {id: book.id} }" id="couverture" :src="cover(book.cover_url)"></router-link></div>
                <div class="px-6 py-4 bg-gray-300">
                    <header class="font-bold text-gray-900 text-xl mb-2">{{ book.title }}</header>
                    <p
                            class="text-gray-700 text-base"
                    >{{ book.description }}</p>
                </div>
                <footer class="flex px-6 py-4 bg-gray-300">
                  <span class="button">
                    <img class="flex w-6 mr-2" src="/img/iconfinder_star_1054969.png">{{ fullname }}
                  </span>
                    <span class="button" >
                        <img class="flex w-6 mr-2" src="/img/iconfinder_heart_1055045.png">{{ book.categories[0].name }}
                  </span>
                </footer>
            </article>
        </section>
    </section>
</template>

<script type="text/javascript">
    import http from '../http'

    export default {
        data() {
            return {
                books: null,
                authorID: null,
                author: null
            }
        },

        computed: {
            title() {
                if (this.author !== null) {
                    return 'Livres de ' + this.author.firstname + ' ' + this.author.lastname.toUpperCase()
                }

                return 'Chargement en cours...'
            },

            fullname() {
                return this.author.firstname + ' ' + this.author.lastname.toUpperCase()
            }
        },

        methods: {
            cover(path) {
                return 'https://tototheque.s3.fr-par.scw.cloud/' + path
            },
        },

        mounted() {
            this.authorID = this.$route.params.author
            http.get('/authors/' + this.authorID).then(res => {
                res.json().then(data => {
                    this.books = data.books
                    this.author = data
                })
            })
        }
    }
</script>