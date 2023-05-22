<template>
  <div>
    <canvas ref="chart"></canvas>
  </div>
</template>

<script>
import Chart from 'chart.js/auto';

export default {
  props: ['data'],
  mounted() {
    this.renderChart();
  },
  methods: {
    renderChart() {
      const ctx = this.$refs.chart.getContext('2d');
      const chartData = {
        labels: this.data.map(item => item.title),
        datasets: [
          {
            label: 'Quantity',
            data: this.data.map(item => item.qty),
            backgroundColor: '#36A2EB',
            borderWidth: 1
          }
        ]
      };
      const chartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
          yAxes: [
            {
              ticks: {
                beginAtZero: true
              }
            }
          ]
        }
      };
      new Chart(ctx, {
        type: 'bar',
        data: chartData,
        options: chartOptions
      });
    }
  }
};
</script>
