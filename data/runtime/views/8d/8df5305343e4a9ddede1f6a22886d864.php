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

/* board/timi/index/index.html */
class __TwigTemplate_d58cee641b52ac28b34687929503896c extends Template
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
        echo "index

";
        // line 3
        if (($this->env->getRuntime('App\Twig\TwigRuntimeExtension')->user() != "")) {
            // line 4
            echo "    <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->urlFor("board.auth-logout"), "html", null, true);
            echo "\">退出登录</a>
";
        } else {
            // line 6
            echo "    <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->urlFor("board.auth-login"), "html", null, true);
            echo "\">马上登录</a>
";
        }
    }

    public function getTemplateName()
    {
        return "board/timi/index/index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  49 => 6,  43 => 4,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "board/timi/index/index.html", "D:\\app\\workroom\\php\\project\\slim-board\\data\\views\\board\\timi\\index\\index.html");
    }
}
