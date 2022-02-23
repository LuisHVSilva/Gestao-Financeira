$('document').ready(function() {
    $('document').ready(function(){
        $.ajax({
            type: "POST",
            url: "/dados",
            dataType: "json",
            success: function(data){

                var fixo = [];
                var variado = [];
                var data_fixo = []
                var data_variado = []
                
                for(var i = 0; i < data.length; i++){
                    if(data[i].tipo == 'Fixo'){
                        fixo.push(data[i].valor)  
                        data_fixo.push(parseInt(data[i].data.substr(0, 2)))  
                    }else {
                        variado.push(data[i].valor)    
                        data_variado.push(parseInt(data[i].data.substr(0, 2)))
                    };                    
                                                                                
                }
                
                //
                grafico1(fixo, data_fixo)
                grafico2(variado, data_variado)
                
            }
            
        })
    })
})

function grafico1(fixo, data_fixo){
    const labels = data_fixo;

    const data = {
        labels: labels,
        datasets: [{
            label: 'Fixo',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: fixo,        
        }]
    };

    const config = {
        type: 'line',
        data: data,
        options: {}
    };

    const myChart = new Chart(
        document.getElementById('myChart1'),
        config
    );
}

function grafico2(variado, data_variado){
    const labels = data_variado;

    const data = {
        labels: labels,
        datasets: [{
            label: 'Variado',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: variado,        
        }]
    };

    const config = {
        type: 'line',
        data: data,
        options: {}
    };

    const myChart = new Chart(
        document.getElementById('myChart2'),
        config
    );
}