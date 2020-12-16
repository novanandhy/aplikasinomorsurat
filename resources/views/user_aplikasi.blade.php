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

                <!-- form Aplikasi -->
                <form class="needs-validation" novalidate>
                    <div class="form-group">
                        <label for="idPengirim">Pengirim Surat</label>
                        <select class="custom-select" id="idPengirim" required>
                            <option selected disabled value="">Pilih Pengirim</option>
                            @foreach($bagian as $bagian)
                            <option value="{{$bagian->id}}">{{$bagian->nama_bagian}}</option>    
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            Pengirim belum dipilih
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="idTujuanSurat">Tujuan Surat</label>
                        <input type="text" class="form-control typehead" id="idTujuanSurat" placeholder="Tujuan Surat" autocomplete="off" Required>
                        <div class="invalid-feedback">
                            Tujuan surat belum terisi
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="idInstansiSurat">Tujuan Instansi Surat</label>
                        <input type="text" class="form-control" id="idInstansiSurat" placeholder="Instansi Tujuan Surat" autocomplete="off" Required>
                        <div class="invalid-feedback">
                            Tujuan instansi surat belum terisi
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tanggalSurat">Tanggal Surat</label>
                        <div class="input-group date">
                            <input placeholder="Tanggal Surat" type="text" id="tanggalSurat" class="form-control datepicker" autocomplete="off" Required>
                            <div class="invalid-feedback">
                                Tanggal surat belum terisi
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kodeSurat">Kode Surat</label>
                        <input type="text" class="form-control" id="kodeSurat" placeholder="Kode Surat" value="W15.PAS.PAS25-" autocomplete="off" Required>
                        <div class="invalid-feedback">
                            Kode Surat belum terisi
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="perihalSurat">Perihal Surat</label>
                        <textarea class="form-control" id="perihalSurat" rows="3" placeholder="Perihal Surat" autocomplete="off" required></textarea>
                        <div class="invalid-feedback">
                            Perihal Surat belum terisi
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#staticBackdrop">Nomor Surat</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Nomor Surat Ini</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex justify-content-center">
                            <div class="spinner-border" id="spinnerLoading" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                            <h1 id="hasilNomor" > 1234</h1>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <script type="text/javascript">
        // Datepciker JavaScript
        $(function(){
            $(".datepicker").datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true,
            });
        });

        // valid-invalid statement
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        $(function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
            });
        }, false);
        })();

        
    </script>

    

  </body>
</html>