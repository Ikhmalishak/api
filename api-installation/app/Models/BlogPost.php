<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'body',
        'user_id',
    ];
    //relate kan dengan table lain (table user)
    public function user(){
        return $this->belongsTo(User::class);
        // nak cakap yang user ni user table punya
        //connect kan relationship ikut nama column user_id
    }
}
