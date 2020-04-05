<?php  

class Movie
{
	private $id;
	private $title;
	private $url;
	private $thumbnail;
	private $explanation;
	private $upLoadDate;
	private $viewCount;

	public function __construct($id, $title, $url, $thumbnail, $explanation, $upLoadDate, $viewCount) {
		$this->id = $id;
		$this->title = $title;
		$this->url = $url;
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
	public function getUrl() {
		return $this->url;
	}
	public function getThumbnail() {
		return $this->thumbnail;
	}
	public function getExplanation() {
		return $this->explanation;
	}
	public function getUpLoadDate() {
		return date("Y/m/d H:i:s", strtotime($this->upLoadDate));
	}
	public function getViewCount() {
		return $this->viewCount;
	}
}

