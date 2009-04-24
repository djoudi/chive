<?php

class Icon extends CWidget
{

	public $htmlOptions;
	public $size = 16;
	public $name;
	public $text = "core.unknown";
	public $disabled = false;
	public $title;

	public function run()
	{
		list($category, $var) = explode(".", $this->text);

		$classes = "icon icon" . $this->size . " icon_" . $this->name . ($this->disabled ? " disabled" : "");
		if(isset($this->htmlOptions['class']))
		{
			$this->htmlOptions['class'] .= " " . $classes;
		}
		else
		{
			$this->htmlOptions['class'] = $classes;
		}

		if(!$this->title)
		{
			$this->title = $this->text;
		}
		list($titleCategory, $titleVar) = explode(".", $this->title);

		echo '<img '
			. 'src="' . ICONPATH . '/' . $this->size . DIRECTORY_SEPARATOR . $this->name . '.png" '
			. 'alt="' . Yii::t($category, $var) . '" '
			. 'title="' . Yii::t($titleCategory, $titleVar) . '" '
			. 'class="' . $classes . '" />';
	}

}