<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function indexAction()
    {
        $abstract = [
            "abstract-background-pink.jpg",
            "abstract-black-and-white-wave.jpg",
            "abstract-black-multi-color-wave.jpg",
            "abstract-blue-green.jpg",
            "abstract-blue-line-background.jpg",
            "abstract-red-background-pattern.jpg",
            "abstract-shards.jpeg",
            "abstract-swirls.jpeg",
        ];

        $summer = [
            "landscape-summer-beach.jpg",
            "landscape-summer-field.jpg",
            "landscape-summer-flowers.jpg",
            "landscape-summer-hill.jpg",
            "landscape-summer-mountain.png",
            "landscape-summer-sea.jpg",
            "landscape-summer-sky.jpg",
        ];

        $winter = [
            "landscape-winter-canada-lake.jpg",
            "landscape-winter-high-tatras.jpg",
            "landscape-winter-snow-lake.jpg",
            "landscape-winter-snow-mountain.jpeg",
            "landscape-winter-snow-trees.jpg",
            "landscape-winter-snowboard-jump.jpg",
            "landscape-winter-snowy-fisheye.png",
        ];

        $images = array_merge($abstract, $summer, $winter);

        shuffle($images);

        $randomisedImages = array_slice($images, 0, 8);

        return $this->render('home/index.html.twig', [
            'randomised_images' => $randomisedImages,
            'abstract'          => array_slice($abstract, 0, 2),
            'summer'            => array_slice($summer, 0, 2),
            'winter'            => array_slice($winter, 0, 2),
        ]);
    }
}