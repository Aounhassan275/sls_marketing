@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>Add Setting | {{App\Models\Setting::siteName()}}</h3>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Add Setting</h5>
                <a href="{{url('admin/add_autopool_for_package_1')}}" class="btn btn-primary">Autopool Package 1</a>
                <a href="{{url('admin/add_autopool_for_package_2')}}" class="btn btn-success">Autopool Package 2</a>
                <a href="{{url('admin/add_reward')}}" class="btn btn-warning">Add User Main Tree Reward On Package Level Reward</a>
                <a href="{{url('admin/make_leader_on_level_6')}}" class="btn btn-info">Add User Make Leader on Level 6</a>
                <a href="{{url('admin/add_reward_for_autopool_package_1')}}" class="btn btn-danger">Add Reward For Autopool Package 1</a>
                <a href="{{url('admin/add_reward_for_autopool_package_2')}}" class="btn btn-primary">Add Reward For Autopool Package 2</a>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('admin.setting.store')}}" enctype="multipart/form-data" >
                   @csrf
                   <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Setting Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Setting Name" required>
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Setting Value</label>
                            <input type="text" name="value" class="form-control" placeholder="Enter Setting Value" required>
                        </div>
                    </div>      
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="col-12 ">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">View Settings</h5>
        </div>
        <table class="table" id="datatables-reponsive">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Setting Name</th>
                    <th>Setting Value</th>
                    <th>Action</th>
                    {{-- <th>Action</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach (App\Models\Setting::all() as $key => $setting)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$setting->name}}</td>
                    <td>{{$setting->value}}</td>
                    <td>
                        <button onclick="editSetting('{{ @$setting->value }}','{{ @$setting->id }}')" class="btn btn-primary">Edit</button>
                        </td>
                    {{-- <td>
                        <form action="{{route('admin.setting.destroy',$setting->id)}}" method="POST">
                            @method('DELETE')
                            @csrf
                        <button class="btn btn-danger">Delete</button>
                        </form>
                    </td> --}}
                    
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
                    <h5 class="modal-title mt-0" id="myModalLabel">Update Setting</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Setting Value</label>
                        <input type="text" name="value" id="value"  class="form-control">
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
@endsection
@section('scripts')
<script>
    
    function editSetting(value,id)
    {
            $('#value').val(value);
            $('#id').val(id);
            $('#updateForm').attr('action','{{route('admin.setting.update','')}}' +'/'+id);
            $('#edit_modal').modal('show');
    }
</script>
<script>
    $(function() {
       // Select2
       $(".select2").each(function() {
           $(this)
               .wrap("<div class=\"position-relative\"></div>")
               .select2({
                   placeholder: "Select Category",
                   dropdownParent: $(this).parent()
               });
       })
   });
</script>
<script>
    $(function() {
        // Datatables Responsive
        $("#datatables-reponsive").DataTable({
            responsive: true
        });
    });
</script>
@endsection