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

    <!-- Custom Fonts -->
    <link href="{{URL::asset('admin/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
@stop
@section('content')
        <div id="page-wrapper">

            <div class="container-fluid">
			<div class="row">
				<div class="modal fade" id="Kullanicimodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
		<div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
            <h4 class="modal-title" id="myModalLabel">Kullanici</h4>
            </div>
            <div class="modal-body">
			   {!!Form::open(array('class'=>'kullanici','id'=>'kullanicilar'))!!}
			    <div class="form-group">
								{!!Form::label('username','Kullanici Adi')!!}
								{!!Form::text('username',null,array('class'=>'form-control'))!!}
                            </div>
							<div class="form-group">
                                {!!Form::label('password','Sifre')!!}
								{!!Form::text('password',null,array('class'=>'form-control'))!!}
                            </div>
				
			   	
            </div>
            <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
				{!! Form::submit('Kaydet', array('class'=>'button btn btn-primary','id'=>'submit'))!!}
				
        </div>
		{!!Form::close()!!}	
		</div>
		
	</div>
	</div>
	<div class="modal fade" id="Silmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
		<div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
            <h4 class="modal-title" id="myModalLabel">Kullnici Sil</h4>
            </div>
			<div class="modal-body">
			  
			<h1>Bu kullaniciyi silmek istediginize eminmisiniz ? </h1>	
			   	
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
                            Kullanici 
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Kullanici
                            </li>
                        </ol>
                    </div>
                </div>
				@if (Session::has('message'))
				<div class="alert alert-success" id="alert"></div>
				@endif
				<div class="row">
                    <div class="col-lg-6">
                        <h2>Kullanicilar</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" >
                                <thead>
                                    <tr>
                                        <th>Kullanici Adi</th>
										<th>Sifre</th>
										<th><button type="button" class="btn btn-xs btn-success" onclick="Ekle()" data-toggle="modal" data-target="#Kullanicimodal" >Ekle</button></th>
                                    </tr>
                                </thead>
                                <tbody>
								@foreach($user as $kullanici)
                                    <tr>
                                        <td>{{$kullanici->username}}</td>
										<td>{{$kullanici->password}}</td>
                                        <td><button type="button" class="btn btn-xs btn-warning guncel" id="guncel" onclick="guncelle({{$kullanici}})" data-toggle="modal" data-target="#Kullanicimodal">Güncelle</button>
										<button type="button" class="btn btn-xs btn-danger" id="sil" onclick="sil({{$kullanici}})" data-toggle="modal" data-target="#Silmodal">Sil</button>
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
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
<!--	<script>
	$(function() {
//twitter bootstrap script
	$("button#submit").click(function(){
	        $.ajax({
    	type: "POST",
	url: "process.php",
	data: $('form.kullanici').serialize(),
        	success: function(msg){
        $("#Kullanicimodal").modal('hide');	
         },
	error: function(){
	alert("failure");
	}
      	});
	});
}); 
	</script>-->
	<script>
	var el = document.getElementById( 'alert' );
	document.getElementById('alert').innerHTML='<p>{{Session::get('message')}}</p>'; 
	setTimeout(function() {el.parentNode.removeChild( el );},5000);

	
	</script>
	<script>
	function guncelle(kullanici)
	{
	document.getElementById('kullanicilar').action ="/admin/kullaniciguncelle/"+kullanici.id;
	document.getElementById('username').value=kullanici.username;
	document.getElementById('password').value=kullanici.password;
	
	}
	</script>
	<script>
	function sil(kullanici)
	{
	document.getElementById('ButtonSil').href ="/admin/kullanicisil/"+kullanici.id;
	
	
	}
	</script>
	
	<script>
	function Ekle()
	{
	document.getElementById('kullanicilar').action ="/admin/kullanicilar/";
	document.getElementById('username').value="";
	document.getElementById('password').value="";
	}
	</script>
	@stop