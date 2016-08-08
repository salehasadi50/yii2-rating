<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use elephantsGroup\news\models\News;
use elephantsGroup\news\models\NewsCategory;
use hoomanMirghasemi\jdf\Jdf;
use dektrium\user\models\User;
use elephantsGroup\news\models\NewsCategoryTranslation;

/* @var $this yii\web\View */
/* @var $model app\models\News */

$lang = Yii::$app->language;
$this->title = Yii::t('news', 'News id') . ' ' . $model->id;
$translation = $model->newsTranslationByLang;
if($translation && $translation->title)
	$this->title = $translation->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('news', 'News'), 'url' => ['index', 'lang'=>Yii::$app->controller->language]];
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- ============================================================= SECTION – BLOG POST ============================================================= -->	
<section id="blog-post" class="light-bg">
	<div class="container inner-top-sm inner-bottom classic-blog no-sidebar">
		<div class="row">
			<div class="col-md-9 center-block">
					
				<div class="post">
				
					<div class="post-content">
						<div class="post-media">
							<figure>
								<img src=" <?= yii\helpers\Url::to(Yii::getAlias('@web') . '/uploads/news/images/thumb/' . $model->thumb) ?>" alt="">
							</figure>
						</div>
						
						<p class="subtitle">
							<?php
								echo ($model->newsTranslationByLang ?
								$model->newsTranslationByLang->subtitle :
								'');
							?>
						</p> 
						
						<h1 class="post-title"><?= Html::encode($this->title) ?></h1>
						
						<ul class="post-details">
							<li class="date">
							<?php
								if ($lang=='fa')
									echo Jdf::jdate('d F Y - H:i', (new \DateTime($model->creation_time))->getTimestamp(), '', 'Asia/Tehran', 'fa');
								else
									echo date('M d, Y', strtotime($model->creation_time));
								
							?>
							</li>
							<li class="categories">
							<a href="#">
							<?php
							$cat = NewsCategory::findOne($model->category_id);
							echo ($cat->newsCategoryTranslationByLang ?
							$cat->newsCategoryTranslationByLang->title :
							$cat->name);
							?>
							</a>
							</li>
							<?php /* echo "<li class='views'>$model->views</li>"; */ ?>
							
						</ul><!-- /.post-details -->
						<div class="clearfix"></div>
						
						<?php
						echo ($model->newsTranslationByLang ?
						$model->newsTranslationByLang->description :
						'');
						?>
						
					</div><!-- /.post-content -->
					
				</div><!-- /.post -->
				
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</section>

<!-- ============================================================= SECTION – BLOG POST : END ============================================================= -->
