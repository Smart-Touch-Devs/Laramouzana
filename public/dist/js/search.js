const input = document.querySelector("#searchBar");
const resultContainer = document.querySelector(".search-result");
const searchLinksContainer = document.querySelector('#searchLinksContainer')
input.addEventListener("input", function () {
    resultContainer.classList.add("show");
    fetch("/dist/json/search.json").then((res) => {
        res.json()
        .then(data => {
            const icons = {
                "staff": "home",
                "staff/all_products": "shopping-cart",
                "staff/add_categories": "shopping-cart",
                "staff/users/clients": "user",
                "staff/users/technicians": "user",
                "staff/users/accountants": "user",
                "staff/users/deliverers": "user",
                "Faqs": "hash",
                "staff/commands": "command",
                "staff/delivered_product": "command"
            }
            const result = []
            const first_regex = new RegExp(`^${this.value}`, 'gi');
            const second_regex = new RegExp(`${this.value}$`, 'gi');
            const third_regex = new RegExp(`${this.value}`, 'gi');


            data.forEach(obj => {
                let keys = Object.keys(obj)
                keys.forEach(key => {
                    if(first_regex.test(key)) {
                        result.push(
                            `<a href="${location.origin}/${obj[key]}" class="flex items-center my-1">
                                <div class="w-8 h-8 bg-theme-18 text-theme-9 flex items-center justify-center rounded-full">
                                    <i class="w-4 h-4" data-feather="${icons[obj[key]]}"></i>
                                </div>
                                <div class="ml-3">${key}</div>
                            </a>`
                        )
                    }
                    if(second_regex.test(key)) {
                        result.push(
                            `<a href="${location.origin}/${obj[key]}" class="flex items-center my-1">
                                <div class="w-8 h-8 bg-theme-18 text-theme-9 flex items-center justify-center rounded-full">
                                    <i class="w-4 h-4" data-feather="${icons[obj[key]]}"></i>
                                </div>
                                <div class="ml-3">${key}</div>
                            </a>`
                        )
                    }
                    if(third_regex.test(key)) {
                        result.push(
                            `<a href="${location.origin}/${obj[key]}" class="flex items-center my-1">
                                <div class="w-8 h-8 bg-theme-18 text-theme-9 flex items-center justify-center rounded-full">
                                    <i class="w-4 h-4" data-feather="${icons[obj[key]]}"></i>
                                </div>
                                <div class="ml-3">${key}</div>
                            </a>`
                        )
                    }
                })
            });
            const finalResult = []

            for(let i = 0; i < 10; i++) {
                finalResult.push([...new Set(result)][i])
            }

            if(result.length = 0) searchLinksContainer.innerHTML = `<p class="font-semibold mx-auto">Aucune occurrence trouvé</p>`

            searchLinksContainer.innerHTML = finalResult.join("\n")
        })
    });
});
