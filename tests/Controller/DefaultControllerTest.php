<?php
namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;


class DefaultControllerTest extends WebTestCase
{
    public function testHomepageResponseCodeOkay()
    {
        // Arrange
        $url = '/';
        $httpMethod = 'GET';
        $client = static::createClient();
        $expectedResult = Response::HTTP_OK;

        // Assert
        $client->request($httpMethod, $url);
        $result = $client->getResponse()->getStatusCode();

        // Assert
        $this->assertSame($expectedResult, $result);
    }

    public function testHomepageContentContainsHelloWorld()
    {
        // Arrange
        $url = '/';
        $httpMethod = 'GET';
        $client = static::createClient();
        $searchText = 'Hello World';

        // Act
        $client->request($httpMethod, $url);
        $content = $client->getResponse()->getContent();

        // Assert
        $this->assertContains($searchText, $content);
    }
}