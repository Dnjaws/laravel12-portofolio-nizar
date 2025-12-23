<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\DestinationLike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function toggle($id)
    {
        $user = Auth::user();
        $destination = Destination::findOrFail($id);

        $like = DestinationLike::where('user_id', $user->id)->where('destination_id', $destination->id)->first();

        if ($like) {
            $like->delete();
            $message = 'Unliked';
        } else {
            DestinationLike::create([
                'user_id' => $user->id,
                'destination_id' => $destination->id,
            ]);
            $message = 'Liked';
        }

        return back()->with('success', $message);
    }
}
