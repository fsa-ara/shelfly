<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['locale', 'name'])]
#[Hidden(['id', 'category_id'])]
class CategoryTranslation extends Model
{
    /** @use HasFactory<\Database\Factories\Inventory\CategoryTranslationFactory> */
    use HasFactory;

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
