<!DOCTYPE html>
<html lang="en">
<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- Style CSS -->
    <link rel="stylesheet" type ="text/css" href="{{ asset('/css/style.css') }}">

    <!-- Datepicker CSS -->
    <link rel="stylesheet" href="{{ asset('/plugin/datepicker/dist/css/bootstrap-datepicker.min.css') }}">

    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <!-- Chart.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" crossorigin="anonymous"></script>

    <!-- Datepicker JS -->
    <script src="{{ asset('/plugin/datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>

</head>
<body>
    <div class="container shadow mt-3 pt-3 pb-3 bg-light rounded">
        <div class="row media">
            <div class="col-6 col-md-1 text-right">
                <img class="align-self-center mr-3 logo_pengayoman" src="{{ asset('/img/pengayoman_logo.png') }}" alt="logo pengayoman">
            </div>
            <div class="col-6 col-md-1 text-left">
                <img class="align-self-center mr-3 logo_pas" src="{{ asset('/img/pas.png') }}" alt="logo pengayoman">
            </div>
            <div class="col-12 col-md-10 text-center">
                <div class="media-body">
                    <h4 class="mt-0">Aplikasi Nomor Surat Keluar</h4>
                    <h6 class="mt-0">Rumah Tahanan Negara Kelas I Surabaya</h6>
                </div>
            </div>
            <hr/>
        </div>
        <div class="row justify-content-lg-center mt-5">
            <div class="col-lg-10 col-sm-12">
                <ul class="nav nav-pills nav-fill mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="pills-overview-tab" data-toggle="pill" href="#pills-overview" role="tab" aria-controls="pills-overview" aria-selected="true">Overview</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="pills-cetak-tab" data-toggle="pill" href="#pills-cetak" role="tab" aria-controls="pills-cetak" aria-selected="false">Cetak Rekapitulasi Surat</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-overview" role="tabpanel" aria-labelledby="pills-overview-tab">
                        <h5 class="text-center">Rekapitulasi Surat Berdasarkan  Rentang Bulan</h5>
                        <div class="row justify-content-center">
                            <div class="col-lg-8 col-md-10 col-md-10">
                            <form>
                                <div class="form-group">
                                    <div class="input-group input-daterange">
                                        <input type="text" class="form-control datepicker">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">sampai</span>
                                        </div>
                                        <input type="text" class="form-control datepicker">
                                        <button type="button" class="btn btn-primary btn-sm">
                                            <i class="fa fa-search" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-sm-12 col-lg-6">
                                <canvas class="canvas" height="250" id="chart1"></canvas>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <canvas class="canvas" height="250" id="chart2"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-cetak" role="tabpanel" aria-labelledby="pills-cetak-tab">2</div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        // javascript tab
        $('#myTab a').on('click', function (e) {
            e.preventDefault()
            $(this).tab('show')
        })

        // Datepciker JavaScript
        $(function(){
            $(".datepicker").datepicker({
                format: 'MM yyyy',
                autoclose: true,
                todayHighlight: true,
                startView: "months",
                minViewMode: "months"
            });

            $('.input-daterange input').each(function() {
                $(this).datepicker('clearDates');
            });
        });

        // chart 1
        new Chart(document.getElementById("chart1"), {
            type: 'doughnut',
            responsive: 'true',
            data: {
                labels: ["Subsi Umum dan Kepegawaian", "Subsi Keuangan dan Perlengkapan", "Pengamanan Rutan", "Subsi Registrasi dan Perawatan", "Subsi Bimbingan Kerja", "Subsi Bantuan Hukum dan Penyuluhan", "Tata Usaha"],
                datasets: [
                    {
                        label: "surat",
                        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850", "#b8de6f", "#646464"],
                        data: [2478,5267,734,784,433,233,456]
                    }
                ]
            },
            options: {
                title: {
                    display: true,
                    text: "Grafik Berdasarkan Pengirim Surat",
                    fontSize: 25
                },
                legend: {
                    display: false,
                    position: "bottom",
                    align: "start"
                }
            }
        });

        // chart 2
        var suratCanvas = document.getElementById("chart2");

        Chart.defaults.global.defaultFontFamily = "Lato";
        Chart.defaults.global.defaultFontSize = 18;

        var suratData = {
            labels: ["januari 2020", "februari 2020", "maret 2020", "april 2020", "mei 2020", "juni 2020", "juli 2020"],
            datasets: [{
                label: "jumlah surat",
                data: [0, 59, 75, 20, 200, 55, 40]
            }]
        };

        var chartOptions = {
            legend: {
                display: false,
                position: 'top',
                labels: {
                    fontColor: 'black'
                }
            },
            title: {
                display: true,
                text: "Grafik Berdasarkan Bulan Pengiriman",
                fontSize: 25
            },
            scales: {
                yAxes: [{
                    ticks: {
                        fontSize: 14
                    }
                }],
                xAxes: [{
                    ticks: {
                        fontSize: 14
                    }
                }],
            }
        };

        var lineChart = new Chart(suratCanvas, {
        type: 'line',
        data: suratData,
        options: chartOptions
        });
    
    </script>
</body>
</html>