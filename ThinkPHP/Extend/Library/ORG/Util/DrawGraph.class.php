<?php
/**
 * @作者：李开涌
 * http://beauty-soft.net/book/php_mvc/vendor/drawgraph.html
 * @功能 ThinkPHP数据图形绘制扩展
 *
 */
class DrawGraph{
	static protected $images;
	static protected $w;
	static protected $h;
	static protected $data;
	static protected $conf=array();
	static public function init($data=array(),$conf){
		self::$data=$data;
		self::$conf=$conf;
		array_key_exists("Width",self::$conf)?$w=self::$conf["Width"]:$w=(count($data))*89;	
		if (!array_key_exists("headout", self::$conf)) self::$conf["headout"]=true;
		self::$w=$w;
		$h=260;
		self::$images=$im = imagecreate($w,$h);
		self::$h=$h;
		
	}
	static public function	PrintReport(){	
		$im=self::$images;		
		//设置画布颜色值			
		if (array_key_exists("GreenColor",self::$conf)) {
        			$GreenColor=explode(",",self::$conf["GreenColor"]);
        			$green=imagecolorallocate($im,$GreenColor[0],$GreenColor[1],$GreenColor[2]);
		}else{
			$green = imagecolorallocate($im,255,255,255);
		}        		    	 	    
        		if (array_key_exists("LineColor",self::$conf)) {
        			$LineColor=explode(",",self::$conf["LineColor"]);
        			$black=imagecolorallocate($im,$LineColor[0],$LineColor[1],$LineColor[2]);
        		}else{
        			$black=imagecolorallocate($im,0,0,0);
        		}
        		if (array_key_exists("PillarColor",self::$conf)) {
        			$PillarColor=explode(",",self::$conf["PillarColor"]);
        			$red=imagecolorallocate($im,$PillarColor[0],$PillarColor[1],$PillarColor[2]);
        		}else{
        			$red = imagecolorallocate($im,255,0,0);
        		}        		
        		if (array_key_exists("XYColor",self::$conf)) {
        			$XYColor=explode(",",self::$conf["XYColor"]);
        			$blue=imagecolorallocate($im,$XYColor[0],$XYColor[1],$XYColor[2]);
        		}else{
        			$blue = imagecolorallocate($im,0,0,255);
        		}
        		//柱形数据总数
        		$array=array();       		
		foreach (self::$data as $key=>$value){
			$str=$value["max"].",";
			array_push($array,$str);
		}
		//定义字体
		if (array_key_exists("font",self::$conf)) {
			   $fnt=self::$conf["font"];
		}else{
			   $fnt="c:/windows/fonts/simhei.ttf";
		}
		$array=array();       		
		foreach (self::$data as $key=>$value){
			$str=$value["max"];
			array_push($array,$str);
		}
		$str=max($array);		
		$max=$str;
		//X轴
        imageline($im,30,(self::$h)-30,(self::$w)-20,(self::$h)-30, $blue ); 
        //Y轴   
		imageline($im,30,5,30,(self::$h)-30, $blue );
		//文本
		array_key_exists("XTag",self::$conf)?$xTag=self::$conf["XTag"]:$xTag="X";
		array_key_exists("YTag",self::$conf)?$yTag=self::$conf["YTag"]:$yTag="Y";
        imagestring($im,3,(self::$w)-15,(self::$h)-30,$xTag,$black);
		imagestring($im,3,16,1,$yTag,$black); 
		//imageTTFText($im,6,0,(self::$w)-15,(self::$h)-30,$black,$fnt,$xTag);  
		//imageTTFText($im,6,0,16,1,$black,$fnt,$yTag);        
		$l=190;
		$k1=30;
		$k2=(self::$w)-20; 
	    for($j=0;$j<5;$j++){
	    	   //网格线横坐标
		   imageline($im,$k1,$l,$k2,$l,$black);     
		   $l=$l-40;		
		}

		$f=90; 
		$z1=22;
		$z2=(self::$h)-30;
	    	for($j=0;$j<12;$j++){
	    	   //设置Y轴网格线纵坐标
		   imageline($im,$f,$z1,$f,$z2,$black);     
		   $f=$f+70;	
		 }
	     	 $len=strlen($max);
		 $str="1";
		 for($z=1;$z<$len;$z++){
			 $str=$str."0";
		 }

		//输出Y轴坐标值
		$l=185;
	    	for($j=1;$j<6;$j++){
			$big=ceil(($max/$str))*$str;
   	        		imagestring($im,2,2,$l,$j*$big/5,$red);
		    	$l=$l-40;		
		 }
        $x = 40;
        $y = (self::$h)-30;
        $x_width = 30;
        $y_ht = 0;           		    		
		foreach (self::$data as $key => $value) {			
			$s="";
			if (array_key_exists("unit",self::$conf))
			$s=self::$conf["unit"];
			//实际销售量   
			$y_ht1 =((self::$h)-30)-floor((200/$big)*$value["max"]);
			//填充柱形图
          	imagefilledrectangle($im,$x,$y,$x+$x_width,$y_ht1,$red);
			imageTTFText($im,8,0,$x+2,$y+15,$black,$fnt,$value["name"]);     
			imageTTFText($im,8,0,$x+2,$y+25,$black,$fnt,$value["max"].$s);
			//柱形间距    
          	$x +=($x_width+40);      
		}		
        self::output($im,array_key_exists("type", self::$conf)?self::$conf["type"]:"png",self::$conf["filename"]);
	}
    static function output($im, $type, $filename='') {
    	if (self::$conf["headout"]){
	        header("Content-type: image/" . $type);
	        $ImageFun = 'image' . $type;
	        if (empty($filename)) {
	            $ImageFun($im);
	        } else {
	            $ImageFun($im, $filename);
	        }
	        imagedestroy($im);
    	}else{ 	
    		header('Content-Type:text/html; charset=utf-8');
    		imagepng($im, $filename);
    		echo "<img src='{$filename}'>";
		    imagedestroy($im);
    	}
    }
}

/*$data=array(
				"0"=>array(
        			"name"=>"1月份",
        			"max"=>10,
        		),
        		"1"=>array(
        			"name"=>"2月份",
        			"max"=>90,
        		),
        		"2"=>array(
        			"name"=>"3月份",
        			"max"=>80,
        		),
        		"3"=>array(
        			"name"=>"4月份",
        			"max"=>40,
        		),"4"=>array(
        			"name"=>"5月份",
        			"max"=>400,
        		),"5"=>array(
        			"name"=>"6月份",
        			"max"=>800,
        		)); 

$conf=array(
	"unit"=>"元",
	"XTag"=>"X",
	"YTag"=>"Y",
	"filename"=>"../../as.png",
			"headout"=>false,
);

DrawGraph::init($data,$conf);
DrawGraph::PrintReport();*/

?>

