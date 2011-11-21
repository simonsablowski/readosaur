<? $this->displayView('components/header.php'); ?>
				<div id="body">
					<div class="message">
<? $fields = array('Message'); if ($this->getApplication()->getConfiguration('debugMode')) $fields = array_merge($fields, array('Details', 'Trace')); ?>
<? foreach ($fields as $n => $field): ?>
						<div class="<? if ($n + 1 == count($fields)) echo 'last '; echo $n % 2 ? 'odd' : 'even'; ?>">
<? $getter = 'get' . $field; ?>
<? if ($field != 'Details' && $field != 'Trace'): ?>
							<? echo $this->localize($Error->$getter()); ?>
<? else: ?>
							<div class="highlight">
								<? var_dump($Error->$getter()); ?>
							</div>
<? endif; ?>

							<p>&nbsp;</p>
						</div>
<? endforeach; ?>
					</div>
				</div>
<? $this->displayView('components/footer.php'); ?>