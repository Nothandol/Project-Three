<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    //Table Name
    protected $table = 'uploads';

    //primary key
    public $primaryKey = 'id';

    //Timestamps
    public $timestamps = true;

    //Single upload belongs to user
    public function user(){
        return $this ->belongsTo(App\User);
    }
}
