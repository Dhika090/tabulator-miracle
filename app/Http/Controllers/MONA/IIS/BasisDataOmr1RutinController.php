<?php

namespace App\Http\Controllers\MONA\IIS;

use App\Http\Controllers\Controller;
use App\Http\Requests\MONA\Iis\BasisDataOmr1RutinRequest;
use App\Models\MONA\Iis\BasisDataOmr1Rutin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BasisDataOmr1RutinController extends Controller
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

        return view('MONA.IIS.BasisDataOmr1Rutin', compact('tabs'));
    }

    public function data()
    {
        $TargetPLO = BasisDataOmr1Rutin::select('*')
            ->select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, periode + '-01', 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();
        return response()->json($TargetPLO);
    }


    public function store(BasisDataOmr1RutinRequest $request)
    {
        $data = $request->validated();
        $data = BasisDataOmr1Rutin::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    public function update(BasisDataOmr1RutinRequest $request, $id)
    {
        $progress = BasisDataOmr1Rutin::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $target = BasisDataOmr1Rutin::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
