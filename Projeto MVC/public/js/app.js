$('document').ready(function() {
    $('document').ready(function(){
        $.ajax({
            type: "POST",
            url: "/dados",
            dataType: "json",
            success: function(data){

                var fixo = [];
                var variado = [];
                var date = []
                
                for(var i = 0; i < data.length; i++){
                    if(data[i].tipo == 'Fixo'){
                        fixo.push(data[i].valor)    
                    }else {
                        variado.push(data[i].valor)    
                    };                    
                    date.push(data[i].data[0] + data[i].data[1])
                    
                }

                grafico(fixo, variado)
                
            }
            
        })
    })
})

function grafico(fixo, variado){
    const labels = [
        'January',
        'February',
        'March'
    ];

    const data = {
        labels: labels,
        datasets: [{
            label: 'Fixo',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: fixo,        
        },
        {
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
        document.getElementById('myChart'),
        config
    );
}