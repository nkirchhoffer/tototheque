import 'whatwg-fetch'

const http = {
    url: uri => window.location.protocol + '//' + window.location.host + '/api' + uri,

    params: {
        credentials: 'same-origin',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    },

    get: async function (resource) {
        return await fetch(this.url(resource), this.params)
    },

    post: async function (resource, data) {
        return await fetch(this.url(resource), {
            ...this.params,
            method: 'POST',
            body: data
        })
    }
}

export default http