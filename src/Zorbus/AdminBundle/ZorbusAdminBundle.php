<?php

namespace Zorbus\AdminBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ZorbusAdminBundle extends Bundle
{
    public function getParent()
    {
        return 'SonataAdminBundle';
    }
}
