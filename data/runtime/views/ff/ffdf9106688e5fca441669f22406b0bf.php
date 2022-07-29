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

/* admin/board/common/settings.html */
class __TwigTemplate_f8b04c6585c44fdb1f2e8a432e6b9cc2 extends Template
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
        echo "<!-- Custom template | don't include it in your project! -->
<div class=\"custom-template\">
    <div class=\"title\">Settings</div>
    <div class=\"custom-content\">
        <div class=\"switcher\">
            <div class=\"switch-block\">
                <h4>Topbar</h4>
                <div class=\"btnSwitch\">
                    <button type=\"button\" class=\"changeMainHeaderColor\" data-color=\"blue\"></button>
                    <button type=\"button\" class=\"selected changeMainHeaderColor\" data-color=\"purple\"></button>
                    <button type=\"button\" class=\"changeMainHeaderColor\" data-color=\"light-blue\"></button>
                    <button type=\"button\" class=\"changeMainHeaderColor\" data-color=\"green\"></button>
                    <button type=\"button\" class=\"changeMainHeaderColor\" data-color=\"orange\"></button>
                    <button type=\"button\" class=\"changeMainHeaderColor\" data-color=\"red\"></button>
                </div>
            </div>
            <div class=\"switch-block\">
                <h4>Background</h4>
                <div class=\"btnSwitch\">
                    <button type=\"button\" class=\"changeBackgroundColor\" data-color=\"bg2\"></button>
                    <button type=\"button\" class=\"changeBackgroundColor selected\" data-color=\"bg1\"></button>
                    <button type=\"button\" class=\"changeBackgroundColor\" data-color=\"bg3\"></button>
                </div>
            </div>
        </div>
    </div>
    <div class=\"custom-toggle\">
        <i class=\"flaticon-settings\"></i>
    </div>
</div>
<!-- End Custom template -->
";
    }

    public function getTemplateName()
    {
        return "admin/board/common/settings.html";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "admin/board/common/settings.html", "D:\\app\\workroom\\php\\project\\slim-board\\data\\views\\admin\\board\\common\\settings.html");
    }
}
