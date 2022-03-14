<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Document</title>
</head>
<body class="d-flex flex-column min-vh-100">
    <!--- Header --->
    <div class="bg-light sticky-top">
        <div class="container">
            <nav class="navbar navbar-light navbar-expand-lg">
                <a href="{{ route('home') }}">
                    <h3>Logo</h3>
                </a>    
                <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>
                <div id="navbarSupportedContent" class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a href="{{route('tentang')}}" class="nav-link">Tentang</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Profil Sekolah
                            </a>           
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('sambutan')}}">Sambutan Kepala Sekolah</a>
                                <a class="dropdown-item" href="{{route('sejarah')}}">Sejarah</a>
                                <a class="dropdown-item" href="{{route('visimisi')}}">Visi dan Misi</a>
                            </div>
                        </li>
                        @guest
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Login / Daftar
                            </a>           
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('login')}}">Login</a>
                                <a class="dropdown-item" href="{{route('registrasi')}}">Daftar</a>
                            </div>
                        </li>
                        @else
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hi, <?php echo Auth::user()->nama; ?></a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('dashboard')}}">Dashboard</a>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                  </form> 
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!-- Header End -->
    <!-- Content -->
    @yield('konten')
    <!-- Content End-->

    <!-- Footer -->
    <div class="py-5 mt-auto text-white" style="background-color: #37120f;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <h5 class="font-weight-bold">Kontak Kami</h5>
                        <ul class="contact-info list-unstyled">
                            <li>SMP 500 Bekasi</li>
                            <li class="mt-3">Jl Akasia Blok L9 no 10</li>
                            <li>Telp: +62 21 12345678</li>
                            <li>Fax: +62 21 12345678</li>
                            <li>E-mail: contact@smp500bekasi.com</li>
                        </ul>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h5 class="font-weight-bold">Made by Mohammad Rahadyan Ibrahim</h5>
                    <ul class="links list-unstyled">
                        <li> <a href="https://www.linkedin.com/in/ibra7500" class="text-white" target=”_blank”>LinkedIn</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->
    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>
</html>