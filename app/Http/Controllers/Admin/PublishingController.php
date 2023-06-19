<?php

namespace App\Http\Controllers\Admin;

use App\Models\Publishing;
use App\Http\Requests\StorePublishingRequest;
use App\Http\Requests\UpdatePublishingRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PublishingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publishings = Publishing::all();
        return view('admin.publishings.index', compact('publishings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.publishings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePublishingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePublishingRequest $request)
    {
        $val_data = $request->validated();
        $slug = Publishing::generateSlug($val_data['name']);
        if ($request->hasFile('image')) {
            $image_path = Storage::put('uploads', $request->image);
            $val_data['image'] = $image_path;
        }

        Publishing::create($val_data);
        return to_route('admin.publishings.index')->with('message', 'Publishing Project created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Publishing  $publishing
     * @return \Illuminate\Http\Response
     */
    public function show(Publishing $publishing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Publishing  $publishing
     * @return \Illuminate\Http\Response
     */
    public function edit(Publishing $publishing)
    {
        return view('admin.publishings.edit', compact('publishing'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePublishingRequest  $request
     * @param  \App\Models\Publishing  $publishing
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePublishingRequest $request, Publishing $publishing)
    {
        $val_date = $request->valideted();
        $slug = Str::slug($request->name);

        $val_data['slug'] = $slug;

        $slug = Publishing::generateSlug($val_data['name']);

        if ($request->hasFIle('image')) {
            if ($publishing->image) {
                Storage::delete($publishing->image);
            }

            $image_path = Storage::put('uploads', $request->image);
            $val_data['image'] = $image_path;
        }

        $publishing->update($val_data);
        return to_route('admin.publishings.index')->with('message', 'Publishing projects updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Publishing  $publishing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publishing $publishing)
    {
        if ($publishing->image) {
            Storage::delete($publishing->image);
        }

        $publishing->delete();
        return to_route('admin.publishings.index')->with('message', 'Publishing Project deleted successfully');
    }
}
