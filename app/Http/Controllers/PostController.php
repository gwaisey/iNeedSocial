<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Like;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user'])
            ->withCount('likes')
            ->latest()
            ->get()
            ->map(function ($post) {
                return array_merge($post->toArray(), [
                    'is_liked' => $post->likes()->where('user_id', Auth::id())->exists(),
                ]);
            });

        return Inertia::render('Dashboard', [
            'posts' => $posts
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:5120',
            'caption' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('posts', 'public');

            $request->user()->posts()->create([
                'image_path' => '/storage/' . $path,
                'caption' => $request->caption,
            ]);

            return redirect()->route('dashboard');
        }

        return back()->with('error', 'Gagal upload foto.');
    }

    public function toggleLike(Post $post)
    {
        $like = $post->likes()->where('user_id', Auth::id())->first();

        if ($like) {
            $like->delete();
        } else {
            $post->likes()->create([
                'user_id' => Auth::id()
            ]);
        }

        return back();
    }

    public function profile()
    {
        $user = Auth::user();
        $posts = Post::where('user_id', $user->id)
            ->withCount('likes')
            ->latest()
            ->get();

        return Inertia::render('Profile/Show', [
            'user' => $user,
            'posts' => $posts,
            'postsCount' => $posts->count()
        ]);
    }
}
