@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>Update {{$product->name}} Product Information | {{App\Models\Setting::siteName()}}</h3>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Update {{$product->name}} Product Information</h5>
            </div>
            <div class="card-body">
                <form action="{{route('admin.product.update',$product->id)}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                   <div class="row">
                        <div class="form-group col-3">
                            <label class="form-label">Product Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Product Name" value="{{@$product->name}}">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Product Price</label>
                            <input type="number" name="price" class="form-control" required placeholder="Product Price" value="{{@$product->price}}">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Product Fake Price</label>
                            <input type="number" value="{{@$product->fake_price}}" name="fake_price" class="form-control" required placeholder="Product Fake Price">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Product Delivery Charges</label>
                            <input type="number" value="{{@$product->delivery_charges}}" name="delivery_charges" class="form-control" required placeholder="Product Delivery Charges">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Product Category</label>
                            <select name="category_id" id="category_id" class="form-control select2" required>
                                <option  disabled>Select</option>
                                @foreach(App\Models\Category::all() as $category)
                                <option @if($product->category_id == $category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>                        
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Product Brand</label>
                            <select name="brand_id" id="brand_id" class="form-control select2" required>
                                <option >Select</option>
                                <option value="{{@$product->brand_id}}" selected>{{@$product->brand->name}}</option>
                                
                            </select>                        
                        </div>
                   </div>
                   <div class="row">
                        <div class="form-group col-3">
                            <label class="form-label">Contact Number</label>
                            <input type="text" class="form-control" required name="phone"  placeholder="Contact Number" value="{{@$product->phone}}">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">City</label>
                            <input type="text" class="form-control" required name="city"  placeholder="City" value="{{@$product->city}}">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Is Stock</label>
                            <br>
                            <input type="radio" name="is_stock" value="1" @if($product->is_stock) checked @endif required> Yes
                            <input type="radio" name="is_stock" value="0" @if(!$product->is_stock ) checked @endif required> No
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">From Balance</label>
                            <br>
                            <input type="radio" name="from_balance" @if($product->from_balance) checked @endif  value="1" class="" required> Yes
                            <input type="radio" name="from_balance" @if(!$product->from_balance) checked @endif  value="0" checked class="" required> No
                        </div>
                    </div>
                    <div class="row">
                         <div class="form-group col-6">
                             <label class="form-label">Product Direct Income</label>
                             <input type="number" class="form-control" name="direct_income"  placeholder="Product Direct Income" value="{{$product->direct_income}}">
                         </div>
                          <div class="form-group col-6">
                              <label class="form-label">Product Income</label>
                              <input type="number" class="form-control" name="product_income"  placeholder="Product Product Income" value="{{$product->product_income}}">
                          </div>
                      </div>
                     <div class="row">
                          <div class="form-group col-6">
                              <label class="form-label">Product Expense Income</label>
                              <input type="number"class="form-control" name="expense_income"  placeholder="Product Expense Income" value="{{$product->expense_income}}">
                          </div>
                          <div class="form-group col-6">
                              <label class="form-label">Product Flash Income</label>
                              <input type="number" class="form-control" name="flash_income"  placeholder="Product Flash Income" value="{{$product->flash_income}}">
                          </div>
                      </div>
                     <div class="row">
                          <div class="form-group col-6">
                              <label class="form-label">Product Reward Income</label>
                              <input type="number"class="form-control" name="reward_income"  placeholder="Product Reward Income" value="{{$product->reward_income}}">
                          </div>
                          <div class="form-group col-6">
                              <label class="form-label">Product Salary</label>
                              <input type="number" class="form-control" name="salary"  placeholder="Product Salary" value="{{$product->salary}}">
                          </div>
                      </div>
                    <div class="row">
                         <div class="form-group col-6">
                             <label class="form-label">Product Personal Reward</label>
                             <input type="number" class="form-control" name="personal_reward"  placeholder="Product Personal Reward" value="{{$product->personal_reward}}">
                         </div>
                         <div class="form-group col-6">
                             <label class="form-label">Product Loss Income</label>
                             <input type="number" class="form-control" name="loss_income"  placeholder="Product Loss Limit" value="{{$product->loss_income}}">
                         </div>
                    </div>
                   <div class="row">
                        <div class="form-group col-12">
                            <label class="form-label">Product Description</label>
                            <textarea name="description" class="form-control" required id="" rows="2">{{$product->description}}</textarea>
                        </div>
                   </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="col-12 ">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">View Product Images</h5>
            <div class="row">
                <div class="col-md-12 text-right">
                    <a data-toggle="modal" data-target="#add_image_model" href="#" class="btn btn-success">Add New Image</a>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table id="datatables-buttons" class="table table-striped ">
                <thead>
                    <tr>
                        <th style="width:auto;">Sr#</th>
                        <th style="width:auto;">Product Image</th>
                        <th style="width:auto;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product->images as $key => $image)
                    <tr> 
                        <td>{{$key+1}}</td>
                        <td><img src="{{asset($image->image)}}" height="100" width="100" alt=""></td>
                        <td class="table-action">
                            {{-- <a href="{{url('poll/delete',$product->id)}}"><i class="align-middle" data-feather="trash"></i></a> --}}
                            <form action="{{route('admin.product_image.destroy',$image->id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn"><i class="align-middle" data-feather="trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="add_image_model" class="modal fade">
    <div class="modal-dialog">
        <form action="{{route('admin.product_image.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Add Product Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Product Image</label>
                        <input class="form-control" type="hidden"  name="product_id" value="{{$product->id}}">
                        <input class="form-control" type="file" name="image">
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
<div class="col-12 ">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Manage Product Level</h5>
            <a href="#" data-toggle="modal" data-target="#add_modal" class="btn btn-primary">Add Product Level</a>
        </div>
        <table class="table" id="datatables-reponsive">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product Level</th>
                    <th>Product Amount</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product->product_levels as $key => $level)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$level->level}}</td>
                    <td>PKR {{$level->amount}}</td>
                    <td>
                        <button data-toggle="modal" data-target="#edit_modal" level="{{$level->level}}" 
                            amount="{{$level->amount}}" id="{{$level->id}}" class="edit-btn btn btn-primary">Edit</button>
                    </td>
                    <td>
                        <form action="{{route('admin.product_level.destroy',$level->id)}}" method="POST">
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
                    <h5 class="modal-title mt-0" id="myModalLabel">Update Product Level</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <div class="form-group">
                        <label>Product Level</label>
                        <input type="text" name="level" id="level"  class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Product Amount</label>
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
        <form action="{{route('admin.product_level.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Add Product Level</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <div class="form-group">
                        <label>Product Level</label>
                        <input type="text" name="level"  class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Product Amount</label>
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
            let level = $(this).attr('level');
            let amount = $(this).attr('amount');
            let id = $(this).attr('id');
            $('#level').val(level);
            $('#amount').val(amount);
            $('#id').val(id);
            $('#updateForm').attr('action','{{route('admin.product_level.update','')}}' +'/'+id);
        });
    });
</script>
<script>
    $(document).ready(function(){
        let id;
        $('#category_id').on('change', function() {
            id = this.value;
            $.ajax({
                url: "{{route('admin.product.brands')}}",
                method: 'post',
                data: {
                    id: id,
                },
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                success: function(result){
                    $('#brand_id').empty();
                    $('#brand_id').append('<option disabled>Select Product Brands</option>');
                    for (i=0;i<result.length;i++){
                        $('#brand_id').append('<option value="'+result[i].id+'">'+result[i].name+'</option>');
                    }
                }
            });
        });
    
    });
</script>
@endsection