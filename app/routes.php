<?php

use App\Action\HealthAction;

$app->get('/', HealthAction::class);
