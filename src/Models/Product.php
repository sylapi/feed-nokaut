<?php
namespace Sylapi\Feeds\Nokaut\Models;

use JMS\Serializer\Annotation as Serializer;
use Sylapi\Feeds\Contracts\ProductSerializer;
use Sylapi\Feeds\Nokaut\Feed;
use Sylapi\Feeds\Nokaut\Enums\Availability;

/**
 * @Serializer\XmlRoot("offer")
 * @Serializer\AccessType("public_method")
 */

class Product implements ProductSerializer
{
    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     */
    private $id;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("name")
     */
    private $title;

    /**
     * @Serializer\Type("string")
     */
    private $description;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("url")
     */
    private $link;

    /**
     * @Serializer\Type("string") 
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SerializedName("image")
     */
    private $imageLink;

    /**
     * @Serializer\Type("array<string>")
     * @Serializer\SerializedName("gallery")
     * @Serializer\XmlList(inline = false, entry = "image")
     */
    private $additionalImageLinks;

    /**
     * @Serializer\Type("string")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\Exclude
     */
    private $availability;

    /**
     * @Serializer\Type("double")
     * @Serializer\Exclude(if="object.getSalePrice() !== null")
     */
    private $price;

    /**
     * @Serializer\Type("double")
     * @Serializer\SerializedName("price")
     */
    private $salePrice;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("category")
     */
    private $productCategory; 


    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("producer")
     */
    private $manufacturer;

    /**
     * @Serializer\Type("string")
     * @Serializer\Exclude
     */
    private $gtin;  

    /**
     * @Serializer\Type("string")
     * @Serializer\Exclude
     */
    private $mpn;

    /**
     * @Serializer\Type("double")
     * @Serializer\SerializedName("weight")
     * @Serializer\Exclude(if="object.getShippingWeightUnit() != 'kg'")
     */
    private $shippingWeight;

    /**
     * @Serializer\Type("string")
     * @Serializer\Exclude
     */
    private $shippingWeightUnit;    

    /**
     * @Serializer\Type("integer")
     * @Serializer\Exclude
     */
    private $maxHandlingTime;        

    /**
     * @Serializer\Type("array<Sylapi\Feeds\Nokaut\Models\ProductDetail>")
     * @Serializer\XmlList(inline = true, entry = "property")    
     */
    private $productDetails;
    
    /**
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("instock")
     */
    private $quantity;

