@extends('app')

@section('content')
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-header-title">
                        <h4 class="pull-left page-title">Beban Jasa</h4>
                        {{-- <ol class="breadcrumb pull-right">
                        <li class="active">Dashboard</li>
                    </ol> --}}
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Transaksi Beban Jasa</h3>

                        </div>

                        <div class="panel-body">
                            <div class="row mt-2">
                                <button class="btn btn-primary mb-2 pb-2" style="margin-bottom: 25px" data-toggle="modal"
                                    data-target="#tambah"> Tambah Transaksi </button>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable-responsive"
                                        class="table table-hover table-bordered dt-responsive nowrap" cellspacing="0"
                                        width="100%">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;">No</th>
                                                <th style="text-align: center;">Tanggal</th>
                                                <th style="text-align: center;">Kode Transaksi</th>
                                                <th style="text-align: center;">Nama Transaksi Beban</th>
                                                <th style="text-align: center;">Total Beban</th>
                                                <th style="text-align: center;">Gambar Bukti</th>
                                                <th style="text-align: center;">Aksi</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @foreach ($data as $item)
                                                <tr>
                                                    <td>
                                                        <div class="conbtn">
                                                            {{ $loop->index + 1 }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        {{ $data == null ? 'kosong' : $item['tanggal'] }}
                                                    </td>
                                                    <td>
                                                        {{ '0001' }}
                                                        <!-- Perlu dibahas kodenya gmn -->
                                                    </td>
                                                    <td>
                                                        {{ $data == null ? 'kosong' : $item['namabeban'] }}
                                                    </td>
                                                    <td>
                                                        {{ $data == [] ? 'kosong' : $item['bebanjasa'] }}
                                                        {{-- {{"Rp200,000"}} --}}
                                                    </td>
                                                    <td>
                                                        {{-- {{$data ==[] ? 'kosong' : $item['penghasilan']}} --}}
                                                        <div class="conbtn">
                                                            <img src="images/{{ $item['file'] }}" alt="nota"
                                                                onclick="edit('images/{{ $item['file'] }}',{{ $loop->index }})"
                                                                data-toggle="modal" data-target="#gambar"
                                                                style="width: 30px; height: 30px;">
                                                        </div>

                                                        {{-- {{"Rp200,000"}} --}}
                                                    </td>
                                                    <td>
                                                        <div class="conbtn">
                                                            <button class="btn btn-primary center fa fa-edit"
                                                                data-toggle="modal" data-target="#edit"
                                                                onclick='edit_data(@json($item),{{ $loop->index }})'></button>
                                                            <button class="btn btn-danger center fa fa-trash"
                                                                style="margin-left: 2%"></button>
                                                            <button class="btn btn-success center mdi mdi-eye"
                                                                style="margin-left: 2%"
                                                                onclick="window.location.href='{{ route('get.notabebanjasa') }}?id={{ $loop->index }}'">
                                                                Detail</button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- End Row -->


        </div> <!-- container -->

    </div> <!-- content -->

    <!-- sample modal content -->
    <div id="tambah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Tambah Transaksi</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('post.bebanjasa') }}" method="POST" class="form-horizontal" role="form"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="col-md-4 control-label">Tanggal</label>
                            <div class="col-md-8">
                                <div class="input-group ">
                                    <input name="tanggal" type="text" class="form-control" placeholder="mm/dd/yyyy"
                                        id="datepicker-autoclose" required>
                                    <span class="input-group-addon bg-custom b-0"><i
                                            class="mdi mdi-calendar text-white"></i></span>
                                </div><!-- input-group -->
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Nama Transaksi Beban</label>
                            <div class="col-md-8">
                                {{-- <input name="namabeban" type="text" class="form-control"
                                    placeholder="Nama Transaksi Beban (contoh: Beban Operasional)" required> --}}
                                    <select name="klasifikasi" class="form-control" required>
                                        <option value="ATK">ATK</option>
                                        <option value="Biaya kantor">Biaya kantor</option>
                                        <option value="Honor pengurus dan karyawan">Honor pengurus dan karyawan</option>
                                        <option value="Biaya penyusutan inventaris">Biaya penyusutan inventaris</option>
                                        <option value="Operasional badan pengawas dan penasehat">Operasional badan pengawas dan penasehat</option>
                                        <option value="Lainnya">Lainnya</option>  
                                    </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Catatan Transaksi</label>
                            <div class="col-md-8">
                                <input name="catatan" type="text" class="form-control"
                                    placeholder="Catatan Transaksi (bisa saja kosong)">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Bukti Transaksi</label>
                            <div class="col-md-8">
                                <input class="form-control" name="file" type="file" id="file"
                                onchange="validateFile()" required />
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect m-l-5"
                                data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                        </div>

                    </form>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- sample modal content -->
    <div id="edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Edit Transaksi Beban Jasa</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('post.editbebanjasa') }}" method="POST" class="form-horizontal"
                        role="form" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="edit_id">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Tanggal</label>
                            <div class="col-md-8">
                                <div class="input-group ">
                                    <input name="tanggal" type="text" class="form-control" placeholder="mm/dd/yyyy"
                                        id="datepicker-autoclose2" required>
                                    <span class="input-group-addon bg-custom b-0"><i
                                            class="mdi mdi-calendar text-white"></i></span>
                                </div><!-- input-group -->
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Nama Nama Beban</label>
                            <div class="col-md-8">
                                <input id="edit_namabeban" name="namabeban" type="text" class="form-control"
                                    placeholder="Nama Beban yang Dibayarkan">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Catatan Transaksi</label>
                            <div class="col-md-8">
                                <input id="edit_catat" name="catatan" type="text" class="form-control"
                                    placeholder="Catatan Transaksi (bisa saja kosong)">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect m-l-5"
                                data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                        </div>

                    </form>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- sample modal content -->
    <div id="gambar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Bukti Transaksi</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('post.bebanjasa') }}" method="POST" class="form-horizontal" role="form"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="conbtn">
                            <img src="" alt="nota" id="gambar_src" style="width: 80%;">
                        </div>
                        <input type="hidden" id="gambar_id" name="id">
                        <div style="margin-top: 20px;">
                            <label class="control-label">Edit Bukti Transaksi</label>
                        </div>
                        <div class="modal-footer mt-3">

                            <div class="col-md-10">
                                <div class="input-group ">
                                    <input name="file" type="file" class="form-control" id="file"
                                    onchange="validateFile()" required>
                                    <span class="input-group-addon bg-custom b-0"><i
                                            class="mdi mdi-calendar text-white"></i></span>
                                </div><!-- input-group -->
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary ">submit</button>
                            </div>
                        </div>

                    </form>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection

@section('script')
    <script>
        function edit(gambar, id) {
            console.log('edit: ' + gambar);
            document.getElementById("gambar_id").value = id;
            document.getElementById("gambar_src").src = gambar;
        }

        function edit_data(data, id) {
            console.log('editdata: ' + data['tanggal']);
            document.getElementById("edit_id").value = id;
            document.getElementById("datepicker-autoclose2").value = data['tanggal'];
            document.getElementById("edit_namabeban").value = data['namabeban'];
            document.getElementById("edit_catat").value = data['catatan'];
        }
    </script>
@endsection
