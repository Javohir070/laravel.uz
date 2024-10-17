<?php

namespace App\Http\Controllers;

use App\Models\Responsible;
use App\Http\Requests\StoreResponsibleRequest;
use App\Http\Requests\UpdateResponsibleRequest;
use Illuminate\Support\Facades\Storage;

class ResponsibleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $masullar = Responsible::paginate(20);

        return view('admin.masullar.index', ['masullar'=> $masullar]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.masullar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreResponsibleRequest $request)
    {
        if($request->hasFile('image')){
            $name = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('masullar', $name);
        }

        Responsible::create([
           "department" => $request->department,
           "fish" => $request->fish,
           "position" => $request->position,
           "phone" => $request->phone,
           "email" => $request->email,
           "image" => $path ?? "yo'q",
        ]);

        return redirect()->route('responsible.index')->with('status', "Ma'lumotlar muvaffaqiyatli qo'shildi.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Responsible $responsible)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Responsible $responsible)
    {
        return view('admin.masullar.edit', ['responsible'=>$responsible]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateResponsibleRequest $request, Responsible $responsible)
    {
       if ($request->hasFile('image')) {
           $name = $request->file('image')->getClientOriginalName();
           $path = $request->file('image')->storeAs('masullar', $name);
       }

        $responsible->update([
           "department" => $request->department,
           "fish" => $request->fish,
           "position" => $request->position,
           "phone" => $request->phone,
           "email" => $request->email,
           "image" => $path ?? "yo'q",
        ]);

        return redirect()->route('responsible.index')->with('status', 'Ma\'lumotlar muvaffaqiyatli yangilandi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Responsible $responsible)
    {
        if(isset($responsible->image)){
            Storage::delete($responsible->image);
        }

        $responsible->delete();

        return redirect()->back()->with('status', 'Ma\'lumotlar muvaffaqiyatli o"chirildi.');
    }
}
