@extends('layout')

@section('title', 'Barang')

@section('content')
<div class="container laptop">


    <div class="row mt-5">
		<div class="col-12">
			<div class="card">
                <div class="card-header">
                    <h4 class="card-title float-left">Barang</h4>
                    <a href="" data-toggle="modal" data-target="#tambahModal" class="btn btn-success btn-sm float-right">Tambah Barang</a>
                </div>

				<div class="card-body">
					<div class="table-responsive">
						<table id="table" class="table table-striped datatable">
							<thead>
								<th>No</th>
								<th>Nama Barang</th>
								<th>Status Barang</th>
                                <th>Tanggal</th>
                                <th>Harga Awal</th>
                                <th>Deskripsi Barang</th>
								<th>Aksi</th>
							</thead>
							<tbody>
                                @foreach($barang as $key => $get)
									<tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $get->nama_barang }}</td>
                                        <td>{{ $get->status_barang }}</td>
                                        <td>{{ $get->tgl }}</td>
                                        <td>{{ $get->harga_awal }}</td>
                                        <td>{{ $get->deskripsi_barang }}</td>
                                        <td>
                                            <a href="" data-toggle="modal" data-target="#exampleModal{{ $get->id_barang }}" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="{{ route('barang.delete', $get->id_barang) }}" class="btn btn-danger btn-sm">Hapus</a>
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
</div>




<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('barang.create') }}" method="post">
            @csrf
        <div class="container">
                <div class="row mt-3">
                    <div class="col-lg">
                        <div class="form-group">
                            <label for="nama_barang">Nama Barang : </label>
                            <input type="text" name="nama_barang" id="nama_barang" class="form-control" placeholder="Masukan nama lengkap" required>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg">
                            <div class="form-group">
									<label for="status_barang">Status Barang : </label>
									<input type="text" name="status_barang" id="status_barang" class="form-control" placeholder="Masukan status barang" required>
							</div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg">
                            <div class="form-group">
                                <label for="tgl">Tanggal : </label>
                                <input type="date" name="tgl" id="tgl" class="form-control" placeholder="Masukan anggal"  required>
                            </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg">
                        <div class="form-group">
                            <label for="harga_awal">Harga Awal : </label>
                            <input type="number" name="harga_awal" id="harga_awal" class="form-control" placeholder="Masukan harga awal"  required>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg">
                        <div class="form-group">
                            <label for="harga_awal">Deskripsi Barang : </label>
                            <textarea name="deskripsi_barang" id="deskripsi_barang" cols="55" rows="10" required>

                            </textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>




@foreach($barang as $get)
<div class="modal fade" id="exampleModal{{ $get->id_barang }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('barang.update', $get->id_barang) }}" method="post">
            @csrf
            <div class="container">
                <div class="row mt-3">
                    <div class="col-lg">
                        <div class="form-group">
                            <label for="nama_barang">Nama Barang : </label>
                            <input type="text" name="nama_barang" id="nama_barang" class="form-control" placeholder="Masukan nama lengkap" value="{{ $get->nama_barang }}" required>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg">
                            <div class="form-group">
									<label for="status_barang">Status Barang : </label>
									<input type="text" name="status_barang" id="status_barang" class="form-control" placeholder="Masukan status barang" value="{{ $get->status_barang }}" required>
							</div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg">
                            <div class="form-group">
                                <label for="tgl">Tanggal : </label>
                                <input type="date" name="tgl" id="tgl" class="form-control" placeholder="Masukan anggal" value="{{ $get->tgl }}" required>
                            </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg">
                        <div class="form-group">
                            <label for="harga_awal">Harga Awal : </label>
                            <input type="number" name="harga_awal" id="harga_awal" class="form-control" placeholder="Masukan harga awal" value="{{ $get->harga_awal }}" required>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg">
                        <div class="form-group">
                            <label for="harga_awal">Deskripsi Barang : </label>
                            <textarea name="deskripsi_barang" id="deskripsi_barang" cols="55" rows="10" value="" required>
                            {{ $get->deskripsi_barang }}
                            </textarea>
                        </div>
                    </div>
                </div>
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endforeach

@endsection