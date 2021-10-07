@extends('dashboard.layouts.app')

@section('content_title', 'Edit User')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('users.index')}}">Users</a></li>
    <li class="breadcrumb-item active">Edit User</li>
@endsection


@section('content')
    <div class="card">
        <div class="card-body">
            <form class="form form-horizontal needs-validation" action="{{ route('users.update',$user->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')

                @include('dashboard.users._form', [
                 'button' => 'Update',
                ])

            </form>
        </div>
    </div>

@endsection
@push('scripts')
    <script>
        let roles = @php echo json_encode($roles_id);@endphp;
        $('#roles').val(roles);
    </script>
@endpush
