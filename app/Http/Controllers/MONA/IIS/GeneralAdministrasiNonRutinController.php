<?php

namespace App\Http\Controllers\MONA\IIS;

use App\Http\Controllers\Controller;
use App\Http\Requests\MONA\Iis\GeneralAdministrasiNonRutinRequest;
use App\Models\MONA\Iis\GeneralAdministrasiNonRutin;
use Illuminate\Http\Request;

class GeneralAdministrasiNonRutinController extends Controller
{

    public function index()
    {
        $tabs = [
            [
                'title' => 'GeneralAdministrasi Non Rutin',
                'route' => route('general-administrasi-non-rutin'),
                'active' => request()->routeIs('general-administrasi-non-rutin'),
            ],
            [
                'title' => 'GeneralAdministrasi Rutin',
                'route' => route('general-administrasi-rutin'),
                'active' => request()->routeIs('general-administrasi-rutin'),
            ],

        ];

        return view('MONA.IIS.GeneralAdministrasiNonRutin', compact('tabs'));
    }

    public function data()
    {
        $TargetPLO = GeneralAdministrasiNonRutin::select('*')
            ->select('*')
            // ->addSelect(DB::raw("TRY_CONVERT(DATE, periode + '-01', 120) as periode_date"))
            // ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }

    public function store(GeneralAdministrasiNonRutinRequest $request)
    {
        $data = $request->validated();
        $data = GeneralAdministrasiNonRutin::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    public function update(GeneralAdministrasiNonRutinRequest $request, $id)
    {
        $progress = GeneralAdministrasiNonRutin::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $target = GeneralAdministrasiNonRutin::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
