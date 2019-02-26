<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\AdminBundle\Route\RouteCollection;

class ArticleAdmin extends AbstractAdmin
{
    /**
     * @param ListMapper $listMapper
     *
     * @throws \RuntimeException
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('id');
        $listMapper->add('title', null, ['editable' => true]);
        $listMapper->add('slug', null, ['editable' => true]);
        $listMapper->add('isEnabled', null, ['editable' => true]);
        $listMapper->add('updatedAt', null, [
            'label' => 'Updated at',
        ]);
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title')
            ->add('slug')
            ->add('content')
            ->add('isEnabled');

        $formMapper
            ->add('tags', ModelType::class, [
                'label'    => 'Tag',
                'property' => 'name',
                'multiple' => true,
            ]);
    }

    /**
     * @param RouteCollection $collection
     */
    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->clearExcept(['create', 'list', 'delete', 'batch', 'edit']);
    }
}