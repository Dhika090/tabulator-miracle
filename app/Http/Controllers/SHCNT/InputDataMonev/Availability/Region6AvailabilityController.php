<?php

namespace App\Http\Controllers\SHCNT\InputDataMonev\Availability;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHCNT\Availability\Region6AvailabilityRequest;
use App\Models\SHCNT\Availability\Region6Availability;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Region6AvailabilityController extends Controller
{
    public function index(Request $request)
    {
        $tabs = collect(config('shcnt-availability'))->map(function ($tab) {
            return [
                'title' => $tab['title'],
                'route' => route($tab['route']),
                'active' => request()->routeIs($tab['route']),
            ];
        });

        return view('SHCNT.InputDataMonev.Availability.Region6', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Region6AvailabilityRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Region6Availability::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Region6Availability::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('06-', periode), 660) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Region6AvailabilityRequest $request, $id)
    {
        $progress = Region6Availability::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Region6Availability::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
