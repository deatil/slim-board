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

/* admin/board/common/header.html */
class __TwigTemplate_9b638b92481bb1723d165f69a6b8bdca extends Template
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
        echo "<div class=\"main-header\" data-background-color=\"purple\">
    <!-- Logo Header -->
    <div class=\"logo-header\">
        
        <a href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->urlFor("admin.index"), "html", null, true);
        echo "\" class=\"logo\">
            <img src='";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getRuntime('App\Board\Twig\TwigRuntimeExtension')->adminAssets("img/logo.svg"), "html", null, true);
        echo "' 
                alt=\"slim board\" 
                class=\"navbar-brand\"
                style=\"height:25px;\">
        </a>
        <button class=\"navbar-toggler sidenav-toggler ml-auto\" type=\"button\" data-toggle=\"collapse\" data-target=\"collapse\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
            <span class=\"navbar-toggler-icon\">
                <i class=\"fa fa-bars\"></i>
            </span>
        </button>
        <button class=\"topbar-toggler more\"><i class=\"fa fa-ellipsis-v\"></i></button>
        <div class=\"navbar-minimize\">
            <button class=\"btn btn-minimize btn-rounded\">
                <i class=\"fa fa-bars\"></i>
            </button>
        </div>
    </div>
    <!-- End Logo Header -->

    <!-- Navbar Header -->
    <nav class=\"navbar navbar-header navbar-expand-lg\">
        
        <div class=\"container-fluid\">

            <ul class=\"navbar-nav topbar-nav ml-md-auto align-items-center\">

                <li class=\"nav-item dropdown hidden-caret\">
                    <a class=\"nav-link\" 
                        href=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->urlFor("board.index"), "html", null, true);
        echo "\" 
                        target=\"_blank\"
                        role=\"button\">
                        <i class=\"fa fa-home\"></i>
                        首页
                    </a>
                </li>

                <li class=\"nav-item dropdown hidden-caret\">
                    <a class=\"dropdown-toggle profile-pic\" data-toggle=\"dropdown\" href=\"#\" aria-expanded=\"false\">
                        <div class=\"avatar-sm\">
                            <img src='";
        // line 45
        echo twig_escape_filter($this->env, $this->env->getRuntime('App\Board\Twig\TwigRuntimeExtension')->adminAssets("img/profile.jpg"), "html", null, true);
        echo "' alt=\"";
        echo twig_escape_filter($this->env, (($__internal_compile_0 = $this->env->getRuntime('App\Board\Twig\TwigRuntimeExtension')->user()) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0["nickname"] ?? null) : null), "html", null, true);
        echo "\" class=\"avatar-img rounded-circle\">
                        </div>
                    </a>
                    <ul class=\"dropdown-menu dropdown-user animated fadeIn\">
                        <li>
                            <div class=\"user-box\">
                                <div class=\"avatar-lg\"><img src='";
        // line 51
        echo twig_escape_filter($this->env, $this->env->getRuntime('App\Board\Twig\TwigRuntimeExtension')->adminAssets("img/profile.jpg"), "html", null, true);
        echo "' alt=\"image profile\" class=\"avatar-img rounded\"></div>
                                <div class=\"u-text\">
                                    <h4>";
        // line 53
        echo twig_escape_filter($this->env, (($__internal_compile_1 = $this->env->getRuntime('App\Board\Twig\TwigRuntimeExtension')->user()) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1["nickname"] ?? null) : null), "html", null, true);
        echo "</h4>
                                    <p class=\"text-muted user-sign\">";
        // line 54
        echo twig_escape_filter($this->env, (($__internal_compile_2 = $this->env->getRuntime('App\Board\Twig\TwigRuntimeExtension')->user()) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2["sign"] ?? null) : null), "html", null, true);
        echo "</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class=\"dropdown-divider\"></div>
                            <a class=\"dropdown-item js-user-logout\" 
                                href=\"javascript:;\" 
                                data-href=\"";
        // line 62
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->urlFor("admin.auth-logout"), "html", null, true);
        echo "\">退出登录</a>
                        </li>
                    </ul>
                </li>
                
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->
</div>
";
    }

    public function getTemplateName()
    {
        return "admin/board/common/header.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  123 => 62,  112 => 54,  108 => 53,  103 => 51,  92 => 45,  78 => 34,  47 => 6,  43 => 5,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "admin/board/common/header.html", "D:\\app\\workroom\\php\\project\\slim-board\\data\\views\\admin\\board\\common\\header.html");
    }
}
