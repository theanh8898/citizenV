<?php

namespace App\Services;

use App\Models\Citizen;
use App\Models\District;
use App\Models\Province;
use App\Models\User;
use App\Models\Ward;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CitizenService
{
    /**
     * @param $request
     * @return bool
     */
    public function declareInfo($request)
    {
        DB::beginTransaction();
        try {

            $citizen = Citizen::create(
                [
                    'id_card' => $request->id_card,
                    'full_name' => $request->full_name,
                    'dob' => $request->dob,
                    'gender' => $request->gender,
                    'native_address_id' => $request->native_address_id,
                    'native_address' => $request->native_address,
                    'permanent_address_id' => $request->permanent_address_id,
                    'permanent_address' => $request->permanent_address,
                    'temp_address_id' => $request->temp_address_id,
                    'temp_address' => $request->temp_address,
                    'religion' => $request->religion,
                    'edu_level' => $request->edu_level,
                    'occupation' => $request->occupation,
                ]
            );

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }


}
