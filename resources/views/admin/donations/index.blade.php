@extends('admin.index')
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <!-- This Form For Filter -->
                    <div style="margin-bottom: 10px;float: left">
                        <form action="{{ route('donations.blood-types-filter') }}" method="POST" class="d-inline-block">
                            {{ csrf_field() }}
                            <select class="custom-select mr-sm-2" name="id" data-style="btn-info" onchange="this.form.submit()">
                                <option value="" selected disabled>بحث بفصيله الدم</option>
                                @foreach($blood_types as $blood_type)
                                    <option value="{{ $blood_type->id }}">{{ $blood_type->name }}</option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                    <div style="margin-bottom: 10px;float: right">
                        <form action="donations-filter" method="GET" class="d-inline-block">
                            <div class="row">
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <input type="text" name="keyword" class="form-control input-lg" placeholder="بحث بالاسم / رقم الهاتف / الايميل">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-block">بحث</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- This Form For Filter -->
                    @if(count($donations))
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead class="text-center">
                            <tr>
                                <th>#</th>
                                <th>{{trans('admin.patient_name')}}</th>
                                <th>{{trans('admin.patient_age')}}</th>
                                <th>{{trans('admin.bags_num')}}</th>
                                <th>{{trans('admin.hospital_name')}}</th>
                                <th>{{trans('admin.patient_phone')}}</th>
                                <th>{{trans('admin.patient_city')}}</th>
                                <th>{{trans('admin.patient_blood_type')}}</th>
                                <th>{{trans('admin.patient_show')}}</th>
                                <th>{{trans('admin.control')}}</th>
                            </tr>
                            </thead>
                            <tbody class="text-center">
                            <?php
                            if (isset($filter)){
                                $donations = $filter;
                            }else{
                                $donations = $donations;
                            }
                                $i = 1;
                            ?>
                            @foreach($donations as $donation)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$donation->patient_name}}</td>
                                    <td>{{$donation->patient_age}}</td>
                                    <td>{{$donation->bags_num}}</td>
                                    <td>{{$donation->hospital_name}}</td>
                                    <td>{{$donation->patient_phone}}</td>
                                    <td>{{optional($donation->city)->name}}</td>
                                    <td>{{optional($donation->bloodType)->name}}</td>
                                    <td>
                                        <a type="button" class="btn btn-primary" href="{{ adminUrl('donations/'.$donation->id) }}">
                                            <i class="ti-plus"></i>show
                                        </a>
                                    </td>
                                    <td>
                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                           data-toggle="modal" href="#delete{{ $donation->id }}" title="حذف"><i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>

                                <!-- Delete -->
                                <div class="modal fade" id="delete{{ $donation->id }}">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content modal-content-demo">
                                            <div class="modal-header">
                                                <h6 class="modal-title">{{trans('admin.delete_donation')}}</h6>
                                                <button aria-label="Close" class="close" data-dismiss="modal"
                                                        type="button"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <form action="{{ route('donations.destroy','test') }}" method="post">
                                                {{ method_field('delete') }}
                                                {{ csrf_field() }}
                                                <div class="modal-body">
                                                    <p>{{trans('admin.msg_delete')}}</p><br>
                                                    <input type="hidden" name="id" id="id" value="{{ $donation->id }}">
                                                    <input class="form-control" name="patient_name" id="patient_name" type="text"
                                                           value="{{ $donation->patient_name }}" readonly>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{trans('admin.btn_close')}}</button>
                                                    <button type="submit"
                                                            class="btn btn-danger">{{trans('admin.btn_confirm')}}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Delete -->

                            @endforeach
                            </tbody>
                        </table>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-bordered p-0">
                                <thead class="text-center">
                                    <tr>
                                        <th>#</th>
                                        <th>{{trans('admin.patient_name')}}</th>
                                        <th>{{trans('admin.patient_age')}}</th>
                                        <th>{{trans('admin.bags_num')}}</th>
                                        <th>{{trans('admin.hospital_name')}}</th>
                                        <th>{{trans('admin.patient_phone')}}</th>
                                        <th>{{trans('admin.patient_city')}}</th>
                                        <th>{{trans('admin.patient_blood_type')}}</th>
                                        <th>{{trans('admin.contact_show')}}</th>
                                        <th>{{trans('admin.control')}}</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <tr>
                                        <td colspan="10" class="text-center text-danger">لايوجد اي طلبات</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
    <!-- row closed -->
@endsection
