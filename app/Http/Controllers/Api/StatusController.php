<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class StatusController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => '✅',
            'message' => 'API controller response working perfectly, Isaac!',
            'timestamp' => now()
        ]);
    }

    public function getPosts()
    {
        $posts = Post::all();

        return response()->json([
            'count' => $posts->count(),
            'data' => $posts
        ]);
    }
}

