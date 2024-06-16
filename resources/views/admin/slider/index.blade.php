@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>Add Slider | {{App\Models\Setting::siteName()}}</h3>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Add Slider</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('admin.slider.store')}}" enctype="multipart/form-data" >
                   @csrf
                   <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Slider Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Enter Slider Name" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label">Slider Image</label>
                            <input type="file" name="image" class="form-control" placeholder="" required>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="form-label">Slider Background Color</label>
                            <input type="color" class="form-control form-control-color" name="color" id="exampleColorInput" value="#563d7c" title="Choose your color">
                        </div>
                        <div class="form-group col-md-12">
                            <label class="form-label">Slider Description</label>
                            <textarea name="description" class="form-control" required></textarea>
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
            <h5 class="card-title">View Sliders</h5>
        </div>
        <table class="table" id="datatables-reponsive">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Slider Image</th>
                    <th>Slider Title</th>
                    <th>Slider Background Color</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach (App\Models\Slider::all() as $key => $slider)
                <tr>
                    <td>{{$key+1}}</td>
                    <td><img src="{{asset($slider->image)}}" height="100" width="100" alt=""></td>
                    <td>{{$slider->title}}</td>
                    <td>{{$slider->color}}</td>
                    <td>
                        <button data-toggle="modal" data-target="#edit_modal" title="{{$slider->title}}" 
                            color="{{$slider->color}}"  description="{{$slider->description}}"  id="{{$slider->id}}" class="edit-btn btn btn-primary">Edit</button>
                        </td>
                    <td>
                        <form action="{{route('admin.slider.destroy',$slider->id)}}" method="POST">
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
                    <h5 class="modal-title mt-0" id="myModalLabel">Update Slider</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Slider Title</label>
                        <input type="text" name="title" id="title"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Slider Image</label>
                        <input type="file" name="image" id="image"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label >Slider Background Color</label>
                        <input type="color" class="form-control form-control-color" name="color" id="color" title="Choose your color">
                    </div>
                    <div class="form-group">
                        <label>Slider Description</label>
                        <textarea name="description" id="description" class="form-control"></textarea>
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
    $(document).ready(function(){
        $('.edit-btn').click(function(){
            let title = $(this).attr('title');
            let description = $(this).attr('description');
            let color = $(this).attr('color');
            let id = $(this).attr('id');
            $('#title').val(title);
            $('#color').val(color);
            $('#description').val(description);
            $('#id').val(id);
            $('#updateForm').attr('action','{{route('admin.slider.update','')}}' +'/'+id);
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