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
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

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

                @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{{ $message }}</strong>
                </div>
                @endif

                {{-- menampilkan error validasi --}}
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <br/>

                <!-- form Aplikasi -->
                <form  action="/post" method="POST" id="formsubmit">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="idPengirim">Pengirim Surat</label>
                        <select class="custom-select" id="idPengirim" name="pengirim">
                            <option selected disabled value="">Pilih Pengirim</option>
                            @foreach($bagian as $bagian)
                            <option value={{$bagian->id}}>{{$bagian->nama_bagian}}</option>    
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="idTujuanSurat">Tujuan Surat</label>
                        <input type="text" class="form-control" id="idTujuanSurat" placeholder="Tujuan Surat" name="tujuanSurat" value="{{ old('tujuansurat') }}">
                    </div>
                    <div class="form-group">
                        <label for="idInstansiSurat">Tujuan Instansi Surat</label>
                        <input type="text" class="form-control" id="idInstansiSurat" placeholder="Instansi Tujuan Surat" name="tujuanInstansi" value="{{ old('tujuaninstansi') }}">
                    </div>
                    <div class="form-group">
                        <label for="tanggalSurat">Tanggal Surat</label>
                        <div class="input-group date">
                            <input placeholder="Tanggal Surat" type="text" id="tanggalSurat" class="form-control datepicker" name="tanggalSurat" value="{{ old('tanggalsurat') }}">
                    </div>
                    <div class="form-group">
                        <label for="kodeSurat">Kode Surat</label>
                        <input type="text" class="form-control" id="kodeSurat" placeholder="Kode Surat" value="W15.PAS.PAS25-" name="kodeSurat" value="{{ old('kodesurat') }}">
                    </div>
                    <div class="form-group">
                        <label for="perihalSurat">Perihal Surat</label>
                        <input placeholder="Perihal Surat" type="text" id="perihalSurat" class="form-control " name="perihalSurat" value="{{ old('perihalSurat') }}">
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <button type="submit" class="btn btn-primary btn-lg" id="buttonSubmit" onclick="this.disabled=true;this.value='Proses...';this.form.submit()">Nomor Surat</button>
                        </div>
                    </div>
                </form>
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

        // autocomple tujuan surat
        var path_tujuan = "{{ url('autocomplete_tujuan') }}";
        $('#idTujuanSurat').typeahead({
            source:  function (query, process) {
            return $.get(path_tujuan, { query: query }, function (data) {
                    return process(data);
                });
            }
        });

        // autocomplete tujuan instansi
        var path_instansi = "{{ url('autocomplete_instansi') }}";
        $('#idInstansiSurat').typeahead({
            source:  function (query, process) {
            return $.get(path_instansi, { query: query }, function (data) {
                    return process(data);
                });
            }
        });

        
    </script>

    

  </body>
</html>