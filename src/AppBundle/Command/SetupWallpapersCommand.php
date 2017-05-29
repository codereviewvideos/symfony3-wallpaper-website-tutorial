<?php

namespace AppBundle\Command;

use AppBundle\Entity\Wallpaper;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class SetupWallpapersCommand extends Command
{
    /**
     * @var string
     */
    private $rootDir;
    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(string $rootDir, EntityManagerInterface $em)
    {
        parent::__construct();

        $this->rootDir = $rootDir;
        $this->em = $em;
    }

    protected function configure()
    {
        $this
            ->setName('app:setup-wallpapers')
            ->setDescription('Grabs all the local wallpapers and creates a Wallpaper entity for each one.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        $wallpapers = glob($this->rootDir . '/../web/images/*.*');
        $wallpaperCount = count($wallpapers);

        $io->title('Importing Wallpapers');
        $io->progressStart($wallpaperCount);

        $fileNames = [];

        foreach ($wallpapers as $wallpaper) {

            [
                'basename' => $filename,
                'filename' => $slug,
            ] = pathinfo($wallpaper);

            [
                0 => $width,
                1 => $height
            ] = getimagesize($wallpaper);

            $wp = (new Wallpaper())
                ->setFilename($filename)
                ->setSlug($slug)
                ->setWidth($width)
                ->setHeight($height)
            ;

            $this->em->persist($wp);

            $io->progressAdvance();

            $fileNames[] = [$filename];

        }

        $this->em->flush();

        $io->progressFinish();

        $table = new Table($output);
        $table
            ->setHeaders(['Filename'])
            ->setRows($fileNames)
        ;
        $table->render();

        $io->success(sprintf('Cool, we added %d wallpapers', $wallpaperCount));

    }

}
