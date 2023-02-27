@extends('layouts.dashlay')

@section('content')
    <div class="container">
     <div class="row justify-content-center">
      <div class="col col-lg-10">
       <h3 class="text-center fw-bold">Data User</h3>
       <br>
       <table class="table">
        <thead>
         <tr>
          <th scope="col" class="text-center">No</th>
          <th scope="col" class="text-center">Username</th>
          <th scope="col" class="text-center">Email</th>
          @auth
          @if (auth()->user()->role == 'Administrator')
          <th scope="col" class="text-center">Action</th>
          @endif
          @endauth
         </tr>
        </thead>
        <tbody>
         @foreach ($data as $index => $item)
             <tr>
              <th scope="row" class="text-center">{{ $index + $data->firstItem() }}</th>
              <td class="text-center">{{ $item->name }}</td>
              <td class="text-center">{{ $item->email }}</td>
              @auth
                  @if (auth()->user()->role == 'Administrator')
                      <td class="text-center">
                       <a class="btn" style="background-color: #FA9494" href="#">Delete</a>
                      </td>
                  @endif
              @endauth
             </tr>
         @endforeach
        </tbody>
       </table>
       <div>
        Showing Page
        {{ $data->currentPage() }}
        of
        {{ $data->lastPage() }}
    </div>
    <div class="pull-right">
        {{ $data->links() }}
    </div>
      </div>
     </div>
    </div>
@endsection