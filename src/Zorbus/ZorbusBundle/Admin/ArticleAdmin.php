<?php

namespace Zorbus\ZorbusBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ArticleAdmin extends Admin
{

    public function __construct($code, $class, $baseControllerName)
    {
        parent::__construct($code, $class, $baseControllerName);
        $this->baseRouteName = 'article_admin';
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
                ->with('Identification')
                    ->add('title')
                    ->add('subtitle')
                    ->add('resume', 'textarea', array('required' => false, 'attr' => array('class' => 'ckeditor')))
                    ->add('body', 'textarea', array('required' => false, 'attr' => array('class' => 'ckeditor')))
                ->end()
                ->with('Configuration', array('collapsed' => false))
                    ->add('type')
                    ->add('attachmentTemp', 'file', array('required' => false, 'label' => 'Attachment'))
                    ->add('imageTemp', 'file', array('required' => false, 'label' => 'Image'))
                    ->add('status', 'choice', array(
                        'choices' => array(
                            'draft' => 'Draft',
                            'published' => 'Published',
                            'archived' => 'Archived'
                        )
                    ))
                    ->add('is_highlighted')
                    ->add('enabled', null, array('required' => false))
                ->end()
                ->with('Dates', array('collapsed' => true))
                    ->add('date_show')
                    ->add('date_hide')
                    ->add('date_published')
                    ->add('date_event')
                ->end()
                ->with('Extra', array('collapsed' => true))
                    ->add('author')
                    ->add('source')
                    ->add('local')
                ->end()
                ->with('Classification', array('collapsed' => true))
                    ->add('categories', 'entity', array(
                        'class' => 'Zorbus\\ArticleBundle\\Entity\\Category',
                        'multiple' => true,
                        'expanded' => false,
                        'required' => false,
                        'attr' => array('class' => 'select2 span5')
                    ))
                    ->add('tags', 'entity', array(
                        'class' => 'Zorbus\\ArticleBundle\\Entity\\Tag',
                        'multiple' => true,
                        'expanded' => false,
                        'required' => false,
                        'attr' => array('class' => 'select2 span5')
                    ))
                ->end()
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
                ->add('title')
                ->add('type')
                ->add('status')
                ->add('tags')
                ->add('categories')
                ->add('enabled')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
                ->addIdentifier('title')
                ->add('type')
                ->add('status')
                ->add('enabled')
        ;
    }

    public function configureShowFields(ShowMapper $filter)
    {
        $filter
                ->add('title')
                ->add('subtitle')
                ->add('resume')
                ->add('body')
                ->add('type')
                ->add('status')
                ->add('categories')
                ->add('tags')
                ->add('date_published')
                ->add('is_highlighted')
                ->add('enabled')
        ;
    }

    public function validate(ErrorElement $errorElement, $object)
    {
        $errorElement
                ->with('title')
                    ->assertNotBlank()
                    ->assertMaxLength(array('limit' => 255))
                ->end()
        ;
    }

    public function prePersist($object)
    {
        $object->setUpdatedAt(new \DateTime());
    }

    public function preUpdate($object)
    {
        $object->setUpdatedAt(new \DateTime());
    }

}