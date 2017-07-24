<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Wallpaper;
use AppBundle\File\SymfonyUploadedFile;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class LoadWallpaperData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }


    public function load(ObjectManager $manager)
    {
        /**
         * @var $fs Filesystem
         */
        $fs = $this->container->get('filesystem');

        $imagesPath = __DIR__ . '/../images';
        $temporaryImagesPath = sys_get_temp_dir() . '/images';
        echo 'Copying images to temporary location.' . PHP_EOL;
        $fs->mirror($imagesPath, $temporaryImagesPath);

//        exec('cp -R ' . $imagesPath . ' ' . $temporaryImagesPath);


        $file = (new SymfonyUploadedFile())->setFile(
            new UploadedFile(
                $temporaryImagesPath . '/abstract-background-pink.jpg',
                'abstract-background-pink.jpg'
            )
        );

        $wallpaper = (new Wallpaper())
            ->setFile($file)
            ->setFilename('abstract-background-pink.jpg')
            ->setSlug('abstract-background-pink')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.abstract')
            )
        ;

        $manager->persist($wallpaper);



        $file = (new SymfonyUploadedFile())->setFile(
            new UploadedFile(
                $temporaryImagesPath . '/abstract-black-and-white-wave.jpg',
                'abstract-black-and-white-wave.jpg'
            )
        );

        $wallpaper = (new Wallpaper())
            ->setFile($file)
            ->setFilename('abstract-black-and-white-wave.jpg')
            ->setSlug('abstract-black-and-white-wave')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.abstract')
            )
        ;

        $manager->persist($wallpaper);




        $file = (new SymfonyUploadedFile())->setFile(
            new UploadedFile(
                $temporaryImagesPath . '/abstract-black-multi-color-wave.jpg',
                'abstract-black-multi-color-wave.jpg'
            )
        );

        $wallpaper = (new Wallpaper())
            ->setFile($file)
            ->setFilename('abstract-black-multi-color-wave.jpg')
            ->setSlug('abstract-black-multi-color-wave')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.abstract')
            )
        ;

        $manager->persist($wallpaper);




        $file = (new SymfonyUploadedFile())->setFile(
            new UploadedFile(
                $temporaryImagesPath . '/abstract-blue-green.jpg',
                'abstract-blue-green.jpg'
            )
        );

        $wallpaper = (new Wallpaper())
            ->setFile($file)
            ->setFilename('abstract-blue-green.jpg')
            ->setSlug('abstract-blue-green')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.abstract')
            )
        ;

        $manager->persist($wallpaper);




        $file = (new SymfonyUploadedFile())->setFile(
            new UploadedFile(
                $temporaryImagesPath . '/abstract-blue-line-background.jpg',
                'abstract-blue-line-background.jpg'
            )
        );
        $wallpaper = (new Wallpaper())
            ->setFile($file)
            ->setFilename('abstract-blue-line-background.jpg')
            ->setSlug('abstract-blue-line-background')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.abstract')
            )
        ;

        $manager->persist($wallpaper);



        $file = (new SymfonyUploadedFile())->setFile(
            new UploadedFile(
                $temporaryImagesPath . '/abstract-red-background-pattern.jpg',
                'abstract-red-background-pattern.jpg'
            )
        );

        $wallpaper = (new Wallpaper())
            ->setFile($file)
            ->setFilename('abstract-red-background-pattern.jpg')
            ->setSlug('abstract-red-background-pattern')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.abstract')
            )
        ;

        $manager->persist($wallpaper);



        $file = (new SymfonyUploadedFile())->setFile(
            new UploadedFile(
                $temporaryImagesPath . '/abstract-shards.jpeg',
                'abstract-shards.jpeg'
            )
        );

        $wallpaper = (new Wallpaper())
            ->setFile($file)
            ->setFilename('abstract-shards.jpeg')
            ->setSlug('abstract-shards')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.abstract')
            )
        ;

        $manager->persist($wallpaper);



        $file = (new SymfonyUploadedFile())->setFile(
            new UploadedFile(
                $temporaryImagesPath . '/abstract-swirls.jpeg',
                'abstract-swirls.jpeg'
            )
        );

        $wallpaper = (new Wallpaper())
            ->setFile($file)
            ->setFilename('abstract-swirls.jpeg')
            ->setSlug('abstract-swirls')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.abstract')
            )
        ;

        $manager->persist($wallpaper);



        $file = (new SymfonyUploadedFile())->setFile(
            new UploadedFile(
                $temporaryImagesPath . '/landscape-summer-beach.jpg',
                'landscape-summer-beach.jpg'
            )
        );

        $wallpaper = (new Wallpaper())
            ->setFile($file)
            ->setFilename('landscape-summer-beach.jpg')
            ->setSlug('landscape-summer-beach')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.summer')
            )
        ;

        $manager->persist($wallpaper);



        $file = (new SymfonyUploadedFile())->setFile(
            new UploadedFile(
                $temporaryImagesPath . '/landscape-summer-field.jpg',
                'landscape-summer-field.jpg'
            )
        );

        $wallpaper = (new Wallpaper())
            ->setFile($file)
            ->setFilename('landscape-summer-field.jpg')
            ->setSlug('landscape-summer-field')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.summer')
            )
        ;

        $manager->persist($wallpaper);



        $file = (new SymfonyUploadedFile())->setFile(
            new UploadedFile(
                $temporaryImagesPath . '/landscape-summer-flowers.jpg',
                'landscape-summer-flowers.jpg'
            )
        );

        $wallpaper = (new Wallpaper())
            ->setFile($file)
            ->setFilename('landscape-summer-flowers.jpg')
            ->setSlug('landscape-summer-flowers')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.summer')
            )
        ;

        $manager->persist($wallpaper);



        $file = (new SymfonyUploadedFile())->setFile(
            new UploadedFile(
                $temporaryImagesPath . '/landscape-summer-hill.jpg',
                'landscape-summer-hill.jpg'
            )
        );

        $wallpaper = (new Wallpaper())
            ->setFile($file)
            ->setFilename('landscape-summer-hill.jpg')
            ->setSlug('landscape-summer-hill')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.summer')
            )
        ;

        $manager->persist($wallpaper);



        $file = (new SymfonyUploadedFile())->setFile(
            new UploadedFile(
                $temporaryImagesPath . '/landscape-summer-mountain.png',
                'landscape-summer-mountain.png'
            )
        );

        $wallpaper = (new Wallpaper())
            ->setFile($file)
            ->setFilename('landscape-summer-mountain.png')
            ->setSlug('landscape-summer-mountain')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.summer')
            )
        ;

        $manager->persist($wallpaper);



        $file = (new SymfonyUploadedFile())->setFile(
            new UploadedFile(
                $temporaryImagesPath . '/landscape-summer-sea.jpg',
                'landscape-summer-sea.jpg'
            )
        );

        $wallpaper = (new Wallpaper())
            ->setFile($file)
            ->setFilename('landscape-summer-sea.jpg')
            ->setSlug('landscape-summer-sea')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.summer')
            )
        ;

        $manager->persist($wallpaper);



        $file = (new SymfonyUploadedFile())->setFile(
            new UploadedFile(
                $temporaryImagesPath . '/landscape-summer-sky.jpg',
                'landscape-summer-sky.jpg'
            )
        );

        $wallpaper = (new Wallpaper())
            ->setFile($file)
            ->setFilename('landscape-summer-sky.jpg')
            ->setSlug('landscape-summer-sky')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.summer')
            )
        ;

        $manager->persist($wallpaper);



        $file = (new SymfonyUploadedFile())->setFile(
            new UploadedFile(
                $temporaryImagesPath . '/landscape-winter-canada-lake.jpg',
                'landscape-winter-canada-lake.jpg'
            )
        );

        $wallpaper = (new Wallpaper())
            ->setFile($file)
            ->setFilename('landscape-winter-canada-lake.jpg')
            ->setSlug('landscape-winter-canada-lake')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.winter')
            )
        ;

        $manager->persist($wallpaper);



        $file = (new SymfonyUploadedFile())->setFile(
            new UploadedFile(
                $temporaryImagesPath . '/landscape-winter-high-tatras.jpg',
                'landscape-winter-high-tatras.jpg'
            )
        );

        $wallpaper = (new Wallpaper())
            ->setFile($file)
            ->setFilename('landscape-winter-high-tatras.jpg')
            ->setSlug('landscape-winter-high-tatras')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.winter')
            )
        ;

        $manager->persist($wallpaper);



        $file = (new SymfonyUploadedFile())->setFile(
            new UploadedFile(
                $temporaryImagesPath . '/landscape-winter-snow-lake.jpg',
                'landscape-winter-snow-lake.jpg'
            )
        );

        $wallpaper = (new Wallpaper())
            ->setFile($file)
            ->setFilename('landscape-winter-snow-lake.jpg')
            ->setSlug('landscape-winter-snow-lake')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.winter')
            )
        ;

        $manager->persist($wallpaper);



        $file = (new SymfonyUploadedFile())->setFile(
            new UploadedFile(
                $temporaryImagesPath . '/landscape-winter-snow-mountain.jpeg',
                'landscape-winter-snow-mountain.jpeg'
            )
        );

        $wallpaper = (new Wallpaper())
            ->setFile($file)
            ->setFilename('landscape-winter-snow-mountain.jpeg')
            ->setSlug('landscape-winter-snow-mountain')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.winter')
            )
        ;

        $manager->persist($wallpaper);



        $file = (new SymfonyUploadedFile())->setFile(
            new UploadedFile(
                $temporaryImagesPath . '/landscape-winter-snow-trees.jpg',
                'landscape-winter-snow-trees.jpg'
            )
        );

        $wallpaper = (new Wallpaper())
            ->setFile($file)
            ->setFilename('landscape-winter-snow-trees.jpg')
            ->setSlug('landscape-winter-snow-trees')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.winter')
            )
        ;

        $manager->persist($wallpaper);



        $file = (new SymfonyUploadedFile())->setFile(
            new UploadedFile(
                $temporaryImagesPath . '/landscape-winter-snowboard-jump.jpg',
                'landscape-winter-snowboard-jump.jpg'
            )
        );

        $wallpaper = (new Wallpaper())
            ->setFile($file)
            ->setFilename('landscape-winter-snowboard-jump.jpg')
            ->setSlug('landscape-winter-snowboard-jump')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.winter')
            )
        ;

        $manager->persist($wallpaper);



        $file = (new SymfonyUploadedFile())->setFile(
            new UploadedFile(
                $temporaryImagesPath . '/landscape-winter-snowy-fisheye.png',
                'landscape-winter-snowy-fisheye.png'
            )
        );

        $wallpaper = (new Wallpaper())
            ->setFile($file)
            ->setFilename('landscape-winter-snowy-fisheye.png')
            ->setSlug('landscape-winter-snowy-fisheye')
            ->setWidth(1920)
            ->setHeight(1080)
            ->setCategory(
                $this->getReference('category.winter')
            )
        ;

        $manager->persist($wallpaper);




        $manager->flush();


        echo 'Removed images from temporary location.' . PHP_EOL;
        $fs->remove($temporaryImagesPath);
//        exec('rm -rf ' . $temporaryImagesPath);
    }

    public function getOrder()
    {
        return 200;
    }
}