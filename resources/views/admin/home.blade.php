@extends('admin.index')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ App\Models\Donation::count() }}</h3>
                        <p>{{ trans('main.donations') }}</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-hand-holding-usd"></i>
                    </div>
                    <a href="{{ adminUrl('donations') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ App\Models\Post::count() }}</h3>
                        <p>{{ trans('main.posts') }}</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-pen-alt"></i>
                    </div>
                    <a href="{{ adminUrl('posts') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ App\Models\Client::count() }}</h3>
                        <p>{{ trans('main.clients') }}</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="{{ adminUrl('clients') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ App\Models\Contact::count() }}</h3>
                        <p>{{ trans('main.contacts') }}</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-envelope-open"></i>
                    </div>
                    <a href="{{ adminUrl('contacts') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            {{-- Donations --}}
            <section class="col-lg-7 connectedSortable">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title text-danger">
                            <i class="fas fa-hand-holding-usd mr-1"></i>
                            Last Donations Requests
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="tab-content p-0">
                            @foreach($donations = App\Models\Donation::orderBy('id','desc')->paginate(6) as $donation)
                                <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <b>Patient Name :</b>
                                        <span class="info-box-number text-center mb-0 badge badge-pill badge-dark">{{ $donation->patient_name }}</span>
                                    </h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body" style="display: block;">
                                    <div class="row">
                                        <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                                            <div class="row">
                                                <div class="col-12 col-sm-4">
                                                    <div class="info-box bg-light">
                                                        <div class="info-box-content">
                                                            <span class="info-box-text text-center text-muted">Phone</span>
                                                            <span class="info-box-number text-center mb-0 badge badge-pill badge-success">{{ $donation->patient_phone }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                    <div class="info-box bg-light">
                                                        <div class="info-box-content">
                                                            <span class="info-box-text text-center text-muted">City</span>
                                                            <span class="info-box-number text-center mb-0 badge badge-pill badge-warning">{{ optional($donation->city)->name }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                    <div class="info-box bg-light">
                                                        <div class="info-box-content">
                                                            <span class="info-box-text text-center text-muted">Governorate</span>
                                                            <span class="info-box-number text-center mb-0 badge badge-pill badge-secondary">{{ optional($donation->city->governorate)->name }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-sm-4">
                                                    <div class="info-box bg-light">
                                                        <div class="info-box-content">
                                                            <span class="info-box-text text-center text-muted">Age</span>
                                                            <span class="info-box-number text-center mb-0 badge badge-pill badge-primary">{{ $donation->patient_age }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                    <div class="info-box bg-light">
                                                        <div class="info-box-content">
                                                            <span class="info-box-text text-center text-muted">blood Type</span>
                                                            <span class="info-box-number text-center mb-0 badge badge-pill badge-danger">{{ optional($donation->bloodType)->name }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                    <div class="info-box bg-light">
                                                        <div class="info-box-content">
                                                            <span class="info-box-text text-center text-muted">Bags Num</span>
                                                            <span class="info-box-number text-center mb-0 badge badge-pill badge-info">{{ $donation->bags_num }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-12 col-sm-12">
                                                    <div class="info-box bg-light">
                                                        <div class="info-box-content">
                                                            <span class="info-box-text text-center mb-0 badge badge-info">Donation Notes</span>
                                                            <span class="info-box-number text-center text-muted mb-0">{{ $donation->details }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2" style="padding-left: 2%">
                                            <h3 class="text-primary"><i class="fas fa-hospital"></i> Hospital </h3>
                                            <p class="text-muted">
                                                <span class="info-box-number text-center mb-0 badge badge-pill badge-success">{{ $donation->hospital_name }}</span>
                                            </p>
                                            <br>
                                            <div class="text-muted">
                                                <p class="text-sm">Hospital Address
                                                    <b class="d-block"><span class="info-box-number text-center mb-0 badge badge-pill badge-warning">{{ $donation->hospital_address }}</span></b>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
            {{-- Donations --}}

            {{-- Contacts --}}
            <section class="col-lg-5 connectedSortable">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title text-info">
                            <i class="fas fa-envelope-open mr-1"></i>
                            Last Contacts
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="tab-content p-0 row d-flex align-items-stretch">
                            @foreach($contacts = App\Models\Contact::orderBy('id','desc')->paginate(4) as $contact)
                                <div class="col-12 col-sm-6 col-md-6 align-items-stretch">
                                <div class="card bg-light">
                                    <div class="card-header text-muted border-bottom-0">
                                        <b>Name: </b>{{ $contact->name }}
                                    </div>
                                    <hr>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-12">
                                                <h2 class="lead"><b>{{ mb_strlen($contact->subject) > 35 ? mb_substr($contact->subject,0,35) : $contact->subject }}</b></h2>
                                                <p class="text-muted text-sm"><b>Message: </b> {{ mb_strlen($contact->message) > 60 ? mb_substr($contact->message,0,60) : $contact->message }} </p>
                                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-clock"></i></span> {{ $contact->created_at }} </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="text-right">
                                            <a href="{{ adminUrl('contacts/'.$contact->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fas fa-user"></i> View Message
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
            {{-- Contacts --}}
        </div>
    </div>
@endsection
