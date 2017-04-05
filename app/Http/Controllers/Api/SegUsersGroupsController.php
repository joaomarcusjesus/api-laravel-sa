<?php

namespace SA\Http\Controllers\Api;

use Illuminate\Http\Request;

use SA\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use SA\Http\Requests\SegUsersGroupsCreateRequest;
use SA\Http\Requests\SegUsersGroupsUpdateRequest;
use SA\Repositories\SegUsersGroupsRepository;
use SA\Validators\SegUsersGroupsValidator;


class SegUsersGroupsController extends Controller
{

    /**
     * @var SegUsersGroupsRepository
     */
    protected $repository;

    /**
     * @var SegUsersGroupsValidator
     */
    protected $validator;

    public function __construct(SegUsersGroupsRepository $repository, SegUsersGroupsValidator $validator)
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
        $segUsersGroups = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $segUsersGroups,
            ]);
        }

        return view('segUsersGroups.index', compact('segUsersGroups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SegUsersGroupsCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(SegUsersGroupsCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $segUsersGroup = $this->repository->create($request->all());

            $response = [
                'message' => 'SegUsersGroups created.',
                'data'    => $segUsersGroup->toArray(),
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
        $segUsersGroup = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $segUsersGroup,
            ]);
        }

        return view('segUsersGroups.show', compact('segUsersGroup'));
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

        $segUsersGroup = $this->repository->find($id);

        return view('segUsersGroups.edit', compact('segUsersGroup'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  SegUsersGroupsUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(SegUsersGroupsUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $segUsersGroup = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'SegUsersGroups updated.',
                'data'    => $segUsersGroup->toArray(),
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
                'message' => 'SegUsersGroups deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'SegUsersGroups deleted.');
    }
}
