<?php

namespace App\Services;

use Aws\Sqs\SqsClient;
use Illuminate\Support\Arr;

class SqsFifoConnector extends \Illuminate\Queue\Connectors\SqsConnector
{
    public function connect($config)
    {
        $config = $this->getDefaultConfiguration($config);
        if ($config['key'] && $config['secret']) {
            $config['credentials'] = Arr::only($config, ['key', 'secret']);
        }
        return new SqsFifoQueue(new SqsClient($config), $config['prefix'] . $config['queue']);
    }
}
