<?php
/**
 * Indexed Dataset grid implementation for fixed column count.
 *
 */
class CBFixedColumnGrid implements IBDatasetGrid
{
	/**
	 * Items to iterate over.
	 * @var IBIndexedDataset
	 */
	protected $dataset;

	/**
	 * Grid column count.
	 *
	 * @var integer
	 */
	protected $columnCount;

	/**
	 * Grid row count.
	 * @var integer
	 */
	protected $rowCount;

	/**
	 * Construct grid.
	 *
	 * @param IBIndexedDataset $items
	 * @param integer $columnCount
	 */
	public function __construct(IBIndexedDataset $dataset, $columnCount)
	{
		$this->dataset = $dataset;

		$this->columnCount = $columnCount;
		$itemCount = count($dataset);
		$this->rowCount = ceil($itemCount / $this->columnCount);
	}

	/**
	 * Grid column count.
	 *
	 * @return integer
	 */
	public function getColumnCount()
	{
		return $this->columnCount;
	}

	/**
	 * Grid row count.
	 *
	 * @return integer
	 */
	public function getRowCount()
	{
		return $this->rowCount;
	}

	/**
	 * Wrapped indexed dataset.
	 *
	 * @return IBIndexedDataset
	 */
	public function &getDataset()
	{
		return $this->dataset;
	}

	/**
	 * IteratorAggregate iterator.
	 *
	 * @return CBDatasetGridRowIterator
	 */
	public function getIterator()
	{
		return new CBDatasetGridRowIterator($this);
	}

	/**
	 * Construct a max column grid and wrap the dataset in an indexed array.
	 *
	 * @param mixed[] $items
	 * @param integer $columnCount
	 * @return CBMaxColumnGrid
	 */
	static public function fromArray(array &$items, $columnCount)
	{
		return new CBFixedColumnGrid(new CBIndexedArray($items), $columnCount);
	}

	/**
	 * Construct a max column grid and wrap the dataset in an indexed array.
	 *
	 * @param mixed[] $items
	 * @param integer $columnCount
	 * @return CBMaxColumnGrid
	 */
	static public function fromAssoc(array &$items, $columnCount)
	{
		return new CBFixedColumnGrid(new CBIndexedAssoc($items), $columnCount);
	}
}
