<?php
namespace Zorbus\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Pool as BasePool;
use Sonata\AdminBundle\Admin\Admin;

class Pool extends BasePool
{
    public function __construct(\Symfony\Component\DependencyInjection\ContainerInterface $container, $title = 'Administração', $logo = '/bundles/sonataadmin/logo_title.png')
    {
        parent::__construct($container, $title, $logo);
    }

    public function __toString()
    {
        return 'zorbus_admin.pool';
    }

    public function getDashboardGroups()
    {
        $groups = $this->adminGroups;

        foreach ($this->adminGroups as $name => $adminGroup) {
            if (isset($adminGroup['items'])) {
                foreach ($adminGroup['items'] as $key => $id) {
                    if ($id !== 'zorbus_admin.dash')
                    {
                        $admin = $this->getInstance($id);

                        if ($admin->showIn(Admin::CONTEXT_DASHBOARD)) {
                            $groups[$name]['items'][$key] = $admin;
                        } else {
                            unset($groups[$name]['items'][$key]);
                        }
                    }
                    else
                    {
                        $groups[$name]['items'][$key] = 'zorbus_admin.dash';
                    }
                }
            }

            if (empty($groups[$name]['items'])) {
                unset($groups[$name]);
            }
        }

        return $groups;
    }
}