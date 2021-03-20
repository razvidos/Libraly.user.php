<?php


class FieldsName
{
	 private const SearchFieldNames = array(
		'author',
		'name',
		'tag',
		'yearPublished'
	);
	private const TimeFieldNames = array(
		'date from',
		'date to'
	);


	public static function getSearchFieldNames() :array
	{
		return self::SearchFieldNames;
	}

	public static function getTimeFieldNames() :array
	{
		return self::TimeFieldNames;
	}
}