<?php

namespace App\Http\Controllers;

use App\Http\Requests\Application\ApplicationCreateRequest;
use App\Http\Requests\Application\ApplicationUpdateRequest;
use App\Http\Resources\ApplicationGetResource;
use App\Http\Resources\ApplicationResource;
use App\Models\Application;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

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
        $request->validated();

        $application->fill($request->validated())->save();

        return new ApplicationResource($application);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new ApplicationGetResource(Application::findOrFail($id));
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

        return $application;
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

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
