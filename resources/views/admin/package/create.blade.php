@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>ADD PACKAGE | {{App\Models\Setting::siteName()}}</h3>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Add Package</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('admin.package.store')}}" >
                   @csrf
                   <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Package Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Package Name">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Package Price</label>
                            <input type="number" class="form-control" name="price"  placeholder="Package Price">
                        </div>
                   </div>
                   <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Package Direct Income</label>
                            <input type="number" class="form-control" name="direct_income"  placeholder="Package Direct Income" value="">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Package Product Income</label>
                            <input type="number" class="form-control" name="product_income"  placeholder="Package Product Income" value="">
                        </div>
                    </div>
                   <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Package Expense Income</label>
                            <input type="number"class="form-control" name="expense_income"  placeholder="Package Expense Income" value="">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Package Flash Income</label>
                            <input type="number" class="form-control" name="flash_income"  placeholder="Package Flash Income" value="">
                        </div>
                    </div>
                   <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Package Reward Income</label>
                            <input type="number"class="form-control" name="reward_income"  placeholder="Package Reward Income" value="">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Package Salary</label>
                            <input type="number" class="form-control" name="salary"  placeholder="Package Salary" value="">
                        </div>
                    </div>
                   <div class="row">
                        <div class="form-group col-4">
                            <label class="form-label">Package Withdraw Limit</label>
                            <input type="number" class="form-control" name="withdraw_limit"  placeholder="Package Withdraw Limit" value="">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Package Indirect Income</label>
                            <input type="number" class="form-control" name="indirect_income"  placeholder="Package Indirect Limit" value="">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Package Loss Income</label>
                            <input type="number" class="form-control" name="loss_income"  placeholder="Package Loss Limit" value="">
                        </div>
                   </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection