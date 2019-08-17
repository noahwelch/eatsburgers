import MainNav from 'MainNav'

$(document).ready(() => {
    $('[data-component="main-nav"]').each((index, element) => {
        new MainNav(element)
    })
})