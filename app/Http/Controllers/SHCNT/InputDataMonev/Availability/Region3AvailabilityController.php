<?php

namespace App\Http\Controllers\SHCNT\InputDataMonev\Availability;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHCNT\Availability\Region3AvailabilityRequest;
use App\Models\SHCNT\Availability\Region3Availability;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Region3AvailabilityController extends Controller
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

        return view('SHCNT.InputDataMonev.Availability.Region3', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Region3AvailabilityRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Region3Availability::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Region3Availability::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('03-', periode), 330) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Region3AvailabilityRequest $request, $id)
    {
        $progress = Region3Availability::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Region3Availability::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
