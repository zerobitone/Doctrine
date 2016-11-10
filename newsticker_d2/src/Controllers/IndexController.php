<?php

namespace Controllers;

// use Entities\Tag;
use Entities\Article;
use Webmasters\Doctrine\ORM\Util;

class IndexController extends AbstractBase
{
    public function indexAction()
    {
        $em = $this->getEntityManager();

        $query = $em
            ->createQueryBuilder()
            ->select('a')
            //->select('a, u')
            ->from('Entities\Article', 'a')
            //->leftJoin('a.user', 'u')
            //->leftJoin('Entities\User', 'u')
            ->orderBy('a.createdAt', 'DESC')
            ->getQuery();
        $articles = $query->getResult();

        $this->addContext('articles', $articles);
    }

    public function readAction()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_ENCODED);

        $em = $this->getEntityManager();
        $article = $em
            ->getRepository('Entities\Article')
            ->find($id);

        // $article || $this->render404();

        if(!$article) { $this->render404(); }

        $this->addContext('article', $article);
    }

    public function editAction()
    {
        $em = $this->getEntityManager();
        $article = $em
            ->getRepository('Entities\Article')
            ->find($_REQUEST['id']);

        $tags = $em
            ->getRepository('Entities\Tag')
            ->findAll();

        if ($_POST) {
            Util\ArrayMapper::setEntity($article)->setData($_POST);

            $article->clearTags();

            $tag_ids = isset($_POST['tag_ids']) ? $_POST['tag_ids'] : array();

            foreach ($tag_ids as $id) {
                $article->addTag(
                    $em->getRepository('Entities\Tag')->find($id)
                );
            }

            $em->persist($article);
            $em->flush();

            $this->setMessage('Article wurde aktualisiert.');
            $this->redirect();
        }

        $this->addContext('article', $article);
        $this->addContext('tags', $tags);
    }

    public function addAction()
    {
        $em = $this->getEntityManager();
        $article = new Article();

        $tags = $em
            ->getRepository('Entities\Tag')
            ->findAll();

        if ($_POST) {
            Util\ArrayMapper::setEntity($article)->setData($_POST);

            $article->setUser(
                $em->getRepository('Entities\User')->find(1)
            );

            $em->persist($article);
            $em->flush();

            $this->setMessage('Article wurde gespeichert.');
            $this->redirect();
        }

        $this->addContext('article', $article);
        $this->addContext('tags', $tags);
        $this->setTemplate('editAction');
    }

    public function deleteAction()
    {
        $em = $this->getEntityManager();
        $article = $em
            ->getRepository('Entities\Article')
            ->find($_GET['id']);

        $em->remove($article);
        $em->flush();

        $this->setMessage('Artikel wurde entfernt.');
        $this->redirect();
    }

    public function searchAction()
    {
        $em = $this->getEntityManager();

        $id1 = 1;
        $id2 = 3;

        $like = "P";
        $like = "honk' OR 1=1 OR t.title LIKE'";

        $query = $em
            ->createQueryBuilder()
            ->select('t')
            ->from('Entities\Tag', 't')
            ->where("t.title LIKE '%$like%'")
            //->where('t.id >= 1 AND t.id <= 3')
            //->where("t.title LIKE :search")
            //->where("t.title LIKE '%H%'")
            //->setParameter('search', '%' . $search . '%')
            ->getQuery();

        var_dump($query->getDQL());
        $tags = $query->getResult();

        $this->addContext('tags', $tags);
    }
}
