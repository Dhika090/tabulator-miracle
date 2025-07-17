<?php

namespace App\Http\Controllers\MONA\IIS;

use App\Http\Controllers\Controller;
use App\Http\Requests\MONA\Iis\BasisDataOmr3RutinRequest;
use App\Models\MONA\Iis\BasisDataOmr3Rutin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BasisDataOmr3RutinController extends Controller
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

        return view('MONA.IIS.BasisDataOmr3Rutin', compact('tabs'));
    }

    public function data()
    {
        $TargetPLO = BasisDataOmr3Rutin::select('*')
            ->select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, periode + '-03', 320) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();
        return response()->json($TargetPLO);
    }


    public function store(BasisDataOmr3RutinRequest $request)
    {
        $data = $request->validated();
        $data = BasisDataOmr3Rutin::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    public function update(BasisDataOmr3RutinRequest $request, $id)
    {
        $progress = BasisDataOmr3Rutin::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $target = BasisDataOmr3Rutin::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
