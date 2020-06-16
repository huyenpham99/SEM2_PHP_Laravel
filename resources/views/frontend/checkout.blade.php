@extends("frontend.layout")

@section("content")
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="{{url("/")}}">Home</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code
                    </h6>
                </div>
            </div>
            <div class="checkout__form">
                <h4>Billing Details</h4>
                <form action="{{url("/checkout")}}"  method="post">
                @method("POST")
                @csrf


                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="checkout__input">
                                <p>UserName<span>*</span></p>
                                <input type="text" placeholder="UserName" class="form-control" name="username" value="{{\Illuminate\Support\Facades\Auth::user()->__get("name")}}">
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" placeholder="Address" class="form-control" name="address">
                            </div>
                            <div class="checkout__input">
                                <p>Telephone<span>*</span></p>
                                <input type="number" name="telephone" placeholder="Telephone" >
                            </div>
                            <div class="checkout__input">
                                <p>Notes<span>*</span></p>
                                <input type="text" name="note" placeholder="Notes" >
                            </div>

                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">Products <span>Total</span></div>
                                <ul>
                                    @php $grandTotal = 0 @endphp
                                    @foreach($cart->getItems as $item)
                                        <li>
                                            {{$item->__get("product_name")}}
                                        <span>{{$item->__get("price") *$item->pivot->__get("qty")}}</span>
                                        </li>
                                    @php $grandTotal +=($item->__get("price")*$item->pivot->__get("qty"))
                                   @endphp
                                       @endforeach

                                </ul>
                                <div class="checkout__order__subtotal">Subtotal <span>${{$grandTotal}}</span></div>
                                <div class="checkout__order__total">Total <span>${{$grandTotal}}</span></div>
                                <div class="checkout__input__checkbox">
                                    <label for="acc-or">
                                        Create an account?
                                        <input type="checkbox" id="acc-or">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor incididunt
                                    ut labore et dolore magna aliqua.</p>
                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Check Payment
                                        <input type="checkbox" id="payment">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                        Paypal
                                        <input type="checkbox" id="paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
@endsection
