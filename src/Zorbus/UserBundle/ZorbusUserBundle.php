<?php

namespace Zorbus\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ZorbusUserBundle extends Bundle
{
    public function getParent()
    {
        return 'SonataUserBundle';
    }
}
