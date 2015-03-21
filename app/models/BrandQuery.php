<?php

use Base\BrandQuery as BaseBrandQuery;
use Propel\Runtime\ActiveQuery\Criteria;

/**
 * Skeleton subclass for performing query and update operations on the 'brand' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class BrandQuery extends BaseBrandQuery
{
  /**
   * Return all records with count words in a name field
   * @return ObjectCollection All records
   */
  public function orderByDescName(){
    return $this->withColumn('(length(name)-length(replace(name," ",""))+1)', 'Count')
      ->orderByCount('desc')
      ->find();
  }
}
