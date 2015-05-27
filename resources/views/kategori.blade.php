@extends('layouts/master')
@section('css')
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Modern Business - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{URL::asset('css/bootstrap.min.css') }}" rel="stylesheet" >
	
    <!-- Custom CSS -->
    <link href="{{URL::asset('css/modern-business.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{URL::asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
@stop
@section('slider')

		<header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="fill" style="background-image:url({{URL::asset('sonic.jpg')}});background-size: 100% 100%;;  background-repeat:no-repeat;"></div>
                <div class="carousel-caption">
                    <h2>Caption 1</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url({{URL::asset('luffynaruto.jpg')}});"></div>
                <div class="carousel-caption">
                    <h2>Caption 2</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url({{URL::asset('lol.jpg')}});"></div>
                <div class="carousel-caption">
                    <h2>Caption 3</h2>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>
@stop	
@section('content')	
    <div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
         <div class="col-md-2" style="margin-top:9%;margin-left:-30px;">
			@include('layouts.include.sidebar')
            </div>
           
			<div class="col-md-7">
			<div class="col-lg-12">
                <h1 class="page-header" style="color:#A55A12;border-bottom: 1px solid #A55A12;">
                    {{$kategori->kat_adi}} Oyunları
                </h1>
            </div>
			@foreach($oyun as $oyunlar)
			<div class="col-md-4 col-sm-6">
                <a href="{{URL::route('oyun',array('id'=>$oyunlar->id))}}">
                    <img class="img-responsive img-hover" src="{{URL::asset('oyun_icon/'.$oyunlar->icon)}}" style="width:100%;height:115px;" alt="">
                </a>
                <h3 style="text-align:center;margin-top:5px;font-size:20px;">
                    <a href="portfolio-item.html" style="text-decoration:none;">{{$oyunlar->oyun_adi}}</a>
                </h3>
             </div>
			  @endforeach
           </div>
			
			<div class="col-md-3" style="height:717px;background-color:#fff;">
			<h1 style="text-align:center;">Reklam Alani </h1>
			</div>
			</div>
			
			</div>
	@stop

@section('javascript')
    <script src="{{URL::asset('js/jquery.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
@stop	