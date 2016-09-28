<?php
namespace app\commands;
use yii\base\Component;

/*主要用于 控制器中 所需函数*/
class Form1Helper extends Component
{

    /*获取访问用户的浏览器的信息   \Yii::$app->myhelper->determinebrowser();*/
    public function determinebrowser () {
        $Agent = strtolower($_SERVER['HTTP_USER_AGENT']);
        if (preg_match('/msie ([0-9].[0-9]{1,2})/',$Agent,$version)) {
            $browserversion=$version[1];
            $browseragent="Internet Explorer";
        } else if (preg_match( '#opera/([0-9]{1,2}.[0-9]{1,2})#',$Agent,$version)) {
            $browserversion=$version[1];
            $browseragent="Opera";
        } else if (preg_match( '#firefox/([0-9.]{1,5})#',$Agent,$version)) {
            $browserversion=$version[1];
            $browseragent="Firefox";
        }else if (preg_match( '#chrome/([0-9].{1,3})#',$Agent,$version)) {
            $browserversion=$version[1];
            $browseragent="Chrome";
        }else if (preg_match( '#safari/([0-9.]{1,3})#',$Agent,$version)) {
            $browseragent="Safari";
            $browserversion="";
        }else {
            $browserversion = "";
            $browseragent = $Agent;
        }
        return $browseragent." ".$browserversion;
    }

    /*获取访问用户的系统的信息*/
    public function determineplatform () {
        $Agent = strtolower($_SERVER['HTTP_USER_AGENT']);
        $browserplatform='';
        if (preg_match('/win/',$Agent) && strpos($Agent, '95')) {
            $browserplatform="Windows 95";
        }
        elseif (preg_match('/win 9x/',$Agent) && strpos($Agent, '4.90')) {
            $browserplatform="Windows ME";
        }
        elseif (preg_match('/win/',$Agent) && preg_match('/98/',$Agent)) {
            $browserplatform="Windows 98";
        }
        elseif (preg_match('/win/',$Agent) && preg_match('/nt 5.0/',$Agent)) {
            $browserplatform="Windows 2000";
        }
        elseif (preg_match('/win/',$Agent) && preg_match('/nt 5.1/',$Agent)) {
            $browserplatform="Windows XP";
        }
        elseif (preg_match('/win/',$Agent) && preg_match('/nt 6.0/',$Agent)) {
            $browserplatform="Windows Vista";
        }
        elseif (preg_match('/win/',$Agent) && preg_match('/nt 6.1/',$Agent)) {
            $browserplatform="Windows 7";
        }
        elseif (preg_match('/win/',$Agent) && preg_match('/32/',$Agent)) {
            $browserplatform="Windows 32";
        }
        elseif (preg_match('/win/',$Agent) && preg_match('/nt/',$Agent)) {
            $browserplatform="Windows NT";
        }elseif (preg_match('/mac os/',$Agent)) {
            $browserplatform="Mac OS";
        }
        elseif (preg_match('/linux/',$Agent)) {
            $browserplatform="Linux";
        }
        elseif (preg_match('/unix/',$Agent)) {
            $browserplatform="Unix";
        }
        elseif (preg_match('/sun/',$Agent) && preg_match('/os/',$Agent)) {
            $browserplatform="SunOS";
        }
        elseif (preg_match('/ibm/',$Agent) && preg_match('/os/',$Agent)) {
            $browserplatform="IBM OS/2";
        }
        elseif (preg_match('/mac/',$Agent) && preg_match('/pc/',$Agent)) {
            $browserplatform="Macintosh";
        }
        elseif (preg_match('/powerpc/',$Agent)) {
            $browserplatform="PowerPC";
        }
        elseif (preg_match('/aix/',$Agent)) {
            $browserplatform="AIX";
        }
        elseif (preg_match('/hpux/',$Agent)) {
            $browserplatform="HPUX";
        }
        elseif (preg_match('/netbsd/',$Agent)) {
            $browserplatform="NetBSD";
        }
        elseif (preg_match('/bsd/',$Agent)) {
            $browserplatform="BSD";
        }
        elseif (preg_match('/osf1/',$Agent)) {
            $browserplatform="OSF1";
        }
        elseif (preg_match('/irix/',$Agent)) {
            $browserplatform="IRIX";
        }
        elseif (preg_match('/freebsd/',$Agent)) {
            $browserplatform="FreeBSD";
        }
        if ($browserplatform=='') {$browserplatform = $Agent; }
        return $browserplatform;
    }


}
