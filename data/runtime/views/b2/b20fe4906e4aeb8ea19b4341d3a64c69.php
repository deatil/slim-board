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

/* admin/board/auth/login.html */
class __TwigTemplate_306ba444b62e9ff45101b6c5bc1bf1a0 extends Template
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
    <title>管理登录</title>
    <style>
    .login-captcha {
        cursor: pointer;
    }
    </style>
</head>

<body>
    <div class=\"box\">
        管理登录

        <hr />

        <form method=\"post\">
            密码:<br>
            <input type=\"password\" 
                name=\"password\"
                id=\"password\">
            <br>
            
            验证码:<br>
            <input type=\"text\" 
                name=\"captcha\"
                id=\"captcha\">
            <br>
            
            <img src=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->urlFor("admin.auth-captcha"), "html", null, true);
        echo "\" 
                data-src=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->urlFor("admin.auth-captcha"), "html", null, true);
        echo "\" 
                title=\"刷新验证码\"
                class=\"login-captcha js-captcha-refresh\"/>
            <br>
            
            <button type=\"button\" class=\"layui-btn js-login-button\">登录</button>
        </form> 

    </div>
    <script src='";
        // line 46
        echo twig_escape_filter($this->env, $this->env->getRuntime('App\Twig\TwigRuntimeExtension')->assets("js/jquery-3.4.1.min.js"), "html", null, true);
        echo "' type=\"text/javascript\"></script>
    <script src='";
        // line 47
        echo twig_escape_filter($this->env, $this->env->getRuntime('App\Twig\TwigRuntimeExtension')->assets("js/layer/layer.js"), "html", null, true);
        echo "' type=\"text/javascript\"></script>
    <script type=\"text/javascript\">
    (function(\$) {
        \"use strict\";
        
        // 刷新验证码
        \$(\".js-captcha-refresh\").click(function(e) {
            e.stopPropagation;
            e.preventDefault;
            
            var url = \$(this).data(\"src\") + \"?t=\" + Math.random();
            \$(this).attr(\"src\", url);
        });
        
        // 登录
        \$(\".js-login-button\").click(function(e) {
            e.stopPropagation;
            e.preventDefault;

            var password = \$(\"#password\").val();
            var captcha = \$(\"#captcha\").val();

            var url = \"";
        // line 69
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->urlFor("admin.auth-login-check"), "html", null, true);
        echo "\";
            \$.post(url, {
                password: password,
                captcha: captcha,
            }, function(data) {
                if (data.code == 0) {
                    layer.msg(\"登录成功\");
                    
                    setTimeout(function() {
                        window.location.href = \"";
        // line 78
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->urlFor("admin.index"), "html", null, true);
        echo "\";
                    }, 1500);
                } else {
                    layer.msg(data.msg);
                }
            }).fail(function (xhr, status, info) {
                layer.msg(\"请求失败\");
            });
        });
    })(jQuery);
    </script>

</body>
</html>

";
    }

    public function getTemplateName()
    {
        return "admin/board/auth/login.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  131 => 78,  119 => 69,  94 => 47,  90 => 46,  78 => 37,  74 => 36,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "admin/board/auth/login.html", "D:\\app\\workroom\\php\\project\\slim-board\\data\\views\\admin\\board\\auth\\login.html");
    }
}
