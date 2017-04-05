<?php

namespace SA\Http\Controllers\Api;

use Illuminate\Http\Request;

use SA\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use SA\Http\Requests\SegLogCreateRequest;
use SA\Http\Requests\SegLogUpdateRequest;
use SA\Repositories\SegLogRepository;
use SA\Validators\SegLogValidator;


class SegLogsController extends Controller
{

    /**
     * @var SegLogRepository
     */
    protected $repository;

    /**
     * @var SegLogValidator
     */
    protected $validator;

    public function __construct(SegLogRepository $repository, SegLogValidator $validator)
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
        $segLogs = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $segLogs,
            ]);
        }

        return view('segLogs.index', compact('segLogs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SegLogCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(SegLogCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $segLog = $this->repository->create($request->all());

            $response = [
                'message' => 'SegLog created.',
                'data'    => $segLog->toArray(),
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
        $segLog = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $segLog,
            ]);
        }

        return view('segLogs.show', compact('segLog'));
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

        $segLog = $this->repository->find($id);

        return view('segLogs.edit', compact('segLog'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  SegLogUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(SegLogUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $segLog = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'SegLog updated.',
                'data'    => $segLog->toArray(),
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
                'message' => 'SegLog deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'SegLog deleted.');
    }
}
