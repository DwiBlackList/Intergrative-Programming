<?php

namespace App\Http\Controllers;

use App\Models\Iuran;
use App\Models\Warga;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

/**
 * Class IuransController
 * @package App\Http\Controllers
 */
class IuranController
{
    /**
     * GET /iurans
     * @return array
     */
    public function index()
    {
        $data = Iuran::all();
        return response()->json([
            'data' => $data
        ], 200);
    }

    public function show($id)
    {
        try {
            // return Iuran::findOrFail($id);
            return response()->json([
                'message' => 'Data iuran berhasil ditambahkan',
                'data' => Iuran::findOrFail($id)
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => [
                    'message' => 'Iuran not found'
                ]
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $iuran = Iuran::create($request->all());
        return response()->json([
            'message' => 'Data iuran berhasil ditambahkan',
            'data' => $iuran
        ], 200);
    }

    public function update(Request $request, $id)
    {
        try {
            $iuran = Iuran::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => [
                    'message' => 'Iuran not found'
                ]
            ], 404);
        }

        $iuran->fill($request->all());
        $iuran->save();

        // return $iuran;
        return response()->json([
            'message' => 'Data iuran berhasil diperbarui',
            'data' => $iuran
        ], 200);
    }

    public function destroy($id)
    {
        try {
            $iuran = Iuran::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => [
                    'message' => 'Iuran not found'
                ]
            ], 404);
        }

        $iuran->delete();
        // return response(null, 204);
        return response()->json([
            'message' => 'Data iuran berhasil dihapus',
        ], 200);
    }

    public function tunggakan($tahun)
    {
        $wargas = Warga::with(['iuran' => function ($query) use ($tahun) {
            $query->where('status', 'pending')->where('bulan', 'like', "$tahun-%");
        }])->get();

        $result = $wargas->map(function ($warga) {
            $totalTunggakan = $warga->iuran->sum('jumlah_iuran');
            $detailTunggakan = $warga->iuran->map(function ($iuran) {
                return [
                    'bulan' => $iuran->bulan,
                    'jumlah_iuran' => $iuran->jumlah_iuran,
                ];
            });

            return [
                'id' => $warga->id,
                'nama' => $warga->nama,
                'alamat' => $warga->alamat,
                'total_tunggakan' => $totalTunggakan,
                'detail_tunggakan' => $detailTunggakan,
            ];
        });

        return response()->json(['data' => $result]);
    }
    
}