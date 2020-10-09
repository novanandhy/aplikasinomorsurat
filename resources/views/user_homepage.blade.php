<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

      <!--Import materialize.css-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

       <!-- Style CSS -->
        <link rel="stylesheet" type ="text/css" href="{{ asset('/css/style.css') }}">   

        <!-- jQuery  -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
       
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body class="bg-white">
        <div class="container z-depth-3 blue-grey lighten-5">

            <!-- header halaman -->
            <div class="row">
                <div class="col s6 l1">
                    <img class="responsive-image logo-pengayoman right" src="{{ asset('/img/pengayoman_logo.png') }}" alt="logo pengayoman">
                </div>
                <div class="col s6 l1">
                    <img class="responsive-image logo-pas" src="{{ asset('/img/pas.png') }}" alt="logo pemasyarakatan">
                </div>
                <div class="col s12 l10">
                    <div class="row">
                        <h4 class="center-align">Aplikasi Nomor Surat Keluar</h4>
                        <h6 class="center-align">Rumah Tahanan Negara Kelas I Surabaya</h6>
                    </div>
                </div>
            </div>

            <!-- tombol navigasi -->
            <div class="row">
                <nav>
                    <div class="nav-wrapper bg-blue">
                        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                        <ul class="left hide-on-med-and-down">
                            <li><a href="#">Nomor Surat</a></li>
                            <li><a href="#">Daftar Surat</a></li>
                        </ul>
                    </div>
                </nav>

                <!-- side navigation -->
                <ul class="sidenav bg-blue" id="mobile-demo">
                    <li><a href="#" class="text-white">Nomor Surat</a></li>
                    <li><a href="#" class="text-white">Daftar Surat</a></li>
                </ul>
            </div>
            <form>
                <div class="row">
                    <div class="col s10 offset-s1 l4 offset-l4">

                        <!-- pilihan Pengirim -->
                        <div class="row">
                            <div class="input-field">
                                <select>
                                    <option disabled selected>Pilih Pengirim</option>
                                    <option>Subsi Umum dan Kepegawaian</option>
                                    <option>Subsi Keuangan dan Perlengkapan</option>
                                    <option>Tata Usaha</option>
                                    <option>Pengamanan Rutan</option>
                                    <option>Subsi Registrasi dan Perawatan</option>
                                    <option>Subsi Bantuan Hukum dan Penyuluhan</option>
                                    <option>Subsi Bimbingan Kerja</option>
                                </select>
                                <label>Pengirim Surat</label>
                            </div>
                        </div>

                        <!-- penujuan surat -->
                        <div class="row">
                            <div class="input-field">
                                <input id="tujuan_surat" type="text" class="tujuan_surat">
                                <label for="tujuan_surat">Tujuan Surat</label>
                            </div>
                        </div>

                        <!-- insansi tujuan surat -->
                        <div class="row">
                            <div class="input-field">
                                <input id="instansi_surat" type="text" class="instansi_surat">
                                <label for="instansi_surat">Instansi Tujuan Surat</label>
                            </div>
                        </div>

                        <!-- pengambilan tanggal surat -->
                        <div class="row">
                            <div class="input-field">
                                <input type="text" class="datepicker">
                                <label for="tanggal_surat">Tanggal Surat</label>
                            </div>
                        </div>

                        <!-- pengisian kode surat -->
                        <div class="row">
                            <div class="input-field">
                                <input value="W15.PAS.PAS25-" id="kode_surat" type="text" class="kode_surat">
                                <label for="kode_surat">Kode Surat</label>
                            </div>
                        </div>

                        <!-- isi perihal surat -->
                        <div class="row">
                            <div class="input-field">
                                <input id="perihal_surat" type="text" class="perihal_surat"></input>
                                <label for="perihal_surat">Perihal Surat</label>
                            </div>
                        </div>

                        <!-- tombol permintaan surat -->
                        <div class="row center">
                        <button data-target="modal1" class="btn modal-trigger">Nomor Surat
                                <i class="material-icons right">sync</i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Modal Structure -->
            <div id="modal1" class="modal">
                <div class="modal-content center">
                    <h5>Nomor Surat Ini adalah</h5>
                    <h1>1234</h1>
                </div>
                <div class="modal-footer">
                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
                </div>
            </div>

        <script>
            // JQuery sidenav
             $(document).ready(function(){
                $('.sidenav').sidenav();
            });

            // JQuery select
            $(document).ready(function(){
                $('select').formSelect();
            });

            // JQuery datepicker dengan format 'yyy-mm-dd'
            $(document).ready(function(){
                $('.datepicker').datepicker({
                    format: 'yyyy-mm-dd'
                });
            });

            // JQuery Modal
            $(document).ready(function(){
                $('.modal').modal();
            });

            // JQuery untuk auto fill
            $(document).ready(function() {
                M.updateTextFields();
            });

            // JQuery untuk autocomplete tujuan surat
            $(document).ready(function(){
                $('input.tujuan_surat').autocomplete({
                data: {
                    "Kepala Kantor Wilayah Kemenkumham Jatim": null,
                    "Kepala Kejaksaan Negeri Surabaya": null,
                    "Kepala Kejaksaaan Negeri Tanjung Perak": null
                },
                });
            });

            // JQuery untuk autocomplete tujuan instansi surat
            $(document).ready(function(){
                $('input.instansi_surat').autocomplete({
                data: {
                    "Kantor Wilayah Kemenkumham Jatim": null,
                    "Kejaksaan Negeri Surabaya": null,
                    "Kejaksaaan Negeri Tanjung Perak": null
                },
                });
            });

            // JQuery untuk autocomplete kode surat
            $(document).ready(function(){
                $('input.kode_surat').autocomplete({
                data: {
                    "W15.PAS.PAS25-PK.01.05.06": null,
                    "W15.PAS.PAS25-PK.01.04.01": null
                },
                });
            });

            // JQuery untuk autocomplete perihal surat
            $(document).ready(function(){
                $('input.perihal_surat').autocomplete({
                data: {
                    "Pemberitahuan Pemberian Program PB kepada Napi Subsider": null,
                    "Laporan Tunggakan Pembayaran Listrik": null
                },
                });
            });

        </script>

        <!--JavaScript at end of body for optimized loading-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    </body>
  </html>