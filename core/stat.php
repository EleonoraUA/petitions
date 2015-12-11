
<?php 
$popular_q = "SELECT petition.id, petition.text, petition.topic, petition.date, petition.state, COUNT(*) AS count, users.first_name, users.last_name FROM petition JOIN users ON petition.author_id = users.id INNER JOIN signatures ON signatures.petition_id = petition.id WHERE petition.petition_state = 'active' GROUP BY signatures.petition_id ORDER BY count DESC LIMIT 3";
$mysql = mysql_query($popular_q);
		while ($arr = mysql_fetch_assoc($mysql)) {
			$row[] = $arr;
}

include_once("/views/theBest.php");
if(!empty($_POST['days'])) {

	$statistic = "SELECT petition.id, topic, petition.date AS 'pet_date', answer.date, answer.text FROM petition INNER JOIN answer ON petition.id = answer.petition_id WHERE DATEDIFF(answer.date, petition.date) > '".$_POST['days']."'";
	$mysql = mysql_query($statistic);
		while ($arr = mysql_fetch_assoc($mysql)) {
			$new[] = $arr;
		}
	include_once("/views/stati.php");
	unset($_POST);
} else {
?>
<div class="form_div">
<form id="form_login" method="post" action="">
<label>Для відображення петицій, на які не дана відповідь більше, ніж кількість днів: <input type="text" placeholder="Введіть кількіть днів" name="days"></label><input type="submit">
</form>
</div> 

<?php
}
?>

<style>
.form_div input, .form_div textarea {
  width: 100%;
  background: #fff;
  margin-bottom: 4%;
  border: 1px solid #ccc;
  padding: 3%;
  color: #555;
  font: 95% Arial, Helvetica, sans-serif;
   
}

.form_div input[type='submit'] {
  width: 40%;
  padding: 3%;
  background: #4A708B;
  border-bottom: 3px solid #01234D;
  border-top-style: none;
  border-right-style: none;
  border-left-style: none;    
  color: #fff;
}

.form_div input[type='submit']:hover {
  background: #01234D;
}

.form_div input:focus, .form_div textarea:focus {
  box-shadow: 0 0 5px #01234D;
  padding: 3%;
  border: 1px solid #43D1AF;
}
.form_div {
	margin-left: 40%;
	font-family: times new roman;
	font-size: 15px;
	position: absolute;
}
</style>