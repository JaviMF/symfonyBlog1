<?php

namespace Blog\ModelBundle\DataFixtures\ORM;

use Blog\ModelBundle\Entity\Author;
use Blog\ModelBundle\Entity\Post;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Fixtures for Post Entity
 */
class Posts extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 15;
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $p1 = new Post();
        $p1->setTitle('Lorem ipsum dolor sit amet');
        $p1->setBody('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc porttitor ligula id odio tincidunt fringilla. Vivamus varius ipsum quis vestibulum accumsan. Duis porta lacinia diam, eget lobortis nisl euismod finibus. Aliquam erat volutpat. Praesent ullamcorper dolor eget nulla pretium, sit amet auctor urna ullamcorper. Duis vestibulum condimentum lacinia. Nunc et lorem consequat, dignissim lorem sit amet, facilisis mi. Fusce at diam at enim fermentum rhoncus. Nam elit dui, accumsan nec ultrices ac, venenatis sed turpis. Phasellus convallis, dolor a imperdiet suscipit, nibh orci lobortis tellus, id consequat tortor erat id sapien.

Cras vehicula pellentesque lorem, sed vestibulum quam tincidunt sed. Phasellus eget sagittis urna. Mauris congue justo eu tortor ullamcorper, eu consequat libero eleifend. Cras vulputate ligula eu lacinia vehicula. Sed dolor lorem, congue ac feugiat sit amet, vulputate a turpis. Suspendisse potenti. Duis non porttitor quam, sit amet laoreet nulla. Morbi vitae quam sagittis, laoreet ex lobortis, efficitur ipsum. Quisque et fringilla metus, eu suscipit diam.');
        $p1->setAuthor($this->getAuthor($manager, 'David'));

        $p2 = new Post();
        $p2->setTitle('Pellentesque et aliquam turpis');
        $p2->setBody('Pellentesque et aliquam turpis, ac semper mauris. Morbi congue eros eget tincidunt porta. Nunc eget ante massa. Nam nunc libero, tincidunt sit amet tincidunt vel, iaculis vel lectus. Nulla tempus dignissim risus. Nullam mi quam, ornare dapibus est at, placerat sollicitudin turpis. Phasellus posuere tellus non tristique tempor. Vivamus ac massa nec purus faucibus auctor eleifend vitae nisl. Mauris at aliquam purus. Fusce eget tortor id quam tincidunt convallis at condimentum dui. Maecenas pretium tristique vehicula. Pellentesque ac purus in ex sodales fringilla. Phasellus commodo augue sollicitudin tempor venenatis. Nam a purus malesuada, imperdiet velit ut, egestas eros. In eu nisl vestibulum, tincidunt velit vel, iaculis lectus.

Vivamus ligula augue, blandit sed arcu et, vulputate venenatis sapien. Duis tempor non nunc eget viverra. Curabitur vulputate ante vel sagittis efficitur. Proin bibendum facilisis diam non laoreet. Nullam sagittis convallis fermentum. Morbi tempor id lorem non commodo. Maecenas maximus consequat condimentum. Aliquam ipsum tellus, volutpat vel finibus sit amet, sodales nec ex. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam dolor mi, euismod quis mattis a, faucibus sed velit.');
        $p2->setAuthor($this->getAuthor($manager, 'Eddie'));

        $p3 = new Post();
        $p3->setTitle('Ut sit amet fermentum est');
        $p3->setBody('Ut sit amet fermentum est. Mauris elit magna, semper in est quis, imperdiet egestas nibh. In pretium, massa at convallis feugiat, nulla tortor egestas justo, quis vestibulum sapien eros ut odio. Ut nisi risus, sollicitudin vel lorem id, egestas bibendum diam. Sed pretium, dolor eu aliquam sodales, tortor felis convallis risus, tempus euismod diam leo at neque. Donec sodales ante erat, vel bibendum neque tempor eget. Nam consequat lorem purus, sit amet eleifend nisi mattis ac. Maecenas suscipit, tellus at aliquam feugiat, neque metus accumsan nisl, id ornare tortor ligula quis felis.');
        $p3->setAuthor($this->getAuthor($manager, 'Eddie'));

        $manager->persist($p1);
        $manager->persist($p2);
        $manager->persist($p3);

        $manager->flush();
    }

    /**
     * Get an author
     *
     * @param ObjectManager $manager
     * @param string        $name
     *
     * @return Author
     */
    private function getAuthor(ObjectManager $manager, $name)
    {
        return $manager->getRepository('ModelBundle:Author')->findOneBy(
            array(
                'name' => $name
            )
        );
    }
}