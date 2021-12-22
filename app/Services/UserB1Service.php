<?php

namespace App\Services;

use App\Models\District;
use App\Models\Hamlet;
use App\Models\Province;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserB1Service
{
    /**
     * @param $request
     * @return bool
     */
    public function createB2($request)
    {
        DB::beginTransaction();
        try {
            $code = Auth::user()->address_id;
            Hamlet::create(['code'=>$request->code,'name' => $request->name,'ward_id' => $code]);
            $user = User::create(
                [
                    'email'=>'user-b2-'.$request->code.$code.'@user.com',
                    'name' => $request->name.' User B2',
                    'password' => bcrypt('1234567a'),
                    'address_id' => $code.$request->code,
                ]
            );

            $user->assignRole('User B2');
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    /**
     * @param $request
     * @return bool
     */
    public function updateStatusA2($request)
    {
        DB::beginTransaction();
        try {
            $edit = User::where('id', $id)->update(
                [
                    'status' => $request->status,
                    'updated_at' => Carbon::now()
                ]);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }


}
