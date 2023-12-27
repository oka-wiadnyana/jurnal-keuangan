function showModal(emit_message,data=null){
    Livewire.dispatch(emit_message,{data});
    
}

function deleteData(route,id,message='Yakin dihapus?'){
    Swal.fire({
        title: message,
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: "Yakin",
        denyButtonText: `Tidak`
        }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            axios.post(route, {
                id,
            })
            .then(function (response) {
               location.reload();
            })
            .catch(function (error) {
                console.log(error);
            });
        } else if (result.isDenied) {
            Swal.fire("Cancel", "", "info");
        }
    });
}