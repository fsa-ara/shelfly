<?php

namespace App\Models\Account;

use App\Models\User;
use Illuminate\Console\Attributes\Hidden;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['username', 'locale'])]
#[Hidden(['id', 'user_id'])]
class Profile extends Model
{
    /** @use HasFactory<\Database\Factories\Account\ProfileFactory> */
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
