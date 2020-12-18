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


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <title>Cetak Nomor Surat</title>
  </head>

  <body>
    <div class="container shadow mt-3 pt-3 pb-3 bg-light rounded">

        <!-- Kop Aplikasi -->
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
            <div class="col-lg-8 col-sm-12">

                <h3 class="my-4">Data Surat </h3>
                <table class="table table-bordered table-striped">
                    <tr>
                        <td>Tujuan Surat</td>
                        <td>{{ $data->tujuan_surat }}</td>
                    </tr>
                    <tr>
                        <td>Tujuan Instansi Surat</td>
                        <td>{{ $data->tujuan_instansi }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Surat</td>
                        <td>{{ $data->tanggal_surat }}</td>
                    </tr>
                    <tr>
                        <td>Perihal Surat</td>
                        <td>{{ $data->perihal_surat }}</td>
                    </tr>
                    <tr>
                        <td>Nomor Surat</td>
                        <td>{{ $data->kode_surat }}-<h2>{{ $data->id }}</h2></td>
                    </tr>
                </table>

                <a href="/" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>   
  </body>
</html>