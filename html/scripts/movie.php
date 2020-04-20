<?php  

class Movie
{
	private $id;
	private $title;
	private $url_movie;
	private $url_thumbnail;
	private $explanation;
	private $upLoadDate;
	private $viewCount;
	private $userId;

	public function __construct($id, $title, $url_movie, $url_thumbnail, $explanation, $upLoadDate, $viewCount, $userId) {
		$this->id = $id;
		$this->title = $title;
		$this->url_movie = $url_movie;
		$this->url_thumbnail = $url_thumbnail;
		$this->explanation = $explanation;
		$this->upLoadDate = $upLoadDate;
		$this->viewCount = $viewCount;
		$this->userId = $userId;
	}

	public function getId() {
		return $this->id;
	}
	public function getTitle() {
		return $this->title;
	}
	public function getUrl() {
		return $this->url_movie;
	}
	public function getThumbnail() {
		return $this->url_thumbnail;
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
	public function getUserId() {
		return $this->userId;
	}
}

