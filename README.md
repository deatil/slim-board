# slim-board 简单留言板


## 项目介绍

*  `slim-board` 是基于 `slim` 的 PHP 简单留言板


## 环境要求

 - PHP >= 8.1.0
 - Fileinfo PHP Extension


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
