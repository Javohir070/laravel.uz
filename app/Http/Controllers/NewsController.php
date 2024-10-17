<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use \Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $yangiliklar = News::paginate(20);

        return view('admin.news.index', ['yangiliklar'=>$yangiliklar]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNewsRequest $request)
    {
        // if ($request->hasFile('image')) {
        //     $name = $request->file('image')->getClientOriginalName();
        //     $path = $request->file('image')->storeAs('yangiliklar', $name);
        // }
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/yangiliklar');
        }
        News::create([
            "title" => $request->title,
            "is_active" => $request->is_active,
            "descriptions" => $request->descriptions,
            "image" => $imagePath ? Storage::url($imagePath) : "yo'q",
        ]);

        return redirect()->route("news.index")->with('status', "Ma'lumotlar muvaffaqiyatli qo'shildi.");
        
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', ['news'=>$news]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNewsRequest $request, News $news)
    {
        // if ($request->hasFile('image')) {
        //     $name = $request->file('image')->getClientOriginalName();
        //     $path = $request->file('image')->storeAs('yangiliklar', $name);
        // }
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/yangiliklar');
        }

        $news->update([
            "title" => $request->title,
            "is_active" => $request->is_active,
            "descriptions" => $request->descriptions,
            "image" => $imagePath ? Storage::url($imagePath) : "yo'q",
        ]);

        return redirect()->route("news.index")->with('status', "Ma'lumotlar muvaffaqiyatli tahrirlandi.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        if(isset($news->image)){
            Storage::delete($news->image);
        }

        $news->delete();
        
        return redirect()->back()->with('status', 'Ma\'lumotlar muvaffaqiyatli o"chirildi.');

    }
}
