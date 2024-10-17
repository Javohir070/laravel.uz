<?php

namespace App\Http\Controllers;

use App\Models\Annoucement;
use App\Http\Requests\StoreAnnoucementRequest;
use App\Http\Requests\UpdateAnnoucementRequest;
use Illuminate\Support\Facades\Storage;

class AnnoucementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tanlovs = Annoucement::paginate(25);

        return view('admin.tanlovlar.index', ['tanlovs' => $tanlovs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tanlovlar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAnnoucementRequest $request)
    {
        if ($request->hasFile('image')) {
            $name = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('Tanlovlar', $name);
        }

        Annoucement::create([
            "title" => $request->title,
            "start_date" => $request->start_date,
            "end_date" => $request->end_date,
            "status" => $request->status,
            "is_active" => $request->is_active,
            "descriptions" => $request->descriptions,
            "image" => $path ?? "yo'q",
        ]);

        return redirect()->route("annoucement.index")->with('status', "Ma'lumotlar muvaffaqiyatli qo'shildi.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Annoucement $annoucement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Annoucement $annoucement)
    {
        return view('admin.tanlovlar.edit', ['annoucement'=>$annoucement]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAnnoucementRequest $request, Annoucement $annoucement)
    {
        $annoucement->update([
            "title" => $request->title,
            "start_date" => $request->start_date,
            "end_date" => $request->end_date,
            "status" => $request->status,
            "is_active" => $request->is_active,
            "descriptions" => $request->descriptions
        ]);

        return redirect()->route("annoucement.index")->with('status', "Ma'lumotlar muvaffaqiyatli yangilandi.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Annoucement $annoucement)
    {
        if(isset($annoucement->image)){
            Storage::delete($annoucement->image);
        }

        $annoucement->delete();

        return redirect()->back()->with('status', 'Ma\'lumotlar muvaffaqiyatli o"chirildi.');
    }
}
