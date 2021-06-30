@extends('front.layout.header')
@section('content')

<script src="{{ asset('js/mapInput.js') }}"></script>

<img src="{{ asset('uploads/hotels_featured_images/'.$supplierList[0]->featured_image) }}" alt="image" width="1350"
    height="300">
<div id="page-content">
    <div class="container">
        <div class="col-xs-12 col-sm-12 col-md-8 pull-left">
            <div class="wrapper">
                <div class="card-header">
                    <div class="card-title">
                        <h2>{{ $supplierList[0]->name }}</h1>
                    </div>
                    <div class="bizLocation">
                        <div class="locationWrapper">
                            <a title="">
                                <h4><span><i class="fa fa-map-marker"></i>
                                        {{ $supplierList[0]->city_name }}
                                    </span></h3>
                            </a>
                        </div>
                    </div>
                    <p>
                        {{ $supplierList[0]->description }}
                    </p>
                </div><br>
                <div class="products">
                    @if ($productList->count() > 0 )
                    @foreach($productList as $key=>$value)
                    <span class="badge badge-pill badge-warning" style=" background-color: gold;color: black;">
                        <h6>{{ $value->products }}</h6>
                    </span>
                    @endforeach
                    @else
                    <div class="alert alert-warning">
                        <strong>Sorry!</strong> No Product Found.
                    </div>
                    @endif
                </div>
                <h5 class="decorated"><span>HOW TO GET HERE</span></h5>
                <div class="form-group">
                    <label for="address_address">Address</label>
                    <input type="text" id="address-input" name="address_address"
                        value="{{ $supplierList[0]->location ?? '' }}" class="form-control map-input">
                    <input type="hidden" name="address_latitude" id="address-latitude"
                        value="{{ $supplierList[0]->lat ?? '' }}" />
                    <input type="hidden" name="address_longitude" id="address-longitude"
                        value="{{ $supplierList[0]->long ?? '' }}" />
                </div>
                <div id="address-map-container" style="width:100%;height:400px; ">
                    <div style="width: 100%; height: 100%" id="address-map"></div>
                </div>
                <h5 class="decorated"><span>GALLERY</span></h5>
                <div class="form-group row">
                    <div class='list-group gallery'>
                        {{--            @if($galleryImage->count())--}}
                        @foreach($galleryImage as $image)
                        <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
                            <a class="fancybox" rel="ligthbox" href="uploads/hotels_gallery_images/{{ $image->image }}">
                                <img src="{{ asset('uploads/hotels_gallery_images/'.$image->image) }}"
                                    class="img-responsive" alt="gallery" /><br>
                            </a>
                            <a href="{{ url('image-gallery',$image->id) }}">
                                <input type="hidden" name="image_delete" value="$image->id">
                                <!-- <button type="button" class="close-icon btn btn-sm">
                                    <i class="fa fa-remove"></i></button> -->
                            </a>
                        </div> <!-- col-6 / end -->
                        @endforeach
                        {{--            @endif--}}

                    </div> <!-- list-group / end -->
                </div> <!-- row / end -->


                <section class="carousel" aria-label="Gallery">
                    <ol class="carousel__viewport">
                        <li id="carousel__slide1" tabindex="0" class="carousel__slide">
                            <div class="carousel__snapper">
                                <a href="#carousel__slide4" class="carousel__prev">Go to last slide</a>
                                <a href="#carousel__slide2" class="carousel__next">Go to next slide</a>
                            </div>
                        </li>
                        <li id="carousel__slide2" tabindex="0" class="carousel__slide">
                            <div class="carousel__snapper"></div>
                            <a href="#carousel__slide1" class="carousel__prev">Go to previous slide</a>
                            <a href="#carousel__slide3" class="carousel__next">Go to next slide</a>
                        </li>
                        <li id="carousel__slide3" tabindex="0" class="carousel__slide">
                            <div class="carousel__snapper"></div>
                            <a href="#carousel__slide2" class="carousel__prev">Go to previous slide</a>
                            <a href="#carousel__slide4" class="carousel__next">Go to next slide</a>
                        </li>
                        <li id="carousel__slide4" tabindex="0" class="carousel__slide">
                            <div class="carousel__snapper"></div>
                            <a href="#carousel__slide3" class="carousel__prev">Go to previous slide</a>
                            <a href="#carousel__slide1" class="carousel__next">Go to first slide</a>
                        </li>
                    </ol>
                    <aside class="carousel__navigation">
                        <ol class="carousel__navigation-list">
                            <li class="carousel__navigation-item">
                                <a href="#carousel__slide1" class="carousel__navigation-button">Go to slide 1</a>
                            </li>
                            <li class="carousel__navigation-item">
                                <a href="#carousel__slide2" class="carousel__navigation-button">Go to slide 2</a>
                            </li>
                            <li class="carousel__navigation-item">
                                <a href="#carousel__slide3" class="carousel__navigation-button">Go to slide 3</a>
                            </li>
                            <li class="carousel__navigation-item">
                                <a href="#carousel__slide4" class="carousel__navigation-button">Go to slide 4</a>
                            </li>
                        </ol>
                    </aside>
                </section>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 pull-right">
            <div class="wrapper">
                <div class="productsidebar">
                    <a href="#"><i class="fa fa-phone"></i>&nbsp; Mobile:
                        &nbsp;{{ $supplierList[0]->mobile_no }}</a>
                    <a href="#"><i class="fa fa-phone"></i>&nbsp; Landline No:
                        &nbsp;{{ $supplierList[0]->landline_no }}</a>
                    <a href="#"><i class="fa fa-arrow-circle-o-left"></i>&nbsp; Get Directions</a>
                    <a href="#"><i class="fa fa-envelope-o"></i>&nbsp; E-mail:
                        &nbsp;{{ $supplierList[0]->email }}</a>
                    <a href="https://{{ $supplierList[0]->website }}"><i class="fa fa-globe"></i>&nbsp; Website:
                        &nbsp;{{ $supplierList[0]->website }}</a>

                    <div style="text-align:center;margin:5px;">
                        <ul class="social-network social-circle">
                            <li>@if($supplierList[0]->facebook)<a href="https://{{ $supplierList[0]->facebook }}"
                                    class="icoFacebook" title="Facebook" disabled="disabled"><i
                                        class="fa fa-facebook"></i></a>
                                @endif
                            </li>
                            <li>@if($supplierList[0]->twitter)<a href="https://{{ $supplierList[0]->twitter }}"
                                    class="icoTwitter" title="Twitter" disabled="disabled"><i
                                        class="fa fa-twitter"></i></a>
                                @endif
                            </li>
                            <li>@if($supplierList[0]->instagram)<a href="https://{{ $supplierList[0]->instagram }}"
                                    class="icoInstagram" title="Instagram" disabled="disabled"><i
                                        class="fa fa-instagram"></i></a>
                                @endif
                            </li>
                            <li>@if($supplierList[0]->you_tube)<a href="https://{{ $supplierList[0]->you_tube }}"
                                    class="icoYoutube" title="Youtube" disabled="disabled"><i
                                        class="fa fa-youtube"></i></a>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('pageScript')
<script type="text/javascript">

</script>


@endsection
<!-- @section('pageScript') -->
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDUlGhRghOm7Q-x8rsHTFqzLT1DRjSOhSo&libraries=places&callback=initialize" async defer></script> -->
<!-- <script src="{{ asset('js/mapInput.js') }}"></script> -->
<!-- @endsection -->