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

// Calcul des quantités sur le panier 
//let  book__number =  document.getElementById("book__number");
//book__number.addEventListener("change", function(){calculqt(this.getAttribute("isbn"), this.value);});
//prix.addEventListener("span", function(){calculqt(this.id, this.value);});

function calculqt (isbn, valeur, bookprice)
{
    let  prix =  document.getElementById("prix_"+isbn);
    let  total =  document.getElementById("total__price");
    let price = valeur * bookprice;
    prix.innerText = price ;
    let divs = document.getElementsByClassName("book__price");
    let totalprice =0;
    for(let i =0;i < divs.length;i++){console.log(divs.item(i).children[0].innerText);
        totalprice += parseInt(divs.item(i).children[0].innerText);
    }
    total.innerText = parseInt(totalprice) ;
}