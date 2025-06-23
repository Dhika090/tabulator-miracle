<?php

namespace App\Http\Controllers\SHU\InputDataMonev\Availability;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHU\Availability\Regional3AvailabilityRequest;
use App\Models\SHU\Availability\Regional3Availability;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Regional3AvailabilityController extends Controller
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

        return view('SHU.InputDataMonev.Availability.Regional3', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Regional3AvailabilityRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Regional3Availability::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Regional3Availability::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('03-', periode), 330) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Regional3AvailabilityRequest $request, $id)
    {
        $progress = Regional3Availability::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Regional3Availability::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
