@extends('student.Website.layout.app')

@section('title', 'List Faculity')

@section('main_content')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Faculity</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#!"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Home</a></li>
                            <li class="breadcrumb-item"><a href="#!">List Faculity</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div style="text-align: center;">
            <h2>Welcome Back,
                <a href="#!"><span class="badge badge-primary">{{ Auth::guard('student')->user()->name }}</a>
                </span>
            </h2>
        </div>
        <div class="card-columns">
            @foreach ($faculties as $faculty)
            <div class="card">
                <img class="img-fluid card-img-top"
                    src="https://images.squarespace-cdn.com/content/v1/56b1148fe707ebac7ac5d685/1659916527594-0QOSGRAEFR3ZKPAIRBKI/studying-ahead-1421056.jpg"
                    alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $faculty->name }}</h5>
                    <p class="card-text">
                        {{ $faculty->description }}
                    </p>
                    <a href="#!">
                        <button class="btn  btn-primary">View More</button>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection