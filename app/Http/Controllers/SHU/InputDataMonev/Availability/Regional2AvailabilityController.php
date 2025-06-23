<?php

namespace App\Http\Controllers\SHU\InputDataMonev\Availability;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHU\Availability\Regional2AvailabilityRequest;
use App\Models\SHU\Availability\Regional2Availability;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Regional2AvailabilityController extends Controller
{
    public function index(Request $request)
    {
        $tabs = collect(config('shu-availability'))->map(function ($tab) {
            return [
                'title' => $tab['title'],
                'route' => route($tab['route']),
                'active' => request()->routeIs($tab['route']),
            ];
        });

        return view('SHU.InputDataMonev.Availability.Regional2', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Regional2AvailabilityRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Regional2Availability::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Regional2Availability::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('02-', periode), 220) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Regional2AvailabilityRequest $request, $id)
    {
        $progress = Regional2Availability::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Regional2Availability::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
