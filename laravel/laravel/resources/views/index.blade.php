<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet-geosearch/dist/geosearch.css" />
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/leaflet-geosearch/dist/geosearch.umd.js"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ $title }}</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  @livewireStyles
  <style>
    @foreach( $all_menu as $item )
    .{{ $item->CLASS }} {
    display: none;
    }
    @endforeach
    .popup {
    display: none;
    position: fixed; 
    z-index: 1000; 
    left: 0;
    top: 0;
    width: 100%; 
    height: 100%; 
    overflow: auto; 
    background-color: rgba(0, 0, 0, 0.7); 
  }

  .popup-content {
      background-color: #fff;
      margin: 1% auto; 
      padding: 20px;
      border: 1px solid #888;
      width: 150%;
      max-width: 800px; 
      border-radius: 5px; 
  }

  .close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
  }

  .close:hover,
  .close:focus {
      color: black;
      text-decoration: none;
      cursor: pointer;
  }
  .comment-section {
    max-width: 1000px;
    margin-left: 0; /* Align to the left */
    padding: 20px;
    background-color: #fff;
    box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.1);
    box-sizing: border-box; /* Include padding and border in the total width */
}

.comment-header {
    display: flex;
    align-items: center; /* Align items (image and text) at the center vertically */
    margin-bottom: 20px;
}

.comment-header img {
    border-radius: 50%;
    width: 40px;
    height: 40px;
    margin-right: 10px;
}

.comment-header .username {
    font-weight: bold;
    color: #333;
    display: inline-block; /* Make sure it stays inline with other text */
}

.comment-header .time {
    font-size: 12px;
    color: #999;
    margin-left: 10px;
    display: inline-block; /* Same for the time */
}

.comment-body {
    margin-bottom: 15px;
}

.comment-body p {
    margin: 0;
    color: #555;
    word-wrap: break-word; /* Break long words if necessary */
    overflow-wrap: break-word; /* Ensures breaking of long words in newer browsers */
    max-width: 100%; /* Ensure it does not exceed card width */
    font-size: 14px; /* Adjust font size for smaller screens */
}

.comment-body img {
    margin-top: 10px;
    width: 100%; /* Adjust width to 100% */
    height: auto; /* Maintain aspect ratio */
    border-radius: 8px;
}

.comment-actions {
    display: flex;
    align-items: center;
}

.comment-actions button {
    background: none;
    border: none;
    color: #555;
    font-size: 14px;
    cursor: pointer;
    margin-right: 10px;
    display: flex;
    align-items: center;
}

.comment-actions button.active {
    color: #007BFF;
}

.comment-actions button i {
    margin-right: 5px;
}

.reply-section {
    margin-left: 0px;
    margin-top: 15px;
    width: 100%;
}

.reply-section textarea {
    width: calc(100%);
    height: 50px;
    padding: 10px;
    border-radius: 4px;
    border: 1px solid #ddd;
    margin-bottom: 10px;
    box-sizing: border-box; 
}


@media (max-width: 600px) {
    .comment-section {
        padding: 10px; 
    }

    .reply-section {
        margin-left: 0; 
    }

    .comment-body p {
        font-size: 12px;
    }
}
    .small-icon-box {
      margin-right: 10px;
      width: 40px;   
      height: 40px;  
      padding: 5px;  
      }

      .small-icon {
          font-size: 20px; 
      }
</style>
</head>

<body class="g-sidenav-show  bg-gray-100">


  @include('layout.sidebar')


  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">

    @include('layout.navbar')
   
    <!-- main -->
    <div class="container-fluid py-4">
        @include('layout.main')
    </div>

  </main>

  <!-- setting -->
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="fa fa-cog py-2"> </i>
    </a>
    <div class="card shadow-lg ">
      <div class="card-header pb-0 pt-3 ">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Soft UI Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="fa fa-close"></i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 active" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class="mt-3">
          <h6 class="mb-0">Navbar Fixed</h6>
        </div>
        <div class="form-check form-switch ps-0">
          <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
        </div>
        <hr class="horizontal dark my-sm-4">
      </div>
    </div>
  </div>
  @livewireScripts
