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
    
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
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
<script type="text/javascript">
	  $(document).ready(function () {
		if ({{ Input::old('OpenModal', 'false') }}) {
        $("#eklemodal").modal('show');
		}
		});
	</script>
</head>
@stop
@section('content')
        <div id="page-wrapper">

            <div class="container-fluid">
			
			<div class="row">
			<div class="modal fade" id="eklemodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
		<div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Oyunlar</h4>
            </div>
            <div class="modal-body">
                {!!Form::open(array('id'=>'oyunlar','files'=>true,'route'=>'oyunekle','value'=>csrf_token()))!!}

                            <div class="form-group @if ($errors->has('oyun_adi')) has-error @endif">
							{!!Form::label('oyun_adi','Oyun Adi')!!}
							{!!Form::text('oyun_adi',null,array('class'=>'form-control'))!!}
							{!! $errors->first('oyun_adi', '<p class="text-danger">:message</p>') !!}
                            </div>
							<div class="form-group @if ($errors->has('oyun_link')) has-error @endif">
                                {!!Form::label('oyun_link','Oyun Link')!!}
                                {!!Form::text('oyun_link',null,array('class'=>'form-control'))!!}
								{!! $errors->first('oyun_link', '<p class="text-danger">:message</p>') !!}
                            </div>
							<div class="form-group">
                                {!!Form::label('kategori','Kategori')!!}
                                <select class="form-control" name="kategori" id="kategori">
								@foreach($altkategori as $alt)
                                    <option value="{!!$alt->id!!}">{!!$alt->kat_adi!!}</option>
								@endforeach	
                                </select>
								
                            </div>
							<div class="form-group @if ($errors->has('aciklama')) has-error @endif">
								{!!Form::label('aciklama','Aciklama')!!}
								{!! Form::textarea('aciklama', null, ['class' => 'form-control']) !!}
								{!! $errors->first('aciklama', '<p class="text-danger">:message</p>') !!}
                            </div>
							<div class="form-group @if ($errors->has('kontroller')) has-error @endif">
                                {!!Form::label('kontroller','Kontroller')!!}
								 {!!Form::text('kontroller',null,array('class'=>'form-control'))!!}
								 {!! $errors->first('kontroller', '<p class="text-danger">:message</p>') !!}
                            </div>
							<div class="form-group @if ($errors->has('icon')) has-error @endif">
                                 {!!Form::label('icon','Icon')!!}
                                 {!!Form::file('icon')!!}
								 {!! $errors->first('icon', '<p class="text-danger">:message</p>') !!}
                            </div>
							<div class="form-group">
                                {!!Form::label('slider1','Slider1')!!}
                                {!!Form::file('slider1')!!}
                            </div>
							<div class="form-group">
                                {!!Form::label('slider2','Slider2')!!}
                                {!!Form::file('slider2')!!}
                            </div>
							<div class="form-group">
                                {!!Form::label('slider3','Slider3')!!}
                                {!!Form::file('slider3')!!}
                            </div>
							<div class="form-group">
                                    <label for="disabledSelect">Begeni</label>
                                    <input class="form-control" id="disabledInput" type="text" placeholder="Disabled input" disabled="">
                                </div>
								<div class="form-group">
                                    <label for="disabledSelect">Dislike</label>
                                    <input class="form-control" id="disabledInput" type="text" placeholder="Disabled input" disabled="">
                                </div>
								<div class="form-group">
                                    <label for="disabledSelect">Oynanma Sayisi</label>
                                    <input class="form-control" id="disabledInput" type="text" placeholder="Disabled input" disabled="">
                                </div>
								<div class="form-group">
                                <label>Populer</label>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="1" id="populer" name="populer">Populer
                                    </label>
                                </div>
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
            <h4 class="modal-title" id="myModalLabel">Kategori Sil</h4>
            </div>
			<div class="modal-body">
			  
			<h1>Bu oyunu silmek istediginize eminmisiniz ? </h1>	
			   	
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
                            Oyunlar
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Oyunlar
                            </li>
                        </ol>
                    </div>
                </div>
				@if (Session::has('message'))
				<div class="alert alert-success" id="alert"></div>
				@endif
				<div class="row">
                    <div class="col-lg-6">
                        <h2>Oyunlar</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" >
                                <thead>
                                    <tr>
                                        <th>Oyun Adi</th>
										<th>Aciklama</th>
										<th>Kontroller</th>
										<th>Kategori</th>
							            <th>Icon</th>
										<th><button type="button" class="btn btn-xs btn-success" onclick="Ekle()" data-toggle="modal" data-target="#eklemodal">Ekle</button></th>
                                    </tr>
                                </thead>
                                <tbody>
								@foreach($oyunlar as $oyun)
                                    <tr>
                                        <td>{{$oyun->oyun_adi}}</td>
										<td>{{$oyun->aciklama}}</td>
										<td>{{$oyun->kontroller}}</td>
										@foreach($altkategori as $kategori)
										@if($oyun->kat_id==$kategori->id)
										<td>{{$kategori->kat_adi}}</td>
										@endif
										@endforeach
										<td><img src="{{URL::asset('oyun_icon/'.$oyun->icon)}}"></td>
                                        <td><button type="button" class="btn btn-xs btn-warning" onclick="Guncelle({{$oyun}})" data-toggle="modal" data-target="#eklemodal" >Güncelle</button>
										<button type="button" class="btn btn-xs btn-danger" onclick="OyunSil({{$oyun}})"data-toggle="modal" data-target="#Silmodal">Sil</button>
										</td>
										
                                    </tr>
								@endforeach	
                                </tbody>
                            </table>
                        </div>
						<div class="center" style="margin-left: auto;width: 70%;">
						<?php echo $oyunlar->render(); ?>
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
	
	<script>
	function Ekle()
	{
	document.getElementById('oyunlar').action="/admin/oyunekle";
	document.getElementById('oyun_adi').value="";
	document.getElementById('oyun_link').value="";
	document.getElementById('aciklama').value="";
	document.getElementById('kontroller').value="";
	}
	</script>
	<script>
	function Guncelle(oyun)
	{
	document.getElementById('oyunlar').action="/admin/oyunguncelle/"+oyun.id;
	document.getElementById('oyun_adi').value=oyun.oyun_adi;
	document.getElementById('oyun_link').value=oyun.link;
	document.getElementById('aciklama').value=oyun.aciklama;
	document.getElementById('kontroller').value=oyun.kontroller;
	if(oyun.populer==1)
	{
	document.getElementById('populer').checked=true;
	}
	}
	</script>
	<script>
	function OyunSil(oyun)
	{
	document.getElementById('ButtonSil').href="/admin/oyunsil/"+oyun.id;
	}
	
	</script>
	
	<script> 
	var el = document.getElementById( 'alert' );
	document.getElementById('alert').innerHTML='<p>{{Session::get('message')}}</p>'; 
	setTimeout(function() {el.parentNode.removeChild( el );},5000);
	</script>
	
	

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
@stop		