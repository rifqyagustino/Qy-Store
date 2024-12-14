<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style>
        input[type='text']{
            width: 400px;
            height: 50px;
        }

        .form_design{
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 30px;
        }

        h1{
            text-align: center;
            color: white;
        }

        .tombol-submit{
            display: flex;
            justify-content: center;
            align-items: center;
        }

        table, th, td {
          border: 1px solid white;
          /* border-collapse: collapse; */
        }

        .table_design{
          width: 100%;
          color: white;
          margin-top: 50px;
          margin: auto;
          text-align: center;
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
          <h1>Add Category</h1>
          <div class='form_design'>

          <form action="{{ url('add_category') }}" method="post">
                        @csrf
                        <div>
                            <!-- Input Kategori -->
                            <input type="text" name="category" placeholder="Enter Category Name" value="{{ old('category') }}">

                            <!-- Tampilkan Pesan Error -->
                            @if($errors->has('category'))
                                <div class="alert alert-danger mt-2">
                                    {{ $errors->first('category') }}
                                </div>
                            @endif

                            <!-- Tampilkan Pesan Sukses -->
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <!-- Tombol Submit -->
                             <div class="tombol-submit">
                              <input type="submit" value="Add Category" class="btn btn-primary mt-3">
                            </div>
                        </div>
                    </form>

           
           </div>

            <div>

              <table class="table_design table table-striped">
           
                <tr>
                  <th>No</th>
                  <th>Name Category</th>
                  <th>Action</th>
                </tr>
          

                @foreach($data as $data)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{$data->category_name}}</td>
                  <td>
                    <a class="btn btn-info" href="{{url('edit_category', $data->id)}}">Edit</a>
                    <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_category', $data->id)}}">Delete</a>
                  
                  </td>
                </tr>

                @endforeach
             
              </table>

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