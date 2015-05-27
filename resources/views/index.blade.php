@extends('layouts/master')
@section('css')
<head>
    <meta http-equiv=content-type content=text/html;charset=iso-8859-9>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
	

    <title>Modern Business - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/ekle.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
                <div class="fill" style="background-image:url('sonic.jpg');background-size: 100% 100%;;  background-repeat:no-repeat;"></div>
                <div class="carousel-caption">
                    <h2>Caption 1</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('luffynaruto.jpg');"></div>
                <div class="carousel-caption">
                    <h2>Caption 2</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('lol.jpg');"></div>
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

    <!-- Page Content -->
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
                    Yeni Eklenen Oyunlar
                </h1>
            </div>
			@foreach($oyunlar as $oyun)
			<div class="col-md-4 " >
                <a href="{{URL::route('oyun',array('id'=>$oyun->id))}}">
                    <img class="img-responsive img-hover" src="oyun_icon/{{$oyun->icon}}" style="width:100%;height:115px;" alt="">
                </a>
                <h3 style="text-align:center;margin-top:5px;font-size:20px;">
                    <a href="portfolio-item.html" style="text-decoration:none;">{{$oyun->oyun_adi}}</a>
                </h3>
             </div>
			  @endforeach
			  
           </div>
		  
			<div class="col-md-3" style="height:717px;background-color:#fff;">
			<h1 style="text-align:center;">Reklam Alani </h1>
			</div>
			<div class="center" style="margin-left: auto;width: 65%;">
			<?php echo $oyunlar->render(); ?>
			</div>
			</div>
			
			
      
			
			
			
        
        <!-- /.row -->

        <!-- Portfolio Section -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header" style="color:#A55A12;border-bottom: 1px solid #A55A12;">Popüler Oyunlar</h2>
            </div>
		@foreach($populer as $pop)
            <div class="col-md-2 ">
                <a href="{{URL::route('oyun',array('id'=>$pop->id))}}">
                    <img class="img-responsive  img-hover" src="oyun_icon/{{$pop->icon}}" style="width:100%;height:115px;" alt="">
                </a>
				<h3 style="text-align:center;margin-top:5px;font-size:20px;">
                    <a href="portfolio-item.html">{{$pop->oyun_adi}}</a>
                </h3>
            </div>
		@endforeach	
		<?php echo $populer->render(); ?>
        </div>
		
        <!-- /.row -->

        <!-- Features Section -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header" style="color:#A55A12;border-bottom: 1px solid #A55A12;">Oyun Tanıtımları</h2>
            </div>
            <div class="col-md-6">
			<h2 style="margin-top:5px;">Candy Crush Saga </h2>
                <p>Candy Crush Saga oyununu bilmeyen ya da duymayan yoktur diye tahmin ediyorum :). Oyunu bir kere bile oynamamış insanların bile, oyun hakkında fikirleri mevcut ve bunu fırsat bilen King.com, Candy Crush Saga Sodalı olarak yeni bir oyunu bizlere sunmuştur.</p>

				<p>Oyunun klasik Candy Crush’tan farkları tabi ki mevcut. Örneğin bir bölümünde ayıları bal peteklerinden kurtarmaya çalışırken diğer bölümünde jölelerden kurtarmaya çalışıyoruz. Aynı zamanda, ayıları şeker ipinin üzerine çıkartarak görevleri tamamlaya başlıyoruz. Her bölümün kendine ait bir görevi mevcuttur. Bir bölümünde Soda şişeleri toplamayı amaçlarken, diğer bölümünde beyaz çikolata ve kakaolu çikolataları yok etmeye çalışıyoruz.</p>

				<p>Sodalı Candy Crush‘ın anlamı ise, soda şişelerini açtıkça şekerlemeler aşağıdan yukarı doğru dizilmekte ve oyunu ters hamlelerle oynamamızı sağlamaktadır.</p>
                
            </div>
            <div class="col-md-6">
			<a>
                <img class="img-responsive" src="candycrush.jpg" alt="">
			</a>
            </div>
        </div>
		  </div>
    @stop		  
        <!-- /.row -->

        <!-- Call to Action Section -->

        <!-- Footer -->
       

  
    <!-- /.container -->

    <!-- jQuery -->
	@section('javascript')
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
@stop




