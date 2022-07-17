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

/* __string_template__0d35cc659bfe68de1e803595d4bf09dd */
class __TwigTemplate_4c82f999050d5903934721c86767da28 extends Template
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
        echo "<p>Hi, my name is ";
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo ".</p>";
    }

    public function getTemplateName()
    {
        return "__string_template__0d35cc659bfe68de1e803595d4bf09dd";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "__string_template__0d35cc659bfe68de1e803595d4bf09dd", "");
    }
}
