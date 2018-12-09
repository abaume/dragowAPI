<?php

namespace App\Http\Controllers;

use App\Http\Resources\BreedingResource;
use App\Models\Breeding;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BreedingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return BreedingResource::collection(Breeding::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $rules = array(
            'name'          => 'required | string',
            'user_uuid'     => 'required'
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            abort(400, 'wrong_parameter');
        } else {
            $breeding = new Breeding;
            $breeding->name        = $request->input('name');
            $breeding->user_uuid   = $request->input('user_uuid');

            $breeding->save();
            return \response()->json($breeding, 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Breeding $breeding
     * @return \App\Breeding|Breeding
     */
    public function show(Breeding $breeding)
    {
        return $breeding;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Breeding $breeding
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Breeding $breeding)
    {
        $rules = array(
            'name'          => 'required | string',
            'user_uuid'     => 'required'
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            abort(400, 'wrong_parameter');
        } else {
            $breeding->name        = $request->input('name');
            $breeding->user_uuid   = $request->input('user_uuid');

            $breeding->save();
            return \response()->json($breeding, 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Breeding $breeding
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Breeding $breeding)
    {
        $breeding->delete();
        return \response()->json(null, 204);
    }
}
