<?php

namespace App\Services;

use App\Models\Province;

class ProvinceService
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return Province::class;
    }

    public function getListProvinces($params)
    {
        $count = $this->__getListProvinces($params)->count();
        if ($count == 0) {
            return [
                'count' => 0,
                'data_list' => []
            ];
        } else {
            $data = $this->__getListProvinces($params)
                ->groupBy('provinces.id')
                ->select(
                    'provinces.id',
                    'provinces.name',
                    'provinces.code'
                )
                ->forPage($params['page'], $params['limit'])
                ->get()->toArray();
            return [
                'count' => $count,
                'data_list' => $data
            ];
        }
    }

    public function __getListProvinces($params)
    {
        $query = Province::leftJoin('districts', 'districts.province_id', '=', 'provinces.id')
            ->leftJoin('wards', 'wards.province_id', '=', 'provinces.id')
            ->leftJoin('hamlets', 'hamlets.province_id', '=', 'provinces.id');
        if (!empty($params['province_ids'])) {
            $query->whereIn('provinces.id', $params['province_ids']);
        }
        return $query;
    }
}
