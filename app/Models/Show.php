<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The data type of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['credits'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'type',
        'description',
        'release_year',
        'age_certification',
        'runtime',
        'genres',
        'production_countries',
        'seasons',
        'imdb_id',
        'imdb_score',
        'imdb_votes',
        'tmdb_popularity',
        'tmdb_score',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'id' => 'string',
        'imdb_score' => 'float',
        'tmdb_popularity' => 'float',
        'tmdb_score' => 'float',
    ];

    /**
     * Returns credits of show
     */
    public function credits()
    {
        return $this->hasMany(Credit::class, 'title_id');
    }
}
