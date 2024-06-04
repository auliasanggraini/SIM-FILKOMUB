<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use App\Models\Dosen;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    public function getListMataKuliah()
    {
        return response()->json(MataKuliah::with('dosens')->get());
    }

    public function createMataKuliah(Request $request)
    {
        $mataKuliah = MataKuliah::create($request->all());
        return response()->json($mataKuliah, 201);
    }

    public function getDetailMataKuliah($id)
    {
        $mataKuliah = MataKuliah::with('dosens')->find($id);
        if (is_null($mataKuliah)) {
            return response()->json(['message' => 'Mata Kuliah not found'], 404);
        }
        return response()->json($mataKuliah);
    }

    public function updateMataKuliah(Request $request, $id)
    {
        $mataKuliah = MataKuliah::find($id);
        if (is_null($mataKuliah)) {
            return response()->json(['message' => 'Mata Kuliah not found'], 404);
        }
        $mataKuliah->update($request->all());
        return response()->json($mataKuliah);
    }

    public function deleteMataKuliah($id)
    {
        $mataKuliah = MataKuliah::find($id);
        if (is_null($mataKuliah)) {
            return response()->json(['message' => 'Mata Kuliah not found'], 404);
        }
        $mataKuliah->delete();
        return response()->json(null, 204);
    }

    public function getDosenWithSameMataKuliah($mataKuliahId)
    {
        $mataKuliah = MataKuliah::with('dosens')->find($mataKuliahId);
        if (is_null($mataKuliah)) {
            return response()->json(['message' => 'Mata Kuliah not found'], 404);
        }
        return response()->json($mataKuliah->dosens);
    }

    public function getJadwalMataKuliahDosen($dosenId)
    {
        $dosen = Dosen::with('mataKuliah')->find($dosenId);
        if (is_null($dosen)) {
            return response()->json(['message' => 'Dosen not found'], 404);
        }
        return response()->json($dosen->mataKuliah);
    }
}
