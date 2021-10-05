const addBtns = Array.from(document.querySelectorAll('.add-cart'))
const productNum = document.querySelector('a[title="Cart"] > span:first-of-type')
const productPriceSum = document.querySelector('a[title="Cart"] > span:last-of-type')
let cart = []
if(window.localStorage.getItem('cart')) {
   cart = Array.from(JSON.parse(window.localStorage.getItem('cart')))
   productNum.innerHTML = cart.length
   productPriceSum.innerHTML = cart.map(product => product.price).reduce((previous, current) => previous + current, 0) + ' FCFA'
}

addBtns.forEach(button => {
    button.addEventListener('click', function(e) {
        e.preventDefault()
        if(cart === []) localStorage.setItem('cart', JSON.stringify([this.dataset.product_info]))
        else {
            cart.push(JSON.parse(this.dataset.product_info))
        }
        localStorage.setItem('cart', JSON.stringify(cart))
        productNum.innerHTML = parseInt(productNum.textContent, 10) + 1
        productPriceSum.innerHTML = parseInt(productPriceSum.textContent.split(' ')[0], 10) + JSON.parse(this.dataset.product_info).price + ' FCFA'
    })
})
