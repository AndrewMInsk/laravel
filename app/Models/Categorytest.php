<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Categorytest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Categorytest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Categorytest query()
 * @method static \Illuminate\Database\Eloquent\Builder|Categorytest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categorytest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categorytest whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categorytest whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Categorytest extends Model
{
    use HasFactory;
}
