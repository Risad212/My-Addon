<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Stroke;
use Elementor\Group_Control_Text_Shadow;


defined( 'ABSPATH' ) || die();


Class Heading extends \Elementor\Widget_Base{

    /**
     * Retrieve the widget name
     * 
     * @since 1.0.0
     * 
     * @access public
     * 
     * @return string widget name
     */
    public function get_name(): string {
        return 'my_heading';
    }

    /**
     * Retrive the widget title
     * 
     * @since 1.0.0
     * 
     * @access public
     * 
     * @return string widget title
     */
    public function get_title(): string {
        return __( 'Heading', 'my-addon' );
    }

    /**
     * Retrive the widget icon
     * 
     * @since 1.0.0
     * 
     * @access public
     * 
     * @return string widget icon
     */
    public function get_icon(): string {
        return 'eicon-editor-h2';
    }

    /**
     * Retrive the list of categories the widget belon to
     * 
     * @since 1.0.0
     * 
     * @access public
     * 
     * @return array widget cetegories
     */
    public function get_categories(): array {
        return [ 'basic' ];
    }


    /**
     * Register the Widget controls
     * 
     * Add diffrent type of input for allow user to control widget setting
     * 
     * @since 1.0.0
     * 
     * @access protected
     */
    protected function register_controls(): void {

        $this->start_controls_section(
            'heading_section',
            [
                'label' => __( 'Heading', 'my-addon' ),
                'tab'   => Controls_Manager::TAB_CONTENT
            ]
        );

        $this->add_control(
            'title',
            [
                'label'       => __( 'My Title', 'my-addon' ),
                'type'        => Controls_Manager::TEXTAREA,
                'rows'        => 5,
                'default'     => __( 'Add Your Heading Text Here', 'my-addon' ),
                'placeholder' => __( 'Type your heading text here', 'my-addon' ),
            ]
        );

        $this->add_control(
            'heading_link',
            [
                'label'   => __( 'Link', 'my-addon' ),
                'type'    => Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                ]
            ]
        );

        $this->add_control(
			'header_size',
			[
				'label'    => esc_html__( 'HTML Tag', 'my-addon' ),
				'type'     => Controls_Manager::SELECT,
                'default'  => 'h2',
				'options'  => [
					'h1'   => 'H1',
					'h2'   => 'H2',
					'h3'   => 'H3',
					'h4'   => 'H4',
					'h5'   => 'H5',
					'h6'   => 'H6',
					'div'  => 'div',
					'span' => 'span',
					'p' => 'p',
				],
			]
		);
        
        $this->end_controls_section();


        $this->start_controls_section(
            'style',
            [
                'label' => __( 'Heading Style', 'my-addon' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'text_align',
            [
                'label'         => __( 'Alignment', 'my-addon' ),
                'type'          => Controls_Manager::CHOOSE,
                'options'       => [
                    'left'      => [
                        'title' => __( 'Left', 'my-addon' ),
                        'icon'  => 'eicon-text-align-left',
                    ],
                    'center'    => [
                        'title' => __( 'Center', 'my-addon' ),
                        'icon'  => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'my-addon' ),
                        'icon'  => 'eicon-text-align-right',
                    ],
                ],
                'toggle'        => true,
                'selectors'     => [
                    '{{WRAPPER}} .my-class' => 'text-align: {{VALUE}};',
                ]
            ]
        );

        $this->add_control(
			'separator',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'content_typography',
                'selector' => '{{WRAPPER}} .my-class h2',
            ]
        );


        $this->add_group_control(
            Group_Control_Text_Stroke::get_type(),
            [
                'name'     => 'text_stroke',
                'selector' => '{{WRAPPER}} .my-class h2',
            ]
        );


        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name'     => 'text_shadow',
                'selector' => '{{WRAPPER}} .my-class h2'
            ]
        );


        $this->start_controls_tabs('title_color');

        $this->start_controls_tab(
            'color_tab',
            [
                'label' => __( 'Normal', 'my-addon' )
            ]
        );


        $this->add_control(
            'color',
            [
                'label'     => __( 'Color', 'my-addon' ),
                'type'      =>      Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .my-class h2 a' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->end_controls_tab();


        $this->start_controls_tab(
            'color_hover_tab',
            [
                'label' => __( 'Hover', 'my-addon' )
            ]
        );

        $this->add_control(
            'color_hover',
            [
                'label'     => __( 'Color Hover', 'my-addon' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .my-class h2 a:hover' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_section();

    }

    
    /**
     * Render the Widget
     * 
     * Render heading widget output on the frontend
     * 
     * @since 1.0.0
     * 
     * @access protected
     */
    protected function render(): void {
        $settings = $this->get_settings_for_display();

        if ( empty( $settings['title'] ) ) {
            return;
        }

        if ( ! empty( $settings['heading_link']['url'] ) ) {
			$this->add_link_attributes( 'heading_link', $settings['heading_link'] );
		}

        ?>
        <div class="my-class">
            <<?php echo $settings['header_size'] ?>>
              <a <?php $this->print_render_attribute_string( 'heading_link' ); ?>>
                <?php echo $settings['title']; ?>
              </a>
            </<?php echo $settings['header_size'] ?>>
        </div>
        <?php
    }
}