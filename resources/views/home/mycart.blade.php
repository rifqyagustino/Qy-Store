<!DOCTYPE html>
<html>

<head>
    @include('home/css')

    <style>
       
    </style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="index.html">
          <span>
            Qy Store
          </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav  ">
            <li class="nav-item ">
              <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
            </li>
           
          <div class="user_option">

          @if (Route::has('login'))

            @auth

            <a href="{{url('mycart')}}">
              <i class="fa fa-shopping-bag" aria-hidden="true"></i>
              {{$count}}
            </a>

            <form method="POST" action="{{ route('logout') }}">
                    @csrf

                   <input type="submit" value="logout" class="btn btn-light" style="margin-right:20px;">
            </form>


            @else


            <a href="{{url('/login')}}">
              <i class="fa fa-user" aria-hidden="true"></i>
              <span>
                Login
              </span>
            </a>

            <a href="{{url('/register')}}">
              <i class="fa fa-vcard" aria-hidden="true"></i>
              <span>
                Register
              </span>
            </a>

            @endauth

            @endif

           
            
           
          </div>
        </div>
      </nav>
    </header>
    <!-- end header section -->
 
  </div>

  <div class="container" style="margin-top: 50px;">
    <form action="{{url('confirm_order')}}" method="post">
        @csrf
        <div>
            <label for="receiverName">Receiver Name</label>
            <input type="text" name="receiverName" id="receiverName" value="{{Auth::user()->name}}" class="form-control">
        </div>

        <div>
            <label for="receiverAddress">Receiver Address</label>
            <textarea name="receiverAddress"  id="receiverAddress" class="form-control">{{Auth::user()->address}}</textarea>
        </div>
        <div>
            <label for="receiverPhone">Receiver Phone</label>
            <input type="text" name="receiverPhone" value="{{Auth::user()->phone}}" id="receiverPhone" class="form-control">
        </div>
        <br>
        <div>
            <input type="submit" value="Checkout" class="btn btn-primary">
        </div>
    </form>
  </div>
    
  <div>
    <table class="table d-flex justify-content-center" style="margin:50px; text-align:center;">
        <tr>
            <th>Product Title</th>
            <th>Price</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        <?php 
            $value = 0;
        ?>


        @foreach($cart as $c)
        <tr>
            <td>{{$c->product->title}}</td>
            <td>{{$c->product->price}}</td>
            <td><img src="/products/{{$c->product->image}}" width="150px" alt=""></td>
            <td><a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_cart', $c->id)}}">Delete</a></td>
        </tr>

        <?php 
            $value = $value + $c->product->price;
        ?>
        @endforeach
    </table>
  </div>

    <div class="d-flex justify-content-center">
        <h3>Total Price: Rp . {{$value}}</h3>    
    </div>
    <br>
  <!-- end contact section -->

  @include('home/footer')

  <!-- info section -->
  
  @include('admin.js')

</body>

</html>