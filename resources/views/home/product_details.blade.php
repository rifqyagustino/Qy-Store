<!DOCTYPE html>
<html>

<head>
    @include('home/css')

    <style>
        .detail-box{
            padding: 15px;
        }
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
 


  <section class="shop_section layout_padding ">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Product   Details
        </h2>
      </div>
      <div class="row d-flex justify-content-center">


        <div class="col-md-12" >
          <div class="box ">
            
              <div class="d-flex justify-content-center">
                <img width="250px" style="margin:50px;" src="/products/{{$product->image}}" alt="">
              </div>
              <div class="detail-box">
                <h6>
                  {{ $product->title }}
                </h6>
                <h6>
                  Price
                  <span>
                    Rp. {{ $product->price }}
                  </span>
                </h6>
              </div>

              <div class="detail-box">
                <h6>
                  Category : {{ $product->category }}
                </h6>
                <h6>
                  Available Quantity
                  <span>
                    {{ $product->quantity }}
                  </span>
                </h6>
              </div>

              <div class="detail-box">
               
                  <p>
                    {{ $product->description }}
                    </p>
              </div>

          </div>
        </div>

        

        
        
      </div>
      
    </div>
  </section>



  @include('home/footer')

  <!-- info section -->
  
  

</body>

</html>