<?php

namespace App\Admin;

use App\Entity\ArticleTags;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Show\ShowMapper;
use App\Entity\Article;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Form\Type\ModelType;

class TagsAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('name');
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('name', null, ['global_search' => true]);
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id', null, [
                'header_style' => 'width: 5%; text-align:center;',
                'row_align' => 'center'
            ])
            ->add('name', null, ['editable' => true])
        ;
    }

    public function toString($object)
    {
        return $object instanceof ArticleTags
            ? 'Article Tag: ' . $object->getName()
            : 'Article Tags';
    }
}