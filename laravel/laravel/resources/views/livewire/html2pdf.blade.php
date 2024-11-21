<div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        #content {
            padding: 20px;
        }
        #grafik {
            width: 100%;
            height: 400px;
            margin: 0 auto;
        }
    </style>


    <h2>Contoh Grafik</h2>
    <div id="content">
        <div id="grafik"></div>
    </div>

    <button class="btn btn-primary mt-2" id="download">Unduh Grafik PDF</button>

    <div id="content2">
        <div class="card">
        <div style="margin:20px;">
                <b>A. Membuat Fitur Standar untuk Manajemen User, Menu, dan Role (Poin 30)</b>
            <br><br>
            <ul>
                <li><strong>Fitur Manajemen User</strong>
                    <ul>
                        <li>Proses Registrasi User</li>
                        <li>Pengelolaan Data Master User (CRUD)</li>
                        <li>Pengelolaan Data Master Role atau jenis user (CRUD)</li>
                        <li>Login</li>
                        <li>Logout</li>
                    </ul>
                </li>
            </ul>

            <ul>
                <li><strong>Fitur Manajemen Menu</strong>
                    <ul>
                        <li>Pengelolaan Master Menu (CRUD)</li>
                    </ul>
                </li>
            </ul>

            <ul>
                <li><strong>Fitur Manajemen Role</strong>
                    <ul>
                        <li>Setting menu masing-masing Role atau jenis user</li>
                        <li> Penyesuaian tampilan masing-masing user setelah Login</li>
                    </ul>
                </li>
            </ul>

            <b>B. Mengerjakan Topik Fitur Pilihan (Poin 40)</b>
            <br><br>
            <ul>
                <li><strong>Membuat Fitur Sederhana Pengelolaan Email</strong>
                    <ul>
                        <li>Mengirim email ke user lain</li>
                        <li> Melihat daftar email yang masuk (Inbox)</li>
                        <li>Membaca email dan membalas email.</li>
                    </ul>
                </li>
            </ul>

            <ul>
                <li><strong>Membuat Fitur Sederhana Pengelolaan Social Feed</strong>
                    <ul>
                        <li>Pengelolaan Posting Status</li>
                        <li>Pengelolaan Status Like</li>
                        <li> Pengelolaan Komentar Posting Status</li>
                    </ul>
                </li>
            </ul>

            <b>C. Membuat Dokumentasi dan Improvement Fitur Inisiatif (Poin 30)</b>
            <br>
            Pada Soal No 3 ini, Anda dapat membuat dokumentasi serta menambahkan fitur-fitur tambahan ke dalam project UTS ini seperti fitur Informasi Gempa, Informasi Cuaca, Pengelolaan Data Buku, dan lain sebagainya sesuai dengan kreativitas dan inspirasi yang Anda miliki.
        </div>
</div>
    </div>
    
    <button class="btn btn-primary mt-3" id="download2">Unduh Modul</button>

    <script>
        document.getElementById('download').addEventListener('click', function() {
          
            const element = document.getElementById('content');

            const options = {
                margin:       0,
                filename:     'Grafik.pdf',
                image:        { type: 'jpeg', quality: 0.98 },
                html2canvas:  { scale: 2 },
                jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
            };

            html2pdf().from(element).set(options).save();
        });

        document.getElementById('download2').addEventListener('click', function() {
          
          const element = document.getElementById('content2');

          const options = {
              margin:       0,
              filename:     'Modul.pdf',
              image:        { type: 'jpeg', quality: 0.98 },
              html2canvas:  { scale: 2 },
              jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
          };

          html2pdf().from(element).set(options).save();
      });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Highcharts.chart('grafik', {
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