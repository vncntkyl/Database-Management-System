const openModalButtons = document.querySelectorAll('[data-modal-target]')
const closeModalButtons = document.querySelectorAll('[data-close-button]')
const overlay = document.getElementById('overlay')
if (openModalButtons != null) {
    openModalButtons.forEach(button => {
    button.addEventListener('click', () => {
        const confirm_message = document.querySelector(button.dataset.modalTarget)
        openModal(confirm_message)
    })
})
}

if (overlay != null) {
    overlay.addEventListener('click', () =>{
        const modals = document.querySelectorAll('.confirm-message.active')
        const success = document.querySelectorAll('.success-message.active')
        modals.forEach(confirm_message =>{
            closeModal(confirm_message)
        })
        success.forEach(modal => {
            closeModal(modal)
        })
    }) 
}

if (closeModalButtons != null) {
    closeModalButtons.forEach(button => {
    button.addEventListener('click', () => {
        const confirm_message = button.closest('.confirm-message')
        closeModal(confirm_message)
    })
})
}
function openModal(modal){
    if (modal == null) return
    modal.classList.add('active')
    overlay.classList.add('active')
}

function closeModal(modal){
    if (modal == null) return
    modal.classList.remove('active')
    overlay.classList.remove('active')
}


const getCellValue = (tr,index) => tr.children[index].innerText || tr.children[index].textContent;
const comparer = (idx, asc) => 
(a, b) => 
((v1, v2) =>  v1 !== '' && v2 !== '' && !isNaN(v1) && !isNaN(v2) ? 
v1 - v2 : v1
.toString()
.localeCompare(v2))
(getCellValue(asc ? a : b, idx), getCellValue(asc ? b : a, idx));

document.querySelectorAll('th').forEach(th => th.addEventListener('click', (() => {
    const table = th.closest('table');
    const tbody = table.querySelector('tbody');
    Array.from(tbody.querySelectorAll('tr'))
        .sort(comparer(Array.from(th.parentNode.children).indexOf(th), this.asc = !this.asc))
        .forEach(tr => tbody.appendChild(tr))
})))