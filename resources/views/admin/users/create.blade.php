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
                    <form class="parsley-style-1" action="{{route('users.store','test')}}" method="post">
                        {{csrf_field()}}

                        <div class="row mg-b-20">
                            <div class="parsley-input col-md-6" id="fnWrapper">
                                <label> {{ trans('admin.user_name') }} <span class="tx-danger">*</span></label>
                                <input class="form-control form-control-sm mg-b-20"
                                       data-parsley-class-handler="#lnWrapper" name="name" value="{{old('name')}}"
                                       type="text" required>
                            </div>
                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label> {{ trans('admin.user_email') }} <span class="tx-danger">*</span></label>
                                <input class="form-control form-control-sm mg-b-20"
                                       data-parsley-class-handler="#lnWrapper" name="email" value="{{old('email')}}"
                                       type="email" required>
                            </div>
                        </div>
                        <div class="row mg-b-20">
                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label> {{ trans('admin.user_password') }} <span class="tx-danger">*</span></label>
                                <input class="form-control form-control-sm mg-b-20"
                                       data-parsley-class-handler="#lnWrapper"
                                       name="password" type="password" required>
                            </div>
                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label> {{ trans('admin.user_confirm_password') }} <span class="tx-danger">*</span></label>
                                <input class="form-control form-control-sm mg-b-20"
                                       data-parsley-class-handler="#lnWrapper"
                                       name="confirm-password" type="password" required>
                            </div>
                        </div>
                        <div class="row row-sm mg-b-20">
                            <div class="col-lg-6">
                                <label class="form-label"> {{ trans('admin.user_status') }} </label>
                                <select name="status" id="select-beast" class="form-control nice-select custom-select">
                                    <option value="مفعل" {{old('status') === 'مفعل' ? 'selected' : ''}}>{{ trans('admin.user_active') }}</option>
                                    <option value="غير مفعل" {{old('status') === 'غير مفعل' ? 'selected' : ''}}>{{ trans('admin.user_inactive') }}</option>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label"> {{ trans('admin.user_role') }} </label>
                                <select name="role_name" id="select-beast"
                                        class="form-control nice-select custom-select">
                                    <option value="" selected disabled> {{ trans('admin.user_chose_role') }} </option>
                                    @foreach($roles as $key => $value)
                                        <option value="{{ $key }}"> {{ $value }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">{{trans('admin.btn_confirm')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