</body>
  <script>
    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Sales",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "#fff",
          data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
          maxBarThickness: 6
        }, ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 15,
              font: {
                size: 14,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
              color: "#fff"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false
            },
            ticks: {
              display: false
            },
          },
        },
      },
    });


    var ctx2 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

    var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
    gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
            label: "Mobile apps",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#cb0c9f",
            borderWidth: 3,
            backgroundColor: gradientStroke1,
            fill: true,
            data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
            maxBarThickness: 6

          },
          {
            label: "Websites",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#3A416F",
            borderWidth: 3,
            backgroundColor: gradientStroke2,
            fill: true,
            data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
            maxBarThickness: 6
          },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#b2b9bf',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#b2b9bf',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <script>
    $(document).ready(function(){
      $('.dashboard').show();
      function toggleSections(sectionToShow) {
        @foreach( $all_menu as $item )
          $('.{{ $item->CLASS }}').hide();
        @endforeach
        $(sectionToShow).fadeIn();
      }

      @foreach( $all_menu as $item )
        $('#{{ $item->CLASS }}').click(function() {
            toggleSections('.{{ $item->CLASS }}');
        }); 
      @endforeach

      $('#openPopup').click(function() {
        $('#popupCard').fadeIn();
      });
      $('#closePopup').click(function() {
          $('#popupCard').fadeOut();
      });
      $(window).click(function(event) {
          if (event.target.id === 'popupCard') {
              $('#popupCard').fadeOut();
          }
      });

      $('#Popupuser').click(function() {
        $('#Popupcarduser').fadeIn();
      });
      $('#closePopupuser').click(function() {
          $('#Popupcarduser').fadeOut();
      });
      $(window).click(function(event) {
          if (event.target.id === 'Popupcarduser') {
              $('#Popupcarduser').fadeOut();
          }
      });

      $('#Popuprole').click(function() {
        $('#popupCardrole').fadeIn();
      });
      $('#closePopuprole').click(function() {
          $('#popupCardrole').fadeOut();
      });
      $(window).click(function(event) {
          if (event.target.id === 'popupCarduser') {
              $('#popupCardrole').fadeOut();
          }
      });

      @foreach( $all_data_user as $item) 
      $('#buttonPopupedituser{{ $item->id }}').click(function() {
        $('#Popupedituser{{ $item->id }}').fadeIn();
      });
      $('#closePopupedituser{{ $item->id }}').click(function() {
          $('#Popupedituser{{ $item->id }}').fadeOut();
      });
      $(window).click(function(event) {
          if (event.target.id === 'Popupedituser{{ $item->id }}') {
              $('#Popupedituser{{ $item->id }}').fadeOut();
          }
      });
      @endforeach

      @foreach( $all_jenis_user as $item) 
      $('#buttonPopupeditrole{{ $item->id }}').click(function() {
        $('#Popupeditrole{{ $item->id }}').fadeIn();
      });
      $('#closePopupeditrole{{ $item->id }}').click(function() {
          $('#Popupeditrole{{ $item->id }}').fadeOut();
      });
      $(window).click(function(event) {
          if (event.target.id === 'Popupeditrole{{ $item->id }}') {
              $('#Popupeditrole{{ $item->id }}').fadeOut();
          }
      });
      @endforeach

      @foreach( $all_menu as $item) 
      $('#buttonPopupeditmenu{{ $item->id }}').click(function() {
        $('#Popupeditmenu{{ $item->id }}').fadeIn();
      });
      $('#closePopupeditmenu{{ $item->id }}').click(function() {
          $('#Popupeditmenu{{ $item->id }}').fadeOut();
      });
      $(window).click(function(event) {
          if (event.target.id === 'Popupeditmenu{{ $item->id }}') {
              $('#Popupeditmenu{{ $item->id }}').fadeOut();
          }
      });
      @endforeach

      @foreach( $data_buku as $item) 
        $('#buttonPopupbuku{{ $item->id }}').click(function() {
          $('#Popupbuku{{ $item->id }}').fadeIn();
        });
        $('#closePopupbuku{{ $item->id }}').click(function() {
            $('#Popupbuku{{ $item->id }}').fadeOut();
        });
        $(window).click(function(event) {
            if (event.target.id === 'Popupbuku{{ $item->id }}') {
                $('#Popupbuku{{ $item->id }}').fadeOut();
            }
        });
      @endforeach

      @foreach($all_data_posting as $item)
        $('.komen{{ $item->id }}').hide();

        $('.show-komen{{ $item->id }}').click(function() {
            $('.komen{{ $item->id }}').fadeToggle(); 
        });
      @endforeach

    })
  </script>
  <script>
    $(document).ready(function() {
      $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    $('.hapus-user').click(function(e) {
        e.preventDefault();
        var userId = $(this).data('id'); 
        var row = $('#user-row-' + userId);   
        Swal.fire({
            title: "Apakah anda yakin ?",
            text: "Pengguna akan terhapus secara permanen !",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, hapus!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    url: '/Deleteuser', 
                    data: { userId: userId },
                    success: function() {
                        Swal.fire({
                            title: "Terhapus!",
                            text: "User berhasil dihapus.",
                            icon: "success"
                        });
                        row.remove(); 
                    },
                    error: function() {
                        Swal.fire({
                            title: "Gagal!",
                            text: userId,
                            icon: "error"
                        });
                    }
                });
            }
        });
    });

    $('.deletemenu').click(function(e) {
        e.preventDefault();
        var menuId = $(this).data('id'); 
        var row = $('#menu-row-' + menuId);   
        Swal.fire({
            title: "Apakah anda yakin ?",
            text: "Menu akan terhapus secara permanen !",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, hapus!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    url: '/Deletemenu', 
                    data: { menuId: menuId },
                    success: function() {
                        Swal.fire({
                            title: "Terhapus!",
                            text: "Menu berhasil dihapus.",
                            icon: "success"
                        });
                        row.remove(); 
                    },
                    error: function() {
                        Swal.fire({
                            title: "Gagal!",
                            text: userId,
                            icon: "error"
                        });
                    }
                });
            }
        });
    });
});
  </script>
  <script>
    $(document).ready(function(){
      $('#CardDDL, #CardDML').hide()
      $('#PopuproleDDL').click(function(){
        $('#CardDDL').show();
        $('#CardDML').hide();
      })
      $('#PopuproleDML').click(function(){
        $('#CardDML').show();
        $('#CardDDL').hide();
      })
    });
  </script>
   
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</html>