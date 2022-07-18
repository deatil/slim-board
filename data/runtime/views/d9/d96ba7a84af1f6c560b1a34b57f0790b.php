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

/* error/error.html */
class __TwigTemplate_849595ba695bf7a36630f2eb4fa5896d extends Template
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
    <title>系统错误</title>
</head>

<body>
    <div class=\"box\">
    系统错误

    <hr />

    ";
        // line 18
        echo twig_escape_filter($this->env, ($context["msg"] ?? null), "html", null, true);
        echo "

    ";
        // line 20
        if ((($context["url"] ?? null) != "")) {
            // line 21
            echo "        <p class=\"mb-4 jump\">
            页面将在 <b id=\"wait\">";
            // line 22
            echo twig_escape_filter($this->env, ($context["wait"] ?? null), "html", null, true);
            echo "</b> 秒后自动跳转
        </p>
    ";
        }
        // line 25
        echo "    
    <br />
    
    <a class=\"btn btn-primary \" href='/'>返回首页</a>

    ";
        // line 30
        if ((($context["url"] ?? null) != "")) {
            // line 31
            echo "        <a class=\"btn btn-success\" id=\"href\" href=\"";
            echo ($context["url"] ?? null);
            echo "\">立即跳转</a>
    ";
        }
        // line 33
        echo "
    ";
        // line 34
        if ((($context["url"] ?? null) != "")) {
            // line 35
            echo "    <script type=\"text/javascript\">
    ;(function(){
        var wait = document.getElementById('wait'),
            href = document.getElementById('href').href;
        var interval = setInterval(function(){
            var time = --wait.innerHTML;
            if(time <= 0) {
                location.href = href;
                clearInterval(interval);
            };
        }, 1000);
    })();
    </script>
    ";
        }
        // line 49
        echo "
</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "error/error.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  108 => 49,  92 => 35,  90 => 34,  87 => 33,  81 => 31,  79 => 30,  72 => 25,  66 => 22,  63 => 21,  61 => 20,  56 => 18,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "error/error.html", "D:\\app\\workroom\\php\\project\\slim-board\\data\\views\\error\\error.html");
    }
}
