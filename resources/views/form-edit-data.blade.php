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
                    <button class="btn btn- dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                      {{ Auth::user()->name }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton1">
                      <li><a class=" dropdown-item nav-link font-weight-bold" href="{{ route('logout.proses') }}">Logout</a></li>
                    </ul>
                  </div>
                  
                </div>
              </div>
          </div>
        </nav>
      </div>
<div class="container col-lg-4 my-3 ">
    <p class="text-center fs-3 fw-bold">
        Form Edit Data
</p>
      <form action="{{ route('route.edit-data', $dataPinjam->id) }}"  method="POST" class="form-control border ">
                                @csrf 
                                <div class="form-group">
                                  <label class="form-label">Nama Buku</label>
                                  <input type="text" name="nama_buku" id="nama_buku" value="{{ $dataPinjam->nama_buku }}" class="form-control" id="exampleInputNamaBuku" placeholder="Masukan Nama Buku">
                                  
                                </div>
                                <div class="form-group">
                                  <label class="form-label">Tanggal Peminjaman</label>
                                  <input type="text" name="jumlah" id="jumlah" value="{{ $dataPinjam->jumlah }}" class="form-control" id="exampleInputNamaBuku" placeholder="Jumlah Buku">
                                </div>
                                <div class="d-flex justify-content-center">
                                <button type="submit" value="simpan" class="btn btn-success mt-2 mb-2 ">Update</button> </div>
                            </form>
                            <div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>