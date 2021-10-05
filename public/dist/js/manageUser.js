const closeBtn = document.querySelector('.closeBtn');
if (closeBtn != null) {
    closeBtn.addEventListener('click', _ => {
        document.querySelector('.successAlert').classList.add('hidden')
    })
}
const detailBtns = Array.from(document.querySelectorAll('.detailBtn'))
const deleteBtns = Array.from(document.querySelectorAll('.deleteUserbtn'))
const userDataList = document.querySelector('#userData')

if (detailBtns.length != 0) {
    detailBtns.forEach(btn => {
        btn.addEventListener('click', function () {
            fetch(this.dataset.detail_url)
                .then(res => {
                    res.json()
                        .then(data => {
                            const fields = Object.keys(data)
                            const values = Object.values(data)
                            for (let i = 0; i < fields.length; i++) {
                                userDataList.innerHTML += `
                                        <div class="flex" style="font-size: 16px;">
                                            <h2 class="font-semibold">${fields[i]} : </h2>
                                            <h2 class="ml-5">${values[i]}</h2>
                                        </div>
                        `
                            }
                        })
                })
        })
    })
}

document.querySelector('#quit').addEventListener('click', _ => userDataList.innerHTML = "")

if (deleteBtns.length != 0) {
    deleteBtns.forEach(btn => {
        btn.addEventListener('click', function () {
            document.querySelector('#confirmDeleteBtn').href = this.dataset.delete_url;
        })
    })
}
