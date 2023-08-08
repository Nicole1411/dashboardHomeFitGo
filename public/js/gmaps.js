let map;
let markers = [];
let url = document.currentScript.getAttribute('data-url');
let currentInfoWindow = null;
let originalCenter;
var bounds = new google.maps.LatLngBounds();

// Define initMap en el ámbito global
function initMap() {
  let mapOptions = {
      zoom: 7,
      center: { lat: -1.8312, lng: -78.1834 }, // Coordenadas del ecuador
  };
  map = new google.maps.Map(document.getElementById('map'), mapOptions);
  originalCenter = map.getCenter();
}

function agregarMarcadoresMaps(){
  clearMarkers();
  let fInicio = document.getElementById('fecha-inicio').value;
  let fFinal = document.getElementById('fecha-fin').value;
  let generador = null;
  if(document.getElementById('generador')){
    generador = document.getElementById('generador').value;
  }
  let parametros = {
          "fInicio": fInicio,
          "fFinal": fFinal,
          "generador": generador,
      };
      $.ajax({
              type: "GET",
              url: url,
              data: parametros,
              success: function(response) {
                if(response.length!=0){
                    response.forEach(function(element) {
                        buscarMap(element, fInicio, fFinal); // No se pasa bounds como argumento
                        let coordenadas = { lat: parseFloat(element.LGLATITUD), lng: parseFloat(element.LGLONGITUD) };
                        bounds.extend(coordenadas);
                    })
                    if (markers.length > 0) {
                      map.fitBounds(bounds); // Ajustar el zoom y la posición del mapa
                    }
                }else{
                    Swal.fire({
                        icon: 'info',
                        title: 'Sin guias!',
                        text: 'No existen guias en ese rango de fechas',
                        confirmButtonText: 'Aceptar',
                    })
                }
              }
      });

}// Variable para almacenar el InfoWindow actualmente abierto

function buscarMap({ LGNOMBRE, LGLATITUD, LGLONGITUD, guia_count, total_kg, total_bbl, total_gal, total_unidad, total_mc }, fInicio, fFinal) {
  total_kg = parseFloat(total_kg);
  total_bbl = parseFloat(total_bbl);
  total_gal = parseFloat(total_gal);
  total_unidad = parseInt(total_unidad);
  total_mc = parseFloat(total_mc);
  let coordenadas = { lat: parseFloat(LGLATITUD), lng: parseFloat(LGLONGITUD) };
  var marker = new google.maps.Marker({
    position: coordenadas,
    map: map
  });

  marker.addListener('click', function () {
    // Cierra el InfoWindow anterior antes de abrir el nuevo
    if (currentInfoWindow) {
      currentInfoWindow.close();
    }

    var informacion = "<div style='max-width: 300px; padding: 10px; background-color: #f2f2f2; border-radius: 5px;'><strong style='font-size: 18px; text-align: center;'>" + LGNOMBRE + "</strong><br><span style='font-size: 14px;'>Número de guías: " + guia_count + "</span><br><br><strong>Total recolectado:</strong><br><ul style='list-style-type: disc; padding-left: 20px; margin-top: 10px; margin-bottom: 0;'>";

    if (total_kg !== 0) {
        informacion += "<li>Total KG: " + total_kg.toFixed(2) + " kg</li>";
    }

    if (total_bbl !== 0) {
        informacion += "<li>Total BBL: " + total_bbl.toFixed(2) + " bbl</li>";
    }

    if (total_gal !== 0) {
        informacion += "<li>Total GAL: " + total_gal.toFixed(2) + " gal</li>";
    }

    if (total_unidad !== 0) {
        informacion += "<li>Total Unidad: " + total_unidad.toFixed(2) + "</li>";
    }

    if (total_mc !== 0) {
        informacion += "<li>Total MC: " + total_mc.toFixed(2) + " mc</li>";
    }

    informacion += "</ul></div>";

    var infowindow = new google.maps.InfoWindow({
        content: informacion
    });


    infowindow.open(map, marker);
    currentInfoWindow = infowindow; // Actualiza el InfoWindow actualmente abierto

    // Hacer zoom en las coordenadas del marcador y centrar el mapa en esas coordenadas con transición suave
    map.panTo(marker.getPosition());
    map.setZoom(15);
    map.setOptions({ animation: google.maps.Animation.SMOOTH_ZOOM_IN, duration: 500 });
    let url = $('#rutaTableGuias').data('url');
    let parametros = {
        "locacion": LGNOMBRE,
        'fInicio': fInicio,
        'fFinal': fFinal
    }
    $.ajax({
        type: "GET",
        url: url,
        data: parametros,
        success: function(data) {
          var dataTable = document.getElementById('dataTable');
          var tbody = dataTable.getElementsByTagName('tbody')[0];
          tbody.innerHTML = ''; // Limpiar el contenido anterior de la tabla
          var parsedData = JSON.parse(data);
          if (parsedData.length !== 0) {
            parsedData.forEach(function (item) {
              console.log(item);
              agregarFilaTabla(item);
            });
          } else {
            Swal.fire({
              icon: 'info',
              title: 'Sin guias!',
              text: 'No existen guias en ese rango de fechas',
              confirmButtonText: 'Aceptar',
            });
          }
        }
    });

    // Restaurar la posición original del mapa cuando se cierra el InfoWindow
    infowindow.addListener('closeclick', function () {
      map.fitBounds(bounds);
      map.setOptions({ animation: google.maps.Animation.DROP });
    });
  });

  markers.push(marker);
}



