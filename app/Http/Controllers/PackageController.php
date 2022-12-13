<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PackageController extends Controller
{
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $bodyContent = $request->getContent();
        $array = json_decode($bodyContent, true);
        $result = Package::create($array);
        return response()->json($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $id
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
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
     * @param  int  $id
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
