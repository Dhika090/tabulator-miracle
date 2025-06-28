<?php

namespace App\Http\Controllers\SHU\InputDataMonev\StatusAi;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHU\StatusAi\Regional3StatusAiRequest;
use App\Models\SHU\StatusAi\Regional3StatusAi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Regional3StatusAiController extends Controller
{

    public function index(Request $request)
    {
        $tabs = collect(config('shu-status-ai'))->map(function ($tab) {
            return [
                'title' => $tab['title'],
                'route' => route($tab['route']),
                'active' => request()->routeIs($tab['route']),
            ];
        });

        return view('SHU.InputDataMonev.StatusAi.Regional3StatusAi', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Regional3StatusAiRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Regional3StatusAi::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Regional3StatusAi::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('03-', periode), 320) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Regional3StatusAiRequest $request, $id)
    {
        $progress = Regional3StatusAi::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Regional3StatusAi::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
