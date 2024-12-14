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
    @include('home/header')
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