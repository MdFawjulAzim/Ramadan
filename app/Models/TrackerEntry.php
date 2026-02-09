<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TrackerEntry extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'day',
        'fajr',
        'zuhr',
        'asr',
        'maghrib',
        'esha',
        'taraweeh',
        'quran_tilawat',
        'hadith',
        'sadka',
        'durood',
        'istigfaar',
        'dua',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'fajr' => 'boolean',
            'zuhr' => 'boolean',
            'asr' => 'boolean',
            'maghrib' => 'boolean',
            'esha' => 'boolean',
            'taraweeh' => 'boolean',
            'hadith' => 'boolean',
            'sadka' => 'boolean',
            'durood' => 'boolean',
            'istigfaar' => 'boolean',
            'dua' => 'boolean',
        ];
    }

    /**
     * Get the user that owns the tracker entry.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
