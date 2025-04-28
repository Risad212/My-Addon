<?php

Class My_Image extends \Elementor\Widget_Base{

    public function get_name(): string {
		return 'my_image';
	}

	public function get_title(): string {
		return esc_html__( 'My Image', 'my-addon' );
	}

	public function get_icon(): string {
		return 'eicon-image';
	}

	public function get_categories(): array {
		return [ 'basic' ];
	}


    // -------- register controls -------------
    protected function register_controls(): void {
   
    // control section
    $this->start_controls_section(
        'my_image_section',
        [
            'label' => esc_html__( 'My Image Secion', 'my-addon' ),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
    );

    $this->add_control(
        'my_image',
        [
            'label' => esc_html__( 'Choose Image', 'my-addon' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
                'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
        ]
    );

    $this->end_controls_section();

    // style image section
    $this->start_controls_section(
        'my_image_style_section',
        [
            'label' => esc_html__( 'My Image Style Secion', 'my-addon' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );
    
     
    $this->add_control(
        'my_image_align',
        [
            'label' => esc_html__( 'Alignment', 'my-addon' ),
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
            'default' => 'left',
            'toggle' => true,
            'selectors' => [
                '{{WRAPPER}} .my-image-class' => 'text-align: {{VALUE}};',
            ],
        ]
    );



    $this->add_control(
        'my_image_width',
        [
            'label' => esc_html__( 'My Image Width', 'my-addon' ),
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
                'unit' => '%',
                'size' => 100,
            ],
            'selectors' => [
                '{{WRAPPER}} .my-image-class img' => 'width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );


    $this->add_control(
        'my_max_width',
        [
            'label' => esc_html__( 'My Max Width', 'my-addon' ),
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
                'unit' => '%',
                'size' => 100,
            ],
            'selectors' => [
                '{{WRAPPER}} .my-image-class img' => 'max-width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'my_height',
        [
            'label' => esc_html__( 'Height', 'my-addon' ),
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
                'size' => 1000,
            ],
            'selectors' => [
                '{{WRAPPER}} .my-image-class img' => 'height: {{SIZE}}{{UNIT}};',
            ],
        ]
    );


    $this->start_controls_tabs(
        'style_tabs'
    );
    
    $this->start_controls_tab(
        'style_normal_tab',
        [
            'label' => esc_html__( 'Normal', 'my-addon' ),
        ]
    );
    
    $this->add_control(
        'my_image_opacity',
        [
            'label' => esc_html__( 'Opacity', 'my-addon' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'range' => [
                '' => [ // No unit needed for opacity
                    'min' => 0,
                    'max' => 1,
                    'step' => 0.1,
                ],
            ],
            'default' => [
                'unit' => '',
                'size' => 1, // Fully visible
            ],
            'selectors' => [
                '{{WRAPPER}} .my-image-class img' => 'opacity: {{SIZE}};',
            ],
        ]
    );

    $this->end_controls_tab();

    // hover control tab
    $this->start_controls_tab(
        'style_normal_tab_hover',
        [
            'label' => esc_html__( 'Hover', 'my-addon' ),
        ]
    );
    
    $this->add_control(
        'my_image_opacity_hover',
        [
            'label' => esc_html__( 'Opacity', 'my-addon' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'range' => [
                '' => [ // No unit needed for opacity
                    'min' => 0,
                    'max' => 1,
                    'step' => 0.1,
                ],
            ],
            'default' => [
                'unit' => '',
                'size' => 1, // Fully visible
            ],
            'selectors' => [
                '{{WRAPPER}} .my-image-class img:hover' => 'opacity: {{SIZE}};',
            ],
        ]
    );

    $this->end_controls_tab();
    // end control tabs
    $this->end_controls_tabs();

    // border control add
    $this->add_control(
        'my_image_border_type',
        [
            'label' => esc_html__( 'My Border Type', 'my-addon' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'none',
            'options' => [
                '' => esc_html__( 'Default', 'my-addon' ),
                'none' => esc_html__( 'None', 'my-addon' ),
                'solid'  => esc_html__( 'Solid', 'my-addon' ),
                'dashed' => esc_html__( 'Dashed', 'my-addon' ),
                'dotted' => esc_html__( 'Dotted', 'my-addon' ),
                'double' => esc_html__( 'Double', 'my-addon' ),
            ],
            'selectors' => [
                '{{WRAPPER}} .my-image-class img' => 'border-style: {{VALUE}};',
            ],
        ]
    );

    $this->add_control(
        'my_image_border_width',
        [
            'label' => esc_html__( 'My Border Width', 'my-addon' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
            'selectors' => [
                '{{WRAPPER}} .my-image-class img' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );


    $this->add_control(
        'my_image_border_color',
        [
            'label' => esc_html__( 'My Border Color', 'textdomain' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .my-image-class img' => 'border-color: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'my_image_border_radius',
        [
            'label' => esc_html__( 'My Border Radius', 'my-addon' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
            'selectors' => [
                '{{WRAPPER}} .my-image-class img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    
    $this->end_controls_section();
    // control end secion
    $this->end_controls_section();

    }    

    //---------- render part -------------
    protected function render(): void {
		$settings = $this->get_settings_for_display();
        
        // var_dump($settings['my_image_border_width']);
		if ( empty( $settings['my_image']['url'] ) ) {
			return;
		}
		echo '<div class="my-image-class"><img src="' . $settings['my_image']['url'] . '"></div>';
	}

}