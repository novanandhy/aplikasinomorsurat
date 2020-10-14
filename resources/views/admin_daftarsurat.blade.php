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

    <!-- Data Table CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <!-- Data Table JS -->
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>

    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <title>Aplikasi Nomor Surat Keluar</title>
  </head>

  <body>
    <div class="container shadow mt-3 pt-3 pb-3 bg-light rounded">

        <!-- Kop Aplikasi -->
        <div class="row media pb-5">
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

        <!-- tombol cetak -->
        <div class="row text-right pb-1">
            <div class="col-md-2 offset-md-10">
                <button type="button" class="btn btn-primary btn-md"><i class="fa fa-print"></i> Cetak</button>
            </div>
        </div>

        <!-- tabel data surat -->
        <table id="example" class="table table-responsive table-striped table-bordered" style="max-width:100%">
            <thead>
                <tr>
                    <th>Nomor </th>
                    <th>Pengirim</th>
                    <th>Tujuan Surat</th>
                    <th>Instansi Tujuan</th>
                    <th>Tanggal Surat</th>
                    <th>Nomor Surat</th>
                    <th>Perihal Surat</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Subsi Bantuan Hukum dan Penyuluhan</td>
                    <td>Kepala Kanwil Kemenkumham Jatim</td>
                    <td>Kanwil Kemenkumham Jatim</td>
                    <td>20/11/2020</td>
                    <td>W15.PAS.PAS25.PK.01.05.06-1</td>
                    <td>Pembebasan Demi Hukum atas nama Nuriyanto bin Nuri</td>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal1"><i class="fa fa-trash-o"></i></button>
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-pencil"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- modal untuk hapus data -->
        <div class="modal fade" id="modal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda Yakin Ingin Menghapus Data Ini ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-check"></i></button>
                        <button type="button" class="btn btn-info"><i class="fa fa-times"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Data Table JavaScript -->
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>

    <!--Modal JavaScript -->
    <script>
      $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus');
        });
    </script>

  </body>
</html>