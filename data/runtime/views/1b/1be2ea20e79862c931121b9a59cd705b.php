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

/* board/timi/common/base.html */
class __TwigTemplate_0d0e774185ad5f06e8e02238db73c22a extends Template
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
            'content' => [$this, 'block_content'],
            'footer' => [$this, 'block_footer'],
            'script' => [$this, 'block_script'],
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
        echo " - Board</title>
    ";
        // line 10
        $this->displayBlock('head', $context, $blocks);
        // line 11
        echo "</head>

";
        // line 13
        $this->displayBlock('body', $context, $blocks);
        // line 34
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
    }

    // line 13
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 14
        echo "<body>
    <div class=\"box\">
        <div id=\"header\">
            ";
        // line 17
        $this->displayBlock('header', $context, $blocks);
        // line 20
        echo "        </div>
        <div id=\"content\">";
        // line 21
        $this->displayBlock('content', $context, $blocks);
        echo "</div>
        <div id=\"footer\">
            ";
        // line 23
        $this->displayBlock('footer', $context, $blocks);
        // line 26
        echo "        </div>

    </div>
    
    ";
        // line 30
        $this->displayBlock('script', $context, $blocks);
        // line 31
        echo "
</body>
";
    }

    // line 17
    public function block_header($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 18
        echo "                ";
        $this->loadTemplate("board/timi/common/header.html", "board/timi/common/base.html", 18)->display($context);
        // line 19
        echo "            ";
    }

    // line 21
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 23
    public function block_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 24
        echo "                ";
        $this->loadTemplate("board/timi/common/footer.html", "board/timi/common/base.html", 24)->display($context);
        // line 25
        echo "            ";
    }

    // line 30
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "board/timi/common/base.html";
    }

    public function getDebugInfo()
    {
        return array (  148 => 30,  144 => 25,  141 => 24,  137 => 23,  131 => 21,  127 => 19,  124 => 18,  120 => 17,  114 => 31,  112 => 30,  106 => 26,  104 => 23,  99 => 21,  96 => 20,  94 => 17,  89 => 14,  85 => 13,  79 => 10,  73 => 9,  66 => 34,  64 => 13,  60 => 11,  58 => 10,  54 => 9,  44 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "board/timi/common/base.html", "D:\\app\\workroom\\php\\project\\slim-board\\data\\views\\board\\timi\\common\\base.html");
    }
}
