<?php

namespace SA\Http\Controllers\Api;

use Illuminate\Http\Request;

use SA\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use SA\Http\Requests\SegGroupsCreateRequest;
use SA\Http\Requests\SegGroupsUpdateRequest;
use SA\Repositories\SegGroupsRepository;
use SA\Validators\SegGroupsValidator;


class SegGroupsController extends Controller
{

    /**
     * @var SegGroupsRepository
     */
    protected $repository;

    /**
     * @var SegGroupsValidator
     */
    protected $validator;

    public function __construct(SegGroupsRepository $repository, SegGroupsValidator $validator)
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
        $segGroups = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $segGroups,
            ]);
        }

        return view('segGroups.index', compact('segGroups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SegGroupsCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(SegGroupsCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $segGroup = $this->repository->create($request->all());

            $response = [
                'message' => 'SegGroups created.',
                'data'    => $segGroup->toArray(),
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
        $segGroup = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $segGroup,
            ]);
        }

        return view('segGroups.show', compact('segGroup'));
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

        $segGroup = $this->repository->find($id);

        return view('segGroups.edit', compact('segGroup'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  SegGroupsUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(SegGroupsUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $segGroup = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'SegGroups updated.',
                'data'    => $segGroup->toArray(),
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
                'message' => 'SegGroups deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'SegGroups deleted.');
    }
}
