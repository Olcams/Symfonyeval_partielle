<?php


namespace App\DataFixtures;

use App\Entity\BlogPost;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // Src documentation symfony
        for ($i = 0; $i < 20; $i++) {
            $BlogPost = new BlogPost();
            $BlogPost->setTitle('post '.$i);
            $BlogPost->setSlug('post numero'.$i);
            $BlogPost->setContent('texte texte');
            $BlogPost->setDate($i);
            $BlogPost->setCategory('category'.$i);
            $BlogPost->setFeatured(1);
            $manager->persist($BlogPost);
        }
        $manager->flush();
    }
}
