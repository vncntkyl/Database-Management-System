const links = document.querySelectorAll('.dbms-table');
links.forEach(table => {
    table.addEventListener('click', () => {
        switch (table.id) {
            case 'account':
                location.href = 'account/';
                break
            case 'equipment':
                location.href = 'equipment/';
                break
            case 'log':
                location.href = 'log/';
                break
        }
    })
})
$(document).ready(function () {
    $('#database-table').DataTable({
        searching: false,
        ordering: false,
        autoWidth: false,
        "lengthMenu": [5, 10, 25, 50],
        "language": {
            "lengthMenu": "Show _MENU_ records",
            "info": "Showing _START_ to _END_ of _TOTAL_ records",
            "paginate": {
                "previous": "<<",
                "next": ">>"
            }
        }
    });
});

const loader = document.querySelector('.loader-wrapper');

window.onload = function () {
    loader.style.opacity = '0'
    loader.style.zIndex = '0'
}

const text_fields = document.querySelectorAll('[data-field-input]')
const select_fields = document.querySelectorAll('[data-field-select]')
text_fields.forEach(field => {
    field.addEventListener('input', () => {
        if (field.value.length != 0) {
            field.style.backgroundColor = "var(--clr-main-light)"
        } else {
            field.style.backgroundColor = "white"
        }
    })
})
select_fields.forEach(field => {
    field.addEventListener('change', () => {
        if (field.value != "") {
            field.style.backgroundColor = "var(--clr-main-light)"
        } else {
            field.style.backgroundColor = "white"
        }
    })
})