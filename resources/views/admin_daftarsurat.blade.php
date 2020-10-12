<!DOCTYPE html>
  <html>
    <head>
         <!--Import Google Icon Font-->
         <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!--Import materialize.css-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

        <!-- Style CSS -->
        <link rel="stylesheet" type ="text/css" href="{{ asset('/css/style.css') }}">  
        
        <!-- Data Table CSS -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">

        <!-- jQuery  -->
        <script src="https://code.jquery.com/jquery-3.5.1.js" crossorigin="anonymous"></script>
        
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
        <div class="container z-depth-3 blue-grey lighten-5">

            <!-- header halaman -->
            <div class="row">
                <div class="col s6 m1 l1">
                    <img class="responsive-image logo-pengayoman right" src="{{ asset('/img/pengayoman_logo.png') }}" alt="logo pengayoman">
                </div>
                <div class="col s6 m1 l1">
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
                            <li><a href="#">Daftar Surat</a></li>
                            <li><a href="#">Rekapitulasi Surat</a></li>
                        </ul>
                    </div>
                </nav>

                <!-- side navigation -->
                <ul class="sidenav bg-blue" id="mobile-demo">
                    <li><a href="#" class="text-white">Daftar Surat</a></li>
                    <li><a href="#" class="text-white">Rekapitulasi Surat</a></li>
                </ul>
            </div>

            <!-- tampilan tabel daftar surat -->
            <!-- <div class="row">
                <div id="man" class="col s12">
                    <div class="card material-table" style="overflow-x:auto">
                        <div class="table-header">
                            <span class="table-title">Daftar Surat</span>
                            <div class="actions">
                            <a href="#addClientes" class="modal-trigger waves-effect btn-flat nopadding"><i class="material-icons">print</i></a>
                            <a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
                            </div>
                        </div>
                        <table class="responsive-table" id="datatable">
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
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>9999</td>
                                    <td>Subsi Bantuan Hukum dan Penyuluhan</td>
                                    <td>Kepala Kanwil Kemenkumham Jatim</td>
                                    <td>Kanwil Kemenkumham Jatim</td>
                                    <td>20/11/2020</td>
                                    <td>W15.PAS.PAS25.PK.01.05.06-1</td>
                                    <td>Pembebasan Demi Hukum atas nama Nuriyanto bin Nuri</td>
                                    <td>
                                        <a class="waves-effect waves-light btn modal-trigger red darken-4" href="#modal1"><i class="small material-icons white-text">delete</i></a>
                                        <a class="waves-effect waves-light btn yellow darken-4"><i class="small material-icons white-text">create</i></a>
                                    </td>
                                    <td>
                                        
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> -->

            <div class="row">
                <div class="col s12">
                    <table id="myTable" class="display">
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
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>9999</td>
                                    <td>Subsi Bantuan Hukum dan Penyuluhan</td>
                                    <td>Kepala Kanwil Kemenkumham Jatim</td>
                                    <td>Kanwil Kemenkumham Jatim</td>
                                    <td>20/11/2020</td>
                                    <td>W15.PAS.PAS25.PK.01.05.06-1</td>
                                    <td>Pembebasan Demi Hukum atas nama Nuriyanto bin Nuri</td>
                                    <td>
                                        <a class="waves-effect waves-light btn modal-trigger red darken-4" href="#modal1"><i class="small material-icons white-text">delete</i></a>
                                        <a class="waves-effect waves-light btn yellow darken-4"><i class="small material-icons white-text">create</i></a>
                                    </td>
                                    <td>
                                        
                                    </td>
                                </tr>
                            </tbody>
                    </table>
                </div>
            </div>

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

            // JQuery Modal
            $(document).ready(function(){
                $('.modal').modal();
            });

             // JQuery datatable
             $(document).ready( function () {
                $('#myTable').DataTable();
            } );
            
        </script>

        <!--JavaScript at end of body for optimized loading-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

        <!-- JQuery Materialize JS -->
        <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
        
        <!-- Data Table JS -->
        <!-- <script src="{{ asset('/js/materialize_datatables.js') }}" crossorigin="anonymous"></script> -->
    </body>
  </html>