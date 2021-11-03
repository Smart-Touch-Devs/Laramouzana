const addBtns = Array.from(document.querySelectorAll('.add-cart'))
const productNum = Array.from(document.querySelectorAll('a[title="Cart"] > span:first-of-type'))
const productPriceSum = Array.from(document.querySelectorAll('a[title="Cart"] > span:last-of-type'))
let cart = []
if(window.localStorage.getItem('cart')) {
   cart = Array.from(JSON.parse(window.localStorage.getItem('cart')))
   productNum.forEach(el => el.innerHTML = cart.length)

   productPriceSum.forEach(sum => sum.innerHTML = cart.map(product => product.price).reduce((previous, current) => previous + current, 0) + ' FCFA')
}

addBtns.forEach(button => {
    button.addEventListener('click', function(e) {
        e.preventDefault()
        if(cart === []) localStorage.setItem('cart', JSON.stringify([this.dataset.product_info]))
        else {
            cart.push(JSON.parse(this.dataset.product_info))
        }
        localStorage.setItem('cart', JSON.stringify(cart))
        productNum.forEach(pn => pn.innerHTML = parseInt(pn.textContent, 10) + 1)
        productPriceSum.forEach(sum => sum.innerHTML = parseInt(sum.textContent.split(' ')[0], 10) + JSON.parse(this.dataset.product_info).price + ' FCFA')
    })
})

console.log(productNum);
