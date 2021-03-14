//afficher et cacher le menu
const menuBtn = document.querySelector('.header__menu')
const navigation = document.querySelector('.main__navigation')
const transform = "translatex(-100%)"
menuBtn.addEventListener('click', menu)
function menu() {
    if (this.classList.contains('show')) {
        this.classList.remove('show')
        navigation.style.transform = `translatex(${-105}%)`;
    } else {
        this.classList.add("show");
		navigation.style.transform = `translatex(${0}%)`;
    }
}

//Affichage de mon modal1
let modal = null

const openModal = function (e) {
    e.preventDefault()
    const target = document.querySelector(e.target.getAttribute('href'))
    target.style.display = null
    target.removeAttribute('aria-hidden')
    target.setAttribute('aria-modal', 'true')
    modal = target
    modal.addEventListener('click', closeModal)
    modal.querySelector('.js-modal-close').addEventListener('click', closeModal)
    modal.querySelector('.js-modal-stop').addEventListener('click', stopPropagation)

}

const closeModal = function (e) {
    if(modal === null) return
    e.preventDefault()
    modal.style.display = "none"
    modal.setAttribute('aria-hidden', 'true')
    modal.removeAttribute('aria-modal')
    modal.removeEventListener('click', closeModal)
    modal.querySelector('.js-modal-close').removeEventListener('click', closeModal)
    modal.querySelector('.js-modal-stop').removeEventListener('click', stopPropagation)
    modal = null
}

const stopPropagation = function (e) {
    e.stopPropagation()
}

document.querySelectorAll('.js-modal').forEach(a => {
    a.addEventListener('click', openModal)
   
})
