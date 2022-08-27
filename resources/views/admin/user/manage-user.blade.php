@extends('admin.master')

@section('title')
    Manage User
@endsection

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <div class="card">
                        <div class="card-header text-center bg-info">
                            <h3>Manage User</h3>
                        </div>
                        <div class="card body py-5">
                            @if($deleteMessage = Session::get('deleteMessage'))
                                @section('toast')
                                    toastr.warning('{{ $deleteMessage }}');
                                @endsection
                            @endif
                            @if($updateMessage = Session::get('updatemessage'))
                                @section('toast')
                                    toastr.success('{{ $updateMessage }}');
                                @endsection
                            @endif

                            <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th class="text-center">Si No</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Password</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($users as $user)
                                    <tr class="text-center">
                                        <td> {{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->password }}</td>
                                        <td>
                                            <a href="{{ route('edit-user', ['id' => base64_encode($user->id)]) }}"><i class="fa fa-edit btn btn-warning btn-xs"></i></a>
                                            <a href="" onclick="deleteUser({{ $user->id }})">
                                                <i class="fa fa-trash btn btn-danger btn-xs"></i>
                                            </a>
                                            <form action="{{ route('delete-user', ['id' => base64_encode($user->id)]) }}" method="POST" id="deleteUser{{ $user->id }}">
                                                @csrf
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function deleteUser($id)
        {
            event.preventDefault();
            var check = confirm('Are you sure to delete this');
            if(check)
            {
                document.getElementById('deleteUser'+ $id).submit();
            }
        }
    </script>


@endsection



