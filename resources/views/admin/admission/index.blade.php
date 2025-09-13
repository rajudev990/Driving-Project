@extends('admin.layouts.app')

@section('title')
Admission List
@endsection


@section('content')



<section class="content pt-4">
    <div class="container-fluid">
        <div class="row">


            <div class="col-md-12">

                <div class="card card-cyan">
                    <div class="card-header">
                        <h3 class="card-title">Admission List</h3>
                        @can('create package')

                        <a href="{{ route('admin.admissions.create') }}" class="btn btn-success float-right"><i class="fa fa-plus"></i> Add </a>

                        @endcan

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Student Name</th>
                                    <th>Package Name</th>
                                    <th>Course Fee</th>
                                    <th>Paid</th>
                                    <th>Due</th>
                                    <th>Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $item)
                                @can('view package')
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->student?->name }}</td>
                                    <td>{{ $item->package?->name }}</td>
                                    <td>{{ $item->course_fee }}</td>
                                    <td>{{ $item->paid }}</td>
                                    <td>{{ $item->due }}</td>
                                    <td>
                                        @if($item->status == 1)
                                        <span class="badge bg-info me-1">Active</span>
                                        @else
                                        <span class="badge bg-danger me-1">Deactive</span>
                                        @endif


                                    </td>
                                    <td class="text-center">
                                        @can('edit package')
                                        <a href="{{ route('admin.admissions.edit', $item->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                        @endcan
                                        @can('delete package')
                                        <form id="delete-form-{{ $item->id }}" action="{{ route('admin.admissions.destroy', $item->id) }}" method="POST" style="display: none;">
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