$(document).ready(function() {

    document.getElementById("controlsig").disabled = true;

    let fechaEmilocal = new Date();
    let dd = fechaEmilocal.getDate();
    let mm = fechaEmilocal.getMonth() + 1;
    let yyyy = fechaEmilocal.getFullYear();
    if (dd < 10) {
        dd = '0' + dd;
    }
    if (mm < 10) {
        mm = '0' + mm;
    }
    fechaEmilocal = yyyy + '-' + mm + '-' + dd;
    document.getElementById("femision").value = fechaEmilocal;


    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;

    $(".next").click(function() {

        current_fs = $(this).parent();
        next_fs = $(this).parent().next();

        //Add Class Active
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({ opacity: 0 }, {
            step: function(now) {
                // for making fielset appear animation
                opacity = 1 - now;

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                next_fs.css({ 'opacity': opacity });
            },
            duration: 600
        });
    });

    $(".previous").click(function() {

        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();

        //Remove class active
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

        //show the previous fieldset
        previous_fs.show();

        //hide the current fieldset with style
        current_fs.animate({ opacity: 0 }, {
            step: function(now) {
                // for making fielset appear animation
                opacity = 1 - now;

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                previous_fs.css({ 'opacity': opacity });
            },
            duration: 600
        });
    });

    $('.radio-group .radio').click(function() {
        $(this).parent().find('.radio').removeClass('selected');
        $(this).addClass('selected');
    });

    $(".submit").click(function() {
        return false;
    })
    validacionPrimera();
});


function validacionPrimera() {
    let codigo, femision, finicio, puntop;
    codigo = document.getElementById("codigo").value;
    femision = document.getElementById("femision").value;
    finicio = document.getElementById("finicio").value;
    puntop = document.getElementById("puntop").value;
    if (finicio != "") {
        document.getElementById("fpartida").value = finicio + "T00:00";
        document.getElementById("farribo").value = "";
        document.getElementById("FITransporte").value = "";
        document.getElementById("FFinTransporte").value = "";
    }
    if (codigo != "" && femision != "" && finicio != "" && ppartida != "") {
        document.getElementById("controlsig").disabled = false;
    } else {
        document.getElementById("controlsig").disabled = true;
    }
}

function cargaTransportista() {
    let transportista = document.getElementById("nconductor").value;
    document.getElementById("nomtranspor").value = transportista;
};

function validarfechas() {
    let fmayorsplit, fmayorfin, fmenorsplit, fmenorfin, fmitadsplit, fmitadfin, flocal, flocalsplit, flocalfin;
    flocal = new Date()
    let dd = flocal.getDate();
    let mm = flocal.getMonth() + 1;
    let yyyy = flocal.getFullYear();
    if (dd < 10) {
        dd = '0' + dd;
    }
    if (mm < 10) {
        mm = '0' + mm;
    }
    flocal = yyyy + '-' + mm + '-' + dd;
    flocalsplit = flocal.split("-");
    fmayorsplit = fmayor.split("-");
    fmayorfin = new Date(parseInt(fmayorsplit[0]), parseInt(fmayorsplit[1] - 1), parseInt(fmayorsplit[2].substr(0, 2)));
    fmenorsplit = fmenor.split("-");
    fmenorfin = new Date(parseInt(fmenorsplit[0]), parseInt(fmenorsplit[1] - 1), parseInt(fmenorsplit[2].substr(0, 2)));
    fmitadsplit = fmitad.split("-");
    fmitadfin = new Date(parseInt(fmitadsplit[0]), parseInt(fmitadsplit[1] - 1), parseInt(fmitadsplit[2].substr(0, 2)));
    if ((fmayorfin >= fmenorfin) && (fmayorfin >= fmitadfin) && (fmitadfin >= fmenorfin) && ((parseInt(flocalsplit[0]) == parseInt(fmitadsplit[0])) || ((parseInt(flocalsplit[0] + 1) == parseInt(fmitadsplit[0]))))) {
        return '1';
    } else {
        return '0';
    }
}

