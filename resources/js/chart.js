import Chart from 'chart.js/auto';


const ctx = document.getElementById('myChart');
const year=[]
for (let index = 1; index <= 12; index++) {
    year.push(index)
    
}
    // console.log(dbYears)
    console.log(data)
    const labels = year;
// const labels = data.map(item =>item.date);
    const income = data.map(item => item.income);

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Income',
                data: income,
                borderWidth: 1,
              
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