<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Unique;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class PostDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->where('author_id', Auth::user()->id)->paginate(5);
        if (request('keyword')) {
            $posts->where('title', 'like', '%' . request('keyword') . '%');
        }
        return view('bloglist.index', ['title' => 'Your Posts'], ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        echo view('bloglist.create', ['title' => 'Your Posts']);
    }


    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required|unique:posts',
                'category_id' => 'required',
                'content' => 'required|min:30'
                // 'postimage' => 'nullable|image|mimes:jpg,jpeg,webp,png|max:6144'
            ]
        );
        // $path = null;
        // if ($request->hasFile('postimage')) {
        //     $path =  $request->file('postimage')->store('post', 'public');
        // }
        Post::create([
            'title' => $request->title,
            'author_id' => Auth::user()->id,
            'category_id' => $request->category_id,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            // 'postimage' => $path
        ]);
        return redirect('/my-blog');
    }


    // public function upload(Request $request)
    // {
    //     //
    // }
    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('bloglist.show', ['title' => $post->title, 'post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('bloglist.edit', ['title' =>  '', 'post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|unique:posts,title,' . $post->id,
            'category_id' => 'required',
            'content' => 'required',
            // 'postimage'   => 'nullable|image|mimes:jpg,jpeg,webp,png|max:6144',
        ]);
        // $path = null;
        // if ($request->hasFile('postimage')) {
        //     $path = $request->file('postimage')->store('post', 'public');
        // }
        $post->update([
            'title' => $request->title,
            'author_id' => Auth::user()->id,
            'category_id' => $request->category_id,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            //   'postimage' => $path
        ]);
        // if ($request->hasFile('postimage')) {
        //     if ($post->postimage && Storage::disk('public')->exists($post->postimage)) {
        //         Storage::disk('public')->delete($post->postimage);
        //     }
        //     $data['postimage'] = $request->file('postimage')->store('post', 'public');
        // }
        $post->update();

        return redirect('/my-blog')->with(['{success}' => 'Your post has been Updated!']);
    }

    // public function postimage(Request $request)
    // {
    //     if ($request->hasFile('postimage')) {
    //         $path =  $request->file('postimage')->store('post', 'public');
    //     }
    //     return $path;
    // }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/my-blog')->with(['{*}' => 'Your post has been deleted!']);
    }
}
