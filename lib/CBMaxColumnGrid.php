<?php
/**
 * Indexed Dataset grid implementation for max column count.
 *
 */
class CBMaxColumnGrid extends CBFixedColumnGrid
{
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

		if (($this->rowCount > 0) && ($itemCount <= ($this->columnCount - 1) * $this->rowCount)) {
			$this->columnCount = ceil($itemCount / $this->rowCount);
		}
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
		return new CBMaxColumnGrid(new CBIndexedArray($items), $columnCount);
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
		return new CBMaxColumnGrid(new CBIndexedAssoc($items), $columnCount);
	}
}
