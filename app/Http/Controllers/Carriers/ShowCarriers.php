<?php

namespace App\Http\Controllers\Carriers;

use App\Carrier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowCarriers extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Request $request)
    {
        $carriers = Carrier::all()->sortBy('priority')->sortBy('enabled', null, true);

        return view('carriers.show')->with('carriers', $carriers );
    }
}
