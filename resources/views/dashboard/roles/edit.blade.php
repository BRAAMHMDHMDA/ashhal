@extends('dashboard.layouts.app')

@section('content_title', 'Edit role')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('roles.index')}}">roles</a></li>
    <li class="breadcrumb-item active">Edit role</li>
@endsection


@section('content')
    <div class="card">
        <div class="card-body">
            <form class="form form-horizontal needs-validation" action="{{ route('roles.update',$role->id) }}" method="post" >
                @csrf
                @method('put')

                @include('dashboard.roles._form', [
                 'button' => 'Update',
                ])

            </form>
        </div>
    </div>

@endsection
@push('scripts')
    <script>
        var permissions = @php echo json_encode($rolePermissions);@endphp;
        $('#permissions').val(permissions);
    </script>
@endpush
