@extends('admin.index')
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="col-md-12">
                            <form id="messages">
                                <div class="row" style="margin-bottom: 5px">
                                    <div class="col-6">
                                        <label for="name">{{ trans('admin.contact_name') }}</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                               disabled value="{{ $contact->name }}">
                                    </div>
                                    <div class="col-6">
                                        <label for="email">{{ trans('admin.contact_email') }}</label>
                                        <input type="text" name="email" class="form-control" id="email"
                                               disabled value="{{ $contact->email }}">
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom: 5px">
                                    <div class="col-6">
                                        <label for="subject">{{ trans('admin.contact_subject') }}</label>
                                        <input type="text" name="subject" class="form-control" id="subject"
                                               disabled value="{{ $contact->subject }}">
                                    </div>
                                    <div class="col-6">
                                        <label for="phone">{{ trans('admin.contact_phone') }}</label>
                                        <input type="text" name="phone" class="form-control" id="phone"
                                               disabled value="{{ $contact->phone }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="desc">{{ trans('admin.contact_message') }}</label>
                                    <textarea class="form-control" name="message" id="message" rows="6" disabled>{{ $contact->message }}ه</textarea>
                                </div>
                            </form>
                            <div class="text-center">
                                <a href="{{ adminUrl('contacts') }}" class="btn btn-block btn-primary">العوده للرسائل</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- row closed -->
@endsection
