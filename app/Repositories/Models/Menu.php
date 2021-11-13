<?php

namespace App\Repositories\Models;

class Menu extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'p_id',
        'title',
        'icon',
        'type',
        'href',
        'open_type',
        'sort',
        'creator_id',
        'updater_id',
    ];

    protected $casts = [
        'p_id' => 'integer',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function children()
    {
        return $this->hasMany(self::class, 'p_id', 'id')->with('children');
    }
}