function validFecha(fmayor, fmenor, fmitad) {
    let fmayorsplit, fmayorfin, fmenorsplit, fmenorfin, fmitadsplit, fmitadfin, flocal, flocalsplit, flocalfin;
    flocal = new Date()
    let dd = flocal.getDate();
    let mm = flocal.getMonth() + 1;
    let yyyy = flocal.getFullYear();
    if (dd < 10) {
        dd = '0' + dd;
    }
    if (mm < 10) {
        mm = '0' + mm;
    }
    flocal = yyyy + '-' + mm + '-' + dd;
    flocalsplit = flocal.split("-");
    fmayorsplit = fmayor.split("-");
    fmayorfin = new Date(parseInt(fmayorsplit[0]), parseInt(fmayorsplit[1] - 1), parseInt(fmayorsplit[2].substr(0, 2)));
    fmenorsplit = fmenor.split("-");
    fmenorfin = new Date(parseInt(fmenorsplit[0]), parseInt(fmenorsplit[1] - 1), parseInt(fmenorsplit[2].substr(0, 2)));
    fmitadsplit = fmitad.split("-");
    fmitadfin = new Date(parseInt(fmitadsplit[0]), parseInt(fmitadsplit[1] - 1), parseInt(fmitadsplit[2].substr(0, 2)));
    if ((fmayorfin >= fmenorfin) && (fmayorfin >= fmitadfin) && (fmitadfin >= fmenorfin) && ((parseInt(flocalsplit[0]) == parseInt(fmitadsplit[0])) || ((parseInt(flocalsplit[0] + 1) == parseInt(fmitadsplit[0]))))) {
        return '1';
    } else {
        return '0';
    }

}

function validHoras(hmayor, hmenor) {
    let hmayorsplit, hmenorsplit, hmayorfin, hmenorfin;
    hmayorsplit = hmayor.split("-");
    hmayorfin = hmayorsplit[2].substr(3);
    hmenorsplit = hmenor.split("-");
    hmenorfin = hmenorsplit[2].substr(3);
    if (hmayorfin > hmenorfin) {
        return '1';
    } else {
        return '0';
    }
}

function addHora(hbase) {
    let hsplit = hbase.split(":");
    hh = (parseInt(hsplit[0]) + 1);
    if (hh < 10) {
        hfin = "0" + hh + ":" + hsplit[1];
    } else {
        hfin = hh + ":" + hsplit[1];
    }
    return hfin;
}

function addHora(hbase) {
    let hsplit = hbase.split(":");
    hh = (parseInt(hsplit[0]) + 1);
    if (hh < 10) {
        hfin = "0" + hh + ":" + hsplit[1];
    } else {
        hfin = hh + ":" + hsplit[1];
    }
    return hfin;
}

function addDia(fbase, dia) {
    let ffin = new Date(parseInt(fbase[0]), parseInt(fbase[1] - 1), parseInt(fbase[2].substr(0, 2)));
    ffin.setDate(ffin.getDate() + dia);
    let dd = ffin.getDate();
    let mm = ffin.getMonth() + 1;
    let yyyy = ffin.getFullYear();
    if (dd < 10) {
        dd = '0' + dd;
    }
    if (mm < 10) {
        mm = '0' + mm;
    }
    ffin = yyyy + '-' + mm + '-' + dd;
    return ffin;
}

function cambioDia(hbase) {
    if (hbase >= "23:00") {
        return '1';
    } else {
        return '0';
    }
}

jQuery('#finicio').change(function() {
    let femision, finicio;
    femision = document.getElementById("femision").value;
    finicio = document.getElementById("finicio").value;
    if (validFecha(finicio, femision, femision) != '1') {
        Swal.fire({
            icon: 'error',
            title: 'Fecha de Inicio de Traslado no válida!',
            text: 'Ingresar una fecha válida...'
        })
        document.getElementById("finicio").value = "";
        document.getElementById("fpartida").value = "";
        document.getElementById("farribo").value = "";
        document.getElementById("FITransporte").value = "";
        document.getElementById("FFinTransporte").value = "";
    }

});

