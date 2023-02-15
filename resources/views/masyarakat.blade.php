@extends('layout')

@section('title', 'Masyarakat')

@section('content')
<div class="container laptop">
	<div class="row mt-5">
		<div class="col-12">
			<div class="card">
				<form action="{{ route('create') }}" method="POST">
                    @csrf
					<div class="card-header">
						<h4 class="card-title">Masyarakat</h4>
                    </div>

					<div class="card-body border-top py-0 my-3">
						<div class="row mt-3">
							<div class="col-xs-12 col-sm-3">
								<div class="form-group">
									<label for="nama_lengkap">Nama Lengkap : </label>
									<input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" placeholder="Masukan nama lengkap" required>
								</div>
							</div>

							<div class="col-xs-12 col-sm-3">
								<div class="form-group">
									<label for="username">Username : </label>
									<input type="text" name="username" id="username" class="form-control" placeholder="Masukan username" required>
								</div>
							</div>

							<div class="col-xs-12 col-sm-3">
								<div class="form-group">
									<label for="password">Password : </label>
									<input type="password" name="password" id="password" class="form-control" placeholder="Masukan password" required>
								</div>
							</div>

							<div class="col-xs-12 col-sm-3">
                                <div class="form-group">
									<label for="telp">Telepon : </label>
									<input type="number" name="telp" id="telp" class="form-control" placeholder="Masukan telepon Tahun Bayar" required>
								</div>
							</div>

							<div class="col-xs-12 col-sm-12">
                                <br>
                                <button type="submit" class="btn btn-success btn-block"><i class="fa fa-plus"></i> Tambah </button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>



    <div class="row mt-5">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table id="table" class="table table-striped datatable">
							<thead>
								<th>No</th>
								<th>Nama Lengkap</th>
								<th>Username</th>
                                <th>Telepon</th>
								<th>Aksi</th>
							</thead>
							<tbody>
                                @foreach($masyarakat as $key => $get)
									<tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $get->nama_lengkap }}</td>
                                        <td>{{ $get->username }}</td>
                                        <td>{{ $get->telp }}</td>
                                        <td>
                                            <a href="" data-toggle="modal" data-target="#exampleModal{{ $get->id_users }}" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="{{ route('masyarakat.delete', $get->id_users) }}" class="btn btn-danger btn-sm">Hapus</a>
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


@foreach($masyarakat as $get)
<div class="modal fade" id="exampleModal{{ $get->id_users }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('masyarakat.update', $get->id_users) }}" method="post">
            @csrf
            <div class="container">
                <div class="row mt-3">
                    <div class="col-lg">
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap : </label>
                            <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" placeholder="Masukan nama lengkap" value="{{ $get->nama_lengkap }}" required>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg">
                            <div class="form-group">
									<label for="username">Username : </label>
									<input type="text" name="username" id="username" class="form-control" placeholder="Masukan username" value="{{ $get->username }}" required>
							</div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg">
                            <div class="form-group">
                                <label for="password">Password : </label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Masukan password" value="{{ $get->password }}" required>
                            </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg">
                        <div class="form-group">
                            <label for="telp">Telepon : </label>
                            <input type="number" name="telp" id="telp" class="form-control" placeholder="Masukan telepon Tahun Bayar" value="{{ $get->telp }}" required>
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