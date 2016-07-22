<?php
namespace BL00B1RD\Model;

use Illuminate\Database\Eloquent\Model as Model;

class Pages extends Model
{
	public $timestamps = false;
	
	public function scopeListPageTitles($query)
    {
        return $query->where('title', 'LIKE', '...%');
    }
}

?>