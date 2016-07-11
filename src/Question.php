<?php namespace mnshankar\civics;

use Illuminate\Database\Eloquent\Model;

class Question extends Model {

    protected $fillable=['id','question','answer','extra'];
    //we use a local sqlite database identified by civics_sqlite
    protected $connection = 'civics_sqlite';

}
