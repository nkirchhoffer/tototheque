import 'bootstrap'
import Choices from 'choices.js'

const sections = document.querySelectorAll('section')

sections.forEach(section => {
    if (section.classList.contains('new-author')) {
        const authors = document.getElementById('authors')
        new Choices(authors)
    }
})
