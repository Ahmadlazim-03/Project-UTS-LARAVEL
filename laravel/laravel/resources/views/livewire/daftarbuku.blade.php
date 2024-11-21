<div class="col-12">
    <div class="card mb-4">
    <div class="card-header pb-0 p-3">
        <h6 class="mb-1">Daftar Buku</h6>
        <p class="text-sm">Selamat membaca buku </p>
    </div>
    <div class="card-body p-3">
        <div class="row">
            @foreach( $data_buku as $item)
                <div class="col-xl-3 col-md-6 mb-xl-0 mb-4 mt-5">
                    <div class="">
                        <div class="position-relative">
                            <a class="d-block shadow-xl border-radius-xl">
                            <img src="../assets/img/home-decor-1.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                            </a>
                        </div>
                        <div class="card-body px-1 pb-0">
                            <p class="text-gradient text-dark mb-2 text-sm">{{ $item->judul }}</p>
                            <p class="mb-4 text-sm">
                                {{ $item->deskripsi }}
                            </p>
                            <div class="d-flex align-items-center justify-content-between">
                                <button id="buttonPopupbuku{{ $item->id }}" type="button" class="btn btn-outline-primary btn-sm mb-0">Baca Buku</button>
                            </div>
                            <div class="popup" id="Popupbuku{{ $item->id }}">
                                <div class="popup-content">
                                    <span class="close" id="closePopupbuku{{ $item->id}}">&times;</span>
                                    <div class="container">
                                        <h1>Judul Buku: {{ $item->judul }}</h1>
                                        <div class="chapter">
                                            <br>
                                            <h3>Pengarang: {{ $item->pengarang }}</h3>
                                            <p>
                                            {{ $item->isi_buku }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
            <div class="card h-100 mt-3">
                <div class="card-body d-flex flex-column justify-content-center text-center">
                    <a href="javascript:;" id="buttonPopuptambahbuku">
                    <i class="fa fa-plus text-secondary mb-3"></i>
                        <h5 class=" text-secondary"> Tambah Buku </h5>
                    </a>
                    <div class="text-start" style="margin-bottom:20px;">
                    <div class="popup" id="popupCardtambahbuku">
                        <div class="popup-content">
                            <form wire:submit="tambahbuku">
                                <span class="close" id="closePopuptambahbuku">&times;</span>
                                <h2>Tambah Buku</h2>                           
                                <label>Judul Buku</label>
                                <div class="mb-3">
                                    <input wire:model="judul_buku" type="text" class="form-control" placeholder="Masukkan judul" aria-label="Email" aria-describedby="email-addon" required>
                                </div>  
                                <label>Pengarang</label>
                                <div class="mb-3">
                                    <input wire:model="pengarang" type="text" class="form-control" placeholder="Masukkan pengarang" aria-label="Email" aria-describedby="email-addon" required>
                                </div>  
                                <label>Deskripsi</label>
                                <div class="mb-3">
                                    <input wire:model="deskripsi" type="text" class="form-control" placeholder="Masukkan deskripsi" aria-label="Email" aria-describedby="email-addon" required>
                                </div>  
                                <label>Isi buku</label>
                                <div class="mb-3">
                                    <textarea wire:model="isi_buku" type="longtext" class="form-control" placeholder="Masukkan isi buku" aria-label="Email" aria-describedby="email-addon" required></textarea>
                                </div>    
                                <div class="text-center">
                                <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Tambah</button>
                                </div> 
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    </div>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .chapter {
            margin-bottom: 40px;
        }
        .chapter h3 {
            color: #555;
            border-bottom: 2px solid #ddd;
            padding-bottom: 5px;
        }
        p {
            text-align: justify;
            margin-bottom: 15px;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('#buttonPopuptambahbuku').click(function() {
                $('#popupCardtambahbuku').fadeIn();
            });
            $('#closePopuptambahbuku').click(function() {
                $('#popupCardtambahbuku').fadeOut();
            });
            $(window).click(function(event) {
                if (event.target.id === 'popupCardtambahbuku') {
                    $('#popupCardtambahbuku').fadeOut();
                }
            });

            $('#tambahbuku').click(function(e) {
                e.preventDefault();
                // var menuId = $(this).data('id'); 
                // var row = $('#menu-row-' + menuId);   
                // Swal.fire({
                //     title: "Apakah anda yakin ?",
                //     text: "Menu akan terhapus secara permanen !",
                //     icon: "warning",
                //     showCancelButton: true,
                //     confirmButtonColor: "#3085d6",
                //     cancelButtonColor: "#d33",
                //     confirmButtonText: "Ya, hapus!"
                // }).then((result) => {
                //     if (result.isConfirmed) {
                //         $.ajax({
                //             type: 'POST',
                //             url: '/Deletemenu', 
                //             data: { menuId: menuId },
                //             success: function() {
                //                 Swal.fire({
                //                     title: "Terhapus!",
                //                     text: "Menu berhasil dihapus.",
                //                     icon: "success"
                //                 });
                //                 row.remove(); 
                //             },
                //             error: function() {
                //                 Swal.fire({
                //                     title: "Gagal!",
                //                     text: userId,
                //                     icon: "error"
                //                 });
                //             }
                //         });
                //     }
                // });
            });
        })
    </script>
</div>
