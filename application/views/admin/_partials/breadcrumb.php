<!-- Breadcrumbs-->
<ol class="breadcrumb">
<?php 
	$stat = 1;
	foreach ($this->uri->segments as $segment): ?>
	<?php 
		$url = substr($this->uri->uri_string, 0, strpos($this->uri->uri_string, $segment)) . $segment;
		$is_active =  $url == $this->uri->uri_string;
	?>


	<li class="breadcrumb-item <?php echo $is_active ? 'active': '' ?>">
		<?php if($is_active): ?>
			<?php echo ucfirst($segment) ?>
		<?php else: ?>
			<?php 
				if ($segment == 'cycle_detail') {
					$stat = 0;

					$befDetail = 'C'.$this->uri->segment(4);
				?>
					<a href="<?php echo base_url($this->uri->segment(1).'/'.$this->uri->segment(2).'/c'.$this->uri->segment(4)) ?>"><?php echo ucfirst($befDetail) ?></a></li>
					<li class="breadcrumb-item <?php echo $is_active ? 'active': '' ?>">
				<?php
					echo ucfirst($segment);
				} else if ($segment == 'edit_detail') {
					$stat = 0;
					
					$befDetail = 'C'.$this->uri->segment(4);
					?>
					<a href="<?php echo base_url($this->uri->segment(1).'/'.$this->uri->segment(2).'/c'.$this->uri->segment(4)) ?>"><?php echo ucfirst($befDetail) ?></a></li>
					<li class="breadcrumb-item <?php echo $is_active ? 'active': '' ?>">
					<a href="<?php echo base_url($this->uri->segment(1).'/'.$this->uri->segment(2).'/cycle_detail/'.$this->uri->segment(4).'/'.$this->uri->segment(5)) ?>"><?php echo ucfirst('Cycle_detail') ?></a></li>
					<li class="breadcrumb-item <?php echo $is_active ? 'active': '' ?>">
				<?php
					echo ucfirst($segment);
				} else if ($stat == 0) {
					echo ucfirst($segment);
				} else if ($segment == 'cycle') {
					echo ucfirst($segment);
				} else {
			?>
					<a href="<?php echo site_url($url) ?>"><?php echo ucfirst($segment) ?></a>
			<?php 
				}
			?>
		<?php endif; ?>
	</li>
<?php endforeach; ?>
</ol>
