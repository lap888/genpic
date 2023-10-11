<?php
$iosImages = '[
  {
    "size" : "20x20",
    "idiom" : "iphone",
    "filename" : "logo40.jpg",
    "scale" : "2x"
  },
  {
    "size" : "20x20",
    "idiom" : "iphone",
    "filename" : "logo60.jpg",
    "scale" : "3x"
  },
  {
    "size" : "29x29",
    "idiom" : "iphone",
    "filename" : "logo29.jpg",
    "scale" : "1x"
  },
  {
    "size" : "29x29",
    "idiom" : "iphone",
    "filename" : "logo58.jpg",
    "scale" : "2x"
  },
  {
    "size" : "29x29",
    "idiom" : "iphone",
    "filename" : "logo87.jpg",
    "scale" : "3x"
  },
  {
    "size" : "40x40",
    "idiom" : "iphone",
    "filename" : "logo80.jpg",
    "scale" : "2x"
  },
  {
    "size" : "40x40",
    "idiom" : "iphone",
    "filename" : "logo120.jpg",
    "scale" : "3x"
  },
  {
    "size" : "60x60",
    "idiom" : "iphone",
    "filename" : "logo120-1.jpg",
    "scale" : "2x"
  },
  {
    "size" : "60x60",
    "idiom" : "iphone",
    "filename" : "logo180.jpg",
    "scale" : "3x"
  },
  {
    "idiom" : "ipad",
    "size" : "20x20",
    "scale" : "1x"
  },
  {
    "idiom" : "ipad",
    "size" : "20x20",
    "scale" : "2x"
  },
  {
    "idiom" : "ipad",
    "size" : "29x29",
    "scale" : "1x"
  },
  {
    "idiom" : "ipad",
    "size" : "29x29",
    "scale" : "2x"
  },
  {
    "idiom" : "ipad",
    "size" : "40x40",
    "scale" : "1x"
  },
  {
    "idiom" : "ipad",
    "size" : "40x40",
    "scale" : "2x"
  },
  {
    "idiom" : "ipad",
    "size" : "76x76",
    "scale" : "1x"
  },
  {
    "idiom" : "ipad",
    "size" : "76x76",
    "scale" : "2x"
  },
  {
    "idiom" : "ipad",
    "size" : "83.5x83.5",
    "scale" : "2x"
  },
  {
    "idiom" : "ios-marketing",
    "size" : "1024x1024",
    "scale" : "1x"
  },
  {
    "size" : "20x20",
    "idiom" : "ipad",
    "filename" : "logo20.jpg",
    "unassigned" : true,
    "scale" : "1x"
  },
  {
    "size" : "20x20",
    "idiom" : "ipad",
    "filename" : "logo40-1.jpg",
    "unassigned" : true,
    "scale" : "2x"
  },
  {
    "size" : "29x29",
    "idiom" : "ipad",
    "filename" : "logo29-1.jpg",
    "unassigned" : true,
    "scale" : "1x"
  },
  {
    "size" : "29x29",
    "idiom" : "ipad",
    "filename" : "logo58-1.jpg",
    "unassigned" : true,
    "scale" : "2x"
  },
  {
    "size" : "40x40",
    "idiom" : "ipad",
    "filename" : "logo40-2.jpg",
    "unassigned" : true,
    "scale" : "1x"
  },
  {
    "size" : "40x40",
    "idiom" : "ipad",
    "filename" : "logo80-1.jpg",
    "unassigned" : true,
    "scale" : "2x"
  },
  {
    "size" : "76x76",
    "idiom" : "ipad",
    "filename" : "logo76.jpg",
    "unassigned" : true,
    "scale" : "1x"
  },
  {
    "size" : "76x76",
    "idiom" : "ipad",
    "filename" : "logo152.jpg",
    "unassigned" : true,
    "scale" : "2x"
  },
  {
    "size" : "83.5x83.5",
    "idiom" : "ipad",
    "filename" : "logo167.jpg",
    "unassigned" : true,
    "scale" : "2x"
  },
  {
    "size" : "1024x1024",
    "idiom" : "ios-marketing",
    "filename" : "logo1024.jpg",
    "unassigned" : true,
    "scale" : "1x"
  }
]';

