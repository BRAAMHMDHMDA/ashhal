@extends('dashboard.layouts.app')

@section('content_title', 'Create User')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('users.index')}}">users</a></li>
    <li class="breadcrumb-item active">Create New User</li>
@endsection


@section('content')
    <div class="card">
        <div class="card-body">
            <form class="form form-horizontal" action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @include('dashboard.users._form', [
                 'button' => 'Add',
                ])

            </form>
        </div>
    </div>

@endsection
@push('scripts')
    <script>
        var roles = @php echo json_encode(old('roles')); @endphp;
        $('#roles').val(roles);
    </script>
@endpush
