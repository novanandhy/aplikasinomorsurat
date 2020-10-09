<!doctype html>
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

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <!-- Datepicker JS -->
    <script src="{{ asset('/plugin/datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    
    <title>Aplikasi Nomor Surat Keluar</title>
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
        <div class="row mt-3">
            <div class="col-12 text-center">
                <h4>Cetak Daftar Surat</h4>
            </div>
        </div>
        <form>
            <div class="row">
                <div class="col">
                    <label for="tanggal">Berdasarkan Tanggal</label>
                        <div class="form-group">
                        <div class="input-group date">
                            <input placeholder="Tanggal Awal" type="text" id="tanggalAwal" class="form-control datepicker">
                        </div>
                    </div>
                </div>
                <div class="col">
                        <div class="form-group">
                        <div class="input-group date">
                            <input placeholder="Tanggal Akhir" type="text" id="tanggalAkhir" class="form-control datepicker">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Datepciker JavaScript -->
    <script type="text/javascript">
        $(function(){
            $(".datepicker").datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true,
            });
        });
    </script>
  </body>
</html>