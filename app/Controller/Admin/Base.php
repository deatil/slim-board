<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use Skg\Board\Gable;
use Skg\Board\Controller as BaseController;

/**
 * Base
 *
 * @create 2022-7-20
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
        $theme = $config->get("app.admin_theme");
        
        return "admin/{$theme}/" . ltrim($template, "/");
    }
}