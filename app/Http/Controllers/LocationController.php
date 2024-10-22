<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $locations = [
            [
                'code' => 1,
                'name' => 'Sede Central',
                'image' => 'https://example.com/images/sede1.png',
                'creationDate' => '2020-01-01',
            ],
            [
                'code' => 2,
                'name' => 'Sede Norte',
                'image' => 'https://example.com/images/sede2.png',
                'creationDate' => '2021-05-15',
            ],
        ];

        return response()->json($locations, 200);
    }
}
