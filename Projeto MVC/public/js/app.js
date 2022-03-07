$('document').ready(function () {
    
    $('document').ready(function () {
        $.ajax({
            type: "POST",
            url: "/dados_separado",
            dataType: "json",
            success: function (data) {

                var fixo = [];
                var valor_fixo = 0;
                var variado = [];
                var valor_variado = 0;
                var data_fixo = [];
                var data_variado = [];
                
                for (var i = 0; i < data.length; i++) {
                    if (data[i].tipo == 'Fixo') {                        
                        fixo.push(data[i].valor);
                        data_fixo.push(parseInt(data[i].data.substr(0, 2)));
                        valor_fixo += parseInt(data[i].valor)
                    } else {
                        variado.push(data[i].valor);
                        data_variado.push(parseInt(data[i].data.substr(0, 2)));
                        valor_variado += parseInt(data[i].valor)
                    };                
                };                                

                grafico_line(fixo, data_fixo, 'Fixo', 1, '#f7cbcc');
                grafico_line(variado, data_variado, 'Variado', 2, '#f98cab');
                grafico_pie(valor_fixo, valor_variado);
                

            }

        })

        $.ajax({
            type: "POST",
            url: "/dados_geral",
            dataType: "json",
            success: function (data) {                
                valor = []
                date = []
                for (var i = 0; i < data.length; i++) {
                    valor.push(data[i].valor);
                    date.push(parseInt(data[i].data.substr(0, 2)));
                };                                
                grafico_line(valor,date, 'Gasto Total', 3, 'rgb(255, 99, 132)')
            }            

        })

        $.ajax({
            type: "POST",
            url: "/meta_salario",
            dataType: "json",
            success: function (data) {                
                meta = data[0].meta
                console.log(valor)
                date = data[0].data                                
            }            

        })
    })
})

function grafico_pie(fixo, variado){
    const valor = [fixo, variado]
    const data = {
        labels: ['Fixo', 'Variado'],
        datasets: [{
            label: 'Dataset 1',
            data: valor,
            backgroundColor: ['#f7cbcc', '#f98cab']
        }]
    }

    const config = {
        type: 'pie',
        data: data,
        options: {
            responsive: true,
            plugins: {
                legend : {
                    position: 'right',
                },
            }
        }
    }

    const myChart = new Chart(
        document.getElementById('myChart4'),
        config
    );
}
function grafico_line(valor, date, titulo, numero, cor) {
    const labels = date;

    const data = {
        labels: labels,
        datasets: [{
            label: titulo,
            backgroundColor: cor,
            borderColor: cor,
            fill: false,
            cubicInterpolationMode: 'monotone',
            data: valor,            
        }]
    };

    const config = {
        type: 'line',
        data: data,
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: false
                },
            },
            interaction: {
                intersect: false,
            },
            scales: {
                x: {
                    display: true,
                    title: {
                        display: true,
                        text: 'Data',
                    },
                },
            }
        }
    };


    const myChart = new Chart(
        document.getElementById('myChart'+numero),
        config
    );
}