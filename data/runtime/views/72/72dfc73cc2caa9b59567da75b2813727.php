<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* auth/login.html */
class __TwigTemplate_34e86eb7c6a749197aee72493722c69c extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">

<head>
    <meta charset=\"UTF-8\">
    <meta name=\"renderer\" content=\"webkit\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0\">
    <title>登录</title>
</head>

<body>
    <div class=\"box\">
        登录

        <hr />

        <form method=\"post\">
            账号:<br>
            <input type=\"text\" name=\"username\">
            <br>
            密码:<br>
            <input type=\"text\" name=\"password\">
            <br>
            验证码:<br>
            <input type=\"text\" name=\"captchaid\">
            <br>
            <img src=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->urlFor("board.auth-captcha"), "html", null, true);
        echo "\" />
            <br>
            
            <button class=\"layui-btn\">登录</button>
        </form> 

    </div>
</body>

";
    }

    public function getTemplateName()
    {
        return "auth/login.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 28,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "auth/login.html", "D:\\app\\workroom\\php\\project\\slim-board\\data\\views\\auth\\login.html");
    }
}
