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

/* admin/board/common/base.html */
class __TwigTemplate_9dddca4ec60f950c58e30934e3bf00de extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'head' => [$this, 'block_head'],
            'body' => [$this, 'block_body'],
            'header' => [$this, 'block_header'],
            'sidebar' => [$this, 'block_sidebar'],
            'content' => [$this, 'block_content'],
            'footer' => [$this, 'block_footer'],
            'settings' => [$this, 'block_settings'],
            'script_before' => [$this, 'block_script_before'],
            'script' => [$this, 'block_script'],
            'script_plugin' => [$this, 'block_script_plugin'],
            'script_append' => [$this, 'block_script_append'],
            'script_after' => [$this, 'block_script_after'],
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
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\" />
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel=\"icon\" href=\"/favicon.ico\" type=\"image/x-icon\"/>
    <title>";
        // line 9
        $this->displayBlock('title', $context, $blocks);
        echo " - Board System</title>
    ";
        // line 10
        $this->displayBlock('head', $context, $blocks);
        // line 13
        echo "</head>

";
        // line 15
        $this->displayBlock('body', $context, $blocks);
        // line 68
        echo "
</html>

";
    }

    // line 9
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 10
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 11
        echo "        ";
        $this->loadTemplate("admin/board/common/head.html", "admin/board/common/base.html", 11)->display($context);
        // line 12
        echo "    ";
    }

    // line 15
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 16
        echo "
<body>
    <div class=\"wrapper\">
        ";
        // line 19
        $this->displayBlock('header', $context, $blocks);
        // line 22
        echo "            
        ";
        // line 23
        $this->displayBlock('sidebar', $context, $blocks);
        // line 26
        echo "        
        <div class=\"main-panel\">
            ";
        // line 28
        $this->displayBlock('content', $context, $blocks);
        // line 29
        echo "        
            ";
        // line 30
        $this->displayBlock('footer', $context, $blocks);
        // line 33
        echo "        </div>
            
        ";
        // line 35
        $this->displayBlock('settings', $context, $blocks);
        // line 38
        echo "        
    </div>
    
    ";
        // line 41
        $this->displayBlock('script_before', $context, $blocks);
        // line 42
        echo "    
    ";
        // line 43
        $this->displayBlock('script', $context, $blocks);
        // line 63
        echo "    
    ";
        // line 64
        $this->displayBlock('script_after', $context, $blocks);
        // line 65
        echo "</body>

";
    }

    // line 19
    public function block_header($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 20
        echo "            ";
        $this->loadTemplate("admin/board/common/header.html", "admin/board/common/base.html", 20)->display($context);
        // line 21
        echo "        ";
    }

    // line 23
    public function block_sidebar($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 24
        echo "            ";
        $this->loadTemplate("admin/board/common/sidebar.html", "admin/board/common/base.html", 24)->display($context);
        // line 25
        echo "        ";
    }

    // line 28
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 30
    public function block_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 31
        echo "                ";
        $this->loadTemplate("admin/board/common/footer.html", "admin/board/common/base.html", 31)->display($context);
        // line 32
        echo "            ";
    }

    // line 35
    public function block_settings($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 36
        echo "            ";
        $this->loadTemplate("admin/board/common/settings.html", "admin/board/common/base.html", 36)->display($context);
        // line 37
        echo "        ";
    }

    // line 41
    public function block_script_before($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 43
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 44
        echo "        <script src='";
        echo twig_escape_filter($this->env, $this->env->getRuntime('App\Twig\TwigRuntimeExtension')->adminAssets("js/core/jquery.3.2.1.min.js"), "html", null, true);
        echo "'></script>
        <script src='";
        // line 45
        echo twig_escape_filter($this->env, $this->env->getRuntime('App\Twig\TwigRuntimeExtension')->adminAssets("js/core/popper.min.js"), "html", null, true);
        echo "'></script>
        <script src='";
        // line 46
        echo twig_escape_filter($this->env, $this->env->getRuntime('App\Twig\TwigRuntimeExtension')->adminAssets("js/core/bootstrap.min.js"), "html", null, true);
        echo "'></script>
        
        <script src='";
        // line 48
        echo twig_escape_filter($this->env, $this->env->getRuntime('App\Twig\TwigRuntimeExtension')->adminAssets("js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"), "html", null, true);
        echo "'></script>
        <script src='";
        // line 49
        echo twig_escape_filter($this->env, $this->env->getRuntime('App\Twig\TwigRuntimeExtension')->adminAssets("js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"), "html", null, true);
        echo "'></script>

        <!-- jQuery Scrollbar -->
        <script src='";
        // line 52
        echo twig_escape_filter($this->env, $this->env->getRuntime('App\Twig\TwigRuntimeExtension')->adminAssets("js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"), "html", null, true);
        echo "'></script>
        
        ";
        // line 54
        $this->displayBlock('script_plugin', $context, $blocks);
        // line 55
        echo "        
        <script src='";
        // line 56
        echo twig_escape_filter($this->env, $this->env->getRuntime('App\Twig\TwigRuntimeExtension')->adminAssets("js/ready.js"), "html", null, true);
        echo "'></script>
        <script src='";
        // line 57
        echo twig_escape_filter($this->env, $this->env->getRuntime('App\Twig\TwigRuntimeExtension')->adminAssets("js/layer/layer.js"), "html", null, true);
        echo "' type=\"text/javascript\"></script>
        
        <script src='";
        // line 59
        echo twig_escape_filter($this->env, $this->env->getRuntime('App\Twig\TwigRuntimeExtension')->adminAssets("js/setting.js"), "html", null, true);
        echo "'></script>
        
        ";
        // line 61
        $this->displayBlock('script_append', $context, $blocks);
        // line 62
        echo "    ";
    }

    // line 54
    public function block_script_plugin($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 61
    public function block_script_append($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 64
    public function block_script_after($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "admin/board/common/base.html";
    }

    public function getDebugInfo()
    {
        return array (  278 => 64,  272 => 61,  266 => 54,  262 => 62,  260 => 61,  255 => 59,  250 => 57,  246 => 56,  243 => 55,  241 => 54,  236 => 52,  230 => 49,  226 => 48,  221 => 46,  217 => 45,  212 => 44,  208 => 43,  202 => 41,  198 => 37,  195 => 36,  191 => 35,  187 => 32,  184 => 31,  180 => 30,  174 => 28,  170 => 25,  167 => 24,  163 => 23,  159 => 21,  156 => 20,  152 => 19,  146 => 65,  144 => 64,  141 => 63,  139 => 43,  136 => 42,  134 => 41,  129 => 38,  127 => 35,  123 => 33,  121 => 30,  118 => 29,  116 => 28,  112 => 26,  110 => 23,  107 => 22,  105 => 19,  100 => 16,  96 => 15,  92 => 12,  89 => 11,  85 => 10,  79 => 9,  72 => 68,  70 => 15,  66 => 13,  64 => 10,  60 => 9,  50 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "admin/board/common/base.html", "D:\\app\\workroom\\php\\project\\slim-board\\data\\views\\admin\\board\\common\\base.html");
    }
}
