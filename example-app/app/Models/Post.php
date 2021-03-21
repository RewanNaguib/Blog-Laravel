<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'user_id',
    ];
// law 3aiza awsl ll user 3n tare2 post 
// belongs to bta5od parameter el class ely brboto b
//d el rabta ben table el posts w table le user 

    public function user() //foreign key user_id
    {
        return $this->belongsTo(User::class);
    }
}
