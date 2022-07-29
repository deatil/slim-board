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

/* admin/board/auth/login.html */
class __TwigTemplate_306ba444b62e9ff45101b6c5bc1bf1a0 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
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
        $this->parent = $this->loadTemplate("admin/board/common/base.html", "admin/board/auth/login.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "管理登录";
    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 6
        echo "<body class=\"login\">
    <style>
    .login-captcha {
        position: relative;
    }
    .login-captcha-input {
        width: 170px;
    }
    .login-captcha-img {
        cursor: pointer;
        position: absolute;
        top: 37px;
        right: 11px;
        border-radius: .25rem;
    }
    </style>

    <div class=\"wrapper wrapper-login\">
        <div class=\"container container-login animated fadeIn\">
            <h3 class=\"text-center\">管理登录</h3>
            <div class=\"login-form\">
                <div class=\"form-group\">
                    <label for=\"password\" class=\"placeholder\"><b>密码</b></label>
                    <div class=\"position-relative\">
                        <input id=\"password\" name=\"password\" type=\"password\" class=\"form-control\" required>
                        <div class=\"show-password\">
                            <i class=\"flaticon-interface\"></i>
                        </div>
                    </div>
                </div>
                
                <div class=\"form-group login-captcha\">
                    <label for=\"captcha\" class=\"placeholder\"><b>验证码</b></label>
                    <input id=\"captcha\" name=\"captcha\" type=\"text\" class=\"form-control login-captcha-input\" required>
                    <img src=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getRuntime('App\Twig\TwigRuntimeExtension')->adminAssets("img/captcha.jpg"), "html", null, true);
        echo "\" 
                        data-src=\"";
        // line 41
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->urlFor("admin.auth-captcha"), "html", null, true);
        echo "\" 
                        title=\"刷新验证码\"
                        class=\"login-captcha-img js-captcha-refresh\"/>
                    <br>
                </div>
                
                <div class=\"form-group form-action\">
                    <a href=\"javascript:;\" class=\"btn btn-primary col-md-5 mt-3 mt-sm-0 fw-bold js-login-button\">登录</a>
                </div>
            </div>
        </div>
    </div>
    
    <script src='";
        // line 54
        echo twig_escape_filter($this->env, $this->env->getRuntime('App\Twig\TwigRuntimeExtension')->adminAssets("js/core/jquery.3.2.1.min.js"), "html", null, true);
        echo "'></script>
    <script src='";
        // line 55
        echo twig_escape_filter($this->env, $this->env->getRuntime('App\Twig\TwigRuntimeExtension')->adminAssets("js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"), "html", null, true);
        echo "'></script>
    <script src='";
        // line 56
        echo twig_escape_filter($this->env, $this->env->getRuntime('App\Twig\TwigRuntimeExtension')->adminAssets("js/core/popper.min.js"), "html", null, true);
        echo "'></script>
    <script src='";
        // line 57
        echo twig_escape_filter($this->env, $this->env->getRuntime('App\Twig\TwigRuntimeExtension')->adminAssets("js/core/bootstrap.min.js"), "html", null, true);
        echo "'></script>
    <script src='";
        // line 58
        echo twig_escape_filter($this->env, $this->env->getRuntime('App\Twig\TwigRuntimeExtension')->adminAssets("js/ready.js"), "html", null, true);
        echo "'></script>
    
    <script src='";
        // line 60
        echo twig_escape_filter($this->env, $this->env->getRuntime('App\Twig\TwigRuntimeExtension')->adminAssets("js/layer/layer.js"), "html", null, true);
        echo "' type=\"text/javascript\"></script>
    <script type=\"text/javascript\">
    (function(\$) {
        \"use strict\";
        
        // 刷新验证码
        \$(\".js-captcha-refresh\").click(function(e) {
            e.stopPropagation;
            e.preventDefault;
            
            var url = \$(this).data(\"src\") + \"?t=\" + Math.random();
            \$(this).attr(\"src\", url);
        });
        
        setTimeout(function() {
            \$(\".js-captcha-refresh\").trigger(\"click\");
        }, 50);
        
        // 登录
        \$(\".js-login-button\").click(function(e) {
            e.stopPropagation;
            e.preventDefault;

            var password = \$(\"#password\").val();
            var captcha = \$(\"#captcha\").val();

            var url = \"";
        // line 86
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->urlFor("admin.auth-login-check"), "html", null, true);
        echo "\";
            \$.post(url, {
                password: password,
                captcha: captcha,
            }, function(data) {
                if (data.code == 0) {
                    layer.msg(\"登录成功\");
                    
                    setTimeout(function() {
                        window.location.href = \"";
        // line 95
        echo twig_escape_filter($this->env, $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->urlFor("admin.index"), "html", null, true);
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

";
    }

    public function getTemplateName()
    {
        return "admin/board/auth/login.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  176 => 95,  164 => 86,  135 => 60,  130 => 58,  126 => 57,  122 => 56,  118 => 55,  114 => 54,  98 => 41,  94 => 40,  58 => 6,  54 => 5,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "admin/board/auth/login.html", "D:\\app\\workroom\\php\\project\\slim-board\\data\\views\\admin\\board\\auth\\login.html");
    }
}
