<?php

namespace App\Http\Controllers\MONA\IIS;

use App\Http\Controllers\Controller;
use App\Http\Requests\MONA\Iis\BasisDataOmr2NonRutinRequest;
use App\Models\MONA\Iis\BasisDataOmr2NonRutin;
use Illuminate\Http\Request;

class BasisDataOmr2NonRutinController extends Controller
{

    public function index()
    {
        $tabs = [
            [
                'title' => 'Basisa Data OMR 2 Non Rutin',
                'route' => route('basis-data-omr-2-non-rutin'),
                'active' => request()->routeIs('basis-data-omr-2-non-rutin'),
            ],
            [
                'title' => 'Basisa Data OMR 2 Rutin',
                'route' => route('basis-data-omr-2-rutin'),
                'active' => request()->routeIs('basis-data-omr-2-rutin'),
            ],

        ];


        return view('MONA.IIS.BasisDataOmr2NonRutin', compact('tabs'));
    }

    public function data()
    {
        $TargetPLO = BasisDataOmr2NonRutin::select('*')
            ->select('*')
            // ->addSelect(DB::raw("TRY_CONVERT(DATE, periode + '-02', 220) as periode_date"))
            // ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }


    public function store(BasisDataOmr2NonRutinRequest $request)
    {
        $data = $request->validated();
        $data = BasisDataOmr2NonRutin::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    public function update(BasisDataOmr2NonRutinRequest $request, $id)
    {
        $progress = BasisDataOmr2NonRutin::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $target = BasisDataOmr2NonRutin::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
