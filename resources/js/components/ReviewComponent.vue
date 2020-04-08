<template>
    <section class="w-2/4 flex bg-gray-100 rounded overflow-hidden shadow-lg my-10 mr-auto ml-auto">
        <aside class="w-1/5">
            <img src="/img/avatar_5.png" alt="avatar" class="h-32 mr-auto ml-auto"> <!--Avatar-->
            <p class="text-center">{{ review.author.name }}</p> <!--Nom d'utilisateur-->
            <p class="text-center">Le : {{ date }}</p> <!--Date du poste-->
            <li class="flex justify-center p-2"> <!--Note-->
                <ul><img class="h-6" src="/img/star_black.png" onmouseover="this.src='/img/star_black_empty.png'" onmouseout="this.src='/img/star_black.png'"></ul>
                <ul><img class="h-6" src="/img/star_black.png" onmouseover="this.src='/img/star_black_empty.png'" onmouseout="this.src='/img/star_black.png'"></ul>
                <ul><img class="h-6" src="/img/star_black.png" onmouseover="this.src='/img/star_black_empty.png'" onmouseout="this.src='/img/star_black.png'"></ul>
                <ul><img class="h-6" src="/img/star_black.png" onmouseover="this.src='/img/star_black_empty.png'" onmouseout="this.src='/img/star_black.png'"></ul>
                <ul><img class="h-6" src="/img/star_black.png" onmouseover="this.src='/img/star_black_empty.png'" onmouseout="this.src='/img/star_black.png'"></ul>
            </li>
        </aside>
        <article class="w-4/5 px-6 py-4">
            <header class="font-bold text-xl mb-2">{{ review.title }}</header> <!--Titre avis-->
            <p class="text-gray-700 text-base">{{ review.comment }}</p>
        </article>
    </section>
</template>

<script type="text/javascript">
    import moment from 'moment'
    moment().locale('fr')

    export default {
        props: ['review'],

        computed: {
            date() {
                return moment(this.review.created_at).format('L')
            }
        }
    }
</script>