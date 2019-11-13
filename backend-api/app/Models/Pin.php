<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Pin extends Model
{
    use CustomID;

    protected $table = 'pins';
    protected $primaryKey = "id";
    public $incrementing = false;


    protected $fillable = [
        'id',
        'user_id',
        'name',
        'description',
        'content'
    ];

}
