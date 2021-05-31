import '../css/custom.css'

let wishlistBtn = document.querySelector('.l4-wishlist')
let activeClass = 'l4-active'

window.axios = require('axios');
const SHOP_DOMAIN = 'https://wishlist.test'

const postRequest = (elem, URI) => {
    let {customer, product} = elem.dataset;
    axios.post(
        SHOP_DOMAIN+'/api/'+URI,
        {shop_id: Shopify.shop, customer_id: customer, product_id: product},)
        .then(response => {console.log('response:',response)})
        .catch(error => {console.log(error, 'error')})
}

const addToWishlist = (elem) => {
    postRequest(elem, 'addToWishlist')

    elem.classList.add(activeClass);
    elem.innerText = 'Remove from Wishlist'
}

const removeFromWishlist = (elem) => {
    postRequest(elem, 'removeFromWishlist')

    elem.classList.remove(activeClass);
    elem.innerText = 'Add To Wishlist'

}


wishlistBtn.addEventListener('click', function(){
    if (!this.classList.contains(activeClass)){
        addToWishlist(this)
    }else {
        removeFromWishlist(this)
    }
})
