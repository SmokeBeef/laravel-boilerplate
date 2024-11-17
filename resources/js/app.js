import './bootstrap';

import './toggleTheme'



let actionButton = document.querySelectorAll('button[data-action="submit"]')

actionButton.forEach(val => {
    val.addEventListener('click', () => {
        val.innerHTML = '<span class="loading loading-spinner"></span>'
        console.log('actionButton')
        val.setAttribute('disabled', 'true')
        const form = val.closest('form');
        if (form) {
            form.submit();
        }
    })
})