import 'waypoints/lib/jquery.waypoints'

export default class List {

    constructor(element, cssClass = '-inview') {
        this.$list = $(element)
        this.$items = this.$list.find('[data-element="inview-item"]')

        this.inviewClass = cssClass

        this.addInview()
    }

    addInview() {
        this.$items.each((index, element) => {
            const item = new Waypoint({
                element: element,
                handler: (direction) => {
                    $(element).addClass(this.inviewClass)
                },
                offset: '80%'
            })
        })
    }
}