

<?php 
if (!empty($row)) { 
?>
<h2> ТОП-3 петиції</h2>
<table class="active">
	<th> Дата </th>
	<th> Тема </th>
	<th> Автор </th>
	<th> Текст</th>
	<th> Кількість підписів</th>

<?php
	foreach($row as $appeal) {
?>
	<tr>
		 <td name='title'>
		 <?php echo $appeal['date']; ?> 
		 </td>
		 <td name='title'>
		 <?php echo $appeal['topic']; ?> 
		 </td>
		 <td name='title'>
		 <?php echo $appeal['first_name']." ".$appeal['last_name']; ?> 
		 </td>
		 <td name='title'>
		 <?php echo $appeal['text']; ?> 
		 </td>
		 <td name='title'>
		 <?php  echo $appeal['count']; ?>
		 </td>

	</tr>
	 <?php
	}
?>
</table>
<hr>
<?php 
} 
?>
<script type="text/javascript" src="/petitions/views/js/script.js"></script>