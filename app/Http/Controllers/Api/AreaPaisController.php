<?php

namespace SA\Http\Controllers\Api;

use Illuminate\Http\Request;

use SA\Http\Requests;

use SA\Http\Requests\AreaPaiRequest;
use SA\Http\Controllers\Controller;
use SA\Repositories\AreaPaiRepository;



class AreaPaisController extends Controller
{

    /**
     * @var AreaPaiRepository
     */
    protected $repository;


    public function __construct(AreaPaiRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $areaPais = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $areaPais,
            ]);
        }

        return view('areaPais.index', compact('areaPais'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AreaPaiCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(AreaPaiCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $areaPai = $this->repository->create($request->all());

            $response = [
                'message' => 'AreaPai created.',
                'data'    => $areaPai->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
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
        $areaPai = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $areaPai,
            ]);
        }

        return view('areaPais.show', compact('areaPai'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $areaPai = $this->repository->find($id);

        return view('areaPais.edit', compact('areaPai'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  AreaPaiUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(AreaPaiUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $areaPai = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'AreaPai updated.',
                'data'    => $areaPai->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
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

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'AreaPai deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'AreaPai deleted.');
    }
}
