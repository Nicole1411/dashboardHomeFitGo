// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var url = $('#rutaPorcentaje').data('url');
$.ajax({
    url: url,
    type: 'GET',
    dataType: 'json',
    success: function(data) {
        var porcentajeDesechos = [];
        var label = [];
        data.forEach((porcentaje) => {
            porcentajeDesechos.push(parseFloat(porcentaje.porcentaje).toFixed(2));
            label.push(porcentaje.clasificacion);
        })
        var ctx = document.getElementById("myPieChart");
        var myPieChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: label,
                datasets: [{
                    data: porcentajeDesechos,
                    backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#e74a3b', '#f39c12'],
                    hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf', '#c2362b', '#d77e0d'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    labels: label,
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: true,
                    position: 'bottom',
                    labels: {
                        usePointStyle: true,
                        fontSize: 16,
                        padding: 30
                    },
                },
                cutoutPercentage: 80,
            },
        });

    }
})