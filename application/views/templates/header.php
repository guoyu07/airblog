<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
    <title>faceair的博客</title>
    <link rel="stylesheet" type="text/css" href="/static/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/static/css/main.css">
</head>
<body>
<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">faceair的博客</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/">日志</a></li>
                <li><a href="/rss">RSS</a></li>
                <li><a href="/about-me">关于我</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
                if(isset($user)){
                    echo '<li class="dropdown"><a href="#" class="dropdown-toggle active" data-toggle="dropdown">' . $user . '<b class="caret"></b></a><ul class="dropdown-menu"><li><a href="/admin/create">写文章</a></li><li><a href="/admin/login_out">注销</a></li></ul></li>';
                }else{
                    echo '<li class="active"><a href="/admin">登录</a></li>';
                }
                ?>

            </ul>
        </div>
    </div>
</div>