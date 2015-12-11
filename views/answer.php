
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
	<tr>
	<td>
	Відповідь: 
	</td>
	<td name='text' colspan='4'>
		 <?php echo $answer[$appeal['id']];?> 
	</td>
	</tr>
	 <?php
	}
?>
</table>
<script type="text/javascript" src="/petitions/views/js/script.js"></script>

