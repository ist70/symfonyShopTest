<?php

namespace Brend\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Client;
use AppBundle\Entity\Source;
use Brend\ShopBundle\Entity\Category;
use Brend\ShopBundle\Entity\Product;
use Brend\ShopBundle\Entity\Sale;
use Brend\ShopBundle\Entity\Status;

class DefaultController extends Controller
{

    public function indexAction()
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
        $repository = $this->getDoctrine()->getManager()->getRepository('BrendShopBundle:Client');
        $clients = $repository->findAll();

        //Получаем менеджер БД - Entity Manager
        $em = $this->getDoctrine()->getManager();

        //Создаем экземпляр модели Клиент
        $category = new Category();

        //Создаём экземпляр модели Source
        $product = new Product();

        //Задаем значение полей
        $category->setName('Компьютеры настольные');
        $product->setName('ASUS DBD7892');
        $product->addPrice(28564.00);
        $product->addCategories($category);
        $category->addProducts($product);

        //Передаем менеджеру объект модели
        $em->persist($category);
        $em->persist($product);

        //Добавляем запись в таблицу
        $em->flush();
        return $this->render('BrendShopBundle:Default:index.html.twig', ['clients' => $clients]);
    }

}
