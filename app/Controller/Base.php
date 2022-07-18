<?php

declare(strict_types=1);

namespace App\Controller;

use Carbon\Carbon;

use App\Gable\Gable;
use App\Board\Response;

/**
 * Base
 *
 * @create 2022-7-18
 * @author deatil
 */
abstract class Base
{
    /**
     * 视图
     */
    public function view($response, $template, $data)
    {
        return Gable::$di->get('view')->render($response, $template, $data);
    }
    
    /**
     * 成功
     */
    public function successJson($response, string $msg = "操作成功", $data = "")
    {
        return Response::successJson($response, $msg, $data);
    }
    
    /**
     * 失败
     */
    public function errorJson($response, string $msg, int $code = 1)
    {
        return Response::errorJson($response, $msg, $code);
    }
    
    /**
     * json
     */
    public function responseJson($response, $data)
    {
        return Response::json($response, $data);
    }
    
    /**
     * 数据
     */
    public function responseData($response, $data)
    {
        return Response::data($response, $data);
    }
    
    /**
     * 状态通用转换
     */
    protected function switchStatus($name = '')
    {
        if (empty($name)) {
            return false;
        }
        
        $statusList = [
            'open' => 1,
            'close' => 0,
        ];
        
        if (isset($statusList[$name])) {
            return $statusList[$name];
        }
        
        return false;
    }
    
    /**
     * 时间格式化到时间戳
     */
    protected function formatDate($date = '')
    {
        if (empty($date)) {
            return false;
        }
        
        return Carbon::parse($date)->timestamp;
    }
    
    /**
     * 格式化排序
     */
    protected function formatOrderBy($order = '', $default = 'create_time__ASC')
    {
        if (empty($order)) {
            $order = $default;
        }
        
        $orders = explode("__", $order);
        if (count($orders) < 2) {
            $orders = ["add_time", "ASC"];
        }
        
        $orders[1] = strtoupper($orders[1]);
        if (! in_array($orders[1], ['ASC', 'DESC'])) {
            $orders[1] = 'ASC';
        }
        
        return $orders;
    }
}