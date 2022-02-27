@extends('admin.index')
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div style="margin-bottom: 10px;">
                        <a type="button" class="btn btn-primary" href="{{ adminUrl() }}">
                            <i class="fas fa-home"></i>
                        </a>
                    </div>
                    <hr>
                    <form action="{{ route('settings.update','test') }}" method="post" enctype="multipart/form-data">
                        {{method_field('PUT')}}
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-md-12 border-right-2 border-right-blue-400">
                                <div class="form-group row">
                                    <input type="hidden" name="id" value="{{ $settings->id }}">
                                    <label class="col-lg-3 col-form-label font-weight-semibold">{{ trans('admin.notification_setting_text') }}<span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <textarea class="form-control" name="notification_setting_text" cols="6" rows="6" required placeholder="Notification Setting Text">{{ $settings->notification_setting_text }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label font-weight-semibold">{{ trans('admin.about_app') }}<span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <textarea class="form-control" name="about_app" cols="6" rows="6" required placeholder="About App">{{ $settings->about_app }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label font-weight-semibold">{{ trans('admin.phone') }}</label>
                                    <div class="col-lg-9">
                                        <input name="phone" value="{{ $settings->phone }}" type="text" class="form-control" placeholder="Phone">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label font-weight-semibold">{{ trans('admin.email') }}</label>
                                    <div class="col-lg-9">
                                        <input name="email" value="{{ $settings->email }}" type="email" class="form-control" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label font-weight-semibold">{{ trans('admin.facebook') }}</label>
                                    <div class="col-lg-9">
                                        <input name="facebook" value="{{ $settings->fb_url }}" type="text" class="form-control" placeholder="Facebook">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label font-weight-semibold">{{ trans('admin.twitter') }}</label>
                                    <div class="col-lg-9">
                                        <input name="twitter" value="{{ $settings->tw_url }}" type="text" class="form-control" placeholder="Twitter">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label font-weight-semibold">{{ trans('admin.instagram') }}</label>
                                    <div class="col-lg-9">
                                        <input name="instagram" value="{{ $settings->insta_url }}" type="text" class="form-control" placeholder="Instagram">
                                    </div>
                                </div>
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
