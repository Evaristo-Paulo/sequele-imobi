var span = document.querySelector('#year')
var year = new Date().getFullYear()
span.innerHTML = year

var menuHumburger = document.querySelector('.menu-humburger')
var menuHumburgerModal = document.querySelector('.menu-humburger-modal')
var menuHumburgerClose = document.querySelector('.menu-humburger-close')

menuHumburger.addEventListener('click', (e) => {
    menuHumburgerModal.style.display = "block"
    menuHumburgerClose.style.display = "block"
    menuHumburger.style.display = "none"
})
menuHumburgerClose.addEventListener('click', (e) => {
    menuHumburgerModal.style.display = "none"
    menuHumburgerClose.style.display = "none"
    menuHumburger.style.display = "block"

})

var collaborator = document.querySelector('#collaborator-register')
var collaboratorMobile = document.querySelector('#collaborator-register-mobile')
var collaboratorModal = document.querySelector('.modal-collaborator.register-colab')
var collaboratorClose = document.querySelector('.close-colab')

collaborator.addEventListener('click', (e) => {
    collaboratorModal.style.display = "block"
    //menuHumburger.style.display = "none"
})
setTimeout(function (e) {
    var alertMessage = document.querySelector('.alert')
    if (alertMessage) {
        alertMessage.style.display = 'none';
    }
}, 2000)
setTimeout(function (e) {
    var validationMessage = document.querySelector('.validation')
    if (validationMessage) {
        validationMessage.style.display = 'none';
    }
}, 4000)


collaboratorMobile.addEventListener('click', (e) => {
    collaboratorModal.style.display = "block"
    //menuHumburger.style.display = "none"
    menuHumburgerModal.style.display = "none"
    menuHumburger.style.display = "block"
    menuHumburger.style.pointerEvents = "none"
    menuHumburgerClose.style.display = "none"
})
collaboratorClose.addEventListener('click', (e) => {
    collaboratorModal.style.display = "none"
    menuHumburger.style.pointerEvents = "all"
})

var btnFilter = document.querySelector('.filter-mobile')
var btnFilterClose = document.querySelector('.close-filter')
var modalFilter = document.querySelector('.modal-collaborator.filter-modal')

if (btnFilter) {
    btnFilter.addEventListener('click', () => {
        console.log('Click on me .... ')
        modalFilter.style.display = "block"
        menuHumburger.style.pointerEvents = "none"
    })
}

if (btnFilterClose) {
    btnFilterClose.addEventListener('click', () => {
        modalFilter.style.display = 'none'
        menuHumburger.style.pointerEvents = "all"
    })
}
