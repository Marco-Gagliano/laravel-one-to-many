<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{

    protected $fillable = [
        'title',
        'slug',
        'description'
    ];

    public static function generateSlug($title){

        $slug = Str::slug($title, '-');
        $slug_base = $slug;

        // cerco l'esistenza dello "slug"
        $actual_post = Post::where('slug', $slug)->first();
        $counter = 1;

        // se lo trovo, ne genero uno univoco con un contatore
        while($actual_post){
            $slug = $slug_base . '-' . $counter;
            $counter++;
            $actual_post = Post::where('slug', $slug)->first();
        }

        return $slug;
    }
}
