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
                $submenu = false; $index = null;

                foreach ($adminGroup['items'] as $key => $id) {
                    if ($id === 'zorbus_admin.dash')
                    {
                        $groups[$name]['items'][$key] = array('zorbus_admin.dash' => array('zorbus_admin.dash'));
                    }
                    else if ($id === 'zorbus_admin.submenu.start')
                    {
                        $index = $key;
                        $submenu = true;
                        $groups[$name]['items'][$key] = array('zorbus_admin.submenu' => array());
                    }
                    else if ($id === 'zorbus_admin.submenu.end')
                    {
                        $submenu = false;
                        $index = null;
                        unset($groups[$name]['items'][$key]);
                    }
                    else if ($submenu)
                    {
                        // first element is the title of the submenu
                        if (count($groups[$name]['items'][$index]['zorbus_admin.submenu']) == 0)
                        {
                            $groups[$name]['items'][$index]['zorbus_admin.submenu'][] = $id;
                        }
                        else
                        {
                            $admin = $this->getInstance($id);

                            if ($admin->showIn(Admin::CONTEXT_DASHBOARD)) {
                                $groups[$name]['items'][$index]['zorbus_admin.submenu'][] = $admin;
                            }
                        }

                        unset($groups[$name]['items'][$key]);
                    }
                    else
                    {
                        $admin = $this->getInstance($id);

                        if ($admin->showIn(Admin::CONTEXT_DASHBOARD)) {
                            $groups[$name]['items'][$key] = array('zorbus_admin.item' => array($admin));
                        } else {
                            unset($groups[$name]['items'][$key]);
                        }
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