jQuery('#fpartida').change(function() {
    let finicio, fpartida, fpartidasplit;
    farribo = document.getElementById("farribo").value;
    finicio = document.getElementById("finicio").value;
    fpartida = document.getElementById("fpartida").value;
    if (validFecha(fpartida, finicio, fpartida) != '1') {
        Swal.fire({
            icon: 'error',
            title: 'Fecha de Partida no válida!',
            text: 'Ingresar una fecha válida...'
        })
        document.getElementById("fpartida").value = finicio + "T00:00"
        document.getElementById("farribo").value = "";
        document.getElementById("FITransporte").value = "";
        document.getElementById("FFinTransporte").value = "";
        return;
    }
    fpartidasplit = fpartida.split("-");
    if (cambioDia(fpartidasplit[2].substr(3)) == "1") {
        document.getElementById("FITransporte").value = "";
        document.getElementById("FFinTransporte").value = "";
    } else {
        document.getElementById("farribo").value = parseInt(fpartidasplit[0]) + "-" + parseInt(fpartidasplit[1]) + "-" + parseInt(fpartidasplit[2].substr(0, 2)) + "T" + addHora(fpartidasplit[2].substr(3));
        document.getElementById("FITransporte").value = "";
        document.getElementById("FFinTransporte").value = "";
    }
});

jQuery('#farribo').change(function() {
    let fpartida = document.getElementById("fpartida").value;
    let farribo = document.getElementById("farribo").value;
    let FITransporte = document.getElementById("FITransporte").value;
    let FFinTransporte = document.getElementById("FFinTransporte").value;

    let fpartidasplit = fpartida.split("-");
    let farriboSplit = farribo.split("-");
    let fpartidafin = (fpartidasplit[0]) + "-" + (fpartidasplit[1]) + "-" + (fpartidasplit[2].substr(0, 2));
    let farribofin = (farriboSplit[0]) + "-" + (farriboSplit[1]) + "-" + (farriboSplit[2].substr(0, 2));

    if (validFecha(farribo, fpartida, farribo) != '1') {
        Swal.fire({
            icon: 'error',
            title: 'Fecha de Arribo no válida!',
            text: 'Ingresar una fecha válida...'
        });

        if (cambioDia(fpartidasplit[2].substr(3)) == "1") {
            let nfarribo = addDia(fpartidasplit, 1);
            document.getElementById("farribo").value = nfarribo + "T00:00";
        } else {
            document.getElementById("farribo").value = (fpartidasplit[0]) + "-" + (fpartidasplit[1]) + "-" + (fpartidasplit[2].substr(0, 2)) + "T" + addHora(fpartidasplit[2].substr(3));
        }

        document.getElementById("FITransporte").value = "";
        document.getElementById("FFinTransporte").value = "";
        return;
    }

    if (fpartidafin == farribofin && validHoras(farribo, fpartida) != '1') {
        Swal.fire({
            icon: 'error',
            title: 'Hora de Arribo no válida!',
            text: 'Inconveniente con la hora de partida...'
        });

        if (cambioDia(fpartidasplit[2].substr(3)) == "1") {
            let nfarribo = addDia(fpartidasplit, 1);
            document.getElementById("farribo").value = nfarribo + "T00:00";
            document.getElementById("FFinTransporte").value = "";
        } else {
            document.getElementById("farribo").value = (fpartidasplit[0]) + "-" + (fpartidasplit[1]) + "-" + (fpartidasplit[2].substr(0, 2)) + "T" + addHora(fpartidasplit[2].substr(3));
            document.getElementById("FFinTransporte").value = "";
        }

        return;
    }

    if (cambioDia(farriboSplit[2].substr(3)) == "1") {
        let nFITransporte = addDia(farriboSplit, 1);
        document.getElementById("FITransporte").value = nFITransporte + "T00:00";
        document.getElementById("FFinTransporte").value = "";
    } else {
        document.getElementById("FITransporte").value = (farriboSplit[0]) + "-" + (farriboSplit[1]) + "-" + (farriboSplit[2].substr(0, 2)) + "T" + addHora(farriboSplit[2].substr(3));
        document.getElementById("FFinTransporte").value = "";
    }
});

