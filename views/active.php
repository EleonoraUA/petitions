<script type="text/javascript" src="/petitions/views/js/script.js"></script>
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
		 	if ($count[$appeal['id']] == NULL) echo 0;
		 	echo "<b>".$count[$appeal['id']]."</b><br/>";
		 	if (!$confirmed) {
		 	?>
		 	Лишилося днів:
		 	<?php 
		 	} else {
		 		?>
		 		<a href="/petitions/admin/notConfirmed/?answer=<?php echo $appeal['id']; ?>"> Відповісти</a> 
		 		<?php
		 	}
		 	echo "<b>".$days_left[$appeal['id']]."</b>";
		 	?>
		 	<?php if(!empty($_SESSION)) { 
		 		if(!$_SESSION['admin']) {
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

