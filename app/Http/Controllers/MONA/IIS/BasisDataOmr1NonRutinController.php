<?php

namespace App\Http\Controllers\MONA\IIS;

use App\Http\Controllers\Controller;
use App\Http\Requests\MONA\Iis\BasisDataOmr1NonRutinRequest;
use App\Models\MONA\Iis\BasisDataOmr1NonRutin;
use Illuminate\Http\Request;

class BasisDataOmr1NonRutinController extends Controller
{

    public function index()
    {
        $tabs = [
            [
                'title' => 'Basisa Data OMR 1 Non Rutin',
                'route' => route('basis-data-omr-1-non-rutin'),
                'active' => request()->routeIs('basis-data-omr-1-non-rutin'),
            ],
            [
                'title' => 'Basisa Data OMR 1 Rutin',
                'route' => route('basis-data-omr-1-rutin'),
                'active' => request()->routeIs('basis-data-omr-1-rutin'),
            ],

        ];


        return view('MONA.IIS.BasisDataOmr1NonRutin', compact('tabs'));
    }

    public function data()
    {
        $TargetPLO = BasisDataOmr1NonRutin::select('*')
            ->select('*')
            // ->addSelect(DB::raw("TRY_CONVERT(DATE, periode + '-01', 120) as periode_date"))
            // ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }


    public function store(BasisDataOmr1NonRutinRequest $request)
    {
        $data = $request->validated();
        $data = BasisDataOmr1NonRutin::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    public function update(BasisDataOmr1NonRutinRequest $request, $id)
    {
        $progress = BasisDataOmr1NonRutin::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $target = BasisDataOmr1NonRutin::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
