$(function () {
    confirmDelete = function (formId) {
        'use strict';
        Swal.fire({
            title: "Anda yakin?",
            text: "Anda tidak dapat mengembalikan data yang telah dihapus!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, hapus!",
            cancelButtonText: "Batal",
            customClass: {
                confirmButton: "btn fw-bold btn-danger",
                cancelButton: "btn fw-bold btn-active-light-primary",
            },
        }).then((result) => {
            if (result.isConfirmed) {
                const deleteForm = $(`#${formId}`);
                deleteForm.find('input[name="_method"]').val("DELETE");
                deleteForm.trigger('submit');
            }
        });
    }
});
