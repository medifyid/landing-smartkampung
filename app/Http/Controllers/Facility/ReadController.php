<?php

namespace App\Http\Controllers\Facility;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ReadController extends Controller
{
    public function getFacilities(string $term = '')
    {
        try {
            $path = base_path('settings/facilites/index.json');

            if (!File::exists($path)) {
                return collect([]);
            }

            $json = File::get($path);
            $data = collect(json_decode($json));

            if (!empty($term)) {
                $term = strtolower($term);

                $data = $data->filter(function ($item) use ($term) {
                    return str_contains(strtolower($item->nama_rs), $term)
                        || str_contains(strtolower($item->keterangan), $term);
                });
            }

            return $data->values();
        } catch (\Throwable $th) {
            return collect([]);
        }
    }
}
