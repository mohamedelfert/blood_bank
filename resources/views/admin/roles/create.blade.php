@extends('admin.index')
@push('css')
    <!--Internal  treeview -->
    <link href="{{ url('/design/admin/plugins/treeview/treeview-rtl.css') }}" rel="stylesheet" type="text/css"/>
@endpush
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ adminUrl('roles') }}">{{ trans('admin.back') }}</a>
                        </div>
                    </div>
                    <hr>
                    <br>
                    {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
                    <div class="card-body">
                        <div class="row row-sm mg-b-20">
                            <div class="col-lg-6">
                                <p> {{ trans('admin.role_name') }} </p>
                                {!! Form::text('name', old('name'), array('class' => 'form-control')) !!}
                            </div>
                            <div class="col-lg-6">
                                <p> {{ trans('admin.role_display_name') }} </p>
                                {!! Form::text('display_name', old('display_name'), array('class' => 'form-control')) !!}
                            </div>
                        </div>
                        <hr>
                        <div class="col-lg-4">
                            <ul id="treeview1">
                                <li><a href="#"
                                       class="fas fa-plus-circle text-primary"> {{ trans('main.roles_list') }} </a>
                                    <ul>
                                        <li>
                                            @foreach($permissions as $permission)
                                                <label style="font-size: 16px;">
                                                    {{ Form::checkbox('permission[]', $permission->id, false, ['class' => 'name']) }}
                                                    {{ $permission->name }}
                                                </label>
                                            @endforeach
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">{{trans('admin.btn_confirm')}}</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@push('js')
    <script src="{{ url('/design/admin/plugins/treeview/treeview.js') }}"></script>
@endpush
