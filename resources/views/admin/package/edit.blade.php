@extends('admin.layouts.app')

@section('title')
Update Package
@endsection


@section('content')



<section class="content pt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-cyan">
                    <div class="card-header">
                        <h3 class="card-title">Update Package</h3>
                        @can('view package')

                        <a href="{{ route('admin.packages.index') }}" class="btn btn-success float-right"><i class="fa fa-angle-left"> Back</i></a>

                        @endcan
                    </div>
                    <!-- /.card-header -->
                    <form id="quickForm" method="POST" action="{{ route('admin.packages.update',$data->id)}}">
                        @csrf
                        @method('PUT')

                        <div class="card-body row">
                            <div class="form-group col-lg-12">
                                <label>Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" value="{{$data->name}}" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Name" required>
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-lg-12">
                                <label> Total Class <span class="text-secondary text-sm">(Optional)</span></label>
                                <input type="number" name="total_class" value="{{$data->total_class}}" class="form-control  @error('total_class') is-invalid @enderror" placeholder="Enter Class">
                                @error('total_class')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-lg-12">
                                <label>Status <span class="text-danger">*</span></label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1" {{$data->status ==1 ? 'selected' : ''}}>Active</option>
                                    <option value="0" {{$data->status ==0 ? 'selected' : ''}}>Deactive</option>
                                </select>
                            </div>
                        </div>

                        <div class="card-footer d-flex justify-content-end">
                            <button type="submit" class="btn btn-info"><i class="fa fa-edit"></i> Update</button>
                        </div>
                    </form>

                </div>


            </div>



        </div>

    </div>
</section>

@endsection