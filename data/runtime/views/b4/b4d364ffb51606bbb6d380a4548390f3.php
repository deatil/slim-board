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

/* admin/board/common/head.html */
class __TwigTemplate_938a496f32f56e3be49e2b7ebd1575fe extends Template
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
        echo "<!-- Fonts and icons -->
<script src='";
        // line 2
        echo twig_escape_filter($this->env, $this->env->getRuntime('App\Board\Twig\TwigRuntimeExtension')->adminAssets("js/plugin/webfont/webfont.min.js"), "html", null, true);
        echo "'></script>
<script>
    WebFont.load({
        google: {\"families\":[\"Open+Sans:300,400,600,700\"]},
        custom: {\"families\":[\"Flaticon\", \"Font Awesome 5 Solid\", \"Font Awesome 5 Regular\", \"Font Awesome 5 Brands\"], urls: ['";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getRuntime('App\Board\Twig\TwigRuntimeExtension')->adminAssets("css/fonts.css"), "html", null, true);
        echo "']},
        active: function() {
            sessionStorage.fonts = true;
        }
    });
</script>

<!-- CSS Files -->
<link rel=\"stylesheet\" href='";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getRuntime('App\Board\Twig\TwigRuntimeExtension')->adminAssets("css/bootstrap.min.css"), "html", null, true);
        echo "'>
<link rel=\"stylesheet\" href='";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getRuntime('App\Board\Twig\TwigRuntimeExtension')->adminAssets("css/azzara.min.css"), "html", null, true);
        echo "'>
<link rel=\"stylesheet\" href='";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getRuntime('App\Board\Twig\TwigRuntimeExtension')->adminAssets("css/app.css"), "html", null, true);
        echo "'>
";
    }

    public function getTemplateName()
    {
        return "admin/board/common/head.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 16,  62 => 15,  58 => 14,  47 => 6,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "admin/board/common/head.html", "D:\\app\\workroom\\php\\project\\slim-board\\data\\views\\admin\\board\\common\\head.html");
    }
}
