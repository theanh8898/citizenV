<?php

namespace App\Services;

use App\Models\Province;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class SuperAdminService
{
    /**
     * @param $request
     * @return bool
     */
    public function createA2($request)
    {
        DB::beginTransaction();
        try {
            Province::create(['code'=>$request->code,'name' => $request->name]);
            $user = User::create(
                [
                    'email'=>'admin-a2-'.$request->code.'@admin.com',
                    'name' => $request->name.' Admin',
                    'password' => bcrypt('1234567a'),
                    'address_id' => $request->code,
                ]
            );

            $user->assignRole('Admin A2');
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
