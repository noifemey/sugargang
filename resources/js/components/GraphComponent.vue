<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Quantity Graph</div>

                    <div class="card-body">
                        <canvas ref="chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import Chart from 'chart.js/auto';

export default {
  mounted() {
    axios.get('/getchartData')
      .then(response => {
        const data = response.data;
        const titles = [];
        const quantities = [];

        data.forEach(item => {
          titles.push(item.title);
          quantities.push(item.quantity);
        });

        const chartData = {
          labels: titles,
          datasets: [{
            label: 'Quantity',
            data: quantities,
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
          }]
        };

        const options = {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              }
            }]
          }
        };

        const chart = new Chart(this.$refs.chart, {
          type: 'bar',
          data: chartData,
          options: options
        });
      })
      .catch(error => {
        console.log(error);
      });
  }
}
</script>
