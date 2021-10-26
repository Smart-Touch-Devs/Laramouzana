document.querySelector('#amount').addEventListener('blur', function() {
        document.querySelector('#processAmount').innerHTML = Number(this.value) + ((Number(this.value) * 9) / 100)
        document.querySelector('input[name="amount"]').value = Number(this.value) + ((Number(this.value) * 9) / 100)
        document.querySelector('#modalAmount').innerHTML = Number(this.value) + ((Number(this.value) * 9) / 100)
        document.querySelector('#amountPercent').innerHTML = ((Number(this.value) * 9) / 100)
    })
document.querySelector("#pre-form").addEventListener('submit', function(e) {
e.preventDefault()
const inputs = Array.from(document.querySelectorAll('#final-form .inp'))
const preInputs = Array.from(document.querySelectorAll('#pre-form .pre-inp'))
for(let i = 0; i < preInputs.length; i++) {
    inputs[i].value = preInputs[i].value
}
console.log(document.querySelectorAll('#final-form input'));

})
