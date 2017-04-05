<?php

namespace SA\Http\Controllers\Api;

use Illuminate\Http\Request;

use SA\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use SA\Http\Requests\SegGroupsAppsCreateRequest;
use SA\Http\Requests\SegGroupsAppsUpdateRequest;
use SA\Repositories\SegGroupsAppsRepository;
use SA\Validators\SegGroupsAppsValidator;


class SegGroupsAppsController extends Controller
{

    /**
     * @var SegGroupsAppsRepository
     */
    protected $repository;

    /**
     * @var SegGroupsAppsValidator
     */
    protected $validator;

    public function __construct(SegGroupsAppsRepository $repository, SegGroupsAppsValidator $validator)
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
        $segGroupsApps = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $segGroupsApps,
            ]);
        }

        return view('segGroupsApps.index', compact('segGroupsApps'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SegGroupsAppsCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(SegGroupsAppsCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $segGroupsApp = $this->repository->create($request->all());

            $response = [
                'message' => 'SegGroupsApps created.',
                'data'    => $segGroupsApp->toArray(),
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
        $segGroupsApp = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $segGroupsApp,
            ]);
        }

        return view('segGroupsApps.show', compact('segGroupsApp'));
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

        $segGroupsApp = $this->repository->find($id);

        return view('segGroupsApps.edit', compact('segGroupsApp'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  SegGroupsAppsUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(SegGroupsAppsUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $segGroupsApp = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'SegGroupsApps updated.',
                'data'    => $segGroupsApp->toArray(),
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
                'message' => 'SegGroupsApps deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'SegGroupsApps deleted.');
    }
}
