<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <title>Home</title>
</head>
<body>

    {{-- Navbar sec --}}
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark bg-warning mt-2">
          <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home.home') }}">Perpus .Dev</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              {{-- div yg di bawah ini buat space between --}}
              <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                  
                </div>
                <div class="navbar-nav">
                  <a class="nav-link active font-weight-bold" href="{{ route('login.login') }}">Log in</a>
                  <a class="nav-link active font-weight-bold" href="{{ route('register.regis') }}">Register</a>
                </div>
              </div>
          </div>
        </nav>
      </div>

      {{-- sec 1 --}}
      <section id="page1" class='page1'>
        <div class='container'>
            <div class="row de-flex align-items-center mt-4">
                <div class="col-md-6 mt-2 mb-2">
                    <h1 class="note1">Perpus Keren</h1>
                    <h5>Buku adalah teman yang berharga. Namun, sulit untuk menjelaskan hal itu kepada yang tak suka membaca.</h5>
                </div>
                <div class="col-md-6 mt-4-mb-4">
                    <img src='https://img.freepik.com/free-vector/focused-tiny-people-reading-books_74855-5836.jpg?size=626&ext=jpg&ga=GA1.2.166711163.1683261221&semt=sph'  alt="page1" class="img-fluid mt-1 pic-1" />
                </div>
            </div>
        </div>
    </section>

      <section id="page2" class='page2'>
        <div class='container'>
            <div class="row de-flex align-items-center mt-4">
              <div class="col-md-6 mt-4-mb-4">
                  <img src='https://img.freepik.com/free-vector/man-library-scene-young-guy-sitting-table-with-books-lamp-studying-working-reading-modern-room-interior-design-with-desk-chairs-bookcase-with-ladder_575670-1119.jpg?w=740&t=st=1686539459~exp=1686540059~hmac=6d71713b9c53c94a72d04f7e70584c82d51233b0fa5362f393b7e38a0afb4431'  alt="page1" class="img-fluid mt-1 pic-1" />
              </div>
                <div class="col-md-6 mt-2 mb-2">
                    <h1 class="note1">Perpus Mantap</h1>
                    <h5>Berbagi buku tentang kehidupan dan pengalaman dengan orang lain. Itu adalah catatan seumur hidup untuk semua generasi.</h5>
                </div>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>