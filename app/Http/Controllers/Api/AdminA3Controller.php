<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreA3Request;
use App\Http\Requests\StoreB1Request;
use App\Models\User;
use App\Services\AdminA2Service;
use App\Services\AdminA3Service;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminA3Controller extends Controller
{

    protected $adminA3Service;

    /**
     *
     *
     * @param AdminA3Service $adminA3Service
     */
    public function __construct(AdminA3Service $adminA3Service)
    {
        $this->adminA3Service = $adminA3Service;
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
    public function storeB1(StoreB1Request $request)
    {
        $userB1 = $this->adminA3Service->createB1($request);

        $response = [
            'error' => false,
            'message' => 'create B1 success',
            'status' => 200
        ];

        if (!$userB1) {
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
    public function listB1()
    {
        $userB1s = User::role('User B1')->get();

        return response()->json($userB1s);
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
