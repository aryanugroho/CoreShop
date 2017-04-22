<?php
/**
 * CoreShop
 *
 * LICENSE
 *
 * This source file is subject to the GNU General Public License version 3 (GPLv3)
 * For the full copyright and license information, please view the LICENSE.md and gpl-3.0.txt
 * files that are distributed with this source code.
 *
 * @copyright  Copyright (c) 2015-2017 Dominik Pfaffenbauer (https://www.pfaffenbauer.at)
 * @license    https://www.coreshop.org/license     GNU General Public License version 3 (GPLv3)
 */

namespace CoreShop\Test\Models;

use CoreShop\Model\Carrier\DeliveryPrice;
use CoreShop\Model\Carrier\RangePrice;
use CoreShop\Model\Carrier\RangeWeight;
use CoreShop\Test\Base;
use CoreShop\Test\Data;

/**
 * Class Carrier
 * @package CoreShop\Test\Models
 */
class Carrier extends Base
{
    /**
     * Test Carrier Creation
     */
    public function testCarrierCreation()
    {
        $this->printTestName();

        $this->assertNotNull(\CoreShop\Model\Carrier::getById(1));
        $this->assertNotNull(\CoreShop\Model\Carrier::getById(2));
    }

    /**
     * Test Carrier Price
     */
    public function testCarrierPrice()
    {
        $this->printTestName();

        $cart = Data::createCartWithProducts();

        $price1 = Data::$carrier1->getDeliveryPrice($cart, true);
        $price2 = Data::$carrier2->getDeliveryPrice($cart, true);

        $this->assertEquals(false, $price1);
        $this->assertEquals(24, $price2);
    }

    /**
     * Test Carrier Taxes
     */
    public function testCarrierTax()
    {
        $this->printTestName();

        $cart = Data::createCartWithProducts();

        $tax = Data::$carrier2->getTaxAmount($cart);

        $this->assertEquals(4, $tax);
    }

    /**
     * Test Carrier Carts
     */
    public function testCarriersForCart()
    {
        $this->printTestName();

        $cart = Data::createCartWithProducts();
        $carriersForCart = \CoreShop\Model\Carrier::getCarriersForCart($cart);

        $this->assertEquals(1, count($carriersForCart));
        $this->assertEquals(Data::$carrier2->getId(), $carriersForCart[0]->getId());
    }
}