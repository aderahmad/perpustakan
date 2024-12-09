<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <title>Peminjaman Buku</title>
</head>
<body>

    {{-- Navbar sec --}}
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark bg-warning mt-2">
          <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('route.pinjam') }}">Perpus .Dev</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                  <a class="nav-link active" href="{{ route('route.pinjam') }}">Peminjaman Buku</a>
                  <a class="nav-link active" href="{{ route('route.balik') }}">Pengembalian Buku</a>
                </div>
                <div class="navbar-nav">
                  <div class="btn-group dropstart">
                    <button class="btn btn- dropdown-toggle text-white" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                      {{ Auth::user()->name }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark bg-light" aria-labelledby="dropdownMenuButton1">
                      <li><a class=" dropdown-item nav-link font-weight-bold text-dark" href="{{ route('logout.proses') }}">Logout</a></li>
                    </ul>
                  </div>
                  
                </div>
              </div>
          </div>
        </nav>
      </div>

      {{-- sec 1 --}}
      <section id="page2" class='page2 mt-4'>
        <div class="container">
                        <!-- Button trigger modal -->
              <button type="button" class="btn btn-success mt-2 mb-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                + Tambah
              </button>

              <!-- Modal tambah data -->
              <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="staticBackdropLabel">Tambah Data</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      @if (session('error'))
                          <div class="alert alert-danger alert-dismissible">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              {{ session('error') }}
                          </div>
                          @endif
                          @if (session('success'))
                              <div class="alert alert-success alert-dismissible">
                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                  {{ session('success') }}
                              </div>
                          @endif
                          <form action="{{ route('route.simpan')}}"  method="POST">
                              @csrf 
                              <div class="form-group">
                                <label>Nama Buku</label>
                                <input type="text" name="nama_buku" id="nama_buku" value="{{ old('nama_buku') }}" class="form-control" id="exampleInputNamaBuku" placeholder="Masukan Nama Buku">
                                
                              </div>
                              <div class="form-group">
                                <label>Jumlah Buku</label>
                                <input type="text" name="jumlah" id="jumlah" value="{{ old('jumlah') }}" class="form-control" id="exampleInputNamaBuku" placeholder="Masukkan Jumlah Buku">
                              </div>
                              <button type="submit" value="simpan" class="btn btn-success mt-2 mb-2 ">Submit</button>
                              <button class="btn btn-danger mt-2 mb-2 ">Reset</button>
                          </form>
                    </div>
                  </div>
                </div>
              </div>
        <table class="table text-center table-bordered border-dark">
          <thead>
            <tr>
              <th>No</th>
              <th>Buku</th>
              <th>Jumlah</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @php $no=1; @endphp
            @foreach($dataPinjam as $row)
            <tr>
              <td>{{ $no++ }}</td>
              <td>{{ $row->nama_buku }}</td>
              <td>{{ $row->jumlah }}</td>
              <td>
                <button type="button" class="btn btn-danger mt-2 mb-2"><a href="{{ route('route.delete-data', $row->id) }}">Hapus</a></button>
                <a href="{{ route('route.form-edit', $row->id) }}" class="btn btn-warning mt-2 mb-2" >
                  Edit
                </a>
  
                <!-- Modal edit data
                <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Edit Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                {{ session('error') }}
                            </div>
                            @endif
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form action="{{ route('route.simpan')}}"  method="POST">
                                @csrf 
                                <div class="form-group">
                                  <label>Nama Buku</label>
                                  <input type="text" name="nama_buku" id="nama_buku" value="{{ $row->nama_buku }}" class="form-control" id="exampleInputNamaBuku" placeholder="Masukan Nama Buku">
                                  
                                </div>
                                <div class="form-group">
                                  <label>Tanggal Peminjaman</label>
                                  <input type="text" name="jumlah" id="jumlah" value="{{ old('jumlah') }}" class="form-control" id="exampleInputNamaBuku" placeholder="Jumlah Buku">
                                </div>
                                <button type="submit" value="simpan" class="btn btn-success mt-2 mb-2 ">Simpan</button>
                            </form>
                      </div>
                    </div>
                  </div> -->
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        
      </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>