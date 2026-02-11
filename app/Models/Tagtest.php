<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Posttest> $posts
 * @property-read int|null $posts_count
 * @method static \Illuminate\Database\Eloquent\Builder|Tagtest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tagtest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tagtest query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tagtest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tagtest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tagtest whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tagtest whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Tagtest extends Model
{
    use HasFactory;
    public function posts(): \Illuminate\Database\Eloquent\Relations\belongsToMany
    {
        return $this->belongsToMany(Posttest::class);
    }
}
