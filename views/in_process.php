

<?php 
if (!empty($new)) { 
?>
<table class="active">
	<th> Ім'я </th>
	<th> Тема </th>
	<th> Причина </th>
	<th> Дата </th>
	<th>  </th>

<?php
	foreach($new as $appeal) {
?>
	<tr>
		 <td name='title'>
		 <?php echo $appeal['first_name']." ".$appeal['last_name']; ?> 
		 </td>
		 <td name='title'>
		 <?php echo $appeal['topic']; ?> 
		 </td>
		 <td name='title'>
		 <?php echo $appeal['benefit']; ?> 
		 </td>
		 <td name='title'>
		 <?php echo $appeal['date']; ?> 
		 </td>
		  <td name='title'>
		 	Підписів:
		 	<?php 
		 	echo "<b>".$count[$appeal['id']]."</b><br/>";
		 	?>
		 	Лишилося днів:
		 	<?php 
		 	echo "<b>".$days_left[$appeal['id']]."</b>";
		 	?>
		 	<?php if(!empty($_SESSION)) { 
		 		if ($state) {
		 		if(!in_array($appeal['id'], $sP)) {?>
		 	<a href="/petitions/main/active/?sign=<?php echo $appeal['id']; ?>"> Підписатися! </a>
		    <?php 
				} else {
					echo "<br/>Ви вже підписалися під цією петицією";
				} }

		    } ?>
		 </td>

	</tr>
	<tr>
	<td name='text' colspan='5'>
		 <p> Показати/сховати текст</p>
	<span>
		 <?php echo $appeal['text'];?> 
		 </span> 
		 </td>
	</tr>
	 <?php
	}
?>
</table>
<?php 
} else echo "<h2>"."Наразі петицій на розгляді немає"."</h2>"."<br>"."Авторизуйтеся, щоб підтримати петиції!"; 
?>
<script type="text/javascript" src="/petitions/views/js/script.js"></script>