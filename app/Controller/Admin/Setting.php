<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use Skg\Board\Gable;
use Skg\Board\Request;
use App\Model\Setting as SettingModel;

/**
 * 网站设置
 *
 * @create 2022-7-26
 * @author deatil
 */
class Setting extends Base
{
    /**
     * 列表
     */
    public function index($request, $response, $args)
    {
        $data = SettingModel::getListByKv();
        
        return $this->view($response, 'setting/index.html', [
            'data' => $data,
        ]);
    }
    
    /**
     * 保存
     */
    public function save($request, $response, $args)
    {
        $data = $request->getParsedBody();
        
        $setting = $data['setting'] ?? [];
        if (! empty($setting) && is_array($setting)) {
            foreach ($setting as $k => $v) {
                SettingModel::updateByKey($k, [
                    'value' => $v,
                ]);
            }
        }
        
        return $this->successJson($response, '保存成功');
    }
}