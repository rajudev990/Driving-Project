@extends('admin.layouts.app')

@section('title')
Add Package
@endsection


@section('content')



<section class="content pt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-cyan">
                    <div class="card-header">
                        <h3 class="card-title">Add Package</h3>
                        @can('view package')

                        <a href="{{ route('admin.packages.index') }}" class="btn btn-success float-right"><i class="fa fa-angle-left"> Back</i></a>

                        @endcan
                    </div>
                    <!-- /.card-header -->
                    <form id="quickForm" method="POST" action="{{ route('admin.packages.store')}}">
                        @csrf
                        @method('POST')

                        <div class="card-body row">
                            <div class="form-group col-lg-12">
                                <label>Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" value=" " class="form-control @error('name') is-invalid @enderror" placeholder="Enter Name" required>
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-lg-12">
                                <label> Total Class <span class="text-secondary text-sm">(Optional)</span></label>
                                <input type="number" name="total_class" value=" " class="form-control  @error('total_class') is-invalid @enderror" placeholder="Enter Class">
                                @error('total_class')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-lg-12">
                                <label>Status </label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Deactive</option>
                                </select>
                            </div>
                        </div>

                        <div class="card-footer d-flex justify-content-end">
                            <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Save</button>
                        </div>
                    </form>

                </div>


            </div>



        </div>

    </div>
</section>

@endsection