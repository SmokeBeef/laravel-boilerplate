
const toogleTheme = () => {
    let button = document.querySelector('[data-act-class="ACTIVECLASS"]')
    if (button) {
        button.addEventListener('click', () => {
            let html = document.getElementsByTagName('html')[0]
            console.log(html.getAttribute('data-theme'))
            const date = (new Date())
            date.setMonth(date.getMonth() + 1)
            const expires = date.toUTCString()
            if (html.getAttribute('data-theme') === 'night') {
                console.log('set data theme to light')
                document.cookie = "theme=light;Expires=" + expires + ";path=/;sameSite=lax;"
            } else {
                console.log('set data theme to night')
                document.cookie = "theme=night;Expires=" + expires + ";path=/;sameSite=lax;"
            }
        })
    }
}

toogleTheme()