<?php

namespace App\Http\Controllers;

use App\Models\Article;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = Article::all();
        return view('article.index', compact('article'));

    }
    
      

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $article = Article::all();
        $user = User::all();
        return view('article.create', compact('article', 'category', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required',
            'categoryid' => 'required',
            'userid' => 'required',
        ],
        [
            'title.required' => 'Title is required',
            'content.required' => 'Content is required',
            'image.required' => 'Image is required',
            'category_id.required' => 'Category is required',
            'userid.required' => 'User is required',
        ]);
        
        // image
        $img = $request->file('image'); //mengambil file dari form
        $filename = time() . "_" . $img->getClientOriginalName(); //mengambil dan mengedit nama file dari form
        $img->move('img', $filename); //proses memasukkan image ke dalam direktori laravel

        Article ::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $filename,
            'category_id' => $request->categoryid,
            'user_id' => $request->userid,
        ]);

        return redirect('api/articles')->with('success', 'Article has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)

    
    {
        $category = Category::all();
        $user = User::all();
        return view('article.update', compact('article', 'category', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        // return $request;
        request()->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required',
            'categoryid' => 'required',
            'userid' => 'required',
        ],
        [
            'title.required' => 'Title is required',
            'content.required' => 'Content is required',
            'image.required' => 'Image is required',
            'categoryid.required' => 'Category is required',
            'userid.required' => 'User is required',
        ]);
        if ($request->image != null) {
            $img = $request->file('image'); //mengambil dari form
            $filename = time() . "_" . $img->getClientOriginalName();
            $img->move('img', $filename);
            Article::where('id', $article->id)->update(
                [
                    'title' => $request->title,
                    'content' => $request->content,
                    'image' => $filename,
                    'category_id' => $request->categoryid,
                    'user_id' => $request->userid,
                ]
            );
        } else {
            Article::where('id', $article->id)->update(
                [
                    'title' => $request->title,
                    'content' => $request->content,
                    'category_id' => $request->categoryid,
                    'user_id' => $request->userid,

                ]
            );
        }

        return redirect('api/articles')->with('success', 'Article has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        Article::destroy($article->id);
        return redirect('api/articles')->with('success', 'Article has been deleted');

    }
}
