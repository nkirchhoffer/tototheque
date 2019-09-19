<template>
  <section class="home-page">
    <section class="books">
      <!--Présentation de livre-->

      <router-link tag="article" :to="{ name: 'book', params: {id: book.id} }" class="rounded overflow-hidden shadow-lg w-1/4" v-for="book in books" :key="book.id">
        <img id="couverture" class="ml-auto mr-auto" :src="book.cover_url">
        <div class="px-6 py-4">
          <header class="font-bold text-gray-900 text-xl mb-2">{{ book.title }} <small>{{ book.author.firstname }}</small></header>
          <p
            class="text-gray-700 text-base"
          >{{ book.description }}</p>
        </div>
        <footer class="flex px-6 py-4">
          <span
            class="flex-1 flex bg-gray-300 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2"
          >
            <img class="flex w-6 mr-2" src="/img/iconfinder_star_1054969.png">Nouveauté
          </span>
          <span
            class="flex-1 flex bg-gray-300 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2"
          >
            <img class="flex w-6 mr-2" src="/img/iconfinder_heart_1055045.png">Coup de cœur
          </span>
        </footer>
      </router-link>
    </section>

    <section id="element" class="md:flex rounded overflow-hidden shadow-lg mt-10 ml-10 mr-auto ml-auto mb-10">
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
  </section>
</template>

<script>
import http from '../http'

export default {
  data() {
    return {
      books: []
    }
  },

  mounted() {
    http.get('/books/all').then(res => {
      res.json().then(data => {
        this.books = data
      })
    })
  }
}
</script>