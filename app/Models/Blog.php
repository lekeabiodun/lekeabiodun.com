<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;

    public static function getAllBlog()
    {
        $filenames = collect(File::allFiles(resource_path('blog')))
            ->sortByDesc(function ($file) {
                return $file->getBaseName();
            })
            ->map(function ($file) {
                return YamlFrontMatter::parse(file_get_contents(resource_path('blog/' . $file->getBaseName())));
            });

        return $filenames;
    }

    public static function getSingleBlog($slug)
    {
        $file = resource_path('blog/'.$slug.'.md');

        if(!file_exists($file)) abort(404);

        $post = YamlFrontMatter::parse(file_get_contents($file));

        return $post;
    }
}
