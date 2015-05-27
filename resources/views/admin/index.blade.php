@extends('admin/masterpage/master')
@section('css')
<head>
	<?php header('Content-type: text/html; charset=ISO-8859-9'); ?>
    <meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-9" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	
    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{URL::asset('admin/css/bootstrap.min.css')}}" rel="stylesheet">
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <!-- Bootstrap Core CSS RTL-->
    

    <!-- Custom CSS -->
    <link href="{{URL::asset('admin/css/sb-admin.css')}}" rel="stylesheet">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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
        $("#Altmodal").modal('show');
		}
		});
</script>

<script type="text/javascript">
	  $(document).ready(function () {
		if ({{ Input::old('autoOpenModal', 'false') }}) {
        $("#Anamodal").modal('show');
		}
		});
</script>

</head>
@stop
@section('content')
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
				<div class="modal fade" id="Anamodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
		<div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
            <h4 class="modal-title" id="myModalLabel">Ana Kategori</h4>
            </div>
			<div class="modal-body">
			   {!!Form::open(array('class'=>'anakategori','route'=>'katekle','id'=>'anakategori'))!!}
			    <div class="form-group @if ($errors->has('kat_adi')) has-error @endif" id="kat_adi-group">
								{!!Form::label('kat_adi','Kategori Adi')!!}
								{!!Form::text('kat_adi',null,array('class'=>'form-control'))!!}
								{!! $errors->first('kat_adi', '<p class="text-danger">:message</p>') !!}
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
			  
			<h1>Bu ogeyi silmek istediginize eminmisiniz ? </h1>	
			   	
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Iptal</button>
                <a href="#" class="btn btn-success" role="button" id="ButtonSil">Sil</a>
		
		</div>
	</div>
	</div>
	</div>
	
	<div class="modal fade" id="Altmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
		<div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
            <h4 class="modal-title" id="myModalLabel">Alt Kategori</h4>
            </div>
            <div class="modal-body">
                

                         {!!Form::open(array('class'=>'altkategori','route'=>'kat_ekle','id'=>'altkategori','files'=>true))!!}
						 <div class="form-group @if ($errors->has('kat_adi')) has-error @endif">
                               {!!Form::label('kat_adi','Kategori Adi')!!}
                               {!!Form::text('kat_adi',null,array('class'=>'form-control kategori'))!!}
                               {!! $errors->first('kat_adi', '<p class="text-danger">:message</p>') !!}
                            </div>
							<div class="form-group">
							  {!!Form::label('ana_id','Ana Kategori')!!}
							<select class="form-control" name="ana_id" id="ana_id">
							 @foreach($anakategori as $ana)
							 <option value="{!!$ana->id!!}">{!!$ana->kat_adi!!}</option>
							 @endforeach
                            </select>    
                            </div>
							<div class="form-group @if ($errors->has('icon')) has-error @endif">
                                {!!Form::label('icon','icon')!!}
                                {!!Form::file('icon')!!}
								{!! $errors->first('icon', '<p class="text-danger">:message</p>') !!}
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
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Kategoriler 
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Kategoriler
                            </li>
                        </ol>
                    </div>
                </div>
				
				<div class="form-group" id="sonuc"></div>
				
				<div class="row">
                    <div class="col-lg-6">
                        <h2>Ana Kategori</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" >
                                <thead>
                                    <tr>
                                        <th>Ana Kategoriler</th>
										<th><button type="button" class="btn btn-xs btn-success" onclick="Ekle()" data-toggle="modal" data-target="#Anamodal" >Ekle</button></th>
                                    </tr>
                                </thead>
                                <tbody>
								@foreach($anakategori as $ana)
                                    <tr>
                                        <td>{{$ana->kat_adi}}</td>
                                        <td><button type="button" class="btn btn-xs btn-warning" onclick="guncelle({{$ana}})"data-toggle="modal" data-target="#Anamodal" >Güncelle</button>
										<button type="button" class="btn btn-xs btn-danger"  onclick="AnaKatSil({{$ana}})" data-toggle="modal" data-target="#Silmodal">Sil</button>
										</td>
										
                                    </tr>
								@endforeach	
                                </tbody>
                            </table>
                        </div>
                    </div>
					</div>
					<div class="row">
                    <div class="col-lg-6">
                        <h2>Alt Kategori</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" >
                                <thead>
                                    <tr>
										<th>Icon</th>
                                        <th>Alt Kategoriler</th>
										<th>Ana Kategori </th>
										<th><button type="button" class="btn btn-xs btn-success" onclick="altEkle()" data-toggle="modal" data-target="#Altmodal">Ekle</button></th>
                                    </tr>
                                </thead>
                                <tbody>
								@foreach($altkategori as $alt)
                                    <tr>
									<td><img src="{{URL::asset('icons/'.$alt->icon)}}" ></td>
										<td>{{$alt->kat_adi}}</td>
								@foreach($anakategori as $ana)
								@if($alt->ana_id==$ana->id)
										<td>{{$ana->kat_adi}}</td>
								@endif		
								@endforeach		
								    
                                        <td><button type="button" class="btn btn-xs btn-warning" onclick="altguncelle({{$alt}})" data-toggle="modal" data-target="#Altmodal">Güncelle</button>
										<button type="button" class="btn btn-xs btn-danger" data-toggle="modal" onclick="sil({{$alt}})" data-target="#Silmodal">Sil</button>
										</td>
										
                                    </tr>
                               @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
					</div>
                <!-- /.row -->

                <!-- /.row -->

				
                <!-- /.row -->

               
                   
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
		
		@stop
        <!-- /#page-wrapper -->

   
    <!-- /#wrapper -->

    <!-- jQuery -->
	@section('javascript')
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
	<script> 
	var el = document.getElementById( 'alert' );
	document.getElementById('alert').innerHTML='<p>{{Session::get('message')}}</p>'; 
	setTimeout(function() {el.parentNode.removeChild( el );},5000);
	</script>
	<script>
	function guncelle(anakat)
	{
	document.getElementById('anakategori').action ="/admin/anakategoriguncelle/"+anakat.id;
	document.getElementById('kat_adi').value=anakat.kat_adi;
	}
	</script>
	<script>
	function altguncelle(altkat)
	{
	var kategori=document.getElementsByClassName('kategori');
	document.getElementById('altkategori').action ="/admin/altkategoriguncelle/"+altkat.id;
	kategori[0].value=altkat.kat_adi;
	document.getElementById('ana_id').value=altkat.ana_id;
	}
	</script>
	<script>
	function sil(altkat)
	{
	document.getElementById('ButtonSil').href ="/admin/altkategorisil/"+altkat.id;
	
	}
	</script>
	<script>
	function AnaKatSil(anakat)
	{
	document.getElementById('ButtonSil').href ="/admin/anakategorisil/"+anakat.id;
	
	}
	</script>
	<script>
	function Ekle()
	{
	document.getElementById('anakategori').action="/admin/kategori";
	document.getElementById('kat_adi').value="";
	}
	</script>
	<script>
	function altEkle()
	{
	var kategori=document.getElementsByClassName('kategori');
	document.getElementById('altkategori').action="/admin/altkategori";
	kategori[0].value="";
	}
	</script>
	@stop

