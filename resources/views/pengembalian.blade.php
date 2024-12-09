<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <title>Pengembalian Buku</title>
</head>
<body>

    {{-- Navbar sec --}}
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark bg-warning mt-2">
          <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('route.balik') }}">Perpus .Dev</a>
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
                    <ul class="dropdown-menu dropdown-menu bg-light text-black" aria-labelledby="dropdownMenuButton1">
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
        <table class="table text-center table-bordered border-dark">
          <thead>
            <tr>
              <th>No</th>
              <th>Buku</th>
              <th>jumlah</th>
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
                <a href="{{ route('route.delete-soft', $row->id) }}" onclick="return confirm('Masukin Ke Draft Nih??');" class="btn btn-info mt-2 mb-2 text-light">Draft</a>
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