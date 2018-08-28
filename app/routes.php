<?php

use App\Action\HealthAction;

$app->get('/health', HealthAction::class);
