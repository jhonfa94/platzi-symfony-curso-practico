<?php

namespace App\Controller\Admin;

use App\Entity\Comment;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CommentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Comment::class;
    }

    public function configureCrud (Crud $crud ): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Comentario')
            ->setEntityLabelInPlural('Comentarios')
            ->setSearchFields(['content'])
            ->setDefaultSort(['id' => 'DESC']);

    }
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            AssociationField::new('post', 'Publicación'),
            AssociationField::new('user', 'Usuarios'),
            TextEditorField::new('content', 'Comentario')->hideOnIndex()
        ];
    }
}
