<?php

namespace Maintenance\Controller;

use Ontalents\Controller\AppController;

class MaintenanceController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

        if ($this->Authentication) {
            $this->Authentication->allowUnauthenticated(['index']);
        }
    }

    public function index() {}
}