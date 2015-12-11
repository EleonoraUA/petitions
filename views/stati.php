

<?php 
if (!empty($new)) { 
?>
<table class="active">
	<th> Номер </th>
	<th> Тема </th>
	<th> Текст </th>
	<th> Дата надсилання петиції</th>
	<th> Дата відповіді</th>

<?php
	foreach($new as $appeal) {
?>
	<tr>
		 <td name='title'>
		 <?php echo $appeal['id']; ?> 
		 </td>
		 <td name='title'>
		 <?php echo $appeal['topic']; ?> 
		 </td>
		 <td name='title'>
		 <?php echo $appeal['text']; ?> 
		 </td>
		 <td name='title'>
		 <?php echo $appeal['pet_date']; ?> 
		 </td>
		  <td name='title'>
		 	<?php  echo $appeal['date']; ?>
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