import MainNav from 'MainNav'
import Inview from 'Inview'

$(document).ready(() => {
    $('[data-component="main-nav"]').each((index, element) => {
        new MainNav(element)
    })

    $('[data-component="inview"]').each((index, element) => {
        new Inview(element)
    })
})