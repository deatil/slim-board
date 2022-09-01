<?php

declare(strict_types=1);

namespace Skg\Board;

use Medoo\Medoo;

use Skg\Board\Gable;

/**
 * Orm 默认方法
 *
 * @create 2022-7-26
 * @author deatil
 */
class Orm
{
    /**
     * 详细信息
     */
    public static function get(string $table, $join = null, $columns = null, $where = null)
    {
        // get($table, $columns, $where)
        $data = Gable::db()->get($table, $join, $columns, $where);

        return $data;
    }
    
    /**
     * 列表查询
     */
    public static function select(string $table, $join, $columns = null, $where = null)
    {
        // select($table, $join, $columns, $where)
        $data = Gable::db()->select($table, $join, $columns, $where);

        return $data;
    }
    
    /**
     * 添加
     */
    public static function insert(string $table, array $values, string $primaryKey = null)
    {
        $database = Gable::db();
        
        // insert($table, $values)
        $database->insert($table, $values, $primaryKey);

        return $database->id();
    }

    /**
     * 更改信息
     */
    public static function update(string $table, $data, $where = null)
    {
        // update($table, $data, $where)
        $data = Gable::db()->update($table, $data, $where);
        
        $errorCode = $data->errorCode();
        if ($errorCode === '' || $errorCode === '00000') {
            return true;
        }

        return false;
    }

    /**
     * 删除
     */
    public static function delete(string $table, $where)
    {
        // delete($table, $where)
        $data = Gable::db()->delete($table, $where);
        
        $rowCount = $data->rowCount();
        if ($rowCount > 0) {
            return true;
        }

        return false;
    }

    /**
     * 替换更新
     */
    public static function replace(string $table, array $columns, $where = null)
    {
        // replace($table, $columns, $where)
        $data = Gable::db()->replace($table, $columns, $where);
        
        $errorCode = $data->errorCode();
        if ($errorCode === '' || $errorCode === '00000') {
            return true;
        }

        return $errorCode;
    }

    /**
     * 判断是否存在
     */
    public static function has(string $table, $join, $where = null)
    {
        // has($table, $where) boolean
        // has($table, $join, $where) boolean
        $data = Gable::db()->has($table, $join, $where);
        
        return $data;
    }

    /**
     * rand
     */
    public static function rand(string $table, $join = null, $columns = null, $where = null)
    {
        // rand($table, $column, $where) array
        // rand($table, $join, $column, $where) array
        $data = Gable::db()->rand($table, $join, $column, $where);

        return $data;
    }

    /**
     * 总数
     */
    public static function count(string $table, $join, $column = null, $where = null)
    {
        // count($table, $where) number
        // count($table, $join, $column, $where) number
        $data = Gable::db()->count($table, $join, $column, $where);

        return $data;
    }

    /**
     * max
     */
    public static function max(string $table, $join, $column = null, $where = null)
    {
        // max($table, $column, $where) number
        // max($table, $join, $column, $where) number
        $data = Gable::db()->max($table, $join, $column, $where);

        return $data;
    }

    /**
     * min
     */
    public static function min(string $table, $join, $column = null, $where = null)
    {
        // min($table, $column, $where) number
        // min($table, $join, $column, $where) number
        $data = Gable::db()->min($table, $join, $column, $where);

        return $data;
    }

    /**
     * 平均值
     */
    public static function avg(string $table, $join, $column = null, $where = null)
    {
        // avg($table, $column, $where) number
        // avg($table, $join, $column, $where) number
        $data = Gable::db()->avg($table, $join, $column, $where);

        return $data;
    }

    /**
     * sum
     */
    public static function sum(string $table, $join, $column = null, $where = null)
    {
        // sum($table, $column, $where) number
        // sum($table, $join, $column, $where) number
        $data = Gable::db()->sum($table, $join, $column, $where);

        return $data;
    }

    /**
     * query
     */
    public static function query($query)
    {
        // query($query) object
        $data = Gable::db()->query($query);

        return $data;
    }

    /**
     * quote
     */
    public static function quote($string)
    {
        // quote($string) string
        $data = Gable::db()->quote($string);

        return $data;
    }

    /**
     * action
     */
    public static function action($callback)
    {
        // action($callback) void
        // $database->action(function($database) {})
        Gable::db()->action($callback);
    }

    /**
     * raw
     */
    public static function raw(string $string, array $map = [])
    {
        // Medoo::raw($query, $map)
        $data = Medoo::raw($string, $map);
        
        return $data;
    }

    /**
     * 创建表
     */
    public static function createTable(string $table, $columns, $options = null)
    {
        // create($table, $columns, $options) PDOStatement
        $data = Gable::db()->create($table, $columns, $options);
        
        return $data;
    }

    /**
     * 删除表
     */
    public static function dropTable(string $table)
    {
        // drop($table) PDOStatement
        $data = Gable::db()->drop($table);
        
        return $data;
    }

    /**
     * 输出日志
     */
    public static function log()
    {
        // log() array
        $data = Gable::db()->log();
        
        return $data;
    }

    /**
     * 输出最后sql
     * print_r(Orm::last());exit;
     */
    public static function last()
    {
        // last() string
        $data = Gable::db()->last();
        
        return $data;
    }
}