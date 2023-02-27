<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CRUD | HOME</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

                <!-- Notifikasi menggunakan flash session data -->
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @if (session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
                @endif
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <h4>Halo <b>{{ Auth::user()->role }} {{ Auth::user()->name }}</b></h4>
                    </div>
                </div>
                <br>
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        {{-- @can('Administrator') --}}
                        <a href="{{ route('post.create') }}" class="btn btn-md btn-success mb-3 float-right">New
                            Post</a>
                        {{-- @endcan --}}
                        <br>
                        <table class="table table-bordered mt-1">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">Title</th>
                                    <th scope="col" class="text-center">Status</th>
                                    <th scope="col" class="text-center">Create At</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($posts as $index => $post)
                                <tr>
                                    <td class="text-center">{{ $index + $posts->firstItem() }}</td>
                                    <td class="text-center">{{ $post->title }}</td>
                                    <td class="text-center">{{ $post->status == 0 ? 'Draft':'Publish' }}</td>
                                    <td class="text-center">{{ $post->created_at->format('d-m-Y') }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ route('post.destroy', $post->id) }}" method="POST">
                                            <a href="{{ route('post.edit', $post->id) }}"
                                                class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            @can('Administrator')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            @endcan
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center text-mute" colspan="4">Data post tidak tersedia</td>
                                </tr>
                                @endforelse
                            </tbody>  
                        </table>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal">
                            Log-out
                        </button>
                        <div>
                            <div>
                                Showing
                                {{ $posts->currentPage() }}
                                of
                                {{ $posts->lastPage() }}
                            </div>
                            <div class="pull-right">
                                {{ $posts->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Yakin Ingin Log-out?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <a class="btn btn-primary" href="/logout" role="button">Log-out</a>
            </div>
        </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>