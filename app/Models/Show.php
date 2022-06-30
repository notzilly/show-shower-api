<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
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
     * Returns credits
     */
    public function credits()
    {
        return $this->hasMany(Credit::class, 'title_id');
    }
}
