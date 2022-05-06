<div class="leftSidebar">
<nav class="nav flex-column">
  <a class="nav-link active" name="" aria-current="page" href="{{url('/1');}}">Car</a>
  <a class="nav-link" href="{{url('/2');}}">Phone</a>
  <a class="nav-link" href="{{url('/3');}}">Water</a>
  <a class="nav-link" href="{{url('/4');}}">Food</a>
</nav>
</div>


@isset($product)
@foreach ($product as $prod)
    <div class="card h-100 card-body ">
        {{ $prod_t=$prod['id'] }}
        <a class="nav-link" href="{{url("/product_page/$prod_t")}}"><img src="{{ $product[($prod['id'])-1]->img }}" class="card-img-top" alt="..."></a>
        <h5 class="card-title">{{ $product[($prod['id'])-1]->name }}</h5>
        <p class="card-text">{{ $product[($prod['id'])-1]->desc }}</p>
    </div>
@endforeach
@endisset

@isset($product_id)
    <div class="card h-100 card-body  >
    {{var_dump($product_id)}}
    </div>
@endisset
