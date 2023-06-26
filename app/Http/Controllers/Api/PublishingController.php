<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Publishing;
use Illuminate\Http\Request;

class PublishingController extends Controller
{

    public function index()
    {
        $publishings = Publishing::orderByDesc('id')->get();
        return response()->json([
            'success' => true,
            'publishings' => $publishings
        ]);
    }
}
