@extends('dashboard.layouts.app')

@section('content_title', 'chauffeurs List')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('chauffeurs.index')}}">chauffeurs</a></li>
    <li class="breadcrumb-item active">chauffeurs List</li>
@endsection

@section('breadcrumb-right')
    @can('chauffeur-create')
        <a href="{{ route('chauffeurs.create') }}">
            <button type="button" class="btn btn-primary"><i data-feather='plus'></i> Add New chauffeur</button>
        </a>
    @endcan
@endsection

@section('content')
    <div class="card">
        @if(count($chauffeurs)!= 0)
            <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>username</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Age <small>(years)</small></th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($chauffeurs as $chauffeur)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>
                            @if($chauffeur->image)
                                <img src="{{ $chauffeur->image_path }}" class="mr-75" height="40" width="40" alt="" />
                            @endif
                            <span class="font-weight-bold">{{ $chauffeur->name }}</span>
                        </td>
                        <td>{{ $chauffeur->username }}</td>
                        <td>{{ $chauffeur->email }}</td>
                        <td>{{ $chauffeur->phone }}</td>
                        <td>{{ $chauffeur->age() }}</td>
                        <td>
                            @if( $chauffeur->status == 'active')
                                <span class="badge badge-pill badge-light-success mr-1">Active</span>
                            @else
                                <span class="badge badge-pill badge-light-warning mr-1">Draft</span>
                            @endif
                        </td>
                        <td>{{ $chauffeur->created_at }}</td>
                        <td>
                            @can('chauffeur-edit')
                                <a href="{{route('chauffeurs.edit',$chauffeur->id)}}">
                                    <button type="button" class="btn btn-sm btn-info">
                                        <i data-feather='edit'></i>
                                    </button>
                                </a>
                            @endcan
                            @can('chauffeur-delete')
                                <form action="{{ route('chauffeurs.destroy', $chauffeur->id) }}" method="post"
                                      style="display: inline-block">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button type="button" class="delete btn btn-sm btn-danger"><i data-feather='trash-2'></i></button>
                                </form><!-- end of form -->
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="card-footer">
                {{ $chauffeurs->links() }}
            </div>
        </div>
        @else
            <div class="card-body alert-danger">
                <h2 style="color: red">There Are No chauffeurs *_*</h2>
            </div>
        @endif
    </div>
    </div>
@endsection
