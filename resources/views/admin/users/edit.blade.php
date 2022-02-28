@extends('admin.index')
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ adminUrl('users') }}">{{ trans('admin.back') }}</a>
                        </div>
                    </div>
                    <hr>
                    <br>
                    {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
                    <div class="">
                        <div class="row mg-b-20">
                            <div class="parsley-input col-md-6" id="fnWrapper">
                                <label> {{ trans('admin.user_name') }} <span class="tx-danger">*</span></label>
                                {!! Form::text('name', old('name'), array('class' => 'form-control','required')) !!}
                            </div>
                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label> {{ trans('admin.user_email') }} <span class="tx-danger">*</span></label>
                                {!! Form::text('email', old('email'), array('class' => 'form-control','required')) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row mg-b-20">
                        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label> {{ trans('admin.user_password') }} <span class="tx-danger">*</span></label>
                            {!! Form::password('password', array('class' => 'form-control','required')) !!}
                        </div>
                        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label> {{ trans('admin.user_confirm_password') }} <span class="tx-danger">*</span></label>
                            {!! Form::password('confirm-password', array('class' => 'form-control','required')) !!}
                        </div>
                    </div>
                    <div class="row row-sm mg-b-20">
                        <div class="col-lg-6">
                            <label class="form-label"> {{ trans('admin.user_status') }} </label>
                            <select name="status" id="select-beast" class="form-control  nice-select  custom-select">
                                <option value="مفعل" {{$user->status === 'مفعل' ? 'selected':''}}>{{ trans('admin.user_active') }}</option>
                                <option value="غير مفعل" {{$user->status === 'غير مفعل' ? 'selected':''}}>{{ trans('admin.user_inactive') }}</option>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label"> {{ trans('admin.user_role') }} </label>
                            <select name="role_name" id="select-beast" class="form-control nice-select custom-select">
                                @foreach($roles as $key => $value)
                                    <option value="{{ $key }}" {{ $user->role_name === $key ? 'selected':'' }}> {{ $value }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">{{trans('admin.btn_confirm')}}</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
