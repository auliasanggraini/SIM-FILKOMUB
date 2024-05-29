<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function getListDataDosen()
    {
        return response()->json(Dosen::all());
    }

    public function createDataDosen(Request $request)
    {
        $dosen = Dosen::create($request->all());
        return response()->json($dosen, 201);
    }

    public function getDetailDataDosen($id)
    {
        $dosen = Dosen::find($id);
        if (is_null($dosen)) {
            return response()->json(['message' => 'Dosen not found'], 404);
        }
        return response()->json($dosen);
    }

    public function updateDataDosen(Request $request, $id)
    {
        $dosen = Dosen::find($id);
        if (is_null($dosen)) {
            return response()->json(['message' => 'Dosen not found'], 404);
        }
        $dosen->update($request->all());
        return response()->json($dosen);
    }

    public function deleteDataDosen($id)
    {
        $dosen = Dosen::find($id);
        if (is_null($dosen)) {
            return response()->json(['message' => 'Dosen not found'], 404);
        }
        $dosen->delete();
        return response()->json(null, 204);
    }
}
