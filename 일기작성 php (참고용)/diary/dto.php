<?php
//setter, getter, read, write, flist, delete



class Myfile{

	private $fDir;
	private $userDir;
	private $ymDir;
	private $fileName;
	private $content;
	private $tag;


	public function __construct(){
		$this->fDir = "contents";
		if(!is_dir($this->fDir)){
			mkdir($this->fDir);
		}
		$this->userDir = $this->fDir."/"."musicismylife";
		if(!is_dir($this->userDir)){
			mkdir($this->userDir);
		}
		$this->ymDir = $this->userDir."/"."2020.12";
		if(!is_dir($this->ymDir)){
			mkdir($this->ymDir);
		}
	}

	/*public function __dayconstruct(){
		$day = date("D", time());
		$this->dayDir =  $day;
		if(!is_dir($this->dayDir)){
			mkdir($this->dayDir);
		}
	}*/
	public function setFileName($fileName){
		$this->fileName = $fileName;
	}

	public function getFileName(){
		return $this->fileName;
	}

	public function setImgName($imgName){
		$this->imgName = $imgName;
	}

	public function getImgName(){
		return $this->imgName;
	}

	public function setContent($content){
		$this->content = $content;
	}
	public function getContent(){
		return $this->content;
	}
	public function setTag($tag){
		$this->tag= $tag;
	}
	public function getTag(){
		return $this->tag;
	}

	public function flist($type){
		$dir = "";
		$files = array();						//파일 데이터 목록을 저장할 배열
		//flist
		$dir = $this->ymDir;
	//	}else if($type==2){		//imglist
	//		$dir = $this->imgDir;

		$dirp = opendir($dir);
		while($file=readdir($dirp)){
			$fname =$file;
			if($fname!="." && $fname!=".."){
				$files [] = $fname;				//.,..제외한 파일 이름을 위에 files에 넣어줌
			}
		}
		closedir($dirp);
		sort($files);
		return $files;
	}

	public function read(){
		$str = file_get_contents($this->ymDir."/".$this->fileName);		//현재 소스파일과 위치가 다르기 때문에 경로를 지정하여
		$arr = explode("&%$", $str,2);
		$this->tag= $arr[0];
		$this->content = $arr[1];
	}


	public function write(){
		$result = $this->tag."&%$".$this->content;			//내용뿐만 아니라 컨텐트와 이미지이름을 $result 담는다
		file_put_contents($this->ymDir."/".$this->fileName, $result);
	}

	public function delete(){
			unlink($this->ymDir."/".$this->fileName);
	}


}
?>
