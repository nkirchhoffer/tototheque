<template>
  <section class="home-page">
    <section id="element" v-if="false" class="md:flex rounded overflow-hidden shadow-lg mt-10 ml-10 mr-auto ml-auto mb-10">
      <img class="w-64" src="/img/img1.jpg">
      <article class="px-6 py-4">
        <header class="font-bold text-xl mb-2">La sélection de l'équipe</header>
        <p
          class="text-gray-700 text-base"
        >Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste doloremque facere, harum, sint earum dignissimos culpa, fugit voluptate ex nam asperiores. Doloremque ullam, exercitationem impedit animi ut officia vel esse?</p>
        <button
          class="inline-block mt-4 border border-indigo-500 rounded py-1 px-3 bg-transparent hover:bg-indigo-600 hover:border-indigo-500 hover:text-white text-indigo-500"
          href="#"
        >Voir l'article</button>
      </article>
      <aside class="flex-1 mr-2 mt-auto mb-auto">
        <span
          class="flex w-40 bg-gray-300 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mb-3"
        >
          <img class="w-6 mr-2" src="/img/iconfinder_star_1054969.png">Nouveautés
        </span>
        <span
          class="flex w-40 bg-gray-300 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mb-3"
        >
          <img class="w-6 mr-2" src="/img/iconfinder_flame_1055059.png">Tendance
        </span>
        <span
          class="flex w-40 bg-gray-300 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mb-3"
        >
          <img class="w-6 mr-2" src="/img/iconfinder_megaphone_1055028.png">L'Equipe
        </span>
      </aside>
    </section>

    <section class="grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-4 my-4 justify-center" v-infinite-scroll="loadMore" infinite-scroll-disabled="busy" infinite-scroll-distance="20">
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
          <router-link tag="span" :to="{ name: 'author', params: {author: book.authors[0].id}}" class="button">
            <img class="flex w-6 mr-2" src="/img/iconfinder_star_1054969.png">{{ fullname(book.authors[0]) }}
          </router-link>
          <router-link tag="span" :to="{name: 'category', params: {category: book.categories[0].id}}" class="button">
            <img class="flex w-6 mr-2" src="/img/iconfinder_heart_1055045.png">{{ book.categories[0].name }}
          </router-link>
        </footer>
      </article>
    </section>

  </section>
</template>

<style lang="scss">
  .book > img {
    cursor: pointer;
  }
  .couverture {
    @apply ml-auto mr-auto h-full;
  }
  .couverture:hover {
    //@apply opacity-50;
    cursor: pointer;
  }
  .button {
    @apply flex-1 flex bg-gray-400 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2;
  }
  .button:hover {
    @apply bg-gray-500;
  }


</style>

<script>
import http from '../http'

export default {
  data() {
    return {
      books: [],
      offset: 0,
      fullyLoaded: false
    }
  },

  methods: {
    cover(path) {
      return 'https://tototheque.s3.fr-par.scw.cloud/' + path
    },

    fullname(author) {
      return author.firstname + ' ' + author.lastname.toUpperCase()
    },

    loadMore() {
      this.$Progress.start()

      if (!this.fullyLoaded) {
        http.get('/books?offset=' + this.offset + '&limit=9').then(res => {
          res.json().then(data => {
            if (data.length === 0) {
              this.fullyLoaded = true
              this.$Progress.finish()
            } else {
              this.books = this.books.concat(data)
              this.$Progress.finish()
            }
          })
        })

        this.offset += 9
      }
    }
  }
}
</script>