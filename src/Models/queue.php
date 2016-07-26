<?php
namespace stphpschedule\Model;

use Illuminate\Database\Eloquent\Model as Model;

class Queue extends Model
{
	public $timestamps = false;
	protected $table = 'QUEUE';

}

?>