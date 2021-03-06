<?php
/**
 * CoreShop.
 *
 * This source file is subject to the GNU General Public License version 3 (GPLv3)
 * For the full copyright and license information, please view the LICENSE.md and gpl-3.0.txt
 * files that are distributed with this source code.
 *
 * @copyright  Copyright (c) 2015-2020 Dominik Pfaffenbauer (https://www.pfaffenbauer.at)
 * @license    https://www.coreshop.org/license     GNU General Public License version 3 (GPLv3)
 */

namespace CoreShop\Component\Index\Worker;

use CoreShop\Component\Index\Listing\ListingInterface;
use CoreShop\Component\Index\Model\IndexColumnInterface;

interface FilterGroupHelperInterface
{
    /**
     * @param IndexColumnInterface $column
     * @param ListingInterface     $list
     * @param string               $field
     *
     * @return mixed
     */
    public function getGroupByValuesForFilterGroup(IndexColumnInterface $column, ListingInterface $list, $field);
}
