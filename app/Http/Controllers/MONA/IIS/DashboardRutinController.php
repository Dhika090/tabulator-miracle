<?php

namespace App\Http\Controllers\MONA\IIS;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mona\Iis\DashboardRutinRequest;
use App\Models\Mona\Iis\DashboardRutin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardRutinController extends Controller
{

    public function index()
    {
        $tabs = [
            [
                'title' => 'Dashboard Non Rutin',
                'route' => route('dashboard-non-rutin'),
                'active' => request()->routeIs('dashboard-non-rutin'),
            ],
            [
                'title' => 'Dashboard Rutin',
                'route' => route('dashboard-rutin'),
                'active' => request()->routeIs('dashboard-rutin'),
            ],
        ];

        return view('MONA.IIS.DashboardRutin', compact('tabs'));
    }

    public function data()
    {
        $TargetPLO = DashboardRutin::select('*')
            ->select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, periode + '-01', 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }

    public function store(DashboardRutinRequest $request)
    {
        $data = $request->validated();
        $data = DashboardRutin::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    public function update(DashboardRutinRequest $request, $id)
    {
        $progress = DashboardRutin::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $target = DashboardRutin::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
