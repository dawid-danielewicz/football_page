<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Models\Article;

class IndexRepository
{
    public function getSlot($value) {
        $article = null;
        $slot = DB::table('options')->where('name', '=', $value)->first();
        if($slot != null)
            return Article::findOrFail($slot->id);
    }
}
