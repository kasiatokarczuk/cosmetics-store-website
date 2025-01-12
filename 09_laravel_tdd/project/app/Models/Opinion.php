<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class Opinion extends Model
{
    protected $fillable = ['user_id', 'content'];

    protected $casts = [
        'user_id' => 'integer',
        'content' => 'string',
    ];
    /**
     * Get the user that owns the opinion.
     *
     * @return BelongsTo<User, Opinion>
     */
    public function user(): BelongsTo
    {
        /** @var BelongsTo<User, Opinion> */
        return $this->belongsTo(User::class);
    }
}
