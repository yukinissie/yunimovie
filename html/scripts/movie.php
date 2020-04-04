<?php  

class Movie
{
	private $id;
	private $title;
	private $source;
	private $thumbnail;
	private $explanation;
	private $upLoadDate;
	private $viewCount;

	public function __construct($id, $title, $source, $thumbnail, $explanation, $upLoadDate, $viewCount) {
		$this->id = $id;
		$this->title = $title;
		$this->source = $source;
		$this->thumbnail = $thumbnail;
		$this->explanation = $explanation;
		$this->upLoadDate = $upLoadDate;
		$this->viewCount = $viewCount;
	}

	public function getId() {
		return $this->id;
	}
	public function getTitle() {
		return $this->title;
	}
	public function getSource() {
		return $this->source;
	}
	public function getThumbnail() {
		return $this->thumbnail;
	}
	public function getExplanation() {
		return $this->explanation;
	}
	public function getUpLoadDate() {
		return date("Y/m/d", strtotime($this->upLoadDate));
	}
	public function getViewCount() {
		return $this->viewCount;
	}
}

