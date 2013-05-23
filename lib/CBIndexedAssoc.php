<?php
/**
 * Indexed Dataset implementation for associative arrays.
 *
 */
class CBIndexedAssoc extends CBIndexedArray
{
	/**
	 * Item keys to allow lookup by numeric index.
	 *
	 * @var array
	 */
	private $itemKeys = array();

	/**
	 * Construct dataset.
	 *
	 * @param mixed[] $items
	 */
	public function __construct(array &$items)
	{
		parent::__construct($items);

		$this->itemKeys = array_keys($items);
	}

	/**
	 * Retrieve item by index.
	 *
	 * @param integer $itemIndex
	 * @return mixed
	 */
	public function getValueByIndex($itemIndex)
	{
		return ((0 <= $itemIndex) && ($itemIndex < $this->itemCount)) ? $this->items[$this->itemKeys[$itemIndex]] : null;
	}

	/**
	 * Retrieve item key by index.
	 *
	 * @param integer $itemIndex
	 * @return mixed
	 */
	public function getKeyByIndex($itemIndex)
	{
		return ((0 <= $itemIndex) && ($itemIndex < $this->itemCount)) ? $this->itemKeys[$itemIndex] : null;
	}
}
