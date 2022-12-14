<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Models\Package;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class PackageController extends Controller
{
    protected $bodyValidation = [
        'transaction_id' => 'required|string|min:0',
        'customer_name' => 'required|string|min:0',
        'customer_code' => 'required|string|min:0',
        'transaction_amount' => 'required|string|min:0',
        'transaction_discount' => 'required|string|min:0',
        'transaction_additional_field' => 'nullable|string|min:0',
        'transaction_payment_type' => 'required|string|min:0',
        'transaction_state' => 'required|string|min:0',
        'transaction_code' => 'required|string|min:0',
        'transaction_order' => 'required|numeric|min:0',
        'location_id' => 'required|string|min:0',
        'organization_id' => 'required|numeric|min:0',
        'created_at' => 'required|string|min:0',
        'updated_at' => 'required|string|min:0',
        'transaction_payment_type_name' => 'required|string|min:0',
        'transaction_cash_amount' => 'required|numeric|min:0',
        'transaction_cash_change' => 'required|numeric|min:0',
        'customer_attribute.Nama_Sales' => 'required|string|min:0',
        'customer_attribute.TOP' => 'required|string|min:0',
        'customer_attribute.Jenis_Pelanggan' => 'required|string|min:0',
        'connote.connote_id' => 'required|string|min:0',
        'connote.connote_number' => 'required|numeric|min:0',
        'connote.connote_service' => 'required|string|min:0',
        'connote.connote_service_price' => 'required|numeric|min:0',
        'connote.connote_amount' => 'required|numeric|min:0',
        'connote.connote_code' => 'required|string|min:0',
        'connote.connote_booking_code' => 'nullable|string|min:0',
        'connote.connote_order' => 'required|numeric|min:0',
        'connote.connote_state' => 'required|string|min:0',
        'connote.connote_state_id' => 'required|numeric|min:0',
        'connote.zone_code_from' => 'required|string|min:0',
        'connote.zone_code_to' => 'required|string|min:0',
        'connote.surcharge_amount' => 'nullable|numeric|min:0',
        'connote.transaction_id' => 'required|string|min:0',
        'connote.actual_weight' => 'required|numeric|min:0',
        'connote.volume_weight' => 'required|numeric|min:0',
        'connote.chargeable_weight' => 'required|numeric|min:0',
        'connote.created_at' => 'required|string|min:0',
        'connote.updated_at' => 'required|string|min:0',
        'connote.organization_id' => 'required|numeric|min:0',
        'connote.location_id' => 'required|string|min:0',
        'connote.connote_total_package' => 'required|string|min:0',
        'connote.connote_surcharge_amount' => 'required|string|min:0',
        'connote.connote_sla_day' => 'required|string|min:0',
        'connote.location_name' => 'required|string|min:0',
        'connote.location_type' => 'required|string|min:0',
        'connote.source_tariff_db' => 'required|string|min:0',
        'connote.id_source_tariff' => 'required|string|min:0',
        'connote.pod' => 'nullable|numeric|min:0',
        'connote.history' => 'nullable|array|min:0',
        'connote_id' => 'required|string|min:0',
        'origin_data.customer_name' => 'required|string|min:0',
        'origin_data.customer_address' => 'required|string|min:0',
        'origin_data.customer_email' => 'required|string|min:0',
        'origin_data.customer_phone' => 'required|string|min:0',
        'origin_data.customer_address_detail' => 'nullable|numeric|min:0',
        'origin_data.customer_zip_code' => 'required|string|min:0',
        'origin_data.zone_code' => 'required|string|min:0',
        'origin_data.organization_id' => 'required|numeric|min:0',
        'origin_data.location_id' => 'required|string|min:0',
        'destination_data.customer_name' => 'required|string|min:0',
        'destination_data.customer_address' => 'required|string|min:0',
        'destination_data.customer_email' => 'nullable|numeric|min:0',
        'destination_data.customer_phone' => 'required|string|min:0',
        'destination_data.customer_address_detail' => 'required|string|min:0',
        'destination_data.customer_zip_code' => 'required|string|min:0',
        'destination_data.zone_code' => 'required|string|min:0',
        'destination_data.organization_id' => 'required|numeric|min:0',
        'destination_data.location_id' => 'required|string|min:0',
        'koli_data.0.koli_length' => 'required|numeric|min:0',
        'koli_data.0.awb_url' => 'required|string|min:0',
        'koli_data.0.created_at' => 'required|string|min:0',
        'koli_data.0.koli_chargeable_weight' => 'required|numeric|min:0',
        'koli_data.0.koli_width' => 'required|numeric|min:0',
        'koli_data.0.koli_surcharge' => 'nullable|array|min:0',
        'koli_data.0.koli_height' => 'required|numeric|min:0',
        'koli_data.0.updated_at' => 'required|string|min:0',
        'koli_data.0.koli_description' => 'required|string|min:0',
        'koli_data.0.koli_formula_id' => 'nullable|numeric|min:0',
        'koli_data.0.connote_id' => 'required|string|min:0',
        'koli_data.0.koli_volume' => 'required|numeric|min:0',
        'koli_data.0.koli_weight' => 'required|numeric|min:0',
        'koli_data.0.koli_id' => 'required|string|min:0',
        'koli_data.0.koli_custom_field.awb_sicepat' => 'nullable|numeric|min:0',
        'koli_data.0.koli_custom_field.harga_barang' => 'nullable|numeric|min:0',
        'koli_data.0.koli_code' => 'required|string|min:0',
        'koli_data.1.koli_length' => 'required|numeric|min:0',
        'koli_data.1.awb_url' => 'required|string|min:0',
        'koli_data.1.created_at' => 'required|string|min:0',
        'koli_data.1.koli_chargeable_weight' => 'required|numeric|min:0',
        'koli_data.1.koli_width' => 'required|numeric|min:0',
        'koli_data.1.koli_surcharge' => 'nullable|array|min:0',
        'koli_data.1.koli_height' => 'required|numeric|min:0',
        'koli_data.1.updated_at' => 'required|string|min:0',
        'koli_data.1.koli_description' => 'required|string|min:0',
        'koli_data.1.koli_formula_id' => 'nullable|numeric|min:0',
        'koli_data.1.connote_id' => 'required|string|min:0',
        'koli_data.1.koli_volume' => 'required|numeric|min:0',
        'koli_data.1.koli_weight' => 'required|numeric|min:0',
        'koli_data.1.koli_id' => 'required|string|min:0',
        'koli_data.1.koli_custom_field.awb_sicepat' => 'nullable|numeric|min:0',
        'koli_data.1.koli_custom_field.harga_barang' => 'nullable|numeric|min:0',
        'koli_data.1.koli_code' => 'required|string|min:0',
        'koli_data.2.koli_length' => 'required|numeric|min:0',
        'koli_data.2.awb_url' => 'required|string|min:0',
        'koli_data.2.created_at' => 'required|string|min:0',
        'koli_data.2.koli_chargeable_weight' => 'required|numeric|min:0',
        'koli_data.2.koli_width' => 'required|numeric|min:0',
        'koli_data.2.koli_surcharge' => 'nullable|array|min:0',
        'koli_data.2.koli_height' => 'required|numeric|min:0',
        'koli_data.2.updated_at' => 'required|string|min:0',
        'koli_data.2.koli_description' => 'required|string|min:0',
        'koli_data.2.koli_formula_id' => 'nullable|numeric|min:0',
        'koli_data.2.connote_id' => 'required|string|min:0',
        'koli_data.2.koli_volume' => 'required|numeric|min:0',
        'koli_data.2.koli_weight' => 'required|numeric|min:0',
        'koli_data.2.koli_id' => 'required|string|min:0',
        'koli_data.2.koli_custom_field.awb_sicepat' => 'nullable|numeric|min:0',
        'koli_data.2.koli_custom_field.harga_barang' => 'nullable|numeric|min:0',
        'koli_data.2.koli_code' => 'required|string|min:0',
        'custom_field.catatan_tambahan' => 'required|string|min:0',
        'currentLocation.name' => 'required|string|min:0',
        'currentLocation.code' => 'required|string|min:0',
        'currentLocation.type' => 'required|string|min:0'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(Package::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->bodyValidation);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $bodyContent = $request->getContent();
        $array = json_decode($bodyContent, true);
        $result = Package::create($array);
        return response()->json($result);
    }

    /**
     * Display the specified resource.
     *
     * @param string $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $package = Package::find($id);
        if (!$package) {
            throw new NotFoundHttpException("package id not found!");
        }
        return response()->json($package);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), $this->bodyValidation);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $bodyContent = $request->getContent();
        $package = Package::find($id);
        if (!$package && $request->isMethod('put')) {
            return $this->store($request);
        }
        if (!$package && $request->isMethod('patch')) {
            throw new NotFoundHttpException("Package id not found!");
        }
        $array = json_decode($bodyContent, true);
        $package->update($array);
        return response()->json($package);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        $package = Package::find($id);
        if (!$package) {
            throw new NotFoundHttpException("Package id not found!");
        }
        $package->delete();
        return response()->json($package);
    }
}
