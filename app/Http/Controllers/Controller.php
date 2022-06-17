<?php

namespace App\Http\Controllers;

use App\Jobs\SaveData;
use App\Models\Data;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Str;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function store() {
        $data = [];
        $data['hash'] = base64_encode(Str::random(100));

        $response = Data::create($data);

        broadcast(new SaveData($response));

        return response()->json($response);
    }
}
