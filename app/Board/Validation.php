<?php

declare(strict_types=1);

namespace App\Board;

use Inhere\Validate\FieldValidation as PhpValidation;

/**
 * 验证器
 *
 * @create 2022-7-19
 * @author deatil
 */
class Validation
{
    /**
     * 验证
     *
     * @return string
     */
    public static function make(
        array $data, 
        array $rules = [], 
        array $translates = [], 
        string $scene = ''
    ) {
        $v = PhpValidation::make($data, $rules, $translates, $scene);
        
        return $v;
    }
    
    /**
     * 验证
     *
     * @return string
     */
    public static function check(
        array $data, 
        array $rules = [], 
        array $translates = [], 
        string $scene = ''
    ) {
        $v = PhpValidation::check($data, $rules, $translates, $scene);
        
        if ($v->isFail()) {
            // var_dump($v->getErrors());
            return $v->firstError();
        }
        
        // 验证成功
        // $safeData = $v->getSafeData(); // 验证通过的安全数据
        // $postData = $v->all(); // 原始数据
        
        return true;
    }
}