<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\CommonTrait;

class Company extends Model
{
	use CommonTrait;
    //
    protected $fillable = ["name", "website", "email", "logo"];

    public function getLogoPublicUrlAttribute()
    {
    	if ($this->logo) {
    		return $this->getPath($this->logo, 'public/company');
    	}
    	return $this->getDefaultImagePath();
    }
}
