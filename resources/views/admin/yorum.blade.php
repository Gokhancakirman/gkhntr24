@extends('admin/masterpage/master')
@section('css')
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{URL::asset('admin/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Bootstrap Core CSS RTL-->
    

    <!-- Custom CSS -->
    <link href="{{URL::asset('admin/css/sb-admin.css')}}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{URL::asset('admin/css/plugins/morris.css')}}" rel="stylesheet">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!-- Custom Fonts -->
    <link href="{{URL::asset('admin/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<script>
		
			 $("document").ready(function(){
			 $('#onayla').click(function(e) {
			 e.preventDefault();
			 var onay=1;
			 var link = $(this).attr('href');
			 var url="{{URL::route('yorum')}}";
			 $.ajax({
			method: "get",
			url: link,
			data: {
			"onay": onay   
			},
			success: function( data ) {
			window.location = url;
            }
			});
			 
			 
			 
			 });
			 });
			 </script>
<script>
		
			 $("document").ready(function(){
			 $('#clear').click(function(e) {
			 e.preventDefault();
			 var link = $(this).attr('href');
			 var url="{{URL::route('yorum')}}";
			 $.ajax({
			method: "get",
			url: link,
			data: {
			"selam":"selam"   
			},
			success: function( data ) {
			window.location = url;
            }
			});
			 
			 
			 
			 });
			 });
			 </script>			 
			 <script> 
				var el = document.getElementById( 'alert' );
			document.getElementById('alert').innerHTML='<p>{{Session::get('message')}}</p>'; 
			setTimeout(function() {el.parentNode.removeChild( el );},5000);
			</script>
</head>
@stop
@section('content')
        <div id="page-wrapper">

            <div class="container-fluid">
			 <div class="row">
		<div class="modal fade" id="Silmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
		<div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
            <h4 class="modal-title" id="myModalLabel">Kategori Sil</h4>
            </div>
			<div class="modal-body">
			  
			<h1>Bu ogeyi silmek istediginize eminmisiniz ? </h1>	
			   	
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Iptal</button>
                <a href="#" class="btn btn-success" role="button" id="ButtonSil">Sil</a>
		
			</div>
			</div>
			</div>
			</div>
			  <div class="col-lg-12">
                        <h1 class="page-header">
                            Yorumlar
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Yorumlar
                            </li>
                        </ol>
                    </div>
                </div>
				<div class="row">
                    <div class="col-lg-6">
                        <h2>Yorumlar</h2>
					
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" >
                                <thead>
                                    <tr>
                                        <th>Yorum</th>
										<th>Oyun</th>
										<th>Ad Soyad</th>
										<th></th>
                                    </tr>
                                </thead>
                                <tbody>
								@foreach($yorum as $yor)
                                    <tr>
                                        <td>{{$yor->yorum}}</td>
										@foreach($oyun as $oy)
										@if($oy->id==$yor->oyun_id)
										<td>{{$oy->oyun_adi}}</td>
										@endif
										<td>{{$yor->ad}}</td>
										@endforeach
                                        <td><a href="{{URL::route('yorum_onay',array('id'=>$yor->id))}}" type="button" class="btn btn-xs btn-success" id="onayla" >Onayla</a>
										<a href="{{URL::route('yorum_sil',array('id'=>$yor->id))}}" type="button" class="btn btn-xs btn-danger" id="clear">Sil</button>
										</td>
										
                                    </tr>
								@endforeach	
                                </tbody>
                            </table>
                        </div>
                    </div>
					</div>
					</div>
					</div>
				@stop
				@section('javascript')
				

				@stop	