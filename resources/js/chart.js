import Chart from 'chart.js/auto';


const ctx = document.getElementById('myChart');

const labels = data.map(item =>item.date);
    const total_price = data.map(item => item.total_price);

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Income',
                data: total_price,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });