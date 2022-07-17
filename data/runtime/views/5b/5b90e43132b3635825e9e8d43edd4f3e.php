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

/* auth/login.html */
class __TwigTemplate_908c1b4b7327ac7762a331a325bdadff extends Template
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
        echo "登录

<hr />

<form>
 First name:<br>
<input type=\"text\" name=\"firstname\">
<br>
 Last name:<br>
<input type=\"text\" name=\"lastname\">
</form> ";
    }

    public function getTemplateName()
    {
        return "auth/login.html";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("登录

<hr />

<form>
 First name:<br>
<input type=\"text\" name=\"firstname\">
<br>
 Last name:<br>
<input type=\"text\" name=\"lastname\">
</form> ", "auth/login.html", "D:\\app\\workroom\\php\\project\\slim-board\\data\\views\\auth\\login.html");
    }
}
