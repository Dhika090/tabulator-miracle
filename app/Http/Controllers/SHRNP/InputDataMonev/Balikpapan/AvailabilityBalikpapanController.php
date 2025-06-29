<?php

namespace App\Http\Controllers\SHRNP\InputDataMonev\Balikpapan;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHRNP\Balikpapan\AvailabilityBalikpapanRequest;
use App\Models\SHRNP\Balikpapan\AvailabilityBalikpapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AvailabilityBalikpapanController extends Controller
{

    public function index(Request $request)
    {
        $tabs = collect(config('shrnp-balikpapan'))->map(function ($tab) {
            return [
                'title' => $tab['title'],
                'route' => route($tab['route']),
                'active' => request()->routeIs($tab['route']),
            ];
        });

        return view('SHRNP.InputDataMonev.Balikpapan.AvailabilityBalikpapan', [
            'tabs' => $tabs,

        ]);
    }

    public function store(AvailabilityBalikpapanRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = AvailabilityBalikpapan::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = AvailabilityBalikpapan::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('01-', periode), 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(AvailabilityBalikpapanRequest $request, $id)
    {
        $progress = AvailabilityBalikpapan::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = AvailabilityBalikpapan::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
