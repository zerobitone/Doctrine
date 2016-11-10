<?php
/**
 * Created by IntelliJ IDEA.
 * User: cord
 * Date: 01.11.2016
 * Time: 13:54
 */

namespace Controllers;

use Entities\Tag;
// use Entities\Article;
use Webmasters\Doctrine\ORM\Util;

class TagController extends AbstractBase
{
    public function indexAction()
    {
        $em = $this->getEntityManager();

        $tags = $em
            ->getRepository('Entities\Tag')
            ->findAll();

        $this->addContext('tags', $tags);
    }

    public function readAction()
    {
        $em = $this->getEntityManager();
        $tag = $em
            ->getRepository('Entities\Tag')
            ->find($_GET['id']);

        $this->addContext('tag', $tag);
    }

    public function editAction()
    {
        $em = $this->getEntityManager();
        $tag = $em
            ->getRepository('Entities\Tag')
            ->find($_REQUEST['id']);

        if ($_POST) {
            Util\ArrayMapper::setEntity($tag)->setData($_POST);

            $em->persist($tag);
            $em->flush();

            $this->setMessage('Tag wurde aktualisiert.');
            $this->redirect('index', 'Tag');
        }
        $this->addContext('tag', $tag);

        $this->indexAction();
    }

    public function addAction()
    {
        $em = $this->getEntityManager();
        $tag = new Tag();


        if ($_POST) {
            Util\ArrayMapper::setEntity($tag)->setData($_POST);

            $em->persist($tag);
            //$em->flush();

            $this->setMessage('Der Tag wurde gespeichert.');
            $this->redirect('index', 'Tag');
        }

        $this->addContext('tag', $tag);
        $this->setTemplate('editAction');

        $this->indexAction();
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

}