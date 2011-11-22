<? $bp = $this->getApplication()->getConfiguration('baseUrl'); ?>
			<div id="sidebar">
				<div id="logo">
					<a href="<? echo $bp; ?>" title="<? echo $this->localize('readosaur'); ?>"><img src="<? echo $bp; ?>web/img/logo.png" alt="<? echo $this->localize('readosaur'); ?>" title="<? echo $this->localize('readosaur'); ?>"/></a>
				</div>
				<ul id="controls">
<? if (isset($User)): ?>
					<li class="user">
						<span<? if ($User->isTemporary()): ?> title="<? echo $this->localize('Temporary user name &ndash; to create a user account, hit \'Sign in\'!'); ?>"<? endif; ?>><? echo $User->getName(); ?></span>
					</li>
<? endif; ?>
					<li class="control">
						<a class="popup" href="<? echo $bp; ?>add-feed" title="<? echo $this->localize('Add feed'); ?>"><? echo $this->localize('Add feed'); ?></a>
					</li>
<? if (isset($User)): ?>
					<li class="control">
<? if ($User->isTemporary()): ?>
						<a class="popup" href="<? echo $bp; ?>sign-in" title="<? echo $this->localize('Sign in'); ?>"><? echo $this->localize('Sign in'); ?></a>
<? else: ?>
						<a href="<? echo $bp; ?>sign-out" title="<? echo $this->localize('Sign out'); ?>"><? echo $this->localize('Sign out'); ?></a>
<? endif; ?>
					</li>
<? endif; ?>
				</ul>
<? if (isset($Feeds)): ?>
				<ul id="menu">
<? foreach ($Feeds as $AvailableFeed): $name = $AvailableFeed->getName(); $key = $AvailableFeed->getKey(); $icon = $AvailableFeed->getIcon(); ?>
					<li class="<? if (isset($Feed) && $Feed->getKey() == $key): ?>active <? endif; ?>item">
						<a href="<? echo $bp . $key; ?>" title="<? echo $name; ?>"><img src="<? if (!empty($icon)): echo $bp . 'Icon/show/' . $key; else: echo $bp . 'web/img/vendor.gif'; endif; ?>" alt="<? echo $name; ?>" title="<? echo $name; ?>"/><? echo $name; ?></a>
					</li>
<? endforeach; ?>
				</ul>
<? endif; ?>
			</div>
