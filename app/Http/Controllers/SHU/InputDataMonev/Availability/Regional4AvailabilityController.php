<?php

namespace App\Http\Controllers\SHU\InputDataMonev\Availability;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHU\Availability\Regional4AvailabilityRequest;
use App\Models\SHU\Availability\Regional4Availability;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Regional4AvailabilityController extends Controller
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

        return view('SHU.InputDataMonev.Availability.Regional4', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Regional4AvailabilityRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Regional4Availability::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Regional4Availability::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('04-', periode), 440) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Regional4AvailabilityRequest $request, $id)
    {
        $progress = Regional4Availability::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Regional4Availability::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
