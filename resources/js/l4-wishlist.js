import '../css/custom.css'

let wishlistBtn = document.querySelector('.l4-wishlist')
let activeClass = 'l4-active'

const addToWishlist = (elem) => {
    console.log('Add to wishlist')
    elem.classList.add(activeClass)
    elem.innerText = 'Remove from Wishlist'
}

const removeFromWishlist = (elem) => {
    console.log('Remove from to wishlist')
    elem.classList.remove(activeClass)
    elem.innerText = 'Add To Wishlist'

}


wishlistBtn.addEventListener('click', function(){
    if (!this.classList.contains(activeClass)){
        addToWishlist(this)
    }else {
        removeFromWishlist(this)
    }

})
