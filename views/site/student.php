<?php
	use yii\helpers\Html;
    $this->title = 'Students';
?>

<div class="">
    <div class="row">
        <div class="col-md-3">
            <?= $this->renderFile('@app/views/layouts/leftMenu.php'); ?>
        </div>
        <div class="col-md-9">
    		<div class="category">Students</div>
			<div>
				<ul class="nav-justified options" style="padding-left: 0px">
					<li><div class="item panel panel-default"><?=Html::a(
							'<div class="itemBox leftItemBox">
								<div class="glyphicon glyphicon-plus iconColor"></div>
								<div class="itemName">New Student</div>
							</div>', [''])?>							
						</div>
					</li>
					<li><div class="item panel panel-default"><?=Html::a(
							'<div class="itemBox">
								<div class="glyphicon glyphicon-plus iconColor"></div>
								<div class="itemName">New Student</div>
							</div>', [''])?>							
						</div>
					</li>
					<li><div class="item panel panel-default"><?=Html::a(
							'<div class="itemBox">
								<div class="glyphicon glyphicon-plus iconColor"></div>
								<div class="itemName">New Student</div>
							</div>', [''])?>							
						</div>
					</li>					
					<li><div class="item panel panel-default"><?=Html::a(
							'<div class="itemBox rightItemBox">
								<div class="glyphicon glyphicon-plus iconColor"></div>
								<div class="itemName">New Student</div>
							</div>', [''])?>							
						</div>
					</li>
				</ul>
			</div>
        </div>
    </div>
</div>
