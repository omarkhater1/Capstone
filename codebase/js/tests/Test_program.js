const { Chart } = require('chart.js');

describe('Chart', () => {
  document.body.innerHTML = `
    <canvas id="chart"></canvas>
    <input id="weight" value="70" />
    <input id="target_weight" value="65" />
  `;

  test('should create a line chart with given data', () => {
    require('./program.js');
    const chart = Chart.instances[0];
    expect(chart.data.labels).toEqual(['Today', 'Target Date']);
    expect(chart.data.datasets[0].data).toEqual([70, 65]);
  });
});
