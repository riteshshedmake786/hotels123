@include('front.layout.header')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Maven+Pro&display=swap');

body {
    font-family: 'Maven Pro', sans-serif
}

body {
    background-color: #eee
}

.add {
    border-radius: 20px
}

.card {
    border: none;
    border-radius: 10px;
    transition: all 1s;
    cursor: pointer
}

.card:hover {
    -webkit-box-shadow: 3px 5px 17px -4px #777777;
    box-shadow: 3px 5px 17px -4px #777777
}

.ratings i {
    color: green
}

.apointment button {
    border-radius: 20px;
    background-color: #eee;
    color: #000;
    border-color: #eee;
    font-size: 13px
}
   .col-md-3 {
        margin-top: 10px;
        margin-bottom: 10px;
    }
    .pagetitle {
        text-transform: capitalize;
        letter-spacing: 1px;
        font-weight: 600;
        padding-bottom: 5px;
        border-bottom: 2px solid #fea116;
        font-size: 28px;
    }
    span{
        color: black;
    }
</style>

<div class="container mt-5 mb-5">
    <div class="d-flex justify-content-between mb-3"> <span class="pagetitle"><strong>{{$title}}</strong></span> </div>
    <div class="row g-2">
        @foreach ($data as $supplierlist)
            <div class="col-md-3">
                <a href="/getSupplierProducts/{{ $supplierlist->id }}">
                <div class="card p-2 py-3 text-center">
                    <img src="{{ asset('uploads/hotels_featured_images/'.$supplierlist->featured_image) }}"> 
                    <h5 class="mb-0">{{$supplierlist['name']}}</h5> <small>{{$title}}</small>
                    <div class="ratings mt-2"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
                    <div class="mt-1 mb-1 spec-1"><i class="fa fa fa-map-marker"></i>&nbsp;<span>{{$supplierlist['location']}}</div>
                    <div class="mt-1 mb-1 spec-1"><span>{{str_limit($supplierlist['description'],25)}}</span></div>
                </div>
                </a>
            </div>
        @endforeach
    </div>
</div>

@include('front.layout.footer')