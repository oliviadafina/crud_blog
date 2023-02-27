<?php

namespace App\Http\Controllers;

use App\Models\PostModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {

        if((Auth()->user()->role == "Administrator") || (Auth()->user()->role == "Operator"))
        {
            return view('posts.index', [
                'title'     => 'Main Page Admin',
                'posts'     => PostModel::all()
            ]);
        }else{

            return view('posts.index', [
                'title'     => 'Main Page',
                'posts'     => PostModel::where('user_id', Auth()->user()->id)->get()
            ]);
        }
    }

    public function create()
    {
        $data = [
            'title' => 'CRUD | CREATE'
        ];
        return view('posts.create', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'     => 'required|string|max:155',
            'content'   => 'required',
            'status'    => 'required'
        ]);

        $post = PostModel::create([
            'title'     => $request->title,
            'content'   => $request->content,
            'status'    => $request->status,
            'slug'      => Str::slug($request->title),
            'user_id'   => Auth()->user()->id
        ]);

        if ($post) {
            return redirect()
                ->route('post.index')
                ->with([
                    'success' => 'New post has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }

    // UPDATE
    public function edit($id)
    {
        $post = PostModel::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'     => 'required|string|max:155',
            'content'   => 'required',
            'status'    => 'required'
        ]);

        $post = PostModel::findOrFail($id);

        $post->update([
            'title'     => $request->title,
            'content'   => $request->content,
            'status'    => $request->status,
            'slug'      => Str::slug($request->title)
        ]);

        if ($post) {
            return redirect()
                ->route('post.index')
                ->with([
                    'success' => 'Post has been updated successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem has occured, please try again'
                ]);
        }
    }

    // DELETE
    public function destroy($id)
    {
        $post = PostModel::findOrFail($id);
        $post->delete();

        if ($post) {
            return redirect()
                ->route('post.index')
                ->with([
                    'success' => 'Post has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('post.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
