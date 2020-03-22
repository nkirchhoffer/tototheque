<template>
    <div :class="cls" v-on:click="hide()">
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
                case 'error': cls += 'bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative'; break
                case 'success': cls += 'bg-teal-100 border border-teal-400 text-teal-700 px-4 py-3 rounded relative'; break
                case 'info': cls += 'bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative'; break
                default: cls += 'bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative'; break
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
