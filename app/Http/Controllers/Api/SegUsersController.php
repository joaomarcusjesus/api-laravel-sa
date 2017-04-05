<?php

namespace SA\Http\Controllers\Api;

use Illuminate\Http\Request;

use SA\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use SA\Http\Requests\SegUsersCreateRequest;
use SA\Http\Requests\SegUsersUpdateRequest;
use SA\Repositories\SegUsersRepository;
use SA\Validators\SegUsersValidator;


class SegUsersController extends Controller
{

    /**
     * @var SegUsersRepository
     */
    protected $repository;

    /**
     * @var SegUsersValidator
     */
    protected $validator;

    public function __construct(SegUsersRepository $repository, SegUsersValidator $validator)
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
        $segUsers = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $segUsers,
            ]);
        }

        return view('segUsers.index', compact('segUsers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SegUsersCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(SegUsersCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $segUser = $this->repository->create($request->all());

            $response = [
                'message' => 'SegUsers created.',
                'data'    => $segUser->toArray(),
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
        $segUser = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $segUser,
            ]);
        }

        return view('segUsers.show', compact('segUser'));
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

        $segUser = $this->repository->find($id);

        return view('segUsers.edit', compact('segUser'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  SegUsersUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(SegUsersUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $segUser = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'SegUsers updated.',
                'data'    => $segUser->toArray(),
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
                'message' => 'SegUsers deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'SegUsers deleted.');
    }
}
