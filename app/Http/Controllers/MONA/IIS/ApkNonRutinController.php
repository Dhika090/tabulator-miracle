<?php

namespace App\Http\Controllers\MONA\IIS;

use App\Http\Controllers\Controller;
use App\Http\Requests\MONA\Iis\ApkNonRutinRequest;
use App\Models\MONA\Iis\ApkNonRutin;
use Illuminate\Http\Request;

class ApkNonRutinController extends Controller
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

        return view('MONA.IIS.ApkNonRutin', compact('tabs'));
    }

    public function data()
    {
        $TargetPLO = ApkNonRutin::select('*')
            ->select('*')
            // ->addSelect(DB::raw("TRY_CONVERT(DATE, periode + '-01', 120) as periode_date"))
            // ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }


    public function store(ApkNonRutinRequest $request)
    {
        $data = $request->validated();
        $data = ApkNonRutin::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    public function update(ApkNonRutinRequest $request, $id)
    {
        $progress = ApkNonRutin::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $target = ApkNonRutin::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
