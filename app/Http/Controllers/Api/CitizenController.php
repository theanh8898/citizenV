<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeclareCitizenInformationRequest;
use App\Http\Requests\StoreA3Request;
use App\Http\Requests\StoreB1Request;
use App\Models\User;
use App\Services\AdminA2Service;
use App\Services\AdminA3Service;
use App\Services\CitizenService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CitizenController extends Controller
{

    protected $citizenService;

    /**
     *
     *
     * @param CitizenService $citizenService
     */
    public function __construct(CitizenService $citizenService)
    {
        $this->citizenService = $citizenService;
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
     * @param DeclareCitizenInformationRequest $request
     * @return JsonResponse
     */
    public function declareCitizenInformation(DeclareCitizenInformationRequest $request)
    {
        $userB1 = $this->citizenService->declareInfo($request);

        $response = [
            'error' => false,
            'message' => 'Successful population information declaration',
            'status' => 200
        ];

        if (!$userB1) {
            $response = [
                'error' => true,
                'message' => 'Population information declaration failed',
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
