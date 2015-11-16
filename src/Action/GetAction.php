<?php

namespace Hermes\Action;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class GetAction extends AbstractAction
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        $key = $request->getAttribute('key');

        if (!$this->keyExists($key)) {
            $response = $this->lastResponse;
        } else {
            $response = $this->getKeyResponse($key);
        }

        return $next($request, $response);
    }
}
