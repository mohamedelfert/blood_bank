@extends('admin.index')
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div style="margin-bottom: 10px;">
                        <a type="button" class="btn btn-success" href="{{ route('clients.create') }}">
                            <i class="ti-plus"></i> {{trans('admin.add_client')}}
                        </a>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead class="text-center">
                                <tr>
                                    <th>#</th>
                                    <th>{{trans('admin.client_name')}}</th>
                                    <th>{{trans('admin.client_email')}}</th>
                                    <th>{{trans('admin.client_phone')}}</th>
                                    <th>{{trans('admin.client_d_o_b')}}</th>
                                    <th>{{trans('admin.client_blood_type')}}</th>
                                    <th>{{trans('admin.client_last_donation_date')}}</th>
                                    <th>{{trans('admin.client_city')}}</th>
                                    <th>{{trans('admin.client_governorate')}}</th>
                                    <th>{{trans('admin.client_status')}}</th>
                                    <th>{{trans('admin.control')}}</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                            <?php $i = 1; ?>
                            @foreach($clients as $client)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$client->name}}</td>
                                    <td>{{$client->email}}</td>
                                    <td>{{$client->phone}}</td>
                                    <td>{{$client->d_o_b}}</td>
                                    <td>{{$client->bloodType->name}}</td>
                                    <td>{{$client->last_donation_date}}</td>
                                    <td>{{$client->city->name}}</td>
                                    <td>{{$client->city->governorate->name}}</td>
                                    <td>
                                        @if ($client->is_active == 1)
                                            <span class="label text-success d-flex">نشط</span>
                                        @else
                                            <span class="label text-success d-flex">غير نشط</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-info" href="{{ url('clients/'.$client->id.'/edit') }}" title="تعديل">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a class="modal-effect btn btn-danger" data-effect="effect-scale"
                                           data-toggle="modal" href="#delete{{ $client->id }}" title="حذف">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>

                                <!-- Delete -->
                                <div class="modal fade" id="delete{{ $client->id }}">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content modal-content-demo">
                                            <div class="modal-header">
                                                <h6 class="modal-title">{{trans('admin.delete_client')}}</h6>
                                                <button aria-label="Close" class="close" data-dismiss="modal"
                                                        type="button"><span
                                                        aria-hidden="true">&times;</span></button>
                                            </div>
                                            <form action="{{ route('clients.destroy','test') }}" method="post">
                                                {{ method_field('delete') }}
                                                {{ csrf_field() }}
                                                <div class="modal-body">
                                                    <p>{{trans('admin.msg_delete')}}</p><br>
                                                    <input type="hidden" name="id" id="id" value="{{ $client->id }}">
                                                    <input class="form-control" name="name" id="name" type="text"
                                                           value="{{ $client->name }}" readonly>
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
                </div>
            </div>
        </div>

    </div>
    <!-- row closed -->
@endsection
