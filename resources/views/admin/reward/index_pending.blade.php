@extends('admin.layout.index')
@section('contents')
<div class="col-12 ">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">View Pending Rewards</h5>
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
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach (App\Models\Reward::pending() as $key => $reward)
                <tr>
                    <td>{{$key+1}}</td>
                    <td><img src="{{asset($reward->image)}}" height="100" width="100" alt=""></td>
                    <td>{{$reward->level}}</td>
                    <td>{{$reward->name}}</td>
                    <td>{{$reward->user->name}}</td>
                    <td><span class="badge badge-danger">Pending</span></td>
                    
                    <td class="table-action">
                        <a href="{{route('admin.reward.edit',$reward->id)}}" class="edit-btn btn">
                            <i class="align-middle" data-feather="edit-2"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $('.edit-btn').click(function(){
            let id = $(this).attr('id');
            $('#id').val(id);
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