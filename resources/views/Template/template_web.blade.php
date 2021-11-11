<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('img/logo.png')}}">

    {{-- font --}}
    <link href="https://fonts.googleapis.com/css?family=Lato:300,700|Prata" rel="stylesheet">

    <title>@yield('title')</title>
    <style>
      @keyframes fade{
        0%   {opacity: 0;}
        100% {opacity: 1;}
      }
      @media screen and (max-width: 450px){
        .form-group label{
          font-size: 15px;
        }
        .form-control{
          font-size: 12px;
        }
        .parsley-required{
          font-size: 13px;
        }
        #status-text label {
          width: 20%;
        }
        #status-text button{
          font-size: 10px;
          width: 40%;
        }
        .form-group label{
          width: 43%;
        }
        .form-group .col-sm-9{
          width: 50%;
        }
        .form-group label, .form-group p, .form-group a,.badge,.form-navigation button{
          font-size: 10px;
        }
        #dropdownMenuLink{
          padding-left: 0;
        }
        .col-md-6{
          width: 50%;
        }
        .col-md-6 p{
          font-size: 12px;
        }
        .text-md-right{
          text-align: right;
        }
        h4{
          font-size: 15px;
        }
      }
      @media screen and (max-width: 768px){
        .cetak button{
          width: 100%;
        }
        .cetak #home{
          text-align: center;
        }
      }
      .skeleton {
        opacity: 1;
        animation: skeleton-loading 1s linear infinite alternate;
      }

      @keyframes skeleton-loading {
        0% {
          background-color: hsl(200, 20%, 70%);
        }

        100% {
          background-color: hsl(200, 20%, 95%);
        }
      }
    </style>
    @yield('css')

  </head>
  @if(Auth::check())
  <body onload="notifikasi({{Auth::user()->id_user}})" style="color:white;">
  @else
  <body>
  @endif
    <nav class="navbar navbar-expand-lg navbar-dark">
      <a class="navbar-brand" href="{{url('/')}}">
        <img src="{{asset('img/goVaksinwhite.png')}}" height="35" class="d-inline-block align-top" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{url('/')}}">Home</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="{{url('/jadwal')}}">Jadwal & Tempat Vaksin</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="{{url('/harga')}}">Harga Vaksin</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="{{url('/syarat')}}">Syarat Vaksinasi</a>
          </li>
          @if(Auth::check())
            @if(Auth::user()->level==3)
                <li class="nav-item active">
                  <a class="nav-link" href="{{url('/daftar-vaksin')}}">Daftar Vaksin</a>
                </li>  
              </ul>
              <div class="dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i> {{Auth::user()->nama}} </a>
                <span id="notifikasi" class="position-absolute d-none" style="top: 0;"></span>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <a class="dropdown-item" href="{{url('/status')}}">Riwayat Vaksinasi 
                    <span id="notifikasi2" class="position-absolute btn-danger rounded-circle pl-3 pr-3 pt-1 pb-1 d-none" style="top:0;"></span>
                  </a>

                  <a class="dropdown-item" href="{{url('/edit-akun')}}">Edit Profile</a>
                </div>
              </div>
              <span class="navbar-text">
                <form method="POST" action="{{ url('logout') }}">
                  @csrf
                  @method('post')
                  <button class="btn btn-danger rounded">Logout <i class="fas fa-sign-out-alt"></i></button>
                </form>
              </span>
            @elseif(Auth::user()->level!=3)
            </ul>
            <span class="navbar-text">
              <a class="nav-link text-white" href="{{url('admin')}}">Admin Panel</a>
            </span>
            @endif
          @else
          </ul>
          <span class="navbar-text">
            <a href="{{url('/login')}}" type="submit" class="btn text-white">MASUK</a>
            <a href="{{url('/daftar')}}" type="submit" class="btn btn-info text-white">DAFTAR</a>
          </span>
        @endif
      </div>
    </nav>

    {{-- content --}}
    @yield('content')

    @yield('footer')

    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Optional JavaScript -->
    <script>
      function notifikasi(id){
        // $.get('notifikasi/'+id,function(notifikasi){
        //   if (notifikasi!="0") {
        //     document.getElementById("notifikasi").textContent=notifikasi;
        //     document.getElementById("notifikasi2").textContent=notifikasi;
        //   }
        // });
        setInterval(function(){
          $.get('notifikasi/'+id,function(notifikasi){
            if (notifikasi!="0") {
              $("#notifikasi").removeClass('d-none');
              $("#notifikasi2").removeClass('d-none');
              document.getElementById("notifikasi").textContent=notifikasi;
              document.getElementById("notifikasi2").textContent=notifikasi;
            }
            else{
              $("#notifikasi").addClass('d-none');
              $("#notifikasi2").addClass('d-none');
            }
          });
        },1000); 
      }

      function printDiv() {
         var printContents = document.getElementById("printInvoice").innerHTML;
         var originalContents = document.body.innerHTML;
         document.body.innerHTML = printContents;
         window.print();
         document.body.innerHTML = originalContents;
      }

      window.addEventListener('load', (event) => {
       element = document.getElementsByClassName("skeleton");
       console.log(element.length);
       for(let i=0; i<element.length;i++){
          element[i].classList.remove("skeleton");
       }
       
      });
    </script>
    @yield('script')
  </body>
</html>