function clearMarkers() {
    for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(null);
    }
    markers = [];
}

function agregarFilaTabla(data) {
  var tbody = document.getElementById('dataTable').getElementsByTagName('tbody')[0];
  var row = tbody.insertRow();

  var guiaCell = row.insertCell();
  var guiaLink = document.createElement('a');
  guiaLink.textContent = data.GCODIGOREMISION;
  let url = $('#generateGuia').data('url');
  guiaLink.href = url+`?item=${data.GCODIGOREMISION}`;
  guiaLink.target="_blank";
  guiaCell.appendChild(guiaLink);

  var locacionCell = row.insertCell();
  locacionCell.textContent = data.GGENERADOR;

  var totalDesechosCell = row.insertCell();
  if (data.GTOTALBBL != 0) {
    totalDesechosCell.textContent = data.GTOTALBBL + ' BBL';
  } else if (data.GTOTALGAL != 0) {
    totalDesechosCell.textContent = data.GTOTALGAL + ' GAL';
  } else if (data.GTOTALKG != 0) {
    totalDesechosCell.textContent = data.GTOTALKG + ' KG';
  } else if (data.GTOTALMC != 0) {
    totalDesechosCell.textContent = data.GTOTALMC + ' MC';
  } else if (data.GTOTALUNIDAD != 0) {
    totalDesechosCell.textContent = data.GTOTALUNIDAD + ' UNIDAD';
  }

  var finicioTCell = row.insertCell();
  finicioTCell.textContent = data.CGUIAITRASLADO;

  var ffinalTCell = row.insertCell();
  ffinalTCell.textContent = data.CGUIAFTRASLADO;

  var vehiculoCell = row.insertCell();
  vehiculoCell.textContent = data.GVTIPO+'/ '+data.GVPLACA;

  var conductorCell = row.insertCell();
  conductorCell.textContent = data.GTNOMCONDUCTOR;

  var verificadorCell = row.insertCell();
  verificadorCell.textContent = data.GACGNOMV;

  var recibeCell = row.insertCell();
  recibeCell.textContent = data.GACGNOMR;

  var gestorCell = row.insertCell();
  gestorCell.textContent = data.ESTRAZONSOCIAL;

  var tipoCell = row.insertCell();
  tipoCell.textContent = data.peligro;
}

function exportarTabla() {
  let tabla = document.getElementById("dataTable");
  let tableExport = new TableExport(tabla, {
      exportButtons: false, // No queremos botones
      filename: "Guias_exportadas", // Nombre del archivo de Excel
      sheetname: "guias", // Título de la hoja
  });

  let datos = tableExport.getExportData();
  let preferenciasDocumento = datos.dataTable.xlsx;

  tableExport.export2file(
      preferenciasDocumento.data,
      preferenciasDocumento.mimeType,
      preferenciasDocumento.filename,
      preferenciasDocumento.fileExtension,
      preferenciasDocumento.merges,
      preferenciasDocumento.RTL,
      preferenciasDocumento.sheetname
  );
}

initMap();


