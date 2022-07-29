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

/* admin/board/index/index.html */
class __TwigTemplate_68b67748393eed8c392a9b5afdcadcf1 extends Template
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
        $this->parent = $this->loadTemplate("admin/board/common/base.html", "admin/board/index/index.html", 1);
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
            <h4 class=\"page-title\">控制台</h4>
            <div class=\"btn-group btn-group-page-header ml-auto\">
                <button type=\"button\" class=\"btn btn-light btn-round btn-page-header-dropdown dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                    <i class=\"fa fa-ellipsis-h\"></i>
                </button>
                <div class=\"dropdown-menu\">
                    <div class=\"arrow\"></div>
                    <a class=\"dropdown-item\" href=\"#\">话题管理</a>
                    <div class=\"dropdown-divider\"></div>
                    <a class=\"dropdown-item\" href=\"#\">账号管理</a>
                </div>
            </div>
        </div>
        
        <div class=\"row\">
            <div class=\"col-sm-6 col-md-3\">
                <div class=\"card card-stats card-round\">
                    <div class=\"card-body \">
                        <div class=\"row align-items-center\">
                            <div class=\"col-icon\">
                                <div class=\"icon-big text-center icon-primary bubble-shadow-small\">
                                    <i class=\"fas fa-user\"></i>
                                </div>
                            </div>
                            <div class=\"col col-stats ml-3 ml-sm-0\">
                                <div class=\"numbers\">
                                    <p class=\"card-category\">账号</p>
                                    <h4 class=\"card-title\">1,294</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=\"col-sm-6 col-md-3\">
                <div class=\"card card-stats card-round\">
                    <div class=\"card-body\">
                        <div class=\"row align-items-center\">
                            <div class=\"col-icon\">
                                <div class=\"icon-big text-center icon-info bubble-shadow-small\">
                                    <i class=\"far fa-newspaper\"></i>
                                </div>
                            </div>
                            <div class=\"col col-stats ml-3 ml-sm-0\">
                                <div class=\"numbers\">
                                    <p class=\"card-category\">分类</p>
                                    <h4 class=\"card-title\">1303</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=\"col-sm-6 col-md-3\">
                <div class=\"card card-stats card-round\">
                    <div class=\"card-body\">
                        <div class=\"row align-items-center\">
                            <div class=\"col-icon\">
                                <div class=\"icon-big text-center icon-success bubble-shadow-small\">
                                    <i class=\"far fa-chart-bar\"></i>
                                </div>
                            </div>
                            <div class=\"col col-stats ml-3 ml-sm-0\">
                                <div class=\"numbers\">
                                    <p class=\"card-category\">话题</p>
                                    <h4 class=\"card-title\">1,345</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=\"col-sm-6 col-md-3\">
                <div class=\"card card-stats card-round\">
                    <div class=\"card-body\">
                        <div class=\"row align-items-center\">
                            <div class=\"col-icon\">
                                <div class=\"icon-big text-center icon-secondary bubble-shadow-small\">
                                    <i class=\"far fa-check-circle\"></i>
                                </div>
                            </div>
                            <div class=\"col col-stats ml-3 ml-sm-0\">
                                <div class=\"numbers\">
                                    <p class=\"card-category\">新增话题</p>
                                    <h4 class=\"card-title\">576</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class=\"row\">
            <div class=\"col-md-6\">
                <div class=\"card\">
                    <div class=\"card-header\">
                        <div class=\"card-title\">Feed Activity</div>
                    </div>
                    <div class=\"card-body\">
                        <ol class=\"activity-feed\">
                            <li class=\"feed-item feed-item-secondary\">
                                <time class=\"date\" datetime=\"9-25\">Sep 25</time>
                                <span class=\"text\">Responded to need <a href=\"#\">\"Volunteer opportunity\"</a></span>
                            </li>
                            <li class=\"feed-item feed-item-success\">
                                <time class=\"date\" datetime=\"9-24\">Sep 24</time>
                                <span class=\"text\">Added an interest <a href=\"#\">\"Volunteer Activities\"</a></span>
                            </li>
                            <li class=\"feed-item feed-item-info\">
                                <time class=\"date\" datetime=\"9-23\">Sep 23</time>
                                <span class=\"text\">Joined the group <a href=\"single-group.php\">\"Boardsmanship Forum\"</a></span>
                            </li>
                            <li class=\"feed-item feed-item-warning\">
                                <time class=\"date\" datetime=\"9-21\">Sep 21</time>
                                <span class=\"text\">Responded to need <a href=\"#\">\"In-Kind Opportunity\"</a></span>
                            </li>
                            <li class=\"feed-item feed-item-danger\">
                                <time class=\"date\" datetime=\"9-18\">Sep 18</time>
                                <span class=\"text\">Created need <a href=\"#\">\"Volunteer Opportunity\"</a></span>
                            </li>
                            <li class=\"feed-item\">
                                <time class=\"date\" datetime=\"9-17\">Sep 17</time>
                                <span class=\"text\">Attending the event <a href=\"single-event.php\">\"Some New Event\"</a></span>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class=\"col-md-6\">
                <div class=\"card\">
                    <div class=\"card-header\">
                        <div class=\"card-head-row\">
                            <div class=\"card-title\">Support Tickets</div>
                            <div class=\"card-tools\">
                                <ul class=\"nav nav-pills nav-secondary nav-pills-no-bd nav-sm\" id=\"pills-tab\" role=\"tablist\">
                                    <li class=\"nav-item\">
                                        <a class=\"nav-link\" id=\"pills-today\" data-toggle=\"pill\" href=\"#pills-today\" role=\"tab\" aria-selected=\"true\">Today</a>
                                    </li>
                                    <li class=\"nav-item\">
                                        <a class=\"nav-link active\" id=\"pills-week\" data-toggle=\"pill\" href=\"#pills-week\" role=\"tab\" aria-selected=\"false\">Week</a>
                                    </li>
                                    <li class=\"nav-item\">
                                        <a class=\"nav-link\" id=\"pills-month\" data-toggle=\"pill\" href=\"#pills-month\" role=\"tab\" aria-selected=\"false\">Month</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class=\"card-body\">
                        <div class=\"d-flex\">
                            <div class=\"avatar avatar-online\">
                                <span class=\"avatar-title rounded-circle border border-white bg-info\">J</span>
                            </div>
                            <div class=\"flex-1 ml-3 pt-1\">
                                <h5 class=\"text-uppercase fw-bold mb-1\">Joko Subianto <span class=\"text-warning pl-3\">pending</span></h5>
                                <span class=\"text-muted\">I am facing some trouble with my viewport. When i start my</span>
                            </div>
                            <div class=\"float-right pt-1\">
                                <small class=\"text-muted\">8:40 PM</small>
                            </div>
                        </div>
                        <div class=\"separator-dashed\"></div>
                        <div class=\"d-flex\">
                            <div class=\"avatar avatar-offline\">
                                <span class=\"avatar-title rounded-circle border border-white bg-secondary\">P</span>
                            </div>
                            <div class=\"flex-1 ml-3 pt-1\">
                                <h5 class=\"text-uppercase fw-bold mb-1\">Prabowo Widodo <span class=\"text-success pl-3\">open</span></h5>
                                <span class=\"text-muted\">I have some query regarding the license issue.</span>
                            </div>
                            <div class=\"float-right pt-1\">
                                <small class=\"text-muted\">1 Day Ago</small>
                            </div>
                        </div>
                        <div class=\"separator-dashed\"></div>
                        <div class=\"d-flex\">
                            <div class=\"avatar avatar-away\">
                                <span class=\"avatar-title rounded-circle border border-white bg-danger\">L</span>
                            </div>
                            <div class=\"flex-1 ml-3 pt-1\">
                                <h5 class=\"text-uppercase fw-bold mb-1\">Lee Chong Wei <span class=\"text-muted pl-3\">closed</span></h5>
                                <span class=\"text-muted\">Is there any update plan for RTL version near future?</span>
                            </div>
                            <div class=\"float-right pt-1\">
                                <small class=\"text-muted\">2 Days Ago</small>
                            </div>
                        </div>
                        <div class=\"separator-dashed\"></div>
                        <div class=\"d-flex\">
                            <div class=\"avatar avatar-offline\">
                                <span class=\"avatar-title rounded-circle border border-white bg-secondary\">P</span>
                            </div>
                            <div class=\"flex-1 ml-3 pt-1\">
                                <h5 class=\"text-uppercase fw-bold mb-1\">Peter Parker <span class=\"text-success pl-3\">open</span></h5>
                                <span class=\"text-muted\">I have some query regarding the license issue.</span>
                            </div>
                            <div class=\"float-right pt-1\">
                                <small class=\"text-muted\">2 Day Ago</small>
                            </div>
                        </div>
                        <div class=\"separator-dashed\"></div>
                        <div class=\"d-flex\">
                            <div class=\"avatar avatar-away\">
                                <span class=\"avatar-title rounded-circle border border-white bg-danger\">L</span>
                            </div>
                            <div class=\"flex-1 ml-3 pt-1\">
                                <h5 class=\"text-uppercase fw-bold mb-1\">Logan Paul <span class=\"text-muted pl-3\">closed</span></h5>
                                <span class=\"text-muted\">Is there any update plan for RTL version near future?</span>
                            </div>
                            <div class=\"float-right pt-1\">
                                <small class=\"text-muted\">2 Days Ago</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    </div>
</div>

";
    }

    // line 233
    public function block_script_append($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 234
        echo "<script>
\$(function() {
    \$(\".nav-item.board-index\").addClass(\"active\");
});
</script>
";
    }

    public function getTemplateName()
    {
        return "admin/board/index/index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  292 => 234,  288 => 233,  59 => 6,  55 => 5,  48 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "admin/board/index/index.html", "D:\\app\\workroom\\php\\project\\slim-board\\data\\views\\admin\\board\\index\\index.html");
    }
}
