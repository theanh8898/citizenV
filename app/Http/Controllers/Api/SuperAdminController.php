<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreA3Request;
use App\Models\User;
use App\Services\SuperAdminService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SuperAdminController extends Controller
{

    protected $superAdminService;

    /**
     * @param SuperAdminService $superAdminService
     */
    public function __construct(SuperAdminService $superAdminService)
    {
        $this->superAdminService = $superAdminService;
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
     * @param StoreA3Request $request
     * @return JsonResponse
     */
    public function storeA2(StoreA3Request $request)
    {
        $adminA2 = $this->superAdminService->createA2($request);

        $response = [
            'error' => false,
            'message' => 'create A2 success',
            'status' => 200
        ];

        if (!$adminA2) {
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
    public function updateA2(Request $request)
    {
        $adminA2 = $this->superAdminService->updateStatusA2($request);

        $response = [
            'error' => false,
            'message' => 'update A2 success',
            'status' => 200
        ];

        if (!$adminA2) {
            $response = [
                'error' => true,
                'message' => 'update fail',
            ];
        }

        return response()->json($response);
    }

    /**
     *
     *
     * @param Request $request
     * @return Response
     */
    public function listA2()
    {
        $adminA2s = User::role('Admin A2')->get();

        return response()->json($adminA2s);
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
