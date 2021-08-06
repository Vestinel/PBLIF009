@extends('layouts.app')


@section('title')
    Cart
@endsection

@push('addon-style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

@endpush


@section('content')
<div class="page-content page-cart">
      <section
        class="store-breadcrumbs"
        data-aos="fade-down"
        data-aos-delay="100"
      >
        <div class="container">
          <div class="row">
            <div class="col-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">
                    Cart
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>
      <section class="store-cart">
        <div class="container">
          <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-12 table-responsive">
              <table
                class="table table-borderless table-cart"
                aria-describedby="Cart"
              >
                <thead>
                  <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Total</th>
                    <th></th>
                    <th scope="col">Menu</th>
                    
                  </tr>
                </thead>
                <tbody>
                  @php $totalProduct = 0 @endphp
                  @foreach ($carts as $cart)
                  <tr>
                    <td style="width: 20%;">
                      @if ($cart->product->galleries)
                      <img
                          src="{{ Storage::url($cart->product->galleries->first()->photos) }}"
                          alt=""
                          class="cart-image"
                      />
                      @endif
                    </td>
                    <td style="width: 35%;">
                      <div class="product-title">{{ $cart->product->name }}</div>
                      <div class="product-subtitle">{{ $cart->product->user->store_name }}</div>
                    </td>
                    <td style="width: 20%;">
                      {{-- <div class="product-title">{{ $cart->product->price }}</div> --}}
                      {{-- <div class="product-subtitle">Rupiah</div> --}}

                      <div class="input-group number-spinner mt-3">
                        <input id="total_{{ $cart->id }}" cart="{{ $cart->id }}" type="number" class="form-control text-center" value="{{ $cart->total }}" min="1" max="40">
                      </div>
                    </td>
                    <td style="width: 15%;">
                    </td>
                    <td style="width: 20%;">
                      <form action="{{ route('cart-delete', $cart->id ) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-remove-cart">
                            Remove
                        </button>
                      </form>
                    </td>
                  </tr>
                  @php $totalProduct += $cart->total @endphp
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="row" data-aos="fade-up" data-aos-delay="150">
            <div class="col-12">
              <hr />
            </div>
            <div class="col-12">
              <h2 class="mb-4">Date Details</h2>
            </div>
          </div>
          <form action="{{ route('checkout') }}" id="locations" enctype="multipart/form-data" method="POST">
            @csrf          

            <input type="hidden" name="total_product" id="total_product" value={{  $totalProduct }}>
            <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="datepicker_borrow">Borrow Date</label>
                  
                  <div name="datepicker_borrow" id="datepicker_borrow" class="input-group date" data-date-format="yyyy-mm-dd">
                      <input name="borrow_date" class="form-control" type="text" readonly />
                      <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                  </div>
                  
                </div>
              </div>
              
              <div class="col-md-6">
                <div class="form-group">
                  <label for="datepicker_return">Return Date</label>
                  <div name="datepicker_return" id="datepicker_return" class="input-group date" data-date-format="yyyy-mm-dd">
                      <input name="return_date"class="form-control" type="text" readonly />
                      <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                  </div>
                </div>
              </div>
            </div>



            
            <div class="row" data-aos="fade-up" data-aos-delay="150">
              <div class="col-12">
                <hr/>
              </div>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="200">
              
              <div class="col-12 col-md-12 text-center">
                <div class="form-group">
                    <button
                      type="submit"
                      class="btn btn-success px-4 btn-block"
                    >
                      Checkout Now
                    </button>
                  </div>
                </div>
              </div>
              
            </div>
          </form>
        </div>
      </section>
    </div>
@endsection

@push('addon-scripts')
    <script src="/vendor/vue/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>


    <script src="https://unpkg.com/vue-toasted"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    

  

    <script>
    $(function() {
        var tId;
        $('input[type="number"]').change(function(){
            clearTimeout(tId);
            var cart_id = $(this).attr("cart");
            var cart_total = $(this).val();

            tId=setTimeout(function(){                 
                axios.post('{{ route('api-total-cart') }}', {
                    id: cart_id,
                    user_id: {{ Auth::user()->id }},	
                    total: cart_total,
                })
                .then(function (response) {
                  var total_semua = 0;

                  $('input[type=number]').each(function(){
                     if ($('input[type="number"]').attr('cart')){
                        total_semua = total_semua + parseInt($(this).val());
                     }
                  });

                  $('#total_product').val(total_semua);
                })
                .catch(function (error) {
                  console.log(error);
                });



                
            },750);

            
        });
    });

    $(function () {
      $("#datepicker_borrow").datepicker({ 
            format: 'yyyy-mm-dd',
            autoclose: true, 
            todayHighlight: true,
      }).datepicker('update', new Date());

      $("#datepicker_return").datepicker({ 
            format: 'yyyy-mm-dd',
            autoclose: true,
      }).datepicker('update', new Date());
    });
    </script>

    {{-- <>
      var locations = new Vue({
        el: "#locations",
        mounted() {
          AOS.init();
          this.getProvincesData();
        },
        data: {
          provinces: null,
          regencies: null,
          provinces_id : null,
          regencies_id : null,
        },
        methods: {
          getProvincesData(){
            var self = this;
            axios.get('{{ route('api-provinces') }}')
            .then(function(response){
              self.provinces = response.data;
            })
          },
          getRegenciesData(){
            var self = this;
            axios.get('{{ url('api/regencies') }}/' + self.provinces_id)
            .then(function(response){
              self.regencies = response.data;
            })
          },
        },

        watch: {
          provinces_id: function(val, oldVal){
            this.regencies_id = null;
            this.getRegenciesData();
          }
        }
      });
    </> --}}
    
@endpush