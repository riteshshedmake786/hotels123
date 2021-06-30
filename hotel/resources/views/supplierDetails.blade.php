
<!DOCTYPE html>
<html lang="en">
@include('front.layout.header')
@foreach ($detail as $supplierdetails)
<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/owl.carousel2.thumbs@0.1.8/dist/owl.carousel2.thumbs.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">
    .sv-slider-item {
        width: 100%;
        height: 560px;
        margin-bottom: 20px;
    }

    .sv-slider .owl-thumbs {
        white-space: nowrap;
        overflow: auto;
    }

    .owl-thumbs button>img {
        width: 100px;
        height: 100px;
    }

    button.owl-thumb-item {
        margin-right: 10px;
    }

    .pagetitle {
        text-transform: capitalize;
        letter-spacing: 1px;
        font-weight: 600;
        padding-bottom: 5px;
        border-bottom: 2px solid #fea116;
    }

    .themebg {
        background: #fea116;
    }

    span.pagesubtitle {
        font-size: 13px;
        color: #aaa;
    }

    .shairIcon .fa {
        padding: 12px;
        font-size: 12px;
        width: 35px;
        height: 35px;
        text-align: center;
        text-decoration: none;
        margin: 5px 2px;
        border-radius: 50%;
    }

    .shairIcon .fa:hover {
        opacity: 0.7;
    }

    .fa-facebook {
        background: #3B5998;
        color: white;
    }

    .fa-twitter {
        background: #55ACEE;
        color: white;
    }  
    .fa-youtube {
        color: white;
        background: #e62020;
    }
    .fa-instagram {
        background: linear-gradient(10deg, red, purple);
        color: white;
    }

    .formMAin {
        box-shadow: 0px 0px 7px #ccc;
        padding: 15px 20px;
        height: 565px;
    }
    .socialmain{
        box-shadow: 0px 0px 7px #ccc;
        padding: 15px 20px;
        height: 80px; 
    }
    .abuttext {
        text-align: justify;
    }

    .pfadmicon-glyph-377:before {
        content: "\e979";
    }

    .product-slider .card {
        padding: 10px 10px;
        margin: 0 10px;
        box-shadow: 0px 0px 7px #ccc;
    }

    .product-slider img.card-img-top {
        height: 260px;
    }

    /*New*/
    .bannerImage {
        height: 55vh;
        background: url({{ asset('uploads/hotels_banner_images/'.$supplierdetails->banner_img) }});
        background-repeat: no-repeat;
        background-size: cover;
        background-position: 100%;
        background-attachment: fixed;
    }

    .formMAin i {
        color: #fea116;
        margin-right: 6px;
    }
    .productsmall_section img.card-img-top {
   height: 150px;
}
.subproductMAin .col-md-4 {
    margin-bottom: 40px;
}
.productMain .card-body,.col-md-8.subproductMAin {
    min-height: 312px;
}
img.card-img-top:hover {
    transform: scale(1.05);
    transition-duration: 1s;
}
.productMain .owl-nav {
    bottom: 5% !important;
    width: 100%;
    text-align: center;
    position: absolute;
}
.productMain button.owl-next, .productMain button.owl-prev {
    width: 35px;
    background: #031042c4 !important;
    height: 35px;
    color: #fff !important;
    margin-right: 8px;
}

    </style>
</head>

