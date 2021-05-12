<?php

namespace App\Api;

class ExpressPrintService extends RpcService{

    /**
     *面单打印接口
     *不支持机型: k4-wh, k4-wa, m1 (k4系列机型不建议使用不干胶热敏纸)
     *
     * @param $machineCode
     * @param $content
     * @param $originId
     * @param int $sandbox
     * @return mixed
     * @throws \Exception
     */
    public function index($machineCode, $content, $originId, $sandbox = 0)
    {
        return $this->client->call('expressprint/index', array('machine_code' => $machineCode, 'content' => $content, 'origin_id' => $originId, 'sandbox' => $sandbox));
    }

}
