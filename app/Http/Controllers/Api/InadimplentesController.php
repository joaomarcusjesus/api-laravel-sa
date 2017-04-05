<?php

namespace SA\Http\Controllers\Api;


use SA\Http\Requests\InadimplenteRequest;
use SA\Http\Controllers\Controller;
use SA\Repositories\InadimplenteRepository;



class InadimplentesController extends Controller
{

    /**
     * @var InadimplenteRepository
     */
    protected $repository;


    public function __construct(InadimplenteRepository $repository)
    {
        $this->repository = $repository;
        $this->repository->applyMultitenancy();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->repository->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  inadimplenteRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(inadimplenteRequest $request)
    {
        $inadimplencia = $this->repository->create($request->all());
        return response()->json($inadimplencia, 201);
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->repository->find($id); //Esse find correspondente a findOrFail()
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  InadimplenteUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(InadimplenteUpdateRequest $request, $id)
    {

        $inadimplente = $this->repository->update($request->all(), $id);
        return response()->json($inadimplente, 200);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if ($deleted) {
            return response()->json([], 204);
        } else {
            return response()->json(['error' => 'Resource can not b deleted'], 500);
        }

        return redirect()->back()->with('message', 'Inadimplente deleted.');
    }
}
