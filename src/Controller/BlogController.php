<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;
use App\Entity\Users;
use App\Entity\Comments;
use App\Entity\Categories;
use App\Repository\ArticleRepository;
use App\Repository\CommentsRepository;
use App\Repository\CategoriesRepository;

class BlogController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home(ArticleRepository $repoArticle){
        $articles = $repoArticle->findBy(array(), array('aId' => 'DESC'), 10);;
      return $this->render('blog/home.html.twig', [
        'articles' => $articles,
      ]);
    }

    /**
     * @Route("/article/{id}", name="article")
     */
    public function article($id, ArticleRepository $repoArticle, CommentsRepository $repoComments){

      $article = $repoArticle->find($id);
      $comments = $repoComments->findByReferencedArticle($id);

      return $this->render('blog/article.html.twig', [
        'article' => $article,
        'comments' => $comments,
      ]);
    }

    /**
     * @Route("/profile/{id}", name="profile")
     */
    public function profile(Users $user, ArticleRepository $repoArticle){
      $articles = $repoArticle->findByPoster($user->getUId());
      return $this->render('blog/profile.html.twig', [
      'user' => $user,
      'articles'=> $articles,
      ]);
    }

    /**
     * @Route("/allArticles", name="allArticles")
     */
    public function allArticles(ArticleRepository $repoArticle){
      $articles = $repoArticle->findAll();
      return $this->render('blog/allArticles.html.twig', [
      'articles'=> $articles,
      ]);
    }

    /**
     * @Route("/categories", name="categories")
     */
    public function categories(CategoriesRepository $repoCat){
      $categories = $repoCat->findAll();
      return $this->render('blog/categories.html.twig', [
      'categories'=> $categories,
      ]);
    }

    /**
     * @Route("/category/{id}", name="category")
     */
    public function category(Categories $cat, ArticleRepository $repoArticle){
      $articles = $repoArticle->findByCategory($cat);
      return $this->render('blog/allArticles.html.twig', [
      'articles'=> $articles,
      ]);
    }
}
