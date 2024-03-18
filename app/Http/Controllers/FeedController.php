<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    public function __invoke(Request $request)
    {
        $followingsIDs = auth()->user()->followings()->pluck('user_id');

        $ideas = Idea::WhereIn('user_id', $followingsIDs)->latest();

        if (request()->has('search')) {
            $ideas = $ideas->where('content', 'like', '%' . request()->get('search') . '%');
        }

        return view('Dashboard', [
            'ideas' => $ideas->paginate(5)
        ]);
    }
}
