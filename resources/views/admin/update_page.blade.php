<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
  </head>
  <body>
   @include('admin.header')
   @include('admin.sidebar')
    
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h1>Update Product</h1>
            <br>
            
            <div>
                <form action="{{url('edit_product', $data->id)}}" method='post' enctype='multipart/form-data'>

                @csrf
                    <div>
                        <label for="title">Product Title</label>
                        <input type="text" id='title' name='title' class='form-control' value="{{$data->title}}">
                    </div>

                    <div>
                        <label for="description">Description</label>
                        <textarea name="description" id="description"  class='form-control'>{{$data->description}}</textarea>
                    </div>

                    <div>
                        <label for="price">Price</label>
                        <input type="text" id='price' name='price' value="{{$data->price}}" class='form-control' required>
                    </div>

                    <div>
                        <label for="quantity">Quantity</label>
                        <input type="number" id='quantity' value="{{$data->quantity}}" name='quantity' class='form-control' required>
                    </div>

        
                    <div>
                        <label for="category">Category</label>
                        <select name="category" id="category" class="form-control">
                            <option value="{{$data->category}}">{{$data->category}}</option>
                            @foreach($category as $categories)
                                <option value="{{$categories->category_name}}">{{$categories->category_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="image">Curent Image</label>
                        <img src="/products/{{$data->image}}" alt="image" width="150">
                    </div>

                    <div>
                        <label for="image">New Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    <br>
                    <div>
                        <input type="submit" class='btn btn-success' value="Update Product">
                    </div>

                
                </form>
            </div>



        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{asset('/admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('/admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('/admincss/vendor/chart.js/Chart.min.j')}}s"></script>
    <script src="{{asset('/admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('/admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('/admincss/js/front.js')}}"></script>
  </body>
</html>