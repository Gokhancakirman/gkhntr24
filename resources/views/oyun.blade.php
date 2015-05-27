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

    <!-- Page Content -->
	@section('content')
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12" style="margin-left:-30px;">
                <h1 class="page-header" style="color:#A55A12;border-bottom: 1px solid #A55A12;">{{$oyun->oyun_adi}}
                </h1>
                <ol class="breadcrumb" style="background-color:#4D1B6F;;">
                    <li><a href="index.html" style="color:#EDB70B;">Home</a>
                    </li>
                    <li class="active">Portfolio Item</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Portfolio Item Row -->
        <div class="row">
		 <div class="col-md-2" style="margin-left:-30px;">
			@include('layouts.include.sidebar')
            </div>
		
            <div class="col-md-8" >
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img class="img-responsive" src="{{URL::asset('/oyun_slider/'.$oyun->resim_yolu1)}}" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="{{URL::asset('/oyun_slider/'.$oyun->resim_yolu2)}}" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="{{URL::asset('/oyun_slider/'.$oyun->resim_yolu3)}}" alt="">
                        </div>
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>
			<div class="col-md-2" style="height:440px;background-color:#fff;">
			<h1>Reklam </h1>
			</div>

            <div class="col-md-8">
			<a href="{{URL::route('oyna',array('id'=>$oyun->id))}}" class="btn btn-primary btn-large" style="width:100%;margin-top:10px;"><i class="icon-forward"></i>Oyunu Oyna </a>
                <h3>Oyun Tanıtımı</h3>
                <p>{{$oyun->aciklama}}</p>
            </div>

        </div>
        <!-- /.row -->

        <!-- Related Projects Row -->
        <div class="row">

            <div class="col-lg-12">
                <h3 class="page-header" style="color:#A55A12;border-bottom: 1px solid #A55A12;">Benzer Oyunlar</h3>
            </div>

            <div class="col-sm-2 col-xs-6">
                <a href="#">
                    <img class="img-responsive img-hover img-related" src="mafyaarabasinikoru.jpg" style="width:100%;height:127.5px;" alt="">
                </a>
				<h3 style="text-align:center;margin-top:5px;font-size:20px;">
                    <a href="portfolio-item.html" style="text-decoration:none;">Project Name</a>
                </h3>
            </div>

            <div class="col-sm-2 col-xs-6">
                <a href="#">
                    <img class="img-responsive img-hover img-related" src="mafyaarabasinikoru.jpg" style="width:100%;height:127.5px;" alt="">
                </a>
				<h3 style="text-align:center;margin-top:5px;font-size:20px;">
                    <a href="portfolio-item.html" style="text-decoration:none;">Project Name</a>
                </h3>
            </div>

            <div class="col-sm-2 col-xs-6">
                <a href="#">
                    <img class="img-responsive img-hover img-related" src="mafyaarabasinikoru.jpg" style="width:100%;height:127.5px;" alt="">
                </a>
				<h3 style="text-align:center;margin-top:5px;font-size:20px;">
                    <a href="portfolio-item.html" style="text-decoration:none;">Project Name</a>
                </h3>
            </div>

            <div class="col-sm-2 col-xs-6">
                <a href="#">
                    <img class="img-responsive img-hover img-related" src="mafyaarabasinikoru.jpg" style="width:100%;height:127.5px;" alt="">
                </a>
				<h3 style="text-align:center;margin-top:5px;font-size:20px;">
                    <a href="portfolio-item.html" style="text-decoration:none;">Project Name</a>
                </h3>
            </div>
			
			<div class="col-sm-2 col-xs-6">
                <a href="#">
                    <img class="img-responsive img-hover img-related" src="mafyaarabasinikoru.jpg" style="width:100%;height:127.5px;" alt="">
                </a>
				<h3 style="text-align:center;margin-top:5px;font-size:20px;">
                    <a href="portfolio-item.html" style="text-decoration:none;">Project Name</a>
                </h3>
            </div>

            <div class="col-sm-2 col-xs-6">
                <a href="#">
                    <img class="img-responsive img-hover img-related" src="mafyaarabasinikoru.jpg" style="width:100%;height:127.5px;" alt="">
                </a>
				<h3 style="text-align:center;margin-top:5px;font-size:20px;">
                    <a href="portfolio-item.html" style="text-decoration:none;">Project Name</a>
                </h3>
            </div>

            <div class="col-sm-2 col-xs-6">
                <a href="#">
                    <img class="img-responsive img-hover img-related" src="mafyaarabasinikoru.jpg" style="width:100%;height:127.5px;" alt="">
                </a>
				<h3 style="text-align:center;margin-top:5px;font-size:20px;">
                    <a href="portfolio-item.html" style="text-decoration:none;">Project Name</a>
                </h3>
				
            </div>

            <div class="col-sm-2 col-xs-6">
                <a href="#">
                    <img class="img-responsive img-hover img-related" src="mafyaarabasinikoru.jpg" style="width:100%;height:127.5px;" alt="">
                </a>
				<h3 style="text-align:center;margin-top:5px;font-size:20px;">
                    <a href="portfolio-item.html" style="text-decoration:none;">Project Name</a>
                </h3>
            </div>
			
			<div class="col-sm-2 col-xs-6">
                <a href="#">
                    <img class="img-responsive img-hover img-related" src="mafyaarabasinikoru.jpg" style="width:100%;height:127.5px;" alt="">
                </a>
				<h3 style="text-align:center;margin-top:5px;font-size:20px;">
                    <a href="portfolio-item.html" style="text-decoration:none;">Project Name</a>
                </h3>
            </div>

            <div class="col-sm-2 col-xs-6">
                <a href="#">
                    <img class="img-responsive img-hover img-related" src="mafyaarabasinikoru.jpg" style="width:100%;height:127.5px;" alt="">
                </a>
				<h3 style="text-align:center;margin-top:5px;font-size:20px;">
                    <a href="portfolio-item.html" style="text-decoration:none;">Project Name</a>
                </h3>
            </div>

            <div class="col-sm-2 col-xs-6">
                <a href="#">
                    <img class="img-responsive img-hover img-related" src="mafyaarabasinikoru.jpg" style="width:100%;height:127.5px;" alt="">
                </a>
				<h3 style="text-align:center;margin-top:5px;font-size:20px;">
                    <a href="portfolio-item.html" style="text-decoration:none;">Project Name</a>
                </h3>
            </div>

            <div class="col-sm-2 col-xs-6">
                <a href="#">
                    <img class="img-responsive img-hover img-related" src="mafyaarabasinikoru.jpg" style="width:100%;height:127.5px;" alt="">
                </a>
				<h3 style="text-align:center;margin-top:5px;font-size:20px;">
                    <a href="portfolio-item.html" style="text-decoration:none;">Project Name</a>
                </h3>
            </div>

        </div>
        <!-- /.row -->

        <hr style="border-top: 1px solid #A55A12;">
</div>
@stop
        <!-- Footer -->

    
    <!-- /.container -->

    <!-- jQuery -->
	@section('javascript')
    <script src="{{URL::asset('js/jquery.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
	@stop


