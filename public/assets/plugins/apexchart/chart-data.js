$(document).ready(function() {
    function fetchChartData(endpoint, callback) {
        $.ajax({
            url: endpoint,
            method: 'GET',
            success: function(response) {
                callback(response);
            },
            error: function(xhr, status, error) {
                console.error('Error fetching data: ', error);
            }
        });
    }

    if ($('#income-profit').length > 0) {
        fetchChartData('/api/income-profit-data', function(data) {
            var incomeProfitOptions = {
                chart: {
                    type: 'bar',
                    height: 350,
                    width: '100%',
                    stacked: false,
                    toolbar: {
                        show: false
                    },
                },
                dataLabels: {
                    enabled: false
                },
                plotOptions: {
                    bar: {
                        columnWidth: '55%',
                        endingShape: 'rounded'
                    },
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                series: [{
                    name: "Income",
                    color: '#3D5EE1',
                    data: data.income
                }, {
                    name: "Profit",
                    color: '#FF0000',
                    data: data.profit
                }, {
                    name: "Expenses",
                    color: '#00FF00',
                    data: data.expenses
                }],
                xaxis: {
                    categories: data.months,
                },
                yaxis: {
                    title: {
                        text: ''
                    }
                },
                title: {
                    text: '',
                    align: 'left',
                    style: {
                        fontSize: '18px'
                    }
                }
            };

            var chart = new ApexCharts(document.querySelector('#income-profit'), incomeProfitOptions);
            chart.render();
        });
    }

    if ($('#suits-chart').length > 0) {
        fetchChartData('/api/suits-chart-data', function(data) {
            var suitsChartOptions = {
                chart: {
                    type: 'bar',
                    height: 350,
                    width: '100%',
                    stacked: false,
                    toolbar: {
                        show: false
                    },
                },
                dataLabels: {
                    enabled: false
                },
                plotOptions: {
                    bar: {
                        columnWidth: '55%',
                        endingShape: 'rounded'
                    },
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                series: [{
                    name: "Suits",
                    color: '#3D5EE1',
                    data: data.suits
                }],
                xaxis: {
                    categories: data.months,
                },
                yaxis: {
                    title: {
                        text: ''
                    }
                },
                title: {
                    text: '',
                    align: 'left',
                    style: {
                        fontSize: '18px'
                    }
                }
            };

            var chart = new ApexCharts(document.querySelector('#suits-chart'), suitsChartOptions);
            chart.render();
        });
    }
});