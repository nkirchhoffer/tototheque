<template>
  <section class="home-page">
    <section class="flex content-around">
      <!--Présentation de livre-->

      <article class="max-w-sm rounded overflow-hidden shadow-lg mt-10 ml-auto">
        <img id="couverture" class="ml-auto mr-auto" src="/img/livre1.jpg">
        <div class="px-6 py-4">
          <header class="font-bold text-gray-900 text-xl mb-2">Voyage au bout de la nuit</header>
          <p
            class="text-gray-700 text-base"
          >Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta impedit voluptatem explicabo quia maiores voluptatibus magnam, doloribus accusamus blanditiis ad voluptate repellendus rem corrupti voluptatum praesentium, inventore ratione? Accusamus, illum?</p>
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
      </article>

      <article class="max-w-sm rounded overflow-hidden shadow-lg mt-10 ml-10">
        <img id="couverture" class="ml-auto mr-auto" src="/img/livre2.jpg">
        <div class="px-6 py-4">
          <header class="font-bold text-gray-900 text-xl mb-2">La bête humaine</header>
          <p
            class="text-gray-700 text-base"
          >Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta impedit voluptatem explicabo quia maiores voluptatibus magnam, doloribus accusamus blanditiis ad voluptate repellendus rem corrupti voluptatum praesentium, inventore ratione? Accusamus, illum?</p>
        </div>
        <footer class="flex items-stretch px-6 py-4">
          <span
            class="flex-1 flex bg-gray-300 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2"
          >
            <img class="flex w-6 mr-2" src="/img/iconfinder_star_1054969.png">Nouveautés
          </span>
          <span
            class="flex-1 flex bg-gray-300 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2"
          >
            <img class="flex w-6 mr-2" src="/img/iconfinder_heart_1055045.png">Coup de cœur
          </span>
        </footer>
      </article>

      <article class="max-w-sm rounded overflow-hidden shadow-lg mt-10 ml-10 mr-auto">
        <img id="couverture" class="ml-auto mr-auto" src="/img/livre3.jpg">
        <div class="px-6 py-4">
          <header class="font-bold text-gray-900 text-xl mb-2">Notre-Dame de Paris</header>
          <p
            class="text-gray-700 text-base"
          >Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta impedit voluptatem explicabo quia maiores voluptatibus magnam, doloribus accusamus blanditiis ad voluptate repellendus rem corrupti voluptatum praesentium, inventore ratione? Accusamus, illum?</p>
        </div>
        <footer class="flex px-6 py-4">
          <span
            class="flex-1 flex bg-gray-300 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2"
          >
            <img class="flex w-6 mr-2" src="/img/iconfinder_star_1054969.png">Nouveautés
          </span>
          <span
            class="flex-1 flex bg-gray-300 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2"
          >
            <img class="flex w-6 mr-2" src="/img/iconfinder_flame_1055059.png">Tendance
          </span>
        </footer>
      </article>
    </section>

    <section
      id="element"
      class="md:flex rounded overflow-hidden shadow-lg mt-10 ml-10 mr-auto ml-auto mb-10"
    >
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
export default {
  data() {
    return {}
  },

  mounted() {
    console.log("home")
  }
}
</script>