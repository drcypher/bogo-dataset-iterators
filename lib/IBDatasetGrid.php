<?php
/**
 * Interface for all dataset grids.
 */
interface IBDatasetGrid extends IteratorAggregate
{
	/**
	 * Number of columns in the grid.
	 *
	 * @return integer
	 */
	public function getColumnCount();

	/**
	 * Number of rows in the grid.
	 *
	 * @return integer
	 */
	public function getRowCount();

	/**
	 * Wrapped indexed dataset.
	 *
	 * @return IBIndexedDataset
	 */
	public function &getDataset();
}
