<template>
    <section class="book">
        <div class="row"></div>
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