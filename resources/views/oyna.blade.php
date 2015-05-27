@extends('layouts/master')
@section('css')
<head>

    <?php header('Content-type: text/html; charset=ISO-8859-9'); ?>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-9" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Modern Business - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{URL::asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{URL::asset('css/modern-business.css')}}" rel="stylesheet">
	<link href="{{URL::asset('css/ekle.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{URL::asset('css/star-rating.css')}}" media="all" rel="stylesheet" type="text/css"/>
    <!-- Custom Fonts -->
    <link href="{{URL::asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
	<meta name="_token" content="{{ csrf_token() }}"/>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="{{URL::asset('js/star-rating.js')}}" type="text/javascript"></script>
	<script src="js/jquery.js"></script>
	
	 <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script> 
	var elem = document.getElementById("alert");
	setTimeout(function() {elem.parentNode.removeChild( elem );},5000);
	</script>
	 <script>
		
			 $("document").ready(function(){
            $("#comment").submit(function(e){
				e.preventDefault();
				 var yorum = $("#yorum").val();
				 var ad=$("#ad").val();
				 var $_token = $('#token').val();
				 var formURL = $(this).attr("action");
				 
				$.ajax({
                    type: "POST",
                    url : formURL, 
                    data : {"yorum":yorum,"ad":ad,"_token":"{{ csrf_token() }}"},
					cache: false,	
                    success: function( data ) {
					if(data.success==true)
					{
			         console.log(data.val);
					 $("<div/>", {
					"class": "alert alert-success",
					"id":"alert",
					text: data.val,
					}).appendTo("#session").delay(5000).fadeOut( 400 );
					 console.log("success");
					}
					if (data.success==false)
					{
					    var arr=data.errors;
						$.each(arr, function(index, value)
					{
					if (value.length != 0)
					{
					$("<div/>", {
					"class": "alert alert-danger",
					"id":"alert",
					text: value,
					}).appendTo("#session").delay(5000).fadeOut( 400 );
					}
					});
	
					}
					 
                    },error: function(xhr, textStatus, thrownError) {  
					console.log(xhr.status);
					console.log(thrownError);
					}
					
            });
			});
        });
    

		</script>
	

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
@stop
@section('content')
    <!-- Page Content -->
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
			<div class="col-md-10" style="height:550px;">
			<object type="application/x-shockwave-flash" name="flash_game_0" data="{{$oyun->link}}" width="100%" height="100%" id="flash_game_0" style="visibility: visible; width: 100%; height: 100%;">
<param name="flashvars" value="">
<param name="allowScriptAccess" value="always">
<param name="quality" value="high">
<param name="scale" value="exactfit">
<param name="menu" value="true"><param name="wmode" value="opaque">
<param name="classid" value="CLSID:D27CDB6E-AE6D-11cf-96B8-444553540000">
</object>

			</div>
			
			<div class="col-md-10">
				<input id="input-2c" class="rating" min="0" max="5" step="0.5" data-size="sm"
				data-symbol="&#xf005;" data-glyphicon="false" data-rating-class="rating-fa">
                <h3 style="float:left;">{{$oyun->oyun_adi}}</h3>
				<div class="nfo" style="margin-left:5px;">
				<i class="icon_mini"></i>
				<span>129</span>
				kisi begendi.
				</div>
				<div class="nfo">
				<a href="#" style="color: #999;"> 
				<i class="icon_yorum"></i>
				<span>18</span> kişi yorum yaptı. 
				</a>
				</div>
				<div style="clear:both;"></div>
                <p>{{$oyun->aciklama}}</p>
				<h3>Kontroller</h3>
				<p>{{$oyun->kontroller}}</p>
            </div>
			
			
			
			</div>
			
			</div>
			<div class="well" id="well">
			<div class="form-group" id="session"></div>
                    <h4>Yorumun:</h4>
                    <form role="form" method="post" id="comment" action="{{URL::route('yorumlar',array('id'=>$oyun->id))}}" class="ajax">
					<input id="token" type="hidden" value="">
						
                        <div class="form-group">
                            <textarea name="yorum" id="yorum" class="form-control" rows="3"></textarea>
                        </div>
						<div class="form-group">
							<label for="ad">Adınız</label>
                            <input type="text" name="ad" id="ad" class="form-control" >
                        </div>
                        <button type="submit" class="btn btn-primary" id="submit">Onayla</button>
                    </form>
                </div>

                

                <!-- Posted Comments -->

                <!-- Comment -->
				@foreach($yorum as $yor)
				@if($yor->onay==1)
                <div class="media" style="border-bottom:1px solid #fff;padding-bottom:10px;">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$yor->ad}}
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        {{$yor->yorum}}
                    </div>
                </div>
				@endif
				@endforeach
                <!-- Comment -->
                
			@stop
			@section('javascript')
			
			@stop
			