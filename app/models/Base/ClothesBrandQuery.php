<?php

namespace Base;

use \ClothesBrand as ChildClothesBrand;
use \ClothesBrandQuery as ChildClothesBrandQuery;
use \Exception;
use \PDO;
use Map\ClothesBrandTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'clothes_brand' table.
 *
 *
 *
 * @method     ChildClothesBrandQuery orderByClothesId($order = Criteria::ASC) Order by the clothes_id column
 * @method     ChildClothesBrandQuery orderByBrandId($order = Criteria::ASC) Order by the brand_id column
 * @method     ChildClothesBrandQuery orderById($order = Criteria::ASC) Order by the id column
 *
 * @method     ChildClothesBrandQuery groupByClothesId() Group by the clothes_id column
 * @method     ChildClothesBrandQuery groupByBrandId() Group by the brand_id column
 * @method     ChildClothesBrandQuery groupById() Group by the id column
 *
 * @method     ChildClothesBrandQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildClothesBrandQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildClothesBrandQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildClothesBrandQuery leftJoinBrand($relationAlias = null) Adds a LEFT JOIN clause to the query using the Brand relation
 * @method     ChildClothesBrandQuery rightJoinBrand($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Brand relation
 * @method     ChildClothesBrandQuery innerJoinBrand($relationAlias = null) Adds a INNER JOIN clause to the query using the Brand relation
 *
 * @method     ChildClothesBrandQuery leftJoinClothes($relationAlias = null) Adds a LEFT JOIN clause to the query using the Clothes relation
 * @method     ChildClothesBrandQuery rightJoinClothes($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Clothes relation
 * @method     ChildClothesBrandQuery innerJoinClothes($relationAlias = null) Adds a INNER JOIN clause to the query using the Clothes relation
 *
 * @method     \BrandQuery|\ClothesQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildClothesBrand findOne(ConnectionInterface $con = null) Return the first ChildClothesBrand matching the query
 * @method     ChildClothesBrand findOneOrCreate(ConnectionInterface $con = null) Return the first ChildClothesBrand matching the query, or a new ChildClothesBrand object populated from the query conditions when no match is found
 *
 * @method     ChildClothesBrand findOneByClothesId(int $clothes_id) Return the first ChildClothesBrand filtered by the clothes_id column
 * @method     ChildClothesBrand findOneByBrandId(int $brand_id) Return the first ChildClothesBrand filtered by the brand_id column
 * @method     ChildClothesBrand findOneById(int $id) Return the first ChildClothesBrand filtered by the id column
 *
 * @method     ChildClothesBrand[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildClothesBrand objects based on current ModelCriteria
 * @method     ChildClothesBrand[]|ObjectCollection findByClothesId(int $clothes_id) Return ChildClothesBrand objects filtered by the clothes_id column
 * @method     ChildClothesBrand[]|ObjectCollection findByBrandId(int $brand_id) Return ChildClothesBrand objects filtered by the brand_id column
 * @method     ChildClothesBrand[]|ObjectCollection findById(int $id) Return ChildClothesBrand objects filtered by the id column
 * @method     ChildClothesBrand[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ClothesBrandQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \Base\ClothesBrandQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'test_composer', $modelName = '\\ClothesBrand', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildClothesBrandQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildClothesBrandQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildClothesBrandQuery) {
            return $criteria;
        }
        $query = new ChildClothesBrandQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildClothesBrand|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ClothesBrandTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ClothesBrandTableMap::DATABASE_NAME);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildClothesBrand A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT clothes_id, brand_id, id FROM clothes_brand WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildClothesBrand $obj */
            $obj = new ChildClothesBrand();
            $obj->hydrate($row);
            ClothesBrandTableMap::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildClothesBrand|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildClothesBrandQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ClothesBrandTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildClothesBrandQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ClothesBrandTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the clothes_id column
     *
     * Example usage:
     * <code>
     * $query->filterByClothesId(1234); // WHERE clothes_id = 1234
     * $query->filterByClothesId(array(12, 34)); // WHERE clothes_id IN (12, 34)
     * $query->filterByClothesId(array('min' => 12)); // WHERE clothes_id > 12
     * </code>
     *
     * @see       filterByClothes()
     *
     * @param     mixed $clothesId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClothesBrandQuery The current query, for fluid interface
     */
    public function filterByClothesId($clothesId = null, $comparison = null)
    {
        if (is_array($clothesId)) {
            $useMinMax = false;
            if (isset($clothesId['min'])) {
                $this->addUsingAlias(ClothesBrandTableMap::COL_CLOTHES_ID, $clothesId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($clothesId['max'])) {
                $this->addUsingAlias(ClothesBrandTableMap::COL_CLOTHES_ID, $clothesId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClothesBrandTableMap::COL_CLOTHES_ID, $clothesId, $comparison);
    }

    /**
     * Filter the query on the brand_id column
     *
     * Example usage:
     * <code>
     * $query->filterByBrandId(1234); // WHERE brand_id = 1234
     * $query->filterByBrandId(array(12, 34)); // WHERE brand_id IN (12, 34)
     * $query->filterByBrandId(array('min' => 12)); // WHERE brand_id > 12
     * </code>
     *
     * @see       filterByBrand()
     *
     * @param     mixed $brandId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClothesBrandQuery The current query, for fluid interface
     */
    public function filterByBrandId($brandId = null, $comparison = null)
    {
        if (is_array($brandId)) {
            $useMinMax = false;
            if (isset($brandId['min'])) {
                $this->addUsingAlias(ClothesBrandTableMap::COL_BRAND_ID, $brandId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($brandId['max'])) {
                $this->addUsingAlias(ClothesBrandTableMap::COL_BRAND_ID, $brandId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClothesBrandTableMap::COL_BRAND_ID, $brandId, $comparison);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClothesBrandQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ClothesBrandTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ClothesBrandTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClothesBrandTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query by a related \Brand object
     *
     * @param \Brand|ObjectCollection $brand The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildClothesBrandQuery The current query, for fluid interface
     */
    public function filterByBrand($brand, $comparison = null)
    {
        if ($brand instanceof \Brand) {
            return $this
                ->addUsingAlias(ClothesBrandTableMap::COL_BRAND_ID, $brand->getId(), $comparison);
        } elseif ($brand instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ClothesBrandTableMap::COL_BRAND_ID, $brand->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByBrand() only accepts arguments of type \Brand or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Brand relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildClothesBrandQuery The current query, for fluid interface
     */
    public function joinBrand($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Brand');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Brand');
        }

        return $this;
    }

    /**
     * Use the Brand relation Brand object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \BrandQuery A secondary query class using the current class as primary query
     */
    public function useBrandQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBrand($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Brand', '\BrandQuery');
    }

    /**
     * Filter the query by a related \Clothes object
     *
     * @param \Clothes|ObjectCollection $clothes The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildClothesBrandQuery The current query, for fluid interface
     */
    public function filterByClothes($clothes, $comparison = null)
    {
        if ($clothes instanceof \Clothes) {
            return $this
                ->addUsingAlias(ClothesBrandTableMap::COL_CLOTHES_ID, $clothes->getId(), $comparison);
        } elseif ($clothes instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ClothesBrandTableMap::COL_CLOTHES_ID, $clothes->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByClothes() only accepts arguments of type \Clothes or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Clothes relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildClothesBrandQuery The current query, for fluid interface
     */
    public function joinClothes($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Clothes');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Clothes');
        }

        return $this;
    }

    /**
     * Use the Clothes relation Clothes object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ClothesQuery A secondary query class using the current class as primary query
     */
    public function useClothesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinClothes($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Clothes', '\ClothesQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildClothesBrand $clothesBrand Object to remove from the list of results
     *
     * @return $this|ChildClothesBrandQuery The current query, for fluid interface
     */
    public function prune($clothesBrand = null)
    {
        if ($clothesBrand) {
            $this->addUsingAlias(ClothesBrandTableMap::COL_ID, $clothesBrand->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the clothes_brand table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ClothesBrandTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ClothesBrandTableMap::clearInstancePool();
            ClothesBrandTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ClothesBrandTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ClothesBrandTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ClothesBrandTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ClothesBrandTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ClothesBrandQuery
