<?php 
namespace stphpschedule\Model;

use Illuminate\Database\Eloquent\Model as Model;

class Jobs extends Model
{
	public $timestamps = false;
	protected $table = 'JOBS';
}

?>