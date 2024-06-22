<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\PerdaSastraIn;
use App\Http\Controllers\Controller;

class SinergiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $perPage = $request->get('per_page', 15); // Default to 15 items per page
        $data = PerdaSastraIn::paginate()->with('user', 'perda_sastra', 'satuan', 'penanggung_jawabs')->whereHas('user', function ($q) use ($request) {
            $q->where('role', 'perda');
            if ($request->perda != null) {
                $q->where('user_id', $request->perda);
            }
        })->whereHas('perda_sastra', function ($r) use ($request) {
            if ($request->tahun != null) {
                $r->where('tahun', $request->tahun ?? '');
            }
        })->get();
        return $this->sendResponse(ProductResource::collection($products), 'Data retrieved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): JsonResponse
    {
        $product = Product::find($id);

        if (is_null($product)) {
            return $this->sendError('Product not found.');
        }

        return $this->sendResponse(new ProductResource($product), 'Data retrieved successfully.');
    }

}
