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

/* admin/board/profile/index.html */
class __TwigTemplate_8bfed24b699ddd111a30ddde6b1c4e1e extends Template
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
            'script' => [$this, 'block_script'],
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
        $this->parent = $this->loadTemplate("admin/board/common/base.html", "admin/board/profile/index.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "更新信息";
    }

    // line 5
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 6
        echo "    <div class=\"profile-box\">
        更新信息
        
        <a href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->urlFor("admin.index"), "html", null, true);
        echo "\">返回首页</a>

        <hr />

        <form method=\"post\">
            账号:<br>
            <input type=\"text\" 
                name=\"username\"
                autocomplete=\"false\"
                value=\"";
        // line 18
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "username", [], "any", false, false, false, 18), "html", null, true);
        echo "\"
                id=\"username\">
            <br>
            
            账号昵称:<br>
            <input type=\"text\" 
                name=\"nickname\"
                value=\"";
        // line 25
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "nickname", [], "any", false, false, false, 25), "html", null, true);
        echo "\"
                id=\"nickname\">
            <br>
            
            个性签名:<br>
            <textarea class=\"form-control\" 
                name=\"sign\"
                placeholder=\"自定义签名\" 
                id=\"sign\" 
                style=\"height: 150px;\">";
        // line 34
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "sign", [], "any", false, false, false, 34), "html", null, true);
        echo "</textarea>
            <br>
            
            <button type=\"button\" class=\"layui-btn js-save-button\">保存</button>
        </form> 

    </div>
";
    }

    // line 43
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 44
        echo "    <script src='";
        echo twig_escape_filter($this->env, $this->env->getRuntime('App\Twig\TwigRuntimeExtension')->assets("js/jquery-3.4.1.min.js"), "html", null, true);
        echo "' type=\"text/javascript\"></script>
    <script src='";
        // line 45
        echo twig_escape_filter($this->env, $this->env->getRuntime('App\Twig\TwigRuntimeExtension')->assets("js/layer/layer.js"), "html", null, true);
        echo "' type=\"text/javascript\"></script>
    <script type=\"text/javascript\">
    (function(\$) {
        \"use strict\";
        
        // 登录
        \$(\".js-save-button\").click(function(e) {
            e.stopPropagation;
            e.preventDefault;

            var username = \$(\"#username\").val();
            var nickname = \$(\"#nickname\").val();
            var sign = \$(\"#sign\").val();

            var url = \"";
        // line 59
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->urlFor("admin.profile-save"), "html", null, true);
        echo "\";
            \$.post(url, {
                username: username,
                nickname: nickname,
                sign: sign,
            }, function(data) {
                if (data.code == 0) {
                    layer.msg(\"更新信息成功\");
                    
                    setTimeout(function() {
                        window.location.href = \"";
        // line 69
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->urlFor("admin.profile"), "html", null, true);
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
        return "admin/board/profile/index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  149 => 69,  136 => 59,  119 => 45,  114 => 44,  110 => 43,  98 => 34,  86 => 25,  76 => 18,  64 => 9,  59 => 6,  55 => 5,  48 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "admin/board/profile/index.html", "D:\\app\\workroom\\php\\project\\slim-board\\data\\views\\admin\\board\\profile\\index.html");
    }
}
