@extends('admin.master')

@section('title')
Manage outlets
@endsection

@section('body')
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="card-header text-center bg-info">
                        <h3>Manage outlets</h3>
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
                                <th class="text-center">Phone</th>
                                <th class="text-center">Latitude</th>
                                <th class="text-center">Longitude</th>
                                <th class="text-center">image</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($outlets as $outlet)
                            <tr class="text-center">
                                <td> {{ $loop->iteration }}</td>
                                <td>{{ $outlet->name }}</td>
                                <td>{{ $outlet->phone }}</td>
                                <td>{{ $outlet->latitude }}</td>
                                <td>{{ $outlet->longitude }}</td>
                                <td>
                                    <img src="{{ asset($outlet->image) }}" alt="" height="80" width="100">
                                </td>
                                <td>
                                    <a href="{{ route('edit-outlet', ['id' => base64_encode($outlet->id)]) }}"><i class="fa fa-edit btn btn-warning btn-xs"></i></a>
                                    <a href="" onclick="deleteOutlet({{ $outlet->id }})">
                                        <i class="fa fa-trash btn btn-danger btn-xs"></i>
                                    </a>
                                    <form action="{{ route('delete-outlet', ['id' => base64_encode($outlet->id)]) }}" method="POST" id="deleteOutlet{{ $outlet->id }}">
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
    function deleteOutlet($id)
    {
        event.preventDefault();
        var check = confirm('Are you sure to delete this');
        if(check)
        {
            document.getElementById('deleteOutlet'+ $id).submit();
        }
    }
</script>


@endsection




