<?php
/**
 * Allows value and key access by integer zero-based index.
 */

interface IBIndexedDataset extends Countable
{
	/**
	 * Retrieve item value by integer zero-based index.
	 *
	 * @param integer $itemIndex
	 * @return mixed
	 */
	public function getValueByIndex($itemIndex);

	/**
	 * Retrieve item key by integer zero-based index.
	 *
	 * @param integer $itemIndex
	 * @return mixed
	 */
	public function getKeyByIndex($itemIndex);
}
