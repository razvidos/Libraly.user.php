<?php


class FieldsName
{
	private static array $searchFieldNames = array('author', 'name', 'tag', 'yearPublished');
	private static array $timeFieldNames = array('date from', 'date to');


	public static function getSearchFieldNames() :array
	{
		return self::$searchFieldNames;
	}

	public static function getTimeFieldNames() :array
	{
		return self::$timeFieldNames;
	}
}