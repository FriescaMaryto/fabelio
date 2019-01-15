<?php
 include_once('config.php');
 $koneksi= koneksi_db();

 function crawling(){
	 $main_url="https://fabelio.com";
	 $str = file_get_contents($main_url);

	 // Gets Webpage Title
	 if(strlen($str)>0)
	 {
	  $str = trim(preg_replace('/\s+/', ' ', $str)); // supports line breaks inside <title>
	  preg_match("/\<title\>(.*)\<\/title\>/i",$str,$title); // ignore case
	  $title=$title[1];
	 }

	 // Gets Webpage Description
	 $b =$main_url;
	 @$url = parse_url( $b );
	 @$tags = get_meta_tags($url['scheme'].'://'.$url['host'] );
	 $description=$tags['description'];

	 // Gets Webpage Internal Links
	 $doc = new DOMDocument;
	 @$doc->loadHTML($str);

	 $items = $doc->getElementsByTagName('a');
	 foreach($items as $value)
	 {
	  $attrs = $value->attributes;
	  $sec_url[]=$attrs->getNamedItem('href')->nodeValue;
	 }
	 $all_links=implode(",",$sec_url);

	 $query="insert into crawl (link, title, description, internal_link) values('$main_url','$title','$description','$all_links')" or die(mysql_error());
	 $action = mysql_query($query, $koneksi);
 }
?>
