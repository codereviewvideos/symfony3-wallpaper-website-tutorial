<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Wallpaper;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadWallpaperData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $wallpaper = (new Wallpaper())
            ->setFilename('abstract-background-pink.jpg')
            ->setSlug('abstract-background-pink')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.abstract')
            )
        ;

        $manager->persist($wallpaper);



        $wallpaper = (new Wallpaper())
            ->setFilename('abstract-black-and-white-wave.jpg')
            ->setSlug('abstract-black-and-white-wave')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.abstract')
            )
        ;

        $manager->persist($wallpaper);



        $wallpaper = (new Wallpaper())
            ->setFilename('abstract-black-multi-color-wave.jpg')
            ->setSlug('abstract-black-multi-color-wave')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.abstract')
            )
        ;

        $manager->persist($wallpaper);



        $wallpaper = (new Wallpaper())
            ->setFilename('abstract-blue-green.jpg')
            ->setSlug('abstract-blue-green')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.abstract')
            )
        ;

        $manager->persist($wallpaper);




        $wallpaper = (new Wallpaper())
            ->setFilename('abstract-blue-line-background.jpg')
            ->setSlug('abstract-blue-line-background')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.abstract')
            )
        ;

        $manager->persist($wallpaper);



        $wallpaper = (new Wallpaper())
            ->setFilename('abstract-red-background-pattern.jpg')
            ->setSlug('abstract-red-background-pattern')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.abstract')
            )
        ;

        $manager->persist($wallpaper);



        $wallpaper = (new Wallpaper())
            ->setFilename('abstract-shards.jpeg')
            ->setSlug('abstract-shards')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.abstract')
            )
        ;

        $manager->persist($wallpaper);



        $wallpaper = (new Wallpaper())
            ->setFilename('abstract-swirls.jpeg')
            ->setSlug('abstract-swirls')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.abstract')
            )
        ;

        $manager->persist($wallpaper);



        $wallpaper = (new Wallpaper())
            ->setFilename('landscape-summer-beach.jpg')
            ->setSlug('landscape-summer-beach')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.summer')
            )
        ;

        $manager->persist($wallpaper);



        $wallpaper = (new Wallpaper())
            ->setFilename('landscape-summer-field.jpg')
            ->setSlug('landscape-summer-field')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.summer')
            )
        ;

        $manager->persist($wallpaper);



        $wallpaper = (new Wallpaper())
            ->setFilename('landscape-summer-flowers.jpg')
            ->setSlug('landscape-summer-flowers')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.summer')
            )
        ;

        $manager->persist($wallpaper);



        $wallpaper = (new Wallpaper())
            ->setFilename('landscape-summer-hill.jpg')
            ->setSlug('landscape-summer-hill')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.summer')
            )
        ;

        $manager->persist($wallpaper);



        $wallpaper = (new Wallpaper())
            ->setFilename('landscape-summer-mountain.png')
            ->setSlug('landscape-summer-mountain')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.summer')
            )
        ;

        $manager->persist($wallpaper);



        $wallpaper = (new Wallpaper())
            ->setFilename('landscape-summer-sea.jpg')
            ->setSlug('landscape-summer-sea')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.summer')
            )
        ;

        $manager->persist($wallpaper);



        $wallpaper = (new Wallpaper())
            ->setFilename('landscape-summer-sky.jpg')
            ->setSlug('landscape-summer-sky')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.summer')
            )
        ;

        $manager->persist($wallpaper);



        $wallpaper = (new Wallpaper())
            ->setFilename('landscape-winter-canada-lake.jpg')
            ->setSlug('landscape-winter-canada-lake')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.winter')
            )
        ;

        $manager->persist($wallpaper);



        $wallpaper = (new Wallpaper())
            ->setFilename('landscape-winter-high-tatras.jpg')
            ->setSlug('landscape-winter-high-tatras')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.winter')
            )
        ;

        $manager->persist($wallpaper);



        $wallpaper = (new Wallpaper())
            ->setFilename('landscape-winter-snow-lake.jpg')
            ->setSlug('landscape-winter-snow-lake')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.winter')
            )
        ;

        $manager->persist($wallpaper);



        $wallpaper = (new Wallpaper())
            ->setFilename('landscape-winter-snow-mountain.jpeg')
            ->setSlug('landscape-winter-snow-mountain')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.winter')
            )
        ;

        $manager->persist($wallpaper);



        $wallpaper = (new Wallpaper())
            ->setFilename('landscape-winter-snow-trees.jpg')
            ->setSlug('landscape-winter-snow-trees')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.winter')
            )
        ;

        $manager->persist($wallpaper);



        $wallpaper = (new Wallpaper())
            ->setFilename('landscape-winter-snowboard-jump.jpg')
            ->setSlug('landscape-winter-snowboard-jump')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.winter')
            )
        ;

        $manager->persist($wallpaper);



        $wallpaper = (new Wallpaper())
            ->setFilename('landscape-winter-snowy-fisheye.jpg')
            ->setSlug('landscape-winter-snowy-fisheye')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.winter')
            )
        ;

        $manager->persist($wallpaper);




        $manager->flush();
    }

    public function getOrder()
    {
        return 200;
    }
}