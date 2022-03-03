<?php

namespace App\DataFixtures;
use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MovieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $movie = new Movie();
        $movie->setTitle('Avengers Endgame');
        $movie->setReleaseYear(2019);
        $movie->setDescription('This is the discription of the Avengers Endgame');
        $movie->setImagePath('https://pixabay.com/illustrations/captain-america-avengers-marvel-5692937/');
        $movie->addActor($this->referenceRepository->getReference('actor_3'));
        $movie->addActor($this->referenceRepository->getReference('actor_4'));
        $manager->persist($movie);

        $movie2 = new Movie();
        $movie2->setTitle('The Dark Knigh');
        $movie2->setReleaseYear(2008);
        $movie2->setDescription('This is the discription of the Dark knigh');
        $movie2->setImagePath('https://cdn.pixabay.com/photo/2021/06/18/11/22/batman-6345897_960_720.jpg');
        $movie2->addActor($this->referenceRepository->getReference('actor_1'));
        $movie2->addActor($this->referenceRepository->getReference('actor_2'));
        $manager->persist($movie2);

        $manager->flush();
    }
}
