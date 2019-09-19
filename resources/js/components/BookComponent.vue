<template>
    <section class="book">
        <div class="row w-3/4 mr-auto ml-auto">
            <article class="rounded overflow-hidden shadow-lg mt-10">
                
                <h1>{{ book.title }}</h1>
            </article>
        </div>
    </section>
</template>

<script>
import http from '../http'

export default {
    data () {
        return {
            book: null
        }
    },

    mounted() {
        const id = this.$route.params.id

        http.get('/books/' + id).then(res => {
            res.json().then(data => {
                this.book = data
            })
        })
    }

}
</script>