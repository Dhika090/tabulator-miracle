<?php

namespace App\Http\Controllers\SHCNT\InputDataMonev\Availability;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHCNT\Availability\Region5AvailabilityRequest;
use App\Models\SHCNT\Availability\Region5Availability;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Region5AvailabilityController extends Controller
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

        return view('SHCNT.InputDataMonev.Availability.Region5', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Region5AvailabilityRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Region5Availability::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Region5Availability::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('05-', periode), 550) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Region5AvailabilityRequest $request, $id)
    {
        $progress = Region5Availability::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Region5Availability::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
