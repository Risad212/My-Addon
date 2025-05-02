<?php

use Elementor\Controls_Manager;
use Elementor\Utils;

defined( 'ABSPATH' ) || die();


Class My_Image extends \Elementor\Widget_Base{


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
		   return 'my_image';
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
		   return __( 'My Image', 'my-addon' );
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
		   return 'eicon-image';
	}

    /**
     * Retrive the list of categories the widget belon to
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
     * Register the widget controls
     * 
     * Add diffrent type of input for allow user to control widget setting
     * 
     * @since 1.0.0
     * 
     * @access public
     */
    protected function register_controls(): void {

        $this->start_controls_section(
            'image',
            [
                'label' => __( 'Image', 'my-addon' ),
                'tab'   =>   Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'my_image',
            [
                'label'   => __( 'Choose Image', 'my-addon' ),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ]
            ]
        );

    $this->end_controls_section();


    $this->start_controls_section(
        'style',
        [
            'label' => __( 'Style', 'my-addon' ),
            'tab'   =>   Controls_Manager::TAB_STYLE
        ]
     );
    
        $this->add_control(
            'alignment',
            [
                'label'         => __( 'Alignment', 'my-addon' ),
                'type'          =>   Controls_Manager::CHOOSE,
                'options'       => [
                    'left'      => [
                        'title' => __( 'Left', 'my-addon' ),
                        'icon'  => 'eicon-text-align-left',
                    ],
                    'center'    => [
                        'title' => __( 'Center', 'my-addon' ),
                        'icon'  => 'eicon-text-align-center',
                    ],
                    'right'     => [
                        'title' => __( 'Right', 'my-addon' ),
                        'icon'  => 'eicon-text-align-right'
                    ]
                ],
                'toggle'        => true,
                'selectors'     => [
                    '{{WRAPPER}} .my-image' => 'text-align: {{VALUE}};'
                ]
            ]
        );



        $this->add_control(
            'width',
            [
                'label'        => __( 'Width', 'my-addon' ),
                'type'         =>   Controls_Manager::SLIDER,
                'default'      => [
                    'unit'     => '%'
                ],
                'size_units'   => [ 'px', '%', 'em', 'rem', 'custom' ],
                'range'        => [
					'%'        => [
						'min'  => 1,
						'max'  => 100,
					],
					'px'       => [
						'min'  => 1,
						'max'  => 1000,
					],
					'vw'       => [
						'min'  => 1,
						'max'  => 100,
					],
				],
                'selectors'    => [
                    '{{WRAPPER}} .my-image img' => 'width: {{SIZE}}{{UNIT}};'
                ]
            ]
        );


        $this->add_control(
            'max_width',
            [
                'label'        => __( 'Max Width', 'my-addon' ),
                'type'         =>   Controls_Manager::SLIDER,
                'size_units'   => [ 'px', '%', 'em', 'rem', 'custom' ],
                'default'      => [
					'unit'     => '%',
				],
                'range'        => [
                    'px'       => [
                        'min'  => 1,
                        'max'  => 1000,
                    ],
                    '%' => [
                        'min'  => 1,
                        'max'  => 100,
                    ],
                    'vw' => [
                        'min'  => 1,
                        'max'  => 100,
                    ]
                ],
                'selectors'    => [
                    '{{WRAPPER}} .my-image img' => 'max-width: {{SIZE}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'height',
            [
                'label'        => __( 'Height', 'my-addon' ),
                'type'         =>   Controls_Manager::SLIDER,
                'size_units'   => [ 'px', '%', 'em', 'rem', 'custom' ],
                'range'        => [
                    'px'       => [
                        'min'  => 1,
                        'max'  => 500,
                    ],
                    '%' => [
                        'min'  => 1,
                        'max'  => 100,
                    ]
                ],
                'selectors'   => [
                    '{{WRAPPER}} .my-image img' => 'height: {{SIZE}}{{UNIT}};'
                ]
            ]
        );


    $this->start_controls_tabs('style_tabs');
    
        $this->start_controls_tab(
            'normal_tab',
            [
                'label' => __( 'Normal', 'my-addon' )
            ]
        );
        
        $this->add_control(
            'opacity',
            [
                'label'        => __( 'Opacity', 'my-addon' ),
                'type'         =>   Controls_Manager::SLIDER,
                'range'        => [
                    ''         => [ 
                        'min'  => 0,
                        'max'  => 1,
                        'step' => 0.1,
                    ],
                ],
                'default'      => [
                    'unit'     => '',
                    'size'     => 1
                ],
                'selectors'    => [
                    '{{WRAPPER}} .my-image img' => 'opacity: {{SIZE}};'
                ]
            ]
        );

    $this->end_controls_tab();

  
    $this->start_controls_tab(
        'tab_hover',
        [
            'label' => __( 'Hover', 'my-addon' )
        ]
    );
    
    $this->add_control(
        'opacity_hover',
        [
            'label'        => __( 'Opacity', 'my-addon' ),
            'type'         =>   Controls_Manager::SLIDER,
            'range'        => [
                ''         => [ 
                    'min'  => 0,
                    'max'  => 1,
                    'step' => 0.1,
                ],
            ],
            'default'      => [
                'unit'     => '',
                'size'     => 1
            ],
            'selectors'    => [
                '{{WRAPPER}} .my-image img:hover' => 'opacity: {{SIZE}};'
            ]
        ]
    );

    $this->end_controls_tab();
 
    $this->end_controls_tabs();
 
    $this->add_control(
        'border',
        [
            'label'      => __( 'Border Type', 'my-addon' ),
            'type'       =>   Controls_Manager::SELECT,
            'default'    => 'none',
            'options'    => [
                ''       => __( 'Default', 'my-addon' ),
                'none'   => __( 'None',    'my-addon' ),
                'solid'  => __( 'Solid',   'my-addon' ),
                'dashed' => __( 'Dashed',  'my-addon' ),
                'dotted' => __( 'Dotted',  'my-addon' ),
                'double' => __( 'Double',  'my-addon' )
            ],
            'selectors'  => [
                '{{WRAPPER}} .my-image img' => 'border-style: {{VALUE}};'
            ]
        ]
    );

    $this->add_control(
        'border_width',
        [
            'label'      => __( 'Border Width', 'my-addon' ),
            'type'       =>   Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
            'selectors'  => [
                '{{WRAPPER}} .my-image img' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
            ]
        ]
    );


    $this->add_control(
        'border_color',
        [
            'label'     => __( 'Border Color', 'my-addon' ),
            'type'      =>   Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .my-image img' => 'border-color: {{VALUE}}'
            ]
        ]
    );

    $this->add_control(
        'border_radius',
        [
            'label'      => __( 'Border Radius', 'my-addon' ),
            'type'       =>   Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
            'selectors'  => [
                '{{WRAPPER}} .my-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
            ]
        ]
    );

    $this->end_controls_section();
    $this->end_controls_section();

    }    

    /**
     * Render the Widget
     * 
     * Render image widget output on the frontend
     * 
     * @since 1.0.0
     * 
     * @access protected
     */
    protected function render(): void {
		$settings = $this->get_settings_for_display();
        
		if ( empty( $settings['my_image']['url'] ) ) {
			return;
		}
		echo '<div class="my-image"><img src="' . $settings['my_image']['url'] . '"></div>';
	}

}