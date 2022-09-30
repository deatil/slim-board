# slim-board 简单留言板


## 项目介绍

*  `slim-board` 是基于 `slim` 的 PHP 简单留言板


## 环境要求

 - PHP >= 8.1.0
 - Fileinfo PHP Extension


### 截图预览

<table>
    <tr>
        <td width="50%">
            <center>
                <img alt="登录" src="https://user-images.githubusercontent.com/24578855/193317616-3e36a5d9-04eb-4d77-a270-edff1329d8f2.png" />
            </center>
        </td>
        <td width="50%">
            <center>
                <img alt="控制台" src="https://user-images.githubusercontent.com/24578855/193316333-d1272c1b-c750-4082-bc34-b89923bddd4b.png" />
            </center>
        </td>
    </tr>
    <tr>
        <td width="50%">
            <center>
                <img alt="文章管理" src="https://user-images.githubusercontent.com/24578855/193316606-71e3773e-bbe3-49fd-8a90-f3a01c4180d7.png" />
            </center>
        </td>
        <td width="50%">
            <center>
                <img alt="分类管理" src="https://user-images.githubusercontent.com/24578855/193316570-8340a36b-addd-4074-a2e1-09e165b299e7.png" />
            </center>
        </td>
    </tr>
</table>

更多截图
[slim-board 截图](https://github.com/deatil/slim-board/issues/1)


## 安装步骤

1. 首先下载

```php
git clone https://github.com/deatil/slim-board.git 
```

2. 配置数据库的连接信息，并确认能够正常连接数据库

```
data/config/database.php
```

3. 将数据库文件导入到数据库

```
/docs/slim_board.sql
```

4. 设置 `/data/log` 和 `/data/runtime` 目录有写入和读取权限

5. 后台地址 `http://yourdomain.com/admin/index`, 登录账号：`admin` 及密码 `123456`


## 问题反馈

在使用中有任何问题，请使用以下联系方式联系我们

Github: https://github.com/deatil/slim-board


## 特别鸣谢

感谢以下的项目,排名不分先后

 - slim/slim
 
 - catfan/medoo
 
 - bryanjhv/slim-session
 
 - ramsey/uuid


## 开源协议

*  `slim-board` 遵循 `Apache2` 开源协议发布，在保留本系统版权的情况下提供个人及商业免费使用。 


## 版权

*  该系统所属版权归 deatil(https://github.com/deatil) 所有。
