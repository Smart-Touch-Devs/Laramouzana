const closeBtn = document.querySelector(".closeBtn");
if (closeBtn != null) {
    closeBtn.addEventListener("click", (_) => {
        document.querySelector(".successAlert").classList.add("hidden");
    });
}
const detailBtns = Array.from(document.querySelectorAll(".detailBtn"));
const deleteBtns = Array.from(document.querySelectorAll(".deleteUserbtn"));
const userDataList = document.querySelector("#userData");

if (detailBtns.length != 0) {
    detailBtns.forEach((btn) => {
        btn.addEventListener("click", function () {
            fetch(this.dataset.detail_url).then((res) => {
                res.json().then((data) => {
                    const fields = Object.keys(data).filter((key) => {
                        if (
                            !["selfie", "card_recto", "card_verso"].includes(
                                key
                            )
                        )
                            return key;
                    });
                    const values = Object.values(data);
                    for (let i = 0; i < fields.length; i++) {
                        userDataList.innerHTML += `
                                        <div class="flex" style="font-size: 16px;">
                                            <h2 class="font-semibold">${fields[i]} : </h2>
                                            <h2 class="ml-5">${values[i]}</h2>
                                        </div>
                        `;
                    }
                    ["selfie", "card_recto", "card_verso"].forEach((key) => {
                        if (data[key]) {
                            switch (key) {
                                case "selfie":
                                    userDataList.innerHTML +=
                                    `<div style="font-size: 16px;">
                                        <h2 class="font-semibold">Selfie avec  : </h2>
                                        <div class="ml-5">
                                            <img src="${location.origin}/assets/selfies_folder/${data[key]}" class="w-100" />
                                        </div>
                                    </div>`;
                                    break;

                                case "card_recto":
                                    userDataList.innerHTML +=
                                    `<div style="font-size: 16px;">
                                        <h2 class="font-semibold">Image recto du CNIB : </h2>
                                        <div class="ml-5">
                                            <img src="${location.origin}/assets/cardsRectos_folder/${data[key]}" class="w-100" />
                                        </div>
                                    </div>`;
                                    break;

                                case "card_verso":
                                    userDataList.innerHTML +=
                                    `<div style="font-size: 16px;">
                                            <h2 class="font-semibold">Image verso du CNIB : </h2>
                                            <div class="ml-5">
                                                <img src="${location.origin}/assets/cardsVersos_folder/${data[key]}" class="w-100" />
                                            </div>
                                        </div>`;
                                    break;
                            }
                        }
                    });
                });
            });
        });
    });
}

document
    .querySelector("#quit")
    .addEventListener("click", (_) => (userDataList.innerHTML = ""));

    document
    .body
    .addEventListener('click', _ => (userDataList.innerHTML = ""))
if (deleteBtns.length != 0) {
    deleteBtns.forEach((btn) => {
        btn.addEventListener("click", function () {
            document.querySelector("#confirmDeleteBtn").href =
                this.dataset.delete_url;
        });
    });
}
