<?php $planets =
	[ 
		[ 
			'title' => 'خدمات سئو',
			'link' => '#',
			'class' => 'red'
		],
		[ 
			'title' => 'طراحی وبسایت شخصی',
			'link' => '#',
			'class' => 'yellow'
		],
		[ 
			'title' => 'همه خدمات',
			'link' => '#',
			'class' => 'cyan'
		]
	]
	?>

<section class="multi-planet">
	<?php foreach ( $planets as $index => $planet ) : ?>
		<div <?php printf( 'class="planet-con planet-%s"', $planet['class'] ); ?>>
			<div class="planet">

			</div>
			<div class="cta">
				<a href=<?= $planet['link'] ?>>
					<?= $planet['title'] ?>
				</a>
			</div>
		</div>
	<?php endforeach; ?>

	<div class="scroll-down cursor-pointer">
		اسکرول کنید
	</div>
</section>