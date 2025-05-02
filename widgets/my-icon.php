<?php

use Elementor\Controls_Manager;

defined( 'ABSPATH' ) || die();


class My_Icon extends \Elementor\Widget_Base {

   
   /**
	* Retrive the widget name
	*
	* @since 1.0.0
	*
	* @access public
	*
	* @return string
    */
   public function get_name(): string {
       return 'my_icon';
    }

	/**
	* Retrive the widget title
	*
	* @since 1.0.0
	*
	* @access public
	*
	* @return string
    */
    public function get_title(): string {
           return __('My Icon', 'my-addon');
    }

	/**
	* Retrive the widget icon
	*
	* @since 1.0.0
	*
	* @access public
	*
	* @return string
    */
    public function get_icon(): string {
           return 'eicon-favorite';
    }
    
	/**
	* Retrive the list of cetegories the widget belong to 
	*
	* @since 1.0.0
	*
	* @access public
	*
	* @return array
    */
     public function get_categories(): array {
            return [ 'basic' ];
     }


	/**
	*  Register the widget controls
	* 
	* Add diffrent type of input for allow user to control widget setting
	*
	* @since 1.0.0
	*
	* @access public
    */
	 protected function register_controls(): void {

		$this->start_controls_section(
			'my_icon_section',
			[
				'label' => __( 'My Section Icon', 'my-addon' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'my_icon',
			[
				'label'          => __( 'My Icon', 'my-addon' ),
				'type'           => Controls_Manager::ICONS,
				'default'        => [
					'value'      => 'fas fa-star',
					'library'    => 'fa-solid',
				],
				'recommended'    => [
					'fa-solid'   => [
						'circle',
						'dot-circle',
						'square-full',
					],
					'fa-regular' => [
						'circle',
						'dot-circle',
						'square-full'
					]
				]
			]
		);

		$this->add_control(
			'my_icon_link',
			[
				'label'       => __( 'Icon Link', 'my-addon' ),
				'type'        => Controls_Manager::URL,
				'label_block' => true
			]
		);

		$this->end_controls_section();

		
		$this->start_controls_section(
			'my_style_section',
			[
				'label' => __( 'My Icon', 'my-addon' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'my_icon_align',
			[
				'label'         => __( 'My Icon Alignment', 'my-addon' ),
				'type'          => Controls_Manager::CHOOSE,
				'options'       => [
					'left'      => [
						'title' => __( 'Left', 'my-addon' ),
						'icon'  => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'my-addon' ),
						'icon'  => 'eicon-text-align-center',
					],
					'right'     => [
						'title' => __( 'Right', 'my-addon' ),
						'icon'  => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .my-icon-wrap' => 'text-align: {{VALUE}};'
				]
			]
		);

		// normal tab 
		$this->start_controls_tabs(
			'style_tabs'
		);
		
		$this->start_controls_tab(
			'icon_style_tab',
			[
				'label' => __( 'Normal', 'my-addon' )
			]
		);

		$this->add_control(
			'my_icon_color',
			[
				'label'     => __( 'My Icon Color', 'textdomain' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .my-icon svg' => 'fill: {{VALUE}}'
				]
			]
		);
		
		$this->end_controls_tab();

		$this->start_controls_tab(
			'my_icon_style_hover',
			[
				'label' => __( 'hover', 'my-addon' ),
			]
		);

		$this->add_control(
			'my_icon_color_hover',
			[
				'label'     => __( 'Color Hover', 'textdomain' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .my-icon:hover svg' => 'fill: {{VALUE}}'
				]
			]
		);
		
		$this->end_controls_tab();

		$this->end_controls_tabs();
		
		$this->add_control(
			'my_size',
			[
				'label'        => __( 'My Size', 'my-addon' ),
				'type'         => Controls_Manager::SLIDER,
				'size_units'   => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range'        => [
					'px'       => [
						'min'  => 0,
						'max'  => 1000,
						'step' => 5,
					],
					'%' => [
						'min'  => 0,
						'max'  => 100,
					],
				],
				'default'      => [
					'unit'     => 'px',
					'size'     => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .my-icon svg' => 'width: {{SIZE}}{{UNIT}};'
				]
			]
		);

		$this->add_control(
			'my_icon_rotate',
			[
				'label'        => __( 'Rotate Icon (deg)', 'my-addon' ),
				'type'         => Controls_Manager::SLIDER,
				'size_units'   => [ 'deg' ],
				'range'        => [
					'deg'      => [
						'min'  => 0,
						'max'  => 360,
						'step' => 1,
					],
				],
				'default'      => [
					'unit'     => 'deg',
					'size'     => 0,
				],
				'selectors'    => [
					'{{WRAPPER}} .my-icon' => 'transform: rotate({{SIZE}}{{UNIT}});'
				]
			]
		);

		$this->end_controls_section();
	 }


	 /**
     * Render the Widget
     * 
     * Render icon widget output on the frontend
     * 
     * @since 1.0.0
     * 
     * @access protected
     */
    protected function render(): void {
		$settings = $this->get_settings_for_display();

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