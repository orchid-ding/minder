<?php
/**
 * Created by PhpStorm.
 * User: master_joy
 * Date: 2018/11/21
 * Time: 11:00
 */

namespace app\api\controller;

use think\Controller;

class Minder extends Controller
{
    private $dir = ROOT_PATH . 'runtime/minder';
    private $file = ROOT_PATH . 'runtime/minder/minder.json';

    public function initialize()
    {
        $start_ip = bindec(decbin(ip2long('192.168.0.0')));
        $end_ip   = bindec(decbin(ip2long('192.168.0.255')));
        $ip       = bindec(decbin(ip2long($this->request->ip())));
        if ($ip < $start_ip || $ip > $end_ip) {
            exit;
        }
    }

    public function get()
    {
        if (!is_dir($this->dir)) {
            return json(msg(0));
        }
        $res = file_get_contents($this->file);
        return json(msg(1, $res));
    }


    public function set()
    {
        try {
            $data = $this->request->param();
            if (!is_dir($this->dir)) {
                mkdir($this->dir, 0777, true);
            }
            file_put_contents($this->dir . '/minder.json', json_encode($data));
            return json(msg(1, '', 'success'));
        }catch (\Exception $e) {
            return json(msg(0, '', 'error'));
        }

    }


}
