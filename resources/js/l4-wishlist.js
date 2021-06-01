import '../css/custom.css'

let wishlistBtn = document.querySelector('.l4-wishlist')
let activeClass = 'l4-active'
const API_URI_ADD = 'addToWishlist';
const API_URI_REMOVE = 'removeFromWishlist';
const elemInnerTextAdd = 'Add To Wishlist'
const elemInnerTextRemove =  'Remove from Wishlist'

window.axios = require('axios');

if(wishlistBtn){

    const SHOP_DOMAIN = 'https://wishlist.test'

    let productId = document.querySelector('.l4-wishlist').dataset.product;
    let customerId = document.querySelector('.l4-wishlist').dataset.customer;
    let shopId = Shopify.shop;

    // Check if Product is already added to wishlist

    const isItemInDb = () => {

        let config = {
            params: {
                shop_id: Shopify.shop,
                customer_id: customerId,
                product_id: productId
            }
        }

        return axios.get(SHOP_DOMAIN+'/api/getWishlistElement', config)
            .then(response => {
                let itemInDb = false
                if (response.data !== "" && typeof (response.data) === "object"){
                    itemInDb = true
                }
                return itemInDb
            })
            .catch(error => {console.log(error, 'error')})
    };

    const postRequest = (elem, URI) => {
        let {customer, product} = elem.dataset;
        axios.post(
            SHOP_DOMAIN+'/api/'+URI,
            {shop_id: Shopify.shop, customer_id: customer, product_id: product},)
            .then(response => {console.log('response:',response)})
            .catch(error => {console.log(error, 'error')})
    };

    const addToWishlist = (elem) => {
        postRequest(elem, API_URI_ADD)

        elem.classList.add(activeClass);
        elem.innerText = elemInnerTextRemove
    };

    const removeFromWishlist = (elem) => {
        postRequest(elem, API_URI_REMOVE)

        elem.classList.remove(activeClass);
        elem.innerText = elemInnerTextAdd

    };



    // Wait for document loading
    if (document.readyState === "complete" || document.readyState === "interactive") {
        let itemInDb = isItemInDb();

        itemInDb.then(function (result) {

            console.log('itemInDb', itemInDb, 'result', result);

            if (result === true){
                console.log("I'm in here")
                wishlistBtn.classList.add(activeClass)
                wishlistBtn.innerText = elemInnerTextRemove
            }
        })

    }


    wishlistBtn.addEventListener('click', function(){
        if (this.classList.contains(activeClass)){
            removeFromWishlist(this)
        }else {
            addToWishlist(this)
        }
    });

}
