<?php namespace App\Http\Controllers;
use App\anakategori;
use App\kullanici;
use App\altkategori;
use App\oyun;
use App\yorum;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use Input;
use File;
use Request;
use Auth;
use Hash;
use Validator;
use Response;
use Redirect;

class AdminController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function login()
	{
	return view('admin.login');
	}	
	public function logout()
	{
	Auth::logout();
	
	return redirect()->route('login');
	}
	
	public function giris()
	{
	$member = kullanici::where("username", "=", Input::get("username"))->first();
	$credentials = array("username" => Input::get("username"), "password" => Input::get("password"));
	var_dump($credentials);
	var_dump(Input::get("username"));
	var_dump(Hash::check(Input::get("password"), $member->password));
	if (Auth::attempt($credentials))
        {
            return redirect()->route('panel');
        }
	else
		{
		
		}
	}
	public function index()
	{
	
    // The user is logged in...

	  $anakategori=anakategori::latest()->get();
	  $altkategori=altkategori::latest()->get();
	  return view('admin.index',compact('anakategori','altkategori'));
	 
	}
	
	public function oyun()
	{
	  $oyunlar=oyun::latest()->paginate(6);	
	  $altkategori=altkategori::all();	
	  return view('admin.oyunlar',compact('oyunlar','altkategori'));
	}
	
	public function kullanici()
	{
	$user=kullanici::latest()->get();
	return view('admin.kullanici',compact('user'));
	}
	
	public function kullaniciekle()
	{
		$input=Request::all();
		$input['password']=Hash::make($input['password']);
		if(kullanici::create($input))
		{
		Session::flash('message', 'Kullanici basariyla eklendi');
		}
				
		return redirect()->route('kullanicipanel');
	}

	public function kategoriekle()
	{
		$input=Request::all();
		$input['autoOpenModal'] = true;
		$rules=array('kat_adi'=>'required|min:3');
		$messages = [
		'required'    => 'Kategori adı kısmı boş bırakılamaz.',
		'min'    => 'Kategori adı en az :min karakterden oluşmalıdır.',];
		$validator = Validator::make(Input::all(), $rules,$messages);
		if($validator->fails())
		{
		return Redirect::back()->withErrors($validator)->withInput($input);;
		}
		else
		{
		if(anakategori::create($input))
		{
		Session::flash('message', 'Ana kategori basariyla eklendi');
		return Redirect::back();
		}
		}
	}
	
	public function altkategoriekle()
	{
	$input=Request::all();
	$input['OpenModal'] = true;
	$rules=array('kat_adi'=>'required|min:3','icon'=>'required');
	$messages = [
		'required'    => '::attribute kısmı boş bırakılamaz.',
		'min'    => '::attribute en az :min karakterden oluşmalıdır.',];
	$validator = Validator::make(Input::all(), $rules,$messages);
	if($validator->fails())
	{
		return Redirect::back()->withErrors($validator)->withInput($input);;
	}
	else
	{
	$altkategori=new altkategori;
	$altkategori->kat_adi=Input::get('kat_adi');
	$altkategori->ana_id=Input::get('ana_id');
	if (Input::hasFile('icon'))
	{
	$file=Input::file('icon');
	$name = time() . '-' . $file->getClientOriginalName();
	$altkategori->icon=$name;
	$destinationpath=public_path().'/icons/';
	$file->move($destinationpath,$name);
	}
	if($altkategori->save())
	{
	Session::flash('message', 'Alt kategori basariyla eklendi');
	return redirect()->route('panel');	
	}
    }			
	//return redirect()->route('panel');
	}
	
	public function kullaniciguncelle($id)
	{
	$input=Request::all();
	$kullanici=kullanici::find($id);
	$kullanici->kullanici_adi=$input["kullanici_adi"];
	$kullanici->sifre=$input["sifre"];
	if($kullanici->save())
	{
	Session::flash('message', 'Güncelleme yapildi');
	}
	return redirect()->route('kullanicipanel');
	}
	
	public function ana_kguncelle($id)
	{
	$input=Request::all();
	$anakategori=anakategori::find($id);
	$anakategori->kat_adi=$input["kat_adi"];
	if($anakategori->save())
	{
	Session::flash('message','Güncelleme yapildi');
	}
	return redirect()->route('panel');
	}
	
	
	public function alt_ksil($id)
	{
	$altkategori=altkategori::find($id);
	if($altkategori->delete())
	{
	Session::flash('message','Oge Silindi');
	}
	
	return redirect()->route('panel');
	}
	
	public function alt_kguncelle($id)
	{
	$altkategori=altkategori::find($id);
	$altkategori->kat_adi=Input::get('kat_adi');
	$altkategori->ana_id=Input::get('ana_id');
	if(Input::hasFile('icon'))
	{
	File::delete(public_path().'/icons/'.$altkategori->icon);
	$file=Input::file('icon');
	$name = time() . '-' . $file->getClientOriginalName();
	$altkategori->icon=$name;
	$destinationpath=public_path().'/icons/';
	$file->move($destinationpath,$name);
	}
	if($altkategori->save())
	{
	Session::flash('message','Güncelleme yapildi');
	return redirect()->route('panel');
	}
	}
	
	public function ana_ksil($id)
	{
	$anakategori=anakategori::find($id);
	$altkategori=altkategori::where('ana_id','=',$id);
	if($anakategori->delete())
	{
	if($altkategori->delete())
	{
	Session::flash('message','Oge Silindi');
	}
	}
	return redirect()->route('panel');
	}
	
	public function kullanici_sil($id)
	{
	$kullanici=kullanici::find($id);
	if($kullanici->delete())
	{
	Session::flash('message','Kullanici Silindi');
	}
	
	return redirect()->route('kullanicipanel');
	}
	
	public function oyunekle()
	{
	$input=Request::all();
	$input['OpenModal'] = true;
	$rules=array('oyun_adi'=>'required|min:4','oyun_link'=>'required|min:20','aciklama'=>'required|min:15','kontroller'=>'required',
	'kontroller'=>'required','icon'=>'required');
	$messages = [
		'required'    => ':attribute kısmı boş bırakılamaz.',
		'min'    => ':attribute en az :min karakterden oluşmalıdır.',];
	$validator = Validator::make(Input::all(), $rules,$messages);
	if($validator->fails())
	{
		return Redirect::back()->withErrors($validator)->withInput($input);;
	}
	else{
	$oyun=new oyun;
	$oyun->oyun_adi=Input::get('oyun_adi');
	$oyun->link=Input::get('oyun_link');
	$oyun->aciklama=Input::get('aciklama');
	$oyun->kontroller=Input::get('kontroller');
	$oyun->kat_id=Input::get('kategori');
	$path=public_path().'/oyun_slider/';
	if(Input::hasFile('icon'))
	{
	$file=Input::file('icon');
	$name = time() . '-' . $file->getClientOriginalName();
	$oyun->icon=$name;
	$destinationpath=public_path().'/oyun_icon/';
	$file->move($destinationpath,$name);
	}
	if(Input::hasFile('slider1'))
	{
	$file=Input::file('slider1');
	$name = time() . '-' . $file->getClientOriginalName();
	$oyun->resim_yolu1=$name;
	$file->move($path,$name);
	}
	if(Input::hasFile('slider2'))
	{
	$file=Input::file('slider2');
	$name = time() . '-' . $file->getClientOriginalName();
	$oyun->resim_yolu2=$name;
	$file->move($path,$name);
	}
	if(Input::hasFile('slider3'))
	{
	$file=Input::file('slider3');
	$name = time() . '-' . $file->getClientOriginalName();
	$oyun->resim_yolu3=$name;
	$file->move($path,$name);
	}
	$populer=Input::get('populer');
	if($populer==null)
	{
	$oyun->populer=0;
	}
	else
	{
	$oyun->populer=Input::get('populer');
	}
	if($oyun->save())
	{
	Session::flash('message','Oyun Eklendi');
	return redirect()->route('oyunpanel');
	}
	
	}
	}
	
	public function oyunguncelle($id)
	{
	
	$oyun=oyun::find($id);
	$path=public_path().'/oyun_slider/';
	$oyun->oyun_adi=Input::get('oyun_adi');
	$oyun->link=Input::get('oyun_link');
	$oyun->aciklama=Input::get('aciklama');
	$oyun->kontroller=Input::get('kontroller');
	$oyun->kat_id=Input::get('kategori');
	if(Input::hasFile('icon'))
	{
	$file=Input::file('icon');
	$destinationpath=public_path().'/oyun_icon/';
	File::delete($destinationpath.$oyun->icon);
	$name = time() . '-' . $file->getClientOriginalName();
	$oyun->icon=$name;
	$file->move($destinationpath,$name);
	}
	if(Input::hasFile('slider1'))
	{
	$file=Input::file('slider1');
	File::delete($path.'/'.$oyun->resim_yolu1);
	$name = time() . '-' . $file->getClientOriginalName();
	$oyun->resim_yolu1=$name;
	$file->move($path,$name);
	}
	if(Input::hasFile('slider2'))
	{
	$file=Input::file('slider2');
	File::delete($path.'/'.$oyun->resim_yolu2);
	$name = time() . '-' . $file->getClientOriginalName();
	$oyun->resim_yolu2=$name;
	$file->move($path,$name);
	}
	if(Input::hasFile('slider3'))
	{
	$file=Input::file('slider3');
	File::delete($path.'/'.$oyun->resim_yolu3);
	$name = time() . '-' . $file->getClientOriginalName();
	$oyun->resim_yolu3=$name;
	$file->move($path,$name);
	}
	$oyun->populer=Input::get('populer');
	if($oyun->save())
	{
	Session::flash('message','Oyun Eklendi');
	return redirect()->route('oyunpanel');
	}
	
	
	}
	
	public function oyunsil($id)
	{
	$oyun=oyun::find($id);
	if($oyun->delete())
	{
	Session::flash('message','Oyun Silindi');
	}
	return redirect()->route('oyunpanel');
	}
	
	
	public function yorum()
	{
	$yorum=yorum::where('onay','=',0)->latest()->get();
	$oyun=oyun::all();
	return view('admin.yorum',compact('yorum','oyun'));
	}
	
	public function yorum_onay($id)
	{
	$yorum=yorum::find($id);
	$yorum->onay=Input::get('onay');
	$yorum->save();
	}
	
	public function yorum_sil($id)
	{
	$yorum=yorum::find($id);
	if($yorum->delete())
	{
	Session::flash('message','Yorum silindi');
	}
	
	
	
	
	
}
}
