@extends('admin.layouts.app')

@section('title')
CourseComplete List
@endsection


@section('content')



<section class="content pt-4">
    <div class="container-fluid">
        <div class="row">


            <div class="col-md-12">

                <div class="card card-cyan">
                    <div class="card-header">
                        <h3 class="card-title">CourseComplete List</h3>
                        @can('create course')

                        <a href="{{ route('admin.course-complete.create') }}" class="btn btn-success float-right"><i class="fa fa-plus"></i> Add </a>

                        @endcan

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Select Student</th>
                                    <th>Select Admission</th>
                                    <th>Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $item)
                                @can('view course')
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->student?->name }}</td>
                                    <td>{{ $item->admission?->id }}</td>
                                    <td>
                                        @if($item->status == 1)
                                        <span class="badge bg-info me-1">Active</span>
                                        @else
                                        <span class="badge bg-danger me-1">Deactive</span>
                                        @endif


                                    </td>
                                    <td class="text-center">
                                        @can('edit course')
                                        <a href="{{ route('admin.course-complete.edit', $item->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                        @endcan
                                        @can('delete course')
                                        <form id="delete-form-{{ $item->id }}" action="{{ route('admin.course-complete.destroy', $item->id) }}" method="POST" style="display: none;">
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