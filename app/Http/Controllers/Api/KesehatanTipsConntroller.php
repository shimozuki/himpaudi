<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kesehatantips;
use Illuminate\Http\Request;

class KesehatanTipsConntroller extends Controller
{
    public function get_data_banner()
    {
        $data = Kesehatantips::where('tipe', 'banner')->get();

        return response()->json([
            'status' => 'success',
            'data' => $data,
            'message' => 'Data banner berhasil diambil',
        ]);
    }

    public function get_data_list()
    {
        $data = Kesehatantips::where('tipe', 'list')->get();

        return response()->json([
            'status' => 'success',
            'data' => $data,
            'message' => 'Data list berhasil diambil',
        ]);
    }
}
