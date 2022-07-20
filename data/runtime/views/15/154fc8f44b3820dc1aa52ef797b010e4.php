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

        $this->parent = false;

        $this->blocks = [
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
    <meta name=\"renderer\" content=\"webkit\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0\">
    <title>更新信息</title>
</head>

<body>
    <div class=\"box\">
        更新信息
        
        <a href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->urlFor("admin.index"), "html", null, true);
        echo "\">返回首页</a>

        <hr />

        <form method=\"post\">
            账号:<br>
            <input type=\"text\" 
                name=\"username\"
                autocomplete=\"false\"
                value=\"";
        // line 25
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "username", [], "any", false, false, false, 25), "html", null, true);
        echo "\"
                id=\"username\">
            <br>
            
            账号昵称:<br>
            <input type=\"text\" 
                name=\"nickname\"
                value=\"";
        // line 32
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "nickname", [], "any", false, false, false, 32), "html", null, true);
        echo "\"
                id=\"nickname\">
            <br>
            
            账号密码:<br>
            <input type=\"password\" 
                name=\"password\"
                autocomplete=\"false\"
                id=\"password\">
            <br>
            留空不更新密码
            <br>
            
            个性签名:<br>
            <textarea class=\"form-control\" 
                name=\"sign\"
                placeholder=\"自定义签名\" 
                id=\"sign\" 
                style=\"height: 150px;\">";
        // line 50
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "sign", [], "any", false, false, false, 50), "html", null, true);
        echo "</textarea>
            <br>
            
            <button type=\"button\" class=\"layui-btn js-save-button\">保存</button>
        </form> 

    </div>
    <script src='";
        // line 57
        echo twig_escape_filter($this->env, $this->env->getRuntime('App\Twig\TwigRuntimeExtension')->assets("js/jquery-3.4.1.min.js"), "html", null, true);
        echo "' type=\"text/javascript\"></script>
    <script src='";
        // line 58
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
            var password = \$(\"#password\").val();
            var sign = \$(\"#sign\").val();

            var url = \"";
        // line 73
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->urlFor("admin.profile-save"), "html", null, true);
        echo "\";
            \$.post(url, {
                username: username,
                nickname: nickname,
                password: password,
                sign: sign,
            }, function(data) {
                if (data.code == 0) {
                    layer.msg(\"更新信息成功\");
                    
                    setTimeout(function() {
                        window.location.href = \"";
        // line 84
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

</body>
</html>

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
        return array (  143 => 84,  129 => 73,  111 => 58,  107 => 57,  97 => 50,  76 => 32,  66 => 25,  54 => 16,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "admin/board/profile/index.html", "D:\\app\\workroom\\php\\project\\slim-board\\data\\views\\admin\\board\\profile\\index.html");
    }
}
