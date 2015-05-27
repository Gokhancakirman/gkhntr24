<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class yorum extends Model {

	protected $fillable=[
	'yorum',
	'ad',
	'yorum_id',
	'onay',
	];
}
