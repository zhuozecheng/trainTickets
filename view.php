<?php
/* View */
class View
	{
		var $Model;
		var $Controller;
		function __construct($model,$controller)
			{
				$this->Model=$model;	
				$this->Controller=$controller;
			}

		public function refreshTitle($NewTitle)
			{
				echo("<script>document.title='".$this->Controller->changeTitle($NewTitle)."';</script>");
			}
		public function getPage($page)
			{

				switch ($page) {
					case 'news':
						
echo "<div class='container'>";
if(isset($_GET["n"]))
	{
		$news=mysql_fetch_row(mysql_query("SELECT * FROM news WHERE id='$_GET[n]'"));
		echo("
			<h3>$news[1]</h3>
			Data: $news[4]<hr width='80%'>
			<p>$news[3]</p>
			");
	}
else
{
$news=mysql_query("SELECT * FROM news");
$n=mysql_fetch_array($news);

do
	{	
		echo '<div class="bs-callout bs-callout-info news">';
		echo "<div class='col-md-offset-1 col-md-10'><a href='news.php?n=$n[0]'><h4>$n[1]</h4></a>Data $n[4]<p>$n[2]</p></div></div>";
	}while($n=mysql_fetch_array($news));	
}
echo "</div>";

						break;
					case 'regulament': include "regulament.txt";break;
					case 'add_1' : $this->Controller->GenerateNewBlock("add_1");break;
			}
	}
}
?>