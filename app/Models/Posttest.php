<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string|null $image
 * @property int|null $likes
 * @property int $is_published
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int $categorytest_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Tagtest> $tags
 * @property-read int|null $tags_count
 * @method static \Illuminate\Database\Eloquent\Builder|Posttest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Posttest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Posttest query()
 * @method static \Illuminate\Database\Eloquent\Builder|Posttest whereCategorytestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Posttest whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Posttest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Posttest whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Posttest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Posttest whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Posttest whereIsPublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Posttest whereLikes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Posttest whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Posttest whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Posttest extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function tags(): \Illuminate\Database\Eloquent\Relations\belongsToMany
    {
        return $this->belongsToMany(Tagtest::class);
    }
}
