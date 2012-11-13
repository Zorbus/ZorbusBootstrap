<?php
namespace Zorbus\UserBundle\Admin;

use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\UserBundle\Admin\Entity\UserAdmin as BaseUserAdmin;

class UserAdmin extends BaseUserAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('first_name')
            ->add('last_name')
            ->add('username')
            ->add('email')
            ->add('groups', null, array('expanded' => true))
            ->add('plainPassword', 'password', array('required' => false, 'label' => 'Password'))
            ->add('is_blocked', null, array('required' => false))
            ->add('enabled', null, array('required' => false))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('first_name')
            ->add('last_name')
            ->add('username')
            ->add('email')
            ->add('is_blocked')
            ->add('enabled')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('username')
            ->add('first_name')
            ->add('last_name')
            ->add('email')
            ->add('enabled')
        ;
    }

    public function validate(ErrorElement $errorElement, $object)
    {
        $errorElement
            ->with('first_name')
                ->assertMaxLength(array('limit' => 255))
            ->end()
        ;
    }
}