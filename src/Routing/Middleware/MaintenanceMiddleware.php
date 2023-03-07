<?php
declare(strict_types=1);

namespace Maintenance\Routing\Middleware;

use Cake\Core\Configure;
use Cake\Routing\RoutingApplicationInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

/**
 * Applies routing rules to the request and creates the controller
 * instance if possible.
 */
class MaintenanceMiddleware implements MiddlewareInterface
{
    protected bool $_isMaintenance = false;

    /**
     * @inheritDoc
     */
    public function __construct(?RoutingApplicationInterface $app = null)
    {
        $this->_isMaintenance = (bool) Configure::read('Maintenance.enabled');
    }

    /**
     * Process an incoming server request.
     *
     * Processes an incoming server request in order to produce a response.
     * If unable to produce the response itself, it may delegate to the provided
     * request handler to do so.
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request The request.
     * @param \Psr\Http\Server\RequestHandlerInterface $handler The next handler.
     * @return \Psr\Http\Message\ResponseInterface The response.
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $params = $request->getAttribute('params', []);
        //($params);
        $prefix = $params['prefix'] ?? null;
//        if (
//            $prefix == 'Admin' ||
//            preg_match('/^\/' . Admin::$urlPrefix . '/', $request->getUri()->getPath())
//        ) {
//        }

        if ($this->_isMaintenance && $prefix !== "Admin") {
//            $response = (new Response())
//                ->withStatus(503, "Service currently unavailable")
//                ->withStringBody("Maintenance!");
//            return $response;
            $params = ['plugin' => 'Maintenance', 'controller' => 'Maintenance', 'action' => 'index'];
            $request = $request->withAttribute('params', $params);
        }

        return $handler->handle($request);
    }
}
