<?php

namespace Blog\ModelBundle\DataFixtures\OMR;

use Blog\ModelBundle\Entity\Comment;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Fixtures for the Comment Entoty
 */
class Comments extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 20;
    }

    public function load(ObjectManager $manager)
    {
        $posts = $manager->getRepository('ModelBundle:Post')->findAll();
        $comments = array(
            0 => 'Vaya basura de post, me quiero sucidar insofausto!',
            1 => 'Este post da más grima que le bigote de tu prima muerta.',
            2 => 'Este post mola mucho, no es tan asqueroso como los otros que dan puta pena. Viva Willyrex!'
        );

        $i = 0;

        foreach ($posts as $post){
            $comment = new Comment();
            $comment->setAuthorName('Someone');
            $comment->setBody($comments[$i++]);
            $comment->setPost($post);

            $manager->persist($comment);
        }

        $manager->flush();
    }
}