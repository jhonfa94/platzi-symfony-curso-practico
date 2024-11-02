<?php

namespace App\Controller;

use App\Entity\Post;
use App\Entity\Comment;
use App\Form\CommentType;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

use Doctrine\ORM\EntityManagerInterface;



class PageController extends AbstractController
{

    // Inyectamos el repositorio en el constructor
    public function __construct(private PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    #[Route('/', name: 'app_home')]
    public function home(PostRepository $postRepository): Response
    {
        return $this->render('page/home.html.twig', [
            'posts' => $postRepository->findAll(),
        ]);

    }

    #[Route('/blog/{slug}', name: 'app_post')]
    public function post(string $slug): Response
    {
        $post = $this->postRepository->findPostBySlug($slug);
        $comments = $this->postRepository->findCommentsBySlug($slug);

        $form  = $this->createForm(CommentType::class);
        return $this->render('page/post.html.twig', [
            'post' => $post,
            'comments' => $comments,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/nuevo-comentario', name: 'app_comment_new')]
    public function comment(Request $request, Post $post, EntityManagerInterface $entityManager): Response
    {
        $comment = new Comment();
        $comment->setUser($this->getUser());
        $comment->setPost($post);



        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($comment);
            dd($comment);
            $entityManager->flush();
            return $this->redirectToRoute('app_post', ['slug' => $post->getSlug()]);
        }

        return $this->render('page/post.html.twig', [
            'post' => $post,
            'form' => $form->createView(),
        ]);


    }


}
