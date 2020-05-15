<?php
//設定值
define("CLIENT_ID", 'XXXXX');  //從這取得 https://developers.line.biz/console/channel/
define("CLIENT_SECRET", 'XXXXX');  //從這取得 https://developers.line.biz/console/channel/
define("REDIRECT_URI", 'https://XXXXX/callback.php');//登入後返回位置，須設定去 https://developers.line.biz/console/channel/
define("SCOPE", 'email%20openid%20profile');//授權範圍以%20分隔 可以有3項openid，profile，email ， email部分要這邊也要設定  https://developers.line.biz/console/channel/
