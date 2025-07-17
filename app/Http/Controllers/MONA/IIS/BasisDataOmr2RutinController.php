<?php

namespace App\Http\Controllers\MONA\IIS;

use App\Http\Controllers\Controller;
use App\Http\Requests\MONA\Iis\BasisDataOmr2RutinRequest;
use App\Models\MONA\Iis\BasisDataOmr2Rutin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BasisDataOmr2RutinController extends Controller
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

        return view('MONA.IIS.BasisDataOmr2Rutin', compact('tabs'));
    }

    public function data()
    {
        $TargetPLO = BasisDataOmr2Rutin::select('*')
            ->select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, periode + '-02', 220) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();
        return response()->json($TargetPLO);
    }


    public function store(BasisDataOmr2RutinRequest $request)
    {
        $data = $request->validated();
        $data = BasisDataOmr2Rutin::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    public function update(BasisDataOmr2RutinRequest $request, $id)
    {
        $progress = BasisDataOmr2Rutin::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $target = BasisDataOmr2Rutin::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
