<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  array of tags $tags
     * @return array
     */
    public function store($tags)
    {
        foreach ($tags as $tag) {
            $tag = trim($tag);
            if ($tag == '') {
                continue;
            }
            $firstTag = Tag::firstOrCreate(['name' => $tag]);
            $tagIds[] = $firstTag->id;
        }
        return $tagIds;
    }

    /**
     * get all resource in stored in database.
     *
     * @return array
     */
    public function get()
    {
        return Tag::get()->pluck('name', 'id');
    }
}
