<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Client;
use AppBundle\Entity\Source;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        //Получаем менеджер БД - Entity Manager
        //$em = $this->getDoctrine()->getManager();
//
//        //Создаем экземпляр модели Клиент
//        $client = new Client();
//
//        //Создаём экземпляр модели Source
//        $source = new Source();
//
//        //Задаем значение полей
//        $source->setName('Интернет');
//        $client->setCode(100);
//        $client->setFirstname('Иван');
//        $client->setLastname('Петров');
//        $client->setSource($source);
//
//        //Передаем менеджеру объект модели
//        $em->persist($client);
//        $em->persist($source);
//
//        //Добавляем запись в таблицу
//        $em->flush();
        $repository = $this->getDoctrine()->getManager()->getRepository('AppBundle:Client');
        $client = $repository->find(3);
        echo $client->getFirstname() . ' ';
        echo $client->getLastname() . ' ';
        echo $client->getSource()->getName();
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir') . '/..'),
        ]);
    }
}
