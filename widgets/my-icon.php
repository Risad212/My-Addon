<?php

class My_Icon extends \Elementor\Widget_Base {

   public function get_name(): string {
       return 'my_icon';
    }

    public function get_title(): string {
        return esc_html__('My Icon', 'my-addon');
    }

    public function get_icon(): string {
        return 'eicon-favorite';
    }
    
     public function get_categories(): array {
        return [ 'basic' ];
     }

	 // register control 
	 protected function register_controls(): void {
		$this->start_controls_section(
			'my_icon_section',
			[
				'label' => esc_html__( 'My Section Icon', 'my-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// control section start
		$this->add_control(
			'my_icon',
			[
				'label' => esc_html__( 'My Icon', 'my-addon' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'fa-solid',
				],
				'recommended' => [
					'fa-solid' => [
						'circle',
						'dot-circle',
						'square-full',
					],
					'fa-regular' => [
						'circle',
						'dot-circle',
						'square-full',
					],
				],
			]
		);

		$this->add_control(
			'my_icon_link',
			[
				'label' => esc_html__( 'My Icon Link', 'my-addon' ),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);

		$this->end_controls_section();

		// start style tab section
		
		$this->start_controls_section(
			'my_style_section',
			[
				'label' => esc_html__( 'My Icon', 'my-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'my_icon_align',
			[
				'label' => esc_html__( 'My Icon Alignment', 'my-addon' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'my-addon' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'my-addon' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'my-addon' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .my-icon-wrap' => 'text-align: {{VALUE}};',
				],
			]
		);

		// normal tab 
		$this->start_controls_tabs(
			'style_tabs'
		);
		
		$this->start_controls_tab(
			'my_icon_style_tab',
			[
				'label' => esc_html__( 'Normal', 'my-addon' ),
			]
		);

		$this->add_control(
			'my_icon_color',
			[
				'label' => esc_html__( 'My Icon Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .my-icon svg' => 'fill: {{VALUE}}',
				],
			]
		);
		
		$this->end_controls_tab();

		$this->start_controls_tab(
			'my_icon_style_hover',
			[
				'label' => esc_html__( 'hover', 'my-addon' ),
			]
		);

		$this->add_control(
			'my_icon_color_hover',
			[
				'label' => esc_html__( 'My Icon Color Hover', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .my-icon:hover svg' => 'fill: {{VALUE}}',
				],
			]
		);
		
		$this->end_controls_tab();

		$this->end_controls_tabs();
		
		$this->add_control(
			'my_size',
			[
				'label' => esc_html__( 'My Size', 'my-addon' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .my-icon svg' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'my_icon_rotate',
			[
				'label' => esc_html__( 'My Rotate Icon (deg)', 'my-addon' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'deg' ],
				'range' => [
					'deg' => [
						'min' => 0,
						'max' => 360,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'deg',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .my-icon' => 'transform: rotate({{SIZE}}{{UNIT}});',
				],
			]
		);


		$this->end_controls_section();
	 }

    protected function render(): void {
		$settings = $this->get_settings_for_display();

		// var_dump($settings['my_icon']);

		if( empty( $settings['my_icon'] ) ){
			return;
		}

		if ( ! empty( $settings['my_icon_link']['url'] ) ) {
			$this->add_link_attributes( 'my_icon_link', $settings['my_icon_link'] );
		}
		?>
		<div class="my-icon-wrap">
			<a style="display: inline-block" class="my-icon" <?php $this->print_render_attribute_string( 'my_icon_link' ); ?>>
			<?php \Elementor\Icons_Manager::render_icon( $settings['my_icon'], [ 'aria-hidden' => 'true' ] ); ?>
			</a>
		</div>
		<?php
	}

}