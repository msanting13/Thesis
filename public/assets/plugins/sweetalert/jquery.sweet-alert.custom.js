$(document).ready(function () {
    $('.btn-delete').on('click',function(e){
        e.preventDefault();
        let form = $(this).parents('form');
        let title = $(this).data("textval");

        swal({
            title: "Are you sure you want to delete?",
            text: title,
            icon: "warning",
            buttons: true,
        })
        .then((isConfirm) => {
            if (isConfirm) {
                form.submit();
            } 
            else {
            }
        });
    });
}); 