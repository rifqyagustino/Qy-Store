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
    @include('home/header')
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