@extends('admin.layouts.app')

@section('title')
Student List
@endsection


@section('content')

<section class="content pt-4">
    <div class="container-fluid">
        <div class="row">


            <div class="col-md-12">

                <div class="card card-cyan">
                    <div class="card-header">
                        <h3 class="card-title">Student List</h3>
                        @can('create student')

                        <a href="{{ route('admin.students.create') }}" class="btn btn-success float-right"><i class="fa fa-plus"></i> Add </a>

                        @endcan

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $item)
                                @can('view student')
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>
                                        @if($item->image)
                                        <img src="{{ Storage::url($item->image) }}" alt="empty image" width="70px" height="50px" >
                                        @else
                                        <span class="text-danger">Empty Image</span>
                                        @endif
                                    </td>

                                    <td>
                                        @if($item->status == 1)
                                        <span class="badge bg-info me-1">Active</span>
                                        @else
                                        <span class="badge bg-danger me-1">Deactive</span>
                                        @endif


                                    </td>
                                    <td class="text-center">
                                        @can('edit student')
                                        <a href="{{ route('admin.students.edit', $item->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                        @endcan
                                        @can('delete student')
                                        <form id="delete-form-{{ $item->id }}" action="{{ route('admin.students.destroy', $item->id) }}" method="POST" style="display: none;">
                                            @csrf @method('DELETE')
                                        </form>
                                        <a href="#" class="btn btn-sm btn-danger delete-btn" data-id="{{ $item->id }}"><i class="fa fa-trash"></i></a>
                                        @endcan
                                    </td>
                                </tr>
                                @endcan
                                @endforeach



                            </tbody>

                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>

            </div>



        </div>

    </div>
</section>

@endsection