jQuery('#FITransporte').change(function() {

    let farribo = document.getElementById("farribo").value;
    let FITransporte = document.getElementById("FITransporte").value;

    let farriboSplit = farribo.split("-");
    let FITransporteSplit = FITransporte.split("-");

    let farribofin = (farriboSplit[0]) + "-" + (farriboSplit[1]) + "-" + (farriboSplit[2].substr(0, 2));
    let FITransportefin = (FITransporteSplit[0]) + "-" + (FITransporteSplit[1]) + "-" + (FITransporteSplit[2].substr(0, 2));

    if (validFecha(FITransporte, farribo, FITransporte) != '1') {
        Swal.fire({
            icon: 'error',
            title: 'Fecha de Inicio de transporte no válida!',
            text: 'Ingresar una fecha válida...'
        })
        if (cambioDia(farriboSplit[2].substr(3)) == "1") {
            let nFITransporte = addDia(farriboSplit, 1);
            document.getElementById("FITransporte").value = nFITransporte + "T00:00";
        } else {
            document.getElementById("FITransporte").value = (farriboSplit[0]) + "-" + (farriboSplit[1]) + "-" + (farriboSplit[2].substr(0, 2)) + "T" + addHora(farriboSplit[2].substr(3));
        }
        document.getElementById("FFinTransporte").value = "";
        return;
    }

    if (farribofin == FITransportefin && validHoras(FITransporte, farribo) != '1') {
        Swal.fire({
            icon: 'error',
            title: 'Hora de inicio de transporte no válida!',
            text: 'Inconveniente con la hora de arribo...'
        })
        if (cambioDia(farriboSplit[2].substr(3)) == "1") {
            let nFITransporte = addDia(farriboSplit, 1);
            document.getElementById("FITransporte").value = nFITransporte + "T00:00";
        } else {
            document.getElementById("FITransporte").value = (farriboSplit[0]) + "-" + (farriboSplit[1]) + "-" + (farriboSplit[2].substr(0, 2)) + "T" + addHora(farriboSplit[2].substr(3));
        }
        document.getElementById("FFinTransporte").value = "";
        return;

    }

    if (cambioDia(FITransporteSplit[2].substr(3)) == "1") {
        let nFFinTransporte = addDia(FITransporteSplit, 1);
        document.getElementById("FFinTransporte").value = nFFinTransporte + "T00:00";
    } else {
        document.getElementById("FFinTransporte").value = (FITransporteSplit[0]) + "-" + (FITransporteSplit[1]) + "-" + (FITransporteSplit[2].substr(0, 2)) + "T" + addHora(FITransporteSplit[2].substr(3));
    }
});

jQuery('#FFinTransporte').change(function() {
    let FITransporte, FFinTransporte, FFinTransporteSplit, FFinTransportefin, FITransporteSplit, FITransportefin;
    FITransporte = document.getElementById("FITransporte").value;
    FITransporteSplit = FITransporte.split("-");
    FFinTransporte = document.getElementById("FFinTransporte").value;
    if (validFecha(FFinTransporte, FITransporte, FFinTransporte) != '1') {
        Swal.fire({
            icon: 'error',
            title: 'Fecha de fin de transporte no válida!',
            text: 'Ingresar una fecha válida...'
        })
        if (cambioDia(FITransporteSplit[2].substr(3)) == "1") {
            let nFFinTransporte = addDia(FITransporteSplit, 1);
            document.getElementById("FFinTransporte").value = nFFinTransporte + "T00:00";
        } else {
            document.getElementById("FFinTransporte").value = (FITransporteSplit[0]) + "-" + (FITransporteSplit[1]) + "-" + (FITransporteSplit[2].substr(0, 2)) + "T" + addHora(FITransporteSplit[2].substr(3));
        }
    }
    FFinTransporteSplit = FFinTransporte.split("-");
    FITransporteSplit = FITransporte.split("-");
    FFinTransportefin = (FFinTransporteSplit[0]) + "-" + (FFinTransporteSplit[1]) + "-" + (FFinTransporteSplit[2].substr(0, 2));
    FITransportefin = (FITransporteSplit[0]) + "-" + (FITransporteSplit[1]) + "-" + (FITransporteSplit[2].substr(0, 2));
    if (FFinTransportefin == FITransportefin) {
        if (validHoras(FFinTransporte, FITransporte) != '1') {
            Swal.fire({
                icon: 'error',
                title: 'Hora de fin de transporte no válida!',
                text: 'Inconveniente con la hora de inicio de transporte...'
            })
            FFinTransporte = document.getElementById("FITransporte").value;
            document.getElementById("FFinTransporte").value = FFinTransporte;
        }
    }
});