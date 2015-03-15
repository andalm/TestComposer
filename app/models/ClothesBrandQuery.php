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

    //Convert special characters to HTML entities and Quote string
    $input = htmlspecialchars(addslashes($input));
    $brands   = \BrandQuery::create()->orderByName()->find();
    $clothing = \ClothesQuery::create()->orderByName()->find();

    //Replaced brands to <b>brand</b>
    foreach($brands as $brand)
    {
      $input = preg_replace(
        '/((?=^)|\s{1})('.$brand->getName().')((?=$)|\s{1})/i',
        '$1<b>$2</b>$3',
        $input
      );
    }

    //Replaced clothing to <i>clothing</i>
    foreach($clothing as $clothes)
    {
      $input = preg_replace(
        '/((?=^)|\s{1})('.$clothes->getName().')((?=$)|\s{1})/i',
        '$1<i>$2</i>$3',
        $input
      );
    }

    return $input;
  }
}
