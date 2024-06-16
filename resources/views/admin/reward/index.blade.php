@extends('admin.layout.index')
@section('contents')
<div class="col-12 ">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">View Complete Rewards</h5>
        </div>
        <table class="table" id="datatables-reponsive">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Reward Image</th>
                    <th>Reward Level</th>
                    <th>Reward Title</th>
                    <th>Reward User</th>
                    <th>Reward Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach (App\Models\Reward::complete() as $key => $reward)
                <tr>
                    <td>{{$key+1}}</td>
                    <td><img src="{{asset($reward->image)}}" height="100" width="100" alt=""></td>
                    <td>{{$reward->level}}</td>
                    <td>{{$reward->name}}</td>
                    <td>{{$reward->user->name}}</td>
                    <td><span class="badge badge-success">Complete</span></td>
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
                    <h5 class="modal-title mt-0" id="myModalLabel">Update Reward</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <input type="text" name="status" value="1">
                    <div class="form-group">
                        <label>Reward Image</label>
                        <input type="file" name="image" id="image"  class="form-control">
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
    $(document).ready(function(){
        $('.edit-btn').click(function(){
            let id = $(this).attr('id');
            console.log(id);
            $('#updateForm').attr('action','{{route('admin.reward.update','')}}' +'/'+id);
        });
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