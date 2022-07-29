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

/* board/timi/common/footer.html */
class __TwigTemplate_92482c41bfd0f13e19d10ee375343f2a extends Template
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
        echo "<br />

&copy; Copyright 2022 by <a href=\"https://github.com/deatil/slim-board\">slim-board</a>.
";
    }

    public function getTemplateName()
    {
        return "board/timi/common/footer.html";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "board/timi/common/footer.html", "D:\\app\\workroom\\php\\project\\slim-board\\data\\views\\board\\timi\\common\\footer.html");
    }
}
