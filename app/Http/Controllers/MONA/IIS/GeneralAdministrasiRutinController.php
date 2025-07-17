<?php

namespace App\Http\Controllers\MONA\IIS;

use App\Http\Controllers\Controller;
use App\Http\Requests\MONA\Iis\GeneralAdministrasiRutinRequest;
use App\Models\MONA\Iis\GeneralAdministrasiRutin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GeneralAdministrasiRutinController extends Controller
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

        return view('MONA.IIS.GeneralAdministrasiRutin', compact('tabs'));
    }

    public function data()
    {
        $TargetPLO = GeneralAdministrasiRutin::select('*')
            ->select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, periode + '-01', 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }

    public function store(GeneralAdministrasiRutinRequest $request)
    {
        $data = $request->validated();
        $data = GeneralAdministrasiRutin::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    public function update(GeneralAdministrasiRutinRequest $request, $id)
    {
        $progress = GeneralAdministrasiRutin::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $target = GeneralAdministrasiRutin::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
