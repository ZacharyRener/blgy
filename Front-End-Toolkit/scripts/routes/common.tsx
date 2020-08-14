export default {

    init() {
    
        this.displaySubMenuOnHover()

    },

    finalize() {
      
        

    },

    displaySubMenuOnHover() {
        let itemsWithChild = document.querySelectorAll<HTMLElement>('.menu-item-has-children')
        itemsWithChild.forEach(item => {
            item.onmouseenter = e => {
                let target = e.target as HTMLElement
                let dropdownMenu = target.children[1] as HTMLElement
                dropdownMenu.classList.add('show')
            }
            item.onmouseleave = e => {
                let target = e.target as HTMLElement
                let dropdownMenu = target.children[1] as HTMLElement
                dropdownMenu.classList.remove('show')
            }
        })
    }

  }