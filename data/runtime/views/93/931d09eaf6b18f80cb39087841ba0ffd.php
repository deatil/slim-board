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

/* admin/board/index/index.html */
class __TwigTemplate_6b6ccf220ff6e1572a2de50a87cfa6a1 extends Template
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
        echo "admin

<a href=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->urlFor("admin.auth-logout"), "html", null, true);
        echo "\">退出登录</a>

<br />

<a href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->urlFor("admin.profile"), "html", null, true);
        echo "\">更新信息</a>
";
    }

    public function getTemplateName()
    {
        return "admin/board/index/index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  48 => 7,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "admin/board/index/index.html", "D:\\app\\workroom\\php\\project\\slim-board\\data\\views\\admin\\board\\index\\index.html");
    }
}
