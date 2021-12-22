<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreA3Request;
use App\Models\User;
use App\Services\AdminA2Service;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminA2Controller extends Controller
{

    protected $adminA2Service;

    /**
     *
     *
     * @param AdminA2Service $adminA2Service
     */
    public function __construct(AdminA2Service $adminA2Service)
    {
        $this->adminA2Service = $adminA2Service;
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
    public function storeA3(StoreA3Request $request)
    {
        $adminA3 = $this->adminA2Service->createA3($request);

        $response = [
            'error' => false,
            'message' => 'create A3 success',
            'status' => 200
        ];

        if (!$adminA3) {
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
    public function listA3()
    {
        $adminA3s = User::role('Admin A3')->get();

        return response()->json($adminA3s);
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
