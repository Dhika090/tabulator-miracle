<?php

namespace App\Http\Controllers\MONA\IIS;

use App\Http\Controllers\Controller;
use App\Http\Requests\MONA\Iis\BasisDataOmr3NonRutinRequest;
use App\Models\MONA\Iis\BasisDataOmr3NonRutin;
use Illuminate\Http\Request;

class BasisDataOmr3NonRutinController extends Controller
{

    public function index()
    {
        $tabs = [
            [
                'title' => 'Basisa Data OMR 3 Non Rutin',
                'route' => route('basis-data-omr-3-non-rutin'),
                'active' => request()->routeIs('basis-data-omr-3-non-rutin'),
            ],
            [
                'title' => 'Basisa Data OMR 3 Rutin',
                'route' => route('basis-data-omr-3-rutin'),
                'active' => request()->routeIs('basis-data-omr-3-rutin'),
            ],

        ];


        return view('MONA.IIS.BasisDataOmr3NonRutin', compact('tabs'));
    }

    public function data()
    {
        $TargetPLO = BasisDataOmr3NonRutin::select('*')
            ->select('*')
            // ->addSelect(DB::raw("TRY_CONVERT(DATE, periode + '-03', 320) as periode_date"))
            // ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }


    public function store(BasisDataOmr3NonRutinRequest $request)
    {
        $data = $request->validated();
        $data = BasisDataOmr3NonRutin::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    public function update(BasisDataOmr3NonRutinRequest $request, $id)
    {
        $progress = BasisDataOmr3NonRutin::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $target = BasisDataOmr3NonRutin::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
