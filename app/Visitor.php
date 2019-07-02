<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    //
    protected $table = 'visitors';

    public static function createViewLog($post) {
            $postsViews= new Visitor();
            $postsViews->url = \Request::url();
            $postsViews->session_id = \Request::getSession()->getId();
            $postsViews->user_id = \Auth::user()->id;
            $postsViews->ip = \Request::getClientIp();
            $postsViews->agent = \Request::header('User-Agent');
}
