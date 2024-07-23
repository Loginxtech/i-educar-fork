<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class UniformDistribution extends Model
{
    use SoftDeletes;

    protected $table = 'public.uniform_distributions';

    protected $casts = [
        'complete_kit' => 'boolean',
        'winter_kit' => 'boolean',
        'summer_kit' => 'boolean',
        'distribution_date' => 'date:d/m/Y',
    ];

    protected $fillable = [
        'student_id',
        'year',
        'distribution_date',
        'complete_kit',
        'winter_kit',
        'summer_kit',
        'kit_size',
        'coat_pants_qty',
        'shirt_short_qty',
        'shirt_long_qty',
        'socks_qty',
        'shorts_tactel_qty',
        'shorts_coton_qty',
        'sneakers_qty',
        'coat_pants_tm',
        'shirt_short_tm',
        'shirt_long_tm',
        'socks_tm',
        'shorts_tactel_tm',
        'shorts_coton_tm',
        'sneakers_tm',
        'school_id',
        'kids_shirt_qty',
        'kids_shirt_tm',
        'pants_jeans_qty',
        'pants_jeans_tm',
        'skirt_qty',
        'skirt_tm',
        'coat_jacket_qty',
        'coat_jacket_tm',
        'type',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(LegacyStudent::class, 'student_id');
    }

    public function school(): BelongsTo
    {
        return $this->belongsTo(LegacySchool::class, 'school_id');
    }

    public function getKitType() {
        if ($this->complete_kit) {
            return 1;
        }

        if ($this->winter_kit) {
            return 2;
        }

        if ($this->summer_kit) {
            return 3;
        }
    }

    protected function distributionDate(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => $value ? Carbon::createFromFormat('d/m/Y', $value) : null,
        );
    }
}
