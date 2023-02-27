@extends('layouts.laylog')

@section('content')

<div class="container">
 <div class="row justify-content-center">
  <div class="col-md-4">
   <div class="card" style="width: 20rem;">
    <div class="card-body">
      <form action="/registrasi" method="POST">
      @csrf
      <h3 class="text-center">Form Register</h3><hr>
       <div class="mb-3">
         <label for="name" class="form-label">Username</label>
         <input type="text" name="name" class="form-control" placeholder="username" autocomplete="off">
       </div>
       <div class="mb-3">
         <label for="email" class="form-label">Email address</label>
         <input type="email" name="email" class="form-control" placeholder="username@gmail.com" autocomplete="off">
       </div>
       <div class="mb-3">
         <label for="password" class="form-label">Password</label>
         <input type="password" name="password" class="form-control" placeholder="password" autocomplete="off">
       </div>
       <div class="d-grid gap-2">
        <button type="submit" class="btn btn-outline-primary">Submit</button>
        <h6 class="text-center">atau</h6>
        <a class="btn btn-secondary" href="{{ '/auth/redirect' }}" role="button"><i class="bi bi-google"></i> Continue With Google</a>
      </div>
       <div class="mb-3 form-check">
        Sudah Punya Akun? <a href="/">Masuk Disini!</a>
       </div>
     </form>
    </div>
   </div>
  </div>
 </div>
</div>

@endsection