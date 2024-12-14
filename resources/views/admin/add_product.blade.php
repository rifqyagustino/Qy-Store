<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style>

        h1 {
            color: white;
        }

       
    </style>
  </head>
  <body>
   @include('admin.header')
   @include('admin.sidebar')
    
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h1>Add Product</h1>

            <br>
            <div>
                <form action="{{url('upload_product')}}" method='post' enctype='multipart/form-data'>

                @csrf
                    <div>
                        <label for="title">Product Title</label>
                        <input type="text" id='title' name='title' class='form-control' required>
                    </div>

                    <div>
                        <label for="description">Description</label>
                        <textarea name="description" id="description" required class='form-control'></textarea>
                    </div>

                    <div>
                        <label for="price">Price</label>
                        <input type="text" id='price' name='price' class='form-control' required>
                    </div>

                    <div>
                        <label for="quantity">Quantity</label>
                        <input type="number" id='quantity' name='quantity' class='form-control' required>
                    </div>

        

                    <div>
                        <label for="category">Product Category</label>
                        <select name="category" id="category" class='form-control' required>
                            <option>Select a Option</option>

                            @foreach($category as $category)
                                <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>    
                    </div>

                    <div>
                        <label for="image">Product image</label>
                        <input type="file" id='image' name='image' class='form-control' >
                    </div>
                    <br>
                    <div>
                        <input type="submit" class='btn btn-success' value="Add Product">
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