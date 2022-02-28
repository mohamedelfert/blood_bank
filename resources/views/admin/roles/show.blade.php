@extends('admin.index')
@push('css')
    <!--Internal  treeview -->
    <link href="{{ url('/design/admin/plugins/treeview/treeview-rtl.css') }}" rel="stylesheet" type="text/css"/>
@endpush
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ adminUrl('roles') }}">{{ trans('admin.back') }}</a>
                        </div>
                    </div>
                    <hr>
                    <div class="col-lg-4">
                        <ul id="treeview1">
                            <li><a href="#" class="fas fa-plus-circle text-primary"> {{ $role->name }} - {{ $role->display_name }}</a>
                                <ul>
                                    @if(!empty($rolePermissions))
                                        @foreach($rolePermissions as $permission)
                                            <li>{{ $permission->name }}</li>
                                        @endforeach
                                    @endif
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@push('js')
    <script src="{{ url('/design/admin/plugins/treeview/treeview.js') }}"></script>
@endpush
