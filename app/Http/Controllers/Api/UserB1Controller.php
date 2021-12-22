<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreA3Request;
use App\Http\Requests\StoreB1Request;
use App\Models\User;
use App\Services\AdminA2Service;
use App\Services\UserB1Service;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserB1Controller extends Controller
{

    protected $userB1Service;

    /**
     * UserB1Controller constructor.
     *
     * @param UserB1Service $userB1Service
     */
    public function __construct(UserB1Service $userB1Service)
    {
        $this->userB1Service = $userB1Service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreB1Request $request
     * @return JsonResponse
     */
    public function storeB2(StoreB1Request $request)
    {
        $userB2 = $this->userB1Service->createB2($request);

        $response = [
            'error' => false,
            'message' => 'create B2 success',
            'status' => 200
        ];

        if (!$userB2) {
            $response = [
                'error' => true,
                'message' => 'create fail',
            ];
        }

        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function update(Request $request)
    {

    }

    /**
     *
     *
     * @return Response
     */
    public function listB2()
    {
        $userB2s = User::role('User B2')->get();

        return response()->json($userB2s);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
