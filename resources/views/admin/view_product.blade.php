<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style>
        h1{
            color: white;
        }

        .div_center{
            display: flex;
            justify-content: center;
        }

        td {
            color: white;
        }

        input[type="search"]{
            width: 300px;
            height: 40px;
            border-radius: 5px;
            margin-left: 20px;
            margin-right: 20px;
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
          <div>

          <div>
            <h1>Product</h1>
            <br>
          </div>

          <form action="{{url('product_search')}}" method="get">

          @csrf
            <div class="d-flex justify-content-center">
                <input type="search" name="search" class="form-control">

                <input type="submit" value="Search" class="btn btn-success">
                
            </div>
          </form>

          <br><br>

                <table class="table_design table table-striped">

                    <tr>
                        <th>No</th>
                        <th>Product Title</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>

                    @foreach($product as $products)
                   
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$products->title}}</td>
                        <td>{!!Str::limit($products->description, 50)!!}</td>
                        <td>{{$products->category}}</td>
                        <td>{{$products->price}}</td>
                        <td>{{$products->quantity}}</td>
                        <td>
                            <img height="120" width="120" src="products/{{$products->image}}" alt="image">
                        </td>

                        <td>
                            <a href="{{url('update_product', $products->id)}}"   class="btn btn-info">Edit</a>


                            <a href="{{url('delete_product', $products->id)}}"   class="btn btn-danger" onclick="confirmation(event)">Delete</a>

                        </td>
                        
                        
                    </tr>

                    @endforeach

                    

                </table>
                <br>

                <div class="div_center">
                {{$product->onEachSide(1)->links()}}
                </div>

            </div>
        </div>
      </div>
    </div>
    <!-- JavaScript files-->

   @include('admin.js')


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