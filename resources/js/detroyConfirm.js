import swal from 'sweetalert';
const myForm = document.querySelectorAll('form.delete-record');


myForm.forEach((formDelete)=>{
    formDelete.addEventListener('click', function(event){
        event.preventDefault();
        

    swal({
        title: "Sei Sicuro?!",
        text: "Una volta cancellato questo progetto non sara' piu' possibile recuperarlo",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            this.submit()
        } else {
            swal("Progetto non cancellato!");
        }
    });
    });

})



 