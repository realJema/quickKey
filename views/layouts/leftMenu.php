<?php
	use yii\helpers\Html;
?>

<div class="leftMenu">
	<div class="">
		<div class="itemBlock">
			<div><?= Html::a('<span class="glyphicon glyphicon-pencil iconColor"></span> DASHBOARD', [''], ['class'=>'item']) ?></div>
			<div><?= Html::a('<span class="glyphicon glyphicon-plus iconColor"></span> COURSES', [''], ['class'=>'item']) ?></div>
			<div><?= Html::a('<span class="glyphicon glyphicon-education iconColor"></span> STUDENTS', [''], ['class'=>'item']) ?></div>
			<div><?= Html::a('<span class="glyphicon glyphicon-signal iconColor"></span> RECORDS', [''], ['class'=>'item']) ?></div>
		</div>
	</div>
</div>