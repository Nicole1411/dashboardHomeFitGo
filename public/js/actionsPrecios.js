function guardarPrecios() {
    let rucGenerador = document.getElementById("ruccontrato").value;
    if (arrDesechosP.length > 0 && rucGenerador != "") {
        let parametros = {
            'desechosP': JSON.stringify(arrDesechosP),
            'rucGenerador': rucGenerador,
        }
        $.ajax({
            data: parametros,
            url: "../BD/php/guardarprecios.php",
            type: "POST",
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Datos enviados correctamente!',
                    text: 'Precios guardados con éxito...',
                    confirmButtonText: 'Aceptar',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "../../pages/generador.php";
                    }
                })
            }
        });
    } else {
        Swal.fire({
            icon: 'error',
            title: 'Información incompleta!',
            text: 'Verifique que se haya ingresado al menos un precio'
        })
    }
}