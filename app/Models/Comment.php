<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * Contendrá los campos en los que podremos guardar información de forma masiva.
     *
     * @var array
     */
    protected $fillable = [
        'comment', 'user_id', 'post_id'
    ];

    /**
     * Crea la relación con user
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Crea la relación con post
     *
     * @return void
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
