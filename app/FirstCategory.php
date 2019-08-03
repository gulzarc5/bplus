<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class FirstCategory extends Model
{
	use SoftDeletes;
    protected $table = 'first_category';

    protected $fillable = [
    	'name','category_id'
    ];
    protected $primaryKey = 'id';

    public function Category()
    {
    	return $this->hasOne('App\Category','id','category_id');
    }
}
