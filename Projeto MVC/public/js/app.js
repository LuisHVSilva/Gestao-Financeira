$('document').ready(function () {
    
    $('document').ready(function () {
        $.ajax({
            type: "POST",
            url: "/dados_separado",
            dataType: "json",
            success: function (data) {

                var fixo = [];
                var variado = [];
                var data_fixo = [];
                var data_variado = [];
                
                for (var i = 0; i < data.length; i++) {
                    if (data[i].tipo == 'Fixo') {                        
                        fixo.push(data[i].valor);
                        data_fixo.push(parseInt(data[i].data.substr(0, 2)));
                    } else {
                        variado.push(data[i].valor);
                        data_variado.push(parseInt(data[i].data.substr(0, 2)));
                    };                
                };                                

                grafico(fixo, data_fixo, 'Fixo', 1);
                grafico(variado, data_variado, 'Variado', 2);
                

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
                grafico(valor,date, 'Geral', 3)
            }            

        })
    })
})

function grafico(valor, date, titulo, numero) {
    const labels = date;

    const data = {
        labels: labels,
        datasets: [{
            label: titulo,
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: valor,
        }]
    };

    const config = {
        type: 'line',
        data: data,
        options: {}
    };

    const myChart = new Chart(
        document.getElementById('myChart'+numero),
        config
    );
}