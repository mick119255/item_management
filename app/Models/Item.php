<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'name',
        'type',
        'detail',
    ];

    public const TYPES = [
        '1'=> 'トップス',
        '2'=>  'ボトムス',
        '3'=>  'アウター',
        '4'=>  'インナー',
        '5'=>  'アクセサリー',
        '6'=>  'その他',
    ];

  

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
    ];
}
