<?php
  
 if(YII_ENV=='dev'){
 	defined('DB_HOST') or define('DB_HOST', 'localhost');
 	defined('DB_USER') or define('DB_USER', 'root');
 	defined('DB_PASS') or define('DB_PASS', '');
 	defined('DB_SCHEMA') or define('DB_SCHEMA', 'yii2investmp_backup_nov');
 }