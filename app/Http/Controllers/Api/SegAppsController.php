<?php

namespace SA\Http\Controllers\Api;

use Illuminate\Http\Request;

use SA\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use SA\Http\Requests\SegAppsCreateRequest;
use SA\Http\Requests\SegAppsUpdateRequest;
use SA\Repositories\SegAppsRepository;
use SA\Validators\SegAppsValidator;


class SegAppsController extends Controller
{

    /**
     * @var SegAppsRepository
     */
    protected $repository;

    /**
     * @var SegAppsValidator
     */
    protected $validator;

    public function __construct(SegAppsRepository $repository, SegAppsValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $segApps = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $segApps,
            ]);
        }

        return view('segApps.index', compact('segApps'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SegAppsCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(SegAppsCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $segApp = $this->repository->create($request->all());

            $response = [
                'message' => 'SegApps created.',
                'data'    => $segApp->toArray(),
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
        $segApp = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $segApp,
            ]);
        }

        return view('segApps.show', compact('segApp'));
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

        $segApp = $this->repository->find($id);

        return view('segApps.edit', compact('segApp'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  SegAppsUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(SegAppsUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $segApp = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'SegApps updated.',
                'data'    => $segApp->toArray(),
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
                'message' => 'SegApps deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'SegApps deleted.');
    }
}
