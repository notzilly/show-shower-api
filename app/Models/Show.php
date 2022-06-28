<?php

namespace App\Models;

class Show
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
        'email_verified_at' => 'datetime',
    ];
}
