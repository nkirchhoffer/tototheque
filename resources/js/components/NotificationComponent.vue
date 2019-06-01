<template>
    <div :class="cls">
        <button class="delete" v-on:click="hide()"></button>
        <slot></slot>
    </div>
</template>

<script>
export default {
    props: ['type'],
    
    data() {
        return {
            hidden: false
        }
    },

    computed: {
        cls() {
            let cls = 'notification '

            switch(this.type) {
                case 'error': cls += 'is-danger'; break
                case 'success': cls += 'is-success'; break
                case 'info': cls += 'is-info'; break
                default: cls += 'is-primary'; break
            }

            if (this.hidden) {
                cls += ' hidden'
            }

            return cls
        }
    },

    methods: {
        hide() {
            this.hidden = true
        }
    }
}
</script>

<style>
.hidden {
    display: none;
}
</style>
