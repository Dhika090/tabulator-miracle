<?php

namespace App\Http\Controllers\SHRNP\InputDataMonev\Balongan;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHRNP\Balongan\RencanaPemeliharaanBalonganRequest;
use App\Models\SHRNP\Balongan\RencanaPemeliharaanBalongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RencanaPemeliharaanBalonganController extends Controller
{

    public function index(Request $request)
    {
        $tabs = collect(config('shrnp-balongan'))->map(function ($tab) {
            return [
                'title' => $tab['title'],
                'route' => route($tab['route']),
                'active' => request()->routeIs($tab['route']),
            ];
        });

        return view('SHRNP.InputDataMonev.Balongan.RencanaPemeliharaanBalongan', [
            'tabs' => $tabs,

        ]);
    }

    public function store(RencanaPemeliharaanBalonganRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = RencanaPemeliharaanBalongan::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = RencanaPemeliharaanBalongan::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('01-', periode), 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(RencanaPemeliharaanBalonganRequest $request, $id)
    {
        $progress = RencanaPemeliharaanBalongan::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = RencanaPemeliharaanBalongan::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
