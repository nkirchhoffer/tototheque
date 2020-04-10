<template>
    <section class="lg:w-1/2 md:w-5/6 flex bg-gray-100 rounded overflow-hidden shadow-lg mt-10 mr-auto ml-auto mb-10">
        <aside class="lg:w-1/5 md:w-1/5 sm:w-1/4 bg-gray-200">
            <p class="text-center text-xl text-gray-900 mt-4">{{ review.author.name }}</p> <!--Nom d'utilisateur-->
            <p class="text-center">{{ date }}</p> <!--Date du poste-->
            <li class="flex justify-center p-2"> <!--Note-->
                <ul v-for="note in notes"><img class="h-6" :src="star(note)"></ul>
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

        data() {
            return {
                notes: [
                    false,
                    false,
                    false,
                    false,
                    false
                ]
            }
        },

        computed: {
            date() {
                return moment(this.review.created_at).format('L')
            }
        },

        methods: {
            star(note) {
                if (note) {
                    return '/img/star_black_empty.png'
                }

                return '/img/star_black.png'
            }
        },

        beforeMount() {
            for (let i = 0; i < this.review.note; i++) {
                this.notes[i] = true
            }
        }


    }
</script>