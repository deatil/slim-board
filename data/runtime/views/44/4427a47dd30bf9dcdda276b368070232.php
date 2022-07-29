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

/* admin/board/common/footer_js.html */
class __TwigTemplate_f5b57ba8fefe175929eb7860eb5be6b9 extends Template
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
        echo "<script src='";
        echo twig_escape_filter($this->env, $this->env->getRuntime('App\Twig\TwigRuntimeExtension')->adminAssets("js/core/jquery.3.2.1.min.js"), "html", null, true);
        echo "'></script>
<script src='";
        // line 2
        echo twig_escape_filter($this->env, $this->env->getRuntime('App\Twig\TwigRuntimeExtension')->adminAssets("js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"), "html", null, true);
        echo "'></script>
<script src='";
        // line 3
        echo twig_escape_filter($this->env, $this->env->getRuntime('App\Twig\TwigRuntimeExtension')->adminAssets("js/core/popper.min.js"), "html", null, true);
        echo "'></script>
<script src='";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getRuntime('App\Twig\TwigRuntimeExtension')->adminAssets("js/core/bootstrap.min.js"), "html", null, true);
        echo "'></script>
<script src='";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getRuntime('App\Twig\TwigRuntimeExtension')->adminAssets("js/ready.js"), "html", null, true);
        echo "'></script>
";
    }

    public function getTemplateName()
    {
        return "admin/board/common/footer_js.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  54 => 5,  50 => 4,  46 => 3,  42 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "admin/board/common/footer_js.html", "D:\\app\\workroom\\php\\project\\slim-board\\data\\views\\admin\\board\\common\\footer_js.html");
    }
}
