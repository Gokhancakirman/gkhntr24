
			
                <div class="list-group">
				@foreach($kategoriler as $kategori)
                    <a href="{{URL::route('kategori',array('id'=>$kategori->id))}}" class="list-group-item"><img src="{{URL::asset('/icons/'.$kategori->icon)}}">{{$kategori->kat_adi}}</a>
                @endforeach    
                </div>
            