<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    use HasFactory;
    use HasFactory;
    protected $guarded = [];
    protected $table = 'articles';
    public function users() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
