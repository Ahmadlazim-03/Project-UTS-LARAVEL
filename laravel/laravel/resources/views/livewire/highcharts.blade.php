<div>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <style>
        #container {
            width: 100%;
            height: 400px;
            margin: 0 auto;
        }
    </style>

    <h2>Highcharts</h2>
    <div id="container"></div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Highcharts.chart('container', {
                chart: {
                    type: 'line' 
                },
                title: {
                    text: 'Contoh Grafik' 
                },
                subtitle: {
                    text: 'Sumber: Perusahaan XYZ'
                },
                xAxis: {
                    categories: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'] // Kategori sumbu x
                },
                yAxis: {
                    title: {
                        text: 'Jumlah Penjualan'
                    }
                },
                series: [{
                    name: '2024', 
                    data: [120, 130, 140, 160, 200, 180, 210, 220, 230, 250, 270, 300] 
                }]
            });
        });
    </script>

</div>