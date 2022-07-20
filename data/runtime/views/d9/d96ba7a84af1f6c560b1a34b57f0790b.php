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
    <title>系统提示</title>
</head>

<body>
    <div class=\"box\">
    系统提示

    <hr />

    ";
        // line 18
        echo twig_escape_filter($this->env, ($context["msg"] ?? null), "html", null, true);
        echo "
    
    <br />
    
    <a class=\"btn btn-primary \" href='/'>返回首页</a>

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
        return array (  56 => 18,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "error/error.html", "D:\\app\\workroom\\php\\project\\slim-board\\data\\views\\error\\error.html");
    }
}
