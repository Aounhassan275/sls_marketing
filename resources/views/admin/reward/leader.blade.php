@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>Give Reward To Leader | {{App\Models\Setting::siteName()}}</h3>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{route('admin.reward.leader_store')}}" enctype="multipart/form-data">
                    @csrf
                     <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Amount</label>
                            <input type="text" min="1" name="amount" class="form-control" required>
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