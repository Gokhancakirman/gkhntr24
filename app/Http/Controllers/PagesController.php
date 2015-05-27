<?php namespace App\Http\Controllers;
use App\anakategori;
use App\altkategori;
use App\oyun;
use App\yorum;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use Input;
use Session;
use Response;
use Validator;





use Illuminate\Http\Request;

class PagesController extends Controller {
    public function __construct()
	{
    View::share('kategoriler',altkategori::all());
	View::share('anakategori',anakategori::all());
	}
	public function oyun($id)
	{
	$oyun=oyun::find($id);
	return view('oyun',compact('oyun'));
	}
	public function oyna($id)
	{
	$yorum=yorum::where('oyun_id','=',$id)->latest()->get();
	$oyun=oyun::find($id);
	return view('oyna',compact('oyun','yorum'));
	}
	public function index()
	{
	$oyunlar=oyun::paginate(12);
	$populer=oyun::where('populer','=',1)->paginate(12);
	return view('index',compact('oyunlar','populer'));
	}
	
	public function yorum($id)
	{
	$rules = array(
        'yorum'    => 'required|min:5',
        'ad' => 'required|between:5,32',
    );
	$messages = [
    'required'    => ':attribute kısmı boş bırakılamaz.',
    'min'    => ':attribute kısmı en az :min karakterden oluşmalıdır.',
    'between' => ':attribute kısmı :min ile :max arasında karakterden oluşmalıdır.',
];
	$validator = Validator::make(Input::all(), $rules,$messages);
	if ($validator->fails())
    {
        // Ooops.. something went wrong
        return Response::json(['success' => false, 'errors' => $validator->getMessageBag()->toArray()]);
    }
	else{
	
	$yorum=new yorum;
	$yorum->yorum=Input::get('yorum');
	$yorum->ad=Input::get('ad');
	$yorum->oyun_id=$id;
	$yorum->onay=0;
	if($yorum->save())
	{
	Session::set('message','Yorumunuz Onaylandıktan Sonra Gösterilecektir.Teşekkürler');
	$val=Session::get('message');
	return Response::json(array('success'=>true,'val'=>$val));
	}
	else{
            return 0;
        }
	}

		
}
public function kategori($id)
{
$oyun=oyun::where('kat_id','=',$id)->latest()->get();
$kategori=altkategori::find($id);
return view('kategori',compact('oyun','kategori'));
}
}
