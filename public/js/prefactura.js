function fechaActual() {
    let fechaLocal = new Date();
    let dd = fechaLocal.getDate();
    let mm = fechaLocal.getMonth() + 1;
    let yyyy = fechaLocal.getFullYear();
    if (dd < 10) {
        dd = '0' + dd;
    }
    if (mm < 10) {
        mm = '0' + mm;
    }
    fechaLocal = dd + '/' + mm + '/' + yyyy;
    return fechaLocal;
}

function optChange() {
    let TPrefactura = document.getElementById('TPrefactura').value;
    divT = document.getElementById('divTransporte');
    divS = document.getElementById('divServicios');

    let generador = document.getElementById('GenCertificado').value;


    if (generador != "") {
        if (TPrefactura == "PDG") {
            divT.style.display = "block";
            divS.style.display = "block";
        } else if (TPrefactura == "PD") {
            divT.style.display = "none";
            divS.style.display = "none";
        } else if (TPrefactura == "PT") {
            divT.style.display = "block";
            divS.style.display = "block";
        } else {
            divT.style.display = "none";
            divS.style.display = "none";
        }
    } else {
        alert('Llene el generador primero!');
    }

}

function printDiv(nombreDiv) {
    var contenido = document.getElementById("repPrefactura").innerHTML;
    var contenidoOriginal = document.body.innerHTML;

    document.body.innerHTML = contenido;
    window.print();
    document.body.innerHTML = contenidoOriginal;
    window.location.reload();
}
