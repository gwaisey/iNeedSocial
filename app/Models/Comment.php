<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id', 'post_id', 'body'];

    // Relasi ke User (Komentar ini milik siapa?)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Post (Komentar ini ada di postingan mana?)
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
