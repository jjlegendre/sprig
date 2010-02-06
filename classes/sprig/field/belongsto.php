<?php defined('SYSPATH') or die('No direct script access.');

class Sprig_Field_BelongsTo extends Sprig_Field_ForeignKey {

	public $in_db = TRUE;

	public function input($name, $value, array $attr = NULL)
	{
		$model = Sprig::factory($this->model);

		if (is_array ($this->choices))
		{
			$choices = $this->choices ;
		}
		else
		{
			$choices = $model->select_list($model->pk());
		}

		/*
			Removed the None default option.  This is an undesirable default for a foreign key.
			It is better managed by the user as part of a custom choices list.
		*/

		/* 
			Note: Updated to provide selected value as $this->value rather than $this->verbose 
			which was returning the description rathern than the value when a match was found in choices.
		*/
		return Form::select($name, $choices, $this->value($value), $attr);
	}

} // End Sprig_Field_BelongsTo
