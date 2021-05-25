<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = "post";
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    /*protected $fillable = [
        'title',
        'content'
    ];*/
    protected $fillable = [ 'title', 'content' ];

    public function poster(){
        return $this->belongsTo(User::class);
    }

}
