<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasUuid;
    protected $fillable = [
        'uuid',
        'from',
        'to',
        'cinema_id',
        'movie_id'
    ];

    public function cinema()
    {
        return $this->belongsTo(Cinema::class)->with('city');
    }

    public function movie(): BelongsTo
    {
        return $this->belongsTo(Movie::class);
    }

    public function tickets(): HasMany
    {
        return $this->HasMany(Ticket::class);
    }
}
