<?php namespace App;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;


class kullanici extends Model implements AuthenticatableContract {
	use Authenticatable;
	//
	protected $fillable=[
	'username',
	'password'
	];

}
