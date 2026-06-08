<?php

use App\Providers\AppServiceProvider;

return [
    AppServiceProvider::class,
    Platform\Core\Dashboard\Providers\DashboardServiceProvider::class,
    Platform\Core\ACL\Providers\AclServiceProvider::class,
    Platform\Core\Base\Providers\BaseServiceProvider::class,
    Platform\Core\Media\Providers\MediaServiceProvider::class,
];
