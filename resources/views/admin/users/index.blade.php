@extends('admin.index')
@section('content')
    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="col-sm-1 col-md-2">
                        <a class="btn btn-primary" href="{{ route('users.create') }}">{{ trans('admin.add_user') }}</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive hoverable-table">
                        <table class="table table-hover" id="example1" data-page-length='50'
                               style=" text-align: center;">
                            <thead class="text-center">
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('admin.user_name') }}</th>
                                    <th>{{ trans('admin.user_email') }}</th>
                                    <th>{{ trans('admin.user_status') }}</th>
                                    <th>{{ trans('admin.user_role') }}</th>
                                    <th>{{ trans('admin.control') }}</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                            <?php
                            $i = 1;
                            ?>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if ($user->status == 'مفعل')
                                            <label class="badge badge-success">{{ $user->status }}</label>
                                        @else
                                            <label class="badge badge-danger">{{ $user->status }}</label>
                                        @endif
                                    </td>
                                    <td>
                                        @if (!empty($user->getRoleNames()))
                                            @foreach ($user->getRoleNames() as $v)
                                                <label class="badge badge-success">{{ $v }}</label>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary"
                                           title="تعديل"><i class="fas fa-edit"></i>
                                        </a>
                                        @if ($user->role_name !== 'superAdmin')
                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                               data-toggle="modal" href="#delete{{ $user->id }}" title="حذف">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        @endif
                                    </td>
                                </tr>

                                <!-- Delete -->
                                <div class="modal fade" id="delete{{ $user->id }}">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content modal-content-demo">
                                            <div class="modal-header">
                                                <h6 class="modal-title">{{trans('admin.delete_user')}}</h6>
                                                <button aria-label="Close" class="close" data-dismiss="modal"
                                                        type="button"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <form action="{{ route('users.destroy','test') }}" method="post">
                                                {{ method_field('delete') }}
                                                {{ csrf_field() }}
                                                <div class="modal-body">
                                                    <p>{{trans('admin.msg_delete')}}</p><br>
                                                    <input type="hidden" name="id" id="id" value="{{ $user->id }}">
                                                    <input class="form-control" name="name" id="name" type="text"
                                                           value="{{ $user->name }}" readonly>
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
        <!--/div-->
    </div>
@endsection
