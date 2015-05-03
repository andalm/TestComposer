<?php

use Base\ClothesBrandQuery as BaseClothesBrandQuery;

/**
 * Skeleton subclass for performing query and update operations on the 'clothes_brand' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class ClothesBrandQuery extends BaseClothesBrandQuery
{

  /**
   * This function return the string with replaced matches
   * @param  string $input Text passed in the input of the form
   * @return string String with replaced matches
   */
  public function searchBrandsOrClothing($input)
  {
    if(!is_string($input))
      throw new Exception("The paramater must be a string.");

    //Convert special characters to HTML entities
    $input = htmlspecialchars($input);
    $brands = \BrandQuery::create()
      ->filterByNameScore($input)
      ->orderByDescName()
      ->find();

    $clothing = \ClothesQuery::create()
      ->filterByNameScore($input)
      ->orderByDescName()
      ->find();

    //Replaced brands to <b>brand</b>
    foreach($brands as $brand)
    {
      $input = preg_replace(
        '/('.$brand->getName().')/i',
        '<b>$1</b>',
        $input
      );
    }

    //Replaced clothing to <i>clothing</i>
    foreach($clothing as $clothes)
    {
      $input = preg_replace(
        '/('.$clothes->getName().')/i',
        '<i>$1</i>',
        $input
      );
    }

    return $input;
  }
}
