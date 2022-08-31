<?php

namespace App\View\Composers;

use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class SidebarComposer {
    public function compose(View $view) {
        $table = DB::table('current_seasons')->orderBy('points', 'desc')->orderBy('goals', 'desc')->limit(6)->get();
        $matches = DB::table('match_lists')->where('date', '>', date('Y-m-d'))->orderBy('date')->limit(4)->get();
        $lastMatch = DB::table('match_lists')->where('date', '<=', date('Y-m-d'))->orderBy('date', 'desc')->limit(1)->get();
        $round = DB::table('rounds')->get();
        $fact = $this->getFact();
        $view->with('table', $table)->with('matches', $matches)->with('round', $round)->with('last_match', $lastMatch)->with('fact', $fact);
    }

    public function getFact() {
        $factWithDate = DB::table('fun_facts')->where('date', date('Y-m-d'))->first();

        if($factWithDate == null)
            return DB::table('fun_facts')->inRandomOrder()->first();
        else
            return $factWithDate;
    }
}
