const searchForm = document.querySelector('#clientSearchForm')
const searchInput = document.querySelector('#searched')
const resultContainer = document.querySelector('.searchResult')
const resultList  = document.querySelector('.searchResult ul')

searchForm.addEventListener('submit', (e) => {e.preventDefault()})
searchInput.addEventListener('input', function() {
    fetch(`${searchForm.action}/${this.value}`)
    .then(res => {
        res.json()
        .then(data => {
            resultContainer.classList.replace('d-none', 'd-block')
            if(data.nothing) resultContainer.innerHTML = '<p class="ml-5 font-weight-bold">Aucun resultat n\'a été trouvé!</p>'
            console.log([...new Set(data)]);
            for(let product of [...new Set(data)]) {
                if([...new Set(data)].indexOf(product) === 0) {
                    resultList.innerHTML = ''
                }
                resultList.innerHTML += `
                <li class="pl-3">
                    <a href="${location.origin}/single_product/${product.id}" class="py-2">
                        <img src="${location.origin}/assets/product_Picture/${product.picture1}" style="width: 50px; height="50px;" />
                        <span class="ml-2">${product.product_name}</span>
                    </a>
                </li>
                `
            }
        })
    })
})


document.body.addEventListener('click', _ => resultContainer.classList.replace('d-block', 'd-none'))
