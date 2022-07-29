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

/* admin/board/common/sidebar.html */
class __TwigTemplate_92055b7fca1177ddbfe64562dd19fe9a extends Template
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
        echo "<!-- Sidebar -->
<div class=\"sidebar\">
    
    <div class=\"sidebar-background\"></div>
    <div class=\"sidebar-wrapper scrollbar-inner\">
        <div class=\"sidebar-content\">
            <ul class=\"nav\">
                <li class=\"nav-item board-index\">
                    <a href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->urlFor("admin.index"), "html", null, true);
        echo "\">
                        <i class=\"fas fa-home\"></i>
                        <p>控制台</p>
                    </a>
                </li>
                
                <li class=\"nav-section\">
                    <span class=\"sidebar-mini-icon\">
                        <i class=\"fa fa-ellipsis-h\"></i>
                    </span>
                    <h4 class=\"text-section\">常规管理</h4>
                </li>
                <li class=\"nav-item board-cate\">
                    <a href=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->urlFor("admin.board.index"), "html", null, true);
        echo "\">
                        <i class=\"fas fa-list\"></i>
                        <p>分类管理</p>
                    </a>
                </li>
                <li class=\"nav-item\">
                    <a data-toggle=\"collapse\" href=\"#topic\">
                        <i class=\"fas fa-comment-alt\"></i>
                        <p>话题管理</p>
                        <span class=\"caret\"></span>
                    </a>
                    <div class=\"collapse\" id=\"topic\">
                        <ul class=\"nav nav-collapse\">
                            <li class=\"board-cate-topic\">
                                <a href=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->urlFor("admin.topic.index"), "html", null, true);
        echo "\">
                                    <span class=\"sub-item\">话题列表</span>
                                </a>
                            </li>
                            <li class=\"board-cate-reply\">
                                <a href=\"";
        // line 41
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->urlFor("admin.reply.index"), "html", null, true);
        echo "\">
                                    <span class=\"sub-item\">回复管理</span>
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                </li>
                <li class=\"nav-item board-user\">
                    <a href=\"";
        // line 50
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->urlFor("admin.user.index"), "html", null, true);
        echo "\">
                        <i class=\"fas fa-user\"></i>
                        <p>账号管理</p>
                    </a>
                </li>
                
                <li class=\"nav-section\">
                    <span class=\"sidebar-mini-icon\">
                        <i class=\"fa fa-ellipsis-h\"></i>
                    </span>
                    <h4 class=\"text-section\">系统管理</h4>
                </li>
                <li class=\"nav-item board-setting\">
                    <a href=\"";
        // line 63
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->urlFor("admin.setting.index"), "html", null, true);
        echo "\">
                        <i class=\"fas fa-cog\"></i>
                        <p>网站设置</p>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
";
    }

    public function getTemplateName()
    {
        return "admin/board/common/sidebar.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  116 => 63,  100 => 50,  88 => 41,  80 => 36,  63 => 22,  47 => 9,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "admin/board/common/sidebar.html", "D:\\app\\workroom\\php\\project\\slim-board\\data\\views\\admin\\board\\common\\sidebar.html");
    }
}
