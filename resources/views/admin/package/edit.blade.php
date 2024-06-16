@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3> EDIT PACKAGE | {{App\Models\Setting::siteName()}}</h3>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Edit Package</h5>
            </div>
            <div class="card-body">
                <form action="{{route('admin.package.update',$package->id)}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                   <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Package Name</label>
                            <input type="name" name="name" class="form-control" placeholder="Package Name" value="{{$package->name}}">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Package Price</label>
                            <input type="number" class="form-control" name="price"  placeholder="Package Price" value="{{$package->price}}">
                        </div>
                   </div>
                   <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Package Direct Income</label>
                            <input type="number" class="form-control" name="direct_income"  placeholder="Package Direct Income" value="{{$package->direct_income}}">
                        </div>
                         <div class="form-group col-6">
                             <label class="form-label">Package Product Income</label>
                             <input type="number" class="form-control" name="product_income"  placeholder="Package Product Income" value="{{$package->product_income}}">
                         </div>
                     </div>
                    <div class="row">
                         <div class="form-group col-6">
                             <label class="form-label">Package Expense Income</label>
                             <input type="number"class="form-control" name="expense_income"  placeholder="Package Expense Income" value="{{$package->expense_income}}">
                         </div>
                         <div class="form-group col-6">
                             <label class="form-label">Package Flash Income</label>
                             <input type="number" class="form-control" name="flash_income"  placeholder="Package Flash Income" value="{{$package->flash_income}}">
                         </div>
                     </div>
                    <div class="row">
                         <div class="form-group col-6">
                             <label class="form-label">Package Reward Income</label>
                             <input type="number"class="form-control" name="reward_income"  placeholder="Package Reward Income" value="{{$package->reward_income}}">
                         </div>
                         <div class="form-group col-6">
                             <label class="form-label">Package Salary</label>
                             <input type="number" class="form-control" name="salary"  placeholder="Package Salary" value="{{$package->salary}}">
                         </div>
                     </div>
                   <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Package Withdraw Limit</label>
                            <input type="number" class="form-control" name="withdraw_limit"  placeholder="Package Withdraw Limit" value="{{$package->withdraw_limit}}">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Package Indirect Income</label>
                            <input type="number" class="form-control" name="indirect_income"  placeholder="Package Indirect Limit" value="{{$package->indirect_income}}">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Package Loss Income</label>
                            <input type="number" class="form-control" name="loss_income"  placeholder="Package Loss Limit" value="{{$package->loss_income}}">
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

<div class="col-12 ">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Manage Package Level</h5>
            <a href="#" data-toggle="modal" data-target="#add_modal" class="btn btn-primary">Add Package Level</a>
        </div>
        <table class="table" id="datatables-reponsive">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Package Level</th>
                    <th>Package Amount</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($package->package_levels as $key => $level)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$level->level}}</td>
                    <td>PKR {{$level->amount}}</td>
                    <td>
                        <button data-toggle="modal" data-target="#edit_modal" level="{{$level->level}}" 
                            amount="{{$level->amount}}" id="{{$level->id}}" class="edit-btn btn btn-primary">Edit</button>
                    </td>
                    <td>
                        <form action="{{route('admin.package_level.destroy',$level->id)}}" method="POST">
                            @method('DELETE')
                            @csrf
                        <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div id="edit_modal" class="modal fade">
    <div class="modal-dialog">
        <form id="updateForm" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Update Package Level</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="package_id" value="{{$package->id}}">
                    <div class="form-group">
                        <label>Package Level</label>
                        <input type="text" name="level" id="level"  class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Package Amount</label>
                        <input type="text" name="amount" id="amount" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div id="add_modal" class="modal fade">
    <div class="modal-dialog">
        <form action="{{route('admin.package_level.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Add Package Level</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="package_id" value="{{$package->id}}">
                    <div class="form-group">
                        <label>Package Level</label>
                        <input type="text" name="level"  class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Package Amount</label>
                        <input type="text" name="amount" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Add</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="col-12 ">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Manage Package Level Reward</h5>
            <a href="#" data-toggle="modal" data-target="#add_reward_modal" class="btn btn-primary">Add Package Level Reward</a>
        </div>
        <table class="table" id="datatables-reponsive">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Package Level</th>
                    <th>Package Reward Title</th>
                    <th>Package Reward Type</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($package->package_level_rewards as $key => $level)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$level->level}}</td>
                    <td>{{$level->title}}</td>
                    <td>@if($level->type == 1)Normal Package @elseif($level->type == 2) AutoPool Package 1 @elseif($level->type == 3) AutoPool Package 2 @endif</td>
                    <td>
                        <button data-toggle="modal" data-target="#edit_reward_modal" level="{{$level->level}}" 
                            title="{{$level->title}}" type="{{$level->type}}" id="{{$level->id}}" class="edit-reward-btn btn btn-primary">Edit</button>
                    </td>
                    <td>
                        <form action="{{route('admin.package_level_reward.destroy',$level->id)}}" method="POST">
                            @method('DELETE')
                            @csrf
                        <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div id="edit_reward_modal" class="modal fade">
    <div class="modal-dialog">
        <form id="updateFormForReward" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Update Package Level Reward</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="package_id" value="{{$package->id}}">
                    <div class="form-group">
                        <label>Level</label>
                        <input type="text" name="level" id="level_reward"  class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Level Reward</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Package Level Reward Type</label>
                        <select name="type" class="form-control" id="type">
                            <option >Select</option>
                            <option value="1">Normal Package</option>
                            <option value="2">AutoPool Package 1</option>
                            <option value="3">AutoPool Package 2</option>
                        </select>                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div id="add_reward_modal" class="modal fade">
    <div class="modal-dialog">
        <form action="{{route('admin.package_level_reward.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Add Package Level </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="package_id" value="{{$package->id}}">
                    <div class="form-group">
                        <label>Package Level</label>
                        <input type="text" name="level"  class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Package Level Reward</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Package Level Reward Type</label>
                        <select name="type" class="form-control" required>
                            <option >Select</option>
                            <option value="1">Normal Package</option>
                            <option value="2">AutoPool Package 1</option>
                            <option value="3">AutoPool Package 2</option>
                        </select>     
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Add</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        
        $('.edit-btn').click(function(){
            let level = $(this).attr('level');
            let amount = $(this).attr('amount');
            let id = $(this).attr('id');
            $('#level').val(level);
            $('#amount').val(amount);
            $('#id').val(id);
            $('#updateForm').attr('action','{{route('admin.package_level.update','')}}' +'/'+id);
        });
        $('.edit-reward-btn').click(function(){
            let level_reward = $(this).attr('level');
            let title = $(this).attr('title');
            let type = $(this).attr('type');
            let id = $(this).attr('id');
            $('#type').val(type);
            $('#level_reward').val(level_reward);
            $('#title').val(title);
            $('#id').val(id);
            $('#updateFormForReward').attr('action','{{route('admin.package_level_reward.update','')}}' +'/'+id);
        });
    });
</script>
@endsection