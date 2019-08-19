import 'vendor/jquery.debouncedresize'

export default class MainNav {
    bodyOpenClass = '-nav-open'
    mobileToggleActiveClass = 'is-active'
    mobileNavActive = false

    constructor(element) {
        this.$component = $(element)
        this.$toggle = this.$component.find('[data-element="toggle"]')
        this.$nav = this.$component.find('[data-element="navigation"]')

        this.bindEvents()
    }

    bindEvents() {
        $(window).on('load debouncedresize', () => {
            this.createNavs()
        })
    }

    createNavs() {
        if (window.matchMedia(`(min-width: 640px)`).matches) {
            this.setDesktopNav()
        } else {
            this.setMobileNav()
        }
    }

    setDesktopNav() {
        if (this.$toggle) {
            this.$toggle.off()
        }

        if (this.mobileNavActive) {
            this.$toggle.removeClass(this.mobileToggleActiveClass)
            this.mobileNavActive = false
            this.$nav.removeAttr('style')
            this.$nav.attr('data-property', 'closed')
            $('body').removeClass(this.bodyOpenClass)
        }
    }

    setMobileNav() {
        this.$toggle.on('click', () => {
            if (this.mobileNavActive) {
                this.closeNav()
            } else {
                this.openNav()
            }
        })
    }

    openNav() {
        this.$toggle.addClass(this.mobileToggleActiveClass)
        this.$nav.slideDown({
            duration: 400,
            complete: () => {
                this.mobileNavActive = true
                this.$nav.removeAttr('style')
                this.$nav.attr('data-property', 'open')
                $('body').addClass(this.bodyOpenClass)
            }
        })
    }

    closeNav() {
        this.$toggle.removeClass(this.mobileToggleActiveClass)
        this.$nav.slideUp({
            duration: 500,
            complete: () => {
                this.mobileNavActive = false
                this.$nav.removeAttr('style')
                this.$nav.attr('data-property', 'closed')
                $('body').removeClass(this.bodyOpenClass)
            }
        })
    }
}