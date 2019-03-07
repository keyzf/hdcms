<?php

namespace App\Http\Controllers\Front;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FollowController extends Controller
{
    /**
     * 关注与取消关注
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function make(User $user)
    {
        if ($user->hasFans(auth()->user())) {
            $user->fans()->detach([auth()->id()]);
            return back()->with('关注已取消');
        } else {
            $user->fans()->attach(
                auth()->id(), ['site_id' => \site()['id'], 'module_id' => \module()['id']]);
            return back()->with('关注成功');
        }
    }
}
