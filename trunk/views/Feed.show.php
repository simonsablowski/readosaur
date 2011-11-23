<? $this->includeComponent('header.php'); ?>
				<div id="body">
					<h2>
						<? echo $Feed->getTitle(); ?>

					</h2>
					<ul class="items">
<? foreach ($Feed->getItems() as $n => $Item): ?>
						<li class="<? echo $n % 2 ? 'odd' : 'even'; ?> item">
							<h3 class="title expand">
								<? echo /*strlen($Item->getTitle()) <= 60 ? */$Item->getTitle()/* : substr($Item->getTitle(), 0, 60) . '...'*/; ?>

								<span class="date"><? echo date('M dS Y', $Item->getDate()); ?></span>
								<span class="time"><? echo date('H:i', $Item->getDate()); ?></span>
							</h3>
							<div class="expandable">
								<? echo $Item->getDescription(); ?>

								<p>
									<a href="<? echo $Item->getLink(); ?>" title="<? echo $this->localize('View source'); ?>"><? echo $this->localize('View source'); ?></a>
								</p>
							</div>
						</li>
<? endforeach; ?>
					</ul>
				</div>
<? $this->includeComponent('footer.php'); ?>