<?php

namespace App\Http\Controllers\MONA\IIS;

use App\Http\Controllers\Controller;
use App\Http\Requests\MONA\Iis\ApkRutinRequest;
use App\Models\MONA\Iis\ApkRutin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApkRutinController extends Controller
{
    public function index()
    {
        $tabs = [
            [
                'title' => 'Apk Non Rutin',
                'route' => route('apk-non-rutin'),
                'active' => request()->routeIs('apk-non-rutin'),
            ],
            [
                'title' => 'Apk Rutin',
                'route' => route('apk-rutin'),
                'active' => request()->routeIs('apk-rutin'),
            ],

        ];

        return view('MONA.IIS.ApkRutin', compact('tabs'));
    }

    public function data()
    {
        $TargetPLO = ApkRutin::select('*')
            ->select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, periode + '-01', 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }

    public function store(ApkRutinRequest $request)
    {
        $data = $request->validated();
        $data = ApkRutin::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    public function update(ApkRutinRequest $request, $id)
    {
        $progress = ApkRutin::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $target = ApkRutin::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
