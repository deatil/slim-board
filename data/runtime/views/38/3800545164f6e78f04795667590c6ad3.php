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

/* admin/board/board/index.html */
class __TwigTemplate_4b834f798894b8ac0a5e70d62fe1d82d extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'content' => [$this, 'block_content'],
            'script_append' => [$this, 'block_script_append'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "admin/board/common/base.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("admin/board/common/base.html", "admin/board/board/index.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "控制台";
    }

    // line 5
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 6
        echo "<div class=\"content\">
    <div class=\"page-inner\">
        <div class=\"page-header\">
            <h4 class=\"page-title\">分类管理</h4>
            <ul class=\"breadcrumbs\">
                <li class=\"nav-home\">
                    <a href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->urlFor("admin.index"), "html", null, true);
        echo "\">
                        <i class=\"flaticon-home\"></i>
                    </a>
                </li>
                <li class=\"separator\">
                    <i class=\"flaticon-right-arrow\"></i>
                </li>
                <li class=\"nav-item\">
                    <a href=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->urlFor("admin.board.index"), "html", null, true);
        echo "\">分类管理</a>
                </li>
            </ul>
        </div>
        
        <div class=\"row\">
            <div class=\"col-md-12\">
                <div class=\"card\">
                    <div class=\"card-header\">
                        <div class=\"card-title\">分类列表</div>
                    </div>
                    <div class=\"card-body\">
                        <div class=\"card-sub\">
                            分类 <code class=\"highlighter-rouge\">删除</code> 为直接删除数据，请注意！
                        </div>
                        <div class=\"table-responsive\">
                            <table class=\"table table-bordered table-head-bg-success\">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Table heading</th>
                                        <th>Table heading</th>
                                        <th>Table heading</th>
                                        <th>Table heading</th>
                                        <th>Table heading</th>
                                        <th>Table heading</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope=\"row\">1</th>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                    </tr>
                                    <tr>
                                        <th scope=\"row\">2</th>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                    </tr>
                                    <tr>
                                        <th scope=\"row\">3</th>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class=\"col-md-12\">
                <ul class=\"pagination pg-primary\">
                    <li class=\"page-item\">
                        <a class=\"page-link\" href=\"#\" aria-label=\"Previous\">
                            <span aria-hidden=\"true\">&laquo;</span>
                            <span class=\"sr-only\">Previous</span>
                        </a>
                    </li>
                    <li class=\"page-item active\"><a class=\"page-link\" href=\"#\">1</a></li>
                    <li class=\"page-item\"><a class=\"page-link\" href=\"#\">2</a></li>
                    <li class=\"page-item\"><a class=\"page-link\" href=\"#\">3</a></li>
                    <li class=\"page-item\">
                        <a class=\"page-link\" href=\"#\" aria-label=\"Next\">
                            <span aria-hidden=\"true\">&raquo;</span>
                            <span class=\"sr-only\">Next</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

";
    }

    // line 108
    public function block_script_append($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 109
        echo "<script>
\$(function() {
    \$(\".nav-item.board-cate\").addClass(\"active\");
});
</script>
";
    }

    public function getTemplateName()
    {
        return "admin/board/board/index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  173 => 109,  169 => 108,  78 => 20,  67 => 12,  59 => 6,  55 => 5,  48 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "admin/board/board/index.html", "D:\\app\\workroom\\php\\project\\slim-board\\data\\views\\admin\\board\\board\\index.html");
    }
}
