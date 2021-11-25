<?php

namespace App\Listeners;

use Jiannei\Logger\Laravel\Events\RequestHandledEvent;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class RequestHandledListener
{

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(RequestHandledEvent $event)
    {
        $start = $event->request->server('REQUEST_TIME_FLOAT');
        $end = microtime(true);

        $request = $event->request->all();
        if ($files = $event->request->allFiles()) {
            foreach ($files as $key => $uploadedFile) {
                $request[$key] = [
                    'originalName' => $uploadedFile->getClientOriginalName(),
                    'mimeType' => $uploadedFile->getClientMimeType(),
                ];
            }
        }

        $context = [
            'ip' => $event->request->ip(),
            'path' => $event->request->path(),
            'method' => $event->request->method(),
            'request' => $request,
            'response' => $event->response instanceof SymfonyResponse ? json_decode($event->response->getContent(), true) : (string)$event->response,
            'duration' => format_duration($end - $start),
            'unique_id' => $event->request->server('UNIQUE_ID') ?? '',
        ];

        activity('request')->withProperties($context)->log($event->request->path());
    }
}
