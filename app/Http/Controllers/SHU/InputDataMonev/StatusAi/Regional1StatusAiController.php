<?php

namespace App\Http\Controllers\SHU\InputDataMonev\StatusAi;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHU\StatusAi\Regional1StatusAiRequest;
use App\Models\SHU\StatusAi\Regional1StatusAi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Regional1StatusAiController extends Controller
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

        return view('SHU.InputDataMonev.StatusAi.Regional1StatusAi', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Regional1StatusAiRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Regional1StatusAi::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Regional1StatusAi::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('01-', periode), 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Regional1StatusAiRequest $request, $id)
    {
        $progress = Regional1StatusAi::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Regional1StatusAi::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
