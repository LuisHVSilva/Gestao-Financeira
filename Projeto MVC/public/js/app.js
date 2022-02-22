$('document').ready(function() {
    $('document').ready(function(){
        $.ajax({
            type: "POST",
            url: "/dashboard",
            dataType: "json",
            success: function(data){
                alert(data)
            }
        })
    })
})

/*
const labels = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
];

const data = {
    labels: labels,
    datasets: [{
        label: 'My First dataset',
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: [0, 10, 5, 2, 20, 35, 45],        
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
*/