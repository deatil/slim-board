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

/* admin/board/index/data.html */
class __TwigTemplate_3aa0e5acda7138ff1dbb261e2d29681c extends Template
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

<br />


";
        // line 6
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
    }

    public function getTemplateName()
    {
        return "admin/board/index/data.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  44 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "admin/board/index/data.html", "D:\\app\\workroom\\php\\project\\slim-board\\data\\views\\admin\\board\\index\\data.html");
    }
}
