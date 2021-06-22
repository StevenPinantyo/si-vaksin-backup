@extends('Template.template_web')
@section('title','goVaksin | Profile')
@section('css')
@endsection
@section('content')
<style>
  body{
      font-family: 'Lato', sans-serif;
      background-color: #a25eff;
      color: white;
  }
  .navbar {
      background-color: #7e21ff;
  }
  .container {
      margin-top: 50px;
  }
  .judul {
      font-weight: bolder;
      font-size: 40px;
      text-align: center;
      font-family: 'Prata', serif;
  }
  .card {
      box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.5);
      border-radius: 20px;
      margin-bottom: 60px;
      font-size: 18px;
      color: black;
  }
  .a {
    list-style-type: lower-roman;
  }
  footer {
    background: #7e21ff;
    color: white;
  }
</style>
@endsection
@section('content')
<div class="container">
  <div class="col-md-12">
    <p class="judul">Edit Profile</p>
    <div class="row mt-3">
      <div class="col-md-12">
        <div class="card">

          <form id="editForm" class="p-5"  method="POST">
            @csrf
            @method('post')
            <input type="hidden" name="id_user" value="{{$akun->id_user}}">
	          <div class="form-group row">
	            <label class="col-sm-2 col-form-label">Username</label>
	            <div class="col-sm-10">
	              <input id="username" type="text" name="username" class="form-control" value="{{$akun->username}}">
	              <span id="usernameError" class="text-danger"></span>
	            </div>
	          </div>

	          <div class="form-group row">
	            <label class="col-sm-2 col-form-label">Email</label>
	            <div class="col-sm-10">
	              <input id="email" type="email" name="email" class="form-control" value="{{$akun->email}}">
	              <span id="emailError" class="text-danger"></span>
	            </div>
	          </div>

	          <div class="form-group row">
	            <label class="col-sm-2 col-form-label">Nama</label>
	            <div class="col-sm-10">
	              <input id="nama" type="text" name="nama" class="form-control" value="{{$akun->nama}}">
	              <span id="namaError" class="text-danger"></span>
	            </div>
	          </div>

	          <div class="form-group row">
	            <label class="col-sm-2 col-form-label">New Password</label>
	            <div class="col-sm-10">
	              <input id="password2" type="text" name="password2" class="form-control">
	              <span id="passwordError2" class="text-danger"></span>
	            </div>
	          </div>

	          <div class="form-group row">
	            <label class="col-sm-2 col-form-label">Current Password</label>
	            <div class="col-sm-10">
	              <input id="password" type="text" name="password" class="form-control">
	              <span id="passwordError" class="text-danger"></span>
	            </div>
	          </div>

	          <button type="submit" name="submit" value="submit" class="btn btn-primary">Ubah</button>
	          <button type="button" class="btn btn-info">Kembali</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('footer')
<footer class="text-center text-lg-start">
  <section class="content-footer pt-1 pb-2">
    <div class="container text-center text-md-start mt-5">
      <div class="row">
        <div class="col-md-5 col-sm-12 col-lg-4 col-xl-3 mx-auto mb-4">
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-hospital-alt"></i> goVkasin
          </h6>
          <p>goVaksin adalah sebuah aplikasi berbasis web yang bergerak di bidang kesehatan serta berkerja sama dengan beberapa pihak rumah sakit untuk memudahkan masyarakat dalam mendapatkan vaksinasi Covid-19.</p>
        </div>
        <div class="col-md-5 col-sm-12 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <h6 class="text-uppercase fw-bold mb-4">
            Contact
          </h6>
          <p><i class="fas fa-home me-3"></i> Jakarta, Indonesia.</p>
          <p><i class="fas fa-envelope me-3"></i> govaksin@email.com</p>
          <p><i class="fas fa-phone me-3"></i> +62 21 4294875</p>
          <p><i class="fas fa-print me-3"></i> +62 21 4294875</p>
        </div>
      </div>
    </div>
  </section>
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2021 Copyright: goVaksin.test
  </div>
</footer>  
<script>
  
</script>
@endsection
@section('script')
<script>
  
</script>
@endsection