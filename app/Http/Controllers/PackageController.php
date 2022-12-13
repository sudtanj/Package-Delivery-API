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
        $package = new Package();
        foreach ($bodyContent AS $key => $value) {
            $package->{$key} = $value;
        }
        $package->save();
        return response()->json($package);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        return response()->json(Package::find($id));
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
        foreach ($bodyContent AS $key => $value) {
            $package->{$key} = $value;
        }
        $package->save();
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
        $package->softDeletes();
        return response()->json($package);
    }
}
