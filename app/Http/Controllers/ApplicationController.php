<?php

namespace App\Http\Controllers;

use App\Http\Requests\Application\ApplicationCreateRequest;
use App\Http\Requests\Application\ApplicationUpdateRequest;
use App\Http\Resources\ApplicationGetResource;
use App\Http\Resources\ApplicationResource;
use App\Models\Application;
use Illuminate\Http\Response;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ApplicationGetResource::collection(Application::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApplicationCreateRequest $request, Application $application)
    {
        $application->fill($request->validated())->save();

        return response([
            'message' => 'Заявка была добавленна',
            'data' => new ApplicationResource($application)
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        return new ApplicationGetResource($application);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ApplicationUpdateRequest $request, Application $application)
    {
        $application->update($request->validated());

        return response([
            'message' => 'Заявка была обновлена',
            'data' => new ApplicationResource($application)
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        $application->delete();

        return response(['message' => "Заявка удалена"], 200);
    }
}
