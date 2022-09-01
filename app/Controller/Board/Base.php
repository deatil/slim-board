<?php

declare(strict_types=1);

namespace App\Controller\Board;

use Skg\Board\Gable;
use Skg\Board\Controller as BaseController;

/**
 * Base
 *
 * @create 2022-7-18
 * @author deatil
 */
abstract class Base extends BaseController
{
    /**
     * 主题
     */
    public function theme($template)
    {
        $config = Gable::$di->get('config');
        $theme = $config->get("app.board_theme");
        
        return "board/{$theme}/" . ltrim($template, "/");
    }
}