const productsList = document.querySelector('#productList')
const updateCard = document.querySelector('#updateCard')
const commandFromCart = document.querySelector('#commandFromCart')
const formData = []

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
            formData.push({
                product_id: productsIds[i],
                product_price: products[i].price,
                product_quantity: productsNums[i].length
            })
            productsList.innerHTML += `
            <tr>
            <td class="text-center">
                <a href="#" class="text-gray-32 font-size-26"></a>
            </td>
            <td class="d-none d-md-table-cell">
                <a href="#"><img class="max-width-100 p-1 border border-color-1" src="assets/product_Picture/${products[i].img}" alt="Image Description"></a>
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
                <span>${products[i].price * productsNums[i].length} FCFA</span>
            </td>
        </tr>
            `;
        }
    }

    updateCard.addEventListener('click', function() {
        localStorage.clear();
        productNum.forEach(ele => ele.innerHTML = '0')
        productPriceSum.forEach(pps => pps.innerHTML = '0 FCFA' )
        productsList.innerHTML = ''
    })

    commandFromCart.addEventListener('submit', function(e) {
        e.preventDefault()
        fetch(this.action, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Content-Type': 'text/json'
            },
            body: JSON.stringify(formData)
        })
        .then(res => {
            res.json()
            .then(data => {
                const errorBox = document.querySelector('.errorOrSuccess')
                if(data.error) {
                    errorBox.innerHTML = `
                    <div class="alert alert-danger mt-5 alert-dismissible fade show" role="alert">
                    <strong>${data.error}</strong>!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    `
                } else {
                    localStorage.clear();
                    productNum.forEach(ele => ele.innerHTML = '0')
                    productPriceSum.forEach(pps => pps.innerHTML = '0 FCFA' )
                    productsList.innerHTML = '';
                    errorBox.innerHTML = `
                    <div class="alert alert-success mt-5 alert-dismissible fade show" role="alert">
                    <strong>Votre commande a été un succès!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    `
                }
            })
        })
    })

