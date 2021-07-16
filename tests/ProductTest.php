<?php

namespace Sylapi\Feeds\Nokaut\Tests;

use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use Sylapi\Feeds\FeedGenerator;
use Sylapi\Feeds\Nokaut\Feed;
use Sylapi\Feeds\Nokaut\Models\Product;
use Sylapi\Feeds\Nokaut\Models\ProductDetail;

class ProductTest extends PHPUnitTestCase
{

    private $product;

    private $serializer;

    public function setUp():void
    {
        $this->product = $this->createProduct();
        $this->serializer = (new FeedGenerator())->getSerializer();
    }

    private function createProduct(): Product
    {

        $productDetails = [];
        for($x = 0; $x < 4; $x++)  {
            $productDetail = new ProductDetail();
            $productDetail->setAttributeName('param_'.$x)
                ->setAttributeValue('Value '.$x);
    
            $productDetails[] = $productDetail;
        }

        $product = new Product();
        
        $product->setId('1234567890')
            ->setTitle('Test title')
            ->setDescription('Test Description')
            ->setLink('http://link.dev/product/1.html')
            ->setImageLink('http://link.dev/storage/1/1.jpg')
            ->setAdditionalImageLinks([
                'http://link.dev/storage/1/2.jpg',
                'http://link.dev/storage/1/3.jpg',
                'http://link.dev/storage/1/4.jpg'
            ])
            ->setPrice(100.00)
            ->setSalePrice(90.00)
            ->setProductCategory('Elektronika | Mobilní telefony')
            ->setManufacturer('Test Manufacturer')
            ->setGtin('1234567890')
            ->setMpn('0987654321')
            ->setShippingWeight(2.00)
            ->setShippingWeightUnit('kg')
            ->setMaxHandlingTime(12)
            ->setProductDetails($productDetails)
            ;
        return $product;
    }


    public function testProductXML()
    {
        $content = $this->serializer->serialize($this->product, 'xml');
        $filePath = __DIR__.'/Mock/product.xml';

        file_put_contents($filePath, $content);
        $this->assertXmlStringEqualsXmlFile($filePath, $content);
    }

    public function testMakeProduct()
    {
        $categoryName = 'Test Category';

        $productBase = new \Sylapi\Feeds\Models\Product();
        $productBase->setProductCategory([
            Feed::NAME => $categoryName
            ])
            ->setProductDetails([
                Feed::NAME => [ new \Sylapi\Feeds\Models\ProductDetail() ]
            ])
        ;
        $product = (new Product)->make($productBase);
        $productDetails = $product->getProductDetails();
        $this->assertInstanceOf(Product::class, $product);
        $this->assertInstanceOf(ProductDetail::class, $productDetails[0]);
        $this->assertEquals($categoryName, $product->getProductCategory());

    }
}