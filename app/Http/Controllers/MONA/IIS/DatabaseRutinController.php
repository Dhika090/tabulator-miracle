<?php

namespace App\Http\Controllers\MONA\IIS;

use App\Http\Controllers\Controller;
use App\Http\Requests\MONA\Iis\DatabaseRutinRequest;
use App\Models\MONA\Iis\DatabaseRutin;
use Illuminate\Container\Attributes\Database;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DatabaseRutinController extends Controller
{
    public function index()
    {
        $tabs = [
            [
                'title' => 'Database Non Rutin',
                'route' => route('database-non-rutin'),
                'active' => request()->routeIs('database-non-rutin'),
            ],
            [
                'title' => 'Database Rutin',
                'route' => route('database-rutin'),
                'active' => request()->routeIs('database-rutin'),
            ],

        ];

        return view('MONA.IIS.DatabaseRutin', compact('tabs'));
    }

    public function data()
    {
        $TargetPLO = DatabaseRutin::select('*')
            ->select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, periode + '-01', 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }

    public function store(DatabaseRutinRequest $request)
    {
        $data = $request->validated();
        $data = DatabaseRutin::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    public function update(DatabaseRutinRequest $request, $id)
    {
        $progress = DatabaseRutin::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $target = DatabaseRutin::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
