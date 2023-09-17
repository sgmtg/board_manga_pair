<?php
namespace App\Services;

class SqsFifoQueue extends \Illuminate\Queue\SqsQueue
{
    public function pushRaw($payload, $queue = null, $options = [])
    {
        $response = $this->sqs->sendMessage([
            'QueueUrl' => $this->getQueue($queue),
            'MessageBody' => $payload,
            'MessageGroupId' => uniqid(),
            'MessageDeduplicationId' => uniqid(),
        ]);
        return $response->get('MessageId');
    }
}

