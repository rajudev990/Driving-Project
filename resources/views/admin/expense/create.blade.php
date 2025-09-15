@extends('admin.layouts.app')

@section('title')
Add Expense
@endsection


@section('content')



<section class="content pt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-cyan">
                    <div class="card-header">
                        <h3 class="card-title">Add Expense</h3>
                        @can('view expense')

                        <a href="{{ route('admin.expense.index') }}" class="btn btn-success float-right"><i class="fa fa-angle-left"> Back</i></a>

                        @endcan
                    </div>
                    <!-- /.card-header -->
                    <form id="quickForm" method="POST" action="{{ route('admin.expense.store')}}">
                        @csrf
                        @method('POST')

                        <div class="card-body row">
                            <div class="form-group col-lg-6">
                                <label>Item <span class="text-danger">*</span></label>
                                <input type="text" name="item" value="{{ old('item') }}" class="form-control @error('item') is-invalid @enderror" placeholder="Enter item" required>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Date <span class="text-danger">*</span></label>
                                <input required type="date" name="date" value="{{ old('date') }}" class="form-control  @error('date') is-invalid @enderror">
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Amount <span class="text-danger">*</span></label>
                                <input type="number" step="0.01"  required type="number" name="amount" id="amount" value="{{ old('amount') }}" class="form-control  @error('amount') is-invalid @enderror">
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Status</label>
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

@section('script')
<script>
document.getElementById('amount').addEventListener('blur', function() {
    let val = this.value;
    if (val !== "") {
        // যদি user শুধু integer দেয় তাহলে .00 add হবে
        if (!val.includes('.')) {
            this.value = parseFloat(val).toFixed(2);
        } else {
            // যদি decimal দেয়, তবে maximum 2 digit পর্যন্ত format হবে
            this.value = parseFloat(val).toFixed(2);
        }
    }
});
</script>

@endsection