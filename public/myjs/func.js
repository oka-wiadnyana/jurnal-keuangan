function showModalAdd(emit_message,prop=null){
    Livewire.dispatch(emit_message,{prop});
    
}
function showModalEdit(emit_message,id){
    Livewire.dispatch(emit_message,{id});
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