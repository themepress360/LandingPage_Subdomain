<?php

namespace App;

class SubDomains extends CommonModel
{
	protected $table = 'subdomains';
	protected $guarded = [];
	static $model = 'subdomains';

    static function details($id)
	{
		 $data = static::get($id);
		 
		 if($data)
		 {
		 	return $data;
		 }
		 else
		 	return false;
	}
}
