@extends('admin.index')
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="table-responsive">
                        <!-- Default box -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Donation Details</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                                        <div class="row">
                                            <div class="col-12 col-sm-4">
                                                <div class="info-box bg-light">
                                                    <div class="info-box-content">
                                                        <span
                                                            class="info-box-text text-center text-muted">{{ trans('admin.patient_name') }}</span>
                                                        <span
                                                            class="info-box-number text-center text-muted mb-0">{{ $donation->patient_name }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <div class="info-box bg-light">
                                                    <div class="info-box-content">
                                                        <span
                                                            class="info-box-text text-center text-muted">{{ trans('admin.patient_phone') }}</span>
                                                        <span
                                                            class="info-box-number text-center mb-0 badge badge-pill badge-success">{{ $donation->patient_phone }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <div class="info-box bg-light">
                                                    <div class="info-box-content">
                                                        <span
                                                            class="info-box-text text-center text-muted">{{ trans('admin.patient_city') }}</span>
                                                        <span
                                                            class="info-box-number text-center mb-0 badge badge-pill badge-warning">{{ optional($donation->city)->name }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-sm-4">
                                                <div class="info-box bg-light">
                                                    <div class="info-box-content">
                                                        <span
                                                            class="info-box-text text-center text-muted">{{ trans('admin.patient_age') }}</span>
                                                        <span
                                                            class="info-box-number text-center mb-0 badge badge-pill badge-primary">{{ $donation->patient_age }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <div class="info-box bg-light">
                                                    <div class="info-box-content">
                                                        <span
                                                            class="info-box-text text-center text-muted">{{ trans('admin.patient_blood_type') }}</span>
                                                        <span
                                                            class="info-box-number text-center mb-0 badge badge-pill badge-danger">{{ optional($donation->bloodType)->name }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <div class="info-box bg-light">
                                                    <div class="info-box-content">
                                                        <span
                                                            class="info-box-text text-center text-muted">{{ trans('admin.patient_governorate') }}</span>
                                                        <span
                                                            class="info-box-number text-center text-muted mb-0">{{ optional($donation->city->governorate)->name }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-sm-4">
                                                <div class="info-box bg-light">
                                                    <div class="info-box-content">
                                                        <span
                                                            class="info-box-text text-center text-muted">{{ trans('admin.patient_client_name') }}</span>
                                                        <span
                                                            class="info-box-number text-center text-muted mb-0">{{ optional($donation->client)->name }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <div class="info-box bg-light">
                                                    <div class="info-box-content">
                                                        <span
                                                            class="info-box-text text-center text-muted">{{ trans('admin.patient_client_phone') }}</span>
                                                        <span
                                                            class="info-box-number text-center text-muted mb-0">{{ optional($donation->client)->phone }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <div class="info-box bg-light">
                                                    <div class="info-box-content">
                                                        <span
                                                            class="info-box-text text-center text-muted">{{ trans('admin.bags_num') }}</span>
                                                        <span
                                                            class="info-box-number text-center mb-0 badge badge-pill badge-info">{{ $donation->bags_num }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="post">
                                                    <h3>{{ trans('admin.notes') }}</h3>
                                                    <p>{{ $donation->details }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2" style="padding-left: 2%">
                                        <h3 class="text-primary"><i
                                                class="fas fa-hospital"></i> {{ trans('admin.hospital_name') }} </h3>
                                        <p class="text-muted"><span
                                                class="info-box-number text-center mb-0 badge badge-pill badge-success">{{ $donation->hospital_name }}</span>
                                        </p>
                                        <br>
                                        <div class="text-muted">
                                            <p class="text-sm">{{ trans('admin.hospital_address') }}
                                                <b class="d-block"><span
                                                        class="info-box-number text-center mb-0 badge badge-pill badge-warning">{{ $donation->hospital_address }}</span></b>
                                            </p>
                                            <p class="text-sm">{{ trans('admin.latitude') }}
                                                <b class="d-block">{{ $donation->latitude }}</b>
                                            </p>
                                            <p class="text-sm">{{ trans('admin.longitude') }}
                                                <b class="d-block">{{ $donation->longitude }}</b>
                                            </p>
                                        </div>

                                        <h5 class="mt-5 text-muted">{{ trans('admin.created_at') }}</h5>
                                        <p class="text-sm">
                                            <b class="d-block">{{ $donation->created_at }}</b>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>

        </div>
        <!-- row closed -->
@endsection
