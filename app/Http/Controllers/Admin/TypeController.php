<?php

namespace App\Http\Controllers\Admin;

use App\Models\Type;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $types = Type::all();
        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTypeRequest $request)
    {
        $val_data = $request->validated();

        $slug = Str::slug($request->name);
        $val_data['slug'] = $slug;

        $slug = Type::generateSlug($val_data['name']);

        if ($request->hasFile('image')) {
            $image_path = Storage::put('public/uploads', $request->image);
            $val_data['image'] = $image_path;
        }

        Type::create($val_data);

        return to_route('admin.types.index')->with('message', 'Type created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {

        return view('admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTypeRequest  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTypeRequest $request, Type $type)
    {
        $val_data = $request->validated();

        $slug = Str::slug($request->name);

        $val_data['slug'] = $slug;

        $slug = Type::generateSlug($val_data['name']);

        if ($request->hasFIle('image')) {
            if ($type->image) {
                Storage::delete($type->image);
            }

            $image_path = Storage::put('public/uploads', $request->image);
            $val_data['image'] = $image_path;
        }
        $type->update($val_data);
        return to_route('admin.types.index')->with('message', 'Type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {

        if ($type->image) {
            Storage::delete($type->image);
        };

        $type->delete();
        return to_route('admin.types.index')->with('message', 'Type deleted successfully');
    }
}
