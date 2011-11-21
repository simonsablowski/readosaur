<? $this->displayView('components/header.php'); ?>
				<div id="body">
					<h2>
						<? echo sprintf('%s %s', $this->localize(ucfirst($mode)), $this->localize(strtolower($ObjectName))); ?>

					</h2>
					<form action="<? echo $this->link($ObjectName . '/' . ($mode != 'update' ? $mode : sprintf('%s/%s', $mode, implode('/', $Object->getPrimaryKeyValue())))); ?>" method="post">
						<fieldset class="fieldset">
							<dl>
<? foreach ($Fields as $n => $Field): ?>
								<dt>
									<? echo $this->localize($Field->getLabel()); ?>

								</dt>
								<dd>
<? if ($Field instanceof TextField && (is_null($Field->getLength()) || $Field->getLength() > 255)): ?>
									<textarea name="<? echo $Field->getName(); ?>"><? echo ($value = $this->getRequest()->getData($Field->getName())) ? $value : ($mode == 'update' && isset($Object) ? $Object->getData($Field->getName()) : ''); ?></textarea>
<? elseif ($Field instanceof OptionsField): ?>
<? if (count($Field->getOptions()) > 2): ?>
									<select name="<? echo $Field->getName(); ?>">
<? foreach ($Field->getOptions() as $m => $Option): ?>
										<option value="<? echo $Option->getName(); ?>"<? echo $this->getRequest()->getData($Field->getName()) == $Option->getName() || ($mode == 'update' && isset($Object) && $Object->getData($Field->getName()) == $Option->getName()) ? ' selected="selected"' : ''; ?>><? echo $this->localize($Option->getLabel()); ?></option>
<? endforeach; ?>
									</select>
<? else: ?>
									<div class="options">
<? foreach ($Field->getOptions() as $m => $Option): ?>
										<div class="option">
											<input id="<? echo ($id = $Field->getName() . $Option->getName()); ?>" class="radio" type="radio" name="<? echo $Field->getName(); ?>" value="<? echo $Option->getName(); ?>"<? echo $this->getRequest()->getData($Field->getName()) == $Option->getName() || ($mode == 'update' && isset($Object) && $Object->getData($Field->getName()) == $Option->getName()) || $Option->isDefault() ? ' checked="checked"' : ''; ?>/>
											<label for="<? echo $id; ?>">
												<? echo $this->localize($Option->getLabel()); ?>

											</label>
										</div>
<? endforeach; ?>
									</div>
<? endif; ?>
<? elseif ($Field instanceof ObjectField): ?>
									<select name="<? echo $Field->getName(); ?>">
										<option value=""></option>
<? $modelName = $Field->getModelName(); $primaryKey = $Field->getPrimaryKey(); $titleField = $Field->getTitleField(); foreach ($modelName::findAll() as $LoadedObject): ?>
										<option value="<? echo $LoadedObject->getData($primaryKey); ?>"<? echo $this->getRequest()->getData($Field->getName()) == $LoadedObject->getData($primaryKey) || ($mode == 'update' && isset($Object) && $Object->getData($Field->getName()) == $LoadedObject->getData($primaryKey)) ? ' selected="selected"' : ''; ?>><? echo $LoadedObject->getData($titleField); ?></option>
<? endforeach; ?>
									</select>
<? elseif ($Field instanceof JsonEncodedField): ?>
									<textarea name="<? echo $Field->getName(); ?>"><? echo ($value = $this->getRequest()->getData($Field->getName())) ? $value : ($mode == 'update' && isset($Object) ? $Object->getData($Field->getName()) : ''); ?></textarea>
<? else: ?>
									<input type="text" name="<? echo $Field->getName(); ?>" value="<? echo ($value = $this->getRequest()->getData($Field->getName())) ? $value : ($mode == 'update' && isset($Object) ? $Object->getData($Field->getName()) : ''); ?>"/>
<? endif; ?>
								</dd>
<? endforeach; ?>
							</dl>
							<p>
								<a class="close" href="#" title="<? echo $this->localize('Cancel'); ?>"><? echo $this->localize('Cancel'); ?></a>
								<input class="submit" type="submit" name="submit" value="<? echo $this->localize('Submit'); ?>"/>
							</p>
						</fieldset>
					</form>
				</div>
<? $this->displayView('components/footer.php'); ?>