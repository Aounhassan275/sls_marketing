@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>ADD PRODUCT | {{App\Models\Setting::siteName()}}</h3>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Add Product</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('admin.product.store')}}" enctype="multipart/form-data">
                   @csrf
                   <div class="row">
                        <div class="form-group col-3">
                            <label class="form-label">Product Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Product Name">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Product Price</label>
                            <input type="number" name="price" class="form-control" required placeholder="Product Price">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Product Fake Price</label>
                            <input type="number" name="fake_price" class="form-control" required placeholder="Product Fake Price">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Product Delivery Charges</label>
                            <input type="number" name="delivery_charges" class="form-control" required placeholder="Product Delivery Charges">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Product Category</label>
                            <select name="category_id" id="category_id" class="form-control select2" required>
                                <option selected disabled>Select</option>
                                @foreach(App\Models\Category::all() as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>                        
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Product Brands</label>
                            <select name="brand_id" id="brand_id" class="form-control select2" required>
                                <option selected disabled>Select</option>
                                
                            </select>                        
                        </div>
                   </div>
                   <div class="row">
                        <div class="form-group col-3">
                            <label class="form-label">Contact Number</label>
                            <input type="text" class="form-control" required name="phone"  placeholder="Contact Number" value="">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">City</label>
                            <input type="text" class="form-control" required name="city"  placeholder="City" value="">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Is Stock</label>
                            <br>
                            <input type="radio" name="is_stock" value="1" class="" required> Yes
                            <input type="radio" name="is_stock" value="0" checked class="" required> No
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">From Balance</label>
                            <br>
                            <input type="radio" name="from_balance" value="1" class="" required> Yes
                            <input type="radio" name="from_balance" value="0" checked class="" required> No
                        </div>
                    </div>
                    <div class="row">
                         <div class="form-group col-6">
                             <label class="form-label">Product Direct Income</label>
                             <input type="number" class="form-control" name="direct_income"  placeholder="Product Direct Income" required>
                         </div>
                          <div class="form-group col-6">
                              <label class="form-label">Product Income</label>
                              <input type="number" class="form-control" name="product_income"  placeholder="Product Product Income" required>
                          </div>
                      </div>
                     <div class="row">
                          <div class="form-group col-6">
                              <label class="form-label">Product Expense Income</label>
                              <input type="number"class="form-control" name="expense_income"  placeholder="Product Expense Income" required>
                          </div>
                          <div class="form-group col-6">
                              <label class="form-label">Product Flash Income</label>
                              <input type="number" class="form-control" name="flash_income"  placeholder="Product Flash Income" required>
                          </div>
                      </div>
                     <div class="row">
                          <div class="form-group col-6">
                              <label class="form-label">Product Reward Income</label>
                              <input type="number"class="form-control" name="reward_income"  placeholder="Product Reward Income" required>
                          </div>
                          <div class="form-group col-6">
                              <label class="form-label">Product Salary</label>
                              <input type="number" class="form-control" name="salary"  placeholder="Product Salary" required>
                          </div>
                      </div>
                    <div class="row">
                         <div class="form-group col-6">
                             <label class="form-label">Product Personal Reward</label>
                             <input type="number" class="form-control" name="personal_reward"  placeholder="Product Personal Reward" required>
                         </div>
                         <div class="form-group col-6">
                             <label class="form-label">Product Loss Income</label>
                             <input type="number" class="form-control" name="loss_income"  placeholder="Product Loss Income" required>
                         </div>
                    </div>
                   <div class="row">
                        <div class="form-group col-12">
                            <label class="form-label">Product Images</label>
                            <input type="file" name="images[]" class="form-control" multiple  required>
                        </div>
                        <div class="form-group col-12">
                            <label class="form-label">Product Description</label>
                            <textarea name="description" class="form-control" required id="" rows="2"></textarea>
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