    /**
     * @Serializer\Type("string")
     */
    private $warranty;

    
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of link
     */ 
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set the value of link
     *
     * @return  self
     */ 
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }    

    /**
     * Get the value of imageLink
     */ 
    public function getImageLink()
    {
        return $this->imageLink;
    }

    /**
     * Set the value of imageLink
     *
     * @return  self
     */ 
    public function setImageLink($imageLink)
    {
        $this->imageLink = $imageLink;

        return $this;
    }

        /**
     * Get the value of additionalImageLinks
     */ 
    public function getAdditionalImageLinks()
    {
        return $this->additionalImageLinks;
    }

    /**
     * Set the value of additionalImageLinks
     *
     * @return  self
     */ 
    public function setAdditionalImageLinks($additionalImageLinks)
    {
        $this->additionalImageLinks = $additionalImageLinks;

        return $this;
    }  

    /**
     * Get the value of availability
     */ 
    public function getAvailability()
    {
        return $this->availability;
    }

    /**
     * Set the value of availability
     *
     * @return  self
     */ 
    public function setAvailability($availability)
    {
        $this->availability = $availability;

        return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of salePrice
     */ 
    public function getSalePrice()
    {
        return $this->salePrice;
    }

    /**
     * Set the value of salePrice
     *
     * @return  self
     */ 
    public function setSalePrice($salePrice)
    {
        $this->salePrice = $salePrice;

        return $this;
    }

    /**
     * Get the value of productCategory
     */ 
    public function getProductCategory()
    {
        if(isset($this->productCategory[Feed::NAME])) {
            return $this->productCategory[Feed::NAME];
        }
        
        return null;
    }

    /**
     * Set the value of productCategory
     *
     * @return  self
     */ 
    public function setProductCategory($productCategory)
    {
        $this->productCategory = $productCategory;

        return $this;
    }

    /**
     * Get the value of manufacturer
     */ 
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    /**
     * Set the value of manufacturer
     *
     * @return  self
     */ 
    public function setManufacturer($manufacturer)
    {
        $this->manufacturer = $manufacturer;

        return $this;
    }

    /**
     * Get the value of gtin
     */ 
    public function getGtin()
    {
        return $this->gtin;
    }

    /**
     * Set the value of gtin
     *
     * @return  self
     */ 
    public function setGtin($gtin)
    {
        $this->gtin = $gtin;

        return $this;
    }

    /**
     * Get the value of mpn
     */ 
    public function getMpn()
    {
        return $this->mpn;
    }

    /**
     * Set the value of mpn
     *
     * @return  self
     */ 
    public function setMpn($mpn)
    {
        $this->mpn = $mpn;

        return $this;
    }

    /**
     * Get the value of shippingWeight
     */ 
    public function getShippingWeight()
    {
        return $this->shippingWeight;
    }

    /**
     * Set the value of shippingWeight
     *
     * @return  self
     */ 
    public function setShippingWeight($shippingWeight)
    {
        $this->shippingWeight = $shippingWeight;

        return $this;
    }

        /**
     * Get the value of shippingWeightUnit
     */ 
    public function getShippingWeightUnit()
    {
        return $this->shippingWeightUnit;
    }

    /**
     * Set the value of shippingWeightUnit
     *
     * @return  self
     */ 
    public function setShippingWeightUnit($shippingWeightUnit)
    {
        $this->shippingWeightUnit = $shippingWeightUnit;

        return $this;
    }

    /**
     * Get the value of maxHandlingTime
     */ 
    public function getMaxHandlingTime()
    {
        return $this->maxHandlingTime;
    }

    /**
     * Set the value of maxHandlingTime
     *
     * @return  self
     */ 
    public function setMaxHandlingTime($maxHandlingTime)
    {
        $this->maxHandlingTime = $maxHandlingTime;

        return $this;
    }    

    /**
     * Get the value of productDetails
     */ 
    public function getProductDetails()
    {
        return $this->productDetails;
    }

    /**
     * Set the value of productDetails
     *
     * @return  self
     */ 
    public function setProductDetails($productDetails)
    {
        $this->productDetails = $productDetails;

        return $this;
    }    

    /**
     * Get the value of quantity
     */ 
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set the value of quantity
     *
     * @return  self
     */ 
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }
    
     /**
     * Get the value of warranty
     */ 
    public function getWarranty()
    {
        return $this->warranty;
    }

    /**
     * Set the value of warranty
     *
     * @return  self
     */ 
    public function setWarranty($warranty)
    {
        $this->warranty = $warranty;

        return $this;
    }

    /**
     * @Serializer\VirtualProperty
     * @Serializer\XmlMap(inline = true, entry = "property", keyAttribute = "name")
     * @Serializer\XmlElement(cdata=false)
     * @return string
     */
    public function getProperties()
    {
        $response = [];
        if($this->getGtin() !== null) {
            $response['ean'] = $this->getGtin();
        }

        if($this->getMpn() !== null) {
            $response['mpn'] = $this->getMpn();
        }

        return $response;
    }

    /**
     * @Serializer\VirtualProperty
     * @Serializer\SerializedName("availability")
     * @Serializer\XmlElement(cdata=false)
     * @return mixed
     */
    public function getAvailabilityProperty()
    {
        if(Availability::isCorrectStatus($this->getAvailability())) {
            return $this->getAvailability();
        }

        if($this->getMaxHandlingTime() !== null) {
            $handlingTime = $this->getMaxHandlingTime();
            if($handlingTime <=2) {
                return Availability::IN_STOCK;
            } elseif ($handlingTime > 2 && $handlingTime <= 7){
                return Availability::UP_7_DAYS;
            } elseif ($handlingTime > 7 && $handlingTime <= 14){
                return Availability::FROM_7_DAYS;
            }
        }

        return null;
    }


    public function make(\Sylapi\Feeds\Models\Product $product): self
    {
        $item  = new self;

        $itemVars = array_keys(get_class_vars(self::class));
    
        foreach($itemVars as $itemVar) {
            $getterName = 'get'.ucfirst($itemVar);
            $setterName = 'set'.ucfirst($itemVar);

            if(method_exists($product, $getterName) && method_exists($item, $setterName)) {
                $elem =  $product->{$getterName}();
                if(isset($elem[Feed::NAME]) 
                    && is_array($elem[Feed::NAME]) 
                    && $itemVar === 'productDetails'
                ) {                
                    $elems = [];
                    foreach($elem[Feed::NAME] as $pd){
                        $elems[] = (new ProductDetail)->make($pd);
                    }
                    $elem = $elems;
                }

                $item->{$setterName}($elem);  
            }
        }

        return $item;
    }
}
