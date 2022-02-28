@extends('admin.index')
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div style="margin-bottom: 10px;">
                        <button type="button" class="modal-effect btn btn-success" data-effect="effect-scale"
                                data-toggle="modal" data-target="#add">
                            <i class="ti-plus"></i> {{trans('admin.add_post')}}
                        </button>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead class="text-center">
                            <tr>
                                <th>#</th>
                                <th>{{trans('admin.post_title')}}</th>
                                <th>{{trans('admin.post_content')}}</th>
                                <th>{{trans('admin.post_image')}}</th>
                                <th>{{trans('admin.category_name')}}</th>
                                <th>{{trans('admin.publish_date')}}</th>
                                <th>{{trans('admin.control')}}</th>
                            </tr>
                            </thead>
                            <tbody class="text-center">
                            <?php $i = 1; ?>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->content}}</td>
                                    <td><img class="img-circle mb-3" src="{{ URL::asset('Attachments/'.$post->title.'/'.$post->image) }}" alt="post image" style="width: 80px;height: 50px;"></td>
                                    <td>{{optional($post->category)->name}}</td>
                                    <td>{{$post->publish_date}}</td>
                                    <td>
                                        <a class="modal-effect btn btn-info" data-effect="effect-scale"
                                           data-toggle="modal" href="#edit{{ $post->id }}" title="تعديل">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a class="modal-effect btn btn-danger" data-effect="effect-scale"
                                           data-toggle="modal" href="#delete{{ $post->id }}" title="حذف">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>

                                <!-- Edit -->
                                <div class="modal fade" id="edit{{ $post->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"
                                                    id="exampleModalLabel">{{trans('admin.edit_post')}}</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('posts.update','test') }}" method="post" enctype="multipart/form-data">
                                                {{ method_field('patch') }}
                                                {{ csrf_field() }}

                                                <div class="col">
                                                    <input type="hidden" name="id" id="id" value="{{ $post->id }}">
                                                    <label for="exampleInputEmail1">{{trans('admin.post_title')}}</label>
                                                    <input type="text" class="form-control" id="title" name="title"
                                                           value="{{ $post->title }}" required>
                                                </div>
                                                <div class="col">
                                                    <label for="exampleInputEmail1">{{trans('admin.post_content')}}</label>
                                                    <textarea class="form-control" id="content" name="content" required>{{ $post->content }}</textarea>
                                                </div>
                                                <div class="col">
                                                    <label for="governorate_id">{{trans('admin.category_name')}}</label>
                                                    <select class="form-control select2 " name="category_id" id="category_id" >
                                                        <option value="" selected disabled>اختر القسم</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <label for="publish_date" class="control-label">{{trans('admin.publish_date')}}</label>
                                                    <input class="form-control fc-datepicker" id="publish_date" name="publish_date" value="{{ $post->publish_date }}"
                                                           placeholder="YYYY-MM-DD" type="date" required>
                                                </div>

                                                <label for="image" class="control-label col">{{trans('admin.post_image')}}</label>
                                                <div class="col" style="margin-top: 5px;margin-bottom: 5px;">
                                                    <input class="custom-file-input" name="image" id="image" type="file" accept=".jpg, .jpeg, .png, image/jpg, image/jpeg, image/png" data-height="70" required>
                                                    <label class="custom-file-label" for="customFile">اختيار الملف</label>
                                                    <p class="text-danger" style="margin-top: 5px">* صيغة المرفق : ( JPEG , JPG , PNG ) </p>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success">{{trans('admin.btn_confirm')}}</button>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('admin.btn_close')}}</button>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Edit -->

                                <!-- Delete -->
                                <div class="modal fade" id="delete{{ $post->id }}">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content modal-content-demo">
                                            <div class="modal-header">
                                                <h6 class="modal-title">{{trans('admin.delete_post')}}</h6>
                                                <button aria-label="Close" class="close" data-dismiss="modal"
                                                        type="button"><span
                                                        aria-hidden="true">&times;</span></button>
                                            </div>
                                            <form action="{{ route('posts.destroy','test') }}" method="post">
                                                {{ method_field('delete') }}
                                                {{ csrf_field() }}
                                                <div class="modal-body">
                                                    <p>{{trans('admin.msg_delete')}}</p><br>
                                                    <input type="hidden" name="id" id="id" value="{{ $post->id }}">
                                                    <input class="form-control" name="title" id="title" type="text"
                                                           value="{{ $post->title }}" readonly>
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

        <!-- Add New  -->
        <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">{{trans('admin.add_post')}}</h6>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="col">
                                <label for="exampleInputEmail1">{{trans('admin.post_title')}}</label>
                                <input type="text" class="form-control" id="title" name="title"
                                       value="{{old('title')}}" required>
                            </div>
                            <div class="col">
                                <label for="exampleInputEmail1">{{trans('admin.post_content')}}</label>
                                <textarea class="form-control" id="content" name="content" required></textarea>
                            </div>
                            <div class="col">
                                <label for="governorate_id">{{trans('admin.category_name')}}</label>
                                <select class="form-control select2 " name="category_id" id="category_id">
                                    <option value="" selected disabled>اختر القسم</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="publish_date" class="control-label">{{trans('admin.publish_date')}}</label>
                                <input class="form-control fc-datepicker" id="publish_date" name="publish_date"
                                       value="{{old('publish_date')}}" placeholder="YYYY-MM-DD" type="date" required>
                            </div>

                            <label for="image" class="control-label col">{{trans('admin.post_image')}}</label>
                            <div class="col" style="margin-top: 5px;margin-bottom: 5px;">
                                <input class="custom-file-input" name="image" id="image" type="file" accept=".jpg, .jpeg, .png, image/jpg, image/jpeg, image/png" data-height="70" required>
                                <label class="custom-file-label" for="customFile">اختيار الملف</label>
                                <p class="text-danger" style="margin-top: 5px">* صيغة المرفق : ( JPEG , JPG , PNG ) </p>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">{{trans('admin.btn_confirm')}}</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('admin.btn_close')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add New -->

    </div>
    <!-- row closed -->
@endsection
