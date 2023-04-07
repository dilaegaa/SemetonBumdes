@extends('app')

@section('content')
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-header-title">
                        <ol class="breadcrumb pull-right">
                            {{-- <li><a href="#">Transaksi Jasa</a></li> --}}
                            <li><a href="{{ route('get.akun') }}">Akun</a></li>
                            <li class="active">Detils Akun</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Detil Akun</h3>

                        </div>

                        <div class="panel-body">
                            <div class="row mt-2">

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="container">
                                        <div class="col-md-4 col-xs-12">
                                            <div class="m-t-5">
                                                <form class="form" role="form">
                                                    <div class="form-group">
                                                        <label class="control-label">Kode Akun</label>
                                                        <div class="">
                                                            <input type="text" name="nota" class="form-control"
                                                                disabled="disabled" value="{{ 'Toko A' }}">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-xs-12">
                                            <div class="m-t-5">
                                                <form class="form" role="form">
                                                    <div class="form-group">
                                                        <label class="control-label">Akun</label>
                                                        <div class="">
                                                            <input type="text" name="tanggal" class="form-control"
                                                                disabled="disabled" value="{{ 'Kas penjualan gas' }}">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-xs-12">
                                            <div class="m-t-5">
                                                <form class="form" role="form">
                                                    <div class="form-group">
                                                        <label class="control-label">Nilai</label>
                                                        <div class="">
                                                            <input type="text" name="tanggal" class="form-control"
                                                                disabled="disabled" value="{{ 5000 }}">
                                                        </div>
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
            </div> <!-- End Row -->


            <div class="row">

                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"> Pembelian</h3>

                        </div>

                        <div class="panel-body">

                            <table id="datatable-responsive" class="table table-hover table-bordered dt-responsive nowrap"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">No</th>
                                        <th style="text-align: center;">Tanggal</th>
                                        <th style="text-align: center;">Kode Transaksi</th>
                                        <th style="text-align: center;">Transaksi</th>
                                        <th style="text-align: center;">Kredit </th>
                                        <th style="text-align: center;">Debit </th>
                                        <th style="text-align: center;">Gambar Bukti</th>
                                        {{-- <th style="text-align: center;">Aksi</th> --}}
                                    </tr>
                                </thead>


                                <tbody>

                                    <tr>
                                        <td style="text-align: center;">No</td>
                                        <td style="text-align: center;">3 Desember 2022</td>
                                        <td style="text-align: center;">878</td>
                                        <td style="text-align: center;">Penjualan Gas</td>
                                        <td style="text-align: center;">200000</td>
                                        <td style="text-align: center;">0</td>
                                        <td style="text-align: center;"><button class="btn btn-success">Lihat</button></td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>


        </div> <!-- container -->

    </div> <!-- content -->
    <!-- sample modal content -->
    <div id="bayar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Pembayaran</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="col-md-2 control-label">Jumlah</label>
                            <div class="col-md-10">
                                <input name="kode" data-parsley-type="number" type="text"
                                    class="form-control" placeholder="Jumlah" data-parsley-maxlength="8" required />
                            </div>
                        </div>


                        <div class="modal-footer">

                            <button type="button" class="btn btn-default waves-effect"
                                data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                        </div>
                    </form>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection



@section('script')
    <script>
        function bayar() {
            totaltr = document.getElementById("totaltr").value;
            totalbyr = document.getElementById("totalbyr").value;
            document.getElementById("hasil").value = totalbyr - totaltr;
        }

        function edit_data(data, id) {
            document.getElementById("edit_id").value = id;
            document.getElementById("edit_jenis").value = data['jenis'];
            document.getElementById("edit_harga").value = data['harga'];
            document.getElementById("edit_jumlah").value = data['jumlah'];
        }
    </script>
@endsection
