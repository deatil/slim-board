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

/* board/timi/profile/password.html */
class __TwigTemplate_7fa5988b6fe00c011b83ed2747e41b21 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'head' => [$this, 'block_head'],
            'content' => [$this, 'block_content'],
            'script' => [$this, 'block_script'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "board/timi/common/base.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("board/timi/common/base.html", "board/timi/profile/password.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "更改密码";
    }

    // line 5
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 6
        echo "    ";
        $this->displayParentBlock("head", $context, $blocks);
        echo "
    <style type=\"text/css\">
    .important { color: #336699; }
    </style>
";
    }

    // line 12
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 13
        echo "    <div class=\"password-box\">
        更改密码

        <hr />

        <form method=\"post\">
            旧密码:<br>
            <input type=\"password\" 
                name=\"oldpassword\"
                autocomplete=\"false\"
                id=\"oldpassword\">
            <br>
            账号的旧密码
            <br>
            <br>
            
            新密码:<br>
            <input type=\"password\" 
                name=\"newpassword\"
                autocomplete=\"false\"
                id=\"newpassword\">
            <br>
            账号的新密码
            <br>
            <br>
            
            确认新密码:<br>
            <input type=\"password\" 
                name=\"newpassword_check\"
                autocomplete=\"false\"
                id=\"newpassword_check\">
            <br>
            再次确认新密码
            <br>
            <br>
            
            <button type=\"button\" class=\"layui-btn js-save-button\">保存</button>
        </form> 

    </div>
";
    }

    // line 55
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 56
        echo "    <script src='";
        echo twig_escape_filter($this->env, $this->env->getRuntime('App\Twig\TwigRuntimeExtension')->assets("js/jquery-3.4.1.min.js"), "html", null, true);
        echo "' type=\"text/javascript\"></script>
    <script src='";
        // line 57
        echo twig_escape_filter($this->env, $this->env->getRuntime('App\Twig\TwigRuntimeExtension')->assets("js/layer/layer.js"), "html", null, true);
        echo "' type=\"text/javascript\"></script>
    <script type=\"text/javascript\">
    (function(\$) {
        \"use strict\";
        
        // 登录
        \$(\".js-save-button\").click(function(e) {
            e.stopPropagation;
            e.preventDefault;

            var oldpassword = \$(\"#oldpassword\").val();
            var newpassword = \$(\"#newpassword\").val();
            var newpassword_check = \$(\"#newpassword_check\").val();

            var url = \"";
        // line 71
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->urlFor("board.profile-password-save"), "html", null, true);
        echo "\";
            \$.post(url, {
                oldpassword: oldpassword,
                newpassword: newpassword,
                newpassword_check: newpassword_check,
            }, function(data) {
                if (data.code == 0) {
                    layer.msg(\"更改密码成功\");
                    
                    setTimeout(function() {
                        window.location.href = \"";
        // line 81
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->urlFor("board.profile-password"), "html", null, true);
        echo "\";
                    }, 1500);
                } else {
                    layer.msg(data.msg);
                }
            }).fail(function (xhr, status, info) {
                layer.msg(\"请求失败\");
            });
        });
    })(jQuery);
    </script>
";
    }

    public function getTemplateName()
    {
        return "board/timi/profile/password.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  157 => 81,  144 => 71,  127 => 57,  122 => 56,  118 => 55,  74 => 13,  70 => 12,  60 => 6,  56 => 5,  49 => 3,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "board/timi/profile/password.html", "D:\\app\\workroom\\php\\project\\slim-board\\data\\views\\board\\timi\\profile\\password.html");
    }
}
