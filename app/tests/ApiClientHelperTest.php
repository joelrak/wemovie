<?php

namespace App\Tests;

use App\Services\ApiClientHelper;
use PharIo\Manifest\InvalidUrlException;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ApiClientHelperTest extends KernelTestCase
{
    public function testSuccessResultCallApi(){
        self::bootKernel();
        $container = static::getContainer();
        /**@var ApiClientHelper $apiClientHelper*/
        $apiClientHelper = $container->get(ApiClientHelper::class);
        $data = $apiClientHelper->getResource('/genre/movie/list', []);

        $this->assertIsObject($data);
        $this->assertObjectHasAttribute('genres', $data);
    }

    public function testFailedresultSendBadUrl(){
        self::bootKernel();
        $container = static::getContainer();
        /**@var ApiClientHelper $apiClientHelper*/
        $apiClientHelper = $container->get(ApiClientHelper::class);
        $data = $apiClientHelper->getResource('/genre/movie', []);

        $this->assertTrue($data instanceof InvalidUrlException);
    }
}
