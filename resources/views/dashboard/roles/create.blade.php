@extends('dashboard.layouts.app')

@section('content_title', 'Create role')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('roles.index')}}">roles</a></li>
    <li class="breadcrumb-item active">Create New role</li>
@endsection


@section('content')
    <div class="card">
        <div class="card-body">
            <form class="form form-horizontal" action="{{ route('roles.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @include('dashboard.roles._form', [
                 'button' => 'Add',
                ])

            </form>
        </div>
    </div>

@endsection
@push('scripts')
    <script>
        var permissions = @php echo json_encode(old('permissions')); @endphp;
        $('#permissions').val(permissions);
    </script>
@endpush