<body>
    <div class="mainContainer">
        <div class="bannerMain">
            <div class="bannerImage"></div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <section id="sliderSection">
                        <h3 class="pagetitle">{{$supplierdetails->name}} <span class="pagesubtitle">{{$supplierdetails->location}}</span></h3>
                        <div class="sv-slider">
                            <div class="owl-carousel" data-slider-id="1">
                                @foreach ($image as $images)
                                <div class="sv-slider-item">
                                  <img src="{{ asset('uploads/hotels_featured_images/'.$images) }}" alt="">
                              </div>
                                @endforeach
                            </div>
                            <div class="owl-thumbs" data-slider-id="1">
                            </div>
                        </div>
                        <hr>
                    </section>
                    <section id="about">
                        <div class="Aboutsec">
                            <h3 class="pagetitle">Description</h3>
                            <p class="abuttext">
                              {{$supplierdetails->description}}
                            </p>
                        </div>
                    </section>
                    <!-- <section id="review">
                        <h3 class="pagetitle">Leave Review</h3>
                        <div class="row">
                            <div class="col-md-6 ">
                                <form id="reviwform">
                                    <input type="text" name="" placeholder="Name" class="form-control"><br>
                                    <input type="emial" name="" placeholder="Email" class="form-control"><br>
                                    <div>
                                        <span class="rating block">
                                            <span class="lbl-text">Rating:</span>
                                            <span>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </span>
                                        </span>
                                    </div>
                                    <br>
                                    <textarea class="form-control" placeholder="Review"></textarea>
                                    <br>
                                    <button class="btn themebg btn-success form-control">Submit Review</button>
                                </form>
                            </div>
                        </div>
                    </section> -->
                </div>
                <div class="col-md-3">
                    <section id="getintouch">
                        <h3 class="pagetitle">Supplier Details</h3>
                        <div class="formMAin">
                            <p><i class="fa fa-user"></i> &nbsp;{{$supplierdetails->name}}</p>
                            <p><i class="fa fa-envelope"></i> {{$supplierdetails->email}}</p>
                            <p><i class="fa fa-list-ul"></i>  {{$suppliertype}}</p>
                            <p><i class="fa fa-map"></i>&nbsp;{{$supplierdetails->location}}</p>
                            <p><i class="fa fa-phone"></i> +971&nbsp;&nbsp;&nbsp;{{$supplierdetails->primary_number}}</p>
                        </div>
                    </section>
                    <br>
                    <section id="getintouch">
                      <h3 class="pagetitle">Social Links</h3>
                      <div class="socialmain">
                        <div class="shairIcon">
                          <a href="{{$supplierdetails->facebook}}" class="fa fa-facebook"></a>
                          <a href="{{$supplierdetails->twitter}}" class="fa fa-twitter"></a>
                          <a href="{{$supplierdetails->you_tube}}" class="fa fa-youtube"></a>
                          <a href="{{$supplierdetails->instagram}}" class="fa fa-instagram"></a>
                        </div>
                      </div>
                    </section>
                </div>
            </div>
        </div>
        <hr>
        <div class="container-fluid">
            <h3 class="pagetitle">More Choises</h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="productMain owl-carousel">
                        <div class="product-slider">
                            <div class="card">
                                <img class="card-img-top" src="{{ asset('social/slide1.jpg') }}" alt="Card image" style="width:100%">
                                <div class="card-body">
                                    <h4 class="card-title">Hotel1</h4>
                                    <span>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </span>
                                    <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="product-slider">
                            <div class="card">
                                <img class="card-img-top" src="{{ asset('social/slide1.jpg') }}" alt="Card image" style="width:100%">
                                <div class="card-body">
                                    <h4 class="card-title">Hotel2</h4>
                                    <span>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </span>
                                    <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="product-slider">
                            <div class="card">
                                <img class="card-img-top" src="{{ asset('social/slide2.jpg') }}" alt="Card image" style="width:100%">
                                <div class="card-body">
                                    <h4 class="card-title">Hotel3</h4>
                                    <span>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </span>
                                    <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="product-slider">
                            <div class="card">
                                <img class="card-img-top" src="{{ asset('social/slide4.jpg') }}" alt="Card image" style="width:100%">
                                <div class="card-body">
                                    <h4 class="card-title">Hotel4</h4>
                                    <span>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </span>
                                    <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="product-slider">
                            <div class="card">
                                <img class="card-img-top" src="{{ asset('social/slide3.jpg') }}" alt="Card image" style="width:100%">
                                <div class="card-body">
                                    <h4 class="card-title">Hotel5</h4>
                                    <span>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </span>
                                    <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="product-slider">
                            <div class="card">
                                <img class="card-img-top" src="{{ asset('social/slide1.jpg') }}" alt="Card image" style="width:100%">
                                <div class="card-body">
                                    <h4 class="card-title">Hotel6</h4>
                                    <span>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </span>
                                    <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="product-slider">
                            <div class="card">
                                <img class="card-img-top" src="{{ asset('social/slide1.jpg') }}" alt="Card image" style="width:100%">
                                <div class="card-body">
                                    <h4 class="card-title">Hotel7</h4>
                                    <span>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </span>
                                    <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="product-slider">
                            <div class="card">
                                <img class="card-img-top" src="{{ asset('social/slide2.jpg') }}" alt="Card image" style="width:100%">
                                <div class="card-body">
                                    <h4 class="card-title">Hotel8</h4>
                                    <span>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </span>
                                    <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 subproductMAin">
                  <div class="row">
                    @foreach ($data as $productdata)
                    <div class="col-md-4">
                      <div class="product-slider productsmall_section text-center">
                            <div class="card">
                              
                              
                                <img class="card-img-top" @if ($productdata->image && $img = explode(" ",$productdata->image) ) src="{{ 
                                  asset('uploads/hotels_featured_images/'.$img[0]) }}" alt="Card image" style="width:100%" @endif>
                                
                                <div class="card-body">
                                    <h4 style="font-weight:bold;" class="card-title">{{$productdata->products}}</h4>
                                    <span>
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                  </span>
                                    <p style="font-weight:bold;">{{$suppliertype}}</p>
                                    <p style="font-weight:bold;">{{$productdata->discount_offer}}% Off</p>
                                    <p>{{str_limit($productdata->description,58)}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                  </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    $('.sv-slider .owl-carousel').owlCarousel({
        autoplay: true,
        autoplayHoverPause: true,
        dots: false,
        nav: false,
        thumbs: true,
        thumbImage: true,
        thumbsPrerendered: true,
        thumbContainerClass: 'owl-thumbs',
        thumbItemClass: 'owl-thumb-item',
        loop: true,
        navText: [
            "<i class='fa fa-chevron-left' aria-hidden='true'></i>",
            "<i class='fa fa-chevron-right' aria-hidden='true'></i>"
        ],
        items: 1,
        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 1,
            },
            992: {
                items: 1,
            }
        }
    });
    </script>
    <script type="text/javascript">
    $('.productMain.owl-carousel').owlCarousel({
        autoplay: true,
        autoplayHoverPause: true,
        dots: false,
        nav: true,
        loop: true,
        navText: [
            "<i class='fa fa-chevron-left' aria-hidden='true'></i>",
            "<i class='fa fa-chevron-right' aria-hidden='true'></i>"
        ],
        items: 1,
        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 1,
            },
            992: {
                items: 1,
            }
        }
    });
    </script>
</body>
@endforeach
</html>
@include('front.layout.footer')
