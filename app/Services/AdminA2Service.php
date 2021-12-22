<?php

namespace App\Services;

use App\Models\District;
use App\Models\Province;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminA2Service
{
    /**
     * @param $request
     * @return bool
     */
    public function createA3($request)
    {
        DB::beginTransaction();
        try {
            $provinceCode = Auth::user()->address_id;
            District::create(['code'=>$request->code,'name' => $request->name,'province_id' => $provinceCode]);
            $user = User::create(
                [
                    'email'=>'admin-a3-'.$request->code.$provinceCode.'@admin.com',
                    'name' => $request->name.' Admin',
                    'password' => bcrypt('1234567a'),
                    'address_id' => $provinceCode.$request->code,
                ]
            );

            $user->assignRole('Admin A3');
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