$androidImages = [
  [
    'filedir'=> 'hdpi',
    'size'=> '72x72'
  ],
  [
    'filedir'=> 'mdpi',
    'size'=> '48x48'
  ],
  [
    'filedir'=> 'xhdpi',
    'size'=> '96x96'
  ],
  [
    'filedir'=> 'xxhdpi',
    'size'=> '144x144'
  ],
  [
    'filedir'=> 'xxxhdpi',
    'size'=> '192x192'
  ]
];

iosChange("GC.jpg", $iosImages);
androidChange("GC.jpg", $androidImages);


function androidChange($logo_dir, $androidImages)
{
  $kzm = explode('.', $logo_dir)[count(explode('.', $logo_dir)) - 1];
  $icon_path = 'res';
  foreach($androidImages as $value) {
    list($h, $w) = explode('x', $value['size']);
    $save_dir = './' . $icon_path . '/mipmap-' . $value['filedir'];
    if (!file_exists($save_dir)){
      mkdir($save_dir,0777,true);
      echo "创建文件夹[$save_dir]成功";
    }
    change($logo_dir, $save_dir, $w, $h, true);
  }
}


/// 苹果
function iosChange($logo_dir, $iosImages)
{
  $json = [];
  $kzm = explode('.', $logo_dir)[count(explode('.', $logo_dir)) - 1];
    $iosImages = json_decode($iosImages, true);
  $icon_path = 'AppIcon.appiconset';
  
  $save_dir = './' . $icon_path;
  if (!file_exists($save_dir)){
    mkdir($save_dir,0777,true);
    echo "创建文件夹[$save_dir]成功";
  }
  foreach($iosImages as $key => $value) {
    list($h, $w) = explode('x', $value['size']);
    list($scale) = explode('x', $value['scale']);

    $h = $h * $scale;
    $w = $w * $scale;

    var_dump($save_dir . '/logo' . $h . 'x' . $w . '.' . $kzm);
    if(file_exists($save_dir . '/logo' . $h . 'x' . $w . '.' . $kzm)) {
      echo('已存在文件');
    } else {
      change($logo_dir, $save_dir, $w, $h);
    }
    $iosImages[$key]['filename'] = 'logo' . $h . 'x' . $w . '.' . $kzm;
    
  }
  $json = ["images" => $iosImages, "info" => [
    "version" => 1,
    "author" => "xcode"
  ]];
  /// 生成json
  file_put_contents( $save_dir . '/Contents.json', json_encode($json,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));
}



function change($file, $dir, $n_w = 120, $n_h = 120, $isAndroid = false)
{
    /// 后缀名
    $kzm = explode('.', $file)[count(explode('.', $file)) - 1];
    if (!is_dir($file)) { //文件夹过滤
        // print_r($file);
        $filename=$file;
        list($width, $height)=getimagesize($filename);
        $new=imagecreatetruecolor($n_w, $n_h);

        $img=imagecreatefromjpeg($filename);

        //拷贝部分图像并调整
        imagecopyresampled($new, $img,0, 0,0, 0,$n_w, $n_h, $width, $height);
        //图像输出新图片、另存为
        if (!file_exists($dir)){
          mkdir ($dir,0777,true);
          echo "创建文件夹[$dir]成功";
        }
        if ($isAndroid) {
          imagejpeg($new, $dir . '/ic_launcher.' . $kzm);
        } else {
          imagejpeg($new, $dir . '/logo' . $n_h . 'x' . $n_w . '.' . $kzm);
        }
        imagedestroy($new);
        imagedestroy($img);
    }
}


function deldir($path){
  //如果是目录则继续
  if(is_dir($path)){
   //扫描一个文件夹内的所有文件夹和文件并返回数组
  $p = scandir($path);
  foreach($p as $val){
   //排除目录中的.和..
   if($val !="." && $val !=".."){
    //如果是目录则递归子目录，继续操作
    if(is_dir($path.$val)){
     //子目录中操作删除文件夹和文件
     deldir($path.$val.'/');
     //目录清空后删除空文件夹
     @rmdir($path.$val.'/');
    }else{
     //如果是文件直接删除
     unlink($path.$val);
    }
   }
  }
 }
 }
 
?>