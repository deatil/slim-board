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

/* board/timi/common/header.html */
class __TwigTemplate_5a425b6c71f77c5bef5fc17fa0b059b7 extends Template
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
        echo "<a href=\"";
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->urlFor("board.index"), "html", null, true);
        echo "\">Board</a>
<br /><br />

";
        // line 4
        if ($this->env->getRuntime('App\Board\Twig\TwigRuntimeExtension')->isLogin()) {
            // line 5
            echo "    ";
            echo twig_escape_filter($this->env, (($__internal_compile_0 = $this->env->getRuntime('App\Board\Twig\TwigRuntimeExtension')->user()) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0["nickname"] ?? null) : null), "html", null, true);
            echo "

    <a href=\"";
            // line 7
            echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->urlFor("board.profile"), "html", null, true);
            echo "\">更新信息</a>
    <a href=\"";
            // line 8
            echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->urlFor("board.profile-password"), "html", null, true);
            echo "\">更改密码</a>
    
    ";
            // line 10
            if (($this->env->getRuntime('App\Board\Twig\TwigRuntimeExtension')->isAdmin() == 1)) {
                // line 11
                echo "        <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->urlFor("admin.index"), "html", null, true);
                echo "\">管理</a>
    ";
            }
            // line 13
            echo "    
    <a href=\"";
            // line 14
            echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->urlFor("board.auth-logout"), "html", null, true);
            echo "\">退出登录</a>
";
        } else {
            // line 16
            echo "    <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->urlFor("board.auth-login"), "html", null, true);
            echo "\">马上登录</a>
";
        }
        // line 18
        echo "
<hr />";
    }

    public function getTemplateName()
    {
        return "board/timi/common/header.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  83 => 18,  77 => 16,  72 => 14,  69 => 13,  63 => 11,  61 => 10,  56 => 8,  52 => 7,  46 => 5,  44 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "board/timi/common/header.html", "D:\\app\\workroom\\php\\project\\slim-board\\data\\views\\board\\timi\\common\\header.html");
    }
}
