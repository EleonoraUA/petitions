<table name='new'>
	<th> Ім'я </th>
	<th> Тема </th>
	<th> Причина </th>
	<th> Дата </th>
	<th> Текст </th>
	<th> Контроль </th>

<?php
	foreach($new as $appeal) {
?>
	<tr>
		 <td>
		 <?php echo $appeal['first_name']." ".$appeal['last_name']; ?> 
		 </td>
		 <td>
		 <?php echo $appeal['topic']; ?> 
		 </td>
		 <td>
		 <?php echo $appeal['benefit']; ?> 
		 </td>
		 <td>
		 <?php echo $appeal['date']; ?> 
		 </td>
		 <td name='text'>
		 <?php echo $appeal['text'];?> 
		 </td>
		 <td>
		 	<a href="/petitions/admin/new/?publ=<?php echo $appeal['id']; ?>"> Опублікувати </a>
		 	<a href="/petitions/admin/new/?del=<?php echo $appeal['id']; ?>"> Видалити </a>
		 </td>
	</tr>
	 <?php
	}
?>
</table>

