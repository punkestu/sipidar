function createBarChart(id, data, title) {
    const options = {
        series: data.series,
        chart: {
            type: "bar",
        },
        title: {
            text: title,
            align: "left",
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: "55%",
                endingShape: "rounded",
            },
        },
        dataLabels: {
            enabled: false,
        },
        stroke: {
            show: true,
            width: 2,
            colors: ["transparent"],
        },
        xaxis: {
            categories: data.categories,
        },
        yaxis: {
            title: {
                text: "Jumlah",
            },
        },
        fill: {
            opacity: 1,
        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return val;
                },
            },
        },
    };
    var chart = new ApexCharts(document.querySelector(id), options);

    chart.render();
}
