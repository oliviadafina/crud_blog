@extends('layouts.laylog')

@section('content')

<div class="container">
 <div class="row justify-content-center">
  <div class="col-md-4">
   <div class="card" style="width: 20rem;">
    <div class="card-body">
      <form action="/actionlogin" method="POST">
      @csrf
      <h3 class="text-center">Form Login</h3><hr>
       <div class="mb-3">
         <label for="email" class="form-label">Email address</label>
         <input type="email" class="form-control" placeholder="username@gmail.com" autocomplete="off" name="email">
       </div>
       <div class="mb-3">
         <label for="password" class="form-label">Password</label>
         <input type="password" class="form-control" placeholder="password" autocomplete="off" name="password">
       </div>
       <div class="d-grid gap-2">
        <button type="submit" class="submit btn btn-outline-primary">Submit</button>
        <h6 class="text-center">atau</h6>
        <a class="btn btn-secondary" href="{{ '/auth/redirect' }}" role="button"><i class="bi bi-google"></i> Continue With Google</a>
      </div>
       <div class="mb-3 form-check">
        Belum Punya Akun? <a href="/registrasi">Daftar Disini!</a>
       </div>
     </form>
    </div>
   </div>
  </div>
 </div>
</div>

@endsection