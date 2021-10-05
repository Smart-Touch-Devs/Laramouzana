
const productsList = document.querySelector('#productList')
const updateCard = document.querySelector('#updateCard')
window.onload = () => {
    let reaper_cart = []
    if(localStorage.getItem('cart')) {
        reaper_cart = Array.from(JSON.parse(localStorage.getItem('cart')))
    }

    if(reaper_cart !== []) {
        const productsIds = [...new Set(reaper_cart.map(product => product.productId))]
        const productsNums = []
        const products = []
        for(let i = 0; i < productsIds.length; i++) {
        productsNums.push(reaper_cart.filter(product => product.productId === productsIds[i]))
        }
        productsNums.forEach(arr => {
            let product = reaper_cart.filter(product => product.productId === arr[0].productId)[0]
            products.push(product);
        })
        for(let i = 0; i < products.length; i++) {
            productsList.innerHTML += `
            <tr>
            <td class="text-center">
                <a href="#" class="text-gray-32 font-size-26"></a>
            </td>
            <td class="d-none d-md-table-cell">
                <a href="#"><img class="img-fluid max-width-100 p-1 border border-color-1" src="assets/product_Picture/${products[i].img}" alt="Image Description"></a>
            </td>

            <td data-title="Product">
                <a href="#" class="text-gray-90">${products[i].productName}</a>
            </td>

            <input type="hidden" name="product_${products[i].productName}" value="${productsNums[i].length}">

            <td data-title="Price">
                <span>${products[i].price} FCFA</span>
            </td>

            <td data-title="Quantity">
                <span>${productsNums[i].length}</span>
            </td>

            <td data-title="Total">
                <span>${products[i].price * productsNums[i].length}</span>
            </td>
        </tr>
            `;
        }
    }

    updateCard.addEventListener('click', function() {
        localStorage.clear();
        productNum.innerHTML = '0'
        productPriceSum.innerHTML = '0 FCFA'
    })
}


